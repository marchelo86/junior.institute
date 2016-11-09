<?php

/* Custom Post Type Class */

class pix_post_type{
	
	public function __construct($name, $singluar_name, $args){
		$this -> register_post_type($name, $singluar_name, $args);	
	}	
	
	//Registering Post Types
	public function register_post_type($name, $singluar_name, $args){ 
		  
		  $args = array_merge(
					 		array(
							'labels' => array(
										'name' 			=> $name,
										'singular_name' => $singluar_name,
										'add_new'		=> "Add New $singluar_name",
										'add_new_item' 	=> "Add New $singluar_name",
										'edit_item' 	=> "Edit $singluar_name",
										'new_item' 		=> "New $singluar_name",
										'view_item' 	=> "View $singluar_name",
										'search_items' 	=> "Search $name",
										'not_found' 	=> "No $name found",
										'all_items' => "All $name",
										'not_found_in_trash' 	=> "No $name found in Trash", 
										'parent_item_colon' 	=> '',
										'menu_name' 	=>  $name
									  ),
							'public' 	=> true,
							'query_var' => strtolower($singluar_name),
							'hierarchical' => true,
							'rewrite' 	=> array(
											'slug' => $name
										 	),
							'menu_icon' =>	admin_url().'images/media-button-video.gif',		 
							'supports' 	=> array('title','editor')
						  ),
						  $args  
		  );
		  
		  register_post_type('pix_' . strtolower($name), $args);
	}
	
	//Taxonomies
	public function taxonomies($post_types, $tax_arr)
	{		
		$taxonomies = array();

		foreach ($tax_arr as $name => $arr){
			
			$singular_name = $arr['singular_name'];
			
			$labels = array(
					'name' => $name,
					'singular_name' => $singular_name,
					'add_new' => "Add New $singular_name",
					'add_new_item' => "Add New $singular_name",
					'edit_item' => "Edit $singular_name",
					'new_item' => "New $singular_name",
					'view_item' => "View $singular_name",
					'update_item' => "Update $singular_name",
					'search_items' => "Search $name",
					'not_found' => "$name Not Found",
					'not_found_trash' => "$name Not Found in Trash",
					'all_items' => "All $name",
					'separate_items_with_comments' => "Separate tags with commas"
			);
						
			$defaultArr = array(
				'hierarchical' => true,
				'query_var' => true,
				'rewrite' => array('slug' => $name),
				'labels' => $labels	
			);
			
			$taxonomies[$name] =  array_merge($defaultArr, $arr);
			
		}
		
		$this -> register_all_taxonomies($post_types, $taxonomies);	
	}
	
	public function register_all_taxonomies($post_types, $taxonomies)
	{	
		foreach($taxonomies as $name => $arr){
			register_taxonomy('pix_'. strtolower($name), 'pix_' .strtolower($post_types), $arr);
		}
	}
}



//adding column to portfolio posts type
add_filter( 'manage_edit-pix_portfolio_columns', 'my_edit_pix_portfolio_columns' ) ;

function my_edit_pix_portfolio_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'All portfolio', 'pixel8es' ),
		'id' => __( 'Portfolio Id', 'pixel8es' ),
		'thumb' => __( 'Portfolio Image', 'pixel8es' ),
		'date' => __( 'Date', 'pixel8es' )
	);

	return $columns;
}


//adding values in th our custom columns
add_action( 'manage_pix_portfolio_posts_custom_column', 'my_manage_portfolio_columns', 10, 2 );
function my_manage_portfolio_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'id' :
		
				printf( $post_id );
				
			break;

		case 'thumb' :

				//Get Porfolio Image
				$pix_images= '';
				$post_details = get_post_meta($post_id,'electrify_single_portfolio_options');
				if( !empty($post_details)){
					extract($post_details[0]);
				}

				$pix_images_gallery = htmlspecialchars_decode($pix_images);
				$images_gallery = json_decode($pix_images_gallery,true);
				if(!empty($images_gallery)){
					$img = aq_resize($images_gallery[0]['full'], 150, 150, true, true);
					if(!$img){
						$img = $images_gallery[0]['full'];
					}
					$temp_thumb = "<img src='$img' alt=''>";
					echo $temp_thumb;
				}else{
					$temp_thumb = '';
				}

			break;

		default :
			break;
	}
}

//adding column to staffs posts type
add_filter( 'manage_edit-pix_staffs_columns', 'my_edit_pix_staffs_columns' ) ;

function my_edit_pix_staffs_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'All Saffs', 'pixel8es' ),
		'id' => __( 'Staff Id', 'pixel8es' ),
		'thumb' => __( 'Staff Image', 'pixel8es' ),
		'date' => __( 'Date', 'pixel8es' )
	);

	return $columns;
}


add_action( 'manage_pix_staffs_posts_custom_column', 'my_manage_staffs_columns', 10, 2 );

function my_manage_staffs_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'id' :
		
				printf( $post_id );
				
			break;

		case 'thumb' :

				if ( has_post_thumbnail() ) {
					the_post_thumbnail('thumbnail');
				}
			break;

		default :
			break;
	}
}


//adding column to testimonial posts type
add_filter( 'manage_edit-pix_testimonial_columns', 'my_edit_pix_testimonial_columns' ) ;

function my_edit_pix_testimonial_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'All Testimonial', 'pixel8es' ),
		'id' => __( 'Testimonial Id', 'pixel8es' ),
		'thumb' => __( 'Client Image', 'pixel8es' ),
		'date' => __( 'Date', 'pixel8es' )
	);

	return $columns;
}


//adding values in th our custom columns
add_action( 'manage_pix_testimonial_posts_custom_column', 'my_manage_testimonial_columns', 10, 2 );
function my_manage_testimonial_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'id' :
		
				printf( $post_id );
				
			break;

		case 'thumb' :

				if ( has_post_thumbnail() ) {
					the_post_thumbnail('thumbnail');
				}
			break;

		default :
			break;
	}
}



//Initialize

function ini_post_type(){

    global $smof_data;
    $slug_portfolio = isset($smof_data['slug_portfolio']) ? esc_html(strtolower($smof_data['slug_portfolio'])) : 'portfolio';
    $slug_staff = isset($smof_data['slug_staff']) ? esc_html(strtolower($smof_data['slug_staff'])) : 'staff';
    $slug_testimonial = isset($smof_data['slug_testimonial']) ? esc_html(strtolower($smof_data['slug_testimonial'])) : 'testimonial';

    //Our Team
    $staff_arr = array();
    $staff_tax_arr = array();   
    
    $staff_arr = array(
    	'menu_icon' => 'dashicons-groups',
    	'supports' => array('title','editor','thumbnail','page-attributes'),
    	'rewrite'   => array(
                        	'slug' => $slug_staff
                        )
                );
    $staff_tax_arr = array("jobs"   => array('singular_name' => 'job','query_var' => 'staff_jobs'));
    
    $staff = new pix_post_type('Staffs', 'Staff', $staff_arr);
    $staff->taxonomies('Staffs', $staff_tax_arr);
    
    //Portfolio Options
    $por_arr = array(
                'menu_icon' =>'dashicons-portfolio',
                'supports' => array('title','editor'), 
                'rewrite'   => array(
                        	'slug' => $slug_portfolio
                        )
                );
    $por_tax_arr = array("Categories"   => array('singular_name' => 'Category','query_var' => 'portfolio_cat'));
    
    $portfolio = new pix_post_type('Portfolio', 'Portfolio', $por_arr);
    $portfolio->taxonomies('Portfolio', $por_tax_arr);

    //Testimonial Options
    $testimonial_arr = array(
                'menu_icon' => 'dashicons-format-status',
                'supports' => array('title','editor','thumbnail'),
                'rewrite'   => array(
                        	'slug' => $slug_testimonial
                        )
                );
    
    $testimonial = new pix_post_type('Testimonial', 'testimonial', $testimonial_arr);
}

add_action('init', 'ini_post_type');
