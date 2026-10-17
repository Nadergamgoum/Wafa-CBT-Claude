<?php

// Educational articles. They contain general guidance only — no client data, statistics or claims.
return [
    'categories' => [
        ['slug' => 'medical-insurance', 'name' => tx('Medical insurance', 'التأمين الطبي')],
        ['slug' => 'hr-organization', 'name' => tx('HR & organization', 'الموارد البشرية والمؤسسة')],
        ['slug' => 'learning-leadership', 'name' => tx('Learning & leadership', 'التعلّم والقيادة')],
    ],
    'posts' => [
        [
            'category' => 'medical-insurance', 'slug' => 'corporate-medical-insurance-employees-understand', 'is_featured' => true, 'days_ago' => 6,
            'title' => tx('How to Structure a Corporate Medical Insurance Program Your Employees Actually Understand', 'كيف تهيكل برنامج تأمين طبي للشركات يفهمه موظفوك فعلًا'),
            'excerpt' => tx('A strong medical insurance policy can still disappoint if employees do not understand it. Here is how to design and communicate a program people can use with confidence.', 'قد تخيّب وثيقة التأمين الطبي القوية آمال الموظفين إذا لم يفهموها. إليك كيف تصمّم برنامجًا وتشرحه ليستخدمه الموظفون بثقة.'),
            'tags' => ['en' => ['Medical insurance', 'Employee benefits', 'HR'], 'ar' => ['التأمين الطبي', 'مزايا الموظفين', 'الموارد البشرية']],
            'body' => tx(
'<p>Corporate medical insurance is often one of the largest benefit investments an employer makes. Yet many organizations discover that employees only learn how their cover works at the worst possible moment — when they or a family member need care.</p>
<p>Clarity is not a “nice to have”. When employees understand their medical insurance, they use the right providers, avoid unexpected costs and feel more confident in the support their employer provides.</p>
<h2>Start with a structure that makes sense</h2>
<p>The way a program is structured has a big impact on how easy it is to understand. Before going to market, it helps to agree a few principles:</p>
<ul><li><strong>Clear categories.</strong> Group employees into a small number of categories with consistent rules, rather than many exceptions.</li><li><strong>Meaningful differences.</strong> If categories differ, the differences should be easy to explain — for example, network access or annual limits.</li><li><strong>Predictable costs.</strong> Co-payments and deductibles should be simple enough for employees to anticipate.</li></ul>
<h2>Translate the policy into plain language</h2>
<p>Insurance documents are written to be precise, not to be read on a phone in a clinic waiting room. A short benefits summary in plain language — in the languages your employees use — should answer the questions people actually ask:</p>
<ul><li>Which hospitals and clinics can I use?</li><li>What do I pay when I visit a doctor or pharmacy?</li><li>When do I need an approval before treatment?</li><li>Who do I call if something goes wrong?</li></ul>
<h2>Plan communication around key moments</h2>
<p>Information is most useful when it arrives at the right time. Consider communicating at enrolment, shortly after cards are issued, and again before the renewal. Short awareness sessions can also be valuable, especially for employees who are using medical insurance for the first time.</p>
<h2>Give employees a clear point of contact</h2>
<p>Even the best communication will not answer every question. Employees should know who to contact for help — and HR teams should know how issues will be followed up with the insurer.</p>
<blockquote>The goal is simple: employees should experience their medical insurance as support, not as a puzzle.</blockquote>
<h2>Use feedback to improve the next renewal</h2>
<p>Questions and complaints during the year are valuable information. Recording common issues helps you and your broker identify where the program design or communication could be improved at renewal.</p>
<p>If you would like a second opinion on how your current program is structured and communicated, our team can help you review it.</p>',
'<p>يُعد التأمين الطبي للشركات من أكبر الاستثمارات في مزايا الموظفين. ومع ذلك، تكتشف مؤسسات كثيرة أن موظفيها لا يتعرّفون على طريقة عمل تغطيتهم إلا في أصعب اللحظات، عندما يحتاجون هم أو أحد أفراد أسرهم إلى الرعاية.</p>
<p>الوضوح ليس أمرًا ثانويًا؛ فعندما يفهم الموظفون تأمينهم الطبي، يختارون مقدمي الخدمة المناسبين ويتجنبون التكاليف المفاجئة ويشعرون بثقة أكبر في الدعم الذي تقدّمه مؤسستهم.</p>
<h2>ابدأ بهيكل منطقي</h2>
<p>تؤثر طريقة هيكلة البرنامج كثيرًا في سهولة فهمه. وقبل طرحه على شركات التأمين، يفيد الاتفاق على بعض المبادئ:</p>
<ul><li><strong>فئات واضحة.</strong> قسّم الموظفين إلى عدد محدود من الفئات بقواعد متسقة بدلًا من استثناءات كثيرة.</li><li><strong>فروق ذات معنى.</strong> إذا اختلفت الفئات، فيجب أن يسهل شرح الفروق بينها، مثل نطاق الشبكة أو الحدود السنوية.</li><li><strong>تكاليف متوقعة.</strong> يجب أن تكون نسب التحمّل والمبالغ المقتطعة بسيطة بما يكفي ليتوقعها الموظفون.</li></ul>
<h2>حوّل الوثيقة إلى لغة مبسّطة</h2>
<p>تُكتب وثائق التأمين بدقة قانونية، لا لتُقرأ على الهاتف في غرفة انتظار العيادة. لذلك ينبغي أن يجيب ملخص مبسّط للمزايا، وباللغات التي يستخدمها موظفوك، عن الأسئلة التي يطرحونها فعلًا:</p>
<ul><li>ما المستشفيات والعيادات التي يمكنني استخدامها؟</li><li>كم أدفع عند زيارة الطبيب أو الصيدلية؟</li><li>متى أحتاج إلى موافقة مسبقة قبل العلاج؟</li><li>بمن أتصل إذا واجهت مشكلة؟</li></ul>
<h2>خطّط للتواصل حول اللحظات المهمة</h2>
<p>تكون المعلومة أكثر فائدة عندما تصل في الوقت المناسب. فكّر في التواصل عند التسجيل، وبعد إصدار البطاقات بفترة قصيرة، ثم قبل التجديد. كما يمكن أن تكون الجلسات التوعوية القصيرة مفيدة، خاصةً للموظفين الذين يستخدمون التأمين الطبي لأول مرة.</p>
<h2>وفّر للموظفين جهة تواصل واضحة</h2>
<p>حتى أفضل أساليب التواصل لن تجيب عن كل سؤال. لذا يجب أن يعرف الموظفون بمن يتصلون عند الحاجة، وأن تعرف فرق الموارد البشرية كيف ستُتابع المشكلات مع شركة التأمين.</p>
<blockquote>الهدف بسيط: أن يشعر الموظفون بأن تأمينهم الطبي دعم حقيقي، لا لغز يصعب حلّه.</blockquote>
<h2>استفد من الملاحظات في التجديد القادم</h2>
<p>تُعد الأسئلة والشكاوى خلال العام معلومات قيّمة. فتسجيل المشكلات المتكررة يساعدك أنت ووسيط التأمين على تحديد ما يمكن تحسينه في تصميم البرنامج أو التواصل بشأنه عند التجديد.</p>
<p>إذا رغبت في رأي آخر حول هيكلة برنامجك الحالي وطريقة التواصل بشأنه، يمكن لفريقنا مساعدتك في مراجعته.</p>'
            ),
        ],
        [
            'category' => 'medical-insurance', 'slug' => 'questions-before-renewing-group-medical-policy', 'days_ago' => 14,
            'title' => tx('Six Questions to Ask Before Renewing Your Group Medical Policy', 'ستة أسئلة اطرحها قبل تجديد وثيقة التأمين الطبي الجماعي'),
            'excerpt' => tx('Renewal is the best opportunity to improve your medical insurance program. These questions help you prepare and make better decisions.', 'يمثّل التجديد أفضل فرصة لتحسين برنامج التأمين الطبي. تساعدك هذه الأسئلة على الاستعداد واتخاذ قرارات أفضل.'),
            'tags' => ['en' => ['Renewal', 'Medical insurance'], 'ar' => ['التجديد', 'التأمين الطبي']],
            'body' => tx(
'<p>Medical insurance renewals often arrive with a new premium and a short deadline. Without preparation, the easiest option is to renew as-is — even when the program could work better for your organization and employees.</p>
<h2>1. How has the program actually been used?</h2>
<p>Ask for the information your insurer can share about usage. Understanding which benefits are used most helps you decide where to protect cover and where adjustments are possible.</p>
<h2>2. What have employees told us?</h2>
<p>Complaints, recurring questions and service issues are signals. Was the network convenient? Were approvals delayed? Did employees understand their co-payments?</p>
<h2>3. Has our workforce changed?</h2>
<p>New locations, a different age profile, new job categories or growth in headcount may all affect what the program should look like.</p>
<h2>4. Are our categories and limits still right?</h2>
<p>Categories designed years ago may no longer reflect your current structure or HR policies. This is a good time to check alignment.</p>
<h2>5. What alternatives are available?</h2>
<p>Comparing options on a like-for-like basis — benefits, networks, limits, conditions and price — gives you a clearer view of value, not just cost.</p>
<h2>6. How will we communicate any changes?</h2>
<p>Changes to networks or co-payments need to be explained clearly and early to avoid confusion when employees next seek care.</p>
<p>Starting preparations well before the renewal date gives you time to answer these questions properly. Our team can support you through the review and the conversations with insurers.</p>',
'<p>كثيرًا ما يأتي تجديد التأمين الطبي مع قسط جديد ومهلة قصيرة. ومن دون استعداد، يصبح الخيار الأسهل هو التجديد كما هو، حتى لو كان بالإمكان تحسين البرنامج لمؤسستك وموظفيها.</p>
<h2>١. كيف استُخدم البرنامج فعليًا؟</h2>
<p>اطلب المعلومات التي يمكن لشركة التأمين مشاركتها حول الاستخدام، ففهم المزايا الأكثر استخدامًا يساعدك على تحديد ما يجب الحفاظ عليه وأين يمكن إجراء تعديلات.</p>
<h2>٢. ماذا قال الموظفون؟</h2>
<p>الشكاوى والأسئلة المتكررة ومشكلات الخدمة كلها مؤشرات. هل كانت الشبكة مناسبة؟ هل تأخرت الموافقات؟ هل فهم الموظفون نسب التحمّل؟</p>
<h2>٣. هل تغيّرت قواك العاملة؟</h2>
<p>قد تؤثر المواقع الجديدة أو تغيّر الفئات العمرية أو الفئات الوظيفية الجديدة أو نمو عدد الموظفين في الشكل الأمثل للبرنامج.</p>
<h2>٤. هل لا تزال فئاتنا وحدودنا مناسبة؟</h2>
<p>قد لا تعكس الفئات التي صُمّمت منذ سنوات الهيكل التنظيمي أو سياسات الموارد البشرية الحالية، والتجديد وقت مناسب للتحقق من المواءمة.</p>
<h2>٥. ما البدائل المتاحة؟</h2>
<p>تمنحك مقارنة الخيارات على أسس متكافئة من حيث المزايا والشبكات والحدود والشروط والسعر رؤية أوضح للقيمة لا للتكلفة فقط.</p>
<h2>٦. كيف سنبلغ الموظفين بأي تغييرات؟</h2>
<p>يجب شرح التغييرات في الشبكات أو نسب التحمّل بوضوح ومبكرًا لتجنب الالتباس عندما يحتاج الموظفون إلى الرعاية.</p>
<p>يمنحك البدء بالاستعداد قبل موعد التجديد بوقت كافٍ فرصة للإجابة عن هذه الأسئلة كما ينبغي، ويمكن لفريقنا دعمك خلال المراجعة والمناقشات مع شركات التأمين.</p>'
            ),
        ],
        [
            'category' => 'hr-organization', 'slug' => 'building-hr-foundations-that-scale', 'days_ago' => 22,
            'title' => tx('From Structure to Engagement: Building HR Foundations That Scale', 'من الهيكل إلى الانتماء: بناء أسس موارد بشرية قابلة للتوسع'),
            'excerpt' => tx('Growing organizations often outgrow informal HR practices. These building blocks create clarity and fairness as you scale.', 'كثيرًا ما تتجاوز المؤسسات النامية الممارسات غير الرسمية في الموارد البشرية. هذه اللبنات الأساسية تحقق الوضوح والعدالة مع التوسع.'),
            'tags' => ['en' => ['HR consulting', 'Compliance', 'Engagement'], 'ar' => ['استشارات الموارد البشرية', 'الالتزام', 'الانتماء']],
            'body' => tx(
'<p>In the early days of an organization, HR often runs on goodwill and personal relationships. As the team grows, that approach starts to show its limits: roles overlap, decisions feel inconsistent and managers spend time solving the same problems repeatedly.</p>
<h2>1. A clear organization structure</h2>
<p>Everything else builds on structure. A clear organization chart shows reporting lines and accountabilities, and helps you see where new roles are needed.</p>
<h2>2. Compliance with labor law and social insurance</h2>
<p>HR practices should reflect labor law and social insurance requirements. Reviewing contracts, policies and records against these requirements reduces risk as the organization grows.</p>
<h2>3. Core HR policies</h2>
<p>Policies on working hours, leave, conduct and other essentials help managers handle similar situations in the same way — which is the foundation of fairness.</p>
<h2>4. A simple performance cycle</h2>
<p>Objectives at the start of the year, regular check-ins and a structured review create a rhythm for feedback and development. Simplicity matters more than sophistication.</p>
<h2>5. Engagement, retention and efficient HR processes</h2>
<p>Listening to employees and acting on what you hear helps you keep the people you value. At the same time, documenting and — where useful — automating routine HR processes frees time for that work.</p>
<p>These foundations do not need to be built all at once. The right sequence depends on your priorities — and the most important step is to start.</p>',
'<p>في بدايات المؤسسة، كثيرًا ما تُدار الموارد البشرية بحسن النية والعلاقات الشخصية. ومع نمو الفريق تظهر حدود هذا الأسلوب: تتداخل الأدوار، وتبدو القرارات غير متسقة، ويقضي المديرون وقتهم في حل المشكلات نفسها مرارًا.</p>
<h2>١. هيكل تنظيمي واضح</h2>
<p>يُبنى كل شيء على الهيكل. فالهيكل التنظيمي الواضح يبيّن خطوط التبعية والمسؤوليات، ويساعدك على معرفة الأدوار الجديدة المطلوبة.</p>
<h2>٢. الالتزام بقانون العمل والتأمينات الاجتماعية</h2>
<p>ينبغي أن تعكس ممارسات الموارد البشرية متطلبات قانون العمل والتأمينات الاجتماعية، ومراجعة العقود والسياسات والسجلات وفق هذه المتطلبات تقلّل المخاطر مع نمو المؤسسة.</p>
<h2>٣. سياسات أساسية للموارد البشرية</h2>
<p>تساعد السياسات المتعلقة بساعات العمل والإجازات والسلوك وغيرها من الأساسيات المديرين على التعامل مع المواقف المتشابهة بالطريقة نفسها، وهذا هو أساس العدالة.</p>
<h2>٤. دورة أداء بسيطة</h2>
<p>تخلق الأهداف في بداية العام ولقاءات المتابعة المنتظمة والمراجعة المنظّمة إيقاعًا للتغذية الراجعة والتطوير، والبساطة هنا أهم من التعقيد.</p>
<h2>٥. الانتماء والاحتفاظ بالموظفين وكفاءة العمليات</h2>
<p>يساعدك الاستماع إلى الموظفين والتصرف بناءً على ملاحظاتهم على الاحتفاظ بالكفاءات التي تقدّرها، كما أن توثيق عمليات الموارد البشرية الروتينية وأتمتتها حيثما كان ذلك مفيدًا يوفّر الوقت لهذا العمل.</p>
<p>لا حاجة إلى بناء هذه الأسس دفعة واحدة، فالتسلسل المناسب يعتمد على أولوياتك، والأهم هو أن تبدأ.</p>'
            ),
        ],
        [
            'category' => 'learning-leadership', 'slug' => 'coaching-or-training', 'days_ago' => 30,
            'title' => tx('Coaching or Training? Choosing the Right Development Investment', 'الكوتشينغ أم التدريب؟ كيف تختار الاستثمار التطويري المناسب'),
            'excerpt' => tx('Training and coaching both develop people — but they solve different problems. Here is how to decide which one fits your situation.', 'يطوّر كل من التدريب والكوتشينغ الأفراد، لكنهما يعالجان مشكلات مختلفة. إليك كيف تحدد الأنسب لحالتك.'),
            'tags' => ['en' => ['Training', 'Coaching', 'Leadership'], 'ar' => ['التدريب', 'الكوتشينغ', 'القيادة']],
            'body' => tx(
'<p>When organizations want to develop their people, the first question is often “which course should we run?” Sometimes training is exactly the right answer. Other times, the need is better met through coaching — or a combination of both.</p>
<h2>When training is the right choice</h2>
<p>Training works well when a group of people needs the same skills or knowledge — for example, a new performance management process, communication skills or customer service standards. It creates a shared language and is efficient for larger groups.</p>
<h2>When coaching makes more sense</h2>
<p>Coaching focuses on an individual’s goals, context and challenges. It is particularly useful when someone is stepping into a bigger role, facing complex decisions or needs to change established habits.</p>
<h2>Combining both</h2>
<p>Many development journeys combine the two: a training program introduces frameworks and skills, and coaching helps individuals apply them in their own situations.</p>
<h2>Questions to guide your decision</h2>
<ul><li>Is the need shared by a group, or specific to one person?</li><li>Is it about knowledge and skills, or about behaviour and decisions?</li><li>How will you know the investment has worked?</li></ul>
<p>Answering these questions clearly is the best first step toward a development investment that delivers results.</p>',
'<p>عندما ترغب المؤسسات في تطوير أفرادها، يكون السؤال الأول غالبًا: «ما الدورة التي يجب أن نقدّمها؟» أحيانًا يكون التدريب هو الإجابة الصحيحة تمامًا، وفي أحيان أخرى يكون الكوتشينغ، أو مزيج من الاثنين، هو الأنسب.</p>
<h2>متى يكون التدريب هو الخيار الصحيح</h2>
<p>ينجح التدريب عندما تحتاج مجموعة من الأفراد إلى المهارات أو المعارف نفسها، مثل نظام جديد لإدارة الأداء أو مهارات التواصل أو معايير خدمة العملاء، فهو يخلق لغة مشتركة ويُعد فعّالًا للمجموعات الكبيرة.</p>
<h2>متى يكون الكوتشينغ أنسب</h2>
<p>يركّز الكوتشينغ على أهداف الفرد وسياقه وتحدياته، ويكون مفيدًا بشكل خاص عند الانتقال إلى دور أكبر أو مواجهة قرارات معقدة أو الحاجة إلى تغيير عادات راسخة.</p>
<h2>الجمع بين الاثنين</h2>
<p>تجمع كثير من رحلات التطوير بين الأسلوبين: يقدّم البرنامج التدريبي الأطر والمهارات، ويساعد الكوتشينغ الأفراد على تطبيقها في مواقفهم الخاصة.</p>
<h2>أسئلة توجّه قرارك</h2>
<ul><li>هل الحاجة مشتركة بين مجموعة، أم خاصة بشخص واحد؟</li><li>هل تتعلق بالمعرفة والمهارات، أم بالسلوك والقرارات؟</li><li>كيف ستعرف أن الاستثمار قد حقق أثره؟</li></ul>
<p>الإجابة الواضحة عن هذه الأسئلة هي أفضل خطوة أولى نحو استثمار تطويري يحقق النتائج.</p>'
            ),
        ],
    ],
];
