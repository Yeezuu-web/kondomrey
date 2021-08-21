<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $featured_image = 'trendymag-half';
    $overlay_class = '';

    if ($tt_atts['post_style'] == 'style-two') :
        $overlay_class = 'overlay-black';
    endif;

    $gradient_1 = $tt_atts['gradient_color_1'];
    $gradient_2 = $tt_atts['gradient_color_2'];

    $gradient_custom_color_1 = $tt_atts['gradient_custom_color_1'];
    $gradient_custom_color_2 = $tt_atts['gradient_custom_color_2'];

    $wrapper_height = "";
    if ($tt_atts['wrapper_height']) :
        $wrapper_height = 'height: ' .$tt_atts['wrapper_height'].';';
    endif;

    $grid_class = '';
    $post_class = array();
    $post_class[] = 'recent-news';

    
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
        'white' => '#ffffff',
    );

    ob_start();

    $args = array(
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'cat'               => $tt_atts['categories'],
        'posts_per_page'    => $tt_atts['total_item'],
        'post__not_in'      => explode(',', $tt_atts['exclude']),
        'offset'            => $tt_atts['offset'],
        'orderby'           => $tt_atts['orderby'],
        'order'             => $tt_atts['order'],
        'ignore_sticky_posts' => 1
    ); ?>

    <div class="post-wrapper category-news <?php echo esc_attr($tt_atts['post_style'].' '.$tt_atts['el_class']); ?>" style="<?php echo esc_attr($wrapper_height);?>">
        
        <?php if ($tt_atts['post_style'] == 'style-one' || $tt_atts['post_style'] == 'style-two'): ?>
            <div class="row">
        <?php endif ?>
        

        <?php $query = new WP_Query( $args ); ?>

        <?php if ( $query->have_posts() ) : 

            $count = 0;
        ?>
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


                <?php if ($tt_atts['post_style'] == 'style-one' || $tt_atts['post_style'] == 'style-two'): ?>

                    <?php if ($tt_atts['post_layout'] == 'layout-one') : 
                        $grid_class = 'col-md-6 col-sm-6';
                    elseif($tt_atts['post_layout'] == 'layout-two') :
                        if ($count == 0) {
                            $grid_class = 'col-md-12 col-sm-12';
                            $featured_image = 'trendymag-blog-thumbnail';
                        } else {
                            $grid_class = 'col-md-6 col-sm-12';
                            $featured_image = 'trendymag-half';
                        }
                    elseif($tt_atts['post_layout'] == 'layout-three') :
                        $grid_class = 'col-md-4 col-sm-6';
                        $featured_image = 'trendymag-recent-post2';
                    elseif($tt_atts['post_layout'] == 'layout-four') :
                        if ($count == 0) {
                            $grid_class = 'col-md-12 col-sm-12';
                            $featured_image = 'trendymag-blog-thumbnail';
                        } else {
                            $grid_class = 'col-md-4 col-sm-6';
                            $featured_image = 'trendymag-half';
                        }
                    elseif($tt_atts['post_layout'] == 'layout-five') :
                        $grid_class = 'col-md-3 col-sm-6';
                    endif;
                    ?>
                    <div class="<?php echo esc_attr($grid_class); ?>">

                <?php endif; ?>


                <div <?php post_class($post_class); ?>>
                    
                    <?php if ($count == 0 && $tt_atts['post_style'] == 'style-three' || $tt_atts['post_style'] == 'style-one' || $tt_atts['post_style'] == 'style-two') :

                        if ( $tt_atts['show_category'] == 'show' && $tt_atts['post_style'] == 'style-one' || $tt_atts['post_style'] == 'style-three') : ?>
                            <div class="entry-meta">
                                <?php if ($tt_atts['post_style'] == 'style-one'): ?>
                                    <span class="posted-in"><?php trendymag_post_cat(); ?></span>
                                <?php else : ?>
                                    <span class="posted-in <?php echo esc_attr($tt_atts['cat_bg_color']); ?>"><?php echo get_the_category_list(esc_html_x(' ', 'Used between list items, there is a space after the comma.', 'trendymag')); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="entry-thumb" itemprop="image">
                                    <?php the_post_thumbnail( $featured_image, array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>
                                    <div class="image-overlay tt_btn-gradient-bg-<?php echo esc_attr($uid.' '.$overlay_class); ?>"></div>
                                </div>
                            </a>
                        <?php endif;
                    endif; ?>

                    <div class="post-contents">

                        <?php if ($tt_atts['post_style'] == 'style-one' || $tt_atts['post_style'] == 'style-three'): ?>
                            <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                        <?php endif; ?>
                        
                        <div class="entry-meta">
                            <ul class="list-inline">
                                <?php if ( $tt_atts['show_category'] == 'show' && $tt_atts['post_style'] == 'style-two') : ?>
                                    <li><span class="posted-in"><?php trendymag_post_cat(); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if ( $tt_atts['show_date'] == 'show' ) : ?>
                                    <li><span class="entry-time published" itemprop="datePublished" content="<?php echo get_the_time( get_option( 'date_format' ) ); ?>"><a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></a></span></li>
                                <?php endif; ?>

                                <?php if ( $tt_atts['show_comment'] == 'show' ) : ?>
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
                                <?php endif; ?>
                            </ul>
                        </div> <!-- .entry-meta -->

                        <?php if ($tt_atts['post_style'] == 'style-two'): ?>
                            <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                        <?php endif; ?>

                    </div> <!-- .post-contents -->

                    <?php if ($tt_atts['colored_border'] == 'show' && $tt_atts['post_style'] == 'style-one'):
                        $terms = wp_get_post_terms(get_the_ID(), 'category');
                        $color = "";
                        if (get_term_meta($terms[0]->term_id, 'color', true )) {
                            $color = 'background-color: #'.get_term_meta($terms[0]->term_id, 'color', true ).'';
                        } ?>
                        <div class="colored-border" style="<?php echo esc_attr($color);?>"></div>
                    <?php endif; ?>
                </div> <!-- .recent-news -->

                <?php if ($tt_atts['post_style'] == 'style-one' || $tt_atts['post_style'] == 'style-two'): ?>
                    </div>
                <?php endif; ?>
            <?php 
            $count++;
            endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
        <?php endif; ?>

        <?php if ($tt_atts['post_style'] == 'style-three' && $tt_atts['colored_border'] == 'show'): ?>
            <div class="colored-border <?php echo esc_attr($tt_atts['cat_bg_color']); ?>"></div>
        <?php endif; ?>

        <?php if ($tt_atts['post_style'] == 'style-one' || $tt_atts['post_style'] == 'style-two'): ?>
            </div>
        <?php endif ?>
    </div> <!-- .post-wrapper -->
<?php echo ob_get_clean();