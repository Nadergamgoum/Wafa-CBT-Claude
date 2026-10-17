<?php

$legalNote = tx(
    'This text is provided as a starting template and should be reviewed by WAFA’s legal advisor before publication.',
    'هذا النص نموذج مبدئي، ويجب مراجعته من قبل المستشار القانوني لوفاء قبل النشر.'
);

return [
    [
        'key' => 'about', 'slug' => 'about', 'template' => 'about', 'sort' => 2,
        'title' => tx('About WAFA', 'عن وفاء'),
        'intro' => tx(
            'WAFA brings together corporate medical insurance, employee benefits and insurance brokerage with HR consulting, organizational development, training and coaching.',
            'تجمع وفاء بين التأمين الطبي للشركات ومزايا الموظفين والوساطة التأمينية من جهة، والاستشارات في الموارد البشرية والتطوير المؤسسي والتدريب والكوتشينغ من جهة أخرى.'
        ),
        'seo' => SEO(tx('About WAFA', 'عن وفاء'), tx('Learn how WAFA combines corporate medical insurance, employee benefits and people solutions in one integrated approach.', 'تعرّف على كيفية جمع وفاء بين التأمين الطبي للشركات ومزايا الموظفين وحلول الموارد البشرية في منهجية واحدة متكاملة.')),
        'sections' => [
            B('split_feature', [
                'background' => 'white', 'image_side' => 'end', 'art' => 'about',
                'eyebrow' => tx('Who we are', 'من نحن'),
                'title' => tx('Protecting people. *Strengthening businesses.*', 'نحمي الأفراد. *ونمكّن المؤسسات.*'),
                'body' => tx(
                    "Organizations depend on their people — and people depend on the protection and opportunities their organization provides.\n\nWAFA works at that intersection. Medical insurance and employee health benefits are at the core of what we do, supported by life, auto and property insurance. Alongside insurance, we help organizations build strong HR foundations, develop their teams and support their leaders.",
                    "تعتمد المؤسسات على أفرادها، ويعتمد الأفراد على الحماية والفرص التي توفرها لهم مؤسساتهم.\n\nوفي هذه المساحة تعمل وفاء. فالتأمين الطبي ومزايا الموظفين الصحية في صميم عملنا، يدعمها التأمين على الحياة والمركبات والممتلكات. وإلى جانب التأمين، نساعد المؤسسات على بناء أسس قوية للموارد البشرية وتطوير فرقها ودعم قادتها."
                ),
                'points' => L(
                    ['Corporate medical insurance & employee health benefits', 'Insurance brokerage for life, auto and property', 'HR consulting & organizational development', 'Training, business coaching & executive coaching'],
                    ['التأمين الطبي للشركات ومزايا الموظفين الصحية', 'الوساطة التأمينية في الحياة والمركبات والممتلكات', 'الاستشارات في الموارد البشرية والتطوير المؤسسي', 'التدريب وكوتشينغ الأعمال والكوتشينغ التنفيذي']
                ),
            ]),
            B('pillars', [
                'layout' => 'dark', 'background' => 'dark',
                'eyebrow' => tx('What we stand for', 'ما نؤمن به'),
                'title' => tx('The principles behind *our work*', 'المبادئ التي *نعمل بها*'),
                'items' => [
                    I('badge-check', tx('Expertise', 'الخبرة'), tx('We bring specialist knowledge to every recommendation and explain it clearly.', 'نقدّم معرفة متخصصة في كل توصية ونشرحها بوضوح.')),
                    I('target', tx('Tailored solutions', 'حلول مخصّصة'), tx('Every organization is different, so every solution starts with listening.', 'كل مؤسسة مختلفة، لذلك يبدأ كل حل بالإصغاء.')),
                    I('heart-handshake', tx('Partnership', 'الشراكة'), tx('We aim for long-term relationships built on trust and responsiveness.', 'نسعى إلى علاقات طويلة الأمد قائمة على الثقة وسرعة الاستجابة.')),
                    I('puzzle', tx('Integrated approach', 'منهجية متكاملة'), tx('Insurance and people solutions that work together, not in isolation.', 'حلول تأمينية وحلول للأفراد تعمل معًا، لا بمعزل عن بعضها.')),
                ],
            ]),
            B('ecosystem', [
                'background' => 'white',
                'eyebrow' => tx('An integrated approach', 'منهجية متكاملة'),
                'title' => tx('How our services *connect*', 'كيف *تترابط* خدماتنا'),
                'lead' => tx('Each service stands on its own — and together they help organizations look after their people more completely.', 'كل خدمة قائمة بذاتها، وتساعد مجتمعةً المؤسسات على رعاية أفرادها بصورة أشمل.'),
                'center_label' => tx('Your organization', 'مؤسستك'),
                'items' => [
                    I('heart-pulse', tx('Medical insurance', 'التأمين الطبي'), tx('Our flagship service.', 'خدمتنا الرئيسية.')),
                    I('shield-check', tx('Life, auto & property', 'الحياة والمركبات والممتلكات'), tx('Protection for people and assets.', 'حماية للأفراد والأصول.')),
                    I('users-round', tx('HR consulting', 'استشارات الموارد البشرية'), tx('Foundations for people management.', 'أسس لإدارة الأفراد.')),
                    I('network', tx('Organizational development', 'التطوير المؤسسي'), tx('Alignment and transformation.', 'المواءمة والتحوّل.')),
                    I('graduation-cap', tx('Training', 'التدريب'), tx('Skills for teams.', 'مهارات للفرق.')),
                    I('compass', tx('Coaching', 'الكوتشينغ'), tx('Support for owners and leaders.', 'دعم لأصحاب الأعمال والقادة.')),
                ],
            ]),
            B('process', [
                'layout' => 'cards', 'background' => 'ivory',
                'eyebrow' => tx('How we work', 'كيف نعمل'),
                'title' => tx('A consistent way of *working with you*', 'أسلوب ثابت في *العمل معك*'),
                'items' => [
                    ['title' => tx('Understand', 'الفهم'), 'text' => tx('We start by listening to your goals and context.', 'نبدأ بالإصغاء لأهدافك وسياقك.')],
                    ['title' => tx('Design', 'التصميم'), 'text' => tx('We propose practical, tailored solutions.', 'نقترح حلولًا عملية ومخصّصة.')],
                    ['title' => tx('Deliver', 'التنفيذ'), 'text' => tx('We implement with your team, step by step.', 'ننفّذ مع فريقك خطوة بخطوة.')],
                    ['title' => tx('Support', 'الدعم'), 'text' => tx('We stay involved and keep improving.', 'نبقى إلى جانبك ونواصل التحسين.')],
                ],
            ]),
            B('team', ['background' => 'white', 'eyebrow' => tx('Our team', 'فريقنا'), 'title' => tx('The people behind *WAFA*', 'الفريق وراء *وفاء*')]),
            B('testimonials', ['background' => 'mist', 'eyebrow' => tx('Client perspectives', 'آراء العملاء'), 'title' => tx('What our clients *say*', 'ماذا *يقول* عملاؤنا')]),
            B('cta_band', ['layout' => 'contact', 'eyebrow' => tx('Work with us', 'اعمل معنا'), 'title' => tx('Let’s start with a *conversation*', 'لنبدأ *بحوار*'), 'lead' => tx('Tell us about your organization and what you would like to achieve.', 'حدّثنا عن مؤسستك وما تودّ تحقيقه.'), 'cta_label' => tx('Talk to Our Experts', 'تحدّث إلى خبرائنا'), 'cta_link' => '/contact#contact-form']),
        ],
    ],
    [
        'key' => 'contact', 'slug' => 'contact', 'template' => 'contact', 'sort' => 3,
        'title' => tx('Contact us', 'تواصل معنا'),
        'intro' => tx(
            'Whether you are reviewing your medical insurance, planning HR improvements or looking for training, our team is ready to help.',
            'سواء كنت تراجع تأمينك الطبي أو تخطط لتحسينات في الموارد البشرية أو تبحث عن تدريب، فريقنا مستعد لمساعدتك.'
        ),
        'seo' => SEO(tx('Contact WAFA', 'تواصل مع وفاء'), tx('Contact WAFA about corporate medical insurance, employee benefits, HR consulting, training or coaching.', 'تواصل مع وفاء بشأن التأمين الطبي للشركات أو مزايا الموظفين أو الاستشارات في الموارد البشرية أو التدريب أو الكوتشينغ.')),
        'sections' => [
            B('faq', ['source' => 'auto', 'background' => 'mist', 'eyebrow' => tx('Before you get in touch', 'قبل أن تتواصل معنا'), 'title' => tx('Common *questions*', '*أسئلة* شائعة')]),
        ],
    ],
    [
        'key' => 'insights', 'slug' => 'insights', 'template' => 'insights', 'sort' => 4,
        'title' => tx('Insights', 'رؤى ومقالات'),
        'intro' => tx('Practical perspectives on medical insurance, employee benefits, HR and leadership.', 'رؤى عملية حول التأمين الطبي ومزايا الموظفين والموارد البشرية والقيادة.'),
        'seo' => SEO(tx('Insights on Employee Benefits, HR & Leadership', 'رؤى حول مزايا الموظفين والموارد البشرية والقيادة'), tx('Articles and practical guidance on corporate medical insurance, employee benefits, HR and leadership from WAFA.', 'مقالات وإرشادات عملية حول التأمين الطبي للشركات ومزايا الموظفين والموارد البشرية والقيادة من وفاء.')),
        'sections' => [],
    ],
    [
        'key' => 'programs', 'slug' => 'training-programs', 'template' => 'programs', 'sort' => 5,
        'title' => tx('Training programs', 'البرامج التدريبية'),
        'intro' => tx('Practical programs for managers, HR teams and professionals — available in different formats or tailored for your organization.', 'برامج عملية للمديرين وفرق الموارد البشرية والمهنيين، متاحة بأساليب تقديم مختلفة أو مخصّصة لمؤسستك.'),
        'seo' => SEO(tx('Training Programs', 'البرامج التدريبية'), tx('Explore WAFA training programs in leadership, HR, professional skills and employee benefits awareness.', 'استكشف برامج وفاء التدريبية في القيادة والموارد البشرية والمهارات المهنية والتوعية بمزايا الموظفين.')),
        'sections' => [
            B('cta_band', ['layout' => 'soft', 'eyebrow' => tx('In-house training', 'التدريب داخل المؤسسة'), 'title' => tx('Need a program *designed for your team*?', 'هل تحتاج إلى برنامج *مصمّم لفريقك*؟'), 'lead' => tx('We tailor content, examples and format to your objectives.', 'نخصّص المحتوى والأمثلة وأسلوب التقديم وفق أهدافك.'), 'cta_label' => tx('Request a proposal', 'اطلب عرضًا'), 'cta_link' => '/contact#contact-form']),
        ],
    ],
    [
        'key' => 'privacy', 'slug' => 'privacy-policy', 'template' => 'legal', 'sort' => 10,
        'title' => tx('Privacy policy', 'سياسة الخصوصية'),
        'intro' => tx('How we collect, use and protect personal information submitted through this website.', 'كيف نجمع المعلومات الشخصية المرسلة عبر هذا الموقع ونستخدمها ونحميها.'),
        'seo' => SEO(tx('Privacy Policy', 'سياسة الخصوصية'), tx('How WAFA collects, uses and protects personal information submitted through this website.', 'كيف تجمع وفاء المعلومات الشخصية المرسلة عبر هذا الموقع وتستخدمها وتحميها.')),
        'sections' => [B('rich_text', ['narrow' => true, 'body' => tx(
            '<p><em>'.$legalNote['en'].'</em></p>
<h2>Information we collect</h2><p>When you contact us through a form on this website, we collect the details you provide, such as your name, company, email address, phone number, area of interest and message.</p>
<h2>How we use your information</h2><p>We use this information to respond to your enquiry, provide the services you request and keep a record of our communication. We do not sell your personal information.</p>
<h2>Website analytics</h2><p>We measure website visits using privacy-friendly, cookie-free statistics that do not identify individual visitors. With your consent, we may also use analytics and marketing tools such as Google Analytics or advertising platform pixels. You can change your choices at any time using the “Cookie settings” link in the footer.</p>
<h2>Sharing information</h2><p>Where needed to provide a service — for example, when requesting insurance proposals — relevant information may be shared with insurers or service providers, in line with your instructions and applicable law.</p>
<h2>Security and retention</h2><p>We apply appropriate technical and organizational measures to protect personal information and keep it only for as long as necessary for the purposes described above.</p>
<h2>Your rights</h2><p>You may ask to access, correct or delete your personal information, subject to applicable law. Please contact us using the details on our contact page.</p>',
            '<p><em>'.$legalNote['ar'].'</em></p>
<h2>المعلومات التي نجمعها</h2><p>عندما تتواصل معنا عبر أحد النماذج في هذا الموقع، نجمع البيانات التي تقدّمها مثل اسمك وشركتك وبريدك الإلكتروني ورقم هاتفك ومجال اهتمامك ورسالتك.</p>
<h2>كيف نستخدم معلوماتك</h2><p>نستخدم هذه المعلومات للرد على استفسارك وتقديم الخدمات التي تطلبها والاحتفاظ بسجل لتواصلنا. ولا نبيع معلوماتك الشخصية.</p>
<h2>تحليلات الموقع</h2><p>نقيس زيارات الموقع باستخدام إحصاءات تحترم الخصوصية ولا تعتمد على ملفات تعريف الارتباط ولا تحدد هوية الزوار. وبموافقتك، قد نستخدم أيضًا أدوات التحليلات والتسويق مثل Google Analytics أو وحدات التتبع الخاصة بالمنصات الإعلانية. ويمكنك تغيير اختياراتك في أي وقت عبر رابط «إعدادات ملفات تعريف الارتباط» في أسفل الصفحة.</p>
<h2>مشاركة المعلومات</h2><p>عند الحاجة لتقديم خدمة ما، مثل طلب عروض التأمين، قد تُشارك المعلومات ذات الصلة مع شركات التأمين أو مقدمي الخدمات وفقًا لتعليماتك والأنظمة المعمول بها.</p>
<h2>الأمان والاحتفاظ بالبيانات</h2><p>نطبّق تدابير تقنية وتنظيمية مناسبة لحماية المعلومات الشخصية، ونحتفظ بها فقط للمدة اللازمة للأغراض الموضحة أعلاه.</p>
<h2>حقوقك</h2><p>يمكنك طلب الاطلاع على معلوماتك الشخصية أو تصحيحها أو حذفها وفقًا للأنظمة المعمول بها، وذلك بالتواصل معنا عبر البيانات الموضحة في صفحة التواصل.</p>'
        )])],
    ],
    [
        'key' => 'terms', 'slug' => 'terms-of-use', 'template' => 'legal', 'sort' => 11,
        'title' => tx('Terms of use', 'شروط الاستخدام'),
        'intro' => tx('The terms that apply when you use this website.', 'الشروط التي تنطبق عند استخدامك لهذا الموقع.'),
        'seo' => SEO(tx('Terms of Use', 'شروط الاستخدام'), tx('Terms that apply to the use of the WAFA website.', 'الشروط التي تنطبق على استخدام موقع وفاء.')),
        'sections' => [B('rich_text', ['narrow' => true, 'body' => tx(
            '<p><em>'.$legalNote['en'].'</em></p>
<h2>Information on this website</h2><p>The content of this website is provided for general information. It does not constitute insurance, legal or professional advice for any specific situation. Insurance cover is always subject to the terms, conditions and exclusions of the policy issued by the insurer.</p>
<h2>Use of the website</h2><p>You agree to use this website lawfully and not to interfere with its operation or security.</p>
<h2>Intellectual property</h2><p>Unless stated otherwise, the content, design and branding on this website belong to WAFA and may not be reproduced without permission.</p>
<h2>Links to other websites</h2><p>This website may link to external websites. We are not responsible for their content or privacy practices.</p>
<h2>Changes</h2><p>We may update these terms from time to time. The latest version will always be available on this page.</p>',
            '<p><em>'.$legalNote['ar'].'</em></p>
<h2>المعلومات الواردة في الموقع</h2><p>يُقدّم محتوى هذا الموقع لأغراض المعلومات العامة، ولا يُعد استشارة تأمينية أو قانونية أو مهنية لأي حالة بعينها. وتخضع التغطية التأمينية دائمًا لأحكام الوثيقة الصادرة عن شركة التأمين وشروطها واستثناءاتها.</p>
<h2>استخدام الموقع</h2><p>توافق على استخدام هذا الموقع بصورة مشروعة وعدم التدخل في تشغيله أو أمنه.</p>
<h2>الملكية الفكرية</h2><p>ما لم يُذكر خلاف ذلك، فإن المحتوى والتصميم والعلامة التجارية في هذا الموقع مملوكة لوفاء ولا يجوز نسخها دون إذن.</p>
<h2>روابط المواقع الأخرى</h2><p>قد يتضمن هذا الموقع روابط لمواقع خارجية، ولسنا مسؤولين عن محتواها أو ممارساتها المتعلقة بالخصوصية.</p>
<h2>التعديلات</h2><p>قد نحدّث هذه الشروط من وقت لآخر، وستكون أحدث نسخة متاحة دائمًا في هذه الصفحة.</p>'
        )])],
    ],
    [
        'key' => 'cookies', 'slug' => 'cookie-policy', 'template' => 'legal', 'sort' => 12,
        'title' => tx('Cookie policy', 'سياسة ملفات تعريف الارتباط'),
        'intro' => tx('How this website uses cookies and how you can control them.', 'كيف يستخدم هذا الموقع ملفات تعريف الارتباط وكيف يمكنك التحكم فيها.'),
        'seo' => SEO(tx('Cookie Policy', 'سياسة ملفات تعريف الارتباط'), tx('How the WAFA website uses cookies and how you can manage your preferences.', 'كيف يستخدم موقع وفاء ملفات تعريف الارتباط وكيف يمكنك إدارة تفضيلاتك.')),
        'sections' => [B('rich_text', ['narrow' => true, 'body' => tx(
            '<p><em>'.$legalNote['en'].'</em></p>
<h2>Necessary cookies</h2><p>These cookies are required for the website to work securely — for example, to protect forms against misuse and to remember your cookie choices. They cannot be switched off.</p>
<h2>Analytics cookies</h2><p>With your consent, analytics tools such as Google Analytics help us understand how the website is used so we can improve it.</p>
<h2>Marketing cookies</h2><p>With your consent, advertising platforms such as Meta, LinkedIn or TikTok may set cookies to measure the performance of our campaigns.</p>
<h2>Managing your choices</h2><p>You can accept, reject or customize optional cookies when you first visit the site, and change your choices at any time using the “Cookie settings” link in the footer.</p>',
            '<p><em>'.$legalNote['ar'].'</em></p>
<h2>ملفات تعريف الارتباط الضرورية</h2><p>هذه الملفات لازمة لعمل الموقع بصورة آمنة، مثل حماية النماذج من إساءة الاستخدام وحفظ اختياراتك المتعلقة بملفات تعريف الارتباط، ولا يمكن إيقافها.</p>
<h2>ملفات التحليلات</h2><p>بموافقتك، تساعدنا أدوات التحليلات مثل Google Analytics على فهم طريقة استخدام الموقع لتحسينه.</p>
<h2>ملفات التسويق</h2><p>بموافقتك، قد تضع المنصات الإعلانية مثل Meta وLinkedIn وTikTok ملفات لقياس أداء حملاتنا.</p>
<h2>إدارة اختياراتك</h2><p>يمكنك قبول ملفات تعريف الارتباط الاختيارية أو رفضها أو تخصيصها عند زيارتك الأولى للموقع، وتغيير اختياراتك في أي وقت عبر رابط «إعدادات ملفات تعريف الارتباط» في أسفل الصفحة.</p>'
        )])],
    ],
];
