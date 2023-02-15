<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php simpledark_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="container">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'simple-dark' ); ?></a>

		<div class="text-center pt-4 pt-lg-5 pb-3">

			<?php if ( function_exists( 'the_custom_logo' ) ) {
 				the_custom_logo();
			} ?>

			<?php if ( is_front_page() && is_home() ) : ?>

				<h1 class="site-title mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a><span class="site-description mt-2"><?php bloginfo( 'description' ); ?></span></h1>

			<?php else : ?>

				<div class="site-title"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a><span class="site-description mt-2"><?php bloginfo( 'description' ); ?></span></div>

			<?php endif; ?>

		</div>

		<nav id="main-nav" class="navbar navbar-dark px-0" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'simple-dark' ); ?>
			</h2>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'simple-dark' ); ?>">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>

			<!-- The WordPress Menu goes here -->
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav pt-2',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Simpledark_WP_Bootstrap_Navwalker(),
				)
			); ?>

			<?php get_search_form(); ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
