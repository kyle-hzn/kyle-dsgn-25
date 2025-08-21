<?php
$deliver = get_field('deliver');

if ($deliver): ?>
<section class="deliver-section flex flex-col gap-2">
	<!-- DELIVER SECTION SUBTITLE -->
	<div class="subtitle-light flex items-center justify-between">
		<p class="subtitle-light__text">
			<?php echo esc_html($deliver['deliver_subtitle']); ?>
		</p>
		<div class="tag tag--primary">
			<?php echo esc_html($deliver['deliver_subtitle_tag']); ?>
		</div>
	</div>
	<!-- END DELIVER SECTION SUBTITLE -->
	<!-- DELIVER SECTION KEYSTATS -->
	<div class="card card--primary flex flex-col md:flex-row gap-4">
		<h2 class="heading-xl text-highlight flex-1">
			<?php echo esc_html($deliver['deliver_keystats_title']); ?>
		</h2>
		<?php
		$deliver = get_field('deliver');
		$deliver_keystats = $deliver['deliver_keystat_card'] ?? [];

		if ($deliver_keystats): ?>
		<div class="grid grid-cols-2 gap-1 auto-rows-fr flex-1">
			<?php foreach ($deliver_keystats as $keystat):
				$number = $keystat['deliver_keystat_card_number'] ?? '';
				$text   = $keystat['deliver_keystat_card_text'] ?? '';
			?>
			<div class="card card--keystat aspect-square flex flex-col justify-between">
				<?php if ($number): ?>
					<p class="heading-l text-highlight"><?php echo esc_html($number); ?></p>
				<?php endif; ?>
				<?php if ($text): ?>
					<p class="body-m text-highlight"><?php echo esc_html($text); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	<!-- END DELIVER SECTION KEYSTATS -->
</section>
<?php endif; ?>
