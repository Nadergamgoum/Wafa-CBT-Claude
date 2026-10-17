import { initHeader } from './modules/header';
import { initDisclosure } from './modules/disclosure';
import { initRails } from './modules/rail';
import { initTabs } from './modules/tabs';
import { initConsent } from './modules/consent';
import { initTracking } from './modules/track';
import { initForms } from './modules/forms';
import { initReveal } from './modules/reveal';
import { initContactWidget } from './modules/widget';
import { initGalleries } from './modules/gallery';

const ready = (fn) => (document.readyState !== 'loading' ? fn() : document.addEventListener('DOMContentLoaded', fn));

ready(() => {
  initHeader();
  initDisclosure();
  initRails();
  initTabs();
  initContactWidget();
  initGalleries();
  initForms();
  initReveal();
  const consent = initConsent();
  initTracking(consent);
});
