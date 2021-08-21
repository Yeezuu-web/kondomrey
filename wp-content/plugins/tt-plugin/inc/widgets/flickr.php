<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( ! class_exists( 'TT_Flickr_Widget' )){

	class TT_Flickr_Widget extends WP_Widget {

		public function __construct() {
            parent::__construct(
                'tt_flickr_widget', // Base ID
                __('TrendyMag Flickr Widget', 'tt-pl-textdomain'), // Name
                array('description' => esc_html__('Displays flickr photo', 'tt-pl-textdomain'),) // Args
            );
        }


		public function widget( $args, $instance ){

			$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo ( $args['before_widget'] );

			if ( ! empty($instance['title']) ){
				echo ( $args['before_title'] . $instance['title'] . $args['after_title'] );
			}

			$no_of_photos   = isset( $instance['no_of_photos'] )   ? $instance['no_of_photos'] : 6;
			$flickr_display = isset( $instance['flickr_display'] ) ? $instance['flickr_display'] : 'latest';

			if( ! empty( $instance['flickr_id'] )){
			?>

				<div class="flickr-photo-wrapper">
					<script src="//www.flickr.com/badge_code_v2.gne?count=<?php echo esc_attr( $no_of_photos ); ?>&amp;display=<?php echo esc_attr( $flickr_display ); ?>&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo esc_attr( $instance['flickr_id'] ); ?>"></script>
					<div class="clearfix"></div>
				</div><!-- .flickr-photo-wrapper -->

				<a target="_blank" href="https://www.flickr.com/photos/<?php echo esc_attr( $instance['flickr_id'] )?>/" class="tt-follow-btn"><?php esc_html_e( 'Follow us on Flickr', 'tt-pl-textdomain' ) ?></a>

			<?php
			}
			echo ( $args['after_widget'] );
		}

		/**
		 * Handles updating settings for widget instance.
		 */
		public function update( $new_instance, $old_instance ){
			$instance                   = $old_instance;
			$instance['title']          = sanitize_text_field( $new_instance['title'] );
			$instance['flickr_id']      = $new_instance['flickr_id'];
			$instance['no_of_photos']   = $new_instance['no_of_photos'];
			$instance['flickr_display'] = $new_instance['flickr_display'];
			return $instance;
		}

		/**
		 * Outputs the settings form for the widget.
		 */
		public function form( $instance ){
			$defaults = array( 'title' =>esc_html__( 'Flickr', 'tt-pl-textdomain'), 'no_of_photos' => 6, 'flickr_display' => 'latest' );
			$instance = wp_parse_args( (array) $instance, $defaults );

			$title          = isset( $instance['title'] )          ? $instance['title'] : '';
			$flickr_id      = isset( $instance['flickr_id'] )      ? $instance['flickr_id'] : '';
			$no_of_photos   = isset( $instance['no_of_photos'] )   ? $instance['no_of_photos'] : 6;
			$flickr_display = isset( $instance['flickr_display'] ) ? $instance['flickr_display'] : 'latest';

			?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'tt-pl-textdomain') ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" type="text" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'flickr_id' ) ); ?>"><?php esc_html_e( 'Flickr ID:', 'tt-pl-textdomain') ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'flickr_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr_id' ) ); ?>" value="<?php echo esc_attr( $flickr_id ) ?>" class="widefat" type="text" />
				<small><a href="<?php echo esc_url( 'http://www.idgettr.com' ); ?>" target="_blank"><?php esc_html_e( 'Find your ID at idGettr', 'tt-pl-textdomain' ); ?></a></small>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'flickr_display' ) ); ?>"><?php esc_html_e( 'Photos Order:', 'tt-pl-textdomain') ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'flickr_display' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr_display' ) ); ?>" class="widefat">
					<option value="latest" <?php selected( $flickr_display, 'latest' ); ?>><?php esc_html_e( 'Most recent', 'tt-pl-textdomain') ?></option>
					<option value="random" <?php selected( $flickr_display, 'random' ); ?>><?php esc_html_e( 'Random', 'tt-pl-textdomain') ?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'no_of_photos' ) ); ?>"><?php esc_html_e( 'Number of photos to show:', 'tt-pl-textdomain') ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'no_of_photos' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no_of_photos' ) ); ?>" value="<?php echo esc_attr( $no_of_photos ) ?>" type="number" step="1" min="1" size="3" class="tiny-text" />
			</p>

		<?php
		}
	}


	// register widgets
    if (!function_exists('tt_flickr_widget')) {
        function tt_flickr_widget() {
            register_widget( 'TT_Flickr_Widget' );
        }
        add_action('widgets_init', 'tt_flickr_widget');
    }

}
?>
