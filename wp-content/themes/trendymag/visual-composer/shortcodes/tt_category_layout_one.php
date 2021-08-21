<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $post_class = array();
    $post_class[] = 'recent-news';

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

    <div class="post-wrapper category-news-layout-one style-one <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="row">
            <?php $query = new WP_Query( $args ); ?>

            <?php if ( $query->have_posts() ) : 

            $count = 1; ?>

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php if ($count == 1) : ?>
                    <div class="col-md-4">
                        <div <?php post_class($post_class); ?>>
                            <?php if ( $tt_atts['show_category'] == 'show') : ?>
                                <div class="entry-meta">
                                    <span class="posted-in"><?php trendymag_post_cat(); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="entry-thumb large-post-thumb">
                                        <?php the_post_thumbnail( 'trendymag-half', array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>
                                        <div class="image-overlay overlay-black"></div>
                                    </div>
                                </a>
                            <?php endif; ?>
                            
                            <div class="post-contents large-post-contents">
                                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                                
                                <div class="entry-meta">
                                    <ul class="list-inline">
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
                            </div> <!-- .post-contents -->
                        </div> <!-- .recent-news -->
                    </div> <!-- .col-md-4 -->
                <?php else :
                    if ($count == 2) :
                        echo "<div class='col-md-8'><div class='row'>";
                    endif; ?>
                    <div class="col-md-6">
                        <div <?php post_class($post_class); ?>>
                            <div class="media">
                                <div class="media-left">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="entry-thumb">
                                                <?php the_post_thumbnail( 'trendymag-gallery-thumb', array('class' => 'img-responsive media-object', 'alt' => trendymag_alt_text()));?>
                                                <div class="image-overlay overlay-black"></div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="media-body">
                                    <div class="post-contents">
                                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                                        
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <?php if ( $tt_atts['show_date'] == 'show' ) : ?>
                                                    <li><span class="entry-time published" itemprop="datePublished" content="<?php echo get_the_time( get_option( 'date_format' ) ); ?>"><a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></a></span></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div> <!-- .entry-meta -->
                                    </div> <!-- .post-contents -->
                                </div>
                            </div> <!-- .media -->
                        </div> <!-- .recent-news -->
                    </div> <!-- .col-md-6 -->
                <?php if ($count == $tt_atts['total_item']) :
                        echo "</div></div>";
                    endif;
                endif; ?>
            <?php 
            $count++;
            endwhile; ?>

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
            <?php endif; ?>
        </div> <!-- .row -->
    </div> <!-- .post-wrapper -->
<?php echo ob_get_clean();