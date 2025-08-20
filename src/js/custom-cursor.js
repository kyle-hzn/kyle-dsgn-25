// Custom cursor functionality
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

