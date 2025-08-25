import { gsap } from "gsap";

let lastScroll = 0;
let header = null;

function initHeaderScroll() {
  header = document.querySelector('.header');

  if (!header) {
    // Suppress warning on single posts where header is intentionally hidden
    if (!document.body.classList.contains('single') && !document.body.classList.contains('single-post')) {
      console.warn('Header element not found');
    }
    return;
  }


  // Initialize header position with GSAP
  gsap.set(header, { y: 0 });

  // Add scroll event listener
  window.addEventListener('scroll', handleScroll, { passive: true });
}

// Wait for DOM to be ready and find header
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initHeaderScroll);
} else {
  // DOM is already ready
  initHeaderScroll();
}

function handleScroll() {
  if (!header) return;

  const st = window.pageYOffset || document.documentElement.scrollTop;

  if (st > lastScroll && st > 50) {
    // Scroll down → hide
    gsap.to(header, { y: "-120%", duration: 0.3, ease: "power2.out" });
  } else {
    // Scroll up → show
    gsap.to(header, { y: "0%", duration: 0.3, ease: "power2.out" });
  }

  lastScroll = st;
}
