<?php

/*  Enqueue Google Fonts */
function electrify_theme_fonts() {
	global $smof_data;
	if (!is_admin()) {
		$protocol = is_ssl() ? 'https' : 'http';

		//Body Font
		$body_font = (isset($smof_data['custom_font_body']['g_face'])) ? trim(str_replace(' ','+',$smof_data['custom_font_body']['g_face'])) : 'Lato';
		$body_font .= (isset($smof_data['custom_font_body']['style'])) ? 
						':'.$smof_data['custom_font_body']['style'].','.$smof_data['custom_font_body']['style'].'italic,700,,700italic' :
						':400,400italic,700,700italic';

		//Heading Font
		$headings_font = (isset($smof_data['custom_font_primary']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['custom_font_primary']['g_face'])) : '|Raleway';
		$headings_font .= (isset($smof_data['custom_font_primary']['style'])) ? 
						':'.$smof_data['custom_font_primary']['style'].','.$smof_data['custom_font_primary']['style'].'italic,400' :
						':700,700italic';

		//Content Fonts custom_font_content
		$con_font = (isset($smof_data['custom_font_content']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['custom_font_content']['g_face'])) : '|Lato';
		$con_font .= (isset($smof_data['custom_font_content']['style'])) ? 
						':'.$smof_data['custom_font_content']['style'].','.$smof_data['custom_font_content']['style'].'italic,700' :
						':400,400italic,700';

		//Advanced font Settings
		$afs = isset($smof_data['ad_font_settings']) ? $smof_data['ad_font_settings'] : '0';	

		//Subset
		$raw_subsets = (isset($smof_data['subset'])) ? $smof_data['subset'] : array("latin" => 1);

		$font_subsets = '';
		foreach ($raw_subsets as $key => $value) {
			if($value){
				$font_subsets .= $key .',';
			}
		}
		$font_subsets = rtrim($font_subsets, ",");

		if($afs == '0'){

			//Finally Enqueue Google webfonts With choosen subsets
			wp_enqueue_style( 'electrify-theme-fonts', "$protocol://fonts.googleapis.com/css?family=$body_font$headings_font$con_font&subset=$font_subsets" );

		}else{

			//H1 Custom Font
			$h1 = (isset($smof_data['cf_h1']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_h1']['g_face'])) : '';
			$h1 .= (isset($smof_data['cf_h1']['style'])) ? ':'.$smof_data['cf_h1']['style'] : '';

			//H2 Custom Font
			$h2 = (isset($smof_data['cf_h2']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_h2']['g_face'])) : '';
			$h2 .= (isset($smof_data['cf_h2']['style'])) ? ':'.$smof_data['cf_h2']['style'] : '';

			//H3 Custom Font
			$h3 = (isset($smof_data['cf_h3']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_h3']['g_face'])) : '';
			$h3 .= (isset($smof_data['cf_h3']['style'])) ? ':'.$smof_data['cf_h3']['style'] : '';

			//H4 Custom Font
			$h4 = (isset($smof_data['cf_h4']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_h4']['g_face'])) : '';
			$h4 .= (isset($smof_data['cf_h4']['style'])) ? ':'.$smof_data['cf_h4']['style'] : '';

			//H5 Custom Font
			$h5 = (isset($smof_data['cf_h5']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_h5']['g_face'])) : '';
			$h5 .= (isset($smof_data['cf_h5']['style'])) ? ':'.$smof_data['cf_h5']['style'] : '';

			//H6 Custom Font
			$h6 = (isset($smof_data['cf_h6']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_h6']['g_face'])) : '';
			$h6 .= (isset($smof_data['cf_h6']['style'])) ? ':'.$smof_data['cf_h6']['style'] : '';

			//List Item Font
			$list = (isset($smof_data['cf_list']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_list']['g_face'])) : '';
			$list .= (isset($smof_data['cf_list']['style'])) ? ':'.$smof_data['cf_list']['style'] : '';

			//Link Font
			$link = (isset($smof_data['cf_link']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_link']['g_face'])) : '';
			$link .= (isset($smof_data['cf_link']['style'])) ? ':'.$smof_data['cf_link']['style'] : '';

			//Logo Font
			$logo = (isset($smof_data['cf_logo']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_logo']['g_face'])) : '';
			$logo .= (isset($smof_data['cf_logo']['style'])) ? ':'.$smof_data['cf_logo']['style'] : '';

			//BlockQuote Font
			$blockquote = (isset($smof_data['cf_blockquote']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_blockquote']['g_face'])) : '';
			$blockquote .= (isset($smof_data['cf_blockquote']['style'])) ? ':'.$smof_data['cf_blockquote']['style'] : '';

			//BlockQuote Font
			$menu = (isset($smof_data['cf_menu']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_menu']['g_face'])) : '';
			$menu .= (isset($smof_data['cf_menu']['style'])) ? ':'.$smof_data['cf_menu']['style'] : '';

			//Menu Font
			$menu = (isset($smof_data['cf_menu']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_menu']['g_face'])) : '';
			$menu .= (isset($smof_data['cf_menu']['style'])) ? ':'.$smof_data['cf_menu']['style'] : '';

			//Sub Menu Font
			$sub_menu = (isset($smof_data['cf_sub_menu']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_sub_menu']['g_face'])) : '';
			$sub_menu .= (isset($smof_data['cf_sub_menu']['style'])) ? ':'.$smof_data['cf_sub_menu']['style'] : '';

			//Mega Menu Font
			$mega_menu = (isset($smof_data['cf_mega_menu']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_mega_menu']['g_face'])) : '';
			$mega_menu .= (isset($smof_data['cf_mega_menu']['style'])) ? ':'.$smof_data['cf_mega_menu']['style'] : '';

			//Main Title Font
			$main_title = (isset($smof_data['cf_main_title']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_main_title']['g_face'])) : '';
			$main_title .= (isset($smof_data['cf_main_title']['style'])) ? ':'.$smof_data['cf_main_title']['style'] : '';

			//Button Font
			$btn = (isset($smof_data['cf_btn']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_btn']['g_face'])) : '';
			$btn .= (isset($smof_data['cf_btn']['style'])) ? ':'.$smof_data['cf_btn']['style'] : '';

			//Small Button Font
			$btn_small = (isset($smof_data['cf_btn_small']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_btn_small']['g_face'])) : '';
			$btn_small .= (isset($smof_data['cf_btn_small']['style'])) ? ':'.$smof_data['cf_btn_small']['style'] : '';

			//Large Button Font
			$btn_lg = (isset($smof_data['cf_btn_lg']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_btn_lg']['g_face'])) : '';
			$btn_lg .= (isset($smof_data['cf_btn_lg']['style'])) ? ':'.$smof_data['cf_btn_lg']['style'] : '';

			//Process Title Font
			$process_title = (isset($smof_data['cf_process_title']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_process_title']['g_face'])) : '';
			$process_title .= (isset($smof_data['cf_process_title']['style'])) ? ':'.$smof_data['cf_process_title']['style'] : '';

			//Process Content Font
			$process_content = (isset($smof_data['cf_process_content']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_process_content']['g_face'])) : '';
			$process_content .= (isset($smof_data['cf_process_content']['style'])) ? ':'.$smof_data['cf_process_content']['style'] : '';

			//Percent Text Font
			$percent_text = (isset($smof_data['cf_percent_text']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_percent_text']['g_face'])) : '';
			$percent_text .= (isset($smof_data['cf_percent_text']['style'])) ? ':'.$smof_data['cf_percent_text']['style'] : '';

			//Percent Outside Font
			$percent_outside = (isset($smof_data['cf_percent_outside']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_percent_outside']['g_face'])) : '';
			$percent_outside .= (isset($smof_data['cf_percent_outside']['style'])) ? ':'.$smof_data['cf_percent_outside']['style'] : '';

			//Textfield Font
			$txtfield = (isset($smof_data['cf_txtfield']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_txtfield']['g_face'])) : '';
			$txtfield .= (isset($smof_data['cf_txtfield']['style'])) ? ':'.$smof_data['cf_txtfield']['style'] : '';

			//Staff Title Font
			$staff_title = (isset($smof_data['cf_staff_title']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_staff_title']['g_face'])) : '';
			$staff_title .= (isset($smof_data['cf_staff_title']['style'])) ? ':'.$smof_data['cf_staff_title']['style'] : '';

			//Portfolio Filter Normal Font
			$filter_normal = (isset($smof_data['cf_filter_normal']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_filter_normal']['g_face'])) : '';
			$filter_normal .= (isset($smof_data['cf_filter_normal']['style'])) ? ':'.$smof_data['cf_filter_normal']['style'] : '';

			//Pricing Table Title Font
			$plan_title = (isset($smof_data['cf_plan_title']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_plan_title']['g_face'])) : '';
			$plan_title .= (isset($smof_data['cf_plan_title']['style'])) ? ':'.$smof_data['cf_plan_title']['style'] : '';

			//Pricing Table Price Font
			$plan_value = (isset($smof_data['cf_plan_value']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_plan_value']['g_face'])) : '';
			$plan_value .= (isset($smof_data['cf_plan_value']['style'])) ? ':'.$smof_data['cf_plan_value']['style'] : '';

			//Pricing Table Currency Font
			$plan_valign = (isset($smof_data['cf_plan_valign']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_plan_valign']['g_face'])) : '';
			$plan_valign .= (isset($smof_data['cf_plan_valign']['style'])) ? ':'.$smof_data['cf_plan_valign']['style'] : '';

			//Pricing Table Plan Month Font
			$plan_month = (isset($smof_data['cf_plan_month']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_plan_month']['g_face'])) : '';
			$plan_month .= (isset($smof_data['cf_plan_month']['style'])) ? ':'.$smof_data['cf_plan_month']['style'] : '';

			//Testimonial Content Font
			$testimonial_content = (isset($smof_data['cf_testimonial_content']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_testimonial_content']['g_face'])) : '';
			$testimonial_content .= (isset($smof_data['cf_testimonial_content']['style'])) ? ':'.$smof_data['cf_testimonial_content']['style'] : '';

			//Widget Title Font
			$widget_title = (isset($smof_data['cf_widget_title']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_widget_title']['g_face'])) : '';
			$widget_title .= (isset($smof_data['cf_widget_title']['style'])) ? ':'.$smof_data['cf_widget_title']['style'] : '';

			//Twitter Content Font
			$cf_twitter = (isset($smof_data['cf_twitter']['g_face'])) ? '|'.trim(str_replace(' ','+',$smof_data['cf_twitter']['g_face'])) : '';
			$cf_twitter .= (isset($smof_data['cf_twitter']['style'])) ? ':'.$smof_data['cf_twitter']['style'] : '';

			//Finally Enqueue Google webfonts With choosen subsets
			wp_enqueue_style( 'electrify-theme-fonts', "$protocol://fonts.googleapis.com/css?family=$body_font$headings_font$con_font$h1$h2$h3$h4$h5$h6$list$link$logo$blockquote$menu$sub_menu$mega_menu$main_title$btn$btn_small$btn_lg$process_title$process_content$percent_text$percent_outside$txtfield$staff_title$filter_normal$plan_title$plan_value$plan_valign$plan_month$testimonial_content$widget_title$cf_twitter&subset=$font_subsets" );

		}
	}
}
add_action( 'wp_enqueue_scripts', 'electrify_theme_fonts' );  


global $smof_data;
// Theme Primary Choosen Color
$theme_color = isset($smof_data['theme_color'])? $smof_data['theme_color'] : 'default';

$custom_styles = isset($smof_data['custom_styles'])? $smof_data['custom_styles'] : 0;

$pri_color = isset($smof_data['pri_color'])? $smof_data['pri_color'] : '';


if($custom_styles == 1 && !empty($pri_color)){	
	$pix_theme_pri_color = $pri_color;
}
else{
	if($theme_color == 'default'){
		$pix_theme_pri_color = '#fcc21f';
	}elseif($theme_color == 'skin-transportation'){
		$pix_theme_pri_color = '#0066cc';
	}elseif($theme_color == 'skin-corporate'){
		$pix_theme_pri_color = '#3c5895';
	}elseif($theme_color == 'blumine-blue'){
		$pix_theme_pri_color = '#174b73';
	}elseif($theme_color == 'copper-brown'){
		$pix_theme_pri_color = '#b07938';
	}elseif($theme_color == 'skin-music'){
		$pix_theme_pri_color = '#8dc63f';
	}elseif($theme_color == 'deluge'){
		$pix_theme_pri_color = '#8062ab';
	}elseif($theme_color == 'skin-personal'){
		$pix_theme_pri_color = '#79ba1e';
	}elseif($theme_color == 'skin-freelancer'){
		$pix_theme_pri_color = '#2bb673';
	}elseif($theme_color == 'havelock'){
		$pix_theme_pri_color = '#468ac9';
	}elseif($theme_color == 'highland-green'){
		$pix_theme_pri_color = '#679468';
	}elseif($theme_color == 'skin-education'){
		$pix_theme_pri_color = '#f26522';
	}elseif($theme_color == 'skin-portfolio'){
		$pix_theme_pri_color = '#f7941e';
	}elseif($theme_color == 'skin-food'){
		$pix_theme_pri_color = '#ff8b00';
	}elseif($theme_color == 'skin-sports'){
		$pix_theme_pri_color = '#c00e00';
	}elseif($theme_color == 'skin-creative'){
		$pix_theme_pri_color = '#f2333a';
	}elseif($theme_color == 'skin-shop'){
		$pix_theme_pri_color = '#e5403a';
	}elseif($theme_color == 'skin-beauty'){
		$pix_theme_pri_color = '#f27791';
	}elseif($theme_color == 'skin-medical'){
		$pix_theme_pri_color = '#0eb2e7';
	}elseif($theme_color == 'skin-wedding'){
		$pix_theme_pri_color = '#ff6473';
	}elseif($theme_color == 'skin-fitness'){
		$pix_theme_pri_color = '#9b3278';
	}elseif($theme_color == 'skin-minimal'){
		$pix_theme_pri_color = '#6bb6bb';
	}elseif($theme_color == 'skin-travel'){
		$pix_theme_pri_color = '#f75f2f';
	}elseif($theme_color == 'skin-creative-agency'){
		$pix_theme_pri_color = '#ed90a3';
	}elseif($theme_color == 'skin-advertising'){
		$pix_theme_pri_color = '#afd798';
	}elseif($theme_color == 'skin-consulting'){
		$pix_theme_pri_color = '#dda552';
	}elseif($theme_color == 'skin-studio'){
		$pix_theme_pri_color = '#69B553';
	}elseif($theme_color == 'skin-portfolio-minimal'){
		$pix_theme_pri_color = '#a3cdcc';
	}elseif($theme_color == 'skin-onepage'){
		$pix_theme_pri_color = '#ffc543';
	}elseif($theme_color == 'well-read'){
		$pix_theme_pri_color = '#b2353d';
	}else{
		$pix_theme_pri_color = '#fcc21f';
	}
}

//Menu Function
require_once (THEME_FUNCTIONS . '/pix-menu-extend/pix-menu-extend.php');
require_once (THEME_FUNCTIONS . '/PixIterator/Iterator.php');
require_once (THEME_FUNCTIONS . '/PixIterator/Icon.php');
require_once (THEME_FUNCTIONS . '/pix-like-me/like-me.php');

function pix_import_demo(){

	if ( !wp_verify_nonce( $_REQUEST['security'], "pix_import_nonce")) {
		exit("No naughty business please");
	}

	require_once (THEME_FUNCTIONS . '/pix-importer/pix-importer.php');

	die('pix_demo_import');
}
add_action( 'wp_ajax_pix_import_demo', 'pix_import_demo' );

/* WOO Cart */

function pix_woo_cart(){

	global $smof_data;
	$show_cart_btn = isset($smof_data['show_cart_btn'])? $smof_data['show_cart_btn'] : 1;
	if($show_cart_btn){

		if (class_exists('Woocommerce')) {
			global $woocommerce; 
			echo '<div class="pix-cart">';
	?>      

			<div class="cart-trigger">
				<div class="pix-cart-contents-con">
					<span class="pix-no-items"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'pixel8es'), $woocommerce->cart->cart_contents_count);?></span> 
					<span class="pix-woo-price"><?php echo $woocommerce->cart->get_cart_total(); ?></span>
					
					<a class="pix-cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'pixel8es'); ?>"><span class="pixicon-basket pix-cart-icon"></span><span class="pix-item-icon"><?php echo $woocommerce->cart->cart_contents_count; ?></span></a>
				</div>

				<?php
					if( !is_cart() && !is_checkout()){
						//Dropwon widget 
						echo '<div class="woo-cart-dropdown">';
							the_widget('WC_Widget_Cart');
						echo '</div>';
					}
				?>

			</div>
			   
	<?php    
			echo '</div>';

		}

	}
}

/* Header Elements */
function display_header_elemments($elems, $header_pos = 'default-header-lang', $page_side = ''){

	if( $elems == 'cinfo' ){

		echo pix_header_contact_info();

	}elseif( $elems == 'lang' ){

		if(class_exists('SitePress')){
			echo '<div class="'.$header_pos. ' '. $page_side .'">';
			pix_languages_list(); 
			echo '</div>';
		}

	}elseif( $elems == 'cart' ){

		pix_woo_cart();

	}elseif( $elems == 'sicons' ){

		echo pix_social_icons();

	}elseif( $elems == 'menu' ){

		pixel8es_top_nav();

	}elseif( $elems == 'cinfo_lang' ){

		echo pix_header_contact_info();
		if(class_exists('SitePress')){
			echo '<div class="'.$header_pos. ' '. $page_side .'">';
			pix_languages_list(); 
			echo '</div>';
		}
		
	}elseif( $elems == 'cinfo_cart' ){

		echo pix_header_contact_info();
		pix_woo_cart();
		
	}elseif( $elems == 'sicons_cart' ){

		pix_woo_cart();
		echo pix_social_icons();
		
	}elseif( $elems == 'lang_cart' ){

		if(class_exists('SitePress')){
			echo '<div class="'.$header_pos. ' '. $page_side .'">';
			pix_languages_list(); 
			echo '</div>';
		}
		pix_woo_cart();
		
	}elseif( $elems == 'menu_cart' ){

		pixel8es_top_nav();
		pix_woo_cart();
		
	}elseif( $elems == 'menu_lang' ){

		pixel8es_top_nav();
		if(class_exists('SitePress')){
			echo '<div class="'.$header_pos. ' '. $page_side .'">';
			pix_languages_list(); 
			echo '</div>';
		}
		
	}elseif( $elems == 'search' ){

		get_search_form();
		
	}elseif( $elems == 'search_sicons' ){

		echo pix_social_icons();
		get_search_form();

	}elseif( $elems == 'search_icon' ){
		echo pix_header_search();
	}
}

/* =============================================================================
Icon Font Array
========================================================================== */
// use PixIterator\Iterator as PixIterator;

$pix_icons = new PixIterator(get_template_directory().'/library/css/pix-icons.css','pixicon');
$pix_icons_class_html = '';
//$pix_icons_class_html = '<i class="no-icon"></i>';
$pix_icons_class_array = array('none');

foreach ($pix_icons as $icon) {
	$pix_icons_class_array[] = $icon->class;
	$pix_icons_class_html .= '<i class="'.$icon->class.'"></i> ';
}

/* =============================================================================
Page Headers
========================================================================== */
//Social Icons
function pix_social_icons() {
	global $smof_data;
	$facebook = isset($smof_data['top_facebook']) ? $smof_data['top_facebook'] : '';
	$twitter = isset($smof_data['top_twitter']) ? $smof_data['top_twitter'] : '';
	$gplus = isset($smof_data['top_gplus']) ? $smof_data['top_gplus'] : '';
	$linkedIn = isset($smof_data['top_linkedin']) ? $smof_data['top_linkedin'] : '';
	$dribble = isset($smof_data['top_dribble']) ? $smof_data['top_dribble'] : '';
	$flickr = isset($smof_data['top_flickr']) ? $smof_data['top_flickr'] : '';
	$pinterest = isset($smof_data['top_pinterest']) ? $smof_data['top_pinterest'] : '';
	$tumblr  = isset($smof_data['top_tumblr']) ? $smof_data['top_tumblr'] : '';
	$rss = isset($smof_data['top_rss']) ? $smof_data['top_rss'] : '';

	$social_icons = '<p class="pull-right social-icons">';

	if( !empty($facebook)) {
		$social_icons .= '<a href="'.esc_attr(esc_url($facebook)).'" target="_blank" title="Facebook" class="facebook"><i class="pixicon-facebook"></i></a>';
	}

	if( !empty($twitter)) {
		$social_icons .= '<a href="'.esc_attr(esc_url($twitter)).'" target="_blank" title="Twitter" class="twitter"><i class="pixicon-twitter"></i></a>';
	}

	if( !empty($gplus)) {
		$social_icons .= '<a href="'. esc_attr(esc_url($gplus)).'" target="_blank" title="Gplus" class="google-plus"><i class="pixicon-fontawesome-webfont-145"></i></a>';
	}

	if( !empty($linkedIn)) {
		$social_icons .= '<a href="'. esc_attr(esc_url($linkedIn)).'" target="_blank" title="linkedin" class="linkedin"><i class="pixicon-linkedin"></i></a>';
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

	if( !empty($rss )) {
		$social_icons .= '<a href="'. esc_attr(esc_url($rss)).'" target="_blank" title="RSS" class="rss"><i class="pixicon-rss"></i></a>';
	}

	$social_icons .= '</p>';

	return $social_icons;
}

// Header Info
function pix_header_contact_info() {
	global $smof_data;
	$top_tel = isset($smof_data['top_tel']) ? $smof_data['top_tel'] : '';
	$top_email = isset($smof_data['top_email']) ? $smof_data['top_email'] : '';

	$header_info = '<p class="top-details clearfix">';

	if( !empty($top_tel)) { 
		$header_info .= '<span class="pull-left"><i class="pixicons pixicon-telephone"></i>'.$top_tel.'</span>';
	}
	if( !empty($top_email)) {
		$header_info .= '<span class="pull-left"><a href="mailto:'. $top_email .'"><i class="pixicons pixicon-mail"></i> '. $top_email .'</a></span>';
	}
	$header_info .= '</p>';

	return $header_info;
}

// Header Search
function pix_header_search() {
	global $smof_data;
	$search = isset($smof_data['top_search']) ? $smof_data['top_search'] : '1';
	$search_text = isset($smof_data['search_text']) ? $smof_data['search_text'] : 'Search';
	if( $search == 1) {
		$form = '<div class="search-btn"><i class="pix-icon pixicon-fontawesome-webfont-304"></i><form role="search" method="get" class="topSearchForm" action="' . home_url( '/' ) . '" ><div class="arrow"></div><input type="text" value="' . get_search_query() . '" name="s" class="textfield" placeholder="'.esc_attr($search_text).'"></form></div>';
	}else{
		$form = '';
	}
	return $form;
}

// functions run on activation –> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}

//Breadcrumbs
function breadcrumbs($color = '') {

$showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
$delimiter = ''; // delimiter between crumbs
$home = 'Home'; // text for the 'Home' link
$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
$before = '<span class="current" '. $color .'>'; // tag before the current crumb
$after = '</span>'; // tag after the current crumb

global $post;
$homeLink = home_url();

if (is_home() || is_front_page()) {

	if ($showOnHome == 1) echo '<ul class="breadcrumb"><li><a href="' . $homeLink . '">' . ucwords($home) . '</a></li></ul>';

} else {

	echo '<ul class="breadcrumb" itemprop="breadcrumb"><li><a href="' . $homeLink . '">' . ucwords($home) . '</a> ' . $delimiter . '</li>';

	if ( is_category() ) {
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category($thisCat);
		$parentCat = get_category($thisCat->parent);
		if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		echo '<li>' .$before . 'Category: "' . single_cat_title('', false) . '"' . $after.'</li>';

	} elseif ( is_search() ) {
		echo '<li>' . $before . 'Search results: "' . get_search_query() . '"' . $after .'</li>';

	} elseif ( is_day() ) {
		echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li>';
		echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . '</li>';
		echo '<li>' . $before . get_the_time('d') . $after . '</li>';

	} elseif ( is_month() ) {
		echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li>';
		echo '<li>' . $before . get_the_time('F') . $after . '</li>';

	} elseif ( is_year() ) {
		echo '<li>' . $before . get_the_time('Y') . $after . '</li>';

	} elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
//echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . ucwords($post_type->labels->singular_name) . '</a></li>';
//if ($showCurrent == 1) echo '<li>' . $delimiter . ' ' . $before . ucwords(get_the_title()) . $after . '</li>';
			if ($showCurrent == 1) echo '<li> ' . $before . ucwords(get_the_title()) . $after . '</li>';
		} else {
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			if ($showCurrent == 0) $cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
			echo '<li>'. $before .$cats. $after . '</li>';
			if ($showCurrent == 1) echo '<li>'. $before . ucwords(ShortenText(get_the_title(),20)) . $after . '</li>';
		}

	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		$post_type = get_post_type_object(get_post_type());
		echo '<li>'. $before . ucwords($post_type->labels->singular_name) . $after.'</li>';

	} elseif ( is_attachment() ) {
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); 
		if(!empty($cat)){
			$cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		}
		echo '<li><a href="' . get_permalink($parent) . '">' . ucwords($parent->post_title) . '</a></li>';
		if ($showCurrent == 1) echo '<li>' . $delimiter . ' ' . $before . ucwords(get_the_title()) . $after . '</li>';

	} elseif ( is_page() && !$post->post_parent ) {
		if ($showCurrent == 1) echo '<li>' . $before . ucwords(get_the_title()) . $after .'</li>';

	} elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . ucwords(get_the_title($page->ID)) . '</a></li>';
			$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) {
			echo $breadcrumbs[$i];
			if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
		}
		if ($showCurrent == 1) echo '<li>' . $delimiter . ' ' . $before . ucwords(get_the_title()) . $after . '<li>';

	} elseif ( is_tag() ) {
		echo '<li>' . $before . 'Posts Tag: "' . ucwords(single_tag_title('', false) . '"') . $after . '</li>';

	} elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata($author);
		echo '<li>' .$before . 'Posted By: ' . ucwords($userdata->display_name) . $after .'</li>';

	} elseif ( is_404() ) {
		echo '<li>' .$before . 'Error 404' . $after .'</li>';
	}

	if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page', 'pixel8es') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
}

echo '</ul>';

}
}

//New Excerpt
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//New Excerpt
function electrify_custom_excerpt_length( $length ) {
	global $smof_data;
	$blog_description_length = isset($smof_data['blog_description_length']) ? $smof_data['blog_description_length'] : '';
	if(empty($blog_description_length)){
		$blog_description_length = 580;
	}
	return $blog_description_length;
}
add_filter( 'excerpt_length', 'electrify_custom_excerpt_length', 999 );

//ShortenText
function ShortenText($text , $no_of__limit)
{
	$chars_limit = $no_of__limit;
	$chars_text = strlen($text);
	$text = $text." ";
	$text = substr($text,0,$chars_limit);
	$text = substr($text,0,strrpos($text,' '));
	if ($chars_text > $chars_limit)
	{

		$text = $text."...";

	}
	return $text;
}

//Resizing slider image
function get_attachment_id_from_src($image_src) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}

function subBanner($title){

	global $smof_data, $pix_header_text, $header_size, $pix_header_styles, $header_bg_image, $header_bg_color, $header_text_color,$hide_breadcrumbs;
	$s_header = isset($smof_data['header_option']) ? 'sub_'.$smof_data['header_option'] : 'sub_header1';
	$s_header_trans = isset($smof_data['header_transparency']) ? $smof_data['header_transparency'] : 0;

	$color = $class_con = $class_left = $class_right = $style = '';

	if($pix_header_text == 'left'){
		$class_left = 'col-md-8 col-sm-8';
		$class_right = 'col-md-4 col-sm-4';
		$class_con = 'row';
	}
	
	if(($pix_header_styles == 'image' || $pix_header_styles == 'customcolor') && (!empty($header_bg_image) || !empty($header_bg_color) || !empty($header_text_color))){

		$style .= ' style="';

			if( $pix_header_styles == 'customcolor' && !empty($header_bg_color)){
				$style .= !empty($header_bg_color) ? 'background-color:'. $header_bg_color .';' : '';
			}

			if( $pix_header_styles == 'image' && !empty($header_bg_image)){
				$style .= 'background-image: url('.$header_bg_image.');';
				$style .= 'background-size: cover;';
				$style .= 'background-repeat: no-repeat;background-position: center center;';
			}

			if( $pix_header_styles != 'color' && !empty($header_text_color)){
				$color = !empty($header_text_color) ? 'style="color:'. $header_text_color .';"' : '';
			}

		$style .= '"';
	}

	echo '<div id="sub-header" class="clear '. $s_header .' '. (($s_header_trans) ? 'header-trans' : '') .' clearfix align-'. $pix_header_text .' '. $header_size .' '. $pix_header_styles .'" '. $style .'>
	<div class="container">
	<div id="banner" class="sub-header-inner '.$class_con.'">
		<header class="banner-header '. $class_left .'">
			<h2 class="border-line" '. $color .'>' . $title . ' <span class="line"></span></h2>
		</header>
		<div class="pix-breadcrumbs '. $class_right .'">';
			//$breadcrumbs = isset($smof_data['breadcrumbs']) ? $smof_data['breadcrumbs'] : '1';
			$breadcrumbs_blog = isset($smof_data['b_breadcrumbs']) ? $smof_data['b_breadcrumbs'] : 'Blog';

			if($hide_breadcrumbs == 'show'){

				if(function_exists('breadcrumbs')){
					if ( !is_home() ){
						breadcrumbs($color);
					}    
					elseif (is_home()){
						echo '<ul class="breadcrumb"><li><a href="' . home_url() . '">Home</a></li><li> <span class="current" '. $color .'> '. $breadcrumbs_blog .'</span></li></ul>';
					}       
				}
			}

			echo '</div></div>
		</div>   
	</div>';    
}

function electrify_admin_scripts($hook_suffix) {	

	if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
		//styles
		wp_enqueue_style( 'metabox-css', THEME_CUSTOM_METABOXES_URI. '/css/metabox.css' );

		//Scripts
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'custom_admin_js',   THEME_FRAMEWORK_URI .'/admin-js/admin.js', array( 'jquery', 'wp-color-picker' ), '3.0');
		wp_enqueue_script( 'pix_media_manager', THEME_FRAMEWORK_URI .'/admin-js/media-upload.js', array( 'jquery','jquery-ui-sortable' ), '3.0');
		
		//Load Icon fonts, Font css and icon inserter plugin
		//Loading Css
		wp_enqueue_style('menu_font_style'	, get_template_directory_uri() ."/library/css/pix-icons.css", array(),'3.0');
		wp_enqueue_style('menu_style', THEME_FUNCTIONS_URI ."/pix-menu-extend/css/style.css", array(),'3.0');
	}elseif(isset($_GET['vc_action']) && ($_GET['vc_action'] == 'vc_inline')){
		//Loading Css
		wp_enqueue_style('menu_font_style'	, get_template_directory_uri() ."/library/css/pix-icons.css", array(),'3.0');
		wp_enqueue_style('menu_style', THEME_FUNCTIONS_URI ."/pix-menu-extend/css/style.css", array(),'3.0');
		wp_enqueue_style('pix-vc-front-css', THEME_FRAMEWORK_URI ."/admin-js/vc-front-style.css", array(),'3.0');
		wp_enqueue_script( 'pix-front-waypoints', get_stylesheet_directory_uri() . '/library/js/waypoints.min.js', array( 'jquery' ), '2.0.4', true );
		wp_enqueue_script( 'pix-front-plugins-js', get_stylesheet_directory_uri() . '/library/js/plugins.js', array( 'jquery', 'underscore', 'backbone', 'wpb_js_composer_js_tools', 'vc_inline_shortcodes_builder_js', 'vc_inline_panels_js','pix-front-waypoints' ), '3.0', true );

		wp_enqueue_script( 'pixel8es-front-js', get_stylesheet_directory_uri() . '/library/js/vc-front-scripts.js', array( 'jquery', 'underscore', 'backbone', 'wpb_js_composer_js_tools', 'vc_inline_shortcodes_builder_js', 'vc_inline_panels_js','pix-front-waypoints','pix-front-plugins-js' ), '3.0', true );

		wp_enqueue_script( 'pix_inline_custom_view_js', THEME_FRAMEWORK_URI . '/admin-js/custom-views.js', array( 'jquery', 'underscore', 'backbone', 'wpb_js_composer_js_tools', 'vc_inline_shortcodes_builder_js', 'vc_inline_panels_js','pix-front-waypoints','pix-front-plugins-js' ), '3.0', true );
			
	}
}
add_action( 'admin_enqueue_scripts', 'electrify_admin_scripts' );


/************* CUSTOM LOGIN PAGE ****************

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function electrify_login_css() {
wp_enqueue_style( 'electrify_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function electrify_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function electrify_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'electrify_login_css', 10 );
add_filter( 'login_headerurl', 'electrify_login_url' );
add_filter( 'login_headertitle', 'electrify_login_title' );*/



/**
* Retina images
*
* This function is attached to the 'wp_generate_attachment_metadata' filter hook.
*/
function retina_support_attachment_meta( $metadata, $attachment_id ) {
	foreach ( $metadata as $key => $value ) {
		if ( is_array( $value ) ) {
			foreach ( $value as $image => $attr ) {
				if ( is_array( $attr ) )
					retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
			}
		}
	}

	return $metadata;
}
add_filter( 'wp_generate_attachment_metadata', 'retina_support_attachment_meta', 10, 2 );

/**
* Create retina-ready images
*
* Referenced via retina_support_attachment_meta().
*/
function retina_support_create_images( $file, $width, $height, $crop = false ) {
	if ( $width || $height ) {
		$resized_file = wp_get_image_editor( $file );
		if ( ! is_wp_error( $resized_file ) ) {
			$filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );

			$resized_file->resize( $width * 2, $height * 2, $crop );
			$resized_file->save( $filename );

			$info = $resized_file->get_size();

			return array(
				'file' => wp_basename( $filename ),
				'width' => $info['width'],
				'height' => $info['height'],
				);
		}
	}
	return false;
}


/**
* Delete retina-ready images
*
* This function is attached to the 'delete_attachment' filter hook.
*/
function delete_retina_support_images( $attachment_id ) {
	$meta = wp_get_attachment_metadata( $attachment_id );
	$upload_dir = wp_upload_dir();
	$path = pathinfo( $meta['file'] );
	foreach ( $meta as $key => $value ) {
		if ( 'sizes' === $key ) {
			foreach ( $value as $sizes => $size ) {
				$original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
				$retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
				if ( file_exists( $retina_filename ) )
					unlink( $retina_filename );
			}
		}
	}
}
add_filter( 'delete_attachment', 'delete_retina_support_images' );

//Seperate font weight & font Style

if(!function_exists('pix_font_variant')){
	function pix_font_variant($fv = ''){

	    //Font Style
	    if(stristr($fv, 'italic') !== FALSE){
	        $fs = 'italic';
	    }else{
	        $fs = 'normal';
	    }

	    //Font Weight
	    $fw = substr($fv, 0, 3);
	    if($fw === FALSE || $fw == 'reg' || $fw == 'ita'){
	        $fw = '400';
	    }

	    return array($fs, $fw);
	}
}

// convert hex to rgba
function hex2rgb($hex) {
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
return implode(",", $rgb); // returns the rgb values separated by commas
//return $rgb; // returns an array with the rgb values
}

function electrify_formsubmit(){

	if ( !wp_verify_nonce( $_REQUEST['nonce'], "electrify_ajax_form_nonce")) {
		exit("No naughty business please");
	}

	global $smof_data;

	$contact_success = isset($smof_data['contact_success']) ? $smof_data['contact_success'] : '';
	$contact_error = isset($smof_data['contact_error']) ? $smof_data['contact_error'] : '';

	if(empty($contact_success)){
		$contact_success = isset($smof_data['contact_success']) ? $smof_data['contact_success'] : '<strong>Email Successfully Sent!</strong><br>Thanks for contacting Us. Your email was successfully sent and we will be in touch with you soon.';
	}

	if(empty($contact_error)){
		$contact_error = __('Please check if you have filled all the fields with valid information and try again. Thank you.','pixel8es');
	}


$yourEmailAddress = (isset($_POST['sendto']) && !empty($_POST['sendto'])) ? $_POST['sendto']  : get_option( 'admin_email'); //Put your own email address here.

//Check to make sure that the name field is not empty
if(trim($_POST['contactname']) == '') {
	$hasError = true;
} else {
	$name = trim($_POST['contactname']);
}

//Check to make sure that the subject field is not empty
if(trim($_POST['subject']) == '') {
	$hasError = true;
} else {
	$subject = trim($_POST['subject']);
}

//Check to make sure sure that a valid email address is submitted
if(trim($_POST['email']) == '')  {
	$hasError = true;
} else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", trim($_POST['email']))) {
	$hasError = true;
} else {
	$email = trim($_POST['email']);
}

//Check to make sure comments were entered
if(trim($_POST['message']) == '') {
	$hasError = true;
} else {
	if(function_exists('stripslashes')) {
		$comments = stripslashes(trim($_POST['message']));
	} else {
		$comments = trim($_POST['message']);
	}
}

//If there is no error, send the email
if(!isset($hasError)) {
	$emailTo = $yourEmailAddress;
	$body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nMessage:\n $comments";
	$headers = 'From: electrify Template <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
	wp_mail($emailTo, $subject, $body, $headers);
	echo'<div id="success" class="sent success"><p>'.$contact_success.'.</p><br></div>';
} else { //If errors are found
	echo '<p class="error">'.$contact_error.'</p>';
}
die();
}

add_action("wp_ajax_electrify_submit_form", "electrify_formsubmit");
add_action("wp_ajax_nopriv_electrify_submit_form", "electrify_formsubmit");

/*
* Twitter Helper functions
*/
function make_twitter($tweet) {
	$tweet = preg_replace('/(^|\s)@(\w+)/','\1@<a href="http://www.twitter.com/\2">\2</a>',$tweet);
	return preg_replace('/(^|\s)#(\w+)/','\1#<a href="http://search.twitter.com/search?q=%23\2">\2</a>',$tweet);
	return $tweet;
}

function link_it($text)
{
	$text= preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@','<a href="$1">$1</a>', $text);
	return($text);
}

function get_elapsedtime($time) {

	$gap = time() - $time;

	if ($gap < 5) {
		return 'less than 5 seconds ago';
	} else if ($gap < 10) {
		return 'less than 10 seconds ago';
	} else if ($gap < 20) {
		return 'less than 20 seconds ago';
	} else if ($gap < 40) {
		return 'half a minute ago';
	} else if ($gap < 60) {
		return 'less than a minute ago';
	}

	$gap = round($gap / 60);
	if ($gap < 60)  { 
		return $gap.' minute'.($gap > 1 ? 's' : '').' ago';
	}

	$gap = round($gap / 60);
	if ($gap < 24)  { 
		return 'about '.$gap.' hour'.($gap > 1 ? 's' : '').' ago';
	}

//return date('h:i A M d, Y', $time);

	return date('M d', $time);

}

/*
* End of Twitter Helper functions
*/

/**
* Modifies WordPress's built-in comments_popup_link() function to return a string instead of echo comment results
*/
function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
	global $wpcommentspopupfile, $wpcommentsjavascript;

	$id = get_the_ID();

	if ( false === $zero ) $zero = __( 'No Comments', 'pixel8es' );
	if ( false === $one ) $one = __( '1 Comment', 'pixel8es' );
	if ( false === $more ) $more = __( '% Comments', 'pixel8es' );
	if ( false === $none ) $none = __( 'Comments Off', 'pixel8es' );

	$number = get_comments_number( $id );

	$str = '';

	if ( 0 == $number && !comments_open() && !pings_open() ) {
		$str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
		return $str;
	}

	if ( post_password_required() ) {
		$str = __('Enter your password to view comments.', 'pixel8es');
		return $str;
	}

	$str = '<a href="';
	if ( $wpcommentsjavascript ) {
		if ( empty( $wpcommentspopupfile ) )
			$home = home_url();
		else
			$home = get_option('siteurl');
		$str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
		$str .= '" onclick="wpopen(this.href); return false"';
} else { // if comments_popup_script() is not in the template, display simple comment link
	if ( 0 == $number )
		$str .= get_permalink() . '#respond';
	else
		$str .= get_comments_link();
	$str .= '"';
}

if ( !empty( $css_class ) ) {
	$str .= ' class="'.$css_class.'" ';
}
$title = the_title_attribute( array('echo' => 0 ) );

$str .= apply_filters( 'comments_popup_link_attributes', '' );

$str .= ' title="' . esc_attr( sprintf( __('Comment on %s', 'pixel8es'), $title ) ) . '">';
$str .= get_comments_number_str( $zero, $one, $more );
$str .= '</a>';

return $str;
}

/**
* Modifies WordPress's built-in comments_number() function to return string instead of echo
*/
function get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
	if ( !empty( $deprecated ) )
		_deprecated_argument( __FUNCTION__, '1.3' );

	$number = get_comments_number();

	if ( $number > 1 )
		$output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments', 'pixel8es') : $more);
	elseif ( $number == 0 )
		$output = ( false === $zero ) ? __('No Comments', 'pixel8es') : $zero;
else // must be one
$output = ( false === $one ) ? __('1 Comment', 'pixel8es') : $one;

return apply_filters('comments_number', $output, $number);
}


//Set Post Views
function wpb_set_post_views($postID) {

	$count_key = 'wpb_post_views_count';

	$count = get_post_meta($postID, $count_key, true);

	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');

	}
	else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

//To keep the count accurate, lets get rid of prefetching

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/************* WooCommerce *****************/
if (class_exists('Woocommerce')) {
	// Disable woocommerce css
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	//Reposition WooCommerce breadcrumb 
	function woocommerce_remove_breadcrumb(){
		remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
	}
	add_action('woocommerce_before_main_content', 'woocommerce_remove_breadcrumb');

	function woocommerce_custom_breadcrumb(){
		woocommerce_breadcrumb();
	}
	add_action( 'woo_custom_breadcrumb', 'woocommerce_custom_breadcrumb' );

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

	remove_action( 'woocommerce_after_single_product', 'woocommerce_template_loop_add_to_cart', 10);
	
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);

	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
	add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	 
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		
		ob_start();
		
		?>
		<div class="pix-cart-contents-con">
			<span class="pix-no-items"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'pixel8es'), $woocommerce->cart->cart_contents_count);?></span> <span class="pix-woo-price"><?php echo $woocommerce->cart->get_cart_total(); ?></span>
			
			<a class="pix-cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'pixel8es'); ?>"><span class="pixicon-basket pix-cart-icon"></span><span class="pix-item-icon"><?php echo $woocommerce->cart->cart_contents_count; ?></span></a>
		</div>
		<?php
		
		$fragments['div.pix-cart-contents-con'] = ob_get_clean();
		
		return $fragments;
		
	}
}


/* WMPL */
function pix_languages_list(){
	if(class_exists('SitePress')){
	
		global $smof_data;

		$show_lang_sel = isset($smof_data['show_lang_sel'])? $smof_data['show_lang_sel'] : 1;

		if($show_lang_sel){
			$lang_display_style = isset($smof_data['wpml_lang_style'])? $smof_data['wpml_lang_style'] : 'normal'; //normal, dropdown
			$lang_list_style = isset($smof_data['language_style'])? $smof_data['language_style'] : 'lang_code'; // lang_code (en / fr / ta), lang_name (english, tamil, french), flag, flag_with_name

			$languages = icl_get_languages('skip_missing=1&orderby=code');
			//var_dump($languages);

			$lang_count = count($languages);
			$count = 1;

			if(1 < $lang_count){
				$trans_status = __('translated', 'pixel8es');			
			}else{
				$trans_status = __('not-translated', 'pixel8es');
			}

			if(!empty($languages)){
				echo '<div id="lang-list" class="lang-'. $lang_display_style .' '. $lang_list_style .' '. $trans_status .'" >';
				if($lang_display_style == 'dropdown'){
						//Check If Drop-down Add Current
						if($lang_display_style == 'dropdown'){

							echo '<div id="lang-dropdown-btn">';
								foreach($languages as $l){
									if($l['active']){
										if($lang_list_style == 'lang_code'){
											echo $l['language_code'];
										}elseif ($lang_list_style == 'lang_name') {
											echo icl_disp_language($l['native_name'], $l['translated_name']);
										}elseif ($lang_list_style == 'flag') {
											if($l['country_flag_url']){
												echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
											}
										}else{
											if($l['country_flag_url']){
												echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
												echo ' ' . icl_disp_language($l['native_name'], $l['translated_name']);
											}
										}
										break;
									}
								}
							if(1 < $lang_count){	
								echo '<span class="pixicon-eleganticons-18"></span></div>';
							}
							else{
								echo '<span class="already-liked">'. __('Not Translated','pixel8es') .'</span></div>';
							}
						}

					echo '<div class="lang-dropdown-inner" '. (1 < count($languages))  .'>';
				}

				foreach($languages as $l){

					if($l['active']){
						$active_class = ' class="active"';
					}else{
						$active_class = '';
					}
					// lang_code(en / fr / ta)
					if($lang_list_style == 'lang_code'){

						echo '<a href="'.$l['url'].'"'. $active_class .'>';
						echo $l['language_code'];
						echo '</a>';

						if($count != $lang_count && $lang_display_style != 'dropdown'){
							echo '<span class="slash">/</span>';
						}

					}
					 // lang_name (english, tamil, french)
					elseif ($lang_list_style == 'lang_name') {

						echo '<a href="'.$l['url'].'"'. $active_class .'>';
						echo icl_disp_language($l['native_name'], $l['translated_name']);
						echo '</a>';

						if($count != $lang_count && $lang_display_style != 'dropdown'){
							echo '<span class="slash">/</span>';
						}
					}
					// display flag
					elseif ($lang_list_style == 'flag'){

						if($l['country_flag_url']){
							echo '<a href="'.$l['url'].'"'. $active_class .'>';
							echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
							echo '</a>';
						}
					}
					// flag with name
					elseif($lang_list_style == 'flag_with_name'){
						
						if($l['country_flag_url']){
							echo '<a href="'.$l['url'].'"'. $active_class .'>';
							echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
							echo ' ' . icl_disp_language($l['native_name'], $l['translated_name']);
							echo '</a>';
						}
				
					}
					$count++;
				}

				if($lang_display_style == 'dropdown'){
					echo '</div>';
				}
				echo '</div>';
			}
		}
	}
}