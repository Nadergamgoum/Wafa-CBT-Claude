// Horizontal swipe rails with prev/next buttons, a progress indicator and keyboard support.
export function initRails() {
  document.querySelectorAll('[data-rail]').forEach((root) => {
    const track = root.querySelector('[data-rail-track]');
    const prev = root.querySelector('[data-rail-prev]');
    const next = root.querySelector('[data-rail-next]');
    const bar = root.querySelector('[data-rail-progress]');
    if (!track) return;
    const rtl = getComputedStyle(track).direction === 'rtl';

    const step = () => {
      const item = track.firstElementChild;
      if (!item) return track.clientWidth;
      const gap = parseFloat(getComputedStyle(track).columnGap || '0') || 0;
      return item.getBoundingClientRect().width + gap;
    };
    const scrollBy = (dir) => track.scrollBy({ left: (rtl ? -dir : dir) * step(), behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth' });
    prev?.addEventListener('click', () => scrollBy(-1));
    next?.addEventListener('click', () => scrollBy(1));

    const update = () => {
      const max = track.scrollWidth - track.clientWidth;
      const pos = Math.abs(track.scrollLeft);
      const scrollable = max > 4;
      root.classList.toggle('is-static', !scrollable);
      if (prev) prev.disabled = pos <= 2;
      if (next) next.disabled = pos >= max - 2;
      if (bar) {
        const visible = track.clientWidth / track.scrollWidth;
        bar.style.setProperty('--size', `${Math.max(visible, 0.12) * 100}%`);
        bar.style.setProperty('--pos', `${max > 0 ? (pos / max) * (1 - Math.max(visible, 0.12)) * 100 : 0}%`);
      }
    };
    track.addEventListener('scroll', () => requestAnimationFrame(update), { passive: true });
    new ResizeObserver(update).observe(track);
    track.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') { e.preventDefault(); scrollBy(rtl ? -1 : 1); }
      if (e.key === 'ArrowLeft') { e.preventDefault(); scrollBy(rtl ? 1 : -1); }
    });
    update();
  });
}
