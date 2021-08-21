<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Adds custom classes to the array of body classes.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'trendymag_body_classes' ) ) :

	function trendymag_body_classes( $classes ) {
		
		// header style classes
		if (function_exists('rwmb_meta')) :
			$page_header = rwmb_meta('trendymag_header_style');
			if ($page_header == 'header-default') :
				$classes[] = 'header-default';
			elseif($page_header == 'header-two') :
				$classes[] = 'header-two';
			else :
				$classes[] = trendymag_option('header-style', false, 'header-default');
			endif;
		endif;

		// footer style classes
		if (function_exists('rwmb_meta')) :
			$page_footer = rwmb_meta('trendymag_footer_style');
			if ($page_footer == 'footer-default') :
				$classes[] = 'footer-default';
			elseif ($page_footer == 'footer-two') :
				$classes[] = 'footer-two';
			elseif ($page_footer == 'box-framed-layout') :
				$classes[] = 'footer-three';
			else :
				$classes[] = trendymag_option('footer-style', false, 'footer-default');
			endif;
		endif;

		if (function_exists('rwmb_meta')) :
			$header_page_topbar = rwmb_meta('trendymag_header_topbar');
			$header_option = trendymag_option('header-top-visibility', false, false);

			if ($header_page_topbar == 'header-topbar-show' || $header_page_topbar == 'inherit-theme-option' && $header_option == true) :
				$classes[] = 'has-header-topbar';
			endif;
		endif;

		if (trendymag_option('search-visibility', false, true)) :
			$classes[] = 'has-header-search';
		endif;

		if (trendymag_option('menu-colored-border', false, true)) :
			$classes[] = 'menu-colored-border';
		endif;


		$classes[] = trendymag_option('footer-style', false, 'footer-default');

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) :
			$classes[ ] = 'group-blog';
		endif;

		if (trendymag_option('logo', 'url')) {
			$classes[] = 'has-site-logo';
		}
		if (trendymag_option('mobile-logo', 'url')) {
			$classes[] = 'has-mobile-logo';
		}
		if (trendymag_option('sticky-logo', 'url')) {
			$classes[] = 'has-sticky-logo';
		}
		if (trendymag_option('sticky-mobile-logo', 'url')) {
			$classes[] = 'has-sticky-mobile-logo';
		}

		// is rtl
		if (trendymag_option('rtl')) {
			$classes[] = 'trendymag-rtl';
		}

		// page layouts
		$layout_options = trendymag_option('site-layout', false, 'fullwidth-layout');

	    $page_layout = "";
	    if (function_exists('rwmb_meta')) : 
	        $page_layout = rwmb_meta('trendymag_page_layout');
	    endif;

	    if ($page_layout == 'inherit-from-theme-option' || empty($page_layout)) :
	        if ($layout_options == 'border-layout') :
		        $classes[] = 'border-layout';

		    elseif ($layout_options == 'box-framed-layout') :
		        $classes[] = 'box-framed-layout';

		    elseif ($layout_options == 'box-layout') :
		    	$classes[] = 'box-layout';

		    else :
		        $classes[] = 'fullwidth-layout';
		    endif;
	    elseif($page_layout == 'border-layout') :
	        $classes[] = 'border-layout';

	   	elseif($page_layout == 'box-framed-layout') :
	   		$classes[] = 'box-framed-layout';

	   	elseif($page_layout == 'box-layout') :
	   		$classes[] = 'box-layout';

	   	else :
	   		$classes[] = 'fullwidth-layout';
	    endif;

		return $classes;
	}
	add_filter( 'body_class', 'trendymag_body_classes' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'trendymag_page_menu_args' ) ) :

	function trendymag_page_menu_args( $args ) {

		$args[ 'show_home' ] = TRUE;

		return $args;
	}

	add_filter( 'wp_page_menu_args', 'trendymag_page_menu_args' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets the authordata global when viewing an author archive.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'trendymag_setup_author' ) ) :
	function trendymag_setup_author() {
		global $wp_query;

		if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
			$GLOBALS[ 'authordata' ] = get_userdata( $wp_query->post->post_author );
		}
	}

	add_action( 'wp', 'trendymag_setup_author' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page break button in editor
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'trendymag_wp_page_pagination' ) ) :

	function trendymag_wp_page_pagination( $mce_buttons ) {
		if ( get_post_type() == 'post' or get_post_type() == 'page' ) {
			$pos = array_search( 'wp_more', $mce_buttons, TRUE );
			if ( $pos !== FALSE ) {
				$buttons     = array_slice( $mce_buttons, 0, $pos + 1 );
				$buttons[ ]  = 'wp_page';
				$mce_buttons = array_merge( $buttons, array_slice( $mce_buttons, $pos + 1 ) );
			}
		}

		return $mce_buttons;
	}

	add_filter( 'mce_buttons', 'trendymag_wp_page_pagination' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Redux News Flash Remove 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! class_exists( 'reduxNewsflash' ) ):
	class reduxNewsflash {
		public function __construct( $parent, $params ) {

		}
	}
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Full size gif image
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if( ! function_exists( 'trendymag_gif_full_image' )) :
	function trendymag_gif_full_image( $image, $attachment_id, $size, $icon ){

		$file_type = wp_check_filetype( $image[0] );

		if( ! empty( $file_type ) && $file_type['ext'] == 'gif' && $size != 'full' ){

			return wp_get_attachment_image_src( $attachment_id, $size = 'full', $icon );
		}

		return $image;
	}
	add_filter( 'wp_get_attachment_image_src', 'trendymag_gif_full_image', 10, 4 );
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Redux Ads Remove
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

add_filter( 'redux/' . 'trendymag_theme_option' . '/aURL_filter', '__return_empty_string' );