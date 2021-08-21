<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :
	vc_map( array(
        'name'        => esc_html__( 'TT Image Gallery', 'trendymag' ),
        'base'        => 'tt_gallery',
        'icon'        => 'fa fa-picture-o',
        'category'    => esc_html__( 'TT Elements', 'trendymag' ),
        'description' => esc_html__( 'Displays gallery with image', 'trendymag' ),
        'params'      => array(

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Image source', 'trendymag' ),
                'param_name'  => 'image_source',
                'value'       => array(
                    esc_html__('Image from post', 'trendymag') => 'post-source',
                    esc_html__('Image from media', 'trendymag')  => 'media-source'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select an image source', 'trendymag' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Image type', 'trendymag' ),
                'param_name'  => 'image_type',
                'value'       => array(
                    esc_html__('Portrait', 'trendymag') => 'image-portrait',
                    esc_html__('Landscape', 'trendymag')  => 'image-landscape'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select an image type', 'trendymag' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Post Source', 'trendymag' ),
                'param_name'  => 'post_source',
                'value'       => array(
                    esc_html__('Latest post', 'trendymag') => 'latest-post',
                    esc_html__('Post from category', 'trendymag')  =>'category-post'
                ),
                'dependency'    => array(
                    'element'   => 'image_source',
                    'value'     => array('post-source')
                ),
                'description' => esc_html__( 'Select post source', 'trendymag' )
            ),

            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Post from category', 'trendymag' ),
                'param_name'    => 'taxonomies',
                'settings'      => array(
                    'multiple'      => true,
                    'values'        => trendymag_category_slug(),
                    'unique_values' => true,
                    'display_inline' => true
                ),
                'param_holder_class' => 'vc_not-for-custom',
                'description' => esc_html__( 'Enter categories name to show post from specific category, multiple category allowed', 'trendymag' ),
                'dependency'    => array(
                    'element'   => 'post_source',
                    'value'     => array('category-post')
                )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Total Items', 'trendymag'),
                'param_name'    => 'total_item',
                'value'         => '6',
                'admin_label'   => true,
                'description'   => esc_html__('Set max limit for items', 'trendymag'),
                'dependency'    => array(
                    'element'   => 'image_source',
                    'value'     => array('post-source')
                )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__('Image caption', 'trendymag'),
                'param_name'    => 'image_caption',
                'description'   => esc_html__('enable/disable image caption', 'trendymag'),
                'value'       => array(
                    esc_html__('Enable', 'trendymag') => 'enable-image-caption',
                    esc_html__('Disable', 'trendymag')  =>'disable-image-caption'
                ),
                'std'           => 'enable-image-caption',
                'dependency'    => array(
                    'element'   => 'image_source',
                    'value'     => array('post-source')
                )
            ),

            array(
				'type' => 'attach_images',
				'heading' => esc_html__( 'Images', 'trendymag'),
				'param_name' => 'images',
				'description' => esc_html__( 'Select images from media library.', 'trendymag' ),
				'dependency'  => array(
	                'element' => 'image_source',
	                'value'   => array( 'media-source' )
	            )
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
        class WPBakeryShortCode_tt_Gallery extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )