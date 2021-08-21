<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

// header ad
if(trendymag_option('header-ad-visibility', false, true)) :
    $lg_visibiltiy = "";
    $md_visibility = "";
    $sm_visibility = "";
    $xs_visibility = "";
    if (trendymag_option('desktop-lg-visibility') == '0') :
        $lg_visibiltiy = "hidden-lg";
    endif;
    if (trendymag_option('desktop-md-visibility') == '0') :
        $md_visibility = "hidden-md";
    endif;
    if (trendymag_option('tablet-visibility') == '0') :
        $sm_visibility = "hidden-sm";
    endif;
    if (trendymag_option('mobile-visibility') == '0') :
        $xs_visibility = "hidden-xs";
    endif;
?>
    <div class="promo-wrap <?php echo esc_attr($lg_visibiltiy.' '.$md_visibility.' '.$sm_visibility.' '.$xs_visibility); ?>">
        <?php if (trendymag_option('ad-title')): ?>
            <span class="promo-title"><?php echo esc_html(trendymag_option('ad-title'));?></span>
        <?php endif; ?>
        
        <?php if (trendymag_option('ad-type') == 'image-ad') :
            if (trendymag_option('image-link')) { ?>
                <a href="<?php echo esc_url(trendymag_option('image-link'));?>" target="_blank"><img class="img-responsive" src="<?php echo esc_url(trendymag_option('image-ad-opt', 'url')); ?>" alt="<?php esc_attr('Header ad','trendymag');?>"></a>
            <?php } else { ?>
                <img class="img-responsive" src="<?php echo esc_url(trendymag_option('image-ad-opt', 'url')); ?>" alt="<?php esc_attr('Header ad','trendymag');?>"> 
            <?php } 
        elseif(trendymag_option('ad-type') == 'adsense-ad') :
            echo trendymag_option('ad-codes');
        endif; ?>
    </div>
<?php endif;