// Cookie consent (Necessary / Analytics / Marketing) and consent-gated tag loading.
const COOKIE = 'wafa_consent';

const readConfig = () => {
  try { return JSON.parse(document.getElementById('wafa-config')?.textContent || '{}'); } catch { return {}; }
};

const getCookie = () => {
  const m = document.cookie.match(new RegExp(`(?:^|; )${COOKIE}=([^;]*)`));
  if (!m) return null;
  try { return JSON.parse(decodeURIComponent(m[1])); } catch { return null; }
};

const setCookie = (value) => {
  const secure = location.protocol === 'https:' ? '; Secure' : '';
  document.cookie = `${COOKIE}=${encodeURIComponent(JSON.stringify(value))}; Max-Age=${60 * 60 * 24 * 180}; Path=/; SameSite=Lax${secure}`;
};

const inject = (src, attrs = {}) => {
  const s = document.createElement('script');
  s.async = true;
  s.src = src;
  Object.entries(attrs).forEach(([k, v]) => s.setAttribute(k, v));
  document.head.appendChild(s);
};

const loaded = {};

function loadTags(cfg, state) {
  window.dataLayer = window.dataLayer || [];
  window.gtag = window.gtag || function gtag() { window.dataLayer.push(arguments); };
  const g = state.analytics ? 'granted' : 'denied';
  const m = state.marketing ? 'granted' : 'denied';
  if (!loaded.defaults) {
    window.gtag('consent', 'default', { analytics_storage: 'denied', ad_storage: 'denied', ad_user_data: 'denied', ad_personalization: 'denied', wait_for_update: 500 });
    loaded.defaults = true;
  }
  window.gtag('consent', 'update', { analytics_storage: g, ad_storage: m, ad_user_data: m, ad_personalization: m });

  if ((state.analytics || state.marketing) && cfg.gtm && !loaded.gtm) {
    loaded.gtm = true;
    window.dataLayer.push({ 'gtm.start': Date.now(), event: 'gtm.js' });
    inject(`https://www.googletagmanager.com/gtm.js?id=${encodeURIComponent(cfg.gtm)}`);
  }
  if (state.analytics && cfg.ga4 && !loaded.ga4) {
    loaded.ga4 = true;
    inject(`https://www.googletagmanager.com/gtag/js?id=${encodeURIComponent(cfg.ga4)}`);
    window.gtag('js', new Date());
    window.gtag('config', cfg.ga4, { anonymize_ip: true });
  }
  if (state.marketing && cfg.meta && !loaded.meta) {
    loaded.meta = true;
    const f = window;
    if (!f.fbq) {
      const n = (f.fbq = function fbq() { n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments); });
      if (!f._fbq) f._fbq = n;
      n.push = n; n.loaded = true; n.version = '2.0'; n.queue = [];
      inject('https://connect.facebook.net/en_US/fbevents.js');
    }
    window.fbq('init', cfg.meta);
    window.fbq('track', 'PageView');
  }
  if (state.marketing && cfg.linkedin && !loaded.linkedin) {
    loaded.linkedin = true;
    window._linkedin_partner_id = cfg.linkedin;
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(cfg.linkedin);
    if (!window.lintrk) {
      window.lintrk = function lintrk(a, b) { window.lintrk.q.push([a, b]); };
      window.lintrk.q = [];
    }
    inject('https://snap.licdn.com/li.lms-analytics/insight.min.js');
  }
  if (state.marketing && cfg.tiktok && !loaded.tiktok) {
    loaded.tiktok = true;
    const w = window;
    w.TiktokAnalyticsObject = 'ttq';
    const ttq = (w.ttq = w.ttq || []);
    ttq.methods = ['page', 'track', 'identify', 'instances', 'debug', 'on', 'off', 'once', 'ready', 'alias', 'group', 'enableCookie', 'disableCookie'];
    ttq.setAndDefer = (t, e) => { t[e] = function () { t.push([e].concat(Array.prototype.slice.call(arguments, 0))); }; };
    ttq.methods.forEach((m2) => ttq.setAndDefer(ttq, m2));
    ttq.load = (id) => {
      ttq._i = ttq._i || {}; ttq._i[id] = []; ttq._t = ttq._t || {}; ttq._t[id] = +new Date();
      inject(`https://analytics.tiktok.com/i18n/pixel/events.js?sdkid=${encodeURIComponent(id)}&lib=ttq`);
    };
    ttq.load(cfg.tiktok);
    ttq.page();
  }
}

export function initConsent() {
  const cfg = readConfig();
  const banner = document.querySelector('[data-consent]');
  const hasTags = Boolean(cfg.ga4 || cfg.gtm || cfg.meta || cfg.linkedin || cfg.tiktok);
  let state = getCookie();
  if (state && state.v !== cfg.consentVersion) state = null;

  const apply = (s) => { state = s; if (hasTags) loadTags(cfg, s); };

  if (!cfg.requireConsent) {
    apply({ necessary: true, analytics: true, marketing: true, v: cfg.consentVersion });
    banner?.remove();
    return { cfg, get: () => state };
  }

  if (!banner) return { cfg, get: () => state || { analytics: false, marketing: false } };
  const prefs = banner.querySelector('[data-consent-prefs]');
  const btnSave = banner.querySelector('[data-consent-save]');
  const btnCustomize = banner.querySelector('[data-consent-customize]');

  const show = () => {
    banner.hidden = false;
    document.body.classList.add('consent-open');
    if (state) {
      prefs.analytics.checked = !!state.analytics;
      prefs.marketing.checked = !!state.marketing;
    }
  };
  const hide = () => { banner.hidden = true; document.body.classList.remove('consent-open'); };
  const save = (analytics, marketing) => {
    const s = { necessary: true, analytics, marketing, v: cfg.consentVersion, at: new Date().toISOString() };
    setCookie(s);
    apply(s);
    hide();
  };

  banner.querySelector('[data-consent-accept]').addEventListener('click', () => save(true, true));
  banner.querySelector('[data-consent-reject]').addEventListener('click', () => save(false, false));
  btnCustomize.addEventListener('click', () => {
    prefs.hidden = false; btnSave.hidden = false; btnCustomize.hidden = true;
    prefs.querySelector('input:not([disabled])')?.focus();
  });
  btnSave.addEventListener('click', () => save(prefs.analytics.checked, prefs.marketing.checked));
  document.querySelectorAll('[data-consent-open]').forEach((b) => b.addEventListener('click', () => {
    show(); prefs.hidden = false; btnSave.hidden = false; btnCustomize.hidden = true;
  }));

  // Only ask when there is something optional to consent to.
  if (state) apply(state);
  else if (hasTags) show();

  return { cfg, get: () => state || { analytics: false, marketing: false } };
}
