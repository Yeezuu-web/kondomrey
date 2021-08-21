<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="post-author">
    <div class="media">
        <div class="media-left">
            <?php $author_url = get_author_posts_url( get_the_author_meta( 'ID' ));?>
            <a href="<?php echo esc_url($author_url); ?>" class="media-object">
                <?php
                echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'trendymag_author_bio_avatar_size', 110 ) ); 
                ?>
            </a>
        </div>
        
        <div class="media-body">
            <div class="author-info">
                <h3><a href="<?php echo esc_url($author_url); ?>"><?php echo get_the_author(); ?></a></h3>
                <span class="post-count"><?php esc_html_e( 'Total Post: ', 'trendymag' );?><a href="<?php echo esc_url($author_url); ?>"><?php echo count_user_posts( get_the_author_meta( 'ID' ) , 'post' );?></a></span>
                <p><?php echo esc_html(get_the_author_meta('description')); ?></p>

                <?php get_template_part( 'template-parts/author-social', 'info'); ?>
            </div>
        </div>
    </div> <!-- .media -->
</div> <!-- .post-author -->