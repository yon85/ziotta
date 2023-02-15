<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

?>

<div class="col-sm-5 col-lg-4 widget-area" id="right-sidebar" role="complementary">

<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->
