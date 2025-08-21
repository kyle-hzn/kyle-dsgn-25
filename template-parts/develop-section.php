<?php
$develop = get_field('develop');

if ($develop): ?>

<section class="develop-section flex flex-col gap-2">
	<!-- DEVELOP SECTION SUBTITLE -->
	<div class="subtitle-light flex items-center justify-between">
		<p class="subtitle-light__text">
			<?php echo esc_html($develop['develop_subtitle']); ?>
		</p>
		<div class="tag tag--primary">
			<?php echo esc_html($develop['develop_subtitle_tag']); ?>
		</div>
	</div>
	<!-- END DEVELOP SECTION SUBTITLE -->

	<!-- DEVELOP SECTION GALLERY -->
	<?php
	$develop = get_field('develop'); // get the group
	$gallery = $develop['develop_gallery'] ?? [];

	if ( $gallery && !empty($gallery) ): ?>
	<div class="develop-gallery flex flex-wrap gap-2">
		<?php foreach( $gallery as $item ):
			$image = $item['develop_gallery_image'] ?? null;
			$style = $item['develop_gallery_image_style'] ?? '';
			if ( ! $image ) continue;

			$classes = match($style) {
				'square'    => 'flex-[calc(50%-0.5rem)] aspect-square', // 0.5rem = gap-2
				'full_vh'   => 'w-full h-screen',
				'full_auto' => 'w-full h-auto',
				default     => 'w-full h-auto'
			};
		?>
			<div class="<?php echo esc_attr($classes); ?>">
			<img src="<?php echo esc_url($image['url']); ?>"
				alt="<?php echo esc_attr($image['alt']); ?>"
				class="w-full h-full object-cover rounded-2xl">
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	<!-- DEVELOP RESEARCH CARDS -->
	<?php
	$develop = get_field('develop'); // get the group
	$develop_research_cards = $develop['develop_research_cards'] ?? []; // get the repeater

	if ($develop_research_cards): ?>
	<div class="research-cards flex flex-col md:flex-row gap-2">
		<?php foreach ($develop_research_cards as $card):
			$number   = $card['develop_research_card_number'] ?? '';
			$subtitle = $card['develop_research_card_subtitle'] ?? '';
			$text     = $card['develop_research_card_text'] ?? '';
		?>
		<div class="card card--primary aspect-square flex flex-col justify-between flex-1">
			<div class="research-cards__head">
				<?php if ($number): ?>
					<p class="heading-xl text-highlight"><?php echo esc_html($number); ?></p>
				<?php endif; ?>
				<?php if ($subtitle): ?>
					<p class="heading-s text-highlight"><?php echo esc_html($subtitle); ?></p>
				<?php endif; ?>
			</div>
			<?php if ($text): ?>
				<div class="list body-m text-highlight">
					<?php echo wp_kses_post($text); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<!-- END DISCOVERY RESEARCH CARDS -->
	</div>
	<!-- END DEVELOP SECTION GALLERY -->

</section>

<?php endif; ?>
