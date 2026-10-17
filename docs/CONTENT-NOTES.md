# Content reconciliation notes

## Sources

Facts were reconciled on 2026-10-17 against two references, used **for facts and brand assets only**
(no design, CSS, layout or code was reused):

- the original WordPress site `https://wafa-cbt.com` (pages: Home, About us, Medical Insurance,
  HR Consulting, Training, Coaching, Events, Contact us, Blog and its sitemaps);
- the staging site `https://stage.wafa-cbt.com`.

The client approved the reconciliation and confirmed **+20 10 33300023 as the verified WhatsApp
number** (in addition to the phone number published on the original site).

## Verified information now on the site

| Area | Verified content |
|---|---|
| Brand | Official logo (black + teal, strapline “WE ADVICE FOR ACHIEVEMENT”) and favicon, unchanged. Brand name **WAFA** in Latin letters in both English and Arabic. |
| Colours | Ink `#16191C` (primary), accessible teal `#0E7F75` (buttons/links, white text passes WCAG AA), official logo teal `#19BAAB` (accent). The provisional navy and gold were removed. |
| Contact | Phone **+20 10 33300023**, WhatsApp **+20 10 33300023** (enabled), email **info@wafa-cbt.com**, country Egypt. |
| About | “Who we are”, both supporting paragraphs, vision, mission and the five core values (Integrity, Expertise, Collaboration, Continuous Learning, Client Focus) — wording from the original site, lightly edited for punctuation only. |
| Founder | Dr. Wafaa Hashem — over 25 years of experience in Egypt and abroad across HR management, insurance brokerage and professional training, plus extensive academic experience teaching in postgraduate programs. Official portrait. No other achievements added. |
| Why WAFA | Expertise · Excellence · Tailored Solutions · Partnership. “Excellence” reads “Trainers and coaches with hands-on experience” — the word *certified* is pending (see below). |
| Business scope | Insurance brokerage & corporate medical insurance management · Training & professional development · HR consulting & organizational development · Business & executive coaching. |
| Insurance one-liners | Medical “Comprehensive health coverage with trusted care” · Life “Financial protection that secures your family’s future” · Auto “Reliable protection for your vehicle on every journey” · Property “Safeguarding your home and assets from unexpected risks” (Property now covers homes as well as business assets). |
| Medical insurance | Goal statement; Comprehensive Medical Insurance Management (5 items); Claims & Approvals Management (6 items incl. monthly reporting of claim volume, approval rate and average settlement time, KPI tracking, inpatient/critical case monitoring); Medical Analytics & Reporting (5 items); Wellness & Awareness Programs (6 items); Account Management (5 items); key advantages (specialized team, detailed analytics, post-service follow-up and quality audits). |
| HR consulting | “Building Stronger Organizations” and the five verified areas: organizational structure & HR policies; performance & reward management; employee engagement & retention plans; compliance with labor law & social insurance; HR process optimization & automation. |
| Training | “Developing Skills that Drive Growth”; program areas Strategic Human Resources Management, Leadership & Team Building, Soft Skills; delivered as customized in-house or online workshops. |
| Corporate engagements | “Corporate Team Engagement & Participation Activities” — verified description, the five participant outcomes, closing paragraph and CTA “Request a Corporate Engagement Program”, with six genuine event photos. Event date and client name were not published, so they are left empty. |

## Provisional content retained (professional copy within the verified scope — please review)

- Supporting copy on service pages (challenges, approach steps, journeys, FAQs, related services),
  written as descriptions of how the service works — no clients, figures, insurers or results.
- Life and auto page detail, organizational development page, business and executive coaching pages
  (coaching wording kept conservative: no results, certifications, methodologies, success rates or
  proprietary frameworks).
- Three insight articles (educational; the HR article was rewritten around the verified HR areas).
- Legal pages (privacy, terms, cookies) — templates marked for legal review.
- Arabic text — professional translations prepared for this site (not taken from the original site,
  which had no Arabic version). Review by a native-speaking member of the WAFA team is recommended.

## Removed

- The Arabic brand name “وفاء” (replaced by “WAFA” everywhere).
- Provisional navy/gold palette and the provisional wordmark/favicon.
- Six invented training program outlines and their categories (replaced by the three verified program areas, “Available on request”, with no dates, trainers, durations, agendas or certificates).
- HR scope not verified: recruitment, job grading and job descriptions.
- Claims such as “measurable progress”, “sustained growth”, “fully confidential”, “typically several months”.
- 20 guessed WordPress redirects (replaced by the audited map below).

## Pending approval — not published

| Claim | Where it is kept |
|---|---|
| 24/7 client support and case tracking | Medical insurance page → hidden section “PENDING APPROVAL — service commitments” (Admin → Services → Corporate Medical Insurance → Sections; switch on “Show this section” once confirmed). |
| Fast turnaround | Same hidden section. |
| Certified trainers and coaches | Not published. “Excellence” uses “Trainers and coaches with hands-on experience”. |
| Measurable business growth | Not published anywhere. |

## Still empty until verified (hidden on the site)

Address, business hours, map, social profiles, legal company name, analytics IDs, Search Console /
Bing verification, team members, testimonials, client logos and statistics. All are manageable in
the CMS and appear only once filled in.

## Images

Used: official logo (plus a reversed white version generated from it for dark backgrounds — the
staging white version was cropped), official favicon, founder portrait, six corporate engagement
photos. **Not used**: theme/demo stock imagery and the staging photographs of unknown origin.
Everything else uses the built-in brand illustrations (now ink/teal) until real photography is
uploaded — see `IMAGE-BRIEF.md`. The engagement photos are deliberately not used as homepage imagery.

## Redirect map (Admin → Site → Redirects & 410)

| Old URL | Response |
|---|---|
| `/about-us` | 301 → `/about` |
| `/medical-insurance` | 301 → `/insurance/medical-insurance` |
| `/hr-consulting` | 301 → `/people-organization/hr-consulting` |
| `/training` | 301 → `/learning-leadership/training` |
| `/coaching` | 301 → `/learning-leadership` (the original page had no content of its own) |
| `/events` | 301 → `/corporate-engagements` |
| `/contact-us` | 301 → `/contact` |
| `/blog`, `/feed` | 301 → `/insights` |
| `/shop*`, `/cart`, `/checkout`, `/my-account*`, `/compare`, `/wishlist` | 410 Gone (theme demo shop) |
| `/portfolio*`, `/product/*`, `/product-category/*`, `/brand/*`, `/project-cat/*`, `/cms_block_cat/*` | 410 Gone (theme demo content) |
| `/category/*`, `/tag/*`, `/author/*` | 410 Gone (demo blog archives) |
| 8 demo blog posts (e.g. `/the-big-design-wall-likes-pictures`) | 410 Gone |

Demo URLs are answered with **410 Gone** rather than being sent to the homepage, so search engines
drop them cleanly. A trailing `*` matches a path and everything below it (whole segments only).
