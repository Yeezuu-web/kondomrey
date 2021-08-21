<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_one( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 1', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_one';

	ob_start();
	?>[vc_row gap="3" css=".vc_custom_1499246771022{padding-top: 45px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/2" offset="vc_col-md-3"][tt_featured_news post_id="45" post_width="trendymag-one-fourth"][/vc_column][vc_column width="1/2" offset="vc_col-lg-6 vc_col-md-9"][tt_featured_news post_id="48" cat_bg_color="yellow-bg"][/vc_column][vc_column width="1/2" offset="vc_col-md-3 vc_hidden-md vc_hidden-sm vc_hidden-xs"][vc_single_image image="679" img_size="full" css=".vc_custom_1500800271384{margin-bottom: 0px !important;}"][/vc_column][/vc_row][vc_row gap="4" css=".vc_custom_1480085538352{border-bottom-width: 1px !important;padding-bottom: 70px !important;background-color: #f4f4f4 !important;border-bottom-color: #eaeaea !important;border-bottom-style: solid !important;}"][vc_column width="1/2" offset="vc_col-md-3"][tt_featured_news post_id="51" post_width="trendymag-one-fourth" cat_bg_color="spring-green-bg"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tt_featured_news post_id="54" post_width="trendymag-one-fourth" cat_bg_color="deep-sky-blue-bg" gradient_style="gradient" gradient_color_1="black" gradient_color_2="black" gradient_opacity_1=".3"][/vc_column][vc_column offset="vc_col-md-6"][tt_featured_news post_id="57" cat_bg_color="electric-purple-bg"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_one' );