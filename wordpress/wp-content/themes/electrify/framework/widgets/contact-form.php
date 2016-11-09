<?php 

/*
 * Contact Form Widget
*/
class Pix_Contact_Widget extends WP_Widget {

	function Pix_Contact_Widget() {
		$widget_options = array('classname' => 'contact-form-widget', 'description' => __('Display Contact Form','pixel8es'));
		parent::WP_Widget('pix_contact_form',__('Pixel8es:: Contact Form','pixel8es'),$widget_options);
	}

	function widget( $args, $instance ) {
		extract($args);
		
		$title = ($instance['title']) ? $instance['title'] : __('Contact','pixel8es');

		$id = $id = isset($instance['id']) ? strip_tags($instance['id']) : '';
		
		if(!empty($id)){
			echo $before_widget;

			echo $before_title . $title . $after_title;

			echo do_shortcode( '[contact-form-7 id="'.$id.'" title="'.$title.'"]' );

			echo $after_widget;
		}
		
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$id = isset($instance['id']) ? strip_tags($instance['id']) : '';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Contact Form ID:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo esc_attr($id); ?>" /></p>


<?php
	}
}

function pix_contact_widget_init(){
	register_widget('Pix_Contact_Widget');	
}
add_action('widgets_init','pix_contact_widget_init');