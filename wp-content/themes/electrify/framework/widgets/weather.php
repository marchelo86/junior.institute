<?php
/*

FILTERS AVAILABLE:
pix_weather_cache 						= How many seconds to cache weather: default 3600 (one hour).
pix_weather_error 						= Error message if weather is not found.
pix_weather_sizes 						= array of sizes for widget
pix_weather_extended_forecast_text 		= Change text of footer link


// CLEAR OUT THE TRANSIENT CACHE
add to your URL 'clear_pix_widget' 
For example: http://url.com/?clear_pix_widget

*/


// SETTINGS
$pix_weather_sizes = apply_filters( 'pix_weather_sizes' , array( 'tall', 'wide' ) );


//THE SHORTCODE
add_shortcode( 'pix-weather', 'pix_weather_shortcode' );
function pix_weather_shortcode( $atts )
{
	return pix_weather_logic( $atts );	
}


// THE LOGIC
function pix_weather_logic( $atts )
{
	global $pix_weather_sizes;
	
	$rtn 				= "";
	$weather_data		= array();
	$location 			= isset($atts['location']) ? $atts['location'] : false;
	$size 				= (isset($atts['size']) AND $atts['size'] == "tall") ? 'tall' : 'wide';
	$units 				= (isset($atts['units']) AND strtoupper($atts['units']) == "C") ? "metric" : "imperial";
	$units_display		= $units == "metric" ? __('C', 'pixel8es') : __('F', 'pixel8es');
	$override_title 	= isset($atts['override_title']) ? $atts['override_title'] : false;
	$days_to_show 		= isset($atts['forecast_days']) ? $atts['forecast_days'] : 5;
	$show_stats 		= (isset($atts['hide_stats']) AND $atts['hide_stats'] == 1) ? 0 : 1;
	$show_link 			= (isset($atts['show_link']) AND $atts['show_link'] == 1) ? 1 : 0;
	$inline_style		= isset($atts['inline_style']) ? $atts['inline_style'] : '';

	// NO LOCATION, ABORT ABORT!!!1!
	if( !$location ) { return pix_weather_error(); }
	
	
	//FIND AND CACHE CITY ID
	if( is_numeric($location) )
	{
		$city_name_slug 			= $location;
		$api_query					= "id=" . $location;
	}
	else
	{
		$city_name_slug 			= sanitize_title( $location );
		$api_query					= "q=" . $location;
	}
	
	
	// TRANSIENT NAME
	$weather_transient_name 		= 'pix_' . $city_name_slug . "_" . strtolower($units_display);


	// TWO APIS USED (VERSION 2.5)
	//http://api.openweathermap.org/data/2.5/weather?q=London,uk&units=metric&cnt=7&lang=fr
	//http://api.openweathermap.org/data/2.5/forecast/daily?q=London&units=metric&cnt=7&lang=fr
    
    
    // CLEAR THE TRANSIENT
    if( isset($_GET['clear_pix_widget']) )
    {
    	delete_transient( $weather_transient_name );
    }
    
	
	// GET WEATHER DATA
	if( get_transient( $weather_transient_name ) )
	{
		$weather_data = get_transient( $weather_transient_name );
	}
	else
	{
		$weather_data['now'] = array();
		$weather_data['forecast'] = array();
		
		// NOW
		$now_ping = "http://api.openweathermap.org/data/2.5/weather?" . $api_query . "&units=" . $units;
		$now_ping_get = wp_remote_get( $now_ping );
	
		if( is_wp_error( $now_ping_get ) ) 
		{
			return pix_weather_error( $now_ping_get->get_error_message()  ); 
		}	
	
		$city_data = json_decode( $now_ping_get['body'] );
		
		if( isset($city_data->cod) AND $city_data->cod == 404 )
		{
			return pix_weather_error( $city_data->message ); 
		}
		else
		{
			$weather_data['now'] = $city_data;
		}
		
		
		// FORECAST
		if( $days_to_show != "hide" )
		{
			$forecast_ping = "http://api.openweathermap.org/data/2.5/forecast/daily?" . $api_query  . "&units=" . $units ."&cnt=7";
			$forecast_ping_get = wp_remote_get( $forecast_ping );
		
			if( is_wp_error( $forecast_ping_get ) ) 
			{
				return pix_weather_error( $forecast_ping_get->get_error_message()  ); 
			}	
			
			$forecast_data = json_decode( $forecast_ping_get['body'] );
			
			if( isset($forecast_data->cod) AND $forecast_data->cod == 404 )
			{
				return pix_weather_error( $forecast_data->message ); 
			}
			else
			{
				$weather_data['forecast'] = $forecast_data;
			}
		}	
		
		if($weather_data['now'] OR $weather_data['forecast'])
		{
			// SET THE TRANSIENT, CACHE FOR A LITTLE OVER THREE HOURS
			set_transient( $weather_transient_name, $weather_data, apply_filters( 'pix_weather_cache', 11000 ) ); 
		}
	}



	// NO WEATHER
	if( !$weather_data OR !isset($weather_data['now'])) { return pix_weather_error(); }
	
	
	// TODAYS TEMPS
	$today 			= $weather_data['now'];
	$today_temp 	= round($today->main->temp);
	$today_high 	= round($today->main->temp_max);
	$today_low 		= round($today->main->temp_min);
	

	// DATA
	$header_title = $override_title ? $override_title : $location;
	
	$today->main->humidity 		= round($today->main->humidity);
	$today->wind->speed 		= round($today->wind->speed);
	
	$wind_label = array ( 
							__('N', 'pixel8es'),
							__('NNE', 'pixel8es'), 
							__('NE', 'pixel8es'),
							__('ENE', 'pixel8es'),
							__('E', 'pixel8es'),
							__('ESE', 'pixel8es'),
							__('SE', 'pixel8es'),
							__('SSE', 'pixel8es'),
							__('S', 'pixel8es'),
							__('SSW', 'pixel8es'),
							__('SW', 'pixel8es'),
							__('WSW', 'pixel8es'),
							__('W', 'pixel8es'),
							__('WNW', 'pixel8es'),
							__('NW', 'pixel8es'),
							__('NNW', 'pixel8es')
						);
						
	$wind_direction = $wind_label[ fmod((($today->wind->deg + 11) / 22.5),16) ];
	
	$show_stats_class = ($show_stats) ? "awe_with_stats" : "awe_without_stats";
	
	
	if($inline_style != "")
	{
		$inline_style = " style=\"{$inline_style}\"";
	}
	
	// DISPLAY WIDGET	
	$rtn .= "
	
		<div id=\"pix-weather-{$city_name_slug}\" class=\"pix-weather-wrap awecf {$show_stats_class} awe_{$size}\"{$inline_style}>
	";


	

	$rtn .= "
			<div class=\"pix-weather-header\">{$header_title}</div>
			
			<div class=\"pix-weather-current-temp\">
				$today_temp<sup>{$units_display}</sup>
			</div> <!-- /.pix-weather-current-temp -->
	";	
	
	if($show_stats)
	{
		$speed_text = ($units == "metric") ? __('km/h', 'pixel8es') : __('mph', 'pixel8es');
	
	
		$rtn .= "
				
				<div class=\"pix-weather-todays-stats\">
					<div class=\"awe_desc\">{$today->weather[0]->description}</div>
					<div class=\"awe_humidty\">" . __('humidity:', 'pixel8es') . " {$today->main->humidity}% </div>
					<div class=\"awe_wind\">" . __('wind:', 'pixel8es') . " {$today->wind->speed}" . $speed_text . " {$wind_direction}</div>
					<div class=\"awe_highlow\"> "  .__('H', 'pixel8es') . " {$today_high} &bull; " . __('L', 'pixel8es') . " {$today_low} </div>	
				</div> <!-- /.pix-weather-todays-stats -->
		";
	}

	if($days_to_show != "hide")
	{
		$rtn .= "<div class=\"pix-weather-forecast awe_days_{$days_to_show} awecf\">";
		$c = 1;
		$dt_today = date( 'Ymd', current_time( 'timestamp', 0 ) );
		$forecast = $weather_data['forecast'];
		$days_to_show = (int) $days_to_show;
		
		foreach( (array) $forecast->list as $forecast )
		{
			if( $dt_today >= date('Ymd', $forecast->dt)) continue;
			$days_of_week = array( __('Sun' ,'pixel8es'), __('Mon' ,'pixel8es'), __('Tue' ,'pixel8es'), __('Wed' ,'pixel8es'), __('Thu' ,'pixel8es'), __('Fri' ,'pixel8es'), __('Sat' ,'pixel8es') );
			
			$forecast->temp = (int) $forecast->temp->day;
			$day_of_week = $days_of_week[ date('w', $forecast->dt) ];
			$rtn .= "
				<div class=\"pix-weather-forecast-day\">
					<div class=\"pix-weather-forecast-day-temp\">{$forecast->temp}<sup>{$units_display}</sup></div>
					<div class=\"pix-weather-forecast-day-abbr\">$day_of_week</div>
				</div>
			";
			if($c == $days_to_show) break;
			$c++;
		}
		$rtn .= " </div> <!-- /.pix-weather-forecast -->";
	}
	
	if($show_link AND isset($today->id))
	{
		$show_link_text = apply_filters('pix_weather_extended_forecast_text' , __('extended forecast', 'pixel8es'));

		$rtn .= "<div class=\"pix-weather-more-weather-link\">";
		$rtn .= "<a href=\"http://openweathermap.org/city/{$today->id}\" target=\"_blank\">{$show_link_text}</a>";		
		$rtn .= "</div> <!-- /.pix-weather-more-weather-link -->";
	}
	
	
	
	$rtn .= "</div> <!-- /.pix-weather-wrap -->";
	return $rtn;
}


// RETURN ERROR
function pix_weather_error( $msg = false )
{
	if(!$msg) $msg = __('No weather information available', 'pixel8es');
	return apply_filters( 'pix_weather_error', "<!-- PIXEL8ES WEATHER ERROR: " . $msg . " -->" );
}



// PIXEL8ES WEATHER WIDGET, WIDGET CLASS, SO MANY WIDGETS
class PixWeatherWidget extends WP_Widget 
{
	function PixWeatherWidget() { parent::WP_Widget(false, $name = __('Pixel8es:: Weather Widget','pixel8es')); }

    function widget($args, $instance) 
    {	
        extract( $args );
        
        $location 			= isset($instance['location']) ? $instance['location'] : false;
        $override_title 	= isset($instance['override_title']) ? $instance['override_title'] : false;
        $widget_title 		= isset($instance['widget_title']) ? $instance['widget_title'] : false;
        $units 				= isset($instance['units']) ? $instance['units'] : false;
        $size 				= isset($instance['size']) ? $instance['size'] : false;
        $forecast_days 		= isset($instance['forecast_days']) ? $instance['forecast_days'] : false;
        $hide_stats 		= (isset($instance['hide_stats']) AND $instance['hide_stats'] == 1) ? 1 : 0;
        $show_link 			= (isset($instance['show_link']) AND $instance['show_link'] == 1) ? 1 : 0;
		
		echo $before_widget;
		if($widget_title != "") echo $before_title . $widget_title . $after_title;
		echo pix_weather_logic( array( 'location' => $location, 'override_title' => $override_title, 'size' => $size, 'units' => $units, 'forecast_days' => $forecast_days, 'hide_stats' => $hide_stats, 'show_link' => $show_link ));
		echo $after_widget;
    }
 
    function update($new_instance, $old_instance) 
    {		
		$instance = $old_instance;
		$instance['location'] 			= strip_tags($new_instance['location']);
		$instance['override_title'] 	= strip_tags($new_instance['override_title']);
		$instance['widget_title'] 		= strip_tags($new_instance['widget_title']);
		$instance['units'] 				= strip_tags($new_instance['units']);
		$instance['size'] 				= strip_tags($new_instance['size']);
		$instance['forecast_days'] 		= strip_tags($new_instance['forecast_days']);
		$instance['hide_stats'] 		= (isset($new_instance['hide_stats']) AND $new_instance['hide_stats'] == 1) ? 1 : 0;
		$instance['show_link'] 			= (isset($new_instance['show_link']) AND $new_instance['show_link'] == 1) ? 1 : 0;
        return $instance;
    }
 
    function form($instance) 
    {	
    	global $pix_weather_sizes;
    	
        $location 			= isset($instance['location']) ? esc_attr($instance['location']) : "";
        $override_title 	= isset($instance['override_title']) ? esc_attr($instance['override_title']) : $location;
        $widget_title 		= isset($instance['widget_title']) ? esc_attr($instance['widget_title']) : "";
        $selected_size 		= isset($instance['size']) ? esc_attr($instance['size']) : "wide";
        $units 				= (isset($instance['units']) AND strtoupper($instance['units']) == "C") ? "C" : "F";
        $forecast_days 		= isset($instance['forecast_days']) ? esc_attr($instance['forecast_days']) : 5;
        $hide_stats 		= (isset($instance['hide_stats']) AND $instance['hide_stats'] == 1) ? 1 : 0;
        $show_link 			= (isset($instance['show_link']) AND $instance['show_link'] == 1) ? 1 : 0;
	?>
        <p>
          <label for="<?php echo $this->get_field_id('location'); ?>">
          	<?php _e('Location:', 'pixel8es'); ?><br />
          	<small><?php _e('(i.e: London,UK or New York City,NY)', 'pixel8es'); ?></small>
          </label> 
          <input class="widefat" style="margin-top: 4px;" id="<?php echo $this->get_field_id('location'); ?>" name="<?php echo $this->get_field_name('location'); ?>" type="text" value="<?php echo $location; ?>" />
        </p>
                
        <p>
          <label for="<?php echo $this->get_field_id('override_title'); ?>"><?php _e('Override Title:', 'pixel8es'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('override_title'); ?>" name="<?php echo $this->get_field_name('override_title'); ?>" type="text" value="<?php echo $override_title; ?>" />
        </p>
                
        <p>
          <label for="<?php echo $this->get_field_id('units'); ?>"><?php _e('Units:', 'pixel8es'); ?></label>  &nbsp;
          <input id="<?php echo $this->get_field_id('units'); ?>" name="<?php echo $this->get_field_name('units'); ?>" type="radio" value="F" <?php if($units == "F") echo ' checked="checked"'; ?> /> F &nbsp; &nbsp;
          <input id="<?php echo $this->get_field_id('units'); ?>" name="<?php echo $this->get_field_name('units'); ?>" type="radio" value="C" <?php if($units == "C") echo ' checked="checked"'; ?> /> C
        </p>
        
		<p>
          <label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Size:', 'pixel8es'); ?></label> 
          <select class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
          	<?php foreach($pix_weather_sizes as $size) { ?>
          	<option value="<?php echo $size; ?>"<?php if($selected_size == $size) echo " selected=\"selected\""; ?>><?php echo $size; ?></option>
          	<?php } ?>
          </select>
		</p>
        
		<p>
          <label for="<?php echo $this->get_field_id('forecast_days'); ?>"><?php _e('Forecast:', 'pixel8es'); ?></label> 
          <select class="widefat" id="<?php echo $this->get_field_id('forecast_days'); ?>" name="<?php echo $this->get_field_name('forecast_days'); ?>">
          	<option value="5"<?php if($forecast_days == 5) echo " selected=\"selected\""; ?>>5 Days</option>
          	<option value="4"<?php if($forecast_days == 4) echo " selected=\"selected\""; ?>>4 Days</option>
          	<option value="3"<?php if($forecast_days == 3) echo " selected=\"selected\""; ?>>3 Days</option>
          	<option value="2"<?php if($forecast_days == 2) echo " selected=\"selected\""; ?>>2 Days</option>
          	<option value="1"<?php if($forecast_days == 1) echo " selected=\"selected\""; ?>>1 Days</option>
          	<option value="hide"<?php if($forecast_days == 'hide') echo " selected=\"selected\""; ?>>Don't Show</option>
          </select>
		</p>
		
        <p>
          <label for="<?php echo $this->get_field_id('hide_stats'); ?>"><?php _e('Hide Stats:', 'pixel8es'); ?></label>  &nbsp;
          <input id="<?php echo $this->get_field_id('hide_stats'); ?>" name="<?php echo $this->get_field_name('hide_stats'); ?>" type="checkbox" value="1" <?php if($hide_stats) echo ' checked="checked"'; ?> />
        </p>
		
        <p>
          <label for="<?php echo $this->get_field_id('show_link'); ?>"><?php _e('Link to OpenWeatherMap:', 'pixel8es'); ?></label>  &nbsp;
          <input id="<?php echo $this->get_field_id('show_link'); ?>" name="<?php echo $this->get_field_name('show_link'); ?>" type="checkbox" value="1" <?php if($show_link) echo ' checked="checked"'; ?> />
        </p> 
                
        <p>
          <label for="<?php echo $this->get_field_id('widget_title'); ?>"><?php _e('Widget Title: (optional)', 'pixel8es'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>
        <?php 
    }
}

add_action( 'widgets_init', create_function('', 'return register_widget("PixWeatherWidget");') );