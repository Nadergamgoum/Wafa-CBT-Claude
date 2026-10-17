import { trackEvent } from './track';

// Progressive enhancement for enquiry forms: inline validation + async submit.
// Without JavaScript the form still posts normally and the server redirects back.
export function initForms() {
  document.querySelectorAll('form[data-enquiry]').forEach((form) => {
    const status = form.querySelector('[data-form-status]');
    const submit = form.querySelector('[type="submit"]');

    form.addEventListener('submit', async (e) => {
      if (!form.checkValidity()) {
        e.preventDefault();
        form.classList.add('was-validated');
        form.querySelector(':invalid')?.focus();
        return;
      }
      if (!window.fetch) return;
      e.preventDefault();
      submit.disabled = true;
      submit.classList.add('is-loading');
      form.querySelectorAll('.field__error[data-server]').forEach((n) => n.remove());
      try {
        const res = await fetch(form.action, {
          method: 'POST',
          body: new FormData(form),
          headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
          credentials: 'same-origin',
        });
        const data = await res.json().catch(() => ({}));
        if (res.ok) {
          form.reset();
          form.classList.remove('was-validated');
          status.className = 'form-status is-success';
          status.textContent = data.message || status.dataset.success;
          status.hidden = false;
          status.focus();
          // The server already recorded the first-party conversion; forward it to consented tags only.
          const map = { training: 'training_registration', medical: 'medical_inquiry' };
          trackEvent(map[data.event] || 'contact_submit', { form_type: data.event }, { firstParty: false });
        } else if (res.status === 422 && data.errors) {
          Object.entries(data.errors).forEach(([field, msgs]) => {
            const input = form.querySelector(`[name="${field}"]`);
            const host = input?.closest('.field') || form.querySelector('[data-form-status]');
            const p = document.createElement('p');
            p.className = 'field__error';
            p.dataset.server = '1';
            p.textContent = msgs[0];
            host?.appendChild(p);
            input?.setAttribute('aria-invalid', 'true');
          });
          form.querySelector('[aria-invalid="true"]')?.focus();
        } else {
          status.className = 'form-status is-error';
          status.textContent = res.status === 429 ? status.dataset.throttled : status.dataset.error;
          status.hidden = false;
        }
      } catch {
        status.className = 'form-status is-error';
        status.textContent = status.dataset.error;
        status.hidden = false;
      } finally {
        submit.disabled = false;
        submit.classList.remove('is-loading');
      }
    });
  });

  // Keep the mobile quick-contact bar out of the way while typing or when a form is on screen.
  const bar = document.querySelector('[data-quickbar]');
  if (!bar) return;
  const hideWhen = new Set();
  const sync = () => bar.classList.toggle('is-hidden', hideWhen.size > 0);
  document.addEventListener('focusin', (e) => { if (e.target.matches('input, textarea, select')) { hideWhen.add('focus'); sync(); } });
  document.addEventListener('focusout', (e) => { if (e.target.matches('input, textarea, select')) { hideWhen.delete('focus'); sync(); } });
  const forms = document.querySelectorAll('form[data-enquiry], .site-footer');
  if ('IntersectionObserver' in window && forms.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((en) => { const k = `in-${en.target.id || en.target.className}`; en.isIntersecting ? hideWhen.add(k) : hideWhen.delete(k); });
      sync();
    }, { threshold: 0.15 });
    forms.forEach((f) => io.observe(f));
  }
}

document.addEventListener('change', (e) => {
  if (e.target.matches('[data-autosubmit]')) e.target.form?.submit();
});
