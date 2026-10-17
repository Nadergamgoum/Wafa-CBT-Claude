<?php

return [
    'category' => 'people',
    'family' => 'hr',
    'slug' => 'hr-consulting',
    'sort' => 1,
    'icon' => 'users-round',
    'accent' => 'navy',
    'hero_variant' => 'diagram',
    'title' => tx('HR Consulting', 'الاستشارات في الموارد البشرية'),
    'summary' => tx(
        'Practical HR frameworks — policies, structures, roles, performance and rewards — that help your people strategy work in day-to-day reality.',
        'أطر عملية للموارد البشرية تشمل السياسات والهياكل والأدوار والأداء والمكافآت، لتنجح استراتيجيتك في الواقع اليومي.'
    ),
    'hero' => [
        'eyebrow' => tx('People & Organization · HR Consulting', 'الأفراد والمؤسسة · الاستشارات في الموارد البشرية'),
        'title' => tx('HR foundations that let your *people strategy* work', 'أسس موارد بشرية تُنجح *استراتيجيتك للأفراد*'),
        'lead' => tx(
            'We help organizations put clear, fair and workable HR systems in place — designed around their size, culture and ambitions.',
            'نساعد المؤسسات على بناء أنظمة موارد بشرية واضحة وعادلة وقابلة للتطبيق، مصمّمة وفق حجمها وثقافتها وطموحاتها.'
        ),
        'cta_label' => tx('Discuss your HR priorities', 'ناقش أولوياتك في الموارد البشرية'),
        'cta_link' => '/contact#contact-form',
        'cta2_label' => tx('See our framework', 'تعرّف على إطار عملنا'),
        'cta2_link' => '#framework-1',
        'highlights' => [
            ['icon' => 'users', 'label' => tx('People', 'الأفراد')],
            ['icon' => 'workflow', 'label' => tx('Process', 'العمليات')],
            ['icon' => 'gauge', 'label' => tx('Performance', 'الأداء')],
        ],
    ],
    'sections' => [
        B('challenges', [
            'layout' => 'numbered',
            'background' => 'white',
            'eyebrow' => tx('HR challenges', 'تحديات الموارد البشرية'),
            'title' => tx('When growth outpaces *HR systems*', 'عندما يسبق النمو *أنظمة الموارد البشرية*'),
            'lead' => tx('Many organizations reach a point where informal practices no longer support the business. These are the signs we see most often.', 'تصل كثير من المؤسسات إلى مرحلة لا تعود فيها الممارسات غير الرسمية قادرة على دعم العمل، وهذه أكثر العلامات التي نلاحظها.'),
            'items' => [
                I(null, tx('Unclear roles and responsibilities', 'أدوار ومسؤوليات غير واضحة'), tx('Overlaps and gaps between roles slow decisions and create frustration.', 'التداخل والفجوات بين الأدوار يبطئان القرارات ويولّدان الإحباط.')),
                I(null, tx('Policies that are missing or outdated', 'سياسات غائبة أو قديمة'), tx('Managers handle similar situations differently, which affects fairness and trust.', 'يتعامل المديرون مع المواقف المتشابهة بطرق مختلفة، ما يؤثر على العدالة والثقة.')),
                I(null, tx('Performance that is hard to measure', 'أداء يصعب قياسه'), tx('Without clear objectives and reviews, it is difficult to recognize and develop people.', 'من دون أهداف ومراجعات واضحة يصعب تقدير الأفراد وتطويرهم.')),
                I(null, tx('Inconsistent pay and grading', 'تفاوت في الرواتب والدرجات'), tx('Ad-hoc decisions on salaries and titles create internal equity issues.', 'القرارات المتفرقة بشأن الرواتب والمسميات تخلق مشكلات في العدالة الداخلية.')),
                I(null, tx('HR operations that depend on individuals', 'عمليات تعتمد على أفراد بعينهم'), tx('Key processes live in people’s heads rather than in documented workflows.', 'تبقى العمليات الأساسية في أذهان الأفراد بدلًا من أن تكون موثقة في إجراءات واضحة.')),
            ],
        ]),
        B('framework', [
            'anchor' => 'framework-1',
            'background' => 'mist',
            'eyebrow' => tx('Our framework', 'إطار عملنا'),
            'title' => tx('People. Process. *Performance.*', 'الأفراد. العمليات. *الأداء.*'),
            'lead' => tx('We look at HR through three connected lenses, so improvements in one area reinforce the others.', 'ننظر إلى الموارد البشرية من خلال ثلاث زوايا مترابطة، بحيث يعزّز التحسين في كل منها الزاويتين الأخريين.'),
            'items' => [
                ['letter' => tx('P', '١'), 'title' => tx('People', 'الأفراد'), 'text' => tx('The structure, roles and capabilities your organization needs.', 'الهيكل والأدوار والقدرات التي تحتاجها مؤسستك.'), 'points' => L(['Organization structure', 'Job descriptions', 'Competency frameworks'], ['الهيكل التنظيمي', 'الأوصاف الوظيفية', 'أطر الجدارات'])],
                ['letter' => tx('P', '٢'), 'title' => tx('Process', 'العمليات'), 'text' => tx('The policies and workflows that make HR consistent and efficient.', 'السياسات والإجراءات التي تجعل الموارد البشرية متسقة وفعالة.'), 'points' => L(['HR policies & procedures', 'Recruitment & onboarding', 'HR operations'], ['سياسات وإجراءات الموارد البشرية', 'الاستقطاب والتهيئة', 'عمليات الموارد البشرية'])],
                ['letter' => tx('P', '٣'), 'title' => tx('Performance', 'الأداء'), 'text' => tx('The systems that set expectations, measure results and reward contribution.', 'الأنظمة التي تحدد التوقعات وتقيس النتائج وتكافئ الإسهام.'), 'points' => L(['Performance management', 'Grading & pay structures', 'Recognition approaches'], ['إدارة الأداء', 'الدرجات وهياكل الرواتب', 'أساليب التقدير'])],
            ],
        ]),
        B('areas', [
            'background' => 'white',
            'eyebrow' => tx('Consulting areas', 'مجالات الاستشارة'),
            'title' => tx('Where we can *help*', 'المجالات التي *نساعد فيها*'),
            'lead' => tx('Engagements can focus on a single area or combine several into one HR transformation program.', 'يمكن أن يركز المشروع على مجال واحد أو يجمع عدة مجالات في برنامج تطوير متكامل للموارد البشرية.'),
            'items' => [
                ['title' => tx('HR policies & procedures', 'سياسات وإجراءات الموارد البشرية'), 'text' => tx('Clear, practical policies aligned with your context and applicable labour requirements.', 'سياسات واضحة وعملية تتوافق مع واقعك ومتطلبات العمل المعمول بها.')],
                ['title' => tx('Organization structure', 'الهيكل التنظيمي'), 'text' => tx('Structures that clarify reporting lines, spans of control and accountabilities.', 'هياكل توضّح خطوط التبعية ونطاقات الإشراف والمسؤوليات.')],
                ['title' => tx('Job descriptions & job design', 'الأوصاف الوظيفية وتصميم الوظائف'), 'text' => tx('Consistent role profiles that support hiring, performance and development.', 'ملفات أدوار متسقة تدعم التوظيف والأداء والتطوير.')],
                ['title' => tx('Performance management', 'إدارة الأداء'), 'text' => tx('Objective-setting, review cycles and tools managers will actually use.', 'تحديد الأهداف ودورات المراجعة وأدوات يستخدمها المديرون فعليًا.')],
                ['title' => tx('Grading & compensation frameworks', 'أطر الدرجات والتعويضات'), 'text' => tx('Job grading and pay structures that support internal fairness.', 'تصنيف الوظائف وهياكل رواتب تدعم العدالة الداخلية.')],
                ['title' => tx('Recruitment & onboarding', 'الاستقطاب والتهيئة'), 'text' => tx('Processes that help you hire well and integrate new joiners quickly.', 'إجراءات تساعدك على التوظيف الجيد ودمج الموظفين الجدد بسرعة.')],
                ['title' => tx('HR operations', 'عمليات الموارد البشرية'), 'text' => tx('Documented workflows, templates and controls for everyday HR tasks.', 'إجراءات ونماذج وضوابط موثقة لمهام الموارد البشرية اليومية.')],
                ['title' => tx('Employee engagement', 'ارتباط الموظفين'), 'text' => tx('Ways to listen to employees and act on what you hear.', 'أساليب للاستماع إلى الموظفين والتصرف بناءً على ملاحظاتهم.')],
            ],
        ]),
        B('engagement', [
            'background' => 'ivory',
            'eyebrow' => tx('Engagement model', 'نموذج العمل'),
            'title' => tx('How a typical *engagement* runs', 'كيف يسير *المشروع* عادةً'),
            'lead' => tx('Every project is scoped with you. This is the structure most of our HR engagements follow.', 'يُحدد نطاق كل مشروع بالتعاون معك، وهذا هو الهيكل الذي تتبعه معظم مشاريعنا في الموارد البشرية.'),
            'items' => [
                ['title' => tx('Discover', 'الاستكشاف'), 'text' => tx('Interviews, document review and a clear picture of current practices.', 'مقابلات ومراجعة للمستندات وصورة واضحة عن الممارسات الحالية.'), 'points' => L(['Current-state summary', 'Priority areas'], ['ملخص الوضع الحالي', 'المجالات ذات الأولوية'])],
                ['title' => tx('Design', 'التصميم'), 'text' => tx('Frameworks, policies and tools drafted with your team.', 'إعداد الأطر والسياسات والأدوات بالتعاون مع فريقك.'), 'points' => L(['Draft frameworks', 'Policies & templates'], ['مسودات الأطر', 'السياسات والنماذج'])],
                ['title' => tx('Validate', 'الاعتماد'), 'text' => tx('Workshops with management to test and refine the design.', 'ورش عمل مع الإدارة لاختبار التصميم وتحسينه.'), 'points' => L(['Approved documents', 'Decisions log'], ['مستندات معتمدة', 'سجل القرارات'])],
                ['title' => tx('Implement', 'التطبيق'), 'text' => tx('Roll-out support, manager briefings and practical guidance.', 'دعم الإطلاق وإحاطات للمديرين وإرشاد عملي.'), 'points' => L(['Roll-out plan', 'Manager guides', 'Training sessions'], ['خطة الإطلاق', 'أدلة المديرين', 'جلسات تدريبية'])],
            ],
        ]),
        B('outcomes', [
            'background' => 'dark',
            'eyebrow' => tx('Outcomes', 'النتائج'),
            'title' => tx('What a stronger HR foundation *gives you*', 'ما الذي *يمنحك* إياه أساس أقوى للموارد البشرية'),
            'items' => [
                ['title' => tx('Clarity', 'الوضوح'), 'text' => tx('Everyone understands their role and what is expected.', 'يفهم الجميع أدوارهم وما هو متوقع منهم.')],
                ['title' => tx('Consistency', 'الاتساق'), 'text' => tx('Similar situations are handled in the same, fair way.', 'تُعالج المواقف المتشابهة بالطريقة العادلة نفسها.')],
                ['title' => tx('Better decisions', 'قرارات أفضل'), 'text' => tx('Managers have frameworks and information to rely on.', 'يمتلك المديرون أطرًا ومعلومات يعتمدون عليها.')],
                ['title' => tx('Scalability', 'القابلية للتوسع'), 'text' => tx('HR processes that keep working as you grow.', 'عمليات موارد بشرية تستمر في العمل مع نموك.')],
            ],
        ]),
        B('related', ['background' => 'mist', 'eyebrow' => tx('Works well with', 'يتكامل مع'), 'title' => tx('Related services', 'خدمات ذات صلة')]),
        B('faq', ['source' => 'auto', 'background' => 'white', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('HR consulting questions', 'أسئلة حول الاستشارات في الموارد البشرية')]),
        B('cta_band', [
            'layout' => 'dark',
            'eyebrow' => tx('HR consulting', 'الاستشارات في الموارد البشرية'),
            'title' => tx('Let’s strengthen your *HR foundations*', 'لنعزّز معًا *أسس الموارد البشرية* لديك'),
            'lead' => tx('Tell us where you are today and where you want your organization to be.', 'أخبرنا أين تقف مؤسستك اليوم وإلى أين تريد أن تصل.'),
            'cta_label' => tx('Request a consultation', 'اطلب استشارة'),
            'cta_link' => '/contact#contact-form',
        ]),
    ],
    'faqs' => [
        [tx('Do you work with organizations that have no HR department?', 'هل تعملون مع مؤسسات ليس لديها قسم للموارد البشرية؟'), tx('Yes. We often help growing organizations put their first HR policies, structures and processes in place, and we can support the person responsible for HR.', 'نعم. نساعد كثيرًا المؤسسات النامية على وضع أولى سياساتها وهياكلها وإجراءاتها في الموارد البشرية، ويمكننا دعم الشخص المسؤول عن هذا الملف.')],
        [tx('Can you focus on just one area, such as job descriptions?', 'هل يمكن التركيز على مجال واحد فقط مثل الأوصاف الوظيفية؟'), tx('Yes. Engagements can be focused on a single deliverable or combine several areas, depending on your priorities.', 'نعم. يمكن أن يركّز المشروع على مخرج واحد أو يجمع عدة مجالات وفقًا لأولوياتك.')],
        [tx('How long does an HR consulting project take?', 'كم يستغرق مشروع الاستشارات في الموارد البشرية؟'), tx('It depends on scope and on how quickly decisions can be made. We agree a timeline with you at the start of each engagement.', 'يعتمد ذلك على النطاق وسرعة اتخاذ القرارات، ونتفق معك على جدول زمني في بداية كل مشروع.')],
        [tx('Will you help us implement the new frameworks?', 'هل تساعدوننا في تطبيق الأطر الجديدة؟'), tx('Yes. Implementation support — manager briefings, guides and training — is part of our engagement model, so the work does not stay on paper.', 'نعم. يُعد دعم التطبيق من إحاطات وأدلة وتدريب للمديرين جزءًا من نموذج عملنا، حتى لا يبقى العمل حبرًا على ورق.')],
    ],
    'seo' => SEO(
        tx('HR Consulting: Policies, Structures, Performance & Rewards', 'الاستشارات في الموارد البشرية: السياسات والهياكل والأداء والمكافآت'),
        tx('HR consulting for growing organizations: HR policies, organization structure, job descriptions, performance management and grading frameworks with WAFA.', 'استشارات الموارد البشرية للمؤسسات النامية: السياسات والهيكل التنظيمي والأوصاف الوظيفية وإدارة الأداء وأطر الدرجات مع وفاء.'),
        tx('HR consulting', 'استشارات الموارد البشرية'),
        tx('HR policies, organization structure, job descriptions, performance management', 'سياسات الموارد البشرية, الهيكل التنظيمي, الأوصاف الوظيفية, إدارة الأداء'),
    ),
];
