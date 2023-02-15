<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blacklite
 */

?>

	</div><!-- #content -->

	<div id="instagram-footer">

		<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-2') ) ?>
		
	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div id="footer-social">
				
				<?php if(get_theme_mod('blacklite_facebook')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_facebook')); ?>" target="_blank"><i class="fa fa-2x fa-facebook"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_twitter')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_twitter')); ?>" target="_blank"><i class="fa fa-2x fa-twitter"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_instagram')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_instagram')); ?>" target="_blank"><i class="fa fa-2x fa-instagram"></i> <span></span></a><?php endif; ?>
			    <?php if(get_theme_mod('blacklite_reddit')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_reddit')); ?>" target="_blank"><i class="fa fa-2x fa-reddit"></i> <span></span></a><?php endif; ?>
			    <?php if(get_theme_mod('blacklite_telegram')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_telegram')); ?>" target="_blank"><i class="fa fa-2x fa-telegram"></i></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_pinterest')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_pinterest')); ?>" target="_blank"><i class="fa fa-2x fa-pinterest"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_bloglovin')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_bloglovin')); ?>" target="_blank"><i class="fa fa-2x fa-heart"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_google')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_google')); ?>" target="_blank"><i class="fa fa-2x fa-google-plus"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_tumblr')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_tumblr')); ?>" target="_blank"><i class="fa fa-2x fa-tumblr"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_youtube')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_youtube')); ?>" target="_blank"><i class="fa fa-2x fa-youtube-play"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_dribbble')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_dribbble')); ?>" target="_blank"><i class="fa fa-2x fa-dribbble"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_soundcloud')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_soundcloud')); ?>" target="_blank"><i class="fa fa-2x fa-soundcloud"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_vimeo')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_vimeo')); ?>" target="_blank"><i class="fa fa-2x fa-vimeo-square"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_linkedin')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_linkedin')); ?>" target="_blank"><i class="fa fa-2x fa-linkedin"></i> <span></span></a><?php endif; ?>
				<?php if(get_theme_mod('blacklite_rss')) : ?><a href="<?php echo esc_url(get_theme_mod('blacklite_rss')); ?>" target="_blank"><i class="fa fa-2x fa-rss"></i> <span></span></a><?php endif; ?>
				
		</div>

		<div class="site-info container">
			<?php printf(esc_html__('Copyright %1$s %2$s %3$s', 'blacklite'), '&copy;', esc_attr(date_i18n(__('Y', 'blacklite'))), esc_attr(get_bloginfo())); ?>
                <span class="sep"> &ndash; </span>
            <?php printf(esc_html__('%1$s Designed & Developed by %2$s', 'blacklite'), '', '<a href="' . esc_url('https://ziotta.com/#Team', 'blacklite') . '">ZTTA</a>'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
