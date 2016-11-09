<?php 
/*
	Template Name: Portfolio
*/

get_header(); 

//Portfolio Loop

		
	$project_details = get_post_meta(get_the_id(),'electrify_page_options');
	if( !empty($project_details)){
		extract($project_details[0]);
	}

	//Set Defaults
	$title_tag	= isset($pix_title_tag) ? $pix_title_tagpix_title_tag : 'h3';
	$columns = isset($columns) ? $columns : 'col3';
	$filterable = isset($pix_filterable) ? $pix_filterable : 'yes';
	$filter_style = isset($pix_filter_style) ? $pix_filter_style : 'dropdown';
	$no_of_items = isset($pix_portfolio_per_page) ? $pix_portfolio_per_page : '9';
	$pix_portfolio_layout = isset($pix_portfolio_layout) ? $pix_portfolio_layout : 'masonry';
	$portfolio_styles = isset($pix_portfolio_styles) ? $pix_portfolio_styles : 'extended';
	$style = isset($pix_portfolio_hover_styles) ? $pix_portfolio_hover_styles : "style1";
	$lightbox = isset($pix_lightbox) ? $pix_lightbox : 'yes';
	$share = isset($pix_share) ? $pix_share : 'yes';
	$like = isset($pix_like) ? $pix_like : 'yes';
	$order_by = isset($pix_order_by) ? $pix_order_by : 'date';
	$order = isset($pix_order) ? $pix_order : 'asc';
	$single_portfolio_link = isset($pix_single_portfolio_link) ? $pix_single_portfolio_link : 'yes';
	$pagination = isset($pix_pagination) ? $pix_pagination : 'yes';
	
		
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'pix_portfolio',
		'orderby' => $order_by,
		'order' => $order,
		'posts_per_page' => ( !empty($no_of_items) && is_numeric($no_of_items)) ? $no_of_items : -1,
		'paged' => $paged,
		);

	$width = $height = '';

	if($columns == 'col3'){
		$shorten_length = 50;
		$class = 'col-md-4 col-sm-4';
		if($portfolio_styles == 'boxed'){			
			$width = '462';
			$height = '326';
		}else{
			$width = '650';
			$height = '460';
		}
	}
	elseif($columns == 'col2'){
		$shorten_length = 120;
		$class = 'col-md-6 col-sm-6';
		if($portfolio_styles == 'boxed'){			
			$width = '585';
			$height = '413';
		}else{
			$width = '650';
			$height = '460';
		}
	}else{
		$class = 'col-md-3 col-sm-3';
		$shorten_length = 30;
		if($portfolio_styles == 'boxed'){			
			$width = '462';
			$height = '326';
		}else{
			$width = '650';
			$height = '460';
		}
	}

	//set container classes
	if($portfolio_styles == 'extended'){
		$columns = 'image';
		$con_class = 'container-extend nopadding '.$columns;
		$class = 'col-md-3';
		$width = '534';
		$height = '375';
	}elseif($portfolio_styles == 'boxed'){
		$con_class = 'container nopadding '.$columns;
	}else{
		$con_class = 'container '.$columns;
	}

	if($pix_portfolio_layout == 'masonry'){
		$height = NULL;
	}

	//Sub Header Options
	$pix_header_text = isset($pix_header_text) ? $pix_header_text : 'left';	
	$header_size = isset($header_size) ? $header_size : 'small';
	$pix_header_styles = isset($pix_header_styles) ? $pix_header_styles : 'color';
	$header_bg_image = isset($header_bg_image) ? $header_bg_image : '';
	$header_bg_color = isset($header_bg_color) ? $header_bg_color : 'f1f2f2';
	$header_text_color = isset($header_text_color) ? $header_text_color : '';
	$display_header = isset($display_header) ? $display_header : 'show';

	//rebuilding image
	$header_bg_image = htmlspecialchars_decode($header_bg_image);
	$header_bg_image = json_decode($header_bg_image,true);
	$header_bg_image = $header_bg_image[0]['full'];

	if($display_header == "show"){
		subBanner(get_the_title());
	}

	//VC_COLUMNS
	$output = '<section id="portfolio-page" class="'. $portfolio_styles .' '. $con_class .'">';


	$output .= '<div class="row portfolio-row">';



	if($filterable == 'yes') {
        
        $terms = get_terms('pix_categories'); 
        if($terms){
	        $output .= '<div class="sorter '. $filter_style .'">';

	        	if($filter_style == 'dropdown'){
			    	$output .= '<div class="top-active"><span class="txt">All </span><span class="pixicon-eleganticons-18"></span></div>';
			    }

			    $output .= '<ul id="filters" class="option-set '. $filter_style .' clearfix" >
			         			 <li><a href="#" class="selected" data-filter="*">All</a></li>';
			                        $terms = get_terms('pix_categories'); 
			                        foreach($terms as $term ){ 
			                        	$output .= '<li><a href="#" data-filter=".'.strtolower(str_replace(' ','-',$term->name)).'">'.$term->name.'</a></li>';    
			                        }
			                    $output .= '</ul>  
			            </div>';
		}
        
	}
	

	query_posts($args);

	$output .= '<div id="portfolio-content" class="portfolio-contents">';

	$i = 1;

	if (have_posts()) : while (have_posts()) : the_post();

		$terms = get_the_terms($post->ID,'pix_categories');

		$temp_title = get_the_title($post->ID); //title
		$temp_content = ShortenText(get_the_content($post->ID),$shorten_length); //content
		$temp_link = get_permalink($post->ID); //permalink
		$like_count = get_post_meta( $post->ID, '_pix_like_me', true );
		$like_class = ( isset($_COOKIE['pix_like_me_'. $post->ID])) ? 'liked' : '';

		if($like_count == ''){
			$like_count = 0;
		}
		
		$temp_thumb = $img = '';

		//Get Porfolio Image
		$pix_images= '';
		$post_details = get_post_meta(get_the_id(),'electrify_single_portfolio_options');
		if( !empty($post_details)){
			extract($post_details[0]);
		}

		$pix_images_gallery = htmlspecialchars_decode($pix_images);
		$images_gallery = json_decode($pix_images_gallery,true);

		if(!empty($images_gallery)){
			$image_thumb_url = wp_get_attachment_image_src( $images_gallery[0]['itemId'], 'full');
			if(!empty($image_thumb_url)){
				$img = aq_resize($image_thumb_url[0], $width, $height, true, true); 

				if(!$img){
					$img = $image_thumb_url[0];
				}			
			}
			else{
				$img = get_template_directory_uri() .'/library/images/portfolio-'. esc_attr($portfolio_styles) . '-' .esc_attr($columns) .'-fallback.gif';
			}
			
			
			$temp_thumb = "<img src='$img' alt=''>";
		}else{
			$temp_thumb = '<img src="'. get_template_directory_uri() .'/library/images/portfolio-'. esc_attr($portfolio_styles) . '-' .esc_attr($columns) .'-fallback.gif" alt="">';
		}

		

		$output .= '<div class="element '. $class .' pix-portfolio-item '. esc_attr($style);


		if(!empty($terms)) {
			foreach($terms as $term) {
				$output .= ' ' . strtolower(str_replace(' ','-',$term->name)). ' '; 
			}
		}

		$output .= '" data-id="id-'.$i.'">';
				
		

			$output .= '<div class="portfolio-container">'; //portfolio Container

				//portfolio Image
				$output .= '<div class="portfolio-img">
								'.$temp_thumb.'
							</div>';

							
				$output .=	'<div class="portfolio-hover">';

					if($style == 'style3'){
						$output .= '<div class="portfolio-icons">'; //portfolio Container

							//Lightbox icon
							if($lightbox == 'yes' && !empty($img)){
								$output .= '<div class="port-icon-hover"><a href="'. $images_gallery[0]['full'] .'" class="portfolio-icon popup-gallery"><i class="pixicon-eleganticons-52"></i></a></div>';
							}

							//Like Button Icon
							if($like == 'yes'){
								$output .= '<div class="port-icon-hover"><a href="#void" class="portfolio-icon pix-like-me '. $like_class .'" data-id="'. $post->ID .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span></a></div>';
							}							

							//Permalink Icon
							if($single_portfolio_link == 'yes'){
								$output .= '<div class="port-icon-hover"><a href="'. get_permalink() .'" class="portfolio-icon"><i class="pixicon-eleganticons-3"></i></a></div>';
							}

						$output .= '</div>'; //End of portfolio icons
					}

					//portfolio Name and content
					if($style == 'style1' && $single_portfolio_link == 'yes'){
						$output .= '<a href="'.$temp_link.'" class="portfolio-link">';
					}
					$output .= '<div class="portfolio-content">'; //portfolio Container

						//Author name
						if($single_portfolio_link == 'yes' && $style != 'style1' ){
							$output .= '<'. $title_tag .' class="title"><a href="'.$temp_link.'" >'.esc_html($temp_title).'</a></'. $title_tag .'>'; 
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

					if($single_portfolio_link == 'yes' && $style == 'style1'){
						$output .= '</a>';
					}

					if($style == 'style2' || $style == 'style4' || $style == 'style5'){
						$output .= '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container
							//Like Button Icon
							if($style != 'style4'){
								if($share == 'yes'){
									$output .= '<div class="port-icon-hover share-btn"><div class="share-top"><i class="pixicon-share"></i></div><div class="port-share-btn">';

										$output .= '<a href="http://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $img .'"><i class="pixicon-pinterest"></i></a>';

										$output .= '<a href="https://plus.google.com/share?url='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-244"></i></a>';			    				

										$output .= '<a href="http://twitter.com/share?url='. get_permalink() .'&amp;text=Check out this Project '. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-242"></i></a>';

										$output .= '<a href="http://www.facebook.com/sharer.php?u='. get_permalink() .'" target="_blank"><i class="pixicon-eleganticons-241"></i></a>';

									$output .= '</div></div>';
								}

								if($like == 'yes'){
									$output .= '<div class="port-icon-hover"><a href="#void" class="portfolio-icon pix-like-me '. $like_class .'" data-id="'. $post->ID .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span></a></div>';
								}
			                }

		                    //Lightbox icon
		                    if($lightbox == 'yes' && !empty($images_gallery[0]['full'])){
		                    	$output .= '<div class="port-icon-hover"><a href="'. $img .'" class="portfolio-icon popup-gallery"><i class="pixicon-eleganticons-52"></i></a></div>';
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
							$output .= '<div class="port-icon-hover"><a href="'. get_permalink() .'" class="portfolio-icon"><i class="pixicon-eleganticons-3"></i></a></div>';
						}

						$output .= '</div></div>'; //End of portfolio icons
					}
									
				$output .=	'</div>'; //End of portfolio hover

			$output .= '</div>'; //End of portfolio Container

		$output .= '</div>'; //End of pix portfolio Item


		$i++;

	endwhile;
	
	else:
      $output .= "No Portfolio Found.";
   	endif;
   

   $output .= '</div>'; //row
      if ( $no_of_items != '-1' && $pagination == 'yes' ){

   		if ( function_exists( 'pixel8es_page_navi' ) ) {
   		    $output .= pixel8es_page_navi();
   		} else {
   	        $output .= '<nav class="wp-prev-next">
   	                <ul class="clearfix">
   	                    <li class="prev-link">'.get_next_posts_link('<span class="pixicon-eleganticons-19"></span>').'</li>
   	                    <li class="next-link">'.get_previous_posts_link('<span class="pixicon-eleganticons-20"></span>').'</li>
   	                </ul>
   	        </nav>';
   		}
      }else{
      	
      }
   $output .='</section>'; //portfolio
   echo  $output;
   wp_reset_query();
?>

<!-- End of mainContent -->

<?php get_footer(); ?>