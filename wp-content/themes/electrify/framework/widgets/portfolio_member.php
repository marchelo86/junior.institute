<?php 

/*
 * Testimonial Widget
*/
class Pix_portfolio_Member_Widget extends WP_Widget {

	function Pix_portfolio_Member_Widget() {
		$widget_options = array('classname' => 'portfolio-member', 'description' => __('Display Picture Gallery','pixel8es'));
		parent::WP_Widget('pix_portfolio_member',__('Pixel8es:: Custom Post Gallery','pixel8es'),$widget_options);
	}

	function widget( $args, $instance ) {
		extract($args);
		
		$title = ($instance['title']) ? $instance['title'] : __('Gallery','pixel8es');
		$galleryCount = isset($instance['galleryCount']) ? $instance['galleryCount'] : '5';
		$order = isset($instance['order']) ? $instance['order'] : 'ASC';
		$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'date';
		$custom_post = isset($instance['custom_post']) ? $instance['custom_post'] : 'pix_portfolio';
		$style = isset($instance['style']) ? $instance['style'] : 'single';

		$width = $height = '';

		if($style == 'single'){
			$width = 263;
			$height = 200;
			$class = 'single-gallery';
		}

		else{
			$class = 'group-gallery';
			$width = $height = 85;
		}




		echo $before_widget;
		
			$args = array(
				'post_type' => $custom_post,
				'order' => $order,
				'orderby' => $orderby,
				'posts_per_page' => $galleryCount
			);
			
		$the_query = new WP_Query( $args );

		echo '<div class="widget-galley '.$class.'">
				'.$before_title . $title . $after_title.'
				<div class="pix-post-gallery owl-carousel" data-navigation="false" data-single-item="true" data-auto-height="true"
				data-pagination="true" >';
	 
 	  	if ($the_query->have_posts()){
		
		  
		$i = 6; $k = 1;
		 
		while ($the_query->have_posts()) : $the_query->the_post();

			$img = ''; $temp_thumb = '';

			if($custom_post == 'pix_portfolio'){
				//Get Porfolio Image
				$pix_images= '';
				$post_details = get_post_meta(get_the_id(),'electrify_single_portfolio_options');
				if( !empty($post_details)){
					extract($post_details[0]);
				}

				$pix_images_gallery = htmlspecialchars_decode($pix_images);
				$images_gallery = json_decode($pix_images_gallery,true);

				

				if(!empty($images_gallery)){
					$img = aq_resize($images_gallery[0]['full'], $width, $height, true, true);
					if(!$img){
						$img = $images_gallery[0]['full'];
					}
					$temp_thumb .= "<img src='$img' alt=''>";

				}
			}	 


			if($custom_post == 'pix_staffs'){
				if (has_post_thumbnail()) { // checks if post has a featured image and then outputs it.     
					$image_id = get_post_thumbnail_id ();  
					$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full');   
					if(!empty($image_thumb_url)){
						$img = aq_resize($image_thumb_url[0], $width, $height, true);  
					}
					if(!$img){
						$img = $image_thumb_url[0];  
					}
					$temp_thumb .= "<img src='$img' alt=''>";
				 
	       		}
       		}

			$j = $i%6;
			$l = $k%6;
			//echo $j;
			//echo $l;

			
   			$title = get_the_title($the_query->post->ID);
			
			$link = get_permalink($the_query->post->ID);
			
			if($style == 'group'){
				if($j==0){
					echo '<div>';
				}
			}	
			
			echo $temp_thumb;


			if($style == 'group'){
				if($l==0 || $k == $galleryCount){
					echo '</div>';
				}
			}

			//echo $k . '==' .$galleryCount;

			//echo $i;

		  	$i++; $k++;	endwhile;
	  }




	  else{
      	echo '<div>No items found</div>';
   	
      }

      wp_reset_postdata();

      echo '</div>
      </div>';

      

		echo $after_widget;

		?>

	<?php
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$galleryCount = isset($instance['galleryCount']) ? $instance['galleryCount'] : '5';
		$order = isset($instance['order']) ? $instance['order'] : 'ASC';
		$orderby = isset($instance['order']) ? $instance['order'] : 'date';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','pixel8es'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('custom_post');?>">
        <?php _e('Choose Custom Post:','pixel8es'); ?>
            <select id="<?php echo $this->get_field_id('custom_post');?>" name="<?php echo $this->get_field_name('custom_post');?>">
            	<?php $custom_post = isset($instance['custom_post']) ? $instance['custom_post'] : 'asc';?>
                <option value="pix_staffs" <?php selected( $custom_post, "pix_staffs" ); ?>>Member</option>
                <option value="pix_portfolio" <?php selected( $custom_post, "pix_portfolio" ); ?>>Portfolio</option>
            </select>
		</p>

		<p><label for="<?php echo $this->get_field_id('style');?>">
        <?php _e('Style:','pixel8es'); ?>
            <select id="<?php echo $this->get_field_id('style');?>" name="<?php echo $this->get_field_name('style');?>">
            	<?php $style = isset($instance['style']) ? $instance['style'] : 'group';?>
                <option value="single" <?php selected( $style, "single" ); ?>>Single</option>
                <option value="group" <?php selected( $style, "group" ); ?>>Group</option>
            </select>
		</p>

        <p><label for="<?php echo $this->get_field_id('galleryCount');?>">
        <?php _e('Gallery Count (Max 20):','pixel8es'); ?>
        <input class="widefat" id="<?php echo $this->get_field_id('galleryCount');?>" name="<?php echo $this->get_field_name('galleryCount');?>" value="<?php echo esc_attr( (isset($instance['galleryCount'])&&!empty($instance['galleryCount']) ? $instance['galleryCount'] : '5' )) ; ?>" type="number" style="width:50px;" min="1" max="20"></label></p>
        
        <p><label for="<?php echo $this->get_field_id('order');?>">
        <?php _e('Order:','pixel8es'); ?>
            <select id="<?php echo $this->get_field_id('order');?>" name="<?php echo $this->get_field_name('order');?>">
            	<?php $order = isset($instance['order']) ? $instance['order'] : 'ASC';?>
                <option value="ASC" <?php selected( $order, "ASC" ); ?>>ASC</option>
                <option value="DESC" <?php selected( $order, "DESC" ); ?>>DESC</option>
            </select>
		</p>
        
        <p><label for="<?php echo $this->get_field_id('orderby');?>">
        <?php _e('Order By:','pixel8es'); ?>
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

function pix_portfolio_member_widget_init(){
	register_widget('Pix_portfolio_Member_Widget');	
}
add_action('widgets_init','pix_portfolio_member_widget_init');