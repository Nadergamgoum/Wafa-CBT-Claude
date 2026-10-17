// Accessible accordions (FAQ, coverage details, mobile-collapsed sections) and "read more".
export function initDisclosure() {
  document.querySelectorAll('[data-acc]').forEach((root) => {
    const single = root.hasAttribute('data-acc-single');
    root.querySelectorAll('[data-acc-btn]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const panel = document.getElementById(btn.getAttribute('aria-controls'));
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        if (single && !expanded) {
          root.querySelectorAll('[data-acc-btn][aria-expanded="true"]').forEach((other) => {
            other.setAttribute('aria-expanded', 'false');
            document.getElementById(other.getAttribute('aria-controls')).hidden = true;
          });
        }
        btn.setAttribute('aria-expanded', String(!expanded));
        panel.hidden = expanded;
      });
    });
  });

  // Sections that collapse on small screens only: [data-mcollapse] + [data-mcollapse-btn]
  const mq = window.matchMedia('(max-width: 767.98px)');
  document.querySelectorAll('[data-more]').forEach((root) => {
    const btn = root.querySelector('[data-more-btn]');
    if (!btn) return;
    const labelMore = btn.dataset.more;
    const labelLess = btn.dataset.less;
    const apply = () => {
      if (!mq.matches) { root.classList.remove('is-collapsed'); btn.hidden = true; return; }
      btn.hidden = false;
      if (!root.dataset.touched) root.classList.add('is-collapsed');
      const collapsed = root.classList.contains('is-collapsed');
      btn.setAttribute('aria-expanded', String(!collapsed));
      btn.querySelector('span').textContent = collapsed ? labelMore : labelLess;
    };
    btn.addEventListener('click', () => {
      root.dataset.touched = '1';
      root.classList.toggle('is-collapsed');
      apply();
      if (root.classList.contains('is-collapsed')) root.scrollIntoView({ block: 'nearest' });
    });
    mq.addEventListener('change', apply);
    apply();
  });
}
