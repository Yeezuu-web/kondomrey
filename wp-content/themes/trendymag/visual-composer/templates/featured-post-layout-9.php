<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_nine( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 9', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_nine';

	ob_start();
	?>[vc_row section_content_width="container-fullwidth" gap="0"][vc_column][vc_row_inner][vc_column_inner width="2/3"][tt_featured_news post_id="57" post_width="trendymag-two-third" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(255,126,0,0.5)" gradient_custom_color_2="rgba(239,11,0,0.66)" custom_gradient="yes"][/vc_column_inner][vc_column_inner width="1/3"][tt_featured_news post_id="293" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(0,126,255,0.46)" gradient_custom_color_2="rgba(0,216,255,0.78)" custom_gradient="yes" post_height="210px"][tt_featured_news post_id="742" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(248,0,54,0.34)" gradient_custom_color_2="rgba(48,39,130,0.96)" custom_gradient="yes" post_height="210px"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][tt_featured_news post_id="382" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(126,0,255,0.47)" gradient_custom_color_2="rgba(255,0,132,0.51)" custom_gradient="yes" post_height="310px"][/vc_column_inner][vc_column_inner width="1/3"][tt_featured_news post_id="466" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(0,95,178,0.54)" gradient_custom_color_2="rgba(0,228,255,0.87)" custom_gradient="yes" post_height="310px"][/vc_column_inner][vc_column_inner width="1/3"][tt_featured_news post_id="607" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(255,126,0,0.64)" gradient_custom_color_2="rgba(239,11,0,0.42)" custom_gradient="yes" post_height="310px"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_nine' );