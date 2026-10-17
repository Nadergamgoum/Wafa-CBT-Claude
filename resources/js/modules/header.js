// Sticky header state, desktop mega menus and the mobile drawer.
export function initHeader() {
  const header = document.querySelector('[data-header]');
  if (!header) return;

  const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  // Mega menus: click/Enter toggles, hover opens on pointer devices, Esc closes.
  const items = [...header.querySelectorAll('[data-mega]')];
  const closeAll = (except) => items.forEach((item) => item !== except && setOpen(item, false));
  const setOpen = (item, open) => {
    const btn = item.querySelector('button');
    const panel = item.querySelector('[data-mega-panel]');
    btn.setAttribute('aria-expanded', String(open));
    panel.classList.toggle('is-open', open);
  };
  const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  items.forEach((item) => {
    const btn = item.querySelector('button');
    let timer;
    btn.addEventListener('click', () => {
      const open = btn.getAttribute('aria-expanded') !== 'true';
      closeAll(item);
      setOpen(item, open);
    });
    if (canHover) {
      item.addEventListener('mouseenter', () => { clearTimeout(timer); closeAll(item); setOpen(item, true); });
      item.addEventListener('mouseleave', () => { timer = setTimeout(() => setOpen(item, false), 160); });
    }
    item.addEventListener('focusout', (e) => { if (!item.contains(e.relatedTarget)) setOpen(item, false); });
  });
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    const open = items.find((i) => i.querySelector('button').getAttribute('aria-expanded') === 'true');
    if (open) { setOpen(open, false); open.querySelector('button').focus(); }
  });
  document.addEventListener('click', (e) => { if (!header.contains(e.target)) closeAll(); });

  // Drawer
  const drawer = document.querySelector('[data-drawer]');
  const opener = header.querySelector('[data-drawer-open]');
  if (!drawer || !opener) return;
  const panel = drawer.querySelector('.drawer__panel');
  const focusables = () => [...panel.querySelectorAll('a[href], button:not([disabled])')].filter((el) => el.offsetParent !== null);
  const open = () => {
    drawer.classList.add('is-open');
    drawer.setAttribute('aria-hidden', 'false');
    opener.setAttribute('aria-expanded', 'true');
    document.body.classList.add('drawer-open');
    setTimeout(() => focusables()[0]?.focus(), 50);
  };
  const close = () => {
    drawer.classList.remove('is-open');
    drawer.setAttribute('aria-hidden', 'true');
    opener.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('drawer-open');
    opener.focus();
  };
  opener.addEventListener('click', open);
  drawer.querySelectorAll('[data-drawer-close]').forEach((el) => el.addEventListener('click', close));
  drawer.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') close();
    if (e.key !== 'Tab') return;
    const f = focusables();
    if (!f.length) return;
    if (e.shiftKey && document.activeElement === f[0]) { e.preventDefault(); f[f.length - 1].focus(); }
    else if (!e.shiftKey && document.activeElement === f[f.length - 1]) { e.preventDefault(); f[0].focus(); }
  });
  drawer.querySelectorAll('[data-mnav]').forEach((btn) => {
    btn.addEventListener('click', () => {
      const sub = document.getElementById(btn.getAttribute('aria-controls'));
      const expanded = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!expanded));
      sub.hidden = expanded;
    });
  });
  window.matchMedia('(min-width: 1100px)').addEventListener('change', (e) => { if (e.matches && drawer.classList.contains('is-open')) close(); });
}
