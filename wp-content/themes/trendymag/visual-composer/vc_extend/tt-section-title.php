<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Section title style element
    vc_map( array(
        'name'        => esc_html__( 'Section Title style', 'trendymag' ),
        'base'        => 'tt_section_title',
        'icon'        => 'fa fa-align-center',
        'category'    => esc_html__( 'TT Elements', 'trendymag' ),
        'description' => esc_html__( 'To customize section title style', 'trendymag' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'trendymag' ),
                'param_name'  => 'title',
                'holder'      => 'h3',
                'description' => esc_html__( 'Enter title here', 'trendymag' )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Title tag', 'trendymag' ),
                'param_name'    => 'title_tag',
                'value'         => array(
                    esc_html__('H1', 'trendymag') => 'h1',
                    esc_html__('H2', 'trendymag')  =>'h2',
                    esc_html__('H3', 'trendymag')  =>'h3', 
                    esc_html__('H4', 'trendymag')  =>'h4', 
                    esc_html__('H5', 'trendymag')  =>'h5', 
                    esc_html__('H6', 'trendymag')  =>'h6', 
                ),
                'std'           => 'h2',
                'admin_label'   => true,
                'description'   => esc_html__( 'Select title tag', 'trendymag' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Font size', 'trendymag' ),
                'param_name'    => 'font_size',
                'std'           => '20px',
                'admin_label'   => true,
                'description'   => esc_html__( 'Enter font size', 'trendymag' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title Text Transform', 'trendymag' ),
                'param_name'  => 'title_transform',
                'value'       => array(
                    esc_html__('None', 'trendymag') => '',
                    esc_html__('Uppercase', 'trendymag') => 'text-uppercase',
                    esc_html__('Lowercase', 'trendymag') => 'text-lowercase',
                    esc_html__('Capitalize', 'trendymag') => 'text-capitalize'
                ),
                'std'           => 'text-capitalize',
                'admin_label'   => true,
                'description' => esc_html__( 'Select title transform', 'trendymag' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Alignment', 'trendymag' ),
                'param_name'  => 'title_alignment',
                'value'       => array(
                    esc_html__('Left', 'trendymag') => 'text-left',
                    esc_html__('Center', 'trendymag')  =>'text-center',
                    esc_html__('Right', 'trendymag')  =>'text-right' 
                ),
                'admin_label'   => true,
                'description' => esc_html__( 'Select title alignment', 'trendymag' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title color option', 'trendymag' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default Color', 'trendymag') => '',
                    esc_html__('Theme Color', 'trendymag')  =>'theme-color',
                    esc_html__('Custom Color', 'trendymag')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default title color then select theme color or select any custom color', 'trendymag' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'trendymag' ),
                'param_name'  => 'title_color',
                'description' => esc_html__( 'Change title color', 'trendymag' ),
                'dependency'  => array(
                    'element' => 'title_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator show/hide', 'trendymag' ),
                'param_name'  => 'section_separator',
                'value'       => array(
                    esc_html__('Show', 'trendymag') => 'yes',
                    esc_html__('Hide', 'trendymag')  =>'no' ,
                    ),
                'std'         => 'no',
                'admin_label'   => true,
                'description' => esc_html__( 'If you want to hide section separator then select hide', 'trendymag' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator color', 'trendymag' ),
                'param_name'  => 'separator_color_option',
                'value'       => array(
                    esc_html__('Default color', 'trendymag') => '',
                    esc_html__('Custom color', 'trendymag')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default separator color then select custom color', 'trendymag' ),
                'dependency'  => array(
                    'element' => 'section_separator',
                    'value'   => array( 'yes' )
                ),
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'trendymag' ),
                'param_name'  => 'separator_color',
                'description' => esc_html__( 'change border color', 'trendymag' ),
                'dependency'  => array(
                    'element' => 'separator_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'trendymag' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'trendymag' ),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'trendymag' ),
                'param_name'  => 'el_class',
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'trendymag' )
            )
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_TT_Section_Title extends WPBakeryShortCode {
        }
    }
endif;