<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => - 1,
	);

	$posts = array();

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			$posts[ get_the_title() ] = get_the_id();
		endwhile;
	endif;
	wp_reset_postdata();


	// Latest blog element
	vc_map( array(
		'name'        => esc_html__( 'Featured News', 'trendymag'),
		'base'        => 'tt_featured_news',
		'icon'        => 'fa fa-qrcode',
		'category'    => esc_html__( 'TT Elements', 'trendymag'),
		'description' => esc_html__( 'Select your desire post as featured news', 'trendymag'),
		'params'      => array(
			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Element Title', 'trendymag'),
				'param_name' 	=> 'element_title',
				'admin_label' 	=> true,
				'description' 	=> esc_html__('Enter element title', 'trendymag')
			),
			
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Select news', 'trendymag'),
				'param_name'  	=> 'post_id',
				'value'       	=> $posts,
				'admin_label' 	=> true,
				'description' 	=> esc_html__( 'Select news that would you like to display', 'trendymag')
			),

			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__('Post image width', 'trendymag'),
				'param_name' 	=> 'post_width',
				'value' 		=> array(
					esc_html__('1/4 Column (one fourth of 12 grid)', 'trendymag') => 'trendymag-one-fourth',
					esc_html__('2/4 Column (two fourth of 12 grid)', 'trendymag') => 'trendymag-half',
					esc_html__('1/3 Column (one third of 12 grid)', 'trendymag') => 'trendymag-one-third',
					esc_html__('2/3 Column (two third of 12 grid)', 'trendymag') => 'trendymag-two-third'
				),
				'admin_label' 	=> true,
				'std'			=> 'trendymag-half',
				'description' 	=> esc_html__('Select post image width by column', 'trendymag')
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Post height', 'trendymag'),
				'param_name'  	=> 'post_height',
				'description' 	=> esc_html__( 'Select post height in px, default height is 362px', 'trendymag')
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Show/Hide category', 'trendymag'),
				'param_name'  	=> 'show_category',
				'value'		 	=> array(
					esc_html__('Show', 'trendymag') => 'show',
					esc_html__('Hide', 'trendymag') => 'hide',
				),
				'admin_label' 	=> true,
				'std'			=> 'show',
				'description' 	=> esc_html__( 'You can show or hide category name', 'trendymag')
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Category background colors', 'trendymag'),
				'param_name'  	=> 'cat_bg_color',
				'param_holder_class' => 'tt-colored-dropdown',
				'value'			=> array(
					esc_html__('Theme color', 'trendymag') => 'theme-bg-color',
					esc_html__('Yellow', 'trendymag') => 'yellow-bg',
					esc_html__('Spring Green', 'trendymag') => 'spring-green-bg',
					esc_html__('Deep Sky Blue', 'trendymag') => 'deep-sky-blue-bg',
					esc_html__('Electric Purple', 'trendymag') => 'electric-purple-bg',
					esc_html__('Psychedelic Purple', 'trendymag') => 'psychedelic-purple-bg',
					esc_html__('Light Sea Green', 'trendymag') => 'light-sea-green-bg',
					esc_html__('Han Purple', 'trendymag') => 'han-purple-bg',
					esc_html__('Orange Peel', 'trendymag') => 'orange-peel-bg',
					esc_html__('Transparent', 'trendymag') => 'color-transparent-bg'
				),
				'description' 	=> esc_html__( 'Change category background color', 'trendymag'),
				'dependency'  	=> array(
					'element' 	=> 'show_category',
					'value'   	=> array('show')
				)
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Show/Hide date', 'trendymag'),
				'param_name'  	=> 'show_date',
				'value'		 	=> array(
					esc_html__('Show', 'trendymag') => 'show',
					esc_html__('Hide', 'trendymag') => 'hide',
					),
				'std'			=> 'show',
				'admin_label' 	=> true,
				'description' 	=> esc_html__( 'You can show or hide post date', 'trendymag')
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
		class WPBakeryShortCode_TT_Featured_News extends WPBakeryShortCode {
		}
	}
endif;