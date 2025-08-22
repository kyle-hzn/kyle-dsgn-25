import { gsap } from "gsap";

// Custom cursor with GSAP
const cursor = document.querySelector('.custom-cursor');
const cards = document.querySelectorAll('.card--work');

// Use GSAP quick setters for super smooth performance
const cursorX = gsap.quickTo(cursor, "left", { duration: 0.2, ease: "power3.out" });
const cursorY = gsap.quickTo(cursor, "top", { duration: 0.2, ease: "power3.out" });

document.addEventListener("mousemove", (e) => {
  cursorX(e.clientX - 32); // 32 = half width of cursor
  cursorY(e.clientY - 32);
});

cards.forEach(card => {
  card.addEventListener('mouseenter', () => {
    cursor.classList.add('active');
  });

  card.addEventListener('mouseleave', () => {
    cursor.classList.remove('active');
  });
});
