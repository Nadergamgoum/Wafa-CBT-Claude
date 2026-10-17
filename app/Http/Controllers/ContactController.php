<?php

namespace App\Http\Controllers;

use App\Mail\NewLeadMail;
use App\Models\Lead;
use App\Models\Service;
use App\Support\Analytics;
use App\Support\Contact;
use App\Support\Locales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /** Minimum seconds between rendering the form and submitting it (bots are faster). */
    protected const MIN_SECONDS = 3;

    public function store(Request $request)
    {
        $locale = in_array($request->input('locale'), Locales::SUPPORTED, true) ? $request->input('locale') : Locales::DEFAULT;
        app()->setLocale($locale);

        // Honeypot + timing trap: silently accept so bots learn nothing.
        if ($this->looksAutomated($request)) {
            return $this->done($request, $locale);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'company' => ['nullable', 'string', 'max:160'],
            'email' => ['required', 'email:rfc', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40', 'regex:/^[0-9+()\-\s.]{6,40}$/'],
            'service' => ['nullable', 'string', 'max:160'],
            'message' => ['nullable', 'string', 'max:4000'],
            'consent' => ['accepted'],
            'type' => ['nullable', 'in:'.implode(',', array_keys(Lead::TYPES))],
            'page_url' => ['nullable', 'string', 'max:500'],
        ], [], [
            'name' => __('form.name'), 'email' => __('form.email'), 'phone' => __('form.phone'),
            'company' => __('form.company'), 'message' => __('form.message'), 'consent' => __('form.consent_short'),
        ]);

        $type = $data['type'] ?? 'contact';
        if ($type === 'contact' && $this->isMedical($data['service'] ?? null)) {
            $type = 'medical';
        }

        $lead = Lead::create([
            'type' => $type,
            'name' => strip_tags($data['name']),
            'company' => isset($data['company']) ? strip_tags($data['company']) : null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'service' => isset($data['service']) ? strip_tags($data['service']) : null,
            'message' => isset($data['message']) ? strip_tags($data['message']) : null,
            'consent' => true,
            'locale' => $locale,
            'page_url' => mb_substr((string) ($data['page_url'] ?? $request->headers->get('referer')), 0, 500),
            'referrer' => mb_substr((string) $request->input('ref'), 0, 500) ?: null,
            'utm' => collect($request->only(['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content']))
                ->map(fn ($v) => mb_substr(strip_tags((string) $v), 0, 120))->filter()->all() ?: null,
            'ip_hash' => hash('sha256', $request->ip().config('app.key')),
            'user_agent' => mb_substr((string) $request->userAgent(), 0, 300),
        ]);

        Analytics::record('event', match ($type) {
            'training' => 'training_registration', 'medical' => 'medical_inquiry', default => 'contact_submit',
        }, (string) parse_url((string) $lead->page_url, PHP_URL_PATH) ?: '/', $locale, $request);

        $to = setting('forms.notify_email') ?: Contact::email();
        if ($to && filter_var($to, FILTER_VALIDATE_EMAIL)) {
            try {
                Mail::to($to)->send(new NewLeadMail($lead));
            } catch (\Throwable $e) {
                Log::warning('Lead notification email failed: '.$e->getMessage());
            }
        }

        return $this->done($request, $locale, $type);
    }

    protected function looksAutomated(Request $request): bool
    {
        if (filled($request->input('website'))) {
            return true;
        }
        try {
            $ts = (int) Crypt::decryptString((string) $request->input('_ts'));
        } catch (\Throwable) {
            throw ValidationException::withMessages(['form' => __('form.expired')]);
        }

        return (time() - $ts) < self::MIN_SECONDS;
    }

    protected function isMedical(?string $service): bool
    {
        if (! $service) {
            return false;
        }
        $medical = Service::query()->where('family', 'medical')->first();

        return $medical && in_array($service, [t($medical->title, 'en'), t($medical->title, 'ar')], true);
    }

    protected function done(Request $request, string $locale, string $type = 'contact')
    {
        $message = t(setting('forms.success_message')) ?: __('form.success');
        if ($request->expectsJson()) {
            return response()->json(['ok' => true, 'message' => $message, 'event' => $type]);
        }

        return back()->with('form_success', $message)->withFragment('contact-form');
    }
}
