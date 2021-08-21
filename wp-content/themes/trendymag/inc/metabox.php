<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Register meta boxes
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (! function_exists('trendymag_register_meta_boxes')) :

	function trendymag_register_meta_boxes( $meta_boxes ) {
		/**
		 * Prefix of meta keys (optional)
		 */

		$prefix = 'trendymag_';

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format audio
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-audio',
			'title' => esc_html__( 'Featured Audio', 'trendymag' ),
			'pages' => array( 'post'),
			'context' => 'side',
			'priority' => 'low',
			'autosave' => true,
			'fields' => array(
				array(
					// 'name'  => esc_html__( 'Embed Audio', 'trendymag' ),
					'id'    => "{$prefix}embed_audio",
					'type'  => 'oembed',
					'std'   => '',
					'desc'	=> '<strong>'.esc_html__('Featured audio shows only Layout 1 & 2.', 'trendymag').'</strong><br/><br/>'.esc_html__('Input URL for sounds, audios from Youtube, Soundcloud and all supported sites by WordPress. it will be embedded in the post single page, all supported lists: http://codex.wordpress.org/Embeds', 'trendymag')
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format video
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-video',
			'title' => esc_html__( 'Featured Video', 'trendymag' ),
			'pages' => array( 'post'),
			'context' => 'side',
			'priority' => 'low',
			'autosave' => true,
			'fields' => array(
				
				array(
					// 'name'  => esc_html__( '', 'trendymag' ),
					'id'    => "{$prefix}embed_video",
					'type'  => 'oembed',
					'std'   => '',
					'desc'	=> '<strong>'.esc_html__('Featured video shows only Layout 1 & 2.', 'trendymag').'</strong><br/><br/>'.esc_html__('Paste a video link from Youtube, Vimeo, Dailymotion, Facebook or Twitter it will be embedded in the post single page, all supported lists: http://codex.wordpress.org/Embeds', 'trendymag')
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format gallery
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-gallery',
			'title' => esc_html__( 'Featured Gallery', 'trendymag' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'             => esc_html__( 'Upload image from media library', 'trendymag' ),
					'id'               => "{$prefix}post_gallery",
					'type'             => 'image_advanced',
					'max_file_uploads' => 6,
				)			
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for page
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-settings',
			'title' => esc_html__( 'Site Layout', 'trendymag' ),
			'pages' => array( 'page'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => "{$prefix}page_layout",
					'type' => 'image_select',
					'name' => esc_html__( 'Site Layout options', 'trendymag' ),
					'options' => array(
						'inherit-from-theme-option' => get_template_directory_uri() . '/images/site-layout-default.png',
						'fullwidth-layout' => get_template_directory_uri() . '/images/site-layout-1.png',
						'box-layout' => get_template_directory_uri() . '/images/site-layout-2.png',
						'box-framed-layout' => get_template_directory_uri() . '/images/site-layout-3.png',
						'border-layout' => get_template_directory_uri() . '/images/site-layout-4.png',
					),
					'std' => 'inherit-from-theme-option'
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for header style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-header-style',
			'title' => esc_html__( 'Page Header Styles', 'trendymag' ),
			'pages' => array( 'page'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Header style', 'trendymag' ),
					'id'          => "{$prefix}header_style",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'trendymag' ),
						'header-default' => esc_html__( 'Header Default', 'trendymag' ),
						'header-two' => esc_html__( 'Header two', 'trendymag' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select header style', 'trendymag' ),
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for footer style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-footer-style',
			'title' => esc_html__( 'Page Footer Styles', 'trendymag' ),
			'pages' => array( 'page'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Footer style', 'trendymag' ),
					'id'          => "{$prefix}footer_style",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'trendymag' ),
						'footer-default' => esc_html__( 'Footer default', 'trendymag' ),
						'footer-two' => esc_html__( 'Footer two', 'trendymag' ),
						'footer-three' => esc_html__( 'Footer three', 'trendymag' ),
						'no-footer' => esc_html__( 'No Footer', 'trendymag' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select footer style', 'trendymag' ),
					'desc'     => esc_html__( 'This settings apply only for this page', 'trendymag' )
				)
			)
		);


		
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for single news style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'single-news-style',
			'title' => esc_html__( 'Single news style', 'trendymag' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => "{$prefix}single_news_style",
					'type' => 'image_select',
					'name' => esc_html__( 'Single News style', 'trendymag' ),
					'options' => array(
						'inherit-from-theme-option' => get_template_directory_uri() . '/images/site-layout-default.png',
						'style-default' => get_template_directory_uri() . '/images/layout-2.jpg',
						'style-two' => get_template_directory_uri() . '/images/layout-1.jpg',
						'style-three' => get_template_directory_uri() . '/images/layout-3.jpg',
						'style-four' => get_template_directory_uri() . '/images/layout-4.jpg',
						'style-five' => get_template_directory_uri() . '/images/layout-5.jpg',
						'style-six' => get_template_directory_uri() . '/images/layout-6.jpg',
						'style-seven' => get_template_directory_uri() . '/images/layout-7.jpg'
					),
					'std' => 'inherit-from-theme-option'
				)
			)
		);

		return $meta_boxes;
	}

	add_filter( 'rwmb_meta_boxes', 'trendymag_register_meta_boxes' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Term Meta
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

$post_styles = array(
	'inherit-from-theme-option' => esc_html__('Inherit from theme option', 'trendymag'),
	'style-one' 	=> esc_html__('Style one', 'trendymag'),
    'style-two' 	=> esc_html__('Style two', 'trendymag'),
    'style-three' 	=> esc_html__('Style three', 'trendymag'),
    'style-four' 	=> esc_html__('Style four', 'trendymag'),
    'style-five' 	=> esc_html__('Style five', 'trendymag'),
    'style-six' 	=> esc_html__('Style six', 'trendymag'),
    'style-seven' 	=> esc_html__('Style seven', 'trendymag')
);


// Register color term
function trendymag_register_meta() {
    register_meta( 'term', 'color', 'trendymag_sanitize_hex' );
}
add_action( 'init', 'trendymag_register_meta' );


function trendymag_sanitize_hex( $color ) {
    $color = ltrim( $color, '#' );
    return preg_match( '/([A-Fa-f0-9]{3}){1,2}$/', $color ) ? $color : '';
}

function trendymag_get_term_color( $term_id, $hash = false ) {

    $color = get_term_meta( $term_id, 'color', true );
    $color = trendymag_sanitize_hex( $color );

    return $hash && $color ? "#{$color}" : $color;
}


// add meta data
function trendymag_add_category_style_field($taxonomy) { 

	global $post_styles;

	wp_nonce_field( basename( __FILE__ ), 'trendymag_term_color_nonce' ); ?>

	<div class="form-field term-style-wrap">
        <label for="category-post-style"><?php esc_html_e('Category post style', 'trendymag'); ?></label>
        <select class="postform" id="category-post-style" name="category-post-style">
            <?php foreach ($post_styles as $_style_key => $_style) : ?>
                <option value="<?php echo esc_attr($_style_key); ?>"><?php echo esc_html($_style); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-field term-color-wrap">
        <label for="tt-term-color"><?php esc_html_e( 'Color', 'trendymag' ); ?></label>
        <input type="text" name="tt-term-color" id="tt-term-color" value="" class="tt-color-field" />
    </div>
<?php }
add_action( 'category_add_form_fields', 'trendymag_add_category_style_field', 10, 2 );


// save meta data
function trendymag_save_category_style_meta( $term_id, $tt_id ){

	if( isset( $_POST['category-post-style'] ) && '' !== $_POST['category-post-style'] ){
        $cat_post_style = sanitize_title( $_POST['category-post-style'] );
        add_term_meta( $term_id, 'category-post-style', $cat_post_style, true );
    }

    if ( ! isset( $_POST['trendymag_term_color_nonce'] ) || ! wp_verify_nonce( $_POST['trendymag_term_color_nonce'], basename( __FILE__ ) ) ){
        return;
    }

    $old_color = trendymag_get_term_color( $term_id );
    $new_color = isset( $_POST['tt-term-color'] ) ? trendymag_sanitize_hex( $_POST['tt-term-color'] ) : '';

    if ( $old_color && '' === $new_color ){
        delete_term_meta( $term_id, 'color' );
    } elseif ( $old_color !== $new_color ){
        update_term_meta( $term_id, 'color', $new_color );
    }
}

add_action( 'created_category', 'trendymag_save_category_style_meta', 10, 2 );


// editing term meta
function trendymag_edit_category_style_field( $term, $taxonomy ){
	
    global $post_styles;

    $cat_post_style = get_term_meta( $term->term_id, 'category-post-style', true ); ?>

    <tr class="form-field term-style-wrap">
        <th scope="row"><label for="category-post-style"><?php esc_html_e( 'Category Post Style', 'trendymag' ); ?></label></th>
        <td><select class="postform" id="category-post-style" name="category-post-style">
            <?php foreach( $post_styles as $_style_key => $_style) : ?>
                <option value="<?php echo esc_attr($_style_key); ?>" <?php selected( $cat_post_style, $_style_key ); ?>><?php echo esc_html($_style); ?></option>
            <?php endforeach; ?>
        </select></td>
    </tr>

    <?php

    $color = trendymag_get_term_color( $term->term_id, true ); ?>
    <tr class="form-field term-color-wrap">
        <th scope="row"><label for="tt-term-color"><?php esc_html_e( 'Color', 'trendymag' ); ?></label></th>
        <td>
            <?php wp_nonce_field( basename( __FILE__ ), 'trendymag_term_color_nonce' ); ?>
            <input type="text" name="tt-term-color" id="tt-term-color" value="<?php echo esc_attr( $color ); ?>" class="tt-color-field" />
        </td>
    </tr><?php
}
add_action( 'category_edit_form_fields', 'trendymag_edit_category_style_field', 10, 2 );


// Update term meta data
function trendymag_update_style_meta( $term_id, $tt_id ){

    if( isset( $_POST['category-post-style'] ) && '' !== $_POST['category-post-style'] ){
        $style = sanitize_title( $_POST['category-post-style'] );
        update_term_meta( $term_id, 'category-post-style', $style );
    }

    if ( ! isset( $_POST['trendymag_term_color_nonce'] ) || ! wp_verify_nonce( $_POST['trendymag_term_color_nonce'], basename( __FILE__ ) ) ){
        return;
    }

    $old_color = trendymag_get_term_color( $term_id );
    $new_color = isset( $_POST['tt-term-color'] ) ? trendymag_sanitize_hex( $_POST['tt-term-color'] ) : '';

    if ( $old_color && '' === $new_color ){
        delete_term_meta( $term_id, 'color' );
    } elseif ( $old_color !== $new_color ){
        update_term_meta( $term_id, 'color', $new_color );
    }
}

add_action( 'edited_category', 'trendymag_update_style_meta', 10, 2 );


// Displaying the term meta data
function trendymag_add_category_style_column( $columns ){
    $columns['category_post_style'] = esc_html__( 'Post Style', 'trendymag' );
    $columns['color'] = esc_html__( 'Color', 'trendymag' );
    return $columns;
}
add_filter('manage_edit-category_columns', 'trendymag_add_category_style_column' );


// add content on style column
function trendymag_add_style_column_content( $content, $column_name, $term_id ){
    global $post_styles;
    $term_id = absint( $term_id );

    if( $column_name == 'category_post_style' ){
	    $cat_post_style_meta = get_term_meta( $term_id, 'category-post-style', true );
	    if( !empty( $cat_post_style_meta ) ){
	        $content .= esc_attr( $post_styles[ $cat_post_style_meta ] );
	    }
    }

    if ( $column_name == 'color') {
        $color = trendymag_get_term_color( $term_id, true );
        $content = sprintf( '<span class="color-block" style="background-color:%s;">&nbsp;</span>', esc_attr( $color ) );
    }

    return $content;
}
add_filter('manage_category_custom_column', 'trendymag_add_style_column_content', 10, 3 );


// column sortable
function trendymag_add_style_column_sortable( $sortable ){
    $sortable[ 'category_post_style' ] = 'category_post_style';
    $sortable[ 'color' ] = 'color';
    return $sortable;
}
add_filter( 'manage_edit-category_sortable_columns', 'trendymag_add_style_column_sortable' );



// color picker support on term
function trendymag_admin_enqueue_scripts( $hook_suffix ) {

    if ( 'category' !== get_current_screen()->taxonomy ){
        return;
    }

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );

    add_action( 'admin_head',   'trendymag_term_colors_print_styles' );
    add_action( 'admin_footer', 'trendymag_term_colors_print_scripts' );
}
add_action( 'admin_enqueue_scripts', 'trendymag_admin_enqueue_scripts' );

function trendymag_term_colors_print_styles() { ?>

    <style type="text/css">
        .column-color { width: 50px; }
        .column-color .color-block { display: inline-block; width: 28px; height: 28px; border: 1px solid #ddd; }
    </style>
<?php }

function trendymag_term_colors_print_scripts() { ?>
    <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
            $( '.tt-color-field' ).wpColorPicker();
        } );
    </script>
<?php }