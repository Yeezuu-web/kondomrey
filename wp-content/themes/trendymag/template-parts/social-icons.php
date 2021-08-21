<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="social-icon">
    <ul class="list-inline">
        <?php
            $facebook_url = trendymag_option('facebook-link');
            if ($facebook_url) { ?>
                <li><a href="<?php echo esc_url($facebook_url);?>"><i class="fa fa-facebook"></i></a></li>
            <?php }

            $twitter_url = trendymag_option('twitter-link');
            if ($twitter_url) { ?>
                <li><a href="<?php echo esc_url($twitter_url);?>"><i class="fa fa-twitter"></i></a></li>
            <?php }

            $google_url = trendymag_option('google-plus-link');
            if ($google_url) { ?>
                <li><a href="<?php echo esc_url($google_url);?>"><i class="fa fa-google-plus"></i></a></li>
            <?php }

            $youtube_url = trendymag_option('youtube-link');
            if ($youtube_url) { ?>
                <li><a href="<?php echo esc_url($youtube_url);?>"><i class="fa fa-youtube"></i></a></li>
            <?php }
            
            $pinterest_url = trendymag_option('pinterest-link');
            if ($pinterest_url) { ?>
                <li><a href="<?php echo esc_url($pinterest_url);?>"><i class="fa fa-pinterest"></i></a></li>
            <?php }
            
            $flickr_url = trendymag_option('flickr-link');
            if ($flickr_url) { ?>
                <li><a href="<?php echo esc_url($flickr_url);?>"><i class="fa fa-flickr"></i></a></li>
            <?php }
            
            $linkedin_url = trendymag_option('linkedin-link');
            if ($linkedin_url) { ?>
                <li><a href="<?php echo esc_url($linkedin_url);?>"><i class="fa fa-linkedin"></i></a></li>
            <?php }
            
            $vimeo_url = trendymag_option('vimeo-link');
            if ($vimeo_url) { ?>
                <li><a href="<?php echo esc_url($vimeo_url);?>"><i class="fa fa-vimeo"></i></a></li>
            <?php }
            
            $instagram_url = trendymag_option('instagram-link');
            if ($instagram_url) { ?>
                <li><a href="<?php echo esc_url($instagram_url);?>"><i class="fa fa-instagram"></i></a></li>
            <?php }

            $dribbble_url = trendymag_option('dribbble-link');
            if ($dribbble_url) { ?>
                <li><a href="<?php echo esc_url($dribbble_url);?>"><i class="fa fa-dribbble"></i></a></li>
            <?php }

            $behance_url = trendymag_option('behance-link');
            if ($behance_url) { ?>
                <li><a href="<?php echo esc_url($behance_url);?>"><i class="fa fa-behance"></i></a></li>
            <?php }
        ?>
    </ul>
</div>