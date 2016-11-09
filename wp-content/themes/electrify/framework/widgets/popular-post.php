<?php 

/*
 * Testimonial Widget
*/
class Pix_Popular_Post_Widget extends WP_Widget {

	function Pix_Popular_Post_Widget() {
		$widget_options = array('classname' => 'popularpost', 'description' => __('Display Popular Posts','pixel8es'));
		parent::WP_Widget('pix_popular_post',__('Pixel8es:: Popular Post','pixel8es'),$widget_options);
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_popular_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Popular Posts','pixel8es' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
		$show_image = isset( $instance['show_image'] ) ?  $instance['show_image'] : false;
		if ( ! $number )
 			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		
		
		$r = new WP_Query( array( 'posts_per_page' => $number, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul>
		<?php while ( $r->have_posts() ) : $r->the_post(); 
       		$img = '';

       		$format = get_post_format();
            
            

       		if ( $format != 'gallery') { 
			
				if (has_post_thumbnail()) { // checks if post has a featured image and then outputs it.     
					$image_id = get_post_thumbnail_id ();  
					$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full'); 
					  
					if(!empty($image_thumb_url)){
					
							$img = aq_resize($image_thumb_url[0], 70, 70, true);  
					}
				 
	       		}
       		}

       		

			if ( $format == 'gallery') {

	       		$pix_images= '';
				$post_details = get_post_meta(get_the_id(),'electrify_post_options');
				if( !empty($post_details)){
					extract($post_details[0]);
				}

				$pix_images_gallery = htmlspecialchars_decode($pix_images);
				$images_gallery = json_decode($pix_images_gallery,true);

				

				if(!empty($images_gallery)){
					$img = aq_resize($images_gallery[0]['full'], 70, 70, true, true);
					if(!$img){
						$img = $images_gallery[0]['full'];
					}
				}
			}

       	?>
							<li><?php
								if ( $show_image ) {
								if(!empty($img)){ ?>
									<div class="postImg">
											<img src="<?php echo $img; ?>" alt="">
										</div>
								<?php }
								}
								?>
								
								<div class="content ">
									<p><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></p>
									<?php if ( $show_date ) : ?><span class="meta"><?php echo get_the_date(); ?></span>
									<?php endif; ?>
								</div>
							</li>
        
		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_popular_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_image'] = isset( $new_instance['show_image'] ) ? (bool) $new_instance['show_image'] : false;
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_popular_entries']) )
			delete_option('widget_popular_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_popular_posts', 'widget');
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Popular Posts', 'pixel8es' );
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		$show_image = isset( $instance['show_image'] ) ? (bool) $instance['show_image'] : true;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'pixel8es' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'pixel8es' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'pixel8es' ); ?></label></p>
        
        <p><input class="checkbox" type="checkbox" <?php checked( $show_image ); ?> id="<?php echo $this->get_field_id( 'show_image' ); ?>" name="<?php echo $this->get_field_name( 'show_image' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_image' ); ?>"><?php _e( 'Display post image?', 'pixel8es' ); ?></label></p>


<?php
	}
}

function pix_popular_post_widget_init(){
	register_widget('Pix_Popular_Post_Widget');	
}
add_action('widgets_init','pix_popular_post_widget_init');