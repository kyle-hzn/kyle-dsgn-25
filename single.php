<?php get_header(); ?>
<?php include get_theme_file_path('mobile-drawer.php'); ?>

<section class="flex flex-col md:flex-row gap-2 mt-[80px]">
	<!-- INTRO CARD -->
	<div class="project-intro card card--primary flex flex-col justify-between gap-4 md:w-[30%] md:h-[calc(100vh-96px)]">
		<div class="project-intro__head flex flex-col gap-4">
			<h1 class="heading-l text-highlight"><?php the_title(); ?></h1>
			<div class="flex flex-wrap gap-2">
				<?php the_tags('<span class="tag tag--primary">', '</span><span class="tag tag--primary">', '</span>'); ?>
			</div>
		</div>
		<div class="body-m text-highlight"><?php the_content(); ?></div>
	</div>
	<!-- END INTRO CARD -->
	<div class="project-content flex flex-col gap-16 md:w-[70%]">
		<!-- PROJECT CASE STUDY THUMBNAIL -->
		<div class="project-thumbnail w-full rounded-2xl overflow-hidden h-screen md:h-[calc(100vh-96px)]">
			<?php the_post_thumbnail('full', ['class' => 'h-full w-full object-cover']); ?>
		</div>
		<!-- END PROJECT CASE STUDY THUMBNAIL -->

		<!-- DISCOVERY SECTION -->
		<?php get_template_part( 'template-parts/discover-section' ); ?>
		<!-- END DISCOVERY SECTION -->

		<!-- DEFINE SECTION -->
		<?php get_template_part( 'template-parts/define-section' ); ?>
		<!-- END DEFINE SECTION -->

		<!-- DEVELOP SECTION -->
		<?php get_template_part( 'template-parts/develop-section' ); ?>
		<!-- END DEVELOP SECTION -->

		<!-- DELIVER SECTION -->
		<?php get_template_part( 'template-parts/deliver-section' ); ?>
		<!-- END DELIVER SECTION -->

		<!-- LINKS CASE STUDY -->
		<?php
		$end = get_field('end');

		if ($end): ?>
		<div class="flex flex-row justify-between">
			<a href="<?php echo esc_url($end['end_back_link']['url']); ?>" class="btn--primary hidden md:flex">
				<?php echo esc_html($end['end_back_link']['title']); ?>
				<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
			</a>
			<a href="<?php echo esc_url($end['end_next_link']['url']); ?>" class="btn--primary hidden md:flex">
				<?php echo esc_html($end['end_next_link']['title']); ?>
				<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
			</a>
		</div>
		<?php endif; ?>
		<!-- END LINKS CASE STUDY -->

	</div>

</section>

<?php get_footer();
