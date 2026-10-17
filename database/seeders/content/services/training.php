<?php

return [
    'category' => 'learning',
    'family' => 'training',
    'slug' => 'training',
    'sort' => 1,
    'icon' => 'graduation-cap',
    'accent' => 'amber',
    'hero_variant' => 'learning',
    'title' => tx('Training & Professional Development', 'التدريب والتطوير المهني'),
    'nav_title' => tx('Training', 'التدريب'),
    'summary' => tx(
        'Practical, needs-based training programs that build skills your teams can apply at work — delivered in person, online or in-house.',
        'برامج تدريبية عملية مبنية على الاحتياجات، تبني مهارات يطبقها فريقك في العمل، وتُقدَّم حضوريًا أو عبر الإنترنت أو داخل المؤسسة.'
    ),
    'hero' => [
        'eyebrow' => tx('Learning & Leadership · Training', 'التعلّم والقيادة · التدريب'),
        'title' => tx('Learning that changes *how work gets done*', 'تعلّم يغيّر *طريقة إنجاز العمل*'),
        'lead' => tx(
            'We design and deliver training around real workplace challenges, so participants leave with skills, tools and confidence they can use the next day.',
            'نصمّم البرامج التدريبية ونقدّمها حول تحديات العمل الحقيقية، ليغادر المشاركون بمهارات وأدوات وثقة يستخدمونها في اليوم التالي.'
        ),
        'cta_label' => tx('Browse programs', 'تصفّح البرامج'),
        'cta_link' => '/training-programs',
        'cta2_label' => tx('Request in-house training', 'اطلب تدريبًا داخل مؤسستك'),
        'cta2_link' => '/contact#contact-form',
        'highlights' => [
            ['icon' => 'presentation', 'label' => tx('In person', 'حضوري')],
            ['icon' => 'monitor', 'label' => tx('Live online', 'مباشر عبر الإنترنت')],
            ['icon' => 'building-2', 'label' => tx('In-house', 'داخل المؤسسة')],
            ['icon' => 'layers', 'label' => tx('Blended', 'مدمج')],
        ],
    ],
    'sections' => [
        B('pillars', [
            'layout' => 'lines',
            'background' => 'white',
            'eyebrow' => tx('Our training approach', 'منهجيتنا في التدريب'),
            'title' => tx('Four principles behind *every program*', 'أربعة مبادئ وراء *كل برنامج*'),
            'items' => [
                I('scan-search', tx('Needs-based', 'مبني على الاحتياجات'), tx('Programs start from a clear understanding of the skills your teams need.', 'تنطلق البرامج من فهم واضح للمهارات التي يحتاجها فريقك.')),
                I('wrench', tx('Practical', 'عملي'), tx('Real cases, tools and exercises from the participants’ own context.', 'حالات وأدوات وتمارين واقعية من بيئة عمل المشاركين.')),
                I('messages-square', tx('Interactive', 'تفاعلي'), tx('Discussion, practice and feedback rather than one-way lectures.', 'حوار وممارسة وتغذية راجعة بدلًا من المحاضرات أحادية الاتجاه.')),
                I('gauge', tx('Measurable', 'قابل للقياس'), tx('Clear learning objectives and follow-up to support application.', 'أهداف تعلّم واضحة ومتابعة تدعم التطبيق.')),
            ],
        ]),
        B('program_categories', [
            'background' => 'mist',
            'eyebrow' => tx('Program categories', 'تصنيفات البرامج'),
            'title' => tx('Explore by *learning area*', 'استكشف حسب *مجال التعلّم*'),
            'cta_label' => tx('View all programs', 'عرض جميع البرامج'),
            'cta_link' => '/training-programs',
        ]),
        B('outcomes', [
            'background' => 'ivory',
            'eyebrow' => tx('Learning outcomes', 'نتائج التعلّم'),
            'title' => tx('What participants *take back to work*', 'ما يعود به المشاركون *إلى العمل*'),
            'items' => [
                ['title' => tx('Practical skills', 'مهارات عملية'), 'text' => tx('Techniques they can apply immediately.', 'أساليب يمكن تطبيقها فورًا.')],
                ['title' => tx('Shared language', 'لغة مشتركة'), 'text' => tx('Common frameworks that help teams work together.', 'أطر مشتركة تساعد الفرق على العمل معًا.')],
                ['title' => tx('Confidence', 'الثقة'), 'text' => tx('Practice in a safe environment before real situations.', 'ممارسة في بيئة آمنة قبل المواقف الحقيقية.')],
                ['title' => tx('Action plans', 'خطط عمل'), 'text' => tx('Personal commitments to apply what they learned.', 'التزامات شخصية لتطبيق ما تعلموه.')],
            ],
        ]),
        B('formats', [
            'background' => 'white',
            'eyebrow' => tx('Delivery formats', 'أساليب التقديم'),
            'title' => tx('Flexible formats for *different teams*', 'أساليب مرنة *لفرق مختلفة*'),
            'items' => [
                I('presentation', tx('In person', 'حضوري'), tx('Workshops that maximize interaction and practice.', 'ورش عمل تعزّز التفاعل والممارسة.')),
                I('monitor', tx('Live online', 'مباشر عبر الإنترنت'), tx('Interactive virtual sessions for distributed teams.', 'جلسات افتراضية تفاعلية للفرق الموزعة.')),
                I('building-2', tx('In-house', 'داخل المؤسسة'), tx('Programs tailored and delivered for your organization only.', 'برامج مخصّصة تُقدَّم لمؤسستك وحدها.')),
                I('layers', tx('Blended', 'مدمج'), tx('A mix of sessions, practice and follow-up over time.', 'مزيج من الجلسات والممارسة والمتابعة على مدى زمني.')),
            ],
        ]),
        B('programs', [
            'background' => 'mist',
            'eyebrow' => tx('Featured programs', 'برامج مميزة'),
            'title' => tx('Selected *training programs*', 'برامج تدريبية *مختارة*'),
            'limit' => 6,
            'cta_label' => tx('View all programs', 'عرض جميع البرامج'),
            'cta_link' => '/training-programs',
        ]),
        B('process', [
            'layout' => 'cycle',
            'background' => 'white',
            'eyebrow' => tx('Training journey', 'رحلة التدريب'),
            'title' => tx('A learning cycle, *not a single event*', 'دورة تعلّم *لا حدث منفرد*'),
            'center_label' => tx('Learning that lasts', 'تعلّم يدوم أثره'),
            'items' => [
                ['icon' => 'scan-search', 'title' => tx('Needs analysis', 'تحليل الاحتياجات'), 'text' => tx('Identify skills gaps and priorities with you.', 'تحديد فجوات المهارات والأولويات بالتعاون معك.')],
                ['icon' => 'notebook-pen', 'title' => tx('Program design', 'تصميم البرنامج'), 'text' => tx('Objectives, content and activities tailored to your context.', 'أهداف ومحتوى وأنشطة مصمّمة لواقعك.')],
                ['icon' => 'presentation', 'title' => tx('Delivery', 'التقديم'), 'text' => tx('Engaging sessions led by experienced facilitators.', 'جلسات تفاعلية يقدّمها مدرّبون متمرسون.')],
                ['icon' => 'clipboard-check', 'title' => tx('Evaluation', 'التقييم'), 'text' => tx('Participant feedback and learning checks.', 'ملاحظات المشاركين واختبارات التعلّم.')],
                ['icon' => 'refresh-cw', 'title' => tx('Reinforcement', 'الترسيخ'), 'text' => tx('Follow-up that supports application at work.', 'متابعة تدعم التطبيق في العمل.')],
            ],
        ]),
        B('faq', ['source' => 'auto', 'background' => 'mist', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Training questions', 'أسئلة حول التدريب')]),
        B('cta_band', [
            'layout' => 'image',
            'art' => 'training-card',
            'eyebrow' => tx('In-house training', 'التدريب داخل المؤسسة'),
            'title' => tx('Build the skills your teams *need next*', 'ابنِ المهارات التي *يحتاجها* فريقك في المرحلة القادمة'),
            'lead' => tx('Tell us about your team and objectives and we will propose a suitable program.', 'حدّثنا عن فريقك وأهدافك، وسنقترح برنامجًا مناسبًا.'),
            'cta_label' => tx('Request a training proposal', 'اطلب عرضًا تدريبيًا'),
            'cta_link' => '/contact#contact-form',
            'cta2_label' => tx('Browse programs', 'تصفّح البرامج'),
            'cta2_link' => '/training-programs',
        ]),
    ],
    'faqs' => [
        [tx('Can programs be customized for our organization?', 'هل يمكن تخصيص البرامج لمؤسستنا؟'), tx('Yes. In-house programs are tailored to your objectives, industry examples and the level of your participants.', 'نعم. تُصمّم البرامج الداخلية وفق أهدافك وأمثلة من قطاعك ومستوى المشاركين.')],
        [tx('Do you offer training in Arabic and English?', 'هل تقدمون التدريب باللغتين العربية والإنجليزية؟'), tx('Please let us know your preferred language when you contact us and we will confirm the options available for your program.', 'يُرجى إخبارنا باللغة المفضلة عند التواصل معنا، وسنؤكد لك الخيارات المتاحة لبرنامجك.')],
        [tx('How do you measure the impact of training?', 'كيف تقيسون أثر التدريب؟'), tx('Through clear learning objectives, participant feedback, learning checks and follow-up activities agreed with you.', 'من خلال أهداف تعلّم واضحة وملاحظات المشاركين واختبارات التعلّم وأنشطة متابعة نتفق عليها معك.')],
        [tx('What is the minimum group size for in-house training?', 'ما الحد الأدنى لعدد المشاركين في التدريب الداخلي؟'), tx('It depends on the program format. Contact us with your requirements and we will advise on the best approach.', 'يعتمد ذلك على أسلوب البرنامج. تواصل معنا بمتطلباتك وسننصحك بالأسلوب الأنسب.')],
    ],
    'seo' => SEO(
        tx('Corporate Training & Professional Development Programs', 'برامج التدريب المؤسسي والتطوير المهني'),
        tx('Practical corporate training programs in leadership, HR, communication and professional skills — delivered in person, online or in-house by WAFA.', 'برامج تدريب مؤسسي عملية في القيادة والموارد البشرية والتواصل والمهارات المهنية، تُقدَّم حضوريًا أو عبر الإنترنت أو داخل المؤسسة من وفاء.'),
        tx('corporate training', 'التدريب المؤسسي'),
        tx('professional development, in-house training, leadership training, soft skills training', 'التطوير المهني, التدريب الداخلي, التدريب القيادي, تدريب المهارات الشخصية'),
    ),
];
