<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $gradient_1 = $tt_atts['gradient_color_1'];
    $gradient_2 = $tt_atts['gradient_color_2'];

    $gradient_custom_color_1 = $tt_atts['gradient_custom_color_1'];
    $gradient_custom_color_2 = $tt_atts['gradient_custom_color_2'];

    $tt_link     = vc_build_link($tt_atts['custom_link']);
    $tt_a_href   = $tt_link['url'];
    $tt_a_title  = $tt_link['title'];
    $tt_a_target  = $tt_link['target'];

    $colors = array(
        'blue' => '#5472d2',
        'turquoise' => '#00c1cf',
        'pink' => '#fe6c61',
        'violet' => '#8d6dc4',
        'peacoc' => '#4cadc9',
        'chino' => '#cec2ab',
        'mulled-wine' => '#50485b',
        'vista-blue' => '#75d69c',
        'orange' => '#f7be68',
        'sky' => '#5aa1e3',
        'green' => '#6dab3c',
        'juicy-pink' => '#f4524d',
        'sandy-brown' => '#f79468',
        'purple' => '#b97ebb',
        'black' => '#2a2a2a',
        'grey' => '#ebebeb',
        'white' => '#ffffff',
    );

    ob_start(); ?>

<div class="gradient-banner-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <?php 

    $uid = uniqid();

    if ($tt_atts['gradient_style'] == 'gradient' || $tt_atts['gradient_style'] == 'gradient-custom') :
        
        $gradient_color_1 = 'rgba('.trendymag_hex2rgb($colors[ $gradient_1 ]).', '.$tt_atts['gradient_opacity_1'].')';
        $gradient_color_2 = 'rgba('.trendymag_hex2rgb($colors[ $gradient_2 ]).', '.$tt_atts['gradient_opacity_2'].')';

        if ( 'gradient-custom' === $tt_atts['gradient_style'] ) {
            $gradient_color_1 = $gradient_custom_color_1;
            $gradient_color_2 = $gradient_custom_color_2;
        }

        $gradient_css = array();
        $gradient_css[] = 'background-color: ' . $gradient_color_1;

        $gradient_css[] = 'background-image: -moz-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ')';
        $gradient_css[] = 'background-image: -webkit-gradient(left top, left bottom, color-stop(30%, ' . $gradient_color_1 . '), color-stop(100%, ' . $gradient_color_2 . '))';
        $gradient_css[] = 'background-image: -webkit-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . '100%)';
        $gradient_css[] = 'background-image: -o-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
        $gradient_css[] = 'background-image: -ms-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
        $gradient_css[] = 'background-image: linear-gradient(to bottom, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
        $gradient_css[] = 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' . $gradient_color_1 . ', endColorstr=' . $gradient_color_2 . ', GradientType=0 )';

        echo '<style type="text/css">.image-overlay.tt_banner-gradient-bg-' . $uid . '{' . implode( ';', $gradient_css ) . ';' . '}</style>';
    endif; ?>

    <div class="gradient-banner">
        <?php $tt_image_src = wp_get_attachment_image_src( $tt_atts['banner_image'], 'full' ); ?>
        <img class="img-responsive" src="<?php echo esc_url($tt_image_src[0]); ?>" alt="<?php echo esc_attr($tt_atts['banner_title']); ?>"/>

        <?php if ($tt_atts['banner_title']): ?>
            <h2><?php echo esc_html($tt_atts['banner_title']); ?></h2>
        <?php endif; ?>
        
        <div class="image-overlay tt_banner-gradient-bg-<?php echo esc_attr($uid); ?>"></div>
        
        <?php if ($tt_atts['link_enable'] == 'yes'): ?>
            <a href="<?php echo esc_url($tt_a_href); ?>" title="<?php echo esc_attr($tt_a_title); ?>" target="<?php echo esc_attr($tt_a_target); ?>"><?php echo esc_html($tt_atts['banner_title']); ?></a>
        <?php endif; ?>
    </div> <!-- .gradient-banner -->

</div> <!-- .gradient-banner-wrapper -->

<?php echo ob_get_clean();