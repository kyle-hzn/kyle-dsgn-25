<?php
/*
* Template name: Contact
*/
?>

<?php get_header(); ?>

<section class="contact flex flex-col md:flex-row gap-2 mb-2 mt-[80px]">
	<div class="card card--primary flex-1 flex flex-col justify-between">
		<h1 class="heading-xxl text-highlight reveal-text immediate">
			Let’s talk
		</h1>
		<?php get_template_part( 'template-parts/status-card' ); ?>
	</div>
	<div class="card card--primary flex-1">
		<?php echo do_shortcode('[wpforms id="182"]'); ?>
		<script>
			document.addEventListener("DOMContentLoaded", () => {
			// Find all WPForms
			document.querySelectorAll(".wpforms-form").forEach(form => {
				// Disable WPForms’ JS validation
				form.removeAttribute("data-formnovalidate");

				// Ensure native HTML5 validation runs
				form.setAttribute("novalidate", false); // some WPForms versions force novalidate
				form.removeAttribute("novalidate");

				// On submit, just let browser handle it
				form.addEventListener("submit", e => {
				if (!form.checkValidity()) {
					e.preventDefault();
					form.reportValidity();
				}
				});
			});
			});
		</script>
	</div>
</section>

<?php get_footer(); ?>
