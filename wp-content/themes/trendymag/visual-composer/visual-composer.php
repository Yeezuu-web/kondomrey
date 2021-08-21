<?php
	if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;


    $tt_icon_block_attr = array();

	// VC Custom shortcode dir
	vc_set_shortcodes_templates_dir( get_template_directory() . '/visual-composer/shortcodes' );


	// VC Admin element stylesheet
	if ( ! function_exists( 'trendymag_vc_admin_styles' ) ) :
		function trendymag_vc_admin_styles() {
			wp_enqueue_style( 'trendymag_vc_admin_style', get_template_directory_uri() . '/visual-composer/assets/css/vc-element-style.css', array(), time(), 'all' );
		}
		add_action( 'admin_enqueue_scripts', 'trendymag_vc_admin_styles' );
	endif;


	// Remove vc default template
	if ( ! function_exists( 'trendymag_remove_default_templates' ) ) :
		function trendymag_remove_default_templates( $data ) {
			return array(); 
		}
		add_filter( 'vc_load_default_templates', 'trendymag_remove_default_templates' );
	endif;

	// set default editor post type
	$posttype_list = array(
	    'page',
	    'tt-mega-menu'
	);
	vc_set_default_editor_post_types( $posttype_list );

	// include custom template
	require get_template_directory() . "/visual-composer/templates/home-default.php";
	require get_template_directory() . "/visual-composer/templates/home-two.php";
	require get_template_directory() . "/visual-composer/templates/home-three.php";
	require get_template_directory() . "/visual-composer/templates/home-four.php";
	require get_template_directory() . "/visual-composer/templates/home-five.php";
	require get_template_directory() . "/visual-composer/templates/home-six.php";
	require get_template_directory() . "/visual-composer/templates/home-seven.php";
	require get_template_directory() . "/visual-composer/templates/home-eight.php";
	require get_template_directory() . "/visual-composer/templates/home-nine.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-1.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-2.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-3.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-4.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-5.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-6.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-7.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-8.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-9.php";
	require get_template_directory() . "/visual-composer/templates/featured-post-layout-10.php";

	// include vc extend file
	require get_template_directory() . "/visual-composer/vc_extend/tt-section-title.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-featured-news.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-featured-video.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-recent-news.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-recent-news-filter.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-recent-news-loadmore.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-single-category-news.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-category-layout-one.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-gallery.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-video-gallery.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-newsletter.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-popular-news.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-gradient-banner.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-food-recipe.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-news-slider.php";

	// include custom param
	require get_template_directory() . "/visual-composer/params/vc_custom_params.php";


    // posts lists for narrow data
    function trendymag_post_data(){
	    $posts = get_posts(array(
	        'posts_per_page' => -1,
	        'post_type' => 'post',
	    ));
	    $result = array();
	    foreach ($posts as $post) {
	        $result[] = array(
	            'value' => $post->ID,
	            'label' => $post->post_title,
	        );
	    }
	    return $result;
	}

    // post cateogry lists for narrow data
	function trendymag_category_list(){
		$categories = get_categories(array('hide_empty' => false));
		$lists = array();
		foreach($categories as $category) {
			$lists[] = array(
				'value' => $category->cat_ID,
	            'label' => $category->name,
			);
		}
		return $lists;
	}

    // post cateogry lists for narrow data by slug
	function trendymag_category_slug(){
		$categories = get_categories(array('hide_empty' => false));
		$lists = array();
		foreach($categories as $category) {
			$lists[] = array(
				'value' => $category->slug,
	            'label' => $category->name,
			);
		}
		return $lists;
	}

    // post tags lists for narrow data
	function trendymag_tag_list(){
		$tags = get_tags(array('hide_empty' => false));
		$tag_list = array();
		foreach($tags as $tag) {
			$tag_list[] = array(
				'value' => $tag->slug,
	            'label' => $tag->name,
			);
		}
		return $tag_list;
	}


    // Author lists for narrow data
	function trendymag_autor_list(){

		$args = array(
	        'blog_id'      => $GLOBALS['blog_id'],
	        'orderby'      => 'nicename'
	    );
		$authors = get_users($args);
		$author_list = array();
		foreach($authors as $author) {
			$author_list[] = array(
				'value' => $author->ID,
	            'label' => $author->user_nicename,
			);
		}
		return $author_list;
	}
	

    // Author lists for narrow data
	function trendymag_user_nicename(){

		$args = array(
	        'blog_id'      => $GLOBALS['blog_id'],
	        'orderby'      => 'nicename'
	    );
		$authors = get_users($args);
		$author_list = array();
		foreach($authors as $author) {
			$author_list[] = array(
				'value' => $author->user_nicename,
	            'label' => $author->user_nicename,
			);
		}
		return $author_list;
	}