import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {

  // Immediate animation
  document.querySelectorAll(".scale-up.immediate").forEach(el => {
    gsap.to(el, {
      scale: 1,
      duration: 0.5,
      ease: "power2.out"
    });
  });

  // On-scroll animation
  document.querySelectorAll(".scale-up.on-scroll").forEach(el => {
    gsap.to(el, {
      scale: 1,
      duration: 0.5,
      ease: "power2.out",
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
        toggleActions: "play none none none"
      }
    });
  });

});
