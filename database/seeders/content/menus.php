<?php

return [
    'header' => ['name' => 'Header navigation', 'items' => [
        ['type' => 'category', 'target' => 'insurance', 'label' => tx('Insurance', 'التأمين'), 'enabled' => true],
        ['type' => 'category', 'target' => 'people', 'label' => tx('People & Organization', 'الأفراد والمؤسسة'), 'enabled' => true],
        ['type' => 'category', 'target' => 'learning', 'label' => tx('Learning & Leadership', 'التعلّم والقيادة'), 'enabled' => true],
        ['type' => 'route', 'target' => 'about', 'label' => tx('About', 'من نحن'), 'enabled' => true],
        ['type' => 'route', 'target' => 'insights.index', 'label' => tx('Insights', 'رؤى ومقالات'), 'enabled' => true],
        ['type' => 'route', 'target' => 'contact', 'label' => tx('Contact', 'تواصل معنا'), 'enabled' => true],
    ]],
    'footer_company' => ['name' => 'Footer — Company', 'items' => [
        ['type' => 'route', 'target' => 'about', 'label' => tx('About WAFA', 'عن وفاء'), 'enabled' => true],
        ['type' => 'route', 'target' => 'programs.index', 'label' => tx('Training programs', 'البرامج التدريبية'), 'enabled' => true],
        ['type' => 'route', 'target' => 'insights.index', 'label' => tx('Insights', 'رؤى ومقالات'), 'enabled' => true],
        ['type' => 'route', 'target' => 'contact', 'label' => tx('Contact', 'تواصل معنا'), 'enabled' => true],
    ]],
    'footer_legal' => ['name' => 'Footer — Legal', 'items' => [
        ['type' => 'url', 'target' => '/privacy-policy', 'label' => tx('Privacy policy', 'سياسة الخصوصية'), 'enabled' => true],
        ['type' => 'url', 'target' => '/terms-of-use', 'label' => tx('Terms of use', 'شروط الاستخدام'), 'enabled' => true],
        ['type' => 'url', 'target' => '/cookie-policy', 'label' => tx('Cookie policy', 'سياسة ملفات تعريف الارتباط'), 'enabled' => true],
    ]],
];
