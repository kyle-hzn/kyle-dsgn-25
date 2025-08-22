import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
  const immediateLines = document.querySelectorAll(".subtitle.reveal-text.immediate .subtitle__line");
  immediateLines.forEach(line => {
    gsap.to(line, {
      scaleX: 1,
      duration: 0.3,
      ease: "power2.out"
    });
  });

  const onScrollLines = document.querySelectorAll(".subtitle.reveal-text.on-scroll .subtitle__line");
  onScrollLines.forEach(line => {
    gsap.to(line, {
      scaleX: 1,
      duration: 0.3,
      ease: "power2.out",
      scrollTrigger: {
        trigger: line.closest(".subtitle"),
        start: "top 80%",
        toggleActions: "play none none none"
      }
    });
  });
});
