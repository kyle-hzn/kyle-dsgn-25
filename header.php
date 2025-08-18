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

<body <?php body_class( 'antialiased p-2 overflow-x-hidden' ); ?>>
<?php wp_body_open(); ?>

<header class="header p-2 rounded-2xl flex justify-between items-center relative z-50">
	<div class="flex items-center header__left gap-2">
		<a class="header__logo" href="<?php echo home_url(); ?>">
			<img src="<?php echo THEME_IMG_PATH; ?>/kyle-dsgn-logo.svg" alt="Logo KYLE-DSGN"/>
		</a>
		<p class="body-s text-secondary">
			crafting captivating<br>digital experiences.
		</p>
	</div>
	<div class="header__center hidden md:flex gap-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
		<a href="#" class="btn--link body-m text-primary p-2">
			Projects (6)
		</a>
		<a href="#" class="btn--link body-m text-primary p-2">
			Services
		</a>
		<a href="#" class="btn--link body-m text-primary p-2">
			About
		</a>
	</div>
	<a href="#" class="btn--primary hidden md:flex">
		Get In Touch
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

<div class="lg:flex grow">
	<main id="primary" class="grow p-8" role="main">
