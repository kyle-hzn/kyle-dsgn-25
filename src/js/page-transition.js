/* eslint-disable @typescript-eslint/no-unused-vars */
import { gsap } from "gsap";

document.addEventListener("DOMContentLoaded", () => {
  const overlay = document.querySelector(".page-transition-overlay");

  if (!overlay) {
    console.warn('Page transition overlay not found');
    return;
  }

  // Page load animation: fade overlay only
  gsap.to(overlay, {
    backgroundColor: "rgba(255,255,255,0)",
    duration: 0.5,
    ease: "power2.out"
  });

  // Link click animation: overlay fade in, then navigate
  document.querySelectorAll('a[href]').forEach(link => {
    const href = link.getAttribute('href');

    // Skip header links, mobile drawer links, and other important navigation
    if (!href || href.startsWith('#') || href.startsWith('http') ||
        link.closest('.header') || link.closest('.mobile-drawer') ||
        link.classList.contains('header__logo')) return;

    link.addEventListener('click', e => {
      e.preventDefault();

      gsap.to(overlay, {
        backgroundColor: "rgba(255,255,255,0.2)", // subtle white veil
        duration: 0.5,
        ease: "power2.in",
        onComplete: () => window.location.href = href
      });
    });
  });
});

function showOverlay() {
  document.body.classList.add('no-scroll');
  document.querySelector('.page-transition-overlay').style.pointerEvents = 'auto';
}

function hideOverlay() {
  document.body.classList.remove('no-scroll');
  document.querySelector('.page-transition-overlay').style.pointerEvents = 'none';
}
