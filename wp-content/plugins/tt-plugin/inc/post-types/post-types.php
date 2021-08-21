<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register mega menu post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_mega_menu_post_type() {

        $labels = array(
            'name'               => esc_html_x('Mega Menu', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Mega Menu', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Mega Menus', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Mega Menu:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Mega Menus', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Mega Menu', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Mega Menu', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Mega Menu', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Mega Menu', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Mega Menu', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Mega Menu found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Mega Menu found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Mega Menu', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor'),
            'taxonomies'          => array(),
            'hierarchical'        => TRUE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-welcome-widgets-menus',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'mega-menu' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-mega-menu', $args);
    }

    add_action('init', 'tt_mega_menu_post_type');