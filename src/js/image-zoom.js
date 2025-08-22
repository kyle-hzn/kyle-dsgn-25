import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
  // Immediate zoom reset
  document.querySelectorAll(".zoom-immediate").forEach(img => {
    gsap.set(img, { scale: 1.1 }); // increased zoom
    gsap.to(img, {
      scale: 1,
      duration: 1,
      ease: "power2.out"
    });
  });

  // Scroll-triggered zoom reset
  document.querySelectorAll(".zoom-on-scroll").forEach(img => {
    gsap.set(img, { scale: 1.1 }); // increased zoom
    gsap.to(img, {
      scale: 1,
      duration: 1,
      ease: "power2.out",
      scrollTrigger: {
        trigger: img,
        start: "top 90%",
        toggleActions: "play none none none"
      }
    });
  });
});
