<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $featured_image = 'trendymag-half';

    if ($tt_atts['post_width'] == 'trendymag-one-fourth') :
        $featured_image = 'trendymag-one-fourth';
    elseif($tt_atts['post_width'] == 'trendymag-two-third') :
        $featured_image = 'trendymag-two-third';
    endif;

    $colors = array(
        'blue' => '#5472d2',
        'turquoise' => '#00c1cf',
        'pink' => '#fe6c61',
        'violet' => '#8d6dc4',
        'peacoc' => '#4cadc9',
        'chino' => '#cec2ab',
        'mulled-wine' => '#50485b',
        'vista-blue' => '#75d69c',
        'orange' => '#f7be68',
        'sky' => '#5aa1e3',
        'green' => '#6dab3c',
        'juicy-pink' => '#f4524d',
        'sandy-brown' => '#f79468',
        'purple' => '#b97ebb',
        'black' => '#2a2a2a',
        'grey' => '#ebebeb',
        'white' => '#ffffff'
    );

    $gradient_1 = $tt_atts['gradient_color_1'];
    $gradient_2 = $tt_atts['gradient_color_2'];

    $gradient_custom_color_1 = $tt_atts['gradient_custom_color_1'];
    $gradient_custom_color_2 = $tt_atts['gradient_custom_color_2'];

    $post_height = "";

    if ($tt_atts['post_height']) {
        $post_height = 'height: ' .$tt_atts['post_height'].';';
    }

    ob_start();

    $args = array(
        'p'              => $tt_atts['post_id'],
        'post_type'      => 'post',
        'post_status'    => 'publish'
    ); ?>

    
    <div class="post-wrapper featured-video <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['post_width'].' '.$css_class); ?>">
        <?php $query = new WP_Query( $args ); ?>

        <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); 
                
                $uid = uniqid();

                if ($tt_atts['gradient_style'] == 'gradient' || $tt_atts['gradient_style'] == 'gradient-custom') :
                    
                    $gradient_color_1 = 'rgba('.trendymag_hex2rgb($colors[ $gradient_1 ]).', '.$tt_atts['gradient_opacity_1'].')';
                    $gradient_color_2 = 'rgba('.trendymag_hex2rgb($colors[ $gradient_2 ]).', '.$tt_atts['gradient_opacity_2'].')';

                    if ( 'gradient-custom' === $tt_atts['gradient_style'] ) {
                        $gradient_color_1 = $gradient_custom_color_1;
                        $gradient_color_2 = $gradient_custom_color_2;
                    }

                    $gradient_css = array();
                    $gradient_css[] = 'background-color: ' . $gradient_color_1;

                    $gradient_css[] = 'background-image: -moz-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ')';
                    $gradient_css[] = 'background-image: -webkit-gradient(left top, left bottom, color-stop(30%, ' . $gradient_color_1 . '), color-stop(100%, ' . $gradient_color_2 . '))';
                    $gradient_css[] = 'background-image: -webkit-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . '100%)';
                    $gradient_css[] = 'background-image: -o-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
                    $gradient_css[] = 'background-image: -ms-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
                    $gradient_css[] = 'background-image: linear-gradient(to bottom, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
                    $gradient_css[] = 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' . $gradient_color_1 . ', endColorstr=' . $gradient_color_2 . ', GradientType=0 )';

                    echo '<style type="text/css">.image-overlay.tt_btn-gradient-bg-' . $uid . '{' . implode( ';', $gradient_css ) . ';' . '}</style>';
                endif; ?>

                <div <?php post_class('featured-news'); ?>>
                    <?php if (has_post_thumbnail()) : 

                        $tt_attachment_id = get_post_thumbnail_id(get_the_ID());
                        $tt_image_attr = wp_get_attachment_image_src($tt_attachment_id, $featured_image ); 

                        $background_image = 'background-image: url('.esc_url($tt_image_attr[0]).');';

                        ?>

                        <a href="<?php the_permalink(); ?>">
                            <span class="entry-thumb" itemprop="image" style="<?php echo esc_attr($background_image.''.$post_height);?>"></span>
                            <div class="image-overlay overlay-black tt_btn-gradient-bg-<?php echo esc_attr($uid); ?>"></div>
                        </a>

                        <?php $post_video = get_post_meta( get_the_ID(), 'trendymag_embed_video', true );
                        if ($post_video ): ?>

                            <a class="tt-popup" href="<?php echo esc_url($post_video); ?>"><i class="fa fa-play"></i></a>

                        <?php endif ?>

                    <?php endif; ?>
                </div> <!-- .featured-news -->

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
        <?php endif; ?>
    </div> <!-- .post-wrapper -->
<?php echo ob_get_clean();