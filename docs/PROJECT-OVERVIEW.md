# WAFA website — project overview

An independent, production-ready bilingual (English / Arabic) corporate website and CMS for WAFA,
built with **Laravel 13 + MySQL + Filament 5** for **Hostinger shared hosting**.

## 1. Sitemap & information architecture

```
/                                   Home
├── /insurance                      Insurance Solutions (category)
│   ├── /insurance/medical-insurance        Corporate Medical Insurance  ★ flagship
│   ├── /insurance/life-insurance           Life Insurance
│   ├── /insurance/auto-insurance           Auto Insurance
│   └── /insurance/property-insurance       Property Insurance
├── /people-organization            People & Organization (category)
│   ├── /people-organization/hr-consulting
│   └── /people-organization/organizational-development
├── /learning-leadership            Learning & Leadership (category)
│   ├── /learning-leadership/training
│   ├── /learning-leadership/business-coaching
│   └── /learning-leadership/executive-coaching
├── /training-programs              Programs listing (filters: category, format)
│   └── /training-programs/{slug}   Program detail + registration
├── /insights                       Articles (+ /insights/category/{slug})
│   └── /insights/{slug}
├── /about   /contact
├── /privacy-policy  /terms-of-use  /cookie-policy
├── /sitemap.xml  /robots.txt
└── /admin                          CMS
Arabic: identical structure under /ar/… (e.g. /ar/insurance/medical-insurance)
```

Navigation: **Insurance ▾ · People & Organization ▾ · Learning & Leadership ▾ · About · Insights ·
Contact** + language switch + “Talk to Our Experts”. The Insurance mega-menu features Medical
Insurance as a large flagship card. Breadcrumbs (Home › Insurance Solutions › Medical Insurance)
and the active section are shown on every inner page.

## 2. Design direction

**“Editorial healthcare-grade corporate.”** Calm, premium and human, built on the official WAFA
identity: near-black ink (`#16191C`) for authority, an accessible deep teal (`#0E7F75`) for actions and
the official logo teal (`#19BAAB`) for highlights, with warm ivory and mist neutrals. Display
headings use **Fraunces** (an editorial serif, with italic highlights), body text **Inter**, and Arabic
**IBM Plex Sans Arabic**, all self-hosted. Layouts are asymmetric and editorial rather than card grids:
numbered indexes, sticky section heads, diagrams, timelines and dark “spotlight” bands.

- Type scale: body 16 → 18 px, supporting text ≥ 15 px, buttons 16 px, section titles 28 → 46 px,
  hero 36 → 70 px (mobile hero ≤ 40 px).
- Colours are CMS tokens; all tints, hovers and dark surfaces derive from the three brand colours.
- Visual system: icon sprite (Lucide), brand-coloured editorial illustrations as placeholders,
  responsive photography from the media library, inline SVG diagrams.

## 3. Homepage hierarchy

1 Hero (“Protecting People. Strengthening Businesses.”) → 2 **Corporate Medical Insurance spotlight**
(largest, dark band, 7 roles) → 3 Business challenges (numbered editorial list) → 4 Medical insurance
journey (7-step timeline) → 5 Health & benefits ecosystem (radial diagram around “Your people”) →
6 Other insurance (Life/Auto/Property, lighter cards) → 7 Beyond insurance (services index) →
8 People & organization (split feature) → 9 Training programs (rail) → 10 Why WAFA (numerals) →
11 How we work (phase cards) → 12 Insights (featured + list) → 13 FAQ → 14 Final CTA with contact
channels. Every section is editable, re-orderable and hideable in the CMS.

## 4. Service-page differentiation

| Family | Hero | Structure & signature components |
|---|---|---|
| **Medical (flagship)** | Layered: image + floating capability cards, sticky “On this page” bar | Challenges grid → Approach with checklist → **Quadrant management model** with rotating core → Ecosystem diagram → **Tabbed employee-experience moments** → 7-step timeline → FAQ → Related → Image CTA |
| Life | Full-width editorial image with overlapping card + fact strip | **Large quote statement** with arched image → Persona cards → **Shield accordion** of protection areas → Advisory split → Vertical timeline → FAQ → Soft CTA |
| Auto | Dark asymmetric split with slanted image and road-line texture | **Dark risk band** → **Comparison columns** (Comprehensive / Third-party / Fleet) → **Chevron path** → FAQ → Dark CTA |
| Property | Image background with controlled dark overlay + asset strip | **Asset mosaic tiles** → Dark risk tiles → Advisory split → Phase cards → FAQ → Image CTA |
| HR consulting | Text-led with **People/Process/Performance Venn diagram** | Numbered challenges with sticky head → **P/P/P framework columns** → Numbered areas index → **Engagement table** (phase/what happens/outputs) → Dark outcomes → Related → FAQ |
| Organizational development | Premium minimal, centred, with **current→future journey line** | **Four-stage transformation flow** (grey → brand) → Challenge grid → **Radar diagnosis** of six dimensions → Capability split → **Gantt-style roadmap** → **Today vs future-state** comparison → FAQ |
| Training | Learning split on notebook-grid background, program counter, format chips | Thin-line principles grid → Program categories → Outcomes → Delivery formats → Featured programs rail → **Learning cycle** → FAQ → Image CTA |
| Business coaching | Growth split with chart motif and KPI chips | Light challenge tiles → **Focus tag cloud** → **Goals & accountability ring** → **Ascending stairs roadmap** → Related → FAQ |
| Executive coaching | Dark, bright-teal-accented, serif-light, **arched portrait** frame | Statement rows → **Roman-numeral leadership themes** (dark) → Vertical one-to-one journey → Decision-making split → FAQ → Dark CTA |

Each family uses a unique hero layout (verified by an automated test) and distinct section types,
so pages remain recognisably different even with titles and images hidden.

## 5. Mobile UX

- Compact header: logo · language · menu. Full-height drawer with **accordion groups**
  (Insurance / People & Organization / Learning & Leadership) and the flagship highlighted.
- **Sticky bottom bar**: Call + WhatsApp (or Consult when one is not configured), safe-area aware,
  auto-hides while typing in forms and when a form or the footer is on screen; the cookie banner
  sits above it.
- Progressive disclosure: “Show more” lists, accordions (FAQ, coverage, ecosystem details),
  **swipe rails with prev/next buttons and a progress bar** (programs, insurance lines, related
  services, pillars, phase cards, insights), tabbed employee moments, vertical steppers instead of
  shrunk diagrams, simplified radial/ring diagrams, 2:1 and 16:9 mobile image crops.
- Verified: no horizontal scroll at 360–430 px on every page in both languages.

## 6. CMS features (`/admin`)

Pages with section builder (37 section types), services (family, hero layout, accent, icon,
3 independent images, hero, sections, FAQs, SEO), service categories, training programs (all
requested fields + agenda, FAQ, registration), program categories, articles (rich text, tags,
scheduling, author), article categories, FAQs, team, testimonials, **media library** (auto-resize,
WebP/AVIF variants, alt/caption in both languages, focal point, replace), menus & footer links,
form submissions (status, notes, CSV export), redirects, admin users, site settings (brand, logo,
colours, contact, WhatsApp, channel order, social, SEO, verification, analytics, consent, footer,
forms), SEO checks page and an analytics dashboard. Every text field is bilingual.

## 7. SEO

Semantic HTML with one H1 per page; localized URLs, titles, descriptions, canonicals and Open
Graph; `hreflang` en/ar/x-default; XML sitemap with alternates for both languages; dynamic
robots.txt; JSON-LD (**Organization/ProfessionalService, WebSite, Service, Article, Course,
FAQPage, BreadcrumbList**); breadcrumbs; internal linking (mega-menus, related services, related
articles/programs); alt text management; per-item SEO controls incl. noindex/nofollow and
canonical overrides; factual SEO checks (no fake scores); Google/Bing verification fields; a
staging switch (`SEO_FORCE_NOINDEX`). Medical insurance pages target corporate medical insurance /
employee medical insurance / employee health benefits / medical insurance management in natural
language (EN + AR).

## 8. Analytics & conversion tracking

GA4, GTM (with Consent Mode v2 defaults), Meta Pixel, LinkedIn Insight Tag and TikTok Pixel —
loaded only when configured and after consent (Necessary / Analytics / Marketing). Conversion events:
contact submission, consultation click, WhatsApp click, phone click, email click, medical insurance
enquiry, training registration — pushed to `dataLayer`/`gtag`/`fbq`/`ttq` and recorded by the
built-in **cookie-free first-party statistics** (daily-rotating hashed visitor IDs, no IPs stored)
that power the dashboard.

## 9. Security

Bcrypt password hashing, strong password policy (12+ chars, mixed case, number, symbol;
breached-password check in production), CSRF on all forms, login throttling per IP **and** per
account, rate-limited enquiry and tracking endpoints, honeypot + signed timing check on forms,
encrypted database sessions (HttpOnly, Secure, SameSite=Lax), session invalidation on password
change and remote sign-out, inactive accounts blocked, role-based access (Super Admin / Editor),
validated & sanitized input, HTML sanitizer on rich text, Eloquent/PDO parameter binding, image-only
uploads re-encoded by GD, scripts blocked in `/uploads`, CSV-injection-safe exports, nonce-based CSP
(`strict-dynamic`), X-Content-Type-Options, X-Frame-Options, Referrer-Policy, Permissions-Policy,
COOP, HSTS on HTTPS, branded 403/404/419/429/500/503 pages without debug output, `.env` and
application code outside the web root, persistent cache refuses to unserialize PHP objects.

## 10. Quality assurance performed

- **38 automated tests / 409 assertions passing** on SQLite and on **MariaDB 10.11**: every page,
  service, program and article in both languages (one H1, hreflang, canonical, schema), sitemap,
  robots, noindex switch, 404s, redirects, hidden empty contact channels, WhatsApp/phone links,
  tracking-ID validation, security headers, analytics beacon & bot filtering, enquiry form
  (storage, classification, email, validation, consent, honeypot, timing, rate limiting, HTML
  stripping), admin access (guest, username/email login, wrong password, inactive user, editor vs
  super-admin permissions) and **lossless admin round-trips** for all services, pages and programs.
- Web installer tested end-to-end on a blank database (key generation → migrations → seed →
  Super Admin → installer disabled).
- Lighthouse (mobile, local dev server without compression): **Accessibility 100, Best Practices
  100, SEO 100, Performance 88–90, CLS 0**.
- Visual review of screenshots at 360/375/390/412 (mobile), 1440 (desktop) in English and Arabic,
  mega-menu, drawer, consent banner, quick-contact bar and forms; horizontal-overflow check on all
  pages at 360 px.

## 11. External values still needed from WAFA

Already verified and in place: official logo and favicon, brand colours, phone, WhatsApp, email,
About / founder / vision / mission / values, service scope (see `CONTENT-NOTES.md`).

1. **Address**, **business hours**, map location and **social media** profile URLs.
2. Legal company name.
3. Approval (or removal) of the pending claims: 24/7 client support, fast turnaround, certified
   trainers and coaches.
4. Review of the provisional supporting copy and the Arabic translations listed in `CONTENT-NOTES.md`.
5. Real **training courses** (dates, facilitators, durations, certificates) if any, and the date /
   approved client name for the corporate engagement.
6. **Professional photography** (see `IMAGE-BRIEF.md`).
7. Any genuine testimonials, team members, statistics or client logos — with permission.
10. Hosting values at deployment: domain, MySQL credentials, SMTP mailbox, notification email,
    and (optional) GA4/GTM/Meta/LinkedIn/TikTok IDs and Search Console/Bing verification codes.
