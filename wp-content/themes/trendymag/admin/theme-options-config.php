<?php

    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // ReduxFramework  Config File
    // For full documentation, please visit: https://docs.reduxframework.com
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // This is your option name where all the Redux data is stored.
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    $opt_name = "trendymag_theme_option";


    /**
     * SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => TRUE,
        // Show the sections below the admin menu item or not
        'menu_title'           => sprintf( esc_html__( '%s Options', 'trendymag' ), $theme->get( 'Name' ) ),
        'page_title'           => sprintf( esc_html__( '%s Theme Options', 'trendymag' ), $theme->get( 'Name' ) ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => FALSE,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => TRUE,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => TRUE,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => FALSE,
        // Show the time the page took to load, etc
        'update_notice'        => TRUE,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => TRUE,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => '40',
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => TRUE,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => FALSE,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => TRUE,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => TRUE,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => TRUE,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'        => sprintf( esc_html__( '%s Theme Options', 'trendymag' ), $theme->get( 'Name' ) ),
        // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => TRUE,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => TRUE,
                'rounded' => FALSE,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // START SECTIONS
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    // General Settings
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-cogs',
        'title'  => esc_html__('General Settings', 'trendymag'),
        'fields' => array(
            
            array(
                'id'        => 'site-layout',
                'type'      => 'select',
                'title'     => esc_html__( 'Select site layout', 'trendymag' ),
                'options'   => array(
                    'fullwidth-layout'      => esc_html__( 'Full Width Layout', 'trendymag' ),
                    'box-layout'    => esc_html__( 'Box Layout', 'trendymag' ),
                    'box-framed-layout'    => esc_html__( 'Box Frame Layout', 'trendymag' ),
                    'border-layout'    => esc_html__( 'Full width Box Layout', 'trendymag' )
                ),
                'default'   => 'fullwidth-layout'
            ),

            array(     
                'id'       => 'layout-background',
                'type'     => 'background',
                'title'    => esc_html__('Body Background image', 'trendymag'),
                'subtitle' => esc_html__('Body background with image, color, etc.', 'trendymag'),
                'output'    => array('body'),
                'default'   => array(
                    'background-color'      => '#ffffff',
                    'background-repeat'     => 'no-repeat',
                    'background-position'   => 'center top',
                    'background-size'       => 'cover',
                    'background-attachment' => 'fixed'
                )
            ),

            array(
                'id'       => 'rtl',
                'type'     => 'switch',
                'title'    => esc_html__('RTL', 'trendymag'),
                'subtitle' => esc_html__('Enable or Disabled RTL', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disabled', 'trendymag'),
                'default'  => FALSE,
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Logo settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-slideshare',
        'title'  => esc_html__('Logo Settings', 'trendymag'),
        'fields' => array(
            array(
                'id'       => 'logo-type',
                'type'     => 'switch',
                'title'    => esc_html__('Logo Type', 'trendymag'),
                'subtitle' => esc_html__('You can set text or image logo', 'trendymag'),
                'on'       => esc_html__('Image Logo', 'trendymag'),
                'off'      => esc_html__('Text Logo', 'trendymag'),
                'default'  => TRUE,
            ),
            array(
                'id'       => 'text-logo',
                'type'     => 'text',
                'required' => array('logo-type', '=', '0'),
                'title'    => esc_html__('Logo Text', 'trendymag'),
                'subtitle' => esc_html__('Change your logo text', 'trendymag')
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Logo.', 'trendymag'),
                'subtitle' => esc_html__('Change Site logo dimension: 145px &times; 55px', 'trendymag')
            ),
            array(
                'id'       => 'retina-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Retina Logo Image (High Density)', 'trendymag'),
                'subtitle' => esc_html__('Change Retina logo dimension: 290px &times; 110px', 'trendymag'),
                'desc'     => esc_html__('Add a 290px &times; 110px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'trendymag'),
            ),
            array(
                'id'       => 'mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Mobile Logo.', 'trendymag'),
                'subtitle' => esc_html__('Change site mobile logo dimension: 145px &times; 55px', 'trendymag')
            ),
            array(
                'id'       => 'retina-mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Retina Mobile Logo Image (High Density)', 'trendymag'),
                'subtitle' => esc_html__('Change retina mobile logo dimension: 290px &times; 110px', 'trendymag'),
                'desc'     => esc_html__('Add a 290px &times; 110px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'trendymag'),
            ),
            array(
                'id'       => 'sticky-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Sticky Logo.', 'trendymag'),
                'subtitle' => esc_html__('Change site sticky logo dimension: 145px &times; 55px', 'trendymag')
            ),
            array(
                'id'       => 'retina-sticky-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Retina Sticky Logo Image (High Density)', 'trendymag'),
                'subtitle' => esc_html__('Change retina sticky logo dimension: 290px &times; 110px', 'trendymag'),
                'desc'     => esc_html__('Add a 290px &times; 110px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'trendymag'),
            ),
            array(
                'id'       => 'sticky-mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Sticky Mobile Logo.', 'trendymag'),
                'subtitle' => esc_html__('Change site sticky mobile logo dimension: 145px &times; 55px', 'trendymag')
            ),
            array(
                'id'       => 'retina-sticky-mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Retina Sticky Mobile Logo Image (High Density)', 'trendymag'),
                'subtitle' => esc_html__('Change retina sticky mobile logo dimension: 290px &times; 110px', 'trendymag'),
                'desc'     => esc_html__('Add a 290px &times; 110px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'trendymag'),
            ),
            
            array(
                'id'             => 'logo-margin',
                'type'           => 'spacing',
                'output'         => array('.navbar-brand'),
                'mode'           => 'margin',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Logo Margin Option', 'trendymag'),
                'subtitle'       => esc_html__('You can change logo margin if needed.', 'trendymag'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'trendymag')
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Header settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'      => 'el el-website',
        'customizer_width' => '450px',
        'title'     => esc_html__('Header Settings', 'trendymag')
    ));

    // Header style
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Style', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            // header style
            array(
                'id'       => 'header-style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Header styles', 'trendymag' ),
                'subtitle' => esc_html__( 'Select Header Style.', 'trendymag' ),
                'options'  => array(
                    'header-default'   => array(
                        'alt' => esc_html__('Header default', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/header-1.jpg'
                    ),
                    'header-two'   => array(
                        'alt' => esc_html__('Header two', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/header-2.jpg'
                    )
                ),
                'default'  => 'header-default'
            ),

            // colored border
            array(
                'id'       => 'menu-colored-border',
                'type'     => 'switch',
                'title'    => esc_html__('Menu colored border', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden colored border', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => TRUE,
            ),

            // breadcrumb
            array(
                'id'       => 'tt-breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__('Breadcrumb', 'trendymag'),
                'subtitle' => esc_html__('Show or Hide Your website Breadcrumb', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));

    // Menu style
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu Style', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'             => 'navbar-margin',
                'type'           => 'spacing',
                'output'         => array('.main-menu-wrapper'),
                'mode'           => 'padding',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Main menu margin option', 'trendymag'),
                'subtitle'       => esc_html__('You can change main menu margin if needed.', 'trendymag'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'trendymag')
            ),

            array(
                'id'             => 'navbar-height',
                'type'           => 'spacing',
                'output'         => array('.navbar'),
                'mode'           => 'padding',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Navbar Padding Option', 'trendymag'),
                'subtitle'       => esc_html__('You can change navbar padding if needed.', 'trendymag'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'trendymag')
            ),

            // menu background color
            array(
                'id'       => 'menu-bg-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu background color', 'trendymag' ),
                'subtitle' => esc_html__( 'Pick color for menu background.', 'trendymag' )
            ),

            // menu color
            array(
                'id'       => 'menu-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu font color', 'trendymag' ),
                'subtitle' => esc_html__( 'Pick color for menu.', 'trendymag' )
            ),

            // menu active color
            array(
                'id'       => 'menu-active-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu active and hover color', 'trendymag' ),
                'subtitle' => esc_html__( 'Pick color for menu active and hover text color.', 'trendymag' ),
                'default'  => '#ff3c00'
            ),

            // sticky menu visibility
            array(
                'id'       => 'sticky-menu-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Sticky menu visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden sticky menu', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => TRUE,
            ),

            // header search visibility
            array(
                'id'       => 'search-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Search visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden search button', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));

    // Header topbar settings
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header topbar', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            
            // header top wrapper
            array(
                'id'       => 'header-top-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Header topbar visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden header topbar', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'header-menu-visibility',
                'type'     => 'switch',
                'required' => array('header-top-visibility', '=', '1'),
                'title'    => esc_html__('Header menu visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden header menu', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => FALSE,
            ),

            array(
                'id'       => 'header-weather-visibility',
                'type'     => 'switch',
                'required' => array('header-top-visibility', '=', '1'),
                'title'    => esc_html__('Header weather visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden header weather', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => FALSE,
            ),

            array(
                'id'       => 'header-contact',
                'type'     => 'editor',
                'required' => array('header-top-visibility', '=', '1'),
                'title'    => esc_html__('Header contact', 'trendymag'),
                'subtitle' => esc_html__('Change header contact info', 'trendymag'),
                'default'  => '<ul><li><i class="fa fa-phone"></i> +123 125 145</li><li><a href="mailto:username@host.com"><i class="fa fa-envelope-o"></i> username@host.com</a></li></ul>'
            ),

            array(
                'id'       => 'header-date-visibility',
                'type'     => 'switch',
                'required' => array('header-top-visibility', '=', '1'),
                'title'    => esc_html__('Header date visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden header date', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => FALSE,
            ),

            array(
                'id'       => 'header-social-button',
                'type'     => 'switch',
                'required' => array('header-top-visibility', '=', '1'),
                'title'    => esc_html__('Header social icon visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden header social icon', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'header-trigger-visibility',
                'type'     => 'switch',
                'required' => array('header-top-visibility', '=', '1'),
                'title'    => esc_html__('Header offcanvas trigger visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden header sidebar trigger', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => TRUE,
            ),
            
            array(
                'id'       => 'header-offcanvas-logo',
                'type'     => 'switch',
                'required' => array('header-trigger-visibility', '=', '1'),
                'title'    => esc_html__('Offcanvas logo visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden logo from offcanvas', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));


    // Header news ticker
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'News Ticker', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'breaking-news-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Breaking News Visibility', 'trendymag'),
                'subtitle' => esc_html__('Visible or Hidden topbar newsfeed', 'trendymag'),
                'on'       => esc_html__('Visible', 'trendymag'),
                'off'      => esc_html__('Hidden', 'trendymag'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'visibility-area',
                'type'     => 'switch',
                'required' => array('breaking-news-visibility', '=', '1'),
                'title'    => esc_html__('Visibility area', 'trendymag'),
                'on'       => esc_html__('Home page only', 'trendymag'),
                'off'      => esc_html__('All pages', 'trendymag'),
                'desc'     => esc_html__('You can show breaking news only home page or all pages', 'trendymag'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'prefix-title',
                'type'     => 'text',
                'required' => array('breaking-news-visibility', '=', '1'),
                'title'    => esc_html__('Breaking news prefix', 'trendymag'),
                'subtitle' => esc_html__('Change news prefix text', 'trendymag'),
                'default'  => esc_html__('Breaking', 'trendymag')
            ),

            array(
                'id'       => 'post-source',
                'type'     => 'select',
                'required' => array('breaking-news-visibility', '=', '1'),
                'title'    => esc_html__('Select post source', 'trendymag'),
                'options'  => array(
                    'latest-post' => 'Latest Post',
                    'selected-post' => 'Selected Post',
                    'category-post' => 'From Category'
                ),
                'default'  => 'latest-post',
                'subtitle' => esc_html__('Select post source', 'trendymag'),
            ),

            array(
                'id'       => 'post-lists',
                'type'     => 'select',
                'required' => array('post-source', '=', 'selected-post'),
                'title'    => esc_html__('Select posts', 'trendymag'),
                'data'     => 'posts',
                'args'     => array(
                    'post_type'      => 'post',
                    'posts_per_page' => -1
                ),
                'multi'    => true,
                'subtitle' => esc_html__('Select post to show on breaking news', 'trendymag'),
            ),

            array(
                'id'       => 'category-lists',
                'type'     => 'select',
                'required' => array('post-source', '=', 'category-post'),
                'title'    => esc_html__('Select a category', 'trendymag'),
                'data'     => 'categories',
                'subtitle' => esc_html__('Select a cateogry to show selected category post', 'trendymag'),
            ),

            array(
                'id'       => 'post-limit',
                'type'     => 'text',
                'required' => array('post-source', '=', array('category-post', 'latest-post')),
                'title'    => esc_html__('Breaking news limit', 'trendymag'),
                'subtitle' => esc_html__('Change post limit for breaking news', 'trendymag'),
                'default'  => 5
            )
        )
    ));
    


    
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Presets settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-brush',
        'title'  => esc_html__('Preset color', 'trendymag'),
        'fields' => array(
            
            array(
                'id'       => 'accent-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Site Accent Color', 'trendymag' ),
                'subtitle' => esc_html__( 'Pick color for the theme accent color (default: #ff3c00).', 'trendymag' ),
                'default'  => '#ff3c00',
            ),

            array(
                'id'       => 'link-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Site Link Color', 'trendymag' ),
                'subtitle' => esc_html__( 'Pick color for all link (default: #ff3c00).', 'trendymag' ),
                'default'  => '#ff3c00',
            ),

            array(
                'id'       => 'section-title-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Section title color', 'trendymag' ),
                'subtitle' => esc_html__( 'Pick color for section title (default: #212121).', 'trendymag' ),
                'default'  => '#212121',
            )
        )
    ));



    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Typography
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-font',
        'title'  => esc_html__('Typography', 'trendymag'),
        'fields' => array(

            // body typography
            array(
                'id'       => 'body-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'trendymag' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'trendymag' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'default'  => array(
                    'color'       => '#333333',
                    'font-size'   => '16px',
                    'font-family' => 'Droid Serif',
                    'font-weight' => '400',
                    'line-height' => '28px'
                ),
            ),


            // Heading all typography
            array(
                'id'       => 'heading-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading Font', 'trendymag' ),
                'subtitle' => esc_html__( 'This settings for all heading font (h1, h2, h3, h4, h5, h6)', 'trendymag' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'font-size' => false,
                'line-height' => false,
                'default'  => array(
                    'color'       => '#212121',
                    'font-family' => 'Poppins',
                    'font-weight' => '700',
                ),
            ),

            // only H1 typography
            array(
                'id'       => 'h1-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H1 (Heading one)', 'trendymag' ),
                'subtitle' => esc_html__( 'This settings only for H1', 'trendymag' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '36px',
                    'line-height' => '48px'
                ),
            ),


            // only H2 typography
            array(
                'id'       => 'h2-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H2 (Heading two)', 'trendymag' ),
                'subtitle' => esc_html__( 'This settings only for H2', 'trendymag' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '30px',
                    'line-height' => '36px'
                ),
            ),


            // only H3 typography
            array(
                'id'       => 'h3-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H3 (Heading three)', 'trendymag' ),
                'subtitle' => esc_html__( 'This settings only for H3', 'trendymag' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '24px',
                    'line-height' => '30px'
                ),
            ),

            // only H4 typography
            array(
                'id'       => 'h4-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H4 (Heading four)', 'trendymag' ),
                'subtitle' => esc_html__( 'This settings only for H4', 'trendymag' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '18px',
                    'line-height' => '20px'
                ),
            ),

            // only H5 typography
            array(
                'id'       => 'h5-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H5 (Heading five)', 'trendymag' ),
                'subtitle' => esc_html__( 'This settings only for H5', 'trendymag' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '16px',
                    'line-height' => '18px'
                ),
            ),

            // only H6 typography
            array(
                'id'       => 'h6-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H6 (Heading six)', 'trendymag' ),
                'subtitle' => esc_html__( 'This settings only for H6', 'trendymag' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '14px',
                    'line-height' => '16px'
                ),
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Blog settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Blog Settings', 'trendymag'),
        'fields' => array(

            array(
                'id'       => 'blog-title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Page Title', 'trendymag'),
                'subtitle' => esc_html__('Enter Blog page title here, if leave blank then site title will appear', 'trendymag')
            ),

            array(
                'id'       => 'blog-title-overlay',
                'type'     => 'switch',
                'title'    => esc_html__('Overlay', 'trendymag'),
                'subtitle' => esc_html__('Enable or disable blog page title background overlay', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'blog-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Blog sidebar setting', 'trendymag'),
                'subtitle' => esc_html__('Select blog sidebar', 'trendymag'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => esc_html__('No sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/no-sidebar.jpg'
                    ),
                    'left-sidebar'  => array(
                        'alt' => esc_html__('Left sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/left-sidebar.jpg'
                    ),
                    'right-sidebar' => array(
                        'alt' => esc_html__('Right sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/right-sidebar.jpg'
                    )
                ),
                'default'  => 'right-sidebar'
            ),

            array(
                'id'       => 'post-lightbox-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Post lightbox', 'trendymag'),
                'subtitle' => esc_html__('Check to show post lightbox for standard and gallery post only', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => FALSE
            ),

            array(
                'id'       => 'tt-post-meta',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Post meta options', 'trendymag' ),
                'subtitle' => esc_html__( 'Check to show post meta', 'trendymag' ),
                'options'  => array(
                    'post-date'         => esc_html__( 'Post Date', 'trendymag' ),
                    'post-author'       => esc_html__( 'Post Author', 'trendymag' ),
                    'post-category'     => esc_html__( 'Post Category', 'trendymag' ),
                    'post-readtime'     => esc_html__( 'Post Category', 'trendymag' ),
                    'post-view'     => esc_html__( 'Post View', 'trendymag' ),
                    'post-comment' => esc_html__( 'Post Comment', 'trendymag' )
                ),
                'default'  => array(
                    'post-date' => '1',
                    'post-author'  => '1',
                    'post-category'   => '1',
                    'post-readtime'   => '1',
                    'post-view'   => '1',
                    'post-comment' => '1'
                )
            ),
            
            array(
                'id'       => 'blog-page-nav',
                'type'     => 'switch',
                'title'    => esc_html__('Blog Pagination or Navigation', 'trendymag'),
                'subtitle' => esc_html__('Blog pagination style, posts pagination or newer / older posts', 'trendymag'),
                'on'       => esc_html__('Pagination', 'trendymag'),
                'off'      => esc_html__('Navigation', 'trendymag'),
                'default'  => TRUE
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // single news settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Single News Settings', 'trendymag'),
        'fields' => array(
            array(
                'id'       => 'single-news-style',
                'type'     => 'image_select',
                'title'    => esc_html__('Single News Layout setting', 'trendymag'),
                'subtitle' => esc_html__('Select single news style', 'trendymag'),
                'options'  => array(
                    'style-default'    => array(
                        'alt' => esc_html__('style default', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/layout-2.jpg'
                    ),
                    'style-two'    => array(
                        'alt' => esc_html__('style two', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/layout-1.jpg'
                    ),
                    'style-three'    => array(
                        'alt' => esc_html__('style three', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/layout-3.jpg'
                    ),
                    'style-four'    => array(
                        'alt' => esc_html__('style four', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/layout-4.jpg'
                    ),
                    'style-five'    => array(
                        'alt' => esc_html__('style five', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/layout-5.jpg'
                    ),
                    'style-six'    => array(
                        'alt' => esc_html__('style six', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/layout-6.jpg'
                    ),
                    'style-seven'    => array(
                        'alt' => esc_html__('style seven', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/layout-7.jpg'
                    )
                ),
                'default'  => 'style-default'
            ),

            array(
                'id'       => 'single-news-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Single news sidebar setting', 'trendymag'),
                'subtitle' => esc_html__('Select single news sidebar', 'trendymag'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => esc_html__('No sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/no-sidebar.jpg'
                    ),
                    'left-sidebar'  => array(
                        'alt' => esc_html__('Left sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/left-sidebar.jpg'
                    ),
                    'right-sidebar' => array(
                        'alt' => esc_html__('Right sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/right-sidebar.jpg'
                    )
                ),
                'default'  => 'right-sidebar'
            ),


            array(
                'id'       => 'share-button-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Show or hide share button', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'share-button-top',
                'type'     => 'switch',
                'required' => array('share-button-visibility', '=', '1'),
                'title'    => esc_html__('Share button top', 'trendymag'),
                'desc' => esc_html__('Displays share button on the top of the post', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => true
            ),

            array(
                'id'       => 'share-button-bottom',
                'type'     => 'switch',
                'required' => array('share-button-visibility', '=', '1'),
                'title'    => esc_html__('Share button bottom', 'trendymag'),
                'desc'     => esc_html__('Displays share button on the bottom of the post', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => true
            ),

            array(
                'id'       => 'tt-share-button',
                'type'     => 'checkbox',
                'required' => array( 'share-button-visibility', '=', '1' ),
                'title'    => esc_html__( 'Share button', 'trendymag' ),
                'subtitle' => esc_html__( 'Check to show share button', 'trendymag' ),
                'options'  => array(
                    'facebook'      => esc_html__( 'Facebook', 'trendymag' ),
                    'twitter'       => esc_html__( 'Twitter', 'trendymag' ),
                    'google'        => esc_html__( 'Google+', 'trendymag' ),
                    'pinterest'     => esc_html__( 'Pinterest', 'trendymag' ),
                    'reddit'        => esc_html__( 'Reddit', 'trendymag' ),
                    'stumbleupon'   => esc_html__( 'Stumbleupon', 'trendymag' ),
                    'digg'          => esc_html__( 'Digg', 'trendymag' ),
                    'delicious'     => esc_html__( 'Delicious', 'trendymag' )
                ),
                'default'  => array(
                    'facebook'  => '1',
                    'twitter'   => '1',
                    'google'    => '1',
                    'linkedin'  => '1',
                    'pinterest' => '1',
                    'reddit'    => '0',
                    'stumbleupon' => '0',
                    'digg'      => '0',
                    'delicious' => '0'
                )
            ),

            array(
                'id'       => 'newsletter-subscription',
                'type'     => 'switch',
                'title'    => esc_html__('Show Newsletter form', 'trendymag'),
                'subtitle' => esc_html__('Show or hide neewsletter subscription form', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'subscription-form-title',
                'type'     => 'text',
                'required' => array('newsletter-subscription', '=', '1'),
                'title'    => esc_html__('Title text', 'trendymag'),
                'default'  => esc_html__('Newsletter Subscription', 'trendymag'),
            ),

            array(
                'id'       => 'subscription-form-subtitle',
                'type'     => 'text',
                'required' => array('newsletter-subscription', '=', '1'),
                'title'    => esc_html__('Subtitle text', 'trendymag'),
                'default'  => esc_html__('Subscribe to our mailing list to get the new updates!', 'trendymag'),
            ),

            array(
                'id'       => 'footer-text',
                'type'     => 'editor',
                'title'    => esc_html__('Footer Copyright Text', 'trendymag'),
                'subtitle' => esc_html__('Write footer copyright text here.', 'trendymag')
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Select to share button
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'subsection' => true,
        'title'  => esc_html__('Select to share', 'trendymag'),
        'fields' => array(
            // select to share text
            array(
                'id'       => 'select-to-share',
                'type'     => 'switch',
                'title'    => esc_html__('Select to share', 'trendymag'),
                'subtitle' => esc_html__('Show or Hide select to share button from content area', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => TRUE
            ),

            // twitter, tumblr, buffer, stumbleupon, digg, reddit, linkedin
            array(
                'id'       => 'select-share-button',
                'type'     => 'checkbox',
                'required' => array('select-to-share', '=', '1'),
                'title'    => esc_html__( 'Share button', 'trendymag' ),
                'subtitle' => esc_html__( 'Choose share button', 'trendymag' ),
                'options'  => array(
                    'facebook'      => esc_html__( 'Facebook', 'trendymag' ),
                    'twitter'       => esc_html__( 'Twitter', 'trendymag' ),
                    'tumblr'        => esc_html__( 'Tumblr', 'trendymag' ),
                    'stumbleupon'   => esc_html__( 'Stumbleupon', 'trendymag' ),
                    'digg'          => esc_html__( 'Digg', 'trendymag' ),
                    'reddit'        => esc_html__( 'Reddit', 'trendymag' ),
                    'linkedin'      => esc_html__( 'Linkedin', 'trendymag' )
                ),
                'default'  => array(
                    'facebook' => '1',
                    'twitter' => '1',
                    'tumblr' => '0',
                    'stumbleupon' => '0',
                    'digg' => '1',
                    'reddit' => '0',
                    'linkedin' => '0'
                )
            ),

            array(
                'id'       => 'facebook-app-id',
                'type'     => 'text',
                'title'    => esc_html__('Facebook APP ID', 'trendymag'),
                'subtitle' => esc_html__('Enter facebook app id', 'trendymag')
            ),

            array(
                'id'       => 'twitter-user',
                'type'     => 'text',
                'title'    => esc_html__('Twitter username', 'trendymag'),
                'subtitle' => esc_html__('Enter twitter username', 'trendymag')
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // category settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Category Settings', 'trendymag'),
        'fields' => array(
            array(
                'id'       => 'category-layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Category Layout setting', 'trendymag'),
                'subtitle' => esc_html__('Select category layout', 'trendymag'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => esc_html__('No sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/no-sidebar.jpg'
                    ),
                    'left-sidebar'  => array(
                        'alt' => esc_html__('Left sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/left-sidebar.jpg'
                    ),
                    'right-sidebar' => array(
                        'alt' => esc_html__('Right sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/right-sidebar.jpg'
                    )
                ),
                'default'  => 'right-sidebar'
            ),

            array(
                'id'       => 'category-post-style',
                'type'     => 'image_select',
                'title'    => esc_html__('Category post style', 'trendymag'),
                'subtitle' => esc_html__('Select category post style', 'trendymag'),
                'options'  => array(
                    'style-one'    => array(
                        'alt' => esc_html__('Style one (Title on bottom of thumb)', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/style-one.jpg'
                    ),
                    'style-two'  => array(
                        'alt' => esc_html__('Style two (Title on the thumb)', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/style-two.jpg'
                    ),
                    'style-three'  => array(
                        'alt' => esc_html__('Style three (Title on the thumb)', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/style-three.jpg'
                    ),
                    'style-four'  => array(
                        'alt' => esc_html__('Style four (Title on the thumb)', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/style-four.jpg'
                    ),
                    'style-five'  => array(
                        'alt' => esc_html__('Style five (Title on the thumb)', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/style-five.jpg'
                    ),
                    'style-six'  => array(
                        'alt' => esc_html__('Style six (Title on the thumb)', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/style-six.jpg'
                    ),
                    'style-seven'  => array(
                        'alt' => esc_html__('Style seven (Title on the thumb)', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/style-seven.jpg'
                    )
                ),
                'default'  => 'style-one'
            ),

            array(
                'id'       => 'word-limit',
                'type'     => 'text',
                'required' => array('category-post-style', '=', array('style-one', 'style-five')),
                'title'    => esc_html__('Word Limit', 'trendymag'),
                'default'  => esc_html__('25', 'trendymag')
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // related news settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-th-large',
        'title'  => esc_html__('Related news Settings', 'trendymag'),
        'fields' => array(
            array(
                'id'       => 'related-news',
                'type'     => 'switch',
                'title'    => esc_html__('Show related news on single page?', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'related-text',
                'type'     => 'text',
                'required' => array('related-news', '=', '1'),
                'title'    => esc_html__('Change related text', 'trendymag'),
                'default'  => esc_html__('Related Article', 'trendymag'),
            ),

            array(
                'id'       => 'show-post',
                'type'     => 'text',
                'required' => array('related-news', '=', '1'),
                'title'    => esc_html__('The number of total news to show', 'trendymag'),
                'default'  => esc_html__('2', 'trendymag'),
            ),

            array(
                'id'      => 'related-post-grid',
                'type'    => 'select',
                'required'=> array('related-news', '=', '1'),
                'title'   => esc_html__( 'Select related post grid', 'trendymag' ),
                'options'  => array(
                    'col-md-2' => esc_html__( 'Column 2', 'trendymag' ),
                    'col-md-4' => esc_html__( 'Column 3', 'trendymag' )
                ),
                'default'  => 'col-md-6'
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Page settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Page Settings', 'trendymag'),
        'fields' => array(

            array(
                'id'       => 'page-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Page Sidebar', 'trendymag'),
                'subtitle' => esc_html__('Select page sidebar', 'trendymag'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => esc_html__('No sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/no-sidebar.jpg'
                    ),
                    'left-sidebar'  => array(
                        'alt' => esc_html__('Left sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/left-sidebar.jpg'
                    ),
                    'right-sidebar' => array(
                        'alt' => esc_html__('Right sidebar', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/right-sidebar.jpg'
                    )
                ),
                'default'  => 'right-sidebar'
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // ads settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'      => 'el-icon-repeat-alt',
        'customizer_width' => '450px',
        'title'     => esc_html__('Ads Settings', 'trendymag')
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Ad', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Header ads management', 'trendymag'),
        'fields'           => array(
            array(
                'id'        => 'header-ad-visibility',
                'type'      => 'switch',
                'title'     => esc_html__('Visibility header ad', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from header', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'        => 'ad-type',
                'type'      => 'select',
                'required'=> array('header-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Select ad type', 'trendymag' ),
                'options'   => array(
                    'image-ad'      => esc_html__( 'Image Ad', 'trendymag' ),
                    'adsense-ad'    => esc_html__( 'Adsense Ad', 'trendymag' )
                ),
                'default'   => 'image-ad'
            ),

            array(
                'id'        => 'image-ad-opt',
                'type'      => 'media',
                'preview'   => 'true',
                'required'  => array('ad-type', '=', 'image-ad'),
                'title'     => esc_html__('Image Ad', 'trendymag'),
                'desc'      => esc_html__('Choose a header ad, size is 728x90', 'trendymag')
            ),

            array(
                'id'        => 'image-link',
                'type'      => 'text',
                'required'  => array('ad-type', '=', 'image-ad'),
                'title'     => esc_html__( 'Image custom link', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste the custom url here, leave blank for no link', 'trendymag' )
            ),

            array(
                'id'        => 'ad-codes',
                'type'      => 'textarea',
                'required'  => array('ad-type', '=', 'adsense-ad'),
                'title'     => esc_html__( 'Your header ad', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste your ad code here. Google adsense will be made responsive automatically.', 'trendymag' )
            ),

            array(
                'id'    => 'header_sizes',
                'type'  => 'info',
                'required'=> array('header-ad-visibility', '=', '1'),
                'title' => esc_html__('All supported ad sizes for header:', 'trendymag'),
                'desc'  => wp_kses('<span>leaderboard (728x90)<br>
                            banner (468x60)<br>
                            half banner (234x60)<br>
                            mobile banner (320x50)<br>
                            large leaderboard (970x90)</span>', array(
                    'span'      => array( 'class' => array()),
                    'br'        => array(),
                ))
            ),

            array(
                'id'        => 'ad-title',
                'type'      => 'text',
                'required'=> array('header-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Add title', 'trendymag' ),
                'subtitle'  => esc_html__( 'A title for the Ad, e.g - Advertisement.', 'trendymag' )
            ),

            array(
                'id'        => 'desktop-lg-visibility',
                'type'      => 'switch',
                'required'=> array('header-ad-visibility', '=', '1'),
                'title'     => esc_html__('Disable on large screen ?', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from desktop device', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'       => 'desktop-md-visibility',
                'type'     => 'switch',
                'required'=> array('header-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on medium screen ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from desktop medium device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'tablet-visibility',
                'type'     => 'switch',
                'required'=> array('header-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on tablet ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from tablet device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'mobile-visibility',
                'type'     => 'switch',
                'required'=> array('header-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on mobile ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from mobile device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sidebar Ad one', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Sidebar ads management', 'trendymag'),
        'fields'           => array(
            array(
                'id'        => 'ls-ad-visibility',
                'type'      => 'switch',
                'title'     => esc_html__('Visibility sidebar ad', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from sidebar', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'        => 'ls-ad-type',
                'type'      => 'select',
                'required'=> array('ls-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Select ad type', 'trendymag' ),
                'options'   => array(
                    'image-ad'      => esc_html__( 'Image Ad', 'trendymag' ),
                    'adsense-ad'    => esc_html__( 'Adsense Ad', 'trendymag' )
                ),
                'default'   => 'image-ad'
            ),

            array(
                'id'        => 'ls-image-ad-opt',
                'type'      => 'media',
                'preview'   => 'true',
                'required'  => array('ls-ad-type', '=', 'image-ad'),
                'title'     => esc_html__('Image Ad', 'trendymag'),
                'desc'      => esc_html__('Choose a sidebar ad, size is 300x250', 'trendymag')
            ),

            array(
                'id'        => 'ls-image-link',
                'type'      => 'text',
                'required'  => array('ls-ad-type', '=', 'image-ad'),
                'title'     => esc_html__( 'Image custom link', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste the custom url here, leave blank for no link', 'trendymag' )
            ),

            array(
                'id'        => 'ls-ad-codes',
                'type'      => 'textarea',
                'required'  => array('ls-ad-type', '=', 'adsense-ad'),
                'title'     => esc_html__( 'Your sidebar ad', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste your ad code here. Google adsense will be made responsive automatically.', 'trendymag' )
            ),

            array(
                'id'    => 'left_sidebar_sizes',
                'type'  => 'info',
                'required'=> array('ls-ad-visibility', '=', '1'),
                'title' => esc_html__('All supported ad sizes for sidebar:', 'trendymag'),
                'desc'  => wp_kses('<span>half banner (234x60)<br>
                            small square (200x200)<br>
                            square (250x250)<br>
                            medium rectangle (300x250) *recommended<br>
                            large rectangle (336x280)<br>
                            half page (300x600)<br>
                            portrait (300x1050)<br>
                            mobile banner (320x50)</span>', array(
                    'span'      => array( 'class' => array()),
                    'br'        => array(),
                ))
            ),

            array(
                'id'        => 'ls-ad-title',
                'type'      => 'text',
                'required'=> array('ls-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Add title', 'trendymag' ),
                'subtitle'  => esc_html__( 'A title for the Ad, e.g - Advertisement.', 'trendymag' )
            ),

            array(
                'id'        => 'ls-desktop-lg-visibility',
                'type'      => 'switch',
                'required'=> array('ls-ad-visibility', '=', '1'),
                'title'     => esc_html__('Disable on large screen ?', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from desktop device', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'       => 'ls-desktop-md-visibility',
                'type'     => 'switch',
                'required'=> array('ls-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on medium screen ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from desktop medium device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'ls-tablet-visibility',
                'type'     => 'switch',
                'required'=> array('ls-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on tablet ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from tablet device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'ls-mobile-visibility',
                'type'     => 'switch',
                'required'=> array('ls-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on mobile ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from mobile device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sidebar Ad two', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Sidebar ads management', 'trendymag'),
        'fields'           => array(
            array(
                'id'        => 'rs-ad-visibility',
                'type'      => 'switch',
                'title'     => esc_html__('Visibility sidebar ad', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from sidebar', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'        => 'rs-ad-type',
                'type'      => 'select',
                'required'=> array('rs-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Select ad type', 'trendymag' ),
                'options'   => array(
                    'image-ad'      => esc_html__( 'Image Ad', 'trendymag' ),
                    'adsense-ad'    => esc_html__( 'Adsense Ad', 'trendymag' )
                ),
                'default'   => 'image-ad'
            ),

            array(
                'id'        => 'rs-image-ad-opt',
                'type'      => 'media',
                'preview'   => 'true',
                'required'  => array('rs-ad-type', '=', 'image-ad'),
                'title'     => esc_html__('Image Ad', 'trendymag'),
                'desc'      => esc_html__('Choose a sidebar ad, size is 300x250', 'trendymag')
            ),

            array(
                'id'        => 'rs-image-link',
                'type'      => 'text',
                'required'  => array('rs-ad-type', '=', 'image-ad'),
                'title'     => esc_html__( 'Image custom link', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste the custom url here, leave blank for no link', 'trendymag' )
            ),

            array(
                'id'        => 'rs-ad-codes',
                'type'      => 'textarea',
                'required'  => array('rs-ad-type', '=', 'adsense-ad'),
                'title'     => esc_html__( 'Your right sidebar ad', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste your ad code here. Google adsense will be made responsive automatically.', 'trendymag' )
            ),

            array(
                'id'    => 'right_sidebar_sizes',
                'type'  => 'info',
                'required'=> array('rs-ad-visibility', '=', '1'),
                'title' => esc_html__('All supported ad sizes for sidebar:', 'trendymag'),
                'desc'  => wp_kses('<span>half banner (234x60)<br>
                            small square (200x200)<br>
                            square (250x250)<br>
                            medium rectangle (300x250) *recommended<br>
                            large rectangle (336x280)<br>
                            half page (300x600)<br>
                            portrait (300x1050)<br>
                            mobile banner (320x50)</span>', array(
                    'span'      => array( 'class' => array()),
                    'br'        => array(),
                ))
            ),

            array(
                'id'        => 'rs-ad-title',
                'type'      => 'text',
                'required'=> array('rs-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Add title', 'trendymag' ),
                'subtitle'  => esc_html__( 'A title for the Ad, e.g - Advertisement.', 'trendymag' )
            ),

            array(
                'id'        => 'rs-desktop-lg-visibility',
                'type'      => 'switch',
                'required'=> array('rs-ad-visibility', '=', '1'),
                'title'     => esc_html__('Disable on large screen ?', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from desktop device', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'       => 'rs-desktop-md-visibility',
                'type'     => 'switch',
                'required'=> array('rs-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on medium screen ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from desktop medium device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'rs-tablet-visibility',
                'type'     => 'switch',
                'required'=> array('rs-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on tablet ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from tablet device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'rs-mobile-visibility',
                'type'     => 'switch',
                'required'=> array('rs-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on mobile ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from mobile device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer top Ad', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Footer top ads management', 'trendymag'),
        'fields'           => array(
            array(
                'id'        => 'footer-ad-visibility',
                'type'      => 'switch',
                'title'     => esc_html__('Visibility footer ad', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from footer', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => FALSE,
            ),

            array(
                'id'        => 'footer-ad-type',
                'type'      => 'select',
                'required'=> array('footer-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Select ad type', 'trendymag' ),
                'options'   => array(
                    'image-ad'      => esc_html__( 'Image Ad', 'trendymag' ),
                    'adsense-ad'    => esc_html__( 'Adsense Ad', 'trendymag' )
                ),
                'default'   => 'image-ad'
            ),

            array(
                'id'        => 'footer-image-ad-opt',
                'type'      => 'media',
                'preview'   => 'true',
                'required'  => array('footer-ad-type', '=', 'image-ad'),
                'title'     => esc_html__('Image Ad', 'trendymag'),
                'desc'      => esc_html__('Choose a footer ad, size is 300x250', 'trendymag')
            ),

            array(
                'id'        => 'footer-image-link',
                'type'      => 'text',
                'required'  => array('footer-ad-type', '=', 'image-ad'),
                'title'     => esc_html__( 'Image custom link', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste the custom url here, leave blank for no link', 'trendymag' )
            ),

            array(
                'id'        => 'footer-ad-codes',
                'type'      => 'textarea',
                'required'  => array('footer-ad-type', '=', 'adsense-ad'),
                'title'     => esc_html__( 'Your footer top ad', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste your ad code here. Google adsense will be made responsive automatically.', 'trendymag' )
            ),

            array(
                'id'    => 'footer_sizes',
                'type'  => 'info',
                'required'=> array('footer-ad-visibility', '=', '1'),
                'title' => esc_html__('All supported ad sizes for footer:', 'trendymag'),
                'desc'  => wp_kses('<span>leaderboard (728x90)<br>
                            banner (468x60)<br>
                            half banner (234x60)<br>
                            mobile banner (320x50)<br>
                            large leaderboard (970x90)</span>', array(
                    'span'      => array( 'class' => array()),
                    'br'        => array(),
                ))
            ),

            array(
                'id'        => 'footer-ad-title',
                'type'      => 'text',
                'required'=> array('footer-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Add title', 'trendymag' ),
                'subtitle'  => esc_html__( 'A title for the Ad, e.g - Advertisement.', 'trendymag' )
            ),

            array(
                'id'        => 'footer-desktop-lg-visibility',
                'type'      => 'switch',
                'required'=> array('footer-ad-visibility', '=', '1'),
                'title'     => esc_html__('Disable on large screen ?', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from desktop device', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'       => 'footer-desktop-md-visibility',
                'type'     => 'switch',
                'required'=> array('footer-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on medium screen ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from desktop medium device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'footer-tablet-visibility',
                'type'     => 'switch',
                'required'=> array('footer-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on tablet ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from tablet device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'footer-mobile-visibility',
                'type'     => 'switch',
                'required'=> array('footer-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on mobile ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from mobile device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Article top Ad', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Article top ads management', 'trendymag'),
        'fields'           => array(
            array(
                'id'        => 'at-ad-visibility',
                'type'      => 'switch',
                'title'     => esc_html__('Visibility article top ad', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from article top', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => FALSE,
            ),

            array(
                'id'        => 'at-ad-type',
                'type'      => 'select',
                'required'=> array('at-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Select ad type', 'trendymag' ),
                'options'   => array(
                    'image-ad'      => esc_html__( 'Image Ad', 'trendymag' ),
                    'adsense-ad'    => esc_html__( 'Adsense Ad', 'trendymag' )
                ),
                'default'   => 'image-ad'
            ),

            array(
                'id'        => 'at-image-ad-opt',
                'type'      => 'media',
                'preview'   => 'true',
                'required'  => array('at-ad-type', '=', 'image-ad'),
                'title'     => esc_html__('Image Ad', 'trendymag'),
                'desc'      => esc_html__('Choose a article top ad, size is 300x250', 'trendymag')
            ),

            array(
                'id'        => 'at-image-link',
                'type'      => 'text',
                'required'  => array('at-ad-type', '=', 'image-ad'),
                'title'     => esc_html__( 'Image custom link', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste the custom url here, leave blank for no link', 'trendymag' )
            ),

            array(
                'id'        => 'at-ad-codes',
                'type'      => 'textarea',
                'required'  => array('at-ad-type', '=', 'adsense-ad'),
                'title'     => esc_html__( 'Your article top ad', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste your ad code here. Google adsense will be made responsive automatically.', 'trendymag' )
            ),

            array(
                'id'    => 'article_top_sizes',
                'type'  => 'info',
                'required'=> array('at-ad-visibility', '=', '1'),
                'title' => esc_html__('All supported ad sizes for article top:', 'trendymag'),
                'desc'  => wp_kses('<span>leaderboard (728x90)<br>
                            banner (468x60)<br>
                            half banner (234x60)<br>
                            mobile banner (320x50)<br>
                            large leaderboard (970x90)</span>', array(
                    'span'      => array( 'class' => array()),
                    'br'        => array(),
                ))
            ),

            array(
                'id'        => 'at-ad-title',
                'type'      => 'text',
                'required'=> array('at-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Add title', 'trendymag' ),
                'subtitle'  => esc_html__( 'A title for the Ad, e.g - Advertisement.', 'trendymag' )
            ),

            array(
                'id'        => 'at-desktop-lg-visibility',
                'type'      => 'switch',
                'required'=> array('at-ad-visibility', '=', '1'),
                'title'     => esc_html__('Disable on large screen ?', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from desktop device', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'       => 'at-desktop-md-visibility',
                'type'     => 'switch',
                'required'=> array('at-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on medium screen ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from desktop medium device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'at-tablet-visibility',
                'type'     => 'switch',
                'required'=> array('at-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on tablet ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from tablet device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'at-mobile-visibility',
                'type'     => 'switch',
                'required'=> array('at-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on mobile ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from mobile device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Article bottom Ad', 'trendymag' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Article bottom ads management', 'trendymag'),
        'fields'           => array(
            array(
                'id'        => 'ab-ad-visibility',
                'type'      => 'switch',
                'title'     => esc_html__('Visibility article bottom ad', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from article bottom', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => FALSE,
            ),

            array(
                'id'        => 'ab-ad-type',
                'type'      => 'select',
                'required'=> array('ab-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Select ad type', 'trendymag' ),
                'options'   => array(
                    'image-ad'      => esc_html__( 'Image Ad', 'trendymag' ),
                    'adsense-ad'    => esc_html__( 'Adsense Ad', 'trendymag' )
                ),
                'default'   => 'image-ad'
            ),

            array(
                'id'        => 'ab-image-ad-opt',
                'type'      => 'media',
                'preview'   => 'true',
                'required'  => array('ab-ad-type', '=', 'image-ad'),
                'title'     => esc_html__('Image Ad', 'trendymag'),
                'desc'      => esc_html__('Choose a article bottom ad, size is 300x250', 'trendymag')
            ),

            array(
                'id'        => 'ab-image-link',
                'type'      => 'text',
                'required'  => array('ab-ad-type', '=', 'image-ad'),
                'title'     => esc_html__( 'Image custom link', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste the custom url here, leave blank for no link', 'trendymag' )
            ),

            array(
                'id'        => 'ab-ad-codes',
                'type'      => 'textarea',
                'required'  => array('ab-ad-type', '=', 'adsense-ad'),
                'title'     => esc_html__( 'Your article bottom ad', 'trendymag' ),
                'subtitle'  => esc_html__( 'Paste your ad code here. Google adsense will be made responsive automatically.', 'trendymag' )
            ),

            array(
                'id'    => 'article_bottom_sizes',
                'type'  => 'info',
                'required'=> array('ab-ad-visibility', '=', '1'),
                'title' => esc_html__('All supported ad sizes for article bottom:', 'trendymag'),
                'desc'  => wp_kses('<span>leaderboard (728x90)<br>
                            banner (468x60)<br>
                            half banner (234x60)<br>
                            mobile banner (320x50)<br>
                            large leaderboard (970x90)</span>', array(
                    'span'      => array( 'class' => array()),
                    'br'        => array(),
                ))
            ),

            array(
                'id'        => 'ab-ad-title',
                'type'      => 'text',
                'required'=> array('ab-ad-visibility', '=', '1'),
                'title'     => esc_html__( 'Add title', 'trendymag' ),
                'subtitle'  => esc_html__( 'A title for the Ad, e.g - Advertisement.', 'trendymag' )
            ),

            array(
                'id'        => 'ab-desktop-lg-visibility',
                'type'      => 'switch',
                'required'=> array('ab-ad-visibility', '=', '1'),
                'title'     => esc_html__('Disable on large screen ?', 'trendymag'),
                'subtitle'  => esc_html__('You can enable or disable ad from desktop device', 'trendymag'),
                'on'        => esc_html__('Enable', 'trendymag'),
                'off'       => esc_html__('Disable', 'trendymag'),
                'default'   => TRUE,
            ),

            array(
                'id'       => 'ab-desktop-md-visibility',
                'type'     => 'switch',
                'required'=> array('ab-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on medium screen ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from desktop medium device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'ab-tablet-visibility',
                'type'     => 'switch',
                'required'=> array('ab-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on tablet ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from tablet device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'ab-mobile-visibility',
                'type'     => 'switch',
                'required'=> array('ab-ad-visibility', '=', '1'),
                'title'    => esc_html__('Disable on mobile ?', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable ad from mobile device', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Preloader settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-repeat-alt',
        'title'  => esc_html__('Preloader Settings', 'trendymag'),
        'fields' => array(
            array(
                'id'       => 'page-preloader',
                'type'     => 'switch',
                'title'    => esc_html__('Page Preloader', 'trendymag'),
                'subtitle' => esc_html__('You can enable or disable page preloader from here.', 'trendymag'),
                'on'       => esc_html__('Enable', 'trendymag'),
                'off'      => esc_html__('Disable', 'trendymag'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'loader-bg-color',
                'type'     => 'color',
                'required' => array( 'page-preloader', '=', '1' ),
                'title'    => esc_html__( 'Preloader background color', 'trendymag' ),
                'subtitle' => esc_html__( 'Pick color for preloader background (default: #ffffff).', 'trendymag' ),
                'default'  => '#ffffff',
            ),

            array(
                'id'       => 'tt-loader',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array( 'page-preloader', '=', '1' ),
                'title'    => esc_html__('Animation file', 'trendymag'),
                'subtitle' => esc_html__('Upload loader gif animation file', 'trendymag')
            )
        )
    ));



    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Footer settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-photo',
        'title'  => esc_html__('Footer Settings', 'trendymag'),
        'fields' => array(
            // footer style
            array(
                'id'       => 'footer-style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Footer styles', 'trendymag' ),
                'subtitle' => esc_html__( 'Select Footer Style.', 'trendymag' ),
                'options'  => array(
                    'footer-default'   => array(
                        'alt' => esc_html__('Footer Default', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/footer-default.jpg'
                    ),
                    'footer-two'   => array(
                        'alt' => esc_html__('Footer two', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/footer-two.jpg'
                    ),
                    'footer-three'   => array(
                        'alt' => esc_html__('Footer three', 'trendymag'),
                        'img' => get_template_directory_uri() . '/images/footer-three.jpg'
                    )
                ),
                'default'  => 'footer-default'
            ),
            array(
                'id'       => 'footer-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('footer-style', '=', array('footer-default', 'footer-three')),
                'title'    => esc_html__('Footer Logo.', 'trendymag'),
                'subtitle' => esc_html__('Change footer logo dimension: 150px &times; 30px', 'trendymag')
            ),
            array(
                'id'       => 'footer-retina-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('footer-style', '=', array('footer-default', 'footer-three')),
                'title'    => esc_html__('Footer Retina Logo (High Density)', 'trendymag'),
                'subtitle' => esc_html__('Change Footer Retina logo dimension: 300px &times; 600px', 'trendymag'),
                'desc'     => esc_html__('Add a 300px &times; 60px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'trendymag'),
            ),

            array(
                'id'       => 'footer-about-text',
                'type'     => 'editor',
                'required' => array('footer-style', '=', array('footer-default', 'footer-three')),
                'title'    => esc_html__('Footer About Text', 'trendymag'),
                'subtitle' => esc_html__('Write footer about text here.', 'trendymag'),
                'default'  => wp_kses( '<p>Professionally fabricate client-centered content for superior expertise. Objectively leverage others covalent imperatives vis-a-vis state of the art potentialities. Competently matrix principle-centered manufactured products for viral portals. Dynamically.</p><address><span class="address-info">Email: trendymag@domain.com</span><br><span class="address-info">Phone: 00123 456 789</span></address>', array(
                    'span'      => array( 'class' => array()),
                    'address'   => array( 'class' => array()),
                    'strong'    => array( 'class' => array()),
                    'ul'        => array( 'class' => array()),
                    'li'        => array( 'class' => array()),
                    'a'         => array('href' => array(), 'title' => array(), 'target' => array(), 'class' => array()),
                    'br'        => array(),
                    'em'        => array(),
                    'strong'    => array(),
                    'p'         => array( 'class' => array(), 'style' => array())
                ))
            ),

            array(
                'id'       => 'footer-text',
                'type'     => 'editor',
                'title'    => esc_html__('Footer Copyright Text', 'trendymag'),
                'subtitle' => esc_html__('Write footer copyright text here.', 'trendymag')
            ),
            
            array(
                'id'       => 'social-icon-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Footer Social icon visibility', 'trendymag'),
                'subtitle' => esc_html__('Shor or hide social icon from footer', 'trendymag'),
                'on'       => esc_html__('Show', 'trendymag'),
                'off'      => esc_html__('Hide', 'trendymag'),
                'default'  => TRUE,
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Social icon settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-share',
        'title'  => esc_html__('Social Icon', 'trendymag'),
        'fields' => array(
            array(
                'id'       => 'facebook-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Facebook Link', 'trendymag'),
                'subtitle' => esc_html__('Enter facebook page or profile link. Leave blank to hide icon.', 'trendymag'),
                'default'  => "#"
            ),
            array(
                'id'       => 'twitter-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Twitter Link', 'trendymag'),
                'subtitle' => esc_html__('Enter twitter link. Leave blank to hide icon.', 'trendymag'),
                'default'  => "#"
            ),
            array(
                'id'       => 'google-plus-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Google Plus Link', 'trendymag'),
                'subtitle' => esc_html__('Enter google plus page or profile link. Leave blank to hide icon.', 'trendymag'),
                'default'  => "#"
            ),
            array(
                'id'       => 'youtube-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Youtube Link', 'trendymag'),
                'subtitle' => esc_html__('Enter youtube chanel link. Leave blank to hide icon.', 'trendymag'),
            ),
            array(
                'id'       => 'pinterest-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Pinterest Link', 'trendymag'),
                'subtitle' => esc_html__('Enter pinterest link. Leave blank to hide icon.', 'trendymag'),
                'default'  => "#"
            ),
            array(
                'id'       => 'flickr-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Flickr Link', 'trendymag'),
                'subtitle' => esc_html__('Enter flicker link. Leave blank to hide icon.', 'trendymag'),
            ),
            array(
                'id'       => 'linkedin-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Linkedin Link', 'trendymag'),
                'subtitle' => esc_html__('Enter linkedin profile link. Leave blank to hide icon.', 'trendymag'),
            ),
            array(
                'id'       => 'vimeo-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Vimeo Link', 'trendymag'),
                'subtitle' => esc_html__('Enter vimeo chanel link. Leave blank to hide icon.', 'trendymag'),
            ),
            array(
                'id'       => 'instagram-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Instagram Link', 'trendymag'),
                'subtitle' => esc_html__('Enter instagram page or profile link. Leave blank to hide icon.', 'trendymag'),
            ),
            array(
                'id'       => 'dribbble-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Dribbble Link', 'trendymag'),
                'subtitle' => esc_html__('Enter dribbble profile link. Leave blank to hide icon.', 'trendymag'),
            ),
            array(
                'id'       => 'behance-link',
                'type'     => 'text',
                'required' => array('social-icon-visibility', '=', '1'),
                'title'    => esc_html__('Behance Link', 'trendymag'),
                'subtitle' => esc_html__('Enter behance profile link. Leave blank to hide icon.', 'trendymag'),
            ),
        )
    ));

    /*
     * <--- END SECTIONS
     */