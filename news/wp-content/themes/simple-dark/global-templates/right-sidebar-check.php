<?php
/**
 * Right sidebar check
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

</div><!-- #closing the primary container -->

<?php
$simpledark_sidebar_pos = get_theme_mod( 'simpledark_sidebar_position' );

if ( 'right' === $simpledark_sidebar_pos ) {
	get_template_part( 'sidebar-templates/sidebar', 'right' );
}
