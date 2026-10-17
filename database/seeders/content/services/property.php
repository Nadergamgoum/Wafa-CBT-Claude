<?php

return [
    'category' => 'insurance',
    'family' => 'property',
    'slug' => 'property-insurance',
    'sort' => 4,
    'icon' => 'building-2',
    'accent' => 'navy',
    'hero_variant' => 'overlay',
    'title' => tx('Property Insurance', 'تأمين الممتلكات'),
    'summary' => tx(
        'Safeguarding your home and assets from unexpected risks — from homes and contents to business premises, equipment and stock.',
        'حماية منزلك وأصولك من المخاطر غير المتوقعة، من المنازل ومحتوياتها إلى المنشآت التجارية والمعدات والمخزون.'
    ),
    'hero' => [
        'eyebrow' => tx('Insurance · Homes, property & assets', 'التأمين · المنازل والممتلكات والأصول'),
        'title' => tx('Safeguarding your home and assets from *unexpected risks*', 'حماية منزلك وأصولك من *المخاطر غير المتوقعة*'),
        'lead' => tx(
            'Whether it is your home or your business premises, property represents years of investment. We help you identify what needs protection and arrange cover that reflects real values and risks.',
            'سواء كان منزلك أو مقر عملك، تمثل الممتلكات سنوات من الاستثمار. نساعدك على تحديد ما يحتاج إلى حماية وترتيب تغطية تعكس القيم والمخاطر الحقيقية.'
        ),
        'cta_label' => tx('Review your property cover', 'راجع تأمين ممتلكاتك'),
        'cta_link' => '/contact#contact-form',
        'highlights' => [
            ['icon' => 'house', 'label' => tx('Homes', 'المنازل')],
            ['icon' => 'building', 'label' => tx('Buildings', 'المباني')],
            ['icon' => 'monitor', 'label' => tx('Equipment & contents', 'المعدات والمحتويات')],
            ['icon' => 'package', 'label' => tx('Stock', 'المخزون')],
        ],
    ],
    'sections' => [
        B('coverage', [
            'layout' => 'assets',
            'background' => 'white',
            'eyebrow' => tx('What needs protection', 'ما الذي يحتاج إلى حماية'),
            'title' => tx('Start with a clear picture of *your assets*', 'ابدأ بصورة واضحة *لأصولك*'),
            'lead' => tx('Good property insurance begins with knowing what you own, where it is and what it would cost to replace.', 'يبدأ تأمين الممتلكات الجيد بمعرفة ما تملكه وأين يوجد وكم ستكلّف إعادته.'),
            'items' => [
                I('house', tx('Homes & contents', 'المنازل ومحتوياتها'), tx('Your home, its contents and personal belongings.', 'منزلك ومحتوياته وممتلكاتك الشخصية.')),
                I('building-2', tx('Buildings & premises', 'المباني والمنشآت'), tx('Offices, branches, warehouses and other owned or leased premises.', 'المكاتب والفروع والمستودعات وغيرها من المنشآت المملوكة أو المستأجرة.')),
                I('monitor', tx('Contents & equipment', 'المحتويات والمعدات'), tx('Furniture, IT equipment, machinery and fit-out.', 'الأثاث وأجهزة تقنية المعلومات والآلات والتجهيزات.')),
                I('package', tx('Stock & inventory', 'المخزون والبضائع'), tx('Goods held for sale or production.', 'البضائع المحتفظ بها للبيع أو الإنتاج.')),
                I('activity', tx('Business interruption', 'توقف الأعمال'), tx('Loss of income after an insured event, where included.', 'خسارة الدخل بعد وقوع حادث مؤمَّن عليه، متى كانت مشمولة.')),
                I('users', tx('Liability', 'المسؤولية'), tx('Claims from third parties related to your premises or activities.', 'مطالبات الغير المتعلقة بمنشآتك أو أنشطتك.')),
            ],
        ]),
        B('challenges', [
            'layout' => 'tiles',
            'background' => 'dark',
            'eyebrow' => tx('Risks to consider', 'مخاطر يجب أخذها في الاعتبار'),
            'title' => tx('The unexpected events *property cover* is built for', 'الأحداث غير المتوقعة التي *يُصمَّم لها* تأمين الممتلكات'),
            'lead' => tx('Every home, building and activity has its own risk profile. We help you think through the ones that matter for you.', 'لكل منزل ومبنى ونشاط طبيعة مخاطر خاصة، ونساعدك على دراسة المخاطر الأهم بالنسبة إليك.'),
            'items' => [
                ['icon' => 'flame', 'title' => tx('Fire', 'الحريق'), 'text' => tx('Including smoke damage', 'بما في ذلك أضرار الدخان')],
                ['icon' => 'droplets', 'title' => tx('Water damage', 'أضرار المياه'), 'text' => tx('Leaks and burst pipes', 'التسربات وانفجار الأنابيب')],
                ['icon' => 'lock', 'title' => tx('Theft & burglary', 'السرقة والسطو'), 'text' => tx('Forced entry and loss', 'الدخول بالقوة والفقدان')],
                ['icon' => 'cloud-lightning', 'title' => tx('Natural perils', 'المخاطر الطبيعية'), 'text' => tx('Storms, floods and similar events', 'العواصف والفيضانات ونحوها')],
                ['icon' => 'wrench', 'title' => tx('Accidental damage', 'الأضرار العرضية'), 'text' => tx('Unexpected physical damage', 'أضرار مادية غير متوقعة')],
                ['icon' => 'zap', 'title' => tx('Equipment breakdown', 'أعطال المعدات'), 'text' => tx('Where specific cover applies', 'متى توفرت تغطية خاصة')],
                ['icon' => 'activity', 'title' => tx('Interruption', 'توقف النشاط'), 'text' => tx('Lost income while you recover', 'خسارة الدخل خلال فترة التعافي')],
                ['icon' => 'scale', 'title' => tx('Under-insurance', 'نقص قيمة التأمين'), 'text' => tx('Values that no longer reflect reality', 'قيم لم تعد تعكس الواقع')],
            ],
        ]),
        B('split_feature', [
            'background' => 'ivory',
            'image_side' => 'end',
            'art' => 'property-detail',
            'eyebrow' => tx('Advisory support', 'الدعم الاستشاري'),
            'title' => tx('Cover that reflects *real values*', 'تغطية تعكس *القيم الحقيقية*'),
            'body' => tx('One of the most common problems in property insurance is outdated sums insured. We help you review values, understand conditions and avoid gaps before they become costly.', 'من أكثر المشكلات شيوعًا في تأمين الممتلكات أن تكون مبالغ التأمين قديمة. نساعدك على مراجعة القيم وفهم الشروط وتجنب الفجوات قبل أن تصبح مكلفة.'),
            'points' => L(
                ['Asset and location review', 'Explanation of exclusions and conditions', 'Comparison of insurer proposals', 'Claims guidance after an incident'],
                ['مراجعة الأصول والمواقع', 'شرح الاستثناءات والشروط', 'مقارنة عروض شركات التأمين', 'إرشاد في المطالبات بعد وقوع الحادث']
            ),
            'cta_label' => tx('Talk to an advisor', 'تحدّث إلى مستشار'),
            'cta_link' => '/contact#contact-form',
        ]),
        B('process', [
            'layout' => 'cards',
            'background' => 'white',
            'eyebrow' => tx('Protection journey', 'رحلة الحماية'),
            'title' => tx('Four phases to *well-protected assets*', 'أربع مراحل نحو *أصول محمية جيدًا*'),
            'items' => [
                ['title' => tx('Identify', 'التحديد'), 'text' => tx('List assets, locations and activities, and the values at stake.', 'حصر الأصول والمواقع والأنشطة والقيم المعرّضة للخطر.')],
                ['title' => tx('Assess', 'التقييم'), 'text' => tx('Consider the main risks and any existing protection.', 'دراسة المخاطر الرئيسية ووسائل الحماية القائمة.')],
                ['title' => tx('Arrange', 'الترتيب'), 'text' => tx('Compare insurer options and put the right policy in place.', 'مقارنة خيارات شركات التأمين وإصدار الوثيقة المناسبة.')],
                ['title' => tx('Maintain', 'المتابعة'), 'text' => tx('Update values as the business changes and support claims.', 'تحديث القيم مع تغيّر الأعمال ودعم المطالبات.')],
            ],
        ]),
        B('faq', ['source' => 'auto', 'background' => 'mist', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Property insurance questions', 'أسئلة حول تأمين الممتلكات')]),
        B('related', ['background' => 'white', 'eyebrow' => tx('Explore more', 'اكتشف المزيد'), 'title' => tx('Related services', 'خدمات ذات صلة')]),
        B('cta_band', [
            'layout' => 'image',
            'art' => 'property',
            'eyebrow' => tx('Property insurance', 'تأمين الممتلكات'),
            'title' => tx('Make sure your cover keeps up with *what you own*', 'تأكد من أن تغطيتك تواكب *ما تملكه*'),
            'lead' => tx('We can review your current property policy and highlight possible gaps.', 'يمكننا مراجعة وثيقة تأمين ممتلكاتك الحالية وتوضيح الفجوات المحتملة.'),
            'cta_label' => tx('Request a review', 'اطلب مراجعة'),
            'cta_link' => '/contact#contact-form',
        ]),
    ],
    'faqs' => [
        [tx('What is under-insurance?', 'ما المقصود بنقص قيمة التأمين؟'), tx('It happens when the sum insured is lower than the real value of the property. In that case a claim may not be paid in full, so values should be reviewed regularly.', 'يحدث عندما يكون مبلغ التأمين أقل من القيمة الحقيقية للممتلكات، وفي هذه الحالة قد لا تُدفع المطالبة كاملة، لذا ينبغي مراجعة القيم بانتظام.')],
        [tx('Does property insurance cover lost income?', 'هل يغطي تأمين الممتلكات خسارة الدخل؟'), tx('Loss of income is usually covered under business interruption cover, which may be added to a property policy depending on the insurer and terms.', 'تُغطى خسارة الدخل عادةً من خلال تغطية توقف الأعمال، والتي يمكن إضافتها إلى وثيقة الممتلكات حسب شركة التأمين والشروط.')],
        [tx('Can you insure leased premises?', 'هل يمكن تأمين المنشآت المستأجرة؟'), tx('Yes. Tenants commonly insure their contents, equipment, fit-out and liability. Responsibilities in the lease should be checked when designing cover.', 'نعم. يؤمّن المستأجرون عادةً المحتويات والمعدات والتجهيزات والمسؤولية، ويجب مراجعة المسؤوليات الواردة في عقد الإيجار عند تصميم التغطية.')],
        [tx('Do you arrange home insurance as well as business property?', 'هل ترتّبون تأمين المنازل إلى جانب ممتلكات الشركات؟'), tx('Yes. Property insurance covers homes and personal assets as well as business premises, equipment and stock. Tell us what you would like to protect and we will discuss suitable options.', 'نعم. يشمل تأمين الممتلكات المنازل والأصول الشخصية إلى جانب المنشآت التجارية والمعدات والمخزون. أخبرنا بما تودّ حمايته وسنناقش معك الخيارات المناسبة.')],
        [tx('How often should we review our property policy?', 'كم مرة يجب مراجعة وثيقة الممتلكات؟'), tx('At least at every renewal, and whenever you add locations, buy significant equipment or change your activities.', 'عند كل تجديد على الأقل، وكلما أضفت مواقع جديدة أو اشتريت معدات مهمة أو غيّرت طبيعة نشاطك.')],
    ],
    'seo' => SEO(
        tx('Property Insurance for Homes & Businesses', 'تأمين الممتلكات للمنازل والشركات'),
        tx('Property insurance that safeguards your home and assets from unexpected risks: homes and contents, buildings, equipment, stock and business interruption — arranged with WAFA.', 'تأمين ممتلكات يحمي منزلك وأصولك من المخاطر غير المتوقعة: المنازل ومحتوياتها والمباني والمعدات والمخزون وتوقف الأعمال، مع WAFA.'),
        tx('property insurance', 'تأمين الممتلكات'),
        tx('home insurance, property insurance, commercial property insurance, business interruption insurance', 'تأمين المنازل, تأمين الممتلكات, تأمين الممتلكات التجارية, تأمين توقف الأعمال'),
    ),
];
