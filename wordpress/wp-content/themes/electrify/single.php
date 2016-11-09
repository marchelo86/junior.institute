<?php get_header();

    //Set Empty Value
    $post_icon_bg = $meta = '';

    //Get Theme Option Value
    global $smof_data;

    $sidebar_name = isset($smof_data['s_select_sidebar'])? $smof_data['s_select_sidebar'] : '';
    $select_sidebar = isset($smof_data['s_sidebar'])? $smof_data['s_sidebar'] : 'right'; //left, right, no_sidebar
    $s_meta = isset($smof_data['s_meta'])? $smof_data['s_meta'] : 1 ;
    $s_post_icon = isset($smof_data['s_post_icon'])? $smof_data['s_post_icon'] : 1;
    $s_post_icon_style = isset($smof_data['s_post_icon_style'])? $smof_data['s_post_icon_style'] : 'round';
    $s_taglist = isset($smof_data['s_taglist'])? $smof_data['s_taglist'] : 0;
    $s_np_pagination = isset($smof_data['s_np_pagination'])? $smof_data['s_np_pagination'] : 0;
    $s_author = isset($smof_data['s_author']) ? $smof_data['s_author'] : 1;
    $s_author_img = isset($smof_data['s_author_img']) ? $smof_data['s_author_img'] : 1;
    $s_author_t = isset($smof_data['s_author_t']) ? $smof_data['s_author_t'] : __('About the Author','pixel8es');
    $s_related = isset($smof_data['s_related']) ? $smof_data['s_related'] : 1;
    $s_related_t = isset($smof_data['s_related_t']) ? $smof_data['s_related_t'] : __('Related Posts','pixel8es');
    $s_related_no = isset($smof_data['s_related_no']) ? $smof_data['s_related_no'] : '6';
    $s_related_orderby = isset($smof_data['s_related_orderby']) ? $smof_data['s_related_orderby'] : 'date';
    $s_related_order = isset($smof_data['s_related_order']) ? $smof_data['s_related_order'] : 'asc';
    $s_comment_template = isset($smof_data['s_comment_template']) ? $smof_data['s_comment_template'] : 1;

    //Sub Header Options
    $pix_header_text = isset($smof_data['s_sub_header_text'])? $smof_data['s_sub_header_text'] : 'left';    
    $header_size = isset($smof_data['s_sub_header_size'])? $smof_data['s_sub_header_size'] : 'small';
    $pix_header_styles = isset($smof_data['s_sub_header_bg_style'])? $smof_data['s_sub_header_bg_style'] : 'color';
    $header_bg_image = isset($smof_data['s_sub_header_bg_img'])? $smof_data['s_sub_header_bg_img'] : '';
    $header_bg_color = isset($smof_data['s_sub_header_bg_color'])? $smof_data['s_sub_header_bg_color'] : '#f1f2f2';
    $header_text_color = isset($smof_data['s_sub_header_text_color'])? $smof_data['s_sub_header_text_color'] : '';
    $display_header = isset($smof_data['s_sub_header'])? $smof_data['s_sub_header'] : 1;

    //Make Default Value
    if($sidebar_name == '0') {
        $sidebar_name = 'blog-sidebar';
    }
    
    if($s_post_icon_style == 'square'){
        $s_post_icon_style = '';
    }

    if(empty($s_author_t)){
        $s_author_t = __('About the Author','pixel8es');
    }

    if($select_sidebar == 'no_sidebar'){
            $columns = 'col-md-12';
    }
    else{
            $columns = 'col-md-9';
    }

    if($display_header){
        subBanner(get_the_title());
    }

?>
    <div class="container boxed">

        <?php

            $width = 848;
            $height = 300;
            

            
			
            if (have_posts()) : while (have_posts()) : the_post();

                $title = '<h2 class="title"><a href="'.get_permalink().'" rel="bookmark" >'.get_the_title().'</a></h2>';

                $post_details = get_post_meta(get_the_id(),'electrify_post_options');
                if( !empty($post_details)){
                    extract($post_details[0]);
                }
                $pix_images = isset($pix_images)? $pix_images : '';
                $pix_img_autoslide = isset($pix_img_autoslide)? $pix_img_autoslide : '5000';
                $pix_video_methods = isset($pix_video_methods) ? $pix_video_methods : '';
                $pix_vid_url = isset($pix_vid_url) ? $pix_vid_url : '';
                $pix_vid_poster = isset($pix_vid_poster) ? $pix_vid_poster : '';
                $pix_vid_autoplay = isset($pix_vid_autoplay) ? $pix_vid_autoplay : '';
                $pix_vid_preload = isset($pix_vid_preload) ? $pix_vid_preload : '';
                $pix_vid_iframe = isset($pix_vid_iframe) ? $pix_vid_iframe : '';
                $pix_vid_playlist = isset($pix_vid_playlist) ? $pix_vid_playlist : '';
                $pix_aud_methods = isset($pix_aud_methods) ? $pix_aud_methods : '';
                $pix_audio = isset($pix_audio) ? $pix_audio : '';
                $pix_aud_autoplay = isset($pix_aud_autoplay) ? $pix_aud_autoplay : '';
                $pix_aud_playlist = isset($pix_aud_playlist) ? $pix_aud_playlist : '';
                $pix_link = isset($pix_link) ? $pix_link : '';
                $pix_quote_author = isset($pix_quote_author) ? $pix_quote_author : '';


                if($s_meta){

                    $category = get_the_category_list(', ');
                    $taglist = get_the_tag_list('',' , ','');

                    $meta = '<div class="byline vcard clearfix">
                                <p class="pull-left category">
                                    '
                                    .sprintf( __( '<span class="tag"><i class="pixicon pixicon-eleganticons-217"></i> %1$s </span>', 'pixel8es' ),$category).'<span class="pix-blog-comments">'. get_comments_popup_link(__('<i class="pixicon pixicon-eleganticons-196"></i> No Comments','pixel8es'), __('<i class="pixicon pixicon-eleganticons-196"></i> 1 Comment','pixel8es'), __('<i class="pixicon pixicon-eleganticons-196"></i> % Comments','pixel8es'), __('comments-link','pixel8es'), '') .'</span>
                                    
                                </p>                                    
                    </div>';
                } 

        ?>

        <div class="row">

            <?php
                if($select_sidebar == 'left'){
                    echo '<div class="col-md-3 sidebar">';        
                    if ( is_active_sidebar( $sidebar_name  ) ) {            
                        dynamic_sidebar( $sidebar_name  );
                    }    

                    else{
                        echo '<p>'.__("Please activate some Widgets Or disable it from theme option", "pixel8es").'</p>';
                    }
                    echo '</div>';
                }

            ?>


            <div class="<?php echo $columns; ?>">	
                <div class="single-blog">
             	
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
    
                        <?php
                            $format = get_post_format();

                            if($format == ''){
                                $format ='standard';
                            }
                            
                            if ( $format == 'standard' || $format == 'image') {
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

                                    $image_thumb_url = wp_get_attachment_image_src( $src['itemId'], 'full');

                                    $img = aq_resize($image_thumb_url[0], $width, $height, true, true);
                                    if(!$img){
                                        $img = $image_thumb_url[0];    
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
                                        $vid_poster = $vid_poster[0]['full'];
                                        
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
                        

                             
                        <div class="post-content clearfix">

                            <?php
                                if ($format == 'link') {
                                    if (!empty($pix_link)) {
                                        echo '<a href="'.$pix_link.'">';
                                    }
                                } 
                            ?>
                            
                                <div class="entry-content pix-blog-<?php echo $format; ?> clearfix">
                                    <?php

                                        if ($format == 'gallery') {
                                            $post_icon = 'picture';
                                        }
                                        elseif ( $format == 'quote') {
                                            $post_icon = 'fontawesome-webfont-101';                                        
                                        }
                                        elseif ( $format == 'link') {
                                            $post_icon = 'link-1';
                                        }
                                        elseif ( $format == 'standard') {
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
                                        }else{
                                            $post_icon = 'pencil'; 
                                        }

                                        if($s_post_icon){
                                            echo '<div class="icon-box '.$s_post_icon_style.'"><i class="pixicon-'.$post_icon.'"></i></div>';
                                        }

                                        if ( $format == 'quote') {

                                            $content =  get_the_content();
                                            $stripped_content = strip_tags($content);                                     
                                                echo '<p><span class="quote-left"></span>'.$stripped_content.'<span class="quote-right"></span>';
                                            
                                                    if(!empty($pix_quote_author)){
                                                        echo '<span class="quote-author">'.$pix_quote_author.'</span>';
                                                    }
                                            
                                                echo '</p>';                                                                  
                                        }


                                        if ($format != 'quote') {
                                            echo '<div class="heading">';
                                            
                                                echo $title;
                                            
                                        
                                            
                                                if($format != 'link'){
                                                    echo $meta;
                                                }
                                            
                                            echo '</div>';
                                        }
                                                                             

                                        if($format != 'quote'){
                                            
                                            echo '<div class="content-blog">';
                                                the_content();
                                            if($s_taglist){
                                                echo '<p><strong>Tags: </strong>'.$taglist.'</p>';     
                                            }
                                            
                                            echo '</div>';
                                            

                                            if($format == 'link'){
                                                if(!empty($pix_link)){
                                                    echo '<p class="link-text">'.$pix_link.'</p>';
                                                }
                                            }
                                        }

                                    ?>
                                                           
                                </div>

                            <?php
                                if ($format == 'link') {
                                    if (!empty($pix_link)) {
                                        echo '</a>';
                                    }
                                } 
                            ?>                   
                            

                            <?php 
                            wp_link_pages('before=<p class="page-links">Pages: &after=</p>');

                            if($s_np_pagination){
                               echo '<div class="pull-right single-port-nav">';
                                previous_post_link( '%link', '<span class="pixicon-eleganticons-19"></span>', false );
                                next_post_link( '%link', '<span class="pixicon-eleganticons-20"></span>', false );
                                echo '</div>'; 
                            }
                            

                            if($s_author){

                                if($format != 'quote' && $format != 'link'){
        
                        ?>  

                        </div>      
                         
                                     
                            
                        

                                    <aside class="authorDetails clearfix">
                                    <h2 class="title"><?php echo $s_author_t; ?></h2>
                                    <div class="line"></div>
                                    <div class="author-details-content clearfix">
                                    <?php
                                        if($s_author_img) {
                                            echo '<div class="authorImage">'.get_avatar( get_the_author_meta('email'), 80).'</div>';
                                        }
                                    ?>
                                    <div class="details">
                                    <h3 class="authorName"><?php the_author_posts_link();?></h3>
                                    <p><?php the_author_meta('user_description');?></p>
                                    </div>
                                    </div>    
                                    </aside>

                        <?php 
                                }
                            }
                            if($s_related){
                                $firt_cat = get_the_category();
                                $first_cat =  $firt_cat[0]->name;
                                echo '<h2 class="title main-title alignCenter">'.$s_related_t.'<span class="line"></span></h2>';
                                echo do_shortcode( '[blog slider="yes" blog_desc="no" slide_arrow="false" no_of_items="'.$s_related_no.'" order_by="'.$s_related_orderby.'" order="'.$s_related_order.'" blog_post_category="'. $first_cat .'" insert_type="category"]' );

                                if($s_comment_template){
                                    comments_template();
                                }
                            }    


                        ?>
                   
    
                    </article>
             
                </div> 
                <?php 
                    wpb_set_post_views(get_the_ID());
                    endwhile;
                ?>

                <?php else : ?>
    			
                <?php endif; ?>
            </div>
        

            <?php

                if($select_sidebar == 'right'){
                    echo '<div class="col-md-3 sidebar">';

                    if ( is_active_sidebar( $sidebar_name  ) ) {
                        dynamic_sidebar( $sidebar_name  );
                    }    

                    else{
                        echo '<p>'.__("Please activate some Widgets Or disable it from theme option", "pixel8es").'</p>';
                    }
                echo '</div>';
                }
            ?>
        </div>
    </div>
<?php get_footer(); ?>
