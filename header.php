<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Langate Test
	 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('flex flex-col min-h-screen'); ?>>

	<header class="header container flex mx-auto px-4 py-8">
			<div class="site-branding mr-8">
				<?php  if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
			</div>

			<nav class="main-navigation">
				<button class="menu-toggle hidden aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'langate_test' ); ?></button>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
              'menu_class' => 'flex'
						)
					);
				?>
			</nav>
	</header>
