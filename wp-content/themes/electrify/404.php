<?php get_header();
    
    //Set Empty Value
    $post_icon = $post_icon_bg = $con_class = '';

    //Get Theme Option Value
    global $smof_data;
    
    //404 Options
    $custom_404_bg = isset($smof_data['custom_404_bg'])? $smof_data['custom_404_bg'] : "get_template_directory_uri().'/library/images/404.png'";
    $error_t = isset($smof_data['error_t'])? $smof_data['error_t'] : 'Sorry, but the page you were looking for can\'t be found. Please inform us about this error.';
    $error_menu = isset($smof_data['error_menu'])? $smof_data['error_menu'] : 1;
    $error_search = isset($smof_data['error_search'])? $smof_data['error_search'] : 1;

    ?>

    <div class=" container boxed">
		<div class="row">
			<div class="col-md-12">
				<div id="errorCon">
					<p class=""><img src="<?php echo $custom_404_bg; ?>" alt=""></p>
					<p class="emphasis ">
						<?php _e($error_t); ?>
					</p>

					
						<?php if($error_menu){ pixel8es_404_nav(); } 
						if($error_search){ ?>
						<section class="search">
							<p><?php get_search_form(); ?></p>
						</section>
						<?php } ?>
					
				</div>
			</div>
		</div>
	</div>	

			

<?php get_footer(); ?>
