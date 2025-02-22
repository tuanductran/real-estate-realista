<?php


function real_estate_realista_notify_admin_welcome () {
    if(!current_user_can( 'activate_plugins' )) return false;
    add_action('admin_notices', function () {

        $screen = get_current_screen();
        if (get_user_meta(get_current_user_id(), 'theme_alert_dissmiss')) {
            return;
        }
        
        if ('appearance_page_one-click-demo-import' == $screen->id || 'appearance_page_nexos-dashboard' === $screen->id || 'appearance_page_tgmpa-install-plugins' === $screen->id) {
            return;
        }

        if (get_option('wdk_theme_real_estate_realista_installed')) {
            return true;
        }
        
        ?>
        <div class="updated notice real-estate-realista-welcome-notice">
            <div class="real-estate-realista-welcome-notice-wrap">
                <h2><?php esc_html_e('Congratulations!', 'real-estate-realista'); ?></h2>
                <p><?php echo sprintf(esc_html__('%1$s is now installed and ready to use. You can start either by importing the ready made demo or get started by customizing it your self.', 'real-estate-realista'),wp_get_theme()['Name']); ?></p>
    
                <div class="real-estate-realista-welcome-info">
                    <div class="real-estate-realista-welcome-thumb">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.jpg'); ?>" alt="<?php echo sprintf(esc_attr__('%1$s Demo', 'real-estate-realista'),wp_get_theme()['Name']); ?>">
                    </div>
                        <div class="real-estate-realista-welcome-import">
                            <h3><?php esc_html_e('Import Demo', 'real-estate-realista'); ?></h3>
                            <?php if(!file_exists(get_stylesheet_directory() .'/addons/configuration.php')):?>
                                <?php if ( 
                                    file_exists(ABSPATH . 'wp-content/plugins/one-click-demo-import/one-click-demo-import.php') && in_array( 'one-click-demo-import/one-click-demo-import.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) 
                                    && file_exists(ABSPATH . 'wp-content/plugins/elementor/elementor.php') && in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) 
                                    && file_exists(ABSPATH . 'wp-content/plugins/wpdirectorykit/wpdirectorykit.php') && in_array( 'wpdirectorykit/wpdirectorykit.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) 
                                    && file_exists(ABSPATH . 'wp-content/plugins/elementinvader-addons-for-elementor/elementinvader-addons-for-elementor.php') && in_array( 'elementinvader-addons-for-elementor/elementinvader-addons-for-elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) 
                                    ):?>
                                    <p><?php esc_html_e('Click below to Import Theme Demo Content.', 'real-estate-realista'); ?></p>
                                    <p><a href="<?php echo esc_url(get_admin_url() . "themes.php?page=one-click-demo-import");?>" class="button button-primary"><?php esc_html_e('Import Now', 'real-estate-realista'); ?></a></p>
                                <?php else:?>
                                    <p><?php esc_html_e('Click below to install and active Themes Needed plugins.', 'real-estate-realista'); ?></p>
                                    <p><a href="<?php echo esc_url(get_admin_url() . "themes.php?page=tgmpa-install-plugins");?>" class="button button-primary"><?php esc_html_e('For best experience please install and active all recommended plugin from theme before demo content import here', 'real-estate-realista'); ?></a></p>
                                <?php endif;?>
                            <?php else:?> 
                                <p><?php esc_html_e('Click below to install and active Themes Demo Importer Plugin.', 'real-estate-realista'); ?></p>
                                <?php
                                    $plugin = 'elementor/elementor.php';
                                    $installed_plugins = get_plugins();
                                    $is_elementor_installed = isset( $installed_plugins[ $plugin ] );
                                    $elementor_version = NULL;
                                    if($is_elementor_installed) {
                                        $plugin_data = get_file_data(WP_PLUGIN_DIR.'/'.$plugin, array('Version' => 'Version'), false);
                                        $elementor_version = $plugin_data['Version'];
                                    }
                                ?>
                                <?php if ( version_compare( PHP_VERSION, '7.0', '>=' ) || ($elementor_version && version_compare( $elementor_version, '3.7', '<') )) :?>
                                    <?php if ( file_exists(ABSPATH . 'wp-content/plugins/one-click-demo-import/one-click-demo-import.php') && !in_array( 'one-click-demo-import/one-click-demo-import.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):?>
                                        <p><a data-slug="one-click-demo-import" data-filename="one-click-demo-import" href="<?php echo esc_url(get_admin_url() . "themes.php?page=tgmpa-install-plugins");?>" class="button button-primary real-estate-realista-activate-plugin"><?php esc_html_e('Activate Demo Importer Plugin', 'real-estate-realista'); ?></a></p>
                                    <?php elseif ( file_exists(ABSPATH . 'wp-content/plugins/one-click-demo-import/one-click-demo-import.php') && in_array( 'one-click-demo-import/one-click-demo-import.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )):?>
                                        <p><a href="<?php echo esc_url(get_admin_url() . "themes.php?page=one-click-demo-import");?>" class="button button-primary"><?php esc_html_e('Go to Demo Importer Page', 'real-estate-realista'); ?></a></p>
                                    <?php else:?>
                                        <p><a data-slug="one-click-demo-import" data-filename="one-click-demo-import" href="<?php echo esc_url(admin_url('themes.php?page=one-click-demo-import'));?>" class="button button-primary real-estate-realista-install-plugin"><?php esc_html_e('Install Demo Importer Plugin', 'real-estate-realista'); ?></a></p>
                                    <?php endif;?>
                                <?php else: ?>
                                    <p class="welcome-theme-alert-error" style=""><?php esc_html_e('Your php version not support latest Elementor Plugin, in such case eventually you can try older upload Elementor Version (<3.7) or Update PHP on your server', 'real-estate-realista'); ?></p>
                                <?php endif; ?>


                            <?php endif;?>
                        </div>
                    <div class="real-estate-realista-welcome-getting-started">
                        <h3><?php esc_html_e('Get Started', 'real-estate-realista'); ?></h3>
                        <p><?php echo sprintf(esc_html__('Here you will find all the necessary links and information on how to use %1$s.', 'real-estate-realista'),wp_get_theme()['Name']); ?></p>
                        <p><a href="<?php echo esc_url(admin_url('themes.php?page=real-estate-realista-dashboard')); ?>" class="button button-primary "><?php esc_html_e('Go to Setting Page', 'real-estate-realista'); ?></a></p>
                    </div>
                </div>
                <a href="?theme_alert_dissmiss" class="notice-close"><?php esc_html_e('Dismiss', 'real-estate-realista'); ?></a>
            </div>
        </div>
        <?php
    });

    add_action('admin_init', function () {
        $user_id = get_current_user_id();
        if (isset($_GET['theme_alert_dissmiss']))
            add_user_meta($user_id, 'theme_alert_dissmiss', 'true', true);
    });

    return true;
}

real_estate_realista_notify_admin_welcome();

  
function real_estate_realista_admin_scripts() {
        if(!current_user_can( 'activate_plugins' )) return false;
        $importer_params = array(
            'installing_text' => esc_html__('Installing Demo Importer Plugin', 'real-estate-realista'),
            'activating_text' => esc_html__('Activating Demo Importer Plugin', 'real-estate-realista'),
            'importer_page' => esc_html__('Go to Demo Importer Page', 'real-estate-realista'),
            'importer_url' => admin_url('themes.php?page=one-click-demo-import'),
            'error' => esc_html__('Error! Reload the page and try again.', 'real-estate-realista'),
            'success_redirect' => 1,
            'tgmpa_link' => esc_url(get_admin_url() . "themes.php?page=tgmpa-install-plugins"),
            'success_import' => esc_html__('For best experience please install and active all recommended plugin from theme before demo content import here.', 'real-estate-realista'),
            'wpnonce' => wp_create_nonce( 'activate_plugin' ),
        );

        wp_enqueue_style('real-estate-realista-welcome', get_stylesheet_directory_uri() . '/assets/css/welcome.css', array(), '1.0');
        wp_enqueue_script('real-estate-realista-welcome', get_stylesheet_directory_uri() . '/assets/js/welcome.js', ['jquery'], '1.0', true );
        wp_localize_script('real-estate-realista-welcome', 'importer_params', $importer_params);
}

add_action('admin_enqueue_scripts', 'real_estate_realista_admin_scripts');

if(!function_exists('real_estate_realista_activate_plugin')) {
    add_action('wp_ajax_real_estate_realista_activate_plugin', 'real_estate_realista_activate_plugin');
    function real_estate_realista_activate_plugin() {
        
        if(!current_user_can( 'activate_plugins' )) {
            echo esc_html__('Disable for current user', 'real-estate-realista');
            exit();
        }

        if ( empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'activate_plugin' ) ) {
            echo esc_html__('Wrong _wpnonce', 'real-estate-realista');
            exit();
        }

        $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
        $file = isset($_POST['file']) ? $_POST['file'] : '';
        $success = false;

        if (!empty($slug) && !empty($file)) {
            $result = activate_plugin($slug . '/' . $file . '.php');
            update_option('real_estate_realista_hide_notice', true);
            if (!is_wp_error($result)) {
                $success = true;
            }
        }
        echo wp_json_encode(array('success' => $success));
        die();
    }
}
