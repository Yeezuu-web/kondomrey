<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_five( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 5', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_five';

	ob_start();
	?>[vc_row css=".vc_custom_1500886645545{padding-top: 45px !important;background-color: #f4f4f4 !important;}"][vc_column offset="vc_col-md-8" css=".vc_custom_1500886575092{margin-bottom: 65px !important;}"][tt_featured_news post_id="174" post_width="trendymag-two-third" cat_bg_color="deep-sky-blue-bg"][vc_single_image image="1421" img_size="full" css=".vc_custom_1501660710570{margin-top: 35px !important;padding-top: 10px !important;padding-right: 10px !important;padding-bottom: 10px !important;padding-left: 10px !important;background-color: #ffffff !important;}"][/vc_column][vc_column sticky_column="true" offset="vc_col-md-4" css=".vc_custom_1500886629980{margin-bottom: 65px !important;}"][tt_single_category_news post_style="style-three" categories="10"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_five' );