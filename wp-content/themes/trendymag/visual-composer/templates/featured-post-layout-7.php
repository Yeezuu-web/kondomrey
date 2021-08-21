<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_seven( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 7', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_seven';

	ob_start();
	?>[vc_row gap="3" css=".vc_custom_1500977630632{padding-top: 45px !important;padding-bottom: 45px !important;background-color: #222222 !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/2"][tt_featured_news post_id="182" cat_bg_color="deep-sky-blue-bg"][/vc_column_inner][vc_column_inner width="1/2"][tt_featured_news post_id="742" cat_bg_color="electric-purple-bg"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/4"][tt_featured_news post_id="770" cat_bg_color="orange-peel-bg"][/vc_column_inner][vc_column_inner width="1/4"][tt_featured_news post_id="57"][/vc_column_inner][vc_column_inner width="1/4"][tt_featured_news post_id="607" cat_bg_color="spring-green-bg"][/vc_column_inner][vc_column_inner width="1/4"][tt_featured_news post_id="697" cat_bg_color="light-sea-green-bg"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_seven' );