<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="header-top-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-top-contents">
                    <div class="contact-info-wrapper">

                        <?php if (trendymag_option('header-trigger-visibility')): ?>
                            <a id="mobile-trigger" href="#" class="menu-toggle"><i class="fa fa-bars"></i></a>
                        <?php endif; ?>
                        
                        <?php if (trendymag_option('header-menu-visibility')): ?>
                            <div class="header-menu hidden-xs">
                                <?php wp_nav_menu( apply_filters( 'trendymag_wp_nav_menu_header', array(
                                    'theme_location' => 'header',
                                    'items_wrap'     => '<ul class="header-nav">%3$s</ul>',
                                    'fallback_cb'    => 'TrendyMag_Navwalker::fallback'
                                    ))
                                ); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (trendymag_option('header-contact')) : ?>
                            <div class="contact-info hidden-xs">
                                <?php echo wp_kses(trendymag_option('header-contact', false, true), array(
                                    'a'  => array(
                                        'href'   => array(),
                                        'title'  => array(),
                                        'target' => array()
                                    ),
                                    'br' => array(),
                                    'i'  => array('class' => array()),
                                    'ul' => array('class' => array()),
                                    'li' => array(),
                                )); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (trendymag_option('header-weather-visibility')): ?>
                        <div id="weather" class="weather-wrap hidden-xs">
                            <div class="weather-container">
                                <div id="temperature-info" class="temperature-info">
                                    <div class="temperature" id="temperature"></div>
                                    <div class="temp-change">
                                        <button id="celsius" class="temp-change-button celsius">&deg;C</button><button id="fahrenheit" class="temp-change-button fahrenheit">&deg;F</button>
                                    </div>

                                    <div class="location" id="location"></div>
                                </div>
                                
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (trendymag_option('header-social-button')): ?>
                        <div class="social-links-wrap text-right pull-right">
                            <?php get_template_part('template-parts/social', 'icons');?>
                        </div> <!-- /social-links-wrap -->
                    <?php endif ?>

                    <?php if (trendymag_option('header-date-visibility')): ?>
                        <div class="current-date pull-right hidden-xs">
                            <i class="fa fa-calendar" aria-hidden="true"></i><?php echo date('D, M j, Y'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div> <!-- .col-md-12 -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .header-top-wrapper -->