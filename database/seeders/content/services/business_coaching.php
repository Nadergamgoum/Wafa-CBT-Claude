<?php

return [
    'category' => 'learning',
    'family' => 'business_coaching',
    'slug' => 'business-coaching',
    'sort' => 2,
    'icon' => 'trending-up',
    'accent' => 'teal',
    'hero_variant' => 'growth',
    'title' => tx('Business Coaching', 'كوتشينغ الأعمال'),
    'summary' => tx(
        'Structured coaching for business owners and managers who want clearer priorities, better decisions and consistent progress towards their goals.',
        'كوتشينغ منظّم لأصحاب الأعمال والمديرين الذين يسعون إلى أولويات أوضح وقرارات أفضل وتقدّم مستمر نحو أهدافهم.'
    ),
    'hero' => [
        'eyebrow' => tx('Learning & Leadership · Business Coaching', 'التعلّم والقيادة · كوتشينغ الأعمال'),
        'title' => tx('Turn ambition into *focused, measurable progress*', 'حوّل الطموح إلى *تقدّم مركّز وقابل للقياس*'),
        'lead' => tx(
            'Business coaching gives you dedicated time, structure and an objective partner to work on your business — not only in it.',
            'يمنحك كوتشينغ الأعمال وقتًا مخصّصًا وإطارًا منظّمًا وشريكًا موضوعيًا للعمل على تطوير عملك، لا مجرد الانشغال بتفاصيله اليومية.'
        ),
        'cta_label' => tx('Book an introductory conversation', 'احجز محادثة تعريفية'),
        'cta_link' => '/contact#contact-form',
        'highlights' => [
            ['icon' => 'target', 'label' => tx('Clear goals', 'أهداف واضحة')],
            ['icon' => 'calendar-check', 'label' => tx('Regular accountability', 'متابعة منتظمة')],
            ['icon' => 'trending-up', 'label' => tx('Sustained growth', 'نمو مستدام')],
        ],
    ],
    'sections' => [
        B('challenges', [
            'layout' => 'tiles',
            'background' => 'white',
            'eyebrow' => tx('Business challenges', 'تحديات الأعمال'),
            'title' => tx('When the business needs more than *hard work*', 'عندما يحتاج العمل إلى أكثر من *الجهد المتواصل*'),
            'items' => [
                ['icon' => 'clock', 'title' => tx('No time to think strategically', 'لا وقت للتفكير الاستراتيجي'), 'text' => tx('Daily operations absorb every hour.', 'تستهلك العمليات اليومية كل الوقت.')],
                ['icon' => 'git-branch', 'title' => tx('Too many priorities', 'أولويات كثيرة'), 'text' => tx('Everything feels urgent, so little moves forward.', 'كل شيء يبدو عاجلًا فيتقدّم القليل.')],
                ['icon' => 'chart-line', 'title' => tx('Growth has stalled', 'تباطؤ النمو'), 'text' => tx('What worked before no longer delivers results.', 'ما نجح سابقًا لم يعد يحقق النتائج.')],
                ['icon' => 'users', 'title' => tx('Team depends on you', 'الفريق يعتمد عليك'), 'text' => tx('Decisions bottleneck at the top.', 'تتكدس القرارات في القمة.')],
            ],
        ]),
        B('focus_grid', [
            'background' => 'mist',
            'eyebrow' => tx('Coaching focus', 'محاور الكوتشينغ'),
            'title' => tx('Where coaching *makes a difference*', 'حيث *يصنع* الكوتشينغ الفرق'),
            'lead' => tx('Each coaching relationship is shaped around your priorities. Common areas of focus include:', 'تتشكل كل علاقة كوتشينغ حول أولوياتك، ومن المحاور الشائعة:'),
            'items' => [
                I('target', tx('Strategy & priorities', 'الاستراتيجية والأولويات'), tx('Clarify direction and what matters most', 'وضوح التوجه وما هو الأهم')),
                I('chart-no-axes-combined', tx('Business performance', 'أداء الأعمال'), tx('Understand the numbers behind results', 'فهم الأرقام وراء النتائج')),
                I('users', tx('Team & delegation', 'الفريق والتفويض'), tx('Build a team that carries more', 'بناء فريق يتحمل مسؤولية أكبر')),
                I('workflow', tx('Systems & processes', 'الأنظمة والعمليات'), tx('Reduce dependence on individuals', 'تقليل الاعتماد على الأفراد')),
                I('compass', tx('Decision-making', 'اتخاذ القرار'), tx('Think through options with clarity', 'دراسة الخيارات بوضوح')),
                I('clock', tx('Time & energy', 'الوقت والطاقة'), tx('Focus effort where it counts', 'تركيز الجهد حيث يكون له أثر')),
            ],
        ]),
        B('accountability', [
            'background' => 'white',
            'eyebrow' => tx('Goals & accountability', 'الأهداف والمتابعة'),
            'title' => tx('Progress comes from *goals plus follow-through*', 'يتحقق التقدّم من *الأهداف مع المتابعة*'),
            'lead' => tx('We agree clear goals at the start and use a regular rhythm of sessions to turn them into action.', 'نتفق على أهداف واضحة في البداية، ونعتمد إيقاعًا منتظمًا من الجلسات لتحويلها إلى خطوات عملية.'),
            'goals_title' => tx('Example coaching goals', 'أمثلة على أهداف الكوتشينغ'),
            'goals' => L(
                ['Define a 12-month growth plan with clear milestones', 'Free up time by delegating key responsibilities', 'Improve visibility of business performance', 'Strengthen the management team’s ownership'],
                ['وضع خطة نمو لاثني عشر شهرًا بمراحل واضحة', 'توفير الوقت من خلال تفويض مسؤوليات رئيسية', 'تحسين وضوح أداء الأعمال', 'تعزيز شعور فريق الإدارة بالمسؤولية']
            ),
            'cycle_title' => tx('The accountability rhythm', 'إيقاع المتابعة'),
            'items' => [
                ['title' => tx('Set', 'التحديد'), 'text' => tx('Agree priorities and actions for the period.', 'الاتفاق على أولويات الفترة وخطواتها.')],
                ['title' => tx('Act', 'التنفيذ'), 'text' => tx('Implement between sessions.', 'التطبيق بين الجلسات.')],
                ['title' => tx('Review', 'المراجعة'), 'text' => tx('Discuss what worked and what did not.', 'مناقشة ما نجح وما لم ينجح.')],
                ['title' => tx('Adjust', 'التعديل'), 'text' => tx('Refine the plan and commit to next steps.', 'تحسين الخطة والالتزام بالخطوات التالية.')],
            ],
        ]),
        B('process', [
            'layout' => 'stairs',
            'background' => 'ivory',
            'eyebrow' => tx('Growth roadmap', 'خارطة النمو'),
            'title' => tx('A coaching journey that *builds momentum*', 'رحلة كوتشينغ *تبني الزخم*'),
            'items' => [
                ['title' => tx('Discovery', 'الاستكشاف'), 'text' => tx('Understand the business, the goals and the obstacles.', 'فهم العمل والأهداف والعقبات.')],
                ['title' => tx('Focus', 'التركيز'), 'text' => tx('Agree the few priorities that will move the business.', 'الاتفاق على الأولويات القليلة التي تدفع العمل للأمام.')],
                ['title' => tx('Action', 'العمل'), 'text' => tx('Regular sessions to plan, act and review.', 'جلسات منتظمة للتخطيط والتنفيذ والمراجعة.')],
                ['title' => tx('Review', 'التقييم'), 'text' => tx('Assess progress against the goals set.', 'تقييم التقدّم مقارنة بالأهداف المحددة.')],
                ['title' => tx('Sustain', 'الاستدامة'), 'text' => tx('Embed habits and systems that keep growth going.', 'ترسيخ العادات والأنظمة التي تحافظ على النمو.')],
            ],
        ]),
        B('related', ['background' => 'white', 'eyebrow' => tx('Works well with', 'يتكامل مع'), 'title' => tx('Related services', 'خدمات ذات صلة')]),
        B('faq', ['source' => 'auto', 'background' => 'mist', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Business coaching questions', 'أسئلة حول كوتشينغ الأعمال')]),
        B('cta_band', [
            'layout' => 'dark',
            'eyebrow' => tx('Business coaching', 'كوتشينغ الأعمال'),
            'title' => tx('Give your business the *focus it deserves*', 'امنح عملك *التركيز الذي يستحقه*'),
            'lead' => tx('Start with an introductory conversation to see whether coaching is the right fit.', 'ابدأ بمحادثة تعريفية لتعرف ما إذا كان الكوتشينغ مناسبًا لك.'),
            'cta_label' => tx('Book a conversation', 'احجز محادثة'),
            'cta_link' => '/contact#contact-form',
        ]),
    ],
    'faqs' => [
        [tx('Who is business coaching for?', 'لمن يُقدَّم كوتشينغ الأعمال؟'), tx('Business owners, founders and managers who are responsible for results and want structured support to set priorities, make decisions and follow through.', 'لأصحاب الأعمال والمؤسسين والمديرين المسؤولين عن النتائج، والذين يرغبون في دعم منظّم لتحديد الأولويات واتخاذ القرارات ومتابعة التنفيذ.')],
        [tx('How is coaching different from consulting?', 'ما الفرق بين الكوتشينغ والاستشارات؟'), tx('A consultant typically provides recommendations and deliverables. A coach helps you think, decide and act — the solutions and ownership stay with you.', 'يقدّم المستشار عادةً توصيات ومخرجات، بينما يساعدك الكوتش على التفكير واتخاذ القرار والتنفيذ، وتبقى الحلول والمسؤولية بين يديك.')],
        [tx('How often are coaching sessions held?', 'كم مرة تُعقد جلسات الكوتشينغ؟'), tx('The rhythm is agreed at the start, based on your goals and availability. Regular, consistent sessions work best.', 'يُتفق على إيقاع الجلسات في البداية بناءً على أهدافك ووقتك، والجلسات المنتظمة والمتسقة هي الأكثر فاعلية.')],
        [tx('Are sessions confidential?', 'هل الجلسات سرية؟'), tx('Yes. Coaching conversations are confidential, and any reporting to sponsors is agreed with you in advance.', 'نعم. محادثات الكوتشينغ سرية، وأي تقارير لجهات راعية يُتفق عليها معك مسبقًا.')],
    ],
    'seo' => SEO(
        tx('Business Coaching for Owners & Managers', 'كوتشينغ الأعمال لأصحاب الأعمال والمديرين'),
        tx('Business coaching that turns ambition into progress: clear goals, regular accountability and a growth roadmap for business owners and managers with WAFA.', 'كوتشينغ أعمال يحوّل الطموح إلى تقدّم: أهداف واضحة ومتابعة منتظمة وخارطة نمو لأصحاب الأعمال والمديرين مع وفاء.'),
        tx('business coaching', 'كوتشينغ الأعمال'),
        tx('business growth coaching, coaching for business owners, management coaching', 'كوتشينغ النمو, كوتشينغ أصحاب الأعمال, كوتشينغ الإدارة'),
    ),
];
