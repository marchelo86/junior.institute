<?php
/*
Template Name: Right Navigation
*/
get_header();

	//Sub Header Options
$pix_header_text = isset($pix_header_text) ? $pix_header_text : 'left';	
$header_size = isset($header_size) ? $header_size : 'small';
$pix_header_styles = isset($pix_header_styles) ? $pix_header_styles : 'color';
$header_bg_image = isset($header_bg_image) ? $header_bg_image : '';
$header_bg_color = isset($header_bg_color) ? $header_bg_color : 'f1f2f2';
$header_text_color = isset($header_text_color) ? $header_text_color : '';
$display_header = isset($display_header) ? $display_header : 'show';

	//rebuilding image
$header_bg_image = htmlspecialchars_decode($header_bg_image);
$header_bg_image = json_decode($header_bg_image,true);
$header_bg_image = $header_bg_image[0]['full'];

if($display_header == "show"){
	subBanner(get_the_title());
}

if (have_posts()) : while (have_posts()) : the_post(); 

	//if($template_sub_banner['sb_right_nav'] == 1){

	//	subBanner(get_the_title());

	//}


?>

<div role="main" id="mainContent" class="center row-fluid">

	<div class="no-fullwidth">

		<section class="container boxed entry-content clearfix" itemprop="articleBody">
			<div class="row">
				<div class="col-md-9">
					<?php the_content(); ?>
				</div>
				<aside class="col-md-3">
					<?php
					if(function_exists('wp_nav_menu')) {                                      
						wp_nav_menu(
							array(
								'theme_location' => 'right-nav',
								'container' => false,
								'menu_class' => 'subNavigation right',
								'echo' => true,
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'depth' => 1,
								'fallback_cb' => 'pixel8es_nav_fallback'
								)
							);
					} 
					else {
						pixel8es_nav_fallback();
					}
					
					?>
				</aside>
			</div>
		</section> <!-- end article section -->
	</div>
</div> <!-- end #content -->
<?php endwhile; else : ?>
	
<?php endif; ?>

<?php get_footer(); ?>
