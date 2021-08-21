<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; 

if(trendymag_option('at-ad-visibility') == "1") : ?>
    <div class="article-promo-top text-center">
        <?php get_template_part('template-parts/ads', 'article-top' ); ?>
    </div>
<?php endif; 

do_action('trendymag_before_article'); ?>

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
            <h2 class="entry-title"><?php the_title(); ?></h2>
        </div><!-- /.entry-header -->
        
        <?php trendymag_posted_on(); ?>

        <?php trendymag_post_share('top'); ?>
            
        <?php 
        $post_video = $post_slides = $post_audio = "";
        if (function_exists('rwmb_meta')) :
            $post_video = get_post_meta( get_the_ID(), 'trendymag_embed_video', true );
            $post_slides = rwmb_meta('trendymag_post_gallery','type=image_advanced');
            $post_audio = get_post_meta( get_the_ID(), 'trendymag_embed_audio', true );
        endif;
        if ( has_post_thumbnail() || $post_video || $post_slides || $post_audio) : ?>
            <div class="post-thumbnail">
                <?php do_action( 'trendymag_before_post_thumbnail');
                    if ($post_video) :
                        echo wp_oembed_get( $post_video, array('width' => 690) );
                    elseif($post_slides) :
                        get_template_part('template-parts/content', 'gallery');
                    elseif($post_audio) :
                        echo wp_oembed_get( $post_audio, array('width' => 690) );
                    else :
                        the_post_thumbnail('trendymag-blog-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive'));
                    endif; ?>
                <?php do_action( 'trendymag_after_post_thumbnail'); ?>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
    </header><!-- /.featured-wrapper -->
    
    <div class="blog-content">
        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->
    </div><!-- /.blog-content -->

    <?php trendymag_post_share('bottom'); ?>

    <footer class="entry-footer clearfix">
        <div class="post-tags">
            <?php $tags_list = get_the_tag_list('', ', ');
                if ($tags_list) : ?>
                    <span class="tags-links">
                        <i class="fa fa-tag"></i><?php printf(esc_html__('%1$s', 'trendymag'), $tags_list); ?>
                    </span>
                <?php endif;
            ?>
        </div> <!-- .post-tags -->

        <?php echo trendymag_item_scope_meta(); ?>
    </footer>
</article>

<?php
do_action('trendymag_after_article');
if(trendymag_option('ab-ad-visibility') == "1") : ?>
    <div class="article-promo-bottom text-center">
        <?php get_template_part('template-parts/ads', 'article-bottom' ); ?>
    </div>
<?php endif; ?>