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
<div class="news-wrapper content-wrapper single-news single-layout-five">
    <header class="featured-wrapper">
        <?php
            if (function_exists('rwmb_meta')) :
                $tt_slides = rwmb_meta('trendymag_post_gallery','type=image_advanced');
            endif; 

        if ( has_post_thumbnail() || $tt_slides) : ?>
            <div class="post-thumbnail">
                <?php do_action( 'trendymag_before_post_thumbnail'); ?>
                    
                    <?php if (function_exists('rwmb_meta') && $tt_slides) :
                        if ($tt_slides && count($tt_slides) > 0) : ?>
                            <div id="news-gallery-<?php echo get_the_ID();?>" class="news-gallery carousel slide">
                                <div class="carousel-inner">
                                    <?php 
                                    $carousel_count = 1; 
                                    foreach( $tt_slides as $slide ) : ?>
                                        <div class="item <?php if($carousel_count == 1) echo 'active'; ?>">
                                            <?php $images_src = wp_get_attachment_image_src( $slide['ID'], 'trendymag-news-cover-thumbnail'); ?>
                                            <img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php trendymag_alt_text();?>">
                                        </div>
                                    <?php
                                    $carousel_count++;
                                    endforeach; ?>
                                </div> <!-- .carousel-inner -->
                                
                                <!-- Controls -->
                                <a class="left carousel-control" href="#news-gallery-<?php echo get_the_ID();?>" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                <a class="right carousel-control" href="#news-gallery-<?php echo get_the_ID();?>" data-slide="next"><i class="fa fa-angle-right"></i></a>
                            </div> <!-- .blog-gallery-carousel -->
                        <?php
                        endif;
                    else :
                        the_post_thumbnail('trendymag-news-cover-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive')); 
                    endif; ?>
                <?php do_action( 'trendymag_after_post_thumbnail'); ?>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>

        <div class="container fullwidth-title-wrapper">
            <div class="fullwidth-title">
                <div class="entry-meta">
                    <ul class="list-inline">
                        <li><span class="posted-in"><?php trendymag_post_cat(); ?></span></li>
                        <li>
                            <?php if (function_exists('zilla_likes')) : ?>
                                <span class="right"><?php zilla_likes(); ?></span>
                            <?php endif; ?>
                        </li>
                        <li>
                            <span class="post-comments-number">
                                <i class="fa fa-comment-o"></i><?php
                                comments_popup_link(
                                    esc_html__('0', 'trendymag'),
                                    esc_html__('1', 'trendymag'),
                                    esc_html__('%', 'trendymag'), '',
                                    esc_html__('Closed', 'trendymag')
                                ); ?>
                            </span>
                        </li>
                        <li><span><i class="fa fa-newspaper-o"></i><?php echo trendymag_estimated_reading_time(); ?></span></li>
                    </ul>
                </div>
                <div class="entry-header">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                </div><!-- /.entry-header -->
            </div><!-- /.fullwidth-title-wrapper -->
        </div><!-- /.container -->
    </header><!-- /.featured-wrapper -->

    <div class="container">
        <div class="row">
            <div class="sidebar-sticky <?php echo esc_attr($grid_column); ?>">
                <div id="main" class="posts-content" role="main">
                    <?php while ( have_posts() ) : the_post(); 
                        get_template_part( 'single-loop', 'five'); 

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