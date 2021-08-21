<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; 

if(trendymag_option('at-ad-visibility') == "1") : ?>
    <div class="article-promo-top text-center">
        <?php get_template_part('template-parts/ads', 'article-top' ); ?>
    </div>
<?php endif; 
do_action('trendymag_before_article');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="<?php echo trendymag_protocol();?>://schema.org/Article">
    <div class="blog-content">
        <?php trendymag_posted_on(); ?>

        <?php trendymag_post_share('top'); ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->

        <?php trendymag_post_share('bottom'); ?>
    </div><!-- /.blog-content -->

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