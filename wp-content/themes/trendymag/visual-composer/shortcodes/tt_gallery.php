<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();

    $extra_class = "";
    $image_size = "trendymag-gallery-thumbnail";

    if ($tt_atts['image_type'] == 'image-landscape') :
        $image_size = "trendymag-two-third";
    endif;

    if ($tt_atts['image_source'] == 'post-source') :
        
        $extra_class = "recent-news";

        $args = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $tt_atts['total_item'],
            'ignore_sticky_posts'   => 1
        );

        if ($tt_atts['post_source'] == 'by-category' && $tt_atts['taxonomies']) :
            $args = wp_parse_args(
                array(
                    'cat' => $tt_atts['taxonomies']
                )
            , $args );
        endif;
    endif; ?>

<div class="tt-gallery-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <div class="gallery-wrapper">
        <div class="tt-gallery">
            <ul class="slides <?php echo esc_attr($extra_class); ?>">
                
                <?php if ($tt_atts['image_source'] == 'post-source'): ?>

                    <?php $query = new WP_Query( $args ); ?>

                    <?php if ( $query->have_posts() ) : ?>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <li>
                                <?php the_post_thumbnail( $image_size, array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>

                                <?php if ($tt_atts['image_caption'] == 'enable-image-caption'): ?>
                                    <div class="image-caption"><h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2></div>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
                    <?php endif; 

                elseif($tt_atts['image_source'] == 'media-source'): ?>

                    <!-- image galery -->
                    <?php if ($tt_atts['image_source'] == 'media-source') :
                        $large_images = explode( ',', $tt_atts['images'] );
                        foreach ( $large_images as $image_id ) :
                            $img_src = wp_get_attachment_image_src( $image_id, $image_size ); ?>
                            <li>
                                <img class="img-responsive" src="<?php echo esc_url( $img_src[ 0 ] ); ?>" alt="<?php echo wp_kses( get_the_title(), array() ); ?>">
                            </li>
                        <?php endforeach;
                    endif; ?>
                    
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
            <?php if ($tt_atts['image_source'] == 'post-source'): ?>

                <?php $post_thumb = new WP_Query( $args ); ?>

                <?php if ( $post_thumb->have_posts() ) : ?>
                    <?php while ( $post_thumb->have_posts() ) : $post_thumb->the_post(); ?>
                        <li>
                            <?php the_post_thumbnail( 'trendymag-gallery-thumb', array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
                <?php endif; ?>

            <?php elseif($tt_atts['image_source'] == 'media-source'): ?>
                <!-- image thumb -->
                <?php if ($tt_atts['image_source'] == 'media-source') :
                    $thumbs = explode( ',', $tt_atts['images'] );
                    foreach ( $thumbs as $thumb_id ) :
                        $img_src = wp_get_attachment_image_src( $thumb_id, 'trendymag-gallery-thumb' ); ?>
                        <li>
                            <img class="img-responsive" src="<?php echo esc_url( $img_src[ 0 ] ); ?>"
                                 alt="<?php echo wp_kses( get_the_title(), array() ); ?>">
                        </li>
                    <?php endforeach; 
                endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div> <!-- .tt-gallery-wrapper -->