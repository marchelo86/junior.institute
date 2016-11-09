<?php 

/*
 * Testimonial Widget
*/
class Pix_Testimonial_Widget extends WP_Widget {

	function Pix_Testimonial_Widget() {
		$widget_options = array('classname' => 'testimonial-widget', 'description' => __('Display Testimonial','pixel8es'));
		parent::WP_Widget('pix_testimonial',__('Pixel8es:: Testimonial','pixel8es'),$widget_options);
	}

	function widget( $args, $instance ) {
		extract($args);
		
		$title = ($instance['title']) ? $instance['title'] : __('Testimonial','pixel8es');
		$style = isset($instance['style']) ? $instance['style'] : 'style1';
		$testimonialCount = isset($instance['testimonialCount']) ? $instance['testimonialCount'] : '5';
		$order = isset($instance['order']) ? $instance['order'] : 'ASC';
		$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'date';
		$rating_no = isset($instance['rating_no']) ? $instance['rating_no'] : 'yes';
		$limit = isset($instance['limit']) ? $instance['limit'] : '';

		
		echo $before_widget;

		echo $before_title . $title . $after_title;

	echo do_shortcode( '[testimonial limit="'.$limit.'" insert_type="posts" no_of_testimonial="'.$testimonialCount.'" order_by="'.$orderby.'" order="'.$order.'" style= '.$style.' rating_no="'.$rating_no.'" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" stop_on_hover="true" mouse_drag="true" touch_drag="true"]' );

		echo $after_widget;
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$testimonialCount = isset($instance['testimonialCount']) ? $instance['testimonialCount'] : '5';
		$order = isset($instance['order']) ? $instance['order'] : 'ASC';
		$orderby = isset($instance['order']) ? $instance['order'] : 'date';
		$rating_no = isset($instance['rating_no']) ? $instance['rating_no'] : 'yes';
		$limit = isset($instance['limit']) ? $instance['limit'] : '';

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit:', 'pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo esc_attr($limit); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('style');?>">
        <?php _e( 'Testimonial Style:','pixel8es' ) ?></label>
            <select id="<?php echo $this->get_field_id('style');?>" name="<?php echo $this->get_field_name('style');?>">
            	<?php $style = isset($instance['style']) ? $instance['style'] : 'style1';?>
                <option value="style1" <?php selected( $style, "style1" ); ?>>Style1</option>
                <option value="style2" <?php selected( $style, "style2" ); ?>>Style2</option>
                <option value="style3" <?php selected( $style, "style3" ); ?>>Style3</option>
                <option value="style4" <?php selected( $style, "style4" ); ?>>Style4</option>
                <option value="style5" <?php selected( $style, "style5" ); ?>>Style5</option>
                <option value="style6" <?php selected( $style, "style6" ); ?>>Style6</option>
            </select>
		</p>

		<p><label for="<?php echo $this->get_field_id('rating_no');?>">
			<?php _e( 'Show/Hide Rating Icons:','pixel8es' ) ?></label>
			<select id="<?php echo $this->get_field_id('rating_no');?>" name="<?php echo $this->get_field_name('rating_no');?>">
				<?php $rating_no = isset($instance['rating_no']) ? $instance['rating_no'] : 'yes';?>
				<option value="yes" <?php selected( $rating_no, "yes" ); ?>>Yes</option>
				<option value="no" <?php selected( $rating_no, "no" ); ?>>No</option>
			</select>
		</p>

        <p><label for="<?php echo $this->get_field_id('testimonialCount');?>">
        <?php _e( 'Testimonial Count (Max 20):','pixel8es' ) ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('testimonialCount');?>" name="<?php echo $this->get_field_name('testimonialCount');?>" value="<?php echo esc_attr( (isset($instance['testimonialCount'])&&!empty($instance['testimonialCount']) ? $instance['testimonialCount'] : '5' )) ; ?>" type="number" style="width:50px;" min="1" max="20"></label></p>
        
        <p><label for="<?php echo $this->get_field_id('order');?>">
        <?php _e( 'Order:','pixel8es' ) ?></label>
            <select id="<?php echo $this->get_field_id('order');?>" name="<?php echo $this->get_field_name('order');?>">
            	<?php $order = isset($instance['order']) ? $instance['order'] : 'ASC';?>
                <option value="ASC" <?php selected( $order, "ASC" ); ?>>ASC</option>
                <option value="DESC" <?php selected( $order, "DESC" ); ?>>DESC</option>
            </select>
		</p>
        
        <p><label for="<?php echo $this->get_field_id('orderby');?>">
        <?php _e( 'Order By:','pixel8es' ) ?></label>
            <select id="<?php echo $this->get_field_id('orderby');?>" name="<?php echo $this->get_field_name('orderby');?>">
            	<?php $orderby = isset($instance['orderby']) ? $instance['orderby'] : 'asc';?>
                <option value="date" <?php selected( $orderby, "date" ); ?>>Date</option>
                <option value="title" <?php selected( $orderby, "title" ); ?>>Title</option>
                <option value="rand" <?php selected( $orderby, "rand" ); ?>>Random</option>
            </select>
		</p>


<?php
	}
}

function pix_testimonial_widget_init(){
	register_widget('Pix_Testimonial_Widget');	
}
add_action('widgets_init','pix_testimonial_widget_init');