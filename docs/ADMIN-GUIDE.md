# WAFA CMS — administrator guide

Sign in at **`/admin`** with your **username or email** and password.

| Role | Can do |
|---|---|
| **Super Admin** | Everything, including Site settings, Redirects and Admin users |
| **Editor** | Content only: pages, services, categories, programs, articles, FAQs, team, testimonials, media, menus, and viewing form submissions |

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
- **Add** — *Add section* lists all section types (challenges, process/journey with six layouts,
  ecosystem diagram, FAQ, call-to-action, comparison tables, roadmaps, …).
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

**Site → Menus & footer links** — the header menu (service categories open mega-menus), footer
company links and footer legal links. Reorder, hide or add items; labels in both languages. The
footer tagline and copyright are in **Site settings → Footer & forms**.

## Site settings (Super Admin)

- **General & brand** — site name, legal name, header button, **logo** (light and dark versions),
  favicon, default social image and the **three brand colours** (all tints derive automatically).
- **Contact & WhatsApp** — phone, email, address, hours, Google Maps embed, WhatsApp (enable,
  country code, number, default message), Messenger/Telegram, the desktop contact menu and the
  **order** of contact channels. Anything left empty is hidden on the site.
- **Social media** — LinkedIn, Facebook, Instagram, X, YouTube, TikTok, Telegram, Snapchat, Threads,
  WhatsApp: add, enable/disable and drag to reorder.
- **SEO & search engines** — title pattern, default description, indexing switch, Google Search
  Console and Bing verification (paste the code or the whole meta tag), extra robots rules.
- **Analytics & tracking** — GA4, GTM, Meta Pixel, LinkedIn Insight Tag, TikTok Pixel and the
  built-in cookie-free statistics. Third-party scripts load only when configured and consented.
- **Cookies & consent** — consent requirement, banner text and a version number (change it to ask
  everyone again).
- **Footer & forms** — footer texts, notification email and form success message.

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
Qualified / Closed / Spam), add internal notes and export CSV (Excel-friendly, Arabic-safe).

## Redirects (Super Admin)

**Site → Redirects (301)** — map old URLs (including WordPress `/?page_id=12` style URLs) to new pages.
The hit counter shows which old links are still in use.

## Dashboard

Visitors, page views, form submissions, call/WhatsApp/email clicks, a 30-day traffic chart, top pages,
traffic sources, devices, language split and conversions — from the built-in, cookie-free statistics.
Detailed marketing analytics live in Google Analytics once configured.

## Your account & security

- **Profile** (top-right menu): change name, username, email and password. Changing the password
  signs you out on all other devices; *Sign out other sessions* does the same on demand.
- **Forgot password** on the sign-in page emails a reset link (requires SMTP).
- Super Admins can deactivate users, send reset links and *Sign out everywhere* for any user.
- Sign-in attempts are rate-limited per IP and per account.
