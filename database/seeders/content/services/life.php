<?php

return [
    'category' => 'insurance',
    'family' => 'life',
    'slug' => 'life-insurance',
    'sort' => 2,
    'icon' => 'umbrella',
    'accent' => 'gold',
    'hero_variant' => 'editorial',
    'title' => tx('Life Insurance', 'التأمين على الحياة'),
    'summary' => tx(
        'Life protection for employees, business owners and families — explained clearly and arranged with the right insurer.',
        'حماية تأمينية على الحياة للموظفين وأصحاب الأعمال والأسر، نشرحها بوضوح ونرتّبها مع شركة التأمين المناسبة.'
    ),
    'hero' => [
        'eyebrow' => tx('Insurance · Life protection', 'التأمين · الحماية على الحياة'),
        'title' => tx('Protection for the people who *depend on you*', 'حماية لمن *يعتمدون عليك*'),
        'lead' => tx(
            'Life insurance gives employees and families financial security when it matters most. We help you choose cover that is clear, appropriate and well arranged.',
            'يمنح التأمين على الحياة الموظفين والأسر أمانًا ماليًا في أكثر الأوقات حاجةً إليه. نساعدك على اختيار تغطية واضحة ومناسبة ومرتّبة بعناية.'
        ),
        'cta_label' => tx('Discuss life cover', 'ناقش خيارات التأمين على الحياة'),
        'cta_link' => '/contact#contact-form',
        'highlights' => [
            ['icon' => 'users', 'label' => tx('Group life for employees', 'تأمين جماعي على حياة الموظفين')],
            ['icon' => 'user-round', 'label' => tx('Individual cover', 'تغطية فردية')],
            ['icon' => 'scale', 'label' => tx('Clear comparisons', 'مقارنات واضحة')],
            ['icon' => 'life-buoy', 'label' => tx('Claims support', 'دعم المطالبات')],
        ],
    ],
    'sections' => [
        B('statement', [
            'background' => 'ivory',
            'art' => 'life-detail',
            'eyebrow' => tx('Why protection matters', 'لماذا تهمّ الحماية'),
            'title' => tx('Planning for the unexpected is an act of *care*', 'التخطيط لما لا نتوقعه هو *تعبير عن الرعاية*'),
            'statement' => tx(
                'Life insurance is not about expecting the worst. It is about making sure that, if the unexpected happens, the people who rely on an income are not left facing financial uncertainty alone.',
                'لا يتعلق التأمين على الحياة بتوقّع الأسوأ، بل بالتأكد من أنه إذا وقع ما لم يكن في الحسبان، فلن يواجه من يعتمدون على الدخل المجهول المالي وحدهم.'
            ),
            'items' => [
                I('shield', tx('Financial security for families', 'أمان مالي للأسر'), tx('A benefit paid to beneficiaries can help cover living costs and commitments.', 'يمكن أن يساعد المبلغ المدفوع للمستفيدين على تغطية تكاليف المعيشة والالتزامات.')),
                I('hand-heart', tx('A meaningful employee benefit', 'ميزة ذات قيمة للموظفين'), tx('Group life cover shows employees that their organization cares about their families too.', 'يُظهر التأمين الجماعي على الحياة للموظفين أن مؤسستهم تهتم بأسرهم أيضًا.')),
                I('briefcase', tx('Continuity for businesses', 'استمرارية للأعمال'), tx('Protection linked to owners or key people can support a business through a difficult transition.', 'يمكن للحماية المرتبطة بالملاك أو الأشخاص الرئيسيين أن تدعم استمرارية العمل خلال مرحلة انتقالية صعبة.')),
            ],
        ]),
        B('audience', [
            'background' => 'white',
            'eyebrow' => tx('Who it is for', 'لمن هذه الخدمة'),
            'title' => tx('Life cover for organizations *and* individuals', 'تأمين على الحياة للمؤسسات *والأفراد*'),
            'items' => [
                I('building-2', tx('Employers', 'أصحاب العمل'), tx('Group life insurance as part of your employee benefits package, often arranged alongside medical insurance.', 'تأمين جماعي على الحياة ضمن حزمة مزايا الموظفين، وغالبًا ما يُرتّب جنبًا إلى جنب مع التأمين الطبي.')),
                I('briefcase', tx('Business owners & partners', 'أصحاب الأعمال والشركاء'), tx('Protection that considers the people a business depends on, where suitable products are available.', 'حماية تراعي الأشخاص الذين يعتمد عليهم العمل، متى توفرت المنتجات المناسبة.')),
                I('users', tx('Individuals & families', 'الأفراد والأسر'), tx('Personal life cover designed around family responsibilities and long-term plans.', 'تغطية شخصية على الحياة مصمّمة حول المسؤوليات الأسرية والخطط طويلة الأمد.')),
            ],
        ]),
        B('coverage', [
            'layout' => 'shield',
            'background' => 'mist',
            'eyebrow' => tx('Protection areas', 'مجالات الحماية'),
            'title' => tx('Understand the options *before you decide*', 'افهم الخيارات *قبل أن تقرر*'),
            'lead' => tx('We explain how different types of life cover work so you can choose with confidence.', 'نشرح طريقة عمل أنواع التأمين على الحياة المختلفة لتختار بثقة.'),
            'note' => tx('Available benefits, riders and conditions depend on each insurer’s products and applicable regulations. We will confirm what is available for your situation.', 'تعتمد المزايا والملاحق والشروط المتاحة على منتجات كل شركة تأمين والأنظمة المعمول بها، وسنؤكد لك ما هو متاح لحالتك.'),
            'items' => [
                ['icon' => 'users', 'title' => tx('Group life insurance', 'التأمين الجماعي على الحياة'), 'text' => tx('Cover for employees under one policy, usually linked to salary multiples or fixed amounts.', 'تغطية للموظفين ضمن وثيقة واحدة، ترتبط عادةً بمضاعفات الراتب أو بمبالغ محددة.'), 'points' => L(['Simple administration for HR', 'Consistent cover across categories', 'Can complement medical insurance'], ['إدارة مبسّطة لفريق الموارد البشرية', 'تغطية متسقة بين الفئات', 'يمكن أن يكمّل التأمين الطبي'])],
                ['icon' => 'user-round', 'title' => tx('Individual life insurance', 'التأمين الفردي على الحياة'), 'text' => tx('Personal policies chosen around family needs, commitments and time horizon.', 'وثائق شخصية تُختار وفق احتياجات الأسرة والالتزامات والمدة الزمنية.'), 'points' => L(['Cover amount and term', 'Beneficiary planning', 'Premium options'], ['مبلغ التغطية ومدتها', 'تحديد المستفيدين', 'خيارات الأقساط'])],
                ['icon' => 'shield-plus', 'title' => tx('Additional benefits', 'المزايا الإضافية'), 'text' => tx('Some policies can include benefits such as disability or critical illness cover, depending on the insurer.', 'يمكن أن تشمل بعض الوثائق مزايا مثل تغطية العجز أو الأمراض الحرجة، حسب شركة التأمين.'), 'points' => L(['Disability cover', 'Critical illness cover', 'Accidental death benefits'], ['تغطية العجز', 'تغطية الأمراض الحرجة', 'مزايا الوفاة الناتجة عن حادث'])],
                ['icon' => 'wallet', 'title' => tx('Protection with savings', 'الحماية مع الادخار'), 'text' => tx('Where insurers offer them, some plans combine protection with a savings element.', 'تجمع بعض الخطط بين الحماية وعنصر ادخاري، متى ما وفرتها شركات التأمين.'), 'points' => L(['Long-term planning', 'Clear explanation of terms'], ['تخطيط طويل الأمد', 'شرح واضح للشروط'])],
            ],
        ]),
        B('split_feature', [
            'background' => 'white',
            'image_side' => 'start',
            'art' => 'life-card',
            'eyebrow' => tx('Advisory support', 'الدعم الاستشاري'),
            'title' => tx('Guidance in plain language, *from quote to claim*', 'إرشاد بلغة واضحة، *من عرض السعر حتى المطالبة*'),
            'body' => tx('Life insurance terms can be difficult to compare. We translate the details into clear choices and stay available when beneficiaries need help.', 'قد يصعب مقارنة شروط التأمين على الحياة، لذلك نحوّل التفاصيل إلى خيارات واضحة ونبقى متاحين عندما يحتاج المستفيدون إلى المساعدة.'),
            'points' => L(
                ['Needs-based recommendations', 'Side-by-side comparison of insurer options', 'Help with documentation and enrolment', 'Support for beneficiaries during claims'],
                ['توصيات مبنية على الاحتياجات', 'مقارنة متوازية لخيارات شركات التأمين', 'المساعدة في المستندات والتسجيل', 'دعم المستفيدين أثناء المطالبات']
            ),
            'aside_title' => tx('Often combined with medical insurance', 'غالبًا ما يُرتّب مع التأمين الطبي'),
            'aside_text' => tx('Many employers review group life and medical cover together as one benefits program.', 'تراجع كثير من المؤسسات التأمين الجماعي على الحياة والتأمين الطبي معًا كبرنامج مزايا واحد.'),
            'cta_label' => tx('Talk to an advisor', 'تحدّث إلى مستشار'),
            'cta_link' => '/contact#contact-form',
        ]),
        B('process', [
            'layout' => 'vertical',
            'background' => 'ivory',
            'eyebrow' => tx('How it works', 'كيف نعمل'),
            'title' => tx('A clear path to the *right cover*', 'مسار واضح نحو *التغطية المناسبة*'),
            'items' => [
                ['title' => tx('Understand your situation', 'فهم وضعك'), 'text' => tx('Who needs protection, for how much and for how long.', 'من يحتاج إلى الحماية، وبأي مبلغ، ولأي مدة.')],
                ['title' => tx('Explore the options', 'استعراض الخيارات'), 'text' => tx('We present suitable plans and explain how each one works.', 'نعرض الخطط المناسبة ونشرح طريقة عمل كل منها.')],
                ['title' => tx('Compare and decide', 'المقارنة واتخاذ القرار'), 'text' => tx('A like-for-like comparison of cover, conditions and cost.', 'مقارنة متكافئة للتغطية والشروط والتكلفة.')],
                ['title' => tx('Arrange the policy', 'ترتيب الوثيقة'), 'text' => tx('Support with applications, documents and enrolment.', 'الدعم في الطلبات والمستندات والتسجيل.')],
                ['title' => tx('Stay supported', 'دعم مستمر'), 'text' => tx('Reviews when circumstances change, and help during claims.', 'مراجعات عند تغيّر الظروف، ومساعدة أثناء المطالبات.')],
            ],
        ]),
        B('faq', ['source' => 'auto', 'background' => 'white', 'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'), 'title' => tx('Life insurance questions', 'أسئلة حول التأمين على الحياة')]),
        B('related', ['background' => 'mist', 'eyebrow' => tx('Explore more', 'اكتشف المزيد'), 'title' => tx('Related services', 'خدمات ذات صلة')]),
        B('cta_band', [
            'layout' => 'soft',
            'eyebrow' => tx('Life insurance', 'التأمين على الحياة'),
            'title' => tx('Give your people and their families *peace of mind*', 'امنح موظفيك وأسرهم *راحة البال*'),
            'lead' => tx('Tell us who you would like to protect and we will outline suitable options.', 'أخبرنا بمن تودّ حمايتهم وسنعرض عليك الخيارات المناسبة.'),
            'cta_label' => tx('Request a consultation', 'اطلب استشارة'),
            'cta_link' => '/contact#contact-form',
        ]),
    ],
    'faqs' => [
        [tx('Can group life insurance be added to our medical insurance program?', 'هل يمكن إضافة التأمين الجماعي على الحياة إلى برنامج التأمين الطبي لدينا؟'), tx('Group life is often arranged alongside medical insurance as part of one benefits program. We can review both together and explain the options.', 'غالبًا ما يُرتّب التأمين الجماعي على الحياة مع التأمين الطبي ضمن برنامج مزايا واحد، ويمكننا مراجعتهما معًا وشرح الخيارات المتاحة.')],
        [tx('How is the amount of cover decided?', 'كيف يُحدد مبلغ التغطية؟'), tx('For groups it is commonly based on salary multiples or fixed amounts per category. For individuals it depends on family needs, commitments and budget.', 'في التأمين الجماعي يُحدد عادةً بمضاعفات الراتب أو بمبالغ ثابتة لكل فئة، أما في التأمين الفردي فيعتمد على احتياجات الأسرة والالتزامات والميزانية.')],
        [tx('Do you help beneficiaries with claims?', 'هل تساعدون المستفيدين في المطالبات؟'), tx('Yes. We guide beneficiaries on the documents required and follow up with the insurer to make the process as smooth as possible.', 'نعم. نرشد المستفيدين إلى المستندات المطلوبة ونتابع مع شركة التأمين لتسهيل الإجراءات قدر الإمكان.')],
        [tx('Are additional benefits such as critical illness always available?', 'هل تتوفر المزايا الإضافية مثل تغطية الأمراض الحرجة دائمًا؟'), tx('Not always. Additional benefits depend on each insurer’s products and the applicable rules. We will confirm what can be included in your case.', 'ليس دائمًا، فالمزايا الإضافية تعتمد على منتجات كل شركة تأمين والقواعد المعمول بها، وسنؤكد لك ما يمكن تضمينه في حالتك.')],
    ],
    'seo' => SEO(
        tx('Life Insurance for Employees, Businesses & Families', 'التأمين على الحياة للموظفين والشركات والأسر'),
        tx('Group and individual life insurance arranged with clear advice: compare options, understand cover and get support from enrolment to claims with WAFA.', 'تأمين جماعي وفردي على الحياة مع استشارة واضحة: قارن الخيارات وافهم التغطية واحصل على الدعم من التسجيل حتى المطالبات مع وفاء.'),
        tx('life insurance', 'التأمين على الحياة'),
        tx('group life insurance, employee life insurance, individual life cover', 'التأمين الجماعي على الحياة, التأمين على حياة الموظفين, التأمين الفردي على الحياة'),
    ),
];
