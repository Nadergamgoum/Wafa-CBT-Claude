<?php

// Every factual business detail (phone, WhatsApp, email, address, social links,
// analytics IDs) is intentionally left EMPTY — fill them in Admin → Settings.
return [
    'general' => [
        'site_name' => tx('WAFA', 'وفاء'),
        'legal_name' => tx('', ''),
        'tagline' => tx('Protecting People. Strengthening Businesses.', 'نحمي الأفراد. ونمكّن المؤسسات.'),
        'header_cta' => tx('Talk to Our Experts', 'تحدّث إلى خبرائنا'),
    ],
    'brand' => [
        'logo' => null,
        'logo_light' => null,
        'favicon' => null,
        'og_image' => null,
        // Provisional palette — replace with the official WAFA brand values.
        'color_primary' => '#0d3150',
        'color_secondary' => '#0f7a76',
        'color_accent' => '#c79a3e',
    ],
    'contact' => [
        'phone' => '',
        'email' => '',
        'address' => tx('', ''),
        'hours' => tx('', ''),
        'street' => tx('', ''),
        'city' => tx('', ''),
        'region' => tx('', ''),
        'postal_code' => '',
        'country_code' => '',
        'area_served' => '',
        'map_embed_url' => '',
        'messenger_url' => '',
        'telegram_url' => '',
    ],
    'whatsapp' => [
        'enabled' => false,
        'country_code' => '',
        'number' => '',
        'message' => tx('Hello WAFA, I would like to learn more about your services.', 'مرحبًا وفاء، أودّ معرفة المزيد عن خدماتكم.'),
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
    'social' => [
        'items' => collect(['linkedin', 'facebook', 'instagram', 'x', 'youtube', 'tiktok', 'telegram', 'snapchat', 'threads', 'whatsapp'])
            ->map(fn ($p) => ['platform' => $p, 'url' => '', 'enabled' => false])->all(),
    ],
    'analytics' => [
        'first_party' => true,
        'ga4_id' => '', 'gtm_id' => '', 'meta_pixel_id' => '', 'linkedin_partner_id' => '', 'tiktok_pixel_id' => '',
        'google_verification' => '', 'bing_verification' => '',
        'ga4_property_id' => '',
    ],
    'seo' => [
        'title_pattern' => tx('%title% | %site%', '%title% | %site%'),
        'default_description' => tx(
            'WAFA brings together corporate medical insurance, employee health benefits, insurance brokerage and people solutions — HR consulting, organizational development, training and coaching.',
            'تجمع وفاء بين التأمين الطبي للشركات ومزايا الموظفين الصحية والوساطة التأمينية وحلول الموارد البشرية، من الاستشارات والتطوير المؤسسي إلى التدريب والكوتشينغ.'
        ),
        'allow_indexing' => true,
        'twitter_handle' => '',
        'robots_extra' => '',
    ],
    'footer' => [
        'tagline' => tx(
            'Integrated medical insurance, employee benefits and people solutions designed around your organization.',
            'حلول متكاملة في التأمين الطبي ومزايا الموظفين والموارد البشرية، مصمّمة حول احتياجات مؤسستك.'
        ),
        'copyright' => tx('All rights reserved.', 'جميع الحقوق محفوظة.'),
    ],
    'cookies' => [
        'require_consent' => true,
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
