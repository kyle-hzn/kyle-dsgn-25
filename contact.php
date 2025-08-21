<?php
/*
* Template name: Contact
*/
?>

<?php get_header(); ?>
<?php include get_theme_file_path('mobile-drawer.php'); ?>

<section class="contact flex flex-col md:flex-row gap-2 mb-2 mt-[80px]">
	<div class="card card--primary flex-1 flex flex-col justify-between">
		<h1 class="heading-xxl text-highlight">
			Let’s talk
		</h1>
		<div class="flex flex-col gap-2 justify-end items-end">
			<?php
			$statusCard = get_field('status_card', 'option');
			if( $statusCard ): ?>
				<p class="body-m-bold text-highlight location-time"
					data-timezone="<?php echo esc_attr($statusCard['hp_hero_location_timezone']); ?>">
					<?php echo esc_html($statusCard['hp_hero_location']); ?> <span class="body-m time"></span>
				</p>
				<?php if ( !empty($statusCard['hp_hero_availability']) && $statusCard['hp_hero_availability'] ) : ?>
					<p class="body-m text-highlight">
						<span class="body-m-bold">Available</span> for freelance projects
					</p>
				<?php else : ?>
					<p class="body-m text-highlight">
						<span class="body-m-bold">Unavailable</span> for freelance projects
					</p>
				<?php endif; ?>
				<?php if ( !empty($statusCard['hp_hero_mail']) ) : ?>
					<a class="body-m text-highlight" href="mailto:<?php echo esc_attr($statusCard['hp_hero_mail']); ?>?subject=Freelance%20Inquiry">
						<?php echo esc_html($statusCard['hp_hero_mail']); ?>
					</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
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
