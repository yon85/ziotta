<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

	<div class="container" id="wrapper-footer">

		<div class="row">

			<div class="col">

				<footer class="site-footer pt-3 pb-3 border-top" id="colophon">

					<div class="site-info text-center small">

						<?php simpledark_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- #page we need this extra closing tag here -->

<button onclick="simpledarkTopFunction()" id="simpledarkTopBtn" title="<?php esc_attr_e( 'Scroll to Top', 'simple-dark' ); ?>" type="button" class="top-btn btn btn-lg" tabindex="-1">
	<i class="fa fa-arrow-up" aria-hidden="true"></i>
</button>

<?php wp_footer(); ?>

</body>

</html>

