<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
			$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
		   
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
			$of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Ajax Style
		$ajax_style = array("style1" => "Style1","style2" => "Style2", "style3" => "Style3", "style4" => "Style4", "style5" => "Style5", "style6" => "Style6", "style7" => "Style7", "style8" => "Style8", "style9" => "Style9", "style10" => "Style10");

		//Ajax Animation Style
		$ajax_trans_in = array("fadeIn" => "Fade In", "fadeInUp" => "Fade In Up", "fadeInDown" => "Fade In Down", "fadeInLeft" => "Fade In Left", "fadeInRight" => "Fade In Right", "zoomIn" => "Zoom In", "zoomInUp" => "Zoom In Up", "zoomInDown" => "Zoom In Down", "zoomInLeft" => "Zoom In Left", "zoomInRight" => "Zoom In Right");
		$ajax_trans_out = array("fadeOut" => "Fade Out", "fadeOutUp" => "Fade Out Up", "fadeOutDown" => "Fade Out Down", "fadeOutLeft" => "Fade Out Left", "fadeOutRight" => "Fade Out Right", "zoomOut" => "Zoom Out", "zoomOutUp" => "Zoom Out Up", "zoomOutDown" => "Zoom Out Down", "zoomOutLeft" => "Zoom Out Left", "zoomOutRight" => "Zoom Out Right");

		//Preloader Animation Style
		$preloader_trans_in = array("fadeIn" => "Fade In", "fadeInUp" => "Fade In Up", "fadeInDown" => "Fade In Down", "fadeInLeft" => "Fade In Left", "fadeInRight" => "Fade In Right", "zoomIn" => "Zoom In", "zoomInUp" => "Zoom In Up", "zoomInDown" => "Zoom In Down", "zoomInLeft" => "Zoom In Left", "zoomInRight" => "Zoom In Right");

		//Single Portfolio
		$style = array("style1" => "Style1","style2" => "Style2", "style3" => "Style3", "style4" => "Style4", "style5" => "Style5", "style6" => "Style6");

		//Blog & Single Blog & Archives
		$sidebar = array("left" => "Left Sidebar","right" => "Right Sidebar","no_sidebar" => "No Sidebar");
		$blog_styles = array("timeline" => "Time Line","masonry" => "Masonry","grid" => "Grid", "normal" => "Normal", "normal_small" => "Normal Small Image", "masonry_with_sb" => "Masonry with Sidebar","grid_with_sb" => "Grid with Sidebar", "normal_with_sb" => "Normal with Sidebar","normal_small_with_sb" => "Normal Small Image with Sidebar");

		$animation = array("flash" => "flash", "bounce" => "bounce","shake" => "shake", "tada" => "tada", "swing" => "swing", "wobble" => "wobble", "pulse" => "pulse", "flip" => "flip", "flipInX" => "flipInX", "flipInY" => "flipInY", "fadeIn" => "fadeIn", "fadeInUp" => "fadeInUp", "fadeInDown" => "fadeInDown", "fadeInLeft" => "fadeInLeft", "fadeInRight" => "fadeInRight", "fadeInUpBig" => "fadeInUpBig", "fadeInDownBig" => "fadeInDownBig", "fadeInLeftBig" => "fadeInLeftBig", "fadeInRightBig" => "fadeInRightBig", "slideInDown" => "slideInDown", "slideInLeft" => "slideInLeft", "slideInRight" => "slideInRight", "bounceIn" => "bounceIn", "bounceInUp" => "bounceInUp", "bounceInDown" => "bounceInDown", "bounceInLeft" => "bounceInLeft", "bounceInRight" => "bounceInRight", "rotateIn" => "rotateIn", "rotateInDownLeft" => "rotateInDownLeft","rotateInDownRight" => "rotateInDownRight", "rotateInUpLeft" => "rotateInUpLeft", "rotateInUpRight" => "rotateInUpRight", "lightSpeedIn" => "lightSpeedIn", "hinge" => "hinge", "rollIn" =>"rollIn");

		$post_icon = array("round" => "Round","square" => "Square");
		$order_by = array("date" => "Date","title" => "Title", "rand" => "Random"); 
		$order = array("asc" => "Ascending","desc" => "Descending");
		$sub_header_size = array("small" => "Small","medium" => "Medium","large" => "Large");
		$sub_header_bg_style = array("color" => "Default Background Color","image" => "Background Image","customcolor" => "Custom Background Color");

		//Search Result
		if (class_exists('Woocommerce')) {
			$search_exclude = array("post" => "Post","page" => "Page","product" => "Product","pix_staffs" => "Staffs","pix_portfolio" => "Portfolio","pix_testimonial" => "Testimonial");
		}
		else {
			$search_exclude = array("post" => "Post","page" => "Page","pix_staffs" => "Staffs","pix_portfolio" => "Portfolio","pix_testimonial" => "Testimonial");
		}

		//Body & Footer Background Options
		$url =  ADMIN_DIR . 'assets/images/';

		$headers = array(
			'simple'       => $url . 'transparent.jpg',
			'header1'      => $url . 'header-1.png',
			'header2'      => $url . 'header-2.png',
			'header3'      => $url . 'header-3.png',
			'header4'      => $url . 'header-4.png',
			'header5'      => $url . 'header-5.png',
			'header6'      => $url . 'header-6.png',
			'header7'      => $url . 'header-7.png',
			'header8'      => $url . 'header-8.png',
			'header9'      => $url . 'header-9.png',
			//'left-header'  => $url . 'header-10.png',
			//'right-header' => $url . 'header-11.png'
			);

		$headers_hover = array(
			'default'       => $url . 'default-hover.png',
			'drive-nav'      => $url . 'drive-nav.png',
			'nav-border'       => $url . 'nav-border.png',
			'nav-double-border'      => $url . 'nav-double-border.png',
			'right-arrow'       => $url . 'right-arrow.png',
			'right-arrow cross-arrow'      => $url . 'cross-arrow.png',
			'background-nav'       => $url . 'background-nav.png',
			'background-nav background-nav-round'      => $url . 'background-nav-round.png',
			'solid-color-bg'       => $url . 'solid-color-bg.png',
			'square-left-right'      => $url . 'square-left-right.png',
			);

		$pattern = array(
			'none'  => $url . 'none.png',
			'pat-1' => $url . 'pat-1.png',
			'pat-2' => $url . 'pat-2.png',
			'pat-3' => $url . 'pat-3.png',
			'pat-4' => $url . 'pat-4.png',
			'pat-5' => $url . 'pat-5.png',
			);

		$skin = array(
			'default'  => $url . 'skin/default.png',
			'beauty' => $url . 'skin/beauty.png',
			'corporate' => $url . 'skin/corporate.png',
			'creative' => $url . 'skin/creative.png',
			'education' => $url . 'skin/education.png',
			'freelancer' => $url . 'skin/freelancer.png',
			'food' => $url . 'skin/food.png',
			'medical' => $url . 'skin/medical.png',
			'music' => $url . 'skin/music.png',
			'portfolio' => $url . 'skin/portfolio.png',
			'shop' => $url . 'skin/shop.png',
			'sports' => $url . 'skin/sports.png',
			'transportation' => $url . 'skin/tranportaion.png',
			'personal' => $url . 'skin/personal.png',
			'wedding' => $url . 'skin/wedding.png',
			'fitness' => $url . 'skin/fitness.png',
			'minimal' => $url . 'skin/minimal.png',
			'travel'=> $url  . 'skin/travel.png',
			'creative-agency'=>  $url  . 'skin/creative-agency.png',
			'advertising'=>  $url  . 'skin/advertising.png',
			'consulting'=>  $url  . 'skin/consulting.png',
			'studio'=>  $url  . 'skin/studio.png',
			'portfolio-minimal'=>  $url  . 'skin/portfoliominimal.png',
			'onepage'=>  $url  . 'skin/onepage.png'
			);



		$bg_attachment = array("fixed" => "Fixed","scroll" => "Scroll");
		$bg_size = array("auto" => "Auto", "cover" => "Cover","contain" => "Contain");
		$bg_repeat = array("repeat" => "Repeat","repeat-x" => "Repeat-x", "Repeat-Y" => "Repeat-Y", "no-repeat" => "No Repeat");

		//font sizes
		$font_sizes = array();
		for ($i = 9; $i < 50; $i++){ 
			$font_sizes[$i.'px'] = $i.'px'; 
		}

		//Header & Footer widget columns
		$columns = array("col3" => "Three","col4" => "Four");

		//Header Builder array
		$header_grey_elem = array(
							'cinfo' 			=> 'Contact Info',
							'lang' 				=> 'WMPL Language Selector',
							'cart' 				=> 'Woocommerce cart',
							'sicons' 			=> 'Socail Icons',
							'menu' 				=> 'menu',
							'cinfo_lang' 		=> 'Contact Info + WMPL Language Selector',
							'cinfo_cart'		=> 'Contact Info + Woocommerce cart',	 
							'sicons_cart' 		=> 'Socail Icons + Woocommerce cart',
							'lang_cart' 		=> 'WMPL Language Selector + Woocommerce cart',
							'menu_cart' 		=> 'Menu + Woocommerce cart',
							'menu_lang' 		=> 'Menu + WMPL Language Selector',
							'search' 			=> 'search',
							'search_sicons' 	=> 'search + Socail Icons'
						);

		//Header Main array
		$header_main_elem = array(
							'cinfo' 			=> 'Contact Info',
							'lang' 				=> 'WMPL Language Selector',
							'cart' 				=> 'Woocommerce cart',
							'sicons' 			=> 'Socail Icons',
							'lang_cart' 		=> 'WMPL Language Selector + Woocommerce cart',
							'search' 			=> 'search'
						);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
			if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
			{ 
				while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
				{
					if(stristr($alt_stylesheet_file, ".css") !== false)
					{
						$alt_stylesheets[] = $alt_stylesheet_file;
					}
				}    
			}
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
			if ($bg_images_dir = opendir($bg_images_path) ) { 
				while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
					if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
						natsort($bg_images); //Sorts the array into a natural order
						$bg_images[] = $bg_images_url . $bg_images_file;
					}
				}    
			}
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post");

		$theme_color_url =  ADMIN_DIR . 'assets/images/color-bg/'; 

/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

//Top Header
$of_options[] = array( "name" => __("Top Header", "pixel8es"),
					"type" => "heading",
					"custom_class" => "top-header");

$of_options[] = array(
					"id" => "introduction",
					"std" => __("<h3 style=\"margin: 0 0 10px;\">Email and Phone Number in Top left</h3>
					Enter the value to display email and phone, Leave it empty if you don't want display","pixel8es"),
					"icon" => true,
					"type" => "info");									
					
					
$of_options[] = array( "name" => __("Email", "pixel8es"),
					"desc" => __("Please Enter Email address.", "pixel8es"),
					"id" => "top_email",
					"std" => "info@yoursite.com",
					"type" => "text"); 		
					
$of_options[] = array( "name" => __("Telephone", "pixel8es"),
					"desc" => __("Please Enter Telephone Number.", "pixel8es"),
					"id" => "top_tel",
					"std" => "+ (009) 123 4567",
					"type" => "text"); 									
					

$of_options[] = array( 
					"id" => "introduction",
					"std" => __("<h3 style=\"margin: 0 0 10px;\">Social Networking Icons.</h3>
					Enter the url to display social networking icons you want, Leave it empty if you don't want display", "pixel8es"),
					"icon" => true,
					"type" => "info");									
					
					
$of_options[] = array( "name" => __("Facebook URL", "pixel8es"),
					"desc" => __("Please Enter Facebook URL, This will display in header.", "pixel8es"),
					"id" => "top_facebook",
					"std" => "",
					"type" => "text"); 					

$of_options[] = array( "name" => __("Twitter", "pixel8es"),
					"desc" => __("Please Enter Twitter Username, This will display in header.", "pixel8es"),
					"id" => "top_twitter",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => __("Google Plus URL", "pixel8es"),
					"desc" => __("Please Enter G+ URL, This will display in header.", "pixel8es"),
					"id" => "top_gplus",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => __("LinkedIn URL", "pixel8es"),
					"desc" => __("Enter your full rss URL, This will display in header.", "pixel8es"),
					"id" => "top_linkedin",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => __("Dribble URL", "pixel8es"),
					"desc" => __("Enter your full rss URL, This will display in header.", "pixel8es"),
					"id" => "top_dribble",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => __("Flickr URL", "pixel8es"),
					"desc" => __("Enter your full rss URL, This will display in header.", "pixel8es"),
					"id" => "top_flickr",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => __("Pinterest URL", "pixel8es"),
					"desc" => __("Enter your full Pinterest URL, This will display in header.", "pixel8es"),
					"id" => "top_pinterest",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => __("Tumblr URL", "pixel8es"),
					"desc" => __("Enter your full Tumblr  URL, This will display in header.", "pixel8es"),
					"id" => "top_tumblr",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => __("RSS URL", "pixel8es"),
					"desc" => __("Enter your full rss URL, This will display in header.", "pixel8es"),
					"id" => "top_rss",
					"std" => "",
					"type" => "text");

$of_options[] = array( 	"name" 		=> __("Enable Search Bar", "pixel8es"),
						"desc" 		=> __("Do you want to display search bar on top header?", "pixel8es"),
						"id" 		=> "top_search",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Header Options", "pixel8es"),
						"type" 		=> "heading"
				);


$of_options[] = array( 	"name" 		=> __("Main Layout", "pixel8es"),
						"id" 		=> "header_option",
						"std" 		=> "header1",
						"type" 		=> "images",
						"options" 	=> $headers
				);

$of_options[] = array( 	"name" 		=> __("Header Hover Style", "pixel8es"),
						"id" 		=> "header_hover_style",
						"std" 		=> "default",
						"type" 		=> "images",
						"options" 	=> $headers_hover
				);

$of_options[] = array( 	"name" 		=> __("Show / Hide Logo in Simple Header (1st header style in above list)", "pixel8es"),
						"desc" 		=> __("Do you want show Logo in Simple Header (1st header style in above list)", "pixel8es"),
						"id" 		=> "simple_logo",
						"std" 		=> 0,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Sticky Header", "pixel8es"),
						"desc" 		=> __("Enable or disable Sticky Header from here", "pixel8es"),
						"id" 		=> "header_sticky",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Header Widget", "pixel8es"),
						"desc" 		=> __("Do you want to display the header widget?", "pixel8es"),
						"id" 		=> "header_widget",
						"std" 		=> 0,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Header Widget Columns", "pixel8es"),
						"desc" 		=> __("Choose the header widget columns", "pixel8es"),
						"id" 		=> "header_widget_col",
						"std" 		=> "col3",
						"fold" => "header_widget",
						"type" 		=> "select",
						"options" 	=> $columns
				);

$of_options[] = array( "name" => __("Choose the Registered Sidebar", "pixel8es"),
					"desc" => __("Please choose the sidebar you have created", "pixel8es"),
					"id" => "header_select_sidebar",
					"std" => "0",
					"fold" => "header_widget",
					"type" => "select_sidebar",
					"hide" => array('header-widgets')
					);

$of_options[] = array( 	"name" 		=> __("Header Style", "pixel8es"),
						"desc" 		=> __("Select header style.", "pixel8es"),
						"id" 		=> "header_style",
						"std" 		=> 0,
						"on" 		=> "Dark",
						"off" 		=> "Light",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Top Section Style", "pixel8es"),
						"desc" 		=> __("Select top section style.", "pixel8es"),
						"id" 		=> "top_sec",
						"std" 		=> 0,
						"on" 		=> "Dark",
						"off" 		=> "Light",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Main Menu Style", "pixel8es"),
						"desc" 		=> __("Select main menu style.", "pixel8es"),
						"id" 		=> "main_menu",
						"std" 		=> 1,
						"on" 		=> "Dark",
						"off" 		=> "Light",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("DropDown Menu Style", "pixel8es"),
						"desc" 		=> __("Select dropdown menu style.", "pixel8es"),
						"id" 		=> "sub_menu",
						"std" 		=> 0,
						"on" 		=> "Dark",
						"off" 		=> "Light",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Enable Fixed ( Transparent Header )", "pixel8es"),
						"desc" 		=> __("Do you like to enable fixed transparent header?", "pixel8es"),
						"id" 		=> "header_transparency",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Choose Percentage of fixed Header Transparency", "pixel8es"),
						"desc" 		=> __("How much transparency you want to apply for fixed header", "pixel8es"),
						"id" 		=> "header_trans_val",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "10",
						"max" 		=> "90",
						"fold" 		=> "header_transparency", /* the switch hook */
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> __("Show Mobile Menu Dropdown", "pixel8es"),
						"desc" 		=> __("Choose Yes to show sub menus (as dropdown) in mobile menu.", "pixel8es"),
						"id" 		=> "mobile_menu_dropdown",
						"std" 		=> 1,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Cart Button", "pixel8es"),
						"desc" 		=> __("Do you want to display cart button?", "pixel8es"),
						"id" 		=> "show_cart_btn",
						"std" 		=> 0,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Language Selector", "pixel8es"),
						"desc" 		=> __("Do you want to display language selector?", "pixel8es"),
						"id" 		=> "show_lang_sel",
						"std" 		=> 0,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("WPML Language Selector Style", "pixel8es"),
						"desc" 		=> __("Choose Language Selector Style", "pixel8es"),
						"id" 		=> "wpml_lang_style",
						"std" 		=> "search",
						"type" 		=> "select",
						"options" 	=> array('normal' => 'Normal', 'dropdown' => 'Dropdown')
				);

$of_options[] = array( 	"name" 		=> __("WPML Language Display Style", "pixel8es"),
						"desc" 		=> __("Choose Language Display Style", "pixel8es"),
						"id" 		=> "language_style",
						"std" 		=> "search",
						"type" 		=> "select",
						"options" 	=> array('lang_code' => 'Language Code', 'lang_name' => 'Language Name', 'flag' => 'Flag', 'flag_with_name' => 'Flag With Name')
				);

//General Settings
$of_options[] = array( "name" => __("General", "pixel8es"),
					"type" => "heading");
					
$of_options[] = array(
					"id" => "introduction",
					"std" => __("<h3 style=\"margin: 0 0 10px;\">Welcome to the Electrify WordPress Responsive Theme.</h3>
					Adjust the options here and change the theme like you want", "pixel8es"),
					"icon" => true,
					"type" => "info");									

/*$of_options[] = array( "name" => "Upload WordPress Login Page Logo",
					"desc" => "Upload WordPress Login Page Logo.",
					"id" => "login_page_logo",
					"std" => get_template_directory_uri().'/library/img/logo.png',
					"mod" => "min",
					"type" => "media");*/
					
$of_options[] = array( "name" => __("Upload Logo", "pixel8es"),
					"desc" => __("Upload a custom logo. Height should be within 116px.", "pixel8es"),
					"id" => "custom_logo",
					"std" => get_template_directory_uri().'/library/images/logo.png',
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => __("Upload Retina Logo", "pixel8es"),
					"desc" => __("Upload a retina logo. width and should be double size (width X 2 & height X 2) of above (original) logo.", "pixel8es"),
					"id" => "retina_logo",
					"std" => get_template_directory_uri().'/library/images/retina-logo.png',
					"mod" => "min",
					"type" => "media");


$of_options[] = array( "name" => __("Fav Icon", "pixel8es"),
					"desc" =>  __("Upload a 16px x 16px Png/Gif image that will represent your website's favicon.", "pixel8es"),
					"id" => "fav_icon",
					"std" => get_template_directory_uri().'/favicon.png',
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => __("Apple Touch Icon", "pixel8es"),
					"desc" => __("Size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4's retina display (IMHO, just go ahead and use the biggest one). Transparency is not recommended (iOS will put a black BG behind the icon)", "pixel8es"),
					"id" => "apple_touch_icon",
					"std" => get_template_directory_uri().'/library/images/apple-icon-touch.png',
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => __("Enable Ajax", "pixel8es"),
					"desc" => __("Do you want to like to enble ajax navigation?", "pixel8es"),
					"id"   => "pix_ajax",
					"std"  => 0,
					"on"   => "Yes",
					"off"  => "No",
					"type" => "switch"
                );

$of_options[] = array( 	"name" 		=> __("Ajax Loader", "pixel8es"),
						"desc" 		=> __("Choose a loading animation", "pixel8es"),
						"id" 		=> "pix_ajax_style",
						"std" 		=> "style1",
						"fold"		=> "pix_ajax",
						"type" 		=> "select",
						"options" 	=> $ajax_style
				);

$of_options[] = array( 	"name" 		=> __("Ajax Loader Animation In", "pixel8es"),
						"desc" 		=> __("Choose a loading animation", "pixel8es"),
						"id" 		=> "ajaxtransin",
						"std" 		=> "fadeInUp",
						"fold"		=> "pix_ajax",
						"type" 		=> "select",
						"options" 	=> $ajax_trans_in
				);

$of_options[] = array( 	"name" 		=> __("Ajax Loader Animation Out", "pixel8es"),
						"desc" 		=> __("Choose a loading animation", "pixel8es"),
						"id" 		=> "ajaxtransout",
						"std" 		=> "fadeOutDown",
						"fold"		=> "pix_ajax",
						"type" 		=> "select",
						"options" 	=> $ajax_trans_out
				);

$of_options[] = array( "name" => __("Enable Preloader", "pixel8es"),
					"desc" => __("Do you want to like to enable preloader?", "pixel8es"),
					"id"   => "pix_preloader",
					"std"  => 0,
					"on"   => "Yes",
					"off"  => "No",
					"type" => "switch"
                );

$of_options[] = array( 	"name" 		=> __("Preloader Animation In", "pixel8es"),
						"desc" 		=> __("Choose a loading animation", "pixel8es"),
						"id" 		=> "preloadtrans",
						"std" 		=> "fadeInUp",
						"fold"		=> "pix_preloader",
						"type" 		=> "select",
						"options" 	=> $preloader_trans_in
				);

$of_options[] = array( "name" => __("Wide &amp; Boxed Layout", "pixel8es"),
					"desc" => __("Please choose wide &amp; boxed layout.", "pixel8es"),
					"id" => "boxed_content",
					"std" => 0,
					"on" => "Boxed",
					"off" => "Wide",
					"folds" => 1,
					"type" => "switch"
				);

$of_options[] = array( 	"name" 		=> __("main_wrap", "pixel8es"),
						"desc" 		=> __("main_wrap", "pixel8es"),
						"id" 		=> "main_wrap",
						"std" 		=> "1366",
						"min" 		=> "940",
						"step"		=> "1",
						"max" 		=> "1366",
						"fold" 		=> "boxed_content",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> __("content wrap", "pixel8es"),
						"desc" 		=> __("content_wrap", "pixel8es"),
						"id" 		=> "content_wrap",
						"std" 		=> "1170",
						"min" 		=> "940",
						"step"		=> "1",
						"max" 		=> "1366",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( "name" => __("Responsive", "pixel8es"),
					"desc" => __("Please choose responsive.", "pixel8es"),
					"id" => "mobile_responsive",
					"std" => 1,
					"on" => "ON",
					"off" => "OFF",
					"type" => "switch"
				);

$of_options[] = array( "name" => __("Show Flyin Sidebar", "pixel8es"),
					"desc" => __("Do you want to show flyin sidebar?", "pixel8es"),
					"id" => "flyin_sidebar",
					"std" => 0,
					"on" => "ON",
					"off" => "OFF",
					"type" => "switch"
					);

$of_options[] = array( "name" => __("Choose the Flyin Sidebar", "pixel8es"),
					"desc" => __("Please choose the flyin sidebar you have created", "pixel8es"),
					"id" => "flyin_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"fold" 		=> "flyin_sidebar",
					"hide" => array('flyin-sidebar')
					);

$of_options[] = array( "name" => __("Flyin Sidebar Background Color", "pixel8es"),
					"desc" => __("Please choose flyin sidebar styles.", "pixel8es"),
					"id" => "flyin_background",
					"std" => 0,
					"on" => "Black",
					"off" => "White",
					"fold" => "flyin_sidebar",
					"type" => "switch"
				);

$of_options[] = array( "name" => __("Search Text", "pixel8es"),
					"desc" => __("Please Enter Search Text Here.", "pixel8es"),
					"id" => "search_text",
					"std" => "Search",
					"type" => "text"
					);

$of_options[] = array( "name" => __("Portfolio Slug", "pixel8es"),
					"desc" => __("Please Enter the slug for Portfolio", "pixel8es"),
					"id" => "slug_portfolio",
					"std" => "portfolio",
					"type" => "text"
					);

$of_options[] = array( "name" => __("Staff Slug", "pixel8es"),
					"desc" => __("Please Enter the slug for Staff", "pixel8es"),
					"id" => "slug_staff",
					"std" => "staff",
					"type" => "text"
					);

$of_options[] = array( "name" => __("Testimonial Slug", "pixel8es"),
					"desc" => __("Please Enter the slug for Testimonial", "pixel8es"),
					"id" => "slug_testimonial",
					"std" => "testimonial",
					"type" => "text"
					);
					
$of_options[] = array( 	"name" 		=> __("Show Go to Top Button", "pixel8es"),
						"desc" 		=> __("Show/Hide Go to Top Button in the page", "pixel8es"),
						"id" 		=> "go_to_top",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
																		  
$of_options[] = array( "name" => __("Custom CSS", "pixel8es"),
					"desc" => __("Type your custom CSS rules.", "pixel8es"),
					"id" => "custom_css",
					"std" => "",
					"type" => "textarea");     

				
$of_options[] = array( "name" => __("Google Analytics ID", "pixel8es"),
					"desc" => __("Paste your Google Analytics ID. Ex:UA-XXXXXX-XX This will be added into the footer template of your theme.", "pixel8es"),
					"id" => "google_analytics",
					"std" => "",
					"type" => "text");							
													
$of_options[] = array( "name" => __("Tracking Code", "pixel8es"),
					"desc" => __("Paste your Other tracking code here. This will be added into the footer template of your theme.", "pixel8es"),
					"id" => "tracking_code",
					"std" => "",
					"type" => "textarea");

//Header Builder
$of_options[] = array( 	"name" 		=> __("Header Builder", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( 
					"id" => "introduction",
					"std" => __("<h3>Grey Header Area</h3> This is the setting for grey Header Area which can be displayed above or below Main Header depends on header settings", "pixel8es"),
					"icon" => true,
					"type" => "info");

$of_options[] = array( 	"name" 		=> __("Grey Left Side", "pixel8es"),
						"desc" 		=> __("Choose what you want to display Grey Left Side Header Area", "pixel8es"),
						"id" 		=> "grey_left",
						"std" 		=> "cinfo",
						"type" 		=> "select",
						"options" 	=> $header_grey_elem
				);

$of_options[] = array( 	"name" 		=> __("Grey Right Side", "pixel8es"),
						"desc" 		=> __("Choose what you want to display Grey Right Side Header Area", "pixel8es"),
						"id" 		=> "grey_right",
						"std" 		=> "sicons",
						"type" 		=> "select",
						"options" 	=> $header_grey_elem
				);

$of_options[] = array( 
					"id" => "introduction",
					"std" => __("<h3>Main Header</h3> This is the setting for Main Header Header layout Can be change in header settings", "pixel8es"),
					"icon" => true,
					"type" => "info");

$of_options[] = array( 	"name" 		=> __("Left Side", "pixel8es"),
						"desc" 		=> __("Choose what you want to display Left Side Main Header", "pixel8es"),
						"id" 		=> "main_left",
						"std" 		=> "cinfo",
						"type" 		=> "select",
						"options" 	=> $header_main_elem
				);

$of_options[] = array( 	"name" 		=> __("Center of Main Header", "pixel8es"),
						"desc" 		=> __("Choose what you want to display in Center of Main Header", "pixel8es"),
						"id" 		=> "main_center",
						"std" 		=> "search",
						"type" 		=> "select",
						"options" 	=> array('none' => 'None', 'search' => 'search', 'sicons' => 'Socail Icons')
				);

$of_options[] = array( 	"name" 		=> __("Right Side", "pixel8es"),
						"desc" 		=> __("Choose what you want to display Right Side Main Header", "pixel8es"),
						"id" 		=> "main_right",
						"std" 		=> "sicons",
						"type" 		=> "select",
						"options" 	=> $header_main_elem
				);

$of_options[] = array(
					"id" => "introduction",
					"std" => __("<h3>Nav Below Header</h3> This is the setting for Main Header. Header layout Can be change in header settings", "pixel8es"),
					"icon" => true,
					"type" => "info");

$of_options[] = array( 	"name" 		=> __("Right Side", "pixel8es"),
						"desc" 		=> __("Choose what you want to display Right Side Main Header", "pixel8es"),
						"id" 		=> "nav_right",
						"std" 		=> "sicons",
						"type" 		=> "select",
						"options" 	=> array('none'=> 'None', 'search_icon'=> 'Search', 'lang'=> 'WMPL Language Selector')
				);

$of_options[] = array(
					"id" => "introduction",
					"std" => __("<h3>Header Styling Options</h3> This is the setting for Main Header. Header layout Can be change in header settings", "pixel8es"),
					"icon" => true,
					"type" => "info");

$of_options[] = array(  "name"  => __("Custom Header Styles", "pixel8es"),
						"desc"  => __("Do you like to use Custom Styles, Please enable it and choose the Background color, Primary color, Selection text color, selection background color, link hover color. If it's disabled, the default style will apply and custom styles are won't apply.", "pixel8es"),
						"id"    => "custom_header_styles",
						"std"   => 0,
						"on"    => "Yes",
						"off"   => "No",
						"folds" => 1,
						"type"  => "switch"
					);

$of_options[] = array( 	"name" 		=> __("Top Header Background Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "top_header_background_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Top Header Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "top_header_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Top Header Link Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "top_header_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Top Header Link Hover Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "top_header_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Header Background Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "main_header_background_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Header Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "main_header_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Header Link Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "main_header_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Header Link Hover Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "main_header_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Menu Background Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "menu_background_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Menu Link Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "menu_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Menu Link Hover Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "menu_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Sub Menu Background Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "sub_menu_background_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Sub Menu Border Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "sub_menu_border_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Sub Menu Link Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "sub_menu_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Sub Menu Link Hover Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "sub_menu_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

//Blog Settings
$of_options[] = array( 	"name" 		=> __("Blog", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Blog Title", "pixel8es"),
						"desc" 		=> __("Type the blog title", "pixel8es"),
						"id" 		=> "b_title",
						"std" 		=> "Blog",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Blog Breadcrumbs", "pixel8es"),
						"desc" 		=> __("Type the blog breadcrumbs here", "pixel8es"),
						"id" 		=> "b_breadcrumbs",
						"std" 		=> "Blog",
						"type" 		=> "text"
				);

if(class_exists('RevSlide')){
	$of_options[] = array( 	"name" 		=> __("Revolution Slider ID", "pixel8es"),
						"desc" 		=> __("Type the revolution slider ID to display revolution slider on Blog page. Eg: electrify,wedding..", "pixel8es"),
						"id" 		=> "b_r_slider",
						"std" 		=> "",
						"type" 		=> "text"
				);
}

if(class_exists('LayerSlider')){
	$of_options[] = array( 	"name" 		=> __("Layer Slider ID", "pixel8es"),
						"desc" 		=> __("Type the layer slider ID to display layer slider on Blog page. Eg: 1,2..", "pixel8es"),
						"id" 		=> "b_l_slider",
						"std" 		=> "",
						"type" 		=> "text"
				);
}

$of_options[] = array( 	"name" 		=> __("Blog Styles", "pixel8es"),
						"desc" 		=> __("Choose blog styles, it applies blog page only.", "pixel8es"),
						"id" 		=> "b_styles",
						"std" 		=> "masonry",
						"type" 		=> "select",
						"options" 	=> $blog_styles
				);	
								
$of_options[] = array( "name" => __("Choose the Registered Sidebar", "pixel8es"),
					"desc" => __("Please choose the sidebar you have created", "pixel8es"),
					"id" => "b_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> __("Blog Sidebar Position", "pixel8es"),
						"desc" 		=> __("Choose blog sidebar position, it applies blog page only.", "pixel8es"),
						"id" 		=> "b_sidebar",
						"std" 		=> "right",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> __("Enable/Disable Animation", "pixel8es"),
						"desc" 		=> __("Do you want to animate blog posts", "pixel8es"),
						"id" 		=> "b_animate",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"folds" 		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Animation Transition", "pixel8es"),
						"desc" 		=> __("Choose animation transition for blog posts", "pixel8es"),
						"id" 		=> "b_transition",
						"std" 		=> "fadeInUp",
						"type" 		=> "select",
						"fold" 		=> "b_animate",
						"options" 	=> $animation
				);

$of_options[] = array( 	"name" 		=> __("Transition Duration", "pixel8es"),
						"desc" 		=> __("Enter the Duration (Ex: 500ms or 1s)", "pixel8es"),
						"id" 		=> "b_duration",
						"std" 		=> "500ms",
						"fold" 		=> "b_animate",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Excerpt Text Limit", "pixel8es"),
						"desc" 		=> __("Type the numerical value for the excerpt text", "pixel8es"),
						"id" 		=> "b_limit",
						"std" 		=> "200",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Meta Section", "pixel8es"),
						"desc" 		=> __("Do you want to display meta section on blog pages", "pixel8es"),
						"id" 		=> "b_meta",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Post Format Icon", "pixel8es"),
						"desc" 		=> __("Do you want to display post format icons in blog pages", "pixel8es"),
						"id" 		=> "b_post_icon",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Post Format Icon Styles", "pixel8es"),
						"desc" 		=> __("Choose post format icon styles, it applies blog page only.", "pixel8es"),
						"id" 		=> "b_post_icon_style",
						"std" 		=> "square",
						"fold"		=> "b_post_icon",
						"type" 		=> "select",
						"options" 	=> $post_icon
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Sub Header in Archives Pages", "pixel8es"),
						"desc" 		=> __("Do you want to display sub header in archives pages", "pixel8es"),
						"id" 		=> "b_sub_header",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Style", "pixel8es"),
						"id" 		=> "b_sub_header_text",
						"std" 		=> "left",
						"fold"		=> "b_sub_header",
						"type" 		=> "images",
						"options" 	=> array(
							'center' 	=> $url . 'sub-header-center.png',
							'left' 	=> $url . 'sub-header-left.png'
							)
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Size", "pixel8es"),
						"desc" 		=> __("Choose post format icon styles, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "b_sub_header_size",
						"std" 		=> "small",
						"fold"		=> "b_sub_header",
						"type" 		=> "select",
						"options" 	=> $sub_header_size
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Background Style", "pixel8es"),
						"desc" 		=> __("Choose sub header background style, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "b_sub_header_bg_style",
						"std" 		=> "color",
						"fold"		=> "b_sub_header",
						"type" 		=> "select",
						"options" 	=> $sub_header_bg_style
				);

$of_options[] = array( "name" => __("Upload Sub Header Background", "pixel8es"),
					"desc" => __("It applies only sub header background style set it to background image.", "pixel8es"),
					"id" => "b_sub_header_bg_img",
					"std" => '',
					"mod" => "min",
					"fold"	=> "b_sub_header",
					"type" => "media");

$of_options[] = array( 	"name" 		=> __("Sub Header Background Color", "pixel8es"),
						"desc" 		=> __("It applies only sub header background style set it to custom background color", "pixel8es"),
						"id" 		=> "b_sub_header_bg_color",
						"std" 		=> "#2098a8",
						"fold"		=> "b_sub_header",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Text Color", "pixel8es"),
						"desc" 		=> __("It affects the both sub header background style such as custom background color and background image", "pixel8es"),
						"id" 		=> "b_sub_header_text_color",
						"std" 		=> "#2098a8",
						"fold"		=> "b_sub_header",
						"type" 		=> "color"
				);


//Single Post Setting
$of_options[] = array( 	"name" 		=> __("Single Blog", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => __("Choose the Registered Sidebar", "pixel8es"),
					"desc" => __("Please choose the sidebar you have created", "pixel8es"),
					"id" => "s_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> __("Single Post Sidebar Position", "pixel8es"),
						"desc" 		=> __("Choose single blog sidebar position, it applies blog page only.", "pixel8es"),
						"id" 		=> "s_sidebar",
						"std" 		=> "right",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Meta Section", "pixel8es"),
						"desc" 		=> __("Do you want to display meta section on single blog page", "pixel8es"),
						"id" 		=> "s_meta",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Post Format Icon", "pixel8es"),
						"desc" 		=> __("Do you want to display post format icons in single blog page", "pixel8es"),
						"id" 		=> "s_post_icon",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Post Format Icon Styles", "pixel8es"),
						"desc" 		=> __("Choose post format icon styles, it applies single blog page", "pixel8es"),
						"id" 		=> "s_post_icon_style",
						"std" 		=> "square",
						"fold"		=> "s_post_icon",
						"type" 		=> "select",
						"options" 	=> $post_icon
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Taglist", "pixel8es"),
						"desc" 		=> __("Do you want to display taglist below post content", "pixel8es"),
						"id" 		=> "s_taglist",
						"std" 		=> 0,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Like Button", "pixel8es"),
						"desc" 		=> __("Do you want to display like below post content", "pixel8es"),
						"id" 		=> "s_like",
						"std" 		=> 0,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Next and Previous post navigation", "pixel8es"),
						"desc" 		=> __("Do you want to display Next and Previous post navigation below post content", "pixel8es"),
						"id" 		=> "s_np_pagination",
						"std" 		=> 0,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide About the Author section", "pixel8es"),
						"desc" 		=> __("Do you want to display about the author in single blog page", "pixel8es"),
						"id" 		=> "s_author",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("About the Author Title", "pixel8es"),
						"desc" 		=> __("Type the about the author section title here", "pixel8es"),
						"id" 		=> "s_author_t",
						"std" 		=> "About the Author",
						"fold"		=> "s_author",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide author image in About the Author section", "pixel8es"),
						"desc" 		=> __("Do you want to display author image in About the Author section", "pixel8es"),
						"id" 		=> "s_author_img",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "s_author",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Related Posts Section", "pixel8es"),
						"desc" 		=> __("Do you want to display related post section", "pixel8es"),
						"id" 		=> "s_related",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Related Post Title", "pixel8es"),
						"desc" 		=> __("Type the relatted post section title here", "pixel8es"),
						"id" 		=> "s_related_t",
						"std" 		=> "Related Post",
						"fold"		=> "s_related",
						"type" 		=> "text"

				);

$of_options[] = array( 	"name" 		=> __("Number of Related Post", "pixel8es"),
						"desc" 		=> __("Enter the integer value to display related post", "pixel8es"),
						"id" 		=> "s_related_no",
						"std" 		=> "6",
						"fold"		=> "s_related",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Order By", "pixel8es"),
						"desc" 		=> __("Choose the order by selection ", "pixel8es"),
						"id" 		=> "s_related_orderby",
						"std" 		=> "date",
						"fold"		=> "s_related",
						"type" 		=> "select",
						"options" 	=> $order_by
				);

$of_options[] = array( 	"name" 		=> __("Sorting Order", "pixel8es"),
						"desc" 		=> __("Choose the sorting order", "pixel8es"),
						"id" 		=> "s_related_order",
						"std" 		=> "date",
						"fold"		=> "s_related",
						"type" 		=> "select",
						"options" 	=> $order
				);


$of_options[] = array( 	"name" 		=> __("Show/Hide comment template", "pixel8es"),
						"desc" 		=> __("Do you want to display comment template, it affects comment section and comment form", "pixel8es"),
						"id" 		=> "s_comment_template",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Comment Section Title", "pixel8es"),
						"desc" 		=> __("Type the comment section title here", "pixel8es"),
						"id" 		=> "s_comment_t",
						"std" 		=> "Comments",
						"fold"		=> "s_comment_template",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Comment form Title", "pixel8es"),
						"desc" 		=> __("Type the comment form title here", "pixel8es"),
						"id" 		=> "s_comment_form_t",
						"std" 		=> "Leave a Comments",
						"fold"		=> "s_comment_template",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Comment form button text", "pixel8es"),
						"desc" 		=> __("Type the comment form button text here", "pixel8es"),
						"id" 		=> "s_comment_form_btn_t",
						"std" 		=> "Add Comment",
						"fold"		=> "s_comment_template",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Sub Header in Archives Pages", "pixel8es"),
						"desc" 		=> __("Do you want to display sub header in archives pages", "pixel8es"),
						"id" 		=> "s_sub_header",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Style", "pixel8es"),
						"id" 		=> "s_sub_header_text",
						"std" 		=> "left",
						"fold"		=> "s_sub_header",
						"type" 		=> "images",
						"options" 	=> array(
							'center' 	=> $url . 'sub-header-center.png',
							'left' 	=> $url . 'sub-header-left.png'
							)
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Size", "pixel8es"),
						"desc" 		=> __("Choose the sub header size", "pixel8es"),
						"id" 		=> "s_sub_header_size",
						"std" 		=> "small",
						"fold"		=> "s_sub_header",
						"type" 		=> "select",
						"options" 	=> $sub_header_size
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Background Style", "pixel8es"),
						"desc" 		=> __("Choose sub header background style, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "s_sub_header_bg_style",
						"std" 		=> "color",
						"fold"		=> "s_sub_header",
						"type" 		=> "select",
						"options" 	=> $sub_header_bg_style
				);

$of_options[] = array( "name" => __("Upload Sub Header Background", "pixel8es"),
					"desc" => __("It applies only sub header background style set it to background image.", "pixel8es"),
					"id" => "s_sub_header_bg_img",
					"std" => get_template_directory_uri().'/library/images/logo.png',
					"mod" => "min",
					"fold"	=> "s_sub_header",
					"type" => "media");

$of_options[] = array( 	"name" 		=> __("Sub Header Background Color", "pixel8es"),
						"desc" 		=> __("It applies only sub header background style set it to custom background color", "pixel8es"),
						"id" 		=> "s_sub_header_bg_color",
						"std" 		=> "#2098a8",
						"fold"		=> "s_sub_header",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Text Color", "pixel8es"),
						"desc" 		=> __("It affects the both sub header background style such as custom background color and background image", "pixel8es"),
						"id" 		=> "s_sub_header_text_color",
						"std" 		=> "#2098a8",
						"fold"		=> "s_sub_header",
						"type" 		=> "color"
				);


//Single Portfolio Setting
$of_options[] = array( 	"name" 		=> __("Single Portfolio", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Banner", "pixel8es"),
						"desc" 		=> __("Do you want to display sub banner?", "pixel8es"),
						"id" 		=> "single_portfolio_banner",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Diplay Next/Previous items arrows", "pixel8es"),
						"desc" 		=> __("Do you want to display next/previous arrows?", "pixel8es"),
						"id" 		=> "sp_next_arrow",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Related Projects", "pixel8es"),
						"desc" 		=> __("Do you want to display related project section?", "pixel8es"),
						"id" 		=> "sp_related",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Related Project Title", "pixel8es"),
						"desc" 		=> __("Type the related project title here", "pixel8es"),
						"id" 		=> "sp_related_t",
						"std" 		=> "Related Projects",
						"fold"		=> "sp_related",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Number of Related Post", "pixel8es"),
						"desc" 		=> __("How many related post you want to display?", "pixel8es"),
						"id" 		=> "sp_related_count",
						"std" 		=> "6",
						"fold"		=> "sp_related",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Related Post Style", "pixel8es"),
						"desc" 		=> __("Choose hover style for related posts", "pixel8es"),
						"id" 		=> "sp_related_style",
						"std" 		=> "style2",
						"fold"		=> "sp_related",
						"type" 		=> "select",
						"options" 	=> $style
				);

//Testimonial Page Setting
$of_options[] = array( 	"name" 		=> __("Testimonial", "pixel8es"),
						"type" 		=> "heading"
				);


$of_options[] = array( 	"name" 		=> __("Number of Testimonial", "pixel8es"),
						"desc" 		=> __("How many testimonials you want to display per page?", "pixel8es"),
						"id" 		=> "testimonial_count",
						"std" 		=> -1,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Order By", "pixel8es"),
						"desc" 		=> __("Choose the order by selection ", "pixel8es"),
						"id" 		=> "testimonial_orderby",
						"std" 		=> "date",
						"type" 		=> "select",
						"options" 	=> $order_by
				);

$of_options[] = array( 	"name" 		=> __("Sorting Order", "pixel8es"),
						"desc" 		=> __("Choose the sorting order", "pixel8es"),
						"id" 		=> "testimonial_order",
						"std" 		=> "asc",
						"type" 		=> "select",
						"options" 	=> $order
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Clients Image", "pixel8es"),
						"desc" 		=> __("Do you want to display clients image?", "pixel8es"),
						"id" 		=> "testimonial_img",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Clients Job and Company", "pixel8es"),
						"desc" 		=> __("Do you want to display clients job and company?", "pixel8es"),
						"id" 		=> "testimonial_job",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Clients Testimonial Rating", "pixel8es"),
						"desc" 		=> __("Do you want to display clients testimonial rating?", "pixel8es"),
						"id" 		=> "testimonial_rating",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Pagination", "pixel8es"),
						"desc" 		=> __("Do you want to display pagination?", "pixel8es"),
						"id" 		=> "testimonial_pagination",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

//Single Staff Setting
$of_options[] = array( 	"name" 		=> __("Single Staff", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Banner", "pixel8es"),
						"desc" 		=> __("Do you want to display sub banner?", "pixel8es"),
						"id" 		=> "single_staff_banner",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Display Staff Image", "pixel8es"),
						"desc" 		=> __("Do you want to display staff images?", "pixel8es"),
						"id" 		=> "single_staff_image",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Single Staff Image Width", "pixel8es"),
						"desc" 		=> __("Type the single staff image width. Default: 300", "pixel8es"),
						"id" 		=> "single_staff_image_w",
						"std" 		=> "300",
						"fold"		=> "single_staff_image",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Single Staff Image Height", "pixel8es"),
						"desc" 		=> __("Type the single staff image Height. Default: 400", "pixel8es"),
						"id" 		=> "single_staff_image_h",
						"std" 		=> "400",
						"fold"		=> "single_staff_image",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Display Staff Job", "pixel8es"),
						"desc" 		=> __("Do you want to display staff job?", "pixel8es"),
						"id" 		=> "single_staff_job",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Display Staff Social Icons", "pixel8es"),
						"desc" 		=> __("Do you want to display staff job?", "pixel8es"),
						"id" 		=> "single_staff_social",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Display Staff Email Link", "pixel8es"),
						"desc" 		=> __("Do you want to display staff job?", "pixel8es"),
						"id" 		=> "single_staff_email",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

if (class_exists('Woocommerce')) {

	//Shop Setting
	$of_options[] = array( 	"name" 		=> __("Shop", "pixel8es"),
							"type" 		=> "heading"
					);


	$of_options[] = array( 	"name" 		=> __("Number of Products", "pixel8es"),
							"desc" 		=> __("How many products you want to display per page?", "pixel8es"),
							"id" 		=> "shop_count",
							"std" 		=> '4',
							"type" 		=> "text"
					);

	$of_options[] = array( 	"name" 		=> __("Show/Hide Pagination", "pixel8es"),
						"desc" 		=> __("Do you want to display pagination?", "pixel8es"),
						"id" 		=> "shop_pagination",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

	$of_options[] = array( 	"name" 		=> __("Show/Hide Result Count", "pixel8es"),
						"desc" 		=> __("Do you want to display result count on Shop page?", "pixel8es"),
						"id" 		=> "shop_result_count",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

	$of_options[] = array( 	"name" 		=> __("Show/Hide Filter", "pixel8es"),
						"desc" 		=> __("Do you want to display filter on Shop page?", "pixel8es"),
						"id" 		=> "shop_filter",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

	$of_options[] = array( 	"name" 		=> __("Product width", "pixel8es"),
							"desc" 		=> __("Type the width of the products", "pixel8es"),
							"id" 		=> "shop_width",
							"std" 		=> '270',
							"type" 		=> "text"
					);

	$of_options[] = array( 	"name" 		=> __("Product height", "pixel8es"),
							"desc" 		=> __("Type the height of the products", "pixel8es"),
							"id" 		=> "shop_height",
							"std" 		=> '290',
							"type" 		=> "text"
					);

}

//Archives Settings
$of_options[] = array( 	"name" 		=> __("Archives", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Archives Styles", "pixel8es"),
						"desc" 		=> __("Choose blog styles, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "a_styles",
						"std" 		=> "masonry",
						"type" 		=> "select",
						"options" 	=> $blog_styles
				);	
								
$of_options[] = array( "name" => __("Choose the Registered Sidebar", "pixel8es"),
					"desc" => __("Please choose the sidebar you have created", "pixel8es"),
					"id" => "a_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> __("Sidebar Position", "pixel8es"),
						"desc" 		=> __("Choose blog styles, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "a_sidebar",
						"std" 		=> "right",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> __("Excerpt Text Limit", "pixel8es"),
						"desc" 		=> __("Type the numerical value for the excerpt text", "pixel8es"),
						"id" 		=> "a_limit",
						"std" 		=> "200",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Meta Section", "pixel8es"),
						"desc" 		=> __("Do you want to display meta section on archives pages", "pixel8es"),
						"id" 		=> "a_meta",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Post Format Icon", "pixel8es"),
						"desc" 		=> __("Do you want to display post format icons in archives pages", "pixel8es"),
						"id" 		=> "a_post_icon",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Post Format Icon Styles", "pixel8es"),
						"desc" 		=> __("Choose post format icon styles, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "a_post_icon_style",
						"std" 		=> "square",
						"fold"		=> "a_post_icon",
						"type" 		=> "select",
						"options" 	=> $post_icon
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Sub Header in Archives Pages", "pixel8es"),
						"desc" 		=> __("Do you want to display sub header in archives pages", "pixel8es"),
						"id" 		=> "a_sub_header",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Style", "pixel8es"),
						"desc" 		=> __("Choose the sub header style here", "pixel8es"),
						"id" 		=> "a_sub_header_text",
						"std" 		=> "left",
						"fold"		=> "a_sub_header",
						"type" 		=> "images",
						"options" 	=> array(
							'center' 	=> $url . 'sub-header-center.png',
							'left' 	=> $url . 'sub-header-left.png'
							)
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Size", "pixel8es"),
						"desc" 		=> __("Choose post format icon styles, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "a_sub_header_size",
						"std" 		=> "small",
						"fold"		=> "a_sub_header",
						"type" 		=> "select",
						"options" 	=> $sub_header_size
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Background Style", "pixel8es"),
						"desc" 		=> __("Choose sub header background style, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "a_sub_header_bg_style",
						"std" 		=> "color",
						"fold"		=> "a_sub_header",
						"type" 		=> "select",
						"options" 	=> $sub_header_bg_style
				);

$of_options[] = array( "name" => __("Upload Sub Header Background", "pixel8es"),
					"desc" => __("It applies only sub header background style set it to background image.", "pixel8es"),
					"id" => "a_sub_header_bg_img",
					"std" => get_template_directory_uri().'/library/images/logo.png',
					"mod" => "min",
					"fold"	=> "a_sub_header",
					"type" => "media");

$of_options[] = array( 	"name" 		=> __("Sub Header Background Color", "pixel8es"),
						"desc" 		=> __("It applies only sub header background style set it to custom background color", "pixel8es"),
						"id" 		=> "a_sub_header_bg_color",
						"std" 		=> "#2098a8",
						"fold"		=> "a_sub_header",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Text Color", "pixel8es"),
						"desc" 		=> __("It affects the both sub header background style such as custom background color and background image", "pixel8es"),
						"id" 		=> "a_sub_header_text_color",
						"std" 		=> "#2098a8",
						"fold"		=> "a_sub_header",
						"type" 		=> "color"
				);


//Archives Settings
$of_options[] = array( 	"name" 		=> __("Search Page", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Search Exclude", "pixel8es"),
						"desc" 		=> __("Exclude Search result here", "pixel8es"),
						"id" 		=> "search_exclude",
						"std" 		=> array(),
						"type" 		=> "multicheck",
						"options" 	=> $search_exclude
				);	
								
$of_options[] = array( "name" => __("Choose the Registered Sidebar", "pixel8es"),
					"desc" => __("Please choose the sidebar you have created", "pixel8es"),
					"id" => "search_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> __("Sidebar Position", "pixel8es"),
						"desc" 		=> __("Choose blog styles, it applies only on search page", "pixel8es"),
						"id" 		=> "search_sidebar",
						"std" 		=> "right",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> __("Excerpt Text Limit", "pixel8es"),
						"desc" 		=> __("Type the numerical value for the excerpt text", "pixel8es"),
						"id" 		=> "search_limit",
						"std" 		=> "200",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Meta Section", "pixel8es"),
						"desc" 		=> __("Do you want to display meta section only on search page", "pixel8es"),
						"id" 		=> "search_meta",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Post Format Icon", "pixel8es"),
						"desc" 		=> __("Do you want to display post format icons only on search page", "pixel8es"),
						"id" 		=> "search_post_icon",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Post Format Icon Styles", "pixel8es"),
						"desc" 		=> __("Choose post format icon styles, it applies only on search page", "pixel8es"),
						"id" 		=> "search_post_icon_style",
						"std" 		=> "square",
						"fold"		=> "search_post_icon",
						"type" 		=> "select",
						"options" 	=> $post_icon
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide Sub Header in Archives Pages", "pixel8es"),
						"desc" 		=> __("Do you want to display sub header in archives pages", "pixel8es"),
						"id" 		=> "search_sub_header",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Style", "pixel8es"),
						"id" 		=> "search_sub_header_text",
						"std" 		=> "header1",
						"fold"		=> "search_sub_header",
						"type" 		=> "images",
						"options" 	=> array(
							'header1' 	=> $url . 'header-1.png',
							'header2' 	=> $url . 'header-2.png'
							)
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Size", "pixel8es"),
						"desc" 		=> __("Choose post format icon styles, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "search_sub_header_size",
						"std" 		=> "small",
						"fold"		=> "search_sub_header",
						"type" 		=> "select",
						"options" 	=> $sub_header_size
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Background Style", "pixel8es"),
						"desc" 		=> __("Choose sub header background style, it applies on archives, category, tag and author pages.", "pixel8es"),
						"id" 		=> "search_sub_header_bg_style",
						"std" 		=> "color",
						"fold"		=> "search_sub_header",
						"type" 		=> "select",
						"options" 	=> $sub_header_bg_style
				);

$of_options[] = array( "name" => __("Upload Sub Header Background", "pixel8es"),
					"desc" => __("It applies only sub header background style set it to background image.", "pixel8es"),
					"id" => "search_sub_header_bg_img",
					"std" => get_template_directory_uri().'/library/images/logo.png',
					"mod" => "min",
					"fold"	=> "search_sub_header",
					"type" => "media");

$of_options[] = array( 	"name" 		=> __("Sub Header Background Color", "pixel8es"),
						"desc" 		=> __("It applies only sub header background style set it to custom background color", "pixel8es"),
						"id" 		=> "search_sub_header_bg_color",
						"std" 		=> "#2098a8",
						"fold"		=> "search_sub_header",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Sub Header Text Color", "pixel8es"),
						"desc" 		=> __("It affects the both sub header background style such as custom background color and background image", "pixel8es"),
						"id" 		=> "search_sub_header_text_color",
						"std" 		=> "#2098a8",
						"fold"		=> "search_sub_header",
						"type" 		=> "color"
				);

//404 Settings
$of_options[] = array( 	"name" 		=> __("Error Page", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => __("Upload 404 Image", "pixel8es"),
					"desc" => __("Upload a custom 404 image. Height should be more than 1360px.", "pixel8es"),
					"id" => "custom_404_bg",
					"std" => get_template_directory_uri().'/library/images/404.png',
					"mod" => "min",
					"type" => "media");

$of_options[] = array( 	"name" 		=> __("404 Error text", "pixel8es"),
						"desc" 		=> __("Enter the 404 error text here", "pixel8es"),
						"id" 		=> "error_t",
						"std" 		=> "Sorry, but the page you were looking for can't be found. Please inform us about this error.",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide 404 menu", "pixel8es"),
						"desc" 		=> __("Do you want to display the 404 menu?", "pixel8es"),
						"id" 		=> "error_menu",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Show/Hide 404 Search", "pixel8es"),
						"desc" 		=> __("Do you want to display the Search?", "pixel8es"),
						"id" 		=> "error_search",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);


//Footer Options
$of_options[] = array( 	"name" 		=> __("Footer Options", "pixel8es"),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __("Choose Fixed Footer?", "pixel8es"),
						"desc" 		=> __("Do you want Footer Fixed?", "pixel8es"),
						"id" 		=> "footer_fixed",
						"std" 		=> 0,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Choose Footer Custom Style", "pixel8es"),
						"desc" 		=> __("Do you want to customize the footer appearance?", "pixel8es"),
						"id" 		=> "f_customization",
						"std" 		=> 0,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Footer Widget Title Color", "pixel8es"),
						"desc" 		=> __("This is the footer widget title color", "pixel8es"),
						"id" 		=> "custom_f_title_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Footer Text Color", "pixel8es"),
						"desc" 		=> __("This is the footer text color", "pixel8es"),
						"id" 		=> "custom_f_txt_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Footer Link Color", "pixel8es"),
						"desc" 		=> __("This is the footer link color", "pixel8es"),
						"id" 		=> "custom_f_link_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Footer Link Hover Color", "pixel8es"),
						"desc" 		=> __("This is the footer link hover color", "pixel8es"),
						"id" 		=> "custom_f_link_hover_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);


$of_options[] = array( 	"name" 		=> __("Footer Background Color", "pixel8es"),
						"desc" 		=> __("This is the footer background color", "pixel8es"),
						"id" 		=> "custom_f_bg_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Choose Footer Pattern", "pixel8es"),
						"desc" 		=> __("Select the footer pattern it affects only footer widget area section", "pixel8es"),
						"id" 		=> "custom_f_bg_pattern",
						"std" 		=> "none",
						"type" 		=> "images",
						"fold"		=> "f_customization",
						"options" 	=> $pattern
				);

$of_options[] = array( "name" => __("Upload Footer Background", "pixel8es"),
					"desc" => __("Upload a custom footer background. Height should be more than 1360px.", "pixel8es"),
					"id" => "custom_f_bg",
					"std" => '',
					"mod" => "min",
					"fold"		=> "f_customization",
					"type" => "media");


$of_options[] = array( 	"name" 		=> __("Background Attachment", "pixel8es"),
						"desc" 		=> __("Choose the footer background image attachment", "pixel8es"),
						"id" 		=> "custom_f_bg_attachment",
						"std" 		=> "scroll",
						"fold"		=> "f_customization",
						"type" 		=> "select",
						"options" 	=> $bg_attachment
				);

$of_options[] = array( 	"name" 		=> __("Background Size", "pixel8es"),
						"desc" 		=> __("Choose the footer background image size", "pixel8es"),
						"id" 		=> "custom_f_bg_size",
						"std" 		=> "cover",
						"fold"		=> "f_customization",
						"type" 		=> "select",
						"options" 	=> $bg_size
				);

$of_options[] = array( 	"name" 		=> __("Background Repeat", "pixel8es"),
						"desc" 		=> __("Choose the footer background image repeat option", "pixel8es"),
						"id" 		=> "custom_f_bg_repeat",
						"std" 		=> "cover",
						"fold"		=> "f_customization",
						"type" 		=> "select",
						"options" 	=> $bg_repeat
				);


$of_options[] = array( 	"name" 		=> __("Show/Hide Footer Widget", "pixel8es"),
						"desc" 		=> __("Do you want to display the footer widget?", "pixel8es"),
						"id" 		=> "f_widget",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __("Footer Widget Columns", "pixel8es"),
						"desc" 		=> __("Choose the footer widget columns", "pixel8es"),
						"id" 		=> "f_widget_col",
						"std" 		=> "col3",
						"fold" => "f_widget",
						"type" 		=> "select",
						"options" 	=> $columns
				);

$of_options[] = array( "name" => __("Choose the Registered Sidebar", "pixel8es"),
					"desc" => __("Please choose the sidebar you have created", "pixel8es"),
					"id" => "f_select_sidebar",
					"std" => "0",
					"fold" => "f_widget",
					"type" => "select_sidebar",
					"hide" => array('footer-widgets')
					);

$of_options[] = array( 	"name" 		=> __("Show/Hide Small footer", "pixel8es"),
						"desc" 		=> __("Do you want to display the small footer?", "pixel8es"),
						"id" 		=> "f_small",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => __("Copyright Text", "pixel8es"),
					"desc" => __("Type Copyright Text", "pixel8es"),
					"id" => "f_copyright_t",
					"std" => "<p>&copy; 2014 [blog-link], All Rights Reserved.</p>",
					"fold" => "f_small",
					"type" => "textarea");

$of_options[] = array( 	"name" 		=> __("Copyright Background Color", "pixel8es"),
						"desc" 		=> __("This is the copyright background color", "pixel8es"),
						"id" 		=> "custom_fc_bg_color",
						"std" 		=> "",
						"fold" => "f_small",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Copyright Text Color", "pixel8es"),
						"desc" 		=> __("This is the copyright text color", "pixel8es"),
						"id" 		=> "custom_fc_txt_color",
						"std" 		=> "",
						"fold" => "f_small",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Copyright Link Color", "pixel8es"),
						"desc" 		=> __("This is the copyright link color", "pixel8es"),
						"id" 		=> "custom_fc_link_color",
						"std" 		=> "",
						"fold" => "f_small",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Copyright Link Hover Color", "pixel8es"),
						"desc" 		=> __("This is the copyright link hover color", "pixel8es"),
						"id" 		=> "custom_fc_link_hover_color",
						"std" 		=> "",
						"fold" => "f_small",
						"type" 		=> "color"
				);

//Twitter Api Settings
$of_options[] = array( "name" => __("Twitter API Key", "pixel8es"),
					"type" => "heading");							
					
$of_options[] = array( "name" => __("Consumer Key", "pixel8es"),
					"desc" => __("Paste your Twitter API's Consumer Key", "pixel8es"),
					"id" => "twitter_api_consumer_key",
					"std" => "",
					"type" => "text");							

$of_options[] = array( "name" => __("Consumer Secret Key", "pixel8es"),
					"desc" => __("Paste your Twitter API's Consumer Secret Key", "pixel8es"),
					"id" => "twitter_api_consumer_secret_key",
					"std" => "",
					"type" => "text");							

$of_options[] = array( "name" => __("Access Token", "pixel8es"),
					"desc" => __("Paste your Twitter API's Access Token", "pixel8es"),
					"id" => "twitter_api_access_token",
					"std" => "",
					"type" => "text");							

$of_options[] = array( "name" => __("Access Token Secret Key", "pixel8es"),
					"desc" => __("Paste your Twitter API's Access Token Secret Key", "pixel8es"),
					"id" => "twitter_api_access_token_secret_key",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __("Twitter Cache Duration (in seconds)", "pixel8es"),
					"desc" => __("Set how often you want to check for new tweets? By default, results are cached for 1 hour to help you avoid hitting the API limits.", "pixel8es"),
					"id" => "twitter_cache_expire",
					"std" => 3600,
					"type" => "text");

//Styling Options
$of_options[] = array( "name" => __("Styling Options", "pixel8es"),
					"type" => "heading");


$of_options[] = array( 	"name" 		=> __("Theme Color", "pixel8es"),
						"desc" 		=> __("Use radio buttons as Theme color.", "pixel8es"),
						"id" 		=> "theme_color",
						"std" 		=> "default",
						"type" 		=> "colorchooser",
						"options" 	=> array(											
							'default' => '#fcc21f',
							'skin-beauty' => '#f27791',
							'skin-corporate' 	=> '#3c5895',
							'skin-creative' => '#f2333a',
							'skin-education' 	=> '#f26522',
							'skin-freelancer' 	=> '#2bb673',
							'skin-food' 	=> '#ff8b00',
							'skin-medical' => '#0eb2e7',
							'skin-music' 	=> '#8dc63f',
							'skin-portfolio' 	=> '#f7941e',
							'skin-shop' 	=> '#e5403a',
							'skin-sports' => '#c00e00',
							'skin-transportation' 	=> '#0066cc',
							'skin-personal' 	=>'#79BA1E',
							'skin-wedding' 	=> '#ff6473',
							'skin-fitness' 	=> '#9b3278',
							'skin-minimal'  => '#6bb6bb',
							'skin-travel'   => '#f75f2f',
							'skin-creative-agency'    => '#ed90a3',
							'skin-advertising'    => '#afd798',
							'skin-consulting'    => '#dda552',
							'skin-studio'    => '#69B553',
                            'skin-portfolio-minimal'=> '#A3CDCC',
                            'skin-onepage' =>  '#ffc543', 
							'blumine-blue' => '#174b73',
							'copper-brown' => '#b07938',
							'deluge' => '#8062ab',
							'havelock' =>'#468ac9',
							'highland-green' => '#679468',
							'well-read' => '#b2353d'
						)
				);

$of_options[] = array( "name" => __("Custom Styles", "pixel8es"),
					"desc" => __("Do you like to use Custom Styles, Please enable it and choose the Background color, Primary color, Selection text color, selection background color, link hover color. If it's disabled, the default style will apply and custom styles are won't apply.", "pixel8es"),
					"id" => "custom_styles",
					"std" => 0,
					"on" => "Yes",
					"off" => "No",
					"type" => "switch"
				);

$of_options[] = array( "name" => __("Customize Body Background", "pixel8es"),
					"desc" => __("Do you want to customize the body backgound?", "pixel8es"),
					"id" => "customize_body_bg",
					"std" => 0,
					"on" => "Yes",
					"off" => "No",
					"type" => "switch"
				);
				
$of_options[] = array( 	"name" 		=> __("Body Background Color", "pixel8es"),
						"desc" 		=> __("Pick a background color for the theme (default: #fff).", "pixel8es"),
						"id" 		=> "body_background",
						"std" 		=> "#fff",
						"fold"		=> "customize_body_bg",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Choose Body Pattern", "pixel8es"),
						"id" 		=> "custom_body_bg_pattern",
						"std" 		=> "none",
						"type" 		=> "images",
						"fold"		=> "customize_body_bg",
						"options" 	=> $pattern
				);

$of_options[] = array( "name" => __("Upload Body Background Image", "pixel8es"),
					"desc" => __("Upload a body background image", "pixel8es"),
					"id" => "custom_body_bg",
					"std" => '',
					"mod" => "min",
					"fold"		=> "customize_body_bg",
					"type" => "media");

$of_options[] = array( 	"name" 		=> __("Background Attachment", "pixel8es"),
						"desc" 		=> __("Choose the footer background image attachment", "pixel8es"),
						"id" 		=> "custom_body_bg_attachment",
						"std" 		=> "scroll",
						"fold"		=> "customize_body_bg",
						"type" 		=> "select",
						"options" 	=> $bg_attachment
				);

$of_options[] = array( 	"name" 		=> __("Background Size", "pixel8es"),
						"desc" 		=> __("Choose the footer background image size", "pixel8es"),
						"id" 		=> "custom_body_bg_size",
						"std" 		=> "cover",
						"fold"		=> "customize_body_bg",
						"type" 		=> "select",
						"options" 	=> $bg_size
				);

$of_options[] = array( 	"name" 		=> __("Background Repeat", "pixel8es"),
						"desc" 		=> __("Choose the footer background image repeat option", "pixel8es"),
						"id" 		=> "custom_body_bg_repeat",
						"std" 		=> "cover",
						"fold"		=> "customize_body_bg",
						"type" 		=> "select",
						"options" 	=> $bg_repeat
				);

$of_options[] = array( 	"name" 		=> __("Primary Color", "pixel8es"),
						"desc" 		=> __("This is the primary color for the theme.(its applied for most of the items in the theme such as button, link etc..", "pixel8es"),
						"id" 		=> "pri_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> __("Selection Text Color", "pixel8es"),
						"desc" 		=> __("This is the text color when selecting the text.", "pixel8es"),
						"id" 		=> "selection_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> __("Selection Text Background Color", "pixel8es"),
						"desc" 		=> __("This is the text background color when selecting the text.", "pixel8es"),
						"id" 		=> "selection_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Header Widget Title Color", "pixel8es"),
						"desc" 		=> __("This is the header widget title color for the theme.", "pixel8es"),
						"id" 		=> "header_widget_title_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Header Widget Text Color", "pixel8es"),
						"desc" 		=> __("This is the header text color for the theme.", "pixel8es"),
						"id" 		=> "header_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Header Widget Link Color", "pixel8es"),
						"desc" 		=> __("This is the header link color for the theme.", "pixel8es"),
						"id" 		=> "header_link_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Header Widget Link Hover Color", "pixel8es"),
						"desc" 		=> __("This is the header widget link hover color for the theme.", "pixel8es"),
						"id" 		=> "header_link_hover_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> __("Highlight Color", "pixel8es"),
						"desc" 		=> __("This is the highlight color for the theme.", "pixel8es"),
						"id" 		=> "highlight_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

//Styling Options
$of_options[] = array( "name" => __("Select Skin", "pixel8es"),
					"type" => "heading");

$of_options[] = array( 	"name" 		=> __("Choose your Skin", "pixel8es"),
						"id" 		=> "select_skin",
						"std" 		=> "default",
						"type" 		=> "images",
						//"size"		=> "full",
						"options" 	=> $skin
				);


//Typography
$of_options[] = array( "name" => __("Typography", "pixel8es"),
					"type" => "heading");

$of_options[] = array( 	"name" 		=> __("Body Fonts", "pixel8es"),
						"desc" 		=> __("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will for body texts", "pixel8es"),
						"id" 		=> "custom_font_body",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => 'regular',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Primary Fonts", "pixel8es"),
						"desc" 		=> __("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will apply for Headings, main menu, Titles etc. To take full contorl turn on advance font settings from below and enjoy!", "pixel8es"),
						"id" 		=> "custom_font_primary",
						"std" 		=> array(
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700'
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Content Fonts", "pixel8es"),
						"desc" 		=> __("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will apply for most of the sections in the theme including paragraph, lists, blockquote, testimonial, sub menu etc. To take full contorl turn on advance font settings from below and enjoy!", "pixel8es"),
						"id" 		=> "custom_font_content",
						"std" 		=> array(
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											//'style' => 'regular',
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);


//Subset
$subset = array(
			'latin' => 'Latin',
			'cyrillic-ext' => 'Cyrillic Extended (cyrillic-ext) ',
			'greek-ext' => 'Greek Extended (greek-ext)',
			'greek' => 'Greek (greek)',
			'vietnamese' => 'Vietnamese (vietnamese)',
			'latin-ext' => 'Latin Extended (latin-ext)',
			'cyrillic' => 'Cyrillic (cyrillic)'
			);

$of_options[] = array( 	"name" 		=> __("Choose the character sets you want:", "pixel8es"),
						"desc" 		=> __("If you choose only the languages that you need, you'll help prevent slowness on your webpage.", "pixel8es"),
						"id" 		=> "subset",
						"std" 		=> array("latin"),
						"type" 		=> "multicheck",
						"options" 	=> $subset
				);

//Advance Typography Options
$of_options[] = array( "name" => __("Advance Typography", "pixel8es"),
					"type" => "heading");

$of_options[] = array( "name" => __("Advance Font Setting", "pixel8es"),
					"desc" => __("Do you like to Enable Advance Font Settings? By enabling this you can choose font each and every possible section. choose less number of fonts, it will to help prevent slowness on your webpage.", "pixel8es"),
					"id" => "ad_font_settings",
					"std" => 0,
					"on" => "Yes",
					"off" => "No",
					"folds"		=> 1,
					"type" => "switch"
				);

$of_options[] = array( 	"name" 		=> __("H1 Font", "pixel8es"),
						"desc" 		=> __("This font will apply for h1 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_h1",
						"std" 		=> array(
											'size'  => '24px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("H2 Font", "pixel8es"),
						"desc" 		=> __("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_h2",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("H3 Font", "pixel8es"),
						"desc" 		=> __("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_h3",
						"std" 		=> array(
											'size'  => '18px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("H4 Font", "pixel8es"),
						"desc" 		=> __("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_h4",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("H5 Font", "pixel8es"),
						"desc" 		=> __("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_h5",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("H6 Font", "pixel8es"),
						"desc" 		=> __("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_h6",
						"std" 		=> array(
											'size'  => '12px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("List Item Font", "pixel8es"),
						"desc" 		=> __("This font will apply for li tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_list",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Link Font", "pixel8es"),
						"desc" 		=> __("This font will apply for link tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_link",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Logo Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Text Logo.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_logo",
						"std" 		=> array(
											'size'  => '30px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("BlockQuote Font", "pixel8es"),
						"desc" 		=> __("This font will apply for blockquote tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_blockquote",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Main Menu Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Main Menu Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Sub Menu Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Sub Menu Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_sub_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Mega Menu Title Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Mega Menu Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_mega_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Title Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_main_title",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);


$of_options[] = array( 	"name" 		=> __("Button Small Font Size", "pixel8es"),
						"desc" 		=> __("Choose the button large text font size", "pixel8es"),
						"id" 		=> "cf_btn_small",
						"std" 		=> "13px",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"fold"		=> "ad_font_settings",
						"options" 	=> $font_sizes
				);


$of_options[] = array( 	"name" 		=> __("Button Medium Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Button Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_btn",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Button Large Font Size", "pixel8es"),
						"desc" 		=> __("Choose the button large text font size", "pixel8es"),
						"id" 		=> "cf_btn_lg",
						"std" 		=> "16px",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"fold"		=> "ad_font_settings",
						"options" 	=> $font_sizes
				); 

$of_options[] = array( 	"name" 		=> __("Process Title Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Process Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_process_title",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				); 

$of_options[] = array( 	"name" 		=> __("Process Content Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Process Content Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_process_content",
						"std" 		=> array(
											'size'  => '40px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Skill Percentage Text Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Percentage Text Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_percent_text",
						"std" 		=> array(
											'size'  => '40px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				); 

$of_options[] = array( 	"name" 		=> __("Skill Percentage Outside Title Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Percentage Outside Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_percent_outside",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Textfield Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Textfield Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_txtfield",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Staff Title Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Staff Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_staff_title",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Portfolio Filter Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Portfolio Filter Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_filter_normal",
						"std" 		=> array(
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Pricing Table Title Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Pricing Table Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_plan_title",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '600',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Pricing Table Price Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Pricing Table Price Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_plan_value",
						"std" 		=> array(
											'size'  => '32px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '900',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Pricing Table Currency Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Pricing Table Currency Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_plan_valign",
						"std" 		=> array(
											'size'  => '13px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Pricing Table Price Period Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Pricing Table Price Period Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_plan_month",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Testimonial Content Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Testimonial Content Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_testimonial_content",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Widget Title Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Widget Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_widget_title",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> __("Twitter Content Font", "pixel8es"),
						"desc" 		=> __("This font will apply for Twitter Content Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", "pixel8es"),
						"id" 		=> "cf_twitter",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				); 

//Advance Typography Options
$of_options[] = array( "name" => __("Import Demo", "pixel8es"),
					"type" => "heading",
					"custom_class" => "import-demo");

/*$of_options[] = array( 	"name" 		=> __("Download attachments", "pixel8es"),
						"desc" 		=> __("Do you want to download demo attachement? (In order to speed up the import process, or in case of upload fail, Turn off the \"Download attachments\" switch off. That will give you all the pages and posts without the attachments. This is a good option because users will need to use their own images anyways.If you choose \"Yes\", wordpress download and upload all the files from demo including images, videos and audio. But depends on your connection it took more time to complete the import.)", "electrifytheme"),
						"id" 		=> "download_attachments",
						"std" 		=> 0,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"type" 		=> "switch"
				);*/

$pix_import_nonce = wp_create_nonce("pix_import_nonce");
$import_link = admin_url('admin-ajax.php?action=pix_import_demo&nonce='.$pix_import_nonce);

$of_options[] = array( "name" => __("Import Demo Data", "pixel8es"),
					"desc" => __("Click Here to start import the demo content.", "pixel8es"),
					"id" => "import_demo_data",
					"icon" => true,
					"type" => "demodata");
//Theme Auto update
$of_options[] = array( "name" => __("Theme Update", "pixel8es"),
					"type" => "heading");

$of_options[] = array( "id" => "theme_auto_updater",
					"std" => __("<h3 style=\"margin: 0 0 10px;\">Update your theme from wordpress dashboard.</h3>
								Do you like get update notifications for your themes and do you like to update your theme from here (Wordpress Dashboard)? If yes please enter your themeforest username and your themeforest Secret API Key below.", "pixel8es"),
					"icon" => true,
					"type" => "info");

$of_options[] = array( 	"name" 		=> __("Themeforest Username", "pixel8es"),
						"desc" 		=> __("Enter your Themeforest Username.", "pixel8es"),
						"id" 		=> "themeforest_username",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __("Themeforest API key", "pixel8es"),
						"desc" 		=> __("Enter your Themeforest Secret API Key. To obtain your API Key, visit your 'My Settings' page on any of the Envato Marketplaces.", "pixel8es"),
						"id" 		=> 'themeforest_apikey',
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( "id" => "theme_auto_updater_noty",
					"std" => __("<h3>If you entered your Themeforest Username and your Themeforest Secret API Key correctly, you will get update notifications if update available.</h3>", "pixel8es"),
					"icon" => true,
					"type" => "info");

// Backup Options
$of_options[] = array( 	"name" 		=> __("Backup Options", "pixel8es"),
						"type" 		=> "heading",
						
				);
				
$of_options[] = array( 	"name" 		=> __("Backup and Restore Options", "pixel8es"),
						"desc" 		=> __("You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.", "pixel8es"),
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
				);
				
$of_options[] = array( 	"name" 		=> __("Transfer Theme Options Data", "pixel8es"),
						"desc" 		=> __("You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click 'Import Options'.", "pixel8es"),
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>