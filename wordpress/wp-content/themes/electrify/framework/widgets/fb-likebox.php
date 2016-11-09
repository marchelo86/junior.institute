<?php 

/*
 * Contact Form Widget
*/
class Pix_LikeBox_Widget extends WP_Widget {

	function Pix_LikeBox_Widget() {
		$widget_options = array('classname' => 'likebox-widget', 'description' => __('Display Facebook Like Box','pixel8es'));
		parent::WP_Widget('pix_likebox_widget',__('Pixel8es:: Facebook Like Box','pixel8es'),$widget_options);
	}

	function widget( $args, $instance ) {
		extract($args);
		
		$title = ($instance['title']) ? $instance['title'] : '';
		$fb_page_url = isset($instance['fb_page_url']) ? strip_tags($instance['fb_page_url']) : 'wearepixel8es';
		$height = isset($instance['height']) ? strip_tags($instance['height']) : '300';
		$color_scheme = isset($instance['color_scheme']) ? strip_tags($instance['color_scheme']) : 'light';
		$show_faces = isset($instance['show_faces']) ? strip_tags($instance['show_faces']) : 'true';
		$show_headers = isset($instance['show_headers']) ? strip_tags($instance['show_headers']) : 'true';
		$show_posts = isset($instance['show_posts']) ? strip_tags($instance['show_posts']) : 'false';
		$show_borders = isset($instance['show_borders']) ? strip_tags($instance['show_borders']) : 'true';
		
		
			echo $before_widget;

			if(!empty($title)){
				echo $before_title . $title . $after_title;
			}
		?>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<?php
		if(!empty($fb_page_url)){
		echo '<div class="fb-like-box" data-href="https://www.facebook.com/'.$fb_page_url.'" data-width="100%" data-height="'.$height.'px" data-colorscheme="'.$color_scheme.'" data-show-faces="'.$show_faces.'" data-header="'.$show_headers.'" data-stream="'.$show_posts.'" data-show-border="'.$show_borders.'"></div>';

		}
		else{
			echo '<div>Please enter the Facebook Page URL</div>';
		}
		
		echo $after_widget;
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = isset($instance['title']) ? strip_tags($instance['title']) : '';
		$fb_page_url = isset($instance['fb_page_url']) ? strip_tags($instance['fb_page_url']) : 'wearepixel8es';
		$height = isset($instance['height']) ? strip_tags($instance['height']) : '300';
		$color_scheme = isset($instance['color_scheme']) ? strip_tags($instance['color_scheme']) : 'light';
		$show_faces = isset($instance['show_faces']) ? strip_tags($instance['show_faces']) : 'true';
		$show_headers = isset($instance['show_headers']) ? strip_tags($instance['show_headers']) : 'true';
		$show_posts = isset($instance['show_posts']) ? strip_tags($instance['show_posts']) : 'false';
		$show_borders = isset($instance['show_borders']) ? strip_tags($instance['show_borders']) : 'true';
?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('fb_page_url'); ?>"><?php _e('Facebook Page URL:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('fb_page_url'); ?>" name="<?php echo $this->get_field_name('fb_page_url'); ?>" type="text" value="<?php echo esc_attr($fb_page_url); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('color_scheme');?>"></label>
        <?php _e( 'Color Scheme:','pixel8es' ) ?>
            <select id="<?php echo $this->get_field_id('color_scheme');?>" name="<?php echo $this->get_field_name('color_scheme');?>">
                <option value="light" <?php selected( $color_scheme, "light" ); ?>><?php _e('Light', 'pixel8es'); ?></option>
                <option value="dark" <?php selected( $color_scheme, "dark" ); ?>><?php _e('Dark', 'pixel8es'); ?></option>
            </select>
		</p>

		<p><label for="<?php echo $this->get_field_id('show_faces');?>"></label>
        <?php _e( 'Show Friends Faces:','pixel8es' ) ?>
            <select id="<?php echo $this->get_field_id('show_faces');?>" name="<?php echo $this->get_field_name('show_faces');?>">
                <option value="true" <?php selected( $show_faces, "true" ); ?>><?php _e('Yes', 'pixel8es'); ?></option>
                <option value="false" <?php selected( $show_faces, "false" ); ?>><?php _e('No', 'pixel8es'); ?></option>
            </select>
		</p>

		<p><label for="<?php echo $this->get_field_id('show_headers');?>"></label>
        <?php _e( 'Show Headers:','pixel8es' ) ?>
            <select id="<?php echo $this->get_field_id('show_headers');?>" name="<?php echo $this->get_field_name('show_headers');?>">
                <option value="true" <?php selected( $show_headers, "true" ); ?>><?php _e('Yes', 'pixel8es'); ?></option>
                <option value="false" <?php selected( $show_headers, "false" ); ?>><?php _e('No', 'pixel8es'); ?></option>
            </select>
		</p>

		<p><label for="<?php echo $this->get_field_id('show_posts');?>"></label>
        <?php _e( 'Show Posts:','pixel8es' ) ?>
            <select id="<?php echo $this->get_field_id('show_posts');?>" name="<?php echo $this->get_field_name('show_posts');?>">
                <option value="true" <?php selected( $show_posts, "true" ); ?>><?php _e('Yes', 'pixel8es'); ?></option>
                <option value="false" <?php selected( $show_posts, "false" ); ?>><?php _e('No', 'pixel8es'); ?></option>
            </select>
		</p>

		<p><label for="<?php echo $this->get_field_id('show_borders');?>"></label>
        <?php _e( 'Show Borders:','pixel8es' ) ?>
            <select id="<?php echo $this->get_field_id('show_borders');?>" name="<?php echo $this->get_field_name('show_borders');?>">
                <option value="true" <?php selected( $show_borders, "true" ); ?>><?php _e('Yes', 'pixel8es'); ?></option>
                <option value="false" <?php selected( $show_borders, "false" ); ?>><?php _e('No', 'pixel8es'); ?></option>
            </select>
		</p>

<?php
	}
}

function pix_likebox_widget_init(){
	register_widget('Pix_LikeBox_Widget');	
}
add_action('widgets_init','pix_likebox_widget_init');