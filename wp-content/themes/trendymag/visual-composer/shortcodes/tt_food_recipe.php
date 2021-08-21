<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();


    // recipe times
    $recipe_times = (array) vc_param_group_parse_atts( $tt_atts['recipe_time'] );
    $times = array();

    foreach ( $recipe_times as $data ) :
        $time_data = $data;
        $time_data['time_title'] = isset( $data['time_title'] ) ? $data['time_title'] : '';
        $time_data['time'] = isset( $data['time'] ) ? $data['time'] : '';

        $times[] = $time_data;
    endforeach;


    // nutrition
    $nutrition_amounts = (array) vc_param_group_parse_atts( $tt_atts['nutrition'] );
    $nutritions = array();

    foreach ( $nutrition_amounts as $data ) :
        $nutrition_data = $data;
        $nutrition_data['nutrition_title'] = isset( $data['nutrition_title'] ) ? $data['nutrition_title'] : '';
        $nutrition_data['nutrition_amount'] = isset( $data['nutrition_amount'] ) ? $data['nutrition_amount'] : '';
        $nutrition_data['nutrition_percent'] = isset( $data['nutrition_percent'] ) ? $data['nutrition_percent'] : '';

        $nutritions[] = $nutrition_data;
    endforeach;
    ?>


<div class="tt-recipe-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    
    <button class="tt-print"><i class="fa fa-print" aria-hidden="true"></i></button>

    <?php if ($tt_atts['title']): ?>
        <div class="recipe-title">
            <h3><?php echo esc_html($tt_atts['title']); ?></h3>
        </div>
    <?php endif; ?>

    <?php if ($times): ?>
        <div class="recipe-time clearfix">
            <ul>
                <?php foreach ($times as $time): ?>
                    <li>
                        <div class="recipe-time-content clearfix">
                            <span><?php echo esc_html($time['time_title']); ?></span><?php echo esc_html($time['time']); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="recipe-content clearfix">
        <?php echo wpb_js_remove_wpautop($content, true);?>
    </div>
    
    <?php if ($nutritions): ?>
        <div class="nutrition-amount clearfix">
            <?php if ($tt_atts['nutrition_section_title']): ?>
                <h4><?php echo esc_html($tt_atts['nutrition_section_title']); ?></h4>
            <?php endif; ?>
            <ul>
                <?php foreach ($nutritions as $nutrition): ?>
                    <li>
                        <div class="nutrition-content">
                            <span><?php echo esc_html($nutrition['nutrition_title']); ?><strong><?php echo esc_html($nutrition['nutrition_amount']); ?></strong></span>
                            <span><?php echo esc_html($nutrition['nutrition_percent']); ?></span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div> <!-- .tt-recipe-wrapper -->