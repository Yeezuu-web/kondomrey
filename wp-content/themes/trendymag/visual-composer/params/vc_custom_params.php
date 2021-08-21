<?php
	if ( ! defined( 'ABSPATH' ) ) :
	    exit; // Exit if accessed directly
	endif;

	// vc remove param
	vc_remove_param( 'vc_row', 'el_class' );
	vc_remove_param( 'vc_column', 'el_class' );
	vc_remove_param( 'vc_row', 'full_width' );
	vc_remove_param( 'vc_row', 'gap' );
	vc_remove_param( 'vc_btn', 'color' );
	vc_remove_param( 'vc_btn', 'el_class' );


	// add param on row
	$row_attr = array(
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Content Width', 'trendymag'),
			'param_name' 	=> 'section_content_width',
			'value' 		=> array(
				esc_html__( 'Fixed Width', 'trendymag' ) => 'container',
				esc_html__( 'Full Width', 'trendymag' ) => 'container-fullwidth',
			),
			'description' 	=> esc_html__( 'Select content width', 'trendymag' ),
			'weight'		=> 1
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns gap', 'trendymag' ),
			'param_name' => 'gap',
			'value' => array(
				'0px' => '0',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'std' => '30',
			'description' => esc_html__( 'Select gap between columns in row, only for vc created column.', 'trendymag' ),
		),

		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Apply overlay ?', 'trendymag' ),
			'param_name'  => 'apply_overlay',
			'description' => esc_html__( 'If you want to apply overlay color then check this option', 'trendymag' ),
		),

		array(
	        'type'        =>'colorpicker',
	        'heading'     => esc_html__( 'Select color', 'trendymag' ),
	        'param_name'  => 'overlay_color',
	        'description' => esc_html__( 'Select section overlay color', 'trendymag' ),
	        'dependency'  => array(
	            'element'   => 'apply_overlay',
	            'not_empty' => true
	        )
	    ),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'trendymag' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'trendymag' )
		)
	);
	vc_add_params( 'vc_row', $row_attr );

	// add param on column
	$column_attr = array(
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Sticky Column', 'trendymag' ),
			'param_name'  => 'sticky_column',
			'description' => esc_html__( 'If you want to make this column sticky then check this option', 'trendymag' ),
		),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'trendymag' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'trendymag' )
		)
	);
	vc_add_params( 'vc_column', $column_attr );



	// add param on button
	$button_attr = array(
		array(
			'type' 					=> 'dropdown',
			'heading' 				=> esc_html__( 'Color', 'trendymag' ),
			'param_name' 			=> 'color',
			'description' 			=> esc_html__( 'Select button color.', 'trendymag' ),
			'param_holder_class' 	=> 'vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
				esc_html__('Theme Primary', 'trendymag' ) => 'theme_primary_color',
				esc_html__('Theme Default', 'trendymag' ) => 'theme_default_color',
				esc_html__('Blue', 'trendymag' ) => 'blue',
				esc_html__('Turquoise', 'trendymag' ) => 'turquoise',
				esc_html__('Pink', 'trendymag' ) => 'pink',
				esc_html__('Violet', 'trendymag' ) => 'violet',
				esc_html__('Peacoc', 'trendymag' ) => 'peacoc',
				esc_html__('Chino', 'trendymag' ) => 'chino',
				esc_html__('Mulled Wine', 'trendymag' ) => 'mulled_wine',
				esc_html__('Vista Blue', 'trendymag' ) => 'vista_blue',
				esc_html__('Grey', 'trendymag' ) => 'grey',
				esc_html__('Black', 'trendymag' ) => 'black',
				esc_html__('Orange', 'trendymag' ) => 'orange',
				esc_html__('Sky', 'trendymag' ) => 'sky',
				esc_html__('Green', 'trendymag' ) => 'green',
				esc_html__('Juicy pink', 'trendymag' ) => 'juicy_pink',
				esc_html__('Sandy brown', 'trendymag' ) => 'sandy_brown',
				esc_html__('Purple', 'trendymag' ) => 'purple',
				esc_html__('White', 'trendymag' ) => 'white'
			),
			'std' => 'grey',
			// must have default color grey
			'dependency' => array(
				'element' => 'style',
				'value_not_equal_to' => array(
					'custom',
					'outline-custom',
					'gradient',
					'gradient-custom',
				),
			)
		),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'trendymag' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'trendymag' )
		)
	);
	vc_add_params( 'vc_btn', $button_attr );