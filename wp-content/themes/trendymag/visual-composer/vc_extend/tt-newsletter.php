<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Newsletter element
    vc_map( array(
        'name'        => esc_html__( 'TT Newsletter', 'trendymag' ),
        'base'        => 'tt_newsletter',
        'icon'        => 'fa fa-envelope',
        'category'    => esc_html__( 'TT Elements', 'trendymag' ),
        'description' => esc_html__( 'Newsletter subscribe form', 'trendymag' ),
        'params'      => array(
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'trendymag' ),
                'param_name'  => 'el_class',
                'admin_label' => true,
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'trendymag' )
            ),
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_newsletter extends WPBakeryShortCode {
        }
    }
endif;