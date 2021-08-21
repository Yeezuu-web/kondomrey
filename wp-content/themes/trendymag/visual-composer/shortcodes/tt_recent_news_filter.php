<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $featured_image = 'trendymag-recent-post';
    $overlay_class = '';

    if ($tt_atts['post_style'] == 'style-two') :
        $featured_image = 'trendymag-one-fourth';
        $overlay_class = 'overlay-black';
    endif;

    $gradient_1 = $tt_atts['gradient_color_1'];
    $gradient_2 = $tt_atts['gradient_color_2'];

    $gradient_custom_color_1 = $tt_atts['gradient_custom_color_1'];
    $gradient_custom_color_2 = $tt_atts['gradient_custom_color_2'];

    $post_height = "";

    if ($tt_atts['post_height']) :
        $post_height = 'height: ' .$tt_atts['post_height'].';';
    endif;

    $filter_class = 'category-dropdown-list';
    if ($tt_atts['filter_style'] == 'inline-style') :
        $filter_class = 'category-inline-list';
    endif;

    $element_title = 'has-element-title';

    if (! $tt_atts['element_title'] && $tt_atts['filter_style'] == 'inline-style') {
        $element_title = 'no-element-title';
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

    $categories = explode(',', $tt_atts['taxonomies']); 
    $post_exclude = explode(',', $tt_atts['exclude']);

    $uid = uniqid();

    if ($tt_atts['taxonomies']) : ?>
    
    <div class="post-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['post_style'].' '.$element_title); ?>">
        <?php if ($tt_atts['element_title']): ?>
            <div class="element-title">
                <h2><?php echo esc_html($tt_atts['element_title']); ?></h2>
            </div>
        <?php endif; ?>

        <?php if ($tt_atts['filter_visibility'] == 'show'): ?>
            <div class="catagory-dropdown-wrapper clearfix">
                <div class="nav nav-tabs <?php echo esc_attr($filter_class);?>" data-tabs="tabs">
                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo esc_html($tt_atts['filter_text']);?><span class="fa fa-chevron-down"></span>
                    </button>
                    <ul class="list-unstyled text-left" aria-labelledby="dLabel">
                        <li class="is-checked active"><a href="#all-category-<?php echo esc_attr($uid);?>" data-toggle="tab"><?php echo esc_html($tt_atts['filter_text']);?></a></li>
                        <?php $count = 0;
                        foreach($categories as $cat) : ?>
                            <?php $term = get_term( $cat, 'category' );?>
                                <li>
                                    <a href="#<?php echo esc_attr($term->slug.'-'.$uid); ?>" data-toggle="tab">
                                        <?php echo esc_html($term->name); ?>
                                    </a>
                                </li>
                            <?php $count++;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <div class="tab-content">
            <?php 
            $args = array(
                'post_type'         => 'post',
                'post_status'       => 'publish',
                'posts_per_page'    => $tt_atts['total_item'],
                'post__not_in'      => $post_exclude,
                'offset'            => $tt_atts['offset'],
                'orderby'           => $tt_atts['orderby'],
                'order'             => $tt_atts['order'],
                'ignore_sticky_posts' => 1,
            ); ?>

            <?php $recent_query = new WP_Query( $args ); ?>

            <?php if ( $recent_query->have_posts() ) : ?>

            <div class="tab-pane active" id="all-category-<?php echo esc_attr($uid);?>">
                <div class="tab-loader"></div>
                <div class="row">
                    <?php while ( $recent_query->have_posts() ) : $recent_query->the_post();
                        
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

                        <div class="post-grid-item col-sm-6 col-md-<?php echo esc_attr($tt_atts['grid_column']); ?>" style="<?php echo esc_attr($post_height);?>">
                            <div <?php post_class('recent-news'); ?>>

                                <?php if ( $tt_atts['show_category'] == 'show' && $tt_atts['post_style'] == 'style-one' ) : ?>
                                    <div class="entry-meta">
                                        <span class="posted-in"><?php trendymag_post_cat(); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="entry-thumb <?php echo esc_attr($featured_image);?>" itemprop="image">
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
                                    </div>

                                    <?php if ($tt_atts['post_style'] == 'style-two'): ?>
                                        <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                                    <?php endif; ?>
                                </div> <!-- .post-contents -->
                                
                                <?php if ($tt_atts['colored_border'] == 'show'): 
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
                </div> <!-- .row -->
            </div> <!-- .tab-pane -->

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
            <?php endif; ?>

            <?php
            foreach($categories as $cat) : 
                $term = get_term( $cat, 'category' ); ?>

                <?php 
                $args = array(
                    'post_type'         => 'post',
                    'post_status'       => 'publish',
                    'posts_per_page'    => $tt_atts['total_item'],
                    'post__not_in'      => $post_exclude,
                    'offset'            => $tt_atts['offset'],
                    'cat'               => $cat,
                    'orderby'           => $tt_atts['orderby'],
                    'order'             => $tt_atts['order'],
                    'ignore_sticky_posts' => 1,
                ); ?>

                <?php $query = new WP_Query( $args ); ?>

                <?php if ( $query->have_posts() ) : ?>

                <div class="tab-pane" id="<?php echo esc_attr($term->slug.'-'.$uid); ?>">
                    <div class="tab-loader"></div>
                    <div class="row">
                        <?php while ( $query->have_posts() ) : $query->the_post();

                            if ($tt_atts['gradient_style'] == 'gradient' || $tt_atts['gradient_style'] == 'gradient-custom') :
                                
                                $gradient_color_1 = 'rgba('.trendymag_hex2rgb($colors[ $gradient_color_1 ]).', '.$tt_atts['gradient_opacity_1'].')';
                                $gradient_color_2 = 'rgba('.trendymag_hex2rgb($colors[ $gradient_color_2 ]).', '.$tt_atts['gradient_opacity_2'].')';

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


                            <div class="post-grid-item col-sm-6 col-md-<?php echo esc_attr($tt_atts['grid_column']); ?>" style="<?php echo esc_attr($post_height);?>">
                                <div <?php post_class('recent-news'); ?>>

                                    <?php if ( $tt_atts['show_category'] == 'show' && $tt_atts['post_style'] == 'style-one' ) : ?>
                                        <div class="entry-meta">
                                            <span class="posted-in"><?php trendymag_post_cat(); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="entry-thumb <?php echo esc_attr($featured_image);?>" itemprop="image">
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
                                        </div>

                                        <?php if ($tt_atts['post_style'] == 'style-two'): ?>
                                            <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                                        <?php endif; ?>

                                    </div> <!-- .post-contents -->
                                    
                                    <?php if ($tt_atts['colored_border'] == 'show'): 
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
                    </div> <!-- .row -->
                </div> <!-- .tab-pane -->

                <?php else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'trendymag' ); ?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div> <!-- .tab-content -->
    </div> <!-- .post-wrapper -->
<?php endif; ?>
<?php echo ob_get_clean();