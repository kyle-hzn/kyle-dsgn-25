document.addEventListener("DOMContentLoaded", () => {
	const accordions = document.querySelectorAll(".accordions");

	accordions.forEach((accordion) => {
		accordion.addEventListener("click", () => {
			const content = accordion.querySelector(".accordion__content");
			const icon = accordion.querySelector("img");

			// close others
			accordions.forEach((other) => {
				if (other !== accordion) {
					other.classList.add("data-[inactive]:opacity-50");
					other.querySelector(".accordion__content").style.maxHeight = "0px";
					other.querySelector(".accordion__content").style.opacity = "0";
					other.querySelector("img").style.transform = "rotate(0deg)";
				}
			});

			// toggle this one
			if (content.style.maxHeight && content.style.maxHeight !== "0px") {
				content.style.maxHeight = "0px";
				content.style.opacity = "0";
				icon.style.transform = "rotate(0deg)";
			} else {
				content.style.maxHeight = content.scrollHeight + "px";
				content.style.opacity = "1";
				icon.style.transform = "rotate(45deg)";
			}
		});

		accordion.addEventListener("mouseenter", () => {
			accordions.forEach((other) => {
				if (other !== accordion) other.style.opacity = "0.5";
			});
		});

		accordion.addEventListener("mouseleave", () => {
			accordions.forEach((other) => {
				other.style.opacity = "1";
			});
		});
	});
});
