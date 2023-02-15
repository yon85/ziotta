<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('border-bottom pb-3 mb-3'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
	
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h2>' ); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta small mb-2">
		<?php simpledark_posted_on(); ?>
	</div>
	<?php endif; ?>

	</header>

	<div class="row no-gutters">

		<div class="col-12 col-lg-5">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'post-thumbnail', array( 'class' => 'd-block mx-auto mt-2 mb-3' ) ); ?></a>
		<?php else : ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/default-image.png" class="d-block mx-auto mt-2 mb-3" alt="<?php the_title(); ?>" /></a>
		<?php endif;  ?>
		</div>

		<div class="col-12 col-lg-7 pl-lg-3 entry-content">
			<?php the_excerpt(); ?>
		</div>

	</div>

	<footer class="entry-footer small">
		<?php simpledark_entry_footer(); ?>
	</footer>

</article>
