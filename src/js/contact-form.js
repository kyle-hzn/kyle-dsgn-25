document.addEventListener("DOMContentLoaded", () => {
  const forms = document.querySelectorAll(".wpforms-form");

  forms.forEach(form => {
    const button = form.querySelector(".wpforms-submit");
    if (!button) return;

    // Create spinner element
    const spinner = document.createElement("span");
    spinner.className = "my-spinner";
    spinner.setAttribute("aria-hidden", "true");
    button.appendChild(spinner);

    // Listen to WPForms events
    form.addEventListener("wpformsAjaxSubmitStart", () => {
      button.classList.add("loading");
    });

    form.addEventListener("wpformsAjaxSubmitSuccess", () => {
      button.classList.remove("loading");
    });

    form.addEventListener("wpformsAjaxSubmitError", () => {
      button.classList.remove("loading");
    });
  });
});
