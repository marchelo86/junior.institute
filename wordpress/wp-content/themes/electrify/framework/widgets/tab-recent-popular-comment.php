<?php 

/*
 * Testimonial Widget
*/
class Pix_Tab_Widget extends WP_Widget {

	function Pix_Tab_Widget() {
		$widget_options = array('classname' => 'tab-widget', 'description' => __('Display Tab Widget','pixel8es'));
		parent::WP_Widget('pix_tab_widget',__('Pixel8es:: Tab Widget','pixel8es'),$widget_options);
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_tab_widget', 'widget');

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

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts','pixel8es' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );


		$tab_content = array('popular' => __( 'Popular Post','pixel8es' ),'recent' => __( 'Recent Post','pixel8es' ), 'comment' => __( 'Recent Comments','pixel8es' ));
        
        echo $before_widget; 


		foreach ($tab_content as $key => $value) {

			
			if($key == 'popular'){
				$number = ( ! empty( $instance['p_number'] ) ) ? absint( $instance['p_number'] ) : 10;
				if ( ! $number ){
		 			$number = 10;
				}
		 		$show_image = isset( $instance['p_show_image'] ) ?  $instance['p_show_image'] : false;
				$show_date = isset( $instance['p_show_date'] ) ? $instance['p_show_date'] : false;

				$r = new WP_Query( array( 'posts_per_page' => $number, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
			}
			

			if($key == 'recent'){
				$number = ( ! empty( $instance['r_number'] ) ) ? absint( $instance['r_number'] ) : 10;
				if ( ! $number ){
		 			$number = 10;
				}
		 		$show_image = isset( $instance['r_show_image'] ) ?  $instance['r_show_image'] : false;
				$show_date = isset( $instance['r_show_date'] ) ? $instance['r_show_date'] : false;

				$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
			}

			if($key == 'comment'){
				$number = ( ! empty( $instance['c_number'] ) ) ? absint( $instance['c_number'] ) : 10;
				if ( ! $number ){
		 			$number = 10;
				}

				$comments = get_comments( apply_filters( 'widget_comments_args', array(
					'number'      => $number,
					'status'      => 'approve',
					'post_status' => 'publish'
				) ) );
			}

			
		

			if ($r->have_posts()) :

				

				//if ( $title ) echo $before_title . $title . $after_title; 


				$output = '<ul>';
					while ( $r->have_posts() ) : $r->the_post(); 
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
				 
	       		
						$output .= '<li>';
							if ( $show_image ) {
								if(!empty($img)){ 
									$output .= '<div class="postImg">
										<img src="'.$img.'" alt="">
									</div>';
								}
							}						
							$output .= '<div class="content "><p><a href="'.get_permalink().'">'.get_the_title().'</a></p>';
							if ( $show_date ) : 
								$output .= '<span class="meta">'.get_the_date().'</span>';
							endif; 
							$output .= '</div>';
						$output .= '</li>';
	        
			 		endwhile; 
				$output .= '</ul>';
		


				 

				 ?>


				<?php
				// Reset the global $the_post as this query will have stomped on it
				wp_reset_postdata();

			endif;

			if($key == 'popular'){
				$popular = $output;
			}
			if($key == 'recent'){
				$recent = $output;
			}

			if($key == 'comment'){
				$recent_comment = '<ul id="recentcomments">';
				
					// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
					$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
					_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

					foreach ( (array) $comments as $comment) {
						$recent_comment .=  '<li class="recentcomments">' . /* translators: comments widget: 1: comment author, 2: post link */ sprintf(__('%1$s on %2$s', 'pixel8es'), get_comment_author_link($comment->comment_ID), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
					}
				
				$recent_comment .= '</ul>';
			}



		}

		echo do_shortcode('[vc_row][vc_column width="1/1"][vc_tabs style="default style2" align="default" side="default"][vc_tab title="Popular Posts" tab_id="1399377577-1-19" icon_name="none"]'.$popular.'[/vc_tab][vc_tab title="Recent Posts" tab_id="1399377577-2-7" icon_name="none"]'.$recent.'[/vc_tab][vc_tab title="&nbsp;" tab_id="1399377577-3-3" icon_name="pixicon-fontawesome-webfont-196"]'.$recent_comment.'[/vc_tab][/vc_tabs][/vc_column][/vc_row]');
        
        echo $after_widget;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_tab_widget', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Popular Post
		$instance['p_number'] = (int) $new_instance['p_number'];
		$instance['p_show_date'] = isset( $new_instance['p_show_date'] ) ? (bool) $new_instance['p_show_date'] : false;
		$instance['p_show_image'] = isset( $new_instance['p_show_image'] ) ? (bool) $new_instance['p_show_image'] : false;

		//Popular Post
		$instance['r_number'] = (int) $new_instance['r_number'];
		$instance['r_show_date'] = isset( $new_instance['r_show_date'] ) ? (bool) $new_instance['r_show_date'] : false;
		$instance['r_show_image'] = isset( $new_instance['r_show_image'] ) ? (bool) $new_instance['r_show_image'] : false;

		//Recent Comment
		$instance['c_number'] = (int) $new_instance['c_number'];

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_tab_widget_entries']) )
			delete_option('widget_tab_widget_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_tab_widget', 'widget');
	}

	function form( $instance ) {

		//Popular Post
		$p_number    = isset( $instance['p_number'] ) ? absint( $instance['p_number'] ) : 5;
		$p_show_date = isset( $instance['p_show_date'] ) ? (bool) $instance['p_show_date'] : true;
		$p_show_image = isset( $instance['p_show_image'] ) ? (bool) $instance['p_show_image'] : true;

		//Popular Post
		$r_number    = isset( $instance['r_number'] ) ? absint( $instance['r_number'] ) : 5;
		$r_show_date = isset( $instance['r_show_date'] ) ? (bool) $instance['r_show_date'] : true;
		$r_show_image = isset( $instance['r_show_image'] ) ? (bool) $instance['r_show_image'] : true;

		//Recent Comment
		$c_number    = isset( $instance['c_number'] ) ? absint( $instance['c_number'] ) : 5;
?>
		<h4><?php _e( 'Popular Posts:','pixel8es' ) ?></h4>
		<p><label for="<?php echo $this->get_field_id( 'p_number' ); ?>"><?php _e( 'Number of Popular Posts:', 'pixel8es' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'p_number' ); ?>" name="<?php echo $this->get_field_name( 'p_number' ); ?>" type="text" value="<?php echo esc_attr($p_number); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $p_show_date ); ?> id="<?php echo $this->get_field_id( 'p_show_date' ); ?>" name="<?php echo $this->get_field_name( 'p_show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'p_show_date' ); ?>"><?php _e( 'Display post date?' , 'pixel8es'); ?></label></p>
        
        <p><input class="checkbox" type="checkbox" <?php checked( $p_show_image ); ?> id="<?php echo $this->get_field_id( 'p_show_image' ); ?>" name="<?php echo $this->get_field_name( 'p_show_image' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'p_show_image' ); ?>"><?php _e( 'Display post image?', 'pixel8es' ); ?></label></p>


		<h4><?php _e( 'Recent Posts:','pixel8es' ) ?></h4>
		<p><label for="<?php echo $this->get_field_id( 'r_number' ); ?>"><?php _e( 'Number of Popular Posts:', 'pixel8es' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'r_number' ); ?>" name="<?php echo $this->get_field_name( 'r_number' ); ?>" type="text" value="<?php echo esc_attr($r_number); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $r_show_date ); ?> id="<?php echo $this->get_field_id( 'r_show_date' ); ?>" name="<?php echo $this->get_field_name( 'r_show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'r_show_date' ); ?>"><?php _e( 'Display post date?', 'pixel8es' ); ?></label></p>
        
        <p><input class="checkbox" type="checkbox" <?php checked( $r_show_image ); ?> id="<?php echo $this->get_field_id( 'r_show_image' ); ?>" name="<?php echo $this->get_field_name( 'r_show_image' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'r_show_image' ); ?>"><?php _e( 'Display post image?', 'pixel8es' ); ?></label></p>

		<h4><?php _e( 'Recent Comments:','pixel8es' ) ?></h4>
		<p><label for="<?php echo $this->get_field_id( 'c_number' ); ?>"><?php _e( 'Number of Popular Posts:', 'pixel8es' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'c_number' ); ?>" name="<?php echo $this->get_field_name( 'c_number' ); ?>" type="text" value="<?php echo esc_attr($c_number); ?>" size="3" /></p>


<?php
	}
}

function pix_tab_widget_init(){
	register_widget('Pix_Tab_Widget');	
}
add_action('widgets_init','pix_tab_widget_init');