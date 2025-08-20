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
