<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

// article top ad
if(trendymag_option('at-ad-visibility', false, true)) :
    $lg_visibiltiy = "";
    $md_visibility = "";
    $sm_visibility = "";
    $xs_visibility = "";
    if (trendymag_option('at-desktop-lg-visibility') == '0') :
        $lg_visibiltiy = "hidden-lg";
    endif;
    if (trendymag_option('at-desktop-md-visibility') == '0') :
        $md_visibility = "hidden-md";
    endif;
    if (trendymag_option('at-tablet-visibility') == '0') :
        $sm_visibility = "hidden-sm";
    endif;
    if (trendymag_option('at-mobile-visibility') == '0') :
        $xs_visibility = "hidden-xs";
    endif;
    ?>
    <div class="promo-wrap <?php echo esc_attr($lg_visibiltiy.' '.$md_visibility.' '.$sm_visibility.' '.$xs_visibility); ?>">
        <?php if (trendymag_option('at-ad-title')): ?>
            <span class="promo-title"><?php echo esc_html(trendymag_option('at-ad-title'));?></span>
        <?php endif; ?>

        <?php if (trendymag_option('at-ad-type') == 'image-ad') :
            if (trendymag_option('at-image-link')) { ?>
                <a href="<?php echo esc_url(trendymag_option('at-image-link'));?>" target="_blank"><img class="img-responsive" src="<?php echo esc_url(trendymag_option('at-image-ad-opt', 'url')); ?>" alt="<?php esc_attr('Article top ad','trendymag');?>"></a>
            <?php } else { ?>
                <img class="img-responsive" src="<?php echo esc_url(trendymag_option('at-image-ad-opt', 'url')); ?>" alt="<?php esc_attr('Article top ad','trendymag');?>">
            <?php }
        elseif(trendymag_option('at-ad-type') == 'adsense-ad') :
            echo trendymag_option('at-ad-codes');
        endif; ?>
    </div>
<?php endif;