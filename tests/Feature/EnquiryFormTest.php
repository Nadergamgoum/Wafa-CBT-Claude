<?php

namespace Tests\Feature;

use App\Mail\NewLeadMail;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EnquiryFormTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seedContent();
    }

    protected function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Sara Ahmed', 'company' => 'Acme', 'email' => 'sara@example.com', 'phone' => '+971 50 000 0000',
            'service' => 'Corporate Medical Insurance', 'message' => 'Please review our policy.', 'consent' => '1',
            'locale' => 'en', 'type' => 'contact', '_ts' => Crypt::encryptString((string) (time() - 10)),
        ], $overrides);
    }

    public function test_valid_enquiry_is_stored_classified_and_emailed(): void
    {
        Mail::fake();
        Setting::put('forms', ['notify_email' => 'team@example.com']);
        $this->postJson('/enquiry', $this->payload())->assertOk()->assertJson(['ok' => true, 'event' => 'medical']);
        $this->assertDatabaseHas('leads', ['email' => 'sara@example.com', 'type' => 'medical', 'status' => 'new', 'consent' => true]);
        Mail::assertSent(NewLeadMail::class, fn ($m) => $m->hasTo('team@example.com'));
        $this->assertDatabaseHas('analytics_events', ['name' => 'medical_inquiry']);
    }

    public function test_validation_and_consent_are_required(): void
    {
        $this->postJson('/enquiry', $this->payload(['email' => 'nope', 'consent' => null]))
            ->assertStatus(422)->assertJsonValidationErrors(['email', 'consent']);
        $this->assertDatabaseCount('leads', 0);
    }

    public function test_honeypot_and_fast_submissions_are_silently_discarded(): void
    {
        $this->postJson('/enquiry', $this->payload(['website' => 'http://spam']))->assertOk();
        $this->postJson('/enquiry', $this->payload(['_ts' => Crypt::encryptString((string) time())]))->assertOk();
        $this->assertDatabaseCount('leads', 0);
    }

    public function test_tampered_timestamp_is_rejected(): void
    {
        $this->postJson('/enquiry', $this->payload(['_ts' => 'abc']))->assertStatus(422);
    }

    public function test_enquiries_are_rate_limited(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $this->postJson('/enquiry', $this->payload(['email' => "a{$i}@example.com"]))->assertOk();
        }
        $this->postJson('/enquiry', $this->payload(['email' => 'x@example.com']))->assertStatus(429);
    }

    public function test_html_is_stripped_from_submissions(): void
    {
        $this->postJson('/enquiry', $this->payload(['name' => '<b>Sara</b>', 'message' => '<script>alert(1)</script>Hello']))->assertOk();
        $this->assertDatabaseHas('leads', ['name' => 'Sara', 'message' => 'alert(1)Hello']);
    }
}
