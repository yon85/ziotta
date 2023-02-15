<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="author-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<div class="col content-area" id="primary">

			<main class="site-main" id="main">

				<header class="page-header author-header">

					<?php
					if ( get_query_var( 'author_name' ) ) {
						$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
					} else {
						$curauth = get_userdata( intval( $author ) );
					}
					?>

					<h1 class="border-bottom mb-3"><?php echo esc_html__( 'About:', 'simple-dark' ), ' ', esc_html( $curauth->display_name ); ?></h1>

					<?php if ( ! empty( $curauth->ID ) ) : ?>
						<?php echo get_avatar( $curauth->ID, '', '', '', $args = array( 'class' => 'float-right ml-3' ) ); ?>
					<?php endif; ?>

					<?php if ( ! empty( $curauth->user_url ) || ! empty( $curauth->description ) ) : ?>
						<dl>
							<?php if ( ! empty( $curauth->user_url ) ) : ?>
								<dt><?php esc_html_e( 'Website', 'simple-dark' ); ?></dt>
								<dd>
									<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
								</dd>
							<?php endif; ?>

							<?php if ( ! empty( $curauth->description ) ) : ?>
								<dt><?php esc_html_e( 'Profile', 'simple-dark' ); ?></dt>
								<dd><?php echo esc_html( $curauth->description ); ?></dd>
							<?php endif; ?>
						</dl>
					<?php endif; ?>

				</header><!-- .page-header -->

				<?php if ( have_posts() ) : ?>

				<h2><?php echo esc_html__( 'Posts by', 'simple-dark' ), ' ', esc_html( $curauth->display_name ); ?>:</h2>

				<div class="clearfix border-bottom mb-3"></div>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php simpledark_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

</div><!-- #author-wrapper -->

<?php get_footer();
