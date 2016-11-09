	<aside class="col-md-3 col-sm-3" role="complementary">
		
		<?php 

		global $selected_sidebar_replacement;
		
		if($selected_sidebar_replacement != '' && $selected_sidebar_replacement != "0"){			
			dynamic_sidebar( $selected_sidebar_replacement);
		}

		else {
			$current_page = get_post_type();
			if($current_page == 'page'){
					if ( is_active_sidebar( 'primary-sidebar' ) ) : 

						dynamic_sidebar( 'primary-sidebar' ); 

					else : ?>

					<!-- This content shows up if there are no widgets defined in the backend. --> 
					
					<div class="alert help">
						<p><?php _e("Please activate some Widgets.", "pixel8es");  ?></p>
					</div>

				<?php endif;
			}else{
					if ( is_active_sidebar( 'blog-sidebar' ) ) : 

						dynamic_sidebar( 'blog-sidebar' ); 

					else : ?>

					<!-- This content shows up if there are no widgets defined in the backend. --> 
					
					<div class="alert help">
						<p><?php _e("Please activate some Widgets.", "pixel8es");  ?></p>
					</div>

				<?php endif;
			}
				 
		}	?>	
	</aside>

