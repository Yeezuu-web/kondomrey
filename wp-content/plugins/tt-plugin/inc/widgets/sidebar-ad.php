<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


class TT_Ads_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'tt_ads_widget', // Base ID
            __('TrendyMag Ads', 'tt-pl-textdomain'), // Name
            array('description' => esc_html__('Displays ads on sidebar', 'tt-pl-textdomain'))
        );
    }

    public function form($instance) {
        $defaults = array(
            'title'        => '',
            'ad_list'      => ''
        );

        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title: ', 'tt-pl-textdomain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('authors'); ?>"><?php esc_html_e('Select Author', 'tt-pl-textdomain'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('ad_list'); ?>" name="<?php echo $this->get_field_name('ad_list'); ?>" style="width:100%;">
                <?php
                    $ads_lists = array(
                        'left-sidebar-ad' => esc_html__('Sidebar ad one', 'trendymag'),
                        'right-sidebar-ad' => esc_html__('Sidebar ad two', 'trendymag')
                    );

                    foreach ($ads_lists as $key => $list) : ?>
                        <option value="<?php echo esc_attr($key); ?>" <?php selected($instance['ad_list'], $key); ?>><?php echo esc_html($list); ?></option>
                    <?php endforeach;
                ?>
            </select>
            <em><?php echo sprintf(esc_html__('Ad management option can be found on %s', 'trendymag'), '<a href="'.admin_url('?page=TrendyMag&tab=12').'">'.esc_html__('TrendyMag Options', 'trendymag').'</a>'); ?></em>
        </p>
    <?php }

    public function update($new_instance, $old_instance){
        $instance = $old_instance;

        $instance[ 'title' ] = (!empty($new_instance[ 'title' ])) ? strip_tags($new_instance[ 'title' ]) : '';
        $instance[ 'ad_list' ] = (!empty($new_instance[ 'ad_list' ])) ? strip_tags($new_instance[ 'ad_list' ]) : '';

        return $instance;
    }

    public function widget($args, $instance) {
        echo $args[ 'before_widget' ];
        $title = apply_filters('widget_title', $instance[ 'title' ]);
        if (!empty($title)) {
            echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
        } ?>

        <div class="sidebar-promo">
            <?php if (isset($instance[ 'ad_list' ])) :
                if ($instance[ 'ad_list' ] == 'left-sidebar-ad') {
                    // left sidebar ad
                    if(trendymag_option('ls-ad-visibility', false, true)) :
                        $lg_visibiltiy = "";
                        $md_visibility = "";
                        $sm_visibility = "";
                        $xs_visibility = "";
                        if (trendymag_option('ls-desktop-lg-visibility') == '0') :
                            $lg_visibiltiy = "hidden-lg";
                        endif;
                        if (trendymag_option('ls-desktop-md-visibility') == '0') :
                            $md_visibility = "hidden-md";
                        endif;
                        if (trendymag_option('ls-tablet-visibility') == '0') :
                            $sm_visibility = "hidden-sm";
                        endif;
                        if (trendymag_option('ls-mobile-visibility') == '0') :
                            $xs_visibility = "hidden-xs";
                        endif;
                        ?>
                        <div class="promo-wrap <?php echo esc_attr($lg_visibiltiy.' '.$md_visibility.' '.$sm_visibility.' '.$xs_visibility); ?>">
                            <?php if (trendymag_option('ls-ad-title')): ?>
                                <span class="promo-title"><?php echo esc_html(trendymag_option('ls-ad-title'));?></span>
                            <?php endif; ?>

                            <?php if (trendymag_option('ls-ad-type') == 'image-ad') :
                                if (trendymag_option('ls-image-link')) { ?>
                                    <a href="<?php echo esc_url(trendymag_option('ls-image-link'));?>" target="_blank"><img class="img-responsive" src="<?php echo esc_url(trendymag_option('ls-image-ad-opt', 'url')); ?>" alt="<?php esc_attr('Left sidebar ad','trendymag');?>"></a>
                                <?php } else { ?>
                                    <img class="img-responsive" src="<?php echo esc_url(trendymag_option('ls-image-ad-opt', 'url')); ?>" alt="<?php esc_attr('Left sidebar ad','trendymag');?>">
                                <?php }
                            elseif(trendymag_option('ls-ad-type') == 'adsense-ad') :
                                echo trendymag_option('ls-ad-codes');
                            endif; ?>
                        </div>
                    <?php endif;
                } elseif($instance[ 'ad_list' ] == 'right-sidebar-ad') {
                    if(trendymag_option('rs-ad-visibility', false, true)) :
                        $lg_visibiltiy = "";
                        $md_visibility = "";
                        $sm_visibility = "";
                        $xs_visibility = "";
                        if (trendymag_option('rs-desktop-lg-visibility') == '0') :
                            $lg_visibiltiy = "hidden-lg";
                        endif;
                        if (trendymag_option('rs-desktop-md-visibility') == '0') :
                            $md_visibility = "hidden-md";
                        endif;
                        if (trendymag_option('rs-tablet-visibility') == '0') :
                            $sm_visibility = "hidden-sm";
                        endif;
                        if (trendymag_option('rs-mobile-visibility') == '0') :
                            $xs_visibility = "hidden-xs";
                        endif;
                        ?>
                        <div class="promo-wrap <?php echo esc_attr($lg_visibiltiy.' '.$md_visibility.' '.$sm_visibility.' '.$xs_visibility); ?>">
                            <?php if (trendymag_option('rs-ad-title')): ?>
                                <span class="promo-title"><?php echo esc_html(trendymag_option('rs-ad-title'));?></span>
                            <?php endif; ?>

                            <?php if (trendymag_option('rs-ad-type') == 'image-ad') : 
                                if (trendymag_option('rs-image-link')) { ?>
                                    <a href="<?php echo esc_url(trendymag_option('rs-image-link'));?>" target="_blank"><img class="img-responsive" src="<?php echo esc_url(trendymag_option('rs-image-ad-opt', 'url')); ?>" alt="<?php esc_attr('Right sidebar ad','trendymag');?>"></a>
                                <?php } else { ?>
                                    <img class="img-responsive" src="<?php echo esc_url(trendymag_option('rs-image-ad-opt', 'url')); ?>" alt="<?php esc_attr('Right sidebar ad','trendymag');?>">
                                <?php }
                            elseif(trendymag_option('rs-ad-type') == 'adsense-ad') :
                                echo trendymag_option('rs-ad-codes');
                            endif; ?>
                        </div>
                    <?php endif;
                }
            endif; ?>
        </div> <!-- .sidebar-promo -->
        <?php echo $args[ 'after_widget' ];
    }
}


// register widgets
if (!function_exists('tt_sidebar_ads_register')) {
    function tt_sidebar_ads_register() {
        register_widget('TT_Ads_Widget');
    }
    add_action('widgets_init', 'tt_sidebar_ads_register');
}