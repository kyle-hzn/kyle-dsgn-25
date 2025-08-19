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

document.addEventListener("DOMContentLoaded", function () {
  const elements = document.querySelectorAll(".location-time");

  elements.forEach(el => {
    const tz = el.getAttribute("data-timezone");
    const timeSpan = el.querySelector(".time");

    function updateTime() {
      const now = new Date();
      const options = {
        hour: "numeric",
        minute: "numeric",
        hour12: true,
        timeZone: tz
      };
      timeSpan.textContent = new Intl.DateTimeFormat([], options).format(now);
    }

    updateTime(); // initial render
    setInterval(updateTime, 1000); // refresh every second
  });
});

const cursor = document.querySelector('.custom-cursor');
const cards = document.querySelectorAll('.card--work');

cards.forEach(card => {
  card.addEventListener('mouseenter', () => {
    cursor.classList.add('active');
  });

  card.addEventListener('mouseleave', () => {
    cursor.classList.remove('active');
  });

  card.addEventListener('mousemove', (e) => {
    cursor.style.left = `${e.clientX - 32}px`; // center cursor
    cursor.style.top = `${e.clientY - 32}px`;
  });
});
