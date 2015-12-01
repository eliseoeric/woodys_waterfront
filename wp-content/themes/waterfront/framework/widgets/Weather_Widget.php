<?php 
/*
|--------------------------------------------------------------------------
| weather_widget.php
|--------------------------------------------------------------------------
| Widget that connects to Open Weather API
| http://openweathermap.org/api
| Goes on front page and displays current weather conditions
|
*/

class Weather_Widget extends WP_Widget {

//	private $api_key = 'b7cef3fde945c0b371312905ae2ed1d8';
	private $api_key;

	// Register the Widget with WordPress
	public function __construct() {
		parent::__construct(
			'weather_widget', //Base ID
			__( 'Weather Widget', 'waterfront' ), //Name
			array( 'description' => 'Uses OpenWeather API to retrive weather conditions' ) //Args
		);
		$options = get_option('framework_options');
		$this->api_key = $options['_waterfront_open_weather_api_key'];
	}

	public function widget( $args, $instance ) {
		extract( $args );

		$zipcode = $instance['zipcode'];

		$weather = $this->get_weather_by_zip( $zipcode );
		
		if(!$weather) {
			echo $this->return_default();
		} else {
			echo $this->build_widget($weather);
		}

	}

	/**
	  * Back-end widget form.
	  *
	  * @see WP_Widget::form()
	  *
	  * @param array $instance Previously saved values from database.
	  */
	public function form( $instance ) {

		$zipcode = esc_attr( $instance['zipcode'] );
	?>
	<p>
		<label for="<?php echo $this->get_field_id('zipcode'); ?>"><?php _e('Zipcode:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('zipcode'); ?>" name="<?php echo $this->get_field_name('zipcode'); ?>" type="text" value="<?php echo $zipcode; ?>" />
	</p>

	<?php
	}

	/**
	  * Sanitize widget form values as they are saved.
	  *
	  * @see WP_Widget::update()
	  *
	  * @param array $new_instance Values just sent to be saved.
	  * @param array $old_instance Previously saved values from database.
	  *
	  * @return array Updated safe values to be saved.
	  */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['zipcode'] = strip_tags( $new_instance['zipcode'] );

		return $instance;
	}

	public function get_weather_by_zip( $zipcode ) {
		$url = "http://api.openweathermap.org/data/2.5/weather?zip={$zipcode},us&units=imperial&APPID={$this->api_key}";
		
		$resp = wp_remote_get( $url );

		$ret = array(
			'resp' => $resp['response']['code'],
			'body' => $resp['body']
		);	

		//check response
		if($resp['response']['code'] != 200 ) {
			$ret = false;
		} else {
			$ret = array(
				'resp' => $resp['response']['code'],
				'body' => $resp['body']
			);
		}

		return $ret;
	}

	public function return_default() {
		$html = "<div class='hero-weather'>
					<div class='hero-weather__current'>
						<span class='currently'>Currently</span>
						<span class='degrees'>88<span class='symbol'>°</span></span>
						<div class='icon_weather sun-shower'>
							<div class='cloud'></div>
							<div class='sun'>
								<div class='rays'></div>
							</div>
							<div class='rain'></div>
						</div>
					</div>
					<div id='marineforecast' class='marineforecast row'>
						<div class='weather-stat four columns' id='sunset'>
							<div class='stat-label'>Sunset</div>
							<div class='stat-value'>7:39<span class='symbol'>PM</span></div>
						</div>
						<div class='weather-stat four columns' id='wind-speed'>
							<div class='stat-label'>Wind</div>
							<div class='stat-value'>6-12<span class='symbol'>kn</span></div>
						</div>
						<div class='weather-stat four columns' id='seas'>
							<div class='stat-label'>Seas</div>
							<div class='stat-value'>2<span class='symbol'>ft</span></div>
						</div>
					</div>
				</div>";
		return $html;
	}

	public function build_widget( $weather ) {
		$json = json_decode($weather['body'], true);
		// dd($json);
		$condition = $this->weather_id_to_string($json['weather'][0]['id']);
		// dd($json['sys']['sunset']);
		$sunset = new DateTime();
		$sunset->setTimestamp($json['sys']['sunset']);
		$sunset->setTimezone(new DateTimeZone('America/New_York'));

		$temp = round($json['main']['temp']);

		$html = "<div class='hero-weather'>
					<div class='hero-weather__current'>
						<span class='currently'>Currently</span>
						<span class='degrees'>{$temp}<span class='symbol'>°</span></span>
						<div class='icon_weather {$condition['condition']}'>" . $condition['snippet'] . "</div></div>";

		$html .= "<div id='marineforecast' class='marineforecast row'>
						<div class='weather-stat four columns' id='sunset'>
							<div class='stat-label'>Sunset</div>
							<div class='stat-value'>{$sunset->format('h:i')}<span class='symbol'> PM</span></div>
						</div>
						<div class='weather-stat four columns' id='wind-speed'>
							<div class='stat-label'>Wind</div>
							<div class='stat-value'>{$json['wind']['speed']}<span class='symbol'> mph</span></div>
						</div>
						<div class='weather-stat four columns' id='condition'>
							<div class='stat-label'>Condition</div>
							<div class='stat-value'>{$json['weather'][0]['description']}</div>
						</div>
					</div>
				</div>";

		return $html;

	}	


	public function weather_id_to_string( $weather_id ) {

		if( preg_match( '/^(?:2[0-2][0-2])|959|958|962|961|960/', $weather_id ) ) {
			$html = '<div class="icon thunder-storm">
					<div class="cloud"></div>
					<div class="cloud"></div>	
					  <div class="lightning">
					    <div class="bolt"></div>
					    <div class="bolt"></div>
					  </div></div>';
			return array( "condition" => "thunder-storm", "snippet" => $html );
		}

		if( preg_match( '/^(?:3[0-2][0-4])/', $weather_id ) ) {
			$html = '<div class="icon drizzle">
					  <div class="cloud"></div>
					  <div class="sun">
					    <div class="rays"></div>
					  </div>
					  <div class="rain"></div>
					</div>';
			return array( "condition" => "drizzle", "snippet" => $html );
		}

		if( preg_match( '/^(?:5[0-3][0-4])/', $weather_id ) ) {
			$html = '<div class="icon rainy">
					  <div class="cloud"></div>
  					  <div class="cloud"></div>
					  <div class="rain"></div>
					</div>';

			return array( "condition" => "rainy", "snippet" => $html );
		}

		if( preg_match( '/^(?:7[0-8][0-3])/', $weather_id ) ) {
			$html = '<div class="icon cloudy">
					  <div class="cloud"></div>
					  <div class="cloud"></div>
					</div>';
			return array( "condition" => "atmosphere", "snippet" => $html );
		}

		if( preg_match('/^(?:800)|951|952|953|954|955/', $weather_id) ) {
			$html = '<div class="sun">
					    <div class="rays"></div>
					  </div>';
			return array( "condition" => "sunny", "snippet" => $html );
		}

		if( preg_match('/^(?:80[1-4])/', $weather_id) ) {
			$html = '<div class="icon cloudy">
					  <div class="cloud"></div>
					  <div class="cloud"></div>
					</div>';
			return array( "condition" => "cloudy", "snippet" => $html );
		}

		if( preg_match('/^(?:90[0-6])/', $weather_id) ) {
			return "exteme";
		}

	}

}