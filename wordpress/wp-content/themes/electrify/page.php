<?php get_header(); 
global $smof_data;

$page_options = get_post_meta(get_the_id(),'electrify_page_options');
if( !empty($page_options)){
	extract($page_options[0]);
}

//Layout Options
$sidebar_position = isset($sidebar_position) ? $sidebar_position : "no_sidebar";


if (class_exists('Woocommerce')) {
	if( (is_cart() || is_checkout() || is_account_page())  && $sidebar_position == "full_width"){
		$sidebar_position = "no_sidebar";
	}
}

$selected_sidebar_replacement = isset($selected_sidebar_replacement) ? $selected_sidebar_replacement : '0';

$col_class = ( $sidebar_position == "right" || $sidebar_position == "left" ) ? ' col-md-9' : '';

//Sub Header Options
$pix_header_text = isset($pix_header_text) ? $pix_header_text : 'left';	
$header_size = isset($header_size) ? $header_size : 'small';
$pix_header_styles = isset($pix_header_styles) ? $pix_header_styles : 'color';
$header_bg_image = isset($header_bg_image) ? $header_bg_image : '';
$header_bg_color = isset($header_bg_color) ? $header_bg_color : 'f1f2f2';
$header_text_color = isset($header_text_color) ? $header_text_color : '';
$display_header = isset($display_header) ? $display_header : 'show';
$hide_breadcrumbs = isset($header_breadcrumbs) ? $header_breadcrumbs : 'show';

$header = isset($smof_data['header_option']) ? $smof_data['header_option'] : 'header1';


//rebuilding image
if(!empty($header_bg_image)){
	$header_bg_image = htmlspecialchars_decode($header_bg_image);
	$header_bg_image = json_decode($header_bg_image,true);
	if(is_array($header_bg_image) && !empty($header_bg_image))
		$header_bg_image = $header_bg_image[0]['full'];
}

if($display_header == "show"){
	subBanner(get_the_title());
}
$sub_header_class = ' ';
$sub_header_class .= isset($smof_data['header_option']) ? 'content-'.$smof_data['header_option'] : 'header1';
$header_trans = isset($smof_data['header_transparency']) ? $smof_data['header_transparency'] : 0;

if($header_trans){
	$sub_header_class .= ' sub-header-trans';
}

if($sidebar_position != 'full_width'){
?>

<div class="container boxed">
	<div class="row">

<?php } ?>

		<?php
		if($sidebar_position == "left" ){
			get_sidebar();	
		}

		if (have_posts()) : while (have_posts()) : the_post(); 
		
		// Side Main Menu 
		if ( $header == 'left-header' || $header == 'right-header' ){ 

			echo '<div class="left-menu-content">';

		} ?>

		<section id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' . $col_class .' sub-header-'.$display_header.$sub_header_class ); ?>>

			<section itemprop="articleBody">
				<?php the_content(); ?>
			</section>

		</section>

		<?php endwhile; else : ?>

				<article id="post-not-found" class="hentry clearfix">
					<header class="article-header">
						<h1><?php _e( 'Oops, Post Not Found!', 'pixel8es' ); ?></h1>
					</header>
				</article>

		<?php endif; 

		if($sidebar_position == "right" ){ 
			get_sidebar();
		} 

if($sidebar_position != 'full_width'){

?>
	</div>
</div>

<?php } 
get_footer(); ?>
