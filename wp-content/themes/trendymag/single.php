<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

	$global_post_style = trendymag_option('single-news-style', false, 'style-default');

	$single_news_style = "";

	if (function_exists('rwmb_meta')) :
	    $single_news_style = rwmb_meta('trendymag_single_news_style');
	endif;

	if ($single_news_style == 'inherit-from-theme-option' || empty($single_news_style)) :
		if ($global_post_style == 'style-two') :
		    get_template_part('single-wrapper', 'two');

		elseif ($global_post_style == 'style-three') :
		    get_template_part('single-wrapper', 'three');

		elseif ($global_post_style == 'style-four') :
		    get_template_part('single-wrapper', 'four');

		elseif ($global_post_style == 'style-five') :
		    get_template_part('single-wrapper', 'five');

		elseif ($global_post_style == 'style-six') :
		    get_template_part('single-wrapper', 'six');

		elseif ($global_post_style == 'style-seven') :
		    get_template_part('single-wrapper', 'seven');

		else :
		    get_template_part('single', 'wrapper');
		
		endif;

	elseif ($single_news_style == 'style-two') :
	    get_template_part('single-wrapper', 'two');

	elseif ($single_news_style == 'style-three') :
	    get_template_part('single-wrapper', 'three');

	elseif ($single_news_style == 'style-four') :
	    get_template_part('single-wrapper', 'four');

	elseif ($single_news_style == 'style-five') :
	    get_template_part('single-wrapper', 'five');

	elseif ($single_news_style == 'style-six') :
	    get_template_part('single-wrapper', 'six');

	elseif ($single_news_style == 'style-seven') :
	    get_template_part('single-wrapper', 'seven');

	else :
	    get_template_part('single', 'wrapper');
	endif;

get_footer(); ?>