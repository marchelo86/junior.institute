<?php 
/*
	Template Name: Testimonial
*/

get_header(); 

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

$col_class = ( $sidebar_position == "right" || $sidebar_position == "left" ) ? ' col-md-9' : 'col-md-12';

//Sub Header Options
$pix_header_text = isset($pix_header_text) ? $pix_header_text : 'left';	
$header_size = isset($header_size) ? $header_size : 'small';
$pix_header_styles = isset($pix_header_styles) ? $pix_header_styles : 'color';
$header_bg_image = isset($header_bg_image) ? $header_bg_image : '';
$header_bg_color = isset($header_bg_color) ? $header_bg_color : 'f1f2f2';
$header_text_color = isset($header_text_color) ? $header_text_color : '';
$display_header = isset($display_header) ? $display_header : 'show';
$hide_breadcrumbs = isset($header_breadcrumbs) ? $header_breadcrumbs : 'show';

//Get Theme Option Values
global $smof_data;

    $testimonial_count = isset($smof_data['testimonial_count'])? $smof_data['testimonial_count'] : -1;
    $testimonial_orderby = isset($smof_data['testimonial_orderby'])? $smof_data['testimonial_orderby'] : 'date';
    $testimonial_order = isset($smof_data['testimonial_order'])? $smof_data['testimonial_order'] : 'asc';
    $testimonial_img = isset($smof_data['testimonial_img'])? $smof_data['testimonial_img'] : 1;
    $testimonial_job = isset($smof_data['testimonial_job'])? $smof_data['testimonial_job'] : 1;
    $testimonial_rating = isset($smof_data['testimonial_rating'])? $smof_data['testimonial_rating'] : 1;
    $testimonial_pagination = isset($smof_data['testimonial_pagination'])? $smof_data['testimonial_pagination'] : 1;
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


?>

<div class="container boxed">
	<div class="row">



		<?php
		if($sidebar_position == "left" ){
			get_sidebar();	
		}

		$output = '<section id="testimonial-page" class="'. $col_class .' sub-header-'.$display_header.$sub_header_class.'">';


	$output .= '<div class="">';
	

	$output .= '<div id="testimonial-con">';

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args = array(
		'post_type' => 'pix_testimonial',
		'orderby' => $testimonial_orderby,
		'order' => $testimonial_order,
		'posts_per_page' => $testimonial_count,
		'paged' => $paged,
		);

	query_posts($args);

	if (have_posts()) : while (have_posts()) : the_post();

		$temp_thumb = $img = $rating_star = $job_company = '';

		$temp_title = get_the_title(); //title
		$temp_content = get_the_content(); //content

		$testimonial_details = get_post_meta(get_the_id(),'electrify_testimonial_options');
		if( !empty($testimonial_details)){
			extract($testimonial_details[0]);
		}

		//Set Defaults
		$author_job = isset($author_job) ? $author_job : '';
		$company_name = isset($company_name) ? $company_name : '';
		$company_url = isset($company_url) ? $company_url : '';
		$rating = isset($rating) ? $rating : '5';

		
		//Get Feature Thumbnail
		if (has_post_thumbnail()) { // checks if post has a featured image and then outputs it.
			$image_id = get_post_thumbnail_id ($post->ID );  
			$image_testimonial_url = wp_get_attachment_image_src( $image_id, 'full'); 
			$temp_thumb = aq_resize($image_testimonial_url[0], 80, 80, true, true); 

			if($temp_thumb){
				$temp_thumb = '<img src="' . $temp_thumb . '" alt="">';
			}else{
				$temp_thumb = '<img src="'.$image_testimonial_url[0].'" alt="'. $temp_title . '">';                                           
			}                                   
		}	
		
		

		if($testimonial_rating){
			$rating_star = '<div class="star">';
			for($i=0;  $i < (int)$rating; $i++){
				$rating_star .= '<i class="color star-icon pixicon-eleganticons-145"></i>';
			}
			for((int)$j=(5-$rating);  $j > 0; $j--){
				$rating_star .= '<i class="star-icon pixicon-eleganticons-145"></i>';
			}
			$rating_star .= '</div>';
		}
		
		

		if(!empty($company_url) && !empty($company_name)){
			$company = '<a href="'.esc_url($company_url).'">'. $company_name .'</a>';
		}

		if(!empty($author_job) && !empty($company)){
			$job_company = '<p class="pix-job">'. ucfirst($author_job) .', '.$company.'</p>';
		}	
				

		$output .= '<div class="testimonial">';

			if($testimonial_img){
				$output .= '<div class="testimonial-img">';
					$output .= $temp_thumb;
				$output .= '</div>';
			}
			

			$output .= '<div class="testimonial-content">';

				$output .= '<div class="testimonial-author">';
					$output .= '<p class="pix-author-name">'.$temp_title.'</p>';
					
					if($testimonial_job){
						$output .= $job_company;
					}
					
					$output .= $rating_star;
				$output.= '</div>';

				$output .= '<div class="content"><p><span class="para">'. $temp_content .'</span></p></div>';

			$output .= '</div>';
		

		$output .= '</div>';

	endwhile;
	
	else:
      $output .= "No Testimonial Found. Please add atleast one.";
   	endif;
   
   	$output .= '</div>'; //testimonial-con

	$output .= '</div>'; //row


    if ( $testimonial_count != -1 && $testimonial_pagination == 1 ){

   		if ( function_exists( 'pixel8es_page_navi' ) ) {
   		    $output .= pixel8es_page_navi();
   		} else {
   	        $output .= '<nav class="wp-prev-next">
   	                <ul class="clearfix">
   	                    <li class="prev-link">'.get_next_posts_link('<span class="pixicon-eleganticons-19"></span>').'</li>
   	                    <li class="next-link">'.get_previous_posts_link('<span class="pixicon-eleganticons-20"></span>').'</li>
   	                </ul>
   	        </nav>';
   		}
      }
   		

   $output .='</section>'; //Testimonial
   echo  $output;

   
   wp_reset_query();

		 

		if($sidebar_position == "right" ){ 
			get_sidebar();
		} 

	?>	

	</div>
</div>


<?php get_footer(); ?>