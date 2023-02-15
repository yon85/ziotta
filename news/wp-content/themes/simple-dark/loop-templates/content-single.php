<?php
/**
 * Single post partial template
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta border-bottom pb-1 mb-3 small">

			<?php simpledark_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'd-block mx-auto mb-3' ) ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<div class="clearfix"></div>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="multipages mt-3 py-2 border-top border-bottom">' . __( 'Pages:', 'simple-dark' ),
				'after' => '</div>'
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer mt-3 pt-3 border-top small">

		<?php simpledark_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
