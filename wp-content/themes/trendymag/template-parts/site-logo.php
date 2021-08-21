<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<a href="<?php echo esc_url(site_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <?php if (trendymag_option('logo-type', false, true)) : 

        $fallback_logo = get_template_directory_uri() . '/images/logo.png';
        $fallback_retina_logo = get_template_directory_uri() . '/images/logo2x.png';

        $default_logo = trendymag_option('logo', 'url', $fallback_logo);
        $default_ratina_logo = trendymag_option('retina-logo', 'url', $fallback_retina_logo);

        
        // site logo
        $site_logo = $default_logo;
        $site_mobile_logo = $default_logo;
        $site_sticky_logo = $default_logo;
        $site_sticky_mobile_logo = $default_logo;

        if (trendymag_option('mobile-logo', 'url')) :
            $site_mobile_logo = trendymag_option('mobile-logo', 'url', $fallback_logo);
        endif;

        if (trendymag_option('sticky-logo', 'url')) :
            $site_sticky_logo = trendymag_option('sticky-logo', 'url', $fallback_logo);
        endif;

        if (trendymag_option('sticky-mobile-logo', 'url')) :
            $site_sticky_mobile_logo = trendymag_option('sticky-mobile-logo', 'url', $fallback_logo);
        endif;

        // site retina logo
        $site_retina_logo = $default_ratina_logo;
        $site_retina_mobile_logo = $default_ratina_logo;
        $site_retina_sticky_logo = $default_ratina_logo;
        $site_retina_sticky_mobile_logo = $default_ratina_logo;

        if (trendymag_option('retina-mobile-logo', 'url')) :
            $site_retina_mobile_logo = trendymag_option('retina-mobile-logo', 'url', $fallback_retina_logo);
        endif;

        if (trendymag_option('retina-sticky-logo', 'url')) :
            $site_retina_sticky_logo = trendymag_option('retina-sticky-logo', 'url', $fallback_retina_logo);
        endif;

        if (trendymag_option('retina-sticky-mobile-logo', 'url')) :
            $site_retina_sticky_mobile_logo = trendymag_option('retina-sticky-mobile-logo', 'url', $fallback_retina_logo);
        endif; ?>

        <img class="site-logo hidden-xs" src="<?php echo esc_url($site_logo) ?>" data-at2x="<?php echo esc_url($site_retina_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>

        <img class="site-logo visible-xs" src="<?php echo esc_url($site_mobile_logo) ?>" data-at2x="<?php echo esc_url($site_retina_mobile_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
        
        <?php if (trendymag_option('sticky-logo', 'url')): ?>
            <img class="sticky-logo hidden-xs" src="<?php echo esc_url($site_sticky_logo) ?>" data-at2x="<?php echo esc_url($site_retina_sticky_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
        <?php endif; ?>

        <?php if (trendymag_option('sticky-mobile-logo', 'url')): ?>
            <img class="sticky-logo visible-xs" src="<?php echo esc_url($site_sticky_mobile_logo) ?>" data-at2x="<?php echo esc_url($site_retina_sticky_mobile_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
        <?php endif; ?>
            
    <?php else : ?>
        <?php if (trendymag_option('text-logo')) :
            echo esc_html(trendymag_option('text-logo'));
        else :
            echo esc_html(get_bloginfo('name'));
        endif;
        ?>
    <?php endif; ?>
</a>