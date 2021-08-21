<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_page_template = basename( get_page_template_slug() );


if ( is_page() and $tt_page_template != 'template-home.php') : 
    get_template_part( 'template-parts/page-header', 'section' );
endif;

if ( ! is_page() && ! is_404() ) : 
    get_template_part( 'template-parts/page-header', 'section' );
endif;