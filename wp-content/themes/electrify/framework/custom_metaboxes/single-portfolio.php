<?php

/***********************************************
	Portfolio (List) Page Metabox
*************************************************/

//Meta Box
function pix_single_portfolio_options(){
	add_meta_box('pix_single_portfolio_options', 'Portfolio Options', 'pix_single_portfolio_options_cb', 'pix_portfolio', 'advanced','low');	
}
add_action('add_meta_boxes_pix_portfolio', 'pix_single_portfolio_options');

//Displaying Meta Box
function pix_single_portfolio_options_cb($post)
{
	global $post;
	$meta = array();
	$meta = get_post_meta($post->ID,'electrify_single_portfolio_options',false);
	if( !empty($meta) )
		extract($meta[0]);

	$project_url = isset($project_url) ? $project_url : '#';
	$author_name = isset($author_name) ? $author_name : '';
	$pix_skills = isset($pix_skills) ? $pix_skills : '';
	$pix_task = isset($pix_task) ? $pix_task : '';
	$pix_client_name = isset($pix_client_name) ? $pix_client_name : '';
	$pix_images = isset($pix_images)? $pix_images : '';
	$pix_img_autoslide = isset($pix_img_autoslide)? $pix_img_autoslide : '';
	$pix_show_social = isset($pix_show_social)? $pix_show_social : 'yes';
	$pix_show_like = isset($pix_show_like)? $pix_show_like : 'yes';
	$pix_portfolio_text = isset($pix_portfolio_text)? $pix_portfolio_text : 'Launch Project';
	$pix_show_button = isset($pix_show_button)? $pix_show_button : 'yes';
	$pix_button_target = isset($pix_button_target)? $pix_button_target : '_blank';
	$portfolio_layout = isset($portfolio_layout) ? $portfolio_layout : "full";
	
	wp_nonce_field(__FILE__, 'pix_nonce');

	//Multiple Featured Image
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Multiple Images:','pixel8es'). '</h5>';
	echo '<p>'.__('You can select single or multiple images, if you select more than one images it act as a slider','pixel8es').'</p>';
	echo '</div>';
	echo '<div class="pix-pull-left pix_image_select pix-container">';
	echo '<input type="hidden" class="widefat pix-saved-val" name="pix_images" value="'. $pix_images.'">';
	echo '<a href="#" class="select-files" data-title="Insert Images"  data-file-type="image" data-multi-select="true" data-insert="true">Insert Images</a>';
	echo '</div></div>';

	//Auto Slide
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Auto Slide:','pixel8es'). '</h5>';
	echo '<p><label for="pix_img_autoslide">'.__('To Enable autoplay or autoslide please type numeric value in milliseconds Ex: 2000, also you can enter true to set default duration(5000). Leave it blank or enter false to disable auto slide','pixel8es').'</label></p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<input type="text" class="widefat" name="pix_img_autoslide" id="pix_img_autoslide" value="'. $pix_img_autoslide.'">';
	echo '</div></div>';

	//Author Name
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Author:','pixel8es'). '</h5>';
	echo '<p><label for="pix_author_name">'.__('Name of the author one who created the project','pixel8es').'</label></p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<input type="text" class="widefat" name="pix_author_name" id="pix_author_name" value="'. esc_attr($author_name).'">';
	echo '</div></div>';

	//client Name
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Client Name:','pixel8es'). '</h5>';
	echo '<p><label for="pix_client_name">'.__('Enter the client name.','pixel8es').'</label></p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<input type="text" class="widefat" name="pix_client_name" id="pix_client_name" value="'. esc_attr($pix_client_name).'">';
	echo '</div></div>';

	//Tasks
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Tasks:','pixel8es'). '</h5>';
	echo '<p><label for="pix_task">'.__('Tasks','pixel8es').'</label></p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<input type="text" class="widefat" name="pix_task" id="pix_task" value="'. esc_attr($pix_task).'">';
	echo '</div></div>';

	//Skills
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Skills:','pixel8es'). '</h5>';
	echo '<p><label for="pix_skills">'.__('Enter the skills you have used in this project ','pixel8es').'</label></p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<input type="text" class="widefat" name="pix_skills" id="pix_skills" value="'. esc_attr($pix_skills).'">';
	echo '</div></div>';

	//Show Button
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Show/Hide Button:','pixel8es'). '</h5>';
	echo '<p>'.__('Do you want to display the launch button?','pixel8es').'</p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<select name="pix_show_button" class="widefat">';
	echo '<option value="yes"'. (($pix_img_transition == "yes") ? ' selected="selected"' : ''). '>' . 'Yes'. '</option>';
	echo '<option value="no"'. (($pix_img_transition == "no") ? ' selected="selected"' : ''). '>' . 'No'. '</option>';
	echo '</select>';
	echo '</div></div>';

	//Project Button URL
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Project URL:','pixel8es'). '</h5>';
	echo '<p><label for="pix_portfolio_url">'.__('Type the URL of the project, if this field is empty the button wont display','pixel8es').'</label></p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<input type="text" class="widefat" name="pix_portfolio_url" id="pix_portfolio_url" value="'. esc_url($project_url).'">';
	echo '</div></div>';

	//Button Text
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Button Text:','pixel8es'). '</h5>';
	echo '<p><label for="pix_portfolio_text">'.__('Type the button text','pixel8es').'</label></p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<input type="text" class="widefat" name="pix_portfolio_text" id="pix_portfolio_text" value="'. esc_attr($pix_portfolio_text).'">';
	echo '</div></div>';

	//Open Project link in
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Taget:','pixel8es'). '</h5>';
	echo '<p>'.__('Do you want to open the project in new tab?','pixel8es').'</p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<select name="pix_button_target" class="widefat">';
	echo '<option value="_blank"'. (($pix_button_target == "_blank") ? ' selected="selected"' : ''). '>' . 'Opens in a new window or tab'. '</option>';
	echo '<option value="_self"'. (($pix_button_target == "_self") ? ' selected="selected"' : ''). '>' . 'Opens in the same windows as it was clicked'. '</option>';
	echo '</select>';
	echo '</div></div>';

	//Show Like
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Like button:','pixel8es'). '</h5>';
	echo '<p>'.__('Do you want to display the like button?','pixel8es').'</p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<select name="pix_show_like" class="widefat">';
	echo '<option value="yes"'. (($pix_show_like == "yes") ? ' selected="selected"' : ''). '>' . 'Yes'. '</option>';
	echo '<option value="no"'. (($pix_show_like == "no") ? ' selected="selected"' : ''). '>' . 'No'. '</option>';
	echo '</select>';
	echo '</div></div>';

	//Show Social Share
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Share button:','pixel8es'). '</h5>';
	echo '<p>'.__('Do you want to display the Social Share button ?','pixel8es').'</p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<select name="pix_show_social" class="widefat">';
	echo '<option value="yes"'. (($pix_show_social == "yes") ? ' selected="selected"' : ''). '>' . 'Yes'. '</option>';
	echo '<option value="no"'. (($pix_show_social == "no") ? ' selected="selected"' : ''). '>' . 'No'. '</option>';
	echo '</select>';
	echo '</div></div>';

	//Layout Settings
	echo '<div class="wrap-clear"><div class="pix-pull-left">';
	echo '<h5 class="pix-sub-title">'.__('Layout Settings:','pixel8es'). '</h5>';
	echo '<p>'.__('Select the single portfolio style','pixel8es').'</p>';
	echo '</div>';
	echo '<div class="pix-pull-left">';
	echo '<ul class="portfolio_layout sidebar_position clearfix">';
	echo '<li>';
	echo '<input type="radio" name="portfolio_layout"' . ((isset($portfolio_layout) && $portfolio_layout=="full") ? "checked" : '') .' value="full">';
	echo '<a href="#"><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/portfolio-full.png"  alt="" /></a>';
	echo '</li>';

	echo '<li>';
	echo '<input type="radio" name="portfolio_layout"' . ((isset($portfolio_layout) && $portfolio_layout=="right") ? "checked" : '') .' value="right">';
	echo '<a href="#"><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/portfolio-right.png"  alt="" /></a>';
	echo '</li>';

	echo '</ul>';
	echo '<p class="clear">';
	echo '</p>';
	echo '</div></div>';

?>

<?php
}
//Saving Custom Meta Box Values
function saving_pix_single_portfolio_page_options(){
	global $post;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	$pix_nonce = isset($_POST['pix_nonce']) ? $_POST['pix_nonce'] : '';
	//Security Check Nonce
	if($_POST && wp_verify_nonce($pix_nonce, __FILE__)){
		if( isset($_POST['pix_portfolio_url']) || isset($_POST['pix_author_name'])){
		$values = array(
			'pix_show_social' => $_POST['pix_show_social'],
			'pix_show_like' => $_POST['pix_show_like'],
			'pix_portfolio_text' => $_POST['pix_portfolio_text'],
			'pix_show_button' => $_POST['pix_show_button'],
			'project_url' => $_POST['pix_portfolio_url'],
			'pix_button_target' => $_POST['pix_button_target'],
			'author_name' => $_POST['pix_author_name'],
			'pix_skills' => $_POST['pix_skills'],
			'pix_task' => $_POST['pix_task'],
			'pix_client_name' => $_POST['pix_client_name'],
			'pix_images' => htmlspecialchars($_POST['pix_images']),
			'pix_img_autoslide' => $_POST['pix_img_autoslide'],
			'portfolio_layout' => $_POST['portfolio_layout']
			);
				
		update_post_meta($post->ID, 'electrify_single_portfolio_options', $values);
		}	
	}
}
add_action('save_post', 'saving_pix_single_portfolio_page_options');