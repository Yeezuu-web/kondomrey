<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_eight( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 8', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_eight';

	ob_start();
	?>[vc_row gap="3" css=".vc_custom_1500991874800{padding-top: 45px !important;padding-right: 45px !important;padding-bottom: 45px !important;padding-left: 45px !important;background-color: #222222 !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/2"][tt_featured_news post_id="182" cat_bg_color="color-transparent-bg" gradient_style="gradient" gradient_opacity_1=".7" gradient_opacity_2=".7"][/vc_column_inner][vc_column_inner width="1/2"][tt_featured_news post_id="742" cat_bg_color="color-transparent-bg" gradient_style="gradient" gradient_color_1="juicy-pink" gradient_color_2="orange" gradient_opacity_1=".7" gradient_opacity_2=".8"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/4"][tt_featured_news post_id="770" cat_bg_color="color-transparent-bg" gradient_style="gradient" gradient_color_1="green" gradient_color_2="vista-blue" gradient_opacity_1=".7" gradient_opacity_2=".8"][/vc_column_inner][vc_column_inner width="1/4"][tt_featured_news post_id="57" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(0,91,234,0.6)" gradient_custom_color_2="rgba(0,198,251,0.6)"][/vc_column_inner][vc_column_inner width="1/4"][tt_featured_news post_id="607" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(196,113,245,0.7)" gradient_custom_color_2="rgba(250,113,205,0.7)"][/vc_column_inner][vc_column_inner width="1/4"][tt_featured_news post_id="697" cat_bg_color="color-transparent-bg" gradient_style="gradient-custom" gradient_custom_color_1="rgba(33,212,253,0.64)" gradient_custom_color_2="rgba(183,33,255,0.65)"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_eight' );