// Swiper marquees
import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';

// Brand marquee
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

// Partners marquee
const partnersMarquee = new Swiper('.partners-marquee', {
  modules: [Autoplay],
  slidesPerView: 1.5,
  loop: true,
  speed: 5000, // higher = slower
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  spaceBetween: 16,
  allowTouchMove: false,
  simulateTouch: false,
  grabCursor: false,
  breakpoints: {
    768: {
      slidesPerView: 3.5,
    }
  }
});

new Swiper('.about-gallery-swiper', {
  modules: [Autoplay],
  slidesPerView: 'auto',
  spaceBetween: 8,
  loop: true,
  speed: 5000, // Reduced speed for smoother animation
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    reverseDirection: false, // Set to true for right-to-left
  },
  allowTouchMove: false,
  simulateTouch: false,
  grabCursor: false,
  loopAdditionalSlides: 2, // Helps with loop smoothness
  watchSlidesProgress: true,
});

