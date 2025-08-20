<?php
/*
* Template name: Homepage
*/
?>

<?php get_header(); ?>
<?php include get_theme_file_path( 'mobile-drawer.php' ); ?>

<!-- HERO -->
 <?php
$HpHero = get_field('hp_hero');

if ($HpHero): ?>
<div class="hp-hero flex flex-col gap-2 h-[calc(100vh-80px)] mb-2 mt-[72px]">
	<div class="hp-hero-visual flex-1 overflow-hidden rounded-2xl mt-2">
		<img class="object-cover w-full h-full" src="<?php echo THEME_IMG_PATH; ?>/distortion.jpg" alt="hero visual"/>
	</div>
	<!-- BRAND MARQUEE -->
	<div class="hp-hero__marquee overflow-hidden">
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
		<div class="card card--primary hp-hero__cards__intro flex flex-col gap-4 md:flex-1">
			<div class="subtitle flex items-center justify-between">
				<p class="subtitle__text">
					<?php echo $HpHero['hp_hero_subtitle']; ?>
				</p>
				<div class="tag tag--primary">
					<?php echo $HpHero['hp_hero_subtitle_tag']; ?>
				</div>
			</div>
			<div class="body-m text-highlight">
				<?php echo $HpHero['hp_hero_introduction_text']; ?>
			</div>
		</div>
		<div class="card card--primary hp-hero__cards__contact flex justify-between md:flex-1">
			<img class="w-16 h-16 image-spin" src="<?php echo $HpHero['hp_hero_jabba']['url']; ?>" alt="<?php echo $HpHero['hp_hero_jabba']['alt']; ?>"/>
			<div class="flex flex-col gap-2 justify-end items-end">
				<p class="body-m-bold text-highlight location-time"
					data-timezone="<?php echo esc_attr($HpHero['hp_hero_location_timezone']); ?>">
					<?php echo esc_html($HpHero['hp_hero_location']); ?> <span class="body-m time"></span>
				</p>
				<?php if ( !empty($HpHero['hp_hero_availability']) && $HpHero['hp_hero_availability'] ) : ?>
					<p class="body-m text-highlight">
						<span class="body-m-bold">Available</span> for freelance projects
					</p>
				<?php else : ?>
					<p class="body-m text-highlight">
						<span class="body-m-bold">Unavailable</span> for freelance projects
					</p>
				<?php endif; ?>
				<?php if ( !empty($HpHero['hp_hero_mail']) ) : ?>
					<a class="body-m text-highlight" href="mailto:<?php echo esc_attr($HpHero['hp_hero_mail']); ?>?subject=Freelance%20Inquiry">
						<?php echo esc_html($HpHero['hp_hero_mail']); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- END HERO -->
<!-- SERVICES -->
<?php
$HpServices = get_field('hp_services');

if ( $HpServices && !empty($HpServices['hp_services_list']) ): ?>
	<div class="hp-services flex flex-col md:flex-row gap-2 mb-2">
		<div class="card card--primary flex flex-col md:w-[70%] gap-4">
			<div class="subtitle flex items-center justify-between">
				<p class="subtitle__text">
					<?php echo esc_html($HpServices['hp_services_subtitle']); ?>
				</p>
				<div class="tag tag--primary">
					<?php echo esc_html($HpServices['hp_services_subtitle_tag']); ?>
				</div>
			</div>

			<div class="heading-xl text-highlight flex flex-col gap-2">
				<?php foreach( $HpServices['hp_services_list'] as $item ): ?>
					<p><?php echo esc_html($item['hp_services_list_item']); ?></p>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="card card--primary flex flex-col justify-between gap-4 md:w-[30%]">
			<img class="w-16 h-16 image-spin" src="<?php echo $HpServices['hp_services_icon']['url']; ?>" alt="<?php echo $HpServices['hp_services_icon']['alt']; ?>"/>
			<div class="body-m text-highlight">
				<?php echo wp_kses_post( $HpServices['hp_services_text'] ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-- END SERVICES -->
<!-- CASE STUDIES -->
 <?php
$HpWorks = get_field('hp_works');

if ($HpWorks): ?>

<div class="card card--primary flex flex-col gap-4 mb-2">
	<div class="subtitle flex items-center justify-between">
		<p class="subtitle__text">
			<?php echo $HpWorks['hp_works_subtitle']; ?>
		</p>
		<div class="tag tag--primary">
			<?php echo $HpWorks['hp_works_subtitle_tag']; ?>
		</div>
	</div>
	<h2 class="heading-xxl text-highlight">
		<?php echo $HpWorks['hp_works_title']; ?>
	</h2>
</div>
<div class="hp-works grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
<div class="custom-cursor">
	<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
</div>
<?php get_template_part( 'template-parts/loop' ); ?>
</div>
<?php endif; ?>
<!-- END CASE STUDIES -->
<!-- PARTNERS -->
<?php
$HpPartners = get_field('hp_partners');

if ($HpPartners): ?>
<div class="card card--primary flex flex-col md:flex-row gap-4 mb-2">
	<div class="md:w-1/2">
		<h3 class="heading-xl text-highlight">
			<?php echo $HpPartners['hp_partners_title']; ?>
		</h3>
	</div>
	<div class="flex flex-col gap-6 md:w-1/2">
		<!-- TITLE -->
		<div class="body-m text-highlight">
			<?php echo wp_kses_post( $HpServices['hp_services_text'] ); ?>
		</div>
		<div class="flex flex-col gap-4">
			<!-- SUBTITLE -->
			<h4 class="heading-m text-highlight">
				<?php echo $HpPartners['hp_partners_subtitle']; ?>
			</h4>
			<!-- SLIDER -->
			<div class="partners-marquee swiper overflow-x-hidden">
				<div class="swiper-wrapper">
					<?php foreach($HpPartners['hp_partners_logos'] as $logo): ?>
						<div class="swiper-slide">
							<div class="partners-marquee__card">
								<img class="h-8 w-auto" src="<?php echo esc_url($logo['hp_partners_logos_img']['url']); ?>" alt="<?php echo esc_attr($logo['hp_partners_logos_img']['alt']); ?>" />
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<!-- END SLIDER -->
			<!-- CTA -->
			<a href="<?php echo esc_url($HpPartners['hp_partners_cta']['url']); ?>" class="btn--primary md:w-fit">
				<?php echo esc_html($HpPartners['hp_partners_cta']['title']); ?>
				<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
			</a>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- END PARTNERS -->

<?php get_footer(); ?>
