import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

/* ----- Helper: wrap text nodes, preserve HTML ----- */
function wrapTextNodes(node) {
  if (node.nodeType === Node.TEXT_NODE) {
    const words = node.textContent.split(/(\s+)/);
    return words.map(word => {
      if (!word.trim()) return document.createTextNode(word);
      const span = document.createElement("span");
      span.textContent = word;
      span.style.display = "inline-block";
      return span;
    });
  } else if (node.nodeType === Node.ELEMENT_NODE) {
    const clone = node.cloneNode(false);
    node.childNodes.forEach(child => {
      wrapTextNodes(child).forEach(w => clone.appendChild(w));
    });
    return [clone];
  }
  return [];
}

/* ----- Helper: split element into lines ----- */
function splitIntoLines(el) {
  const nodes = Array.from(el.childNodes);
  el.innerHTML = "";

  const wordSpans = [];
  nodes.flatMap(wrapTextNodes).forEach(w => {
    el.appendChild(w);
    if (w instanceof HTMLElement) wordSpans.push(w);
  });

  const lines = [];
  let currentTop = null;
  wordSpans.forEach(span => {
    if (currentTop === null || span.offsetTop !== currentTop) {
      currentTop = span.offsetTop;
      lines.push([]);
    }
    lines[lines.length - 1].push(span);
  });

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

  /* ----- Line-by-line blur (preserve formatting) ----- */
  document.querySelectorAll(".blur-text.immediate").forEach(el => {
    const lines = splitIntoLines(el);
    gsap.fromTo(
      lines,
      { filter: "blur(8px)", opacity: 0 },
      { filter: "blur(0px)", opacity: 1, duration: 1, ease: "power2.out", stagger: 0.15 }
    );
  });

  document.querySelectorAll(".blur-text.on-scroll").forEach(el => {
    const lines = splitIntoLines(el);
    gsap.fromTo(
      lines,
      { filter: "blur(8px)", opacity: 0 },
      {
        filter: "blur(0px)",
        opacity: 1,
        duration: 1,
        ease: "power2.out",
        stagger: 0.15,
        scrollTrigger: { trigger: el, start: "top 80%", toggleActions: "play none none none" }
      }
    );
  });

  /* ----- Whole-block blur (no line splitting) ----- */
  document.querySelectorAll(".blur-text-block.immediate").forEach(el => {
    gsap.fromTo(
      el,
      { filter: "blur(8px)", opacity: 0 },
      { filter: "blur(0px)", opacity: 1, duration: 1, ease: "power2.out" }
    );
  });

  document.querySelectorAll(".blur-text-block.on-scroll").forEach(el => {
    gsap.fromTo(
      el,
      { filter: "blur(8px)", opacity: 0 },
      {
        filter: "blur(0px)",
        opacity: 1,
        duration: 1,
        ease: "power2.out",
        scrollTrigger: { trigger: el, start: "top 80%", toggleActions: "play none none none" }
      }
    );
  });

});
