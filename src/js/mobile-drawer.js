import { gsap } from "gsap";

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', () => {
  const menuBtn = document.querySelector('.header__mobile-btn button');
  const drawer = document.querySelector('.mobile-drawer');

  // Check if required elements exist
  if (!menuBtn || !drawer) {
    // Suppress warning on single posts where header is intentionally hidden
    if (!document.body.classList.contains('single') && !document.body.classList.contains('single-post')) {
      console.warn('Mobile drawer elements not found');
    }
    return;
  }

  // Ensure drawer starts hidden
  gsap.set(drawer, { x: '100%' });

  menuBtn.addEventListener('click', () => {
    const open = menuBtn.getAttribute('aria-expanded') === 'true';
    menuBtn.setAttribute('aria-expanded', String(!open));

    gsap.to(drawer, {
      x: open ? '100%' : '0%',
      duration: 0.3,
      ease: 'power2.out'
    });

    if (!open) {
      document.body.classList.add('no-scroll');
    } else {
      document.body.classList.remove('no-scroll');
    }
  });
});
