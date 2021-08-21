<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="header-wrapper navbar-fixed-top">
    <?php
    $header_topbar_option = trendymag_option('header-top-visibility');

    $header_page_topbar = "";

    if (function_exists('rwmb_meta')) : 
        $header_page_topbar = rwmb_meta('trendymag_header_topbar');
    endif;

    if ($header_topbar_option == "1" and $header_page_topbar == 'inherit-theme-option' || empty($header_page_topbar)) :
        get_template_part('template-parts/header', 'topbar');
    elseif($header_page_topbar == 'header-topbar-show') :
        get_template_part('template-parts/header', 'topbar');
    elseif($header_page_topbar == 'header-topbar-hide' and $header_topbar_option == "0") :
    endif;
    ?>

    <?php if(trendymag_option('header-ad-visibility', false, true)) : ?>
        <div class="tt-promo text-center hidden-xs">
            <div class="container">
                <?php get_template_part('template-parts/ads', 'header' ); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="navbar-header visible-xs">
        <div class="container">
            <?php if (trendymag_option('search-visibility', false, true)): ?>
                <div class="search-box-wrap">
                    <div class="search-icon"></div>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>

            <button type="button" class="navbar-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <div class="navbar-brand">
                <h1>
                    <?php get_template_part('template-parts/site', 'logo'); ?>
                </h1>
            </div> <!-- .navbar-brand -->
        </div>
    </div> <!-- .navbar-header -->

    <nav class="navbar navbar-default">
        <div class="menu-close visible-xs"><i class="fa fa-times"></i></div>
        <div class="main-menu-wrapper">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header hidden-xs">
                    <div class="navbar-brand">
                        <h1>
                            <?php get_template_part('template-parts/site', 'logo'); ?>
                        </h1>
                    </div> <!-- .navbar-brand -->
                </div> <!-- .navbar-header -->

                <div class="clearfix">
                    <?php if (trendymag_option('search-visibility', false, true)): ?>
                        <div class="search-box-wrap pull-right hidden-xs">
                            <div class="search-icon"></div>
                            <?php get_search_form(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="main-menu">
                        <?php wp_nav_menu( apply_filters( 'trendymag_primary_wp_nav_menu', array(
                            'container'      => false,
                            'theme_location' => 'primary',
                            'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav navbar-right">%3$s</ul>',
                            'walker'         => new TrendyMag_Navwalker(),
                            'fallback_cb'    => 'TrendyMag_Navwalker::fallback'
                        ))); ?>
                    </div>
                </div> <!-- /navbar-collapse -->
            </div> <!-- .container -->
        </div> <!-- .main-menu-wrapper -->
    </nav>

    <?php if(trendymag_option('header-ad-visibility', false, true)) : ?>
        <div class="tt-promo text-center visible-xs">
            <div class="container">
                <?php get_template_part('template-parts/ads', 'header' ); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(trendymag_option('breaking-news-visibility') && is_page() == true) :
        if (trendymag_option('visibility-area') == true && is_front_page() || is_home()) :
            get_template_part('template-parts/breaking', 'news');
        elseif(trendymag_option('visibility-area') == false) :
            get_template_part('template-parts/breaking', 'news');
        endif;
    endif; ?>
</div> <!-- .header-wrapper -->