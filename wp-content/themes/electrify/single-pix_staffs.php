<?php get_header(); ?>

<?php 

$single_staff_banner = isset($smof_data['single_staff_banner']) ? $smof_data['single_staff_banner'] : '1';
$single_staff_image = isset($smof_data['single_staff_image']) ? $smof_data['single_staff_image'] : '1';
$single_staff_image_w = isset($smof_data['single_staff_image_w']) ? $smof_data['single_staff_image_w'] : '300';
$single_staff_image_h = isset($smof_data['single_staff_image_h']) ? $smof_data['single_staff_image_h'] : '400';
$single_staff_job = isset($smof_data['single_staff_job']) ? $smof_data['single_staff_job'] : 1;
$single_staff_social = isset($smof_data['single_staff_social']) ? $smof_data['single_staff_social'] : 1;
$single_staff_email = isset($smof_data['single_staff_email']) ? $smof_data['single_staff_email'] : 1;

if($hide_breadcrumbs == 1){
	$hide_breadcrumbs = 'show';
}
else{
	$hide_breadcrumbs = 'hide';
}

if (have_posts()) : while (have_posts()) : the_post();
 	
	$temp_title = get_the_title();
	$id = get_the_ID();
	if($single_staff_banner == 1){
		subBanner(get_the_title());
	}
	
	$temp_thumb = '';
	
	//$temp_ex = get_the_excerpt();
	if (has_post_thumbnail()) { // checks if post has a featured image and then outputs it.
		$image_id = get_post_thumbnail_id ($post->ID );  
		$image_portfolio_url = wp_get_attachment_image_src( $image_id, 'full'); 
		$temp_thumb = aq_resize($image_portfolio_url[0], $single_staff_image_w, $single_staff_image_h, true, true); 

		if($temp_thumb){
			$temp_thumb = '<img src="' . $temp_thumb . '" alt="">';
		}else{
			$temp_thumb = '<img src="'.$image_portfolio_url[0].'" alt="'. $temp_title . '">';                                           
		}                                   
	}
	
		$meta = get_post_meta(get_the_id(),'staff_socail_links');

		if( !empty($meta) && !empty($meta[0])){
			extract($meta[0]);
		}

		$social_icons 	 = !empty($facebook)? '<a href="'. esc_url($facebook) .'" class="facebook"  title="Facebook"><i class="pixicon-eleganticons-241"></i></a> ' : '';
		$social_icons 	.= !empty($twitter) ? '<a href="'. esc_url($twitter)  .'" class="twitter" title="Twitter"><i class="pixicon-eleganticons-242"></i></a> ' : '';
		$social_icons	.= !empty($gplus) 	? '<a href="'. esc_url($gplus) 	 .'" class="gplus" title="Gplus"><i class="pixicon-eleganticons-244"></i></a> ' : '';
		$social_icons	.= !empty($linkedin)? '<a href="'. esc_url($linkedin) .'" class="linkedin" title="LinkedIn"><i class="pixicon-linkedin-1"></i></a> ' : '';
		$social_icons 	.= !empty($dribble) ? '<a href="'. esc_url($dribble)  .'" class="dribbble" title="Dribble"><i class="pixicon-eleganticons-249"></i></a> ' : '';
		$social_icons	.= !empty($flickr) 	? '<a href="'. esc_url($flickr)   .'" class="flickr" title="Flickr"><i class="pixicon-eleganticons-260"></i></a> ' : '';
		$social_icons	.= !empty($instagram) ? '<a href="'. esc_url($instagram)   .'" class="instagram" title="Instagram"><i class="pixicon-eleganticons-248"></i></a> ' : '';

		$staff_email	= !empty($staff_email) ? '<p><i class="pixicon-eleganticons-212"></i>Email <a href="'. esc_url($staff_email)   .'"> '. get_the_title().'</a></p>' : '';
		$jobs = get_the_term_list($id , 'pix_jobs','',', ');
		$jobs = !empty($jobs) ? strip_tags( $jobs ) : '';
		
?>

	<div role="main" id="mainContent" class="center row-fluid">

		<div class="no-fullwidth">
			
			<section class="container boxed entry-content clearfix" itemprop="articleBody">
				<?php 
					if($single_staff_image){
						echo '<aside class="single-staff-img"><div class="singleStaff">'.$temp_thumb.'</div></aside>';
					}
				?>
				
            <div class="single-staff">
            	<h3 class="title"><?php echo esc_html($temp_title); ?></h3>
            	<?php 
            		if($single_staff_job){
            			echo '<small>'.$jobs.'</small>';
            		}
            		the_content();
            	?>
                
               
               		 <?php
               		 	if($single_staff_social || $single_staff_email){
               		 		echo '<div class="staff-social">';
		                        if($single_staff_social){
		                            echo '<div class="social-icons">'. $social_icons .'</div>';
		                        }
		                        if($single_staff_email){
		                            echo '<div class="staff-email">'. $staff_email .'</div>';
		                        }
                        	echo '</div>';
               		 	}
                        
                     ?>
                    
           		
            </div>
        </section> <!-- end article section -->
        
        
    </div>
		
		
	</div> <!-- end #content -->
    <?php endwhile; ?>

<?php endif; ?>
<?php get_footer(); ?>