<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//---------------------------------------------------------------------------
// Facebook widget
//---------------------------------------------------------------------------

if( ! class_exists( 'TT_Facebook_Widget' )){

	class TT_Facebook_Widget extends WP_Widget {

	 	public function __construct() {
            parent::__construct(
                'tt_facebook_widget', // Base ID
                __('TrendyMag Facebook Widget', 'tt-pl-textdomain'), // Name
                array('description' => esc_html__('Displays facebook like box', 'tt-pl-textdomain'),) // Args
            );
        }

		public function form( $instance ){
			$defaults = array( 'title' => esc_html__( 'Find us on Facebook', 'tt-text-domain') );
			$instance = wp_parse_args( (array) $instance, $defaults );

			$title       = isset( $instance['title'] )       ? $instance['title'] : '';
			$page_url    = isset( $instance['page_url'] )    ? $instance['page_url'] : '';
			$hide_cover  = isset( $instance['hide_cover'] )  ? $instance['hide_cover'] : '';
			$show_faces  = isset( $instance['show_faces'] )  ? $instance['show_faces'] : '';
			$show_stream = isset( $instance['show_stream'] ) ? $instance['show_stream'] : ''; ?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'tt-text-domain') ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" type="text" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'page_url' ) ); ?>"><?php esc_html_e( 'Page URL:', 'tt-text-domain') ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'page_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page_url' ) ); ?>" value="<?php echo esc_attr( $page_url ); ?>" class="widefat" placeholder="https://www.facebook.com/your-page" type="text" />
			</p>

			<p>
				<input id="<?php echo esc_attr( $this->get_field_id( 'hide_cover' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_cover' ) ); ?>" value="true" <?php checked( $hide_cover, 'true' ); ?> type="checkbox" />
				<label for="<?php echo esc_attr( $this->get_field_id( 'hide_cover' ) ); ?>"><?php esc_html_e( 'Hide cover Photo?', 'tt-text-domain') ?></label>
			</p>

			<p>
				<input id="<?php echo esc_attr( $this->get_field_id( 'show_faces' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_faces' ) ); ?>" value="true" <?php checked( $show_faces, 'true' ); ?> type="checkbox" />
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_faces' ) ); ?>"><?php esc_html_e( 'Show Faces?', 'tt-text-domain') ?></label>
			</p>

			<p>
				<input id="<?php echo esc_attr( $this->get_field_id( 'show_stream' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_stream' ) ); ?>" value="true" <?php checked( $show_stream, 'true' ); ?> type="checkbox" />
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_stream' ) ); ?>"><?php esc_html_e( 'Show Stream?', 'tt-text-domain') ?></label>
			</p>

		<?php
		}


		public function widget( $args, $instance ){

			/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
			$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$hide_cover  = empty( $instance['hide_cover'] )  ? '' : $instance['hide_cover'];
			$show_faces  = empty( $instance['show_faces'] )  ? '' : $instance['show_faces'];
			$show_stream = empty( $instance['show_stream'] ) ? '' : $instance['show_stream'];

			echo ( $args['before_widget'] );

			if ( ! empty($instance['title']) ){
				echo ( $args['before_title'] . $instance['title'] . $args['after_title'] );
			}

			if( ! empty( $instance['page_url'] ) ){

			$lang = get_locale();

			?>
				<div id="fb-root"></div>
				<script>(function(d, s, id){
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/<?php echo esc_attr($lang)?>/sdk.js#xfbml=1&version=v2.8";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-page" data-href="<?php echo esc_url($instance['page_url']) ?>" data-hide-cover="<?php echo ( $hide_cover == 'true'?'true':'false' ) ?>" data-show-facepile="<?php echo ( $show_faces == 'true'?'true':'false') ?>" data-show-posts="<?php echo ($show_stream == 'true'?'true':'false' ) ?>" data-adapt-container-width="true">
					<div class="fb-xfbml-parse-ignore"><a href="<?php echo esc_url($instance['page_url']) ?>"><?php echo esc_html__( 'Find us on Facebook', 'tt-text-domain'); ?></a></div>
				</div>

				<?php
			}

			echo ( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ){
			$instance                = $old_instance;
			$instance['title']       = sanitize_text_field( $new_instance['title'] );
			$instance['page_url']    = $new_instance['page_url'];
			$instance['hide_cover']  = $new_instance['hide_cover'];
			$instance['show_faces']  = $new_instance['show_faces'];
			$instance['show_stream'] = $new_instance['show_stream'];
			return $instance;
		}
	}


	// register widgets
    if (!function_exists('tt_facebook_widget')) {
        function tt_facebook_widget() {
            register_widget( 'TT_Facebook_Widget' );
        }

        add_action('widgets_init', 'tt_facebook_widget');
    }
}