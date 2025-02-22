<?php

function real_estate_realista_ocdi_import_files() {
	$pac_name = 'demo-content_premium.xml';
	update_option('real_estate_realista_install_ocdi_images_sizes_enable', 1);
	if(file_exists(get_stylesheet_directory() . '/includes/ocdi/preview/'.$pac_name)) {
		return [
			[
				'import_file_name'           => 'Real Estate Realista',
				'local_import_file'            =>  get_stylesheet_directory() . '/includes/ocdi/preview/'.$pac_name,
				'import_preview_image_url'   => get_stylesheet_directory_uri() . '/includes/ocdi/preview/preview_estates.jpg',
				'preview_url'                => 'https://demo.wpdirectorykit.com/real-estate-realista',
			]
		];
	} elseif(file_exists(ABSPATH."ocdi/real-estate-realista/".$pac_name)) {
		return [
			[
				'import_file_name'           => 'Real Estate Realista',
				'local_import_file'            => ABSPATH."ocdi/real-estate-realista/".$pac_name,
				'import_preview_image_url'   => get_stylesheet_directory_uri() . '/includes/ocdi/preview/preview_estates.jpg',
				'preview_url'                => 'https://demo.wpdirectorykit.com/real-estate-realista',
			]
		];
	} else {
		return [
			[
				'import_file_name'           => 'Real Estate Realista',
				'import_file_url'            => 'https://wpdirectorykit.com/demo_data/real-estate-realista/'.$pac_name,
				'import_preview_image_url'   => get_stylesheet_directory_uri() . '/includes/ocdi/preview/preview_estates.jpg',
				'preview_url'                => 'https://demo.wpdirectorykit.com/real-estate-realista',
			]
		];
	}

  }

  add_filter( 'ocdi/import_files', 'real_estate_realista_ocdi_import_files' );

  function real_estate_realista_ocdi_register_plugins( $plugins ) {
	$theme_plugins = [
	  [ // A WordPress.org plugin repository example.
		'name'     => 'Elementor', // Name of the plugin.
		'slug'     => 'elementor', // Plugin slug - the same as on WordPress.org plugin repository.
		'required' => true,                     // If the plugin is required or not.
	  ]	
	];
	
	if (file_exists(get_stylesheet_directory() .'/addons/elementinvader.zip')) {
        $theme_plugins[] = [
			'name'     => 'Element Invader',
			'slug'     => 'elementinvader',         // The slug has to match the extracted folder from the zip.
			'required' => true,
			'source'   =>  get_stylesheet_directory() . '/addons/elementinvader.zip',
			'preselected' => true,
        ];
    } else {
		$theme_plugins[] = [
			'name'     => 'Element Invader',
			'slug'     => 'elementinvader',         // The slug has to match the extracted folder from the zip.
			'required' => true,
			'preselected' => true,
        ];
	}

	if (file_exists(get_stylesheet_directory() .'/addons/elementinvader-addons-for-elementor.zip')) {
        $theme_plugins[] = [
			'name'     => 'ElementInvader Addons for Elementor',
			'slug'     => 'elementinvader-addons-for-elementor',         // The slug has to match the extracted folder from the zip.
			'required' => true,
			'source'   =>  get_stylesheet_directory() . '/addons/elementinvader-addons-for-elementor.zip',
			'preselected' => true,
        ];
    } else {
		$theme_plugins[] = [
			'name'     => 'ElementInvader Addons for Elementor',
			'slug'     => 'elementinvader-addons-for-elementor',         // The slug has to match the extracted folder from the zip.
			'required' => true,
			'preselected' => true,
        ];
	}

	if (file_exists(get_stylesheet_directory() .'/addons/wpdirectorykit.zip')) {
        $theme_plugins[] = [
			'name'     => 'WP Directory Kit',
			'slug'     => 'wpdirectorykit',  // The slug has to match the extracted folder from the zip.
			'source'   =>  get_stylesheet_directory() . '/addons/wpdirectorykit.zip',
			'required' => true,
			'preselected' => true,
        ];
    } else {
		$theme_plugins[] = [
			'name'     => 'WP Directory Kit',
			'slug'     => 'wpdirectorykit',  // The slug has to match the extracted folder from the zip.
			'required' => true,
			'preselected' => true,
        ];
	}

    if (file_exists(get_stylesheet_directory() .'/addons/wdk-bookings.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Bookings Addon',
              'slug'     => 'wdk-bookings',         // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-bookings.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	if (file_exists(get_stylesheet_directory() .'/addons/wdk-currency-conversion.zip')) {
		$theme_plugins[] = [
			  'name'     => 'WDK Currency Conversion Addon',
			  'slug'     => 'wdk-currency-conversion',         // The slug has to match the extracted folder from the zip.
			  'source'   =>  get_stylesheet_directory() . '/addons/wdk-currency-conversion.zip',
			  'required' => false,
			  'preselected' => true,
		];
	}
	if (file_exists(get_stylesheet_directory() .'/addons/wdk-favorites.zip')) {
		$theme_plugins[] = [
			  'name'     => 'WDK Favorites Addon',
			  'slug'     => 'wdk-favorites',         // The slug has to match the extracted folder from the zip.
			  'source'   =>  get_stylesheet_directory() . '/addons/wdk-favorites.zip',
			  'required' => false,
			  'preselected' => true,
		];
	}
	if (file_exists(get_stylesheet_directory() .'/addons/wdk-membership.zip')) {
		$theme_plugins[] = [
			  'name'     => 'WDK Membership Addon',
			  'slug'     => 'wdk-membership',         // The slug has to match the extracted folder from the zip.
			  'source'   =>  get_stylesheet_directory() . '/addons/wdk-membership.zip',
			  'required' => false,
			  'preselected' => true,
		];
	}
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-mortgage.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Mortgage Addon',
              'slug'     => 'wdk-mortgage',         // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-mortgage.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-wp-all-import.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Wp All Import',
              'slug'     => 'wdk-wp-all-import',         // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-wp-all-import.zip',
              'required' => false,
              'preselected' => false,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/profile-picture-uploader.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Profile picture uploader',
              'slug'     => 'profile-picture-uploader',         // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/profile-picture-uploader.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-reviews.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Reviews',
              'slug'     => 'wdk-reviews',         // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-reviews.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/sweet-energy-efficiency.zip')) {
        $theme_plugins[] = [
              'name'     => 'Sweet Energy Efficiency',
              'slug'     => 'sweet-energy-efficiency',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/sweet-energy-efficiency.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-report-abuse.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Report Abuse',
              'slug'     => 'wdk-report-abuse',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-report-abuse.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-facebook-comments.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Facebook Comments',
              'slug'     => 'wdk-facebook-comments',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-facebook-comments.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-mailchimp.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Mailchimp',
              'slug'     => 'wdk-mailchimp',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-mailchimp.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-compare-listing.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Compare listing',
              'slug'     => 'wdk-compare-listing',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-compare-listing.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-save-search.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Save Search',
              'slug'     => 'wdk-save-search',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-save-search.zip',
              'required' => false,
              'preselected' => true,
        ];
    }

	if (file_exists(get_stylesheet_directory() .'/addons/wdk-pdf-export.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK PDF Download',
              'slug'     => 'wdk-pdf-export',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-pdf-export.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-listing-claim.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Claim / Take Ownership',
              'slug'     => 'wdk-listing-claim',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-listing-claim.zip',
              'required' => false,
              'preselected' => true,
        ];
    }

    if (file_exists(get_stylesheet_directory() .'/addons/wdk-duplicate-listing.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Duplicate Listing',
              'slug'     => 'wdk-duplicate-listing',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-duplicate-listing.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
		
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-geo.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Geo',
              'slug'     => 'wdk-geo',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-geo.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
		
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-svg-map.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK SVG Maps',
              'slug'     => 'wdk-svg-map',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-svg-map.zip',
              'required' => false,
              'preselected' => true,
        ];
    }
		
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-api.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK API',
              'slug'     => 'wdk-api',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-api.zip',
              'required' => false,
              'preselected' => false,
        ];
    }
    		
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-messages-chat.zip')) {
        $theme_plugins[] = [
              'name'     => 'WDK Live Chat',
              'slug'     => 'wdk-messages-chat',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-messages-chat.zip',
              'required' => false,
              'preselected' => true,
        ];
    }

    if (file_exists(get_stylesheet_directory() .'/addons/wdk-membership.zip')) {
        $theme_plugins[] = [
            'name'     => 'WooCommerce',
            'slug'     => 'woocommerce',  // The slug has to match the extracted folder from the zip.
            'required' => false,
            'preselected' => true,
        ];
	}

	return array_merge( $plugins, $theme_plugins );
  }
  add_filter( 'ocdi/register_plugins', 'real_estate_realista_ocdi_register_plugins' );

 /* after import */
function real_estate_realista_ocdi_after_import_setup($selected_import) {

	$main_menu = get_term_by( 'Menu 1', 'Main Menu', 'nav_menu', 'Menu 1' );

	if(!$main_menu) {
		$main_menu = wp_get_nav_menu_object("Menu 1" );
		set_theme_mod( 'nav_menu_locations', array(
			'main-menu' => $main_menu->term_id,
			'main_menu' => $main_menu->term_id,
		));
	}

    // Assign front page and posts page (blog page).
    if(!function_exists('wdk_page_by_title')) {
        return false;
    }

    // Assign front page and posts page (blog page).
    $front_page_id = wdk_page_by_title( 'Home Page' );
    $listing_page_id  = wdk_page_by_title( 'Listing Preview' );
    $results_page_id  = wdk_page_by_title( 'Results' ); 
    $page_for_posts_id = wdk_page_by_title( 'Blog' );
    $home_alt_page = wdk_page_by_title( 'Home Alt' );
    $quick_submission = wdk_page_by_title( 'Quick Submission' );
 
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $page_for_posts_id->ID );
	
	if($listing_page_id)
		update_option( 'wdk_listing_page', $listing_page_id->ID, TRUE);
	
	if($results_page_id)
		update_option( 'wdk_results_page', $results_page_id->ID, TRUE);
	
	if($quick_submission) {
		update_option( 'wdk_membership_quicksumbission_page', $quick_submission->ID, TRUE);
        set_theme_mod( 'property_button_link', get_permalink($quick_submission->ID) );
    }

    update_option( 'wdk_experimental_features', 1);
    update_option( 'wdk_experimental_search_popup', 1);

	/* remove default post */
		
	$post_default= wdk_page_by_title('Hello world!', OBJECT, 'post');
	if($post_default)
		wp_delete_post(  $post_default->ID, true );

	/* import wdk content */
	$WMVC = &wdk_get_instance();

	$WMVC->load_controller('wdk_settings','_api_import');

	/* udpate posts */	
	$posts = get_posts( array(
		'numberposts'=> 5,
		'orderby'   => 'id',
		'order'      => 'ASC',
		'post_type'  => 'post',
	));

	$date = date('Y-m-d H:i:s');
	foreach($posts as $post) {
		$post_udpate = array();
		$post_udpate['ID'] = $post->ID;
		$post_udpate['post_date'] = $date;
		$post_udpate['post_date_gmt'] = $date;
		$post_udpate['post_modified'] = $date;
		$post_udpate['post_modified_gmt'] = $date;
		wp_update_post($post_udpate );
	}

	/* replace content links in footer menu */
	if ( true) {
		if($results_page_id) {
			$from = get_home_url().'/grid-map/?is_featured=on#results';
			$to = real_estate_realista_url_suffix(get_permalink($results_page_id), 'is_featured=on#results');
			real_estate_realista_replace_links($from, $to);
		}
		
        $page = wdk_page_by_title( 'Blog Grid' );
		if($page) {
			$from = 'pagelink_custom_blog';
			$to = get_permalink($page);
			real_estate_realista_replace_links($from, $to);
		}

		if($home_alt_page) {
			$from = get_home_url().'/home-alt/';
			$to = get_permalink($home_alt_page);
			real_estate_realista_replace_links($from, $to);
		}
		if($results_page_id) {

            
			$from = get_home_url().'/grid-map/?field_5=Sale#results';
			$to = real_estate_realista_url_suffix(get_permalink($results_page_id), 'field_5=Sale#results');
			real_estate_realista_replace_links($from, $to);
            
			$from = 'pagelink_custom_results';
			$to = real_estate_realista_url_suffix(get_permalink($results_page_id));
			real_estate_realista_replace_links($from, $to);
		}
        
		if($quick_submission) {
			$from = 'pagelink_custom_quick_submit';
			$to = real_estate_realista_url_suffix(get_permalink($quick_submission));
			real_estate_realista_replace_links($from, $to);
		}
                
        $page = wdk_page_by_title( 'Contact' );
		if($page) {
			$from = 'pagelink_custom_contact_page';
			$to = real_estate_realista_url_suffix(get_permalink($page));
			real_estate_realista_replace_links($from, $to);
		}
                
        $page = wdk_page_by_title( 'Profiles' );
		if($page) {
			$from = 'pagelink_custom_agents_page';
			$to = real_estate_realista_url_suffix(get_permalink($page));
			real_estate_realista_replace_links($from, $to);
		}
                
        $page = wdk_page_by_title( 'Featured Property', OBJECT, 'post');
		if($page) {
			$from = 'pagelink_custom_preview_post_1';
			$to = real_estate_realista_url_suffix(get_permalink($page));
			real_estate_realista_replace_links($from, $to);
		}
                
        $page = wdk_page_by_title( 'How To Get Lips Lipstick Ready', OBJECT, 'post');
		if($page) {
			$from = 'pagelink_custom_preview_post_2';
			$to = real_estate_realista_url_suffix(get_permalink($page));
			real_estate_realista_replace_links($from, $to);
		}
                
        $page = wdk_page_by_title( 'When it all Just Works', OBJECT, 'post');
		if($page) {
			$from = 'pagelink_custom_preview_post_3';
			$to = real_estate_realista_url_suffix(get_permalink($page));
			real_estate_realista_replace_links($from, $to);
		}
                
        $page = wdk_page_by_title( 'The Effortless Australian Label', OBJECT, 'post');
		if($page) {
			$from = 'pagelink_custom_preview_post_4';
			$to = real_estate_realista_url_suffix(get_permalink($page));
			real_estate_realista_replace_links($from, $to);
		}
            
        $from = 'pagelink_custom_login';
        $to = get_admin_url();
        real_estate_realista_replace_links($from, $to);

        $from = 'pagelink_custom_register';
        $to = get_admin_url();
        if(get_option('wdk_membership_register_page')){
            $to = get_permalink(get_option('wdk_membership_register_page'));
        }
        real_estate_realista_replace_links($from, $to);
    }

	/* Replace Links */
	/* login */
		
	$from = 'https://www.wpdirectorykit.com/nexproperty/wp-admin/admin.php?page=wdk_listing';
	$to = get_admin_url();
	real_estate_realista_replace_links($from, $to);

	$from = 'https://www.wpdirectorykit.com/nexproperty/wp-admin/';
	$to = get_admin_url();
	real_estate_realista_replace_links($from, $to);

	$from = 'https://www.wpdirectorykit.com/nexproperty/index.php/login/';
	$to = get_admin_url();
	real_estate_realista_replace_links($from, $to);
	
	$from = 'https://www.wpdirectorykit.com/nexproperty';
	$to = get_home_url();
	real_estate_realista_replace_links($from, $to);
	
	/* homepage */
	$from = 'home_page_link_replace';
	$to = get_home_url();
	real_estate_realista_replace_links($from, $to);
	
	/* homepage */
	$from = '2020';
	$to = date('Y');
	real_estate_realista_replace_links($from, $to);
	$from = '2021';
	real_estate_realista_replace_links($from, $to);
	
	/* wdk_listing_preview_feature_category */
	$from = 'wdk_listing_preview_feature_category';
	$to = 26;
	real_estate_realista_replace_links($from, $to);

	/* custom_logo */
	if(function_exists('wmvc_add_wp_image')) {
		$custom_logo_id = wmvc_add_wp_image(get_stylesheet_directory() .'/assets/images/logo.png');
		set_theme_mod( 'custom_logo', $custom_logo_id );

    	set_theme_mod( 'footer_logo', get_stylesheet_directory_uri() .'/assets/images/footer_logo.png');
				
		$custom_logo_id = wmvc_add_wp_image(get_stylesheet_directory() .'/assets/images/fav.jpg');
		update_option( 'site_icon', $custom_logo_id );
	}

	set_theme_mod( 'footer_content', esc_html__('80 Broklyn Golden Street, New York. USA', 'real-estate-realista') );
	set_theme_mod( 'footer_phone_number', '(917) 382-2057' );
	set_theme_mod( 'footer_email_address', 'needhelp@example.com' );
	set_theme_mod( 'footer_copyright_text', 'Copyright © '.date('Y').' Real Estate Realista' );
	set_theme_mod( 'show_blog_in_grid', true );

	/* sidebar */
	if(true){
		/* clear */
		$sidebars_widgets = get_option( 'sidebars_widgets' );
		$sidebars_widgets['sidebar-1'] = array();
		update_option('sidebars_widgets', $sidebars_widgets); //update sidebars
		
        real_estate_realista_insert_widget('sidebar-1', 'text', array('title' => esc_html__('About Us', 'real-estate-realista'), 'text'=>'<div class="wp-block-my-custom-block-my-block rer-block"><h2 class="title">'.esc_html__('Ready for a new address?', 'real-estate-realista').'</h2><p class="text">'.esc_html__('Get an instant cash offer or list with a local partner agent', 'real-estate-realista').'</p><div class="actions"><a class="btn">'.esc_html__('Explore selling options', 'real-estate-realista').'</a></div></div>'));

		/* clear */
		$sidebars_widgets = get_option( 'sidebars_widgets' );
		$sidebars_widgets['sidebar'] = array();
		update_option('sidebars_widgets', $sidebars_widgets); //update sidebars
		
        real_estate_realista_insert_widget('sidebar', 'text', array('title' => esc_html__('About Us', 'real-estate-realista'), 'text'=>'<div class="wp-block-my-custom-block-my-block rer-block"><h2 class="title">'.esc_html__('Ready for a new address?', 'real-estate-realista').'</h2><p class="text">'.esc_html__('Get an instant cash offer or list with a local partner agent', 'real-estate-realista').'</p><div class="actions"><a class="btn">'.esc_html__('Explore selling options', 'real-estate-realista').'</a></div></div>'));


		/*real_estate_realista_insert_widget('sidebar', 'search');
		real_estate_realista_insert_widget('sidebar', 'recent-posts');
		real_estate_realista_insert_widget('sidebar', 'categories');*/

		/* clear */
		$sidebars_widgets = get_option( 'sidebars_widgets' );
		$sidebars_widgets['footer'] = array();
		update_option('sidebars_widgets', $sidebars_widgets); //update sidebars
		
		
		real_estate_realista_insert_widget('footer', 'text', array('title' => esc_html__('About Us', 'real-estate-realista'), 'text'=>'<ul class="elementor-icon-list-items">
                                                                <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                Homes for sale
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                For sale by owner
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                New construction
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                Coming soon
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                Recent home sales
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                All homes
                                                                                </a>
                                                                        </li>
                                                            </ul>'));
		
		real_estate_realista_insert_widget('footer', 'text', array('title' => esc_html__('Help', 'real-estate-realista'), 'text'=>'<ul class="elementor-icon-list-items">
                                                                <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                Renters Guide
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                Home Estimate
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                Learning Center
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                Help Center
                                                                                </a>
                                                                        </li>
                                                            </ul>'));

		real_estate_realista_insert_widget('footer', 'text', array('title' => esc_html__('Home Loans', 'real-estate-realista'), 'text'=>'<ul class="elementor-icon-list-items">
                                                                <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                Featured Property
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                How To Get Lips Lipstick Ready
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                When it all Just Works
                                                                                </a>
                                                                        </li>
                                                                    <li class="elementor-icon-list-item">
                                                                                <a href="#">
                                                                                The Effortless Australian Label
                                                                                </a>
                                                                        </li>
                                                            </ul>'));
                                                                                

        real_estate_realista_insert_widget('footer', 'text', array('title' => esc_html__('On your mobile or tablet', 'real-estate-realista'), 'text'=>'<ul class="footer-list-items">
                                                                                <li class="list-item">
                                                                        <a href="tel:(917) 382-2057">
                                                                        <i class="fas fa-phone"></i>
                                                                        (917) 382-2057								</a>
                                                                        </li>
                                                                        <li class="list-item">
                                                                        <a href="mailto:agent@example.com">
                                                                        <i class="fas fa-envelope"></i>
                                                                        agent@example.com								
                                                                        </a>
                                                                        </ul>'));
	}

	/* header buttons */
	if(true){
		set_theme_mod('show_sign_in_button','yes');
		set_theme_mod('show_property_button','yes');
		set_theme_mod('social_icon_enable','yes');
		set_theme_mod('sign_in_button_text', esc_html__('Login', 'real-estate-realista'));
        set_theme_mod('property_button_text', esc_html__('Add Listing', 'real-estate-realista'));
	}
	update_option('real_estate_realista_install_ocdi_images_sizes_enable', 0);

    // Save searchform_m
    $data = array();
    $data['resultitem_name'] = 'Primary';
    $data['idresultitem'] = 1; 
    $data['is_multiline_enabled'] = 0; 
    $WMVC->model('resultitem_m');
    $WMVC->model('field_m');
    $insert_id = $WMVC->resultitem_m->insert($data, 1);

    /* add section */
    $data = array(
        'field_type' => 'INPUTBOX',
        'field_label' => esc_html__('Check In', 'real-estate-realista'),
        'is_visible_frontend' => '1',
        'is_visible_dashboard' => '1', 
        'order_index' =>  64,
    );
    $insert_id = $WMVC->field_m->insert($data, NULL);
    // check if column exists, add if nto exists
    if(!empty($insert_id))
      $WMVC->listingfield_m->create_table_column($data, $insert_id);

    $data = array(
        'field_type' => 'INPUTBOX',
        'field_label' => esc_html__('Check Out', 'real-estate-realista'),
        'is_visible_frontend' => '1',
        'is_visible_dashboard' => '1', 
        'order_index' =>  64,
    );
    $insert_id = $WMVC->field_m->insert($data, NULL);
    // check if column exists, add if nto exists
    if(!empty($insert_id))
      $WMVC->listingfield_m->create_table_column($data, $insert_id);

    $data = array(
        'field_type' => 'TEXTAREA_WYSIWYG',
        'field_label' => esc_html__('About Unit', 'real-estate-realista'),
        'is_visible_frontend' => '1',
        'is_visible_dashboard' => '1', 
        'order_index' =>  2,
    );
    $insert_id = $WMVC->field_m->insert($data, NULL);  

    // check if column exists, add if nto exists
    if(!empty($insert_id))
      $WMVC->listingfield_m->create_table_column($data, $insert_id);

      
    $text = "Lorem ipsum dolor sit amet, ut quis omnis dissentiet nam, eu esse sensibus mel, accumsan voluptaria cu vel. 
    At eos sint fuisset invenire. Assum saepe equidem nam no, ad phaedrum petentium scriptorem quo. Erant impedit eum ea. 
    Vim no vidisse aperiam. Summo luptatum duo ne, sea ut quas prima. Mollis bonorum ornatus his in. Est lorem apeirian ei, solet noluisse mnesarchum an pro. 
    Ex vel hinc primis vituperata. Ne per persius copiosae.Lorem ipsum dolor sit amet, ut quis omnis dissentiet nam, eu esse sensibus mel, 
    accumsan voluptaria cu vel. At eos sint fuisset invenire. Assum saepe equidem nam no, ad phaedrum petentium scriptorem quo. Ne per persius copiosae.";
    $WMVC->db->query(
    "UPDATE {$WMVC->listingfield_m->_table_name} SET field_67_TEXTAREA_WYSIWYG = '{$text}';"
    );

    /* icons for fields */
    $field_icon = wmvc_add_wp_image(get_stylesheet_directory() .'/elementor-data/wpdirectorykit/fields/listing_preview_icon_garage.png');
    if(!empty($field_icon))
        $WMVC->field_m->insert(array('icon_id'=>$field_icon), 15);

    $field_icon = wmvc_add_wp_image(get_stylesheet_directory() .'/elementor-data/wpdirectorykit/fields/listing_preview_icon_house.png');
    if(!empty($field_icon))
        $WMVC->field_m->insert(array('icon_id'=>$field_icon), 5);

    $field_icon = wmvc_add_wp_image(get_stylesheet_directory() .'/elementor-data/wpdirectorykit/fields/listing_preview_icon_pool.png');
    if(!empty($field_icon))
        $WMVC->field_m->insert(array('icon_id'=>$field_icon), 9);

    $field_icon = wmvc_add_wp_image(get_stylesheet_directory() .'/elementor-data/wpdirectorykit/fields/listing_preview_icon_size.png');
    if(!empty($field_icon))
        $WMVC->field_m->insert(array('icon_id'=>$field_icon), 8);

    $field_icon = wmvc_add_wp_image(get_stylesheet_directory() .'/elementor-data/wpdirectorykit/fields/listing_preview_icon_visitors.png');
    if(!empty($field_icon))
        $WMVC->field_m->insert(array('icon_id'=>$field_icon), 64);

    $field_icon = wmvc_add_wp_image(get_stylesheet_directory() .'/elementor-data/wpdirectorykit/fields/listing_preview_icon_wife.png');
    if(!empty($field_icon))
        $WMVC->field_m->insert(array('icon_id'=>$field_icon), 38);


    /* disable elmentor experement feature */
    update_option( 'elementor_experiment-landing-pages', 'inactive' );
    update_option( 'elementor_experiment-e_dom_optimization', 'inactive' );
    update_option('wdk_theme_real_estate_realista_installed', 1);
}

function real_estate_realista_replace_links($from = '', $to = '') {
	global $wpdb;
	// @codingStandardsIgnoreStart cannot use `$wpdb->prepare` because it remove's the backslashes
	$rows_affected = $wpdb->query(
		"UPDATE {$wpdb->postmeta} " .
		"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
		"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );
	/* end login */
}

add_action( 'ocdi/after_import', 'real_estate_realista_ocdi_after_import_setup' );

if(!function_exists('real_estate_realista_insert_widget'))
{
    function real_estate_realista_insert_widget($sidebar_id, $widget_name, $widget_options_new = array())
    {
        static $sidebar_cleared = array();
        
        static $widgets_array = array();
        $id = 1;
        
        if(isset($widgets_array[$widget_name])) {
            $widgets_array[$widget_name]++;
            $id = $widgets_array[$widget_name];
        } else {
            $widgets_array[$widget_name] = $id;
        }
        
        $sidebars_widgets = get_option( 'sidebars_widgets' );
        /* set teme mod */ 
        
        $widget_options = get_option('widget_'.$widget_name);
        if(empty($widget_options)) {
			$widget_options = array('_multiwidget'=>1);
		}
        $widget_options[$id] = array('title'=>'');
        
        $widget_options[$id] = $widget_options_new;
        
        
        // [Check and skip import if found]
        $skip_widget_import = false;
        if(isset($sidebars_widgets[$sidebar_id]))
        foreach($sidebars_widgets[$sidebar_id] as $val)
        {
            if(strpos($val, $widget_name) !== false)
                $skip_widget_import = true;
        }
        if(false && $skip_widget_import)
        {
            return FALSE;
        }
        // [/Check and skip import if found]

        if(isset($sidebars_widgets[$sidebar_id]) && !in_array($widget_name.'-'.$id, $sidebars_widgets[$sidebar_id])) { //check if sidebar exists and it is empty
            
            if(empty($sidebars_widgets[$sidebar_id]))
            {
                $sidebars_widgets[$sidebar_id] = array($widget_name.'-'.$id); //add a widget to sidebar
            }
            else
            {
                $sidebars_widgets[$sidebar_id][] = $widget_name.'-'.$id;
            }

            update_option('widget_'.$widget_name, $widget_options); //update widget default options
            update_option('sidebars_widgets', $sidebars_widgets); //update sidebars
        }
        else // if sidebar doesn't exists'
        {
            $sidebars_widgets[$sidebar_id] = array($widget_name.'-'.$id); //add a widget to sidebar
            $sidebars_widgets[$sidebar_id][] = $widget_name.'-'.$id;

            update_option('widget_'.$widget_name, $widget_options); //update widget default options
            update_option('sidebars_widgets', $sidebars_widgets); //update sidebars
        }

        
        return TRUE;
    }
}


if ( ! function_exists('real_estate_realista_url_suffix'))
{
	function real_estate_realista_url_suffix($base_url, $extension_url="")
	{
        if(strpos($base_url,'?') !== FALSE){
            $base_url .='&';
        } else {
            $base_url .='?';
        }
        return  $base_url.$extension_url;
	}
}


add_shortcode ('real_estate_realista_languages_switcher', function () {
    $langs = real_estate_realista_get_languages();
    $output = '';
    if ( $langs ) {
        ?>
        <div class="lang-manu dropdown">
            <button class="btn btn-secondary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span><?php echo real_estate_realista_current_language(); ?></span>
                <i aria-hidden="true" class="fas fa-caret-down"></i>
            </button>
            <ul class="dropdown-menu">
                <?php foreach ($langs as $lang): if ($lang['lang_code'] == real_estate_realista_current_language()) continue; ?>
                <li>
                    <a data-no-translation href="<?php echo esc_url( $lang['url'] );?>" data-no-translation><img src="<?php echo esc_url( $lang['icon']);?>" alt="<?php echo esc_html( $lang['lang_code']);?>"> <?php echo esc_html( $lang['title'] );?> </a>
                </li>
               <?php endforeach; ?>
            </ul>
        </div>
    <?php
    }
    return $output;
});



if (!function_exists('real_estate_realista_get_languages')) {

    function real_estate_realista_get_languages($lang_code_id = NULL)
    {

        $lang_pattern = array('title' => '', 'lang_code' => '', 'id' => '', 'icon' => '', 'url'=>'');

        $langauges = array();

        //$langauges[1] = array('title' => get_bloginfo("language"), 'lang_code' => 'en', 'id' => 1, 'icon' => '', 'url'=>'');
        //$langauges[2] = array('title'=>__('Croatian', 'real_estate_realista_win'), 'lang_code'=>'hr', 'id'=>2);
        // [qTranslate X]
        if (function_exists('qtranxf_getSortedLanguages')) {
            global $q_config;

            // for wp all import, must be tested
            if (real_estate_realista_count($q_config) == 0) {
                //error_reporting(0);
                //qtranxf_init_language();
            }

            $all_langs = qtranxf_getSortedLanguages();

            if (real_estate_realista_count($all_langs) > 0) {
                $langauges = array();

                foreach (qtranxf_getSortedLanguages() as $key => $lang_code) {
                    $langauges[$key + 1] = array_merge(
                        $lang_pattern, 
                        array(
                            'title' => $q_config['language_name'][$lang_code], 
                            'lang_code' => $lang_code, 
                            'id' => $key + 1,
                            'icon' => '',
                            'url' => real_estate_realista_get_language_url($lang_code),
                    ));
                }
            }
        } else {
        }
        // [/qTranslate X]

        // [WPML]
        if (function_exists('icl_get_languages')) {
            $langauges = array();
            $wpml_langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');

            $k = 0;
            foreach ($wpml_langs as $key => $lang_data) {
                $k++;

                $langauges[$k] = array_merge(
                    $lang_pattern, 
                    array(
                        'title' => $lang_data['translated_name'], 
                        'lang_code' => $lang_data['code'], 
                        'id' => $k,
                        'icon' => '',
                        'url' => real_estate_realista_get_language_url($lang_data['code']),
                ));
            }
        }

        // WPML 4
        // Also used for polylang, required activated "WPML compatibility mode of Polylang"
        elseif (has_filter('wpml_active_languages')) {
          
            $wpml_langs = array();
            if (function_exists('PLL') && null !== PLL()) {
                if (isset(PLL()->links))
                    $wpml_langs = apply_filters('wpml_active_languages', NULL);
            } else {
                $wpml_langs = apply_filters('wpml_active_languages', NULL);
            }

            if (empty($wpml_langs))
                $wpml_langs = get_query_var('lang', 'all');


            $k = 0;
            if (real_estate_realista_count($wpml_langs) && !is_string($wpml_langs)) {
                $langauges = array(); // for polylang, WPML don't need that because of strange 
                // default language mechanism in polylang

                foreach ($wpml_langs as $key => $lang_data) {
                    $k++;

                    // for polylang
                    if (!isset($lang_data['code']) && isset($lang_data['language_code']))
                        $lang_data['code'] = $lang_data['language_code'];

                    if (empty($lang_data['translated_name']) && !empty($lang_data['native_name']))
                        $lang_data['translated_name'] = $lang_data['native_name'];
                    // for polylang, end

                    $langauges[$lang_data['id']] = array_merge(
                        $lang_pattern, 
                        array('title' => $lang_data['translated_name'], 
                        'lang_code' => $lang_data['code'], 
                        'id' => $lang_data['id'],
                        'icon' => '',
                        'url' => real_estate_realista_get_language_url($lang_data['code']),
                    ));
                }
            }
        }

        // [/WPML]
       // dump(wp_get_availreal_estate_realista_translations());
        if(function_exists('trp_get_languages')) {
            $langauges = array();
            foreach (trp_get_languages() as $key => $lang_name) {
                $langauges[$lang_data['id']] = array_merge(
                    $lang_pattern, 
                    array('title' => $lang_name, 
                    'lang_code' => $key, 
                    'id' => $key,
                    'icon' =>  '',
                    'url' => real_estate_realista_get_language_url($key),
                    )
                );
            }
        }
        
       // dump(wp_get_availreal_estate_realista_translations());
        if(function_exists('trp_custom_language_switcher')) {
            $k = 1;
            $langauges = array();
            foreach (trp_custom_language_switcher() as $key => $lang_data) {
                $langauges[$k] = array_merge(
                    $lang_pattern, 
                    array(
                    'title' => $lang_data['language_name'], 
                    'lang_code' => $lang_data['language_code'], 
                    'id' => $k++,
                    'icon' => $lang_data['flag_link'],
                    'url' =>  $lang_data['current_page_url'],
                    )
                );
            }
        }

        if (!empty($lang_code_id)) {
            if (is_numeric($lang_code_id)) {
                foreach ($langauges as $lang) {
                    if ($lang['id'] == $lang_code_id) {
                        return $lang['lang_code'];
                    }
                }
            } else {
                foreach ($langauges as $lang) {
                    if ($lang['lang_code'] == $lang_code_id) {
                        return $lang['id'];
                    }
                }
            }

            return FALSE;
        }

        return $langauges;
    }
}

if (!function_exists('real_estate_realista_default_language')) {

    function real_estate_realista_default_language()
    {
        // [qTranslate X]
        if (function_exists('qtranxf_getLanguage')) {
            return qtranxf_getLanguageDefault();
        }
        // [/qTranslate X]

        // [WPML]
        if (function_exists('icl_get_languages')) {
            $langauges = array();
            $wpml_langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
            foreach ($wpml_langs as $key => $lang_data) {
                if ($lang_data['major'] == 1)
                    return $lang_data['code'];
            }
        }

        // WPML 4

        elseif (has_filter('wpml_default_language')) {
            $langauges = array();
            $wpml_langs = apply_filters('wpml_default_language', NULL);

            return $wpml_langs;
        }

        // [/WPML]

        return 'en';
    }
}

if (!function_exists('real_estate_realista_current_language')) {

    function real_estate_realista_current_language()
    {

        if(function_exists('trp_get_languages')) {
            global $TRP_LANGUAGE, $TRP_LANGUAGE_COPY, $TRP_LANGUAGE_ORIGINAL;
            $trp           = TRP_Translate_Press::get_trp_instance();
            $trp_languages = $trp->get_component( 'languages' );
            $trp_settings  = $trp->get_component( 'settings' );
            $settings      = $trp_settings->get_settings();
        
            $languages_to_display  = $settings['publish-languages'];
            $translation_languages = $trp_languages->get_language_names( $languages_to_display );
            if(isset($translation_languages[$TRP_LANGUAGE])) {
                return $translation_languages[$TRP_LANGUAGE];
            }
        }

        // [qTranslate X]
        if (function_exists('qtranxf_getLanguage')) {
          //  return qtranxf_getLanguage();
        }

        // [WPML]
        if (function_exists('icl_get_languages')) {
            $langauges = array();
            $wpml_langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
            foreach ($wpml_langs as $key => $lang_data) {
                if ($lang_data['active'] == 1)
                    return $lang_data['code'];
            }
        }

        // WPML 4

        elseif (has_filter('wpml_current_language')) {
            $langauges = array();
            $wpml_langs = apply_filters('wpml_current_language', NULL); // returning only lang code

            if ($wpml_langs !== FALSE)
                return $wpml_langs;
        }

        // [/WPML]

        return 'en';
    }
}

if (!function_exists('real_estate_realista_current_language_id')) {

    function real_estate_realista_current_language_id()
    {
        $lang_id = real_estate_realista_get_languages(real_estate_realista_current_language());

        if (is_numeric($lang_id)) return $lang_id;

        return real_estate_realista_default_language_id();
    }
}

if (!function_exists('real_estate_realista_default_language_id')) {
    function real_estate_realista_default_language_id()
    {
        $lang_id = real_estate_realista_get_languages(real_estate_realista_default_language());

        if (is_numeric($lang_id)) return $lang_id;

        return '1';
    }
}

if (!function_exists('real_estate_realista_get_language_name')) {
    function real_estate_realista_get_language_name($id_or_code)
    {
        $langs = real_estate_realista_get_languages();

        foreach ($langs as $lang) {
            if ($lang['lang_code'] == $id_or_code || $lang['id'] == $id_or_code) {
                return $lang['title'];
            }
        }

        return '';
    }
}


if (!function_exists('real_estate_realista_get_language_url')) {

    function real_estate_realista_get_language_url($lang_code)
    {
        // [qTranslate X]
        if (function_exists('qtranxf_convertURL')) {
            return qtranxf_convertURL('', $lang_code, false, true);
        }
        // [/qTranslate X]

        // [WPML]
        if (function_exists('icl_get_languages')) {
            $langauges = array();
            $wpml_langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');

            foreach ($wpml_langs as $key => $lang_data) {
                if ($lang_data['code'] == $lang_code)
                    return $lang_data['url'];
            }
        }

        // WPML 4

        elseif (has_filter('wpml_active_languages')) {
            $langauges = array();
            $wpml_langs = apply_filters('wpml_active_languages', NULL);

            foreach ($wpml_langs as $key => $lang_data) {
                // for polylang
                if (!isset($lang_data['code']) && isset($lang_data['language_code']))
                    $lang_data['code'] = $lang_data['language_code'];
                if (empty($lang_data['translated_name']) && !empty($lang_data['native_name']))
                    $lang_data['translated_name'] = $lang_data['native_name'];
                // for polylang, end

                $url = real_estate_realista_wpml_ls_language_url($lang_data['url'], $lang_data);
                $lang_data['url'] = $url;

                if ($lang_data['code'] == $lang_code)
                    return $url;
            }
        }

        // [/WPML]

    }
}

function real_estate_realista_set_user_default_language($user_id = NULL)
{
    //use region from meta, to always use the same region

    if (is_null($user_id))
        $user_id = get_current_user_id();

    $get_language = get_user_meta($user_id, 'user_language', true);

    if (!$get_language) {
        // [WPML]
        // Switch the language
        if (function_exists('icl_get_languages') || has_filter('wpml_active_languages')) {
            do_action('wpml_switch_language', $get_language);
        }
        // [/WPML]
    }
}

function real_estate_realista_set_language($lang_code = NULL)
{
    //use region from meta, to always use the same region

    if (!is_null($lang_code)) {
        // [WPML]
        if (function_exists('icl_get_languages') || has_filter('wpml_active_languages')) {
            do_action('wpml_switch_language', $lang_code);
        }
        // [/WPML]
    }
}


if (!function_exists('real_estate_realista_count')) {
    function real_estate_realista_count($mixed = '')
    {
        $count = 0;

        if (!empty($mixed) && (is_array($mixed))) {
            $count = count($mixed);
        } else if (!empty($mixed) && function_exists('is_countable') && version_compare(PHP_VERSION, '7.3', '<') && is_countable($mixed)) {
            $count = count($mixed);
        } else if (!empty($mixed) && is_object($mixed)) {
            $count = 1;
        }
        return $count;
    }
}


function real_estate_realista_remove_querystring_var($url, $key)
{
    $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);
    return $url;
}


function real_estate_realista_wpml_ls_language_url($arg1, $data)
{

    global $wpdb, $wp_rewrite, $sitepress, $sitepress_settings;

    //$sitepress_settings = array(); big error, wpml will stop working
    if (is_object($sitepress))
        $sitepress_settings = $sitepress->get_settings();

    return $arg1;
}

add_filter('wpml_ls_language_url', 'real_estate_realista_wpml_ls_language_url', 10, 3);

function real_estate_realista_is_page($page_id)
{
    if (empty($page_id)) return false;

    // [WPML]
    if (function_exists('icl_object_id')) {
        $page_id = apply_filters('wpml_object_id', intval($page_id), 'page', TRUE, NULL);
    }
    // [/WPML]

    return is_page($page_id);
}

add_action('admin_head', function () {
    ?>
        <style>
            /* Your custom CSS here */
            #setting-error-wpdirectorykit {
                display: none !important;
            }
        </style>
        <?php
    });