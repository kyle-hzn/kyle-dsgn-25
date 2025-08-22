import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

function animateStatNumbers() {
  const elements = document.querySelectorAll(".stat-number");
  if (!elements.length) return;

  elements.forEach(el => {
    const fullText = el.textContent.trim();

    // Match optional prefix (~), numeric part, optional suffix (%, k+)
    const match = fullText.match(/^(\D*)([\d,.]+)(.*)$/);
    if (!match) return;

    let [, prefix, numberPart, suffix] = match;
    numberPart = numberPart.replace(/,/g, "");
    const target = parseFloat(numberPart);
    if (isNaN(target)) return;

    const obj = { value: 0 };

    // Initial blur
    el.style.filter = "blur(3px)";

    gsap.to(obj, {
      value: target,
      duration: 1, // faster count-up
      ease: "power1.out",
      onUpdate() {
        const val = Math.floor(obj.value).toLocaleString();
        el.textContent = `${prefix}${val}${suffix}`;
        // Remove blur gradually
        const progress = obj.value / target;
        el.style.filter = `blur(${3 * (1 - progress)}px)`;
      },
      scrollTrigger: {
        trigger: el,
        start: "top 90%",
        toggleActions: "play none none none"
      }
    });
  });
}

// Immediate run after DOM is loaded
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", animateStatNumbers);
} else {
  animateStatNumbers();
}
