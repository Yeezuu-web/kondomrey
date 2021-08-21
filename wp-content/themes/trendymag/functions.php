<?php 

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// TRENDYMAG FUNCTIONS AND DEFINITIONS
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( ! defined( 'TRENDYMAG_THEME_NAME' ) ) {
        define( 'TRENDYMAG_THEME_NAME', wp_get_theme()->get( 'Name' ) );
    }
    
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // admin-init, metabox, bootstrap-navwalker, jetpack
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
	require get_template_directory() . "/admin/admin-init.php";
	require get_template_directory() . "/inc/metabox.php";
    require get_template_directory() . "/inc/tt-navwalker.php";
	require get_template_directory() . "/inc/post-loadmore.php";

    if (class_exists('Vc_Manager')) {
        require get_template_directory() . "/visual-composer/visual-composer.php";
    }


if (!function_exists('trendymag_theme_setup')) :

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets up theme defaults and registers support for various WordPress features.
// Note that this function is hooked into the after_setup_theme hook, which
// runs before the init hook. The init hook is too late for some features, such
// as indicating support for post thumbnails.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    function trendymag_theme_setup(){
       
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Make theme available for translation.
        // Translations can be filed in the /languages/ directory.
        // If you're building a theme based on trendymag, use a find and replace
        // to change 'trendymag' to the name of your theme in all the template files
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        load_theme_textdomain('trendymag', get_template_directory() . '/languages');
        

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Add default posts and comments RSS feed links to head.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('automatic-feed-links');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Supporting title tag
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('title-tag');



        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Gutenberg support
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support(
            'gutenberg',
            array( 'wide-images' => true )
        );

        add_theme_support( 'align-wide' );
        
        // responsive-embeds
        add_theme_support( 'responsive-embeds' );


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Enable support for Post Thumbnails on posts and pages.
        // See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-          
        add_theme_support('post-thumbnails');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // default post thumbnail size
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        set_post_thumbnail_size(1140);
        add_image_size('trendymag-blog-thumbnail', 750, 350, true);
        add_image_size('trendymag-news-cover-thumbnail', 1920, 450, true);
        add_image_size('trendymag-one-fourth', 578, 724, true);
        add_image_size('trendymag-half', 578, 362, true);
        add_image_size('trendymag-two-third', 830, 420, true);
        add_image_size('trendymag-recent-post', 645, 395, true);
        add_image_size('trendymag-recent-post2', 742, 588, true);
        add_image_size('trendymag-gallery-thumbnail', 550, 530, true);
        add_image_size('trendymag-gallery-thumb', 85, 80, true);
        add_image_size('trendymag-popular-post-thumb', 65, 65, true);


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // This theme uses wp_nav_menu() in one locations.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        register_nav_menus(array(
           'primary' => esc_html__('Primary Menu', 'trendymag'),
           'header' => esc_html__('Header Top Menu', 'trendymag')
        ) );


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Switch default core markup for search form, comment form, and comments
        // to output valid HTML5.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ));


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Enable support for Post Formats.
        // See: https://codex.wordpress.org/Post_Formats
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-          
        add_theme_support('post-formats', array('aside', 'status', 'image', 'audio', 'video', 'gallery', 'quote', 'link', 'chat' ));

    }

    add_action('after_setup_theme', 'trendymag_theme_setup');

endif; // trendymag_theme_setup


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set the content width in pixels, based on the theme's design and stylesheet.
// Priority 0 to make it available to lower priority callbacks.
// @global int $content_width
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('trendymag_content_width')) :
    function trendymag_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'trendymag_content_width', 1140 );
    }
    add_action( 'after_setup_theme', 'trendymag_content_width', 0 );
endif;
    

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Register widget area.
// @link https://codex.wordpress.org/Function_Reference/register_sidebar
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('trendymag_widgets_init')) :

    function trendymag_widgets_init() {

    	do_action('trendymag_before_register_sidebar');

        register_sidebar( apply_filters( 'trendymag_blog_sidebar', array(
            'name'          => esc_html__('Blog Sidebar', 'trendymag'),
            'id'            => 'trendymag-blog-sidebar',
            'description'   => esc_html__('Appears in the blog sidebar.', 'trendymag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'trendymag_page_sidebar', array(
            'name'          => esc_html__('Page Sidebar Area', 'trendymag'),
            'id'            => 'trendymag-page-sidebar',
            'description'   => esc_html__('Appears in the Page sidebar.', 'trendymag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'trendymag_category_sidebar', array(
            'name'          => esc_html__('Category Sidebar Area', 'trendymag'),
            'id'            => 'trendymag-cat-sidebar',
            'description'   => esc_html__('Appears in the Category sidebar.', 'trendymag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'trendymag_home_sidebar', array(
            'name'          => esc_html__('Home Content Sidebar', 'trendymag'),
            'id'            => 'trendymag-home-sidebar',
            'description'   => esc_html__('This widget created for home page or any vc supported pages and use it with VC Widgetised Sidebar.', 'trendymag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'trendymag_footer_default_sidebar', array(
            'name'          => esc_html__('Footer Default Sidebar', 'trendymag'),
            'id'            => 'trendymag-footer-default',
            'description'   => esc_html__('Appears in the footer default only', 'trendymag'),
            'before_widget' => '<div id="%1$s" class="col-md-6 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'trendymag_footer_four_column', array(
            'name'          => esc_html__('Footer Sidebar Four Column', 'trendymag'),
            'id'            => 'trendymag-footer-four-column',
            'description'   => esc_html__('Appears in the footer four column', 'trendymag'),
            'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'trendymag_toggle_menu_sidebar', array(
            'name'          => esc_html__('Offcanvas Sidebar', 'trendymag'),
            'id'            => 'trendymag-toogle-menu-sidebar',
            'description'   => esc_html__('This widget created for offcanvas sidebar only', 'trendymag'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        do_action('trendymag_after_register_sidebar');
    }

    add_action('widgets_init', 'trendymag_widgets_init');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Load Google Font If Redux framework is not activated.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'trendymag_fonts_url' ) ):
    function trendymag_fonts_url() {
        $font_url = '';
        if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'trendymag' ) ) :
            $font_url = add_query_arg(
                array(
                    'family' => urlencode( 'Droid+Serif|Poppins:400,700' ),
                    'subset' => 'latin',
                ), "//fonts.googleapis.com/css" );
        endif;
        return apply_filters( 'trendymag_google_font_url', esc_url( $font_url ) );
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Enqueue scripts and styles.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('trendymag_scripts')) :
    
    function trendymag_scripts() {

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Styles
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        if ( ! trendymag_option( 'body-typography', 'font-family' ) ) :
            wp_enqueue_style('google-font', trendymag_fonts_url(), array(), NULL);
        endif;
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3');
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
        wp_enqueue_style('trendymag-plugins', get_template_directory_uri() . '/css/plugins.css', array(), NULL);
        wp_enqueue_style('trendymag-print', get_template_directory_uri() . '/css/print.css', array(), NULL, 'print');
        wp_enqueue_style('stylesheet', get_stylesheet_uri());

        if (class_exists('ReduxFrameworkPlugin')) :
            wp_enqueue_style('trendymag-custom-style', get_template_directory_uri() . '/custom-style.php', array(), NULL);
        endif;

        if (trendymag_option('rtl')) {
            wp_enqueue_style('trendymag-rtl', get_template_directory_uri() . '/rtl.css', array(), NULL);
        }
        
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // scripts
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', TRUE);
        wp_enqueue_script('trendymag-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), NULL, TRUE);
        if (trendymag_option('header-weather-visibility', false, true)) :
            wp_enqueue_script('weather', get_template_directory_uri() . '/js/weather.js', array('jquery'), NULL, TRUE);
        endif;
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script('trendymag-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), NULL, TRUE);

        wp_localize_script( 'trendymag-scripts', 'trendymagJSObject', apply_filters( 'trendymag_js_object', array(
            'trendymag_sticky_menu'     => trendymag_option('sticky-menu-visibility', false, true),
            'ajaxurl'                   => admin_url( 'admin-ajax.php' ),
            'trendymag_breaking_news'   => trendymag_option('breaking-news-visibility', false, true),
            'trendymag_share'           => trendymag_option('select-to-share', false, true),
            'trendymag_share_button'    => trendymag_option('select-share-button'),
            'trendymag_facebook_app_id' => trendymag_option('facebook-app-id'),
            'trendymag_twitter_username'=> trendymag_option('twitter-user'),
            'trendymag_rtl'             => trendymag_option('rtl')
		)));

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        // Remove Query Strings From Static Resources
        if ( ! is_admin() ){
            add_filter( 'script_loader_src', 'trendymag_remove_query_strings_1', 15, 1 );
            add_filter( 'style_loader_src',  'trendymag_remove_query_strings_1', 15, 1 );
            add_filter( 'script_loader_src', 'trendymag_remove_query_strings_2', 15, 1 );
            add_filter( 'style_loader_src',  'trendymag_remove_query_strings_2', 15, 1 );
        }

        // REMOVE WP EMOJI
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }

    add_action('wp_enqueue_scripts', 'trendymag_scripts');
endif;



if (!function_exists('trendymag_editor_styles')) :
    function trendymag_editor_styles() {
        wp_enqueue_style('google-font', trendymag_fonts_url(), array(), NULL);
        wp_enqueue_style( 'trendymag-editor-style', get_template_directory_uri() . '/css/editor-style.css');
    }
endif;
add_action( 'enqueue_block_editor_assets', 'trendymag_editor_styles', 999 );




//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom template tags for this theme.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/template-tags.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom functions that act independently of the theme templates.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/extras.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Load Jetpack compatibility file.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/jetpack.php";