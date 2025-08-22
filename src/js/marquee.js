import { gsap } from "gsap";

document.querySelectorAll(".brand-marquee, .partners-marquee, .about-gallery").forEach((marquee) => {
  const track = marquee.querySelector(".marquee-track");

  // Duplicate content for seamless loop
  track.innerHTML += track.innerHTML;

  const distance = track.scrollWidth / 2;

  gsap.to(track, {
    x: -distance,
    duration: 20, // global speed
    ease: "linear",
    repeat: -1
  });
});
