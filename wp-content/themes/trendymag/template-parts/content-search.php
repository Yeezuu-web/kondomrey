<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="<?php echo trendymag_protocol();?>://schema.org/Article">
    <header class="featured-wrapper">
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
            <?php
                if ( is_single() ) :
                else :
                    the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                endif;
            ?>
        </div><!-- /.entry-header -->
        
        <?php trendymag_posted_on(); ?>

    </header><!-- /.featured-wrapper -->
    
    <div class="blog-content">
        <div class="entry-content">
            <?php 
                if (is_single() || !has_excerpt()) :
                    the_content( '<span class="readmore">' . esc_html__( 'Details', 'trendymag' ) . '<i class="fa fa-angle-double-right" aria-hidden="true"></i></span>' );
                else :
                    the_excerpt();
                endif;

                wp_link_pages(array(
                    'before'      => '<div class="page-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'trendymag') . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ));
            ?>
        </div><!-- .entry-content -->
    </div><!-- /.blog-content -->
</article>