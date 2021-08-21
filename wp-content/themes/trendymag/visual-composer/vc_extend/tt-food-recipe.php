<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT Food Recipe', 'trendymag' ),
        'base'        => 'tt_food_recipe',
        'icon'        => 'fa fa-cutlery',
        'category'    => esc_html__( 'TT Elements', 'trendymag' ),
        'description' => esc_html__( 'Displays food recipe', 'trendymag' ),
        'params'      => array(
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'trendymag' ),
                'param_name'  => 'title',
                'admin_label' => true,
                'description' => esc_html__( 'Enter recipe title', 'trendymag' )
            ),

            array(
                'type' => 'param_group',
                'heading' => esc_html__('Time', 'trendymag'),
                'param_name' => 'recipe_time',
                'description' => esc_html__('Recipe Time', 'trendymag'),
                'group'        => esc_html__('Recipe Time', 'trendymag'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'trendymag'),
                        'param_name' => 'time_title',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter title, e.g: Preparation Time', 'trendymag' )
                    ),

                    array(
                        "type"        => "textfield",
                        "heading"     => esc_html__( "Time", 'trendymag' ),
                        "param_name"  => "time",
                        'admin_label' => true,
                        "description" => esc_html__( "Enter time, e.g: 10Min", 'trendymag' )
                    ),
                ),
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Content', 'trendymag' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter recipe content', 'trendymag' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Nutrition Section Title', 'trendymag' ),
                'param_name'  => 'nutrition_section_title',
                'group'        => esc_html__('Nutrition', 'trendymag'),
                'description' => esc_html__( 'Enter Nutrition section title', 'trendymag' )
            ),

			array(
                'type' => 'param_group',
                'heading' => esc_html__('Nutrition', 'trendymag'),
                'param_name' => 'nutrition',
                'description' => esc_html__('Nutrition per serving', 'trendymag'),
                'group'        => esc_html__('Nutrition', 'trendymag'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'trendymag'),
                        'param_name' => 'nutrition_title',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter nutrition title, e.g: Calories', 'trendymag' )
                    ),

                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Nutrition amount', 'trendymag'),
                        'param_name' => 'nutrition_amount',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter nutrition amount, e.g: 475', 'trendymag' )
                    ),

                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Amount with percent', 'trendymag'),
                        'param_name' => 'nutrition_percent',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter nutrition percentage, e.g: 23%', 'trendymag' )
                    )
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
        class WPBakeryShortCode_TT_Food_Recipe extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )