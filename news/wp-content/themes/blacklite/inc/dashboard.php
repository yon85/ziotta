<?php
/**
 * Add theme dashboard page
 */

add_action('admin_menu', 'blacklite_theme_info');
if ( ! function_exists( 'blacklite_theme_info' ) ) {
    function blacklite_theme_info()
    {
        $theme_data = wp_get_theme();
        add_theme_page(sprintf(esc_html__('%s Theme Dashboard', 'blacklite'), $theme_data->Name), sprintf(esc_html__('%s theme', 'blacklite'), $theme_data->Name), 'edit_theme_options', 'blacklite', 'blacklite_theme_info_page');
    }
}

if ( ! function_exists( 'blacklite_admin_scripts' ) ) {
    /**
     * Enqueue scripts for admin page only: Theme info page
     */
    function blacklite_admin_scripts( $hook )
    {
            wp_enqueue_style('blacklite-admin-css', get_template_directory_uri() . '/css/dashboard.css');
    }
}
add_action('admin_enqueue_scripts', 'blacklite_admin_scripts');

if ( ! function_exists( 'blacklite_theme_info_page' ) ) {
    function blacklite_theme_info_page()
    {
        $theme_data = wp_get_theme();
        // Check for current viewing tab
        $tab = null;
        if ( isset( $_GET['tab'] ) ) {
            $tab = $_GET['tab'];
        } else {
            $tab = null;
        }

        ?>

        <div class="wrap about-wrap theme_info_wrapper">
            <h1><?php printf(esc_html__('Welcome to %1s - Version %2s', 'blacklite'), $theme_data->Name, $theme_data->Version); ?></h1>

            <div class="about-text"><?php esc_html_e("BlackLite is a Responsive WordPress blog theme. The theme is a perfect combination of beautiful and professional.", 'blacklite') ?></div>
            <a target="_blank" href="<?php echo esc_url('https://zthemes.net/'); ?>"
               class="zthemes-badge wp-badge"><span><?php echo esc_html('ZThemes Studio', 'blacklite'); ?></span></a>

            <h2 class="nav-tab-wrapper">
                <a href="<?php echo esc_url( add_query_arg( array( 'page'=>'blacklite' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab <?php echo ( ! $tab || $tab == 'blacklite' ) ? ' nav-tab-active' : ''; ?>"><?php echo esc_html($theme_data->Name); ?></a>
                <a href="<?php echo esc_url( add_query_arg( array( 'page'=>'blacklite', 'tab' => 'free_pro' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab<?php echo $tab == 'free_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free vs PRO', 'blacklite' ); ?></span></a>
                <a href="<?php echo esc_url( add_query_arg( array( 'page'=>'blacklite', 'tab' => 'contribute' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab<?php echo $tab == 'contribute' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Contribute', 'blacklite' ); ?><span class="dashicons dashicons-thumbs-up"></span></a>
            </h2>

            <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e('Theme Customizer', 'blacklite'); ?></h3>

                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'blacklite'), $theme_data->Name); ?></p>

                            <p>
                                <a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="button button-secondary"><?php esc_html_e('Start Customize', 'blacklite'); ?> &#8594;</a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e('Having Trouble, Need Support?', 'blacklite'); ?></h3>

                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through ZThemes Studio support ticket system.', 'blacklite'), $theme_data->Name); ?></p>

                            <p>
                                <a class="button button-secondary" target="_blank" href="https://zthemes.net/support"><?php esc_html_e( 'Create a support ticket', 'blacklite' ) ?></a>&nbsp;
                                <a href="http://demo.zthemes.net/docs/" target="_blank" class="button button-secondary"><?php esc_html_e('Some Tips', 'blacklite'); ?></a>
                                <a href="https://www.youtube.com/watch?v=tVwkURiGigk" target="_blank" class="button button-secondary"><?php esc_html_e('Video for Black Pro', 'blacklite'); ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3 class="blacklite-upgrade"><?php esc_html_e('Upgrade to Black Pro', 'blacklite'); ?></h3>

                            <p class="about"><?php printf(esc_html__('Our #1 blogging WordPress theme with premium features designed for bloggers and content lovers.', 'blacklite'), $theme_data->Name); ?></p>

                            <p>
                                <a class="button button-secondary" target="_blank" href="http://demo.zthemes.net/black/"><?php _e( 'Black Pro Demo', 'blacklite' ) ?> &#8594;</a>&nbsp;
                                <a class="button button-primary" target="_blank" href="https://zthemes.net/themes/black"><?php _e( 'Upgrade Now', 'blacklite' ) ?> &#8594;</a>
                            </p>
                        </div>
                    </div>

                    <div class="theme_info_right">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="<?php esc_attr_e('Theme Screenshot', 'blacklite'); ?>"/>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if ( $tab == 'contribute' ) { ?>
            <div class="contribute-tab-content feature-section three-col">
                <div class="col">
                    <div class="theme_info_boxed">
                        <p><strong><?php esc_html_e( 'Are you a polyglot? Want to translate BlackLite into your own language?', 'blacklite' ); ?></strong></p>
                        <p><?php esc_html_e('Get involved at WordPress.org.', 'blacklite'); ?></p>
                        <p>
                            <a href="https://translate.wordpress.org/projects/wp-themes/blacklite" target="_blank" class="button button-primary"><?php esc_html_e('Translate BlackLite', 'blacklite'); ?> <span class="dashicons dashicons-external"></span></a>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="theme_info_boxed">
                        <p><strong><?php esc_html_e( 'Are you enjoying BlackLite theme?', 'blacklite' ); ?></strong></p>
                        <p><?php printf( esc_html__('Rate our theme on %1s. We\'d really appreciate it!', 'blacklite'), '<a target="_blank" href="https://wordpress.org/support/theme/blacklite/reviews/?filter=5">WordPress.org</a>' ); ?></p>
                        <p><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>
                    </div>
                </div>
            </div>
        <?php } ?>

	        <?php if ( $tab == 'free_pro' ) { ?>
                <div id="free_pro" class="freepro-tab-content info-tab-content">
                    <table class="free-pro-table">
                        <thead><tr><th></th><th>Black Lite</th><th>Black Pro</th></tr></thead>
                        <tbody>
                        <tr>
                            <td>
                                <h4>Responsive Design</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Translation Ready</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Upload Your Own Logo</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Sidebar Layout</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>

                        <tr>
                            <td>
                                <h4>Featured Slider</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>900+ Google Fonts</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>WooCommerce Compatible</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Custom Widgets</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Posts/Page Settings</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Instagram Feed Widget</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Footer Copyright Editor</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>

                        <tr>
                            <td>
                                <h4>Mailchimp Support</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>


                        <tr class="ti-about-page-text-center"><td></td><td colspan="2"><a href="https://zthemes.net/themes/black" target="_blank" class="button button-primary button-hero">Get Black Pro now!</a></td></tr>
                        </tbody>
                    </table>
                </div>
	        <?php } ?>


        </div> <!-- END .theme_info -->
        <script type="text/javascript">
            jQuery(  document).ready( function( $ ){
                $( 'body').addClass( 'about-php' );
            } );
        </script>
        <?php
    }
}
