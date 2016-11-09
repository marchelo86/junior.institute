<?php

//Staff Meta Box
function social_icons(){
	add_meta_box('pix_staff_social', 'Social Links', 'pix_staff_social_cb', 'pix_staffs', 'side','low');
}
add_action('add_meta_boxes', 'social_icons');

//Displaying Meta Box
function pix_staff_social_cb($post)
{
	global $post;
	$meta = array();
	$facebook = $twitter = $gplus = $linkedin = $dribble = $flickr = $instagram = $single_staff = $staff_email = '';
	$meta = get_post_meta($post->ID,'staff_socail_links',false);
	if( !empty($meta) )
	extract($meta[0]);
	wp_nonce_field(__FILE__, 'pix_nonce');
?>

<p>
	<label for="pix_staff_facebook">Facebook Link:</label>
    <input type="text" class="widefat" name="pix_staff_facebook" id="pix_staff_facebook" value="<?php echo $facebook ?>">
</p>

<p>
	<label for="pix_staff_twitter">Twitter Link:</label>
    <input type="text" class="widefat" name="pix_staff_twitter" id="pix_staff_twitter" value="<?php echo $twitter ?>">
</p>

<p>
	<label for="pix_staff_gplus">G Plus Link:</label>
    <input type="text" class="widefat" name="pix_staff_gplus" id="pix_staff_gplus" value="<?php echo $gplus ?>">
</p>

<p>
	<label for="pix_staff_linkedin">LinkedIn Link:</label>
    <input type="text" class="widefat" name="pix_staff_linkedin" id="pix_staff_linkedin" value="<?php echo $linkedin ?>">
</p>

<p>
	<label for="pix_staff_dribble">Dribble Link:</label>
    <input type="text" class="widefat" name="pix_staff_dribble" id="pix_staff_dribble" value="<?php echo $dribble ?>">
</p>

<p>
	<label for="pix_staff_flickr">Flickr Link:</label>
    <input type="text" class="widefat" name="pix_staff_flickr" id="pix_staff_flickr" value="<?php echo $flickr ?>">
</p>

<p>
	<label for="pix_staff_instagram">Instagram Link:</label>
    <input type="text" class="widefat" name="pix_staff_instagram" id="pix_staff_instagram" value="<?php echo $instagram ?>">
</p>

<p>
	<label for="pix_staff_email">Email:</label>
	<input type="text" class="widefat" name="pix_staff_email" id="pix_staff_email" value="<?php echo $staff_email ?>">
</p>

<?php
}


//Saving Custom Meta Box Values
function saving_social(){
	global $post;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
	$pix_nonce = isset($_POST['pix_nonce']) ? $_POST['pix_nonce'] : '';

	if($_POST && wp_verify_nonce($pix_nonce, __FILE__)){
		if( isset($_POST['pix_staff_facebook']) || isset($_POST['pix_staff_twitter']) || isset($_POST['pix_staff_gplus']) || isset($_POST['pix_staff_linkedin']) || isset($_POST['pix_staff_dribble']) || isset($_POST['pix_staff_flickr']) || isset($_POST['pix_staff_instagram']) || isset($_POST['pix_staff_email']) || isset($_POST['pix_single_staff'])){
		$values = array(
				'facebook' => $_POST['pix_staff_facebook'], 
				'twitter' => $_POST['pix_staff_twitter'], 
				'gplus' => $_POST['pix_staff_gplus'], 
				'linkedin' => $_POST['pix_staff_linkedin'], 
				'dribble' => $_POST['pix_staff_dribble'],
				'flickr' => $_POST['pix_staff_flickr'],
				'instagram' => $_POST['pix_staff_instagram'],
				'staff_email' => $_POST['pix_staff_email'],
				'single_staff' => $_POST['pix_single_staff']
				);
		//Security Check Nonce		
		update_post_meta($post->ID, 'staff_socail_links', $values);
		}	
	}
	
	
}
add_action('save_post', 'saving_social');