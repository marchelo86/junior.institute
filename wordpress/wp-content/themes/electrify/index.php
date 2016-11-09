<?php get_header();
    
    //Set Empty Value
    $post_icon_bg = $con_class = $content_class = $isotope_class = $sb = $isotope_sb_class = $meta = $animate_class = $slideTransition = $slideDuration = $b_delay ='';

    //Get Theme Option Value
    global $smof_data;

    $sidebar_name = isset($smof_data['b_select_sidebar'])? $smof_data['b_select_sidebar'] : '';
    $select_sidebar = isset($smof_data['b_sidebar'])? $smof_data['b_sidebar'] : 'right'; //left, right, no_sidebar
    


    $blog_style = isset($smof_data['b_styles'])? $smof_data['b_styles'] : 'masonry'; //timeline, masonry, masonry_with_sb, grid, grid_with_sb, normal, normal_with_sb, normal_small, normal_small_with_sb


    $limit = isset($smof_data['b_limit'])? $smof_data['b_limit'] : '200';
    $b_meta = isset($smof_data['b_meta'])? $smof_data['b_meta'] : 1 ;
    $b_r_slider = isset($smof_data['b_r_slider'])? $smof_data['b_r_slider'] : '' ;
    $b_l_slider = isset($smof_data['b_l_slider'])? $smof_data['b_l_slider'] : '' ;
    $b_title = isset($smof_data['b_title'])? $smof_data['b_title'] : "Blog" ;
    $b_post_icon = isset($smof_data['b_post_icon'])? $smof_data['b_post_icon'] : 1;
    $b_post_icon_style = isset($smof_data['b_post_icon_style'])? $smof_data['b_post_icon_style'] : 'round';


    //Animation
    $b_animate = isset($smof_data['b_animate'])? $smof_data['b_animate'] : 1;
    $b_transition = isset($smof_data['b_transition'])? $smof_data['b_transition'] : 'fadeInUp';
    $b_duration = isset($smof_data['b_duration'])? $smof_data['b_duration'] : '500ms';
    
    //Sub Header Options
    $pix_header_text = isset($smof_data['b_sub_header_text'])? $smof_data['b_sub_header_text'] : 'left';    
    $header_size = isset($smof_data['b_sub_header_size'])? $smof_data['b_sub_header_size'] : 'small';
    $pix_header_styles = isset($smof_data['b_sub_header_bg_style'])? $smof_data['b_sub_header_bg_style'] : 'color';
    $header_bg_image = isset($smof_data['b_sub_header_bg_img'])? $smof_data['b_sub_header_bg_img'] : '';
    $header_bg_color = isset($smof_data['b_sub_header_bg_color'])? $smof_data['b_sub_header_bg_color'] : '#f1f2f2';
    $header_text_color = isset($smof_data['b_sub_header_text_color'])? $smof_data['b_sub_header_text_color'] : '';
    $display_header = isset($smof_data['b_sub_header'])? $smof_data['b_sub_header'] : 1;
    $hide_breadcrumbs = isset($hide_breadcrumbs) ? $hide_breadcrumbs : 'show';

    $with_sidebar = '';
    $sub_header_class = ' ';
    $sub_header_class .= isset($smof_data['header_option']) ? 'content-'.$smof_data['header_option'] : 'header1';

    $header_trans = isset($smof_data['header_transparency']) ? $smof_data['header_transparency'] : 0;

    if($header_trans){
        $sub_header_class .= ' sub-header-trans';
    }
    
    //Make Default Value
    if($b_title == '') {
        $b_title = 'Blog';
    }

    if($sidebar_name == '0') {
        $sidebar_name = 'blog-sidebar';
    }
    
    if($b_post_icon_style == 'square'){
        $b_post_icon_style = '';
    }                      
                           

    if($blog_style == 'timeline'){
        $con_class = 'timeline';
        $width = 730;
        $height = 300;
    }
    
    if($blog_style == 'masonry' || $blog_style == 'masonry_with_sb' || $blog_style == 'grid' || $blog_style == 'grid_with_sb'){
        if($blog_style != 'grid'){
            $con_class = 'masonry';            
        }
        $content_class = 'element col-md-4';
        $post_icon_bg = '<div class="bg '.$b_post_icon_style.'"></div>';
        $width = 398;
        $height = 275;

        
        if($blog_style == 'masonry_with_sb'){
            $isotope_sb_class = 'isotopeCon row';
            $with_sidebar = ' pix-with-sidebar'; 
        }
        elseif($blog_style == 'grid_with_sb'){
            $isotope_sb_class = 'row';
            $con_class = 'masonry grid';
            $with_sidebar = ' pix-with-sidebar'; 
        }
        elseif($blog_style == 'grid' || $blog_style == 'grid_with_sb'){
            $con_class = 'masonry grid';
        }
        elseif($blog_style == 'masonry' || $blog_style == 'grid'){            
            $isotope_class = 'isotopeCon row'; 
        }
        
    }
    
    if( $blog_style == 'normal_with_sb'  || $blog_style == 'normal_small_with_sb' || $blog_style == 'masonry_with_sb' || $blog_style == 'grid_with_sb'){

        $columns = 'col-md-9';
        $sb = 'yes';

        if($select_sidebar == 'no_sidebar'){
            $columns = 'col-md-12';
        }
    }
    

    if($blog_style == 'normal' || $blog_style == 'normal_small'){
        $columns = 'col-md-12';
        if($blog_style == 'normal'){
            $width = 1140;
            $height = 350;
            $con_class = 'normal';
        
        }
        else{
            $width = 398;
            $height = 275;
            $con_class = 'normal normal_small';
            
        }
        
       
    }

    if($blog_style == 'normal_with_sb'  || $blog_style == 'normal_small_with_sb'){
        $width = 848;
        $height = 300;
        
        if($blog_style == 'normal_with_sb'){
            $con_class = 'normal normal_with_sb';
        }
        else{
            $con_class = 'normal normal_small';
        }
        if( $blog_style == 'normal_small_with_sb' ){
            $width = 398;
            $height = 275;
        }
    }

    if($display_header){
        subBanner($b_title);
    }
    
?>

<?php

//Revolution Slider

if($b_r_slider != ''){
    echo do_shortcode( '[rev_slider '.$b_r_slider.']' );
}

//Layer Slider
if($b_l_slider != ''){
    echo do_shortcode( '[layerslider id="'.$b_l_slider.'"]' );
}

?>

<div class="<?php echo $con_class; ?> container boxed">



<?php if ($blog_style == 'masonry' || $blog_style == 'masonry_with_sb'){
    echo '<div class="'.$isotope_class.''. $with_sidebar .'">';
}


    
    if($blog_style != 'timeline'){
        echo '<div class="row">';
    }

    if($sb == 'yes' && $select_sidebar == 'left'){
        echo '<div class="col-md-3 sidebar">';
        
        if ( is_active_sidebar( $sidebar_name ) ) {
            
            dynamic_sidebar( $sidebar_name );

        }    

        else{
            echo '<p>'.__("ТОВ \"Приватний навчальний заклад\"Міжнародний Інститут Сучасних Знань\"", "pixel8es").'</p>';
        }
        echo '</div>';
    }
                    

    if($blog_style != 'grid' && $blog_style != 'masonry' && $blog_style != 'timeline'){
        echo '<div class="'.$columns.'">
        <div class="' .$isotope_sb_class.'">';
    }
    ?>
    
    <?php
        if($blog_style == 'timeline' || $blog_style == 'masonry_with_sb'){ 
            echo '<div class="clear">';
        }
         
         
                $j=3; $k=1;

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

                    $format = get_post_format();

                    if($format == ''){
                        $format = 'standard';
                    }

                    $title = '<h2 class="title"><a href="'.get_permalink().'" rel="bookmark" >'.get_the_title().'</a></h2>';

                    if($blog_style == 'grid' || $blog_style == 'grid_with_sb'){
                        
                        if($blog_style == 'grid'){
                            if($format == 'audio' && (!empty($pix_audio) || !empty($pix_aud_iframe) || !empty($pix_aud_playlist))){
                               $limit = '580'; 
                            }

                            if($format == 'audio' && (empty($pix_audio) && empty($pix_aud_iframe) && empty($pix_aud_playlist))){
                               $limit = '200'; 
                            }

                            if($format != 'audio'){
                                $limit = '200';
                            }
                        }

                        else{
                            if($format == 'audio' && (!empty($pix_audio) || !empty($pix_aud_iframe) || !empty($pix_aud_playlist))){
                               $limit = '300'; 
                            }

                            if($format == 'audio' && (empty($pix_audio) && empty($pix_aud_iframe) && empty($pix_aud_playlist))){
                               $limit = '130'; 
                            }

                            if($format != 'audio'){
                                $limit = '130';
                            }
                        }
                        
                    }

                    
                    

                    $content = strip_shortcodes(ShortenText(get_the_excerpt(),$limit));
                    $stripped_content = strip_tags($content);

                    

                    $readmore = '';

                    if($blog_style == 'timeline'){
                        $readmore = '<p class="pull-right link"><a href="'.get_permalink().'">Read More</a></p>';
                    }
                    if($b_meta){
                        $category = get_the_category();

                    $first_cat =  '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'pixel8es'), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';

                        $meta = '<div class="byline vcard clearfix">
                                    <p class="pull-left category">';

                            if($blog_style != 'grid' && $blog_style != 'grid_with_sb' && $blog_style != 'masonry' && $blog_style != 'masonry_with_sb'){

                                $meta .= sprintf( __( '<span class="tag"><i class="pixicon pixicon-eleganticons-217"></i> %1$s </span>', 'pixel8es' ),get_the_category_list(', '));    
                            }

                            else{
                                $meta .= '<span class="tag"><i class="pixicon pixicon-eleganticons-217"></i>'.$first_cat.'</span>';   
                            }
                        


                        
                        if ('open' == $post->comment_status){     
                            $meta .= '<span class="pix-blog-comments"><i class="pixicon pixicon-eleganticons-196"></i>'. get_comments_popup_link(__('No Comments','pixel8es'), __('1 Comment','pixel8es'), __('% Comments','pixel8es'), __('comments-link','pixel8es'), '') .'</span>';
                        }
                                            
                        $meta .= '</p>'.$readmore.'
                                </div>';

                    }

                    

                    ?>
                    
                    <?php

                        if($b_animate && $blog_style != 'masonry' && $blog_style != 'masonry_with_sb'){

                            $animate_class = ' pix-animate-cre';

                            $slideTransition = isset($b_transition) ? ' data-trans="'. esc_attr($b_transition) .'"' : '';

                            $slideDuration = isset($b_duration) ? ' data-duration="'. $b_duration .'"' : '';

                            $b_delay = '200';

                            $slideDelay = 'data-delay="'. $b_delay .'"';

                            if($blog_style == 'grid' || $blog_style == 'grid_with_sb'){
                                $l = $j % 3;
                                $b_delay = 300 * $l .'ms';
                                $slideDelay = 'data-delay="'. $b_delay .'"';
                            }
                        }

                        if($blog_style == 'masonry' || $blog_style == 'masonry_with_sb' ){

                            $animate_class = $slideTransition = $slideDuration = $slideDelay = '';
                        }

                        
                    ?>

                   

                    <div <?php echo 'class = "blog-container ' . $content_class .' '. esc_attr($animate_class) .'"' . $slideTransition.' '.$slideDuration.' '.$slideDelay; ?> >

                        <?php if($blog_style == 'timeline'){ ?>

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
                            
                            if ( $format == 'standard' || $format == 'image' || $format == 'link' || $format == 'quote') {
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

                                //print_r($images_gallery);

                                if($pix_img_autoslide == 'true' || is_numeric($pix_img_autoslide)){
                                    $autoslide = 'data-auto-play="'.$pix_img_autoslide.'"';
                                }
                                elseif($pix_img_autoslide == 'false'){
                                    $autoslide = '';
                                }
                                else{
                                    $autoslide = 'data-auto-play= "5000"';
                                }
                                if(!empty($images_gallery)){
                                    

                                    if($blog_style != 'grid' && $blog_style != 'grid_with_sb'){
                                        echo '<div class="blog-img-left pix-post-gallery owl-carousel" data-navigation="true" data-stop-on-hover="true" data-single-item="true" data-auto-height="true" data-pagination="false" '.$autoslide.' data-transition-style="fade">';
                                            foreach($images_gallery as $src){

                                                //echo $src['itemId'];
                                                $image_thumb_url = wp_get_attachment_image_src( $src['itemId'], 'full');

                                                //$images_gallery = $images_gallery[0]['full'];
                                                $img = aq_resize($image_thumb_url[0], $width, $height, true, true);
                                                if(!$img){
                                                    $img = $image_thumb_url[0];    
                                                }
                                                echo '<div class="blog-img blog-img-left"><a href="'. $src['full'] .'" class="popup-gallery lightbox"><div class="popup"><i class="pixicon-eleganticons-52"></i></div></a><img src="'.$img.'" alt=""></div>';
                                            }
                                        echo '</div>';
                                    }

                                    else{
                                        $img = aq_resize($images_gallery[0]['full'], $width, $height, true, true);
                                            if(!$img){
                                                $img = $images_gallery[0]['full'];    
                                            }
                                            echo '<div class="blog-img blog-img-left"><a href="'. $images_gallery[0]['full'] .'" class="popup-gallery lightbox"><div class="popup"><i class="pixicon-eleganticons-52"></i></div></a><img src="'.$img.'" alt=""></div>';
                                    }
                                    
                                }
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
                                            $vid_sc .= 'autoplay = "autoplay" ';
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
                                if($blog_style == 'grid' || $blog_style == 'grid_with_sb'){
                                    if(empty($pix_vid_url) && empty($pix_vid_iframe) && empty($pix_vid_playlist)){
                                        echo '<div><img src = "'.get_template_directory_uri().'/library/images/grid_no_vid.png"></div>';
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
                                            $aud_sc .= 'autoplay = "autoplay" ';
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

                                if($blog_style == 'grid' || $blog_style == 'grid_with_sb'){
                                    if(empty($pix_audio) && empty($pix_aud_iframe) && empty($pix_aud_playlist)){
                                        echo '<div><img src = "'.get_template_directory_uri().'/library/images/grid_no_aud.png"></div>';
                                    }
                                }
                                
                            }    
                        ?>
                         
                        
                        <div class="post-content">

                            <?php
                                if($blog_style != 'normal' && $blog_style != 'normal_with_sb' && $blog_style != 'normal_small' && $blog_style != 'normal_small_with_sb'){
                                    if ($format == 'link') {
                                        if (!empty($pix_link)) {
                                            echo '<a href="'.$pix_link.'">';
                                        }
                                    }                                   
                                }
                                 
                            ?>
                            
                                <div class="entry-content pix-blog-<?php echo $format; ?> clearfix">
                                    <?php

                                    if($blog_style != 'normal_small' && $blog_style != 'normal_small_with_sb'){
                                        echo '<div class="heading">';
                                        if ($format != 'link') {
                                            echo $title;
                                        }
                                        
                                        if($blog_style != 'normal' && $blog_style != 'normal_with_sb'){
                                            if ($format == 'link') {
                                                echo '<h2 class="title">'.get_the_title().'</h2>';
                                            }
                                        }
                                        
                                        if($blog_style == 'normal' || $blog_style == 'normal_with_sb'){
                                            if ($format == 'link') {
                                                echo $title;
                                            }
                                        }    
                                    
                                        if($blog_style != 'timeline'){
                                            if($format != 'quote' && $format != 'link'){
                                                echo $meta;
                                            }
                                        }
                                        echo '</div>';
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
                                        }
                                        elseif ( $format == 'standard') {
                                            $post_icon = 'pencil';
                                        }

                                        if($b_post_icon){
                                            echo '<div class="icon-box '.$b_post_icon_style.'"><i class="pixicon-'.$post_icon.'"></i></div>'.$post_icon_bg;
                                        }

                                        if ( $format == 'quote') {
                                            if($blog_style != 'normal_small' && $blog_style != 'normal_small_with_sb'){

                                                echo '<p><span class="quote-left"></span>'.$stripped_content.'<span class="quote-right"></span>';
                                            
                                                    if(!empty($pix_quote_author)){
                                                        echo '<span class="quote-author">'.$pix_quote_author.'</span>';
                                                    }
                                            
                                                echo '</p>';  
                                            }                                        
                                        }
                                        
                                        
                                        
                                        if($blog_style == 'normal_small' || $blog_style == 'normal_small_with_sb'){
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

                                            if($blog_style == 'normal' || $blog_style == 'normal_with_sb' || $blog_style == 'normal_small' || $blog_style == 'normal_small_with_sb'){
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

                                        if($blog_style == 'normal' || $blog_style == 'normal_with_sb' || $blog_style == 'normal_small' || $blog_style == ' normal_small_with_sb'){
                                            if ( $format != 'link' && $format != 'quote') {
                                                echo '<p class="link"><a href="'.get_permalink().'">Read More </a></p>';
                                            }
                                            
                                        }
                                        
                                    ?>

                                                       
                                </div>

                            <?php
                                if($blog_style != 'normal' && $blog_style != 'normal_with_sb' && $blog_style != 'normal_small' && $blog_style != 'normal_small_with_sb'){
                                    if ($format == 'link') {
                                        if (!empty($pix_link)) {
                                            echo '</a>';
                                        }
                                    }                                   
                                }
                            ?>

                            
                            <?php if($format != 'quote' && $format != 'link'){
                                if($blog_style == 'timeline'){
                                    echo $meta;
                                }
                            } ?>

                        </div>  
        
                        <?php // comments_template(); // uncomment if you want to use them ?>
        
                    </article>

                    <?php if($blog_style == 'timeline'){ 
                        echo '<div class="sep"></div>';
                    } ?>

                </div>


                <?php $j++; $k++; endwhile; ?>

                    

            <?php else : ?>
            

            <?php endif;
            
            
            
        
        if($blog_style == 'timeline' || $blog_style == 'masonry_with_sb'){ 
            echo '</div>';
        }
              
            

        if($blog_style != 'grid' && $blog_style != 'masonry' && $blog_style != 'timeline'){
            echo '</div>';

            if ( function_exists( 'pixel8es_page_navi' ) ) {
                echo pixel8es_page_navi(); 
            }
            else { 
                echo '<nav class="wp-prev-next ">
                        <ul class="clearfix">
                            <li class="prev-link">'.next_posts_link( __( '&laquo; Older Entries', 'pixel8es' )).'</li>
                            <li class="next-link">'.previous_posts_link( __( 'Newer Entries &raquo;', 'pixel8es' )).'</li>
                        </ul>
                </nav>';
            } 

            echo '</div>';
        }

        if($sb == 'yes' && $select_sidebar == 'right'){
            echo '<div class="col-md-3 sidebar">';
        
            if ( is_active_sidebar( $sidebar_name ) ) {
            
                dynamic_sidebar( $sidebar_name );

            }    

            else{
                echo '<p>'.__("ТОВ \"Приватний навчальний заклад\"Міжнародний Інститут Сучасних Знань\"", "pixel8es").'</p>';
            }
            echo '</div>';
        }

        

    if($blog_style != 'timeline'){
        echo '</div>';
    }
    ?>  
    
          

<?php if ($blog_style == 'masonry' || $blog_style == 'masonry_with_sb'){
echo '</div>';
}

?>


 
<?php
    if($blog_style == 'grid' || $blog_style == 'masonry' || $blog_style == 'timeline'){

        if ( function_exists( 'pixel8es_page_navi' ) ) {
            echo pixel8es_page_navi(); 
        }
        else { 
            echo '<nav class="wp-prev-next ">
                    <ul class="clearfix">
                        <li class="prev-link">'.next_posts_link( __( '&laquo; Older Entries', 'pixel8es' )).'</li>
                        <li class="next-link">'.previous_posts_link( __( 'Newer Entries &raquo;', 'pixel8es' )).'</li>
                    </ul>
            </nav>';
        }
    }

?>

</div>



<?php get_footer(); ?>