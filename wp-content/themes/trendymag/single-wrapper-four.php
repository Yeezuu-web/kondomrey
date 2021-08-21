<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header();

    $sidebar = trendymag_option('single-news-sidebar', false, 'right-sidebar');
    $grid_column = 'col-md-10 col-md-offset-1';

    if ($sidebar == 'right-sidebar') :
        $grid_column = (is_active_sidebar('trendymag-blog-sidebar')) ? 'col-md-8 col-sm-12' : $grid_column;
    elseif ($sidebar == 'left-sidebar') :
        $grid_column = (is_active_sidebar('trendymag-blog-sidebar')) ? 'col-md-8 col-md-push-4 col-sm-12' : $grid_column;
    endif;
?>
<div class="news-wrapper content-wrapper single-news single-layout-four">
    <div class="container">
        <div class="row">
            <div class="sidebar-sticky <?php echo esc_attr($grid_column); ?>">
                <div id="main" class="posts-content" role="main">
                    <?php while ( have_posts() ) : the_post(); 
                        get_template_part( 'single-loop', 'four'); 

                        // Author description will appear below in every single blog post.
                        if (get_the_author_meta( 'description' )) :
                            get_template_part( 'author-bio' ); 
                        endif;

                        get_template_part( 'template-parts/subscription', 'form');
                        
                        trendymag_post_navigation(); 

                        get_template_part( 'template-parts/related', 'news');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    endwhile; // End of the loop. ?>
                </div> <!-- .posts-content -->
            </div> <!-- col-## -->
            
            <!-- Sidebar -->   
            <?php get_sidebar('single'); ?>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>