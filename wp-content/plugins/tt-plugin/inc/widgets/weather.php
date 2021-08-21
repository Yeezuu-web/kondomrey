<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//---------------------------------------------------------------------------
// Weather widget
//---------------------------------------------------------------------------
if( ! class_exists( 'TT_Weather_Widget' )){


	class TT_Weather_Widget extends WP_Widget{

		public function __construct() {
            parent::__construct(
                'tt_weather_widget', // Base ID
                __('TrendyMag Weather Widget', 'tt-pl-textdomain'), // Name
                array('description' => esc_html__('Displays weather info', 'tt-pl-textdomain'),) // Args
            );
        }


        public function form( $instance ){
			$defaults = array( 'title' =>esc_html__('Weather', 'tt-text-domain') );
			$instance = wp_parse_args( (array) $instance, $defaults );

			$location      = isset( $instance['location'] ) ? esc_attr( $instance['location']) : '';
			$custom_name   = isset( $instance['custom_name'] ) ? esc_attr( $instance['custom_name']) : '';
			$api_key       = isset( $instance['api_key'] ) ? esc_attr( $instance['api_key']) : '';
			$title         = isset( $instance['title'] ) ? esc_attr( $instance['title']) : '';
			$units         = ( isset( $instance['units'] ) AND strtoupper( $instance['units']) == 'C' ) ? 'C' : 'F';
			$font_color    = isset( $instance['font_color'] ) ? esc_attr( $instance['font_color']) : '';
			$bg_color      = isset( $instance['bg_color'] ) ? esc_attr( $instance['bg_color']) : '';

			$id = explode( '-', $this->get_field_id( 'widget_id' ));
		?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:', 'tt-text-domain'); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('location') ); ?>">
					<?php esc_html_e('Location:', 'tt-text-domain'); ?> - <a href="<?php echo esc_url( 'http://openweathermap.org/find' ); ?>" target="_blank"><?php esc_html_e('Find Your Location', 'tt-text-domain'); ?></a><br />
					<small><?php esc_html_e( '(i.e: New York City, NY)', 'tt-text-domain' ); ?></small>
				</label>
				<input class="widefat" style="margin-top: 4px;" id="<?php echo esc_attr( $this->get_field_id('location') ); ?>" name="<?php echo esc_attr( $this->get_field_name('location') ); ?>" type="text" value="<?php echo esc_attr( $location ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('api_key') ); ?>">
					<?php esc_html_e('API key', 'tt-text-domain'); ?> - <a href="<?php echo esc_url( 'http://openweathermap.org/appid#get' ); ?>" target="_blank"><?php esc_html_e('How to get your API Key?', 'tt-text-domain'); ?></a><br />
				</label>
				<input class="widefat" style="margin-top: 4px;" id="<?php echo esc_attr( $this->get_field_id('api_key') ); ?>" name="<?php echo esc_attr( $this->get_field_name('api_key') ); ?>" type="text" value="<?php echo esc_attr( $api_key ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('units') ); ?>"><?php esc_html_e('Units:', 'tt-text-domain'); ?></label>  &nbsp;
				<input id="<?php  echo esc_attr( $this->get_field_id('units') ); ?>-f" name="<?php echo esc_attr( $this->get_field_name('units') ); ?>" type="radio" value="F" <?php checked( $units, 'F' ); ?> /> <?php esc_html_e('F', 'tt-text-domain'); ?> &nbsp; &nbsp;
				<input id="<?php  echo esc_attr( $this->get_field_id('units') ); ?>-c" name="<?php echo esc_attr( $this->get_field_name('units') ); ?>" type="radio" value="C" <?php checked( $units, 'C' ); ?> /> <?php esc_html_e('C', 'tt-text-domain'); ?>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('custom_name') ); ?>">
					<?php esc_html_e('Custom City Name:', 'tt-text-domain'); ?><br />
				</label>
				<input class="widefat" style="margin-top: 4px;" id="<?php echo esc_attr( $this->get_field_id('custom_name') ); ?>" name="<?php echo esc_attr( $this->get_field_name('custom_name') ); ?>" type="text" value="<?php echo esc_attr( $custom_name ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>" style="display:block;"><?php esc_html_e( 'Background Color:', 'tt-text-domain' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bg_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bg_color' ) ); ?>" type="text" value="<?php echo esc_attr( $bg_color ) ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'font_color' ) ); ?>" style="display:block;"><?php esc_html_e( 'Text Color:', 'tt-text-domain' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'font_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'font_color' ) ); ?>" type="text" value="<?php echo esc_attr( $font_color ) ?>" />
			</p>
		<?php
		}

		public function widget( $args, $instance ){
			extract( $args );

			$widget_title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$location      = isset($instance['location']) ? $instance['location'] : false;
			$custom_name   = isset($instance['custom_name']) ? $instance['custom_name'] : false;
			$api_key       = isset($instance['api_key']) ? $instance['api_key'] : false;
			$units         = isset($instance['units']) ? $instance['units'] : false;
			$bg_color      = ! empty($instance['bg_color']) ? 'background-color:'. $instance['bg_color']  .'!important' : '';
			$font_color    = ! empty($instance['font_color']) ? 'color:'. $instance['font_color'] .'!important' : '';

			echo ( $before_widget );

			if ( ! empty( $widget_title ) ){
				echo ( $before_title . $widget_title . $after_title );
			}

			echo tt_weather_logic( array( 'location' => $location, 'api_key' => $api_key, 'units' => $units, 'forecast_days' => '5', 'custom_name' => $custom_name ));

			$widget_id = '#'.$args['widget_id'];

			if ( ! empty( $bg_color ) || ! empty( $font_color ) ){
				$out = "<style scoped type=\"text/css\">";
					if ( ! empty( $font_color ) ){
						$out .= "
							$widget_id,
							$widget_id .widget-title{
								 $font_color;
							}
						";
					}
					if ( ! empty( $bg_color ) ){
						$out .= "
							$widget_id{
								 $bg_color;
							}
						";
					}
				echo ( $out ) ."</style>";
			}

			echo ( $after_widget );
		}

		public function update( $new_instance, $old_instance ){
			$instance                  = $old_instance;
			$instance['location']      = strip_tags($new_instance['location']);
			$instance['custom_name']   = strip_tags($new_instance['custom_name']);
			$instance['api_key']       = strip_tags($new_instance['api_key']);
			$instance['title']         = strip_tags($new_instance['title']);
			$instance['units']         = strip_tags($new_instance['units']);
			$instance['font_color']    = strip_tags($new_instance['font_color']);
			$instance['bg_color']      = strip_tags($new_instance['bg_color']);
			$instance['animated']      = 'true'; // will be used later for animation option
			return $instance;
		}
	}


	# THE LOGIC
	function tt_weather_logic( $atts ){

		$rtn               = '';
		$weather_data      = array();
		$location          = isset( $atts['location'] ) ? $atts['location'] : false;
		$api_key           = isset( $atts['api_key'] )  ? $atts['api_key']  : false;
		$units             = ( isset( $atts['units'] ) AND strtoupper( $atts['units'] ) == 'C' ) ? 'metric' : 'imperial';
		$units_display     = $units == 'metric' ? '&#x2103;' : '&#x2109;';
		$locale            = 'en';
		$sytem_locale      = get_locale();
		$available_locales = array( 'en', 'ru', 'it', 'es', 'uk', 'de', 'pt', 'ro', 'pl', 'fi', 'nl', 'fr', 'bg', 'sv', 'zh_tw', 'zh_cn', 'tr', 'hr', 'ca'  );


		if( empty( $api_key ) ){
			echo'<span class="theme-notice">'. esc_html__( 'WEATHER WIDGET: You need to set the API key and Location.', 'tt-text-domain' ) .'</span>';
			return;
		}


		# CHECK FOR LOCALE
		if( in_array( $sytem_locale , $available_locales )){
			$locale = $sytem_locale;
		}

		# CHECK FOR LOCALE BY FIRST TWO DIGITS
		if( in_array( substr( $sytem_locale, 0, 2 ), $available_locales )){
			$locale = substr( $sytem_locale, 0, 2 );
		}

		# NO LOCATION, ABORT ABORT!!!1!
		if( ! $location ){
			return tt_weather_error();
		}

		# FIND AND CACHE CITY ID
		if( is_numeric( $location )){
			$city_name_slug = $location;
			$api_query      = "id=" . $location;
		}
		else{
			$city_name_slug = sanitize_title( $location );
			$api_query      = "q=" . $location;
		}

		# TRANSIENT NAME
		$weather_transient_name = 'tt_' . $city_name_slug . "_" . strtolower($units) . '_' . $locale;

		# GET WEATHER DATA
		if( $weather_data = get_transient( $weather_transient_name )){


		}
		else{
			$weather_data['now']      = array();
			$weather_data['forecast'] = array();

			# NOW ----------
			$now_ping = "http://api.openweathermap.org/data/2.5/weather?" . $api_query . "&lang=" . $locale . "&units=" . $units."&APPID=".$api_key;
			$now_ping = preg_replace( '/\s+/', '', $now_ping );

			$now_ping_get = wp_remote_get( $now_ping, array( 'timeout' => 30 ) );

			if( is_wp_error( $now_ping_get )){
				return tt_weather_error( $now_ping_get->get_error_message() );
			}

			$city_data = json_decode( $now_ping_get['body'] );

			if( isset($city_data->cod) AND $city_data->cod == 404 ){
				return tt_weather_error( $city_data->message );
			}
			else{
				$weather_data['now'] = $city_data;
			}

			# FORECAST ----------
			$forecast_ping = "http://api.openweathermap.org/data/2.5/forecast/daily?" . $api_query . "&lang=" . $locale . "&units=" . $units ."&cnt=7&APPID=".$api_key;
			$forecast_ping = preg_replace( '/\s+/', '', $forecast_ping );

			$forecast_ping_get = wp_remote_get( $forecast_ping, array( 'timeout' => 30 ) );

			if( is_wp_error( $forecast_ping_get ) ){
				return tt_weather_error( $forecast_ping_get->get_error_message()  );
			}

			$forecast_data = json_decode( $forecast_ping_get['body'] );

			if( isset( $forecast_data->cod ) AND $forecast_data->cod == 404 ){
				return tt_weather_error( $forecast_data->message );
			}
			else{
				$weather_data['forecast'] = $forecast_data;
			}

			# SET THE TRANSIENT, CACHE FOR TWO HOURS
			if( $weather_data['now'] AND $weather_data['forecast'] ){
				set_transient( $weather_transient_name, $weather_data, 2* HOUR_IN_SECONDS );
			}
		}

		# NO WEATHER
		if( ! $weather_data OR ! isset( $weather_data['now'] )){
			return tt_weather_error();
		}


		# TODAYS TEMPS & ICONS
		$today        = $weather_data['now'];
		$forecast     = $weather_data['forecast'];
		$dt_today     = date( 'Ymd', current_time( 'timestamp', 0 ) );
		$city_name    = ! empty( $atts['custom_name'] ) ? $atts['custom_name'] : $today->name;

		# DATA
		$today_temp = round( $today->main->temp );


		# ICONS
		$icon_divs = tt_weather_status_icon( $today->weather[0]->icon );

		# UPCOMMING DAYS // We run this first to get the Max and MIN values for today
		$c = 1;
		$forecast_out = '';

		foreach( (array) $forecast->list as $forecast ){
			$forecast_icon_divs = tt_weather_status_icon( $forecast->weather[0]->icon );

			if( $dt_today == date( 'Ymd', $forecast->dt )){
				$today_high = round( $forecast->temp->max );
				$today_low  = round( $forecast->temp->min );
				$today->main->humidity = round( $forecast->humidity );
				$today->wind->speed    = round( $forecast->speed );
			}

			if( $dt_today >= date( 'Ymd', $forecast->dt )){
				continue;
			}

			$forecast->temp = (int) $forecast->temp->day;
			$day_of_week    = date_i18n( 'D', $forecast->dt );

			$forecast_out .= "
				<li class=\"weather-forecast-item\">
					{$forecast_icon_divs}
					<div class=\"forecast-temperature\">{$forecast->temp}<sup>{$units_display}</sup></div>
					<div class=\"forecast-day-name\">$day_of_week</div>
				</li>
			";

			$c++;
		}


		# DISPLAY WIDGET
		$rtn .= "
			<div id=\"tt-weather-{$city_name_slug}\" class=\"weather-wrapper\">
		";

		$rtn .= "
			<div class=\"weather-city\">
				{$icon_divs}
				<span class=\"weather-city-name\">{$city_name}</span>
				<div class=\"weather-main\">{$today->weather[0]->description}</div>
			</div>
		";


		$speed_text = ($units == 'metric') ? esc_html__('km/h') : esc_html__('mph');

		$rtn .= "
			<div class=\"weather-todays-temperature\">
				<div class=\"current-temperature\">$today_temp<sup>{$units_display}</sup></div>
				<div class=\"weather-more-todays-temperature\">";

				if( ! empty( $today_high ) && ! empty( $today_low ) ){
					$rtn .= "
						<div><span aria-hidden=\"true\" class=\"tt-thermometer\"></span> {$today_high}&ordm; - {$today_low}&ordm;</div>";
				}

				$rtn .= "
					<div><span aria-hidden=\"true\" class=\"tt-cloud-6\"></span><span class=\"screen-reader-text\">" . esc_html__('humidity:', 'tt-text-domain') . "</span> {$today->main->humidity}% </div>
					<div><span aria-hidden=\"true\" class=\"fa fa-mixcloud\"></span><span class=\"screen-reader-text\">" . esc_html__('wind:', 'tt-text-domain') . "</span> {$today->wind->speed} " . $speed_text . "</div>
				</div>
			</div>
		";


		#-----
		
		$rtn .= "
			<div class=\"weather-forecast-wrap\"><ul class=\"slides\">
				$forecast_out
			</ul></div>
		";


		$rtn .= "</div>";

		return $rtn;
	}


	# Return Weather Status icon
	function tt_weather_status_icon( $today_icon ){

		# Default icon | Cloudy ----------
		$weather_icon = '
			<div class="weather-icon">
				<div class="tt-cloud-7"></div>
			</div>
		';

		# Sunny ----------
		if( $today_icon == '01d' ){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-sun"></div>
				</div>
			';
		}

		# Moon ----------
		elseif( $today_icon == '01n' ){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-moon"></div>
				</div>
			';
		}

		# Cloudy Sunny ----------
		elseif( $today_icon == '02d' || $today_icon == '03d' || $today_icon == '04d' ){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-cloud"></div>
				</div>
			';
		}

		# Cloudy Night ----------
		elseif( $today_icon == '02n' || $today_icon == '03n'  || $today_icon == '04n' ){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-cloud-3"></div>
				</div>
			';
		}

		# Showers ----------
		elseif( $today_icon == '09d' ||  $today_icon == '09n'){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-cloud-6"></div>
				</div>
			';
		}

		# Rainy Sunny ----------
		elseif( $today_icon == '10d' ){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-cloud-4"></div>
				</div>
			';
		}

		# Rainy Night ----------
		elseif( $today_icon == '10n' ){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-cloud-1"></div>
				</div>
			';
		}

		# Thunder ----------
		elseif( $today_icon == '11d' || $today_icon == '11n'){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-cloud-5"></div>
				</div>
			';
		}

		# Snowing ----------
		elseif( $today_icon == '13d' || $today_icon == '13n' ){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-cloud-4"></div>
				</div>
			';
		}

		# Mist ----------
		elseif( $today_icon == '50d'  || $today_icon == '50n' ){
			$weather_icon = '
				<div class="weather-icon">
					<div class="tt-cloud-8"></div>
				</div>
			';
		}

		return $weather_icon;
	}


	# RETURN ERROR
	function tt_weather_error( $msg = false ){

		if( empty( $msg )){
			$msg = esc_html__('No weather information available', 'tt-text-domain');
		}

		return '<div class="weather-widget-error">'. $msg .'</div>';
	}


	// register widgets
    if (!function_exists('tt_weather_widget')) {
        function tt_weather_widget() {
            register_widget( 'TT_Weather_Widget' );
        }
        add_action('widgets_init', 'tt_weather_widget');
    }

}