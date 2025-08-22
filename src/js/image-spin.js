import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const spinItems = document.querySelectorAll(".image-spin");

if (spinItems.length) {
  spinItems.forEach((item) => {
    // Baseline slow spin for each item
    const spinTween = gsap.to(item, {
      rotation: 360,
      duration: 15,
      ease: "none",
      repeat: -1
    });

    ScrollTrigger.create({
      trigger: item,
      start: "top bottom",   // when item enters viewport
      end: "bottom top",     // when item leaves viewport
      onUpdate: (self) => {
        const velocity = Math.abs(self.getVelocity());

        const factor = gsap.utils.clamp(
          1,   // baseline
          5,   // max boost
          1 + velocity / 300
        );

        gsap.to(spinTween, {
          timeScale: factor,
          duration: 0.4,
          ease: "power2.out"
        });
      },
      onLeave: () => {
        // Reset to default spin when leaving viewport
        gsap.to(spinTween, { timeScale: 1, duration: 0.6, ease: "power2.out" });
      },
      onLeaveBack: () => {
        // Also reset when scrolling back up and leaving viewport
        gsap.to(spinTween, { timeScale: 1, duration: 0.6, ease: "power2.out" });
      }
    });
  });
}
