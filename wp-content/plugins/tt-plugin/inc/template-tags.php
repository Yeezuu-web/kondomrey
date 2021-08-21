<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page break pagination
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('trendymag_link_pages')) :

    function trendymag_link_pages($args = '') {
        $defaults = array(
            'before'           => '',
            'after'            => '',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'nextpagelink'     => esc_html__('Next page', 'tt-pl-textdomain'),
            'previouspagelink' => esc_html__('Previous page', 'tt-pl-textdomain'),
            'pagelink'         => '%',
            'echo'             => 1
        );

        $r = wp_parse_args($args, $defaults);
        $r = apply_filters('wp_link_pages_args', $r);
        extract($r, EXTR_SKIP);

        global $page, $numpages, $multipage, $more, $pagenow;

        $output = '';
        if ($multipage) {
            if ('number' == $next_or_number) {
                $output .= $before . '<ul class="pagination">';
                $laquo = $page == 1 ? 'class="disabled"' : '';
                $output .= '<li ' . $laquo . '>' . _wp_link_page($page - 1) . '&laquo; </a></li>';
                for ($i = 1; $i < ($numpages + 1); $i = $i + 1) {
                    $j = str_replace('%', $i, $pagelink);

                    if (($i != $page) || ((!$more) && ($page == 1))) {
                        $output .= '<li>';
                        $output .= _wp_link_page($i);
                    } else {
                        $output .= '<li class="active">';
                        $output .= _wp_link_page($i);
                    }
                    $output .= $link_before . $j . $link_after;

                    $output .= '</a></li>';
                }
                $raquo = $page == $numpages ? 'class="disabled"' : '';
                $output .= '<li ' . $raquo . '>' . _wp_link_page($page + 1) . '&raquo;</a></li>';
                $output .= '</ul>' . $after;
            } else {
                if ($more) {
                    $output .= $before . '<ul class="pager">';
                    $i = $page - 1;
                    if ($i && $more) {
                        $output .= '<li class="previous">' . _wp_link_page($i);
                        $output .= $link_before . $previouspagelink . $link_after . '</li>';
                    }
                    $i = $page + 1;
                    if ($i <= $numpages && $more) {
                        $output .= '<li class="next">' . _wp_link_page($i);
                        $output .= $link_before . $nextpagelink . $link_after . '</a></li>';
                    }
                    $output .= '</ul>' . $after;
                }
            }
        }

        if ($echo) {
            echo $output;
        } else {
            return $output;
        }
    }
endif;


// Extra post view count column
function trendymag_extra_column( $columns ) {
    $columns["trendymag_post_views_count"] = esc_html__('Views', 'tt-pl-textdomain');
    return $columns;
}
add_filter('manage_edit-post_columns', 'trendymag_extra_column');


function trendymag_extra_column_count($column){
    global $post;

    switch ( $column ) {
        case 'trendymag_post_views_count':
            $hits = get_post_meta( $post->ID, 'trendymag_post_views_count', true );
            echo (int)$hits;
        break;
    }
}
add_action( 'manage_posts_custom_column', 'trendymag_extra_column_count' );


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Extend user contact
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('trendymag_extend_user_contact')) :
    function trendymag_extend_user_contact( $trendymag_user_contact) {
        
        $trendymag_user_contact['facebook_profile'] = esc_html__('Facebook Profile URL', 'tt-pl-textdomain');
        $trendymag_user_contact['twitter_profile'] = esc_html__('Twitter Profile URL', 'tt-pl-textdomain');
        $trendymag_user_contact['google_profile'] = esc_html__('Google Profile URL', 'tt-pl-textdomain');
        $trendymag_user_contact['linkedin_profile'] = esc_html__('Linkedin Profile URL', 'tt-pl-textdomain');
        $trendymag_user_contact['instagram_profile'] = esc_html__('Instagram Profile URL', 'tt-pl-textdomain');
        
        return $trendymag_user_contact;
    }

    add_filter( 'user_contactmethods', 'trendymag_extend_user_contact');

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set post view on single page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'trendymag_put_post_view_function' ) ) :

    function trendymag_put_post_view_function( $contents ) {
        if ( function_exists( 'trendymag_set_post_views' ) and is_single() ) {
            trendymag_set_post_views(get_the_ID());
        }

        return $contents;
    }

    add_filter( 'the_content', 'trendymag_put_post_view_function', 9999 );

endif;