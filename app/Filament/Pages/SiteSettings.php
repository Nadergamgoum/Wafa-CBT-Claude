<?php

namespace App\Filament\Pages;

use App\Filament\Concerns\SuperAdminOnly;
use App\Filament\Support\MediaPicker;
use App\Filament\Support\Tr;
use App\Models\Setting;
use App\Support\Contact;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use UnitEnum;

class SiteSettings extends Page
{
    use SuperAdminOnly;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string|UnitEnum|null $navigationGroup = 'Site';

    protected static ?string $navigationLabel = 'Site settings';

    protected static ?string $title = 'Site settings';

    protected static ?int $navigationSort = 0;

    public const GROUPS = ['general', 'brand', 'contact', 'whatsapp', 'channels', 'social', 'seo', 'analytics', 'cookies', 'footer', 'forms'];

    /** @var array<string, mixed> */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(collect(self::GROUPS)->mapWithKeys(fn ($g) => [$g => Setting::group($g)])->all());
    }

    public function form(Schema $schema): Schema
    {
        return $schema->statePath('data')->components([
            Tabs::make('settings')->persistTabInQueryString()->columnSpanFull()->tabs([
                Tab::make('General & brand')->icon('heroicon-o-building-office')->schema([
                    Tr::text('general.site_name', 'Site / brand name', required: true),
                    Tr::text('general.legal_name', 'Legal company name', help: 'Used in the footer copyright and structured data. Leave empty if not confirmed.'),
                    Tr::text('general.header_cta', 'Header button text'),
                    Section::make('Logo & icons')->description('Upload the official WAFA logo (PNG or WebP with transparent background works best).')->columns(2)->schema([
                        MediaPicker::make('brand.logo', 'Logo (for light backgrounds)'),
                        MediaPicker::make('brand.logo_light', 'Logo (for dark backgrounds, footer)'),
                        MediaPicker::make('brand.favicon', 'Favicon / app icon (square, at least 512 px)'),
                        MediaPicker::make('brand.og_image', 'Default social sharing image (1200 × 630)'),
                    ]),
                    Section::make('Brand colours')->description('Defaults are provisional — set the official WAFA brand values. All tints and states are derived automatically.')->columns(3)->schema([
                        ColorPicker::make('brand.color_primary')->label('Primary (deep / navy)')->regex('/^#[0-9a-fA-F]{6}$/'),
                        ColorPicker::make('brand.color_secondary')->label('Secondary (buttons, health accent)')->regex('/^#[0-9a-fA-F]{6}$/'),
                        ColorPicker::make('brand.color_accent')->label('Accent (premium details)')->regex('/^#[0-9a-fA-F]{6}$/'),
                    ]),
                ]),
                Tab::make('Contact & WhatsApp')->icon('heroicon-o-phone')->schema([
                    Section::make('Contact details')->description('Only filled-in details are shown on the website. Leave anything unconfirmed empty.')->columns(2)->schema([
                        TextInput::make('contact.phone')->label('Phone number')->tel()->maxLength(40)->placeholder('+000 0000 0000')
                            ->helperText('Shown as written; used for the Call buttons.'),
                        TextInput::make('contact.email')->label('Email address')->email()->maxLength(190),
                        Tr::textarea('contact.address', 'Address (as displayed)'),
                        Tr::textarea('contact.hours', 'Business hours'),
                        TextInput::make('contact.map_embed_url')->label('Google Maps embed URL')->url()->maxLength(1000)->columnSpanFull()
                            ->helperText('From Google Maps → Share → Embed a map → copy only the src URL (starts with https://www.google.com/maps/embed).'),
                    ]),
                    Section::make('Structured data address (optional)')->collapsed()->columns(3)->schema([
                        Tr::text('contact.street', 'Street'),
                        Tr::text('contact.city', 'City'),
                        Tr::text('contact.region', 'Region'),
                        TextInput::make('contact.postal_code')->label('Postal code')->maxLength(20),
                        TextInput::make('contact.country_code')->label('Country code (ISO, e.g. AE)')->maxLength(2),
                        TextInput::make('contact.area_served')->label('Area served')->maxLength(120),
                    ]),
                    Section::make('WhatsApp')->columns(3)->schema([
                        Toggle::make('whatsapp.enabled')->label('Enable WhatsApp buttons')->inline(false),
                        TextInput::make('whatsapp.country_code')->label('Country code')->placeholder('e.g. 971')->maxLength(5)->regex('/^\+?\d{1,4}$/'),
                        TextInput::make('whatsapp.number')->label('Number (without country code)')->maxLength(20)->regex('/^[\d\s-]{5,20}$/'),
                        Tr::textarea('whatsapp.message', 'Default message', help: 'Pre-filled text when a visitor opens WhatsApp. Optional.'),
                    ]),
                    Section::make('Other channels')->columns(2)->schema([
                        TextInput::make('contact.messenger_url')->label('Facebook Messenger link (m.me/…)')->url()->maxLength(255),
                        TextInput::make('contact.telegram_url')->label('Telegram link (t.me/…)')->url()->maxLength(255),
                    ]),
                    Section::make('Contact widget & mobile bar')->columns(2)->schema([
                        Toggle::make('channels.widget_enabled')->label('Show the floating contact menu on desktop')->inline(false),
                        Toggle::make('channels.quickbar_consult')->label('Always add “Consult” to the mobile bar')->inline(false),
                        Tr::text('channels.widget_title', 'Widget title'),
                        Tr::textarea('channels.widget_text', 'Widget text'),
                        Repeater::make('channels.items')->label('Channel order (drag to reorder)')->columnSpanFull()
                            ->schema([
                                Select::make('key')->options(['whatsapp' => 'WhatsApp', 'phone' => 'Phone', 'email' => 'Email', 'form' => 'Contact form', 'messenger' => 'Messenger', 'telegram' => 'Telegram'])
                                    ->required()->native(false)->distinct(),
                                Toggle::make('enabled')->default(true)->inline(false),
                            ])->columns(2)->reorderableWithDragAndDrop()->reorderableWithButtons()->addable(false)->deletable(false)
                            ->itemLabel(fn (array $state) => ucfirst($state['key'] ?? '')),
                    ]),
                ]),
                Tab::make('Social media')->icon('heroicon-o-share')->schema([
                    Repeater::make('social.items')->label('Social profiles')->helperText('Only enabled profiles with a link are shown. Drag to reorder.')
                        ->schema([
                            Select::make('platform')->options(Contact::SOCIAL_PLATFORMS)->required()->native(false),
                            TextInput::make('url')->label('Profile URL')->url()->maxLength(255)->rule('starts_with:https://'),
                            Toggle::make('enabled')->inline(false),
                        ])->columns(3)->reorderableWithDragAndDrop()->reorderableWithButtons()->collapsible()
                        ->itemLabel(fn (array $state) => (Contact::SOCIAL_PLATFORMS[$state['platform'] ?? ''] ?? 'Profile').(($state['enabled'] ?? false) && filled($state['url'] ?? null) ? ' — visible' : ' — hidden'))
                        ->addActionLabel('Add profile')->columnSpanFull(),
                ]),
                Tab::make('SEO & search engines')->icon('heroicon-o-magnifying-glass')->schema([
                    Tr::text('seo.title_pattern', 'Title pattern', help: 'Use %title% and %site%, e.g. “%title% | %site%”.'),
                    Tr::textarea('seo.default_description', 'Default meta description'),
                    Section::make()->columns(2)->schema([
                        Toggle::make('seo.allow_indexing')->label('Allow search engines to index the site')->inline(false)
                            ->helperText('Turn off only for staging copies. (Staging servers can also set SEO_FORCE_NOINDEX=true.)'),
                        TextInput::make('seo.twitter_handle')->label('X / Twitter handle')->prefix('@')->maxLength(30),
                        TextInput::make('analytics.google_verification')->label('Google Search Console verification code')->maxLength(300)
                            ->helperText('Paste the content value or the whole <meta> tag.'),
                        TextInput::make('analytics.bing_verification')->label('Bing Webmaster verification code')->maxLength(300),
                        Textarea::make('seo.robots_extra')->label('Extra robots.txt rules')->rows(3)->columnSpanFull()
                            ->helperText('Advanced. Admin, installer and filtered listing pages are already excluded.'),
                    ]),
                ]),
                Tab::make('Analytics & tracking')->icon('heroicon-o-chart-bar')->schema([
                    Section::make()->description('Scripts load only when an ID is set — and, when consent is required, only after the visitor agrees.')->columns(2)->schema([
                        TextInput::make('analytics.ga4_id')->label('Google Analytics 4 measurement ID')->placeholder('G-XXXXXXXXXX')->regex('/^(G-[A-Z0-9]{4,})?$/'),
                        TextInput::make('analytics.gtm_id')->label('Google Tag Manager container ID')->placeholder('GTM-XXXXXXX')->regex('/^(GTM-[A-Z0-9]{4,})?$/'),
                        TextInput::make('analytics.meta_pixel_id')->label('Meta Pixel ID')->regex('/^(\d{6,20})?$/'),
                        TextInput::make('analytics.linkedin_partner_id')->label('LinkedIn Insight Tag partner ID')->regex('/^(\d{3,12})?$/'),
                        TextInput::make('analytics.tiktok_pixel_id')->label('TikTok Pixel ID')->regex('/^([A-Z0-9]{8,30})?$/'),
                        Toggle::make('analytics.first_party')->label('Built-in privacy-friendly statistics (no cookies)')->inline(false)
                            ->helperText('Powers the dashboard: visits, top pages, devices, languages, sources and conversions.'),
                        TextInput::make('analytics.ga4_property_id')->label('GA4 property ID (for future API reporting)')->maxLength(20)
                            ->helperText('Optional. Reporting from Google’s API also requires a service-account key configured on the server.'),
                    ]),
                ]),
                Tab::make('Cookies & consent')->icon('heroicon-o-shield-check')->schema([
                    Toggle::make('cookies.require_consent')->label('Ask for consent before loading analytics & marketing tags')->inline(false)
                        ->helperText('Recommended. Necessary cookies always load.'),
                    TextInput::make('cookies.version')->label('Consent version')->maxLength(10)->helperText('Change this value to ask all visitors for consent again (e.g. after adding a new tracking tool).'),
                    Tr::text('cookies.title', 'Banner title'),
                    Tr::textarea('cookies.text', 'Banner text'),
                ]),
                Tab::make('Footer & forms')->icon('heroicon-o-envelope')->schema([
                    Tr::textarea('footer.tagline', 'Footer tagline'),
                    Tr::text('footer.copyright', 'Copyright text'),
                    TextInput::make('forms.notify_email')->label('Send form notifications to')->email()->maxLength(190)
                        ->helperText('Defaults to the contact email. Requires SMTP settings in .env.'),
                    Tr::textarea('forms.success_message', 'Form success message'),
                ]),
            ]),
        ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            Form::make([EmbeddedSchema::make('form')])
                ->id('form')
                ->livewireSubmitHandler('save')
                ->footer([Actions::make([Action::make('save')->label('Save settings')->submit('save')->keyBindings(['mod+s'])])->sticky()]),
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        foreach (['google_verification', 'bing_verification'] as $k) {
            $v = (string) ($data['analytics'][$k] ?? '');
            if (preg_match('/content=["\']([^"\']+)["\']/i', $v, $m)) {
                $v = $m[1];
            }
            $data['analytics'][$k] = preg_replace('/[^A-Za-z0-9_\-:.=]/', '', $v);
        }
        if (! empty($data['seo']['twitter_handle'])) {
            $data['seo']['twitter_handle'] = ltrim(preg_replace('/[^A-Za-z0-9_@]/', '', $data['seo']['twitter_handle']), '@');
        }
        foreach (self::GROUPS as $group) {
            if (array_key_exists($group, $data)) {
                Setting::put($group, array_replace(Setting::group($group), $data[$group] ?? []));
            }
        }
        Notification::make()->success()->title('Settings saved')->send();
    }
}
