<?php
	
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
	//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Getting theme option data
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( !function_exists('trendymag_option')) :
        
        function trendymag_option($index = FALSE, $index2 = FALSE, $default = NULL) {
            global $trendymag_theme_option;

            if (empty($index)) {
                return $trendymag_theme_option;
            }

            if ($index2) {
                $result = (isset($trendymag_theme_option[ $index ]) and isset($trendymag_theme_option[ $index ][ $index2 ])) ? $trendymag_theme_option[ $index ][ $index2 ] : $default;
            } else {
                $result = isset($trendymag_theme_option[ $index ]) ? $trendymag_theme_option[ $index ] : $default;
            }

            if ($result == '1' or $result == '0') {
                return $result;
            }

            if (is_string($result) and empty($result)) {
                return $default;
            }

            return $result;
        }

    endif;


    // Load the TGM init if it exists
    require get_template_directory() . "/required-plugins/index.php";

    // Load the themes options
    require get_template_directory() . "/admin/theme-options-config.php";