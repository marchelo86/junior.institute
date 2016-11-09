<?php get_header();
    
    //Set Empty Value
    $post_icon_bg = $con_class = $content_class = $isotope_class = $sb = $isotope_sb_class = $meta = '';

    //Get Theme Option Value
    global $smof_data;

    $sidebar_name = isset($smof_data['a_select_sidebar'])? $smof_data['a_select_sidebar'] : '';

    $select_sidebar = isset($smof_data['a_sidebar'])? $smof_data['a_sidebar'] : 'right'; //left, right, no_sidebar
    $a_styles = isset($smof_data['a_styles'])? $smof_data['a_styles'] : 'normal_with_sb'; //timeline, masonry, masonry_with_sb, grid, grid_with_sb, normal, normal_with_sb, normal_small, normal_small_with_sb
    $a_meta = isset($smof_data['a_meta'])? $smof_data['a_meta'] : 1 ;
    $limit = isset($smof_data['a_limit'])? $smof_data['a_limit'] : '200';
    $a_post_icon = isset($smof_data['a_post_icon'])? $smof_data['a_post_icon'] : 1;
    $a_post_icon_style = isset($smof_data['a_post_icon_style'])? $smof_data['a_post_icon_style'] : 'round';

    //Sub Header Options
	$pix_header_text = isset($smof_data['a_sub_header_text'])? $smof_data['a_sub_header_text'] : 'left';	
	$header_size = isset($smof_data['a_sub_header_size'])? $smof_data['a_sub_header_size'] : 'small';
	$pix_header_styles = isset($smof_data['a_sub_header_bg_style'])? $smof_data['a_sub_header_bg_style'] : 'color';
	$header_bg_image = isset($smof_data['a_sub_header_bg_img'])? $smof_data['a_sub_header_bg_img'] : '';
	$header_bg_color = isset($smof_data['a_sub_header_bg_color'])? $smof_data['a_sub_header_bg_color'] : '#f1f2f2';
	$header_text_color = isset($smof_data['a_sub_header_text_color'])? $smof_data['a_sub_header_text_color'] : '';
	$display_header = isset($smof_data['a_sub_header'])? $smof_data['a_sub_header'] : 1;

    $sub_header_class = ' ';
    $sub_header_class .= isset($smof_data['header_option']) ? 'content-'.$smof_data['header_option'] : 'header1';
	
    $header_trans = isset($smof_data['header_transparency']) ? $smof_data['header_transparency'] : 0;

    if($header_trans){
        $sub_header_class .= ' sub-header-trans';
    }

    
    //Make Default Value
    if($sidebar_name == '0') {
        $sidebar_name = 'blog-sidebar';
    }

    if($a_post_icon_style == 'square'){
        $a_post_icon_style = '';
    }                      
                           

    if($a_styles == 'timeline'){
        $con_class = 'timeline';
        $width = 730;
        $height = 300;
    }
    
    if($a_styles == 'masonry' || $a_styles == 'masonry_with_sb' || $a_styles == 'grid' || $a_styles == 'grid_with_sb'){
        $con_class = 'masonry';
        $content_class = 'element col-md-4';
        $post_icon_bg = '<div class="bg '.$a_post_icon_style.'"></div>';
        $width = 360;

        if($a_styles == 'masonry' || $a_styles == 'masonry_with_sb'){
            $height = NULL; 
        }
        if($a_styles == 'masonry_with_sb' || $a_styles == 'grid_with_sb'){
            $isotope_sb_class = 'isotopeCon row';
            $width = 252; 
        }
        if($a_styles == 'grid' || $a_styles == 'grid_with_sb'){
            $height = 400;
            $con_class = 'masonry grid';
        }
        if($a_styles == 'masonry' || $a_styles == 'grid'){
            $isotope_class = 'isotopeCon row'; 
        }
        
    }
    
    if( $a_styles == 'normal_with_sb'  || $a_styles == 'normal_small_with_sb' || $a_styles == 'masonry_with_sb' || $a_styles == 'grid_with_sb'){

        $columns = 'col-md-9';
        $sb = 'yes';

        if($select_sidebar == 'no_sidebar'){
            $columns = 'col-md-12';
        }
    }
    

    if($a_styles == 'normal' || $a_styles == 'normal_small'){
        $columns = 'col-md-12';
		if($a_styles == 'normal'){
			$width = 1140;
        	$height = 350;
			$con_class = 'normal';
		
		}
		else{
			$width = 370;
        	$height = 300;
			$con_class = 'normal normal_small';
			
		}
        
       
    }

    if($a_styles == 'normal_with_sb'  || $a_styles == 'normal_small_with_sb'){
        $width = 848;
        $height = 300;
        
        if($a_styles == 'normal_with_sb'){
			$con_class = 'normal normal_with_sb';
        }
		else{
			$con_class = 'normal normal_small';
		}
        
    }

    if (is_category()) {

        $arc_title = __("Posts Categorized:", "pixel8es") . ' ' . single_cat_title( $prefix = '', $display = false );
    
    }
    elseif (is_tag()) { 

        $arc_title = __("Posts Tagged:", "pixel8es") . ' ' . single_tag_title( $prefix = '', $display = false );
    
    }
    elseif (is_author()) { 
        global $post;
        $author_id = $post->post_author;
     
        $arc_title = __("Posts By:", "pixel8es") . ' ' . get_the_author_meta('display_name', $author_id);

    }
    elseif (is_day()) { 

        $arc_title = __("Daily Archives:", "pixel8es") . ' ' . get_the_time('l, F j, Y');

    }
    elseif (is_month()) {  

        $arc_title = __("Monthly Archives:", "pixel8es") . ' ' . get_the_time('F Y');

    }
    elseif (is_year()) {  

        $arc_title = __("Posts Categorized:", "pixel8es") . ' ' . get_the_time('Y');

    }


    if($display_header){
		subBanner($arc_title);
	}
	
?>

<div class="blog">

<div class="<?php echo $con_class; ?> container boxed">



<?php if ($a_styles == 'grid' || $a_styles == 'masonry' || $a_styles == 'masonry_with_sb' || $a_styles == 'grid_with_sb'){
	echo '<div class="'.$isotope_class.'">';
}


    
    if($a_styles != 'timeline'){
        echo '<div class="row">';
    }

    if($sb == 'yes' && $select_sidebar == 'left'){
        echo '<div class="col-md-3 sidebar">';
        
        if ( is_active_sidebar( $sidebar_name ) ) {
            
            dynamic_sidebar( $sidebar_name );

        }    

        else{
            echo '<p>'.__("Please activate some Widgets Or disable it from theme option", "pixel8es").'</p>';
        }
        echo '</div>';
    }
                    

    if($a_styles != 'grid' && $a_styles != 'masonry' && $a_styles != 'timeline'){
        echo '<div class="'.$columns.' ' .$isotope_sb_class.'">';
    }
    ?>
    
    <?php
         if($a_styles == 'timeline'){ 
              echo '<div>';
         }
         
         if($a_styles == 'masonry_with_sb' || $a_styles == 'grid_with_sb'){
           // echo '<div class="row">';
         }
                
                if (have_posts()) : while (have_posts()) : the_post();

                    //Get Meta Box Value
                    $post_details = get_post_meta(get_the_id(),'electrify_post_options');
                    if( !empty($post_details)){
                        extract($post_details[0]);
                    }
                    $pix_video_methods = isset($pix_video_methods) ? $pix_video_methods : 'vid_normal';
                    $pix_vid_url = isset($pix_vid_url) ? $pix_vid_url : '';
                    $pix_vid_poster = isset($pix_vid_poster) ? $pix_vid_poster : '';
                    $pix_vid_autoplay = isset($pix_vid_autoplay) ? $pix_vid_autoplay : 'yes';
                    $pix_vid_iframe = isset($pix_vid_iframe) ? $pix_vid_iframe : '';
                    $pix_vid_playlist = isset($pix_vid_playlist) ? $pix_vid_playlist : '';
                    $pix_aud_methods = isset($pix_aud_methods) ? $pix_aud_methods : 'aud_normal';
                    $pix_audio = isset($pix_audio) ? $pix_audio : '';
                    $pix_aud_autoplay = isset($pix_aud_autoplay) ? $pix_aud_autoplay : 'y';
                    $pix_aud_iframe = isset($pix_aud_iframe) ? $pix_aud_iframe : '';
                    $pix_aud_playlist = isset($pix_aud_playlist) ? $pix_aud_playlist : '';
                    $pix_images = isset($pix_images)? $pix_images : '';
                    $pix_img_autoslide = isset($pix_img_autoslide)? $pix_img_autoslide : 'true';
                    $pix_link = isset($pix_link) ? $pix_link : '';
                    $pix_quote_author = isset($pix_quote_author) ? $pix_quote_author : '';


    				$title = '<h2 class="title"><a href="'.get_permalink().'" rel="bookmark" >'.get_the_title().'</a></h2>';

                    $content = strip_shortcodes(ShortenText(get_the_content(),$limit));
    				$stripped_content = strip_tags($content);

                    

                    $readmore = '';

                    if($a_styles == 'timeline'){
                        $readmore = '<p class="pull-right link"><a href="'.get_permalink().'">Read More</a></p>';
                    }
                    if($a_meta){
                        $meta = '<div class="byline vcard clearfix">
                                    <p class="pull-left category">
                                        '
                                        .sprintf( __( '<span class="tag"><i class="pixicon pixicon-eleganticons-217"></i> %1$s </span>', 'pixel8es' ),get_the_category_list(', ')).'<span class="pix-blog-comments"><i class="pixicon pixicon-eleganticons-196"></i>'. get_comments_popup_link(__('No Comments','pixel8es'), __('1 Comment','pixel8es'), __('% Comments','pixel8es'), __('comments-link','pixel8es'), '') .'</span>
                                        
                                    </p>
                                    '.$readmore.'
                                        
                        </div>';
                    }            

                    ?>
                    

                    <div class="blog-container <?php echo $content_class; ?>">

                        <?php if($a_styles == 'timeline'){ ?>

                        <div class="author">    
                         
                            <div class="author-img">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                            </div>
                            
                            <div>
                                <?php printf( __( '<p class="author-name"> %1$s</p><br><p class="date"> %2$s</p>', 'pixel8es' ),pixel8es_get_the_author_posts_link(),get_the_date ('M j, Y')); ?> 
                            </div>
                                
                        </div>

                        <?php }  ?>
                            
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix sub-header-'.$display_header.$sub_header_class ); ?> role="article">
        
                         
                        <?php

                            $format = get_post_format();


    						
                            if ( $format == '' || $format == 'image') {
                                $img = '';
                                // Checks if post has a feature image, grabs the feature-image and outputs that along with thumbnail SRC as a REL attribute 
                                if (has_post_thumbnail()) { // checks if post has a featured image and then outputs it.     
                                    $image_id = get_post_thumbnail_id ($post->ID );  
                                    $image_thumb_url = wp_get_attachment_image_src( $image_id, 'full');
                                    if(!empty($image_thumb_url))
                                        $img = aq_resize($image_thumb_url[0], $width, $height , true, true); 

                                    if(!$img){
                                       $img = $image_thumb_url[0];
                                    }

                                    echo '<div class="blog-img blog-img-left"><a href="'. $image_thumb_url[0] .'" class="popup-gallery lightbox"><div class="popup"><i class="pixicon-eleganticons-52"></i></div></a><img src="' . $img . '" alt=""></div>';                           
                                }
                            }

                            elseif ( $format == 'gallery') {
                                $pix_images_gallery = htmlspecialchars_decode($pix_images);
                                $images_gallery = json_decode($pix_images_gallery,true);

                                if($pix_img_autoslide == 'true' || is_numeric($pix_img_autoslide)){
                                    $autoslide = 'data-auto-play="'.$pix_img_autoslide.'"';
                                }
                                elseif($pix_img_autoslide == 'false'){
                                    $autoslide = '';
                                }
                                else{
                                    $autoslide = 'data-auto-play= "5000"';
                                }

                                echo '<div class="blog-img-left pix-post-gallery owl-carousel" data-navigation="true" data-single-item="true" data-auto-height="true" data-pagination="false" '.$autoslide.' data-transition-style="fade">';


                                foreach($images_gallery as $src){
                                    //$images_gallery = $images_gallery[0]['full'];
                                    $img = aq_resize($src['full'], $width, $height, true, true);
    								if(!$img){
    									$img = $src['full'];	
    								}
                                    echo '<div><img src="'.$img.'" alt=""></div>';
                                }
                                echo '</div>';                      
                            }

                            elseif ( $format == 'video') {
                                if($pix_video_methods == 'vid_normal'){

                                    if(!empty($pix_vid_url)){
                                        $pix_vid_url = htmlspecialchars_decode($pix_vid_url);
                                        $vid_arr = json_decode($pix_vid_url,true);
                                        
                                        $pix_vid_poster = htmlspecialchars_decode($pix_vid_poster);
                                        $vid_poster = json_decode($pix_vid_poster,true);
                                        $vid_poster = isset($vid_poster[0]['full']) ? $vid_poster[0]['full'] : '';
                                        
                                        $vid_sc = '';
                                        $vid_sc .= '[video ';
                                        foreach($vid_arr as $vid){
                                            $vid_sc .= $vid['format'] . '="' . $vid['url'] . '" ';
                                        }
                                        
                                        $vid_sc .= 'poster = "' . $vid_poster . '" ';
                                        if($pix_vid_autoplay == 'yes'){
                                            $vid_sc .= 'autoplay = "' . $pix_vid_autoplay . '" ';
                                        }
                                        $vid_sc .= ']';
                                        
                                        echo '<div class="blog-img-left pix-post-video">'.do_shortcode($vid_sc).'</div>';
                                    }
                                }
                                if($pix_video_methods == 'vid_iframe'){
                                    if(!empty($pix_vid_iframe)){
                                        
                                        echo '<div class="blog-img-left pix-post-video">'.$pix_vid_iframe.'</div>';
                                        
                                    }
                                }
                                if($pix_video_methods == 'vid_playlist'){
                                    if(!empty($pix_vid_playlist)){
                                        $pix_vid_playlist = htmlspecialchars_decode($pix_vid_playlist);
                                        $vid_playlist_arr = json_decode($pix_vid_playlist,true);
                                        
                                        $vid_playlist_sc = ''; 
                                        $vid_playlist_sc .= '[playlist type="video" ids=';
                                        $total = count($vid_playlist_arr);
                                        $i = 1;
                                        foreach($vid_playlist_arr as $vid_playlist){
                                            if($i != $total){
                                                $vid_playlist_sc .= $vid_playlist['itemId'].',';
                                            }
                                            else{
                                                $vid_playlist_sc .= $vid_playlist['itemId'];
                                            }
                                            
                                            $i++;
                                        }
                                        
                                        
                                        $vid_playlist_sc .= ']';

                                        echo '<div class="blog-img-left pix-post-video">'.do_shortcode($vid_playlist_sc).'</div>';
                                    }
                                }                                               
                            }

                            elseif ( $format == 'audio') {
                                if($pix_aud_methods == 'aud_normal'){

                                    if(!empty($pix_audio)){
                                        
                                        $pix_audio = htmlspecialchars_decode($pix_audio);
                                        $audio_arr = json_decode($pix_audio,true);
                                        
                                        $aud_sc = '';
                                        $aud_sc .= '[audio ';
                                        foreach($audio_arr as $aud){
                                            $ext = substr(strrchr($aud['url'],'.'),1);
                                            $aud_sc .= $ext . '="' . $aud['url'] . '" ';
                                        }
                                        if($pix_aud_autoplay == 'y'){
                                            $aud_sc .= 'autoplay = "' . $pix_aud_autoplay . '" ';
                                        }
                                        $aud_sc .= ']';
                                        
                                        echo '<div class="pix-post-audio">'.do_shortcode($aud_sc).'</div>';
                                        
                                    }
                                }
                                if($pix_aud_methods == 'aud_iframe'){
                                    if(!empty($pix_aud_iframe)){
                                        
                                        echo '<div class="pix-post-audio">'.do_shortcode($pix_aud_iframe).'</div>';
                                        
                                    }
                                }
                                if($pix_aud_methods == 'aud_playlist'){
                                    
                                    if(!empty($pix_aud_playlist)){
                                        $pix_aud_playlist = htmlspecialchars_decode($pix_aud_playlist);
                                        $aud_playlist_arr = json_decode($pix_aud_playlist,true);
                                        
                                        $aud_playlist_sc = ''; 
                                        $aud_playlist_sc .= '[playlist ids=';
                                        $total = count($aud_playlist_arr);
                                        $i = 1;
                                        foreach($aud_playlist_arr as $aud_playlist){
                                            if($i != $total){
                                                $aud_playlist_sc .= $aud_playlist['itemId'].',';
                                            }
                                            else{
                                                $aud_playlist_sc .= $aud_playlist['itemId'];
                                            }
                                            
                                            $i++;
                                        }
                                        
                                        
                                        $aud_playlist_sc .= ']';

                                        echo '<div class="blog-img-left pix-post-video">'.do_shortcode($aud_playlist_sc).'</div>';
                                    }
                                }
                            }    
                        ?>
                         
                        
                        <div class="post-content">

                            <?php
                                if($a_styles != 'normal' && $a_styles != 'normal_with_sb' && $a_styles != 'normal_small' && $a_styles != 'normal_small_with_sb'){
                                    if ($format == 'link') {
                                        if (!empty($pix_link)) {
                                            echo '<a href="'.$pix_link.'">';
                                        }
                                    }									
    							}
                                 
                            ?>
                            
                                <div class="entry-content pix-blog-<?php echo $format; ?> clearfix">
                                    <?php
                                    if($a_styles != 'normal_small' && $a_styles != 'normal_small_with_sb'){
    									if ($format != 'link') {
    										echo $title;
                                        }
                                        
                                        if($a_styles != 'normal' && $a_styles != 'normal_with_sb'){
                                            if ($format == 'link') {
    										    echo '<h2 class="title">'.get_the_title().'</h2>';
                                            }
                                        }
                                        
                                        if($a_styles == 'normal' || $a_styles == 'normal_with_sb'){
                                            if ($format == 'link') {
    										    echo $title;
                                            }
                                        }    
                                    
    									if($a_styles != 'timeline'){
    										if($format != 'quote' && $format != 'link'){
    											echo $meta;
    										}
    									}
    									
    								}    
    									
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

                                        if($a_post_icon){
                                            echo '<div class="icon-box"><i class="pixicon-'.$post_icon.'"></i></div>'.$post_icon_bg;
                                        }

                                        if ( $format == 'quote') {
                                            if($a_styles != 'normal_small' && $a_styles != 'normal_small_with_sb'){

                                                echo '<p><span class="quote-left"></span>'.$stripped_content.'<span class="quote-right"></span>';
                                            
                                                    if(!empty($pix_quote_author)){
                                                        echo '<span class="quote-author">'.$pix_quote_author.'</span>';
                                                    }
                                            
                                                echo '</p>';  
                                            }                                        
                                        }
                                        
    									
    									
    									if($a_styles == 'normal_small' || $a_styles == 'normal_small_with_sb'){
    										echo '<div class="heading">';
    										
    											echo $title;
    										
    									
    										
    											if($format != 'quote' && $format != 'link'){
    												echo $meta;
    											}
    										
    										echo '</div>';
                                            if($format == 'quote'){
                                                echo '<p> <span class="quote-left"></span>'.$stripped_content.'<span class="quote-right"></span>';
                                                
                                                        if(!empty($pix_quote_author)){
                                                            echo '<span class="quote-author">'.$pix_quote_author.'</span>';
                                                        }
                                                
                                                    echo '</p>';
                                            }    
    									
    									}
    									

                                        if($format != 'quote'){
    										if(!empty($content)){
    											 echo '<div class="content-blog">'.$content.'</div>';
    										}

                                            if($a_styles == 'normal' || $a_styles == 'normal_with_sb' || $a_styles == 'normal_small' || $a_styles == 'normal_small_with_sb'){
                                                if($format == 'link'){
                                                   if(!empty($pix_link)){
                                                        echo '<p class="link-text"><a href="'.$pix_link.'">'.$pix_link.'</a></p>';
                                                   }
                                                }
                                            }
                                            else{
                                                if($format == 'link'){
                                                   if(!empty($pix_link)){
                                                        echo '<p class="link-text">'.$pix_link.'</p>';
                                                   }
                                                }
                                            }    
    									   
    										   
                                        }

                                        if($a_styles == 'normal' || $a_styles == 'normal_with_sb' || $a_styles == 'normal_small' || $a_styles == ' normal_small_with_sb'){
                                            if ( $format != 'link' && $format != 'quote') {
                                                echo '<p class="link"><a href="'.get_permalink().'">Read More </a></p>';
                                            }
                                            
                                        }
                                        
                                    ?>

                                                       
                                </div>

                            <?php
                                if($a_styles != 'normal' && $a_styles != 'normal_with_sb' && $a_styles != 'normal_small' && $a_styles != 'normal_small_with_sb'){
                                    if ($format == 'link') {
                                        if (!empty($pix_link)) {
                                            echo '</a>';
                                        }
                                    }									
    							}
                            ?>

                            
                            <?php if($format != 'quote' && $format != 'link'){
                                if($a_styles == 'timeline'){
                                    echo $meta;
                                }
                            } ?>

                        </div>  
        
                        <?php // comments_template(); // uncomment if you want to use them ?>
        
                    </article>

                    <?php if($a_styles == 'timeline'){ 
                        echo '<div class="sep"></div>';
                    } ?>

                </div>


                <?php endwhile; ?>

                    

            <?php else : ?>
            

            <?php endif;
            
        if($a_styles == 'masonry_with_sb' || $a_styles == 'grid_with_sb'){
         //   echo '</div>';
         }    
            
        
        if($a_styles == 'timeline'){ 
            echo '</div>';
        }
              
			

        if($a_styles != 'grid' && $a_styles != 'masonry' && $a_styles != 'timeline'){
            echo '</div>';
        }

        if($sb == 'yes' && $select_sidebar == 'right'){
            echo '<div class="col-md-3 sidebar">';
        
            if ( is_active_sidebar( $sidebar_name ) ) {
            
                dynamic_sidebar( $sidebar_name );

            }    

            else{
                echo '<p>'.__("Please activate some Widgets Or disable it from theme option", "pixel8es").'</p>';
            }
            echo '</div>';
        }

        

    if($a_styles != 'timeline'){
        echo '</div>';
    }
    ?>  
    
          

<?php if ($a_styles == 'grid' || $a_styles == 'masonry' || $a_styles == 'masonry_with_sb' || $a_styles == 'grid_with_sb'){
echo '</div>';
}

 ?>
 
<?php if ( function_exists( 'pixel8es_page_navi' ) ) { ?>
        <?php echo pixel8es_page_navi(); 
 } else { ?>
        <nav class="wp-prev-next ">
                <ul class="clearfix">
                    <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'pixel8es' )) ?></li>
                    <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'pixel8es' )) ?></li>
                </ul>
        </nav>
<?php } ?> 

</div>


</div>

<?php get_footer(); ?>
