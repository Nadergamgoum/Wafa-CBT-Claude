// Photo galleries: links open a native <dialog> lightbox with keyboard and swipe navigation.
// Without JavaScript the links simply open the full-size image.
export function initGalleries() {
  document.querySelectorAll('[data-gallery]').forEach((root) => {
    const dialog = root.querySelector('[data-gallery-dialog]');
    if (!dialog || typeof dialog.showModal !== 'function') return;
    const links = [...root.querySelectorAll('[data-gallery-open]')];
    const img = dialog.querySelector('[data-gallery-img]');
    const caption = dialog.querySelector('[data-gallery-caption]');
    const count = dialog.querySelector('[data-gallery-count]');
    let index = 0;
    let opener = null;

    const show = (i) => {
      index = (i + links.length) % links.length;
      const link = links[index];
      img.src = link.dataset.full;
      img.alt = link.dataset.alt || '';
      caption.textContent = link.dataset.caption || '';
      count.textContent = links.length > 1 ? count.dataset.label.replace('__N__', String(index + 1)) : '';
    };

    links.forEach((link, i) => link.addEventListener('click', (e) => {
      e.preventDefault();
      opener = link;
      show(i);
      dialog.showModal();
      document.documentElement.classList.add('has-lightbox');
    }));
    dialog.addEventListener('close', () => {
      document.documentElement.classList.remove('has-lightbox');
      img.removeAttribute('src');
      opener?.focus();
    });
    dialog.querySelector('[data-gallery-close]').addEventListener('click', () => dialog.close());
    dialog.querySelector('[data-gallery-prev]')?.addEventListener('click', () => show(index - 1));
    dialog.querySelector('[data-gallery-next]')?.addEventListener('click', () => show(index + 1));
    dialog.addEventListener('click', (e) => { if (e.target === dialog) dialog.close(); });
    const rtl = () => document.documentElement.dir === 'rtl';
    dialog.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') show(index + (rtl() ? -1 : 1));
      if (e.key === 'ArrowLeft') show(index + (rtl() ? 1 : -1));
    });
    let startX = null;
    dialog.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; }, { passive: true });
    dialog.addEventListener('touchend', (e) => {
      if (startX === null) return;
      const dx = e.changedTouches[0].clientX - startX;
      startX = null;
      if (Math.abs(dx) > 40) show(index + ((dx < 0) !== rtl() ? 1 : -1));
    });
  });
}
