<?php

// Verified contact details only (phone, WhatsApp, email). Address, hours, map,
// social profiles and analytics IDs stay EMPTY until verified values are supplied
// — fill them in Admin → Settings; empty values are hidden on the site.
return [
    'general' => [
        'site_name' => tx('WAFA', 'WAFA'),
        'legal_name' => tx('', ''),
        'tagline' => tx('Protecting People. Strengthening Businesses.', 'نحمي الأفراد. ونمكّن المؤسسات.'),
        'header_cta' => tx('Talk to Our Experts', 'تحدّث إلى خبرائنا'),
        'header_cta_link' => '/contact#contact-form',
        'language_switcher' => true,
        'maintenance' => false,
        'maintenance_title' => tx('', ''),
        'maintenance_message' => tx('', ''),
    ],
    'brand' => [
        'logo' => null,
        'logo_light' => null,
        'favicon' => null,
        'og_image' => null,
        // Official WAFA palette: near-black ink, accessible deep teal (white text
        // passes WCAG AA on it) and the official logo teal #19BAAB as accent.
        'color_primary' => '#16191c',
        'color_secondary' => '#0e7f75',
        'color_accent' => '#19baab',
        'heading_font' => 'serif',
    ],
    'contact' => [
        'phone' => '+20 10 33300023',
        'email' => 'info@wafa-cbt.com',
        'address' => tx('', ''),
        'hours' => tx('', ''),
        'street' => tx('', ''),
        'city' => tx('', ''),
        'region' => tx('', ''),
        'postal_code' => '',
        'country_code' => 'EG',
        'area_served' => 'Egypt',
        'map_embed_url' => '',
        'messenger_url' => '',
        'telegram_url' => '',
    ],
    'whatsapp' => [
        'enabled' => true,
        'country_code' => '20',
        'number' => '1033300023',
        'message' => tx('Hello WAFA, I would like to learn more about your services.', 'مرحبًا WAFA، أودّ معرفة المزيد عن خدماتكم.'),
    ],
    'channels' => [
        'widget_enabled' => true,
        'quickbar_consult' => false,
        'widget_title' => tx('How can we help?', 'كيف يمكننا مساعدتك؟'),
        'widget_text' => tx('Choose the channel that suits you best — our team will take it from there.', 'اختر وسيلة التواصل الأنسب لك، وسيتولى فريقنا المتابعة.'),
        'items' => [
            ['key' => 'whatsapp', 'enabled' => true],
            ['key' => 'phone', 'enabled' => true],
            ['key' => 'email', 'enabled' => true],
            ['key' => 'form', 'enabled' => true],
            ['key' => 'messenger', 'enabled' => false],
            ['key' => 'telegram', 'enabled' => false],
        ],
    ],
    'quickbar' => [
        'enabled' => true,
        'consult_link' => '/contact#contact-form',
        'items' => [
            ['key' => 'phone', 'enabled' => true],
            ['key' => 'whatsapp', 'enabled' => true],
            ['key' => 'consult', 'enabled' => false],
            ['key' => 'email', 'enabled' => false],
        ],
        'label_phone' => tx('', ''), 'label_whatsapp' => tx('', ''), 'label_consult' => tx('', ''), 'label_email' => tx('', ''),
    ],
    'social' => [
        'items' => collect(['linkedin', 'facebook', 'instagram', 'x', 'youtube', 'tiktok', 'telegram', 'snapchat', 'threads', 'whatsapp'])
            ->map(fn ($p) => ['platform' => $p, 'url' => '', 'enabled' => false])->all(),
    ],
    'analytics' => [
        'first_party' => true,
        'ga4_enabled' => true, 'gtm_enabled' => true, 'meta_enabled' => true, 'linkedin_enabled' => true, 'tiktok_enabled' => true,
        'ga4_id' => '', 'gtm_id' => '', 'meta_pixel_id' => '', 'linkedin_partner_id' => '', 'tiktok_pixel_id' => '',
        'google_verification' => '', 'bing_verification' => '',
        'ga4_property_id' => '',
    ],
    'seo' => [
        'title_pattern' => tx('%title% | %site%', '%title% | %site%'),
        'default_description' => tx(
            'WAFA is a professional consultancy firm in Egypt specializing in insurance brokerage and corporate medical insurance management, HR consulting and organizational development, training, and business and executive coaching.',
            'WAFA مؤسسة استشارية في مصر متخصصة في الوساطة التأمينية وإدارة التأمين الطبي للشركات، واستشارات الموارد البشرية والتطوير المؤسسي، والتدريب، وكوتشينغ الأعمال والكوتشينغ التنفيذي.'
        ),
        'allow_indexing' => true,
        'twitter_handle' => '',
        'robots_extra' => '',
        'x_default' => 'en',
        'schema_type' => 'ProfessionalService',
        'sitemap_programs' => true, 'sitemap_engagements' => true, 'sitemap_posts' => true, 'sitemap_post_categories' => true,
    ],
    'footer' => [
        'tagline' => tx(
            'Integrated medical insurance, employee benefits and people solutions designed around your organization.',
            'حلول متكاملة في التأمين الطبي ومزايا الموظفين والموارد البشرية، مصمّمة حول احتياجات مؤسستك.'
        ),
        'copyright' => tx('All rights reserved.', 'جميع الحقوق محفوظة.'),
        'show_services' => true,
        'cta_enabled' => false,
        'cta_title' => tx('', ''),
        'cta_label' => tx('', ''),
        'cta_link' => '',
    ],
    'cookies' => [
        'require_consent' => true,
        'category_analytics' => true,
        'category_marketing' => true,
        'version' => '1',
        'title' => tx('Your privacy choices', 'خيارات الخصوصية'),
        'text' => tx(
            'We use necessary cookies to run this site. With your permission we also use analytics and marketing cookies to understand visits and measure campaigns.',
            'نستخدم ملفات تعريف الارتباط الضرورية لتشغيل الموقع، وبموافقتك نستخدم أيضًا ملفات التحليلات والتسويق لفهم الزيارات وقياس أداء الحملات.'
        ),
    ],
    'forms' => [
        'notify_email' => '',
        'success_message' => tx(
            'Thank you — your message has been received. Our team will contact you shortly.',
            'شكرًا لك، تم استلام رسالتك وسيتواصل معك فريقنا قريبًا.'
        ),
    ],
];
