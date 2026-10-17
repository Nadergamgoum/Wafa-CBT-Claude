<?php

// Redirects from the original wafa-cbt.com (WordPress) site, based on the audit of
// its real pages and sitemap. Genuine pages are mapped 301 to their closest new
// equivalent. Leftover theme-demo URLs (shop, portfolio, demo blog posts, archive
// taxonomies) never held WAFA content, so they answer 410 Gone instead of being
// sent to the homepage. A trailing "*" matches everything below that path.
// Format: [from, to (null for 410), status code, note]
$legit = 'Original wafa-cbt.com page';
$demo = 'Theme demo content on the original site (not WAFA content)';

return [
    ['/about-us', '/about', 301, $legit],
    ['/medical-insurance', '/insurance/medical-insurance', 301, $legit],
    ['/hr-consulting', '/people-organization/hr-consulting', 301, $legit],
    ['/training', '/learning-leadership/training', 301, $legit],
    ['/coaching', '/learning-leadership', 301, $legit.' (coaching overview; no single coaching page existed)'],
    ['/events', '/corporate-engagements', 301, $legit],
    ['/contact-us', '/contact', 301, $legit],
    ['/blog', '/insights', 301, $legit],
    ['/feed', '/insights', 301, 'WordPress RSS feed'],

    ['/shop*', null, 410, $demo],
    ['/cart', null, 410, $demo],
    ['/checkout', null, 410, $demo],
    ['/my-account*', null, 410, $demo],
    ['/compare', null, 410, $demo],
    ['/wishlist', null, 410, $demo],
    ['/portfolio*', null, 410, $demo],
    ['/product/*', null, 410, $demo],
    ['/product-category/*', null, 410, $demo],
    ['/brand/*', null, 410, $demo],
    ['/category/*', null, 410, $demo],
    ['/tag/*', null, 410, $demo],
    ['/project-cat/*', null, 410, $demo],
    ['/cms_block_cat/*', null, 410, $demo],
    ['/author/*', null, 410, $demo],
    ['/the-big-design-wall-likes-pictures', null, 410, $demo],
    ['/new-home-decor-from-john-doerson', null, 410, $demo],
    ['/minimalist-japanese-inspired-furniture', null, 410, $demo],
    ['/creative-water-features-and-exterior', null, 410, $demo],
    ['/reinterprets-the-classic-bookshelf', null, 410, $demo],
    ['/collar-brings-back-coffee-brewing-ritual', null, 410, $demo],
    ['/green-interior-design-inspiration', null, 410, $demo],
    ['/exploring-atlantas-modern-homes', null, 410, $demo],
];
