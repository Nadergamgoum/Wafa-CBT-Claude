<?php

return [
    'category' => 'learning',
    'family' => 'executive_coaching',
    'slug' => 'executive-coaching',
    'sort' => 3,
    'icon' => 'crown',
    'accent' => 'gold',
    'hero_variant' => 'dark',
    'title' => tx('Executive Coaching', 'الكوتشينغ التنفيذي'),
    'summary' => tx(
        'Confidential one-to-one coaching for senior leaders navigating complex decisions, larger responsibilities and change.',
        'كوتشينغ فردي سري للقادة التنفيذيين الذين يتعاملون مع قرارات معقدة ومسؤوليات أكبر ومراحل تغيير.'
    ),
    'hero' => [
        'eyebrow' => tx('Learning & Leadership · Executive Coaching', 'التعلّم والقيادة · الكوتشينغ التنفيذي'),
        'title' => tx('Lead with *clarity* when the stakes are highest', 'قُد *بوضوح* حين تكون المخاطر في أعلى مستوياتها'),
        'lead' => tx(
            'Executive coaching offers senior leaders a confidential space to think, reflect and strengthen the way they lead, decide and influence.',
            'يوفّر الكوتشينغ التنفيذي للقادة مساحة سرية للتفكير والتأمل وتعزيز أسلوبهم في القيادة واتخاذ القرار والتأثير.'
        ),
        'cta_label' => tx('Arrange a confidential conversation', 'رتّب محادثة سرية'),
        'cta_link' => '/contact#contact-form',
        'highlights' => [
            ['label' => tx('Strategic thinking', 'التفكير الاستراتيجي')],
            ['label' => tx('Decision-making', 'اتخاذ القرار')],
            ['label' => tx('Influence', 'التأثير')],
            ['label' => tx('Leading change', 'قيادة التغيير')],
        ],
    ],
    'sections' => [
        B('challenges', [
            'layout' => 'statements',
            'background' => 'white',
            'eyebrow' => tx('Executive challenges', 'تحديات القيادة التنفيذية'),
            'title' => tx('Leadership at the top is *different*', 'القيادة في القمة *مختلفة*'),
            'items' => [
                I('crown', tx('Stepping into a bigger role', 'الانتقال إلى دور أكبر'), tx('New responsibilities require new ways of leading, not just more effort.', 'تتطلب المسؤوليات الجديدة أساليب قيادة جديدة، لا مجرد جهد إضافي.')),
                I('compass', tx('Complex, high-impact decisions', 'قرارات معقدة وعالية الأثر'), tx('Choices with incomplete information and many stakeholders.', 'خيارات بمعلومات غير مكتملة وأطراف معنية كثيرة.')),
                I('users', tx('Leading through others', 'القيادة من خلال الآخرين'), tx('Aligning a senior team and building trust across the organization.', 'مواءمة الفريق القيادي وبناء الثقة على مستوى المؤسسة.')),
                I('mountain', tx('Sustaining performance under pressure', 'الحفاظ على الأداء تحت الضغط'), tx('Managing energy, focus and resilience over time.', 'إدارة الطاقة والتركيز والمرونة على المدى الطويل.')),
            ],
        ]),
        B('themes', [
            'background' => 'dark',
            'eyebrow' => tx('Leadership themes', 'محاور القيادة'),
            'title' => tx('What executive coaching *explores*', 'ما *يستكشفه* الكوتشينغ التنفيذي'),
            'items' => [
                ['title' => tx('Strategic perspective', 'المنظور الاستراتيجي'), 'text' => tx('Stepping back from operations to set direction.', 'الابتعاد عن التفاصيل التشغيلية لرسم التوجه.')],
                ['title' => tx('Decision quality', 'جودة القرار'), 'text' => tx('Better framing of choices, risks and trade-offs.', 'صياغة أفضل للخيارات والمخاطر والموازنات.')],
                ['title' => tx('Executive presence', 'الحضور القيادي'), 'text' => tx('Communicating with clarity, credibility and calm.', 'التواصل بوضوح ومصداقية وهدوء.')],
                ['title' => tx('Influence & stakeholders', 'التأثير وأصحاب المصلحة'), 'text' => tx('Working effectively with boards, peers and teams.', 'العمل بفاعلية مع مجالس الإدارة والنظراء والفرق.')],
                ['title' => tx('Leading change', 'قيادة التغيير'), 'text' => tx('Bringing people with you through transition.', 'اصطحاب الأفراد معك خلال مراحل التحوّل.')],
                ['title' => tx('Resilience', 'المرونة'), 'text' => tx('Sustaining energy and judgement over the long term.', 'الحفاظ على الطاقة وحسن التقدير على المدى البعيد.')],
            ],
        ]),
        B('process', [
            'layout' => 'vertical',
            'background' => 'white',
            'eyebrow' => tx('The one-to-one journey', 'الرحلة الفردية'),
            'title' => tx('A confidential, *structured* coaching relationship', 'علاقة كوتشينغ سرية *ومنظّمة*'),
            'items' => [
                ['title' => tx('Chemistry conversation', 'محادثة تعارف'), 'text' => tx('An initial meeting to agree fit, expectations and confidentiality.', 'لقاء أولي للتأكد من التوافق والاتفاق على التوقعات والسرية.')],
                ['title' => tx('Goals & context', 'الأهداف والسياق'), 'text' => tx('Clarify development goals, often with input from a sponsor.', 'تحديد أهداف التطوير، وغالبًا بمشاركة الجهة الراعية.')],
                ['title' => tx('Coaching sessions', 'جلسات الكوتشينغ'), 'text' => tx('Regular one-to-one sessions focused on real leadership situations.', 'جلسات فردية منتظمة تركز على مواقف قيادية حقيقية.')],
                ['title' => tx('Reflection & practice', 'التأمل والتطبيق'), 'text' => tx('New approaches tested between sessions and reviewed together.', 'تجربة أساليب جديدة بين الجلسات ومراجعتها معًا.')],
                ['title' => tx('Review & next steps', 'المراجعة والخطوات التالية'), 'text' => tx('Progress review and a plan to sustain development.', 'مراجعة التقدّم وخطة لاستدامة التطوير.')],
            ],
        ]),
        B('split_feature', [
            'background' => 'ivory',
            'image_side' => 'end',
            'art' => 'executive_coaching-detail',
            'eyebrow' => tx('Decision-making & performance development', 'اتخاذ القرار وتطوير الأداء'),
            'title' => tx('Room to think. *Space to lead deliberately.*', 'مساحة للتفكير. *وقيادة عن وعي.*'),
            'body' => tx('Coaching gives leaders time to slow down their thinking when it matters, look at situations from more angles and decide how they want to act.', 'يمنح الكوتشينغ القادة وقتًا للتأني في التفكير حين يلزم ذلك، والنظر إلى المواقف من زوايا متعددة، وتحديد الطريقة التي يريدون التصرف بها.'),
            'points' => L(
                ['Thinking through complex decisions', 'Reflection on leadership style', 'Practical actions between sessions', 'Focus and resilience'],
                ['التفكير في القرارات المعقدة', 'التأمل في أسلوب القيادة', 'خطوات عملية بين الجلسات', 'التركيز والمرونة']
            ),
            'aside_title' => tx('Confidentiality agreed upfront', 'اتفاق مسبق على السرية'),
            'aside_text' => tx('What is discussed in coaching stays in coaching unless agreed otherwise.', 'ما يُناقش في جلسات الكوتشينغ يبقى ضمنها ما لم يُتفق على غير ذلك.'),
        ]),
        B('faq', ['source' => 'auto', 'background' => 'white', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Executive coaching questions', 'أسئلة حول الكوتشينغ التنفيذي')]),
        B('cta_band', [
            'layout' => 'dark',
            'eyebrow' => tx('Executive coaching', 'الكوتشينغ التنفيذي'),
            'title' => tx('Invest in the way *you lead*', 'استثمر في *أسلوب قيادتك*'),
            'lead' => tx('Arrange a confidential conversation to explore whether executive coaching is right for you or your leadership team.', 'رتّب محادثة سرية لتعرف ما إذا كان الكوتشينغ التنفيذي مناسبًا لك أو لفريقك القيادي.'),
            'cta_label' => tx('Arrange a conversation', 'رتّب محادثة'),
            'cta_link' => '/contact#contact-form',
        ]),
    ],
    'faqs' => [
        [tx('Who is executive coaching for?', 'لمن يُقدَّم الكوتشينغ التنفيذي؟'), tx('Senior leaders, executives and high-potential managers stepping into larger roles or leading through significant change.', 'للقادة والتنفيذيين والمديرين الواعدين الذين ينتقلون إلى أدوار أكبر أو يقودون مراحل تغيير مهمة.')],
        [tx('Is executive coaching confidential?', 'هل الكوتشينغ التنفيذي سري؟'), tx('Yes. Confidentiality is agreed at the start. When an organization sponsors the coaching, the scope of any progress updates is agreed with the leader in advance.', 'نعم. يُتفق على السرية منذ البداية، وعندما تكون المؤسسة هي الجهة الراعية يُتفق مسبقًا مع القائد على نطاق أي تحديثات حول التقدّم.')],
        [tx('How long does an executive coaching engagement last?', 'كم تستمر علاقة الكوتشينغ التنفيذي؟'), tx('Duration and frequency are agreed based on the leader’s goals. The length of the engagement is agreed with you at the start.', 'تُحدد المدة وعدد الجلسات بناءً على أهداف القائد، ويُتفق معك على مدة العلاقة في البداية.')],
        [tx('Can sessions be held online?', 'هل يمكن عقد الجلسات عبر الإنترنت؟'), tx('Yes. Sessions can be held in person or online, depending on the leader’s preference and schedule.', 'نعم. يمكن عقد الجلسات حضوريًا أو عبر الإنترنت حسب تفضيل القائد وجدوله.')],
    ],
    'seo' => SEO(
        tx('Executive Coaching for Senior Leaders', 'الكوتشينغ التنفيذي للقادة'),
        tx('Confidential one-to-one executive coaching for senior leaders: strategic thinking, decision-making, influence and leading change with WAFA.', 'كوتشينغ تنفيذي فردي وسري للقادة: التفكير الاستراتيجي واتخاذ القرار والتأثير وقيادة التغيير مع WAFA.'),
        tx('executive coaching', 'الكوتشينغ التنفيذي'),
        tx('leadership coaching, coaching for senior leaders, one-to-one coaching', 'كوتشينغ القيادة, كوتشينغ القادة, الكوتشينغ الفردي'),
    ),
];
