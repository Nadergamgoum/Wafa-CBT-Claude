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
        'Developing skills that drive growth: impactful training programs that inspire change, build confidence and strengthen team performance — as customized in-house or online workshops.',
        'تطوير مهارات تدفع النمو: برامج تدريبية مؤثرة تُلهم التغيير وتبني الثقة وتعزّز أداء الفرق، وتُقدَّم كورش عمل مخصّصة داخل المؤسسة أو عبر الإنترنت.'
    ),
    'hero' => [
        'eyebrow' => tx('Learning & Leadership · Training', 'التعلّم والقيادة · التدريب'),
        'title' => tx('Developing skills that *drive growth*', 'تطوير مهارات *تدفع النمو*'),
        'lead' => tx(
            'We design impactful training programs that inspire change, build confidence and strengthen team performance.',
            'نصمّم برامج تدريبية مؤثرة تُلهم التغيير وتبني الثقة وتعزّز أداء الفرق.'
        ),
        'cta_label' => tx('Request a training proposal', 'اطلب عرضًا تدريبيًا'),
        'cta_link' => '/contact#contact-form',
        'cta2_label' => tx('Explore program areas', 'استكشف مجالات البرامج'),
        'cta2_link' => '/training-programs',
        'highlights' => [
            ['icon' => 'building-2', 'label' => tx('Customized in-house workshops', 'ورش عمل مخصّصة داخل المؤسسة')],
            ['icon' => 'monitor', 'label' => tx('Online workshops', 'ورش عمل عبر الإنترنت')],
            ['icon' => 'users', 'label' => tx('Leadership & team building', 'القيادة وبناء الفرق')],
        ],
    ],
    'sections' => [
        B('pillars', [
            'layout' => 'lines',
            'background' => 'white',
            'eyebrow' => tx('Our training approach', 'منهجيتنا في التدريب'),
            'title' => tx('The principles behind *every program*', 'المبادئ التي يقوم عليها *كل برنامج*'),
            'items' => [
                I('scan-search', tx('Needs-based', 'مبني على الاحتياجات'), tx('Programs start from a clear understanding of the skills your teams need.', 'تنطلق البرامج من فهم واضح للمهارات التي يحتاجها فريقك.')),
                I('wrench', tx('Practical', 'عملي'), tx('Real cases, tools and exercises from the participants’ own context.', 'حالات وأدوات وتمارين واقعية من بيئة عمل المشاركين.')),
                I('messages-square', tx('Interactive', 'تفاعلي'), tx('Discussion, practice and feedback rather than one-way lectures.', 'حوار وممارسة وتغذية راجعة بدلًا من المحاضرات أحادية الاتجاه.')),
                I('refresh-cw', tx('Followed up', 'متابعة بعد التدريب'), tx('Clear learning objectives and follow-up to support application at work.', 'أهداف تعلّم واضحة ومتابعة تدعم التطبيق في العمل.')),
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
                ['title' => tx('Change', 'التغيير'), 'text' => tx('Programs designed to inspire change in how people work.', 'برامج مصمّمة لإلهام التغيير في طريقة العمل.')],
                ['title' => tx('Confidence', 'الثقة'), 'text' => tx('Practice in a safe environment before real situations.', 'ممارسة في بيئة آمنة قبل المواقف الحقيقية.')],
                ['title' => tx('Team performance', 'أداء الفريق'), 'text' => tx('Shared skills and language that strengthen how teams perform.', 'مهارات ولغة مشتركة تعزّز أداء الفرق.')],
                ['title' => tx('Practical skills', 'مهارات عملية'), 'text' => tx('Techniques participants can apply at work.', 'أساليب يمكن للمشاركين تطبيقها في العمل.')],
            ],
        ]),
        B('formats', [
            'background' => 'white',
            'eyebrow' => tx('Delivery formats', 'أساليب التقديم'),
            'title' => tx('Flexible formats for *different teams*', 'أساليب مرنة *لفرق مختلفة*'),
            'items' => [
                I('building-2', tx('Customized in-house workshops', 'ورش عمل مخصّصة داخل المؤسسة'), tx('Workshops tailored to your objectives and delivered for your organization.', 'ورش عمل مصمّمة وفق أهدافك وتُقدَّم لمؤسستك.')),
                I('monitor', tx('Online workshops', 'ورش عمل عبر الإنترنت'), tx('Interactive online sessions for teams wherever they work.', 'جلسات تفاعلية عبر الإنترنت للفرق أينما كانت.')),
            ],
        ]),
        B('programs', [
            'background' => 'mist',
            'eyebrow' => tx('Program areas', 'مجالات البرامج'),
            'title' => tx('Our *training program* areas', 'مجالات *برامجنا التدريبية*'),
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
                ['icon' => 'presentation', 'title' => tx('Delivery', 'التقديم'), 'text' => tx('Interactive sessions focused on discussion and practice.', 'جلسات تفاعلية تركّز على الحوار والممارسة.')],
                ['icon' => 'clipboard-check', 'title' => tx('Evaluation', 'التقييم'), 'text' => tx('Participant feedback and learning checks.', 'ملاحظات المشاركين واختبارات التعلّم.')],
                ['icon' => 'refresh-cw', 'title' => tx('Reinforcement', 'الترسيخ'), 'text' => tx('Follow-up that supports application at work.', 'متابعة تدعم التطبيق في العمل.')],
            ],
        ]),
        B('engagements', [
            'background' => 'ivory',
            'eyebrow' => tx('Corporate engagements', 'فعاليات الشركات'),
            'title' => tx('Team engagement *in practice*', 'التفاعل المؤسسي *على أرض الواقع*'),
            'lead' => tx('Interactive corporate sessions that strengthen participation, communication and trust within teams.', 'جلسات مؤسسية تفاعلية تعزّز المشاركة والتواصل والثقة داخل الفرق.'),
            'limit' => 3,
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
        tx('Corporate training by WAFA: strategic human resources management, leadership and team building, and soft skills — as customized in-house or online workshops.', 'التدريب المؤسسي من WAFA: الإدارة الاستراتيجية للموارد البشرية، والقيادة وبناء الفرق، والمهارات الشخصية، كورش عمل مخصّصة داخل المؤسسة أو عبر الإنترنت.'),
        tx('corporate training', 'التدريب المؤسسي'),
        tx('professional development, in-house training, leadership training, soft skills training', 'التطوير المهني, التدريب الداخلي, التدريب القيادي, تدريب المهارات الشخصية'),
    ),
];
