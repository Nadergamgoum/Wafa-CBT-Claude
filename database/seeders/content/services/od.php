<?php

return [
    'category' => 'people',
    'family' => 'od',
    'slug' => 'organizational-development',
    'sort' => 2,
    'icon' => 'network',
    'accent' => 'sage',
    'hero_variant' => 'minimal',
    'title' => tx('Organizational Development', 'التطوير المؤسسي'),
    'summary' => tx(
        'Diagnose how your organization works today, design where it needs to go and build the capabilities to get there.',
        'تشخيص طريقة عمل مؤسستك اليوم، وتصميم الوجهة التي تحتاج إليها، وبناء القدرات اللازمة للوصول إليها.'
    ),
    'hero' => [
        'eyebrow' => tx('People & Organization · Organizational Development', 'الأفراد والمؤسسة · التطوير المؤسسي'),
        'title' => tx('From where you are to where your organization *needs to be*', 'من حيث أنت اليوم إلى حيث *ينبغي* أن تكون مؤسستك'),
        'lead' => tx(
            'Organizational development helps you align strategy, structure, processes and people — so change is planned, understood and sustained.',
            'يساعدك التطوير المؤسسي على مواءمة الاستراتيجية والهيكل والعمليات والأفراد، ليكون التغيير مخططًا ومفهومًا ومستدامًا.'
        ),
        'cta_label' => tx('Start a conversation', 'ابدأ الحوار'),
        'cta_link' => '/contact#contact-form',
        'highlights' => [
            ['label' => tx('Current state', 'الوضع الحالي')],
            ['label' => tx('Assessment', 'التقييم')],
            ['label' => tx('Transformation', 'التحوّل')],
            ['label' => tx('Future state', 'الوضع المستهدف')],
        ],
    ],
    'sections' => [
        B('transformation', [
            'background' => 'white',
            'eyebrow' => tx('Our transformation path', 'مسار التحوّل'),
            'title' => tx('A structured path through *change*', 'مسار منظّم عبر *التغيير*'),
            'lead' => tx('Each stage builds on the previous one, so decisions are based on evidence and changes stick.', 'تُبنى كل مرحلة على سابقتها، لتستند القرارات إلى الأدلة ويترسخ التغيير.'),
            'items' => [
                ['title' => tx('Current state', 'الوضع الحالي'), 'text' => tx('Understand how the organization really works today.', 'فهم طريقة عمل المؤسسة الفعلية اليوم.'), 'points' => L(['Stakeholder interviews', 'Document & data review'], ['مقابلات أصحاب المصلحة', 'مراجعة المستندات والبيانات'])],
                ['title' => tx('Assessment', 'التقييم'), 'text' => tx('Diagnose strengths, gaps and root causes.', 'تشخيص نقاط القوة والفجوات والأسباب الجذرية.'), 'points' => L(['Organizational diagnosis', 'Priority issues'], ['التشخيص المؤسسي', 'القضايا ذات الأولوية'])],
                ['title' => tx('Transformation', 'التحوّل'), 'text' => tx('Design and implement the changes that matter most.', 'تصميم التغييرات الأهم وتنفيذها.'), 'points' => L(['Roadmap & initiatives', 'Capability building'], ['خارطة الطريق والمبادرات', 'بناء القدرات'])],
                ['title' => tx('Future state', 'الوضع المستهدف'), 'text' => tx('An organization aligned with its strategy and ready to grow.', 'مؤسسة متوائمة مع استراتيجيتها ومستعدة للنمو.'), 'points' => L(['Clear accountabilities', 'Sustained new ways of working'], ['مسؤوليات واضحة', 'أساليب عمل جديدة مستدامة'])],
            ],
        ]),
        B('challenges', [
            'layout' => 'grid',
            'background' => 'mist',
            'eyebrow' => tx('Organizational challenges', 'التحديات المؤسسية'),
            'title' => tx('Signs that it is time to *look at the whole system*', 'مؤشرات على أن الوقت قد حان *للنظر إلى المنظومة بأكملها*'),
            'items' => [
                I('git-branch', tx('Strategy is not translating into action', 'الاستراتيجية لا تتحول إلى تنفيذ'), tx('Goals are clear at the top but get lost across departments.', 'الأهداف واضحة في القمة لكنها تضيع بين الإدارات.')),
                I('layers', tx('Structure no longer fits', 'الهيكل لم يعد مناسبًا'), tx('Growth, mergers or new services have outpaced the original design.', 'تجاوز النمو أو الاندماج أو الخدمات الجديدة التصميم الأصلي.')),
                I('workflow', tx('Slow, unclear processes', 'إجراءات بطيئة وغير واضحة'), tx('Hand-offs and approvals cause delays and duplication.', 'تتسبب عمليات التسليم والموافقات في التأخير والازدواجية.')),
                I('messages-square', tx('Culture and engagement concerns', 'مخاوف تتعلق بالثقافة والارتباط'), tx('People feel disconnected from the organization’s direction.', 'يشعر الأفراد بالانفصال عن توجه المؤسسة.')),
                I('compass', tx('Leadership capacity', 'القدرة القيادية'), tx('Managers need new skills to lead in a changing environment.', 'يحتاج المديرون إلى مهارات جديدة للقيادة في بيئة متغيرة.')),
                I('refresh-cw', tx('Change fatigue', 'إرهاق التغيير'), tx('Previous initiatives started well but did not last.', 'بدأت مبادرات سابقة بشكل جيد لكنها لم تستمر.')),
            ],
        ]),
        B('dimensions', [
            'background' => 'white',
            'eyebrow' => tx('Diagnosis', 'التشخيص'),
            'title' => tx('We look at six *connected dimensions*', 'ننظر إلى ستة *أبعاد مترابطة*'),
            'lead' => tx('A balanced diagnosis avoids fixing symptoms in one area while the cause sits in another.', 'يجنّبك التشخيص المتوازن معالجة الأعراض في مجال بينما يكمن السبب في مجال آخر.'),
            'items' => [
                I('target', tx('Strategy & direction', 'الاستراتيجية والتوجه'), tx('Clarity and alignment of goals.', 'وضوح الأهداف ومواءمتها.')),
                I('network', tx('Structure & roles', 'الهيكل والأدوار'), tx('How work and accountability are organized.', 'طريقة تنظيم العمل والمسؤوليات.')),
                I('workflow', tx('Processes', 'العمليات'), tx('How work flows across teams.', 'كيف يتدفق العمل بين الفرق.')),
                I('heart-handshake', tx('Culture & engagement', 'الثقافة والارتباط'), tx('Shared behaviours and commitment.', 'السلوكيات المشتركة والالتزام.')),
                I('compass', tx('Leadership & capabilities', 'القيادة والقدرات'), tx('The skills needed for the future.', 'المهارات اللازمة للمستقبل.')),
                I('chart-line', tx('Systems & information', 'الأنظمة والمعلومات'), tx('Data and tools that support decisions.', 'البيانات والأدوات التي تدعم القرارات.')),
            ],
        ]),
        B('split_feature', [
            'background' => 'ivory',
            'image_side' => 'start',
            'art' => 'od-detail',
            'eyebrow' => tx('Capability development', 'تطوير القدرات'),
            'title' => tx('Change succeeds when people are *ready for it*', 'ينجح التغيير عندما يكون الأفراد *مستعدين له*'),
            'body' => tx('Organizational development is not only about charts and processes. We help leaders and teams build the capabilities that new ways of working require — combining consulting with training and coaching.', 'لا يقتصر التطوير المؤسسي على الهياكل والإجراءات، بل نساعد القادة والفرق على بناء القدرات التي تتطلبها أساليب العمل الجديدة من خلال الجمع بين الاستشارات والتدريب والكوتشينغ.'),
            'points' => L(
                ['Leadership alignment workshops', 'Change communication planning', 'Targeted training for new roles', 'Coaching for key leaders'],
                ['ورش عمل لمواءمة القيادة', 'تخطيط التواصل بشأن التغيير', 'تدريب موجّه للأدوار الجديدة', 'كوتشينغ للقادة الرئيسيين']
            ),
        ]),
        B('roadmap', [
            'background' => 'white',
            'eyebrow' => tx('Transformation roadmap', 'خارطة طريق التحوّل'),
            'title' => tx('Sequenced, *realistic* and owned by your team', 'متسلسلة و*واقعية* ويتبنّاها فريقك'),
            'items' => [
                ['title' => tx('Diagnose', 'التشخيص'), 'text' => tx('Evidence-based view of the current state.', 'رؤية قائمة على الأدلة للوضع الحالي.'), 'start' => 0, 'span' => 2],
                ['title' => tx('Design', 'التصميم'), 'text' => tx('Target model and priority initiatives.', 'النموذج المستهدف والمبادرات ذات الأولوية.'), 'start' => 1, 'span' => 2],
                ['title' => tx('Mobilize', 'التهيئة'), 'text' => tx('Leadership alignment and communication.', 'مواءمة القيادة والتواصل.'), 'start' => 2, 'span' => 2],
                ['title' => tx('Implement', 'التنفيذ'), 'text' => tx('Phased roll-out with capability building.', 'إطلاق مرحلي مع بناء القدرات.'), 'start' => 3, 'span' => 3],
                ['title' => tx('Embed', 'الترسيخ'), 'text' => tx('Review, adjust and sustain the change.', 'المراجعة والتعديل واستدامة التغيير.'), 'start' => 5, 'span' => 2],
            ],
        ]),
        B('future_state', [
            'background' => 'mist',
            'eyebrow' => tx('Future-state visualization', 'تصوّر الوضع المستهدف'),
            'title' => tx('What changes when the organization is *aligned*', 'ما الذي يتغير عندما تكون المؤسسة *متوائمة*'),
            'left_title' => tx('Today', 'اليوم'),
            'left_points' => L(
                ['Priorities interpreted differently by each team', 'Decisions escalated because ownership is unclear', 'Processes that rely on workarounds', 'Change initiatives that fade over time'],
                ['أولويات تفسّرها كل إدارة بطريقتها', 'قرارات تُرفع للإدارة العليا لعدم وضوح المسؤولية', 'إجراءات تعتمد على حلول مؤقتة', 'مبادرات تغيير تتلاشى مع الوقت']
            ),
            'right_title' => tx('Future state', 'الوضع المستهدف'),
            'right_points' => L(
                ['Shared priorities linked to strategy', 'Clear roles and decision rights', 'Streamlined, documented processes', 'Leaders equipped to sustain change'],
                ['أولويات مشتركة مرتبطة بالاستراتيجية', 'أدوار وصلاحيات قرار واضحة', 'إجراءات مبسّطة وموثقة', 'قادة مؤهلون لاستدامة التغيير']
            ),
        ]),
        B('faq', ['source' => 'auto', 'background' => 'white', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Organizational development questions', 'أسئلة حول التطوير المؤسسي')]),
        B('cta_band', [
            'layout' => 'soft',
            'eyebrow' => tx('Organizational development', 'التطوير المؤسسي'),
            'title' => tx('Ready to shape your *future organization*?', 'هل أنت مستعد لتشكيل *مؤسستك المستقبلية*؟'),
            'lead' => tx('A short conversation is often enough to identify where to start.', 'غالبًا ما تكفي محادثة قصيرة لتحديد نقطة البداية.'),
            'cta_label' => tx('Talk to our team', 'تحدّث إلى فريقنا'),
            'cta_link' => '/contact#contact-form',
        ]),
    ],
    'faqs' => [
        [tx('How is organizational development different from HR consulting?', 'ما الفرق بين التطوير المؤسسي والاستشارات في الموارد البشرية؟'), tx('HR consulting usually focuses on specific HR systems such as policies or performance management. Organizational development looks at the organization as a whole — strategy, structure, processes, culture and capabilities — and how they fit together.', 'تركّز الاستشارات في الموارد البشرية عادةً على أنظمة محددة مثل السياسات أو إدارة الأداء، بينما ينظر التطوير المؤسسي إلى المؤسسة ككل من استراتيجية وهيكل وعمليات وثقافة وقدرات، وإلى مدى تكاملها.')],
        [tx('Do we need a full diagnosis before making changes?', 'هل نحتاج إلى تشخيص كامل قبل إجراء أي تغيير؟'), tx('Not always. The depth of diagnosis is matched to the decision you need to make. For focused changes, a lighter assessment can be enough.', 'ليس دائمًا، إذ يتناسب عمق التشخيص مع القرار المطلوب اتخاذه. وفي التغييرات المحددة قد يكفي تقييم مختصر.')],
        [tx('How do you involve our employees?', 'كيف تشركون موظفينا؟'), tx('Through interviews, workshops and, where useful, surveys. Involving people early improves the quality of the design and the acceptance of change.', 'من خلال المقابلات وورش العمل والاستبيانات عند الحاجة، فإشراك الأفراد مبكرًا يحسّن جودة التصميم وتقبّل التغيير.')],
        [tx('Can you support implementation, not just recommendations?', 'هل تدعمون التنفيذ وليس التوصيات فقط؟'), tx('Yes. We can support roll-out, communication, training and coaching so that changes are embedded in daily work.', 'نعم. يمكننا دعم الإطلاق والتواصل والتدريب والكوتشينغ ليترسخ التغيير في العمل اليومي.')],
    ],
    'seo' => SEO(
        tx('Organizational Development & Transformation', 'التطوير المؤسسي والتحوّل'),
        tx('Organizational development consulting: diagnose the current state, design the future organization, build capabilities and sustain change with WAFA.', 'استشارات التطوير المؤسسي: تشخيص الوضع الحالي وتصميم المؤسسة المستقبلية وبناء القدرات واستدامة التغيير مع وفاء.'),
        tx('organizational development', 'التطوير المؤسسي'),
        tx('organizational transformation, change management, organizational diagnosis', 'التحول المؤسسي, إدارة التغيير, التشخيص المؤسسي'),
    ),
];
