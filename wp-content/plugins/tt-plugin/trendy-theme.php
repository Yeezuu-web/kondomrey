<?php
/*
Plugin Name: TrendyTheme Core Plugin
Plugin URI: http://www.trendytheme.net
Description: TrendyTheme Plugin for TrendyMag
Author: Trendy Theme
Version: 1.1
Author URI: http://www.trendytheme.net
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

// Defining Constance
define( 'TT_PLUGIN_URL', plugin_dir_url(__FILE__) );
define( 'TT_PLUGIN_DIR', dirname(__FILE__));
define( 'TT_PLUGIN_PATH', dirname( plugin_basename(__FILE__) ) );


// Loading TextDomain
function tt_plugin_init() {
	load_plugin_textdomain( 'tt-pl-textdomain', false, TT_PLUGIN_PATH . '/languages/' );
}
add_action( 'plugins_loaded', 'tt_plugin_init' );


// Loading Admin Scripts, Stylesheets
function tt_wp_admin_scripts() {
	// Fontawesome icon
	wp_enqueue_style( 'fontawesome', TT_PLUGIN_URL . 'css/font-awesome.min.css' );
	// Select 2 CSS
	wp_enqueue_style( 'select2', TT_PLUGIN_URL . 'css/select2.min.css' );
	// Custom CSS
	wp_enqueue_style( 'tt-custom-css', TT_PLUGIN_URL . 'css/custom.css' );

	// Custom Script
	wp_enqueue_script( 'tt-post-formate', TT_PLUGIN_URL . 'js/posts-meta.js' );
	// Select 2 JS
	wp_enqueue_script( 'select2', TT_PLUGIN_URL . 'js/select2.min.js' );
	// Scripts
	wp_enqueue_script( 'tt-scripts-js', TT_PLUGIN_URL . 'js/scripts.js' );
}
add_action( 'admin_enqueue_scripts', 'tt_wp_admin_scripts' );


// Custom styles
function tt_custom_style() {
	wp_enqueue_style('bootstrap', TT_PLUGIN_URL . 'css/bootstrap.min.css', array(), NULL);
	wp_enqueue_style('tt-trendyicon', TT_PLUGIN_URL . 'css/trendyicon.css', array(), NULL);
	wp_enqueue_style('tt-style', TT_PLUGIN_URL . 'css/style.css', array(), NULL);
}
add_action('wp_enqueue_scripts', 'tt_custom_style', 99);


// hide vc admin notice
function tt_hide_vc_admin_notice() {
    if(is_admin()) :
        setcookie('vchideactivationmsg', '1', strtotime('+3 years'), '/');
        setcookie('vchideactivationmsg_vc11', (defined('WPB_VC_VERSION') ? WPB_VC_VERSION : '1'), strtotime('+3 years'), '/');
    endif;
}
add_action('admin_init', 'tt_hide_vc_admin_notice');


// Custom post type
require_once TT_PLUGIN_DIR . "/inc/post-types/post-types.php";
// template tags
require_once TT_PLUGIN_DIR . "/inc/template-tags.php";
// post like
require_once TT_PLUGIN_DIR . "/inc/post-likes/zilla-likes.php";
// popular post
require_once TT_PLUGIN_DIR . "/inc/widgets/popular-post/tt-popular-post.php";
// comment widget
require_once TT_PLUGIN_DIR . "/inc/widgets/comments-widget.php";
// latest post widget
require_once TT_PLUGIN_DIR . "/inc/widgets/latest-posts.php";
// Facebook widget
require_once TT_PLUGIN_DIR . "/inc/widgets/facebook.php";
// weather widget
require_once TT_PLUGIN_DIR . "/inc/widgets/weather.php";
// social icons
require_once TT_PLUGIN_DIR . "/inc/widgets/social-icons.php";
// sidebar ad
require_once TT_PLUGIN_DIR . "/inc/widgets/sidebar-ad.php";
// Mega Menu
require_once TT_PLUGIN_DIR . "/inc/mega-menu/admin-megamenu-walker.php";
// Fonts
require_once TT_PLUGIN_DIR . "/inc/fonts/font-awesome-icons.php";
// Google map API key
require_once TT_PLUGIN_DIR . "/inc/api-key-for-google-maps.php";
// demo import
require_once TT_PLUGIN_DIR . "/inc/demo-import.php";