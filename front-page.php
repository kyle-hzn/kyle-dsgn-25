<?php get_header(); ?>
<?php include get_theme_file_path( 'mobile-drawer.php' ); ?>

<div class="hp-hero flex flex-col gap-2 h-[calc(100vh-88px)]">
	<div class="hp-hero-visual flex-1 overflow-hidden rounded-2xl mt-2">
		<img class="object-cover w-full h-full" src="<?php echo THEME_IMG_PATH; ?>/distortion.jpg" alt="hero visual"/>
	</div>
	<!-- BRAND MARQUEE -->
	<div class="hp-hero__marquee overflow-x-hidden">
		<div class="brand-marquee">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<p class="hp-hero__marquee__title heading-xxl text-highlight-light">KYLE-DSGN</p>
				</div>
				<div class="swiper-slide">
					<p class="hp-hero__marquee__title heading-xxl text-highlight-light">KYLE-DSGN</p>
				</div>
				<div class="swiper-slide">
					<p class="hp-hero__marquee__title heading-xxl text-highlight-light">KYLE-DSGN</p>
				</div>
				<div class="swiper-slide">
					<p class="hp-hero__marquee__title heading-xxl text-highlight-light">KYLE-DSGN</p>
				</div>
			</div>
		</div>
	</div>
	<div class="hp-hero__cards md:flex-row flex-col flex gap-2">
		<div class="card card--primary hp-hero__cards__intro flex flex-col gap-8 md:flex-1">
			<div class="subtitle flex items-center justify-between">
				<p class="subtitle__text">(intro) - my name is kyle</p>
				<div class="tag tag--primary">00</div>
			</div>
			<p class="body-m text-highlight">
				Designing products & brands that work beautifully. I help companies turn bold ideas into clear, engaging, and conversion-driven experiences.
			</p>
		</div>
		<div class="card card--primary hp-hero__cards__contact flex justify-between md:flex-1">
			<img class="w-16 h-16 image-spin" src="<?php echo THEME_IMG_PATH; ?>/jabba.svg" alt="Jabba"/>
			<div class="flex flex-col gap-2 justify-end items-end">
				<p class="body-m text-highlight">
					Bangkok 06:02pm
				</p>
				<p class="body-m text-highlight">
					Available for freelance projects
				</p>
				<p class="body-m text-highlight">
					hello@kyle-dsgn.com
				</p>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
