<?php

// Verified content from the original WAFA "Events" page. The event date and the
// client's name were not published there, so they are left empty — add them in
// Admin → Corporate engagements only once confirmed (client name requires approval).
$photo = fn (string $key, array $caption) => ['image' => M($key), 'caption' => $caption];

return [
    [
        'slug' => 'corporate-team-engagement-participation-activities',
        'title' => tx('Corporate Team Engagement & Participation Activities', 'أنشطة التفاعل والمشاركة المؤسسية للفرق'),
        'event_date' => null,
        'summary' => tx(
            'This interactive corporate session was designed to strengthen team participation and encourage active engagement through structured group activities and experiential exercises.',
            'صُمّمت هذه الجلسة المؤسسية التفاعلية لتعزيز مشاركة الفريق وتشجيع التفاعل الفعّال من خلال أنشطة جماعية منظّمة وتمارين تجريبية.'
        ),
        'body' => tx(
            '<p>The program focused on helping employees collaborate, communicate and participate actively. The activities were intentionally simple in structure but strategically designed to reveal team dynamics, communication styles and participation patterns within workplace settings.</p>'
            .'<p>The session concluded with recognition moments and group reflection, reinforcing engagement and shared team experience.</p>',
            '<p>ركّز البرنامج على مساعدة الموظفين على التعاون والتواصل والمشاركة الفاعلة. وجاءت الأنشطة بسيطة في بنيتها عن قصد، لكنها صُمّمت بعناية لتكشف ديناميكيات الفريق وأساليب التواصل وأنماط المشاركة في بيئة العمل.</p>'
            .'<p>واختُتمت الجلسة بلحظات تكريم وتأمّل جماعي، عزّزت روح المشاركة والتجربة المشتركة للفريق.</p>'
        ),
        'highlights' => L(
            ['Collaborate under time-based challenges', 'Engage in structured participation games', 'Strengthen communication within teams', 'Build trust and positive interaction', 'Experience healthy competition in a professional setting'],
            ['التعاون في ظل تحديات محددة بوقت', 'المشاركة في ألعاب تفاعلية منظّمة', 'تعزيز التواصل داخل الفرق', 'بناء الثقة والتفاعل الإيجابي', 'خوض منافسة صحية في إطار مهني']
        ),
        'image_id' => M('eng-1'),
        'gallery' => [
            $photo('eng-1', tx('Participants together before the activities begin', 'المشاركون معًا قبل بدء الأنشطة')),
            $photo('eng-2', tx('A structured participation game around the activity table', 'لعبة مشاركة منظّمة حول طاولة النشاط')),
            $photo('eng-3', tx('A time-based team challenge', 'تحدٍّ جماعي محدد بوقت')),
            $photo('eng-4', tx('Healthy competition between teams', 'منافسة صحية بين الفرق')),
            $photo('eng-6', tx('Celebrating a completed challenge', 'الاحتفال بإنجاز أحد التحديات')),
            $photo('eng-5', tx('Group moment at the close of the session', 'لحظة جماعية في ختام الجلسة')),
        ],
        'client_name' => tx('', ''),
        'client_approved' => false,
        'cta_label' => tx('Request a Corporate Engagement Program', 'اطلب برنامج تفاعل مؤسسي'),
        'cta_link' => '/contact#contact-form',
        'is_featured' => true,
        'is_published' => true,
        'sort' => 1,
        'seo' => SEO(
            tx('Corporate Team Engagement & Participation Activities', 'أنشطة التفاعل والمشاركة المؤسسية للفرق'),
            tx('An interactive corporate session by WAFA using structured group activities and experiential exercises to strengthen participation, communication and trust.', 'جلسة مؤسسية تفاعلية من WAFA تعتمد على أنشطة جماعية منظّمة وتمارين تجريبية لتعزيز المشاركة والتواصل والثقة.'),
            tx('corporate team engagement activities', 'أنشطة التفاعل المؤسسي للفرق'),
        ),
    ],
];
