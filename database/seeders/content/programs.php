<?php

// WAFA's verified training scope (from the original website): Strategic Human Resources
// Management programs, Leadership & Team Building, Soft Skills — delivered as customized
// in-house or online workshops. These entries describe program AREAS, not scheduled
// courses: no dates, facilitators, durations, agendas or certificates are published.
// Add real courses in Admin → Training programs once they are confirmed.
return [
    'categories' => [
        ['slug' => 'strategic-hr-management', 'name' => tx('Strategic HR Management', 'الإدارة الاستراتيجية للموارد البشرية'), 'description' => tx('Programs for HR professionals and managers.', 'برامج لمختصي الموارد البشرية والمديرين.')],
        ['slug' => 'leadership-team-building', 'name' => tx('Leadership & Team Building', 'القيادة وبناء الفرق'), 'description' => tx('Programs that strengthen leaders and teams.', 'برامج تعزّز القادة والفرق.')],
        ['slug' => 'soft-skills', 'name' => tx('Soft Skills', 'المهارات الشخصية'), 'description' => tx('Everyday skills that help people work well together.', 'مهارات يومية تساعد الأفراد على العمل معًا بفاعلية.')],
    ],
    'programs' => [
        [
            'category' => 'strategic-hr-management', 'slug' => 'strategic-human-resources-management', 'is_featured' => true, 'sort' => 1, 'delivery_mode' => 'in_house_online',
            'title' => tx('Strategic Human Resources Management Programs', 'برامج الإدارة الاستراتيجية للموارد البشرية'),
            'summary' => tx('Training programs in strategic human resources management, designed around your organization and delivered as customized in-house or online workshops.', 'برامج تدريبية في الإدارة الاستراتيجية للموارد البشرية، مصمّمة وفق مؤسستك وتُقدَّم كورش عمل مخصّصة داخل المؤسسة أو عبر الإنترنت.'),
            'description' => tx('<p>Strategic human resources management connects people practices with business goals. We design these programs around your objectives and the level of your participants, and agree the content, format and schedule with you.</p>', '<p>تربط الإدارة الاستراتيجية للموارد البشرية ممارسات الأفراد بأهداف العمل. نصمّم هذه البرامج وفق أهدافك ومستوى المشاركين، ونتفق معك على المحتوى وأسلوب التقديم والجدول الزمني.</p>'),
            'audience' => tx('HR professionals, managers and teams — tailored to your organization.', 'مختصو الموارد البشرية والمديرون والفرق، بما يناسب مؤسستك.'),
        ],
        [
            'category' => 'leadership-team-building', 'slug' => 'leadership-team-building', 'is_featured' => true, 'sort' => 2, 'delivery_mode' => 'in_house_online',
            'title' => tx('Leadership & Team Building', 'القيادة وبناء الفرق'),
            'summary' => tx('Programs that build confidence and strengthen team performance, delivered as customized in-house or online workshops.', 'برامج تبني الثقة وتعزّز أداء الفرق، وتُقدَّم كورش عمل مخصّصة داخل المؤسسة أو عبر الإنترنت.'),
            'description' => tx('<p>Leadership and team building programs designed to inspire change, build confidence and strengthen how teams work together. Content and format are tailored to your organization and agreed with you.</p>', '<p>برامج في القيادة وبناء الفرق مصمّمة لإلهام التغيير وبناء الثقة وتعزيز طريقة عمل الفرق معًا. ويُخصّص المحتوى وأسلوب التقديم وفق مؤسستك وبالاتفاق معك.</p>'),
            'audience' => tx('Leaders, managers and teams — tailored to your organization.', 'القادة والمديرون والفرق، بما يناسب مؤسستك.'),
        ],
        [
            'category' => 'soft-skills', 'slug' => 'soft-skills', 'is_featured' => true, 'sort' => 3, 'delivery_mode' => 'in_house_online',
            'title' => tx('Soft Skills', 'المهارات الشخصية'),
            'summary' => tx('Soft skills programs that help people communicate and work together effectively, delivered as customized in-house or online workshops.', 'برامج في المهارات الشخصية تساعد الأفراد على التواصل والعمل معًا بفاعلية، وتُقدَّم كورش عمل مخصّصة داخل المؤسسة أو عبر الإنترنت.'),
            'description' => tx('<p>Soft skills shape how people communicate, collaborate and serve others every day. We tailor these workshops to your teams and agree the topics, format and schedule with you.</p>', '<p>تشكّل المهارات الشخصية طريقة تواصل الأفراد وتعاونهم وخدمتهم للآخرين يوميًا. نصمّم ورش العمل هذه وفق فرقك ونتفق معك على الموضوعات وأسلوب التقديم والجدول الزمني.</p>'),
            'audience' => tx('Employees and teams — tailored to your organization.', 'الموظفون والفرق، بما يناسب مؤسستك.'),
        ],
    ],
];
