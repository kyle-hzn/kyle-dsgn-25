<?php
/*
* Template name: Services
*/
?>

<?php get_header(); ?>
<?php include get_theme_file_path('mobile-drawer.php'); ?>

<!-- INTRO -->
<?php
$servicesIntro = get_field('services_intro');

if ($servicesIntro): ?>
<section class="services-intro flex flex-col md:flex-row gap-2 mb-2 mt-[80px]">

    <!-- Left card -->
    <div class="card card--primary flex flex-col md:w-1/2 gap-4">
        <div class="subtitle flex items-center justify-between">
            <p class="subtitle__text"><?php echo esc_html($servicesIntro['services_intro_subtitle']); ?></p>
            <div class="tag tag--primary"><?php echo esc_html($servicesIntro['services_intro_subtitle_tag']); ?></div>
        </div>
        <h2 class="heading-m text-highlight"><?php echo esc_html($servicesIntro['services_intro_text']); ?></h2>
    </div>

    <!-- Right image -->
    <div class="md:w-1/2 relative rounded-2xl overflow-hidden">
        <div class="absolute inset-0">
            <img class="object-cover w-full h-full" src="<?php echo THEME_IMG_PATH; ?>/distortion.jpg" alt="hero visual"/>
        </div>
    </div>

</section>
<?php endif; ?>
<!-- END INTRO -->
<!-- MARQUEE -->
<section class="brand-marquee mb-2 overflow-hidden">
	<div class="swiper-wrapper">
		<div class="swiper-slide">
			<p class="hp-hero__marquee__title heading-xxl text-highlight-light">THIS IS THE WAY</p>
		</div>
		<div class="swiper-slide">
			<p class="hp-hero__marquee__title heading-xxl text-highlight-light">THIS IS THE WAY</p>
		</div>
		<div class="swiper-slide">
			<p class="hp-hero__marquee__title heading-xxl text-highlight-light">THIS IS THE WAY</p>
		</div>
		<div class="swiper-slide">
			<p class="hp-hero__marquee__title heading-xxl text-highlight-light">THIS IS THE WAY</p>
		</div>
		<div class="swiper-slide">
			<p class="hp-hero__marquee__title heading-xxl text-highlight-light">THIS IS THE WAY</p>
		</div>
	</div>
</section>
<!-- END MARQUEE -->
<!-- PROCESS -->
<?php
$servicesProcess = get_field('services_process');

if ($servicesProcess): ?>
<section class="services-process mb-2">
	<div class="card card--primary flex flex-col gap-4 mb-2">
		<h2 class="heading-xxl text-highlight">
			<?php echo esc_html($servicesProcess['services_process_title']); ?>
		</h2>
		<h3 class="heading-l text-secondary">
			<?php echo esc_html($servicesProcess['services_process_subtitle']); ?>
		</h3>
	</div>
	<div class="grid grid-cols-2 md:grid-cols-4 gap-2 auto-rows-fr">
		<?php
		$servicesProcess = get_field('services_process');

		if ( $servicesProcess && !empty($servicesProcess['services_process_step']) ) :
			foreach ( $servicesProcess['services_process_step'] as $step ) :
				$icon     = $step['services_process_step_icon'];
				$title    = $step['services_process_step_title'];
				$subtitle = $step['services_process_step_subtitle'];
				$text     = $step['services_process_step_text'];
		?>
			<div class="card card--primary md:aspect-square flex flex-col justify-between gap-4">
				<div class="services-process__card__head flex flex-col gap-1">
					<?php if ( $icon ) : ?>
						<img class="w-8 h-8 md:w-12 md:h-12" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>"/>
					<?php endif; ?>
					<?php if ( $title ) : ?>
						<h4 class="heading-l text-highlight">
							<?php echo esc_html($title); ?>
						</h4>
					<?php endif; ?>
					<?php if ( $subtitle ) : ?>
						<h5 class="heading-m text-highlight">
							<?php echo esc_html($subtitle); ?>
						</h5>
					<?php endif; ?>
				</div>
				<?php if ( $text ) : ?>
					<div class="body-m text-secondary">
						<?php echo wp_kses_post($text); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php
			endforeach;
		endif;
		?>
	</div>
</section>
<?php endif; ?>
<!-- END PROCESS -->
<!-- SERVICES OFFERS -->
<?php
$servicesOffers = get_field('services_offers');

if ($servicesOffers): ?>
<section class="services-offers">
	<div class="card card--primary">
		<div class="subtitle flex items-center justify-between mb-4">
            <p class="subtitle__text"><?php echo esc_html($servicesOffers['services_offers_subtitle']); ?></p>
            <div class="tag tag--primary"><?php echo esc_html($servicesOffers['services_offers_tag']); ?></div>
        </div>
		<div class="flex flex-col md:flex-row gap-2">
			<h3 class="heading-xxl text-highlight flex-1">
				<?php echo esc_html($servicesOffers['services_offers_title']); ?>
			</h3>
			<?php
			$services_offers = get_field('services_offers'); // group
			$accordions = $services_offers['services_offers_accordion'] ?? [];

			if( $accordions ):
			?>
			<div class="services-offers__accordions flex-1 flex flex-col gap-2 group">
				<?php foreach( $accordions as $index => $accordion ):
					$title = $accordion['services_offers_accordion_title'] ?? '';
					$tags  = $accordion['services_offers_accordion_tags'] ?? [];
					$text  = $accordion['services_offers_accordion_text'] ?? '';
				?>
				<div class="accordions transition-opacity duration-300 data-[inactive]:opacity-50 cursor-pointer"
					data-accordion-index="<?php echo $index; ?>">

					<div class="accordion__head flex justify-between items-center">
						<p class="heading-l text-highlight"><?php echo esc_html($title); ?></p>
						<button class="accordion__btn btn--icon pointer-events-none">
							<img class="transition-transform duration-300" src="<?php echo THEME_IMG_PATH; ?>/plus-icon.svg" alt="plus icon"/>
						</button>
					</div>

					<div class="accordion__content opacity-0 max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
						<?php if( $tags ): ?>
							<div class="accordion__tags flex flex-wrap gap-2 pt-2">
								<?php foreach( $tags as $tagItem ):
									$tagText = $tagItem['services_offers_accordion_tags_item'] ?? '';
								?>
									<span class="tag tag--primary"><?php echo esc_html($tagText); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php if( $text ): ?>
							<p class="accordion__text body-m text-secondary mt-2">
								<?php echo wp_kses_post($text); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

		</div>
	</div>
</section>
<?php endif; ?>
<!-- END SERVICES OFFERS -->

<?php get_footer(); ?>
