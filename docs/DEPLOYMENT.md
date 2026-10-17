# Deploying WAFA to Hostinger shared hosting

This guide installs the site on a Hostinger **Premium / Business / Cloud** shared plan
(PHP + MySQL + SSL). No Node.js, Docker, Redis, root access or background workers are needed —
the deployment ZIP already contains compiled front-end assets and PHP dependencies.

> **Do not deploy until the external values listed at the end of `PROJECT-OVERVIEW.md`
> (logo, brand colours, contact details) have been confirmed** — they can also be added
> after go-live from the admin panel.

---

## 1. What is in the deployment ZIP

```
wafa-hostinger-deploy-YYYYMMDD.zip
├── wafa-app/          Laravel application (PRIVATE — goes next to public_html, never inside it)
│   ├── app/ bootstrap/ config/ database/ lang/ resources/ routes/ storage/ vendor/
│   ├── artisan
│   ├── .env.example   → copy to .env and fill in
│   └── .htaccess      denies all web access (safety net)
├── public_html/       Web root contents (index.php points to ../wafa-app)
│   ├── index.php  .htaccess  favicon.svg
│   ├── build/         compiled CSS/JS/fonts
│   ├── css/ js/ fonts/ (admin panel assets)
│   ├── images/        icons sprite + built-in illustrations
│   └── uploads/       media library uploads (scripts are blocked here)
└── docs/
```

## 2. Server requirements

| Requirement | Value |
|---|---|
| PHP | **8.3 or 8.4** (hPanel → Advanced → PHP Configuration) |
| PHP extensions | bcmath, ctype, curl, dom, fileinfo, gd (with WebP), intl, mbstring, openssl, pdo_mysql, tokenizer, xml, zip — all enabled by default on Hostinger |
| Database | MySQL 8 / MariaDB 10.6+ (utf8mb4) |
| SSL | Free SSL enabled for the domain (hPanel → Security → SSL) |

Recommended PHP settings: `memory_limit 256M`, `upload_max_filesize 16M`, `post_max_size 20M`, `max_execution_time 120`.

## 3. Create the database

hPanel → **Databases → MySQL Databases** → create a database and user (note the full names,
e.g. `u123456789_wafa` / `u123456789_wafauser`) and a strong password.

## 4. Upload the files

Hostinger's folder for a domain looks like `/home/u123456789/domains/example.com/`.

1. hPanel → **File Manager** → open `domains/example.com/`.
2. Upload the ZIP there and **Extract** it.
3. Move the **contents** of the extracted `public_html/` into the existing `public_html/`
   (replace the default `default.php` / `index.html`, keep nothing else that is not ours).
4. Keep `wafa-app/` **next to** `public_html/` — the final layout must be:

```
domains/example.com/
├── wafa-app/
└── public_html/
    ├── index.php
    └── .htaccess …
```

> If your plan does not allow folders outside `public_html`, see **Appendix A**.

## 5. Configure `.env`

In `wafa-app/`, copy `.env.example` to `.env` and edit:

```dotenv
APP_URL=https://www.example.com          # your final domain, https
APP_PUBLIC_PATH=/home/u123456789/domains/example.com/public_html
DB_DATABASE=u123456789_wafa
DB_USERNAME=u123456789_wafauser
DB_PASSWORD=********
MAIL_USERNAME=website@example.com         # a mailbox created in hPanel → Emails
MAIL_PASSWORD=********
MAIL_FROM_ADDRESS=website@example.com
INSTALL_TOKEN=paste-a-random-string-of-at-least-32-characters
```

Keep `APP_ENV=production` and `APP_DEBUG=false`. Leave `APP_KEY=` empty for now (step 6 generates it).

## 6. Install

### Option 1 — with SSH (recommended; Hostinger hPanel → Advanced → SSH Access)

```bash
cd ~/domains/example.com/wafa-app
php artisan key:generate --force
php artisan migrate --force
php artisan db:seed --force          # bilingual starter content (runs only on an empty site)
php artisan wafa:admin               # creates the first Super Admin (interactive)
php artisan optimize                 # caches config, routes and views
```

Then remove `INSTALL_TOKEN` from `.env` (it is not needed with SSH).

### Option 2 — without SSH (web installer)

1. Make sure `INSTALL_TOKEN` is set and `APP_KEY=` is empty: on the first visit the site
   generates a secure application key and writes it into `.env` automatically.
2. Open `https://www.example.com/install?token=YOUR_INSTALL_TOKEN`.
3. Enter the first Super Admin's name, username, email and a strong password.
   The installer runs the migrations, loads the starter content and creates the account.
4. **Delete the `INSTALL_TOKEN` line from `.env`.** The installer is also permanently
   disabled as soon as an administrator exists.

## 7. Permissions

Folders must be writable by PHP (Hostinger default `755` for folders / `644` for files is correct):

- `wafa-app/storage/` (and everything inside)
- `wafa-app/bootstrap/cache/`
- `public_html/uploads/`

## 8. Scheduler (optional)

Only used to prune analytics older than 13 months. hPanel → **Advanced → Cron Jobs**, every day:

```
/usr/bin/php /home/u123456789/domains/example.com/wafa-app/artisan schedule:run >> /dev/null 2>&1
```

## 9. SMTP / email

Enquiry notifications and password-reset emails use the SMTP settings in `.env`
(Hostinger: `smtp.hostinger.com`, port `465`, scheme `smtps`). Set the recipient of enquiry
notifications in **Admin → Site settings → Footer & forms** (defaults to the contact email).
Test it with *Forgot password* on `/admin/login`.

## 10. After go-live checklist

- [ ] `https://` loads with a padlock; `http://` redirects to `https://`.
- [ ] `https://www.example.com/.env` returns **403/404** (never the file).
- [ ] Sign in at `/admin` → **Site settings**: upload the logo, set brand colours, phone, WhatsApp, email, address, social links.
- [ ] Settings → SEO: paste Google Search Console & Bing verification codes, then submit `https://www.example.com/sitemap.xml`.
- [ ] Settings → Analytics: add GA4 / GTM / Meta / LinkedIn / TikTok IDs if used.
- [ ] Media library: upload real photography and assign it to services (see `IMAGE-BRIEF.md`).
- [ ] Review the provisional texts flagged in `CONTENT-NOTES.md`, legal pages and training programs.
- [ ] Redirects: compare with the old site's URL list and add any missing 301 redirects.
- [ ] Submit a test enquiry and confirm the email arrives.

## 11. Updating the site later

1. Build a new ZIP (`scripts/build-package.sh` on a machine with PHP 8.3, Composer and Node 20+).
2. Back up (section 12).
3. Upload and overwrite `wafa-app/` **except** `wafa-app/.env` and `wafa-app/storage/`,
   and overwrite `public_html/` **except** `public_html/uploads/`.
4. Run `php artisan migrate --force && php artisan optimize` (SSH), or temporarily set
   `INSTALL_TOKEN` and use `/install` only on a fresh database — for updates SSH is required
   when migrations change.

## 12. Backups

- **Database:** hPanel → Databases → phpMyAdmin → Export (or Hostinger automatic backups).
- **Files that change:** `public_html/uploads/` and `wafa-app/.env`.
- Hostinger plans include daily/weekly backups (hPanel → Files → Backups); keep a monthly
  off-site copy of the database export and the `uploads` folder.

## 13. Security notes

- `.env`, the application code and `storage/` live outside the web root.
- `public_html/.htaccess` forces HTTPS, blocks dotfiles and sensitive extensions, and the
  `uploads/` folder refuses to execute or serve scripts/SVG/HTML.
- Admin sessions: HttpOnly, Secure (`SESSION_SECURE_COOKIE=true`), SameSite=Lax, encrypted,
  stored in the database so users can be signed out remotely.
- Never set `APP_DEBUG=true` on the live site.

---

## Appendix A — everything inside `public_html` (fallback)

Only if you cannot create folders next to `public_html`:

1. Upload `wafa-app/` **into** `public_html/wafa-app/` (its own `.htaccess` blocks all access).
2. Put the contents of the package's `public_html/` into `public_html/` as usual.
3. Edit `public_html/index.php`: `$app_dir = __DIR__.'/wafa-app';`
4. Set `APP_PUBLIC_PATH=/home/u123456789/domains/example.com/public_html`.
5. Verify that `https://www.example.com/wafa-app/.env` and `/wafa-app/artisan` return **403**.

## Appendix B — local preview

```bash
composer install && npm ci && npm run build
cp .env.example .env   # set APP_ENV=local, APP_DEBUG=true, APP_URL=http://127.0.0.1:8000
                       # DB_CONNECTION=sqlite (and remove the other DB_ lines) for a quick start
php artisan key:generate
touch database/database.sqlite && php artisan migrate --seed
php artisan filament:assets
php artisan wafa:admin
php artisan serve      # http://127.0.0.1:8000  ·  admin: http://127.0.0.1:8000/admin
```
