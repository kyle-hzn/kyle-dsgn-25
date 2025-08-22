<?php
/**
 * The header
 *
 * @package Bathe
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
</head>

<body <?php body_class( 'antialiased p-2' ); ?>>
<div class="page-transition-overlay"></div>
<?php wp_body_open(); ?>
<?php include get_theme_file_path('mobile-drawer.php'); ?>

<?php
	$header = get_field('header', 'option');

	$project_counts = wp_count_posts('project');
	$project_count  = isset($project_counts->publish) ? $project_counts->publish : 0;

	if( $header ): ?>
<header class="header p-2 rounded-2xl flex justify-between items-center">
	<div class="flex items-center header__left gap-2">
		<a class="header__logo scale-up immediate" href="<?php echo home_url(); ?>">
			<img src="<?php echo $header['header_logo']['url']; ?>" alt="<?php echo $header['header_logo']['alt']; ?>"/>
		</a>
		<p class="body-s text-secondary w-[40%] blur-text-block immediate">
			<?php echo $header['header_text']; ?>
		</p>
	</div>

	<div class="header__center hidden md:flex gap-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 blur-text-block immediate">
		<?php foreach( $header['header_links'] as $item ):
			$url   = $item['header_links_item']['url'];
			$title = $item['header_links_item']['title'];
			$target = $item['header_links_item']['target'];

			// Count published projects (adjust CPT slug if needed)
			$count = wp_count_posts('post')->publish;
		?>
			<a href="<?php echo esc_url($url); ?>"
			target="<?php echo esc_attr($target); ?>"
			class="btn--link body-m text-primary px-2 relative">
				<?php echo esc_html($title); ?>

				<?php if ( strtolower($title) === 'projects' && $count > 0 ): ?>
					<span class="header__badge">
						<?php echo $count; ?>
					</span>
				<?php endif; ?>
			</a>
		<?php endforeach; ?>
	</div>

	<a href="<?php echo esc_url($header['header_cta']['url']); ?>" class="btn--primary hidden md:flex scale-up immediate">
		<?php echo esc_html($header['header_cta']['title']); ?>
		<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
	</a>

	<div class="header__mobile-btn flex md:hidden">
		<button
			class="group relative w-10 h-10 grid place-items-center rounded-lg"
			aria-expanded="false"
			aria-label="Open menu"
			type="button"
		>
			<!-- Menu icon -->
			<svg class="menu-icon w-6 h-6 transition-all duration-300 ease-in-out group-aria-[expanded=true]:opacity-0 group-aria-[expanded=true]:scale-75 group-aria-[expanded=true]:rotate-90" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
				<path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/>
			</svg>

			<!-- Close (X) icon -->
			<svg class="close-icon absolute w-6 h-6 transition-all duration-300 ease-in-out opacity-0 scale-75 -rotate-90 group-aria-[expanded=true]:opacity-100 group-aria-[expanded=true]:scale-100 group-aria-[expanded=true]:rotate-0" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
				<path d="M19 6.41 17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
			</svg>
		</button>
	</div>
</header>
<?php endif; ?>

<main id="page-container" role="main">
