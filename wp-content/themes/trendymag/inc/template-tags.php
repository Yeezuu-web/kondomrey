<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Single blog post navigation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_post_navigation')) :

    function trendymag_post_navigation() {

        $prev_post = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next_post = get_adjacent_post(false, '', false);

        if (!$next_post && !$prev_post) :
            return;
        endif;
        ?>
        <?php do_action('trendymag_before_single_post_navigation' );?>
        <nav class="single-post-navigation" role="navigation">
            <div class="row">
                <?php if ($prev_post): ?>
                    <!-- Previous Post -->
                    <div class="col-sm-6 col-xs-12">
                        <div class="previous-post-link">
                            <?php previous_post_link('<span class="previous">%link</span>', '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' . esc_html__( 'Previous Post', 'trendymag' )); ?>

                            <h3 class="entry-title">
                                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"><?php echo wp_kses( get_the_title( $prev_post->ID ), array() ); ?></a>
                            </h3>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if ($next_post): ?>
                    <!-- Next Post -->
                    <div class="col-sm-6 col-xs-12 pull-right">
                        <div class="next-post-link">
                            <?php next_post_link('<span class="next">%link</span>', esc_html__( 'Next Post', 'trendymag' ) . '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'); ?>
                            <h3 class="entry-title">
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo wp_kses( get_the_title( $next_post->ID ), array() ); ?></a>
                            </h3>
                        </div>
                    </div>
                <?php endif ?>
            </div> <!-- .row -->
        </nav> <!-- .single-post-navigation -->
        <?php do_action('trendymag_after_single_post_navigation' );?>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog posts navigation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_posts_navigation')) :

    function trendymag_posts_navigation() { ?>
        <div class="blog-navigation clearfix">
            <?php if (get_next_posts_link()) : ?>
                <div class="col-xs-6 pull-left">
                    <div class="previous-page">
                        <?php next_posts_link('<i class="fa fa-long-arrow-left"></i>' . esc_html('Older Posts', 'trendymag')); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (get_previous_posts_link()) : ?>
                <div class="col-xs-6 pull-right">
                    <div class="next-page">
                        <?php previous_posts_link(esc_html__('Newer Posts', 'trendymag') . '<i class="fa fa-long-arrow-right"></i>'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog posts pagination for default blog layout
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_posts_pagination')) :
    function trendymag_posts_pagination() { 

        global $wp_query;
            if ($wp_query->max_num_pages > 1) {
                $big = 999999999; // need an unlikely integer
                $items = paginate_links(array(
                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'    => '?paged=%#%',
                    'prev_next' => true,
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $wp_query->max_num_pages,
                    'type'      => 'array',
                    'prev_text' => esc_html__('Prev.', 'trendymag'),
                    'next_text' => esc_html__('Next', 'trendymag')
                ));

                $pagination = "<ul class=\"pagination\">\n\t<li>";
                $pagination .= join("</li>\n\t<li>", $items);
                $pagination .= "</li>\n</ul>\n";

                return $pagination;
            } 
        return;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Prints HTML with meta information for the current post-date/time, author & others.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_posted_on')) :
    function trendymag_posted_on() { ?>

        <ul class="entry-meta list-inline clearfix">
            <?php if ( trendymag_option( 'tt-post-meta', 'post-author', TRUE ) ) : ?>
                <li>
                    <span class="author vcard">
                        <i class="fa fa-user"></i><?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                            esc_html(get_the_author())
                        ) ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php if ( trendymag_option( 'tt-post-meta', 'post-date', TRUE ) ) : ?>
                <li>
                    <i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </li>
            <?php endif; ?>

            <?php echo edit_post_link(esc_html__('Edit Post', 'trendymag'), '<li class="edit-link"><i class="fa fa-pencil"></i>', '</li>') ?>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Post meta for grid style post
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('trendymag_grid_posted_on')) :
    function trendymag_grid_posted_on() { ?>
        
        <ul class="list-inline">
            <?php if ( trendymag_option( 'tt-post-meta', 'post-author', TRUE ) ) : ?>
                <li>
                    <span itemprop="author">
                        <?php printf('<a class="url fn n" href="%1$s"><span><i class="fa fa-user"></i>%2$s</span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())
                        ) ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php if ( trendymag_option( 'tt-post-meta', 'post-date', TRUE ) ) : ?>
                <li><span class="entry-time published" content="<?php echo get_the_time( get_option( 'date_format' ) ); ?>"><a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></a></span></li>
            <?php endif; ?>

            <?php if ( trendymag_option( 'tt-post-meta', 'post-readtime', TRUE ) ) : ?>
                <li><span><i class="fa fa-bookmark"></i><?php echo trendymag_estimated_reading_time(); ?></span></li>
            <?php endif; ?>

            <?php if ( trendymag_option( 'tt-post-meta', 'post-view', TRUE ) && function_exists('trendymag_get_post_views')) : ?>
                <li><span><i class="fa fa-eye"></i><?php echo trendymag_get_post_views(get_the_ID()) ?></span></li>
            <?php endif; ?>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Get item scope meta
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('trendymag_item_scope_meta')) :
    function trendymag_item_scope_meta(){
        // don't display meta on pages
        if (!is_single()) {
            return '';
        }

        $post_id = get_the_ID();

        // publisher name
        $tt_publisher_name = get_bloginfo('name');
        if (empty($tt_publisher_name)){
            $tt_publisher_name = esc_attr(get_the_author());
        }
        // publisher logo
        $tt_publisher_logo = trendymag_option('logo', 'url', get_template_directory_uri() . '/images/logo.png');

        $meta = '';

        // author
        $meta .= '<span style="display: none;" itemprop="author" itemscope itemtype="'.trendymag_protocol().'://schema.org/Person">' ;
        $meta .= '<meta itemprop="name" content="' . esc_attr(get_the_author()) . '">' ;
        $meta .= '</span>' ;

        // datePublished
        $tt_post_date_unix = get_the_time('U', $post_id);
        $meta .= '<meta itemprop="datePublished" content="' . date(DATE_W3C, $tt_post_date_unix) . '">';

        // dateModified
        $meta .= '<meta itemprop="dateModified" content="' . the_modified_date('c', '', '', false) . '">';

        // mainEntityOfPage
        $meta .= '<meta itemscope itemprop="mainEntityOfPage" itemType="'.trendymag_protocol().'://schema.org/WebPage" itemid="' . get_permalink($post_id) .'"/>';

        // publisher
        $meta .= '<span style="display: none;" itemprop="publisher" itemscope itemtype="'.trendymag_protocol().'://schema.org/Organization">';
        $meta .= '<span style="display: none;" itemprop="logo" itemscope itemtype="'.trendymag_protocol().'://schema.org/ImageObject">';
        $meta .= '<meta itemprop="url" content="' . $tt_publisher_logo . '">';
        $meta .= '</span>';
        $meta .= '<meta itemprop="name" content="' . $tt_publisher_name . '">';
        $meta .= '</span>';

        // headline
        $meta .= '<meta itemprop="headline " content="' . esc_attr(get_the_title($post_id)) . '">';

        // featured image
        $tt_image = array();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );

        if (!is_null($post_thumbnail_id)) {
            $tt_image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
        } else {
            // when the post has no image use the placeholder
            $tt_image[0] = get_template_directory_uri() . '/images/750x350.png';
            $tt_image[1] = '750';
            $tt_image[2] = '350';
        }

        // ImageObject meta
        if (!empty($tt_image[0])) {
            $meta .= '<span style="display: none;" itemprop="image" itemscope itemtype="'.trendymag_protocol().'://schema.org/ImageObject">';
            $meta .= '<meta itemprop="url" content="' . $tt_image[0] . '">';
            $meta .= '<meta itemprop="width" content="' . $tt_image[1] . '">';
            $meta .= '<meta itemprop="height" content="' . $tt_image[2] . '">';
            $meta .= '</span>';
        }

        return $meta;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Returns true if a blog has more than 1 category.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_categorized_blog')) :
    
    function trendymag_categorized_blog() {
        if (false === ($all_the_cool_cats = get_transient('trendymag_categories'))) :
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields'     => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number'     => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('trendymag_categories', $all_the_cool_cats);
        endif;

        if ($all_the_cool_cats > 1) :
            // This blog has more than 1 category so trendymag_categorized_blog should return true.
            return true;
        else :
            // This blog has only 1 category so trendymag_categorized_blog should return false.
            return false;
        endif;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Flush out the transients used in trendymag_categorized_blog.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_category_transient_flusher')) :

    function trendymag_category_transient_flusher() {
        // Like, beat it. Dig?
        delete_transient('trendymag_categories');
    }

    add_action('edit_category', 'trendymag_category_transient_flusher');
    add_action('save_post', 'trendymag_category_transient_flusher');

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Post Password form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_post_password_form')) :

    function trendymag_post_password_form() {
        global $post;
        $trendymag_label_text = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);

        return '
        <div class="row">
            <form class="clearfix" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
                <div class="col-md-12">
                    <label for="' . $trendymag_label_text . '">' . esc_html__("This post is password protected. To view it please enter your password below:", 'trendymag') . '</label>
                    <div class="input-group">
                        <input class="form-control" name="post_password" placeholder="' . esc_attr__("Password:", 'trendymag') . '" id="' . $trendymag_label_text . '" type="password" /><div class="input-group-btn"><button class="btn btn-primary" type="submit" name="Submit">' . esc_attr__("Submit", 'trendymag') . '</button></div>
                    </div>
                </div>
            </form>
        </div>';
    }

    add_filter('the_password_form', 'trendymag_post_password_form');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Breadcrumb
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_breadcrumbs')) :

    function trendymag_breadcrumbs(){ ?>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo esc_url(site_url()); ?>"><?php esc_html_e('Home', 'trendymag') ?></a>
            </li>
            <li class="active">
                <?php if( is_tag() ) { ?>
                <?php esc_html_e('Posts Tagged ', 'trendymag') ?><span class="raquo"><i class="fa fa-angle-double-right"></i> </span><?php single_tag_title(); ?>
                <?php } elseif (is_day()) { ?>
                <?php esc_html_e('Posts made in', 'trendymag') ?> <?php echo get_the_time('F jS, Y'); ?>
                <?php } elseif (is_month()) { ?>
                <?php esc_html_e('Posts made in', 'trendymag') ?> <?php echo get_the_time('F, Y'); ?>
                <?php } elseif (is_year()) { ?>
                <?php esc_html_e('Posts made in', 'trendymag') ?> <?php echo get_the_time('Y'); ?>
                <?php } elseif (is_search()) { ?>
                <?php esc_html_e('Search results for', 'trendymag') ?> <?php the_search_query() ?>
                <?php } elseif (is_404()) { ?>
                <?php esc_html_e('404', 'trendymag') ?>
                <?php } elseif (is_single()) { ?>
                <?php $category = get_the_category();
                if ( $category ) { 
                    $catlink = get_category_link( $category[0]->cat_ID );
                    echo ('<a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo"> <i class="fa fa-angle-double-right"></i></span> ');
                }
                echo get_the_title(); ?>
                <?php } elseif (is_category()) { ?>
                <?php single_cat_title(); ?>
                <?php } elseif (is_tax()) { ?>
                <?php 
                $trendymag_taxonomy_links = array();
                $trendymag_term = get_queried_object();
                $trendymag_term_parent_id = $trendymag_term->parent;
                $trendymag_term_taxonomy = $trendymag_term->taxonomy;

                while ( $trendymag_term_parent_id ) {
                    $trendymag_current_term = get_term( $trendymag_term_parent_id, $trendymag_term_taxonomy );
                    $trendymag_taxonomy_links[] = '<a href="' . esc_url( get_term_link( $trendymag_current_term, $trendymag_term_taxonomy ) ) . '" title="' . esc_attr( $trendymag_current_term->name ) . '">' . esc_html( $trendymag_current_term->name ) . '</a>';
                    $trendymag_term_parent_id = $trendymag_current_term->parent;
                }

                if ( !empty( $trendymag_taxonomy_links ) ) echo implode( ' <span class="raquo"><i class="fa fa-angle-double-right"></i></span> ', array_reverse( $trendymag_taxonomy_links ) ) . ' <span class="raquo">/</span> ';

                echo esc_html( $trendymag_term->name ); 
                } elseif (is_author()) { 
                    global $wp_query;
                    $curauth = $wp_query->get_queried_object();

                    esc_html_e('Posts by: ', 'trendymag'); echo ' ',$curauth->nickname; 
                } elseif (is_page()) { 
                    echo get_the_title(); 
                } elseif (is_home()) { 
                    esc_html_e('Blog', 'trendymag');
                } ?>  
            </li>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page header section background title
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_page_header_section_title')) :
    function trendymag_page_header_section_title() {
        $trendymag_query = get_queried_object();

        if (is_archive()) :
            if (is_day()) :
                $archive_title = get_the_time('d F, Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'trendymag'), $archive_title);
            elseif (is_month()) :
                $archive_title = get_the_time('F Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'trendymag'), $archive_title);
            elseif (is_year()) :
                $archive_title = get_the_time('Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'trendymag'), $archive_title);
            endif;
        endif;

        if (is_404()) :
            $page_header_title = esc_html__('404 Not Found', 'trendymag');
        endif;

        if (is_search()) :
            $page_header_title = sprintf(esc_html__('Search result for: "%s"', 'trendymag'), get_search_query());
        endif;

        if (is_category()) :
            $page_header_title = sprintf(esc_html__('Category: %s', 'trendymag'), $trendymag_query->name);
        endif;

        if (is_tag()) :
            $page_header_title = sprintf(esc_html__('Tag: %s', 'trendymag'), $trendymag_query->name);
        endif;

        if (is_author()) :
            $page_header_title = sprintf(esc_html__('Posts of: %s', 'trendymag'), $trendymag_query->display_name);
        endif;

        if (is_tax('tt-portfolio-cat')) :
            $page_header_title = sprintf(esc_html__('%s', 'trendymag'), $trendymag_query->name);
        endif;

        if (is_page()) :
            $page_header_title = $trendymag_query->post_title;
        endif;

        if (is_home() or is_single()) :
            $page_header_title = trendymag_option('blog-title');
        endif;

        if (is_single()) :
            $page_header_title = get_the_title();
        endif;

        if (is_singular('tt-event')) :
            $page_header_title = get_the_title();
        endif;

        if (is_singular('tt-portfolio')) :
            $page_header_title = get_the_title();
        endif;

        $page_header_title = apply_filters('trendymag_page_header_section_title', $page_header_title, $page_header_title);

        if (empty($page_header_title)) :
            $page_header_title = get_bloginfo('name');
        endif;

        return $page_header_title;
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Comments list
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists("trendymag_comments_list")) :

    function trendymag_comments_list($comment, $args, $depth) {
        $GLOBALS[ 'comment' ] = $comment;
        switch ($comment->comment_type) {
            // Display trackbacks differently than normal comments.
            case 'pingback' :
            case 'trackback' :
                ?>

                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php esc_html_e('Pingback:', 'trendymag'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(esc_html__('(Edit)', 'trendymag'), '<span class="edit-link">', '</span>'); ?></p>

                <?php
                break;

            default :
                // Proceed with normal comments.
                global $post;
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment media">
                    <div class="comment-author clearfix">

                        <div class="comment-meta media-heading">

                            <div class="media-left">
                                <?php
                                    $get_avatar = get_avatar($comment, apply_filters('trendymag_post_comment_avatar_size', 60));
                                    $avatar_img = trendymag_get_avatar_url($get_avatar);
                                    //Comment author avatar
                                ?>

                                <img class="avatar" src="<?php echo esc_url($avatar_img); ?>" alt="<?php echo get_comment_author(); ?>">
                            </div>

                            <div class="media-body">
                                <div class="comment-info">
                                    <div class="comment-author">
                                        <?php echo get_comment_author(); ?>
                                    </div>

                                    <time datetime="<?php echo get_comment_date(); ?>">
                                        <?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>
                                        <?php edit_comment_link(esc_html__('Edit', 'trendymag'), '<span class="edit-link">', '</span>'); //edit link
                                        ?>
                                    </time>

                                    <i class="fa fa-comment-o"></i>
                                    <?php comment_reply_link(array_merge($args, array(
                                        'reply_text' => esc_html__('Reply', 'trendymag'),
                                        'depth'      => $depth,
                                        'max_depth'  => $args[ 'max_depth' ]
                                    ))); ?>
                                    
                                </div>


                                <?php if ('0' == $comment->comment_approved) { ?>
                                    <div class="alert alert-info">
                                        <?php esc_html_e('Your comment is awaiting moderation.', 'trendymag'); ?>
                                    </div>
                                <?php } ?>

                                <p>
                                    <?php comment_text(); //Comment text ?>
                                </p>

                            </div>

                        </div> <!-- .comment-meta -->
                    </div> <!-- .comment-author -->
                </div> <!-- #comment-## -->
                <?php
                break;
        } // end comment_type check

    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Fetching Avatar URL
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_get_avatar_url')) :

    function trendymag_get_avatar_url($get_avatar) {
        preg_match("/src='(.*?)'/i", $get_avatar, $matches);

        return $matches[ 1 ];
    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Search form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_blog_search_form')) :

    function trendymag_blog_search_form($form) {
        $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url(home_url('/')) . '">
        <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search', 'trendymag').'"/>
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="hidden" value="post" name="post_type" />
    </form>';

        return $form;
    }

    add_filter('get_search_form', 'trendymag_blog_search_form');

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Associative array to html attribute conversion
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_array2attr')) :
  
    function trendymag_array2attr($attr, $filter = '') {
        $attr = wp_parse_args($attr, array());
        if ($filter) {
            $attr = apply_filters($filter, $attr);
        }
        $html = '';
        foreach ($attr as $name => $value) {
            $html .= " $name=" . '"' . $value . '"';
        }

        return $html;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Hex to RGB color
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_hex2rgb')) :
    
    function trendymag_hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);

       return $rgb[0].','.$rgb[1].','.$rgb[2];
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// color modify for darken/lighten
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('trendymag_modify_color')) :
    
    function trendymag_modify_color( $hex, $steps ) {
        $steps = max( -255, min( 255, $steps ) );
        // Format the hex color string
        $hex = str_replace( '#', '', $hex );
        if ( strlen( $hex ) == 3 ) {
            $hex = str_repeat( substr( $hex,0,1 ), 2 ).str_repeat( substr( $hex,1,1 ), 2 ).str_repeat( substr( $hex,2,1 ), 2 );
        }
        // Get decimal values
        $r = hexdec( substr( $hex,0,2 ) );
        $g = hexdec( substr( $hex,2,2 ) );
        $b = hexdec( substr( $hex,4,2 ) );
        // Adjust number of steps and keep it inside 0 to 255
        $r = max( 0,min( 255,$r + $steps ) );
        $g = max( 0,min( 255,$g + $steps ) );  
        $b = max( 0,min( 255,$b + $steps ) );
        $r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
        $g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
        $b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );
        return '#'.$r_hex.$g_hex.$b_hex;
    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Portfolio category
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('trendymag_portfolio_cat')) :
    function trendymag_portfolio_cat(){
        $portfolio_terms = wp_get_post_terms(get_the_ID(), 'tt-portfolio-cat');
        $count = count($portfolio_terms);
        $increament = 0;
        foreach ($portfolio_terms as $term) :
            $increament++; ?>
            <a class="links" href="<?php echo esc_url(get_term_link($term, 'tt-portfolio')) ?>">
                <?php echo esc_html($term->name);?>
            </a>
            <?php if ($increament < $count):
                echo ",";
            endif;
        endforeach;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// post category
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('trendymag_post_cat')) :
    function trendymag_post_cat(){
        $terms = wp_get_post_terms(get_the_ID(), 'category');

        foreach ($terms as $term) : 
            
            $color = "";

            if (get_term_meta($term->term_id, 'color', true )) {
                $color = 'background-color: #'.get_term_meta($term->term_id, 'color', true ).'';
            }

            ?>
            <a class="<?php echo esc_attr($term->slug); ?>" href="<?php echo esc_url(get_term_link($term, 'post')) ?>" rel="category tag" style="<?php echo esc_attr($color);?>"><?php echo esc_html($term->name);?></a>
        <?php endforeach;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Post thumbnail alt text
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (! function_exists( 'trendymag_alt_text' )) :
    function trendymag_alt_text(){
        $id = get_the_ID();
        $thumbnail_id = get_post_thumbnail_id($id);

        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        if ($alt) :
            return $alt;
        else :
            return get_the_title();
        endif;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// estimated reading time for post
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists( 'trendymag_estimated_reading_time' )) :
    function trendymag_estimated_reading_time() {
        $post = get_post();
        $words = str_word_count( strip_tags( $post->post_content ) );
        $minutes = floor( $words / 120 );
        $seconds = floor( $words % 120 / ( 120 / 60 ) );

        if ( 1 <= $minutes ) :
            $estimated_time = $minutes . esc_html__(' min read', 'trendymag');
        else :
            $estimated_time = $seconds . esc_html__(' sec read', 'trendymag');
        endif;

        return $estimated_time;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Post Share
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('trendymag_post_share')) :
    function trendymag_post_share($position){
        if (trendymag_option('share-button-visibility')) :
            if (trendymag_option('share-button-top', false, true)) {
                if ($position == 'top') {
                    get_template_part('template-parts/post', 'share' );
                }
            }

            if(trendymag_option('share-button-bottom', false, true)) {
                if ($position == 'bottom') {
                    get_template_part('template-parts/post', 'share' );
                }
            }
        endif;

        return $position;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// ssl detect
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('trendymag_protocol')) {
    function trendymag_protocol(){
        $http_or_https = 'http';

        if (is_ssl()) {
            $http_or_https = 'https';
        }

        return $http_or_https;
    }
}


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Remove Query Strings From Static Resources
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if( ! function_exists( 'trendymag_remove_query_strings_1' )){
    function trendymag_remove_query_strings_1( $src ){
        $parts = explode( '?ver', $src );
        return $parts[0];
    }
}

if( ! function_exists( 'trendymag_remove_query_strings_2' )){
    function trendymag_remove_query_strings_2( $src ){
        $parts = explode( '&ver', $src );
        return $parts[0];
    }
}