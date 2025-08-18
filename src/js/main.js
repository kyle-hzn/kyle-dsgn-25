/* eslint-disable no-redeclare */
/* eslint-disable @typescript-eslint/no-unused-vars */
/* eslint-disable no-undef */

// Mobile drawer toggle
const menuBtn = document.querySelector('.header__mobile-btn button');
const drawer  = document.querySelector('.mobile-drawer');

if (menuBtn && drawer) {
  menuBtn.addEventListener('click', () => {
    const open = menuBtn.getAttribute('aria-expanded') === 'true';
    menuBtn.setAttribute('aria-expanded', String(!open));
    drawer.classList.toggle('translate-x-full'); // slide in/out

    if (!open) {
      document.body.classList.add('no-scroll');
    } else {
      document.body.classList.remove('no-scroll');
    }
  });
}

// Swiper brand marquee
import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';

const marquee = new Swiper('.brand-marquee', {
  modules: [Autoplay],
  slidesPerView: 'auto',
  loop: true,
  speed: 5000, // higher = slower
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  spaceBetween: 64,
  allowTouchMove: false,
  simulateTouch: false,
  grabCursor: false,
});
