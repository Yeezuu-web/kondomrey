<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$blog_sidebar = trendymag_option('blog-sidebar', false, 'right-sidebar');

if ( $blog_sidebar == 'right-sidebar' and is_active_sidebar('trendymag-blog-sidebar')) : ?>
    <div class="sidebar-sticky col-md-4 col-sm-12">
        <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
            <?php dynamic_sidebar('trendymag-blog-sidebar'); ?>
        </div>
    </div>
<?php elseif ( $blog_sidebar == 'left-sidebar' and is_active_sidebar('trendymag-blog-sidebar')) : ?>
    <div class="sidebar-sticky col-md-4 col-md-pull-8 col-sm-12">
        <div class="tt-sidebar-wrapper left-sidebar" role="complementary">
            <?php dynamic_sidebar('trendymag-blog-sidebar'); ?>
        </div>
    </div>
<?php endif;