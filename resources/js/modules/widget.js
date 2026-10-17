export function initContactWidget() {
  const root = document.querySelector('[data-cwidget]');
  if (!root) return;
  const btn = root.querySelector('[data-cwidget-toggle]');
  const set = (open) => { root.classList.toggle('is-open', open); btn.setAttribute('aria-expanded', String(open)); };
  btn.addEventListener('click', () => set(!root.classList.contains('is-open')));
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && root.classList.contains('is-open')) { set(false); btn.focus(); } });
  document.addEventListener('click', (e) => { if (!root.contains(e.target)) set(false); });
}
