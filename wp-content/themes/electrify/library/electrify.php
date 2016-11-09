<?php
/* Welcome to Electrify :)
This is the core pixel8es file where most of the
main functions & features reside. If you have
any custom functions, it's best to put them
in the functions.php file.

Developed by: Pixel8es
URL: http://themeforest.net/user/Pixel8es/portfolio
*/

// we're firing all out initial functions at the start
add_action( 'after_setup_theme', 'pixel8es_ahoy', 16 );

function pixel8es_ahoy() {

	// launching operation cleanup
	add_action( 'init', 'pixel8es_head_cleanup' );
	// remove WP version from RSS
	add_filter( 'the_generator', 'pixel8es_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'pixel8es_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'pixel8es_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'pixel8es_gallery_style' );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'pixel8es_scripts_and_styles', 999 );
	// ie conditional wrapper

	// launching this stuff after theme setup
	pixel8es_theme_support();

	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'pixel8es_register_sidebars' );
	// adding the pixel8es search form (created in functions.php)
	add_filter( 'get_search_form', 'pixel8es_wpsearch' );

	// cleaning up excerpt
	add_filter( 'excerpt_more', 'pixel8es_excerpt_more' );

} /* end pixel8es ahoy */

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function pixel8es_head_cleanup() {
	
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'pixel8es_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'pixel8es_remove_wp_ver_css_js', 9999 );

} /* end pixel8es head cleanup */

// remove WP version from RSS
function pixel8es_rss_version() { return ''; }

// remove WP version from scripts
function pixel8es_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// remove injected CSS for recent comments widget
function pixel8es_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function pixel8es_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function pixel8es_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function pixel8es_scripts_and_styles() {
	global $wp_styles, $smof_data; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
	if (!is_admin()) {
			
		// register Pix Icon Fonts stylesheet

		wp_register_style( 'pix-fonts', get_template_directory_uri() . '/library/css/pix-icons.css', array(), '3.0', 'all' );
			
		// register bootstrap stylesheet
	        wp_register_style( 'electrify-bootstrap', get_template_directory_uri() . '/library/css/bootstrap.min.css', array(), '3.1.1', 'all' );
		
	        // register main stylesheet
	        //wp_register_style( 'electrify-stylesheet', get_template_directory_uri() . '/library/css/style.css', array(), '3.0', 'all' );

	        wp_register_style( 'electrify-stylesheet', get_template_directory_uri() . '/library/css/style.min.css', array(), '3.0', 'all' );

	        // register responsive stylesheet
			$mobile_responsive = isset($smof_data['mobile_responsive'])? $smof_data['mobile_responsive'] : 1;
	        if($mobile_responsive == 1){
	        	wp_register_style( 'electrify-responsive-stylesheet', get_template_directory_uri() . '/library/css/responsive.css', array(), '3.0', 'all' );
	        }else{
	        	wp_register_style( 'electrify-responsive-stylesheet', get_template_directory_uri() . '/library/css/non-responsive.css', array(), '3.0', 'all' );
	        }

	        // register main stylesheet
	        wp_register_style( 'electrify-animate-stylesheet', get_template_directory_uri() . '/library/css/animate.min.css', array(), '3.0', 'all' );

	         //woo stylesheet
	        wp_register_style( 'electrify-woo-stylesheet', get_template_directory_uri() . '/library/css/woo.css', array('electrify-plugins-stylesheet'), '3.0', 'all' );

	        // register plugins stylesheet
	        wp_register_style( 'electrify-plugins-stylesheet', get_template_directory_uri() . '/library/css/plugins.css', array('electrify-stylesheet'), '3.0', 'all' );
		
	        $theme_color = isset($smof_data['theme_color'])? $smof_data['theme_color'] : 'default';

	        // register Color CSS
	        if($theme_color != ''){
	        	wp_register_style( 'electrify-color-stylesheet', get_template_directory_uri() . '/library/css/color-css/'.$theme_color.'.css', array('electrify-plugins-stylesheet'), '3.0', 'all' );
	        }

	        // register custom stylesheet
		    wp_register_style( 'electrify-custom-css', get_template_directory_uri() . '/library/css/custom_styles.css', array('electrify-plugins-stylesheet'), '3.0', 'all' );

		// modernizr (without media query polyfill)
		wp_register_script( 'electrify-modernizr', get_template_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );


		// comment reply script for threaded comments
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script( 'comment-reply' );
		}

		//adding scripts file in the footer
		//wp deregister
		$pix_ajax = isset($smof_data['pix_ajax']) ? $smof_data['pix_ajax'] : '';

		if($pix_ajax){
			$load_script_in_footer = false;
		}else{
			$load_script_in_footer = true;
		}

		$protocol = is_ssl() ? 'https' : 'http';

		wp_deregister_script( 'waypoints' );
		wp_register_script( 'waypoints', get_template_directory_uri() . '/library/js/waypoints.min.js', array( 'jquery' ), '2.0.4', $load_script_in_footer );
		wp_register_script( 'gmap', $protocol.'://maps.googleapis.com/maps/api/js?key=&sensor=false', array(), '3.0', false );

		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_register_script( 'pixel8es-plugins-js', get_template_directory_uri() . '/library/js/plugins.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-ui-accordion', 'jquery_ui_tabs_rotate', 'prettyphoto', 'wpb_composer_front_js' ), '2.0', $load_script_in_footer );
		}else{
			wp_register_script( 'pixel8es-plugins-js', get_template_directory_uri() . '/library/js/plugins.js', array( 'jquery' ), '3.0', $load_script_in_footer );
		}

		//wp_register_script( 'pixel8es-js', get_template_directory_uri() . '/library/js/scripts.js', array( 'jquery', 'pixel8es-plugins-js' ), '3.0', true );

		wp_register_script( 'pixel8es-js', get_template_directory_uri() . '/library/js/scripts.min.js', array( 'jquery', 'pixel8es-plugins-js' ), '3.0', true );

		// enqueue styles and scripts
		wp_enqueue_script( 'electrify-modernizr' );
		wp_enqueue_style( 'pix-fonts');
	    wp_enqueue_style( 'electrify-bootstrap' );
	    if (class_exists('WPBakeryVisualComposerAbstract') && $pix_ajax ) {
    		wp_enqueue_style( 'js_composer_front' );
    		wp_enqueue_style( 'js_composer_custom_css' );
	    }
		wp_enqueue_style( 'electrify-stylesheet' );
		wp_enqueue_style( 'electrify-responsive-stylesheet' );
		wp_enqueue_style( 'electrify-animate-stylesheet' );
		wp_enqueue_style( 'electrify-plugins-stylesheet' );

		if (class_exists('Woocommerce')) {
			wp_enqueue_style( 'electrify-woo-stylesheet' );
		}

		wp_enqueue_style( 'electrify-color-stylesheet' );

		$custom_styles = isset($smof_data['custom_styles']) ? $smof_data['custom_styles'] : '0';
		
		//Custom Styles
		wp_enqueue_style( 'electrify-custom-css' );
		

		wp_enqueue_style( 'electrify-ie-only' );

		$wp_styles->add_data( 'pixel8es-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

		/*
		I recommend using a plugin to call jQuery
		using the google cdn. That way it stays cached
		and your site will load faster.
		*/

		wp_enqueue_script( 'gmap' ); //google map api
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'pixel8es-plugins-js' );
		wp_localize_script( 'pixel8es-plugins-js', 'electrifyAjaxForm',
			array(
				'nameError' => __('Please enter your name!', 'pixel8es'),
				'nameLenError' => __('Your name needs to be at least {0} characters', 'pixel8es'),
				'emailError' => __('Please enter a valid email address.', 'pixel8es'),
				'emailLenError' => __('Your email address must be in the format of name@domain.com', 'pixel8es'),
				'subjectError' => __('You need to enter a subject!', 'pixel8es'),
				'subjectLenError' => __('Subject needs to be at least {0} characters', 'pixel8es'),                           
				'messageError' => __('You need to enter a message!', 'pixel8es'),
				'messageLenError' => __('Message needs to be at least {0} characters', 'pixel8es')
				)
			);
		wp_localize_script( 'pixel8es-plugins-js', 'pix_electrify',
			array(
				'rootUrl' => home_url()
				)
			);
		
		if(!isset($_GET['vc_editable'])){
			wp_enqueue_script( 'pixel8es-js' );
		}

	}
}

/*********************
   THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function pixel8es_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	//WooCommerce theme support
	add_theme_support( 'woocommerce' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
		array(
		'default-image' => '',  // background image default
		'default-color' => '', // background color default (dont add the #)
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' => '',
		'admin-preview-callback' => ''
		)
	);

	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'video',             // video
			'audio'              // audio
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'pixel8es' ),   // main nav in header
			'top-head-nav' => __( 'Top Header Nav', 'pixel8es' ),
			'left-nav' => __( 'Left Side Nav', 'pixel8es' ),
			'right-nav' => __( 'Right Side Nav', 'pixel8es' ),
			'top-nav' => __( 'Top Sub Nav', 'pixel8es' ),
			'404-nav' => __( '404 Nav', 'pixel8es' )
		)
	);
} /* end pixel8es theme support */


/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function pixel8es_main_nav() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
		'menu_class' => 'menu clearfix',         // adding custom nav class
		'theme_location' => 'main-nav',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '<span class="pix-dropdown-arrow"></span>',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '', // after each link
		'depth' => 3,                                   // limit the depth of the nav
		'fallback_cb' => 'pixel8es_main_nav_fallback',      // fallback function
		'walker' => new Pix_Menu_Extend_Walker()
	));
} /* end pixel8es main nav */

// this is the fallback for header menu
function pixel8es_main_nav_fallback() {
	
}

function pixel8es_404_nav() {
	// display the wp3 menu if available
	wp_nav_menu(
		array(
			'theme_location' => '404-nav',
			'container' => false,
			'menu_class' => 'alignCenter nav404',
			'echo' => true,
			'before' => '&emsp;',
			'after' => '&emsp;',
			'link_before' => '',
			'link_after' => '',
			'depth' => 1,
			'fallback_cb' => 'pixel8es_nav_fallback'
			)
	);
} /* end pixel8es main nav */

function pixel8es_top_nav() {
	// display the wp3 menu if available
	wp_nav_menu(
		array(
			'theme_location' => 'top-head-nav',
			'container' => false,
			'menu_class' => 'top-head-nav clearfix',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 1,
			'fallback_cb' => 'pixel8es_top_nav_fallback'
			)
	);
} /* end pixel8es main nav */

// this is the fallback for header menu
function pixel8es_nav_fallback() {
	echo '<p><a href="'.home_url().'/wp-admin/nav-menus.php">'.__('Click Here to create/add Menu from Admin Page','pixel8es').'</a></p>';
}
// this is the fallback for header menu
function pixel8es_top_nav_fallback() {
	echo '<a class="pull-left" href="'.home_url().'/wp-admin/nav-menus.php">'.__('add Menu from Admin Page','pixel8es').'</a>';
}

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using pixel8es_related_posts(); )
function pixel8es_related_posts() {
	echo '<ul id="pixel8es-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) { 
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'pixel8es' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
} /* end pixel8es related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function pixel8es_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$output = '';
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	$output .= $before.  '<nav class="pagination theme-style clearfix"><div class="pagination-center">
					<p class="totalPages">Pages <span class="orange">'.$paged.'</span> of '. $max_page .' : </p>
					<ul>'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( "First", 'pixel8es' );
		$output .= '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	$output .= '<li class="bpn-prev-link">';
	$output .= get_previous_posts_link('<span class="pixicon-eleganticons-19"></span>');
	$output .= '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			$output .= '<li class="active"><span>'.$i.'</span></li>';
		} else {
			$output .= '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	$output .= '<li class="bpn-next-link">';
	$output .= get_next_posts_link('<span class="pixicon-eleganticons-20"></span>');
	$output .= '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( "Last", 'pixel8es' );
		$output .= '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	$output .= '</ul></div></nav>'.$after."";
	return $output;
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// This removes the annoying to a Read More link
function pixel8es_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function pixel8es_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s','pixel8es' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}

?>