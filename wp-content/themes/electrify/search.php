<?php get_header();
    
    //Set Empty Value
    $post_icon = $post_icon_bg = $con_class = $content_class = $isotope_class = $sb = $isotope_sb_class = $meta = '';

    //Get Theme Option Value
    global $smof_data;

    $search_exclude = isset($smof_data['search_exclude'])? $smof_data['search_exclude'] : array('post' => 0, 'page' => 0, 'product' => 0, 'pix_portfolio' => 0, 'pix_staffs' => 0, 'pix_testimonial' => 0);

    $sidebar_name = isset($smof_data['search_select_sidebar'])? $smof_data['search_select_sidebar'] : '';
    $select_sidebar = isset($smof_data['search_sidebar'])? $smof_data['search_sidebar'] : 'right'; //left, right, no_sidebar
    $search_meta = isset($smof_data['search_meta'])? $smof_data['search_meta'] : 1 ;
    $limit = isset($smof_data['search_limit'])? $smof_data['search_limit'] : '200';
    $search_post_icon = isset($smof_data['search_post_icon'])? $smof_data['search_post_icon'] : 1;
    $search_post_icon_style = isset($smof_data['search_post_icon_style'])? $smof_data['search_post_icon_style'] : 'round';
    
    //Sub Header Options
    $pix_header_text = isset($smof_data['search_sub_header_text'])? $smof_data['search_sub_header_text'] : 'left';    
    $header_size = isset($smof_data['search_sub_header_size'])? $smof_data['search_sub_header_size'] : 'small';
    $pix_header_styles = isset($smof_data['search_sub_header_bg_style'])? $smof_data['search_sub_header_bg_style'] : 'color';
    $header_bg_image = isset($smof_data['search_sub_header_bg_img'])? $smof_data['search_sub_header_bg_img'] : '';
    $header_bg_color = isset($smof_data['search_sub_header_bg_color'])? $smof_data['search_sub_header_bg_color'] : '#f1f2f2';
    $header_text_color = isset($smof_data['search_sub_header_text_color'])? $smof_data['search_sub_header_text_color'] : '';
    $display_header = isset($smof_data['search_sub_header'])? $smof_data['search_sub_header'] : 1;

    
    //Make Default Value
    if($sidebar_name == '0') {
        $sidebar_name = 'blog-sidebar';
    }
    
    if($search_post_icon_style == 'square'){
        $search_post_icon_style = '';
    }                      
                           

    if($display_header){
        subBanner("Search Result: ".get_search_query());
    }

    if($select_sidebar == 'no_sidebar'){
    	$column = 'col-md-12';
    }
    else{
    	$column = 'col-md-9';
    }

    


	
?>

<div class=" container boxed search-page">
	<div class="row">

		<?php if($select_sidebar == 'left'){ ?>
	        <div class="col-md-3 sidebar">
	        
	            <?php if ( is_active_sidebar( $sidebar_name ) ) {
	            
	                dynamic_sidebar( $sidebar_name );

	            }    

	            else{
	                echo '<p>'.__("Please activate some Widgets Or disable it from theme option", "pixel8es").'</p>';
	            }

	            ?>
	        </div>
        <?php } ?>

		<div class="<?php echo $column; ?>">
    
    
    
    		<?php         
                
                if (have_posts()) : while (have_posts()) : the_post();
                	$classes = join(' ', get_post_class());

                	$title = '<h2 class="title"><a href="'.get_permalink().'" rel="bookmark" >'.get_the_title().'</a></h2>';

	                $content = strip_shortcodes(ShortenText(get_the_content(),$limit));
	    			$stripped_content = strip_tags($content);
	    			$format = get_post_format();

                	          	
	                    $meta = '<div class="byline vcard clearfix">
	                                    <p class="pull-left category">
	                                        '
	                                        .sprintf( __( '<span class="tag"><i class="pixicon pixicon-eleganticons-217"></i> %1$s </span>', 'pixel8es' ),get_the_category_list(', ')).'<span class="pix-blog-comments"><i class="pixicon pixicon-eleganticons-196"></i>'. get_comments_popup_link(__('No Comments','pixel8es'), __('1 Comment','pixel8es'), __('% Comments','pixel8es'), __('comments-link','pixel8es'), '') .'</span>
	                                        
	                                    </p>
	                    </div>';

                           $page_meta = sprintf( __( '<p class="author-name"> %1$s</p><br><p class="date"> %2$s</p>', 'pixel8es' ),pixel8es_get_the_author_posts_link(),get_the_date ('M j, Y'));

	                    if($post->post_type != 'post') {
		                   $post_class = 'post';
		                }
		                else{
		                	$post_class = '';
		                }
	                    
	                	?>
	                    

									

		                                <?php
		                                //print_r( get_post_class( $class = '', $post_id = null ));

		                                


		                                $open_con = '<div class="blog-container">
							                            
							<article id="post-'.get_the_ID().'"class="' .$classes.' '.$post_class.'" role="article">                      
		                        <div class="post-content">       
		                            <div class="entry-content pix-blog-'.$format.' clearfix">';

		                            $close_con = '</div></div></article></div>';
		                                
												   
											
		                                    if ($format == 'gallery') {
		                                        $post_icon = 'picture';
		                                    }
		                                    elseif ( $format == 'quote') {
		                                        $post_icon = 'fontawesome-webfont-101';                                        
		                                    }
		                                    elseif ( $format == 'link') {
		                                        $post_icon = 'link-1';
		                                    }
		                                    elseif ( $format == '') {
		                                        $post_icon = 'pencil';
		                                    }
		                                    elseif ( $format == 'image') {
		                                        $post_icon = 'photo';
		                                    }
		                                    elseif ( $format == 'audio') {
		                                        $post_icon = 'volume';
		                                    }
		                                    elseif ( $format == 'video') {
		                                        $post_icon = 'fontawesome-webfont-255';
		                                    }

		                                    if($post->post_type == 'product') {
		                                    	$post_icon = 'fontawesome-webfont-206';
		                                    }
		                                    if($post->post_type == 'pix_staffs') {
		                                    	$post_icon = 'vcard-1';
		                                    }
		                                    if($post->post_type == 'pix_portfolio') {
		                                    	$post_icon = 'folder-1';
		                                    }
		                                    if($post->post_type == 'pix_testimonial') {
		                                    	$post_icon = 'fontawesome-webfont-99';
		                                    }
		                                    if($post->post_type == 'page') {
		                                    	$post_icon = 'fontawesome-webfont-35';
		                                    }

		                                    

						    if($post->post_type == 'post') {
							if($search_meta){
		                                    	    $heading = '<div class="heading">'.$title.$meta.'</div>';
							}
		                                    }
                                                    elseif($post->post_type == 'page'){
                                                        if($search_meta){
		                                    	    $heading = '<div class="heading">'.$title.$page_meta.'</div>';
							}
                                                    }

		                                    else{
		                                    	$heading = '<div class="heading">'.$title.'</div>';
		                                    }
		                                    
		                                    $details = '';

		                                    if($search_post_icon){
		                                        $details .= '<div class="icon-box' . ' ' .$search_post_icon_style.'"><i class="pixicon-'.$post_icon.'"></i></div>';
		                                    }
                                                    if($post->post_type != 'page'){
		                                        if(!empty($content)){
		                                    	    $details .= '<div class="content-blog">'.$stripped_content.'</div>';
		                                        }
                                                        $details .= '<p class="link"><a href="'.get_permalink().'">Read More </a></p>';
                                                    } 

		                                    $combine_details = $open_con . $heading . $details . $close_con;
			                                    	

		                                    if($search_exclude['post'] == '0'){
		                                    	if($post->post_type == 'post'){
		                                    		echo $combine_details;
		                                    	}
		                                    }

		                                    if($search_exclude['page'] == '0'){
		                                    	if($post->post_type == 'page'){
		                                    		echo $combine_details;
		                                    	}
		                                    }

		                                    if($search_exclude['product'] == '0'){
		                                    	if($post->post_type == 'product'){
		                                    		echo $combine_details;
		                                    	}
		                                    }

		                                    if($search_exclude['pix_portfolio'] == '0'){
		                                    	if($post->post_type == 'pix_portfolio'){
		                                    		echo $combine_details;
		                                    	}
		                                    }

		                                    if($search_exclude['pix_staffs'] == '0'){
		                                    	if($post->post_type == 'pix_staffs'){
		                                    		echo $combine_details;
		                                    	}
		                                    }

		                                    if($search_exclude['pix_testimonial'] == '0'){
		                                    	if($post->post_type == 'pix_testimonial'){
		                                    		echo $combine_details;
		                                    	}
		                                    }

		                                    
    	
		                                ?>

		                                                   
		                            				


                <?php endwhile;

                else :
                	echo '<div><p>No Search Result Found</p></div>';
                endif;
            ?>
            
        	<?php
        		if ( function_exists( 'pixel8es_page_navi' ) ) { 
        			echo pixel8es_page_navi(); 
				}
				else {
			?>
			        <nav class="wp-prev-next ">
			                <ul class="clearfix">
			                    <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'pixel8es' )) ?></li>
			                    <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'pixel8es' )) ?></li>
			                </ul>
			        </nav>
			<?php } ?>
              
			

        
		</div>
       
    	<?php if($select_sidebar == 'right'){ ?>
	        <div class="col-md-3 sidebar">
	        
	            <?php if ( is_active_sidebar( $sidebar_name ) ) {
	            
	                dynamic_sidebar( $sidebar_name );

	            }    

	            else{
	                echo '<p>'.__("Please activate some Widgets Or disable it from theme option", "pixel8es").'</p>';
	            }

	            ?>
	        </div>
        <?php } ?>
          
    
          
	</div>

 

</div>



<?php get_footer(); ?>
