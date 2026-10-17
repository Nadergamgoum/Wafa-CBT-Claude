import { initHeader } from './modules/header';
import { initDisclosure } from './modules/disclosure';
import { initRails } from './modules/rail';
import { initTabs } from './modules/tabs';
import { initConsent } from './modules/consent';
import { initTracking } from './modules/track';
import { initForms } from './modules/forms';
import { initReveal } from './modules/reveal';
import { initContactWidget } from './modules/widget';

const ready = (fn) => (document.readyState !== 'loading' ? fn() : document.addEventListener('DOMContentLoaded', fn));

ready(() => {
  initHeader();
  initDisclosure();
  initRails();
  initTabs();
  initContactWidget();
  initForms();
  initReveal();
  const consent = initConsent();
  initTracking(consent);
});
