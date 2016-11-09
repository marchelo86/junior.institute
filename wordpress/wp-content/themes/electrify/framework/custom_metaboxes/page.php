<?php

/***********************************************
	Portfolio (List) Page Metabox
*************************************************/

//Meta Box


function page_options(){
	add_meta_box('pix_page_options', 'Page Options', 'pix_page_options_cb', 'page', 'normal','low');	
}
add_action('add_meta_boxes', 'page_options');

//Displaying Meta Box
function pix_page_options_cb($post)
{
	global $post;
	$meta = array();

	$meta = get_post_meta($post->ID,'electrify_page_options',false);
	if( !empty($meta) )
		extract($meta[0]);
	
	//Set Defaults
	$columns = isset($columns) ? $columns : 'col3';
	$pix_filterable = isset($pix_filterable) ? $pix_filterable : 'yes';
	$pix_filter_style = isset($pix_filter_style) ? $pix_filter_style : 'dropdown';
	$pix_pagination = isset($pix_pagination) ? $pix_pagination : 'yes';
	$pix_portfolio_per_page = isset($pix_portfolio_per_page) ? $pix_portfolio_per_page : '9';
	$pix_portfolio_layout = isset($pix_portfolio_layout) ? $pix_portfolio_layout : 'grid';
	$pix_portfolio_styles = isset($pix_portfolio_styles) ? $pix_portfolio_styles : 'extended';
	$pix_portfolio_hover_styles = isset($pix_portfolio_hover_styles) ? $pix_portfolio_hover_styles : "style1";

	$pix_lightbox = isset($pix_lightbox) ? $pix_lightbox : 'yes';
	$pix_share = isset($pix_share) ? $pix_share : 'yes';
	$pix_like = isset($pix_like) ? $pix_like : 'yes';
	$pix_order_by = isset($pix_order_by) ? $pix_order_by : 'date';
	$pix_order = isset($pix_order) ? $pix_order : 'asc';
	$pix_single_portfolio_link = isset($pix_single_portfolio_link) ? $pix_single_portfolio_link : 'yes';

	$sidebar_position = isset($sidebar_position) ? $sidebar_position : "full_width";
	$selected_sidebar_replacement = isset($selected_sidebar_replacement) ? $selected_sidebar_replacement : '0';

	//Sub Header
	$display_header = isset($display_header) ? $display_header : 'show';
	$pix_header_text = isset($pix_header_text) ? $pix_header_text : 'left';	
	$header_size = isset($header_size) ? $header_size : 'small';
	$pix_header_styles = isset($pix_header_styles) ? $pix_header_styles : 'color';
	$header_bg_image = isset($header_bg_image) ? $header_bg_image : '';
	$header_bg_color = isset($header_bg_color) ? $header_bg_color : 'f1f2f2';
	$header_text_color = isset($header_text_color) ? $header_text_color : '';
	$header_breadcrumbs = isset($header_breadcrumbs) ? $header_breadcrumbs : 'show';
	$show_dot_nav = isset($show_dot_nav) ? $show_dot_nav : 'hide';


	//Nonce Field
	wp_nonce_field(__FILE__, 'pix_nonce');


	/**
	 * Sub Header Fields
	 */
	//Default Page Options - Header

	echo '<div id="PageOptions" class="verticalTab">';
		echo '<ul class="resp-tabs-list">
				<li class="tab-subpage">'.__('Sub Page Header Options','pixel8es'). '</li>
				<li class="tab-portfolio">'.__('Portfolio Options','pixel8es'). '</li>
				<li class="tab-pagelayout">'.__('Page Layout Options','pixel8es'). '</li>
			</ul>';

echo '<div class="resp-tabs-container">';
	echo '<div class="clearfix">';

	echo '<div class="header-options">';


		//Sub Header hide
		echo '<div id="pix-header-size" class="float-clear">';
			echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Sub Header:','pixel8es'). '</h5>';
				echo '<p>'.__('Changes this to hide/show sub header','pixel8es').'</p>';
			echo '</div>';

			echo '<div class="select-style on-off-switch"><select class="display-header pix-switch" name="display_header" id="display_header">';
			echo '<option selected value="show"'. (($display_header == "show") ? ' selected="selected"' : ''). '>' . 'Show'. '</option>';
			echo '<option value="hide"'. (($display_header == "hide") ? ' selected="selected"' : ''). '>' . 'Hide'. '</option>';
			echo '</select></div>';
		echo '</div>';

		$sub_style = '';
		if ($display_header == 'hide'){
			$sub_style = ' style="display:none";';
		}

		echo '<div id="pix-sub-header"'. $sub_style .'>';
			echo '<h5 class="pix-sub-title">'.__('Text style:','pixel8es'). '</h5>';
			echo '<p>'.__('Choose How you want to display text in sub banner.','pixel8es').'</p>';
			echo '<ul class="sidebar_position float-clear">';

				echo '<li>';
				echo '<input type="radio" name="pix_header_text"' . ((isset($pix_header_text) && $pix_header_text=="left") ? "checked" : '') .' value="left">';
				echo '<a href="#"><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/sub-header-left.png" alt="" />
					<i class="icon pixicon-eleganticons-45"></i>
				</a>';
				echo '</li>';

				echo '<li>';
				echo '<input type="radio" name="pix_header_text"' . ((isset($pix_header_text) && $pix_header_text=="center") ? "checked" : '') .' value="center">';
				echo '<a href="#"><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/sub-header-center.png" alt="" />
					<i class="icon pixicon-eleganticons-45"></i>
				</a>';
				echo '</li>';

			echo '</ul>';

			//Sub Header Background Size
			echo '<div id="pix-header-size">';
			echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Header Size:','pixel8es'). '</h5>';
				echo '<p>'.__('This changes height of the header','pixel8es').'</p>
			</div>';

				echo ' <div class="select-style"> <select class="header-style" name="header_size">';
				echo '<option value="small"'. (($header_size == "small") ? ' selected="selected"' : ''). '>' . 'Small'. '</option>';
				echo '<option value="medium"'. (($header_size == "medium") ? ' selected="selected"' : ''). '>' . 'Medium'. '</option>'; 
				echo '<option value="large"'. (($header_size == "large") ? ' selected="selected"' : ''). '>' . 'Large'. '</option>';
				echo '</select></div></p>';
			echo '</div>';

			//Sub Header Background Styles
			echo '<div id="pix-header-style">';
				echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Header Background:','pixel8es'). '</h5>';
				echo '<p>'.__('By Change this, you can choose background image or background color and text color','pixel8es').'</p>
				</div>';

				echo ' <div class="select-style"> <select class="header-style" name="pix_header_styles">';
				echo '<option value="color"'. (($pix_header_styles == "color") ? ' selected="selected"' : ''). '>' . 'Default Background Color'. '</option>';
				echo '<option value="image"'. (($pix_header_styles == "image") ? ' selected="selected"' : ''). '>' . 'Background Image'. '</option>'; 
				echo '<option value="customcolor"'. (($pix_header_styles == "customcolor") ? ' selected="selected"' : ''). '>' . 'Custom Background Color'. '</option>'; 
				echo '</select></div></p>';
			echo '</div>';

			//Sub Header Background Styles
			echo '<div id="pix-header-breadcrumbs">';
			echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Show/Hide Breadcrumbs:','pixel8es'). '</h5>';
				echo '<p>'.__('Changes this to hide/show breadcrumbs in header','pixel8es').'</p></div>';

				echo '<div class="select-style on-off-switch"> <select class="pix-switch header_breadcrumbs" name="header_breadcrumbs" id="header_breadcrumbs">';
				echo '<option value="show"'. (($header_breadcrumbs == "show") ? ' selected="selected"' : ''). '>' . 'Show'. '</option>';
				echo '<option value="hide"'. (($header_breadcrumbs == "hide") ? ' selected="selected"' : ''). '>' . 'Hide'. '</option>';
				echo '</select></div></p>';
			echo '</div>';


			echo '<div class="show_header_style" style="display:none">';

				//Sub Header Background Image
				echo '<div id="header_bg_image">';
					echo '<div class="pix-pull-left">';
						echo '<h5 class="pix-sub-title">'.__('Insert Background:','pixel8es'). '</h5>';
						echo '<p class="pix_image_select pix-container">';
						echo '<label>'.__('Click below image add to Header background image','pixel8es').'</label></p>';
					echo '</div>';
					echo '<div class="pix-container pix_image_select">';
					echo '<input type="hidden" class="widefat pix-saved-val" name="header_bg_image" value="'.$header_bg_image.'">';
					echo '<a href="#" class="select-files" data-title="Insert Image"  data-file-type="image" data-multi-select="false" data-insert="true">Insert Images</a>';
					echo '</div>';
				echo '</div>';

				echo '<div id="pix_color_picker">';
					echo '<div id="header_bg_color_show" class="float-clear">';
						//Sub Header Background Color
					echo '<div class="pix-pull-left">';
						echo '<h5 class="pix-sub-title">'.__('Header background Color:','pixel8es'). '</h5>';
						echo '<p>'.__( 'Choose header bg color', 'pixel8es' ).'</p>';
					echo '</div>';
						echo '<div>';
						echo '<input name="header_bg_color" id="header-bg-color" type="text" value="'. esc_attr($header_bg_color) .'" class="meta-color">';
						echo '</div>';
					echo '</div>';


					//Sub Header Text Color
					echo '<div class="float-clear">';
					echo '<div class="pix-pull-left">';
						echo '<h5 class="pix-sub-title">'.__('Header Text Color :','pixel8es'). '</h5>';
						echo '<p>'.__( 'Choose header bg color', 'pixel8es', 'pixel8es' ).'</p>';
					echo '</div>';	
					echo '<div>';
					echo '<input name="header_text_color" id="header-bg-color" type="text" value="'. esc_attr($header_text_color) .'" class="meta-color">';
					echo '</div>';
					echo '</div>';
				echo '</div>';

				echo '<br class="clear">';

			echo '</div>';

		echo '</div>';
	echo '</div>'; //end of .header-options


	echo ' </div>';


	echo '<div>';
		
	/**
	 * Portfolio Fields
	 */
	

	echo '<div id="pix-portfolio-options" class="show_portfolio_options" style="display:none">';

		//Portfolio Layout
		echo '<div id="pix-portfolio-layout-style" class="float-clear">';
			echo '<div class="pix-pull-left">';
			echo '<h5 class="pix-sub-title">'.__('Portfolio Layout:','pixel8es'). '</h5>';
			echo '<p>'.__('Choose Portfolio Layout style.','pixel8es').'</p>';
			echo '</div>';

			echo '<div class="select-style"> <select class="pix-switch portfolio-styles" name="pix_portfolio_layout">';
			echo '<option value="grid"'. (($pix_portfolio_layout == "grid") ? ' selected="selected"' : ''). '>' . 'Grid'. '</option>';
			echo '<option value="masonry"'. (($pix_portfolio_layout == "masonry") ? ' selected="selected"' : ''). '>' . 'Masonry'. '</option>'; 
			echo '</select></div>';
		echo '</div>';

		//Portfolio Styles
		echo '<div id="pix-portfolio-styles">';
		echo '<div class="pix-pull-left">';
			echo '<h5 class="pix-sub-title">'.__('Portfolio Styles:','pixel8es'). '</h5>';
		echo '</div>';	
		
			echo '<div class="select-style"><select class="portfolio-styles" name="pix_portfolio_styles">';
			echo '<option value="extended"'. (($pix_portfolio_styles == "extended") ? ' selected="selected"' : ''). '>' . 'Extended'. '</option>';
			echo '<option value="boxed"'. (($pix_portfolio_styles == "boxed") ? ' selected="selected"' : ''). '>' . 'Boxed'. '</option>'; 
			echo '<option value="boxed_margin"'. (($pix_portfolio_styles == "boxed_margin") ? ' selected="selected"' : ''). '>' . 'Boxed with margin'. '</option>'; 
			echo '</select></div>
			<p>'.__('Choose a Portfolio Page Style. <br><strong>Extended:</strong> Portfolio display from the browser edge. <br><strong>Boxed:</strong> Portfolio display centered & inside container.<br><strong>Boxed with margin:</strong> Same as above but display with margin.','pixel8es').'</p>';
		echo '</div>';

		//Column Settings
		$style = '';
		if ($pix_portfolio_styles == 'extended'){
			$style = ' style="display:none";';
		}
		echo '<div id="pix-columns" '. $style .' class="float-clear">';
			echo '<div class="pix-pull-left">';	
			echo '<h5 class="pix-sub-title">'.__('Portfolio Columns:','pixel8es'). '</h5>';
			echo '<p>'.__('Choose the columns:','pixel8es').'</p>';
echo '</div>';
			echo '<div class="select-style"> <select name="no_of_columns" class="widefat">';
			//echo '<option value="col1"'. (($columns == "col1") ? ' selected="selected"' : ''). '>' . 'One Column'. '</option>';
			echo '<option value="col2"'. (($columns == "col2") ? ' selected="selected"' : ''). '>' . 'Two Columns'. '</option>'; 
			echo '<option value="col3"'. (($columns == "col3") ? ' selected="selected"' : ''). '>' . 'Three Columns'. '</option>'; 
			echo '<option value="col4"'. (($columns == "col4") ? ' selected="selected"' : ''). '>' . 'Four Columns'. '</option>'; 
			echo '</select></div>';
		echo '</div>';

		//Portfolio Hover Styles
		echo '<h5 class="pix-sub-title">'.__('Portfolio Hover Styles:','pixel8es'). '</h5>';
		echo '<p>'.__('This theme consists of 6 hover style. Choose a Hover style,:','pixel8es');
		echo '<ul class="portfolio_hover_styles float-clear">';
			echo '<li>';
			echo '<input type="radio" name="pix_portfolio_hover_styles"' . ((isset($pix_portfolio_hover_styles) && $pix_portfolio_hover_styles=="style1") ? "checked" : '') . ' value="style1">';
			echo '<a href="#" class=""><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/phsone.png" alt="" />
			<i class="icon pixicon-eleganticons-45"></i>
			</a>';
			echo '</li>';

			echo '<li>';
			echo '<input type="radio" name="pix_portfolio_hover_styles"' . ((isset($pix_portfolio_hover_styles) && $pix_portfolio_hover_styles=="style2") ? "checked" : '') . ' value="style2">';
			echo '<a href="#" class=""><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/phstwo.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>
			</a>';
			echo '</li>';

			echo '<li>';
			echo '<input type="radio" name="pix_portfolio_hover_styles"' . ((isset($pix_portfolio_hover_styles) && $pix_portfolio_hover_styles=="style3") ? "checked" : '') . ' value="style3">';
			echo '<a href="#" class=""><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/phsthree.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>
			</a>';
			echo '</li>';

			echo '<li>';
			echo '<input type="radio" name="pix_portfolio_hover_styles"' . ((isset($pix_portfolio_hover_styles) && $pix_portfolio_hover_styles=="style4") ? "checked" : '') . ' value="style4">';
			echo '<a href="#" class=""><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/phsfour.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>
					</a>';
			echo '</li>';

			echo '<li>';
			echo '<input type="radio" name="pix_portfolio_hover_styles"' . ((isset($pix_portfolio_hover_styles) && $pix_portfolio_hover_styles=="style5") ? "checked" : '') . ' value="style5">';
			echo '<a href="#" class=""><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/phsfive.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>
			</a>';
			echo '</li>';

			echo '<li>';
			echo '<input type="radio" name="pix_portfolio_hover_styles"' . ((isset($pix_portfolio_hover_styles) && $pix_portfolio_hover_styles=="style6") ? "checked" : '') . ' value="style6">';
			echo '<a href="#" class=""><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/phssix.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>
			</a>';
			echo '</li>';

		echo '</ul>';
		echo '</p>';

		//Filterable
		echo '<div id="pix-filter-options">';

			echo '<div id="pix-is-filterable" class="float-clear">';
				echo '<div class="pix-pull-left">';
					echo '<h5 class="pix-sub-title">'.__('Filterable:','pixel8es'). '</h5>';
					echo '<p>'.__('If yes, filter menu will dispaly','pixel8es').'</p>';
				echo '</div>';

				echo '<div class="select-style on-off-switch"> <select name="pix_filterable" class="widefat pix-switch">';
				echo '<option value="yes"'. (($pix_filterable == "yes") ? ' selected="selected"' : ''). '>' . __('Yes','pixel8es'). '</option>';
				echo '<option value="no"'. (($pix_filterable == "no") ? ' selected="selected"' : ''). '>' . __('No','pixel8es'). '</option>'; 
				echo '</select></div>';
			echo '</div>';

			echo '<div id="pix-filter-style" class="float-clear">';
				echo '<div class="pix-pull-left">';
					echo '<h5 class="pix-sub-title">'.__('Filter Style:','pixel8es'). '</h5>';
					echo '<p>'.__('Choose filter style','pixel8es').'</p>';
				echo '</div>';	
				echo '<div class="select-style"><select name="pix_filter_style" class="widefat pix-switch">';
				echo '<option value="normal simple"'. (($pix_filter_style == "normal simple") ? ' selected="selected"' : ''). '>' . __('Simple style','pixel8es'). '</option>';
				echo '<option value="dropdown"'. (($pix_filter_style == "dropdown") ? ' selected="selected"' : ''). '>' . __('Dropdown style','pixel8es') . '</option>';
				echo '<option value="normal"'. (($pix_filter_style == "normal") ? ' selected="selected"' : ''). '>' . __('Menu style','pixel8es'). '</option>'; 
				echo '</select></div>';
			echo '</div>';

			echo '<div id="pix-lightbox" class="float-clear">';
				echo '<div  class="pix-pull-left">';
					echo '<h5 class="pix-sub-title">'.__('Lightbox:','pixel8es'). '</h5>';
					echo '<p>'.__('Do you want to display lightbox?','pixel8es').'</p>';
				echo '</div>';
				echo '<div class="select-style on-off-switch"><select name="pix_lightbox" class="widefat pix-switch">';
				echo '<option value="yes"'. (($pix_lightbox == "yes") ? ' selected="selected"' : ''). '>' . __('Yes','pixel8es') . '</option>';
				echo '<option value="no"'. (($pix_lightbox == "no") ? ' selected="selected"' : ''). '>' . __('No','pixel8es'). '</option>'; 
				echo '</select></div>';
			echo '</div>';

			echo '<div id="pix-single-portfolio-link" class="float-clear">';
			 echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Single Portfolio Link:','pixel8es'). '</h5>';
				echo '<p>'.__('Do you want to display single portfolio link?','pixel8es').'</p>';
			 echo '</div>';
				echo '<div class="select-style on-off-switch"> <select name="pix_single_portfolio_link" class="widefat pix-switch">';
				echo '<option value="yes"'. (($pix_single_portfolio_link == "yes") ? ' selected="selected"' : ''). '>' . __('Yes','pixel8es') . '</option>';
				echo '<option value="no"'. (($pix_single_portfolio_link == "no") ? ' selected="selected"' : ''). '>' . __('No','pixel8es'). '</option>'; 
				echo '</select></div></p>';
			echo '</div>';

			echo '<div id="pix-share" class="float-clear">';
				echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Order:','pixel8es'). '</h5>';
				echo '<p>'.__('Sorting method of portfolio items','pixel8es').'</p>';
				echo '</div>';
				echo '<div class="select-style"> <select name="pix_order" class="widefat pix-switch">';
				echo '<option value="asc"'. (($pix_order == "asc") ? ' selected="selected"' : ''). '>' . __('Ascending','pixel8es') . '</option>';
				echo '<option value="desc"'. (($pix_order == "desc") ? ' selected="selected"' : ''). '>' . __('Descending','pixel8es'). '</option>'; 
				echo '</select></div></p>';
			echo '</div>';

			echo '<div id="pix-order-by" class="float-clear">';
				echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Order By:','pixel8es'). '</h5>';
				echo '<p>'.__('How to sort the portfolio items?','pixel8es').'</p>';
				echo '</div>';
				echo '<div class="select-style"> <select name="pix_order_by" class="widefat">';
				echo '<option value="date"'. (($pix_order_by == "date") ? ' selected="selected"' : ''). '>' . __('Date','pixel8es') . '</option>';
				echo '<option value="title"'. (($pix_order_by == "title") ? ' selected="selected"' : ''). '>' . __('Title','pixel8es'). '</option>';
				echo '<option value="rand"'. (($pix_order_by == "rand") ? ' selected="selected"' : ''). '>' . __('Random','pixel8es'). '</option>'; 
				echo '</select></div>';
			echo '</div>';

			echo '<div id="pix-like" class="float-clear">';
				echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Like Button:','pixel8es'). '</h5>';
				echo '<p>'.__('Do you want to display like button?','pixel8es').'</p>';
				echo '</div>';
				echo '<div class="select-style on-off-switch"> <select name="pix_like" class="widefat pix-switch">';
				echo '<option value="yes"'. (($pix_like == "yes") ? ' selected="selected"' : ''). '>' . __('Yes','pixel8es') . '</option>';
				echo '<option value="no"'. (($pix_like == "no") ? ' selected="selected"' : ''). '>' . __('No','pixel8es'). '</option>'; 
				echo '</select></div>';
			echo '</div>';

			echo '<div id="pix-share" class="float-clear">';
				echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Share Button:','pixel8es'). '</h5>';
				echo '<p>'.__('Do you want to display share button?','pixel8es').'</p>';
				echo '</div>';
				echo '<div class="select-style on-off-switch"><select name="pix_share" class="widefat pix-switch">';
				echo '<option value="yes"'. (($pix_share == "yes") ? ' selected="selected"' : ''). '>' . __('Yes','pixel8es') . '</option>';
				echo '<option value="no"'. (($pix_share == "no") ? ' selected="selected"' : ''). '>' . __('No','pixel8es'). '</option>'; 
				echo '</select></div>';
			echo '</div>';

			echo '<br class="clear">';
		echo '</div>';
		

		//No of posts
		echo '<div>';
			echo '<div class="pix-portfolio-items float-clear">';
				echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Number of Portfolio Items','pixel8es'). '</h5>';
				echo '<p>';
				echo '<label for="no_of_posts_per_page">'.__('Enter how many items you want to display <br>(posts per page)','pixel8es').':</label>';
				echo '</p>';
				echo '</div>';
				echo '<div class="pix-pull-left">';
				echo '<input type="text" class="widefat" name="pix_portfolio_per_page" id="no_of_posts_per_page" value="'. $pix_portfolio_per_page.'">';
				echo "<em>enter '-1' to display all portfolio items</em>";
				echo '</div>';
			echo '</div>';
			//Pagination
			echo '<div class="pix-pagination float-clear">';
				echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Pagination','pixel8es'). '</h5>';
				echo '<p>'.__('Do you like display pagination? It helps you to display portfolio in multiple pages','pixel8es').'</p>';
				echo '</div>';
				echo '<div class="select-style on-off-switch"><select name="pix_pagination" class="widefat pix-switch">';

				echo '<option value="yes"'. (($pix_pagination == "yes") ? ' selected="selected"' : ''). '>' . 'Yes'. '</option>';
				echo '<option value="no"'. (($pix_pagination == "no") ? ' selected="selected"' : ''). '>' . 'No'. '</option>'; 
				echo '</select></div>';
				
				echo '<br class="clear">';
				echo '</div>';
			echo '</div>';
	echo '</div>';

	echo '</div>';

	echo '<div>';
	
	/* Layout Setting */
	
	echo '<div id="pix-layout-options">';
		//Layout Settings
		echo '<h5 class="pix-sub-title">'.__('Layout Settings:','pixel8es'). '</h5>';
		echo '<p>'.__('Choose Layout for this page','pixel8es');
		echo '<ul class="sidebar_position">';

			echo '<li>';
			echo '<input type="radio" name="sidebar_position"' . ((isset($sidebar_position) && $sidebar_position=="full_width") ? "checked" : '') .' value="full_width">';
			echo '<a href="#"><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/full_width.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>
			</a>';
			echo '</li>';

			echo '<li>';
			echo '<input type="radio" name="sidebar_position"' . ((isset($sidebar_position) && $sidebar_position=="no_sidebar") ? "checked" : '') .' value="no_sidebar">';
			echo '<a href="#"><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/no_sidebar.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>	
			</a>';
			echo '</li>';

			echo '<li>';
			echo '<input type="radio" name="sidebar_position"' . ((isset($sidebar_position) && $sidebar_position=="left") ? "checked" : '') .' value="left">';
			echo '<a href="#"><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/left_sidebar.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>
			</a>';
			echo '</li>';

			echo '<li>';
			echo '<input type="radio" name="sidebar_position"' . ((isset($sidebar_position) && $sidebar_position=="right") ? "checked" : '') .' value="right">';
			echo '<a href="#"><img src="'.THEME_CUSTOM_METABOXES_URI.'/img/right_sidebar.png" alt="" />
				<i class="icon pixicon-eleganticons-45"></i>
			</a>';
			echo '</li>';

		echo '</ul>';
		echo '</p>';

		//Multiple Sidebar
		echo '<div id="select_sidebar" class="float-clear">';
		echo '	<div class="pix-pull-left">';
			echo '<h5 class="pix-sub-title">'.__('Choose Sidebar for this page:','pixel8es'). '</h5>';
			echo "<p>";
			_e('Please select the sidebar you would like to display on this page. <strong>Note:</strong> You can create the sidebar under Appearance > Sidebars','pixel8es');
			echo "</p>";
		echo '</div>';

		echo '	<div class="pix-pull-left">';
		    global $wp_registered_sidebars;
		    //var_dump($wp_registered_sidebars);		
		    ?>
		  
			<div class="select-style"> <select name="selected_sidebar_replacement" class="widefat">
				<option value="0"<?php if($selected_sidebar_replacement == '' && $selected_sidebar_replacement == '0'){ echo " selected";} ?>>Primary Sidebar</option>
			<?php
			
			$sidebar_replacements = $wp_registered_sidebars;//sidebar_generator::get_sidebars();
			
			if(is_array($sidebar_replacements) && !empty($sidebar_replacements)){
				foreach($sidebar_replacements as $sidebar){
					if ($sidebar['id'] != 'primary-sidebar'){
						if($selected_sidebar_replacement == $sidebar['id']){
							echo "<option value='{$sidebar['id']}' selected>{$sidebar['name']}</option>\n";
						}else{
							echo "<option value='{$sidebar['id']}'>{$sidebar['name']}</option>\n";
						}
					}
				}
			}
			
			echo '</select></div>';
		echo '</div>';

		echo '</div>';

			
	echo '</div>';

		echo '<div id="pix-dot-navigation" class="wrap-clear">';
			echo '<div class="pix-pull-left">';
				echo '<h5 class="pix-sub-title">'.__('Dot Navigation:','pixel8es'). '</h5>';
				echo '<p>'.__('Do you want dot Navigation?','pixel8es').'</p>';
			echo '</div>';

			echo '<div class="select-style on-off-switch"><select class="display-header pix-switch" name="show_dot_nav" id="show_dot_nav">';
			echo '<option selected value="show"'. (($show_dot_nav == "show") ? ' selected="selected"' : ''). '>' . 'Show'. '</option>';
			echo '<option value="hide"'. (($show_dot_nav == "hide") ? ' selected="selected"' : ''). '>' . 'Hide'. '</option>';
			echo '</select></div>';
		echo '</div>';

echo '</div>';


echo '</div> ';

	echo '</div>';
}






//Saving Custom Meta Box Values
function saving_page_options(){
	global $post;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
	$pix_nonce = isset($_POST['pix_nonce']) ? $_POST['pix_nonce'] : '';
	$values = array();
	//Security Check Nonce	
	if($_POST && wp_verify_nonce($pix_nonce, __FILE__)){

		if(	isset($_POST['sidebar_position']) || 
			isset($_POST['selected_sidebar_replacement']) || 
			isset($_POST['pix_header_text']) || 
			isset($_POST['pix_header_styles']) || 
			isset($_POST['header_bg_image']) || 
			isset($_POST['header_bg_color']) || 
			isset($_POST['header_text_color']) || 
			isset($_POST['header_size']) || 
			isset($_POST['display_header']) ||
			isset($_POST['header_breadcrumbs']) ||
			isset($_POST['show_dot_nav']) ){
			
				$values = array(					
					'sidebar_position' => $_POST['sidebar_position'],
					'selected_sidebar_replacement' => $_POST['selected_sidebar_replacement'],
					'pix_header_text' => $_POST['pix_header_text'],
					'pix_header_styles' => $_POST['pix_header_styles'],
					'header_bg_image' => htmlspecialchars($_POST['header_bg_image']),
					'header_bg_color' => $_POST['header_bg_color'],
					'header_text_color' => $_POST['header_text_color'],
					'header_size' => $_POST['header_size'],
					'display_header' => $_POST['display_header'],
					'header_breadcrumbs' => $_POST['header_breadcrumbs'],
					'show_dot_nav' => $_POST['show_dot_nav']
				);
		}	

		if(isset($_POST['page_template']) && $_POST['page_template'] == 'page-template/page-portfolio.php'){

			if( isset($_POST['no_of_columns']) || 
				isset($_POST['pix_filterable']) || 
				isset($_POST['pix_filter_style']) || 
				isset($_POST['pix_pagination']) || 
				isset($_POST['pix_portfolio_per_page']) || 
				isset($_POST['pix_portfolio_layout']) || 
				isset($_POST['pix_portfolio_styles']) ||
				isset($_POST['pix_lightbox'])||
				isset($_POST['pix_portfolio_hover_styles']) ){

					$values['columns'] = $_POST['no_of_columns'];
					$values['pix_filterable'] = $_POST['pix_filterable'];
					$values['pix_filter_style'] = $_POST['pix_filter_style'];
					$values['pix_pagination'] = $_POST['pix_pagination'];
					$values['pix_lightbox'] = $_POST['pix_lightbox'];
					$values['pix_share'] = $_POST['pix_share'];
					$values['pix_like'] = $_POST['pix_like'];
					$values['pix_order_by'] = $_POST['pix_order_by'];
					$values['pix_order'] = $_POST['pix_order'];
					$values['pix_single_portfolio_link'] = $_POST['pix_single_portfolio_link'];
					$values['pix_portfolio_per_page'] = $_POST['pix_portfolio_per_page'];
					$values['pix_portfolio_layout'] = $_POST['pix_portfolio_layout'];
					$values['pix_portfolio_styles'] = $_POST['pix_portfolio_styles'];
					$values['pix_portfolio_hover_styles'] = $_POST['pix_portfolio_hover_styles'];

			}
		}

		update_post_meta($post->ID, 'electrify_page_options', $values);
	}


}
add_action('save_post', 'saving_page_options');



