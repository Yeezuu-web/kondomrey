<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	// Latest blog element
	vc_map( array(
		'name'        => esc_html__( 'Recent News with filter', 'trendymag'),
		'base'        => 'tt_recent_news_filter',
		'icon'        => 'fa fa-qrcode',
		'category'    => esc_html__( 'TT Elements', 'trendymag'),
		'description' => esc_html__( 'Show off recent news with filter', 'trendymag'),
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
				'heading'     	=> esc_html__( 'Post style', 'trendymag'),
				'param_name'  	=> 'post_style',
				'value' 		=> array(
					esc_html__('Style one', 'trendymag') => 'style-one',
					esc_html__('Style two', 'trendymag') => 'style-two'
				),
				'admin_label' 	=> true,
				'description' 	=> esc_html__( 'Select recent post style', 'trendymag')
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Default filter text', 'trendymag'),
				'param_name' 	=> 'filter_text',
				'value' 		=> esc_html__('All Category', 'trendymag'),
				'description' 	=> esc_html__('Enter element title', 'trendymag')
			),

			array(
				'type' 			=> 'autocomplete',
				'heading' 		=> esc_html__( 'Post from category', 'trendymag' ),
				'param_name' 	=> 'taxonomies',
				'settings' 		=> array(
					'multiple' 		=> true,
					'values'		=> trendymag_category_list(),
					'unique_values' => true,
					'display_inline' => true
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__( 'Enter categories name to show post from specific category, multiple category allowed', 'trendymag' )
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Total Items', 'trendymag'),
				'param_name' 	=> 'total_item',
				'value' 		=> '3',
				'admin_label' 	=> true,
				'description' 	=> esc_html__('Set max limit for items', 'trendymag'),
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Post offset', 'trendymag'),
				'param_name' 	=> 'offset',
				'description' 	=> esc_html__('number of post to displace or pass over. The offset parameter is ignored when total item => -1 (show all posts) is used.', 'trendymag'),
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Order by', 'trendymag'),
				'param_name'  	=> 'orderby',
				'value'		 	=> array(
					esc_html__('Date', 'trendymag') => 'date',
					esc_html__('Order by post ID', 'trendymag') => 'ID',
					esc_html__('Author', 'trendymag') => 'author',
					esc_html__('Title', 'trendymag') => 'title',
					esc_html__('Last modified date', 'trendymag') => 'modified',
					esc_html__('Post parent ID', 'trendymag') => 'parent',
					esc_html__('Number of comments', 'trendymag') => 'comment_count',
					esc_html__('Menu order', 'trendymag') => 'menu_order',
					esc_html__('Meta value', 'trendymag') => 'meta_value',
					esc_html__('Meta value number', 'trendymag') => 'meta_value_num',
					esc_html__('Random order', 'trendymag') => 'rand'
				),
				'admin_label' 	=> true,
				'std'			=> 'date',
				'description' 	=> esc_html__( 'Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'trendymag')
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Sort order', 'trendymag'),
				'param_name'  	=> 'order',
				'value'		 	=> array(
					esc_html__('Descending', 'trendymag') => 'DESC',
					esc_html__('Ascending', 'trendymag') => 'ASC',
				),
				'admin_label' 	=> true,
				'std'			=> 'DESC',
				'description' 	=> esc_html__( 'Select sorting order.', 'trendymag')
			),

			array(
				'type' 			=> 'autocomplete',
				'heading' 		=> esc_html__( 'Exclude', 'trendymag' ),
				'param_name' 	=> 'exclude',
				'description' 	=> esc_html__( 'Exclude posts by title.', 'trendymag' ),
				'settings' 		=> array(
					'values'	=> trendymag_post_data(),
					'multiple' 	=> true,
				),
				'param_holder_class' => 'vc_grid-data-type-not-ids',
			),

			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__('Grid column', 'trendymag'),
				'param_name' 	=> 'grid_column',
				'value' 		=> array(
					esc_html__('2 Column', 'trendymag') => '6',
					esc_html__('3 Column', 'trendymag') => '4',
					esc_html__('4 Column', 'trendymag') => '3',
				),
				'admin_label' 	=> true,
				'std'			=> '4',
				'group'			=> 'Post Settings',
				'description' 	=> esc_html__('Select post grid column', 'trendymag')
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Post height', 'trendymag'),
				'param_name' 	=> 'post_height',
				'group'			=> 'Post Settings',
				'description' 	=> esc_html__('Enter post height in pixel if needed', 'trendymag')
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Show/Hide Filter', 'trendymag'),
				'param_name'  	=> 'filter_visibility',
				'value'		 	=> array(
					esc_html__('Show', 'trendymag') => 'show',
					esc_html__('Hide', 'trendymag') => 'hide',
				),
				'admin_label' 	=> true,
				'std'			=> 'show',
				'group'			=> 'Appearance Settings',
				'description' 	=> esc_html__( 'Select filter visibility option', 'trendymag')
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Filter Style', 'trendymag'),
				'param_name'  	=> 'filter_style',
				'value'		 	=> array(
					esc_html__('Dropdown Style', 'trendymag') => 'dropdown-style',
					esc_html__('Inline Style', 'trendymag') => 'inline-style',
				),
				'admin_label' 	=> true,
				'std'			=> 'dropdown-style',
				'group'			=> 'Appearance Settings',
				'description' 	=> esc_html__( 'Select filter style', 'trendymag'),
				'dependency' => array(
					'element' => 'filter_visibility',
					'value' => array( 'show' ),
				)
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
				'group'			=> 'Appearance Settings',
				'description' 	=> esc_html__( 'You can show or hide category name', 'trendymag')
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
				'group'			=> 'Appearance Settings',
				'description' 	=> esc_html__( 'You can show or hide post date', 'trendymag')
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Show/Hide comment', 'trendymag'),
				'param_name'  	=> 'show_comment',
				'value'		 	=> array(
					esc_html__('Show', 'trendymag') => 'show',
					esc_html__('Hide', 'trendymag') => 'hide',
					),
				'std'			=> 'show',
				'admin_label' 	=> true,
				'group'			=> 'Appearance Settings',
				'description' 	=> esc_html__( 'You can show or hide post comment', 'trendymag')
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Show/Hide colored border', 'trendymag'),
				'param_name'  	=> 'colored_border',
				'value'		 	=> array(
					esc_html__('Show', 'trendymag') => 'show',
					esc_html__('Hide', 'trendymag') => 'hide',
					),
				'std'			=> 'show',
				'admin_label' 	=> true,
				'group'			=> 'Appearance Settings',
				'description' 	=> esc_html__( 'You can show or hide bottom colored border', 'trendymag')
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
		class WPBakeryShortCode_TT_Recent_News_Filter extends WPBakeryShortCode {
		}
	}
endif;