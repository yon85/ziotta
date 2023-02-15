<?php
/**
 * Miscellaneous functions
 *
 * @package SimpleDark
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'widget_tag_cloud_args', 'simpledark_tag_cloud_font_sizes' );
function simpledark_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '.875';
    $args['largest'] = '.875';
    $args['unit'] = 'rem';
    $args['separator'] = '';
    return $args;
}

add_filter( 'wp_generate_tag_cloud', 'simpledark_add_class_tag_cloud', 10, 1 );
function simpledark_add_class_tag_cloud( $string ) {
   return str_replace( 'class="tag-cloud-link', 'class="btn btn-primary mr-1 mb-1 p-1 tag-cloud-link', $string );
}

if ( ! function_exists( 'simpledark_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page or attachment
 */
function simpledark_edit_link() {
	$link = edit_post_link(
		sprintf(
			/* translators: %s: Name of current page */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'simple-dark' ),
			get_the_title()
		),
		'<footer class="entry-footer mt-3 py-3 border-top small"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ',
		'</footer>'
	);
	return $link;
}
endif;