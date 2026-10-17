<?php

return [
    'category' => 'insurance',
    'family' => 'auto',
    'slug' => 'auto-insurance',
    'sort' => 3,
    'icon' => 'car-front',
    'accent' => 'sky',
    'hero_variant' => 'asymmetric',
    'title' => tx('Auto Insurance', 'تأمين السيارات'),
    'summary' => tx(
        'Vehicle and fleet insurance arranged around how your vehicles are actually used — with support when you need to claim.',
        'تأمين المركبات والأساطيل مرتّب وفق طريقة الاستخدام الفعلية لمركباتك، مع دعم عند الحاجة إلى المطالبة.'
    ),
    'hero' => [
        'eyebrow' => tx('Insurance · Vehicles & fleets', 'التأمين · المركبات والأساطيل'),
        'title' => tx('Keep your vehicles — and your business — *moving*', 'حافظ على *استمرار* مركباتك وأعمالك'),
        'lead' => tx(
            'From a single company car to a full fleet, we help you understand the risks, choose the right level of cover and get support when something goes wrong.',
            'من سيارة واحدة للشركة إلى أسطول كامل، نساعدك على فهم المخاطر واختيار مستوى التغطية المناسب والحصول على الدعم عند وقوع أي طارئ.'
        ),
        'cta_label' => tx('Get help with auto cover', 'احصل على المساعدة في تأمين المركبات'),
        'cta_link' => '/contact#contact-form',
        'highlights' => [
            ['icon' => 'car', 'label' => tx('Company cars & fleets', 'سيارات الشركات والأساطيل')],
            ['icon' => 'scale', 'label' => tx('Options compared clearly', 'مقارنة واضحة للخيارات')],
            ['icon' => 'life-buoy', 'label' => tx('Claims guidance', 'إرشاد في المطالبات')],
        ],
    ],
    'sections' => [
        B('risk_band', [
            'background' => 'dark',
            'eyebrow' => tx('Common risks', 'المخاطر الشائعة'),
            'title' => tx('What can happen *on the road*', 'ما الذي قد يحدث *على الطريق*'),
            'lead' => tx('Understanding typical risks is the first step to choosing the right cover.', 'فهم المخاطر المعتادة هو الخطوة الأولى لاختيار التغطية المناسبة.'),
            'items' => [
                I('car-front', tx('Collisions & accidents', 'التصادمات والحوادث'), tx('Damage to your vehicle and to others', 'أضرار لمركبتك ولمركبات الآخرين')),
                I('users', tx('Third-party liability', 'المسؤولية تجاه الغير'), tx('Injury or damage caused to others', 'إصابات أو أضرار تلحق بالآخرين')),
                I('key-round', tx('Theft', 'السرقة'), tx('Loss of the vehicle or its parts', 'فقدان المركبة أو أجزاء منها')),
                I('cloud-lightning', tx('Natural events', 'الظواهر الطبيعية'), tx('Floods, storms and similar perils', 'الفيضانات والعواصف ونحوها')),
                I('flame', tx('Fire', 'الحريق'), tx('Damage caused by fire', 'الأضرار الناتجة عن الحريق')),
                I('wrench', tx('Downtime', 'تعطّل المركبة'), tx('Time off the road after an incident', 'الوقت الذي تتوقف فيه المركبة بعد الحادث')),
            ],
        ]),
        B('coverage', [
            'layout' => 'compare',
            'background' => 'white',
            'eyebrow' => tx('Protection areas', 'مجالات الحماية'),
            'title' => tx('Choose the level of cover that *fits your use*', 'اختر مستوى التغطية *الذي يناسب استخدامك*'),
            'lead' => tx('We explain the main types of motor cover in plain language so you can compare them properly.', 'نشرح الأنواع الرئيسية لتأمين المركبات بلغة واضحة لتتمكن من المقارنة بينها بشكل سليم.'),
            'note' => tx('Cover types, add-ons and mandatory requirements vary by insurer and by applicable regulations.', 'تختلف أنواع التغطية والإضافات والمتطلبات الإلزامية باختلاف شركة التأمين والأنظمة المعمول بها.'),
            'items' => [
                ['icon' => 'shield-check', 'title' => tx('Comprehensive cover', 'التأمين الشامل'), 'text' => tx('Broad protection for your own vehicle as well as liability towards others.', 'حماية واسعة لمركبتك إضافة إلى المسؤولية تجاه الغير.'), 'points' => L(['Own damage', 'Third-party liability', 'Optional add-ons where offered'], ['أضرار مركبتك', 'المسؤولية تجاه الغير', 'إضافات اختيارية متى توفرت'])],
                ['icon' => 'users', 'title' => tx('Third-party liability', 'التأمين ضد الغير'), 'text' => tx('Covers your liability for injury or damage caused to other people and their property.', 'يغطي مسؤوليتك عن الإصابات أو الأضرار التي تلحق بالآخرين وممتلكاتهم.'), 'points' => L(['Liability to others', 'Often a legal minimum', 'Lower premium, narrower cover'], ['المسؤولية تجاه الآخرين', 'غالبًا ما يكون حدًا أدنى إلزاميًا', 'قسط أقل وتغطية أضيق'])],
                ['icon' => 'truck', 'title' => tx('Fleet programs', 'برامج الأساطيل'), 'text' => tx('One coordinated program for multiple company vehicles, with consistent terms and simpler administration.', 'برنامج واحد منسّق لعدة مركبات للشركة، بشروط متسقة وإدارة أبسط.'), 'points' => L(['Single renewal date', 'Vehicle additions and removals', 'Consolidated reporting'], ['موعد تجديد موحد', 'إضافة المركبات وإزالتها', 'تقارير موحدة'])],
            ],
        ]),
        B('process', [
            'layout' => 'chevrons',
            'background' => 'mist',
            'eyebrow' => tx('How WAFA supports selection', 'كيف تدعمك وفاء في الاختيار'),
            'title' => tx('From vehicle list to *claims support*', 'من قائمة المركبات إلى *دعم المطالبات*'),
            'items' => [
                ['title' => tx('Review vehicles & use', 'مراجعة المركبات والاستخدام'), 'text' => tx('Vehicle types, drivers and how they are used.', 'أنواع المركبات والسائقون وطريقة الاستخدام.')],
                ['title' => tx('Define the cover', 'تحديد التغطية'), 'text' => tx('The right level of protection and any add-ons.', 'مستوى الحماية المناسب وأي إضافات.')],
                ['title' => tx('Compare options', 'مقارنة الخيارات'), 'text' => tx('Insurer proposals compared clearly.', 'مقارنة واضحة لعروض شركات التأمين.')],
                ['title' => tx('Arrange the policy', 'ترتيب الوثيقة'), 'text' => tx('Documents, policy issue and fleet updates.', 'المستندات وإصدار الوثيقة وتحديثات الأسطول.')],
                ['title' => tx('Claims support', 'دعم المطالبات'), 'text' => tx('Guidance and follow-up after an incident.', 'إرشاد ومتابعة بعد وقوع الحادث.')],
            ],
        ]),
        B('faq', ['source' => 'auto', 'background' => 'white', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Auto insurance questions', 'أسئلة حول تأمين المركبات')]),
        B('related', ['background' => 'mist', 'eyebrow' => tx('Explore more', 'اكتشف المزيد'), 'title' => tx('Related services', 'خدمات ذات صلة')]),
        B('cta_band', [
            'layout' => 'dark',
            'eyebrow' => tx('Auto & fleet insurance', 'تأمين المركبات والأساطيل'),
            'title' => tx('Ready to review your *vehicle cover*?', 'هل أنت مستعد لمراجعة *تأمين مركباتك*؟'),
            'lead' => tx('Send us your vehicle list or current policy and we will help you understand your options.', 'أرسل إلينا قائمة مركباتك أو وثيقتك الحالية، وسنساعدك على فهم الخيارات المتاحة.'),
            'cta_label' => tx('Request a consultation', 'اطلب استشارة'),
            'cta_link' => '/contact#contact-form',
            'cta2_label' => tx('Chat on WhatsApp', 'تواصل عبر واتساب'),
            'cta2_link' => '@whatsapp',
        ]),
    ],
    'faqs' => [
        [tx('What is the difference between comprehensive and third-party cover?', 'ما الفرق بين التأمين الشامل والتأمين ضد الغير؟'), tx('Third-party cover protects you against liability for damage or injury to others. Comprehensive cover adds protection for damage to your own vehicle, subject to the policy terms.', 'يحميك التأمين ضد الغير من المسؤولية عن الأضرار أو الإصابات التي تلحق بالآخرين، بينما يضيف التأمين الشامل حماية للأضرار التي تلحق بمركبتك وفقًا لشروط الوثيقة.')],
        [tx('Can you arrange insurance for a company fleet?', 'هل يمكنكم ترتيب تأمين لأسطول مركبات الشركة؟'), tx('Yes. Fleet programs bring multiple vehicles under coordinated terms, which can simplify administration, additions and renewals.', 'نعم. تجمع برامج الأساطيل عدة مركبات تحت شروط منسّقة، ما يسهّل الإدارة والإضافات والتجديد.')],
        [tx('What should I do after an accident?', 'ماذا أفعل بعد وقوع حادث؟'), tx('Follow the official reporting requirements first, then contact us. We will explain the documents needed and help you follow up the claim with the insurer.', 'اتبع أولًا متطلبات الإبلاغ الرسمية، ثم تواصل معنا وسنوضح لك المستندات المطلوبة ونساعدك في متابعة المطالبة مع شركة التأمين.')],
        [tx('Do you only work with companies?', 'هل تعملون مع الشركات فقط؟'), tx('Our focus is on organizations, but please contact us to discuss your specific situation.', 'ينصبّ تركيزنا على المؤسسات، لكن يمكنك التواصل معنا لمناقشة وضعك الخاص.')],
    ],
    'seo' => SEO(
        tx('Auto & Fleet Insurance for Companies', 'تأمين المركبات والأساطيل للشركات'),
        tx('Auto insurance and fleet programs for companies: understand vehicle risks, compare comprehensive and third-party cover, and get claims guidance with WAFA.', 'تأمين المركبات وبرامج الأساطيل للشركات: افهم مخاطر المركبات وقارن بين التأمين الشامل والتأمين ضد الغير واحصل على إرشاد في المطالبات مع وفاء.'),
        tx('auto insurance', 'تأمين السيارات'),
        tx('fleet insurance, company car insurance, comprehensive motor insurance', 'تأمين الأساطيل, تأمين سيارات الشركات, التأمين الشامل للمركبات'),
    ),
];
