<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$page_sidebar = trendymag_option( 'page-layout', false, 'right-sidebar' );
if ( $page_sidebar == 'right-sidebar' and is_active_sidebar( 'trendymag-page-sidebar' ) ) : ?>
	<div class="col-md-4">
		<div class="tt-sidebar-wrapper right-sidebar" role="complementary">
			<?php dynamic_sidebar( 'trendymag-page-sidebar' ); ?>
		</div>
	</div>
<?php elseif ( $page_sidebar == 'left-sidebar' and is_active_sidebar( 'trendymag-page-sidebar' ) ) : ?>
	<div class="col-md-4 col-md-pull-8">
		<div class="tt-sidebar-wrapper left-sidebar" role="complementary">
			<?php dynamic_sidebar( 'trendymag-page-sidebar' ); ?>
		</div>
	</div>
<?php endif;