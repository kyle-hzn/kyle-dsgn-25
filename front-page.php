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
<div class="hp-hero flex flex-col gap-2 h-[calc(100vh-88px)] mb-2">
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
					<p class="body-m text-highlight">
						<a href="mailto:<?php echo esc_attr($HpHero['hp_hero_mail']); ?>?subject=Freelance%20Inquiry">
							<?php echo esc_html($HpHero['hp_hero_mail']); ?>
						</a>
					</p>
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
<div class="hp-works grid grid-cols-1 md:grid-cols-2 gap-2">
<div class="custom-cursor">
	<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
</div>
  <?php
    $args = [
      'post_type'      => 'post',
      'posts_per_page' => 6,
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post(); ?>

        <a href="<?php the_permalink(); ?>" class="card card--work h-[450px] relative overflow-hidden flex flex-col justify-between group">
			<!-- Featured Image -->
			<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail('medium', [
				'class' => 'card--work--img absolute inset-0 w-full h-full object-cover z-10'
				]); ?>
			<?php endif; ?>

			  <!-- Gradient Overlay (always visible) -->
			<div class="card--work--gradient absolute inset-0 z-20 pointer-events-none"></div>

			<!-- Hover Overlay (clip-path animation) -->
			<div class="card--work--overlay absolute inset-0 z-30 pointer-events-none"></div>

			<div class="flex justify-between">
				<!-- Key Stat -->
				<?php
				$work_intro = get_field('work_intro');
				if ($work_intro && !empty($work_intro['work_intro_keystat_title'])) : ?>
				<p class="card--work__keystat heading-xl text-highlight relative z-30">
					<?php echo esc_html($work_intro['work_intro_keystat_title']); ?>
				</p>
				<?php endif; ?>

				<!-- Category -->
				<?php
				$categories = get_the_category();
				if (!empty($categories)) : ?>
				<p class="tag tag--primary z-30">
					<?php echo esc_html($categories[0]->name); ?>
				</p>
				<?php endif; ?>
			</div>

			<!-- Post Title -->
			<h3 class="card--work__title heading-l text-highlight-light relative z-30">
				<?php the_title(); ?>
			</h3>
			</a>

      <?php endwhile;
      wp_reset_postdata();
    else : ?>
      <p>No posts found.</p>
  <?php endif; ?>
</div>
<?php endif; ?>
<!-- END CASE STUDIES -->

<?php get_footer(); ?>
