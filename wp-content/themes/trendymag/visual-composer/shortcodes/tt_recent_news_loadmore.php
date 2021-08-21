<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $featured_image = 'trendymag-recent-post';
    $overlay_class = '';

    if ($tt_atts['post_style'] == 'style-two') :
        $featured_image = 'trendymag-recent-post2';
        $overlay_class = 'overlay-black';
    endif;

    $gradient_1 = $tt_atts['gradient_color_1'];
    $gradient_2 = $tt_atts['gradient_color_2'];

    $gradient_custom_color_1 = $tt_atts['gradient_custom_color_1'];
    $gradient_custom_color_2 = $tt_atts['gradient_custom_color_2'];

    $post_height = "";

    if ($tt_atts['post_height']) {
        $post_height = 'height: ' .$tt_atts['post_height'].';';
    }

    
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

    wp_enqueue_style( 'isotope-css' );
    wp_enqueue_script( 'isotope' );

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'orderby'               => $tt_atts['orderby'],
        'order'                 => $tt_atts['order'],
        'ignore_sticky_posts'   => 1,
        'paged'                 => $paged
    );

    if ($tt_atts['post_source'] == 'most-recent' || $tt_atts['post_source'] == 'by-category' || $tt_atts['post_source'] == 'by-tag' || $tt_atts['post_source'] == 'by-author') :
        $post_exclude = explode(',', $tt_atts['exclude']);
        $args = wp_parse_args(
            array(
                'posts_per_page'    => $tt_atts['total_item'],
                'post__not_in'      => $post_exclude,
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-category' && $tt_atts['taxonomies']) :
        $args = wp_parse_args(
            array(
                'cat' => $tt_atts['taxonomies'],
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-tag' && $tt_atts['tags']) :
        $post_tag_array = explode(',', $tt_atts['tags']);

        $args = wp_parse_args(
            array(
                'tag_slug__in' => $post_tag_array,
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-author' && $tt_atts['authors']) :
        $args = wp_parse_args(
            array(
                'author' => $tt_atts['authors'],
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-id' && $tt_atts['post_id']) :
        $post_id_array = explode(',', $tt_atts['post_id']);
        $args = wp_parse_args(
            array(
                'post__in' => $post_id_array,
            )
        , $args );
    endif;

    ?>

    <div class="post-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['post_style']); ?>">
        <div class="post-grid post-loadmore row">

            <?php $query = new WP_Query( $args ); ?>

            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); $uid = uniqid();

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

                    <div class="post-grid-item col-xs-12 col-sm-6 col-md-<?php echo esc_attr($tt_atts['grid_column']);?>" style="<?php echo esc_attr($post_height);?>">
                        <div <?php post_class('recent-news'); ?>>

                            <?php if ( $tt_atts['show_category'] == 'show' && $tt_atts['post_style'] == 'style-one' ) : ?>
                                <div class="entry-meta">
                                    <span class="posted-in"><?php trendymag_post_cat(); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="entry-thumb" itemprop="image">
                                        <?php the_post_thumbnail( $featured_image, array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>
                                        <div class="image-overlay tt_btn-gradient-bg-<?php echo esc_attr($uid.' '.$overlay_class); ?>"></div>
                                    </div>
                                </a>
                            <?php endif; ?>

                            <div class="post-contents">

                                <?php if ($tt_atts['post_style'] == 'style-one'): ?>
                                    <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                                <?php endif; ?>
                                
                                <div class="entry-meta">
                                    <ul class="list-inline">

                                        <?php if ( $tt_atts['show_category'] == 'show' && $tt_atts['post_style'] == 'style-two') : ?>
                                            <li><span class="posted-in"><?php trendymag_post_cat(); ?></span></li>
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
                                </div> <!-- /.entry-meta -->

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
                            
                        </div> <!-- .featured-news -->
                    </div> <!-- .col-sm-# -->
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
            <?php endif; ?>

            <?php $allposts = wp_count_posts('post');
                $postlimit = $tt_atts['total_item']; ?>
        </div> <!-- .row -->

        <?php if ($allposts->publish > $postlimit ) : ?>
            <div class="row loadmore-btn-wrap">
                <div class="col-md-12">
                    <a class="btn loadmore-btn btn-block" 
                    data-postlimit="<?php echo intval($postlimit); ?>" 
                    data-allposts="<?php echo intval($allposts->publish); ?>" 
                    data-grid_column="<?php echo esc_attr($tt_atts['grid_column']);?>" 
                    data-style="<?php echo esc_attr($tt_atts['post_style']);?>" 
                    data-post_source="<?php echo esc_attr($tt_atts['post_source']);?>" 
                    data-taxonomies="<?php echo esc_attr($tt_atts['taxonomies']);?>" 
                    data-tags="<?php echo esc_attr($tt_atts['tags']);?>" 
                    data-authors="<?php echo esc_attr($tt_atts['authors']);?>" 
                    data-post_id="<?php echo esc_attr($tt_atts['post_id']);?>" 
                    data-exclude="<?php echo esc_attr($tt_atts['exclude']);?>" 
                    data-category="<?php echo esc_attr($tt_atts['show_category']);?>" 
                    data-date="<?php echo esc_attr($tt_atts['show_date']);?>" 
                    data-comment="<?php echo esc_attr($tt_atts['show_comment']);?>" 
                    data-colored_border="<?php echo esc_attr($tt_atts['colored_border']);?>" 
                    data-orderby="<?php echo esc_attr($tt_atts['orderby']);?>" 
                    data-order="<?php echo esc_attr($tt_atts['order']);?>" 
                    data-post_height="<?php echo esc_attr($tt_atts['post_height']);?>" 
                    data-gradient_style="<?php echo esc_attr($tt_atts['gradient_style']);?>" 
                    data-gradient_color_1="<?php echo esc_attr($tt_atts['gradient_color_1']);?>" 
                    data-gradient_color_2="<?php echo esc_attr($tt_atts['gradient_color_2']);?>" 
                    data-gradient_opacity_1="<?php echo esc_attr($tt_atts['gradient_opacity_1']);?>" 
                    data-gradient_opacity_2="<?php echo esc_attr($tt_atts['gradient_opacity_2']);?>" 
                    data-gradient_custom_color_1="<?php echo esc_attr($tt_atts['gradient_custom_color_1']);?>" 
                    data-gradient_custom_color_2="<?php echo esc_attr($tt_atts['gradient_custom_color_2']);?>" 
                     href="#"><?php echo esc_html($tt_atts['loadmore_text']); ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div> <!-- .post-wrapper -->
<?php echo ob_get_clean();