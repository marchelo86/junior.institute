<?php

/***********************************************
	Portfolio (List) Page Metabox
*************************************************/

//Meta Box
function post_options(){
	add_meta_box('pix_post_options', 'Post Format Options', 'pix_post_options_cb', 'post', 'advanced','core');	
}
add_action('add_meta_boxes', 'post_options');

//Displaying Meta Box
function pix_post_options_cb($post)
{
	global $post;
	$meta = array();

	$meta = get_post_meta($post->ID,'electrify_post_options',false);
	if( !empty($meta) )
		extract($meta[0]);
	
	//Set Defaults
	$pix_video_methods = isset($pix_video_methods) ? $pix_video_methods : 'vid_normal';
	$pix_vid_url = isset($pix_vid_url) ? $pix_vid_url : '';
	$pix_vid_poster = isset($pix_vid_poster) ? $pix_vid_poster : '';
	$pix_vid_autoplay = isset($pix_vid_autoplay) ? $pix_vid_autoplay : 'yes';
	$pix_vid_iframe = isset($pix_vid_iframe) ? $pix_vid_iframe : '';
	$pix_vid_playlist = isset($pix_vid_playlist) ? $pix_vid_playlist : '';
	$pix_aud_methods = isset($pix_aud_methods) ? $pix_aud_methods : 'aud_normal';
	$pix_audio = isset($pix_audio) ? $pix_audio : '';
	$pix_aud_autoplay = isset($pix_aud_autoplay) ? $pix_aud_autoplay : 'y';
	$pix_aud_iframe = isset($pix_aud_iframe) ? $pix_aud_iframe : '';
	$pix_aud_playlist = isset($pix_aud_playlist) ? $pix_aud_playlist : '';
	$pix_images = isset($pix_images)? $pix_images : '';
	$pix_img_autoslide = isset($pix_img_autoslide)? $pix_img_autoslide : 'true';
	$pix_link = isset($pix_link) ? $pix_link : '';
	$pix_quote_author = isset($pix_quote_author) ? $pix_quote_author : '';

	//Nonce Field
	wp_nonce_field(__FILE__, 'pix_nonce');

	global $wp_version;
	/*
	 *  Post Format: Gallery
	 */

	echo '<div class="img_gallery_show clearfix">';
		//Multiple Featured Image
		echo'<div class="pix-gallery clearfix"><div class="pix-pull-left">';
		echo '<h5 class="pix-sub-title">'.__('Gallery:','pixel8es'). '</h5>';
		echo '<p class="pix_image_select">';
		echo '<label for="pix_images">'.__('Select the images for gallery','pixel8es').'</label>
		</p></div>';
		echo '<div class="pix-container pix_image_select">';
		echo '<input type="hidden" class="widefat pix-saved-val" name="pix_images" value="'. $pix_images.'">';
		echo '<a href="#" class="select-files" data-title="Insert Images"  data-file-type="image" data-multi-select="true" data-insert="true">Insert Images</a>';
		echo '</div></div>';

		//Auto Slide

		echo '<div class="pix-gallery-slide clearfix" style="clear:both; overflow: hidden; ">
		<div class="pix-pull-left"><h5 class="pix-sub-title">'.__('Auto Slide:','pixel8es'). '</h5>';
		
		echo '<p><label for="pix_img_autoslide">'.__('To Enable autoplay or autoslide please type numeric value in milliseconds Ex: 2000, also you can enter true to set default duration(5000). Leave it blank or enter false to disable auto slide','pixel8es').'</label></p></div>';
echo '<div class="pix-pull-left">';
		echo '<input type="text" class="widefat" name="pix_img_autoslide" id="pix_img_autoslide" value="'. $pix_img_autoslide.'">';
		
echo '</div>';
	echo '</div></div>';


	/*
	 *  Post Format: Video
	 */

	echo '<div id="video_methods_show" class="wrap-clear">';
		//Video Methods
	echo '<div class="pix-pull-left">';
		echo '<h5 class="pix-sub-title">'.__('Video Methods:','pixel8es'). '</h5>';
		echo '<p>'.__('Choose the video methods such as (Direct insert or Iframe)','pixel8es').'</p>';
echo '</div>';
		echo '<div class="select-style"> <select name="video_methods" id="video_methods" class="widefat">';
		echo '<option value="vid_normal"'. (($pix_video_methods == "vid_normal") ? ' selected="selected"' : ''). '>' . 'Normal'. '</option>';
		echo '<option value="vid_iframe"'. (($pix_video_methods == "vid_iframe") ? ' selected="selected"' : ''). '>' . 'Iframe'. '</option>';
		if($wp_version >= '3.9'){
			echo '<option value="vid_playlist"'. (($pix_video_methods == "vid_playlist") ? ' selected="selected"' : ''). '>' . 'Playlist'. '</option>';
		} 
		echo '</select></div>';
	echo '</div>';
	

	echo '<div class="vid_normal_show">';
		//Select Video
	echo '<div class="wrap-clear">';
		echo '<div class="pix-pull-left">';
			echo '<h5 class="pix-sub-title">'.__('Video Normal:','pixel8es'). '</h5>';
			echo '<p><label for="vid_url">'.__('Choose or Upload video from Media Uploader','pixel8es').'</label></p>';
		echo '</div>';

		echo '<div class="pix-pull-left pix-container pix_video_select">';
			echo '<input type="hidden" class="widefat pix-saved-val" name="vid_url" id="vid_url" value="'. $pix_vid_url.'">';
			echo '<a href="#" class="select-files" data-title="Insert Video"  data-file-type="video" data-multi-select="true" data-insert="true">Insert Video</a>';
		echo '</div>';
	echo '</div>';	
		//Poster
	echo '<div class="wrap-clear">';
		echo '<div class="pix-pull-left">';
		echo '<h5 class="pix-sub-title">'.__('Poster:','pixel8es'). '</h5>';
		echo '<p class="pix_image_select">';
		echo '<label for="vid_poster">'.__('Choose or Upload image from Media Uploader for video poster','pixel8es').'</label></p>';
		echo '</div>';
		echo '<div class="pix-pull-left pix-container pix_image_select">';
		echo '<input type="hidden" class="widefat pix-saved-val" id="vid_poster" name="vid_poster" value="'.$pix_vid_poster.'">';
		echo '<a href="#" class="select-files" data-title="Insert Image"  data-file-type="image" data-multi-select="false" data-insert="true">Insert Image</a>';
		echo '</div>';
	echo '</div>';
		//Autoplay
	echo '<div class="wrap-clear">';
		echo '<div class="pix-pull-left">';
		echo '<h5 class="pix-sub-title">'.__('Autoplay:','pixel8es'). '</h5>';
		echo '<p>'.__('If it\'s true, the videos plays automatically when the page loads','pixel8es').' </p>';
		echo '</div>';
		echo '<div class="pix-pull-left select-style"><select name="vid_autoplay" class="widefat">';
		echo '<option value="yes"'. (($pix_vid_autoplay == "yes") ? ' selected="selected"' : ''). '>' . 'Yes'. '</option>';
		echo '<option value="no"'. (($pix_vid_autoplay == "no") ? ' selected="selected"' : ''). '>' . 'No'. '</option>'; 
		echo '</select></div>';
		echo '</div>';
	echo '</div>';

	echo '<div id="vid_iframe_show" class="wrap-clear">';
		//Video Embed Code

		echo '<div class="pix-pull-left">';
		echo '<h5 class="pix-sub-title">'.__('Video Iframe:','pixel8es'). '</h5>';
		echo '<p><label for="pix_vid_iframe">'.__('Enter Video iframe (<em>Please enter embed code form YouTube / Vimeo / Blip.tv / Viddler / Kickstarter </em>)','pixel8es').'</label></p>';
		echo '</div>';
		echo '<div class="pix-pull-left">';
		echo '<textarea rows="7" class="widefat" name="pix_vid_iframe" id="pix_vid_iframe">'. $pix_vid_iframe .'</textarea>';
		echo '</div>';
	echo '</div>';


	if($wp_version >= '3.9'){
		echo '<div id="vid_playlist_show" class="wrap-clear">';
			//Select Video
		echo '<div class="pix-pull-left">';
			echo '<h5 class="pix-sub-title">'.__('Video Playlist:','pixel8es'). '</h5>';
			echo '<p><label for="vid_playlist">'.__('Choose or Upload video from Media Uploader','pixel8es').'</label>
			</p>';
			echo '</div>';
			echo '<div class="pix-pull-left pix-container pix_video_select">';
			echo '<input type="hidden" class="widefat pix-saved-val" name="vid_playlist" id="vid_playlist" value="'. $pix_vid_playlist.'">';
			echo '<a href="#" class="select-files" data-title="Insert Video"  data-file-type="video" data-multi-select="true" data-insert="true">Insert Video</a>';
			echo '</div>';

		echo '</div>';
	}
	
	/*
	 *  Post Format: Audio
	*/

	echo '<div id="audio_methods_show" class="wrap-clear">';
		//Audio Methods
		echo '<div class="pix-pull-left">';
			echo '<h5 class="pix-sub-title">'.__('Audio Methods:','pixel8es'). '</h5>';
			echo '<p>'.__('Choose the audio methods such as (Direct insert or Iframe)','pixel8es').'</p>';
		echo '</div>';

		echo '<div class="select-style"><select name="aud_methods" id="audio_methods" class="widefat">';
		echo '<option value="aud_normal"'. (($pix_aud_methods == "aud_normal") ? ' selected="selected"' : ''). '>' . 'Normal'. '</option>';
		echo '<option value="aud_iframe"'. (($pix_aud_methods == "aud_iframe") ? ' selected="selected"' : ''). '>' . 'Iframe'. '</option>';
		if($wp_version >= '3.9'){
			echo '<option value="aud_playlist"'. (($pix_aud_methods == "aud_playlist") ? ' selected="selected"' : ''). '>' . 'Playlist'. '</option>';
		} 
		echo '</select></div>';
	echo '</div>';
	
	echo '<div class="aud_normal_show">';
		//Audio Embed Code
		echo '<div class="wrap-clear"><div class="pix-pull-left">';
			echo '<h5 class="pix-sub-title">'.__('Select Audio:','pixel8es'). '</h5>';
			echo '<p><label for="pix_audio">'.__('Choose or Upload video from Media Uploader','pixel8es').'</label></p>';
		echo '</div>';

		echo '<div class="pix-pull-left pix-container aud_normal_show pix_audio_select">';
			echo '<input type="hidden" class="widefat pix-saved-val" name="pix_audio" id="pix_audio" value="'. $pix_audio.'">';
			echo '<a href="#" class="select-files" data-title="Insert Audio"  data-file-type="audio" data-multi-select="true" data-insert="true">Insert Audio</a>';
		echo '</div></div>';	
		
		//Autoplay
		echo '<div class="wrap-clear"><div class="pix-pull-left">';
		echo '<h5 class="pix-sub-title">'.__('Autoplays:','pixel8es'). '</h5>'; 
		echo '<p>'.__('If it\'s true, the audio plays automatically when the page loads','pixel8es').'</p>';
		echo '</div>';
		echo '<div class="pix-pull-left select-style"><select name="aud_autoplay" class="widefat">';
		echo '<option value="y"'. (($pix_aud_autoplay == "y") ? ' selected="selected"' : ''). '>' . 'Yes'. '</option>';
		echo '<option value="n"'. (($pix_aud_autoplay == "n") ? ' selected="selected"' : ''). '>' . 'No'. '</option>'; 
		echo '</select></div></div>';
	echo '</div>';
	
	echo '<div id="aud_iframe_show" class="wrap-clear">';
		//Audio Iframe
		echo '<div class="pix-pull-left">';
		echo '<h5 class="pix-sub-title">'.__('Audio Iframe:','pixel8es'). '</h5>'; 
		echo '<p><label for="pix_aud_iframe">'.__('Enter Audio iframe (<em>Please enter embed code like soundcloud </em>)','pixel8es').'</label></p>';
		echo '</div>';
		echo '<div class="pix-pull-left">';
		echo '<textarea rows="7" class="widefat" name="pix_aud_iframe" id="pix_aud_iframe">'. $pix_aud_iframe .'</textarea>';
		echo '</div></div>';

	if($wp_version >= '3.9'){
		echo '<div id="aud_playlist_show" class="wrap-clear">';
			//Select Audio
		echo '<div class="pix-pull-left">';
			echo '<h5 class="pix-sub-title">'.__('Audio Playlist:','pixel8es'). '</h5>';
			echo '<p><label for="aud_playlist">'.__('Choose or Upload audio from Media Uploader','pixel8es').'</label></p>';
		echo '</div>';
		echo '<div class="pix-pull-left pix-container pix_audio_select">';
			echo '<input type="hidden" class="widefat pix-saved-val" name="aud_playlist" id="aud_playlist" value="'. $pix_aud_playlist.'">';
			echo '<a href="#" class="select-files" data-title="Insert Audio"  data-file-type="audio" data-multi-select="true" data-insert="true">Insert Audio</a>';
		echo '</div>';	

		echo '</div>';
	}	
	
	/*
	 *  Post Format: Link
	 */

	//Link
	echo '<div id="link_show" class="wrap-clear">';
	echo '<div class="pix-pull-left">';
		echo '<h5 class="pix-sub-title">'.__('Link:','pixel8es'). '</h5>';
		echo '<p>';
		echo '<label for="pix_link">'.__('Type the external link it applies only in link post format','pixel8es').'</label></p>';
	echo '</div>';
		echo '<div class="pix-pull-left">';	
		echo '<input type="text" class="widefat" name="pix_link" id="pix_link" value="'. $pix_link.'">';
		echo '</div>';
	echo '</div>';

	/*
	 *  Post Format: Quote
	 */

	//Author
	echo '<div id="quote_show" class="wrap-clear">';
	echo '<div class="pix-pull-left">';	
		echo '<h5 class="pix-sub-title">'.__('Author:','pixel8es'). '</h5>';
		echo '<p>';
		echo '<label for="pix_quote_author">'.__('Enter the Author Name it applies only in quote post format','pixel8es').'</label></p>';
		echo'</div>';
		echo '<div class="pix-pull-left">';	
		echo '<input type="text" class="widefat" name="pix_quote_author" id="pix_quote_author" value="'. $pix_quote_author.'">';
		echo '</div>';
	echo '</div>';

}


//Saving Custom Meta Box Values
function saving_post_options(){
	global $post;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
	$pix_nonce = isset($_POST['pix_nonce']) ? $_POST['pix_nonce'] : '';

	//Security Check Nonce	
	if($_POST && wp_verify_nonce($pix_nonce, __FILE__)){
		
		$values = array(
			'pix_video_methods' => $_POST['video_methods'],
			'pix_vid_url' => htmlspecialchars($_POST['vid_url']),
			'pix_vid_poster' => $_POST['vid_poster'],
			'pix_vid_autoplay' => $_POST['vid_autoplay'],
			'pix_vid_iframe' => $_POST['pix_vid_iframe'],
			'pix_vid_playlist' => htmlspecialchars($_POST['vid_playlist']),
			'pix_aud_methods' => htmlspecialchars($_POST['aud_methods']),
			'pix_audio' => htmlspecialchars($_POST['pix_audio']),
			'pix_aud_autoplay' => htmlspecialchars($_POST['aud_autoplay']),
			'pix_aud_iframe' => $_POST['pix_aud_iframe'],
			'pix_aud_playlist' => htmlspecialchars($_POST['aud_playlist']),
			'pix_images' => htmlspecialchars($_POST['pix_images']),
			'pix_img_autoslide' => $_POST['pix_img_autoslide'],
			'pix_vid_poster' => htmlspecialchars($_POST['vid_poster']),
			'pix_link' => $_POST['pix_link'],
			'pix_quote_author' => $_POST['pix_quote_author']
		);	
		update_post_meta($post->ID, 'electrify_post_options', $values);
		
	}
}
add_action('save_post', 'saving_post_options');