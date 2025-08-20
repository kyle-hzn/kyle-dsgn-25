// Header scroll functionality
let lastScrollTop = 0;
const header = document.querySelector('.header');
const scrollThreshold = 50; // Reduced threshold for more responsive behavior

function handleHeaderScroll() {
  const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;

  // Only trigger if we've scrolled more than the threshold
  if (Math.abs(currentScrollTop - lastScrollTop) < scrollThreshold) {
    return;
  }

  if (currentScrollTop > lastScrollTop && currentScrollTop > 50) {
    // Scrolling down and past initial 50px - hide header
    header.style.transform = 'translateY(calc(-100% - 8px))';
    header.style.transition = 'transform 0.3s ease-in-out';
  } else {
    // Scrolling up - show header
    header.style.transform = 'translateY(0)';
    header.style.transition = 'transform 0.3s ease-in-out';
  }

  lastScrollTop = currentScrollTop;
}

// Throttle the scroll event for better performance
let ticking = false;
function requestTick() {
  if (!ticking) {
    requestAnimationFrame(() => {
      handleHeaderScroll();
      ticking = false;
    });
    ticking = true;
  }
}

// Add scroll event listener
window.addEventListener('scroll', requestTick, { passive: true });

// Show header when at top of page
window.addEventListener('scroll', () => {
  if (window.pageYOffset <= 50) {
    header.style.transform = 'translateY(0)';
  }
}, { passive: true });
