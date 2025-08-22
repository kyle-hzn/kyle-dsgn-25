<?php
$define = get_field('define');

if ($define): ?>
<section class="define-section flex flex-col gap-2">
	<!-- DEFINE SECTION SUBTITLE -->
	<div class="subtitle-light flex items-center justify-between">
		<p class="subtitle-light__text reveal-text on-scroll">
			<?php echo esc_html($define['define_subtitle']); ?>
		</p>
		<div class="tag tag--primary scale-up on-scroll">
			<?php echo esc_html($define['define_subtitle_tag']); ?>
		</div>
	</div>
	<!-- DEFINE SECTION SUBTITLE -->

	<!-- DEFINE SECTION PROBLEMATIC -->
	<div class="card card--primary">
		<h2 class="heading-l text-highlight reveal-text on-scroll">
			<?php echo esc_html($define['define_problematic']); ?>
		</h2>
	</div>
	<!-- END DEFINE SECTION PROBLEMATIC -->
</section>

<?php endif; ?>
