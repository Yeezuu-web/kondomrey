<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>


<!--page title start-->
<section class="page-title <?php echo (is_single() ? 'single-page-title' : '')?>" role="banner">
    <div class="container">
        <?php if (!is_single()): ?>
            <h2><?php echo esc_html( trendymag_page_header_section_title() ); ?></h2>
        <?php endif; ?>
        <div class="tt-breadcrumb">
            <?php trendymag_breadcrumbs(); ?>
        </div>
    </div><!-- .container -->
</section> <!-- page-title -->