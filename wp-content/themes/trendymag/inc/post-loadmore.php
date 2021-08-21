<?php
add_action('wp_ajax_nopriv_trendymag_more_post_ajax', 'trendymag_more_post_ajax');
add_action('wp_ajax_trendymag_more_post_ajax', 'trendymag_more_post_ajax');
 
if (!function_exists('trendymag_more_post_ajax')) :
    function trendymag_more_post_ajax(){

        $ppp                        = (isset($_POST['perpage'])) ? $_POST['perpage'] : 4;
        $grid_column                = (isset($_POST['gridColumn'])) ? $_POST['gridColumn'] : '4';
        $post_style                 = (isset($_POST['postStyle'])) ? $_POST['postStyle'] : '';
        $postSource                 = (isset($_POST['postSource'])) ? $_POST['postSource'] : '';
        $taxonomies                 = (isset($_POST['taxonomies'])) ? $_POST['taxonomies'] : '';
        $tags                       = (isset($_POST['tags'])) ? $_POST['tags'] : '';
        $authors                    = (isset($_POST['authors'])) ? $_POST['authors'] : '';
        $post_id                    = (isset($_POST['post_id'])) ? $_POST['post_id'] : '';
        $exclude                    = (isset($_POST['exclude'])) ? $_POST['exclude'] : '';
        $category_visibility        = (isset($_POST['categoryVisibility'])) ? $_POST['categoryVisibility'] : 'show';
        $date_visibility            = (isset($_POST['dateVisibility'])) ? $_POST['dateVisibility'] : 'show';
        $comment_visibility         = (isset($_POST['commentVisibility'])) ? $_POST['commentVisibility'] : 'show';
        $colored_border             = (isset($_POST['coloredBorder'])) ? $_POST['coloredBorder'] : 'show';
        $orderby                    = (isset($_POST['orderby'])) ? $_POST['orderby'] : 'date';
        $order                      = (isset($_POST['order'])) ? $_POST['order'] : 'DESC';
        $post_height                = (isset($_POST['postHeight'])) ? $_POST['postHeight'] : '';
        $gradient_style             = (isset($_POST['gradientStyle'])) ? $_POST['gradientStyle'] : '';
        $gradient_color_one         = (isset($_POST['gradientColorOne'])) ? $_POST['gradientColorOne'] : '';
        $gradient_color_two         = (isset($_POST['gradientColorTwo'])) ? $_POST['gradientColorTwo'] : '';
        $gradient_opacity_one       = (isset($_POST['gradientOpacityOne'])) ? $_POST['gradientOpacityOne'] : '1';
        $gradient_opacity_two       = (isset($_POST['gradientOpacityTwo'])) ? $_POST['gradientOpacityTwo'] : '1';
        $gradient_custom_color_one  = (isset($_POST['gradientCustomColorOne'])) ? $_POST['gradientCustomColorOne'] : '';
        $gradient_custom_color_two  = (isset($_POST['gradientCustomColorTwo'])) ? $_POST['gradientCustomColorTwo'] : '';
        $offset                     = (isset($_POST['offset'])) ? $_POST['offset'] : '';



        $featured_image = 'trendymag-recent-post';
        $overlay_class = '';

        if ($post_style == 'style-two') :
            $featured_image = 'trendymag-recent-post2';
            $overlay_class = 'overlay-black';
        endif;

        $gradient_color_1 = $gradient_color_one;
        $gradient_color_2 = $gradient_color_two;

        $gradient_custom_color_1 = $gradient_custom_color_one;
        $gradient_custom_color_2 = $gradient_custom_color_two;

        $post_height = "";

        if ($post_height) {
            $post_height = 'height: ' .$post_height.';';
        }


        $args = array(
        	'post_type'         => 'post',
            'post_status'       => 'publish',
            'orderby'           => $orderby,
            'order'             => $order,
            'offset'            => $offset,
        );

        if ($postSource == 'most-recent' || $postSource == 'by-category' || $postSource == 'by-tag' || $postSource == 'by-author') :
            $post_exclude = explode(',', $exclude);
            $args = wp_parse_args(
                array(
                    'posts_per_page'    => $ppp,
                    'post__not_in'      => $post_exclude,
                )
            , $args );
        endif;

        if ($postSource == 'by-category' && $taxonomies) :
            $args = wp_parse_args(
                array(
                    'cat' => $taxonomies,
                )
            , $args );
        endif;

        if ($postSource == 'by-tag' && $tags) :
            $post_tag_array = explode(',', $tags);

            $args = wp_parse_args(
                array(
                    'tag_slug__in' => $post_tag_array,
                )
            , $args );
        endif;

        if ($postSource == 'by-author' && $authors) :
            $args = wp_parse_args(
                array(
                    'author' => $authors,
                )
            , $args );
        endif;

        if ($postSource == 'by-id' && $post_id) :
            $post_id_array = explode(',', $post_id);
            $args = wp_parse_args(
                array(
                    'post__in' => $post_id_array,
                )
            , $args );
        endif;

        $postload = new WP_Query($args);

        while($postload->have_posts()) :
            $postload->the_post(); 

            $uid = uniqid();

            if ($gradient_style == 'gradient' || $gradient_style == 'gradient-custom') :
                
                $gradient_color_1 = 'rgba('.trendymag_hex2rgb($colors[ $gradient_color_1 ]).', '.$gradient_opacity_one.')';
                $gradient_color_2 = 'rgba('.trendymag_hex2rgb($colors[ $gradient_color_2 ]).', '.$gradient_opacity_two.')';

                if ( 'gradient-custom' === $gradient_style ) {
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

        	<div class="post-grid-item col-xs-12 col-sm-6 col-md-<?php echo esc_attr($grid_column);?>" style="<?php echo esc_attr($post_height);?>">
                <div <?php post_class('recent-news'); ?>>

                    <?php if ( $category_visibility == 'show' && $post_style == 'style-one' ) : ?>
                        <div class="entry-meta">
                            <span class="posted-in"><?php trendymag_post_cat(); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="entry-thumb">
                                <?php the_post_thumbnail( $featured_image, array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>
                                <div class="image-overlay tt_btn-gradient-bg-<?php echo esc_attr($uid.' '.$overlay_class); ?>"></div>
                            </div>
                        </a>
                    <?php endif; ?>

                    <div class="post-contents">

                        <?php if ($post_style == 'style-one'): ?>
                            <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                        <?php endif; ?>
                        
                        <div class="entry-meta">
                            <ul class="list-inline">

                                <?php if ( $category_visibility == 'show' && $post_style == 'style-two') : ?>
                                    <li><span class="posted-in"><?php trendymag_post_cat(); ?></span></li>
                                <?php endif; ?>
                                
                                <?php if ( $date_visibility == 'show' ) : ?>
                                    <li><span class="entry-time published" itemprop="datePublished" content="<?php echo get_the_time( get_option( 'date_format' ) ); ?>"><a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></a></span></li>
                                <?php endif; ?>

                                <?php if ( $comment_visibility == 'show' ) : ?>
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

                        <?php if ($post_style == 'style-two'): ?>
                            <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                        <?php endif; ?>
                    </div> <!-- .post-contents -->

                    <?php if ($colored_border == 'show' && $post_style == 'style-one'): 
                        $terms = wp_get_post_terms(get_the_ID(), 'category');
                        $color = "";
                        if (get_term_meta($terms[0]->term_id, 'color', true )) {
                            $color = 'background-color: #'.get_term_meta($terms[0]->term_id, 'color', true ).'';
                        } ?>
                        <div class="colored-border" style="<?php echo esc_attr($color);?>"></div>
                    <?php endif; ?>
                    
                </div> <!-- .featured-news -->
            </div> <!-- .col-sm-# -->
        <?php endwhile;
        wp_reset_postdata();
        die();
    }
endif;