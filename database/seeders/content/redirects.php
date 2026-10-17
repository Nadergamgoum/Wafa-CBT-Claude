<?php

// Common WordPress URL patterns mapped to the new structure. The original site's
// URLs could not be audited from the build environment — verify and extend these
// in Admin → Redirects once the legacy URL list is available.
return [
    ['/about-us', '/about', 'Legacy WordPress about page'],
    ['/contact-us', '/contact', 'Legacy WordPress contact page'],
    ['/blog', '/insights', 'Legacy blog index'],
    ['/news', '/insights', 'Legacy news index'],
    ['/feed', '/insights', 'WordPress RSS feed'],
    ['/services', '/insurance', 'Legacy services index'],
    ['/our-services', '/insurance', 'Legacy services index'],
    ['/medical-insurance', '/insurance/medical-insurance', 'Legacy medical insurance page'],
    ['/health-insurance', '/insurance/medical-insurance', 'Legacy health insurance page'],
    ['/life-insurance', '/insurance/life-insurance', 'Legacy life insurance page'],
    ['/car-insurance', '/insurance/auto-insurance', 'Legacy car insurance page'],
    ['/motor-insurance', '/insurance/auto-insurance', 'Legacy motor insurance page'],
    ['/property-insurance', '/insurance/property-insurance', 'Legacy property insurance page'],
    ['/hr-consulting', '/people-organization/hr-consulting', 'Legacy HR consulting page'],
    ['/training', '/learning-leadership/training', 'Legacy training page'],
    ['/courses', '/training-programs', 'Legacy courses page'],
    ['/coaching', '/learning-leadership/business-coaching', 'Legacy coaching page'],
    ['/executive-coaching', '/learning-leadership/executive-coaching', 'Legacy executive coaching page'],
    ['/business-coaching', '/learning-leadership/business-coaching', 'Legacy business coaching page'],
    ['/organizational-development', '/people-organization/organizational-development', 'Legacy OD page'],
];
