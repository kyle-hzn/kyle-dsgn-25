import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

function animateStatNumbers() {
  const elements = document.querySelectorAll(".stat-number");
  if (!elements.length) return;

  elements.forEach(el => {
    const fullText = el.textContent.trim();

    // Handle the case where the text is just "0" or contains only "0"
    if (fullText === "0") {
      // For simple "0" case, set it immediately and animate blur
      el.textContent = "0";
      el.style.filter = "blur(3px)";

      gsap.to(el, {
        filter: "blur(0px)",
        duration: 1,
        ease: "power1.out",
        scrollTrigger: {
          trigger: el,
          start: "top 90%",
          toggleActions: "play none none none"
        }
      });
      return;
    }

    // Match optional prefix (~), numeric part, optional suffix (%, k+)
    const match = fullText.match(/^(\D*)([\d,.]+)(.*)$/);
    if (!match) return;

    let [, prefix, numberPart, suffix] = match;
    numberPart = numberPart.replace(/,/g, "");
    const target = parseFloat(numberPart);
    if (isNaN(target)) return;

    // Set initial text content immediately for zero values
    if (target === 0) {
      el.textContent = `${prefix}0${suffix}`;
    }

    const obj = { value: 0 };

    // Initial blur
    el.style.filter = "blur(3px)";

    gsap.to(obj, {
      value: target,
      duration: 1, // faster count-up
      ease: "power1.out",
      onUpdate() {
        // Handle zero value explicitly
        let val;
        if (target === 0) {
          val = "0";
        } else {
          val = Math.floor(obj.value).toLocaleString();
        }
        el.textContent = `${prefix}${val}${suffix}`;
        // Remove blur gradually
        // Handle the case when target is 0 to avoid NaN
        const progress = target === 0 ? 1 : obj.value / target;
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
