<?php
/**
 * Sidebar setup for footer full
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div id="wrapper-footer-full">

		<div class="container" id="footer-full-content" tabindex="-1">

			<div class="row">
				<div class="col pb-4">
					<div class="border-top"></div>
				</div>
			</div>

			<div class="row">

				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

<?php endif;