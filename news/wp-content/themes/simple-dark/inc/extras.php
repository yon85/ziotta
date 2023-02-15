<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_filter( 'body_class', 'simpledark_body_classes' );

if ( ! function_exists( 'simpledark_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function simpledark_body_classes( $classes ) {
		// Fix long non-breaking texts
		$classes[] = 'text-break';
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}
		return $classes;
	}
}

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'simpledark_adjust_body_class' );

if ( ! function_exists( 'simpledark_adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function simpledark_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' == $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

/**
 * Display navigation to next/previous post when applicable.
 */

if ( ! function_exists( 'simpledark_post_nav' ) ) {
	function simpledark_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="container-fluid navigation post-navigation my-3">
			<h2 class="sr-only"><?php esc_html_e( 'Post navigation', 'simple-dark' ); ?></h2>
			<div class="row nav-links">
				<?php
				if ( get_previous_post_link() ) {
					previous_post_link( '<div class="col px-0 py-3 border-top border-bottom nav-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> %link</div>', _x( '%title', 'Previous post link', 'simple-dark' ) );
				}
				if ( get_next_post_link() ) {
					next_post_link( '<div class="col px-0 py-3 border-bottom border-top nav-next text-right">%link <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>', _x( '%title', 'Next post link', 'simple-dark' ) );
				}
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
}

if ( ! function_exists( 'simpledark_pingback' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts of any post type.
	 */
	function simpledark_pingback() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'simpledark_pingback' );

if ( ! function_exists( 'simpledark_mobile_web_app_meta' ) ) {
	/**
	 * Add mobile-web-app meta.
	 */
	function simpledark_mobile_web_app_meta() {
		echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-title" content="' . esc_attr( get_bloginfo( 'name' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'simpledark_mobile_web_app_meta' );

if ( ! function_exists( 'simpledark_default_body_attributes' ) ) {
	/**
	 * Adds schema markup to the body element.
	 *
	 * @param array $atts An associative array of attributes.
	 * @return array
	 */
	function simpledark_default_body_attributes( $atts ) {
		$atts['itemscope'] = '';
		$atts['itemtype']  = 'http://schema.org/WebSite';
		return $atts;
	}
}
add_filter( 'simpledark_body_attributes', 'simpledark_default_body_attributes' );

add_filter( 'the_password_form', 'simpledark_password_form' );
if ( ! function_exists( 'simpledark_password_form' ) ) {
	/**
	 * Customize input form of password protected page.
	 */
	function simpledark_password_form( $form = '' ) {
	    global $post;
	    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	    $form = '<p>' . __( 'This content is password protected. To view it please enter the password below:', 'simple-dark' ) . '</p>
	    <form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="form-inline">
	    <label for="' . esc_attr( $label ) . '" class="sr-only">' . __( 'Password', 'simple-dark' ) . '</label><input name="post_password" id="' . esc_attr( $label ) . '" placeholder="' . esc_attr__( 'Password', 'simple-dark' ) . '" type="password" size="20" maxlength="20" class="form-control w-auto mr-1" /><input type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'simple-dark' ) . '" class="btn btn-primary" />
	    </form>
	    ';
	    return $form;
	}
}

function simpledark_custom_logo_output( $html ) {
	$html = str_replace('custom-logo-link', 'custom-logo-link d-inline-block mb-3', $html );
	return $html;
}
add_filter('get_custom_logo', 'simpledark_custom_logo_output', 10);

function simpledark_custom_excerpt_length( $length ) {
    return is_admin() ? $length : 50;
}
add_filter( 'excerpt_length', 'simpledark_custom_excerpt_length', 999 );