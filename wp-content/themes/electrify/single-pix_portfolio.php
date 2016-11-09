<?php get_header();
    global $smof_data;
    //Get Values from Theme Options
    $sp_next_arrow = isset($smof_data['sp_next_arrow'])? $smof_data['sp_next_arrow'] : '6';
    $single_portfolio_banner = isset($smof_data['single_portfolio_banner']) ? $smof_data['single_portfolio_banner'] : 1;
?>
<!-- Page Content -->
<?php if (have_posts()) : while (have_posts()) : the_post(); 

    if($single_portfolio_banner == 1){
        subBanner(get_the_title());
    }

    $post_details = get_post_meta(get_the_id(),'electrify_single_portfolio_options');
    if( !empty($post_details)){
        extract($post_details[0]);
    }
    $project_url = isset($project_url) ? $project_url : '';
    $author_name = isset($author_name) ? $author_name : '';
    $pix_images = isset($pix_images)? $pix_images : '';
    $pix_img_autoslide = isset($pix_img_autoslide)? $pix_img_autoslide : '';
    $pix_show_social = isset($pix_show_social)? $pix_show_social : 'yes';
    $pix_show_like = isset($pix_show_like)? $pix_show_like : 'yes';
    $pix_portfolio_text = isset($pix_portfolio_text)? $pix_portfolio_text : 'Launch Project';
    $pix_show_button = isset($pix_show_button)? $pix_show_button : 'yes';
    $pix_button_target = isset($pix_button_target)? $pix_button_target : '_blank';
    $portfolio_layout = isset($portfolio_layout) ? $portfolio_layout : "full";


    if($pix_img_autoslide == 'true' || is_numeric($pix_img_autoslide)){
        $autoslide = 'data-auto-play="'.$pix_img_autoslide.'"';
    }
    elseif($pix_img_autoslide == 'false' || $pix_img_autoslide == ''){
        $autoslide = '';
    }
    else{
        $autoslide = 'data-auto-play= "5000"';
    }
?>
<div role="main" id="main-content" class="center">
    <?php $post_id = get_the_id(); ?>
    <!-- Single Portfolio -->
    <section <?php post_class('container boxed') ?> id="post-<?php the_ID(); ?>">

        <div class="single-portfolio-item <?php  echo ($portfolio_layout == 'right') ? 'row' : ''; ?>">
            
            <?php
                $pix_images_gallery = htmlspecialchars_decode($pix_images);
                $images_gallery = json_decode($pix_images_gallery,true);
                $first_img = '';
                if($portfolio_layout == "right"){
                    echo '<div class="col-md-8">';
                    $width = 770;
                    $height = 525;
                }else{
                    $width = 1140;
                    $height = 500;
                }               

            ?>

                <?php if(!empty($images_gallery)){ ?>

                    <div class="portfolio-img pix-post-gallery owl-carousel" data-navigation="true" data-single-item="true" data-auto-height="true" data-pagination="false" <?php echo $autoslide; ?> data-transition-style="fade">

                        <?php                    

                            if($pix_img_autoslide == 'true' || is_numeric($pix_img_autoslide)){
                                $autoslide = 'data-auto-play="'.$pix_img_autoslide.'"';
                            }
                            elseif($pix_img_autoslide == 'false'){
                                $autoslide = '';
                            }
                            else{
                                $autoslide = 'data-auto-play= "5000"';
                            }
                                              
                            foreach($images_gallery as $src){
                                $i = 0;
                                $img = aq_resize($src['full'], $width, $height, true, true);
                                if(!$img){
                                    $img = $src['full'];    
                                }
                                if($i == 0){
                                    $first_img = $img;
                                }
                                echo '<div><img src="'.$img.'" alt=""></div>';
                                $i++;
                            }

                        ?>
                    </div>

                <?php } else{

                    echo '<div><img src="'. get_template_directory_uri(). '/library/images/single-portfolio-'. esc_attr($portfolio_layout) . '.gif" alt=""></div>';

                } 

            if($portfolio_layout == "right"){
                echo '</div>';
            }

            ?>

            
            <?php 
                if($portfolio_layout == "full"){
                    echo '<div class="single-portfolio-details row">';
                }
                else{ 
                    echo '<div class="single-portfolio-details col-md-4">';            
                  }		

                    $terms = get_the_term_list($post->ID,'pix_categories',' ',', ');
                    if(!empty($terms) ) { 
                        $terms = "<li><strong>Categories:</strong> " . strip_tags($terms) . "</li>";
                    }

                    if($portfolio_layout == "full"){
                        $pix_col_class = (empty($pix_skills) && empty($pix_task) && empty($pix_client_name) && empty($terms)) ? 'col-md-12' : 'col-md-9 clearfix';
                    }
                    else{
                        $pix_col_class = 'portfolio-layout-right';
                    }

            ?>

        			<div class="<?php echo $pix_col_class; ?>">
                                
                        <header class="title-header">
                            <h2 class="title"><?php the_title() ?></h2>
                            
                            <?php 
                                echo  (!empty($author_name) ? '<p class="author"><em>' .__('By','pixel8es').'</em> <em class="base-color">'. $author_name .'</em></p>' : ''); 
                            ?>                    
                        </header>

                        <?php the_content(); ?>
    			

                        <?php
                            if($portfolio_layout == "full"){  ?>                  

                                <?php if(!empty($project_url)){ ?>                                
                                    <a href="<?php echo esc_url($project_url);?>" title="" target="<?php echo $pix_button_target ?>" class="clear btn btn-outline single-portfolio-btn btn-md color"><?php if(empty($pix_portfolio_text)){ _e('Launch Project','pixel8es'); } else{ echo $pix_portfolio_text ; } ?></a>
                                <?php } ?>

                                <?php
                                    if($pix_show_like == 'yes'){
                                        $like_count = get_post_meta( $post->ID, '_pix_like_me', true );
                                        $like_class = ( isset($_COOKIE['pix_like_me_'. $post->ID])) ? 'liked' : '';

                                        if($like_count == ''){
                                            $like_count = 0;
                                        }

                                        echo '<a href="#void" class="single-port-like pix-like-me '. $like_class .'" data-id="'. $post->ID .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span><span class="already-liked">'. __('You already liked this!','pixel8es') .'</span></a>';

                                    }
                                

                                if($pix_show_social == 'yes'){                            

                                    $social = '<div class="portfolio-icons"><div class="port-icon-hover share-btn"><div class="share-top"><i class="pixicon-share"></i></div><div class="port-share-btn">';

                                    $social .= '<a href="http://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $first_img .'"><i class="pixicon-pinterest"></i></a>';

                                    $social .= '<a href="https://plus.google.com/share?url='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-244"></i></a>';                                

                                    $social .= '<a href="http://twitter.com/share?url='. get_permalink() .'&amp;text=Check out this Project '. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-242"></i></a>';

                                    $social .= '<a href="http://www.facebook.com/sharer.php?u='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-241"></i></a>';

                                    $social .= '</div></div></div>';


                                    echo $social;                        

                                }

                                if($sp_next_arrow){
                                    echo '<div class="pull-right single-port-nav">';
                                        previous_post_link( '%link', '<span class="pixicon-eleganticons-19"></span>', false );
                                        next_post_link( '%link', '<span class="pixicon-eleganticons-20"></span>', false );
                                    echo '</div>'; 
                                }

                                

                            }
                        ?>
                    </div>

        	<?php
                if(!empty($pix_skills) || !empty($pix_task) || !empty($pix_client_name) || !empty($terms)){

                    $pix_skills = (isset($pix_skills) && !empty($pix_skills)) ? "<li><strong>Skills:</strong> ". $pix_skills . "</li>" : '';

                    $pix_task = (isset($pix_task) && !empty($pix_task)) ? "<li><strong>Tasks:</strong> ".$pix_task . "</li>" : '';
                    
                    $pix_client_name = (isset($pix_client_name)) && !empty($pix_client_name) ?  "<li><strong>Client:</strong> ". $pix_client_name . "</li>" : '';

                    echo '<div class="'. (($portfolio_layout == "right") ? 'portfolio-layout-right-bottom' : 'col-md-3') .'">';
                    
                        echo '<h2 class="title">'. __('Details', 'pixel8es') .'</h2>';
                        echo '<ul>';
                            echo $pix_client_name . $pix_task . $pix_skills . $terms;
                        echo '</ul>';
                    echo '</div>';
                }
            ?>

            <?php

                if($portfolio_layout == "right"){
                    echo '<div>';
            ?>


                        <?php if(!empty($project_url)){ ?>
                                                        
                            <a href="<?php echo esc_url($project_url);?>" title="" target="<?php echo $pix_button_target ?>" class="clear btn btn-outline single-portfolio-btn btn-md color"><?php if(empty($pix_portfolio_text)){ _e('Launch Project','pixel8es'); } else{ echo $pix_portfolio_text ; } ?></a>
                        <?php } ?>

                        <?php
                            if($pix_show_like == 'yes'){
                                $like_count = get_post_meta( $post->ID, '_pix_like_me', true );
                                $like_class = ( isset($_COOKIE['pix_like_me_'. $post->ID])) ? 'liked' : '';

                                if($like_count == ''){
                                    $like_count = 0;
                                }

                                echo '<a href="#void" class="single-port-like pix-like-me '. $like_class .'" data-id="'. $post->ID .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span><span class="already-liked">'. __('You already liked this!','pixel8es') .'</span></a>';
                            }

                        

                            if($pix_show_social == 'yes'){

                                $social = '<div class="portfolio-icons"><div class="port-icon-hover share-btn"><div class="share-top"><i class="pixicon-share"></i></div><div class="port-share-btn">';

                                $social .= '<a href="http://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $first_img .'"><i class="pixicon-pinterest"></i></a>';

                                $social .= '<a href="https://plus.google.com/share?url='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-244"></i></a>';                                

                                $social .= '<a href="http://twitter.com/share?url='. get_permalink() .'&amp;text=Check out this Project '. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-242"></i></a>';

                                $social .= '<a href="http://www.facebook.com/sharer.php?u='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-241"></i></a>';

                                $social .= '</div></div></div>';


                                echo $social;

                            } 



                            if($sp_next_arrow){
                                echo '<div class="pull-left single-port-nav">';
                                    previous_post_link( '%link', '<span class="pixicon-eleganticons-19"></span>', false );
                                    next_post_link( '%link', '<span class="pixicon-eleganticons-20"></span>', false );
                                echo '</div>'; 
                            }

                    echo '</div>';

                }  
            ?>
            
                </div>
            </div>
        </div>
    </section>
<?php endwhile;?>
    
    
    <?php
	

        $port_terms= get_the_terms($post_id, 'pix_categories');

        $cats= array();

        if (!empty($port_terms)){

            foreach($port_terms as $term){
                $cats[] = $term->term_id;
            } 
            
            

            //Get Values from Theme Options
            $sp_related = isset($smof_data['sp_related'])? $smof_data['sp_related'] : 1;
            $project_related_project_count = isset($smof_data['sp_related_count'])? $smof_data['sp_related_count'] : '6';
            $project_related_project_title = isset($smof_data['sp_related_t'])? $smof_data['sp_related_t'] : 'Related Projects';
            $style = isset($smof_data['sp_related_style'])? $smof_data['sp_related_style'] : 'style1';

            //Default Values
            $title_tag = 'h3';
            $share= 'yes';
            $lightbox= 'yes';
            $like ='yes';
            $single_portfolio_link ='yes';
        
            $the_query = new WP_Query(
                array(
                    'post_type' => 'pix_portfolio',   
                    'posts_per_page' => $project_related_project_count,    
                    'post__not_in' => array($post_id),
                    'orderby' => 'rand',
                    'order' => 'ASC',
                    'tax_query' => array(                     
                        array(
                            'taxonomy' => 'pix_categories',
                            'terms' => $cats,                                   
                        )
                    )
                )
            );
            if($the_query->have_posts()) : ?>

                <?php if($sp_related){ ?>
                    <!-- Related Projects -->
                    <div class="container">
                        <section>
                    
                            <?php echo '<'. $title_tag .' class="main-title title size-sm alignCenter borderLine">';
                                 if(empty($project_related_project_title)){ 
                                    __('Related Projects','pixel8es'); 
                                } 
                                else{ 
                                    echo $project_related_project_title ; 
                                    } 
                                echo '<span class="line"></span>';
                                echo '</'. $title_tag .'>';
                            ?>
                        
                            <div class="single portfolio-related-items owl-carousel" <?php echo 'data-navigation="false" data-pagination="true" data-items="4" data-items-desktop="[1199,4]" data-items-desktop-small="[991,2]" data-items-tablet="[768,1]"' ?>> 
                        
                                <?php

                                    while ($the_query->have_posts()) : $the_query->the_post();
                                    
                                        $temp_title = get_the_title($the_query->post->ID); //title
                                        $temp_content = ShortenText(get_the_content($the_query->post->ID), 120); //content
                                        $temp_link = get_permalink($the_query->post->ID); //permalink
                                        $like_count = get_post_meta( $the_query->post->ID, '_pix_like_me', true );
                                        $like_class = ( isset($_COOKIE['pix_like_me_'. $the_query->post->ID])) ? 'liked' : '';

                                        if($like_count == ''){
                                            $like_count = 0;
                                        }

                                        $output = $img = '';

                                        //Get Porfolio Image
                                        $pix_images= '';
                                        $post_details = get_post_meta(get_the_id(),'electrify_single_portfolio_options');
                                        if( !empty($post_details)){
                                            extract($post_details[0]);
                                        }

                                        $pix_images_gallery = htmlspecialchars_decode($pix_images);
                                        $images_gallery = json_decode($pix_images_gallery,true);

                                        if(!empty($images_gallery)){
                                            $img = aq_resize($images_gallery[0]['full'], 285, 220, true, true);
                                            if(!$img){
                                                $img = $images_gallery[0]['full'];
                                            }
                                            $temp_thumb = "<img src='$img' alt=''>";
                                        }else{
                                            $temp_thumb = '<img src="'. get_template_directory_uri() .'/library/images/portfolio-related-fallback.gif" alt="">';
                                        }

                                    
                                        $output .= '<div class="pix-portfolio-item '. esc_attr($style) .'">';                

                                            $output .= '<div class="portfolio-container">'; //portfolio Container

                                                //portfolio Image
                                                $output .= '<div class="portfolio-img">
                                                                '.$temp_thumb.'
                                                            </div>';

                                                            
                                                $output .=  '<div class="portfolio-hover">';

                                                    if($style == 'style3'){
                                                        $output .= '<div class="portfolio-icons">'; //portfolio Container

                                                            //Lightbox icon
                                                            if($lightbox == 'yes' && !empty($image_thumb_url)){
                                                                $output .= '<div class="port-icon-hover"><a href="'. $image_thumb_url[0] .'" class="portfolio-icon popup-gallery"><i class="pixicon-eleganticons-52"></i></a></div>';
                                                            }

                                                            //Like Button Icon
                                                            if($like == 'yes'){
                                                                $output .= '<div class="port-icon-hover"><a href="#void" class="portfolio-icon pix-like-me '. $like_class .'" data-id="'. $the_query->post->ID .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span></a></div>';
                                                            }

                                                            //Permalink Icon
                                                            if($single_portfolio_link == 'yes'){
                                                                $output .= '<div class="port-icon-hover"><a href="'. get_permalink() .'" class="portfolio-icon"><i class="pixicon-eleganticons-3"></i></a></div>';
                                                            }

                                                        $output .= '</div>'; //End of portfolio icons
                                                    }

                                                    //portfolio Name and content
                                                    if($style == 'style1' && $single_portfolio_link == 'yes'){
                                                        $output .= '<a href="'.$temp_link.'" class="portfolio-link" >';
                                                    }

                                                        $output .= '<div class="portfolio-content">'; //portfolio Container

                                                            //Author name
                                                            if( $single_portfolio_link == 'yes' && $style != 'style1' ){
                                                                $output .= '<'. $title_tag .' class="title"><a href="'.$temp_link.'" class="portfolio-link">'.esc_html($temp_title).'</a></'. $title_tag .'>'; 
                                                            }else{
                                                                $output .= '<'. $title_tag .' class="title">'.esc_html($temp_title).'</'. $title_tag .'>'; //title
                                                            }
                                                        
                                                            //seperator 
                                                            if($style == 'style2'){
                                                                $output .= "<div class='line'></div>"; 
                                                            }

                                                            //content
                                                            if($style == 'style1' || $style == 'style2'){           
                                                                $output .= '<p>'.esc_textarea($temp_content).'</p>';
                                                            }

                                                        $output .= '</div>'; //End of portfolio Content

                                                    if($style == 'style1'){
                                                        $output .= '</a>';
                                                    }

                                                    if($style == 'style2' || $style == 'style4' || $style == 'style5'){
                                                        $output .= '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container


                                                            if($share == 'yes'){
                                                                $output .= '<div class="port-icon-hover share-btn"><div class="share-top"><i class="pixicon-share"></i></div><div class="port-share-btn">';

                                                                    $output .= '<a href="http://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $temp_thumb .'"><i class="pixicon-pinterest"></i></a>';
                                                                
                                                                    $output .= '<a href="https://plus.google.com/share?url='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-244"></i></a>';                                
                                                                
                                                                    $output .= '<a href="http://twitter.com/share?url='. get_permalink() .'&amp;text=Check out this Project '. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-242"></i></a>';
                                                                
                                                                    $output .= '<a href="http://www.facebook.com/sharer.php?u='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-241"></i></a>';
                                                                                                
                                                                $output .= '</div></div>';
                                                            }

                                                            //Lightbox icon
                                                            if($lightbox == 'yes' && !empty($image_thumb_url)){
                                                                $output .= '<div class="port-icon-hover"><a href="'. $image_thumb_url[0] .'" class="portfolio-icon popup-gallery"><i class="pixicon-eleganticons-52"></i></a></div>';
                                                            }

                                                            //Like Button Icon
                                                            if($style != 'style4'){
                                                                if($like == 'yes'){
                                                                    $output .= '<div class="port-icon-hover"><a href="#void" class="portfolio-icon pix-like-me '.$like_class.'" data-id="'. $the_query->post->ID .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span></a></div>';
                                                                }
                                                            }

                                                            //Permalink Icon
                                                            if($single_portfolio_link == 'yes'){
                                                                $output .= '<div class="port-icon-hover"><a href="'. get_permalink() .'" class="portfolio-icon"><i class="pixicon-eleganticons-3"></i></a></div>';
                                                            }

                                                        $output .= '</div></div>'; //End of portfolio icons
                                                    }

                                                    if($style == 'style6'){
                                                        $output .= '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio 

                                                        if($single_portfolio_link == 'yes'){
                                                            $output .= '<div class="port-icon-hover"><a href="#" class="portfolio-icon"><i class="pixicon-eleganticons-3"></i></a></div>';
                                                        }

                                                        $output .= '</div></div>'; //End of portfolio icons
                                                    }

                                                                    
                                                $output .=  '</div>'; //End of portfolio hover

                                            $output .= '</div>'; //End of portfolio Container

                                        $output .= '</div>'; //End of pix portfolio Item

                                    echo $output;

                                    endwhile;
                                ?>            

                            </div> <!-- /owl-carousel -->
                            
                        </section> <!-- /section -->

                    </div> <!-- /container -->

                <?php } ?>
            
            <?php  endif;           
        }	
    ?> 

</div> <!-- /#main-content -->
<?php endif; ?>
<?php get_footer(); ?>