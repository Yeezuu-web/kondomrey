<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	$categories = get_categories();
	$lists = array();

	foreach($categories as $category) {
		$lists[$category->name] = $category->cat_ID;
	}

	// Latest blog element
	vc_map( array(
		'name'        => esc_html__( 'Category News', 'trendymag'),
		'base'        => 'tt_category_layout_one',
		'icon'        => 'fa fa-qrcode',
		'category'    => esc_html__( 'TT Elements', 'trendymag'),
		'description' => esc_html__( 'Show off news from a category (for mega menu)', 'trendymag'),
		'params'      => array(

			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Categories', 'trendymag' ),
				'param_name' 	=> 'categories',
				'value'			=> $lists,
				'admin_label' 	=> true,
				'description' 	=> esc_html__( 'Select category to show post', 'trendymag' ),
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Total Items', 'trendymag'),
				'param_name' 	=> 'total_item',
				'value' 		=> '7',
				'admin_label' 	=> true,
				'description' 	=> esc_html__('Set max limit for items', 'trendymag')
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Post offset', 'trendymag'),
				'param_name' 	=> 'offset',
				'description' 	=> esc_html__('number of post to displace or pass over. The offset parameter is ignored when total item => -1 (show all posts) is used.', 'trendymag')
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
				'param_holder_class' => 'vc_grid-data-type-not-ids'
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
				'group'			=> 'Settings',
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
				'group'			=> 'Settings',
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
				'group'			=> 'Settings',
				'description' 	=> esc_html__( 'You can show or hide post comment', 'trendymag')
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
		class WPBakeryShortCode_TT_Category_Layout_One extends WPBakeryShortCode {
		}
	}
endif;