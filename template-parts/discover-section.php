<?php
$discover = get_field('discover');

if ($discover): ?>
<section class="discover-section flex flex-col gap-2">
	<!-- DISCOVERY SECTION SUBTITLE -->
	<div class="subtitle-light flex items-center justify-between">
		<p class="subtitle-light__text reveal-text on-scroll">
			<?php echo esc_html($discover['discover_subtitle']); ?>
		</p>
		<div class="tag tag--primary scale-up on-scroll">
			<?php echo esc_html($discover['discover_subtitle_tag']); ?>
		</div>
	</div>
	<!-- DISCOVERY SECTION SUBTITLE -->
	<!-- DISCOVERY SECTION KEYSTATS -->
	<div class="card card--primary flex flex-col md:flex-row gap-4">
		<h2 class="heading-xl text-highlight flex-1 reveal-text immediate overflow-hidden">
			<?php echo esc_html($discover['discover_keystats_title']); ?>
		</h2>
		<?php
		$discover = get_field('discover');
		$keystats = $discover['discover_keystat_card'] ?? [];

		if ($keystats): ?>
		<div class="grid grid-cols-2 gap-1 auto-rows-fr flex-1">
			<?php foreach ($keystats as $keystat):
				$number = $keystat['discover_keystat_card_number'] ?? '';
				$text   = $keystat['discover_keystat_card_text'] ?? '';
			?>
			<div class="card card--keystat aspect-square flex flex-col justify-between">
				<?php if ($number): ?>
					<p class="heading-l text-highlight stat-number"><?php echo esc_html($number); ?></p>
				<?php endif; ?>
				<?php if ($text): ?>
					<p class="body-m text-highlight blur-text-block on-scroll"><?php echo esc_html($text); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	<!-- END DISCOVERY SECTION KEYSTATS -->
	<!-- DISCOVERY SECTION IMAGE -->
	<div class="discover_thumbnail w-full rounded-2xl overflow-hidden h-screen">
		<img class="h-full w-full object-cover zoom-on-scroll" src="<?php echo esc_url($discover['discover_image']['url']); ?>" alt="<?php echo esc_attr($discover['discover_image']['alt']); ?>"/>
	</div>
	<!-- END DISCOVERY SECTION IMAGE -->
	<!-- DISCOVERY RESEARCH CARDS -->
	<?php
	$discover = get_field('discover'); // get the group
	$research_cards = $discover['discovery_research_cards'] ?? []; // get the repeater

	if ($research_cards): ?>
	<div class="research-cards flex flex-col md:flex-row gap-2">
		<?php foreach ($research_cards as $card):
			$number   = $card['discovery_research_card_number'] ?? '';
			$subtitle = $card['discovery_research_card_subtitle'] ?? '';
			$text     = $card['discovery_research_card_text'] ?? '';
		?>
		<div class="card card--primary aspect-square flex flex-col justify-between flex-1">
			<div class="research-cards__head">
				<?php if ($number): ?>
					<p class="heading-xl text-highlight stat-number"><?php echo esc_html($number); ?></p>
				<?php endif; ?>
				<?php if ($subtitle): ?>
					<p class="heading-s text-highlight reveal-text on-scroll"><?php echo esc_html($subtitle); ?></p>
				<?php endif; ?>
			</div>
			<?php if ($text): ?>
				<div class="list body-m text-highlight blur-text-block on-scroll">
					<?php echo wp_kses_post($text); ?>
				</div>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<!-- END DISCOVERY RESEARCH CARDS -->
	<!-- TESTIMONIAL -->
	<div class="card card--primary flex flex-col gap-2">
		<p class="heading-s text-highlight reveal-text on-scroll">
			<?php echo esc_html($discover['discovery_testimonial']); ?>
		</p>
		<p class="body-m text-highlight blur-text-block on-scroll">
			<?php echo esc_html($discover['discovery_testimonial_author']); ?>
		</p>
	</div>
	<!-- END TESTIMONIAL -->
</section>
<?php endif; ?>
