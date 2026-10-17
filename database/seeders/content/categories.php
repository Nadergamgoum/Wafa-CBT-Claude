<?php

return [
    [
        'key' => 'insurance', 'slug' => 'insurance', 'sort' => 1,
        'title' => tx('Insurance Solutions', 'الحلول التأمينية'),
        'nav_title' => tx('Insurance', 'التأمين'),
        'summary' => tx(
            'Corporate medical insurance as our core, complemented by life, auto and property insurance — structured, compared and supported by WAFA as your insurance broker.',
            'التأمين الطبي للشركات في صميم عملنا، تكمله حلول التأمين على الحياة والمركبات والممتلكات، مع هيكلة ومقارنة ودعم من وفاء بصفتها وسيط التأمين الخاص بك.'
        ),
        'hero' => [
            'eyebrow' => tx('Insurance & brokerage', 'التأمين والوساطة التأمينية'),
            'title' => tx('Insurance built around *your people and assets*', 'تأمين مصمّم حول *موظفيك وأصولك*'),
            'lead' => tx('We help organizations choose, place and manage insurance with clarity — starting with the medical insurance that matters most to employees.', 'نساعد المؤسسات على اختيار التأمين وترتيبه وإدارته بوضوح، بدءًا بالتأمين الطبي الذي يهمّ الموظفين أكثر من غيره.'),
        ],
        'seo' => SEO(
            tx('Insurance Solutions & Brokerage for Companies', 'حلول التأمين والوساطة التأمينية للشركات'),
            tx('Corporate medical insurance, life, auto and property insurance for companies. WAFA structures, compares and manages your insurance programs.', 'التأمين الطبي للشركات والتأمين على الحياة والمركبات والممتلكات. تهيكل وفاء برامجك التأمينية وتقارنها وتديرها.'),
            tx('insurance brokerage', 'الوساطة التأمينية'),
        ),
        'sections' => [
            B('process', [
                'layout' => 'timeline', 'background' => 'mist',
                'eyebrow' => tx('How we work', 'كيف نعمل'),
                'title' => tx('One approach across *every insurance line*', 'منهجية واحدة في *جميع أنواع التأمين*'),
                'items' => [
                    ['title' => tx('Understand', 'الفهم'), 'text' => tx('Your needs, risks and priorities.', 'احتياجاتك ومخاطرك وأولوياتك.')],
                    ['title' => tx('Compare', 'المقارنة'), 'text' => tx('Insurer options side by side.', 'خيارات شركات التأمين جنبًا إلى جنب.')],
                    ['title' => tx('Arrange', 'الترتيب'), 'text' => tx('The right policy, properly documented.', 'الوثيقة المناسبة موثقة بشكل سليم.')],
                    ['title' => tx('Support', 'الدعم'), 'text' => tx('Help during the year and at claims.', 'مساعدة خلال العام وعند المطالبات.')],
                    ['title' => tx('Renew', 'التجديد'), 'text' => tx('Review and improve at every renewal.', 'المراجعة والتحسين عند كل تجديد.')],
                ],
            ]),
            B('faq', ['source' => 'auto', 'background' => 'white', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Insurance questions', 'أسئلة حول التأمين')]),
            B('cta_band', ['layout' => 'image', 'art' => 'cta', 'eyebrow' => tx('Insurance review', 'مراجعة التأمين'), 'title' => tx('Not sure where to start? *Ask us.*', 'لا تعرف من أين تبدأ؟ *اسألنا.*'), 'lead' => tx('We will help you see your current cover clearly and identify the next step.', 'سنساعدك على رؤية تغطيتك الحالية بوضوح وتحديد الخطوة التالية.'), 'cta_label' => tx('Talk to our experts', 'تحدّث إلى خبرائنا'), 'cta_link' => '/contact#contact-form']),
        ],
    ],
    [
        'key' => 'people', 'slug' => 'people-organization', 'sort' => 2,
        'title' => tx('People & Organization', 'الأفراد والمؤسسة'),
        'summary' => tx(
            'HR consulting and organizational development that give your organization clear structures, fair systems and the capability to grow.',
            'استشارات الموارد البشرية والتطوير المؤسسي التي تمنح مؤسستك هياكل واضحة وأنظمة عادلة وقدرة على النمو.'
        ),
        'hero' => [
            'eyebrow' => tx('People & Organization', 'الأفراد والمؤسسة'),
            'title' => tx('Strong organizations are built *by design*', 'المؤسسات القوية تُبنى *بتصميم مدروس*'),
            'lead' => tx('From HR policies and job descriptions to full organizational transformation, we help you build the foundations your people need to perform.', 'من سياسات الموارد البشرية والأوصاف الوظيفية إلى التحوّل المؤسسي الشامل، نساعدك على بناء الأسس التي يحتاجها موظفوك للأداء المتميز.'),
        ],
        'seo' => SEO(
            tx('People & Organization: HR Consulting and Organizational Development', 'الأفراد والمؤسسة: استشارات الموارد البشرية والتطوير المؤسسي'),
            tx('HR consulting and organizational development services: policies, structures, performance, transformation and capability building with WAFA.', 'خدمات استشارات الموارد البشرية والتطوير المؤسسي: السياسات والهياكل والأداء والتحوّل وبناء القدرات مع وفاء.'),
        ),
        'sections' => [
            B('pillars', [
                'layout' => 'numbers', 'background' => 'ivory',
                'eyebrow' => tx('What guides our work', 'ما يوجّه عملنا'),
                'title' => tx('Practical, people-centred *and tailored*', 'عملي ومتمحور حول الأفراد *ومخصّص*'),
                'items' => [
                    I(null, tx('Start with reality', 'ننطلق من الواقع'), tx('We base recommendations on how your organization actually works.', 'نبني توصياتنا على طريقة العمل الفعلية في مؤسستك.')),
                    I(null, tx('Design for use', 'نصمّم للتطبيق'), tx('Frameworks managers can apply, not documents that sit on a shelf.', 'أطر يطبقها المديرون، لا مستندات تبقى على الرف.')),
                    I(null, tx('Involve people', 'نُشرك الأفراد'), tx('Change is designed with your team, not imposed on it.', 'يُصمّم التغيير بالتعاون مع فريقك لا بفرضه عليه.')),
                ],
            ]),
            B('faq', ['source' => 'auto', 'background' => 'white', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('People & organization questions', 'أسئلة حول الأفراد والمؤسسة')]),
            B('cta_band', ['layout' => 'dark', 'eyebrow' => tx('People & organization', 'الأفراد والمؤسسة'), 'title' => tx('Let’s talk about your *organization*', 'لنتحدث عن *مؤسستك*'), 'cta_label' => tx('Request a consultation', 'اطلب استشارة'), 'cta_link' => '/contact#contact-form']),
        ],
    ],
    [
        'key' => 'learning', 'slug' => 'learning-leadership', 'sort' => 3,
        'title' => tx('Learning & Leadership', 'التعلّم والقيادة'),
        'summary' => tx(
            'Training programs, business coaching and executive coaching that develop the skills and leadership your organization relies on.',
            'برامج تدريبية وكوتشينغ أعمال وكوتشينغ تنفيذي تطوّر المهارات والقيادة التي تعتمد عليها مؤسستك.'
        ),
        'hero' => [
            'eyebrow' => tx('Learning & Leadership', 'التعلّم والقيادة'),
            'title' => tx('Develop the people who *drive your results*', 'طوّر الأفراد الذين *يصنعون نتائجك*'),
            'lead' => tx('Practical training for teams, focused coaching for business owners and confidential coaching for senior leaders.', 'تدريب عملي للفرق، وكوتشينغ مركّز لأصحاب الأعمال، وكوتشينغ سري للقادة التنفيذيين.'),
        ],
        'seo' => SEO(
            tx('Learning & Leadership: Training, Business & Executive Coaching', 'التعلّم والقيادة: التدريب وكوتشينغ الأعمال والكوتشينغ التنفيذي'),
            tx('Corporate training programs, business coaching and executive coaching to develop skills and leadership across your organization with WAFA.', 'برامج تدريب مؤسسي وكوتشينغ أعمال وكوتشينغ تنفيذي لتطوير المهارات والقيادة في مؤسستك مع وفاء.'),
        ),
        'sections' => [
            B('programs', ['background' => 'mist', 'eyebrow' => tx('Training programs', 'البرامج التدريبية'), 'title' => tx('Selected *programs*', 'برامج *مختارة*'), 'limit' => 6]),
            B('faq', ['source' => 'auto', 'background' => 'white', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Learning & leadership questions', 'أسئلة حول التعلّم والقيادة')]),
            B('cta_band', ['layout' => 'soft', 'eyebrow' => tx('Learning & leadership', 'التعلّم والقيادة'), 'title' => tx('Let’s plan your next *development step*', 'لنخطط معًا *خطوتك التطويرية* القادمة'), 'cta_label' => tx('Talk to our team', 'تحدّث إلى فريقنا'), 'cta_link' => '/contact#contact-form']),
        ],
    ],
];
