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
        'Comprehensive health coverage with trusted care — corporate medical insurance designed, negotiated and managed around your workforce, from claims and approvals to analytics and renewals.',
        'تغطية صحية شاملة ورعاية موثوقة: تأمين طبي للشركات يُصمَّم ويُفاوَض عليه ويُدار وفق قواك العاملة، من المطالبات والموافقات إلى التحليلات والتجديد.'
    ),
    'hero' => [
        'eyebrow' => tx('Corporate Medical Insurance & Employee Health Benefits', 'التأمين الطبي للشركات ومزايا الموظفين الصحية'),
        'title' => tx('Better coverage. Better care. *A better employee experience.*', 'تغطية أفضل. رعاية أفضل. *وتجربة أفضل لموظفيك.*'),
        'lead' => tx(
            'Our goal is to balance service quality and cost efficiency while maintaining a seamless experience for clients and employees — from program design and insurer negotiation to claims, reporting and renewal.',
            'هدفنا تحقيق التوازن بين جودة الخدمة وكفاءة التكلفة مع الحفاظ على تجربة سلسة للعملاء والموظفين، من تصميم البرنامج والتفاوض مع شركات التأمين إلى المطالبات والتقارير والتجديد.'
        ),
        'cta_label' => tx('Request a medical insurance review', 'اطلب مراجعة لبرنامج التأمين الطبي'),
        'cta_link' => '/contact#contact-form',
        'cta2_label' => tx('How we work', 'كيف نعمل'),
        'cta2_link' => '#process-5',
        'highlights' => [
            ['icon' => 'clipboard-check', 'label' => tx('Program design & negotiation', 'تصميم البرنامج والتفاوض')],
            ['icon' => 'file-check', 'label' => tx('Claims & approvals management', 'إدارة المطالبات والموافقات')],
            ['icon' => 'chart-column', 'label' => tx('Analytics & reporting', 'التحليلات والتقارير')],
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
            'eyebrow' => tx('Comprehensive medical insurance management', 'الإدارة الشاملة للتأمين الطبي'),
            'title' => tx('Built around your workforce, *not a template*', 'مصمّم حول قواك العاملة، *لا وفق قالب جاهز*'),
            'body' => tx(
                'Every organization has a different workforce, budget and set of priorities. We design the program around yours, negotiate it with insurers and manage it through every renewal.',
                'لكل مؤسسة قوى عاملة وميزانية وأولويات مختلفة. نصمّم البرنامج وفق احتياجاتك، ونتفاوض عليه مع شركات التأمين، ونديره عبر كل تجديد.'
            ),
            'items' => [
                ['title' => tx('Program design tailored to each workforce', 'تصميم برنامج مخصّص لكل قوة عاملة'), 'text' => tx('Categories, benefit levels, networks and limits shaped around your people and budget.', 'فئات التغطية ومستويات المزايا والشبكات والحدود مصمّمة وفق موظفيك وميزانيتك.')],
                ['title' => tx('Negotiation and comparison with multiple insurance providers', 'التفاوض والمقارنة مع عدة شركات تأمين'), 'text' => tx('As your broker, we approach several insurers and compare their proposals like-for-like.', 'بصفتنا وسيط التأمين الخاص بك، نتواصل مع عدة شركات تأمين ونقارن عروضها على أسس متكافئة.')],
                ['title' => tx('Policy implementation and renewal management', 'تنفيذ الوثيقة وإدارة التجديد'), 'text' => tx('Enrolment, policy updates (additions and deletions) and well-prepared renewals.', 'التسجيل وتحديثات الوثيقة (الإضافات والحذف) والاستعداد الجيد للتجديد.')],
                ['title' => tx('Claims and pre-approval administration', 'إدارة المطالبات والموافقات المسبقة'), 'text' => tx('Review, verification and follow-up of claims and pre-approvals with insurers and TPAs.', 'مراجعة المطالبات والموافقات المسبقة والتحقق منها ومتابعتها مع شركات التأمين وشركات إدارة النفقات الطبية.')],
                ['title' => tx('Regular analytical and financial reporting', 'تقارير تحليلية ومالية دورية'), 'text' => tx('Clear reporting on spending, usage and trends to support decisions.', 'تقارير واضحة عن الإنفاق والاستخدام والاتجاهات لدعم اتخاذ القرار.')],
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
                ['icon' => 'clipboard-list', 'title' => tx('Plan & structure', 'التخطيط والهيكلة'), 'text' => tx('Program design tailored to your workforce and budget before going to market.', 'تصميم برنامج مخصّص لقواك العاملة وميزانيتك قبل طرحه على شركات التأمين.'), 'points' => L(['Workforce needs', 'Benefit design', 'Budget alignment'], ['احتياجات القوى العاملة', 'تصميم المزايا', 'مواءمة الميزانية'])],
                ['icon' => 'scale', 'title' => tx('Place & compare', 'الطرح والمقارنة'), 'text' => tx('Negotiation and comparison with multiple insurance providers.', 'التفاوض والمقارنة مع عدة شركات تأمين.'), 'points' => L(['Multiple insurers', 'Like-for-like comparison', 'Negotiation'], ['عدة شركات تأمين', 'مقارنة متكافئة', 'التفاوض'])],
                ['icon' => 'users', 'title' => tx('Administer & support', 'الإدارة والدعم'), 'text' => tx('Policy implementation, additions and deletions, and claims and pre-approval administration.', 'تنفيذ الوثيقة والإضافات والحذف وإدارة المطالبات والموافقات المسبقة.'), 'points' => L(['Implementation', 'Additions & deletions', 'Claims & pre-approvals'], ['التنفيذ', 'الإضافات والحذف', 'المطالبات والموافقات المسبقة'])],
                ['icon' => 'refresh-cw', 'title' => tx('Review & optimize', 'المراجعة والتحسين'), 'text' => tx('Regular analytical and financial reporting, quality audits and renewal management.', 'تقارير تحليلية ومالية دورية وتدقيق للجودة وإدارة التجديد.'), 'points' => L(['Reporting', 'Quality audits', 'Renewal management'], ['التقارير', 'تدقيق الجودة', 'إدارة التجديد'])],
            ],
        ]),
        B('ecosystem', [
            'nav_label' => tx('Ecosystem', 'المنظومة'),
            'background' => 'ivory',
            'eyebrow' => tx('Health & benefits ecosystem', 'منظومة الصحة والمزايا'),
            'title' => tx('Medical insurance works best as part of a *wider people strategy*', 'يحقق التأمين الطبي أفضل نتائجه ضمن *استراتيجية أشمل للموارد البشرية*'),
            'lead' => tx(
                'Because WAFA also works in HR consulting, training and coaching, we can connect your benefits program to the way you attract, develop and retain people.',
                'ولأن WAFA تعمل أيضًا في الاستشارات والتدريب والكوتشينغ، يمكننا ربط برنامج المزايا بطريقة استقطابك لموظفيك وتطويرهم والحفاظ عليهم.'
            ),
            'center_label' => tx('Your people', 'موظفوك'),
            'center_text' => tx('at the centre', 'في المركز'),
            'items' => [
                I('heart-pulse', tx('Medical insurance', 'التأمين الطبي'), tx('The core of employee health protection.', 'جوهر الحماية الصحية للموظفين.')),
                I('hand-heart', tx('Employee benefits', 'مزايا الموظفين'), tx('Life cover and other benefits that complete the package.', 'التأمين على الحياة ومزايا أخرى تكمل الحزمة.')),
                I('sun-medium', tx('Wellbeing', 'الرفاه'), tx('Awareness that helps employees use their cover well.', 'توعية تساعد الموظفين على الاستفادة المثلى من تغطيتهم.')),
                I('briefcase', tx('HR strategy', 'استراتيجية الموارد البشرية'), tx('Benefits aligned with policies and structure.', 'مزايا متوافقة مع السياسات والهيكل التنظيمي.')),
                I('graduation-cap', tx('Learning', 'التعلّم'), tx('Training that builds capability across teams.', 'تدريب يبني القدرات على مستوى الفرق.')),
                I('compass', tx('Leadership', 'القيادة'), tx('Coaching that supports the people who lead them.', 'كوتشينغ يدعم من يقودون هذه الفرق.')),
            ],
        ]),
        B('process', [
            'nav_label' => tx('Claims & approvals', 'المطالبات والموافقات'),
            'layout' => 'chevrons',
            'background' => 'white',
            'eyebrow' => tx('Claims & approvals management', 'إدارة المطالبات والموافقات'),
            'title' => tx('Every claim reviewed, verified and *followed through*', 'كل مطالبة تُراجع وتُدقّق *وتُتابع حتى النهاية*'),
            'lead' => tx('A structured claims workflow that protects employees and the organization alike.', 'مسار منظّم للمطالبات يحمي الموظفين والمؤسسة على حد سواء.'),
            'items' => [
                ['icon' => 'file-search', 'title' => tx('Review', 'المراجعة'), 'text' => tx('Review of all submitted medical claims and invoices.', 'مراجعة جميع المطالبات والفواتير الطبية المقدّمة.')],
                ['icon' => 'shield-check', 'title' => tx('Verify', 'التحقق'), 'text' => tx('Verification against policy coverage and limits.', 'التحقق من مطابقتها لتغطية الوثيقة وحدودها.')],
                ['icon' => 'network', 'title' => tx('Coordinate', 'التنسيق'), 'text' => tx('Coordination with insurers and TPAs for prompt approval.', 'التنسيق مع شركات التأمين وشركات إدارة النفقات الطبية للحصول على الموافقة دون تأخير.')],
                ['icon' => 'activity', 'title' => tx('Monitor', 'المتابعة'), 'text' => tx('Continuous monitoring of inpatient and critical cases.', 'متابعة مستمرة لحالات الإقامة بالمستشفى والحالات الحرجة.')],
                ['icon' => 'gauge', 'title' => tx('Track KPIs', 'تتبّع المؤشرات'), 'text' => tx('KPI tracking to measure service speed and quality.', 'تتبّع مؤشرات الأداء لقياس سرعة الخدمة وجودتها.')],
                ['icon' => 'calendar-check', 'title' => tx('Report monthly', 'تقارير شهرية'), 'text' => tx('Claim volume, approval rate and average settlement time.', 'حجم المطالبات ونسبة الموافقة ومتوسط مدة التسوية.')],
            ],
        ]),
        B('reporting', [
            'nav_label' => tx('Analytics', 'التحليلات'),
            'background' => 'mist',
            'eyebrow' => tx('Medical analytics & reporting', 'التحليلات والتقارير الطبية'),
            'title' => tx('Decisions based on *how your program is really used*', 'قرارات مبنية على *الاستخدام الفعلي لبرنامجك*'),
            'lead' => tx('Regular analytical and financial reporting gives HR and management a clear view of spending, trends and risk.', 'تمنح التقارير التحليلية والمالية الدورية فريقي الموارد البشرية والإدارة رؤية واضحة للإنفاق والاتجاهات والمخاطر.'),
            'panel_title' => tx('Executive dashboard', 'لوحة متابعة الإدارة'),
            'items' => [
                I('chart-column', tx('Spending reports', 'تقارير الإنفاق'), tx('Monthly and annual spending reports.', 'تقارير إنفاق شهرية وسنوية.')),
                I('trending-up', tx('Trends & forecasting', 'الاتجاهات والتوقعات'), tx('Trend analysis and cost forecasting.', 'تحليل الاتجاهات وتوقّع التكاليف.')),
                I('heart-pulse', tx('Chronic & repeat cases', 'الحالات المزمنة والمتكررة'), tx('Tracking of chronic disease and repeat cases.', 'متابعة الأمراض المزمنة والحالات المتكررة.')),
                I('building-2', tx('Branch & department comparisons', 'مقارنات الفروع والإدارات'), tx('Comparisons across branches and departments.', 'مقارنات بين الفروع والإدارات.')),
                I('monitor', tx('Interactive dashboards', 'لوحات متابعة تفاعلية'), tx('Interactive dashboards for executive review.', 'لوحات متابعة تفاعلية لمراجعة الإدارة العليا.'), ['points' => L(['Claim volume', 'Approval rate', 'Average settlement time'], ['حجم المطالبات', 'نسبة الموافقة', 'متوسط مدة التسوية'])]),
            ],
        ]),
        B('split_feature', [
            'nav_label' => tx('Wellness', 'الرفاه'),
            'background' => 'white',
            'image_side' => 'start',
            'art' => 'people',
            'eyebrow' => tx('Wellness & awareness programs', 'برامج الرفاه والتوعية'),
            'title' => tx('Prevention reduces medical costs and *promotes productivity*', 'الوقاية تخفّض التكاليف الطبية *وتعزّز الإنتاجية*'),
            'body' => tx('We help clients foster a health-conscious workplace culture.', 'نساعد عملاءنا على ترسيخ ثقافة صحية واعية في بيئة العمل.'),
            'points' => L(
                ['Health-awareness campaigns and digital materials', 'Wellness campaigns and team building activities', 'Preventive tele-consultations', 'Progress reports on employee health indicators', 'Chronic case follow-up plans', 'Personalized tips and sessions on nutrition and daily wellness habits'],
                ['حملات توعية صحية ومواد رقمية', 'حملات للرفاه وأنشطة لبناء روح الفريق', 'استشارات وقائية عن بُعد', 'تقارير متابعة لمؤشرات صحة الموظفين', 'خطط متابعة للحالات المزمنة', 'نصائح وجلسات شخصية حول التغذية وعادات الرفاه اليومية']
            ),
            'aside_title' => tx('Part of the program', 'جزء من البرنامج'),
            'aside_text' => tx('Wellness activities complement the medical program rather than standing apart from it.', 'تكمّل أنشطة الرفاه البرنامج الطبي ولا تنفصل عنه.'),
        ]),
        B('outcomes', [
            'nav_label' => tx('Account management', 'إدارة الحساب'),
            'background' => 'dark',
            'eyebrow' => tx('Account management', 'إدارة الحساب'),
            'title' => tx('A dedicated team, *close to your HR*', 'فريق مخصّص *قريب من فريق الموارد البشرية لديك*'),
            'lead' => tx('Day-to-day coordination and regular reviews keep the program running smoothly.', 'التنسيق اليومي والمراجعات المنتظمة يضمنان سير البرنامج بسلاسة.'),
            'items' => [
                ['title' => tx('Dedicated Account Manager', 'مدير حساب مخصّص'), 'text' => tx('For day-to-day coordination and performance review.', 'للتنسيق اليومي ومراجعة الأداء.')],
                ['title' => tx('Daily support', 'دعم يومي'), 'text' => tx('Via email, phone or WhatsApp.', 'عبر البريد الإلكتروني أو الهاتف أو واتساب.')],
                ['title' => tx('Monthly review meetings', 'اجتماعات مراجعة شهرية'), 'text' => tx('With your HR team.', 'مع فريق الموارد البشرية لديك.')],
                ['title' => tx('Regular policy updates', 'تحديثات دورية للوثيقة'), 'text' => tx('Additions and deletions handled accurately.', 'تنفيذ الإضافات والحذف بدقة.')],
                ['title' => tx('Service quality evaluation', 'تقييم جودة الخدمة'), 'text' => tx('And continuous improvement.', 'والتحسين المستمر.')],
            ],
        ]),
        B('pillars', [
            'nav_label' => tx('Advantages', 'المزايا'),
            'layout' => 'lines',
            'background' => 'white',
            'eyebrow' => tx('Key advantages', 'أبرز المزايا'),
            'title' => tx('What you can *expect from us*', 'ما يمكنك *أن تتوقعه منا*'),
            'items' => [
                I('users-round', tx('Specialized team', 'فريق متخصص'), tx('A specialized team in medical brokerage and claims management.', 'فريق متخصص في الوساطة الطبية وإدارة المطالبات.')),
                I('chart-column', tx('Detailed analytics', 'تحليلات تفصيلية'), tx('Detailed analytics and performance reports.', 'تحليلات تفصيلية وتقارير أداء.')),
                I('badge-check', tx('Follow-up & quality audits', 'المتابعة وتدقيق الجودة'), tx('Post-service follow-up and quality audits.', 'متابعة ما بعد الخدمة وتدقيق الجودة.')),
            ],
        ]),
        // PENDING APPROVAL — not shown on the website. These two claims appeared on the original
        // site but have not been confirmed by WAFA. Turn on “Show this section” only once approved.
        [
            'type' => 'pillars',
            'data' => [
                'visible' => false,
                'layout' => 'lines',
                'background' => 'white',
                'eyebrow' => tx('PENDING APPROVAL — service commitments', 'بانتظار الاعتماد — التزامات الخدمة'),
                'title' => tx('Service *commitments*', '*التزامات* الخدمة'),
                'items' => [
                    I('zap', tx('Fast turnaround', 'سرعة الإنجاز'), tx('Fast turnaround on requests and approvals.', 'سرعة في إنجاز الطلبات والموافقات.')),
                    I('clock', tx('24/7 client support', 'دعم العملاء على مدار الساعة'), tx('24/7 client support and case tracking.', 'دعم العملاء ومتابعة الحالات على مدار الساعة طوال أيام الأسبوع.')),
                ],
            ],
        ],
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
        [tx('What does WAFA do as a medical insurance broker?', 'ما الدور الذي تقوم به WAFA بصفتها وسيط تأمين طبي؟'), tx('We work on your side: understanding your needs, structuring the policy, approaching insurers, comparing their proposals and supporting you and your employees throughout the policy year, including renewals.', 'نعمل لصالحك: نفهم احتياجاتك ونهيكل الوثيقة ونتواصل مع شركات التأمين ونقارن عروضها، ثم ندعمك وندعم موظفيك طوال سنة الوثيقة بما في ذلك التجديد.')],
        [tx('Can you review our existing medical insurance policy?', 'هل يمكنكم مراجعة وثيقة التأمين الطبي الحالية لدينا؟'), tx('Yes. A review of your current cover, how it is used and what employees experience is often the best starting point — especially ahead of a renewal.', 'نعم. غالبًا ما تكون مراجعة تغطيتك الحالية وطريقة استخدامها وتجربة الموظفين معها أفضل نقطة بداية، خاصةً قبل موعد التجديد.')],
        [tx('Do you work with small and growing companies?', 'هل تعملون مع الشركات الصغيرة والناشئة؟'), tx('Yes. Program design depends on your size and needs, and we help organizations at different stages structure cover that is appropriate for them.', 'نعم. يعتمد تصميم البرنامج على حجم مؤسستك واحتياجاتها، ونساعد المؤسسات في مراحل نموها المختلفة على هيكلة تغطية مناسبة لها.')],
        [tx('How do you compare offers from different insurers?', 'كيف تقارنون العروض المقدمة من شركات التأمين المختلفة؟'), tx('We put proposals side by side on a like-for-like basis — benefits, limits, networks, conditions and cost — and explain the trade-offs so you can make an informed decision.', 'نضع العروض جنبًا إلى جنب على أسس متكافئة من حيث المزايا والحدود والشبكات والشروط والتكلفة، ونوضح الفروق بينها لتتخذ قرارًا مدروسًا.')],
        [tx('What support do employees receive during the year?', 'ما الدعم الذي يحصل عليه الموظفون خلال العام؟'), tx('A dedicated Account Manager coordinates day to day, with daily support via email, phone or WhatsApp. Employees get guidance on their cover, approvals and claims follow-up, and HR teams receive support with additions, deletions and monthly reviews.', 'يتولى مدير حساب مخصّص التنسيق اليومي، مع دعم يومي عبر البريد الإلكتروني أو الهاتف أو واتساب. ويحصل الموظفون على إرشاد حول تغطيتهم والموافقات ومتابعة المطالبات، ويحصل فريق الموارد البشرية على دعم في الإضافات والحذف والمراجعات الشهرية.')],
        [tx('What reporting do we receive?', 'ما التقارير التي نحصل عليها؟'), tx('Regular analytical and financial reporting: monthly and annual spending, trend analysis and cost forecasting, chronic and repeat-case tracking, branch or department comparisons and claims KPIs such as claim volume, approval rate and average settlement time.', 'تقارير تحليلية ومالية دورية تشمل الإنفاق الشهري والسنوي، وتحليل الاتجاهات وتوقّع التكاليف، ومتابعة الحالات المزمنة والمتكررة، ومقارنات الفروع أو الإدارات، ومؤشرات المطالبات مثل حجمها ونسبة الموافقة ومتوسط مدة التسوية.')],
        [tx('When should we start preparing for renewal?', 'متى يجب أن نبدأ الاستعداد للتجديد؟'), tx('Ideally well before the renewal date, so there is time to review performance, gather feedback and explore alternatives without pressure.', 'يُفضّل البدء قبل موعد التجديد بوقت كافٍ لإتاحة الفرصة لمراجعة الأداء وجمع الملاحظات ودراسة البدائل دون ضغط.')],
    ],
    'seo' => SEO(
        tx('Corporate Medical Insurance & Employee Health Benefits', 'التأمين الطبي للشركات ومزايا الموظفين الصحية'),
        tx('Corporate medical insurance management in Egypt: program design, insurer negotiation, claims and approvals, medical analytics, wellness programs and dedicated account management from WAFA.', 'إدارة التأمين الطبي للشركات في مصر من WAFA: تصميم البرنامج، والتفاوض مع شركات التأمين، والمطالبات والموافقات، والتحليلات الطبية، وبرامج الرفاه، وإدارة حساب مخصّصة.'),
        tx('corporate medical insurance', 'التأمين الطبي للشركات'),
        tx('employee medical insurance, health insurance for companies, employee health benefits, medical insurance management, corporate health benefits', 'التأمين الصحي للموظفين, إدارة التأمين الطبي, مزايا الموظفين الصحية, حلول التأمين الطبي للشركات'),
    ),
];
