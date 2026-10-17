// First-party cookieless beacons + conversion events forwarded to consented tag managers.
const beacon = (payload) => {
  const url = document.body.dataset.track;
  if (!url) return;
  const body = JSON.stringify(payload);
  try {
    if (navigator.sendBeacon) {
      navigator.sendBeacon(url, new Blob([body], { type: 'application/json' }));
    } else {
      fetch(url, { method: 'POST', body, headers: { 'Content-Type': 'application/json' }, keepalive: true, credentials: 'same-origin' });
    }
  } catch { /* ignore */ }
};

export function trackEvent(name, extra = {}, { firstParty = true } = {}) {
  const path = location.pathname;
  if (firstParty) beacon({ type: 'event', name, path });
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({ event: name, page_path: path, ...extra });
  if (typeof window.gtag === 'function') window.gtag('event', name, { page_path: path, ...extra });
  const lead = ['contact_submit', 'medical_inquiry', 'training_registration'].includes(name);
  if (typeof window.fbq === 'function') window.fbq(lead ? 'track' : 'trackCustom', lead ? 'Lead' : name, extra);
  if (window.ttq && typeof window.ttq.track === 'function') window.ttq.track(lead ? 'SubmitForm' : 'Contact', extra);
  if (typeof window.lintrk === 'function' && lead && window.WAFA_LINKEDIN_CONVERSION) window.lintrk('track', { conversion_id: window.WAFA_LINKEDIN_CONVERSION });
}

export function initTracking(consent) {
  window.wafaTrack = trackEvent;
  if (consent?.cfg?.firstParty !== false) {
    beacon({ type: 'pageview', path: location.pathname, ref: document.referrer });
  }
  document.addEventListener('click', (e) => {
    const el = e.target.closest('[data-event]');
    if (!el) return;
    const name = el.dataset.event;
    if (name) trackEvent(name, { link_url: el.getAttribute('href') || undefined });
  });
}
