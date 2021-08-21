<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	// Latest blog element
	vc_map( array(
		'name'        => esc_html__( 'Gradient Banner', 'trendymag'),
		'base'        => 'tt_gradient_banner',
		'icon'        => 'fa fa-qrcode',
		'category'    => esc_html__( 'TT Elements', 'trendymag'),
		'description' => esc_html__( 'Displays banner with gradient color', 'trendymag'),
		'params'      => array(

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Banner title', 'trendymag'),
				'param_name' 	=> 'banner_title',
				'description' 	=> esc_html__('Enter banner title here.', 'trendymag'),
			),

			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Banner image', 'trendymag'),
				'param_name' => 'banner_image',
				'description' => esc_html__( 'Select images from media library', 'trendymag' ),
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Enable link ?', 'trendymag' ),
                'param_name'  => 'link_enable',
                'value'       => array(
                    esc_html__('Yes', 'trendymag') => 'yes',
                    esc_html__('No', 'trendymag') => 'no'
                ),
                'std' 		  => 'yes',
                'description' => esc_html__( 'If you want to enable link then select yes', 'trendymag')
            ),

            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Link', 'trendymag' ),
                'param_name'  => 'custom_link',
                'description' => esc_html__( 'Enter custom link or select existing page as link', 'trendymag' ),
                'dependency' => array(
                    'element' => 'link_enable',
                    'value' => array('yes')
                )
            ),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Use custom gradient image overlay?', 'trendymag' ),
				'description' => esc_html__( 'If you like to use gradient for overlay image then select gradient option', 'trendymag' ),
				'param_name' => 'gradient_style',
				'value' => array(
					esc_html__( 'No', 'trendymag' ) => 'no',
					esc_html__( 'Gradient', 'trendymag' ) => 'gradient',
					esc_html__( 'Gradient Custom', 'trendymag' ) => 'gradient-custom',
				),
				'group'			=> 'Appearance Settings',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Gradient Color 1', 'trendymag' ),
				'param_name' => 'gradient_color_1',
				'description' => esc_html__( 'Select first color for gradient.', 'trendymag' ),
				'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
				'value' => getVcShared( 'colors-dashed' ),
				'std' => 'turquoise',
				'dependency' => array(
					'element' => 'gradient_style',
					'value' => array( 'gradient' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group'			=> 'Appearance Settings',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Gradient Color 2', 'trendymag' ),
				'param_name' => 'gradient_color_2',
				'description' => esc_html__( 'Select second color for gradient.', 'trendymag' ),
				'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
				'value' => getVcShared( 'colors-dashed' ),
				'std' => 'blue',
				// must have default color grey
				'dependency' => array(
					'element' => 'gradient_style',
					'value' => array( 'gradient' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group'			=> 'Appearance Settings',
			),

			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Opacity for Color 1', 'trendymag' ),
				'description' 	=> esc_html__( 'Change the gradient color opacity', 'trendymag' ),
				'param_name' 	=> 'gradient_opacity_1',
				'value' 		=> array(
					esc_html__( 'Select opacity', 'trendymag' ) => '',
					esc_html__( '.1', 'trendymag' ) => '.1',
					esc_html__( '.2', 'trendymag' ) => '.2',
					esc_html__( '.3', 'trendymag' ) => '.3',
					esc_html__( '.4', 'trendymag' ) => '.4',
					esc_html__( '.5', 'trendymag' ) => '.5',
					esc_html__( '.6', 'trendymag' ) => '.6',
					esc_html__( '.7', 'trendymag' ) => '.7',
					esc_html__( '.8', 'trendymag' ) => '.8',
					esc_html__( '.9', 'trendymag' ) => '.9',
					esc_html__( '1', 'trendymag' ) => '1'
				),
				'std'			=> '1',
				'dependency' 	=> array(
					'element' 	=> 'gradient_style',
					'value' 	=> array( 'gradient' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group'			=> 'Appearance Settings',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Opacity for Color 2', 'trendymag' ),
				'description' 	=> esc_html__( 'Change the gradient color opacity', 'trendymag' ),
				'param_name' 	=> 'gradient_opacity_2',
				'value' 		=> array(
					esc_html__( 'Select opacity', 'trendymag' ) => '',
					esc_html__( '.1', 'trendymag' ) => '.1',
					esc_html__( '.2', 'trendymag' ) => '.2',
					esc_html__( '.3', 'trendymag' ) => '.3',
					esc_html__( '.4', 'trendymag' ) => '.4',
					esc_html__( '.5', 'trendymag' ) => '.5',
					esc_html__( '.6', 'trendymag' ) => '.6',
					esc_html__( '.7', 'trendymag' ) => '.7',
					esc_html__( '.8', 'trendymag' ) => '.8',
					esc_html__( '.9', 'trendymag' ) => '.9',
					esc_html__( '1', 'trendymag' ) => '1'
				),
				'std'			=> '1',
				'dependency' 	=> array(
					'element' 	=> 'gradient_style',
					'value' 	=> array( 'gradient' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group'			=> 'Appearance Settings',
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Gradient Color 1', 'trendymag' ),
				'param_name' => 'gradient_custom_color_1',
				'description' => esc_html__( 'Select first color for gradient.', 'trendymag' ),
				'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
				'value' => '#dd3333',
				'dependency' => array(
					'element' => 'gradient_style',
					'value' => array( 'gradient-custom' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group'			=> 'Appearance Settings',
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Gradient Color 2', 'trendymag' ),
				'param_name' => 'gradient_custom_color_2',
				'description' => esc_html__( 'Select second color for gradient.', 'trendymag' ),
				'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
				'value' => '#eeee22',
				'dependency' => array(
					'element' => 'gradient_style',
					'value' => array( 'gradient-custom' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group'			=> 'Appearance Settings',
			),

			array(
                'type' 			=> 'css_editor',
                'heading' 		=> esc_html__( 'Css', 'trendymag' ),
                'param_name' 	=> 'css',
                'group' 		=> esc_html__( 'Design options', 'trendymag' ),
            ),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Extra class name', 'trendymag'),
				'param_name'  	=> 'el_class',
				'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'trendymag')
			)
		)
	));


	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_TT_Gradient_Banner extends WPBakeryShortCode {
		}
	}
endif;