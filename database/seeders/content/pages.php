<?php

$legalNote = tx(
    'This text is provided as a starting template and should be reviewed by WAFA’s legal advisor before publication.',
    'هذا النص نموذج مبدئي، ويجب مراجعته من قبل المستشار القانوني لـ WAFA قبل النشر.'
);

return [
    [
        'key' => 'about', 'slug' => 'about', 'template' => 'about', 'sort' => 2,
        'title' => tx('About WAFA', 'عن WAFA'),
        'intro' => tx(
            'Connecting insurance, people and growth. WAFA is a professional consultancy firm specializing in insurance brokerage, human resources consulting and training.',
            'نربط بين التأمين والأفراد والنمو. WAFA مؤسسة استشارية متخصصة في الوساطة التأمينية واستشارات الموارد البشرية والتدريب.'
        ),
        'seo' => SEO(
            tx('About WAFA — Insurance Brokerage, HR Consulting & Training in Egypt', 'عن WAFA — الوساطة التأمينية واستشارات الموارد البشرية والتدريب في مصر'),
            tx('WAFA is a professional consultancy firm in Egypt specializing in insurance brokerage, human resources consulting and training, founded by Dr. Wafaa Hashem.', 'WAFA مؤسسة استشارية في مصر متخصصة في الوساطة التأمينية واستشارات الموارد البشرية والتدريب، أسستها الدكتورة وفاء هاشم.'),
            tx('insurance brokerage and HR consulting Egypt', 'الوساطة التأمينية واستشارات الموارد البشرية في مصر'),
        ),
        'sections' => [
            B('split_feature', [
                'background' => 'white', 'image_side' => 'end', 'art' => 'beyond',
                'eyebrow' => tx('Who we are', 'من نحن'),
                'title' => tx('Connecting insurance, *people and growth*', 'نربط بين التأمين *والأفراد والنمو*'),
                'body' => tx(
                    "We are a professional consultancy firm specializing in insurance brokerage, human resources consulting and training.\n\nWith a foundation built on trust, collaboration and innovation, we empower our clients to overcome challenges, enhance performance and achieve sustainable success in a dynamic business world.\n\nOur firm combines deep expertise, effective communication and a genuine passion for continuous development to deliver integrated solutions that help organizations and individuals thrive.",
                    "نحن مؤسسة استشارية متخصصة في الوساطة التأمينية واستشارات الموارد البشرية والتدريب.\n\nانطلاقًا من أساس قائم على الثقة والتعاون والابتكار، نمكّن عملاءنا من تجاوز التحديات وتحسين الأداء وتحقيق نجاح مستدام في بيئة أعمال متغيرة.\n\nوتجمع مؤسستنا بين الخبرة العميقة والتواصل الفعّال والشغف الحقيقي بالتطوير المستمر، لتقديم حلول متكاملة تساعد المؤسسات والأفراد على النمو والازدهار."
                ),
                'points' => L(
                    ['Insurance brokerage & corporate medical insurance management', 'Training & professional development', 'HR consulting & organizational development', 'Business & executive coaching'],
                    ['الوساطة التأمينية وإدارة التأمين الطبي للشركات', 'التدريب والتطوير المهني', 'استشارات الموارد البشرية والتطوير المؤسسي', 'كوتشينغ الأعمال والكوتشينغ التنفيذي']
                ),
            ]),
            B('founder', [
                'background' => 'ivory', 'art' => 'person',
                'photo' => M('founder'),
                'eyebrow' => tx('Founded by', 'التأسيس'),
                'name' => tx('Dr. Wafaa Hashem', 'الدكتورة وفاء هاشم'),
                'role' => tx('Founder', 'المؤسِّسة'),
                'bio' => tx(
                    'Dr. Wafaa Hashem founded WAFA bringing over 25 years of experience in Egypt and abroad across HR management, insurance brokerage and professional training — as well as extensive academic experience teaching in postgraduate programs.',
                    'أسست الدكتورة وفاء هاشم WAFA مستندةً إلى خبرة تزيد على 25 عامًا في مصر وخارجها في إدارة الموارد البشرية والوساطة التأمينية والتدريب المهني، إلى جانب خبرة أكاديمية واسعة في التدريس ببرامج الدراسات العليا.'
                ),
                'cta_label' => tx('Talk to Our Experts', 'تحدّث إلى خبرائنا'),
                'cta_link' => '/contact#contact-form',
            ]),
            B('vision_mission', [
                'background' => 'dark',
                'eyebrow' => tx('Mission and vision', 'الرسالة والرؤية'),
                'title' => tx('Where we are *heading*', 'إلى أين *نتجه*'),
                'vision_title' => tx('Vision', 'الرؤية'),
                'vision' => tx(
                    'To be the most trusted and innovative partner in Egypt that connects the worlds of insurance, human resources and training — building sustainable growth for our clients through knowledge, communication and continuous improvement.',
                    'أن نكون الشريك الأكثر ثقة وابتكارًا في مصر، الذي يربط بين عوالم التأمين والموارد البشرية والتدريب، ويبني نموًا مستدامًا لعملائه من خلال المعرفة والتواصل والتحسين المستمر.'
                ),
                'mission_title' => tx('Mission', 'الرسالة'),
                'mission' => tx(
                    'We deliver trusted and innovative solutions in insurance brokerage, human resources consultancy and professional training. We are dedicated to empowering organizations and individuals through trust, expertise and innovation — fostering effective communication, continuous learning and sustainable development to achieve lasting success.',
                    'نقدّم حلولًا موثوقة ومبتكرة في الوساطة التأمينية واستشارات الموارد البشرية والتدريب المهني. ونلتزم بتمكين المؤسسات والأفراد من خلال الثقة والخبرة والابتكار، وتعزيز التواصل الفعّال والتعلّم المستمر والتنمية المستدامة لتحقيق نجاح دائم.'
                ),
            ]),
            B('pillars', [
                'layout' => 'lines', 'background' => 'white',
                'eyebrow' => tx('Core values', 'قيمنا الأساسية'),
                'title' => tx('The values behind *our work*', 'القيم التي *نعمل بها*'),
                'items' => [
                    I('shield-check', tx('Integrity', 'النزاهة'), tx('We build trust through honesty, transparency and ethical practices in every interaction.', 'نبني الثقة من خلال الصدق والشفافية والممارسات الأخلاقية في كل تعامل.')),
                    I('badge-check', tx('Expertise', 'الخبرة'), tx('Our deep knowledge of insurance and human resources enables us to deliver solutions that are practical, effective and aligned with client needs.', 'تمكّننا معرفتنا العميقة بالتأمين والموارد البشرية من تقديم حلول عملية وفعّالة ومتوافقة مع احتياجات العملاء.')),
                    I('handshake', tx('Collaboration', 'التعاون'), tx('We believe in the power of connection — fostering strong relationships, teamwork and open communication to achieve shared goals.', 'نؤمن بقوة التواصل، فنعزّز العلاقات المتينة والعمل الجماعي والتواصل المفتوح لتحقيق أهداف مشتركة.')),
                    I('book-open', tx('Continuous learning', 'التعلّم المستمر'), tx('We are committed to ongoing professional growth, embracing innovation and the latest industry updates to stay ahead and add real value.', 'نلتزم بالنمو المهني المستمر، ونتبنّى الابتكار وأحدث مستجدات القطاع لنبقى في المقدمة ونضيف قيمة حقيقية.')),
                    I('heart-handshake', tx('Client focus', 'التركيز على العميل'), tx('Our clients are at the heart of everything we do. We listen, understand and tailor our services to create impactful and lasting results.', 'عملاؤنا في صميم كل ما نقوم به؛ نستمع ونفهم ونصمّم خدماتنا لتحقيق نتائج مؤثرة ودائمة.')),
                ],
            ]),
            B('pillars', [
                'layout' => 'numbers', 'background' => 'mist',
                'eyebrow' => tx('Why WAFA', 'لماذا WAFA'),
                'title' => tx('Why organizations *choose us*', 'لماذا *تختارنا* المؤسسات'),
                'items' => [
                    I(null, tx('Expertise', 'الخبرة'), tx('Deep understanding of HR, insurance and business operations.', 'فهم عميق للموارد البشرية والتأمين وعمليات الأعمال.')),
                    I(null, tx('Excellence', 'التميّز'), tx('Trainers and coaches with hands-on experience.', 'مدرّبون وكوتشز يتمتعون بخبرة عملية.')),
                    I(null, tx('Tailored solutions', 'حلول مخصّصة'), tx('Tailored solutions for every industry and organization size.', 'حلول مخصّصة لكل قطاع ولكل حجم مؤسسة.')),
                    I(null, tx('Partnership', 'الشراكة'), tx('Long-term partnerships built on trust and transparency.', 'شراكات طويلة الأمد مبنية على الثقة والشفافية.')),
                ],
            ]),
            B('ecosystem', [
                'background' => 'white',
                'eyebrow' => tx('Business scope', 'نطاق أعمالنا'),
                'title' => tx('How our services *connect*', 'كيف *تترابط* خدماتنا'),
                'lead' => tx('Each service stands on its own — and together they help organizations look after their people more completely.', 'كل خدمة قائمة بذاتها، وتساعد مجتمعةً المؤسسات على رعاية أفرادها بصورة أشمل.'),
                'center_label' => tx('Your organization', 'مؤسستك'),
                'items' => [
                    I('heart-pulse', tx('Medical insurance', 'التأمين الطبي'), tx('Corporate medical insurance management.', 'إدارة التأمين الطبي للشركات.')),
                    I('shield-check', tx('Insurance brokerage', 'الوساطة التأمينية'), tx('Life, auto and property insurance.', 'التأمين على الحياة والمركبات والممتلكات.')),
                    I('users-round', tx('HR consulting', 'استشارات الموارد البشرية'), tx('Efficient, compliant, people-focused HR systems.', 'أنظمة موارد بشرية فعّالة وملتزمة ومتمحورة حول الأفراد.')),
                    I('network', tx('Organizational development', 'التطوير المؤسسي'), tx('Structures aligned with business goals.', 'هياكل متوافقة مع أهداف العمل.')),
                    I('graduation-cap', tx('Training', 'التدريب'), tx('Professional development for teams.', 'التطوير المهني للفرق.')),
                    I('compass', tx('Coaching', 'الكوتشينغ'), tx('Business and executive coaching.', 'كوتشينغ الأعمال والكوتشينغ التنفيذي.')),
                ],
            ]),
            B('team', ['background' => 'white', 'eyebrow' => tx('Our team', 'فريقنا'), 'title' => tx('The people behind *WAFA*', 'الفريق وراء *WAFA*')]),
            B('testimonials', ['background' => 'mist', 'eyebrow' => tx('Client perspectives', 'آراء العملاء'), 'title' => tx('What our clients *say*', 'ماذا *يقول* عملاؤنا')]),
            B('cta_band', ['layout' => 'contact', 'eyebrow' => tx('Work with us', 'اعمل معنا'), 'title' => tx('Let’s start with a *conversation*', 'لنبدأ *بحوار*'), 'lead' => tx('Whether you’re seeking professional consulting, training or insurance solutions, our team is ready to assist you.', 'سواء كنت تبحث عن استشارات مهنية أو تدريب أو حلول تأمينية، فريقنا مستعد لمساعدتك.'), 'cta_label' => tx('Talk to Our Experts', 'تحدّث إلى خبرائنا'), 'cta_link' => '/contact#contact-form']),
        ],
    ],
    [
        'key' => 'contact', 'slug' => 'contact', 'template' => 'contact', 'sort' => 3,
        'title' => tx('Contact us', 'تواصل معنا'),
        'intro' => tx(
            'We value every message and inquiry. Whether you’re seeking professional consulting, training or insurance solutions, our team is ready to assist you.',
            'نقدّر كل رسالة واستفسار. سواء كنت تبحث عن استشارات مهنية أو تدريب أو حلول تأمينية، فريقنا مستعد لمساعدتك.'
        ),
        'seo' => SEO(tx('Contact WAFA', 'تواصل مع WAFA'), tx('Contact WAFA about corporate medical insurance, employee benefits, HR consulting, training or coaching.', 'تواصل مع WAFA بشأن التأمين الطبي للشركات أو مزايا الموظفين أو الاستشارات في الموارد البشرية أو التدريب أو الكوتشينغ.')),
        'sections' => [
            B('faq', ['source' => 'auto', 'background' => 'mist', 'eyebrow' => tx('Before you get in touch', 'قبل أن تتواصل معنا'), 'title' => tx('Common *questions*', '*أسئلة* شائعة')]),
        ],
    ],
    [
        'key' => 'insights', 'slug' => 'insights', 'template' => 'insights', 'sort' => 4,
        'title' => tx('Insights', 'رؤى ومقالات'),
        'intro' => tx('Practical perspectives on medical insurance, employee benefits, HR and leadership.', 'رؤى عملية حول التأمين الطبي ومزايا الموظفين والموارد البشرية والقيادة.'),
        'seo' => SEO(tx('Insights on Employee Benefits, HR & Leadership', 'رؤى حول مزايا الموظفين والموارد البشرية والقيادة'), tx('Articles and practical guidance on corporate medical insurance, employee benefits, HR and leadership from WAFA.', 'مقالات وإرشادات عملية حول التأمين الطبي للشركات ومزايا الموظفين والموارد البشرية والقيادة من WAFA.')),
        'sections' => [],
    ],
    [
        'key' => 'programs', 'slug' => 'training-programs', 'template' => 'programs', 'sort' => 5,
        'title' => tx('Training programs', 'البرامج التدريبية'),
        'intro' => tx('Training program areas in strategic human resources management, leadership and team building, and soft skills — delivered as customized in-house or online workshops.', 'مجالات برامج تدريبية في الإدارة الاستراتيجية للموارد البشرية، والقيادة وبناء الفرق، والمهارات الشخصية، تُقدَّم كورش عمل مخصّصة داخل المؤسسة أو عبر الإنترنت.'),
        'seo' => SEO(tx('Training Programs', 'البرامج التدريبية'), tx('WAFA training program areas: strategic human resources management, leadership and team building, and soft skills — customized in-house or online workshops.', 'مجالات برامج WAFA التدريبية: الإدارة الاستراتيجية للموارد البشرية، والقيادة وبناء الفرق، والمهارات الشخصية، كورش عمل مخصّصة داخل المؤسسة أو عبر الإنترنت.')),
        'sections' => [
            B('cta_band', ['layout' => 'soft', 'eyebrow' => tx('In-house training', 'التدريب داخل المؤسسة'), 'title' => tx('Need a program *designed for your team*?', 'هل تحتاج إلى برنامج *مصمّم لفريقك*؟'), 'lead' => tx('We tailor content, examples and format to your objectives.', 'نخصّص المحتوى والأمثلة وأسلوب التقديم وفق أهدافك.'), 'cta_label' => tx('Request a proposal', 'اطلب عرضًا'), 'cta_link' => '/contact#contact-form']),
        ],
    ],
    [
        'key' => 'engagements', 'slug' => 'corporate-engagements', 'template' => 'engagements', 'sort' => 6,
        'title' => tx('Corporate Engagements', 'فعاليات الشركات'),
        'intro' => tx(
            'Interactive corporate sessions designed to strengthen team participation and encourage active engagement through structured group activities and experiential exercises.',
            'جلسات مؤسسية تفاعلية مصمّمة لتعزيز مشاركة الفرق وتشجيع التفاعل الفعّال من خلال أنشطة جماعية منظّمة وتمارين تجريبية.'
        ),
        'seo' => SEO(
            tx('Corporate Team Engagement Programs', 'برامج التفاعل والمشاركة المؤسسية للفرق'),
            tx('Corporate team engagement and participation activities by WAFA — structured group activities and experiential exercises that strengthen communication, trust and teamwork.', 'أنشطة التفاعل والمشاركة المؤسسية من WAFA: أنشطة جماعية منظّمة وتمارين تجريبية تعزّز التواصل والثقة والعمل الجماعي.'),
            tx('corporate team engagement', 'التفاعل المؤسسي للفرق'),
        ),
        'sections' => [
            B('cta_band', ['layout' => 'soft', 'eyebrow' => tx('For your team', 'لفريقك'), 'title' => tx('Request a corporate *engagement program*', 'اطلب *برنامج تفاعل مؤسسي*'), 'lead' => tx('Tell us about your team and what you would like the session to achieve.', 'حدّثنا عن فريقك وما تودّ أن تحققه الجلسة.'), 'cta_label' => tx('Request a Corporate Engagement Program', 'اطلب برنامج تفاعل مؤسسي'), 'cta_link' => '/contact#contact-form', 'cta2_label' => tx('Chat on WhatsApp', 'تواصل عبر واتساب'), 'cta2_link' => '@whatsapp']),
        ],
    ],
    [
        'key' => 'privacy', 'slug' => 'privacy-policy', 'template' => 'legal', 'sort' => 10,
        'title' => tx('Privacy policy', 'سياسة الخصوصية'),
        'intro' => tx('How we collect, use and protect personal information submitted through this website.', 'كيف نجمع المعلومات الشخصية المرسلة عبر هذا الموقع ونستخدمها ونحميها.'),
        'seo' => SEO(tx('Privacy Policy', 'سياسة الخصوصية'), tx('How WAFA collects, uses and protects personal information submitted through this website.', 'كيف تجمع WAFA المعلومات الشخصية المرسلة عبر هذا الموقع وتستخدمها وتحميها.')),
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
        'seo' => SEO(tx('Terms of Use', 'شروط الاستخدام'), tx('Terms that apply to the use of the WAFA website.', 'الشروط التي تنطبق على استخدام موقع WAFA.')),
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
<h2>الملكية الفكرية</h2><p>ما لم يُذكر خلاف ذلك، فإن المحتوى والتصميم والعلامة التجارية في هذا الموقع مملوكة لـ WAFA ولا يجوز نسخها دون إذن.</p>
<h2>روابط المواقع الأخرى</h2><p>قد يتضمن هذا الموقع روابط لمواقع خارجية، ولسنا مسؤولين عن محتواها أو ممارساتها المتعلقة بالخصوصية.</p>
<h2>التعديلات</h2><p>قد نحدّث هذه الشروط من وقت لآخر، وستكون أحدث نسخة متاحة دائمًا في هذه الصفحة.</p>'
        )])],
    ],
    [
        'key' => 'cookies', 'slug' => 'cookie-policy', 'template' => 'legal', 'sort' => 12,
        'title' => tx('Cookie policy', 'سياسة ملفات تعريف الارتباط'),
        'intro' => tx('How this website uses cookies and how you can control them.', 'كيف يستخدم هذا الموقع ملفات تعريف الارتباط وكيف يمكنك التحكم فيها.'),
        'seo' => SEO(tx('Cookie Policy', 'سياسة ملفات تعريف الارتباط'), tx('How the WAFA website uses cookies and how you can manage your preferences.', 'كيف يستخدم موقع WAFA ملفات تعريف الارتباط وكيف يمكنك إدارة تفضيلاتك.')),
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
