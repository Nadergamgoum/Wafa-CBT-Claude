<?php

return [
    'category' => 'insurance',
    'family' => 'medical',
    'slug' => 'medical-insurance',
    'sort' => 1,
    'is_featured' => true,
    'icon' => 'heart-pulse',
    'accent' => 'teal',
    'hero_variant' => 'layered',
    'title' => tx('Corporate Medical Insurance', 'التأمين الطبي للشركات'),
    'nav_title' => tx('Medical Insurance', 'التأمين الطبي'),
    'summary' => tx(
        'Employee medical insurance and health benefits structured around your organization — from needs analysis and insurer coordination to day-to-day program management.',
        'تأمين طبي ومزايا صحية للموظفين مصمّمة حول احتياجات مؤسستك، بدءًا من تحليل الاحتياجات والتنسيق مع شركات التأمين وصولًا إلى إدارة البرنامج يومًا بيوم.'
    ),
    'hero' => [
        'eyebrow' => tx('Corporate Medical Insurance & Employee Health Benefits', 'التأمين الطبي للشركات ومزايا الموظفين الصحية'),
        'title' => tx('Better coverage. Better care. *A better employee experience.*', 'تغطية أفضل. رعاية أفضل. *وتجربة أفضل لموظفيك.*'),
        'lead' => tx(
            'We help organizations design, place and manage medical insurance programs that fit their people and their budget — and we stay involved long after the policy is issued.',
            'نساعد المؤسسات على تصميم برامج التأمين الطبي وترتيبها وإدارتها بما يناسب موظفيها وميزانيتها، ونبقى إلى جانبها بعد إصدار الوثيقة بوقت طويل.'
        ),
        'cta_label' => tx('Request a medical insurance review', 'اطلب مراجعة لبرنامج التأمين الطبي'),
        'cta_link' => '/contact#contact-form',
        'cta2_label' => tx('How we work', 'كيف نعمل'),
        'cta2_link' => '#process-5',
        'highlights' => [
            ['icon' => 'clipboard-check', 'label' => tx('Policy structuring', 'هيكلة الوثيقة')],
            ['icon' => 'network', 'label' => tx('Insurer coordination', 'التنسيق مع شركات التأمين')],
            ['icon' => 'headset', 'label' => tx('Ongoing employee support', 'دعم مستمر للموظفين')],
        ],
    ],
    'sections' => [
        B('challenges', [
            'nav_label' => tx('Challenges', 'التحديات'),
            'layout' => 'grid',
            'background' => 'white',
            'eyebrow' => tx('Why it matters', 'لماذا يهمّ ذلك'),
            'title' => tx('Medical insurance is one of the most *valued* — and most complex — employee benefits', 'التأمين الطبي من أكثر مزايا الموظفين *قيمةً* وأكثرها تعقيدًا'),
            'lead' => tx(
                'Employers want reliable cover for their people while keeping costs sustainable. Getting there means balancing many moving parts.',
                'تسعى المؤسسات إلى توفير تغطية موثوقة لموظفيها مع الحفاظ على تكاليف مستدامة، وتحقيق ذلك يتطلب الموازنة بين عناصر كثيرة متداخلة.'
            ),
            'items' => [
                I('circle-dollar-sign', tx('Rising healthcare costs', 'ارتفاع تكاليف الرعاية الصحية'), tx('Premiums and claims costs change from year to year, making benefits budgets harder to plan.', 'تتغير الأقساط وتكاليف المطالبات من عام لآخر، ما يجعل التخطيط لميزانية المزايا أكثر صعوبة.')),
                I('layers', tx('Plan design choices', 'خيارات تصميم البرنامج'), tx('Networks, limits, co-payments and categories need to reflect real employee needs — not just the lowest quote.', 'يجب أن تعكس الشبكات والحدود ونسب التحمّل وفئات التغطية احتياجات الموظفين الفعلية، لا مجرد أقل عرض سعر.')),
                I('file-text', tx('Administration workload', 'العبء الإداري'), tx('Additions, deletions, card issuance and renewals take time away from HR teams.', 'تستهلك عمليات الإضافة والحذف وإصدار البطاقات والتجديد وقت فرق الموارد البشرية.')),
                I('circle-help', tx('Low employee understanding', 'ضعف فهم الموظفين للتغطية'), tx('When employees don’t understand their cover, they under-use it or feel let down when they need it.', 'عندما لا يفهم الموظفون تغطيتهم، فإنهم لا يستفيدون منها كما ينبغي أو يشعرون بالإحباط عند الحاجة إليها.')),
                I('network', tx('Coordination with insurers', 'التنسيق مع شركات التأمين'), tx('Approvals, claims questions and service issues need a clear point of contact and follow-up.', 'تحتاج الموافقات واستفسارات المطالبات ومشكلات الخدمة إلى جهة تواصل واضحة ومتابعة مستمرة.')),
                I('calendar-check', tx('Renewal pressure', 'ضغط التجديد'), tx('Renewals often arrive with little time to review performance and explore alternatives.', 'كثيرًا ما يأتي موعد التجديد دون وقت كافٍ لمراجعة الأداء ودراسة البدائل.')),
            ],
        ]),
        B('approach', [
            'nav_label' => tx('Our approach', 'منهجيتنا'),
            'background' => 'mist',
            'art' => 'medical-detail',
            'eyebrow' => tx('The WAFA approach', 'منهجية وفاء'),
            'title' => tx('Built around your organization, *not a template*', 'مصمّم حول مؤسستك، *لا وفق قالب جاهز*'),
            'body' => tx(
                'Every organization has a different workforce, budget and set of priorities. We start by understanding yours, then structure, place and manage a program that reflects them.',
                'لكل مؤسسة قوى عاملة وميزانية وأولويات مختلفة. لذلك نبدأ بفهم احتياجاتك، ثم نهيكل البرنامج ونرتّبه ونديره بما يعكسها.'
            ),
            'items' => [
                ['title' => tx('Understand your organizational needs', 'فهم احتياجات مؤسستك'), 'text' => tx('Workforce profile, locations, current cover, budget and the experience you want employees to have.', 'خصائص القوى العاملة والمواقع والتغطية الحالية والميزانية والتجربة التي تريدها لموظفيك.')],
                ['title' => tx('Structure the policy', 'هيكلة الوثيقة'), 'text' => tx('Categories, benefit levels, networks and limits designed to balance protection and cost.', 'فئات التغطية ومستويات المزايا والشبكات والحدود، مصمّمة لتحقيق التوازن بين الحماية والتكلفة.')],
                ['title' => tx('Coordinate with insurers', 'التنسيق مع شركات التأمين'), 'text' => tx('As your insurance broker, we approach insurers, present comparable options and support your decision.', 'بصفتنا وسيط التأمين الخاص بك، نتواصل مع شركات التأمين ونعرض خيارات قابلة للمقارنة وندعم قرارك.')],
                ['title' => tx('Manage and support', 'الإدارة والدعم'), 'text' => tx('Ongoing administration support for HR and practical guidance for employees throughout the policy year.', 'دعم إداري مستمر لفريق الموارد البشرية وإرشاد عملي للموظفين طوال سنة الوثيقة.')],
            ],
        ]),
        B('model', [
            'nav_label' => tx('Management model', 'نموذج الإدارة'),
            'background' => 'white',
            'eyebrow' => tx('Medical insurance management', 'إدارة التأمين الطبي'),
            'title' => tx('A complete management model for your *medical insurance program*', 'نموذج إدارة متكامل *لبرنامج التأمين الطبي*'),
            'lead' => tx(
                'Medical insurance is not a one-time purchase. Our management model covers the full policy cycle, so nothing falls between the cracks.',
                'التأمين الطبي ليس عملية شراء تتم مرة واحدة. يغطي نموذجنا دورة الوثيقة بالكامل حتى لا يغيب أي جانب.'
            ),
            'center_label' => tx('Your medical insurance program', 'برنامج التأمين الطبي لمؤسستك'),
            'items' => [
                ['icon' => 'clipboard-list', 'title' => tx('Plan & structure', 'التخطيط والهيكلة'), 'text' => tx('Needs analysis, benefit design and budget alignment before going to market.', 'تحليل الاحتياجات وتصميم المزايا ومواءمة الميزانية قبل طرح البرنامج على شركات التأمين.'), 'points' => L(['Needs analysis', 'Benefit design', 'Budget planning'], ['تحليل الاحتياجات', 'تصميم المزايا', 'تخطيط الميزانية'])],
                ['icon' => 'scale', 'title' => tx('Place & compare', 'الطرح والمقارنة'), 'text' => tx('Approaching insurers, comparing proposals like-for-like and supporting negotiation.', 'التواصل مع شركات التأمين ومقارنة العروض على أسس متكافئة ودعم التفاوض.'), 'points' => L(['Insurer approach', 'Like-for-like comparison', 'Recommendation'], ['التواصل مع شركات التأمين', 'مقارنة متكافئة', 'التوصية'])],
                ['icon' => 'users', 'title' => tx('Administer & support', 'الإدارة والدعم'), 'text' => tx('Enrolment, member changes and help for employees and HR throughout the year.', 'التسجيل وتعديلات الأعضاء ومساعدة الموظفين وفريق الموارد البشرية على مدار العام.'), 'points' => L(['Enrolment', 'Member changes', 'Employee guidance'], ['التسجيل', 'تعديلات الأعضاء', 'إرشاد الموظفين'])],
                ['icon' => 'refresh-cw', 'title' => tx('Review & optimize', 'المراجعة والتحسين'), 'text' => tx('Periodic reviews and renewal preparation based on how the program is actually used.', 'مراجعات دورية والاستعداد للتجديد بناءً على الاستخدام الفعلي للبرنامج.'), 'points' => L(['Program review', 'Renewal preparation', 'Improvements'], ['مراجعة البرنامج', 'الاستعداد للتجديد', 'التحسينات'])],
            ],
        ]),
        B('ecosystem', [
            'nav_label' => tx('Ecosystem', 'المنظومة'),
            'background' => 'ivory',
            'eyebrow' => tx('Health & benefits ecosystem', 'منظومة الصحة والمزايا'),
            'title' => tx('Medical insurance works best as part of a *wider people strategy*', 'يحقق التأمين الطبي أفضل نتائجه ضمن *استراتيجية أشمل للموارد البشرية*'),
            'lead' => tx(
                'Because WAFA also works in HR consulting, training and coaching, we can connect your benefits program to the way you attract, develop and retain people.',
                'ولأن وفاء تعمل أيضًا في الاستشارات والتدريب والكوتشينغ، يمكننا ربط برنامج المزايا بطريقة استقطابك لموظفيك وتطويرهم والحفاظ عليهم.'
            ),
            'center_label' => tx('Your people', 'موظفوك'),
            'center_text' => tx('at the centre', 'في المركز'),
            'items' => [
                I('heart-pulse', tx('Medical insurance', 'التأمين الطبي'), tx('The core of employee health protection.', 'جوهر الحماية الصحية للموظفين.')),
                I('hand-heart', tx('Employee benefits', 'مزايا الموظفين'), tx('Life cover and other benefits that complete the package.', 'التأمين على الحياة ومزايا أخرى تكمل الحزمة.')),
                I('sun-medium', tx('Wellbeing', 'الرفاه'), tx('Awareness that helps employees use their cover well.', 'توعية تساعد الموظفين على الاستفادة المثلى من تغطيتهم.')),
                I('briefcase', tx('HR strategy', 'استراتيجية الموارد البشرية'), tx('Benefits aligned with policies, grades and structure.', 'مزايا متوافقة مع السياسات والدرجات الوظيفية والهيكل.')),
                I('graduation-cap', tx('Learning', 'التعلّم'), tx('Training that builds capability across teams.', 'تدريب يبني القدرات على مستوى الفرق.')),
                I('compass', tx('Leadership', 'القيادة'), tx('Coaching that supports the people who lead them.', 'كوتشينغ يدعم من يقودون هذه الفرق.')),
            ],
        ]),
        B('experience', [
            'nav_label' => tx('Employee experience', 'تجربة الموظف'),
            'background' => 'white',
            'eyebrow' => tx('Employee experience', 'تجربة الموظف'),
            'title' => tx('Support at every *moment that matters*', 'دعم في كل *لحظة مهمة*'),
            'lead' => tx(
                'A good policy on paper is only half the story. We focus on the moments where employees actually experience their medical insurance.',
                'الوثيقة الجيدة على الورق ليست سوى نصف القصة. لذلك نركّز على اللحظات التي يعيش فيها الموظف تجربته الفعلية مع التأمين الطبي.'
            ),
            'items' => [
                ['icon' => 'user-check', 'title' => tx('Joining & enrolment', 'الانضمام والتسجيل'), 'text' => tx('New joiners are added correctly and on time, with clear information about their cover from day one.', 'يُضاف الموظفون الجدد بدقة وفي الوقت المناسب، مع معلومات واضحة عن تغطيتهم منذ اليوم الأول.'), 'points' => L(['Accurate member data', 'Timely additions', 'Welcome information'], ['بيانات أعضاء دقيقة', 'إضافات في وقتها', 'معلومات ترحيبية'])],
                ['icon' => 'book-open', 'title' => tx('Understanding the cover', 'فهم التغطية'), 'text' => tx('Simple explanations of networks, limits and co-payments, so employees know what to expect.', 'شرح مبسّط للشبكات والحدود ونسب التحمّل، حتى يعرف الموظفون ما يمكن توقعه.'), 'points' => L(['Plain-language guides', 'Benefit summaries', 'Awareness sessions'], ['أدلة بلغة مبسّطة', 'ملخصات المزايا', 'جلسات توعوية'])],
                ['icon' => 'hospital', 'title' => tx('Accessing care', 'الحصول على الرعاية'), 'text' => tx('Guidance on using the provider network and what to do when an approval is needed.', 'إرشاد حول استخدام شبكة مقدمي الخدمة وما يجب فعله عند الحاجة إلى موافقة مسبقة.'), 'points' => L(['Network guidance', 'Approval follow-up', 'Escalation support'], ['إرشاد حول الشبكة', 'متابعة الموافقات', 'دعم التصعيد'])],
                ['icon' => 'receipt', 'title' => tx('Claims & reimbursements', 'المطالبات والتعويضات'), 'text' => tx('Help preparing claims correctly and following up with the insurer when questions arise.', 'المساعدة في إعداد المطالبات بشكل صحيح ومتابعتها مع شركة التأمين عند ظهور أي استفسار.'), 'points' => L(['Claim preparation', 'Insurer follow-up', 'Status updates'], ['إعداد المطالبات', 'المتابعة مع شركة التأمين', 'إفادات بالحالة'])],
                ['icon' => 'refresh-cw', 'title' => tx('Renewal & feedback', 'التجديد والملاحظات'), 'text' => tx('Employee feedback and program experience feed into the next renewal.', 'تُبنى ملاحظات الموظفين وتجربتهم مع البرنامج في قرارات التجديد التالي.'), 'points' => L(['Feedback collection', 'Service review', 'Renewal input'], ['جمع الملاحظات', 'مراجعة الخدمة', 'مدخلات للتجديد'])],
            ],
        ]),
        B('process', [
            'nav_label' => tx('Process', 'المراحل'),
            'anchor' => 'process-5',
            'layout' => 'timeline',
            'background' => 'mist',
            'eyebrow' => tx('Medical insurance journey', 'رحلة التأمين الطبي'),
            'title' => tx('Seven steps from first conversation to *continuous improvement*', 'سبع خطوات من المحادثة الأولى إلى *التحسين المستمر*'),
            'items' => [
                ['title' => tx('Understand', 'الفهم'), 'text' => tx('Your workforce, priorities and current cover.', 'قواك العاملة وأولوياتك وتغطيتك الحالية.')],
                ['title' => tx('Assess', 'التقييم'), 'text' => tx('What works today and where the gaps are.', 'ما الذي ينجح حاليًا وأين تكمن الفجوات.')],
                ['title' => tx('Design', 'التصميم'), 'text' => tx('Categories, benefits and budget structure.', 'فئات التغطية والمزايا وهيكل الميزانية.')],
                ['title' => tx('Compare', 'المقارنة'), 'text' => tx('Insurer proposals reviewed like-for-like.', 'مراجعة عروض شركات التأمين على أسس متكافئة.')],
                ['title' => tx('Implement', 'التنفيذ'), 'text' => tx('Enrolment, cards and employee communication.', 'التسجيل والبطاقات والتواصل مع الموظفين.')],
                ['title' => tx('Manage', 'الإدارة'), 'text' => tx('Day-to-day support for HR and employees.', 'دعم يومي لفريق الموارد البشرية والموظفين.')],
                ['title' => tx('Optimize', 'التحسين'), 'text' => tx('Review results and prepare a stronger renewal.', 'مراجعة النتائج والاستعداد لتجديد أقوى.')],
            ],
            'cta_label' => tx('Start with a review', 'ابدأ بمراجعة شاملة'),
            'cta_link' => '/contact#contact-form',
        ]),
        B('faq', [
            'nav_label' => tx('FAQ', 'الأسئلة الشائعة'),
            'source' => 'auto',
            'background' => 'white',
            'eyebrow' => tx('FAQ', 'الأسئلة الشائعة'),
            'title' => tx('Questions employers ask about *medical insurance*', 'أسئلة يطرحها أصحاب العمل حول *التأمين الطبي*'),
        ]),
        B('related', [
            'background' => 'mist',
            'eyebrow' => tx('Complete the package', 'أكمل الحزمة'),
            'title' => tx('Related services', 'خدمات ذات صلة'),
        ]),
        B('cta_band', [
            'layout' => 'image',
            'art' => 'cta',
            'eyebrow' => tx('Medical insurance review', 'مراجعة التأمين الطبي'),
            'title' => tx('Let’s build a medical insurance program your people *can rely on*', 'لنبنِ معًا برنامج تأمين طبي *يعتمد عليه موظفوك*'),
            'lead' => tx('Share your current situation and our team will suggest a practical next step — whether you are renewing, switching or starting fresh.', 'شاركنا وضعك الحالي، وسيقترح فريقنا الخطوة العملية التالية، سواء كنت تجدد أو تنتقل أو تبدأ من جديد.'),
            'cta_label' => tx('Talk to our experts', 'تحدّث إلى خبرائنا'),
            'cta_link' => '/contact#contact-form',
            'cta2_label' => tx('Chat on WhatsApp', 'تواصل عبر واتساب'),
            'cta2_link' => '@whatsapp',
        ]),
    ],
    'faqs' => [
        [tx('What does WAFA do as a medical insurance broker?', 'ما الدور الذي تقوم به وفاء بصفتها وسيط تأمين طبي؟'), tx('We work on your side: understanding your needs, structuring the policy, approaching insurers, comparing their proposals and supporting you and your employees throughout the policy year, including renewals.', 'نعمل لصالحك: نفهم احتياجاتك ونهيكل الوثيقة ونتواصل مع شركات التأمين ونقارن عروضها، ثم ندعمك وندعم موظفيك طوال سنة الوثيقة بما في ذلك التجديد.')],
        [tx('Can you review our existing medical insurance policy?', 'هل يمكنكم مراجعة وثيقة التأمين الطبي الحالية لدينا؟'), tx('Yes. A review of your current cover, how it is used and what employees experience is often the best starting point — especially ahead of a renewal.', 'نعم. غالبًا ما تكون مراجعة تغطيتك الحالية وطريقة استخدامها وتجربة الموظفين معها أفضل نقطة بداية، خاصةً قبل موعد التجديد.')],
        [tx('Do you work with small and growing companies?', 'هل تعملون مع الشركات الصغيرة والناشئة؟'), tx('Yes. Program design depends on your size and needs, and we help organizations at different stages structure cover that is appropriate for them.', 'نعم. يعتمد تصميم البرنامج على حجم مؤسستك واحتياجاتها، ونساعد المؤسسات في مراحل نموها المختلفة على هيكلة تغطية مناسبة لها.')],
        [tx('How do you compare offers from different insurers?', 'كيف تقارنون العروض المقدمة من شركات التأمين المختلفة؟'), tx('We put proposals side by side on a like-for-like basis — benefits, limits, networks, conditions and cost — and explain the trade-offs so you can make an informed decision.', 'نضع العروض جنبًا إلى جنب على أسس متكافئة من حيث المزايا والحدود والشبكات والشروط والتكلفة، ونوضح الفروق بينها لتتخذ قرارًا مدروسًا.')],
        [tx('What support do employees receive during the year?', 'ما الدعم الذي يحصل عليه الموظفون خلال العام؟'), tx('Employees can get guidance on understanding their cover, using the network, approvals and claims follow-up. HR teams receive support with member changes and administration.', 'يحصل الموظفون على إرشاد لفهم تغطيتهم واستخدام الشبكة ومتابعة الموافقات والمطالبات، ويحصل فريق الموارد البشرية على دعم في تعديلات الأعضاء والمهام الإدارية.')],
        [tx('When should we start preparing for renewal?', 'متى يجب أن نبدأ الاستعداد للتجديد؟'), tx('Ideally well before the renewal date, so there is time to review performance, gather feedback and explore alternatives without pressure.', 'يُفضّل البدء قبل موعد التجديد بوقت كافٍ لإتاحة الفرصة لمراجعة الأداء وجمع الملاحظات ودراسة البدائل دون ضغط.')],
    ],
    'seo' => SEO(
        tx('Corporate Medical Insurance & Employee Health Benefits', 'التأمين الطبي للشركات ومزايا الموظفين الصحية'),
        tx('Corporate medical insurance for companies: employee medical insurance design, insurer coordination, medical insurance management and employee support from WAFA.', 'التأمين الطبي للشركات من وفاء: تصميم التأمين الصحي للموظفين، والتنسيق مع شركات التأمين، وإدارة التأمين الطبي، ودعم الموظفين.'),
        tx('corporate medical insurance', 'التأمين الطبي للشركات'),
        tx('employee medical insurance, health insurance for companies, employee health benefits, medical insurance management, corporate health benefits', 'التأمين الصحي للموظفين, إدارة التأمين الطبي, مزايا الموظفين الصحية, حلول التأمين الطبي للشركات'),
    ),
];
