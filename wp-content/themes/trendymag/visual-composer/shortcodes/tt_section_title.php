<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    // Color option
    $title_color = "";
    $separator_color = "";
    $title_tag = $tt_atts['title_tag'];
    $font_size = 'font-size:'.$tt_atts['font_size'].';';

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].';';
    endif;

    if ($tt_atts['separator_color_option'] == 'custom-color') :
        $separator_color = 'background-color:'.$tt_atts['separator_color'].';';
    endif;

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

?>


    <div class="sction-title-wrapper <?php echo esc_attr($tt_atts['el_class'] .' '. $tt_atts['title_alignment'].' '.$css_class); ?>">

        <<?php echo esc_attr($title_tag); ?> style="<?php echo esc_attr($title_color.' '.$font_size);?>" class="section-title <?php echo esc_attr($tt_atts['title_color_option'].' '.$tt_atts['title_transform']);?>"><?php echo esc_html($tt_atts['title'])?></<?php echo esc_attr($title_tag); ?>>

        <?php if ($tt_atts['section_separator'] == 'yes' ) : ?>
            <span class="separator" style="<?php echo esc_attr($separator_color);?>"></span>
        <?php endif; ?>

    </div> <!-- .section-intro -->

<?php echo ob_get_clean();