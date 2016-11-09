<?php

/***********************************************
	Testimonial (List) Page Metabox
*************************************************/

//Meta Box
function pix_testimonial_options(){
	add_meta_box('pix_testimonial_options', 'Testimonial Options', 'pix_testimonial_options_cb', 'pix_testimonial', 'side','low');	
}
add_action('add_meta_boxes_pix_testimonial', 'pix_testimonial_options');

//Displaying Meta Box
function pix_testimonial_options_cb($post)
{
	global $post;
	$meta = array();
	$meta = get_post_meta($post->ID,'electrify_testimonial_options',false);
	if( !empty($meta) )
		extract($meta[0]);

	$author_job = isset($author_job) ? $author_job : '';
	$company_name = isset($company_name) ? $company_name : '';
	$company_url = isset($company_url) ? $company_url : '';
	$rating = isset($rating) ? $rating : '5';
	
	wp_nonce_field(__FILE__, 'pix_nonce');

	//Author Job
	echo '<p>';
	echo '<label for="pix_author_job">'.__('Author Job','pixel8es').'</label>';
	echo '<input type="text" class="widefat" name="pix_author_job" id="pix_author_job" value="'. esc_attr($author_job).'">';
	echo '</p>';

	//Company Name
	echo '<p>';
	echo '<label for="pix_company_name">'.__('Company Name','pixel8es').'</label>';
	echo '<input type="text" class="widefat" name="pix_company_name" id="pix_company_name" value="'. esc_attr($company_name).'">';
	echo '</p>';
	
	//Company URL
	echo '<p>';
	echo '<label for="pix_company_url">'.__('Company URL','pixel8es').'</label>';
	echo '<input type="text" class="widefat" name="pix_company_url" id="pix_company_url" value="'. esc_attr($company_url).'">';
	echo '</p>';

	//Rating
	echo '<p id="rating_show">'.__('Rating:','pixel8es').' <select name="pix_rating" id="pix_rating" class="widefat">';
	echo '<option value="5"'. (($rating == "5") ? ' selected="selected"' : ''). '>' . '5'. '</option>';
	echo '<option value="4"'. (($rating == "4") ? ' selected="selected"' : ''). '>' . '4'. '</option>'; 
	echo '<option value="3"'. (($rating == "3") ? ' selected="selected"' : ''). '>' . '3'. '</option>'; 
	echo '<option value="2"'. (($rating == "2") ? ' selected="selected"' : ''). '>' . '2'. '</option>'; 
	echo '<option value="1"'. (($rating == "1") ? ' selected="selected"' : ''). '>' . '1'. '</option>'; 
	echo '</select></p>';

?>

<?php
}
//Saving Custom Meta Box Values
function saving_pix_testimonial_page_options(){
	global $post;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	$pix_nonce = isset($_POST['pix_nonce']) ? $_POST['pix_nonce'] : '';
	//Security Check Nonce
	if($_POST && wp_verify_nonce($pix_nonce, __FILE__)){
		if( isset($_POST['pix_company_url']) || isset($_POST['pix_company_name']) || isset($_POST['pix_author_job']) || isset($_POST['pix_rating'])){
		$values = array(
			'rating' => $_POST['pix_rating'],
			'company_url' => $_POST['pix_company_url'],
			'company_name' => $_POST['pix_company_name'],
			'author_job' => $_POST['pix_author_job']
			);
				
		update_post_meta($post->ID, 'electrify_testimonial_options', $values);
		}	
	}
}
add_action('save_post', 'saving_pix_testimonial_page_options');