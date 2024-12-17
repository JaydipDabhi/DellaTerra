<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dellaterrapro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'dellaterrapro'); ?></a>
		<header id="masthead" class="header-section">
			<div class="main-header">
				<?php $header_logo = get_field('header_logo', 'option');
				if ($header_logo) { ?>
					<div class="logo">
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($header_logo['url']); ?>" alt="<?php echo esc_attr($header_logo['alt']); ?>" /> </a>
					</div>
				<?php } ?>
				<nav id="site-navigation" class="main-navigation">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'nav menu',
							'walker'         => new Custom_Walker_Nav_Menu(),
						)
					); ?>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<div class="burger">
							<div class="strip burger-strip-2">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</div>
					</button>
				</nav>
			</div>
		</header>