<?php
/**
 * Simpledark enqueue scripts
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'simpledark_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function simpledark_scripts() {

		wp_enqueue_style( 'simple-dark-google-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500&family=Roboto+Mono&family=Roboto+Slab:wght@400;500&display=swap', [], null );

		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'simple-dark-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'simple-dark-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'simpledark_scripts' ).

add_action( 'wp_enqueue_scripts', 'simpledark_scripts' );
