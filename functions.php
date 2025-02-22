<?php
/**
 * Nexproperty Child Theme Custom Functions
**/

if ( ! defined( 'REAL_ESTATE_VILLA_THEME_DIRECTORY' ) ) {
	define( 'REAL_ESTATE_VILLA_THEME_DIRECTORY', get_stylesheet_directory() );
}

require REAL_ESTATE_VILLA_THEME_DIRECTORY . '/includes/welcome.php';

/**
 * Localize
 * Since 1.0
 */
if( ! function_exists( 'real_estate_realista_localize' ) ) {
	 
	add_action('after_setup_theme', 'real_estate_realista_localize');

	function real_estate_realista_localize(){
		load_child_theme_textdomain( 'real-estate-realista' , get_stylesheet_directory().'/languages');
	}
}

 /* Enqueue Child Theme Scripts & Styles 
 ** http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * Since 1.0
 */
 
add_action( 'wp_enqueue_scripts', 'real_estate_realista_styles' );	

if( ! function_exists( 'real_estate_realista_styles' ) ) {	

	function real_estate_realista_styles() {	
					
		wp_enqueue_style(
			'layers-parent-style',
			get_template_directory_uri() . '/style.css',
			array()
		); // Parent Stylsheet for Version info

		wp_enqueue_style(
			'fontawesome-6',
			get_stylesheet_directory_uri() . '/assets/libs/fontawesome-free/css/all.css',
			array()
		); // Parent Stylsheet for Version info
	}
	
}
if( ! function_exists( 'real_estate_realista_scripts' ) ) {
		
	function real_estate_realista_scripts() {
		
		wp_enqueue_script(
			'real-estate-realista' . '-custom',
			get_stylesheet_directory_uri() . '/assets/js/theme.js',
			array(
				'jquery', // make sure this only loads if jQuery has loaded
			)
		); // Custom Child Theme jQuery  
		
	}	
	
}
// Output this in the footer before anything else
// http://codex.wordpress.org/Plugin_API/Action_Reference/wp_footer
add_action('wp_enqueue_scripts', 'real_estate_realista_scripts'); 
 

/**
* Add Sub Menu Page to the Layers Menu Item
*/
if( ! function_exists('real_estate_realista_register_submenu_page') ) {
	function real_estate_realista_register_submenu_page(){
		add_theme_page( __( 'Real Estate Realista Help' , 'real-estate-realista'  ), __( 'Real Estate Realista Help' , 'real-estate-realista'  ), 
							'edit_theme_options', 'real-estate-realista-dashboard', 'real_estate_realista_get_child_onboarding' );
	}
}
function real_estate_realista_get_child_onboarding(){
	require_once get_stylesheet_directory() . '/includes/theme-help.php';
}
add_action('admin_menu', 'real_estate_realista_register_submenu_page', 60);

/**
* Welcome Redirect
* http://docs.layerswp.com/how-to-add-help-pages-onboarding-to-layers-themes-or-extensions/
*/
function real_estate_realista_setup(){
	if( isset($_GET["activated"]) && $pagenow = "themes.php" ) { //&& '' == get_option( 'layers_welcome' )
		update_option( 'layers_welcome' , 1);
	}
}
add_action( 'after_setup_theme' , 'real_estate_realista_setup', 20 );

/*
* Add admin notify
* @param (string) $key unique key of notify, prefix included related plugin
* @param (string) $text test of message
* @param (function) $callback_filter custom function should be return true if not need show
* @param (string) $class notify alert class, by default 'notice notice-error'
* @return boolen true 
*/
function real_estate_realista_notify_admin ($key = '', $text = 'Custom Text of message', $callback_filter = '', $class = 'notice notice-error') {
    $key = 'real_estate_realista_notify_'.$key;
    $key_diss = $key.'_dissmiss';

    $real_estate_realista_notinstalled_admin_notice__error = function () use ($key_diss, $text, $class, $callback_filter) {
        global $wpdb;
        $user_id = get_current_user_id();
        if (!get_user_meta($user_id, $key_diss)) {
            if(!empty($callback_filter)) if($callback_filter()) return false;

            $message = '';
            $message .= $text;
            printf('<div class="%1$s" style="position:relative;"><p>%2$s</p><a href="?'.$key_diss.'"><button type="button" class="notice-dismiss"></button></a></div>', esc_html($class), ($message));  // WPCS: XSS ok, sanitization ok.
        }
    };

    add_action('admin_notices', function () use ($real_estate_realista_notinstalled_admin_notice__error) {
        $real_estate_realista_notinstalled_admin_notice__error();
    });

    $real_estate_realista_notinstalled_admin_notice__error_dismissed = function () use ($key_diss) {
        $user_id = get_current_user_id();
        if (isset($_GET[$key_diss]))
            add_user_meta($user_id, $key_diss, 'true', true);
    };
    add_action('admin_init', function () use ($real_estate_realista_notinstalled_admin_notice__error_dismissed) {
        $real_estate_realista_notinstalled_admin_notice__error_dismissed();
    });

    return true;
}



/**
 * Admin styles.
 *
 */
function real_estate_realista_custom_admin_styles() {
    echo '<style>
      .appearance_page-dashboard #setting-error-tgmpa {
        margin-left: 0;
      }
      
      .ocdi-install-plugins-content-content .ocdi-content-notice.ocdi-content-notice--warning,
      .ocdi__file-upload-container .ocdi__file-upload-container-items .ocdi__file-upload:not(:first-child),
      .ocdi__file-upload-container .ocdi__file-upload-container-items--second-row,
      .ocdi__content-container .plugin-item.plugin-item-wpforms-lite,
      .ocdi__content-container .plugin-item.plugin-item-all-in-one-seo-pack,
      .ocdi__content-container .plugin-item.plugin-item-google-analytics-for-wordpress {
        display: none !important;
      }
      
      .button.button-primary.js-ocdi-install-plugins-before-import.ocdi-button-disabled::after {
        content: "\f113";
        font-family: dashicons;
        display: inline-block;
        line-height: 1;
        font-weight: 400;
        font-style: normal;
        speak: never;
        text-decoration: inherit;
        text-transform: none;
        text-rendering: auto;
        -webkit-animation: nexproperty-spin 2s infinite linear;
        animation: nexproperty-spin 2s infinite linear;
        margin-left: 13px;
        display: inline-block;
    }
        
    @keyframes nexproperty-spin {
        0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
        }
        100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
        }
    }
    </style>';
  }
  add_action('admin_head', 'real_estate_realista_custom_admin_styles');

  
add_filter( 'intermediate_image_sizes_advanced', function( $sizes ){
	if(get_option('real_estate_realista_install_ocdi_images_sizes_enable') == 1) {
		return array();
	}
	return $sizes;
} );

register_block_pattern(
    'my-plugin/hello-world',
    array(
        'title'   => __( 'Hello World', 'real-estate-realista' ),
        'content' => "<!-- wp:paragraph -->\n<p>Hello World</p>\n<!-- /wp:paragraph -->",
    )
);

register_block_style(
    'core/image',
    array(
        'name'  => 'bottom-left',
        'label' => __( 'Bottom Left', 'real-estate-realista' ),
    )
);

add_action('after_setup_theme', function(){
    if(get_option('real_estate_realista_first_theme_activation') === false){
        set_theme_mod( 'footer_powered_by_link', "//wpdirectorykit.com/themes/real-estate-realista.html" );
        set_theme_mod( 'footer_powered_by', esc_html__('Single Property WP Theme','real-estate-realista') );

        add_option('real_estate_realista_first_theme_activation', true, '', false);
    }
});

function custom_tinymce_settings($init) {
    // Disable wpautop
    $init['wpautop'] = false;
    
    // Disable the toolbar
    $init['toolbar'] = false;
    
    return $init;
  }
  
  add_filter('tiny_mce_before_init', 'custom_tinymce_settings');
    
// Add block patterns
require get_stylesheet_directory() . '/blocks/block-patterns.php';
require get_stylesheet_directory() . '/blocks/block-gutenbergs.php';


/*
<div class="rer-block">
    <h2 class="title">Ready for a new address?</h2>
    <p class="text">Get an instant cash offer or list with a local partner agent.</p>
    <div class="actions"><a href="#" class="btn">Get an instant cash offer or list with a local partner agent.</a></div>
</div>
*/
?>