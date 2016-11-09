<?php


// Begin Shortcodes

global $pix_theme_pri_color, $gmap_count;

class Pixel8esShortcodes {

	function __construct() {
	  add_action( 'init', array( $this, 'pix_add_shortcodes' ) );
	  add_action( 'the_content', array( $this, 'pixel8es_fix_shortcodes' ) );
	}

	/*--------------------------------------------------------------------------------------
	  *
	  * pixel8es_fix_shortcodes
	  *
	  * @author Shahul Hameed
	  * @since 1.0
	  * @todo only remove p and br for our own shortcode defined in $block array()
	  *-------------------------------------------------------------------------------------*/



	function pixel8es_fix_shortcodes($content) {
		// array of custom shortcodes requiring the fix
		$block = join("|",array('h1','h2','h3','h4','h5','h6','title', 'blog-link', 'breadcrumb', 'row', 'column', 'section', 'emphasis', 'callout', 'icon', 'contact','list','li','social_icons','social_icon','spacer', 'button','staffs','blog_post', 'tweets', 'skills', 'portfolio', 'pricing_tables', 'clients', 'client', 'ul', 'li', 'line', 'social', 'video_popup', 'googlemap', 'animation'));
	
		// opening tag
		$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		// closing tag
		$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
		return $rep;
	}

	/*--------------------------------------------------------------------------------------
	  *
	  * pix_add_shortcodes
	  *
	  * @author Shahul Hameed
	  * @since 1.0
	  * @todo Adding Shortcodes
	  *-------------------------------------------------------------------------------------*/
	function pix_add_shortcodes() {

	  $pix_shortcodes = array(	
		'blog',
		'button',
		'callout_box',
		'clients',
		'contact',
		'counter',
		'dropcaps',
		'emphasis',
		'googlemap',
		'highlight',
		'icon',
		'icon_box',
		'list',
		'li',
		'line',
		'tooltip',
		'pie_chart',
		'process',
		'pricing_tables',
		'portfolio',
		'quote',
		'testimonial',
		'title',
		'tweets',
		'social',
		'spacer',
		'staffs',
		'video_popup'
	  );

	  foreach ( $pix_shortcodes as $shortcode ) {

		$function = 'pix_' . str_replace( '-', '_', $shortcode );
		add_shortcode( $shortcode, array( $this, $function ) );
		
	  }

	}

	/* =============================================================================
		Blockquote Shortcodes
	========================================================================== */
	function pix_quote($atts, $content = null){
		extract(shortcode_atts(array(
			'align' => 'left',
			'author_name' => ''
		),$atts));
		$output = '<blockquote class="pull-'. $align .'"><p>'. do_shortcode($content);
		if(!empty($author_name)) {
		$output .='<small class="">'. esc_html($author_name) .'</small>';
		}
		$output .='</p></blockquote><div class="clear"></div>';
		return $output;
	}

	/* =============================================================================
		Highlight Shortcodes
	========================================================================== */
	function pix_highlight($atts, $content = null, $code){   
	   $output = '<span class="highlight">'.trim($content).'</span>';	
	   return $output;
	}

	/* =============================================================================
		Tool-tip Shortcodes
	========================================================================== */
	//Tool-tip
	function pix_tooltip($atts, $content = null){	
		extract(shortcode_atts(array(
			'link'  => '#',
			'tooltip_title' => 'title',
			'tooltip_content' => 'content goes here',
			'align' => ''
		), $atts));
		
		$output  = '<a href="'. esc_url($link) .'" rel="tooltip" data-placement="'. esc_attr($align) .'" class="tool-tip" data-original-title="'. esc_attr($tooltip_content) .'">'. esc_html($tooltip_title) .'</a>';
		return $output;
	}

	/* =============================================================================
		Youtube and Vimeo Popup Shortcodes
	========================================================================== */
	function pix_video_popup($atts, $content = null){	
		extract(shortcode_atts(array(
			'url'  => '#',
			'title_format' => '',
			'text' => '',
			'icon_name' => '',
			'align' => ''
		), $atts));

		if($title_format=="icon" && !empty($icon_name)){
			$text_title = '<i class="'. $icon_name .'"></i>';
		}else{
			$text_title = $text;
		}
		
		$output  = '<div class="align-'. esc_attr($align) .' popup-'. esc_attr($title_format) .'"><a href="'. esc_url($url) .'" class="video-icon popup-video">'. $text_title .'</a></div>';
		return $output;
	}

	/* =============================================================================
		Dropcaps Shortcodes
	========================================================================== */
	function pix_dropcaps($atts, $content = null, $code){
		extract(shortcode_atts(array(
		"style" => 'default',
		), $atts)); 
		return '<span class="dropcaps '. esc_attr($style) . '">' . esc_html($content) . '</span>';
	}

	/* =============================================================================
		Emphasis Shortcodes
	========================================================================== */
	function pix_emphasis($atts, $content = null, $code){
		return '<div class="emphasis">'. do_shortcode($content) .'</div>';
	}


	/* =============================================================================
		Spacer Shortcodes
	========================================================================== */

	function pix_spacer($atts, $content = null){	
		extract(shortcode_atts(array(
			'height'  => '30px'
		), $atts));
		
		$output  = '<div class="spacer" style="height: '. $height .'"></div>';
		return $output;
	}

	function pix_animation($atts, $content= null){
	extract(shortcode_atts(array(
		'transition' => '',
		'duration' => '',
		'delay' => ''
		), $atts));

	$slideTransition = "";
	$slideDuration = "";
	$slideDelay = "";


	$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

	$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

	$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';


		$output = '<div class="pix-animate-cre"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>'. do_shortcode(trim($content)) .'</div>';

		return $output;
	}

	/* =============================================================================
		 Social Shortcodes
	   ========================================================================== */

	function pix_social($atts, $content = null){	
		extract(shortcode_atts(array(
			'style' => '',
			'facebook'  => '',
			'twitter' => '',
			'gplus' => '',
			'linkedin' => '',
			'dribble' => '',
			'flickr' => '',
			'pinterest' => '',
			'tumblr' => '',
			'instagrem' => '',		
			'rss' => '',
			'github' => ''
		), $atts));

		$facebook = isset($facebook) ? $facebook : '';
		$twitter = isset($twitter) ? $twitter : '';
		$gplus = isset($gplus) ? $gplus : '';
		$linkedin = isset($linkedin) ? $linkedin : '';
		$dribble = isset($dribble) ? $dribble : '';
		$flickr = isset($flickr) ? $flickr : '';
		$pinterest = isset($pinterest) ? $pinterest : '';
		$tumblr  = isset($tumblr) ? $tumblr : '';
		$instagrem  = isset($instagrem) ? $instagrem : '';
		$rss  = isset($rss) ? $rss : '';
		$github  = isset($github) ? $github : '';

		$social_icons = '<div class="full-width-icon '. esc_attr($style) .'"><div class="social-icons">';

		if( !empty($facebook)) {
			$social_icons .= '<a href="'.esc_attr(esc_url($facebook)).'" target="_blank" title="Facebook" class="facebook"><i class="pixicon-facebook"></i></a>';
		}

		if( !empty($twitter)) {
			$social_icons .= '<a href="'.esc_attr(esc_url($twitter)).'" target="_blank" title="Twitter" class="twitter"><i class="pixicon-twitter"></i></a>';
		}

		if( !empty($gplus)) {
			$social_icons .= '<a href="'. esc_attr(esc_url($gplus)).'" target="_blank" title="Gplus" class="google-plus"><i class="pixicon-fontawesome-webfont-145"></i></a>';
		}

		if( !empty($linkedin)) {
			$social_icons .= '<a href="'. esc_attr(esc_url($linkedin)).'" target="_blank" title="linkedin" class="linkedin"><i class="pixicon-linkedin"></i></a>';
		}

		if( !empty($dribble)) {
			$social_icons .= '<a href="'. esc_attr(esc_url($dribble)).'" target="_blank" title="Dribble" class="dribbble"><i class="pixicon-dribbble"></i></a>';
		}

		if( !empty($flickr)) {
			$social_icons .= '<a href="'. esc_attr(esc_url($flickr)).'" target="_blank" title="Flickr" class="flickr"><i class="pixicon-flickr"></i></a>';
		}

		if( !empty($pinterest)) {
			$social_icons .= '<a href="'. esc_attr(esc_url($pinterest)).'" target="_blank" title="Pinterest" class="pinterest"><i class="pixicon-pinterest"></i></a>';
		}

		if( !empty($tumblr )) {
			$social_icons .= '<a href="'. esc_attr(esc_url($tumblr)).'" target="_blank" title="Tumblr" class="tumblr"><i class="pixicon-tumblr"></i></a>';
		}

		if( !empty($instagrem )) {
			$social_icons .= '<a href="'. esc_attr(esc_url($instagrem)).'" target="_blank" title="instagrem" class="instagrem"><i class="pixicon-instagrem"></i></a>';
		}

		if( !empty($rss )) {
			$social_icons .= '<a href="'. esc_attr(esc_url($rss)).'" target="_blank" title="RSS" class="rss"><i class="pixicon-rss"></i></a>';
		}

		if( !empty($github )) {
			$social_icons .= '<a href="'. esc_attr(esc_url($github)).'" target="_blank" title="github" class="github"><i class="pixicon-github"></i></a>';
		}

		$social_icons .= '</div></div>';

		return $social_icons;
	}


	/* =============================================================================
		 Contact Shortcodes
	   ========================================================================== */

	function pix_contact($atts, $content = null, $code){
		extract(shortcode_atts(array(
			'mailto' => '',
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
		
		global $smof_data;

		$contact_button_text = isset($smof_data['contact_button_text']) ? $smof_data['contact_button_text'] : __('SEND MAIL','pixel8es');
		
		if(empty($contact_button_text)){
			$contact_button_text = __('Send Mail','pixel8es');
		}

		
		$output = '';
		if(isset($_POST['contactname'])){
			$output .= $_POST['contactname'];
		}

		$cname = isset($_POST['contactname']) ? $_POST['contactname'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
		$message = isset($_POST['message'])? $_POST['message'] : '';

		$nonce = wp_create_nonce("electrify_ajax_form_nonce");
		$actionUrl = admin_url('admin-ajax.php?action=electrify_submit_form&nonce='. $nonce);

		if (isset($_POST['submit'])){
			$actionUrl = admin_url('admin-ajax.php?action=electrify_submit_form&contactname='. $cname .'&email='. $email .'&subject='.$subject .'&message='. $message .'&nonce='. $nonce);
		}

		wp_localize_script( 'pixel8es-js', 'electrifyAjax', 
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ), 
				'templateurl' => get_template_directory_uri(), 
				'email' => $mailto,
				'nonce' => $nonce
			)
		);
				
	   $output .= '<div class="contactForm'. esc_attr($animate_class) .'"'.$slideTransition.''.$slideDuration.''.$slideDelay.'>	           
					
				   <form method="post" action="'.$actionUrl.'" id="contactform" class="contactform">
				   <div class="response"></div>
				   <div class="row">
					   <p class="col-md-4">
						   <label for="contactname">'. __('Name:','pixel8es').' <span class="color">*</span></label>
						   <input type="text" name="contactname" id="contactname" value="" class="contactname required textfield" role="input" aria-required="true">
					   </p>
		   
					   <p class="col-md-4">
						   <label for="email">'.__('Email:','pixel8es').' <span class="color">*</span></label>
						   <input type="text" name="email" id="email" value="" class="required email textfield" role="input" aria-required="true">
					   </p>
		   
					   <p class="col-md-4">
						   <label for="subject">'.__('Subject:','pixel8es').'  <span class="color">*</span></label>
						   <input type="text" name="subject" id="subject" value="" class="required textfield subject" role="input" aria-required="true">
					   </p>
					</div>
					   <p class="textarea clear">
						   <label for="message">'.__('Message:','pixel8es').'  <span class="color">*</span></label>
						   <textarea rows="8" name="message" id="message" class="required textarea message" role="textbox" aria-required="true"></textarea>
					   </p>      
					   
					   <button type="submit" name="submit" id="submitButton" title="Click here to submit your message!" class="btn btn-solid color">'.esc_html($contact_button_text).'</button>
						
				   </form>
		   </div>';
			
		
		return $output;
	}

	/* =============================================================================
	 Line Shortcodes
	 ========================================================================== */
	 function pix_line($atts, $content = null){	
	 	extract(shortcode_atts(array(
	 		'width'  => '75px',
		'align' => 'left', //left, right, center
		'thickness' => '1px',
		'color'	=> '',
		'line_style' => 'line-style1'
		), $atts));

	 	$line_border = $style = '';

	 	if($width != '50px' || $thickness != '1px' || !empty($color)){

	 		$style .= 'style="';

	 		$style .= ($width != '75px') ? 'width:'.$width.';' : '';

	 		$style .= ($thickness != '1px') ? 'height:'.$thickness.';' : '';

	 		$style .= (!empty($color)) ? 'background:'.$color.';' : '';

	 		$style .= '"';

	 	}

		//Title Backround Line
	 	if($line_style =='line-style1'){
	 		$line_border .= '<div class="line '. $align .'" '. $style .'></div>';

	 	}elseif ($line_style =='line-style2' ) {
	 		$line_border .= '<div class="'. $align .'" ><span class="line line-2"></span></div>';

	 	}elseif ($line_style =='line-style3' ) {
	 		$line_border .= '<div class="'. $align .'"><span class="line line-2 line-3"></span></div>';

	 	}elseif ($line_style =='line-style4' ) {
	 		$line_border .= '<div class="'. $align .'"><span class="line line-2 line-4"></span></div>';

	 	}elseif ($line_style =='line-style5' ) {
	 		$line_border .= '<div class="'. $align .'"><div class="line round-sep clearfix">
	 		<span class="round"></span>
	 		<span class="round"></span>
	 		<span class="round"></span>
	 		<span class="round"></span>
	 	</div></div>';  

	 }

	 return $line_border;
	}

	/* =============================================================================
		 Button Shortcodes
	   ========================================================================== */

	function pix_button($atts, $content = null){	
		extract(shortcode_atts(array(
			'button_link'  => '',
			'title' => '',
			'button_style' => '',
			'button_size' => '',
			'button_text' => '',
			'button_color' => '',
			'button_align' => '',
			'button_icon' => '',
			'button_icon_align' => '',
			'custom_size' => 'no',
			'font_size' => '',
			'padding_custom' => '',
			'target' => '_self',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => ''
		), $atts));
		
		$btn_att = vc_build_link($button_link);
		$btn_att['href'] = (isset($btn_att['url'])) ? $btn_att['url'] : '';
		$btn_att['title'] = (isset($btn_att['title'])) ? $btn_att['title'] : '';
		$btn_att['target'] = (isset($btn_att['target'])) ? $btn_att['target'] : '';

		$animate_class = $slideTransition = $slideDuration = $slideDelay = $icon_btn = $font = $font_class = $button_icon_front = $button_icon_back = $button_icon_class = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

			$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

			$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';

		}

		if($button_icon != "" && $button_icon_align == 'front'){
			$button_icon_front = '<span class="btn-icon button-front '. $button_icon .'"></span> ';
			$button_icon_class = 'btn-front';
		}elseif($button_icon != "" && $button_icon_align == 'back'){
			$button_icon_back = ' <span class="btn-icon '. $button_icon .'"></span>';
			$button_icon_class = 'btn-front';
		}

		if($custom_size == "yes"){
			$font_class = " btn-custom";
			$font = 'style=';
			$font .= "font-size:". $font_size .";";
			$font .= "padding: ". $padding_custom .";'";
		}
		
		$output  = '<div class="pix_button '. $button_align .'"><a href="'. $btn_att['href'] .'" title="'.$btn_att['title'] .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').' class="clear btn btn-'. esc_attr($button_style) .' '. $button_icon_class .' btn-'. esc_attr($button_size) .' '. esc_attr($button_color).''. esc_attr($animate_class) .''. $font_class .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .''. $font .'>'. $button_icon_front .''. esc_html($button_text) .''. $button_icon_back .'</a></div>';
		return $output;
	}

	/* =============================================================================
		 Call Out Box Shortcodes
	   ========================================================================== */

	function pix_callout_box($atts, $content = null){
		extract(shortcode_atts(array(
			'el_class' => '',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'callout_style' => '',
			'callout_align' => '',
			'title' => 'Section Title',
			'title_tag' => 'h2',
			'display_button' => 'yes',
			'button_text' => 'Read more',
			'button_link'  => '',
			'button_style' => '',
			'button_color' => '',
			'button_size' => 'medium',
			'button_icon' => '',
			'display_button2' => 'yes',
			'button_text2' => 'Read more',
			'button_link2'  => '',
			'button_style2' => '',
			'button_color2' => '',
			'button_size2' => 'medium',
			'button_icon2' => ''
		), $atts));

		$btn_att = vc_build_link($button_link);
		$btn_att['href'] = (isset($btn_att['url'])) ? $btn_att['url'] : '';
		$btn_att['title'] = (isset($btn_att['title'])) ? $btn_att['title'] : '';
		$btn_att['target'] = (isset($btn_att['target'])) ? $btn_att['target'] : '';

		$btn_att2 = vc_build_link($button_link2);
		$btn_att2['href'] = (isset($btn_att2['url'])) ? $btn_att2['url'] : '';
		$btn_att2['title'] = (isset($btn_att2['title'])) ? $btn_att2['title'] : '';
		$btn_att2['target'] = (isset($btn_att2['target'])) ? $btn_att2['target'] : '';

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

			$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

			$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';

		}

		$title_tag = !empty($title_tag) ? $title_tag : 'h2';

		$button_icon = !empty($button_icon) ? ' <span class="pix-icon '. $button_icon .'"></span>' : '';
		$button = "";
		if($display_button == 'yes'){
			$button = '<p class="sepCenter"><a href="'. $btn_att['href'] .'" title="'.$btn_att['title'] .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').' class="btn btn-'. esc_attr($button_style) .' btn-'. esc_attr($button_size) .' '. $button_color .'">'. esc_html($button_text) .''. $button_icon .'</a></p>';
		}

		$button_icon2 = !empty($button_icon2) ? ' <span class="pix-icon '. $button_icon2 .'"></span>' : '';
		$button2 = "";
		if($callout_align != "left" && $display_button2 == 'yes'){
			$button2 = '<p class="sepCenter"><a href="'.$btn_att2['href'] .'" title="'.$btn_att2['title'] .'" '. ((!empty($btn_att2['target'])) ? ' target="'. $btn_att2['target'] .'"' : '').' class="btn btn-'. esc_attr($button_style2) .' btn-'. esc_attr($button_size2) .' '. $button_color2 .'">'. esc_html($button_text2) .''. $button_icon2 .'</a></p>';
		}
		
		$output  = '<section class="callOut newSection '. $el_class .' '. $callout_style .' '. $callout_align .' '. esc_attr($animate_class) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>';
		$output .= '<div class="callout-content">';
		$output .= '<'. $title_tag .' class="title">'. $title .'</'. $title_tag .'>';
		$output .= wpb_js_remove_wpautop($content);
		$output .= '</div>';
		$output .= '<div class="buttons clearfix">'. $button .' '. $button2 .'</div>';
		$output .= '</section>';

		return $output;
	}

	/* =============================================================================
		 Icon Shortcodes
	   ========================================================================== */

	function pix_icon($atts, $content= null){
		extract(shortcode_atts(array(
			'animate' => 'No',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'align' => 'center',
			'icon_name' => '',
			'icon_style' => 'default',
			'icon_type' => 'default',
			'icon_color' => '',
			'icon_size' => '',
			'icon_bg_color' => '',
			'title' => '',
			'title_tag' => 'h2',
			'text_font' => '',
			'text_color' => '',
			'margin' => ''
		), $atts));

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

			$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

			$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';

		}

		$title_tag = !empty($title_tag) ? $title_tag : 'h2';

		$custom_text_style = '';
		if($text_font != '' || $text_color != '' || $margin != '' ){

			$custom_text_style .= ' style="';

			$custom_text_style .= ($text_font != '') ? 'font-size:'.$text_font.';' : '';

			$custom_text_style .= ($text_color != '') ? 'color:'.$text_color.';' : '';

			$custom_text_style .= ($margin != '') ? 'margin:'.$margin.';' : '';

			$custom_text_style .= '"';

		}

		$custom_icon_style = '';
		if($icon_size != '' || $icon_color != '' ){

			$custom_icon_style .= ' style="';

			$custom_icon_style .= ($icon_size != '') ? 'font-size:'.$icon_size.';' : '';

			$custom_icon_style .= ($icon_color != '') ? 'color:'.$icon_color.';' : '';

			$custom_icon_style .= ($icon_bg_color != '') ? 'background:'.$icon_bg_color.';' : '';

			$custom_icon_style .= '"';

		}

		$output = '<div class="pix-icons clearfix '. $align .'">';
		$output .= '<span class="icon '. esc_attr($icon_name) .' '. $icon_style.' '. $icon_type.'"'. $custom_icon_style .'></span>';

		if($title != '' && $title_tag != '' ){
			$output .= '<'. $title_tag .' class="title"'. $custom_text_style .'>'. $title .'</'. $title_tag .'>';
		}

		$output .= '</div>';
		
		return $output;
	}


	/* =============================================================================
		 Latest Tweets Shortcodes
	   ========================================================================== */

	function pix_tweets($atts, $content = null){
		extract(shortcode_atts(array(
			'twtusr'		 => 'envato',
			'tweet_align'		 => 'center',
			'twtcount'  		 => '3',
			'no_of_col'		 => '',
			'style'			 => '',
			'slider'		 => 'yes',
			'autoplay'		 => '4000',
			'slide_speed'		 => '500',
			'slide_arrow'		 => 'true',
			'arrow_type'		 => '',
			'slider_height'		 => '',
			'pagination' 		 => 'true',
			'stop_on_hover'		 => 'true',
			'mouse_drag'		 => 'true',
			'touch_drag'		 => 'true'
		), $atts));

$page_class = '';

		if($no_of_col == '1'){
			$col = ' col1';
		}elseif($no_of_col == '2'){
			$col = ' col2';
		}else{
			$col = ' col3';
		}

	if($pagination == 'false'){
		$page_class = ' no-pagi-carousel';
	}

		$slider_data = $class = $output = '';	
		if (!empty($twtusr)){

			if($slider == 'yes'){
				$class = ' owl-carousel '. $style .' '. $tweet_align .''. $page_class .' '. $arrow_type;
				$slider_data = ' data-items="'. $no_of_col .'" data-auto-height="'. $slider_height .'" data-pagination="'. $pagination .'" data-touch-drag="'. $touch_drag .'" data-mouse-drag="'. $mouse_drag .'" data-stop-on-hover="'. $stop_on_hover .'" data-navigation="'. $slide_arrow .'" data-slide-speed="'. $slide_speed .'" data-auto-play="'. $autoplay. '" data-items-custom="[[0,1],[768,1],[991, '. $no_of_col .'],[1199, '. $no_of_col .']]"';
			}else{
				$class = ' no-slider '. $tweet_align .'';
			}
			$output .= '<div class="tweets'. $class .''. $col .' '. $style .'"'. $slider_data .'>';

			$tweets = getTweets(20, $twtusr);
			$i = 1;
			foreach($tweets as $tweet){
			   if(!empty($tweet['text']) && $tweet['text'] != "T" && $tweet['text'] != "M"){
					
					$output .= '<div class="twitter"><div class="tweet"><span class="tweet-icon pixicon-twitter"></span><div class="tweet-content">';
					$output .= make_twitter(link_it($tweet['text']));
					$output .= '<span class="tweetDate"> - ' . get_elapsedtime(strtotime($tweet['created_at'])) .'</span>';
					$output .= '</div></div></div>';
								
					if($i == $twtcount){ break; }
								
					$i++;
				}else{
					$output .= '<div>' . $tweets['error'] .'</div>';
				}
			}

		   /* $output .= '<div class="twitter"><div class="tweet"><span class="tweet-icon pixicon-twitter"></span><div class="tweet-content">New update available #<a href="http://search.twitter.com/search?q=%23themeforest">themeforest</a> item \'Drive - Multi-Purpose WordPress Conveniently orchestrate market-driven sources via team building technology. Phosfluorescently impact client-centric channels whereas equity invested services. Enthusiastically scale backend technology vis-a-vis resource-leveling information. Enthusiastically streamline covalent applications via one-to-one benefits. Interactively e-enable accurate methods of empowerment via web-enabled infrastructures Theme\' <a href="http://t.co/ydrsrC665Y">http://t.co/ydrsrC665Y</a><span class="tweetDate"> - Feb 07</span></div></div></div>';
			$output .= '<div class="twitter"><div class="tweet"><span class="tweet-icon pixicon-twitter"></span><div class="tweet-content">New update available for #<a href="http://search.twitter.com/search?q=%23themeforest">themeforest</a> item \'Drive - Multi-Purpose Wordpress Theme\' <a href="http://t.co/ydrsrC665Y">http://t.co/ydrsrC665Y</a><span class="tweetDate"> - Dec 23</span></div></div></div>';
			$output .= '<div class="twitter"><div class="tweet"><span class="tweet-icon pixicon-twitter"></span><div class="tweet-content">Check out this great #<a href="http://search.twitter.com/search?q=%23themeforest">themeforest</a> item \'Drive - Multi-Purpose Wordpress Theme\' <a href="http://t.co/ydrsrC665Y">http://t.co/ydrsrC665Y</a><span class="tweetDate"> - Dec 18</span></div></div></div>';
			$output .= '<div class="twitter"><div class="tweet"><span class="tweet-icon pixicon-twitter"></span><div class="tweet-content">Check out this great #<a href="http://search.twitter.com/search?q=%23themeforest">themeforest</a> item \'Drive - Multi-Purpose Wordpress Theme\' <a href="http://t.co/ydrsrC665Y">http://t.co/ydrsrC665Y</a><span class="tweetDate"> - Dec 18</span></div></div></div>';*/
			$output .= '</div>';

		}else{
			$output .= '<div>Please enter twitter username</div>';
		}

		return $output;
	}

	/* =============================================================================
	 Icon Box Shortcodes
   ========================================================================== */

function pix_icon_box($atts, $content= null){
	extract(shortcode_atts(array(
		'el_class' => '',
		'animate' => 'No',
		'transition' => '',
		'duration' => '',
		'delay' => '',
		'icon_image_con' => '',
		'icon_image' => '',
		'icon_image_style' => 'rectangle',
		'icon_type' => 'icon',
		'icon_img' => '',
		'align' => 'center',
		'icon_align' => '',
		'icon_below' => '', 
		'icon_style' => 'default',
		'icon_color' => 'color',
		'icon_name' => '',
		'icon_hover' => '',
		'title' => 'Section Title',
		'title_tag' => 'h2',
		'custom_size' => '',
		'display_button' => 'yes',
		'button_text' => 'Read more',
		'button_link'  => '',
		'button_style' => '',
		'button_size' => 'medium',
		'button_color' => '',
		'button_icon' => '',
		'line' => '',
		'line_style' => 'line-style1'
	), $atts));

	$line_border = '';

	//Title Backround Line
	 	if($line_style =='line-style1'){
	 		$line_border .= '<div class="line '. $align .'"></div>';

	 	}elseif ($line_style =='line-style2' ) {
	 		$line_border .= '<div class="'. $align .'" ><span class="line line-2"></span></div>';

	 	}elseif ($line_style =='line-style3' ) {
	 		$line_border .= '<div class="'. $align .'"><span class="line line-2 line-3"></span></div>';

	 	}elseif ($line_style =='line-style4' ) {
	 		$line_border .= '<div class="'. $align .'"><span class="line line-2 line-4"></span></div>';

	 	}elseif ($line_style =='line-style5' ) {
	 		$line_border .= '<div class="'. $align .'"><div class="line round-sep clearfix">
	 		<span class="round"></span>
	 		<span class="round"></span>
	 		<span class="round"></span>
	 		<span class="round"></span>
	 	</div></div>';  

	 }

	$btn_att = vc_build_link($button_link);
	$btn_att['href'] = (isset($btn_att['url'])) ? $btn_att['url'] : '';
	$btn_att['title'] = (isset($btn_att['title'])) ? $btn_att['title'] : '';
	$btn_att['target'] = (isset($btn_att['target'])) ? $btn_att['target'] : '';


	$animate_class = $slideTransition = $slideDuration = $slideDelay = $icon_image_class = $icon_image_link = $img="";
	if($icon_align == "yes"){
		$icon_align = "content-collapse";
	}else{
		$icon_align = '';
	}

	if($icon_below == "yes"){
		$icon_below = "icon-below-content";
	}else{
		$icon_below = '';
	}

	if($animate == "yes"){

		$animate_class = ' pix-animate-cre';

		$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

		$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

		$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';

	}

	$icon_div = "";
	if($icon_color == 'color'){
		$icon_div = '<span class="hover-gradient"></span>';
	}

	$hover_icon = '';
	if($icon_hover == 'yes'){
		$hover_icon = ' icon_hover';
	}

	$title_tag = !empty($title_tag) ? $title_tag : 'h2';

	$tagline = !empty($tagline) ? '<p class="tagline">'. $tagline .'</p>' : '';


	if($icon_image_style == "rectangle"){
		$width = 600;
		$height = 400;
	}elseif($icon_image_style == "rounded"){
		$width = 250;
		$height = 250;
	}

	$icon_image_url = wp_get_attachment_image_src( $icon_image, 'full');
	if(!empty($icon_image_url)){
		$img = aq_resize($icon_image_url[0], $width, $height, true, true); 
	}
	
	if(!$img){
	 	$img = $icon_image_url[0]; 
	}

	$icon_image_class = !empty($icon_image) ? '<img class="icon-img-class" src="'. $img .'" alt="">' : '';

	if($display_button == 'yes' && $button_link != ''){
		$icon_image_link = '<div class="icon-center"><a href="'. $btn_att['href'] .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').'><i class="pixicon-eleganticons-3"></i></a></div>';
	}

	$button = "";
	if($display_button == 'yes'){
		$button = '<p class="sepCenter"><a href="'. $btn_att['href'] .'" title="'.$btn_att['title'] .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').' class="btn btn-'. esc_attr($button_style) .' btn-'. esc_attr($button_size) .' '. $button_color .'">'. esc_html($button_text) .' <span class="btn-icon pix-icon '. $button_icon .'"></span></a></p>';
	}

	$output = '<div class="pix_icon_box '. $hover_icon .''. $el_class .' '. $align .' '. esc_attr($animate_class) .'"'. $slideTransition .' '. $slideDuration .' '. $slideDelay .'>';
	if($icon_image_con != 'yes'){
		$output .= '<div class="icon100 '. $icon_style.' '. $icon_color.'">'. $icon_div;
	}elseif($icon_image_class != ''){
		$output .= '<div class="image '. $icon_image_style .'">'. $icon_image_class .''. $icon_image_link;
	}
	
	if($icon_image_con != 'yes' && $icon_type == 'icon'){
		$output .= '<span class="icon '. esc_attr($icon_name) .'"></span>';
	}elseif ($icon_image_con != 'yes' && $icon_type == 'image' && !empty($icon_img)){
		$icon_img = wp_get_attachment_image_src( $icon_img, 'full');
		$output .= '<span class="icon"><img src="'. $icon_img[0] .'" alt=""></span>';
	}

	$output .= '</div>';
	$output .= '<div class="icon-box-content '. $icon_align .' '. $icon_below .'">';
	if(!empty($custom_size)){
		$output .= '<'. $title_tag .' class="title" style="font-size:'. $custom_size .'">'. $title .'</'. $title_tag .'>';
		if($line == 'yes'){
			$output .= $line_border;
		}
	}else{
		$output .= '<'. $title_tag .' class="title">'. $title .'</'. $title_tag .'>';		
		if($line == 'yes'){
			$output .= $line_border;
		}
	}
	$output .= '<p class="content">'.wpb_js_remove_wpautop($content).'</p>';
	$output .= $button;
	$output .= '</div></div>';
	
	return $output;
}


	/* =============================================================================
		 Process Shortcodes
	   ========================================================================== */

	function pix_process($atts, $content = null){
		extract(shortcode_atts(array(
			'el_class' => '',
			'type' => 'default',
			'style' => 'default',
			'text' => '',
			'circle_text' => '00',
			'icon_name' => '',
			'title' => 'title',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'process_style' => '',
			'process_content' => 'No'
		), $atts));

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = "";

		$process_arrow = $arrow_left = $arrow_right = '';

		if($process_style == 'nav-style' || $process_style == 'nav-style straight'){
			$process_arrow = ' <div class="'. $process_style .'"><p class="center-arrow"></p></div>';
		}elseif($process_style == 'nav-style straight round'){
			$process_arrow = ' <div class="'. $process_style .'"><p class="center-arrow"></p></div>';
			$arrow_left = '<span class="round-left"></span>';
			$arrow_right = '<span class="round-right"></span>';
		}

		if($text == "icon"){
			$inner_text = '<span class="process-style '. $icon_name .'"></span>';
			$inner_style = $style;
		}elseif($text == "text"){
			$inner_text = '<span class="process-style inner-text">'. $title .'</span>';
			$inner_style = $style;
		}else{
			$inner_text = '<span class="process-style">'. $circle_text .'</span>';
			$inner_style = $style;
		}

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

			$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

			$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';
		}
		
		$output = '<div class="process '. $el_class .' '. esc_attr($animate_class) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'><div class="process_circle '. $inner_style .' '. $type .'"><div class="text hi-icon">'. $arrow_left.' '. $inner_text .' '. $arrow_right.'</div>'. $process_arrow .'</div>';
		if($text != "text"){
			$output .= '<p class="title">'. esc_html($title) .'</p>';
		}
		if($process_content == 'yes'){
			$output .= '<p class="content">'.wpb_js_remove_wpautop($content).'</p>';
		}
		$output .= '</div>';
				
		return $output;
		
	}


	/* =============================================================================
		 Pie Chart Shortcodes
	   ========================================================================== */

	function pix_pie_chart($atts, $content= null){
		global $pix_theme_pri_color;
		extract(shortcode_atts(array(
			'el_class' => '',
			'percentage' => '',
			'custom_color'=> 'default',
			'barcolor' => '',
			'animate_duration' => 2000,
			'size' => '150',
			'line_width' => '6',
			'style' => '',
			'linecap' => 'butt',
			'text' =>'',
			'text_position' => ''
		), $atts));

		$background_style = $border_style = $inside_style = $inside = $outside = '';
		if($custom_color == 'default'){
			$barcolor = $pix_theme_pri_color;
		}else{
			$border_style = 'style="border-color: '. $barcolor .';"';
			$background_style = 'style="background-color: '. $barcolor .';"';
		}

		if($text_position == 'inside'){
			$inside .= $text;
			$inside_style = ' inside-style';
		}else{
			$outside .= '<p class="outside-text">'. $text .'</p>';
		}

		$output = '<div class="text-con '. $el_class .'"><div class="pix-chart '. $style .'" data-percent="'. $percentage .'" data-bar-color="'. $barcolor .'" data-line-width="'. $line_width .'" data-track-color="false" data-scale-color="false" data-animate="'. $animate_duration .'" data-size="'. $size .'" data-line-cap="'. $linecap .'">';
		$output .= '<span class="border-top" '. $border_style .'></span>';
		if($style == "style3"){
			$output .= '<span class="border-bg" '. $background_style .'></span>';
		}else{
			$output .= '<span class="border-bg" '. $border_style .'></span>';		
		}

		$output .= '<p class="percent'. $inside_style .'"><span class="percent-text">'. $percentage .'</span>'. $inside .'</p></div>
		'. $outside .'</div>'; 
			
		
		
		return $output;
	}


	/* =============================================================================
	 Heading Shortcodes
	 ========================================================================== */

	 function pix_title($atts, $content = null, $code){
	 	extract(shortcode_atts(array(
	 		'el_class' => '',
	 		'title_tag' => 'h2',
	 		'style' => '',
	 		'title' => '',
	 		'sub_title'=> '',
	 		'sub_title_style' => '',
	 		'sub_title_text' =>'',
	 		'font_size' => '',
	 		'custom_font_size' => '',
	 		'uppercase' => 'No',
	 		'align' => 'left',
	 		'line' => 'yes',
	        'line_style' => 'line-style1', // line_style1 | line_style2 | line_style3 | line_style4 | line_style5
	        'line_positions' => '', // below-sub-title |  below-title
	        'title_margin' => '',
	        'animate' => '',
	        'transition' => '',
	        'duration' => '',
	        'delay' => '',
	        'sub_title_margin' => '', 
        ), $atts));

	 	$output = $animate_class = $slideTransition = $slideDuration = $slideDelay = $sub_text = $sub_class = "";

	 	if($animate == "yes"){

	 		$animate_class = ' pix-animate-cre';

	 		$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

	 		$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

	 		$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';

	 	}

	//Uppercase Yes or No
	 	$class = ($uppercase == 'yes') ? ' uppercase' : '';


	//Checking Title Style
	 	$css_style = 'style="';
	 	$css_style .= !empty($title_margin) ? 'margin: '. $title_margin .'; ' : '';
	 	$css_style .= !empty($custom_font_size) ? 'font-size: '. $custom_font_size .'; ' : '';
	 	$css_style .= '"';

	 	if($sub_title == "yes" && $sub_title_text != ''){
	 		$sub_title_margin = (!empty($sub_title_margin)) ? 
	 							'style="margin-bottom:'. $sub_title_margin.'"' : 
	 							'';

	 		$sub_text = '<p class="sub-title '. $sub_title_style .'" '. $sub_title_margin .'>'. $sub_title_text .'</p>';
	 		$sub_class = ' sub-title-con';
	 	}

	 	/* Font Size */
	 	if($font_size == "size-md"){
	 		$class .= ' size-md';
	 	}elseif ($font_size == 'size-lg') {
	 		$class .= ' size-lg';
	 	}else{
	 		$class .= ' size-sm';
	 	}


	//Check Alignment
	 	if ($align == 'right'){
	 		$class .= ' alignRight';
	 	}elseif ($align == 'center') {
	 		$class .= ' alignCenter';
	 	}
	 	$line_border ='';

	//Title Backround Line
	 	if($line == 'yes' && $line_style == 'line-style1'){
	 		$line_border = ' <span class="line"></span>';

	 	}elseif ($line == 'yes' && $line_style == 'line-style2' ) {
	 		$line_border = ' <span class="line line-2"></span>';

	 	}elseif ($line == 'yes' && $line_style == 'line-style3' ) {
	 		$line_border = ' <span class="line line-2 line-3"></span>';

	 	}elseif ($line == 'yes' && $line_style == 'line-style4' ) {
	 		$line_border = '  <span class="line line-2 line-4"></span>';

	 	}elseif ($line == 'yes' && $line_style == 'line-style5' ) {
	 		$line_border = '<div class="line round-sep clearfix">
	 		<span class="round"></span>
	 		<span class="round"></span>
	 		<span class="round"></span>
	 		<span class="round"></span>
	 	</div> ';  

	 }	 

	 if(($line_positions == 'below-sub-title' || $line_positions == 'below-title') && ($style != 'box-title' && $style != 'box-small' && $style != 'title-sep')){

	 	$output .='<div class="'. $class .' clearfix'. (($line_positions == 'below-sub-title') ? ' below-sub-title' : '') .'">';
	 }   

	 if($style == 'box-title' || $style == 'box-small' || $style == 'title-sep'){
	 	$output .= '<div class="'. $class .' clearfix '. (($style == 'title-sep') ? 'title-sep-border clearfix' : '') .'">';
	 }

	 $output  .= '<'. $title_tag .' class="main-title title'. $sub_class .' '. $el_class .''. $style .''.$class.' '.$line_style.''. esc_attr($animate_class) .'"'. $slideTransition .' '. $slideDuration .' '. $slideDelay .' '. $css_style .'>';

	 if($style == 'box-title' || $style == 'box-small' || $style == 'title-sep'){
	 	$output .= "<span>";
	 }
	 $output .= $title;
	 if($style == 'box-title' || $style == 'box-small' || $style == 'title-sep'){
	 	$output .= "</span>";
	 }
	 if($line_positions == 'below-title'){
	 	$output .= $line_border;
	 }
	 $output .= '</'. $title_tag .'>';
	 $output .= $sub_text;
	 if($style == 'box-title' || $style == 'box-small' || $style == 'title-sep'){
	 	$output .= '</div>';
	 }
	 if($style == "bg_text"){
	 	$sub_text = '';
	 }
	 if($line_positions == 'below-sub-title'){
	 	$output .= $line_border;
	 }
	 if(($line_positions == 'below-sub-title' || $line_positions == 'below-title') && ($style != 'box-title' && $style != 'box-small' && $style != 'title-sep')){

	 	$output .='</div>';
	 } 

	 return $output;
	}


	/* =============================================================================
		 Blog Shortcodes
	   ========================================================================== */
	function pix_blog($atts, $content = null){
		extract(shortcode_atts(array(
			'no_of_items' 	=> 4,
			'insert_type'		 => 'posts',
			'blog_post_id' => '',
			'blog_post_category' => '',
			'exclude_blog_post' => '',
			'order_by'		=> 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand'
			'order' 		=> 'asc', //desc, asc
			'columns' 		=> 'col3', //col2, col3, col4
			'title_tag'		=> 'h3',
			'display_date'	=> 'yes',
			'style'			=> 'style1',
			'display_comments' => 'yes',
			'blog_desc'	=> 'yes',
			'slider'		=> 'no',
			'autoplay' 		=> '4000',
			'slide_speed' 	=> '500',
			'slide_arrow' 	=> 'true',
			'arrow_type' 	=> '',
			'slider_height'	=> '',	
			'pagination' 	=> 'true',
			'stop_on_hover' => 'true',
			'mouse_drag' 	=> 'true',
			'touch_drag' 	=> 'true'
		), $atts));

		$page_class = $cats = $category_name = '';

		if(!empty($exclude_blog_post)){
			$exclude_blog_post= explode(',', $exclude_blog_post);
		}
		else{
			$exclude_blog_post = '';
		}


		if(!empty($blog_post_category) && $insert_type == 'category'){
			$category_name = $blog_post_category;

		}

		else if(!empty($blog_post_id) && $insert_type == 'id'){
			$blog_post_id = explode(',', $blog_post_id);
		}


		else if($insert_type != 'id' && $insert_type != 'category'){

			$categories= get_the_category();
			$cats= array();

			foreach($categories as $category){	
				$cats[] = $category->term_id;
			}
		}
		

		$id = get_the_ID();

		$post_not_in = array_merge((array)$id, (array)$exclude_blog_post);
		
		if($blog_desc == 'no'){
			$blog_desc = 'desc-none';
		}


		if(($blog_post_id != "" && $insert_type == 'id') || ($insert_type == 'posts')){


			$args = array(				
				'order' => $order,
				'orderby' => $order_by,
				'posts_per_page' => ( !empty($no_of_items) && is_numeric($no_of_items)) ? $no_of_items : 6,
				'post__in' => $blog_post_id,
				'post__not_in' => $exclude_blog_post
			);
		}
		else{
			$args = array(
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty($no_of_items) && is_numeric($no_of_items))   ? $no_of_items : 6,
				'post__not_in' => $post_not_in,
				'category__in' => $cats,
				'category_name' => $category_name
			);
		}


		

		if($style == "style1"){
			if($columns == 'col3'){
				$shorten_length = 160;
				$class = 'vc_col-sm-4';
				$width = '378';
				$height = '259';
				$slide_items = 3;
			}else{
				$class = 'vc_col-sm-3';
				$shorten_length = 160;
				$width = '378';
				$height = '259';
				$slide_items = 4;
			}        
		}else{
			if($columns == 'col3'){
				$shorten_length = 160;
				$class = 'vc_col-sm-4';
				$width = '100';
				$height = '100';
				$slide_items = 3;
			}else{
				$class = 'vc_col-sm-3';
				$shorten_length = 90;
				$width = '100';
				$height = '100';
				$slide_items = 4;
			}
		}

	if($pagination == 'false'){
		$page_class = ' no-pagi-carousel';
	}


		//VC_COLUMNS
		if($slider == 'yes'){
			$data = 'data-items="'. $slide_items .'" data-auto-height="'. $slider_height .'" data-pagination="'. $pagination .'" data-touch-drag="'. $touch_drag .'" data-mouse-drag="'. $mouse_drag .'" data-stop-on-hover="'. $stop_on_hover .'" data-navigation="'. $slide_arrow .'" data-slide-speed="'. $slide_speed .'" data-items-custom="[[0,1],[768,2],[991, 3],[1199, '. $slide_items .']]"';
			$auto = 'data-auto-play="'. $autoplay.'"';
			$output = '<div class="pix-recent-blog-posts owl-carousel '.$columns.' '. $blog_desc .' '. $style .' '. $arrow_type .''. $page_class .'" '. $data .' '. $auto .'>';
		}else{
			$output = '<div class="wpb_row vc_row-fluid pix-recent-blog-posts '. $columns .' '. $style .' '. $blog_desc .'">';
			$data = $auto = '';
		}

		$the_query = new WP_Query( $args );

		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

			$temp_title = get_the_title($the_query->post->ID); //title
			if($blog_desc == 'yes'){
				$temp_content = '<p>'. strip_tags(strip_shortcodes(ShortenText(get_the_content($the_query->post->ID),$shorten_length))).'</p>'; //content
			}else{
				$temp_content = '';
			}
			$temp_link = get_permalink($the_query->post->ID); //permalink
			$meta = '';
			if($display_date == 'yes'){
				$meta = '<span class="pix-blog-data">'. get_the_date ('F d, Y') .'</span>';
			}

			if ('open' == $the_query->post->comment_status){
				if($display_comments == 'yes' && $display_comments == 'yes'){
					$meta .= ' - ';
				}
				if($display_comments == 'yes'){
					$meta .= '<span class="pix-blog-comments">'. get_comments_popup_link(__('No Comments','pixel8es'), __('1 Comment','pixel8es'), __('% Comments','pixel8es'), __('comments-link','pixel8es'), '') .'</span>';
				}
			}

			$post_format = get_post_format($the_query->post->ID);
			$post_format_icon = '';
			if($post_format == false){
				$post_format = 'standard';
				$post_format_icon = 'pencil';
			}
			elseif( $post_format == 'audio' ){
				$post_format_icon = 'volume';
			}
			elseif( $post_format == 'video' ){
				$post_format_icon = 'play-video';
			}
			elseif( $post_format == 'gallery' ){
				$post_format_icon = 'picture';
			}
			elseif( $post_format == 'link' ){
				$post_format_icon = 'link';
			}
			elseif( $post_format == 'image' ){
				$post_format_icon = 'photo';
			}
			elseif( $post_format == 'quote' ){
				$post_format_icon = 'quote-1';
			}

			$img = '';

			$format = get_post_format();
			$post_details = get_post_meta(get_the_id(),'electrify_post_options');
			if( !empty($post_details)){
				extract($post_details[0]);
			}
			$pix_images = isset($pix_images) ? $pix_images : '';


			if (has_post_thumbnail()) {    
				$image_id = get_post_thumbnail_id ($the_query->post->ID );  
				$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full');
				if(!empty($image_thumb_url)){
					$img = aq_resize($image_thumb_url[0], $width, $height, true, true); 
				}

				if($img){
					$temp_thumb = "<img src='$img' alt=''>";
				}else{
					$temp_thumb = "<img src='$image_thumb_url[0]' alt=''>";                                     
				}
			}
			
			else {
				$temp_thumb = '<img src="'.get_template_directory_uri() .'/library/images/recent-blog-col4.gif" alt="">';
			}

			if ( $format == 'gallery') {
				$pix_images_gallery = htmlspecialchars_decode($pix_images);
				$images_gallery = json_decode($pix_images_gallery,true);

				
				if(!empty($images_gallery)){
					$image_thumb_url = wp_get_attachment_image_src( $images_gallery[0]['itemId'], 'full');
					if(!empty($image_thumb_url)){
						$img = aq_resize($image_thumb_url[0], $width, $height, true, true); 

						if(!$img){
							$img = $image_thumb_url[0];
						}			
					}
					else{
						$img = get_template_directory_uri() .'/library/images/portfolio-' .esc_attr($columns) .'-fallback.gif';
					}
					
					
					$temp_thumb = "<img src='$img' alt=''>";
				}else{
					$temp_thumb = '<img src="'. get_template_directory_uri() .'/library/images/portfolio-' .esc_attr($columns) .'-fallback.gif" alt="">';
				}
			}



			if($slider == 'yes'){
				$output .= '<div class="pix-recent-blog-contaniner pix-blog-'. $post_format .'">';
			}else{
				$output .= '<div class="'. $class .' pix-recent-blog-contaniner pix-blog-'. $post_format .'">';
			}		
			

				$output .= '<div class="pix-recent-blog">'; //pix-recent-blog
						if($style =='style2' ){
						   $output .='<div class="img-con">';
						 }
					  
						
					//featured Image
					$output .= '<div class="blog-img">
									'.$temp_thumb.'
									<div class="icon-center"><a href="'. get_permalink() .'"><i class="pixicon-eleganticons-3"></i></a></div>
								</div>';

					//Post format icon
					$output .= '<div class="blog-icon">
									<span class="pixicon-'.$post_format_icon.'"></span>
								</div>';
								
					  if($style =='style2'){
						   $output .='</div>';
						 }
			//$temp_content
					//Post Title
					$output .= '<div class="blog-post-content">
									<'.$title_tag.' class="recent-post-title"><a href="'. $temp_link .'">'. $temp_title .'</a></'.$title_tag.'>
									'. $meta .'
									'. $temp_content .'
								</div>';

				$output .= '</div>'; //End of pix-recent-blog

			$output .= '</div>'; //End of pix-recent-blog-contaniner

		endwhile; 
		
		else:
		  $output .= "<div>Post Not Found.</div>";
		endif;
	   
	   wp_reset_postdata();
	   $output .= '</div>';
	   return  $output;
	}

	/* =============================================================================
		 Staffs Shortcodes
	   ========================================================================== */

	//Staffs Loop
	function pix_staffs($atts, $content = null){
		extract(shortcode_atts(array(
			'no_of_staff' 	=> -1,
			'exclude_staffs' 	=> '',
			'order_by'		=> 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
			'order' 		=> 'asc', //desc, asc
			'staff_id'		=> '',
			'columns' 		=> 'col3', //col2, col3, col4
			'style'			=> 'style1',
			'title_tag'		=> 'h3',
			'insert_type'	=> 'posts',
			'lightbox'		=> 'yes',
			'single_staff_link' => 'yes',
			'staff_desc'	=> 'yes',
			'slider'		=> 'no',
			'autoplay' 		=> '4000',
			'slide_speed' 	=> '500',
			'slide_arrow' 	=> 'true',
			'arrow_type' 	=> '',
			'slider_height'	=> '',	
			'pagination' 	=> 'true',
			'stop_on_hover' => 'true',
			'mouse_drag' 	=> 'true',
			'touch_drag' 	=> 'true'
		), $atts));

$page_class = '';
		
		if(!empty($exclude_staffs)){
			$exclude_staffs= explode(',', $exclude_staffs);
		}
		else{
			$exclude_staffs = '';
		}


		if($staff_id != "" && $insert_type == 'id'){
			$staff_id= explode(',', $staff_id);

			$args = array(
				'post_type' => 'pix_staffs',
				'order' => $order,
				'orderby' => 'post__in',
				'post__in' => $staff_id,
				'post__not_in' => $exclude_staffs
				
				);
		}else{
			$args = array(
				'post_type' => 'pix_staffs',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty($no_of_staff) && is_numeric($no_of_staff))   ? $no_of_staff : -1,
				'post__not_in' => $exclude_staffs
				);
		}

		if($staff_desc == 'no'){
			$staff_desc = 'desc-none';
		}
		   
		if($columns == 'col3'){
			$shorten_length = 170;
			$class = 'vc_col-sm-4';
			$size = '396';
			$slide_items = 3;
			$tablet_slide = 2;
		}
		elseif($columns == 'col2'){
			$shorten_length = 220;
			$class = 'vc_col-sm-6';
			$size = '558';
			$slide_items = 2;
			$tablet_slide = 2;
		}else{
			$class = 'vc_col-sm-3';
			$shorten_length = 120;
			$size = '396';
			$slide_items = 4;
			$tablet_slide = 2;
		}

	if($pagination == 'false'){
		$page_class = ' no-pagi-carousel';
	}

		//VC_COLUMNS
		if($slider == 'yes'){
			$data = 'data-items="'. $slide_items .'" data-auto-height="'. $slider_height .'" data-pagination="'. $pagination .'" data-touch-drag="'. $touch_drag .'" data-mouse-drag="'. $mouse_drag .'" data-stop-on-hover="'. $stop_on_hover .'" data-navigation="'. $slide_arrow .'" data-slide-speed="'. $slide_speed .'" data-items-desktop="'. $slide_items .'" data-items-desktop-small="[991,'. $tablet_slide .']" data-items-tablet="[768,1]"';
			$auto = 'data-auto-play="'. $autoplay.'"';
			$output = '<div class="owl-carousel '. $staff_desc .' '.$columns.' '. $arrow_type .''. $page_class .'" '. $data .' '. $auto .'>';
		}else{
			$output = '<div class="wpb_row vc_row-fluid"><div class="no-carousel '.$columns.' '. $staff_desc .'">';
		}
			

		$the_query = new WP_Query( $args );

		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

			$temp_title = get_the_title($the_query->post->ID); //title
			$temp_content = ShortenText(get_the_content($the_query->post->ID),$shorten_length); //content
			$temp_link = get_permalink($the_query->post->ID); //permalink

			$img = "";

			if (has_post_thumbnail()) {    
				$image_id = get_post_thumbnail_id ($the_query->post->ID );  
				$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full');
				if(!empty($image_thumb_url)){
					if($style == 'style4'){
						$img = aq_resize($image_thumb_url[0], 190, 190, true, true); 
					}else{
						$img = aq_resize($image_thumb_url[0], $size, $size, true, true); 
					}
				}
				if($img){
					$temp_thumb = "<img src='$img' alt=''>";
				}else{
					$temp_thumb = "<img src='$image_thumb_url[0]' alt=''>";                                    
				}
			}
			else {
				$temp_thumb = '<img src="'.get_template_directory_uri() .'/library/images/staff-'. esc_attr($columns) .'-fallback.gif" alt="">';
			}

			$meta = get_post_meta(get_the_id(),'staff_socail_links');

			if( !empty($meta) && !empty($meta[0])){
				extract($meta[0]);
			}

			$social_icons 	 = '';

			$social_icons 	 .= !empty($facebook)? '<a href="'. esc_url($facebook) .'" class="facebook"  title="Facebook"><i class="pixicon-eleganticons-241"></i></a> ' : '';
			$social_icons 	.= !empty($twitter) ? '<a href="'. esc_url($twitter)  .'" class="twitter" title="Twitter"><i class="pixicon-eleganticons-242"></i></a> ' : '';
			$social_icons	.= !empty($gplus) ? '<a href="'. esc_url($gplus) 	 .'" class="gplus" title="Gplus"><i class="pixicon-eleganticons-244"></i></a> ' : '';
			$social_icons	.= !empty($linkedin)? '<a href="'. esc_url($linkedin) .'" class="linkedin" title="LinkedIn"><i class="pixicon-linkedin-1"></i></a> ' : '';
			$social_icons 	.= !empty($dribble) ? '<a href="'. esc_url($dribble)  .'" class="dribbble" title="Dribble"><i class="pixicon-eleganticons-249"></i></a> ' : '';
			$social_icons	.= !empty($flickr) ? '<a href="'. esc_url($flickr)   .'" class="flickr" title="Flickr"><i class="pixicon-eleganticons-260"></i></a> ' : '';
			$social_icons	.= !empty($instagram) ? '<a href="'. esc_url($instagram)   .'" class="instagram" title="Instagram"><i class="pixicon-eleganticons-248"></i></a> ' : '';
			$social_icons	.= !empty($staff_email) ? '<a href="mailto:'. esc_url($staff_email).'" class="staff_email" title="Staff Email"><i class="pixicon-eleganticons-212"></i></a> ' : '';
			
			$jobs = get_the_term_list($the_query->post->ID , 'pix_jobs','',', ');
			$jobs = !empty($jobs) ? strip_tags( $jobs ) : '';

			if($slider == 'yes'){
				$output .= '<div class="pix-staffs">';
				$output .= "\t".'<div class="'. esc_attr($style) .'">';
			}else{
				$output .= '<div class="'. $class .' wpb_column column_container pix-staffs">';
				$output .= "\t".'<div class="wpb_wrapper '. esc_attr($style) .'">';
			}		
			

				$output .= '<div class="staff-container">'; //Staff Container

					//Staff Image
					$output .= '<div class="staff-img-con">
									<div class="staff-img">';
					$output .= $temp_thumb;
					if($lightbox == 'yes' || $single_staff_link == 'yes'){
					$output .= '<div class="staff-icons">
											<div class="staff-hover">';

												/* Hover Icons */
												//Lightbox icon
												if($lightbox == 'yes'){
													$output .= '<a href="'. $image_thumb_url[0] .'" class="staff-icon popup-gallery"><i class="pixicon-eleganticons-52"></i></a>';
												}

												//Permalink Icon
												if($single_staff_link == 'yes'){
													$output .= '<a href="'.$temp_link.'" class="staff-icon"><i class="pixicon-eleganticons-3"></i></a>';
												}

												//Socaial Icons
												if($style == 'style3'){
													$output .= $social_icons;
												}
											
					$output .=				'</div>
										</div>';
									}
					$output .=		'</div>
								</div>';


					//Staff Name and content
					$output .= '<div class="staff-content">'; //Staff Container

						//Author name
						if($single_staff_link == 'yes'){
							$output .= '<'. $title_tag .' class="title"><a href="'.$temp_link.'" >'.esc_html($temp_title).'</a></'. $title_tag .'>'; 
						}else{
							$output .= '<'. $title_tag .' class="title">'.esc_html($temp_title).'</'. $title_tag .'>'; //title
						}
						
						$output .= "<p class='jobs'>$jobs</p>"; //jobs
						$output .= "<div class='line'></div>"; //seperator

						//content
						if($staff_desc == 'yes'){
							$output .= '<p>'.esc_textarea($temp_content).'</p>';
						}

					$output .= '</div>'; //End of Staff Content

					//staff social icons
					if($style != 'style3'){
						if(!empty($social_icons)){$output .= '<div class="staff-social">'. $social_icons .'</div>';}
					}

				$output .= '</div>'; //End of Staff Container

			$output .= "\t".'</div>';
			$output .= '</div>';
		endwhile; 
		
		else:
		  $output .= "<div>No Staff Posts Found.</div>";
		endif;
	   
	   wp_reset_postdata();

			if($slider != 'yes'){
				$output .= '</div>';
			}
	   $output .= '</div>';
	   return  $output;
	}


	/* =============================================================================
		 Portfolio Shortcodes
	   ========================================================================== */

	//Portfolio Loop
	function pix_portfolio($atts, $content = null){
		extract(shortcode_atts(array(
			'portfolio_style' 	=> 'grid',//grid,masonry
			'no_of_items' 	=> -1,
			'exclude_portfolio' => '',
			'pix_filterable'   => '',
			'filter_style'  => '',
			'order_by'		=> 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
			'order' 		=> 'asc', //desc, asc
			'portfolio_id'	=> '',
			'columns' 		=> 'col3', //col2, col3, col4
			'style'			=> 'style1',
			'title_tag'		=> 'h3',
			'insert_type'	=> 'posts',
			'share'			=> 'yes',
			'lightbox'		=> 'yes',
			'like'			=> 'yes',
			'single_portfolio_link' => 'yes',
			'slider'		=> 'no',
			'autoplay' 		=> '4000',
			'slide_speed' 	=> '500',
			'slide_arrow' 	=> 'true',
			'arrow_type' 	=> '',
			'slider_height'	=> '',	
			'pagination' 	=> 'true',
			'stop_on_hover' => 'true',
			'mouse_drag' 	=> 'true',
			'touch_drag' 	=> 'true'
		), $atts));

		if(!empty($exclude_portfolio)){
			$exclude_portfolio= explode(',', $exclude_portfolio);
		}
		else{
			$exclude_portfolio = '';
		}
		
		if($portfolio_id != "" && $insert_type == 'id'){
			$portfolio_id= explode(',', $portfolio_id);

			$args = array(
				'post_type' => 'pix_portfolio',
				'order' => $order,
				'orderby' => 'post__in',
				'post__in' => $portfolio_id,
				'post__not_in' => $exclude_portfolio
				);
		}else{
			$args = array(
				'post_type' => 'pix_portfolio',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty($no_of_items) && is_numeric($no_of_items))   ? $no_of_items : -1,
				'post__not_in' => $exclude_portfolio
				);
		}
		$tablet_slide = $page_class = '';

		$pix_filterable = isset($pix_filterable) ? $pix_filterable : 'yes';
		$filter_style = isset($filter_style) ? $filter_style : 'normal'; //normal, dropdown, simple
		   
		if($columns == 'col3'){
			$shorten_length = 50;
			$class = 'vc_col-sm-4';
			$width = '634';
			$slide_items = 3;
			$tablet_slide = 2;
		}elseif($columns == 'col2'){
			$shorten_length = 120;
			$class = 'vc_col-sm-6';
			$width = '952';
			$slide_items = 2;
			$tablet_slide = 1;
		}else{
			$class = 'vc_col-sm-3';
			$shorten_length = 120;
			$width = '480';
			$slide_items = 4;
			$tablet_slide = 3;
		}

		if($columns == 'col3' && $portfolio_style == 'grid'){			
			$height = '400';
		}
		elseif($columns == 'col2' && $portfolio_style == 'grid'){			
			$height = '500';
		}
		elseif(($columns == 'col4' || $columns == '') && $portfolio_style == 'grid'){			
			$height = '320';
		}


		$masonry_class = '';

		if($portfolio_style == 'masonry'){
			$height = NULL;
			$masonry_class = ' masonry-class';
		}

		$output = '';

		if($slider != 'yes'){
			$output = '<div class="no-portfolio-carousel '. $portfolio_style .''. $masonry_class .'">';
		}

		if($slider != 'yes' && $pix_filterable == 'yes') {
			
			$terms = get_terms('pix_categories'); 
			if($terms){
				$output .= '<div class="sorter '. $filter_style .'">';

					if($filter_style == 'dropdown'){
						$output .= '<div class="top-active"><span class="txt">All </span><span class="pixicon-eleganticons-18"></span></div>';
					}

					$output .= '<ul id="filters" class="option-set '. $filter_style .' clearfix" >
									 <li><a href="#" class="selected" data-filter="*">All</a></li>';
										$terms = get_terms('pix_categories'); 
										foreach($terms as $term ){ 
											$output .= '<li><a href="#" data-filter=".'.strtolower(str_replace(' ','-',$term->name)).'">'.$term->name.'</a></li>';    
										}
									$output .= '</ul>  
							</div>';
			}
			
		}

	if($pagination == 'false'){
		$page_class = ' no-pagi-carousel';
	}

		//VC_COLUMNS
		if($slider == 'yes'){
			$data = 'data-items="'. $slide_items .'" data-auto-height="'. $slider_height .'" data-pagination="'. $pagination .'" data-touch-drag="'. $touch_drag .'" data-mouse-drag="'. $mouse_drag .'" data-stop-on-hover="'. $stop_on_hover .'" data-navigation="'. $slide_arrow .'" data-slide-speed="'. $slide_speed .'" data-items-desktop="[1199,'. $slide_items .']" data-items-desktop-small="[991,'. $tablet_slide .']" data-items-tablet="[768,1]"';
			$auto = 'data-auto-play="'. $autoplay.'"';
			$output .= '<div class="pix-portfolio owl-carousel '.$columns.' '. $arrow_type .''. $page_class .'" '. $data .' '. $auto .'>';
		}else{
			$output .= '<div class="wpb_row vc_row-fluid"><div class="portfolio-contents">';
			$data = $auto = '';
		}

		

		$the_query = new WP_Query( $args );
		$i = 1;

		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

			

			$terms = get_the_terms($the_query->post->ID,'pix_categories');

			$temp_title = get_the_title($the_query->post->ID); //title
			$temp_content = ShortenText(get_the_content($the_query->post->ID),$shorten_length); //content
			$temp_link = get_permalink($the_query->post->ID); //permalink
			$like_count = get_post_meta( $the_query->post->ID, '_pix_like_me', true );
			$like_class = ( isset($_COOKIE['pix_like_me_'. $the_query->post->ID])) ? 'liked' : '';


			if($like_count == ''){
				$like_count = 0;
			}

			$img = '';

			//Get Porfolio Image
			$pix_images= '';
			$post_details = get_post_meta(get_the_id(),'electrify_single_portfolio_options');
			if( !empty($post_details)){
				extract($post_details[0]);
			}

			$pix_images_gallery = htmlspecialchars_decode($pix_images);
			$images_gallery = json_decode($pix_images_gallery,true);
			
			if(!empty($images_gallery)){
				$image_thumb_url = wp_get_attachment_image_src( $images_gallery[0]['itemId'], 'full');
				if(!empty($image_thumb_url)){
					$img = aq_resize($image_thumb_url[0], $width, $height, true, true); 

					if(!$img){
						$img = $image_thumb_url[0];
					}			
				}
				else{
					$img = get_template_directory_uri() .'/library/images/portfolio-' .esc_attr($columns) .'-fallback.gif';
				}
				
				
				$temp_thumb = "<img src='$img' alt=''>";
			}else{
				$temp_thumb = '<img src="'. get_template_directory_uri() .'/library/images/portfolio-' .esc_attr($columns) .'-fallback.gif" alt="">';
			}

			if($slider == 'yes'){
				$output .= '<div class="pix-portfolio-item '. esc_attr($style) .'">';

			}else{
				$output .= '<div class="'. $class .' pix-portfolio-item element '. esc_attr($style);

				if(!empty($terms)) {
					foreach($terms as $term) {
						$output .= ' ' . strtolower(str_replace(' ','-',$term->name)). ' '; 
					}
				}

				$output .= '" data-id="id-'.$i.'">';
			}		
			

				$output .= '<div class="portfolio-container">'; //portfolio Container

					//portfolio Image
					$output .= '<div class="portfolio-img">
									'.$temp_thumb.'
								</div>';
								
					$output .=	'<div class="portfolio-hover">';

					if($style == 'style7'){
						$output .=	'<div class="portfolio-content-wrap-con"><div class="portfolio-content-wrap">';
					}

						if($style == 'style3'){
							$output .= '<div class="portfolio-icons">'; //portfolio Container

								//Lightbox icon
								if($lightbox == 'yes' && !empty($img)){
									$output .= '<div class="port-icon-hover"><a href="'. $image_thumb_url[0] .'" class="portfolio-icon popup-gallery"><i class="pixicon-eleganticons-52"></i></a></div>';
								}

								//Like Button Icon
								if($like == 'yes'){
									$output .= '<div class="port-icon-hover"><a href="#void" class="portfolio-icon pix-like-me '. $like_class .'" data-id="'. $the_query->post->ID .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span></a></div>';
								}

								//Permalink Icon
								if($single_portfolio_link == 'yes'){
									$output .= '<div class="port-icon-hover"><a href="'. get_permalink() .'" class="portfolio-icon"><i class="pixicon-eleganticons-3"></i></a></div>';
								}

							$output .= '</div>'; //End of portfolio icons
						}

						//portfolio Name and content
						if($style == 'style1' && $single_portfolio_link == 'yes'){
							$output .= '<a href="'.$temp_link.'" class="portfolio-link" >';
						}else{
							$output .= '<div class="portfolio-link">';
						}
						$output .= '<div class="portfolio-content">'; //portfolio Container

							//Author name
							if( $single_portfolio_link == 'yes' && $style != 'style1' ){
								$output .= '<'. $title_tag .' class="title"><a href="'.$temp_link.'" class="portfolio-link">'.esc_html($temp_title).'</a></'. $title_tag .'>'; 
							}else{
								$output .= '<'. $title_tag .' class="title">'.esc_html($temp_title).'</'. $title_tag .'>'; //title
							}
						
							//seperator	
							if($style == 'style2'){
								$output .= "<div class='line'></div>"; 
							}

			
							//content
							if($style == 'style1' || $style == 'style2' || $style == 'style7' ){			
								$output .= '<p>'.esc_textarea($temp_content).'</p>';
							}

						$output .= '</div>'; //End of portfolio Content

						if($single_portfolio_link == 'yes' && $style == 'style1'){
							$output .= '</a>';
						}else{
							$output .= '</div>';
						}

						if($style == 'style2' || $style == 'style4' || $style == 'style5'){
							$output .= '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container

								//Like Button Icon
								if($style != 'style4'){
									if($share == 'yes'){
										$output .= '<div class="port-icon-hover share-btn"><div class="share-top"><i class="pixicon-share"></i></div><div class="port-share-btn">';

											$output .= '<a href="http://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $img .'"><i class="pixicon-pinterest"></i></a>';
										
											$output .= '<a href="https://plus.google.com/share?url='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-244"></i></a>';			    				
										
											$output .= '<a href="http://twitter.com/share?url='. get_permalink() .'&amp;text=Check out this Project '. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-242"></i></a>';
										
											$output .= '<a href="http://www.facebook.com/sharer.php?u='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-241"></i></a>';
																		
										$output .= '</div></div>';
									}
									if($like == 'yes'){
										$output .= '<div class="port-icon-hover"><a href="#void" class="portfolio-icon pix-like-me '.$like_class.'" data-id="'. $the_query->post->ID .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span></a></div>';
									}
								}

								//Lightbox icon
								if($lightbox == 'yes' && !empty($img)){
									$output .= '<div class="port-icon-hover"><a href="'. $img .'" class="portfolio-icon popup-gallery"><i class="pixicon-eleganticons-52"></i></a></div>';
								}

								//Permalink Icon
								if($single_portfolio_link == 'yes'){
									$output .= '<div class="port-icon-hover"><a href="'. get_permalink() .'" class="portfolio-icon"><i class="pixicon-eleganticons-3"></i></a></div>';
								}

							$output .= '</div></div>'; //End of portfolio icons
						}
						if($style == 'style6'){
							$output .= '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio 

							if($single_portfolio_link == 'yes'){
								$output .= '<div class="port-icon-hover"><a href="'. get_permalink() .'" class="portfolio-icon"><i class="pixicon-eleganticons-3"></i></a></div>';
							}

							$output .= '</div></div>'; //End of portfolio icons
						}


					if($style == 'style7'){
						$output .=	'</div></div>'; //End of portfolio content wrap
					}
										
					$output .=	'</div>'; //End of portfolio hover

				$output .= '</div>'; //End of portfolio Container

			$output .= '</div>'; //End of pix portfolio Item
			$i++;
		endwhile; 
		
		else:
		  $output .= "<div>No Portfolio Items Found.</div>";
		endif;
	   
	   wp_reset_postdata();

		if($slider == 'yes'){
			$output .= '</div>';
		}else{
			$output .= '</div></div>';
		}

		if($slider != 'yes'){
			$output .= '</div>';
		}
	   return  $output;
	}


	/* =============================================================================
		 List Style
	   ========================================================================== */

	function pix_list($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'style' => ''
		),$atts));
		$output = '<ul class="list">'. wpb_js_remove_wpautop($content) .'</ul>';
		return $output;
	}

	function pix_li($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'icon_name' => '',
			'icon_color'	=> '',
			'user_icon_color' => '',
		),$atts));

		if($icon_color == 'custom'){
			$user_icon_color = 'style="color:'.$user_icon_color.';"';
		}

		if(!empty($icon_name)){
			$output = '<li class="icon-list"><i class="pix-icon '. $icon_name .' '. $icon_color .'" '. $user_icon_color .'></i>'. wpb_js_remove_wpautop($content) .'</li>';
		}else{
			$output = '<li>'. wpb_js_remove_wpautop($content) .'</li>';
		}
		return $output;
	}

	/* =============================================================================
		 Pricing Tables
	   ========================================================================== */

	function pix_pricing_tables($atts, $content = null){
		extract(shortcode_atts(array(
			'el_class' => '',
			'style' => '',
			'highlight_box' => 'no',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'title_tag' => '',
			'title' => '',
			'currency' => '$',
			'price' => '',
			'period' => '',
			'display_button' => 'yes',
			'button_text' => 'Order Now',
			'button_link'  => '',
			'button_style' => '',
			'button_size' => 'medium',
			'button_color' => '',
			'button_icon' => ''
			),$atts));

		$btn_att = vc_build_link($button_link);		
		$btn_att['href'] = (isset($btn_att['url'])) ? $btn_att['url'] : '';
		$btn_att['title'] = (isset($btn_att['title'])) ? $btn_att['title'] : '';
		$btn_att['target'] = (isset($btn_att['target'])) ? $btn_att['target'] : '';

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = ""; 
		$pricing_table_img = $pricing_table_bg = "";

		if($animate == "Yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

			$slideDuration = isset($duration) ? ' data-duration="'. $duration .'"' : '';

			$slideDelay = isset($delay) ? ' data-delay="'. $delay .'"' : '';

		}

		$button = $line = "";
		if($display_button == 'yes'){
			$button = '<p class="sepCenter"><a href="'. $btn_att['href'] .'" title="'.$btn_att['title'] .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').' class="btn btn-'. esc_attr($button_style) .' btn-'. esc_attr($button_size) .' '. $button_color .'">'. esc_html($button_text) .' <span class="btn-icon pix-icon '. $button_icon .'"></span></a></p>';
		}

		$output = '<div class="pricing-table newSection">';

		if($highlight_box == 'yes'){
			$output .= '<div class="price-table bestPlan '. $style .''. esc_attr($animate_class) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>';
		}else{
			$output .= '<div class="price-table '. $style .''. esc_attr($animate_class) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>';	
		}

		if($style != 'style2'){
			$line = '<span class="line"></span>';
		}

		if($style != 'style7'){
			$output .= '<div class="price-header"><'. $title_tag .' class="plan-title">'. $title .''. $line .'</h3>';
		}

		$price_table_imgbg = wp_get_attachment_image_src( $pricing_table_img, 'full');
		if(!empty($price_table_imgbg)){
			$price_table_imgbg2 = aq_resize($price_table_imgbg[0], 358, 100, true, true); 			
		}

		$pricing_table_bg .= ' style="';
		$pricing_table_bg .= ($pricing_table_img != '') ? ' background-image: url('.$price_table_imgbg2 .'); background-position: center center; background-size: cover; background-repeat: no-repeat; -webkit-filter: grayscale(1);' : '';
		$pricing_table_bg .= '"';

		if($style == 'style7'){
			$output .= '<div class="price-header">
			<div '.$pricing_table_bg.' >
			<'. $title_tag .' class="plan-title">'. $title .''. $line .'</h3>
			</div>	';
		}

		$output .= '<p class="value"><span class="vAlign">'.esc_html($currency).'</span>'. esc_html($price) .'<small>'. esc_html($period) .'</small></p>';

			if($highlight_box == 'yes' && ($style == 'style3' || $style == 'style5' || $style == 'style7' || $style == 'style8' || $style == 'style9' || $style == 'style10')){
				$output .='<div class="bestplan-icon"></div>';
				$output .='<i class="pixicon-star"></i>';
			}	

			if($highlight_box == 'yes' && $style == 'style4'){
				$output .='<p class="bestplan">BEST VALUE</p>';
			}

		if($style == 'style10'){
			$output .= $button;
		}		
		
			
		$output .= '</div>';
		$output .= wpb_js_remove_wpautop($content);

		if($style != 'style10'){
			$output .= $button;
		}

		$output .= '</div></div>';
		return $output;
	}

	/* =============================================================================
		 Testimonial Shortcodes
	   ========================================================================== */

	//Testimonial Loop
	function pix_testimonial($atts, $content = null){
		extract(shortcode_atts(array(
			'no_of_testimonial'      => -1,
			'exclude_testimonial'    => '',
			'limit'    => '',
			'order_by'		 => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
			'order' 		 => 'desc', //desc, asc
			'testimonial_id'	 => '',
			'style'			 => 'style1',
			'insert_type'		 => 'posts',
			'no_of_col'		 =>  1,
			'rating_no'		 => 'yes',
			'autoplay'		 => '4000',
			'slide_speed'		 => '500',
			'slide_arrow'		 => 'true',
			'arrow_type'		 => '',
			'slider_height'		 => '',	
			'pagination' 		 => 'true',
			'stop_on_hover'		 => 'true',
			'mouse_drag'		 => 'true',
			'touch_drag'		 => 'true'
		), $atts));

$page_class = $img = $company = '';

		if(!empty($exclude_testimonial)){
			$exclude_testimonial= explode(',', $exclude_testimonial);
		}
		else{
			$exclude_testimonial = '';
		}

		if($testimonial_id != "" && $insert_type == 'id'){
			$testimonial_id= explode(',', $testimonial_id);

			$args = array(
				'post_type' => 'pix_testimonial',
				'order' => $order,
				'orderby' => 'post__in',
				'post__in' => $testimonial_id,
				'post__not_in' => $exclude_testimonial
				);
		}else{
			$args = array(
				'post_type' => 'pix_testimonial',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty($no_of_testimonial) && is_numeric($no_of_testimonial))   ? $no_of_testimonial : -1,
				'post__not_in' => $exclude_testimonial
				);
		}

	if($pagination == 'false'){
		$page_class = ' no-pagi-carousel';
	}

		//VC_COLUMNS
		$output = '<div class="owl-carousel team-row testimonials col'. $no_of_col .'  '. $arrow_type .''. $page_class .'" data-items="'. $no_of_col .'" data-auto-height="'. $slider_height .'" data-pagination="'. $pagination .'" data-touch-drag="'. $touch_drag .'" data-mouse-drag="'. $mouse_drag .'" data-stop-on-hover="'. $stop_on_hover .'" data-navigation="'. $slide_arrow .'" data-slide-speed="'. $slide_speed .'" data-auto-play="'. $autoplay. '" data-items-custom="[[0,1],[768,1],[991, '. $no_of_col .'],[1199, '. $no_of_col .']]">';
			

		$the_query = new WP_Query( $args ); 

		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

			$temp_title = get_the_title($the_query->post->ID); //title
			

			if(!empty($limit)){
				$temp_content = strip_shortcodes(ShortenText(get_the_excerpt(),$limit));
            	$temp_content = strip_tags($temp_content);
			}

			else{
				$temp_content = get_the_content($the_query->post->ID); //content
			}
			
			if (has_post_thumbnail()) {    
				$image_id = get_post_thumbnail_id ($the_query->post->ID );  
				$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full');
				if(!empty($image_thumb_url)){
					$img = aq_resize($image_thumb_url[0], 98, 98, true, true); 			
				}

				if($img){
					$temp_thumb = "<div class='testimonial-img'><img src='$img' alt=''></div>";
				}else{
					$temp_thumb = "<div class='testimonial-img'><img src='$image_thumb_url[0]' alt=''></div>";                                    
				}
			}
			else {
				$temp_thumb = '';
			}

			$meta = array();
			$meta = get_post_meta($the_query->post->ID,'electrify_testimonial_options',false);
			if( !empty($meta) )
				extract($meta[0]);

			$author_job = isset($author_job) ? $author_job : '';
			$company_name = isset($company_name) ? $company_name : '';
			$company_url = isset($company_url) ? $company_url : '';
			$rating = isset($rating) ? $rating : '5';

			if(!empty($company_url) && !empty($company_name)){
				$company = '<a href="'.esc_url($company_url).'">'. $company_name .'</a>';
			}

			$job_company = '';
			if(!empty($author_job) || !empty($company)){
				$job_company = '<p class="pix-job">'. ucfirst($author_job);

				if(!empty($author_job) && !empty($company)){
					$job_company .= ', ';
				}

				$job_company .= $company .'</p>';
			}
			
			$rating_star = '';
			if( $rating_no == 'yes'){
				$rating_star = '<div class="star">';
				for($i=0;  $i < (int)$rating; $i++){
					$rating_star .= '<i class="color star-icon pixicon-eleganticons-145"></i>';
				}
				for((int)$j=(5-$rating);  $j > 0; $j--){
					$rating_star .= '<i class="star-icon pixicon-eleganticons-145"></i>';
				}
				$rating_star .= '</div>';
			}
			$overflow_class = '';
			if(empty($temp_thumb)){
				$overflow_class = "overflow-no";
			}


			$output .= '<div class="testimonial '. $style .' '. $overflow_class .'">';

							if( $style != 'style4' && $style != 'style5' && $style != 'style6'){
								$output .= $temp_thumb;
							}

							if( $style == 'style3'){
								$output .=	'<div class="testimonial-author"><p class="pix-author-name">'.$temp_title.'</p>'. $job_company;
								$output .= $rating_star;
								$output .= '</div>';
								
							}

							if($style != 'style1' && $style != 'style2' && $style != 'style6'){
								$output .= '<div class="line"></div>';
							}

							$output .= '<div class="testimonial-container">';

							$output .= '<div class="content"><p><span class="quote-left"></span><span class="para">'. $temp_content .'</span><span class="quote-right"></span></p>';

							if($style == 'style4'){
								$output .= $rating_star;
							}

							$output .= '</div>';

							if( $style == 'style4' || $style == 'style5' || $style == 'style6'){
								$output .= $temp_thumb;
							}

							if($style != 'style3'){

								$output .= '<div class="testimonial-author">';
									if($style != 'style3' && $style != 'style6'){
										$output .= '<div class="line"></div>';
									}
									if($style == 'style5'){
										$output .= $rating_star;
									}
									$output .= '<p class="pix-author-name">'.$temp_title.'</p>'. $job_company;

									if($style != 'style3' && $style != 'style4' && $style != 'style5' && $style != 'style6'){
										$output .= $rating_star;
									}
								$output .= '</div>';
							}

							if($style == 'style6'){
								$output .= '<div class="line"></div>';
								$output .= $rating_star;
							}
						
						$output .= '</div></div>';
		endwhile; 
		
		else:
		  $output .= "<div>Testimonial posts not Found. Please add atleast one.</div>";
		endif;
	   
	   wp_reset_postdata();
	   $output .= '</div>';
		return $output;
	}


	/* =============================================================================
		 Counters Shortcodes
	   ========================================================================== */
	function pix_counter( $atts, $content = null ){
		extract(shortcode_atts(array(
			'el_class' => '',
			'number'  => '5000',
			'text' => 'Pizzas ordered',
			'icon' => '',
			'icon_name' => '',
			'icon_align' => 'left',
			'icon_color' => '',
			'border'  =>  '',
			'text_font_size' => '',
			'number_font_size' => ''
		), $atts));

		$number_size = $text_size = '';
		
		if ($number_font_size != '') {
			$number_size = ' style="font-size: '. $number_font_size .'";';
		}

		if ($text_font_size != '') {
			$text_size = ' style="font-size: '. $text_font_size .'";';
		}

		$output ='<div class="counter '. $el_class .' '.$border.' clearfix"><div class="absolute-center">';
		
		if($icon == 'yes' && $icon_name != ''){
			$output .=' <i class="'.$icon_align.' pixicon '.$icon_name.''. $icon_color.'"></i>';
		}
			
		$output .= '<div class="counter-box '.$icon_align.'">
					<span class="counter-value"'. $number_size .'>'. $number .'</span>
					<span class="content"'. $text_size .'>'. $text .'</span>
					</div></div>	
					</div>';
		return $output;
	}

	/* =============================================================================
		 Google Map API v3 Shortcodes
	   ========================================================================== */
	   function pix_googlemap( $atts ) {
	   	global $pix_theme_pri_color, $gmap_count;
	   	$gmap_count++;
	   	extract(shortcode_atts(array(
	   		'width' => '98%',
	   		'height' => '300',
	   		'lat' => '',
	   		'lng' =>'',
	   		'zoom' => '13',
	   		'pancontrol' => 'true',
	   		'zoomcontrol'=> 'true',
	   		'maptypecontrol'=> 'true',
	   		'scalecontrol'=> 'true',
	   		'streetviewcontrol'=> 'true',
	   		'overviewmapcontrol'=> 'true',
	   		'contact_info' => '',
	   		'email' => '',
	   		'address_title' => '',
	   		'address' => '',
	   		'contact_number' => ''
	   		), $atts));

	   	$pancontrol = ($pancontrol == 'true') ? 'true' : 'false';
	   	$zoomcontrol = ($zoomcontrol == 'true') ? 'true' : 'false';
	   	$maptypecontrol = ($maptypecontrol == 'true') ? 'true' : 'false';
	   	$scalecontrol = ($scalecontrol == 'true') ? 'true' : 'false';
	   	$streetviewcontrol = ($streetviewcontrol == 'true') ? 'true' : 'false';
	   	$overviewmapcontrol = ($overviewmapcontrol == 'true') ? 'true' : 'false';

	   	$rand = rand(1,100) * rand(1,100);

	   	$output = '<div class="pix-map">';  		   			

	   	$output .= '<div class="map_api" id="map_canvas_'.esc_attr($rand).'" style="width:'. $width .'; height:'. $height .'px"></div>';	   	

			if($contact_info == 'yes'){
				$output .= '<div class="map-contact"><div class="contact-wrap">';
					$output .= '<div class="address-wrap">';
				if($address_title != ''){
					$output .= '<h2 class="title"><span class="pixicon-marker"></span>'. $address_title .'</h2>';
				}
				if($address != ''){
					$output .= '<p class="address">'. $address .'</p>';
				}
				if($email != ''){
					$output .= '<a href="mailto:'. $email .'" class="link"><span class="pixicon-mail"></span>'. $email .'</a>';
				}
				if($contact_number != ''){
					$output .= '<p class="number"><span class="pixicon-telephone"></span>'. $contact_number .'</p>';
				}
					$output .= '</div>';
				$output .= '</div></div>';
	   		}
	   
		$output .= '</div>';
		
   		$output .= '<script type="text/javascript">
   		 	function initialize'.$rand.'() {
	   			var myLatlng = new google.maps.LatLng('.$lat.','. $lng .');
	   			var styles = [
	   			    {
	   			      stylers: [
	   			        { hue: "'.$pix_theme_pri_color.'" },
	   			        { saturation: -20 }
	   			      ]
	   			    },{
	   			      featureType: "road",
	   			      elementType: "geometry",
	   			      stylers: [
	   			        { lightness: 100 },
	   			        { visibility: "simplified" }
	   			      ]
	   			    },{
	   			      featureType: "road",
	   			      elementType: "labels",
	   			      stylers: [
	   			        { visibility: "off" }
	   			      ]
	   			    }
	   			  ];  
	   			  
	   			var mapOptions = {
	   				center: myLatlng,
	   				zoom: '. $zoom .',
	   				panControl: '. $pancontrol .',
	   				zoomControl: '. $zoomcontrol .',
	   				mapTypeControl: '. $maptypecontrol .',
	   				scaleControl: '. $scalecontrol .',
	   				streetViewControl: '. $streetviewcontrol .',
	   				overviewMapControl: '. $overviewmapcontrol .',
	   				mapTypeId: google.maps.MapTypeId.ROADMAP,
	   				styles: styles
	   			};
	   			var map = new google.maps.Map(document.getElementById("map_canvas_'.$rand.'"),
	   				mapOptions);
				var marker = new google.maps.Marker({
					position: myLatlng
				});

				marker.setMap(map);        
			}
			
			initialize'.$rand.'();

   		</script>';
		return $output;
	}


	/* =============================================================================
		 Clients Shortcodes
	   ========================================================================== */

	function pix_clients( $atts, $content = null ){
		extract(shortcode_atts(array(
			'link' => 'yes',
			'custom_links' => '',
			'custom_links_target' => '_self',
			'title_on_hover' => 'yes',
			'style' => '',
			'titles' => '',
			'images' => '',
			'items' => '4',
			'slider' => 'no',
			'autoplay' => '4000',
			'slide_speed' => '500',
			'slide_arrow' => 'true',
			'arrow_type'  => '',
			'slider_height'	=> '',	
			'pagination' => 'true',
			'stop_on_hover' => 'true',
			'mouse_drag' => 'true',
			'touch_drag' => 'true'
		), $atts));

		$class = $data = $client_class = $pagi = $auto = $img = $page_class = '';

		if ( $link == 'yes' ) { $custom_links = explode( ',', $custom_links); }
		if ( $title_on_hover == 'yes' ) { $titles = explode( ',', $titles); }
		$images = explode( ',', $images);
		$i = -1;

	if($pagination == 'false'){
		$page_class = ' no-pagi-carousel';
	}
		
		if($slider == 'yes'){
			$client_class = " owl-carousel {$page_class}";
			$data = 'data-items="'. $items .'" data-auto-height="'. $slider_height .'" data-pagination="'. $pagination .'" data-touch-drag="'. $touch_drag .'" data-mouse-drag="'. $mouse_drag .'" data-stop-on-hover="'. $stop_on_hover .'" data-navigation="'. $slide_arrow .'" data-slide-speed="'. $slide_speed .'"';
			$auto = 'data-auto-play="'. $autoplay.'"';
		}else{
			$client_class = ' no-clients-carousel';
			}
		if($pagination == "false"){
			$pagi .= " no-pagination";
		}

		if($items == "2"){
			$class = " item-2";
		}elseif($items == "5"){
			$class = " item-5";
		}elseif($items == "6"){
			$class = " item-6";
		}

		$output =	'<div class="clients'. $client_class . $pagi . $class .' '. $arrow_type .' '. $style .' clearfix" '.$data . $auto.'>';

		foreach ($images as $attach_id ) {
			$i++;

			if ($attach_id > 0) {
				$image_thumb_url = wp_get_attachment_image_src( $attach_id, 'full');
				if(!empty($image_thumb_url)){
					$img = aq_resize($image_thumb_url[0], 280, 140, true, true); 
				}

				if(!$img){
					$img = $image_thumb_url[0];
				}

				$output .= '<div class="client">';

					if( $link == 'yes' && !empty($custom_links[$i])){
						$output .= '<a href="'. $custom_links[$i] .'" target="_blank">';
					}

						$output .= '<img src="'. $img .'" alt="">';

						if($title_on_hover == 'yes' && !empty($titles[$i]) ){
							$output .= '<div class="client-title-hover"><span>'. $titles[$i] .'</span></div>';
						}
					
					if( $link == 'yes' ){
						$output .= '</a>';
					}    		

				$output .= '</div>';

			}
		}
						
		$output .=	'</div>';
		return $output;		
	}

	/**
	 * The Gallery shortcode.
	 *
	 * This implements the functionapix_lity of the Gallery Shortcode for displaying
	 * WordPress images on a post.
	 *
	 * @since 2.5.0
	 *
	 * @param array $attr Attributes of the shortcode.
	 * @return string HTML content to display gallery.
	 */
	function pix_theme_gallery_shortcode($attr) {
		
		wp_enqueue_style('flexslider');
		wp_enqueue_script( 'flexslider-js' );
		wp_enqueue_script( 'gallery-script' );
		
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attr['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attr['orderby'] ) )
				$attr['orderby'] = 'post__in';
			$attr['include'] = $attr['ids'];
		}

		// Allow plugins/themes to override the default gallery template.
		$output = apply_filters('post_gallery', '', $attr);
		if ( $output != '' )
			return $output;

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'li',
			'columns'    => 3,
			'size'       => 'large',
			'include'    => '',
			'exclude'    => ''
		), $attr));

		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';

		if ( !empty($include) ) {
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($exclude) ) {
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if ( empty($attachments) )
			return '';

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
		}

		$itemtag = tag_escape($itemtag);
		$columns = intval($columns);
		$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
		$float = is_rtl() ? 'right' : 'left';

		$selector = "gallery-{$instance}";

		$gallery_style = $gallery_div = '';
			
		$size_class = sanitize_html_class( $size );
		$gallery_div = '<section class="gallery-container"><div id="'. $selector .'" class="flexslider gallery-slider"><ul class="slides">';
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

		$i = 0;
		foreach ( $attachments as $id => $attachment ) {		
			add_filter('wp_get_attachment_image_attributes', 'unset', 10, 2);	
		
			$url = wp_get_attachment_url( $attachment->ID );
			$text = '';
			if ( trim( $text ) == '' )
				$text = $attachment->post_title;
			
			$crop = true; //resize but retain proportions
			$single = true; //return array
				
			if(!empty($url)){
				$url_resize = aq_resize($url, 817, 400, $crop, $single);
				if(!$url_resize){
					$url_resize = $url;
				}
			}
			$link = "$url_resize";

			$output .= "<{$itemtag}>";
			$output .= '<img src="'. $link .'"  alt="">';
			$output .= "</{$itemtag}>";
			if ( $columns > 0 && ++$i % $columns == 0 )
				$output .= '';
		}
		$output .= '</ul></div>';
		$output .= '<div class="carousel flexslider"><ul class="slides">';
		foreach ( $attachments as $id => $attachment ) {
			add_filter('wp_get_attachment_image_attributes', 'unsets', 10, 2);	
		
			$url = wp_get_attachment_url( $attachment->ID );
			if ( trim( $text ) == '' )
				$text = $attachment->post_title;
			
			$crop = true; //resize but retain proportions
			$single = true; //return array
				
			if(!empty($url)){
				$url_resize = aq_resize($url, 140, 100, $crop, $single);
				if(!$url_resize){
					$url_resize = $url;
				}
			}
			$link = "$url_resize";

			$output .= "<{$itemtag}>";
			$output .= '<img src="'. $link .'"  alt="">';
			$output .= "</{$itemtag}>";
			if ( $columns > 0 && ++$i % $columns == 0 )
				$output .= '';
		}

		$output .= '</ul></div><div class="sep"></div></section>';

		return $output;
	}

	function pix_unsets ($attr, $attachment){
		unset($attr['alt']); // Just deleting the alt attr
		return $attr;
	}
}
new Pixel8esShortcodes();

function shortcode_home_link() {
   return '<a href="'.home_url().'">'. get_bloginfo('name') .'</a>';
}
add_shortcode('blog-link', 'shortcode_home_link');