<?php
$output = $el_class = '';
extract(shortcode_atts(array(
    'el_class' => '',
	'animate' => '',
	'transition' => '',
	'duration' => '',
	'delay' => ''
), $atts));

	$animate_class = "";
	$slideTransition = "";
	$slideDuration = "";
	$slideDelay = "";

	if($animate == "Yes"){

		$animate_class = ' pix-animate-cre';

		$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

		$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

		$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';

	}

	$output  = '<section class="callOut newSection'. esc_attr($animate_class) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>';
	$output .= $content;
	$output .= '</section>';
	
	return $output;
?>
