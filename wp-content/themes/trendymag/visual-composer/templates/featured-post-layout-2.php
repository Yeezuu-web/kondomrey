<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_two( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 2', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_two';

	ob_start();
	?>[vc_row gap="3" css=".vc_custom_1500898235688{padding-top: 45px !important;padding-bottom: 45px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/4" offset="vc_col-md-3"][tt_featured_news post_id="51" post_width="trendymag-one-fourth" cat_bg_color="spring-green-bg"][/vc_column][vc_column width="1/4"][tt_featured_news post_id="54" post_width="trendymag-one-fourth" cat_bg_color="deep-sky-blue-bg"][/vc_column][vc_column width="1/4"][tt_featured_news post_id="57" post_width="trendymag-one-fourth" cat_bg_color="electric-purple-bg"][/vc_column][vc_column width="1/4"][tt_featured_news post_id="368" post_width="trendymag-one-fourth" cat_bg_color="yellow-bg"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_two' );