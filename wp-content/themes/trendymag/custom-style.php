<?php
    header('Content-type: text/css');
    $parse_uri = explode('wp-content', $_SERVER[ 'SCRIPT_FILENAME' ]);
    $wp_load = $parse_uri[ 0 ] . 'wp-load.php';
    require_once($wp_load);

    // color options
    $accent_color = trendymag_option('accent-color', false, '#ff3c00');
    $section_title = trendymag_option('section-title-color', false, '#212121');
    $link_color = trendymag_option('link-color', false, '#ff3c00');
    
    // background color
    $bg_color = trendymag_option('layout-background', 'background-color');

    // accent color darken
    $accent_darken = trendymag_modify_color( $accent_color, -20 );
    $link_darken = trendymag_modify_color( $link_color, -20 );

    // body typography
    $font_color = trendymag_option('body-typography', 'color');
    $font_size = trendymag_option('body-typography', 'font-size');
    $font_family = trendymag_option('body-typography', 'font-family');
    $font_weight = trendymag_option('body-typography', 'font-weight');
    $line_height = trendymag_option('body-typography', 'line-height');

    // heading typography
    $heading_color = trendymag_option('heading-typography', 'color');
    $heading_font_family = trendymag_option('heading-typography', 'font-family');
    $heading_font_weight = trendymag_option('heading-typography', 'font-weight');

    // specific title size and it's line height

    // for H1
    $h1_font_size = trendymag_option('h1-typography', 'font-size');
    $h1_line_height = trendymag_option('h1-typography', 'line-height');

    // for H2
    $h2_font_size = trendymag_option('h2-typography', 'font-size');
    $h2_line_height = trendymag_option('h2-typography', 'line-height');

    // for H3
    $h3_font_size = trendymag_option('h3-typography', 'font-size');
    $h3_line_height = trendymag_option('h3-typography', 'line-height');

    // for H4
    $h4_font_size = trendymag_option('h4-typography', 'font-size');
    $h4_line_height = trendymag_option('h4-typography', 'line-height'); 

    // for H5
    $h5_font_size = trendymag_option('h5-typography', 'font-size');
    $h5_line_height = trendymag_option('h5-typography', 'line-height');

    // for H6
    $h6_font_size = trendymag_option('h6-typography', 'font-size');
    $h6_line_height = trendymag_option('h6-typography', 'line-height');

    // default menu color
    $default_font_color = trendymag_option('menu-color', false, false);
    if ($default_font_color) :
        $default_font_color = 'color:' .$default_font_color. '';
    endif;

    // menu background
    $menu_bg_color = trendymag_option('menu-bg-color', false, false);
    if ($menu_bg_color) :
        $menu_bg_color = 'background-color:' .$menu_bg_color. '';
    endif;
    
    // menu active color
    $menu_active_color = trendymag_option('menu-active-color', false, '#ff3c00');
    if ($menu_active_color) :
        $menu_active_color = '' .$menu_active_color. '';
    endif;
?>

body{
    background-color: <?php echo esc_attr($bg_color); ?>;
    color: <?php echo esc_attr($font_color) ?>;
    font-size: <?php echo esc_attr($font_size) ?>;
    font-family: <?php echo esc_attr($font_family) ?>, sans-serif;
    font-weight: <?php echo esc_attr($font_weight) ?>;
    line-height: <?php echo esc_attr($line_height) ?>;
}

h1, 
h2, 
h3, 
h4, 
h5, 
h6{
    color: <?php echo esc_attr($heading_color) ?>;
    font-family: <?php echo esc_attr($heading_font_family) ?>, sans-serif;
    font-weight: <?php echo esc_attr($heading_font_weight) ?>;
}
h1{
    font-size: <?php echo esc_attr($h1_font_size) ?>;
    line-height: <?php echo esc_attr($h1_line_height) ?>;
}
h2{
    font-size: <?php echo esc_attr($h2_font_size) ?>;
    line-height: <?php echo esc_attr($h2_line_height) ?>;
}
h3{
    font-size: <?php echo esc_attr($h3_font_size) ?>;
    line-height: <?php echo esc_attr($h3_line_height) ?>;
}
h4{
    font-size: <?php echo esc_attr($h4_font_size) ?>;
    line-height: <?php echo esc_attr($h4_line_height) ?>;
}
h5{
    font-size: <?php echo esc_attr($h5_font_size) ?>;
    line-height: <?php echo esc_attr($h5_line_height) ?>;
}
h6{
    font-size: <?php echo esc_attr($h6_font_size) ?>;
    line-height: <?php echo esc_attr($h6_line_height) ?>;
}

#wrapper{
    background-color: <?php echo esc_attr($bg_color); ?>;
}

.vc_tta.vc_general.vc_tta-style-tab-default .vc_tta-title-text,
.vc_tta.vc_general.vc_tta-style-tab-border-top .vc_tta-tab>a,
.nav-tabs>li>a,
.breaking-news-wrapper .news-prefix-title,
.basecamp-testimonial blockquote footer,
.counter-section,
.widget_mc4wp_form_widget .btn,
.loadmore-btn,
.navbar-nav li a,
.navbar-nav .msm-menu-item .msm-submenu a{
    font-family: <?php echo esc_attr($heading_font_family) ?>;
}


.navbar-default {
    <?php echo esc_attr($menu_bg_color) ?>
}

.navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($default_font_color) ?>
}


<?php 
/**
* Color preset
*
* Color
*/
?>
a,
a:focus{
    color: <?php echo esc_attr($link_color) ?>;
}


<?php 
/**
* Color preset
*
* Color darken
*/
?>

a:hover{
    color: <?php echo esc_attr($link_darken) ?>;
}

.backToTop i:hover{
    background-color: <?php echo esc_attr($link_darken) ?>;
}


<?php 
/**
*
* Section title color
*/
?>
.section-intro h2{
    color: <?php echo esc_attr($section_title) ?>;
}



<?php 
/**
*
* Background color
*/
?>

.vc_general.vc_btn3.vc_btn3-color-theme_primary_color,
.btn-primary,
.vc_general.vc_btn3.vc_btn3-color-theme_default_color:hover,
.vc_general.vc_btn3.vc_btn3-color-theme_default_color:focus,
.btn-default:hover,
.btn-default:focus,
.theme-bg,
.sction-title-wrapper .separator,
.header-top-wrapper .social-icon ul li a i:hover,
.navbar-toggle:hover .icon-bar,
.navbar-toggle:focus .icon-bar,
.post.format-link .blog-link a:hover,
.news-gallery .carousel-control:focus, 
.news-gallery .carousel-control:hover,
.pagination>li>a:hover, 
.pagination>li>span:hover, 
.pagination>li>a:focus, 
.pagination>li>span:focus,
.pagination .current,
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus,
.blog-navigation a:hover,
.page-pagination a:hover,
.page-pagination > span,
.tt-recipe-wrapper .tt-print,
.widget.widget_mc4wp_form_widget,
.widget_tag_cloud a:hover,
.comments-wrapper .comment-form .submit,
.error-message a,
.error-message a:hover,
.footer-section .social-icon a:hover i,
#toTop:hover,
.vc_tta-panel.vc_active .vc_tta-panel-heading,
.posted-in a,
.entry-content .more-link:hover,
.entry-content a.readmore:hover,
.catagory-dropdown-wrapper ul li a:hover,
.colored-border,
.post-share ul li a,
.wpb_widgetised_column .widget_tt_weather_widget,
.tt-sidebar-wrapper .widget_tt_weather_widget{
    background-color: <?php echo esc_attr($accent_color) ?>;
}


.theme-bg-color,
.theme-bg-color a{
    background-color: <?php echo esc_attr($accent_color) ?> !important;
}

<?php 
/**
*
* Background color darken
*/
?>
.vc_general.vc_btn3.vc_btn3-color-theme_primary_color:hover,
.vc_general.vc_btn3.vc_btn3-color-theme_primary_color:focus,
.btn-primary:hover,
.btn-primary:active,
.btn-primary:active:focus,
.btn-primary:focus{
    background-color: <?php echo esc_attr($accent_darken) ?>;
}



<?php 
/**
*
* Color
*/
?>

.theme-color,
.btn-outline:hover,
.btn-outline:focus,
.vc_general.vc_btn3.vc_btn3-color-theme_default_color,
.btn-default,
.learnmore-btn:focus,
.learnmore-btn:hover,
.check-circle-list li:hover i,
.header-top-wrapper .contact-info ul li a:hover,
.temp-change button.checked,
.header-menu ul li a:hover,
.breaking-news li a:hover,
.search-icon.active:after,
.page-title ul li a:hover,
.tt-popup i:hover,
.post-wrapper .featured-wrapper .entry-meta li a:hover,
.news-wrapper.single-layout-three .entry-meta li a:hover,
.news-wrapper.single-layout-four .entry-meta li a:hover,
.news-wrapper.single-layout-five .entry-meta li a:hover,
.news-wrapper.single-layout-six .entry-meta li a:hover,
.news-wrapper.single-layout-seven .entry-meta li a:hover,
.single-post-navigation .entry-title a:hover,
.tt-popular-post h4 a:hover,
.tt-recent-comments .comment-content .comment-title a:hover,
.tt-latest-news .entry-content h4:hover,
.tt-latest-news .entry-content h4 a:hover,
.widget_recent_entries ul li  a:hover,
.widget_recent_comments ul li a:hover,
.widget_archive ul li a:hover,
.widget_pages ul li a:hover,
.widget_nav_menu ul li a:hover,
.widget .entry-meta ul li a:hover,
.widget_categories ul li a:hover, 
.widget_meta ul li a:hover,
.widget_calendar #today,
.author-links ul li a:hover,
.author-info h3 a:hover,
.authors-post a:hover,
.author-social ul li a:hover,
.comment-list .pingback a:hover,
.error-message h2,
.footer-sidebar .widget_meta ul li a:hover,
.footer-sidebar ul li i,
#toTop,
.post-wrapper.style-one .recent-news .entry-title a:hover,
.post-wrapper.style-three .recent-news .entry-title a:hover,
.post-wrapper.style-five .recent-news .entry-title a:hover,
.post-wrapper.style-six .recent-news .entry-title a:hover,
.post-wrapper.style-one .recent-news .entry-meta li a:hover,
.post-wrapper.style-three .recent-news .entry-meta li a:hover,
.post-wrapper.style-five .recent-news .entry-meta li a:hover,
.post-wrapper.style-six .recent-news .entry-meta li a:hover,
.catagory-dropdown-wrapper .category-inline-list ul li.active a,
.share-selected-text-main-container .share-selected-text-btn:focus, 
.share-selected-text-main-container .share-selected-text-btn:hover,
.widget_tt_twitter_widget .tt-tweet-body a:hover{
    color: <?php echo esc_attr($accent_color) ?>;
}


.widget_recent_entries ul li a:hover,
.widget_recent_comments ul li a:hover,
.widget_archive ul li a:hover,
.widget_pages ul li a:hover,
.widget_nav_menu ul li a:hover,
.widget .entry-meta ul li a:hover,
.footer-sidebar .widget_recent_entries ul li a:hover, 
.footer-sidebar .widget_recent_comments ul li a:hover, 
.footer-sidebar .widget_archive ul li a:hover, 
.footer-sidebar .widget_pages ul li a:hover, 
.footer-sidebar .widget_nav_menu ul li a:hover,
.footer-sidebar .widget .entry-meta ul li a:hover,
.vc_tta-color-theme_default_color.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a{
    color: <?php echo esc_attr($accent_color) ?> !important;
}

.navbar-default .navbar-nav li.current-menu-ancestor>a,
.navbar-default .navbar-nav li.current-menu-parent>a,
.navbar-default .navbar-nav li.current-menu-item>a{
    color: <?php echo esc_attr($menu_active_color) ?> !important;
}

.navbar-default .navbar-nav li a:focus, 
.navbar-default .navbar-nav li a:hover,
.navbar-default .navbar-nav>.open>a, 
.navbar-default .navbar-nav>.open>a:focus, 
.navbar-default .navbar-nav>.open>a:hover,
.dropdown-menu>.active>a, 
.dropdown-menu>.active>a:focus, 
.dropdown-menu>.active>a:hover,
.navbar-default .navbar-nav li.current-menu-ancestor.has-mega-menu-child>a:hover,
.navbar-default .navbar-nav li.current-menu-parent.has-mega-menu-child>a:hover,
.dropdown-menu>li>a:focus, 
.dropdown-menu>li>a:hover{
    color: <?php echo esc_attr($menu_active_color) ?>;
}

.navbar-default .navbar-nav li.current-menu-ancestor>a, 
.navbar-default .navbar-nav li.current-menu-parent>a, 
.navbar-default .navbar-nav li.current-menu-item>a{
    color: <?php echo esc_attr($menu_active_color) ?> !important;
}

@media(max-width : 767px) {
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover{
        color: <?php echo esc_attr($menu_active_color) ?>;
    }

    .dropdown-menu-trigger.menu-collapsed{
        color: <?php echo esc_attr($menu_active_color) ?>;
    }

    .dropdown-menu-trigger.menu-collapsed{
        border-color: <?php echo esc_attr($menu_active_color) ?>;
    }
}


<?php 
/**
*
* Border color
*/
?>

.vc_general.vc_btn3.vc_btn3-color-theme_primary_color,
.btn-primary,
.vc_general.vc_btn3.vc_btn3-color-theme_default_color:hover,
.vc_general.vc_btn3.vc_btn3-color-theme_default_color:focus,
.btn-default:hover,
.btn-default:focus,
.form-control:focus,
.tt-popup i:hover,
.single-news-newsletter.subscribe-form .mc4wp-form .form-control:focus,
.pagination .current,
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus,
.blog-navigation a:hover,
.widget select:focus,
.comments-wrapper .comment-form input:focus,
.comments-wrapper .comment-form textarea:focus,
.comments-wrapper .comment-form .submit,
#toTop,
.vc_tta.vc_general.vc_tta-color-theme_default_color.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-heading,
.featured-video .tt-popup i:hover,
.catagory-dropdown-wrapper .category-inline-list ul li.active a {
    border-color: <?php echo esc_attr($accent_color) ?>;
}



<?php 
/**
*
* Border color darken
*/
?>
.vc_general.vc_btn3.vc_btn3-color-theme_primary_color:hover,
.vc_general.vc_btn3.vc_btn3-color-theme_primary_color:focus,
.btn-primary:hover,
.btn-primary:active,
.btn-primary:active:focus,
.btn-primary:focus{
    border-color: <?php echo esc_attr($accent_darken) ?>;
}


<?php 
/**
*
* hex2rgb and darken
*/
?>

.tt-overlay-theme-color,
.tt-gallery-thumb ul li.flex-active-slide::after{
    background-color: rgba(<?php echo trendymag_hex2rgb($accent_color)?>,.9);
}



<?php
/**
*
* Media query
*/
?>

@media (max-width : 767px) {    
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover{
        color: <?php echo esc_attr($accent_color) ?>;
    }

}