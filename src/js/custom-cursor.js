import { gsap } from "gsap";

// Custom cursor with GSAP
const cursor = document.querySelector('.custom-cursor');
const cards = document.querySelectorAll('.card--work');

// Check if cursor exists before initializing GSAP animations
if (!cursor) {
  // Suppress warning on single posts where cursor is intentionally hidden
  if (!document.body.classList.contains('single') && !document.body.classList.contains('single-post')) {
    console.warn('Custom cursor element not found');
  }
} else {
  // Use GSAP quick setters for super smooth performance
  const cursorX = gsap.quickTo(cursor, "left", { duration: 0.2, ease: "power3.out" });
  const cursorY = gsap.quickTo(cursor, "top", { duration: 0.2, ease: "power3.out" });

  document.addEventListener("mousemove", (e) => {
    cursorX(e.clientX - 32); // 32 = half width of cursor
    cursorY(e.clientY - 32);
  });
}

// Only add event listeners if cards exist
if (cards.length > 0) {
  cards.forEach(card => {
    card.addEventListener('mouseenter', () => {
      if (cursor) {
        cursor.classList.add('active');
      }
    });

    card.addEventListener('mouseleave', () => {
      if (cursor) {
        cursor.classList.remove('active');
      }
    });
  });
}
