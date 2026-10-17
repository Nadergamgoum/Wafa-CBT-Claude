# Content audit notes & provisional content

## Audit status

The public website (`https://wafa-cbt.com`) and the archive services were **not reachable from the
build environment** (network policy), and no reference package was available. Therefore:

- No text, logo, image, colour or contact detail could be extracted from the old site.
- The business scope comes from the project brief: corporate medical insurance & employee health
  benefits (primary), insurance brokerage, medical insurance management, life, auto and property
  insurance, HR consulting, organizational development, training & professional development,
  business coaching and executive coaching.
- Per the brief, **no factual claims were invented** — no clients, statistics, awards, partners,
  insurers, certifications, years of experience, locations, testimonials or team members.

When the reference package or staging site is available: audit it, reconcile facts, replace the
provisional items below and add 301 redirects for every legacy URL.

## Configurable but intentionally empty (fill in Admin → Site settings)

Logo (light & dark), favicon, official brand colours (provisional navy `#0d3150`, teal `#0f7a76`,
gold `#c79a3e` are in place), legal company name, phone, WhatsApp number, email, address,
business hours, map, social profiles, notification email, analytics IDs, verification codes.
Every empty value is hidden on the public site — no placeholders are shown.

## Provisional content to review

| Area | What to check |
|---|---|
| Brand name in Arabic | Set to **وفاء** (site name). Confirm the official Arabic name/spelling. |
| Service pages (9) | Professional copy written within the brief’s scope — confirm wording, especially claims about brokerage role and services offered. |
| Life / auto / property coverage lists | Written generically with “depends on insurer and regulations” notes — confirm which products WAFA actually arranges. |
| Training programs (6) | **Editorial program outlines** (titles, outcomes, agendas). No dates, trainers, durations, prices or certificates were invented — status is “Available on request”. Confirm, edit or unpublish. |
| Insights (4 articles) | Educational articles (no statistics or client data), authored as “WAFA Editorial Team”. Review before launch. |
| FAQs (~58) | General answers within scope — confirm processes (e.g. renewal preparation, claims support). |
| Legal pages | Privacy, Terms and Cookie policy are **templates** marked for legal review; jurisdiction-specific wording is required. |
| Redirects | 20 common WordPress-style URLs are mapped (e.g. `/about-us` → `/about`). Replace/extend with the real legacy URL list. |
| Team & testimonials | Sections exist but stay hidden until real, approved entries are published. |
| Imagery | Built-in illustrations are placeholders — see `IMAGE-BRIEF.md`. |

## Items noted for the old site (to verify during reconciliation)

Typical issues to look for when the legacy site is audited: template placeholder text, duplicated
service descriptions, outdated event photos on the homepage, grammar issues, missing Arabic versions,
missing meta descriptions and non-descriptive URLs. Record findings here once the audit is possible.
