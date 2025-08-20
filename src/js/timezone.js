// Timezone functionality
document.addEventListener("DOMContentLoaded", function () {
  const elements = document.querySelectorAll(".location-time");

  elements.forEach(el => {
    const tz = el.getAttribute("data-timezone");
    const timeSpan = el.querySelector(".time");

    function updateTime() {
      const now = new Date();
      const options = {
        hour: "numeric",
        minute: "numeric",
        hour12: true,
        timeZone: tz
      };
      timeSpan.textContent = new Intl.DateTimeFormat([], options).format(now);
    }

    updateTime(); // initial render
    setInterval(updateTime, 1000); // refresh every second
  });
});

