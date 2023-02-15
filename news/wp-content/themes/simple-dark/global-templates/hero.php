<?php
/**
 * Hero setup
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_active_sidebar( 'statichero' ) ) :
?>

	<div class="wrapper" id="wrapper-hero">

		<?php
		get_template_part( 'sidebar-templates/sidebar', 'statichero' );
		?>

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="border-bottom"></div>
				</div>
			</div>
		</div>

	</div>

<?php endif;