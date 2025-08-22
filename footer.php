<?php
/**
 * The footer
 *
 * @package Bathe
 */

?>
</main>

</div>

<?php
	$footer = get_field('footer', 'option');
	if( $footer ): ?>
<footer class="footer flex flex-col gap-6 p-6 md:p-8 overflow-x-hidden">
	<div class="footer__head flex flex-col md:flex-row justify-between items-start gap-6">
		<div class="flex flex-col gap-2 md:w-[40%]">
			<h4 class="heading-l text-highlight-light reveal-text on-scroll">
				<?php echo $footer['footer_text']; ?>
			</h4>
			<a href="<?php echo esc_url($footer['footer_cta']['url']); ?>" class="btn--primary md:w-fit scale-up on-scroll">
				<?php echo esc_html($footer['footer_cta']['title']); ?>
				<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
			</a>
		</div>
		<div class="flex justify-between w-full md:w-fit md:flex-col gap-4">
			<?php foreach( $footer['footer_primary_links'] as $item ): ?>
				<a href="<?php echo esc_url($item['footer_primary_links_item']['url']); ?>"
				target="<?php echo esc_attr($item['footer_primary_links_item']['target']); ?>"
				class="btn--link body-m text-highlight-light px-2 blur-text on-scroll">
					<?php echo esc_html($item['footer_primary_links_item']['title']); ?>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="flex justify-between w-full md:w-fit md:flex-col gap-4">
			<?php foreach( $footer['footer_secondary_links'] as $item ):
				$link = $item['footer_secondary_links_item'];
				if( $link ): ?>
					<a href="<?php echo esc_url( $link['url'] ); ?>"
					<?php if ( $link['target'] ) : ?> target="<?php echo esc_attr( $link['target'] ); ?>"<?php endif; ?>
					class="btn--link body-m text-highlight-light px-2 blur-text on-scroll">
						<?php echo esc_html( $link['title'] ); ?>
					</a>
				<?php endif;
			endforeach; ?>
		</div>
		<img class="w-24 h-24 image-spin scale-up on-scroll" src="<?php echo $footer['footer_jabba']['url']; ?>" alt="<?php echo $footer['footer_jabba']['alt']; ?>"/>
	</div>
	<!-- BRAND MARQUEE -->
	<?php get_template_part( 'template-parts/brand-marquee' ); ?>
	<!-- END BRAND MARQUEE -->
	<div class="flex flex-row justify-between items-center">
		<p class="body-s text-highlight-light">
			<?php echo $footer['footer_disclaimer']; ?>
		</p>
		<a href="<?php echo esc_url($footer['footer_legal_link']['url']); ?>" class="btn--link body-s text-highlight-light p-2">
				<?php echo esc_html($footer['footer_legal_link']['title']); ?>
		</a>
	</div>
</footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
