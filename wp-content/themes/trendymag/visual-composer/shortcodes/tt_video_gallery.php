<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    $extra_class = "recent-news";

    $args = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => $tt_atts['total_item'],
        'meta_key'              => 'trendymag_embed_video',
        'ignore_sticky_posts'   => 1
    );

    if ($tt_atts['post_source'] == 'by-category' && $tt_atts['taxonomies']) :
        $args = wp_parse_args(
            array(
                'cat' => $tt_atts['taxonomies']
            )
        , $args );
    endif; ?>

<div class="tt-gallery-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <div class="gallery-wrapper">
        <div class="tt-gallery">
            <ul class="slides <?php echo esc_attr($extra_class); ?>">
                
                <?php $query = new WP_Query( $args );

                if ( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post();
                        
                        $post_video = get_post_meta( get_the_ID(), 'trendymag_embed_video', true );
                        if (function_exists('rwmb_meta') && $post_video ): ?>
                            <li>
                                <div class="tt-popup-wrapper">
                                    <?php the_post_thumbnail( 'trendymag-recent-post2', array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>

                                    <a class="tt-popup" href="<?php echo esc_url($post_video); ?>"><i class="fa fa-play"></i></a>
                                    
                                    <?php if ($tt_atts['image_caption'] == 'enable-image-caption'): ?>
                                        <div class="image-caption"><h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2></div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endif;
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
                <?php endif; ?>
                
            </ul>
        </div>
        <div class="tt-gallery-nav">
            <a class="gallery-control prev"><i class="fa fa-angle-left"></i></a>
            <a class="gallery-control next"><i class="fa fa-angle-right"></i></a>
        </div>
    </div>

    <div class="tt-gallery-thumb flexslider">
        <ul class="slides">

            <?php $post_thumb = new WP_Query( $args );

            if ( $post_thumb->have_posts() ) : ?>
                <?php while ( $post_thumb->have_posts() ) : $post_thumb->the_post(); 
                    $post_video = get_post_meta( get_the_ID(), 'trendymag_embed_video', true );
                    if (function_exists('rwmb_meta') && $post_video ): ?>
                        <li>
                            <?php the_post_thumbnail( 'trendymag-gallery-thumb', array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>
                        </li>
                    <?php endif; 
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
            <?php endif; ?>
        </ul>
    </div>
</div> <!-- .tt-gallery-wrapper -->