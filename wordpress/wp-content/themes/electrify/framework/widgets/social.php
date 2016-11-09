<?php 

/*
 * Contact Form Widget
*/
class Pix_Social_Widget extends WP_Widget {

	function Pix_Social_Widget() {
		$widget_options = array('classname' => 'social-widget', 'description' => __('Display Social Icons','pixel8es'));
		parent::WP_Widget('pix_social_widget',__('Pixel8es:: Social Icons','pixel8es'),$widget_options);
	}

	function widget( $args, $instance ) {
		extract($args);
		
		$title = ($instance['title']) ? strip_tags($instance['title']) : __('Social Icons', 'pixel8es');
		$style = isset($instance['style']) ? strip_tags($instance['style']) : '';
		$facebook = isset($instance['facebook']) ? strip_tags($instance['facebook']) : '';
		$twitter = isset($instance['twitter']) ? strip_tags($instance['twitter']) : '';
		$gplus = isset($instance['gplus']) ? strip_tags($instance['gplus']) : '';
		$linkedin = isset($instance['linkedin']) ? strip_tags($instance['linkedin']) : '';
		$dribbble = isset($instance['dribbble']) ? strip_tags($instance['dribbble']) : '';
		$flickr = isset($instance['flickr']) ? strip_tags($instance['flickr']) : '';
		$pinterest = isset($instance['pinterest']) ? strip_tags($instance['pinterest']) : '';
		$tumblr = isset($instance['tumblr']) ? strip_tags($instance['tumblr']) : '';
		$instagrem = isset($instance['instagrem']) ? strip_tags($instance['instagrem']) : '';
		$rss = isset($instance['rss']) ? strip_tags($instance['rss']) : '';
		$github = isset($instance['github']) ? strip_tags($instance['github']) : '';
		
		
		echo $before_widget;

		if(!empty($title)){
			echo $before_title . $title . $after_title;
		}

		if(!empty($facebook) || !empty($twitter) || !empty($gplus) || !empty($linkedin) || !empty($dribbble) || !empty($flickr) || !empty($pinterest) ||!empty($tumblr) || !empty($instagrem) || !empty($rss) || !empty($github) ){

			echo do_shortcode( '[social style="'.$style.'" facebook="'.$facebook.'" twitter="'.$twitter.'" gplus="'.$gplus.'" linkedin="'.$linkedin.'" dribble="'.$dribbble.'" flickr="'.$flickr.'" pinterest="'.$pinterest.'" tumblr="'.$tumblr.'" instagrem="'.$instagrem.'" rss="'.$rss.'" github="'.$github.'"]' );
			
		}

		else{
			echo '<div>Please enter atleast single social network links.</div>';
		}
		
		echo $after_widget;
		
		
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = isset($instance['title']) ? strip_tags($instance['title']) : '';
		$style = isset($instance['style']) ? strip_tags($instance['style']) : '';
		$facebook = isset($instance['facebook']) ? strip_tags($instance['facebook']) : '';
		$twitter = isset($instance['twitter']) ? strip_tags($instance['twitter']) : '';
		$gplus = isset($instance['gplus']) ? strip_tags($instance['gplus']) : '';
		$linkedin = isset($instance['linkedin']) ? strip_tags($instance['linkedin']) : '';
		$dribbble = isset($instance['dribbble']) ? strip_tags($instance['dribbble']) : '';
		$flickr = isset($instance['flickr']) ? strip_tags($instance['flickr']) : '';
		$pinterest = isset($instance['pinterest']) ? strip_tags($instance['pinterest']) : '';
		$tumblr = isset($instance['tumblr']) ? strip_tags($instance['tumblr']) : '';
		$instagrem = isset($instance['instagrem']) ? strip_tags($instance['instagrem']) : '';
		$rss = isset($instance['rss']) ? strip_tags($instance['rss']) : '';
		$github = isset($instance['github']) ? strip_tags($instance['github']) : '';
?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<!-- Style -->
		<p><label for="<?php echo $this->get_field_id('style');?>"></label>
        <?php _e( 'Style:','pixel8es' ) ?>
            <select id="<?php echo $this->get_field_id('style');?>" name="<?php echo $this->get_field_name('style');?>">
                <option value="style1" <?php selected( $style, "style1" ); ?>><?php _e('Style 1', 'pixel8es'); ?></option>
                <option value="style2" <?php selected( $style, "style2" ); ?>><?php _e('Style 2', 'pixel8es'); ?></option>
                <option value="style3" <?php selected( $style, "style3" ); ?>><?php _e('Style 3', 'pixel8es'); ?></option>
            </select>
		</p>
		
		<!-- Facebook -->
		<p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" /></p>
		
		<!-- Twitter -->
		<p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></p>

		<!-- Google Plus -->
		<p><label for="<?php echo $this->get_field_id('gplus'); ?>"><?php _e('Google Plus:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" type="text" value="<?php echo esc_attr($gplus); ?>" /></p>

		<!-- Linkedin -->
		<p><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" /></p>

		<!-- Dribbble -->
		<p><label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" /></p>

		<!-- Flickr -->
		<p><label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" /></p>

		<!-- Pinterest -->
		<p><label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" /></p>

		<!-- Tumblr -->
		<p><label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" /></p>

		<!-- Instagrem -->
		<p><label for="<?php echo $this->get_field_id('instagrem'); ?>"><?php _e('Instagrem:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('instagrem'); ?>" name="<?php echo $this->get_field_name('instagrem'); ?>" type="text" value="<?php echo esc_attr($instagrem); ?>" /></p>

		<!-- Rss -->
		<p><label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('Rss:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo esc_attr($rss); ?>" /></p>

		<!-- Github -->
		<p><label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('Github:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo esc_attr($github); ?>" /></p>





<?php
	}
}

function pix_social_widget_init(){
	register_widget('Pix_Social_Widget');	
}
add_action('widgets_init','pix_social_widget_init');