<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
    <?php wp_head(); ?>
</head>

<body id="home" <?php body_class(); ?> itemscope="itemscope" itemtype="<?php echo trendymag_protocol();?>://schema.org/WebPage">
    <?php if (trendymag_option('page-preloader', false, true)) : ?>
        <div id="preloader" style="background-color: <?php echo esc_attr(trendymag_option('loader-bg-color', false, '#ffffff'));?>">
            <div id="status">
                <div class="status-mes" style="background-image: url(<?php echo esc_url(trendymag_option('tt-loader', 'url', get_template_directory_uri() . '/images/preloader.gif'));?>);"></div>
            </div>
        </div>
    <?php endif; ?>

    <div id="wrapper">
        <?php if (trendymag_option('header-trigger-visibility', false, true)): ?>
            <div id="sidebar-wrapper">
                <div class="sidebar-contents">
                    <?php if (trendymag_option('header-offcanvas-logo', false, true)): ?>
                        <div class="sidebar-logo">
                            <?php get_template_part('template-parts/site', 'logo'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('trendymag-toogle-menu-sidebar' )): ?>
                        <div class="tt-sidebar-wrapper toogle-menu-sidebar" role="complementary">
                            <?php dynamic_sidebar('trendymag-toogle-menu-sidebar' );?>
                        </div>
                    <?php endif ?>
                </div> <!-- .sidebar-contents -->
            </div> <!-- /#sidebar-wrapper -->
        <?php endif; ?>

        <?php $tt_header_style = trendymag_option('header-style', false, 'header-default');
            
            $page_header = "";

            if (function_exists('rwmb_meta')) : 
                $page_header = get_post_meta( get_queried_object_id(), 'trendymag_header_style', true );
            endif;

            if (! is_page()) :
                if ($tt_header_style == 'header-two') :
                    get_header('two');
                else :
                    get_header('default');
                endif;
            else :
                if ($page_header == 'inherit-theme-option') :
                    if ($tt_header_style == 'header-two') :
                        get_header('two');
                    else :
                        get_header('default');
                    endif;
                else :
                    if ($page_header == 'header-two') :
                        get_header('two');
                    else :
                        get_header('default');
                    endif;
                endif;
            endif;
        ?>

        <div id="page-content-wrapper">
        <?php get_template_part( 'page', 'header' );