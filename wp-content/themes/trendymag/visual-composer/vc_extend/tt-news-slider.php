<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
		'name'        => esc_html__( 'News Slider', 'trendymag'),
		'base'        => 'tt_news_slider',
		'icon'        => 'fa fa-image',
		'category'    => esc_html__( 'TT Elements', 'trendymag'),
		'description' => esc_html__( 'Show off news with slider', 'trendymag'),
		'params'      => array(

			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__('Posts Source', 'trendymag'),
				'param_name' 	=> 'post_source',
				'value' 		=> array(
					esc_html__('From all post', 'trendymag') => "most-recent",
					esc_html__('By Category', 'trendymag') => "by-category",
					esc_html__('By Tag', 'trendymag') => "by-tag",
					esc_html__('By Post ID', 'trendymag') => "by-id",
					esc_html__('By Author', 'trendymag') => "by-author",
				),
				'admin_label' 	=> true,
				'description' 	=> esc_html__('Select posts source that you like to show.', 'trendymag')
			),

			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__('Image size', 'trendymag'),
				'param_name' 	=> 'image_size',
				'value' 		=> array(
					esc_html__('Slider normal size', 'trendymag') => "trendymag-blog-thumbnail",
					esc_html__('Slider medium size', 'trendymag') => "trendymag-recent-post",
					esc_html__('Slider large size', 'trendymag') => "trendymag-two-third",
					esc_html__('Slider extra large size', 'trendymag') => "trendymag-news-cover-thumbnail",
				),
				'std' 			=> 'trendymag-blog-thumbnail',
				'description' 	=> esc_html__('Select slider image size.', 'trendymag')
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
				'description' => esc_html__( 'Enter categories name to show post from specific category, multiple category allowed', 'trendymag' ),
				'dependency'  	=> array(
					'element' 	=> 'post_source',
					'value'   	=> array('by-category')
				)
			),

			array(
				'type' 			=> 'autocomplete',
				'heading' 		=> esc_html__( 'Post from tag', 'trendymag' ),
				'param_name' 	=> 'tags',
				'settings' 		=> array(
					'multiple' 		=> true,
					'values'		=> trendymag_tag_list(),
					'unique_values' => true,
					'display_inline' => true
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__( 'Enter tags name to show post from specific tag, multiple tag allowed', 'trendymag' ),
				'dependency'  	=> array(
					'element' 	=> 'post_source',
					'value'   	=> array('by-tag')
				)
			),

			array(
				'type' 			=> 'autocomplete',
				'heading' 		=> esc_html__( 'Post from author', 'trendymag' ),
				'param_name' 	=> 'authors',
				'settings' 		=> array(
					'multiple' 		=> true,
					'values'		=> trendymag_autor_list(),
					'unique_values' => true,
					'display_inline' => true
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__( 'Enter author name to show post from specific author, multiple author allowed', 'trendymag' ),
				'dependency'  	=> array(
					'element' 	=> 'post_source',
					'value'   	=> array('by-author')
				)
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Post from ID', 'trendymag'),
				'param_name' 	=> 'post_id',
				'description' 	=> esc_html__('Enter the post IDs you would like to display separated by comma', 'trendymag'),
				'dependency'  	=> array(
					'element' 	=> 'post_source',
					'value'   	=> array('by-id')
				)
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Total Items', 'trendymag'),
				'param_name' 	=> 'total_item',
				'value' 		=> '3',
				'admin_label' 	=> true,
				'description' 	=> esc_html__('Set max limit for items', 'trendymag'),
				'dependency'  	=> array(
					'element' 	=> 'post_source',
					'value'   	=> array('most-recent', 'by-category', 'by-tag', 'by-author')
				)
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Post offset', 'trendymag'),
				'param_name' 	=> 'offset',
				'description' 	=> esc_html__('number of post to displace or pass over. The offset parameter is ignored when total item => -1 (show all posts) is used.', 'trendymag'),
				'dependency'  	=> array(
					'element' 	=> 'post_source',
					'value'   	=> array('most-recent', 'by-category', 'by-tag', 'by-author')
				)
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
				'dependency'  	=> array(
					'element' 	=> 'post_source',
					'value'   	=> array('most-recent', 'by-category', 'by-tag', 'by-author')
				)
			),

			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__('Post height', 'trendymag'),
				'param_name' 	=> 'post_height',
				'description' 	=> esc_html__('Enter post height in pixel if needed', 'trendymag')
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
		class WPBakeryShortCode_TT_News_Slider extends WPBakeryShortCode {
		}
	}
endif;