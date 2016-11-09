<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<?php global $smof_data;

$header_widget = isset($smof_data['header_widget'])? $smof_data['header_widget'] : 1;

$flyin_sidebar = isset($smof_data['flyin_sidebar'])? $smof_data['flyin_sidebar'] : 0;

$boxed_content = isset($smof_data['boxed_content'])? $smof_data['boxed_content'] : 0;

$main_wrap = isset($smof_data['main_wrap'])? $smof_data['main_wrap'] : 0;
$content_wrap = isset($smof_data['content_wrap'])? $smof_data['content_wrap'] : 0;

$mobile_responsive = isset($smof_data['mobile_responsive'])? $smof_data['mobile_responsive'] : 1;

$header_widget_col = isset($smof_data['header_widget_col'])? $smof_data['header_widget_col'] : 'col3';
$sidebar_name = isset($smof_data['header_select_sidebar'])? $smof_data['header_select_sidebar'] : ''; 

$favicon = ''; 
$favicon = isset($smof_data['fav_icon'])? $smof_data['fav_icon'] : '';
if (empty($favicon)){
	$favicon = get_template_directory_uri('template_url').'/favicon.ico'; 
}

$apple_touch_icon = '';
$apple_touch_icon = isset($smof_data['apple_touch_icon']) ? $smof_data['apple_touch_icon'] : '';

if (empty($apple_touch_icon)) {
	$apple_touch_icon = get_template_directory_uri('template_url').'/apple-touch-icon.png'; 
}

$GLOBALS['pix_dot_nav'] = '';
?>
<head>
	<meta charset="utf-8">
	<?php
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
		echo('<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">');
	?>

	<?php // mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>


	<title><?php bloginfo('name'); ?> <?php wp_title("|",true); ?></title>

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<link rel="apple-touch-icon" href="<?php echo $apple_touch_icon ?>">

	<link rel="shortcut icon" href="<?php echo $favicon ?>">
		
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<?php global $pix_theme_pri_color; ?>
	<meta name="msapplication-TileColor" content="<?php echo $pix_theme_pri_color; ?>">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/img/win8-tile-icon.png">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php

	$custom_css = isset($smof_data['custom_css']) ? $smof_data['custom_css'] : '';

	if(!empty($custom_css))
		echo '<style>'. $custom_css. '</style>';

	// Google Analytics
	$google_analytics = isset($smof_data['google_analytics']) ? $smof_data['google_analytics'] : '';
	if(!empty($google_analytics)){ ?>
		<!-- Asynchronous google analytics; this is the official snippet.
		Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.-->	 
		<script>

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $google_analytics; ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script>
		
	<?php } // end analytics?>
	
	<?php // wordpress head functions ?>
	<?php wp_head(); ?>
	<?php // end of wordpress head ?>

</head>
<?php $header = isset($smof_data['header_option']) ? $smof_data['header_option'] : 'header1'; 

$body_class = '';
if($header == 'left-header'){
	$body_class .= ' left-header-con';
}
if($header == 'right-header'){
	$body_class .= ' right-header-con';
}

if($mobile_responsive == 0){
	$body_class .= 'pix-no-responsive';
}

$pix_ajax = isset($smof_data['pix_ajax']) ? $smof_data['pix_ajax'] : 0;
$pix_ajax_style = isset($smof_data['pix_ajax_style']) ? $smof_data['pix_ajax_style'] : 'style1';
$ajaxtransin = isset($smof_data['ajaxtransin']) ? $smof_data['ajaxtransin'] : 'fadeInUp';
$ajaxtransout = isset($smof_data['ajaxtransout']) ? $smof_data['ajaxtransout'] : 'fadeOutDown';
if($pix_ajax == 1 && !isset($_GET['vc_editable'])){
       $body_class .= ' pix-ajaxify';
}


$pix_preloader = isset($smof_data['pix_preloader']) ? $smof_data['pix_preloader'] : 0;
$preloadtrans = isset($smof_data['preloadtrans']) ? $smof_data['preloadtrans'] : 'fadeInUp';
if($pix_preloader == 1 && !isset($_GET['vc_editable'])){
	$body_class .= ' pix-preloader-enabled';
}

$top_class = $sub_class = $main_class = $header_class = $header_con_class = '';

$main_menu = isset($smof_data['main_menu']) ? $smof_data['main_menu'] : 1;
if($main_menu == 0){
	$main_class = ' menu-light';
}else{
	$main_class = ' menu-dark';
}

$sub_menu = isset($smof_data['sub_menu']) ? $smof_data['sub_menu'] : 0;
if($sub_menu == 1){
	$sub_class = 'sub-menu-dark';
}

if($flyin_sidebar == 1){
	$body_class .= ' flyin-sidebar-wrapper';
}


$mobile_menu_dropdown = isset($smof_data['mobile_menu_dropdown']) ? $smof_data['mobile_menu_dropdown'] : 1;
if($mobile_menu_dropdown == 0){
	$mobile_menu_dropdown = 'mobile-menu-dropdown';
}else{
	$mobile_menu_dropdown = '';
}

?>
<body <?php body_class($body_class); ?>>
<?php if($pix_preloader == 1 && !isset($_GET['vc_editable'])){ ?>
<div id="preloader-con">
	<div class="preloader preloader-1"></div>
</div>
<?php } ?>
<div class="mobile-menu-nav <?php echo $main_class .' '. $mobile_menu_dropdown ?>"></div>

<div id="content-pusher">
<?php if($pix_ajax == 1 && !isset($_GET['vc_editable'])){ ?>
	 <div id="pix-loadingbar">
		<?php if($pix_ajax_style == 'style1'){ ?>
		<div id="loader">
			<div id="d1"></div>
			<div id="d2"></div>
			<div id="d3"></div>
			<div id="d4"></div>
			<div id="d5"></div>
		</div>
		<?php } 
		if($pix_ajax_style == 'style2'){ ?>
		<div id="container">
			<div id="dot"></div>
			<div class="step" id="s1"></div>
			<div class="step" id="s2"></div>
			<div class="step" id="s3"></div>
		</div>
		<?php } 
		if($pix_ajax_style == 'style3'){ ?>
		<div class="jet-wrap">
			<div class="jet">
				<span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</span>
				<div class="base">
					<span></span>
					<div class="face"></div>
				</div>
			</div>
			<div class="longfazers">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="jet_loading_text">Loading</div>
		</div>
		<?php } 
		if($pix_ajax_style == 'style4'){ ?>
		<div id="loader">
			<div id="top"></div>
			<div id="bottom"></div>
			<div id="line"></div>
		</div>
		<?php } 
		if($pix_ajax_style == 'style5'){ ?>
		<div id="container">
			<div id="loader"></div>  
		</div>
		<?php } 
		if($pix_ajax_style == 'style6'){ ?>
		<div class="loader loader-1"></div>
		<?php } 
		if($pix_ajax_style == 'style7'){ ?>
		<div class="loader loader-1"></div>
		<?php } 
		if($pix_ajax_style == 'style8'){ ?>
		<div class="loader loader-2"></div>
		<?php } 
		if($pix_ajax_style == 'style9'){ ?>
		<div class="loader loader-3"></div>
		<?php }  
		if($pix_ajax_style == 'style10'){ ?>
		<ul class="loader">
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<?php } ?>
	</div> 
<?php } ?>

<?php 
if($boxed_content == 1){
	echo '<div class="pix-boxed-content">';
}
	?>
	<?php
		$go_to_top = isset($smof_data['go_to_top']) ? $smof_data['go_to_top'] : '1'; 
		if( $go_to_top == 1) {	
			echo '<p id="back-top"><a href="#top"><span class="pixicon-eleganticons-17"></span></a></p>';
		}
	?>

	<!--[if lte IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<!-- Top Header -->
	<?php 
		
		//Header transparency
		$header_trans = isset($smof_data['header_transparency']) ? $smof_data['header_transparency'] : 0;	

		
		$top_sec = isset($smof_data['top_sec']) ? $smof_data['top_sec'] : 0;
		if($top_sec == 1){
			$top_class = ' top-sec-dark';
		}

		$header_style = isset($smof_data['header_style']) ? $smof_data['header_style'] : 0;
		
		if($header_style == 1){
			$header_class = ' dark';
			$header_con_class= ' dark-con';
		}
		
		$header_sticky = isset($smof_data['header_sticky']) ? $smof_data['header_sticky'] : 1;
		if($header_sticky == 1 && $header != 'left-header' && $header != 'right-header'){
			$header_con_class .= ' pix-sticky-header';
		}

		if($sidebar_name == '0') { $sidebar_name = 'header-widgets'; }
	?>

<?php 
	$page_slug =  get_page_template_slug(); 

	if ( $page_slug != 'page-template/page-blank.php' ) {
    
?>

<?php if($header != 'left-header' || $header != 'right-header'){ ?>
	<?php if($header_widget){ ?>
		<div class="top-header-widget">
			<div id="headerWidgetCon" class="pageFooterCon">
				<div id="headerWidget" class="container  <?php echo $header_widget_col;  ?>">
					<!-- widgets -->
					<div class="row">

						<?php if ( is_active_sidebar( $sidebar_name ) ) : ?>

							<?php dynamic_sidebar( $sidebar_name ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->

							<div>
								<p><?php _e("Please activate some Widgets Or disable it from theme option", "pixel8es");  ?></p>
							</div>

						<?php endif; ?>                 
					</div><!-- widgets -->
				</div>
				<div class="toggleBtnCon"><a href="#" data-btn="close" class="toggleBtn open">Open</a></div>
			</div>
		</div>	

	<?php } ?>

	<?php
		if($header_trans){
			$header_trans_val = isset($smof_data['header_trans_val']) ? $smof_data['header_trans_val'] : '0';

			echo '<div class="transparent-header opacity-'.$header_trans_val.'">';
		}
	?>


	<?php 
	/*Menu Style classes
		1. default
		2.drive-nav
		3.nav-border
		4.nav-double-border
		5.right-arrow
		6.right-arrow cross-arrow
		7.background-nav
		8.background-nav background-nav-round
		9.solid-color-bg
		10.square-left-right
	*/
		$header_hover_style = isset($smof_data['header_hover_style'])? $smof_data['header_hover_style'] : 'default';

		if($header_hover_style == 'default'){
			$header_hover_style = '';
		}

	?>

			<div class="header-wrap <?php echo $header_hover_style . ' ' .$header_class.' '.$sub_class ?>">

				<?php if ($header != 'header1' && $header != 'header3' && $header != 'header8' && $header != 'header9' && $header != 'simple' && $header != 'left-header' && $header != 'right-header') : ?> 
						<div class="pageTopCon<?php echo $top_class; ?>">
							<div class="container">
								<div class="pageTop row">
									<div class="pull-left">
										<div class="header-center">
											<?php
											$top_elem_left = isset($smof_data['grey_left']) ? $smof_data['grey_left'] : '';
											display_header_elemments($top_elem_left, 'lang-list-wrap', 'page-top-left'); 
											?>
										</div>
									</div>
									<div class="pull-right">
										<div class="header-center">
											<?php 
											$top_elem_right = isset($smof_data['grey_right']) ? $smof_data['grey_right'] : '';
											display_header_elemments($top_elem_right, 'lang-list-wrap', 'page-top-right'); 
											?>
										</div>
									</div>
								</div>
							</div>
						</div>

				<?php endif; ?>

				<div class="header-con<?php echo $header_con_class; ?> menu-<?php echo $header.' '. $main_class; ?>">
					<?php  $logo = (isset($smof_data['custom_logo']) && !empty($smof_data['custom_logo'])) ? $smof_data['custom_logo'] : get_bloginfo('name'); ?>


					<?php  $logo2x = isset($smof_data['retina_logo']) ? $smof_data['retina_logo'] : ''; ?>

					<?php  if ($header == 'header1' || $header == 'header2' || $header == 'header3') :	?> 

						<header class="header" role="banner">

							<div class="container">

								<div id="inner-header" class="wrap clearfix">

									<div class="pix-menu">
										<div class="pix-menu-trigger">
											<span class="mobile-menu">menu</span>
										</div>
									</div>

									<?php if($flyin_sidebar){ ?>
									<div class="pix-flyin-sidebar">
										<div class="pix-flyin-trigger">
											<span>Flyin Sidebar</span>
										</div>
									</div>
									<?php } ?>
									
									<div class="menu-responsive">
										<?php pix_woo_cart(); ?>

										<?php if(class_exists('SitePress')){ ?>
											<div class="default-header-lang">
												<?php pix_languages_list(); ?>
											</div>
										<?php } ?>

									</div>
									<nav class="main-nav" role="navigation">
										<?php 

										pixel8es_main_nav(); 

										echo pix_header_search();

										?>
									</nav>

									<div id="logo">				
										<a href="<?php echo home_url(); ?>" rel="nofollow">
											<?php if ($logo != get_bloginfo('name')) {?>
											<img src="<?php echo $logo; ?>" data-at2x="<?php echo $logo2x; ?>" alt="">
											<?php }else echo $logo ?>
										</a>
									</div>

								</div>

							</div>

						</header>

					<?php elseif ($header == 'header4' || $header == 'header5') : ?>
						<header class="header" role="banner">

							<div class="container">

								<div id="inner-header" class="wrap col3 clearfix row">

									<div class="col-md-4 col-sm-4 left-side">
									<div class="left-side-inner clearfix">
										<?php 
										$main_left = isset($smof_data['main_left']) ? $smof_data['main_left'] : '';
										display_header_elemments($main_left);
										?>
									</div>
									</div>

									<div class="col-md-4 col-sm-4">
										<div id="logo">
											<a href="<?php echo home_url(); ?>" rel="nofollow">
												<?php if ($logo != get_bloginfo('name')) {?>
												<img src="<?php echo $logo; ?>" data-at2x="<?php echo $logo2x; ?>" alt="">
												<?php }else echo $logo ?>
											</a>
										</div>
									</div>

									<div class="col-md-4 col-sm-4 right-side">
									<div class="right-side-inner clearfix">
										<?php 
										$main_right = isset($smof_data['main_right']) ? $smof_data['main_right'] : '';
										display_header_elemments($main_right);
										?>
									</div>
									</div>

								</div>

							</div>

						</header>

						<div class="menu-wrap">

							<div class="container">

								<div class="pix-menu">
									<div class="pix-menu-trigger">
										<span class="mobile-menu">menu</span>
									</div>
								</div>
								
								<nav class="main-nav" role="navigation">
									<?php pixel8es_main_nav(); ?>

									<?php
									$nav_right = isset($smof_data['nav_right']) ? $smof_data['nav_right'] : '';
									display_header_elemments($nav_right);
									?>
								</nav>

							</div>

						</div>

					<?php elseif ($header == 'header6' || $header == 'header7') : ?>
						<header class="header" role="banner">

							<div class="container">

								<div id="inner-header" class="wrap col2 clearfix">
									<div class="row">
										<div class="col-md-4 col-sm-4 left-side">
											<div id="logo">
												<a href="<?php echo home_url(); ?>" rel="nofollow">
													<?php if ($logo != get_bloginfo('name')) {?>
													<img src="<?php echo $logo; ?>" data-at2x="<?php echo $logo2x; ?>" alt="">
													<?php }else echo $logo ?>
												</a>
											</div>
										</div>

										<div class="col-md-4 col-sm-4">
											<div class="search-center">
												<?php
												$main_center = isset($smof_data['main_center']) ? $smof_data['main_center'] : '';
												display_header_elemments($main_center);
												?>
											</div>		
										</div>
										<div class="col-md-4 col-sm-4 right-side">
										<div class="right-side-inner">
											<div class="pull-right">
												<?php

												$main_right = isset($smof_data['main_right']) ? $smof_data['main_right'] : '';
												display_header_elemments($main_right);

												?>
											</div>
										</div>
										</div>
									</div>
								</div>

							</div>

						</header>

						<div class="menu-wrap">

							<div class="container">

								<div class="pix-menu">
									<div class="pix-menu-trigger">
										<span class="mobile-menu">menu</span>
									</div>
								</div>
								
								<nav class="main-nav" role="navigation">
									<?php pixel8es_main_nav(); ?>

									<?php 
									$nav_right = isset($smof_data['nav_right']) ? $smof_data['nav_right'] : '';
									display_header_elemments($nav_right);	
									?>
								</nav>

							</div>

						</div>

					<?php elseif ($header == 'header8' || $header == 'header9') : ?>
						<header class="header <?php echo $header ?>" role="banner">

							<div class="container">

								<div class="wrap-header">

									<div id="inner-header" class="wrap col2 clearfix">
										<div class="row">
											<div class="col-md-4 col-sm-4 left-side">
												<div id="logo">
													<a href="<?php echo home_url(); ?>" rel="nofollow">
														<?php if ($logo != get_bloginfo('name')) {?>
														<img src="<?php echo $logo; ?>" data-at2x="<?php echo $logo2x; ?>" alt="">
														<?php }else echo $logo ?>
													</a>
												</div>   
											</div>          

											<div class="col-md-4 col-sm-4">
												<div class="search-center">
													<?php
													$main_center = isset($smof_data['main_center']) ? $smof_data['main_center'] : '';
													display_header_elemments($main_center);
													?>
												</div>	
											</div>	
											<div class="col-md-4 col-sm-4 right-side">
												<div class="pull-right">
													<?php

													$main_right = isset($smof_data['main_right']) ? $smof_data['main_right'] : '';
													display_header_elemments($main_right);

													?>
												</div>
											</div>

										</div>
									</div>
									<div class="menu-wrap">

										<div class="pix-menu">
											<div class="pix-menu-trigger">
												<span class="mobile-menu">menu</span>
											</div>
										</div>
										
										<nav class="main-nav" role="navigation">
											<?php pixel8es_main_nav(); ?>

											<?php 
											$nav_right = isset($smof_data['nav_right']) ? $smof_data['nav_right'] : '';
											display_header_elemments($nav_right);   
											?>
										</nav>

									</div>

								</div>
							</div>

						</header>

					<?php elseif ( $header == 'simple' ) : ?>
		
						<?php $logo_status = isset($smof_data['simple_logo']) ?  $smof_data['simple_logo'] : '0'; ?>

						<header class="header simple" role="banner">

							<div class="container">

								<div id="inner-header" class="wrap clearfix">
									
									<?php 
										if($logo_status == '1'):
									?>
										<div id="logo">				
											<a href="<?php echo home_url(); ?>" rel="nofollow">
												<?php if ($logo != get_bloginfo('name')) {?>
												<img src="<?php echo $logo; ?>" data-at2x="<?php echo $logo2x; ?>" alt="">
												<?php }else echo $logo ?>
											</a>
										</div>
									<?php endif; ?>
									<div class="simplemobilemenu">
										<div id="dl-menu" class="dl-menuwrapper hide-simple-menu">
											<button class="dl-trigger"><span class="pixicon pixicon-list"></span></button>
											<?php pixel8es_main_nav(); ?>					
										</div>
									</div>

								</div>

							</div>

						</header>

					<?php endif; ?>

				</div>



				<?php if ($header == 'header3') : ?> 

					<div class="pageTopCon<?php echo $top_class; ?>">
						<div class="container">
							<div class="pageTop row">
								<div class="pull-left">
									<div class="header-center">
										<?php
										$top_elem_left = isset($smof_data['grey_left']) ? $smof_data['grey_left'] : '';
										display_header_elemments($top_elem_left, 'lang-list-wrap', 'page-top-left'); 
										?>
									</div>
								</div>
								<div class="pull-right">
									<div class="header-center">
										<?php 
										$top_elem_right = isset($smof_data['grey_right']) ? $smof_data['grey_right'] : '';
										display_header_elemments($top_elem_left, 'lang-list-wrap', 'page-top-right'); 
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
			</div>

	<?php
		if($header_trans){
			echo '</div>';
		}
	?>

<?php } ?>

<?php if($header == 'left-header' || $header == 'right-header'){ ?>

<?php if($header == 'left-header'){ 
echo '<div class="main-side-left">';
 } 
if($header == 'right-header'){ 
echo '<div class="main-side-left main-side-right">';
} ?>
	<div class="left-main-menu">
		<div class="menu-container">

			<?php  $logo = (isset($smof_data['custom_logo']) && !empty($smof_data['custom_logo'])) ? $smof_data['custom_logo'] : get_bloginfo('name'); ?>

			<?php  $logo2x = isset($smof_data['retina_logo']) ? $smof_data['retina_logo'] : ''; ?>

			<div class="m-sticky">
				<div class="container">
					<div id="mobile-logo">	
						<a href="<?php echo home_url(); ?>" rel="nofollow">
							<?php if ($logo != get_bloginfo('name')) {?>
							<img src="<?php echo $logo; ?>" data-at2x="<?php echo $logo2x; ?>" alt="">
							<?php }else echo $logo ?>
						</a>
					</div>
					<div class="menu-responsive pix-menu-trigger">
						<span class="mobile-menu"></span>
					</div>
				</div>
			</div>

			<div id="logo">				
				<a href="<?php echo home_url(); ?>" rel="nofollow">
					<?php if ($logo != get_bloginfo('name')) {?>
					<img src="<?php echo $logo; ?>" data-at2x="<?php echo $logo2x; ?>" alt="">
					<?php }else echo $logo ?>
				</a>
			</div>

			<div class="pix-menu">
				<div class="pix-menu-trigger">
					<span class="mobile-menu">menu</span>
				</div>
			</div>
			<nav class="main-nav main-nav-left" role="navigation">
				<?php 

				pixel8es_main_nav(); 

				?>
			</nav>
			
		</div>
	</div>
<?php } ?>



	<?php
		} //check page template is 'blank'
	?>

	<div id="main-wrapper" class="clearfix">
		<div id="wrapper" data-ajaxtransin="<?php echo $ajaxtransin; ?>" data-ajaxtransout="<?php echo $ajaxtransout; ?>" data-preloadtrans="<?php echo $preloadtrans; ?>">
			
		