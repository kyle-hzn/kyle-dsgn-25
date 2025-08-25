<div class="flex flex-col gap-2 justify-end items-end">
	<?php
	$statusCard = get_field('status_card', 'option');
	if( $statusCard ): ?>
		<p class="body-m-bold text-highlight location-time blur-text-block immediate"
			data-timezone="<?php echo esc_attr($statusCard['hp_hero_location_timezone']); ?>">
			<?php echo esc_html($statusCard['hp_hero_location']); ?> <span class="body-m text-highlight time"></span>
		</p>
		<?php if ( !empty($statusCard['hp_hero_availability']) && $statusCard['hp_hero_availability'] ) : ?>
			<p class="status-card__avb body-m text-highlight blur-text-block immediate">
				<span class="body-m-bold text-highlight">Available</span> for freelance projects
			</p>
		<?php else : ?>
			<p class="body-m text-highlight blur-text-block immediate">
				<span class="body-m-bold text-highlight">Unavailable</span> for freelance projects
			</p>
		<?php endif; ?>
		<?php if ( !empty($statusCard['hp_hero_mail']) ) : ?>
			<a class="body-m text-highlight blur-text-block immediate" href="mailto:<?php echo esc_attr($statusCard['hp_hero_mail']); ?>?subject=Freelance%20Inquiry">
				<?php echo esc_html($statusCard['hp_hero_mail']); ?>
			</a>
		<?php endif; ?>
	<?php endif; ?>
</div>
