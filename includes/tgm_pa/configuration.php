<?php
/**
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme real-estate-realista
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_stylesheet_directory() . '/includes/tgm_pa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'real_estate_realista_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function real_estate_realista_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'               => 'Elementor', // The plugin name.
			'slug'               => 'elementor', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '3.12.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Element Invader', // The plugin name.
			'slug'               => 'elementinvader', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.2.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'One Click Demo Import', // The plugin name.
			'slug'               => 'one-click-demo-import', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '3.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
	);

	if(file_exists( get_stylesheet_directory() .'/addons/elementinvader-addons-for-elementor.zip')) {
		$plugins [] = array(
			'name'               => 'ElementInvader Add-ons for Elementor', // The plugin name.
			'slug'               => 'elementinvader-addons-for-elementor', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/elementinvader-addons-for-elementor.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}
    else
    {
        $plugins [] = array(
			'name'               => 'ElementInvader Addons for Elementor', // The plugin name.
			'slug'               => 'elementinvader-addons-for-elementor', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
    }

	if(file_exists( get_stylesheet_directory() .'/addons/wpdirectorykit.zip')) {
		$plugins [] = array(
			'name'               => 'WP Directory Kit', // The plugin name.
			'slug'               => 'wpdirectorykit', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wpdirectorykit.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}
    else
    {
        $plugins [] = array(
			'name'               => 'WP Directory Kit', // The plugin name.
			'slug'               => 'wpdirectorykit', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
    }

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-bookings.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Bookings Addon', // The plugin name.
			'slug'               => 'wdk-bookings', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-bookings.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-currency-conversion.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Currency Conversion Addon', // The plugin name.
			'slug'               => 'wdk-currency-conversion', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-currency-conversion.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}
	
	if(file_exists( get_stylesheet_directory() .'/addons/wdk-favorites.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Favorites Addon', // The plugin name.
			'slug'               => 'wdk-favorites', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-favorites.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}
	if(file_exists( get_stylesheet_directory() .'/addons/wdk-membership.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Membership Addon', // The plugin name.
			'slug'               => 'wdk-membership', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-membership.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}
	if(file_exists( get_stylesheet_directory() .'/addons/wdk-mortgage.zip')) {
		$plugins [] = array(
			
			'name'               => 'WDK Mortgage Addon', // The plugin name.
			'slug'               => 'wdk-mortgage', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-mortgage.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-wp-all-import.zip')) {
		$plugins [] = array(
			
			'name'               => 'WDK Wp All Import', // The plugin name.
			'slug'               => 'wdk-wp-all-import', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-wp-all-import.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'has_notices'  => false,  
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/profile-picture-uploader.zip')) {
		$plugins [] = array(
			
			'name'               => 'WDK Profile picture uploader', // The plugin name.
			'slug'               => 'profile-picture-uploader', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/profile-picture-uploader.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-reviews.zip')) {
		$plugins [] = array(
			
			'name'               => 'WDK Reviews', // The plugin name.
			'slug'               => 'wdk-reviews', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-reviews.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/sweet-energy-efficiency.zip')) {
		$plugins [] = array(
			'name'               => 'Sweet Energy Efficiency', // The plugin name.
			'slug'               => 'sweet-energy-efficiency', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/sweet-energy-efficiency.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-report-abuse.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Report Abuse', // The plugin name.
			'slug'               => 'wdk-report-abuse', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-report-abuse.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-facebook-comments.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Facebook Comments', // The plugin name.
			'slug'               => 'wdk-facebook-comments', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-facebook-comments.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-geo.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Geo', // The plugin name.
			'slug'               => 'wdk-geo', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-geo.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-mailchimp.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Mailchimp', // The plugin name.
			'slug'               => 'wdk-mailchimp', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-mailchimp.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if(file_exists( get_stylesheet_directory() .'/addons/wdk-compare-listing.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Compare Listings', // The plugin name.
			'slug'               => 'wdk-compare-listing', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-compare-listing.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

    if(file_exists( get_stylesheet_directory() .'/addons/wdk-save-search.zip')) {
		$plugins [] = array(
			'name'               => 'WDK Save Search', // The plugin name.
			'slug'               => 'wdk-save-search', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/addons/wdk-save-search.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		);
	}

	if (file_exists(get_stylesheet_directory() .'/addons/wdk-pdf-export.zip')) {
        $plugins[] = [
              'name'     => 'WDK PDF Download',
              'slug'     => 'wdk-pdf-export',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-pdf-export.zip',
			  'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			  'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			  'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			  'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			  'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			  'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ];
    }
	
    if (file_exists(get_stylesheet_directory() .'/addons/wdk-listing-claim.zip')) {
        $plugins[] = [
              'name'     => 'WDK Claim / Take Ownership',
              'slug'     => 'wdk-listing-claim',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-listing-claim.zip',
			  'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			  'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			  'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			  'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			  'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			  'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ];
    }

	if (file_exists(get_stylesheet_directory() .'/addons/wdk-duplicate-listing.zip')) {
        $plugins[] = [
              'name'     => 'WDK Duplicate Listing',
              'slug'     => 'wdk-duplicate-listing',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-duplicate-listing.zip',
			  'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			  'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			  'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			  'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			  'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			  'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ];
    }

	if (file_exists(get_stylesheet_directory() .'/addons/wdk-svg-map.zip')) {
        $plugins[] = [
              'name'     => 'WDK SVG Maps',
              'slug'     => 'wdk-svg-map',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-svg-map.zip',
			  'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			  'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			  'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			  'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			  'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			  'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ];
   }

	if (file_exists(get_stylesheet_directory() .'/addons/wdk-api.zip')) {
        $plugins[] = [
              'name'     => 'WDK API',
              'slug'     => 'wdk-api',  // The slug has to match theextracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-api.zip',
			  'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			  'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			  'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			  'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			  'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			  'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			  'has_notices'  => false,  
        ];
    }
			
	if (file_exists(get_stylesheet_directory() .'/addons/wdk-messages-chat.zip')) {
        $plugins[] = [
              'name'     => 'WDK Live Chat',
              'slug'     => 'wdk-messages-chat',  // The slug has to match the extracted folder from the zip.
              'source'   =>  get_stylesheet_directory() . '/addons/wdk-messages-chat.zip',
			  'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			  'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			  'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			  'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			  'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			  'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ];
    }

	$plugins[] = [
		  'name'     => 'Hash Form - Drag & Drop Form Builder',
		  'slug'     => 'hash-form',  // The slug has to match the extracted folder from the zip.
		  'required'           => false, // If false, the plugin is only 'recommended' instead of required.
		  'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		  'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		  'external_url'       => '', // If set, overrides default API URL and points to an external URL.
		  'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
	];

	$config = array(
		'id'           => 'real-estate-realista',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		
	);

	tgmpa( $plugins, $config );
}
