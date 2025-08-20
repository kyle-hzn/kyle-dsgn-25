<?php
	$header = get_field('header', 'option');
	if( $header ): ?>
	<div class="mobile-drawer fixed inset-0 flex items-end w-full h-full transform translate-x-full transition-transform duration-300 ease-in-out z-40 md:hidden">
	<div class="mobile-drawer__wrap flex flex-col gap-6 p-2 w-full">
		<?php foreach( $header['header_links'] as $item ):
			$url   = $item['header_links_item']['url'];
			$title = $item['header_links_item']['title'];
			$target = $item['header_links_item']['target'];

			// Count published projects (adjust CPT slug if needed)
			$count = wp_count_posts('post')->publish;
		?>
			<a href="<?php echo esc_url($url); ?>"
			target="<?php echo esc_attr($target); ?>"
			class="heading-xl text-highlight relative w-fit">
				<?php echo esc_html($title); ?>

				<?php if ( strtolower($title) === 'projects' && $count > 0 ): ?>
					<span class="header__badge-mobile">
						<?php echo $count; ?>
					</span>
				<?php endif; ?>
			</a>
		<?php endforeach; ?>
		<a href="<?php echo esc_url($header['header_cta']['url']); ?>" class="btn--primary hidden md:flex">
			<?php echo esc_html($header['header_cta']['title']); ?>
			<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
		</a>
		<div class="flex justify-between">
			<a href="<?php echo esc_url($header['header_linkedin']['url']); ?>" class="btn--link body-m text-highlight p-2">
				<?php echo esc_html($header['header_linkedin']['title']); ?>
			</a>
			<?php if ( !empty($header['header_mail']) ) : ?>
				<a class="btn--link body-m text-highlight p-2" href="mailto:<?php echo esc_attr($header['header_mail']); ?>?subject=Freelance%20Inquiry">
					<?php echo esc_html($header['header_mail']); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
	</div>
<?php endif; ?>
