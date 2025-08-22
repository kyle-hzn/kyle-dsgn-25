import { gsap } from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

function splitIntoLines(el) {
  // Trim & normalize spaces, keep inline markup intact
  const words = el.innerHTML.trim().replace(/\s+/g, " ").split(" ");
  el.innerHTML = "";

  const wordSpans = words
    .filter(w => w.length > 0) // avoid empty words
    .map(word => {
      const span = document.createElement("span");
      span.innerHTML = word + " ";
      span.style.display = "inline-block";
      span.style.whiteSpace = "pre";
      el.appendChild(span);
      return span;
    });

  // Group by row (using offsetTop)
  const lines = [];
  let currentTop = null;
  wordSpans.forEach(span => {
    if (currentTop === null || span.offsetTop !== currentTop) {
      currentTop = span.offsetTop;
      lines.push([]);
    }
    lines[lines.length - 1].push(span);
  });

  // Wrap each line
  return lines.map(lineWords => {
    const wrapper = document.createElement("span");
    wrapper.style.display = "block";
    wrapper.style.overflow = "hidden";
    el.insertBefore(wrapper, lineWords[0]);
    lineWords.forEach(w => wrapper.appendChild(w));
    return wrapper;
  });
}

document.addEventListener("DOMContentLoaded", () => {
  // Immediate case (plays on page load)
  document.querySelectorAll(".reveal-text.immediate").forEach(el => {
    const lines = splitIntoLines(el);

    gsap.from(lines, {
      yPercent: 100,
      opacity: 0,
      duration: 0.8,
      ease: "power3.out",
      stagger: 0.15
    });
  });

  // On-scroll case
  document.querySelectorAll(".reveal-text.on-scroll").forEach(el => {
    const lines = splitIntoLines(el);

    gsap.from(lines, {
      yPercent: 100,
      opacity: 0,
      duration: 0.8,
      ease: "power3.out",
      stagger: 0.15,
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
        toggleActions: "play none none none"
      }
    });
  });
});
