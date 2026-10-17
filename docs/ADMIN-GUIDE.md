# WAFA CMS — administrator guide

Sign in at **`/admin`** with your **username or email** and password.

| Role | Can do |
|---|---|
| **Super Admin** | Everything: content, Site settings (brand, contact, analytics, cookies, SEO, maintenance), Redirects & 410, Form submissions (leads), Admin users and the analytics dashboard |
| **Editor** | Content only: pages, services, categories, training programs, corporate engagements, articles, FAQs, team, testimonials, media and menus. Editors cannot see settings, analytics, leads, redirects or users. |

## Bilingual editing

Every text field appears twice: **English** (left) and **العربية** (right, typed right-to-left).
English is the primary language; if an Arabic field is left empty the English text is shown on the
Arabic site, so always complete both. Headlines support highlighting: wrap words in `*asterisks*`
to render them in the accent style, e.g. `Better Care. *Better Experience.*`.

## Page sections (the section builder)

Home, About, Contact, category pages and every service page are made of **sections**. Open the
**Sections** tab to:

- **Edit** a section — click its title to expand it.
- **Reorder** — use the arrows or drag.
- **Hide** — open *Display options* and switch off *Show this section* (the content is kept).
- **Add** — *Add section* lists all section types: hero banner, text + image (image on either
  side), rich text/editorial, cards (benefits grid, feature list or carousel), pillars, process /
  timeline (six layouts), diagrams (ecosystem, management model, dimensions), accordion, tabs,
  FAQ, call-to-action, quote, founder profile, vision & mission, team, insights (blog grid),
  training programs, corporate engagements, related services, statistics, logo grid, photo
  gallery, reporting showcase and the service-specific layouts.
- **Statistics and logo grids** show only what you enter — add verified figures and approved
  client/partner logos only. Both stay hidden while empty.
- **Duplicate** — the copy icon clones a section.
- *Display options* also set the background, an anchor ID (for `#links`), a short label for the
  on-page menu (Medical Insurance page) and the built-in illustration used when no photo is chosen.

Button links: a site path (`/contact#contact-form` — the Arabic site adds `/ar` automatically),
a full `https://` URL, a `#anchor`, or `@whatsapp` to open WhatsApp.

## Services

**Services → Services** — each service has tabs:

- **Content** — name, short menu name, summary, category, URL slug, order, published.
- **Hero** — eyebrow, headline, introduction, buttons and up to four highlights.
- **Presentation** — service family, hero layout, accent colour, menu icon, built-in illustration
  and **three independent images** (hero, secondary, card/menu).
- **Sections** — the page body. Each service family starts with a different structure.
- **SEO** — see below. Service FAQs are managed at the bottom of the edit screen.

## Media library

**Content → Media library** — upload JPEG/PNG/WebP/AVIF/GIF (max 8 MB). Large images are resized
and responsive **WebP** versions are generated automatically (AVIF too where the server supports
it). Always add **alt text in both languages** and choose a focal point for cropping.
*Replace image* updates every page that uses the image. Images can also be uploaded directly from
any image field (“+”).

## Training programs

**Training → Training programs** — title, summary, description, image, category, facilitator,
dates, duration, delivery mode, location, online link (kept private), registration status,
external registration URL (optional — otherwise the built-in form is used), certificate, audience,
outcomes, requirements, agenda, FAQ and SEO. Registrations arrive in **Leads**.

## Corporate engagements

**Training → Corporate engagements** — title, summary, description, highlights, featured image,
**photo gallery** (add, reorder, caption each photo; alt text is set per image in the media
library), event date (leave empty if not confirmed), client name with an **“approved to be named”**
switch (the name is only shown when it is on), call-to-action text and link, featured, published
and SEO. Engagements appear at `/corporate-engagements`, in the Learning menu, in the footer and
wherever the *Corporate engagements* section is added.

## Insights (articles)

**Insights → Articles** — title, slug, excerpt, rich-text content, featured image, author (team
member or name), category, tags per language, publish date (future dates schedule publishing),
featured flag and SEO. Reading time, related articles, breadcrumbs and Article schema are automatic.

## FAQs, team, testimonials

- **FAQs** belong to a service page, appear on the homepage, or attach to a topic (insurance,
  people, learning, contact, general) used on category, About and Contact pages.
- **Team** and **Testimonials** sections stay hidden on the website until at least one item is
  published. Only publish genuine testimonials with the client’s permission.

## Menus & footer

**Site → Menus & footer links** — the header menu (service categories open mega-menus; any other
item can have **dropdown links**, shown as an accordion on mobile), extra links for the mobile
menu, footer company links and footer legal links. Reorder, hide or add items; labels in both
languages. The footer description, copyright, service columns and an optional call-to-action strip
are in **Site settings → Footer & forms**.

## Site settings (Super Admin)

- **General & brand** — site name, legal name, header button text and link, **logo** (light and
  dark versions — the official WAFA files are built in, upload only to replace them), favicon,
  default social image, the **three brand colours** (all tints derive automatically) and the
  heading typography (editorial serif or clean sans-serif).
- **Contact & WhatsApp** — phone, email, address, hours, Google Maps embed, WhatsApp (enable,
  country code, number, default message), Messenger/Telegram, the **mobile contact bar** (on/off,
  which buttons — Call, WhatsApp, Consultation, Email — their order and labels), the desktop
  contact menu and the **order** of contact channels. Anything left empty is hidden on the site.
- **Social media** — LinkedIn, Facebook, Instagram, X, YouTube, TikTok, Telegram, Snapchat, Threads,
  WhatsApp: add, enable/disable and drag to reorder.
- **SEO & search engines** — title pattern, default description, indexing switch (turn off for
  staging), Google Search Console and Bing verification (paste the code or the whole meta tag),
  extra robots rules, default language for search engines (x-default), organization type for
  structured data and which content types appear in the XML sitemap.
- **Analytics & tracking** — an on/off switch and ID for each of GA4, GTM, Meta Pixel, LinkedIn
  Insight Tag and TikTok Pixel, plus the built-in cookie-free statistics. Third-party scripts load
  only when switched on, configured and consented.
- **Cookies & consent** — consent requirement, banner text, cookie categories (analytics /
  marketing) and a version number (change it to ask everyone again).
- **Footer & forms** — footer description and copyright, service columns on/off, optional
  call-to-action strip, notification email and form success message.
- **Site behaviour** — language switcher visibility and **maintenance mode** (visitors see a
  “back shortly” page; signed-in CMS users can still browse the site).

## SEO

Every page, category, service, program and article has an **SEO** tab: SEO title, meta description,
focus keyword, secondary keywords, Open Graph / X title, description and image, canonical override,
index/noindex, follow/nofollow and X card type — per language. The tab shows **live checks**
(missing title/description, length guidance, missing H1, missing alt text, noindex, canonical format,
slug quality). **Site → SEO checks** lists the same checks for the whole site. The XML sitemap
(`/sitemap.xml`, both languages with hreflang) and `robots.txt` update automatically.

## Leads (form submissions)

**Leads → Form submissions** — every contact, consultation, medical-insurance enquiry and training
registration with language, page, campaign (UTM) data and consent. Set a status (New / Contacted /
Qualified / Closed / Spam) — or use the quick **Contacted** / **Close** buttons and the bulk actions
— add internal notes, filter by status, type and date, search by name, email or phone, and export
CSV (all, filtered or selected; Excel-friendly and Arabic-safe). Super Admin only.

## Redirects (Super Admin)

**Site → Redirects & 410** — map old URLs (including WordPress `/?page_id=12` style URLs) to new pages
with a 301/302/307/308 redirect, or answer **410 Gone** for content that no longer exists. End the
old path with `*` to cover everything below it (e.g. `/portfolio*`). The hit counter shows which old
links are still in use. The legacy wafa-cbt.com map is pre-loaded (see `CONTENT-NOTES.md`).

## Pending claims

Two service commitments from the original site — **24/7 client support** and **fast turnaround** —
are stored in a hidden section on the Corporate Medical Insurance page labelled “PENDING APPROVAL”.
Switch on *Show this section* only once WAFA confirms them.

## Dashboard (Super Admin)

Visitors, page views, form submissions, call/WhatsApp/email clicks, a 30-day traffic chart, top pages,
traffic sources, devices, language split and conversions — from the built-in, cookie-free statistics.
Detailed marketing analytics live in Google Analytics once configured.

## Your account & security

- **Profile** (top-right menu): change name, username, email and password. Changing the password
  signs you out on all other devices; *Sign out other sessions* does the same on demand.
- **Forgot password** on the sign-in page emails a reset link (requires SMTP).
- Super Admins can deactivate users, send reset links, view each user’s **active sessions** (IP,
  device, last activity) and *Sign out everywhere* for any user.
- Sign-in attempts are rate-limited per IP and per account.
