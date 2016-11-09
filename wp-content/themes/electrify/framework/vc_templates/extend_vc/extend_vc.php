<?php 
//Animation
$animation = array('flash','bounce','shake','tada','swing','wobble','pulse','flip','flipInX','flipInY','fadeIn','fadeInUp','fadeInDown','fadeInLeft','fadeInRight','fadeInUpBig','fadeInDownBig','fadeInLeftBig','fadeInRightBig','slideInDown','slideInLeft','slideInRight','bounceIn','bounceInUp','bounceInDown','bounceInLeft','bounceInRight','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','lightSpeedIn','hinge','rollIn');

$theme_default = '#fcc21f';

//Add new param to vc
function icon_field($settings, $value) {
	$dependency = vc_generate_dependencies_attributes($settings);
	return '<div class="icon_field menu-item-settings">'
	.'<input type="hidden" class="edit-menu-item-icon wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" name="'.$settings['param_name'].'" value="'.$value.'" ' . $dependency . '/>

	<span class="pix-inserted-icon"></span>

	<a href="#" class="button pix-insert-menu-icon"><i class="fa fa-arrow-circle-o-down"></i> '. __('Insert Icon', 'pixel8es') .'</a>
	<a href="#" class="button pix-remove-menu-icon hidden"><i class="fa fa-times"></i> '. __('Remove Icon', 'pixel8es') .'</a>
</div>';
}
@add_shortcode_param('icon', 'icon_field', THEME_FUNCTIONS_URI .'/pix-menu-extend/js/dialog.js');

// Pie Chart
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_carousel_js");



//Theme primary colors as bg
vc_add_param("vc_row",array(
       "type" => "dropdown",
       "heading" => __("Do you want to use Dot Navigation?", "js_composer"),
       "param_name" => "dot_nav",
       "value" => array( __('No', "js_composer") => "no", __('Yes', "js_composer") => "yes" ),
       "description" => __("Choose Yes if you want to appear dot navigation for this row.", "js_composer")
));

// VC ROW
vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => __("Dot Navigation Text", "js_composer"),
	"param_name" => "dot_nav_text",
	"value" => "",
	"description" => "Enter the id if you like to use single page (or) Anchor navigation.",
    "dependency" => Array('element' => "dot_nav", 'value' => array('yes'))
	));

// VC ROW
vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => __("Anchor Id", "js_composer"),
	"param_name" => "anchor_id",
	"value" => "",
	"description" => "Enter the id if you like to use single page (or) Anchor navigation."
	));

//Theme primary colors as bg
vc_add_param("vc_row",array(
       "type" => "dropdown",
       "heading" => __("Use theme primary color as background Color", "js_composer"),
       "param_name" => "theme_primary",
       "value" => array( __('No', "js_composer") => "no", __('Yes', "js_composer") => "yes" ),
       "description" => __("Choose yes if you like to theme primary color as background color", "js_composer"),
       'group' => __( 'Design options', 'js_composer' )
));

//bg color opacity
vc_add_param("vc_row", array(
       "type" => "textfield",
       "heading" => __("Enter Alpha Value, if you like to use alpha transparency in bg (rgba)", "js_composer"),
       "param_name" => "theme_primary_alpha",
       "value" => "1",
       "description" => __("Enter alpha transparency value (should be inbetween 0.1 to 1 Ex: 0.7)", "js_composer"),
       "dependency" => Array('element' => "theme_primary", 'value' => array('yes')),
       'group' => __( 'Design options', 'js_composer' )
       ));

// VC ROW
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Row Type", "js_composer"),
	"param_name" => "type",
	"value" => array(__('Normal', "js_composer") => "normal", 
					 __('Full Width', "js_composer") => "full-width", 
					 __('Expandable', "js_composer") => "expandable"),
	"description" => __("Choose the Type of Row.<br> <b>Normal</b> => Just a normal section (boxed),<br> <b>Full Width</b> => Choose this if you want full background image / color or video background etc,<br> <b>Exapandable</b> => Choose this to Snaps the content to the edge of the screen (eg: Full width portfolio).", "js_composer"),
	));

//Social 
vc_map( array(
	"name" => __("Social Icons", "js_composer"), //Title
	"base" => "social", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array()
));

//Color Style
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Text Color", "js_composer"),
	"param_name" => "color_style",
	"value" => array(__('Black', "js_composer") => "dark",
					 __('White', "js_composer") => "light"),
	"description" => __("Choose the font color you want to apply. <br> Alternatively you can choose your own color at the top of this section", "js_composer"),
	));

//Video
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => __("Video background", "js_composer"),
	"param_name" => "video",
	"value" => array(__("Use video background?", "js_composer") => "video_bg" ),
	"description" => __("Do you like add video background for this section", "js_composer"),
	"dependency" => Array('element' => "type", 'value' => array('full-width'))
	));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background url for (webm) file", "js_composer"),
	"param_name" => "video_webm",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('video_bg'))
	));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background url for (mp4) file", "js_composer"),
	"param_name" => "video_mp4",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('video_bg'))
	));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background url for (ogg) file", "js_composer"),
	"param_name" => "video_ogg",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('video_bg'))
	));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => __("Video preview image", "js_composer"),
	"value" => "",
	"param_name" => "video_image",
	"description" => __("This image will apply before video loads", "js_composer"),
	"dependency" => Array('element' => "video", 'value' => array('video_bg'))
	));

// Parallax Option
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Parallax", "js_composer"),
	"param_name" => "parallax",
	"value" => array(__('No', "js_composer") => "no", 
					 __('Yes', "js_composer") => "yes"),
	"description" => __("Do You like to enable Parallax Section? If yes don't forget to add background image", "js_composer"),
	"dependency" => Array('element' => "type", 'value' => array('full-width'))
	));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => __("Parallax Ratio", "js_composer"),
	"param_name" => "parallax_ratio",
	"value" => "0.5",
	"description" => __("Enter the parallax ratio. This affect the parallax movement speed. The value should be in between 0.1 to 2. The ratio is relative to the natural scroll speed, so a ratio of 0.5 would cause the element to scroll at half-speed, a ratio of 1 would have no effect, and a ratio of 2 would cause the element to scroll at twice the speed. <strong>Default value is 0.5</strong>", "js_composer"),
	"dependency" => Array('element' => "parallax", 'value' => array('yes'))
	));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => __("Parallax Offset", "js_composer"),
	"param_name" => "parallax_offset",
	"value" => "",
	"description" => __("<strong>Leave it empty to apply default.</strong> Enter the parallax offset. All elements will return to their original positioning when their offset parent meets the edge of the screen-plus or minus your own optional offset. This allows you to create intricate parallax patterns very easily.", "js_composer"),
	"dependency" => Array('element' => "parallax", 'value' => array('yes'))
	));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Overlay style", "js_composer"),
	"param_name" => "overlay",
	"value" => array(__('None', "js_composer") => "none",
					 __('Pattern', "js_composer") => "pattern",
					 __('Solid color (With alpha or opacity)', "js_composer") => "color"),
	"description" => __("You can add overlay on top of the image to see text better.<br> Choose <b>\"None\"</b> to disable,<br> <b>\"Pattern\"</b> to apply pattern and <br><b>\"Solid color\"</b> to apply color with alpha", "js_composer"),
	"dependency" => Array('element' => "type", 'value' => array('full-width'))
	));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Overlay color", "js_composer"),
	"param_name" => "overlay_color",
	"value" => '',
	"description" => __("Choose Overlay color and don't forget to adjust opacity", "js_composer"),
	"dependency" => Array('element' => "overlay", 'value' => array('color'))
	));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Background Pattern", "js_composer"),
	"param_name" => "pattern_style",
	"value" => array(__('Style 1', "js_composer") => "style1", 
					 __('Style 2', "js_composer") => "style2", 
					 __('Style 3', "js_composer") => "style3", 
					 __('Style 4', "js_composer") => "style4", 
					 __('Style 5', "js_composer") => "style5"),
	"description" => __("Choose a pattern style", "js_composer"),
	"dependency" => Array('element' => "overlay", 'value' => 'pattern'),
	));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => __("Pattern Opacity", "js_composer"),
	"param_name" => "pattern_opacity",
	"value" => "1",
	"description" => __("Enter the opactiy value for pattern, Value inbetween .1 to 1", "js_composer"),
	"dependency" => Array('element' => "overlay", 'value' => array('pattern'))
	));

//Line shortcode
vc_map( array(
	"name" => __("seperator Line", "js_composer"), //Title
	"base" => "line", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Line Style", "js_composer"),
            "param_name" => "line_style",
			"admin_label" => true,
            "value" => array(__('Line Style1', "js_composer") => "line-style1", 
                             __('Line Style2', "js_composer") => "line-style2",
                             __('Line Style3', "js_composer") => "line-style3",
                             __('Line Style4', "js_composer") => "line-style4",
                             __('Line Style5', "js_composer") => "line-style5"),
            "description" => __("Do you like to animate this element", "js_composer"),
           
            ),

		array(
			"type" => "textfield",
			"heading" => __("Width in px", "js_composer"),
			"param_name" => "width",
			"value" => "",
			"description" => __("Enter Width in Pixels or in percent (eg: 50px or 50%), Leave empty to apply default 75px", "js_composer"),
             "dependency" => Array('element' => "line_style", 'value' => array('line-style1'))
			),
            
            

		array(
			"type" => "textfield",
			"heading" => __("Line Thickness in px", "js_composer"),
			"param_name" => "thickness",
			"value" => "",
			"description" => __("Enter thickness in Pixels (eg: 4px), Leave empty to apply default 1px", "js_composer"),
             "dependency" => Array('element' => "line_style", 'value' => array('line-style1'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Align", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Align left', "js_composer") => "left alignLeft", __('Align center', "js_composer") => "center alignCenter",  __('Align right', "js_composer") => "right alignRight"),
			"description" => ''
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Line color", "js_composer"),
			"param_name" => "color", //Shortcode_attr name
			"value" => '', //Default Red color
			"description" => __("Choose line color if you want custom color, leave empty to apply theme default", "js_composer"),
            "dependency" => Array('element' => "line_style", 'value' => array('line-style1'))
			)
		)
) );

// Blog
vc_map( array(
	"name" => __("Recent Blog", "js_composer"), //Title
	"base" => "blog", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Insert Blog Post By", "js_composer"),
			"param_name" => "insert_type",
			"admin_label" => true,
			"value" => array(__('Blog Posts', "js_composer") => "posts", 
				__('Blog Post Id', "js_composer") => "id", __('Blog Post Category', "js_composer") => "category"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("No. of Recentblog", "js_composer"),
			"param_name" => "no_of_items",
			"value" => -1,
			"dependency" => Array('element' => "insert_type", 'value' => array('posts','category')),
			"description" => __("Enter the number of Posts you want to display (only numbers), Enter -1 for all posts", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Post Id", "js_composer"),
			"param_name" => "blog_post_id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'id'),
			"description" => __("Enter the blog post ids seperated by commas (,). Example: 2,54,8", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Exclude Post", "js_composer"),
			"param_name" => "exclude_blog_post",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => array('posts','category')),
			"description" => __("Enter the exclude blog post ids seperated by commas (,). Example: 2,54,8", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Category Name", "js_composer"),
			"param_name" => "blog_post_category",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'category'),
			"description" => __("Enter the blog post category seperated by commas (,). Example: design,illustration,print", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "js_composer"),
			"param_name" => "order_by",
			"value" => array( __('Date', "js_composer") => "date",  
							  __('Rand', "js_composer") => "rand",
							  __('ID', "js_composer") => "ID", 
							  __('Title', "js_composer") => "title", 
							  __('Author', "js_composer") => "author",
							  __('Name', "js_composer") => "modified",
							  __('Parent', "js_composer") => "parent",
							  __('Date Modified', "js_composer") => "date",
							  __('Menu Order', "js_composer") => "menu_order",
							  __('None', "js_composer") => "none"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("Order posts By choosen order", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order", "js_composer"),
			"param_name" => "order",
			"value" => array( __('Ascending order', "js_composer") => "ASC",  
							  __('descending order', "js_composer") => "DESC"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("In which Order, you want to display posts", "js_composer")
			), 

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "js_composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Date", "js_composer"),
			"param_name" => "display_date",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => __('Do you like to display date in post', "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "js_composer"),
			"param_name" => "style",
			"value" => array( __('style 1', "js_composer") => "style1",  
							  __('style 2', "js_composer") => "style2"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Number of Columns", "js_composer"),
			"param_name" => "columns",
			"value" => array(__('3 Columns', "js_composer") => "col3",
							 __('4 Columns', "js_composer") => "col4"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Comments", "js_composer"),
			"param_name" => "display_comments",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => __('Do you like to display comments number in post', "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Blog Desc", "js_composer"),
			"param_name" => "blog_desc",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => __('Do you like to display short description', "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Slider", "js_composer"),
			"param_name" => "slider",
			"value" => array( __('Yes', "js_composer") => "yes",
							  __('No', "js_composer") => "no"),
			"description" => __("Do you like use this as carousel?", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay", "js_composer"),
			"param_name" => "autoplay",
			"value" => "4000",
			"description" => __("Enter the Value in milesecond (Ex: 5000), Enter 'false' to disable autoplay.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Slide Speed", "js_composer"),
			"param_name" => "slide_speed",
			"value" => "500",
			"description" => __("Enter the Value in milesecond (Ex: 500)", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "js_composer"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),        

		array(
			"type" => "dropdown",
			"heading" => __("Arrow Style", "js_composer"),
			"param_name" => "arrow_type",
			"value" => array( __('Default', "js_composer") => "",
							  __('Arrow Top Right', "js_composer") => "arrow-style2"),
			"description" => __("Where you want to display arrow", "js_composer"),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "js_composer"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Auto Height", "js_composer"),
			"param_name" => "slider_height",
			"value" => array( __('No', "js_composer") => "false",
							  __('Yes', "js_composer") => "true"),
			"description" => __("By Enabling this, slider height will vary depends on content for each slide. Please turn off this if you have more content below Blog to avoid page moving.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Stop On Hover", "js_composer"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => '',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			), 

		array(
			"type" => "dropdown",
			"heading" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "js_composer"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),  
		) 
) ); 

// Video Popup
vc_map( array(
	"name" => __("Video Popup", "js_composer"), //Title
	"base" => "video_popup", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Enter the Url", "js_composer"),
			"param_name" => "url",
			"value" => "Title",
			"description" => __("Please Enter the You-Tube or Vimeo Url.", "js_composer")
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Popup Trigger", "js_composer"),
			"param_name" => "title_format",
			"value" => array(__('Icon', "js_composer") =>'icon',
							 __('Text', "js_composer") =>'title'),
			"description" => __("Trigger Popup by text or icon.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Trigger Text", "js_composer"),
			"param_name" => "text",
			"value" => "Title",
			"description" => __("Enter the trigger text.", "js_composer"),
			"dependency" => Array('element' => "title_format", 'value' => array('title'))
			),

		array(
			"type" => "icon",
			"heading" => __("Trigger Icon", "js_composer"),
			"param_name" => "icon_name",
			"value" => '',
			"description" => __("Select Trigger icon.", "js_composer"),
			"dependency" => Array('element' => "title_format", 'value' => array('icon'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Align Center', "js_composer") => "center", 
							 __('Align Left', "js_composer") => "left", 
							 __('Align Right', "js_composer") => "right"),
			"description" => __("Select icon box alignment.", "js_composer")
			),
		)
) );

// Icon Box
vc_map( array(
	"name" => __("Icon Box", "js_composer"), //Title
	"base" => "icon_box", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Insert Font icon or Image icon", "js_composer"),
			"param_name" => "icon_type",
			"value" => array(__('Font Icon', "js_composer") =>'icon',
							 __('Image Icon', "js_composer") =>'image'),
			"description" => '',
			"dependency" => Array('element' => "icon_image_con", 'value' => array('no')),
			"group"	=> __('Icon', 'js_composer')
			),

		array(
			"type" => "icon",
			"heading" => __("Insert Icon", "js_composer"),
			"param_name" => "icon_name",
			"value" => '',
			"description" => '',
			"dependency" => Array('element' => "icon_type", 'value' => array('icon')),
			"group"	=> __('Icon', 'js_composer')
			),

		array(
			"type" => "attach_image",
			"heading" => __("Image Icon", "js_composer"),
			"param_name" => "icon_img",
			"value" => "",
			"description" => __("Select a icon image from media library.", "js_composer"),
			"dependency" => Array('element' => "icon_type", 'value' => array('image')),
			"group"	=> __('Icon', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Use Image instead of icon", "js_composer"),
			"param_name" => "icon_image_con",
			"value" => array(__('No', "js_composer") =>'no',
					 __('Yes', "js_composer") =>'yes'),
			"description" => __('If you choose yes you can insert large image instead of icon (act as image box)', "js_composer"),
			"group"	=> __('Icon', 'js_composer')
			),

		array(
			"type" => "attach_image",
			"heading" => __("Image Icon", "js_composer"),
			"param_name" => "icon_image",
			"value" => "",
			"description" => __("Select a icon image from media library.", "js_composer"),
			"dependency" => Array('element' => "icon_image_con", 'value' => array('yes')),
			"group"	=> __('Icon', 'js_composer')
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Insert Font icon or Image icon", "js_composer"),
			"param_name" => "icon_image_style",
			"value" => array(__('Square', "js_composer") =>'rectangle',
							 __('Circle', "js_composer") =>'rounded'),
			"description" => '',
			"dependency" => Array('element' => "icon_image_con", 'value' => array('yes')),
			"group"	=> __('Icon', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Style", "js_composer"),
			"param_name" => "icon_style",
			"value" => array(__('Default', "js_composer") => "bg-none",
							 __('Circle', "js_composer") => "circle",
							 __('Square', "js_composer") => "square",
							 __('Double Circle', "js_composer") => "double-circle",
							 __('Double Square', "js_composer") => "double-square",
							 __('Small Circle', "js_composer") => "double-circle small-circle",
							 __('Circle Front Square Back', "js_composer") => "square-front circle-front",
							 __('Square Front Circle Back', "js_composer") => "square-front",
							 __('Square Front Circle Back 2', "js_composer") => "square-front rotate-none",
							 __('Circle Inside Square', "js_composer") => "square-front circle-inside-square"),
			"description" => __("Select icon style.", "js_composer"),
			"group"	=> __('Icon', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Hover Icon", "js_composer"),
			"param_name" => "icon_hover",
			"value" => array(__('Yes', "js_composer") => "yes", 
							 __('No', "js_composer") => "no"),
			"description" => __("Do you want to Icon Hover Background?", "js_composer"),
			"group"	=> __('Icon', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Color", "js_composer"),
			"param_name" => "icon_color",
			"value" => array(__('Theme Default Color', "js_composer") => "color", 
							 __('Black', "js_composer") => "default"),
			"description" => __("Choose icon color.", "js_composer"),
			"group"	=> __('Icon', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "js_composer"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => __("Enter the title.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "js_composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Title Font Size?", "js_composer"),
			"param_name" => "custom_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px) or Leave it empty to apply theme default", "js_composer")
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Icon Box Content", "js_composer"),
			"param_name" => "content", 
			"value" => '', 
			"description" => __("Enter the Icon Box Content", "js_composer")
			),
		
		array(
			"type" => "dropdown",
			"heading" => __("Line", "js_composer"),
			"param_name" => "line",
			"value" => array(__('No', "js_composer") => "no",
							 __('Yes', "js_composer") => "yes"), 
			"description" => __("Display line below title?", "js_composer")
			),
                
        array(
			"type" => "dropdown",
			"heading" => __("Line Style", "js_composer"),
			"param_name" => "line_style",
			"value" => array(__('Line Style1', "js_composer") => "line-style1", 
                             __('Line Style2', "js_composer") => "line-style2",
                             __('Line Style3', "js_composer") => "line-style3",
                             __('Line Style4', "js_composer") => "line-style4",
                             __('Line Style5', "js_composer") => "line-style5"),
			"description" => __("Do you like to animate this element", "js_composer"),
            "dependency" => Array('element' => "line", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Button?", "js_composer"),
			"param_name" => "display_button",
			"value" => array(__('Yes', "js_composer") => "yes", 
							 __('No', "js_composer") => "no"),
			"description" => __("Do you want to display button in icon box?", "js_composer"),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Button Text", "js_composer"),
			"param_name" => "button_text",
			"value" => "Read More",
			"description" => __("Enter the Button Text", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "js_composer"),
			"param_name" => "button_link",
			"value" => "",
			"description" => __("Enter the button link", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "js_composer"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "js_composer") => "outline", 
							 __('Solid', "js_composer") => "solid", 
							 __('Default', "js_composer") => "simple"),
			"description" => __("Select button style", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "js_composer"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "js_composer") => "color", 
							 __('black', "js_composer") => "no-color",
							 __('white', "js_composer") => "white"), 
			"description" => __("Please choose button color", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "js_composer"),
			"param_name" => "button_size",
			"value" => array(__('Medium', "js_composer") => "md", 
							 __('Small', "js_composer") => "sm", 
							 __('Large', "js_composer") => "lg"),
			"description" => __("Select button size", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "icon",
			"heading" => __("Button Icon", "js_composer"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("Select button icon.", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Align Center', "js_composer") => "center", 
							 __('Align Left', "js_composer") => "left", 
							 __('Align Right', "js_composer") => "left right"),
			"description" => __("Select icon box alignment.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Description below Icon?", "js_composer"),
			"param_name" => "icon_align",
			"value" => array(__('No', "js_composer") => "no", 
							 __('Yes', "js_composer") => "yes"),
			"description" => __("Do you want to display description below the icon?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title and description under Icon?", "js_composer"),
			"param_name" => "icon_below",
			"value" => array(__('No', "js_composer") => "no", 
							 __('Yes', "js_composer") => "yes"),
			"description" => __("Do you like to Title and description under Icon?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Box Animation", "js_composer"),
			"param_name" => "animate",
			"value" => array(__('No', "js_composer") => "no", 
							 __('Yes', "js_composer") => "yes"),
			"description" => __("Do you like to animate this element", "js_composer"),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "js_composer"),

			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "js_composer"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "js_composer"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "js_composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
			),
		)
) );


// Icon Shortcode
vc_map( array(
	"name" => __("Icon", "js_composer"), //Title
	"base" => "icon", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "js_composer"),
			"param_name" => "align",			 
			"value" => array(__('Align center', "js_composer") => "center", 
							 __('Align left', "js_composer") => "left",
							 __('Align Right', "js_composer") => "right"),
			"description" => __("Select alignment.", "js_composer")
			),

		array(
			"type" => "icon",
			"heading" => __("Insert Icon", "js_composer"),
			"param_name" => "icon_name",
			"admin_label" => true,
			"value" => '',
			"description" => '',
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Style", "js_composer"),
			"param_name" => "icon_style",
			"value" => array(__('Default', "js_composer") => "bg-none",
							 __('Solid', "js_composer") => "solid",
							 __('Outline', "js_composer") => "outline"),
			"description" => __("Select icon style.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Type", "js_composer"),
			"param_name" => "icon_type",
			"value" => array(__('Circle', "js_composer") => "icon-circle",
							 __('Square', "js_composer") => "icon-square"),
			"description" => __("Select icon apperance.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Icon Size?", "js_composer"),
			"param_name" => "icon_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px) if you want use your own font size or Leave it empty to apply theme default", "js_composer")
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Icon Color", "js_composer"),
			"param_name" => "icon_color", 
			"value" => '',
			"description" => __("Choose Icon color (or) Leave it empty to apply theme default", "js_composer")
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Icon Background Color", "js_composer"),
			"param_name" => "icon_bg_color", 
			"value" => '', 
			"description" => __("Choose Icon Background Color (or) Leave it empty to apply theme default", "js_composer"),
			"dependency" => Array('element' => "icon_style", 'value' => array('solid'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "js_composer"),
			"param_name" => "title",
			"value" => "",
			"description" => __("Enter the title.", "js_composer"),
			"group"	=> __('Title', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "js_composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6', 'p'),
			"description" => __("Select title tag.", "js_composer"),
			"group"	=> __('Title', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Title Font Size?", "js_composer"),
			"param_name" => "text_font",
			"value" => "",
			"description" => __("Enter the font size in px (Ex: 50px) if you want custom font size or Leave it empty to apply theme default", "js_composer"),
			"group"	=> __('Title', 'js_composer')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Text Color", "js_composer"),
			"param_name" => "text_color", //Shortcode_attr name
			"value" => '', //Default Red color
			"description" => __("Choose text color if you want custom color (or) Leave it empty to apply theme default", "js_composer"),
			"group"	=> __('Title', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Margin", "js_composer"),
			"param_name" => "margin",
			"value" => "",
			"description" => __("Value should be in css format [top right bottom left] in px (Ex: -10px 20px 30px 40px).", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Box Animation", "js_composer"),
			"param_name" => "animate",
			"value" => array(__('No', "js_composer") => "no", 
							 __('Yes', "js_composer") => "yes"),
			"description" => __("Do you like to animate this element", "js_composer"),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "js_composer"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "js_composer"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "js_composer"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "js_composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
			),
		)
) );

// Google Map
vc_map( array(
	"name" => __("Google Map", "js_composer"), //Title
	"base" => "googlemap", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Width", "js_composer"),
			"param_name" => "width",
			"value" => "100%",
			"description" => __("Enter the Width. Eg: 400 (or) 98%", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Height", "js_composer"),
			"param_name" => "height",
			"value" => "300",
			"description" => __("Enter the Height. Eg: 400", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Latitude", "js_composer"),
			"param_name" => "lat",
			"value" => "-37.81731",
			"description" => __("Enter the latitude value (from http://universimmedia.pagesperso-orange.fr/geo/loc.htm)", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Longitude", "js_composer"),
			"param_name" => "lng",
			"value" => "144.95432",
			"description" => __("Enter the longitude value (from http://universimmedia.pagesperso-orange.fr/geo/loc.htm)", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Zoom", "js_composer"),
			"param_name" => "zoom",
			"value" => "13",
			"description" => __("Enter the zoom level of the map(Ex: 9))", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Zoom Control?", "js_composer"),
			"param_name" => "zoomcontrol",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you want to display Zoom Control?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pan Control", "js_composer"),
			"param_name" => "pancontrol",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you want to display Pancontrol?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("MapType Control", "js_composer"),
			"param_name" => "maptypecontrol",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you want to display MapType Control?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Scale Control", "js_composer"),
			"param_name" => "scalecontrol",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you want to display Scale Control?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Street View Control", "js_composer"),
			"param_name" => "streetviewcontrol",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you want to display Street View Control?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Overview Map control", "js_composer"),
			"param_name" => "overviewmapcontrol",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you want to display Overview Map control?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you want to show info on top of the map?", "js_composer"),
			"param_name" => "contact_info",
			"value" => array( __('Yes', "js_composer") => "yes",
							  __('No', "js_composer") => "no"),
			"description" => '',
			"group"	=> __('Contact Info', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Email", "js_composer"),
			"param_name" => "email",
			"value" => "",
			"description" => __("Enter the email address.", "js_composer"),
			"dependency" => Array('element' => "contact_info", 'value' => array('yes')),
			"group"	=> __('Contact Info', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Address Title", "js_composer"),
			"param_name" => "address_title",
			"value" => "Envato Headquarters",
			"description" => __("Title which display above address. Leave it empty if you don't want.", "js_composer"),
			"dependency" => Array('element' => "contact_info", 'value' => array('yes')),
			"group"	=> __('Contact Info', 'js_composer')
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Address", "js_composer"),
			"param_name" => "address", 
			"value" => '121 King Street,<br>Melbourne Victoria 3000,<br>Australia', 
			"description" => __("Enter the address", "js_composer"),
			"dependency" => Array('element' => "contact_info", 'value' => array('yes')),
			"group"	=> __('Contact Info', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Contact Number", "js_composer"),
			"param_name" => "contact_number",
			"value" => "+61 3 8376 6284",
			"description" => __("Enter the contact number.", "js_composer"),
			"dependency" => Array('element' => "contact_info", 'value' => array('yes')),
			"group"	=> __('Contact Info', 'js_composer')
			),

		)
) );

// Clients
vc_map( array(
	"name" => __("Clients", "js_composer"), //Title
	"base" => "clients", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "attach_images",
			"heading" => __("Images", "js_composer"),
			"param_name" => "images",
			"value" => "",
			"description" => __("Select images from media library.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Add Link client images?", "js_composer"),
			"param_name" => "link",
			"value" => array( __('Yes', "js_composer") => "yes",
				__('No', "js_composer") => "no"),
			"description" => ''
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Enter links for each client here", "js_composer"),
			"param_name" => "custom_links", 
			"value" => '', 
			"description" => __("Enter links for each client here. Divide links with comma (,).", "js_composer"),
			"dependency" => Array('element' => "link", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Client (company) Names on Hover", "js_composer"),
			"param_name" => "title_on_hover",
			"value" => array( __('Yes', "js_composer") => "yes",
				__('No', "js_composer") => "no"),
			"description" => __("Do you want to display client (company) names on Hover over client image?.", "js_composer")
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Enter Company name for each client here", "js_composer"),
			"param_name" => "titles", 
			"value" => '', 
			"description" => __("Enter Company name for each client here. Divide links with comma (,).", "js_composer"),
			"dependency" => Array('element' => "title_on_hover", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Clients Style", "js_composer"),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array(__('Style1', "js_composer") => "", 
							 __('Style2', "js_composer") => "style2", 
							 __('Style3', "js_composer") => "style3",
							 __('Style4', "js_composer") => "style4",
							 __('Style5', "js_composer") => "style4 style5"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("No of Items", "js_composer"),
			"param_name" => "items",
			"value" => array(__('4', "js_composer") => "4",
							 __('5', "js_composer") => "5",
							 __('6', "js_composer") => "6",
							 __('2', "js_composer") => "2"),
			"description" => __("Choose Number of items", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Enable Carousel?", "js_composer"),
			"param_name" => "slider",
			"value" => array( __('Yes', "js_composer") => "yes",
							  __('No', "js_composer") => "no"),
			"description" => '',
			"group"	=> __('Slider', 'js_composer')
			),
		array(
			"type" => "textfield",
			"heading" => __("Autoplay", "js_composer"),
			"param_name" => "autoplay",
			"value" => "4000",
			"description" => __("Enter the Value in milesecond (Ex: 5000), Enter 'false' to disable autoplay.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Slide Speed", "js_composer"),
			"param_name" => "slide_speed",
			"value" => "500",
			"description" => __("Enter the Value in milesecond (Ex: 500)", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),   

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "js_composer"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Display navigation arrow?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),        

		array(
			"type" => "dropdown",
			"heading" => __("Arrow Style", "js_composer"),
			"param_name" => "arrow_type",
			"value" => array( __('Default', "js_composer") => "",
							  __('Arrow Top Right', "js_composer") => "arrow-style2"),
			"description" => __("select the arrow Style", "js_composer"),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "js_composer"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Show pagination (dot nav) to slide images.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Auto Height", "js_composer"),
			"param_name" => "slider_height",
			"value" => array( __('No', "js_composer") => "false",
							  __('Yes', "js_composer") => "true"),
			"description" => __("By Enabling this, slider height will vary depends on content for each slide. Please turn off this if you have more content below Clients to avoid page moving.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),  

		array(
			"type" => "dropdown",
			"heading" => __("Stop On Hover", "js_composer"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Stop autoplaying carousel on mouerover", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			), 
		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag", "js_composer"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" =>  __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			), 
		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "js_composer"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Touch Drag (in touch devices)?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),             
		)
) );

// Button
vc_map( array(
	"name" => __("Button", "js_composer"), //Title
	"base" => "button", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Button Text", "js_composer"),
			"param_name" => "button_text",
			"admin_label" => true,
			"value" => "Read More",
			"description" => __("Enter the Button Text", "js_composer")
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "js_composer"),
			"param_name" => "button_link",
			"value" => "#",
			"description" => __("Enter the button link", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "js_composer"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "js_composer") => "outline", 
							 __('Solid', "js_composer") => "solid", 
							 __('Simple (No Bg and No Border)', "js_composer") => "simple"),
			"description" => __("Select button style?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "js_composer"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "js_composer") => "color", 
							 __('black', "js_composer") => "no-color",
							 __('white', "js_composer") => "white"), 
			"description" => __("Please choose button color", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "js_composer"),
			"param_name" => "button_size",
			"value" => array(__('Medium', "js_composer") => "md", 
							 __('Small', "js_composer") => "sm", 
							 __('Large', "js_composer") => "lg"),
			"description" => __("Select button size?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Custom Font Size?", "js_composer"),
			"param_name" => "custom_size",
			"value" => array(__('No', "js_composer") => "no",
							 __('Yes', "js_composer") => "yes"),
			"description" => __("Do you want to custom font size?", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Font Size", "js_composer"),
			"param_name" => "font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", "js_composer"),
			"dependency" => Array('element' => "custom_size", 'value' => array('yes'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Padding", "js_composer"),
			"param_name" => "padding_custom",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", "js_composer"),
			"dependency" => Array('element' => "custom_size", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Align", "js_composer"),
			"param_name" => "button_align",
			"value" => array(__('Left', "js_composer") => "", 
							 __('Center', "js_composer") => "button-center", 
							 __('Right', "js_composer") => "button-right"),
			"description" => __("Select button Align?", "js_composer")
			),		

		array(
			"type" => "icon",
			"heading" => __("Button Icon", "js_composer"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("choose button icon.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Icon Align", "js_composer"),
			"param_name" => "button_icon_align",
			"value" => array(__('Front', "js_composer") => "front", 
					 __('Back', "js_composer") => "back"), 
			"description" => __("Where you want to display Icon?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Animation", "js_composer"),
			"param_name" => "animate",
			"value" => array(__('No', "js_composer") => "no", 
				__('Yes', "js_composer") => "yes"),
			"description" => __("Do you like to animate this element", "js_composer"),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "js_composer"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose animation transition.", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "js_composer"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the duration (Ex: 500ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "js_composer"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the delay (Ex: 100ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),
		)
) );

// Title 
vc_map( array(
	"name" => __("Title", "js_composer"), //Title
	"base" => "title", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Title", "js_composer"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => __("Enter the title.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Style", "js_composer"),
			"param_name" => "style",
			"value" => array(__('Normal Title', "js_composer") => "normal-title", 
					         __('Fancy Title (title with bg color and bottom arrow)', "js_composer") => "bg_text",
                             __('Box Title', "js_composer") => "box-title",
                             __('Box Title Small ', "js_composer") => "box-small",
                             __('Title Right Border', "js_composer") => "title-right-border",
                             __('Title Sep', "js_composer") => "title-sep"),
                             
			"description" => __("Choose Title style", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Alignment", "js_composer"),
			"param_name" => "align",
			"value" => array(__('Align Left', "js_composer") => "", 
							 __('Align Center', "js_composer") => "center", 
							 __('Align Right', "js_composer") => "right"),
			"description" => __("Choose Title alignment.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Font Size", "js_composer"),
			"param_name" => "font_size",
			"value" => array(__('small', "js_composer") => "size-sm", 
							 __('Medium', "js_composer") => "size-md", 
							 __('Large', "js_composer") => "size-lg"),
			"description" => __("Select Font Size.", "js_composer")
			),
            array(
				"type" => "textfield",
				"heading" => __("Custom Font Size", "js_composer"),
				"param_name" => "custom_font_size",
				"value" => "",
				"description" => __("Enter the Custom title Font Size in px (Ex : 30px). Leave it empty to apply theme default.", "js_composer")
			),
            array(
				"type" => "textfield",
				"heading" => __("Title Margin", "js_composer"),
				"param_name" => "title_margin",
				"value" => "",
				"description" => __("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "js_composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you want subtitle?", "js_composer"),
			"param_name" => "sub_title",
			"value" => array(__('No', "js_composer") => "no",
				         __('Yes', "js_composer") => "yes"), 
			"description" => __("Do you want subtitle?", "js_composer"),
			"dependency" => Array('element' => "style", 'value' => array('normal-title','box-title','box-small','title-sep','title-right-border'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you want sub_title_style?", "js_composer"),
			"param_name" => "sub_title_style",
			"value" => array(__('Normal', "js_composer") => "",
					 __('Italic', "js_composer") => "italic"), 
			"description" => __("Do you want subtitle?", "js_composer"),
			"dependency" => Array('element' => "sub_title", 'value' => array('yes'))
			),

		array(
			"type" => "textfield",
			"heading" => __("subtitle text", "js_composer"),
			"param_name" => "sub_title_text",
			"value" => "Title",
			"description" => __("Enter the sub title text.", "js_composer"),
			"dependency" => Array('element' => "sub_title", 'value' => array('yes'))
			),
		 array(
				"type" => "textfield",
				"heading" => __("Sub Title Margin Bottom", "js_composer"),
				"param_name" => "sub_title_margin",
				"value" => "",
				"description" => __("Margin bottom for sub title margin bottom in px (Ex: 20px), Leave it empty to apply theme default.", "js_composer"),
				"dependency" => Array('element' => "sub_title", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Line", "js_composer"),
			"param_name" => "line",
			"value" => array(__('Yes', "js_composer") => "yes", 
							 __('No', "js_composer") => "no"), 
			"description" => __("Display line below title?", "js_composer")
			),
            
        array(
			"type" => "dropdown",
			"heading" => __("Line Positions", "js_composer"),
			"param_name" => "line_positions",
			"value" => array(__('Below Title', "js_composer") => "below-title", 
							 __('Below Sub Title', "js_composer") => "below-sub-title"), 
			"description" => __("Display line below title?", "js_composer"),
             "dependency" => Array('element' => "line", 'value' => array('yes'))
			),
                
        array(
			"type" => "dropdown",
			"heading" => __("Line Style", "js_composer"),
			"param_name" => "line_style",
			"value" => array(__('Line Style1', "js_composer") => "line-style1", 
                             __('Line Style2', "js_composer") => "line-style2",
                             __('Line Style3', "js_composer") => "line-style3",
                             __('Line Style4', "js_composer") => "line-style4",
                             __('Line Style5', "js_composer") => "line-style5"),
			"description" => __("Do you like to animate this element", "js_composer"),
            "dependency" => Array('element' => "line", 'value' => array('yes'))
			),
                

		array(
			"type" => "dropdown",
			"heading" => __("Title Animation", "js_composer"),
			"param_name" => "animate",
			"value" => array(__('No', "js_composer") => "no", 
							 __('Yes', "js_composer") => "yes"),
			"description" => __("Do you like to animate this element", "js_composer"),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "js_composer"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "js_composer"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "js_composer"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "js_composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
			),
		)
) );

// Counters 
vc_map( array(
	"name" => __("Counters", "js_composer"), //Title
	"base" => "counter", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Counter Number", "js_composer"),
			"param_name" => "number",
			"admin_label" => true,
			"value" => "5000",
			"description" => __("Enter the counter number.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Counter Number Font Size in px", "js_composer"),
			"param_name" => "number_font_size",
			"value" => "",
			"description" => __("Enter Font Size in Pixels(eg: 16px), Leave empty to apply theme default", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Counter Text", "js_composer"),
			"param_name" => "text",
			"admin_label" => true,
			"value" => "Title",
			"description" => __("Enter the counter Text.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Counter Text Font Size in px", "js_composer"),
			"param_name" => "text_font_size",
			"value" => "",
			"description" => __("Enter Font Size in Pixels(eg: 16px), Leave empty to apply theme default", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon", "js_composer"),
			"param_name" => "icon",
			"value" => array(__('Yes', "js_composer") => "yes", 
							 __('No', "js_composer") => "no"), 
			"description" => __("Do you like to add icon?", "js_composer")
			),

		array(
			"type" => "icon",
			"heading" => __("Insert Icon", "js_composer"),
			"param_name" => "icon_name",
			"value" => '',
			"description" => __("Choose an icon.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Alignment", "js_composer"),
			"param_name" => "icon_align",
			"value" => array(__('Align Left', "js_composer") => "", 
							 __('Align Center', "js_composer") => "center", 
							 __('Align Right', "js_composer") => "right"),
			"description" => __("Select icon alignment.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Icon in Theme Default Color?", "js_composer"),
			"param_name" => "icon_color",
			"value" => array(__('Yes', "js_composer") => " color", 
							 __('No', "js_composer") => "no"), 
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Border", "js_composer"),
			"param_name" => "border",
			"value" => array(__('Yes', "js_composer") => " border", 
							 __('No', "js_composer") => "no"), 
			"description" => __("Display border around counter?", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "js_composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
			),
		)
) );

// Callout Box
vc_map( array(
	"name" => __("Callout Box", "js_composer"), 
	"base" => "callout_box", 
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es',
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Callout Box Style", "js_composer"),
			"param_name" => "callout_style",
			"value" => array(__('Default (No background Color)', "js_composer") => "default", 
							 __('Normal (In Grey Background)', "js_composer") => "background",
							 __('classic (Grey Background with Border on  left)', "js_composer") => "background border"),
			"description" => __("Select Call out box style.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Callout Box Alignment", "js_composer"),
			"param_name" => "callout_align",
			"value" => array(__('Align center', "js_composer") => "center", 
							 __('Align left', "js_composer") => "left"),
			"description" => __("Select box alignment.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "js_composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "js_composer"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title goes here",
			"description" => __("Enter the title.", "js_composer")
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Callout Box Content", "js_composer"),
			"param_name" => "content", 
			"value" => '', 
			"description" => __("Enter the callout box content", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Button?", "js_composer"),
			"param_name" => "display_button",
			"value" => array(__('Yes', "js_composer") => "yes", 
							 __('No', "js_composer") => "no"),
			"description" => __("Do you want to display button?", "js_composer"),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Button Text", "js_composer"),
			"param_name" => "button_text",
			"value" => "Read More",
			"description" => __("Enter the Button Text", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "js_composer"),
			"param_name" => "button_link",
			"value" => "#",
			"description" => __("Enter the button link", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "js_composer"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "js_composer") => "outline", 
							 __('Solid', "js_composer") => "solid", 
							 __('Default', "js_composer") => "simple"),
			"description" => __("Select button style?", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "js_composer"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "js_composer") => "color", 
							 __('black', "js_composer") => "no-color",
							 __('white', "js_composer") => "white"), 
			"description" => __("Please choose button color", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "js_composer"),
			"param_name" => "button_size",
			"value" => array(__('Medium', "js_composer") => "md", 
							 __('Small', "js_composer") => "sm", 
							 __('Large', "js_composer") => "lg"),
			"description" => __("Select button size", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "icon",
			"heading" => __("Button Icon", "js_composer"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("Insert button icon.", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Second Button?", "js_composer"),
			"param_name" => "display_button2",
			"value" => array(__('No', "js_composer") => "no",
							 __('Yes', "js_composer") => "yes"),
			"description" => __("Do you want to display Second button?", "js_composer"),
			"dependency" => Array('element' => "callout_align", 'value' => array('center')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Button Text 2", "js_composer"),
			"param_name" => "button_text2",
			"value" => "Read More",
			"description" => __("Enter the Button Text 2", "js_composer"),
			"dependency" => Array('element' => "display_button2", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button 2 URL", "js_composer"),
			"param_name" => "button_link2",
			"value" => "#",
			"description" => __("Enter the button link 2", "js_composer"),
			"dependency" => Array('element' => "display_button2", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button 2 Style", "js_composer"),
			"param_name" => "button_style2",
			"value" => array(__('Outline', "js_composer") => "outline", 
							 __('Solid', "js_composer") => "solid", 
							 __('Default', "js_composer") => "simple"),
			"description" => __("Select button 2 style", "js_composer"),
			"dependency" => Array('element' => "display_button2", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Button 2 in Color", "js_composer"),
			"param_name" => "button_color2",
			"value" => array(__('Theme default color', "js_composer") => "color", 
							 __('black', "js_composer") => "no-color",
							 __('white', "js_composer") => "white"), 
			"description" => __("Do you want to display button in default theme color?", "js_composer"),
			"dependency" => Array('element' => "display_button2", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button 2 Size", "js_composer"),
			"param_name" => "button_size2",
			"value" => array(__('Medium', "js_composer") => "md", 
							 __('Small', "js_composer") => "sm", 
							 __('Large', "js_composer") => "lg"),
			"description" => __("Select button size", "js_composer"),
			"dependency" => Array('element' => "display_button2", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "icon",
			"class" => "",
			"heading" => __("Button 2 Icon", "js_composer"),
			"param_name" => "button_icon2",
			"value" => '',
			"description" => __("Insert an icon for second button.", "js_composer"),
			"dependency" => Array('element' => "display_button2", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Callout Animation", "js_composer"),
			"param_name" => "animate",
			"value" => array(__('No', "js_composer") => "no", 
				__('Yes', "js_composer") => "yes"),
			"description" => __("Do you like to animate this element", "js_composer"),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "js_composer"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "js_composer"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "js_composer"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "js_composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
			),
		)
) );

// Process
vc_map( array(
	"name" => __("Process", "js_composer"), //Title
	"base" => "process", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Process Style", "js_composer"),
			"param_name" => "type",
			"value" => array(__('Circle', "js_composer") => "default", 
							 __('Square', "js_composer") => "default process_square"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Process Background", "js_composer"),
			"param_name" => "style",
			"value" => array(__('Default', "js_composer") => "default", 
							 __('Solid Color Background', "js_composer") => "background",
							 __('Solid Grey Background', "js_composer") => "background grey"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Process Inner Content", "js_composer"),
			"param_name" => "text",
			"value" => array(__('Number', "js_composer") => "number", 
							 __('Icon', "js_composer") => "icon",
							 __('Text', "js_composer") => "text"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("Process Number", "js_composer"),
			"param_name" => "circle_text",
			"value" => "01",
			"description" => __("Enter Process Number.", "js_composer"),
			"dependency" => Array('element' => "text", 'value' => array('number'))
			),

		array(
			"type" => "icon",
			"heading" => __("Insert Icon", "js_composer"),
			"param_name" => "icon_name",
			"value" => '',
			"description" => __("Insert an icon.", "js_composer"),
			"dependency" => Array('element' => "text", 'value' => array('icon'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Process Title", "js_composer"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => __("Enter the Process title.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Process Description?", "js_composer"),
			"param_name" => "process_content",
			"value" => array(__('No', "js_composer") => 'no', 
							 __('Yes', "js_composer") => 'yes'),
			"description" => __("Do you want to display process description", "js_composer")
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Process description", "js_composer"),
			"param_name" => "content", 
			"value" => '', 
			"description" => __("Enter the process description", "js_composer"),
			"dependency" => Array('element' => "process_content", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Process Arrow Style", "js_composer"),
			"param_name" => "process_style",
			"value" => array(__('Inclined Arrow', "js_composer") => "nav-style",
							 __('Straight Arrow', "js_composer") => "nav-style straight",
							 __('Straight Arrow 2', "js_composer") => "nav-style straight round",
							 __('none', "js_composer") => "default"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Process Animation", "js_composer"),
			"param_name" => "animate",
			"value" => array(__('No', "js_composer") => "no", 
							 __('Yes', "js_composer") => "yes"),
			"description" => __("Do you like to animate this element", "js_composer"),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "js_composer"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "js_composer"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "js_composer"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "js_composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
			),
		)
) );

// VC Accordion
vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Accordion Style", "js_composer"),
	"param_name" => "style",
	"value" => array(__('Default', "js_composer") => "default",
		__('Content Background Color', "js_composer") => "default background",
		__('Content Border', "js_composer") => "default border",
		__('Content Background Default Color', "js_composer") => "default border border-background"),
	"description" => '',
	));

// VC Tabs



vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Tabs Style", "js_composer"),
	"param_name" => "style",
	"value" => array(__('Default', "js_composer") => "default",
					 __('Default Background', "js_composer") => "default style2",
					 __('Background Color', "js_composer") => "default style3",
					 __('Color Highlight', "js_composer") => "default style3 style4"),
	"description" => "",
	));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Tabs Alignment", "js_composer"),
	"param_name" => "align",
	"value" => array(__('Left', "js_composer") => "default",
					 __('Right', "js_composer") => "right-align",
					 __('Center', "js_composer") => "center-align"),
	"description" => "",
	));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Tabs Nav View", "js_composer"),
	"param_name" => "side",
	"value" => array(__('Top', "js_composer") => "default",
					 __('Left', "js_composer") => "tabs-left",
					 __('Right', "js_composer") => "tabs-left tabs-right",
					 __('Bottom', "js_composer") => "tabs-bottom"),
	"description" => "",
	));

vc_add_param("vc_tab",
	array(
		"type" => "icon",
		"class" => "",
		"heading" => __("Insert Icon", "js_composer"),
		"param_name" => "icon_name",
		"value" => '',
		"description" => __("Insert an icon for tab.", "js_composer")
		)
	);

// Progress Bar
vc_remove_param("vc_progress_bar", "bgcolor");

//remove animation from single image
vc_remove_param("vc_single_image", "css_animation");

vc_add_param("vc_progress_bar", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Progress Bar Style", "js_composer"),
	"param_name" => "style",
	"value" => array(__('Style1', "js_composer") => "style1",
					 __('Style2', "js_composer") => "style2",
					 __('Style3', "js_composer") => "style2 style3",
					 __('Style4', "js_composer") => "style4"
		),
	"description" => "",
	));

// Spacer
vc_map( array(
	"name" => __("Spacer", "js_composer"), //Title
	"base" => "spacer", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Spacer", "js_composer"),
			"param_name" => "height",
			"value" => "30px",
			"description" => __("Enter the Space in px (Ex: 30px)", "js_composer")
			),

		)
	) );

// Contact
vc_map( array(
       "name" => __("Contact", "js_composer"), //Title
       "base" => "contact", //Shortcode name
       "class" => "",
       "icon" => "icon-pixel8es",
       "category" => 'By Pixel8es', //category
       "params" => array(
       	array(
       		"type" => "textfield",
       		"heading" => __("Email", "js_composer"),
       		"param_name" => "mailto",
       		"value" => "",
       		"description" => __("Enter the email where you want receive from contact form", "js_composer"),
       		),         
       	)
));

// Pie Chart
vc_map( array(
	"name" => __("Pie Chart", "js_composer"), //Title
	"base" => "pie_chart", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Pie Chart Style", "js_composer"),
			"param_name" => "style",
			"value" => array(__('Style1', "js_composer") => "style1",
							 __('Style2', "js_composer") => "style2",
							 __('Style3', "js_composer") => "style3",
							 __('Style4', "js_composer") => "style2 style4",
							 __('Style5', "js_composer") => "style2 style5",
							 __('Style6', "js_composer") => "style2 style6",
							 __('Style7', "js_composer") => "style3 style7",
							 __('Style8', "js_composer") => "style3 style8"),
			"description" => ""),

		array(
			"type" => "textfield",
			"heading" => __("Percentage", "js_composer"),
			"param_name" => "percentage",
			"value" => "50",
			"admin_label" => true,
			"description" => __("Enter the Percentage Value (Ex: 50).", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("custom_color", "js_composer"),
			"param_name" => "custom_color",
			"value" => array(__('Default', "js_composer") => "default",
				__('Custom', "js_composer") => "custom"),
			"description" => __("Select title tag.", "js_composer")
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Bar Color", "js_composer"),
			"param_name" => "barcolor", 
			"value" => $theme_default, 
			"description" => __("Choose Bar color", "js_composer"),
			"dependency" => Array('element' => "custom_color", 'value' => array('custom'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Line Cap", "js_composer"),
			"param_name" => "linecap",
			"value" => array(__('Default', "js_composer") => "butt",
							 __('Round', "js_composer") => "round",
							 __('Square', "js_composer") => "square"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("Animate Duration", "js_composer"),
			"param_name" => "animate_duration",
			"value" => "2000",
			"description" => __("Enter the Animate Duration in ms (2000ms = 2s) Ex: 2000.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Line Width", "js_composer"),
			"param_name" => "line_width",
			"value" => "6",
			"description" => __("Enter the Line Width.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Circle Size", "js_composer"),
			"param_name" => "size",
			"value" => "200",
			"description" => __("Enter the Circle Size in px (EX: 200).", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Text Position", "js_composer"),
			"param_name" => "text_position",
			"value" => array(__('Outside', "js_composer") => "",
							 __('Inside', "js_composer") => "inside"),
			"description" => __("Select text position.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Text", "js_composer"),
			"param_name" => "text",
			"admin_label" => true,
			"value" => "",
			"description" => __("Enter the text.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "js_composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
			),
		)
) );


// Staffs
vc_map( array(
	"name" => __("Staffs", "js_composer"), //Title
	"base" => "staffs", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Insert Staffs by", "js_composer"),
			"param_name" => "insert_type",
			"admin_label" => true,
			"value" => array(__('Staffs Posts', "js_composer") => "posts", 
							 __('Staff Id', "js_composer") => "id"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("No. of Staffs", "js_composer"),
			"param_name" => "no_of_staff",
			"value" => '6',
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("Enter the number of staffs you want to display (only numbers), Enter -1 for all posts", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "js_composer"),
			"param_name" => "order_by",
			"value" => array( __('Date', "js_composer") => "date",  
							__('Rand', "js_composer") => "rand",
							__('ID', "js_composer") => "ID", 
							__('Title', "js_composer") => "title", 
							__('Author', "js_composer") => "author",
							__('Name', "js_composer") => "modified",
							__('Parent', "js_composer") => "parent",
							__('Date Modified', "js_composer") => "date",
							__('Menu Order', "js_composer") => "menu_order",
							__('None', "js_composer") => "none"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "js_composer"),
			"param_name" => "order",
			"value" => array( __('Ascending order', "js_composer") => "ASC",  
							  __('descending order', "js_composer") => "DESC"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => __('Choose staffs posts Order', "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Staff Id", "js_composer"),
			"param_name" => "staff_id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'id'),
			"description" => __("Enter the staff ids seperated by commas (,). Example: 2,54,8", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Exclude Staffs", "js_composer"),
			"param_name" => "exclude_staffs",
			"value" => "",
			"description" => __("Enter the staff id you don't want to display. Divide id with comma (,).", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Number of Columns", "js_composer"),
			"param_name" => "columns",
			"value" => array( __('4 Columns', "js_composer") => "col4",  
							  __('3 Columns', "js_composer") => "col3",
							  __('2 Columns', "js_composer") => "col2"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "js_composer"),
			"param_name" => "style",
			"value" => array( __('style 1', "js_composer") => "style1",  
							 __('style 2', "js_composer") => "style2",
							 __('style 3', "js_composer") => "style3",
							 __('style 4', "js_composer") => "style4",
							 __('style 5', "js_composer") => "style5"),
			"description" => __("This theme have 5 staffs styles, please choose one", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("HTML Tag for Staff Name", "js_composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h3','h4','h5','h6','h1', 'p'),
			"description" => __("Choose which html tag you want use for staff name.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Staff Description", "js_composer"),
			"param_name" => "staff_desc",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => __("Do you like to show staff description", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you need light box for staff image", "js_composer"),
			"param_name" => "lightbox",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Link to single staff page?", "js_composer"),
			"param_name" => "single_staff_link",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Enable carousel?", "js_composer"),
			"param_name" => "slider",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => __("Do you like to display staffs in carousel?", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),
		array(
			"type" => "textfield",
			"heading" => __("Autoplay", "js_composer"),
			"param_name" => "autoplay",
			"value" => "4000",
			"description" => __("Enter the Value in milesecond (Ex: 5000), Enter 'false' to disable autoplay.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Slide Speed", "js_composer"),
			"param_name" => "slide_speed",
			"value" => "500",
			"description" => __("Enter the Value in milesecond (Ex: 500)", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),      

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "js_composer"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "js_composer") => "true",
				          __('No', "js_composer") => "false"),
			"description" => __("Do you want to display carousel arrow?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),       

		array(
			"type" => "dropdown",
			"heading" => __("Arrow Style", "js_composer"),
			"param_name" => "arrow_type",
			"value" => array( __('Default', "js_composer") => "",
							  __('Arrow Top Right', "js_composer") => "arrow-style2"),
			"description" => __("Choose arrow postion", "js_composer"),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "js_composer"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you want to display carousel dot nav?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Auto Height", "js_composer"),
			"param_name" => "slider_height",
			"value" => array( __('No', "js_composer") => "false",
							  __('Yes', "js_composer") => "true"),
			"description" => __("By Enabling this, slider height will vary depends on content for each slide. Please turn off this if you have more content below Staffs to avoid page moving.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),  

		array(
			"type" => "dropdown",
			"heading" => __("Stop On Hover", "js_composer"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Stop auto moving carousel on mouseover", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			), 
		array(
			"type" => "dropdown",
			"heading" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			), 

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "js_composer"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Touch Drag (in touch devices)?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),  

		)
) );

// Portfolio
vc_map( array(
	"name" => __("Portfolio", "js_composer"), //Title
	"base" => "portfolio", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Portfolio Style", "js_composer"),
			"param_name" => "portfolio_style",
			"admin_label" => true,
			"value" => array(__('Grid', "js_composer") => "grid", 
							 __('Masonry', "js_composer") => "masonry"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Insert Portfolio by", "js_composer"),
			"param_name" => "insert_type",
			"admin_label" => true,
			"value" => array(__('Portfolio Posts', "js_composer") => "posts", 
							 __('portfolio Id', "js_composer") => "id"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Filterable", "js_composer"),
			"param_name" => "pix_filterable",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => __('Filter only displays if you choose carousel "No"', "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Filter Style", "js_composer"),
			"param_name" => "filter_style",
			"value" => array(__('Simple', "js_composer") => "normal simple",
							 __('Normal', "js_composer") => "normal",  
							 __('Dropdown', "js_composer") => "dropdown"),
			"dependency" => Array('element' => "pix_filterable", 'value' => 'yes'),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("No. of Portfolio", "js_composer"),
			"param_name" => "no_of_items",
			"value" => '12',
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("Enter the number of Portfolio you want to display (only numbers), Enter -1 for all portfolio items", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "js_composer"),
			"param_name" => "order_by",
			"value" => array( __('Date', "js_composer") => "date",  
							 __('Rand', "js_composer") => "rand",
							 __('ID', "js_composer") => "ID", 
							 __('Title', "js_composer") => "title", 
							 __('Author', "js_composer") => "author",
							 __('Name', "js_composer") => "modified",
							 __('Parent', "js_composer") => "parent",
							 __('Date Modified', "js_composer") => "date",
							 __('Menu Order', "js_composer") => "menu_order",
							 __('None', "js_composer") => "none"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "js_composer"),
			"param_name" => "order",
			"value" => array( __('Ascending order', "js_composer") => "ASC",  
							  __('descending order', "js_composer") => "DESC"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("portfolio Id", "js_composer"),
			"param_name" => "portfolio_id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'id'),
			"description" => __("Enter the portfolio ids seperated by commas (,). Example: 2,54,8", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Exclude Portfolio", "js_composer"),
			"param_name" => "exclude_portfolio",
			"value" => "",
			"description" => __("Enter the portfolio id you don't want to display. Divide id with comma (,).", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Number of Columns", "js_composer"),
			"param_name" => "columns",
			"value" => array( __('4 Columns', "js_composer") => "col4",  
							  __('3 Columns', "js_composer") => "col3",
							  __('2 Columns', "js_composer") => "col2"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "js_composer"),
			"param_name" => "style",
			"value" => array( __('style 1', "js_composer") => "style1",  
							  __('style 2', "js_composer") => "style2",
							  __('style 3', "js_composer") => "style3",
							  __('style 4', "js_composer") => "style4",
							  __('style 5', "js_composer") => "style5",
							  __('style 6', "js_composer") => "style6",
							  __('style 7', "js_composer") => "style7"),
			"description" => __("This theme have 6 Portfolio styles, please choose one", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("HTML Tag for portfolio Name", "js_composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h3','h4','h5','h6','h1', 'p'),
			"description" => __("Choose which html tag you want use for portfolio name.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you need light box for portfolio image", "js_composer"),
			"param_name" => "lightbox",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you like to show like button", "js_composer"),
			"param_name" => "like",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Link to single portfolio page?", "js_composer"),
			"param_name" => "single_portfolio_link",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Enable carousel?", "js_composer"),
			"param_name" => "slider",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => __("Do you like to display Portfolio in carousel?", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),  
		array(
			"type" => "textfield",
			"heading" => __("Autoplay", "js_composer"),
			"param_name" => "autoplay",
			"value" => "4000",
			"description" => __("Enter the Value in milesecond (Ex: 5000), Enter 'false' to disable autoplay.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Slide Speed", "js_composer"),
			"param_name" => "slide_speed",
			"value" => "500",
			"description" => __("Enter the Value in milesecond (Ex: 500)", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),      

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "js_composer"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("select the arrow if you want", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),       

		array(
			"type" => "dropdown",
			"heading" => __("Arrow Style", "js_composer"),
			"param_name" => "arrow_type",
			"value" => array( __('Default', "js_composer") => "",
							 __('Arrow Top Right', "js_composer") => "arrow-style2"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "js_composer"),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "js_composer"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "js_composer") => "true",
							  __('No', "js_composer") => "false"),
			"description" => __("Do you want to display carousel dot nav?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Auto Height", "js_composer"),
			"param_name" => "slider_height",
			"value" => array( __('No', "js_composer") => "false",
							  __('Yes', "js_composer") => "true"),
			"description" => __("By Enabling this, slider height will vary depends on content for each slide. Please turn off this if you have more content below portfolio to avoid page moving.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),  

		array(
			"type" => "dropdown",
			"heading" => __("Stop On Hover", "js_composer"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Stop On Hover", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			), 
		array(
			"type" => "dropdown",
			"heading" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			), 

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "js_composer"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Touch Drag (in touch devices)?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),    
		)
) );

// Pricing Tables
vc_map( array(
	"name" => __("Pricing Tables", "js_composer"), //Title
	"base" => "pricing_tables", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "js_composer"),
			"param_name" => "style",
			"value" => array( __('Style 1', "js_composer") => "style1",  
							  __('Style 2', "js_composer") => "style2",
							  __('Style 3', "js_composer") => "style3",
							  __('Style 4', "js_composer") => "style4",
							  __('Style 5', "js_composer") => "style5",
							  __('Style 6', "js_composer") => "style6",
							  __('Style 7', "js_composer") => "style7",
							  __('Style 8', "js_composer") => "style8",
							  __('Style 9', "js_composer") => "style9",
							  __('Style 10', "js_composer") => "style10"),
			"description" => __("This theme have 2 pricing tables styles, please choose one", "js_composer")
			),

		array(
			"type" => "attach_image",
			"heading" => __("Plan Name Background Image", "js_composer"),
			"param_name" => "pricing_table_img",
			"value" => "",
			"dependency" => Array('element' => "style", 'value' => array('style7')),
			"description" => __("Select a image if you want to display image behind plan name.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "js_composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "js_composer"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => __("Enter the title.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Currency Symbol", "js_composer"),
			"param_name" => "currency",
			"value" => '$',
			"description" => __("Enter the symbol.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("price", "js_composer"),
			"param_name" => "price",
			"value" => '99.99',
			"description" => __("Enter the price.", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("period", "js_composer"),
			"param_name" => "period",
			"value" => 'per month',
			"description" => __("Enter the period.", "js_composer")
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Pricing Content", "js_composer"),
			"param_name" => "content", //Shortcode_attr name
			"value" => '<ul><li>3 Wordpress</li><li>Single usage</li><li>One User</li><li>5 GB storage</li><li>6 months free Support</li></ul>', //Default Red color
			"description" => __("Enter the Icon Box Content", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Highlight", "js_composer"),
			"param_name" => "highlight_box",
			"value" => array(__('No', "js_composer") => "no", 
				__('Yes', "js_composer") => "yes"),
			"description" => __("Do you want to highlight the box?", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Button?", "js_composer"),
			"param_name" => "display_button",
			"value" => array(__('Yes', "js_composer") => "yes", 
				__('No', "js_composer") => "no"),
			"description" => __("Do you want to display button?", "js_composer"),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Button Text", "js_composer"),
			"param_name" => "button_text",
			"value" => "Order Now",
			"description" => __("Enter the Button Text", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "js_composer"),
			"param_name" => "button_link",
			"value" => "#",
			"description" => __("Enter the button link", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "js_composer"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "js_composer") => "outline", 
				__('Solid', "js_composer") => "solid", 
				__('Default', "js_composer") => "simple"),
			"description" => __("Select button style?", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "js_composer"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "js_composer") => "color", 
							 __('black', "js_composer") => "no-color",
							 __('white', "js_composer") => "white"), 
			"description" => __("Please choose button color", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "js_composer"),
			"param_name" => "button_size",
			"value" => array(__('Medium', "js_composer") => "md", 
				__('Small', "js_composer") => "sm", 
				__('Large', "js_composer") => "lg"),
			"description" => __("Select button size?", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "icon",
			"class" => "",
			"heading" => __("Button Icon", "js_composer"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("Insert an icon for button.", "js_composer"),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pricing Tables Animation", "js_composer"),
			"param_name" => "animate",
			"value" => array(__('No', "js_composer") => "no", 
				__('Yes', "js_composer") => "yes"),
			"description" => __("Do you like to animate this element", "js_composer"),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "js_composer"),

			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "js_composer"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "js_composer"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "js_composer"),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "js_composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
			),
		)
) );


//Social 
vc_map( array(
	"name" => __("Social Icons", "js_composer"), //Title
	"base" => "social", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "js_composer"),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array( __('style 1', "js_composer") => "style1",  
				__('style 2', "js_composer") => "style2",
				__('style 3', "js_composer") => "style3"),
			"description" => __("This theme have 3 Social Icon styles, please choose one. Leave below fields empty to hide icons ", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Facebook Url", "js_composer"),
			"param_name" => "facebook",
			"value" => "",
			"description" => __("Enter the facebook Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Twitter Url", "js_composer"),
			"param_name" => "twitter",
			"value" => "",
			"description" => __("Enter the twitter Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("GooglePlus Url", "js_composer"),
			"param_name" => "gplus",
			"value" => "",
			"description" => __("Enter the gplus Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("LinkedIn Url", "js_composer"),
			"param_name" => "linkedin",
			"value" => "",
			"description" => __("Enter the linkedin Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Dribbble Url", "js_composer"),
			"param_name" => "dribble",
			"value" => "",
			"description" => __("Enter the dribbble Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Flickr Url", "js_composer"),
			"param_name" => "flickr",
			"value" => "",
			"description" => __("Enter the flickr Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Pinterest Url", "js_composer"),
			"param_name" => "pinterest",
			"value" => "",
			"description" => __("Enter the pinterest Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Tumblr Url", "js_composer"),
			"param_name" => "tumblr",
			"value" => "",
			"description" => __("Enter the tumblr Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Instagrem Url", "js_composer"),
			"param_name" => "instagrem",
			"value" => "",
			"description" => __("Enter the instagrem Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("RSS Url", "js_composer"),
			"param_name" => "rss",
			"value" => "",
			"description" => __("Enter the rss Url", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Github Url", "js_composer"),
			"param_name" => "github",
			"value" => "",
			"description" => __("Enter the github Url", "js_composer")
			),

		)
));


// Testimonial
vc_map( array(
	"name" => __("Testimonials", "js_composer"), //Title
	"base" => "testimonial", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Insert testimonials by", "js_composer"),
			"param_name" => "insert_type",
			"value" => array(__('testimonials Posts', "js_composer") => "posts", 
				__('testimonial Id', "js_composer") => "id"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("No. of testimonials", "js_composer"),
			"param_name" => "no_of_testimonial",
			"value" => -1,
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("Enter the number of testimonials you want to display (only numbers), Enter -1 for all posts", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "js_composer"),
			"param_name" => "order_by",
			"value" => array( __('Date', "js_composer") => "date",  
				__('Rand', "js_composer") => "rand",
				__('ID', "js_composer") => "ID", 
				__('Title', "js_composer") => "title", 
				__('Author', "js_composer") => "author",
				__('Name', "js_composer") => "modified",
				__('Parent', "js_composer") => "parent",
				__('Date Modified', "js_composer") => "date",
				__('Menu Order', "js_composer") => "menu_order",
				__('None', "js_composer") => "none"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "js_composer"),
			"param_name" => "order",
			"value" => array( __('Ascending order', "js_composer") => "ASC",  
				__('descending order', "js_composer") => "DESC"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("testimonial Id", "js_composer"),
			"param_name" => "testimonial_id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'id'),
			"description" => __("Enter the testimonial ids seperated by commas (,). Example: 2,54,8", "js_composer")
			),

		array(
			"type" => "textfield",
			"heading" => __("Exclude Testimonials", "js_composer"),
			"param_name" => "exclude_testimonial",
			"value" => "",
			"description" => __("Enter the testimonial id you don't want to display. Divide id with comma (,).", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "js_composer"),
			"param_name" => "style",
			"value" => array( __('style 1', "js_composer") => "style1",  
				__('style 2', "js_composer") => "style2",
				__('style 3', "js_composer") => "style3",
				__('style 4', "js_composer") => "style4",
				__('style 5', "js_composer") => "style5",
				__('style 6', "js_composer") => "style6"),
			"description" => __("This theme have 6 testimonials styles, please choose one", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Number of columns", "js_composer"),
			"param_name" => "no_of_col",
			"value" => array(__('One Column', "js_composer") => 1, 
				__('Two Columns', "js_composer") => 2,
				__('Three Columns', "js_composer") => 3,
				__('Four Columns', "js_composer") => 4),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you want to display Rating?", "js_composer"),
			"param_name" => "rating_no",
			"value" => array(__('Yes', "js_composer") => "yes",  
				__('No', "js_composer") => "no"),
			"description" => ''
			),
		array(
			"type" => "textfield",
			"heading" => __("Autoplay", "js_composer"),
			"param_name" => "autoplay",
			"value" => "4000",
			"description" => __("Enter the Value in milesecond (Ex: 5000), Enter 'false' to disable autoplay.", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Slide Speed", "js_composer"),
			"param_name" => "slide_speed",
			"value" => "500",
			"description" => __("Enter the Value in milesecond (Ex: 500)", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),      

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "js_composer"),
			"param_name" => "slide_arrow",
			"value" => array( __('No', "js_composer") => "false",
				__('Yes', "js_composer") => "true"),
			"description" => __("select the arrow if you want", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),       

		array(
			"type" => "dropdown",
			"heading" => __("Arrow Style", "js_composer"),
			"param_name" => "arrow_type",
			"value" => array( __('Default', "js_composer") => "",
				__('Arrow Top Right', "js_composer") => "arrow-style2"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "js_composer"),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "js_composer"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you want to display carousel dot nav?", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Auto Height", "js_composer"),
			"param_name" => "slider_height",
			"value" => array( __('No', "js_composer") => "false",
							  __('Yes', "js_composer") => "true"),
			"description" => __("By Enabling this, slider height will vary depends on content for each slide. Please turn off this if you have more content below testimonial to avoid page moving.", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),  

		array(
			"type" => "dropdown",
			"heading" => __("Stop On Hover", "js_composer"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Stop On Hover", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			), 
		
		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "js_composer"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Touch Drag (in touch devices)?", "js_composer"),
			"group"	=> __('Slider', 'js_composer')
			),       

		)
) );



// Tweets
vc_map( array(
	"name" => __("Latest Tweets", "js_composer"), //Title
	"base" => "tweets", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Twitter Username", "js_composer"),
			"param_name" => "twtusr",
			"value" => "",
			"description" => __("Enter the Twitter Username", "js_composer")
			), 

		array(
			"type" => "textfield",
			"heading" => __("No. of Tweets", "js_composer"),
			"param_name" => "twtcount",
			"value" => '5',
			"description" => __("Enter the number of tweets you want to display (only numbers).", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "js_composer"),
			"param_name" => "style",
			"value" => array( __('style 1', "js_composer") => "style1",  
				__('style 2', "js_composer") => "style2",
				__('style 3', "js_composer") => "style3"),
			"description" => __("This theme have 3 Tweets styles, please choose one", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Tweets Alignment", "js_composer"),
			"param_name" => "tweet_align",
			"value" => array(__('Align center', "js_composer") => "center", 
							 __('Align left', "js_composer") => "left"),
			"description" => __("Select tweets alignment.", "js_composer")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Number of columns", "js_composer"),
			"param_name" => "no_of_col",
			"value" => array(__('One Column', "js_composer") => 1, 
							 __('Two Columns', "js_composer") => 2,
							 __('Three Columns', "js_composer") => 3),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Enable Slider?", "js_composer"),
			"param_name" => "slider",
			"value" => array(__('Yes', "js_composer") => "yes",  
							 __('No', "js_composer") => "no"),
			"description" => '',
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay", "js_composer"),
			"param_name" => "autoplay",
			"value" => "4000",
			"description" => __("Enter the Value in milesecond (Ex: 5000), Enter 'false' to disable autoplay.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "textfield",
			"heading" => __("Slide Speed", "js_composer"),
			"param_name" => "slide_speed",
			"value" => "500",
			"description" => __("Enter the Value in milesecond (Ex: 500)", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),      

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "js_composer"),
			"param_name" => "slide_arrow",
			"value" => array( __('No', "js_composer") => "false",
				__('Yes', "js_composer") => "true"),
			"description" => __("select the arrow if you want", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),       

		array(
			"type" => "dropdown",
			"heading" => __("Arrow Style", "js_composer"),
			"param_name" => "arrow_type",
			"value" => array( __('Default', "js_composer") => "",
				__('Arrow Top Right', "js_composer") => "arrow-style2"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "js_composer"),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "js_composer"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you want to display carousel dot nav?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Auto Height", "js_composer"),
			"param_name" => "slider_height",
			"value" => array( __('No', "js_composer") => "false",
							  __('Yes', "js_composer") => "true"),
			"description" => __("By Enabling this, slider height will vary depends on content for each slide. Please turn off this if you have more content below tweets to avoid page moving.", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),  

		array(
			"type" => "dropdown",
			"heading" => __("Stop carousel On Hover", "js_composer"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => '',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Mouse Drag?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			), 
		
		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "js_composer"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "js_composer") => "true",
				__('No', "js_composer") => "false"),
			"description" => __("Do you like to move carousel Touch Drag (in touch devices)?", "js_composer"),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Slider', 'js_composer')
			),       

		)
) );

if (class_exists('Woocommerce')) {

	// Woo Commerce Recent Product
	vc_map( array(
		"name" => __("Woo Commerce Recent Product", "js_composer"), //Title
		"base" => "recent_products", //Shortcode name
		"class" => "",
		"icon" => "icon-pixel8es",
		"category" => 'By Pixel8es', //category
		"params" => array(

			array(
				"type" => "textfield",
				"heading" => __("Products Per Page", "js_composer"),
				"param_name" => "per_page",
				"value" => "8",
				"description" => __("How many products you want to shown in per page", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "orderby",
				"value" => array( __('Date', "js_composer") => "date",  
								  __('Rand', "js_composer") => "rand",
								  __('ID', "js_composer") => "ID"),
				"description" => __("Order posts By choosen order", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array( __('Ascending order', "js_composer") => "ASC",  
								  __('descending order', "js_composer") => "DESC"),
				"description" => __("In which Order, you want to display posts", "js_composer")
				),
			)
	) );


	// Woo Commerce Feature Product
	vc_map( array(
		"name" => __("Woo Commerce Feature Product", "js_composer"), //Title
		"base" => "featured_products", //Shortcode name
		"class" => "",
		"icon" => "icon-pixel8es",
		"category" => 'By Pixel8es', //category
		"params" => array(

			array(
				"type" => "textfield",
				"heading" => __("Products Per Page", "js_composer"),
				"param_name" => "per_page",
				"value" => "8",
				"description" => __("How many products you want to shown in per page", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "orderby",
				"value" => array( __('Date', "js_composer") => "date",  
								  __('Rand', "js_composer") => "rand",
								  __('ID', "js_composer") => "ID"),
				"description" => __("Order posts By choosen order", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array( __('Ascending order', "js_composer") => "ASC",  
								  __('descending order', "js_composer") => "DESC"),
				"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
				"description" => __("In which Order, you want to display posts", "js_composer")
				),
			)
	) );


	// Woo Commerce Sale Product
	vc_map( array(
		"name" => __("Woo Commerce Sale Product", "js_composer"), //Title
		"base" => "sale_products", //Shortcode name
		"class" => "",
		"icon" => "icon-pixel8es",
		"category" => 'By Pixel8es', //category
		"params" => array(

			array(
				"type" => "textfield",
				"heading" => __("Products Per Page", "js_composer"),
				"param_name" => "per_page",
				"value" => "8",
				"description" => __("How many products you want to shown in per page", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "orderby",
				"value" => array( __('Date', "js_composer") => "date",  
								  __('Rand', "js_composer") => "rand",
								  __('ID', "js_composer") => "ID"),
				"description" => __("Order posts By choosen order", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array( __('Ascending order', "js_composer") => "ASC",  
								  __('descending order', "js_composer") => "DESC"),
				"description" => __("In which Order, you want to display posts", "js_composer")
				),
			)
	) );


	// Woo Commerce Top Rated Product
	vc_map( array(
		"name" => __("Woo Commerce Top Rated Product", "js_composer"), //Title
		"base" => "top_rated_products", //Shortcode name
		"class" => "",
		"icon" => "icon-pixel8es",
		"category" => 'By Pixel8es', //category
		"params" => array(

			array(
				"type" => "textfield",
				"heading" => __("Products Per Page", "js_composer"),
				"param_name" => "per_page",
				"value" => "8",
				"description" => __("How many products you want to shown in per page", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "orderby",
				"value" => array( __('Date', "js_composer") => "date",  
								  __('Rand', "js_composer") => "rand",
								  __('ID', "js_composer") => "ID"),
				"description" => __("Order posts By choosen order", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array( __('Ascending order', "js_composer") => "ASC",  
								  __('descending order', "js_composer") => "DESC"),
				"description" => __("In which Order, you want to display posts", "js_composer")
				),
			)
	) );


	// Woo Commerce Selected Products
	vc_map( array(
		"name" => __("Woo Commerce Selected Product", "js_composer"), //Title
		"base" => "products", //Shortcode name
		"class" => "",
		"icon" => "icon-pixel8es",
		"category" => 'By Pixel8es', //category
		"params" => array(

			array(
				"type" => "textfield",
				"heading" => __("Products ID", "js_composer"),
				"param_name" => "ids",
				"value" => "",
				"description" => __("Type the products id's separated by commas", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "orderby",
				"value" => array( __('Date', "js_composer") => "date",  
								  __('Rand', "js_composer") => "rand",
								  __('ID', "js_composer") => "ID"),
				"description" => __("Order posts By choosen order", "js_composer")
				),

			array(
				"type" => "dropdown",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array( __('Ascending order', "js_composer") => "ASC",  
								  __('descending order', "js_composer") => "DESC"),
				"description" => __("In which Order, you want to display posts", "js_composer")
				),
			)
	) );
}


//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => __("Lists", "js_composer"),
	"base" => "list",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
    "as_parent" => array('only' => 'li'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    /*"params" => array(
        // add params same as with any other content element
    	array(
    		"type" => "dropdown",
    		"heading" => __("Style", "js_composer"),
    		"param_name" => "style",
    		"value" => array( __('default', "js_composer") => "default",
    			__('style1', "js_composer") => "style1",
    			__('style2', "js_composer") => "style2"),
    		"description" => __("Choose list style", "js_composer"),
    		)
    	),*/
    "js_view" => 'VcColumnView'
    ) );
vc_map( array(
	"name" => __("List Item", "js_composer"),
	"base" => "li",
	"icon" => "icon-pixel8es",
	"category" => 'By Pixel8es', //category
	"content_element" => true,
    "as_child" => array('only' => 'list'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
    	array(
    		"type" => "icon",
    		"heading" => __("Insert Icon", "js_composer"),
    		"param_name" => "icon_name",
    		"value" => '',
    		"description" => __("Choose icon if you to display icons before list", "js_composer")
    		),

    	/*content*/
    	array(
    		"type" => "textarea",
    		"holder" => "li",
    		"class" => "",
    		"heading" => __("Content", "js_composer"),
    		"param_name" => "content",
    		"value" => "Enter your list item text here",
    		"description" => __("Enter your list item content.", "js_composer")
    		),

    	array(
    		"type" => "dropdown",
    		"heading" => __("Icon Color", "js_composer"),
    		"param_name" => "icon_color",
    		"value" => array(__('black', "js_composer") => "",  
    			__('Theme Primary Color', "js_composer") => "color",
    			__('custom color', "js_composer") => "custom"),
    		"description" => ''
    		),

    	array(
    		"type" => "colorpicker",
    		"class" => "",
    		"heading" => __("Text color", "js_composer"),
    		"param_name" => "user_icon_color",
    		"value" => '', 
    		"description" => __("Choose text color", "js_composer"),
    		"dependency" => Array('element' => "icon_color", 'value' => array('custom'))
    		),
    	)
) );
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_list extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_li extends WPBakeryShortCode {
	}
}




//Template

/** Skin Advertising*/
$pix_data               = array();
$pix_data['name']       = __( 'Skin Advertising', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-advertising.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400186745014{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" overlay="none" pattern_style="style1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="1"][/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/1"][vc_column_text css=".vc_custom_1400504387936{margin-bottom: 10px !important;border-color: #c6c6c6 !important;}"]
<p style="text-align: center; font-size: 16px; color: #6d6d6d;">COMPELLINGLY REDEFINE CLIENT FOCUSED LEADERSHIP</p>
[/vc_column_text][title title="WE INTRODUCE ELECTRIFY!" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" align="center"][vc_row_inner][vc_column_inner width="1/1"][vc_single_image alignment="center" border_color="grey" img_link_target="_self"][/vc_column_inner][/vc_row_inner][spacer height="30px"][title title="WE OFFERING..." font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" animate="no" transition="flash" align="center" title_margin="0 0 20px 0"][vc_column_text css=".vc_custom_1400511818415{padding-right: 150px !important;padding-left: 150px !important;}"]
<p style="text-align: center;">Seamlessly pontificate robust web-readiness and cross-media methodologies proactively develop global portals before scalable catalysts for change.</p>
[/vc_column_text][vc_row_inner css=".vc_custom_1400512011480{margin-top: 40px !important;padding-right: 150px !important;padding-left: 150px !important;}"][vc_column_inner width="1/6"][icon align="center" icon_name="pixicon-eleganticons-326" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#afd798"][title title="MOBILE APP" align="center" font_size="size-sm" custom_font_size="14px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="10px 0 0 0"][/vc_column_inner][vc_column_inner width="1/6"][icon align="center" icon_name="pixicon-eleganticons-325" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#afd798"][title title="UI / UX" align="center" font_size="size-sm" custom_font_size="14px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="10px 0 0 0"][/vc_column_inner][vc_column_inner width="1/6"][icon align="center" icon_name="pixicon-eleganticons-327" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#afd798"][title title="MARKETING" align="center" font_size="size-sm" custom_font_size="14px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="10px 0 0 0"][/vc_column_inner][vc_column_inner width="1/6"][icon align="center" icon_name="pixicon-eleganticons-314" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#afd798"][title title="PHOTOGRAPHY" align="center" font_size="size-sm" custom_font_size="14px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="10px 0 0 0"][/vc_column_inner][vc_column_inner width="1/6"][icon align="center" icon_name="pixicon-eleganticons-321" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#afd798"][title title="CONSULTING" align="center" font_size="size-sm" custom_font_size="14px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="10px 0 0 0"][/vc_column_inner][vc_column_inner width="1/6"][icon align="center" icon_name="pixicon-eleganticons-329" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#afd798"][title title="PRINT" align="center" font_size="size-sm" custom_font_size="14px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="10px 0 0 0"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row type="full-width" color_style="light" parallax="no" pattern="no" pattern_style="style1" css=".vc_custom_1402007266979{padding-top: 60px !important;padding-bottom: 60px !important;}" overlay="none" parallax_ratio="0.5" pattern_opacity="1" theme_primary="yes" theme_primary_alpha="1"][vc_column width="1/1"][callout_box callout_style="default" callout_align="left" title_tag="h2" title="Only thing it can't do is disappoint you!" display_button="yes" button_text="Purchase Now" button_link="#" button_style="solid" button_color="white" button_size="md" button_target="_blank" display_button2="no" button_text2="Read More" button_link2="#" button_style2="outline" button_color2="color" button_size2="md" button_target2="_blank" animate="no" transition="flash"]Assertively embrace client-centric manufactured products after effective experiences authoritatively leverage other's standardized platforms after principle.[/callout_box][/vc_column][/vc_row][vc_row css=".vc_custom_1407999353253{background-image: url(http://placehold.it/1170x400?id=) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" overlay_color="rgba(255,255,255,0.96)" pattern_style="style1" pattern_opacity="1" dot_nav="no" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][vc_column_text css=".vc_custom_1400513415960{margin-bottom: 10px !important;border-color: #c6c6c6 !important;}"]
<p style="text-align: center; font-size: 16px; color: #6d6d6d;">PHOSFLUORESCENTLY LEVERAGE EXISTING WORLD WIDE INFRASTRUCTRES</p>
[/vc_column_text][title title="HOW WE HELP YOU TO GROW YOUR BUSINESS?" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" align="center"][vc_row_inner][vc_column_inner width="1/3"][spacer height="50px"][icon_box icon_type="icon" icon_name="pixicon-shop" title="CREATIVITY" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="default" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left right" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="16px"]
<p style="text-align: right;">Professionally expanded array of growth strategies for premium communities.</p>
[/icon_box][icon_box icon_type="icon" icon_name="pixicon-paperplane" title="CONSULTING" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="default" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left right" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="16px"]
<p style="text-align: right;">Enthusiastically disseminate bricks-and-clicks before resource sucking information.</p>
[/icon_box][icon_box icon_type="icon" icon_name="pixicon-bulb" title="IDEAS" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="default" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left right" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="16px"]
<p style="text-align: right;">Uniquely architect global e-business through competitive technology transform models.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][vc_single_image border_color="grey" img_link_target="_self" img_size="full" alignment="center"][/vc_column_inner][vc_column_inner width="1/3"][spacer height="50px"][icon_box icon_type="icon" icon_name="pixicon-flow-tree" title="MARKETING" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="default" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="16px"]Intrinsicly supply future-proof platforms and team building channels.[/icon_box][icon_box icon_type="icon" icon_name="pixicon-zynga" title="MANAGEMENT" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="default" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="16px"]Compellingly productivate covalent methods for empowered catalysts for change.[/icon_box][icon_box icon_type="icon" icon_name="pixicon-heart-2" title="SUPPORT" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="default" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="16px"]Progressively actualize revolutionary innovation whereas goal-oriented collaboration.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row][vc_column width="1/1"][vc_column_text css=".vc_custom_1400564936352{margin-bottom: 10px !important;border-color: #c6c6c6 !important;}"]
<p style="text-align: center; font-size: 16px; color: #6d6d6d;">PROACTIVELY INNOVATE USER WITHOUT REVOLUTIONARY PARADIGMS</p>
[/vc_column_text][title title="WHAT OUR HAPPY CLIENTS SAY ABOUT US?" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" align="center"][testimonial insert_type="posts" no_of_testimonial="-1" order_by="date" order="ASC" style="style2" no_of_col="1" rating_no="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="false" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row type="full-width" color_style="dark" parallax="no" pattern="no" pattern_style="style1" css=".vc_custom_1400566713877{padding-top: 40px !important;padding-bottom: 0px !important;background: #afd798 url(http://placehold.it/1170x400) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" overlay="none" parallax_ratio="0.5" pattern_opacity="1"][vc_column width="1/1"][vc_row_inner][vc_column_inner width="1/4"][vc_single_image border_color="grey" img_link_target="_self" img_size="full" alignment="center"][/vc_column_inner][vc_column_inner width="1/2"][spacer height="65px"][title title="Your Search comes to an end, You found us!" font_size="size-sm" custom_font_size="18px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="0 0 20px 0"][vc_column_text]Holisticly cultivate high-payoff technologies through seamless channels assertively incubate extensible functionalities through equity invested scenarios.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][spacer height="65px"][button button_text="Buy Now" button_link="#" button_style="solid" button_size="md" custom_size="no" button_align="button-center" button_color="color" animate="no" transition="flash"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Agency */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Agency', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-agency.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400360024033{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="1"][/vc_column][/vc_row][vc_row css=".vc_custom_1400360462344{padding-bottom: 55px !important;background-color: #ffffff !important;}" type="full-width" color_style="dark" parallax="no" pattern="no" pattern_style="style1" overlay="none" parallax_ratio="0.5" pattern_opacity="1"][vc_column width="1/1"][title align="center" title_tag="h2" title="Our Mission" sub_title="yes" sub_title_text="Promote, Innovative, and Efficient" line="yes" animate="no" transition="fade"][vc_row_inner][vc_column_inner width="1/3"][icon_box icon_name="pixicon-man-people-streamline-user" title_tag="h2" title="Phosfluorescently impact" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="fade"]Globally supply customized portals and extensive infomediaries competently orchestrate team building e-services with inexpensive.[/icon_box][spacer height="20px"][icon_box icon_name="pixicon-database-streamline" title_tag="h2" title="Seamlessly incentivize efficient" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="fade"]Proactively evolve proactive total linkage rather than standards compliant value conveniently leverage existing end-to-end.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_name="pixicon-like-love-streamline" title_tag="h2" title="Completely disintermediate" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="fade"]Intrinsicly architect principle-centered experiences without efficiently foster cross-unit best practices without fully.[/icon_box][spacer height="20px"][icon_box icon_name="pixicon-earth-globe-streamline" title_tag="h2" title="Conveniently recaptiualize error" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="fade"]Completely monetize emerging benefits via performance based content progressively transform open-source architectures.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_name="pixicon-cocktail-mojito-streamline" title_tag="h2" title="Progressively parallel task" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="fade"]Appropriately mesh progressive imperatives for scalable channels uniquely target corporate ideas for premier content.[/icon_box][spacer height="20px"][icon_box icon_name="pixicon-chef-food-restaurant-streamline" title_tag="h2" title="Objectively formulate" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="fade"]Collaboratively matrix exceptional users vis-a-vis equity invested e-markets distinctively conceptualize cost effective markets after go forward outside.[/icon_box][/vc_column_inner][/vc_row_inner][button button_text="View Our Works" button_link="#" button_style="solid" button_size="md" custom_size="no" button_color="color" button_icon="pixicon-eleganticons-3" animate="no" transition="fade" button_align="button-center"][/vc_column][/vc_row][vc_row type="expandable" color_style="dark" parallax="no" pattern="no" pattern_style="style1" css=".vc_custom_1400361116807{padding-bottom: 55px !important;background-color: #f6f6f6 !important;}" parallax_ratio="0.5" overlay="none" pattern_opacity="1"][vc_column width="1/1"][title align="center" title_tag="h2" title="Our Latest Projects" sub_title="yes" sub_title_text="Our Awesome Works" line="yes" animate="no" transition="fade"][spacer height="30px"][portfolio insert_type="posts" pix_filterable="yes" filter_style="dropdown" no_of_items="8" order_by="date" order="ASC" columns="col4" title_tag="h2" lightbox="yes" like="yes" single_portfolio_link="yes" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][spacer height="20px"][button button_text="View Our Works" button_link="#" button_style="solid" button_size="md" custom_size="no" button_color="color" button_icon="pixicon-eleganticons-3" animate="no" transition="fade" button_align="button-center"][/vc_column][/vc_row][vc_row type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1400361107384{padding-bottom: 55px !important;}"][vc_column width="1/1"][title align="center" title_tag="h2" title="Our Services" sub_title="yes" sub_title_text="What we offer ?" line="yes" animate="no" transition="fade"][spacer height="30px"][vc_row_inner][vc_column_inner width="1/3"][icon_box icon_name="pixicon-fontawesome-webfont-161" title_tag="h2" title="App Design" icon_style="double-circle small-circle" icon_color="color" display_button="yes" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="sm" button_icon="pixicon-right-open-mini" align="left" icon_align="no" animate="no" transition="flash" icon_hover="yes" icon_type="icon" icon_below="no"]Appropriately engage interactive portals with seamless leadership skills appropriately parallel task resource-leveling products.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_name="pixicon-fontawesome-webfont-283" title_tag="h2" title="Print Design" icon_style="double-circle small-circle" icon_color="color" display_button="yes" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="sm" button_icon="pixicon-eleganticons-20" align="left" icon_align="no" animate="no" transition="flash" icon_hover="yes" icon_type="icon" icon_below="no"]Collaboratively generate dynamic portals through alternative technologies. Globally formulate state of the art content via virtual total linkage.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_name="pixicon-trophy-1" title_tag="h2" title="Photography" icon_style="double-circle small-circle" icon_color="color" display_button="yes" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="sm" button_icon="pixicon-eleganticons-20" align="left" icon_align="no" animate="no" transition="flash" icon_hover="yes" icon_type="icon" icon_below="no"]Conveniently optimize plug-and-play resources with market-driven resources seamlessly underwhelm interoperable best practices with top-line partnerships.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401791658759{background-image: url(http://support.pixel8es.com/wp-content/uploads/2014/05/1.jpg?id=259) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="dark" parallax="no" pattern="no" pattern_style="style1" overlay="none" parallax_ratio="0.5" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title_tag="h2" title="Our Happy Clients" sub_title="yes" sub_title_text="We make them happy!" line="yes" animate="no" transition="fade" align="center" font_size="21px"][clients images="196,195,194,193,192,191" link="yes" title_on_hover="yes" items="5" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" custom_links="#,#,#,#,#,#" titles="Polaris, Natura, Levis, EKOL, Virtus, Allianz"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Beauty*/
$pix_data               = array();
$pix_data['name']       = __( 'Skin Beauty', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-beauty.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400852809108{padding-top: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="14"][/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1402142714852{padding-top: 0px !important;padding-bottom: 65px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="OUR TREATMENT" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="We always think and care about you..." line="yes" animate="no" transition="flash" line_positions="below-sub-title" line_style="line-style1" align="center"][spacer height="60px"][vc_row_inner][vc_column_inner width="1/4"][icon_box icon_image_con="yes" icon_image="16" icon_image_style="rectangle" icon_type="icon" title="SKIN THERAPHY" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="yes" animate="no" transition="flash" line="no" line_style="line-style1"]Proactively whiteboard competitive opportunities whereas resource sucking data cross unit markets.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="yes" icon_image="3606" icon_image_style="rectangle" icon_type="icon" title="HAIR DRESSERS" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="yes" animate="no" transition="flash" line="no" line_style="line-style1"]Enthusiastically benchmark effective customer service revolutionary paradigms.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="yes" icon_image="3605" icon_image_style="rectangle" icon_type="icon" title="SKIN CARE" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="yes" animate="no" transition="flash" line="no" line_style="line-style1"]Seamlessly scale backend manufactured products without vertical growth strategies.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="yes" icon_image="3604" icon_image_style="rectangle" icon_type="icon" title="DRESSING" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="yes" animate="no" transition="flash" line="no" line_style="line-style1"]Completely generate cross-media functionalities and client-centered content.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1403874415534{padding-top: 30px !important;padding-bottom: 40px !important;background-image: url(http://pixel8esthemes.com/electrify/wp-content/uploads/sites/2/2014/05/call-out-bg.jpg?id=2020) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="2/3"][spacer height="10px"][title title="NEED AN APPOINTMENT? CONTACT US NOW AND GET AN FREE APPOINMENT" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text=" Intrinsicly integrate multidisciplinary total linkage whereas business supply chains." line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" sub_title_margin="0px"][/vc_column][vc_column width="1/3"][spacer height="12px"][button button_text="Read More" button_link="url:%23||" button_style="outline" button_size="md" custom_size="no" button_color="white" button_icon_align="front" animate="no" transition="flash" button_align="button-right"][/vc_column][/vc_row][vc_row][vc_column width="1/1"][title title="RECENT ARTICLES" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="We always think and care about you..." line="yes" animate="no" transition="flash" line_positions="below-sub-title" line_style="line-style1" align="center"][spacer height="60px"][vc_row_inner][vc_column_inner width="1/1"][blog no_of_items="3" order_by="date" order="DESC" title_tag="h2" display_date="yes" style="style1" columns="col3" display_comments="yes" blog_desc="no" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" insert_type="category" blog_post_category="beauty"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1403874472267{background-image: url(http://pixel8esthemes.com/electrify/wp-content/uploads/sites/2/2014/05/beauty-testimonial.jpg?id=2070) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="OUR HAPPY CLIENTS" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="We always think and care about you..." line="yes" animate="no" transition="flash" line_positions="below-sub-title" line_style="line-style1" align="center"][spacer height="60px"][vc_row_inner][vc_column_inner width="1/1"][testimonial insert_type="posts" no_of_testimonial="3" order_by="date" order="ASC" style="style1" no_of_col="1" rating_no="no" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401285072465{background-position: 0 0 !important;background-repeat: repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="BE IN TOUCH FOREVER" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="We always think and care about you..." line="yes" animate="no" transition="flash" line_positions="below-sub-title" line_style="line-style1" align="center"][spacer height="60px"][vc_row_inner css=".vc_custom_1400494700904{padding-right: 200px !important;padding-left: 200px !important;}"][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-110" icon_style="bg-none" icon_type="icon-circle" title="You Have a Question?" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]

support@pixel8es.com

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-133" icon_style="bg-none" icon_type="icon-circle" title="Call Us Now!" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]

(701) 700-2339

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-123" icon_style="bg-none" icon_type="icon-circle" title="Find Us Now!" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]

8184 Dewy Boulevard,
North Dakota, US

[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Consulting*/
$pix_data               = array();
$pix_data['name']       = __( 'Skin Consulting', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-consulting.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400186745014{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" overlay="none" pattern_style="style1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="1"][/vc_column_text][/vc_column][/vc_row][vc_row type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1400588235350{padding-bottom: 0px !important;}"][vc_column width="1/1"][vc_row_inner css=".vc_custom_1400588087207{padding-bottom: 0px !important;}"][vc_column_inner width="1/1"][title title="WE HELP YOU TO PROMOTE YOUR BUSINESS" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="0 0 20px 0"][vc_column_text]

PROGRESSIVELY FABRICATE PLUG AND PLAY

[/vc_column_text][line width="100%" align="center" color="#e2e2e2"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1400572760780{margin-top: 60px !important;}"][vc_column_inner width="1/4"][icon align="center" icon_name="pixicon-bucket" icon_style="bg-none" icon_type="icon-circle" title="BRANDING" title_tag="h2" animate="no" transition="flash" icon_size="33px" margin="0 0 20px 0"][vc_column_text]

Credibly leverage existing leveraged infrastructures whereas enterprise benefits monotonectally underwhelm seamless opportunity.

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][icon align="center" icon_name="pixicon-briefcase" icon_style="bg-none" icon_type="icon-circle" title="CREATIVE" title_tag="h2" animate="no" transition="flash" icon_size="33px" margin="0 0 20px 0"][vc_column_text]

Professionally foster extensive without exceptional web services. Proactively develop optimal internal or "organic" sources.

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][icon align="center" icon_name="pixicon-bell" icon_style="bg-none" icon_type="icon-circle" title="TECHNOLOGY" title_tag="h2" animate="no" transition="flash" icon_size="33px" margin="0 0 20px 0"][vc_column_text]

Monotonectally impact premier manufactured products for bleeding-edge value progressively evolve clientfocused paradigms.

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][icon align="center" icon_name="pixicon-brush" icon_style="bg-none" icon_type="icon-circle" title="ONLINE MARKETING" title_tag="h2" animate="no" transition="flash" icon_size="33px" margin="0 0 20px 0"][vc_column_text]

Continually fabricate diverse networks with leading-edge catalysts for change phosfluorescently extend client centered relationships.

[/vc_column_text][/vc_column_inner][/vc_row_inner][spacer height="100px"][line width="100%" align="center" color="#e2e2e2"][/vc_column][/vc_row][vc_row css=".vc_custom_1400649693303{padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_row_inner][vc_column_inner width="1/2"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column_inner][vc_column_inner width="1/2"][spacer height="60px"][title title="TAKE A CHANCE EXPLORE ALL THE POSSIBILITIES" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="0 0 15px 0"][vc_column_text]

EFFICIENTLY RECONCEPTTUALIZE BUSINESS MATERIALS

[/vc_column_text][vc_column_text css=".vc_custom_1400653371854{margin-bottom: 25px !important;}"]

Energistically coordinate an expanded array of scenarios before competitive interfaces conveniently reinvent ethical deliverables vis-a-vis e-business total linkage. Seamlessly conceptualize team building action items whereas end-to-end sources.

[/vc_column_text][spacer height="10px"][button button_text="View Features" button_link="#" button_style="solid" button_size="md" custom_size="no" button_color="color" animate="no" transition="flash" button_icon="pixicon-eleganticons-41" button_icon_align="back"][button button_text="Buy Now" button_link="#" button_style="solid" button_size="md" custom_size="no" button_color="no-color" animate="no" transition="flash" button_icon="pixicon-eleganticons-115"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400649805284{margin-top: -2px !important;padding-top: 2px !important;padding-bottom: 2px !important;}" type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][line width="100%" align="center" color="#e2e2e2"][vc_row_inner css=".vc_custom_1400590636964{margin-top: 30px !important;}"][vc_column_inner width="1/1"][title title="NO NEED TO WORRY ELECTRIFY FULFILL YOUR EXPECTATIONS" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="0 0 20px 0"][vc_column_text css=".vc_custom_1400595759398{margin-bottom: 30px !important;}"]

HOLISTICLY MYOCARDINATE SUPERIOR MODELS

[/vc_column_text][/vc_column_inner][/vc_row_inner][line width="100%" align="center" color="#e2e2e2"][/vc_column][/vc_row][vc_row type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_row_inner][vc_column_inner width="1/4"][title title="RECENT WORKS" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="0 0 20px 0"][line width="30px" align="left" color="#fcc21f" thickness="4px"][spacer height="20px"][vc_column_text]Credibly monetize top-line leadership without value-added infomediaries dynamically revolutionize focused niches after one-to-one expertise completely monetize high standards in growth strategies through just in time.[/vc_column_text][button button_text="Meet All Staffs" button_link="#" button_style="solid" button_size="sm" custom_size="no" button_color="color" animate="no" transition="flash" button_icon_align="front"][/vc_column_inner][vc_column_inner width="3/4"][staffs insert_type="posts" no_of_staff="3" order_by="date" order="ASC" columns="col3" style="style1" title_tag="h2" staff_desc="no" lightbox="yes" single_staff_link="yes" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][spacer height="65px"][line width="100%" align="center" color="#e2e2e2"][/vc_column][/vc_row][vc_row css=".vc_custom_1400655566157{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_row_inner][vc_column_inner width="1/1"][title title="EMBRACE YOUR PASSION" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" title_margin="0 0 15px 0" align="center"][vc_column_text]

CREDIBLY EXPEDITE PROGRESSIVE PLATFORMS

[/vc_column_text][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1402006680231{padding-top: 60px !important;padding-bottom: 60px !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="yes" theme_primary_alpha="1"][vc_column width="1/1"][callout_box callout_style="default" callout_align="left" title_tag="h2" title="Are you looking for a theme which contains everything?" display_button="yes" button_text="Read More" button_link="#" button_style="solid" button_color="white" button_size="sm" display_button2="yes" button_text2="Check Out Feature" button_link2="#" button_style2="outline" button_color2="color" button_size2="sm" animate="no" transition="flash"]Progressively incentivize multifunctional web services through premier materials.[/callout_box][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Corporate Business*/
$pix_data               = array();
$pix_data['name']       = __( 'Skin Corporate Business', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-corporate.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401777841204{padding-top: 0px !important;padding-bottom: 70px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="16"][/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1401777450261{padding-top: 0px !important;padding-bottom: 50px !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="A Little introduction about Electrify Theme" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Electrify - All in one WordPress theme. This theme suites for all kinds of business. You can create any type of design with this theme withouttouching a single line of code." line="no" animate="no" transition="flash" line_positions="below-title" line_style="line-style1" title_margin="0 0 20px 0"][/vc_column][/vc_row][vc_row theme_primary="yes" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-barbecue-eat-food-streamline" title="Ready for all Businesses" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="yes" animate="no" transition="flash"]

In vitae urna tellus. In ornare nisl vel urna commodo dignissim.

[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-world" title="WPML & Localization" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="yes" animate="no" transition="flash"]

Energistically disseminate virtual art intellectual state capital.

[/icon_box][/vc_column][vc_column width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-bulb" title="Creative Deign" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="yes" animate="no" transition="flash"]

Interactively conceptualize virtual action items than worldwide.

[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-study" title="Fully Documentated" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="yes" animate="no" transition="flash"]

Professionally fashion quality paradigms rather than platforms.

[/icon_box][/vc_column][vc_column width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-paperplane" title="Responsive Design" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="yes" animate="no" transition="flash"]

Holisticly enable leading-edge value with cross-media platforms.

[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-whatsapp" title="Awesome Support" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="yes" animate="no" transition="flash"]

Competently build standardized through low-high best practices.

[/icon_box][/vc_column][/vc_row][vc_row css=".vc_custom_1403162173711{background-image: url(http://placehold.it/1170x400) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][tweets twtcount="6" tweet_align="center" no_of_col="1" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="false" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row css=".vc_custom_1401740542217{padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="How we work?" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Electrify - All in one WordPress theme. This theme suites for all kinds of business. You can create any type of design with this theme without
touching a single line of code." line="yes" animate="no" transition="flash"][/vc_column][/vc_row][vc_row css=".vc_custom_1400854323851{padding-top: 50px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/4"][process type="default" text="number" circle_text="01" title="Analyse" process_content="no" process_style="nav-style straight" animate="no" transition="flash"][/vc_column][vc_column width="1/4"][process type="default" text="number" circle_text="02" title="Planning" process_content="no" process_style="nav-style straight" animate="no" transition="flash"][/vc_column][vc_column width="1/4"][process type="default" text="number" circle_text="03" title="Designing" process_content="no" process_style="nav-style straight" animate="no" transition="flash"][/vc_column][vc_column width="1/4"][process type="default" text="number" circle_text="04" title="Developing" process_content="no" process_style="default" animate="no" transition="flash"][/vc_column][/vc_row][vc_row css=".vc_custom_1400855908376{background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Why Choose Us?" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Electrify - All in one WordPress theme. This theme suites for all kinds of business. You can create any type of design with this theme
without touching a single line of code." line="yes" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" title="Visual Composer" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]

In vitae urna tellus. In ornare nisl vel urna commodo dignissim.

[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" title="Layer Slider" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" line="no" line_style="line-style1"]

Proactively orchestrate less metrics rather than vectors.

[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" title="Woo Commerce" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]

Seamlessly compelling core competencies after customer.

[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" title="WPML Support" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]

Dynamically formulate sticky applications and user-interfaces.

[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400855787715{padding-bottom: 0px !important;background-color: #3c5895 !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Be In Touch Forever" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Contact us using below information. Usually we contact you back in 24 hours" line="yes" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-paperplane" title="Ask Your Questions" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]

support@example.com

[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-headset-sound-streamline" title="Call Us Now!" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]

(701) 700-2339

[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-map-pin-streamline" title="Find Us Now!" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]

8184 Dewy Boulevard,
North Dakota, US

[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Creative */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Creative', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-creative.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401173668250{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="8"][/vc_column][/vc_row][vc_row css=".vc_custom_1401192231675{margin-top: -72px !important;padding-top: 71px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/creative-top-bg.png?id=2194) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="creativebg-pos"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401185133519{background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="WHAT WE OFFER" style="box-title" align="center" font_size="size-sm" custom_font_size="35px" title_tag="h2" sub_title="yes" sub_title_text="Assertively benchmark sustainable action items" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 15px 0"][spacer height="70px"][vc_row_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-graduation-cap" title="Creative Design" title_tag="h2" custom_size="21px" icon_style="square-front circle-front" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]Holisticly evisculate performance based opportunities without effective supply chains.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-heart-1" title="Endless Layout" title_tag="h2" custom_size="21px" icon_style="square-front circle-front" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]Professionally maintain synergistic sources after sticky leadership line portals.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-flow-cascade" title="Retina Ready" title_tag="h2" custom_size="21px" icon_style="square-front circle-front" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]Distinctively synergize next-generation strategic theme areas through proactive catalysts for change.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-hourglass" title="Unlimited Colors" title_tag="h2" custom_size="21px" icon_style="square-front circle-front" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]Uniquely exploit backward-compatible web services before leading-edge e-business.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401192250267{padding-top: 72px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/creative-bottom-bg.png?id=2193) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="creativebg-pos"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401194292819{margin-top: -72px !important;padding-top: 172px !important;padding-bottom: 172px !important;background-color: #f2333a !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_row_inner][vc_column_inner width="1/4"][icon align="center" icon_name="pixicon-eleganticons-97" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash"][spacer height="10px"][counter number="754" text="Designs" icon="no" icon_name="pixicon-heart-2" icon_align="center" icon_color=" color" border="no" number_font_size="30px"][/vc_column_inner][vc_column_inner width="1/4"][icon align="center" icon_name="pixicon-eleganticons-92" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash"][spacer height="10px"][counter number="329" text="JQuery Apps" icon="no" icon_name="pixicon-heart-2" icon_align="center" icon_color=" color" border="no" number_font_size="30px"][/vc_column_inner][vc_column_inner width="1/4"][icon align="center" icon_name="pixicon-eleganticons-128" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash"][spacer height="10px"][counter number="257" text="Protocols" icon="no" icon_name="pixicon-heart-2" icon_align="center" icon_color=" color" border="no" number_font_size="30px"][/vc_column_inner][vc_column_inner width="1/4"][icon align="center" icon_name="pixicon-eleganticons-121" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash"][spacer height="10px"][counter number="4852" text="Photography" icon="no" icon_name="pixicon-heart-2" icon_align="center" icon_color=" color" border="no" number_font_size="30px"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row css=".vc_custom_1401192231675{margin-top: -72px !important;padding-top: 71px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/creative-top-bg.png?id=2194) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="creativebg-pos"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401775886986{padding-bottom: 70px !important;background-color: #f6f6f6 !important;}" type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="FEATURED WORKS" style="box-title" align="center" font_size="size-sm" custom_font_size="35px" title_tag="h2" sub_title="yes" sub_title_text="Assertively benchmark sustainable action items" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 15px 0"][spacer height="70px"][portfolio insert_type="posts" pix_filterable="no" filter_style="normal" no_of_items="8" order_by="date" order="ASC" columns="col4" style="style2" title_tag="h2" lightbox="yes" like="yes" single_portfolio_link="yes" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][spacer height="60px"][button button_text="View all projects" button_link="#" button_style="outline" button_color="color" button_size="md" custom_size="no" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column][/vc_row][vc_row css=".vc_custom_1401192250267{padding-top: 72px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/creative-bottom-bg.png?id=2193) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="creativebg-pos"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401194292819{margin-top: -72px !important;padding-top: 172px !important;padding-bottom: 172px !important;background-color: #f2333a !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="WE ARE SOCIAL" style="box-title" align="center" font_size="size-sm" custom_font_size="35px" title_tag="h2" sub_title="yes" sub_title_text="Assertively benchmark sustainable action items" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 15px 0"][spacer height="20px"][social style="style3" facebook="#" twitter="#" gplus="#" dribble="#" tumblr="#"][/vc_column][/vc_row][vc_row css=".vc_custom_1401775629573{margin-top: -72px !important;padding-top: 71px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/creative-footer-top-bg.png?id=2762) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="creativebg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Creative Agency */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Creative Agency', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-creative-agency.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400186745014{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" overlay="none" pattern_style="style1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="1"][/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1399876676733{padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" overlay="none" pattern_style="style1"][vc_column width="1/1"][icon align="center" icon_name="pixicon-eleganticons-128" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#ed90a3"][vc_column_text css=".vc_custom_1400479485376{margin-bottom: 10px !important;border-color: #c6c6c6 !important;}"]
<p style="text-align: center"><em>Compellingly redefine client-focused leadership...</em></p>
[/vc_column_text][title align="center" title_tag="h2" title="ABOUT ELECTRIFY" sub_title="no" sub_title_text="Competently build performance based products" line="no" animate="no" transition="flash" title_margin="0 0 10px 0"][spacer height="10px"][line width="50px" thickness="3px" align="center" color="#282827"][vc_row_inner css=".vc_custom_1400478614596{padding-right: 60px !important;padding-left: 60px !important;}"][vc_column_inner width="1/3"][spacer height="30px"][vc_single_image border_color="grey" img_link_target="_self" img_size="full"][/vc_column_inner][vc_column_inner width="2/3"][spacer height="70px"][icon align="left" icon_name="pixicon-eleganticons-121" icon_style="outline" icon_type="icon-circle" title_tag="h2" title="We are Creative" margin="Title" animate="no" transition="flash" text_font="16px" icon_color="#ed90a3"][vc_column_text css=".vc_custom_1400422992284{margin-bottom: 20px !important;padding-top: 10px !important;}"]Compellingly reinvent cross-media relationships with ubiquitous data progressively leverage existing installed base channels and viral infomediaries dramatically build open-source.[/vc_column_text][spacer height="10px"][icon align="left" icon_name="pixicon-eleganticons-109" icon_style="outline" icon_type="icon-circle" title_tag="h2" title="We are Unique" margin="Title" animate="no" transition="flash" text_font="16px" icon_color="#ed90a3"][vc_column_text css=".vc_custom_1400478077277{margin-bottom: 20px !important;padding-top: 10px !important;}"]Dynamically fabricate market-driven networks via flexible networks enthusiastically productivate scalable resources through enabled synergy holisticly iterate open-source infrastructures.[/vc_column_text][spacer height="10px"][icon align="left" icon_name="pixicon-eleganticons-118" icon_style="outline" icon_type="icon-circle" title_tag="h2" title="We are Expensive" margin="Title" animate="no" transition="flash" text_font="16px" icon_color="#ed90a3"][vc_column_text css=".vc_custom_1400423406706{margin-bottom: 20px !important;padding-top: 10px !important;}"]Globally synthesize covalent leadership before best-of-breed resources interactively iterate global content before solutions proactively integrate maintainable convergence through magnetic channels.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="color" overlay_color="rgba(255,255,255,0.9)" pattern_style="style1" pattern_opacity="1" dot_nav="no" theme_primary="yes" theme_primary_alpha="1"][vc_column width="1/1"][vc_row_inner][vc_column_inner width="1/1"][icon align="center" icon_name="pixicon-eleganticons-129" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#ed90a3"][vc_column_text css=".vc_custom_1400481851464{margin-bottom: 10px !important;border-color: #c6c6c6 !important;}"]
<p style="text-align: center"><em>Dynamically build high synthesize standards...</em></p>
[/vc_column_text][title align="center" title_tag="h2" title="OUR ACHIVEMENTS" sub_title="no" sub_title_text="Competently build performance based products" line="no" animate="no" transition="flash" title_margin="0 0 10px 0" font_size="size-sm"][spacer height="10px"][line width="50px" thickness="3px" align="center" color="#282827"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1400481706225{padding-top: 50px !important;padding-right: 200px !important;padding-left: 200px !important;}"][vc_column_inner width="1/4"][counter number="754" text="Designs" icon="no" icon_name="pixicon-heart-2" icon_align="center" icon_color=" color" border="no" number_font_size="30px"][/vc_column_inner][vc_column_inner width="1/4"][counter number="329" text="JQuery Apps" icon="no" icon_name="pixicon-heart-2" icon_align="center" icon_color=" color" border="no" number_font_size="30px"][/vc_column_inner][vc_column_inner width="1/4"][counter number="257" text="Protocols" icon="no" icon_name="pixicon-heart-2" icon_align="center" icon_color=" color" border="no" number_font_size="30px"][/vc_column_inner][vc_column_inner width="1/4"][counter number="4852" text="Photography" icon="no" icon_name="pixicon-heart-2" icon_align="center" icon_color=" color" border="no" number_font_size="30px"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400496801152{padding-bottom: 0px !important;background-position: 0 0 !important;background-repeat: repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="color" pattern_style="style1" pattern_opacity="1" overlay_color="#ffffff"][vc_column width="1/1"][icon align="center" icon_name="pixicon-eleganticons-121" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#ed90a3"][vc_column_text css=".vc_custom_1400501188803{margin-bottom: 10px !important;border-color: #c6c6c6 !important;}"]
<p style="text-align: center"><em>Collaboratively foster world-class e-tailers...</em></p>
[/vc_column_text][title align="center" title_tag="h2" title="AWESOME FUNCTIONALITIES" sub_title="no" sub_title_text="Competently build performance based products" line="no" animate="no" transition="flash" title_margin="0 0 10px 0" font_size="size-sm"][spacer height="10px"][line width="50px" thickness="3px" align="center" color="#282827"][spacer height="20px"][vc_row_inner][vc_column_inner width="1/4"][spacer height="40px"][title title="Responsive Design" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" custom_font_size="16px" title_margin="0 0 10px 0"][vc_column_text]Continually brand compelling relationships through low-risk high-yield results.[/vc_column_text][title title="Retina Ready" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" custom_font_size="16px" title_margin="0 0 10px 0"][vc_column_text]Authoritatively transition timely paradigms rather than technically sound architecture virtual data.[/vc_column_text][title title="Endless Possibilities" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" custom_font_size="16px" title_margin="0 0 10px 0"][vc_column_text]Professionally empower resource-leveling leadership skills vis-a-vis user friendly innovation.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image border_color="grey" img_link_target="_self" img_size="full" alignment="center"][/vc_column_inner][vc_column_inner width="1/4"][spacer height="40px"][title title="Unlimited Colors" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" custom_font_size="16px" title_margin="0 0 10px 0" align="right"][vc_column_text]
<p style="text-align: right">Interactively synergize one-to-one customer service before sticky convergence.</p>
[/vc_column_text][title title="Powerful Admin Panel" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" custom_font_size="16px" title_margin="0 0 10px 0" align="right"][vc_column_text]
<p style="text-align: right">Distinctively coordinate efficient e-commerce rather than functionalized communities.</p>
[/vc_column_text][title title="Mega Menu with Icons" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" custom_font_size="16px" title_margin="0 0 20px 0" align="right"][vc_column_text]
<p style="text-align: right">Holisticly cultivate adaptive cross-unit intellectual alignments without flexible technology.</p>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="color" pattern_style="style1" pattern_opacity="1" overlay_color="rgba(40,40,39,0.94)" dot_nav="no" theme_primary="yes" theme_primary_alpha="1"][vc_column width="1/1"][icon align="center" icon_name="pixicon-eleganticons-100" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#ffffff"][vc_column_text css=".vc_custom_1400501326252{margin-bottom: 10px !important;border-color: #c6c6c6 !important;}"]
<p style="text-align: center"><em>Synergistically productivate end-to-end channels...</em></p>
[/vc_column_text][title align="center" title_tag="h2" title="SOME GREAT WORKS WE HAVE DONE" sub_title="no" sub_title_text="Competently build performance based products" line="no" animate="no" transition="flash" title_margin="0 0 10px 0" font_size="size-sm"][spacer height="10px"][line width="50px" thickness="3px" align="center" color="#ffffff"][spacer height="60px"][portfolio insert_type="posts" pix_filterable="no" filter_style="normal" no_of_items="8" order_by="date" order="ASC" columns="col4" style="style3" title_tag="h2" lightbox="no" like="yes" single_portfolio_link="yes" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][spacer height="60px"][button button_text="View All Portfolio" button_link="#" button_style="outline" button_size="md" custom_size="no" button_align="button-center" button_color="color" animate="no" transition="flash"][/vc_column][/vc_row][vc_row css=".vc_custom_1402005618961{background-position: 0 0 !important;background-repeat: repeat !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" overlay_color="rgba(252,194,31,0.8)" theme_primary="yes" theme_primary_alpha="1"][vc_column width="1/1"][icon align="center" icon_name="pixicon-eleganticons-98" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_color="#ffffff"][vc_column_text css=".vc_custom_1400501530527{margin-bottom: 10px !important;border-color: #c6c6c6 !important;}"]
<p style="text-align: center"><em>Quickly optimize convergence through quality...</em></p>
[/vc_column_text][title align="center" title_tag="h2" title="GET IN TOUCH" sub_title="no" sub_title_text="Competently build performance based products" line="no" animate="no" transition="flash" title_margin="0 0 10px 0" font_size="size-sm"][spacer height="10px"][line width="50px" thickness="3px" align="center" color="#ffffff"][spacer height="60px"][vc_row_inner css=".vc_custom_1400494700904{padding-right: 200px !important;padding-left: 200px !important;}"][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-110" icon_style="bg-none" icon_type="icon-circle" title="You Have a Question?" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]
<p style="text-align: center">support@pixel8es.com</p>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-133" icon_style="bg-none" icon_type="icon-circle" title="Call Us Now!" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]
<p style="text-align: center">(701) 700-2339</p>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-123" icon_style="bg-none" icon_type="icon-circle" title="Find Us Now!" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]
<p style="text-align: center">8184 Dewy Boulevard,
North Dakota,  US</p>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Design Firm */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Design Firm', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-design.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400361823301{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="1"][/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1407851693178{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="light" parallax="no" overlay="none" pattern_style="style1" dot_nav="no" theme_primary="yes" theme_primary_alpha="1" parallax_ratio="0.5" pattern_opacity="1"][vc_column width="1/1"][icon align="center" icon_name="pixicon-bubble-comment-streamline-talk" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="How can we help you?" animate="no" transition="flash" icon_color="#679468" margin="0 0 20px 0" text_color="#ffffff" icon_size="34px"][line width="30px" thickness="1px" align="center" color="#679468"][vc_row_inner css=".vc_custom_1399819923908{margin-top: 30px !important;padding-top: 30px !important;}"][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-eleganticons-122" title_tag="h2" title="Prototype" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="flash" custom_size="16px"]Objectively engineer superior leadership through an expanded array of products.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-eleganticons-92" title_tag="h2" title="Interactive Design" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="flash" custom_size="16px" icon_image_con="no" icon_image_style="rectangle" line="no" line_style="line-style1"]Seamlessly orchestrate worldwide opportunities whereas user-centric schemas.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-fontawesome-webfont-174" title_tag="h2" title="UI / UX" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="flash" custom_size="16px"]Conveniently foster high-payoff niche markets impactful initiatives after real-time.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-eleganticons-113" title_tag="h2" title="Print Design" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="yes" icon_below="no" animate="no" transition="flash" custom_size="16px"]Completely syndicate one-to-one action items rather than clicks-and-mortar relationships.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1399876676733{padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" overlay="none" pattern_style="style1"][vc_column width="1/1"][icon align="center" icon_name="pixicon-dashboard-speed-streamline" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Why Electrify More Powerful?" animate="no" transition="flash" icon_color="#679468" margin="0 0 20px 0" text_color="#282827" icon_size="34px"][line width="30px" thickness="1px" align="center" color="#679468"][spacer height="40px"][vc_row_inner css=".vc_custom_1400368667626{padding-right: 100px !important;padding-left: 100px !important;}"][vc_column_inner width="1/2"][spacer height="30px"][vc_single_image border_color="grey" img_link_target="_self" img_size="large"][/vc_column_inner][vc_column_inner width="1/2"][spacer height="30px"][icon align="left" icon_name="pixicon-eleganticons-121" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Visual Composer" margin="Title" animate="no" transition="flash" text_font="16px"][vc_column_text css=".vc_custom_1400367341073{margin-bottom: 20px !important;padding-top: 10px !important;}"]Create unique layout in few second without touching a single line of code.[/vc_column_text][line width="30px" thickness="1px" align="left" color="#e2e2e2"][spacer height="30px"][icon align="left" icon_name="pixicon-eleganticons-95" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Advance Media Manager" margin="Title" animate="no" transition="flash" text_font="16px"][vc_column_text css=".vc_custom_1400367465223{margin-bottom: 20px !important;padding-top: 10px !important;}"]Insert Images, video or video playlist, audio or audio playlist with our user-friendly  Media Manager.[/vc_column_text][line width="30px" thickness="1px" align="left" color="#e2e2e2"][spacer height="30px"][icon align="left" icon_name="pixicon-clock-streamline-time" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="One Click Demo Install" animate="no" transition="flash" text_font="16px"][vc_column_text css=".vc_custom_1400367694612{margin-bottom: 20px !important;padding-top: 10px !important;}"]Adding demo content much easier, Just click a button and wait for few seconds. Electrify will install all the necessary pages, posts and menus.[/vc_column_text][line width="30px" thickness="1px" align="left" color="#e2e2e2"][spacer height="30px"][icon align="left" icon_name="pixicon-eleganticons-72" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Lots and lots of variations " margin="Title" animate="no" transition="flash" text_font="16px"][vc_column_text css=".vc_custom_1400367868739{margin-bottom: 20px !important;padding-top: 10px !important;}"]Each element/item in electrify have minimum of 5 variations which helps you to create unique layout in seconds...[/vc_column_text][line width="30px" thickness="1px" align="left" color="#e2e2e2"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400365431623{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #282827 !important;}" type="full-width" color_style="light" parallax="no" overlay="none" pattern_style="style1" parallax_ratio="0.5" pattern_opacity="1"][vc_column width="1/1"][callout_box callout_style="default" callout_align="left" title_tag="h2" title="No doubt... Electrify never give you a disappointments..." display_button="yes" button_text="Buy Now!" button_link="#" button_style="outline" button_color="color" button_size="md" button_target="_blank" display_button2="no" button_text2="Read More" button_link2="#" button_style2="outline" button_color2="color" button_size2="md" button_target2="_blank" animate="no" transition="flash"]Holisticly recaptiualize standards compliant e-business rather than cross-platform.[/callout_box][/vc_column][/vc_row][vc_row type="full-width" color_style="dark" parallax="no" overlay="none" pattern_style="style1" theme_primary="no" theme_primary_alpha="1" parallax_ratio="0.5" pattern_opacity="1"][vc_column width="1/1"][icon align="center" icon_name="pixicon-picture-streamline" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Featured Works" animate="no" transition="flash" icon_color="#679468" margin="0 0 20px 0" text_color="#282827" icon_size="34px"][line width="30px" thickness="1px" align="center" color="#679468"][spacer height="40px"][portfolio insert_type="posts" pix_filterable="no" filter_style="normal" no_of_items="7" order_by="ID" order="ASC" columns="col3" style="style2" title_tag="h2" lightbox="yes" like="yes" single_portfolio_link="no" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" stop_on_hover="true" mouse_drag="true" touch_drag="true" portfolio_style="masonry" slider_height="false" exclude_portfolio="3058"][/vc_column][/vc_row][vc_row css=".vc_custom_1400368982280{border-top-width: 1px !important;border-bottom-width: 1px !important;padding-top: 50px !important;padding-bottom: 30px !important;background-color: #f6f6f6 !important;border-color: #eeeeee !important;border-style: solid !important;}" type="full-width" color_style="dark" parallax="no" overlay="none" pattern_style="style1" parallax_ratio="0.5" pattern_opacity="1"][vc_column width="1/1"][icon align="center" icon_name="pixicon-twitter-alt" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Recent Tweets" animate="no" transition="flash" icon_color="#679468" margin="0 0 20px 0" text_color="#282827" icon_size="34px"][line width="30px" thickness="1px" align="center" color="#679468"][spacer height="40px"][tweets twtcount="5" style="style2" tweet_align="center" no_of_col="1" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row css=".vc_custom_1399876676733{padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" overlay="none" pattern_style="style1"][vc_column width="1/1"][icon align="center" icon_name="pixicon-database-streamline" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Why Choose Electrify Theme?" animate="no" transition="flash" icon_color="#679468" margin="0 0 20px 0" text_color="#282827" icon_size="34px"][line width="30px" thickness="1px" align="center" color="#679468"][spacer height="40px"][vc_row_inner css=".vc_custom_1400368649231{padding-right: 100px !important;padding-left: 100px !important;}"][vc_column_inner width="1/2"][spacer height="30px"][icon align="left" icon_name="pixicon-eleganticons-125" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Powerful Admin Panel" margin="Title" animate="no" transition="flash" text_font="16px"][vc_column_text css=".vc_custom_1399878395572{margin-bottom: 20px !important;padding-top: 10px !important;}"]Distinctively monetize covalent manufactured products via standards compliant quality vectors.[/vc_column_text][line width="30px" thickness="1px" align="left" color="#e2e2e2"][spacer height="30px"][icon align="left" icon_name="pixicon-eleganticons-95" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Mega Menu" margin="Title" animate="no" transition="flash" text_font="16px"][vc_column_text css=".vc_custom_1399879297364{margin-bottom: 20px !important;padding-top: 10px !important;}"]Progressively integrate compelling models without business services.[/vc_column_text][line width="30px" thickness="1px" align="left" color="#e2e2e2"][spacer height="30px"][icon align="left" icon_name="pixicon-eleganticons-100" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Advance Portfolio Options" margin="Title" animate="no" transition="flash" text_font="16px"][vc_column_text css=".vc_custom_1399879079505{margin-bottom: 20px !important;padding-top: 10px !important;}"]Multifunctional architectures progressively transform highly efficient action items flexible total linkage.[/vc_column_text][line width="30px" thickness="1px" align="left" color="#e2e2e2"][spacer height="30px"][icon align="left" icon_name="pixicon-streamline-umbrella-weather" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" title="Free Life-Time Support" margin="Title" animate="no" transition="flash" text_font="16px"][vc_column_text css=".vc_custom_1399879269378{margin-bottom: 20px !important;padding-top: 10px !important;}"]Interactively scale mission-critical content and interactive outsourcing.[/vc_column_text][line width="30px" thickness="1px" align="left" color="#e2e2e2"][/vc_column_inner][vc_column_inner width="1/2"][spacer height="30px"][vc_single_image border_color="grey" img_link_target="_self" img_size="large"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400368732993{border-top-width: 1px !important;padding-top: 20px !important;padding-bottom: 0px !important;border-color: #eeeeee !important;border-style: solid !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][clients images="194,192,196,195,193" link="no" title_on_hover="yes" items="5" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" stop_on_hover="true" mouse_drag="true" touch_drag="true" style="style4"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Education */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Education', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-education.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401194156207{padding-top: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="9"][/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1402144101012{padding-top: 0px !important;padding-bottom: 65px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="Get Ready to Educate!" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Proactively benchmark principle centered information with multidisciplinary strategic theme areas. " line="yes" line_positions="below-sub-title" line_style="line-style4" animate="no" transition="flash"][spacer height="15px"][vc_row_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-book-read-streamline" title="Courses Offered" title_tag="h2" icon_style="square" icon_hover="yes" icon_color="color" display_button="yes" button_text="Lean More" button_link="#" button_style="solid" button_color="color" button_size="sm" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Globally communicate error-free content without client-focused communities. Proactively benchmark principle centered information with multidisciplinary strategic theme areas.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-eleganticons-103" title="Admission" title_tag="h2" icon_style="square" icon_hover="yes" icon_color="color" display_button="yes" button_text="Lean More" button_link="#" button_style="solid" button_color="color" button_size="sm" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" line="no" line_style="line-style1"]
<p style="text-align: center">Assertively integrate pandemic niches viral platforms. Completely empower unique manufactured products Dynamically seize ethical before processes whereas team building process.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-camera-photo-streamline" title="Infrastructure" title_tag="h2" icon_style="square" icon_hover="yes" icon_color="color" display_button="yes" button_text="Lean More" button_link="#" button_style="solid" button_color="color" button_size="sm" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Uniquely recaptiualize intermandated initiatives before innovative data. Progressively aggregate interoperable  with world-class metrics. Completely streamline user friendly e-markets.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-receipt-shopping-streamline" title="Accomodation" title_tag="h2" icon_style="square" icon_hover="yes" icon_color="color" display_button="yes" button_text="Lean More" button_link="#" button_style="solid" button_color="color" button_size="sm" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Holisticly administrate customer directed innovation via stand-alone customer service. Dramatically e-enable transparent action items after principle-centered technology.</p>
[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row type="full-width" color_style="dark" parallax="yes" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" dot_nav="no" theme_primary="yes" theme_primary_alpha="1"][vc_column width="1/1"][title title="This is Parallax section" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Proactively benchmark principle centered information with multidisciplinary strategic theme areas. " line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][/vc_column][/vc_row][vc_row css=".vc_custom_1401791231768{padding-bottom: 65px !important;}" theme_primary="no" theme_primary_alpha="1" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Get Ready to Educate!" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Proactively benchmark principle centered information with multidisciplinary strategic theme areas. " line="yes" line_positions="below-title" line_style="line-style4" animate="no" transition="flash"][spacer height="15px"][vc_row_inner][vc_column_inner width="1/3"][icon_box icon_image_con="yes" icon_image="2258" icon_image_style="rectangle" icon_type="icon" title="School of Business" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="yes" animate="no" transition="flash" line="no" line_style="line-style1"]
<p style="text-align: left">Progressively expedite virtual convergence for dynamic partnerships. Competently integrate intermandated best practices high-quality schemas Uniquely reconceptualize client-centered.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="yes" icon_image="2260" icon_image_style="rectangle" icon_type="icon" title="School of Medicine" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="yes" animate="no" transition="flash" line="no" line_style="line-style1"]
<p style="text-align: left">Globally communicate error-free content without client-focused communities. Proactively benchmark principle centered information with multidisciplinary strategic theme areas.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="yes" icon_image="2259" icon_image_style="rectangle" icon_type="icon" title="School of Communication" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="yes" animate="no" transition="flash" line="no" line_style="line-style1"]
<p style="text-align: left">Credibly strategize dynamic best practices via proactive e-markets. Phosfluorescently foster frictionless opportunities before future-proof alignments.</p>
[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401779540775{padding-top: 65px !important;background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="Upcoming Events" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Proactively benchmark principle centered . " line="yes" line_positions="below-sub-title" line_style="line-style4" animate="no" transition="flash"][spacer height="15px"][vc_row_inner][vc_column_inner width="1/1"][blog no_of_items="-1" order_by="date" order="ASC" title_tag="h2" display_date="yes" style="style2" columns="col3" display_comments="yes" blog_desc="yes" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" insert_type="category" blog_post_category="education"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401779671431{padding-top: 35px !important;padding-bottom: 35px !important;background-color: #33241d !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="Rapidiously scale principle-centered data vis-a-vis frictionless growth strategies. " style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0px"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Fitness */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Fitness', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-fitness.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1402008995598{padding-top: 0px !important;padding-bottom: 0px !important;}" theme_primary="no" theme_primary_alpha="1" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="15"][/vc_column][/vc_row][vc_row css=".vc_custom_1401706656115{padding-bottom: 200px !important;background-color: #f6f6f6 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="HOW CAN WE HELP YOU" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style2" animate="no" transition="flash" align="center" title_margin="0 0 20px 0"][line line_style="line-style2" align="center alignCenter"][/vc_column][/vc_row][vc_row theme_primary="no" theme_primary_alpha="1" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1401992216836{margin-top: -200px !important;}"][vc_column width="1/2"][vc_row_inner css=".vc_custom_1401992091943{margin-bottom: 30px !important;background-color: #ffffff !important;border: 1px solid #efefef !important;}"][vc_column_inner width="1/1" css=".vc_custom_1402009860090{padding-right: 20px !important;}"][icon_box icon_type="icon" icon_image_con="yes" icon_image="2702" icon_image_style="rectangle" icon_style="bg-none" icon_hover="no" icon_color="color" title="Fitness &amp; Healthy" title_tag="h2" display_button="yes" button_text="More Info" button_link="url:%23|title:Fitness|" button_style="outline" button_color="color" button_size="sm" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" line="yes" line_style="line-style1"]Dynamically leverage other's next-generation human capital and team building.[/icon_box][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1401992189965{margin-bottom: 30px !important;background-color: #ffffff !important;border: 1px solid #efefef !important;}"][vc_column_inner width="1/1" css=".vc_custom_1402009860090{padding-right: 20px !important;}"][icon_box icon_type="icon" icon_image_con="yes" icon_image="2702" icon_image_style="rectangle" icon_style="bg-none" icon_hover="no" icon_color="color" title="Fitness &amp; Healthy" title_tag="h2" display_button="yes" button_text="More Info" button_link="url:%23|title:Fitness|" button_style="outline" button_color="color" button_size="sm" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" line="yes" line_style="line-style1"]Dynamically leverage other's next-generation human capital and team building.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_row_inner css=".vc_custom_1401992130292{margin-bottom: 30px !important;background-color: #ffffff !important;border: 1px solid #efefef !important;}"][vc_column_inner width="1/1" css=".vc_custom_1402009860090{padding-right: 20px !important;}"][icon_box icon_type="icon" icon_image_con="yes" icon_image="2703" icon_image_style="rectangle" icon_style="bg-none" icon_hover="yes" icon_color="color" title="Make you Stronger" title_tag="h2" display_button="yes" button_text="More Info" button_link="url:%23|title:Fitness|" button_style="outline" button_color="color" button_size="sm" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" line="yes" line_style="line-style1"]Continually engineer stand-alone functionality out of box action items with holistic solutions.[/icon_box][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1401990657970{margin-top: 0px !important;margin-bottom: 30px !important;background-color: #ffffff !important;border: 1px solid #efefef !important;}"][vc_column_inner width="1/1" css=".vc_custom_1402009860090{padding-right: 20px !important;}"][icon_box icon_type="icon" icon_image_con="yes" icon_image="2703" icon_image_style="rectangle" icon_style="bg-none" icon_hover="yes" icon_color="color" title="Make you Stronger" title_tag="h2" display_button="yes" button_text="More Info" button_link="url:%23|title:Fitness|" button_style="outline" button_color="color" button_size="sm" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" line="yes" line_style="line-style1"]Continually engineer stand-alone functionality out of box action items with holistic solutions.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401708039786{background-color: #f4f4f4 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="OUR STAFFS &amp; TRAINERS" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style2" animate="no" transition="flash" align="center" title_margin="0 0 20px 0"][line line_style="line-style2" align="center alignCenter"][spacer height="50px"][staffs insert_type="id" no_of_staff="6" order_by="date" order="ASC" columns="col4" style="style3" title_tag="h2" staff_desc="no" lightbox="yes" single_staff_link="yes" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" staff_id="3235,3234,3236,3229"][/vc_column][/vc_row][vc_row][vc_column width="1/1"][title title="our happy client Say’s" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style2" animate="no" transition="flash" align="center" title_margin="0 0 20px 0"][line line_style="line-style2" align="center alignCenter"][spacer height="50px"][testimonial insert_type="posts" no_of_testimonial="5" order_by="date" order="ASC" style="style5" no_of_col="3" rating_no="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row css=".vc_custom_1402009528908{padding-top: 80px !important;padding-bottom: 70px !important;}" theme_primary="yes" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="ONE OF THE BEST THEME YOU EVER SEEN IN THEMEFOREST" style="normal-title" align="center" font_size="size-lg" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][button button_text="ORDER NOW" button_link="url:%23||" button_style="outline" button_color="white" button_size="md" custom_size="no" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Food & Drinks */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Food & Drinks', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-food.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401260947565{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="11"][/vc_column][/vc_row][vc_row css=".vc_custom_1401260936862{background-color: #282827 !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Easy Breakfast for Busy Folks" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style3" animate="no" transition="flash"][spacer height="50px"][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]Quickly formulate diverse platforms vis-a-vis high-payoff customer service. Rapidiously myocardinate diverse e-tailers with mission-critical ideas. Compellingly enhance sticky e-markets rather than plug-and-play initiatives. Distinctively actualize transparent information before business technologies. Phosfluorescently provide access to enterprise-wide e-commerce through intuitive results.

Objectively foster client-centered markets via wireless data. Appropriately drive team driven niches and turnkey bandwidth. Compellingly impact functional schemas whereas multifunctional networks.Quickly formulate diverse platforms vis-a-vis high-payoff customer service. Rapidiously myocardinate diverse e-tailers with mission-critical ideas. Compellingly enhance sticky e-markets rather than plug-and-play initiatives. Distinctively actualize transparent information before business technologies. Phosfluorescently provide access to enterprise-wide e-commerce through intuitive results.

Objectively foster client-centered markets via wireless data. Appropriately drive team driven niches and turnkey bandwidth. Compellingly impact functional schemas whereas multifunctional networks.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-food" title="Tasty high quality food" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: left">Quickly formulate diverse platforms vis-a-vis high-payoff customer service. Rapidiously myocardinate diverse e-tailers with mission-critical ideas.</p>
[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-eleganticons-322" title="Cheap Price, tasty food" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: left">Completely pontificate multimedia based growth strategies vis-a-vis optimal quality vectors. Monotonectally recaptiualize innovative services.</p>
[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-study" title="Top Qualified &amp; Friendly Cheif" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: left">Globally recaptiualize bleeding-edge potentialities after an expanded array of technology. Appropriately repurpose optimal e-markets .</p>
[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401260633810{padding-bottom: 0px !important;background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/2"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column][vc_column width="1/2"][title title="5-Start Delicous Food" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Quickly formulate diverse platforms vis-a-vis high-payoff customer service. Rapidiously myocardinate diverse e-tailers with mission-critical ideas. Compellingly enhance sticky e-markets rather than plug-and-play initiatives. " line="yes" line_positions="below-title" line_style="line-style3" animate="no" transition="flash"][vc_column_text]Distinctively actualize transparent information before business technologies. Phosfluorescently provide access to enterprise-wide e-commerce through intuitive results.

Objectively foster client-centered markets via wireless data. Appropriately drive team driven niches and turnkey bandwidth. Compellingly impact functional schemas whereas multifunctional networks.Quickly formulate diverse platforms vis-a-vis high-payoff customer service.[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1401260752320{padding-top: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/2"][spacer height="50px"][title title="Today’s Specials" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Quickly formulate diverse platforms vis-a-vis high-payoff customer service. Rapidiously myocardinate diverse e-tailers with mission-critical ideas. Compellingly enhance sticky e-markets rather than plug-and-play initiatives. Distinctively actualize transparent information before business technologies. Phosfluorescently provide access to enterprise-wide e-commerce through intuitive results." line="yes" line_positions="below-title" line_style="line-style3" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/2"][list style="default"][li icon_name="pixicon-check"]Quickly formulate diverse[/li][li icon_name="pixicon-check"]Quickly formulate diverse[/li][li icon_name="pixicon-check"]Quickly formulate diverse[/li][li icon_name="pixicon-check"]Quickly formulate diverse[/li][/list][/vc_column_inner][vc_column_inner width="1/2"][list style="default"][li icon_name="pixicon-check"]Quickly formulate diverse[/li][li icon_name="pixicon-check"]Quickly formulate diverse[/li][li icon_name="pixicon-check"]Quickly formulate diverse[/li][li icon_name="pixicon-check"]Quickly formulate diverse[/li][/list][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_single_image  alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column][/vc_row][vc_row css=".vc_custom_1401260990312{padding-top: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Food Gallery" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style3" animate="no" transition="flash"][spacer height="50px"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column][/vc_row][vc_row css=".vc_custom_1401261113208{padding-top: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Todays Menu" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style3" animate="no" transition="flash"][spacer height="50px"][vc_row_inner][vc_column_inner width="1/4"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full"][title title="Le Salade" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Quickly formulate diverse platforms vis-a-vis high-payoff customer service ideas." line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image  alignment="center" border_color="grey" img_link_target="_self" img_size="full"][title title="Dobbins" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Seamlessly strategize enterprise outsourcing before economically sound expertise." line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image  alignment="center" border_color="grey" img_link_target="_self" img_size="full"][title title="orange juice" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Compellingly provide access to business growth strategies whereas error-free vortals." line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][/vc_column_inner][vc_column_inner width="1/4" css=".vc_custom_1401974726128{background-color: #ff8b00 !important;}" el_class="whitecolor"][spacer height="30px"][title title="Opening Hours" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style3" animate="no" transition="flash" title_margin="0 0 15px 0"][vc_column_text]<strong>Lunch Service</strong>
Monday to Saturday : 12.30pm - 3.30pm
Sundays &amp; Bank holidays : 12.00pm - 5.00pm

<strong>Dinner Service</strong>
Monday to Saturday : 5.30pm - 10pm
Sundays &amp; Bank Holidays : 5.30pm - 8.30pm[/vc_column_text][spacer height="30px"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Freelancer */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Freelancer', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-freelancer.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401914929773{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][layerslider_vc id="5"][/vc_column][/vc_row][vc_row css=".vc_custom_1401097459253{padding-bottom: 0px !important;background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="2/3"][title title="ABOUT ME" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Competently disseminate orthogonal value and cooperative information. " line="yes" line_positions="below-title" line_style="line-style2" animate="no" transition="flash" sub_title_style="italic"][vc_column_text]Quickly formulate diverse platforms vis-a-vis high-payoff customer service. Rapidiously myocardinate diverse e-tailers with mission-critical ideas. Compellingly enhance sticky e-markets rather than plug-and-play initiatives. Distinctively actualize transparent information before business technologies. Phosfluorescently provide access to enterprise-wide e-commerce through intuitive results.

Objectively foster client-centered markets via wireless data. Appropriately drive team driven niches and turnkey bandwidth. Compellingly impact functional schemas whereas multifunctional networks.Quickly formulate diverse platforms vis-a-vis high-payoff customer service. Rapidiously myocardinate diverse e-tailers with mission-critical ideas. Compellingly enhance sticky e-markets rather than plug-and-play initiatives. Distinctively actualize transparent information before business technologies. Phosfluorescently provide access to enterprise-wide e-commerce through intuitive results.

Objectively foster client-centered markets via wireless data. Appropriately drive team driven niches and turnkey bandwidth. Compellingly impact functional schemas whereas multifunctional networks.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column][/vc_row][vc_row css=".vc_custom_1402145022869{background-color: #2bb673 !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_row_inner][vc_column_inner width="1/4"][counter number="573" text="Projects Finished" icon="yes" icon_align="center" icon_color=" color" border="no" icon_name="pixicon-hourglass" text_font_size="4opx"][/vc_column_inner][vc_column_inner width="1/4"][counter number="80" text="Awards Won" icon="yes" icon_align="center" icon_color=" color" border="no" icon_name="pixicon-eleganticons-321"][/vc_column_inner][vc_column_inner width="1/4"][counter number="345" text="Happy Customers" icon="yes" icon_align="center" icon_color=" color" border="no" icon_name="pixicon-fontawesome-webfont-127"][/vc_column_inner][vc_column_inner width="1/4"][counter number="76" text="Themes Designed" icon="yes" icon_align="center" icon_color=" color" border="no" icon_name="pixicon-fontawesome-webfont-253"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row css=".vc_custom_1401098451654{background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="MY SKILLS" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_style="italic" sub_title_text="Competently disseminate orthogonal value and cooperative information. " line="yes" line_positions="below-title" line_style="line-style2" animate="no" transition="flash"][vc_row_inner css=".vc_custom_1401098967968{padding-top: 50px !important;}"][vc_column_inner width="1/4"][pie_chart style="style1" percentage="89" custom_color="custom" barcolor="#2bb673" linecap="round" animate_duration="2000" line_width="6" size="200" text="Photoshop"][/vc_column_inner][vc_column_inner width="1/4"][pie_chart style="style1" percentage="78" custom_color="custom" barcolor="#2bb673" linecap="round" animate_duration="2000" line_width="6" size="200" text="Illustrator"][/vc_column_inner][vc_column_inner width="1/4"][pie_chart style="style1" percentage="95" custom_color="custom" barcolor="#2bb673" linecap="round" animate_duration="2000" line_width="6" size="200" text="Web design"][/vc_column_inner][vc_column_inner width="1/4"][pie_chart style="style1" percentage="84" custom_color="custom" barcolor="#2bb673" linecap="round" animate_duration="2000" line_width="6" size="200" text="Identity"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1402145116108{padding-top: 0px !important;background-color: #f6f6f6 !important;}" type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="MY RECENT WORKS" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_style="italic" sub_title_text="Competently disseminate orthogonal value and cooperative information. " line="yes" line_positions="below-title" line_style="line-style2" animate="no" transition="flash"][spacer height="50px"][portfolio insert_type="posts" pix_filterable="no" filter_style="normal" no_of_items="8" order_by="date" order="ASC" columns="col4" style="style2" title_tag="h2" lightbox="no" like="yes" single_portfolio_link="yes" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" portfolio_style="grid"][/vc_column][/vc_row][vc_row css=".vc_custom_1402145086900{background-color: #2bb673 !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="MY RECENT WORKS" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_style="italic" sub_title_text="Competently disseminate orthogonal value and cooperative information. " line="yes" line_positions="below-title" line_style="line-style2" animate="no" transition="flash"][spacer height="50px"][vc_row_inner][vc_column_inner width="1/1"][social style="style3" facebook="#" twitter="#" gplus="#" linkedin="#" dribble="#" flickr="#"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Marketing */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Marketing', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-marketing.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400361823301{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][rev_slider_vc alias="electrify"][/vc_column][/vc_row][vc_row type="full-width" parallax="yes" pattern="no" pattern_style="style1" color_style="dark" css=".vc_custom_1399872833202{background-color: #f6f6f6 !important;}" overlay="none"][vc_column width="1/3"][icon_box icon_name="pixicon-male-female" title_tag="h2" title="Consumer Insights" icon_style="double-circle" display_button="no" button_text="Read More" button_link="#" button_style="solid" button_color="color" button_size="md" align="center" icon_align="no" animate="no" transition="flash" icon_color="color" icon_hover="yes" icon_below="no" icon_type="icon" icon_image_con="no" icon_image_style="rectangle" line="no" line_style="line-style1"]Seamlessly innovate world-class infomediaries vis-a-vis effective resources. Continually evisculate worldwide infrastructures whereas just in time models.[/icon_box][/vc_column][vc_column width="1/3"][icon_box icon_name="pixicon-aws" title_tag="h2" title="Increase Sales" icon_style="double-circle" display_button="no" button_text="Read More" button_link="#" button_style="solid" button_color="color" button_size="md" align="center" icon_align="no" animate="no" transition="flash" icon_color="color" icon_hover="yes" icon_below="no" icon_type="icon" icon_image_con="no" icon_image_style="rectangle" line="no" line_style="line-style1"]Energistically deploy functionalized imperatives with corporate metrics. Rapidiously repurpose high standards in infomediaries for multifunctional total linkage.[/icon_box][/vc_column][vc_column width="1/3"][icon_box icon_name="pixicon-flight" title_tag="h2" title="Cross-channel Marketing" icon_style="double-circle" display_button="no" button_text="Read More" button_link="#" button_style="solid" button_color="color" button_size="md" align="center" icon_align="no" animate="no" transition="flash" icon_color="color" icon_hover="yes" icon_below="no" icon_type="icon" icon_image_con="no" icon_image_style="rectangle" line="no" line_style="line-style1"]Authoritatively maximize inexpensive web services rather than multifunctional paradigms. Energistically morph cross-platform relationships and enterprise materials.[/icon_box][/vc_column][/vc_row][vc_row type="full-width" parallax="no" pattern="no" pattern_style="style1" color_style="dark" css=".vc_custom_1399872697421{padding-bottom: 0px !important;background: #ffffff url(http://support.pixel8es.com/wp-content/uploads/2014/05/bg.png?id=383) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" overlay="none"][vc_column width="1/1"][spacer height="30px"][title align="center" title_tag="h2" title="Why are you waiting for?" sub_title="no" sub_title_text="Dynamically leverage other's global methodologies through reliable niches." line="yes" animate="no" transition="flash" font_size="21px"][vc_column_text css=".vc_custom_1402150561079{margin-top: -20px !important;margin-bottom: 20px !important;padding-right: 100px !important;padding-left: 100px !important;}"]
<p style="text-align: center">Collaboratively architect fully tested architectures for resource sucking relationships. Objectively leverage other's robust niches after adaptive leadership credibly conceptualize out-of-the-box benefits without visionary relationships.</p>
[/vc_column_text][spacer height="10px"][vc_row_inner css=".vc_custom_1399720451164{padding-top: 0px !important;}"][vc_column_inner width="1/2"][button button_text="Purchase Now" button_link="#" button_style="solid" button_size="md" custom_size="no" button_align="button-right" button_color="color" animate="no" transition="flash"][/vc_column_inner][vc_column_inner width="1/2"][button button_text="Contact Us" button_link="#" button_style="solid" button_size="md" custom_size="no" button_color="no-color" animate="no" transition="flash"][/vc_column_inner][/vc_row_inner][spacer height="40px"][vc_single_image  border_color="grey" img_link_target="_self" img_size="full" alignment="center"][/vc_column][/vc_row][vc_row css=".vc_custom_1400363221080{padding-bottom: 55px !important;background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/3"][icon_box icon_type="icon" icon_name="pixicon-eleganticons-321" title_tag="h2" title="Visual Composer" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]Efficiently morph resource-leveling synergy through team driven markets. Holisticly integrate prospective outsourcing for synergistic innovation. Intrinsicly.[/icon_box][icon_box icon_type="icon" icon_name="pixicon-paint-bucket-streamline" title_tag="h2" title="Creative Design" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]Efficiently morph resource-leveling synergy through team driven markets. Holisticly integrate prospective outsourcing for synergistic innovation. Intrinsicly.[/icon_box][/vc_column][vc_column width="1/3"][icon_box icon_type="icon" icon_name="pixicon-photo-pictures-streamline" title_tag="h2" title="Layer Slider" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]Efficiently morph resource-leveling synergy through team driven markets. Holisticly integrate prospective outsourcing for synergistic innovation. Intrinsicly.[/icon_box][icon_box icon_type="icon" icon_name="pixicon-speech-streamline-talk-user" title_tag="h2" title="Great Support" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]Efficiently morph resource-leveling synergy through team driven markets. Holisticly integrate prospective outsourcing for synergistic innovation. Intrinsicly.[/icon_box][/vc_column][vc_column width="1/3"][icon_box icon_type="icon" icon_name="pixicon-receipt-shopping-streamline" title_tag="h2" title="Unlimited Layout" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]Efficiently morph resource-leveling synergy through team driven markets. Holisticly integrate prospective outsourcing for synergistic innovation. Intrinsicly.[/icon_box][icon_box icon_type="icon" icon_name="pixicon-happy-smiley-streamline" title_tag="h2" title="Lots of Variations" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash"]Efficiently morph resource-leveling synergy through team driven markets. Holisticly integrate prospective outsourcing for synergistic innovation. Intrinsicly.[/icon_box][/vc_column][/vc_row][vc_row type="full-width" color_style="light" video="video_bg" video_mp4="http://support.pixel8es.com/wp-content/uploads/2014/05/parallax_video.mp4" parallax="no" parallax_ratio="0.5" overlay="pattern" pattern_style="style1" pattern_opacity="0.7" css=".vc_custom_1400362647184{padding-top: 200px !important;padding-bottom: 200px !important;}"][vc_column width="1/1"][title align="center" title_tag="h2" title="SHOW REAL" sub_title="yes" sub_title_text="Play video in background" line="yes" animate="no" transition="flash"][/vc_column][/vc_row][vc_row][vc_column width="1/1"][title align="center" title_tag="h2" title="Recent Tweets" sub_title="yes" sub_title_text="Check out all Recent Tweets" line="yes" animate="no" transition="flash"][tweets twtcount="5" style="style3" tweet_align="center" no_of_col="3" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row css=".vc_custom_1400364635868{border-top-width: 1px !important;border-bottom-width: 1px !important;background-color: #f6f6f6 !important;border-color: #eeeeee !important;border-style: solid !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title align="center" title_tag="h2" title="Recent Article" sub_title="no" line="yes" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][blog no_of_items="8" order_by="date" order="ASC" title_tag="h2" display_date="yes" style="style1" columns="col3" display_comments="yes" blog_desc="no" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" insert_type="posts" arrow_type="arrow-style2" slider_height="false"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400365006149{background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/par6.jpg?id=77) !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="color" overlay_color="rgba(0,0,0,0.68)" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][social style="style3" facebook="#" twitter="#" gplus="#" linkedin="#" dribble="#" flickr="#" pinterest="#"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Medical */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Medical', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-medical.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400932430949{padding-top: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="3"][/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1400932526926{padding-top: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Our Expertise" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="we are specialized in various fields" line="no" animate="no" transition="flash"][line width="60px" thickness="1px" align="center" color="#e2e2e2"][vc_row_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-slideshare" title="Health Checkup" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">In vitae urna tellus. In ornare nisl vel urna commodo dignissim.</p>
[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-torsos-female-male" title="Nursing Staffs" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Holisticly enable multimedia based than fully researched experiences.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-book-open" title="Medical Education" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Seamlessly re-engineer sticky synergy invested strategic theme areas.</p>
[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-fontawesome-webfont-124" title="Qualified Doctors" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Objectively extend orthogonal ideas compatible services dynamic.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-fontawesome-webfont-117" title="Emergency Services" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Monotonectally under technically sound metrics tactical applications.</p>
[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-eleganticons-147" title="Advance Equipment" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Compellingly fashion bleeding-edge process where as client-centered.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-fontawesome-webfont-123" title="Nursing Education" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Enthusiastically cultivate optimal architectures for parallel data.</p>
[/icon_box][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-bubble" title="24/7 Online Support" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Monotonectally architect magnetic quality vectors client and idea-sharing.</p>
[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400934557060{background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][callout_box callout_style="default" callout_align="left" title_tag="h2" title="Need an appoinment? Contact us now and get an Free Appoinment" display_button="yes" button_text="Contact Us" button_link="#" button_style="solid" button_color="color" button_size="md" display_button2="no" button_text2="Read More" button_link2="#" button_style2="outline" button_color2="color" button_size2="md" animate="no" transition="flash"]
<p style="text-align: left">Continually leverage existing out-of-the-box markets vis-a-vis scalable schemas. Quickly harness distinctive networks before real-time web services. Completely supply B2B.</p>
[/callout_box][/vc_column][/vc_row][vc_row css=".vc_custom_1407995124604{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="color" overlay_color="rgba(14,178,231,0.8)" pattern_style="style1" pattern_opacity="1" theme_primary="yes" theme_primary_alpha="1" dot_nav="no"][vc_column width="1/1"][title title="Opening Hours" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="We are available 24/7 for Emergency Services" line="yes" animate="no" transition="flash" line_positions="below-sub-title" line_style="line-style1"][vc_row_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-social-skillshare" title="Nursing Services " title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="yes" button_text="Enquire" button_link="#" button_style="outline" button_color="white" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Completely transform innovative potentialities through methods of empowerment strategic ideas.</p>
<p style="text-align: center">9:00 AM - 7:00PM</p>
<p style="text-align: center">MONDAY - SATURDAY</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-torsos" title="Family Doctors" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="yes" button_text="Enquire" button_link="#" button_style="outline" button_color="white" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Completely expedite top-line core competencies  maintain just in time value rather accurate schemas.</p>
<p style="text-align: center">10:00 AM - 5:00PM</p>
<p style="text-align: center">MONDAY - FRIDAY</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-fontawesome-webfont-124" title="Cheif Doctors" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="yes" button_text="Enquire" button_link="#" button_style="outline" button_color="white" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Interactively enable stand-alone data intermandated for Dynamically integrate interfaces business markets.</p>
<p style="text-align: center">9:00 AM - 7:00PM</p>
<p style="text-align: center">WEDNESDAY - FRIDAY</p>
[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400937401121{padding-bottom: 65px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Our Qualified Doctors" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="We always think and care about you..." line="no" animate="no" transition="flash"][line width="60px" thickness="1px" align="center" color="#e2e2e2"][vc_row_inner css=".vc_custom_1400937388132{padding-top: 50px !important;}"][vc_column_inner width="1/1"][staffs insert_type="id" no_of_staff="6" order_by="date" order="ASC" staff_id="1941,1946,1947,1948" columns="col4" style="style3" title_tag="h2" staff_desc="no" lightbox="no" single_staff_link="no" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][button button_text="MEET ALL DOCTORS" button_link="#" button_style="solid" button_size="md" custom_size="no" button_color="color" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column][/vc_row][vc_row css=".vc_custom_1407995145666{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" dot_nav="no" theme_primary="yes" theme_primary_alpha="1"][vc_column width="1/1"][title title="Our Happy Clients" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="We our client say our services/" line="no" animate="no" transition="flash"][line width="60px" thickness="1px" align="center" color="#e2e2e2"][vc_row_inner css=".vc_custom_1400937573662{padding-top: 50px !important;}"][vc_column_inner width="1/1"][testimonial insert_type="posts" no_of_testimonial="4" order_by="date" order="ASC" style="style1" no_of_col="1" rating_no="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Minimal */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Minimal', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-minimal.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401173668250{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="14"][/vc_column][/vc_row][vc_row css=".vc_custom_1402145787870{padding-bottom: 65px !important;}" theme_primary="no" theme_primary_alpha="1" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Services" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner css=".vc_custom_1401538545562{padding-top: 10px !important;}"][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-eleganticons-125" icon_image_con="no" icon_image_style="rectangle" icon_style="square-front" icon_hover="yes" icon_color="color" title="Creative Designs" title_tag="h2" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Monotonectally incentivize multidisciplinary convergence via ubiquitous sources.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-settings-streamline" icon_image_con="no" icon_image_style="rectangle" icon_style="square-front" icon_hover="yes" icon_color="color" title="Web Development" title_tag="h2" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Assertively initiate business metrics where based initiatives enterprise-wide communities.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-eleganticons-72" icon_image_con="no" icon_image_style="rectangle" icon_style="square-front" icon_hover="yes" icon_color="color" title="Clean Design" title_tag="h2" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Progressively streamline strategic  without compelling tailers through one-to-one ideas.</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-speech-streamline-talk-user" icon_image_con="no" icon_image_style="rectangle" icon_style="square-front" icon_hover="yes" icon_color="color" title="24/7 Support" title_tag="h2" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">Objectively innovate optimal value via distributed scenarios Credibly initiate innovative.</p>
[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401538767079{background-color: #f6f6f6 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Portfolio" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][portfolio insert_type="posts" pix_filterable="no" filter_style="normal" no_of_items="12" order_by="date" order="ASC" columns="col4" style="style1" title_tag="h2" lightbox="yes" like="yes" single_portfolio_link="yes" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][spacer height="50px"][button button_text="Load More" button_link="#" button_style="outline" button_color="color" button_size="md" custom_size="no" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column][/vc_row][vc_row][vc_column width="1/1"][title title="Our Awesome Clients" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][clients images="196,195,194,193,192,191" link="yes" title_on_hover="yes" items="4" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Music */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Music', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-music.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401802910554{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][rev_slider_vc alias="music_slider"][/vc_column][/vc_row][vc_row css=".vc_custom_1401803002866{margin-top: -31px !important;padding-top: 30px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-curve-top.png?id=2735) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="bg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401797175009{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][title title="Listen Music Anywhere" style="normal-title" align="center" font_size="size-sm" custom_font_size="42px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 20px 0"][vc_column_text css=".vc_custom_1401804764056{margin-bottom: 25px !important;}"]
<p style="text-align: center">Collaboratively reinvent strategic initiatives via dynamic customer service competently extend professional paradigms and 2.0 e-markets quickly implement accurate portals with pandemic.</p>
[/vc_column_text][spacer height="20px"][button button_text="checkout all albums" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="yes" button_align="button-center" button_icon_align="front" animate="no" transition="flash"][spacer height="30px"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row css=".vc_custom_1401803596943{margin-bottom: -12px !important;padding-top: 12px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-curve-bottom.png?id=2734) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="bg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401796007603{background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-51.jpg?id=2796) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][title title="Check Out All Albums" style="normal-title" align="center" font_size="size-sm" custom_font_size="42px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="-20px 0 20px 0"][vc_column_text css=".vc_custom_1401805031435{margin-bottom: 25px !important;}"]
<p style="text-align: center">Collaboratively reinvent strategic initiatives via dynamic customer service competently extend professional paradigms and 2.0 e-markets quickly implement accurate portals with pandemic.</p>
[/vc_column_text][spacer height="20px"][button button_text="view all" button_link="#" button_style="solid" button_color="white" button_size="sm" custom_size="yes" button_align="button-center" button_icon_align="front" animate="no" transition="flash"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row css=".vc_custom_1401803002866{margin-top: -31px !important;padding-top: 30px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-curve-top.png?id=2735) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="bg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401797175009{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][title title="Create your Own Playlist" style="normal-title" align="center" font_size="size-sm" custom_font_size="42px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0px 0 20px 0"][vc_column_text css=".vc_custom_1401805426762{margin-bottom: 25px !important;}"]
<p style="text-align: center">Collaboratively reinvent strategic initiatives via dynamic customer service competently extend professional paradigms and 2.0 e-markets quickly implement accurate portals with pandemic.</p>
[/vc_column_text][spacer height="20px"][button button_text="create playlist" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="yes" button_align="button-center" button_icon_align="front" animate="no" transition="flash"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row css=".vc_custom_1401803596943{margin-bottom: -12px !important;padding-top: 12px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-curve-bottom.png?id=2734) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="bg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401799747653{background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-1.jpg?id=2838) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][spacer height="200px"][/vc_column][/vc_row][vc_row css=".vc_custom_1401803002866{margin-top: -31px !important;padding-top: 30px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-curve-top.png?id=2735) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="bg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401797175009{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][title title="Share it. " style="normal-title" align="center" font_size="size-sm" custom_font_size="42px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 20px 0"][vc_column_text css=".vc_custom_1401805628969{margin-bottom: 25px !important;}"]
<p style="text-align: center">Collaboratively reinvent strategic initiatives via dynamic customer service competently extend professional paradigms and 2.0 e-markets quickly implement accurate portals with pandemic.</p>
[/vc_column_text][spacer height="20px"][button button_text="or Follow others playlist" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="yes" button_align="button-center" button_icon_align="front" animate="no" transition="flash"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row css=".vc_custom_1401803596943{margin-bottom: -12px !important;padding-top: 12px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-curve-bottom.png?id=2734) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="bg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401798525532{background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-3.jpg?id=2731) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][spacer height="200px"][/vc_column][/vc_row][vc_row css=".vc_custom_1401803002866{margin-top: -31px !important;padding-top: 30px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-curve-top.png?id=2735) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="bg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401797175009{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][title title="Win Exiting Prices" style="normal-title" align="center" font_size="size-sm" custom_font_size="42px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 20px 0"][vc_column_text css=".vc_custom_1401806308926{margin-bottom: 25px !important;}"]
<p style="text-align: center">Collaboratively reinvent strategic initiatives via dynamic customer service competently extend professional paradigms and 2.0 e-markets quickly implement accurate portals with pandemic.</p>
[/vc_column_text][spacer height="20px"][button button_text="win gifts and vouchers" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="yes" button_align="button-center" button_icon_align="front" animate="no" transition="flash"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row css=".vc_custom_1401803596943{margin-bottom: -12px !important;padding-top: 12px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-curve-bottom.png?id=2734) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" el_class="bg-pos" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][/vc_column][/vc_row][vc_row css=".vc_custom_1401796705641{background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/music-4.jpg?id=2730) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][spacer height="200px"][/vc_column][/vc_row][vc_row css=".vc_custom_1401806857427{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="yes" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][title title="Signup Today For Instant Access" style="normal-title" align="center" font_size="size-sm" custom_font_size="42px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 20px 0"][vc_column_text css=".vc_custom_1401806308926{margin-bottom: 25px !important;}"]
<p style="text-align: center">Collaboratively reinvent strategic initiatives via dynamic customer service competently extend professional paradigms and 2.0 e-markets quickly implement accurate portals with pandemic.</p>
[/vc_column_text][spacer height="20px"][button button_text="Sign Up" button_link="#" button_style="outline" button_color="white" button_size="md" custom_size="no" button_align="button-center" button_icon_align="front" animate="no" transition="flash"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin One Page */
$pix_data               = array();
$pix_data['name']       = __( 'Skin One Page', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-one-page.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401282843734{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_column_text][layerslider_vc id="17"][/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1402225105624{background-color: #c0392b !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="OUR SERVICES" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="we make you excited!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/4"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full" css=".vc_custom_1402168692705{margin-bottom: 20px !important;}"][title title="GRAPHIC DESIGN" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 15px 0" custom_font_size="18px"][vc_column_text]

Completely incentivize e-business web-readiness whereas ethical value.

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full" css=".vc_custom_1402171227482{margin-bottom: 20px !important;}"][title title="WEB DESIGN" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 15px 0" custom_font_size="18px"][vc_column_text]

Completely incentivize e-business web-readiness whereas ethical value.

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full" css=".vc_custom_1402171239294{margin-bottom: 20px !important;}"][title title="UI/UX DESIGN" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 15px 0" custom_font_size="18px"][vc_column_text]

Completely incentivize e-business web-readiness whereas ethical value.

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full" css=".vc_custom_1402171251190{margin-bottom: 20px !important;}"][title title="SOCIAL MARKETING" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0 0 15px 0" custom_font_size="18px"][vc_column_text]

Completely incentivize e-business web-readiness whereas ethical value.

[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="MEET THE TEAM" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="we can give you a better result!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][staffs insert_type="id" no_of_staff="4" order_by="date" order="ASC" columns="col4" style="style4" title_tag="h2" staff_desc="no" lightbox="no" single_staff_link="yes" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" staff_id="3727,3733,3734,3735"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1402171891384{background-color: #343434 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="OUR SKILL" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="we dedicated ourself!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/4"][pie_chart style="style1" percentage="85" custom_color="default" barcolor="#fcc21f" linecap="butt" animate_duration="2000" line_width="6" size="200" text="JAVASCRIPT"][/vc_column_inner][vc_column_inner width="1/4"][pie_chart style="style1" percentage="95" custom_color="default" barcolor="#fcc21f" linecap="butt" animate_duration="2000" line_width="6" size="200" text="HTML"][/vc_column_inner][vc_column_inner width="1/4"][pie_chart style="style1" percentage="80" custom_color="default" barcolor="#fcc21f" linecap="butt" animate_duration="2000" line_width="6" size="200" text="PHP"][/vc_column_inner][vc_column_inner width="1/4"][pie_chart style="style1" percentage="90" custom_color="default" barcolor="#fcc21f" linecap="butt" animate_duration="2000" line_width="6" size="200" text="CSS"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1402226785847{background-color: #43b157 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="TESTIMONIAL" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="we make our client happy!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3"][testimonial insert_type="id" no_of_testimonial="3" order_by="date" order="ASC" style="style2" no_of_col="1" rating_no="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" testimonial_id="3751,3755,3757"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row theme_primary="no" theme_primary_alpha="1" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="PORTFOLIO" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="few of our awesome works!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][portfolio portfolio_style="grid" insert_type="id" pix_filterable="no" filter_style="normal" no_of_items="9" order_by="date" order="ASC" columns="col4" style="style1" title_tag="h2" lightbox="no" like="yes" single_portfolio_link="no" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" portfolio_id="3705,3723,3742,3743,3744,3737,3738,3740"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1402171891384{background-color: #343434 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="VIDEO CAN EXPLAIN WHAT REALLY YOU CAN DO WITH ELECTRIFY!" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="you are so impressed..is n't it?" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][video_popup url="http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/Mr.Cloud+making+film-HD.mp4" title_format="icon" text="Title" align="center" icon_name="pixicon-eleganticons-36"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1402242698269{background-color: #1379c4 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="LATEST TWEETS" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="be our followers!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][tweets twtcount="5" style="style1" tweet_align="center" no_of_col="1" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="RECENT POST" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="check our latest news and updates!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][blog insert_type="category" no_of_items="3" order_by="date" order="ASC" title_tag="h2" display_date="yes" style="style1" columns="col3" display_comments="no" blog_desc="no" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" blog_post_category="Infographics"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="CONTACT US" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="we are ready to help you!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/2"][contact mailto="youremailaddress@email.com"][/vc_column_inner][vc_column_inner width="1/2"][icon align="left" icon_name="pixicon-eleganticons-110" icon_style="bg-none" icon_type="icon-circle" icon_size="21px" title="Support@electrify.com" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][icon align="left" icon_name="pixicon-eleganticons-125" icon_style="bg-none" icon_type="icon-circle" icon_size="21px" title="ValleyTennessee, US," title_tag="h2" animate="no" transition="flash"][spacer height="20px"][icon align="left" icon_name="pixicon-paperplane" icon_style="bg-none" icon_type="icon-circle" icon_size="21px" title="(901) 673-1384" title_tag="h2" animate="no" transition="flash"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1402641419751{background-color: #b388dd !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="GET IN TOUCH" style="normal-title" align="center" font_size="size-md" title_tag="h2" sub_title="yes" sub_title_text="check out our updates on quick!" line="yes" line_positions="below-sub-title" line_style="line-style1" animate="no" transition="flash"][social style="style3" facebook="#" twitter="#" gplus="#" dribble="#" tumblr="#"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Personal*/
$pix_data               = array();
$pix_data['name']       = __( 'Skin Personal', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-personal.png';
$pix_data['content']    = <<<CONTENT
[vc_row type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1401219839319{background-color: #79ba1e !important;}"][vc_column width="1/1"][spacer height="150px"][title title="I'm Samir Maric" align="center" font_size="size-lg" title_tag="h2" sub_title="yes" sub_title_text="LOGO / WEB DESIGN / FRONTEND" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][button button_text="Hire Me" button_link="url:%23||" button_style="outline" button_size="md" custom_size="no" button_align="button-center" button_color="white" button_icon_align="front" animate="no" transition="flash"][spacer height="150px"][/vc_column][/vc_row][vc_row css=".vc_custom_1402146094653{padding-bottom: 65px !important;}" theme_primary="no" theme_primary_alpha="1" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][vc_row_inner][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2"][title title="ABOUT ME" align="center" font_size="size-sm" title_tag="h2" sub_title="no" line="no" line_positions="below-title" line_style="line-style5" animate="no" transition="flash" sub_title_text="Title" title_margin="0px 0px 30px 0px"][vc_column_text]

I am Logo & Web designer. I love what i do. I also love to travel around the world. My hobbies are playing and watching cricket & football. I really passion on what i do. If you hire me i give everything i got to bring the project best as possible .

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][spacer height="60px"][vc_row_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-eleganticons-101" title="Logo Design" title_tag="h2" icon_style="double-circle small-circle" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]Dynamically myocardinate market-driven strategic theme areas through frictionless imperatives.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-eleganticons-107" title="Web Design" title_tag="h2" icon_style="double-circle small-circle" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]Dynamically myocardinate market-driven strategic theme areas through frictionless imperatives.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-social-smashing-mag" title="Front End" title_tag="h2" icon_style="double-circle small-circle" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]Dynamically myocardinate market-driven strategic theme areas through frictionless imperatives.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1408171741223{padding-top: 50px !important;padding-bottom: 50px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="color" pattern_style="style1" pattern_opacity="0.7" overlay_color="rgba(255,255,255,0.85)" theme_primary="yes" theme_primary_alpha="1" dot_nav="no"][vc_column width="1/1"][tweets twtcount="5" tweet_align="center" no_of_col="1" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="false" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="MY WORKS" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Check my awesome works, Isn't Awesome?" line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" align="center"][portfolio insert_type="posts" pix_filterable="yes" filter_style="normal" no_of_items="8" order_by="date" order="ASC" columns="col4" title_tag="h2" lightbox="yes" like="yes" single_portfolio_link="no" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1401224065250{padding-top: 0px !important;}"][vc_column width="1/1"][title title="GET IN TOUCH" font_size="size-sm" title_tag="h2" sub_title="no" line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" align="center"][social facebook="#" twitter="#" gplus="#" linkedin="#" dribble="#" flickr="#"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Portfolio */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Portfolio', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-portfolio.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401104872619{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="6"][/vc_column][/vc_row][vc_row css=".vc_custom_1401104356464{padding-bottom: 0px !important;background-color: #f6f6f6 !important;}" type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Featured Works" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="CHECK OUT FEATURED AWARD WINING WORKS" line="yes" line_positions="below-title" line_style="line-style4" animate="no" transition="flash" title_margin="0px 0px 20px 0px"][spacer height="50px"][portfolio insert_type="posts" pix_filterable="no" filter_style="normal" no_of_items="16" order_by="date" order="ASC" columns="col4" style="style2" title_tag="h2" lightbox="yes" like="yes" single_portfolio_link="yes" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" portfolio_style="grid"][/vc_column][/vc_row][vc_row css=".vc_custom_1401104771384{background-color: #f7941e !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Be In Touch Forever" style="normal-title" align="center" font_size="size-sm" custom_font_size="22px" title_tag="h2" sub_title="yes" sub_title_text="Contact us using below information. Usually we contact you back in 24 hours" line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash"][spacer height="50px"][vc_row_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-paperplane" title="Ask Your Questions" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">support@example.com</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-eleganticons-133" title="Call Us Now!" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">(701) 700-2339</p>
[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_image_con="no" icon_image_style="rectangle" icon_type="icon" icon_name="pixicon-map-pin-streamline" title="Find Us Now!" title_tag="h2" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash"]
<p style="text-align: center">8184 Dewy Boulevard,
North Dakota, US</p>
[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401104926365{background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Electrify is an amazing theme, 100% Satisfaction Guarantee!" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Electrify - All in one WordPress theme. This theme suites for all kinds of business. You can create any type of design with this theme withouttouching a single line of code." line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0px 0px 20px 0px"][button button_text="BUY NOW" button_link="#" button_style="solid" button_size="md" custom_size="no" button_align="button-center" button_color="color" button_icon_align="front" animate="no" transition="flash"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Portfolio Minimal */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Portfolio Minimal', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-minimal-portfolio.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401173668250{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="16"][/vc_column][/vc_row][vc_row theme_primary="no" theme_primary_alpha="1" type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1402064253142{padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column width="1/1"][portfolio portfolio_style="masonry" insert_type="id" pix_filterable="no" filter_style="normal" no_of_items="12" order_by="date" order="ASC" portfolio_id="3261,3274,3294,3283,3275,3277,3279,3292,3281,3284" columns="col2" style="style1" title_tag="h2" lightbox="no" like="no" single_portfolio_link="yes" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row theme_primary="no" theme_primary_alpha="1" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1402064619939{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="1/6"][vc_column_text]<a href="#">FACEBOOK</a>[/vc_column_text][/vc_column][vc_column width="1/6"][vc_column_text]<a href="#">TWITTER</a>[/vc_column_text][/vc_column][vc_column width="1/6"][vc_column_text]<a href="#">PINTEREST</a>[/vc_column_text][/vc_column][vc_column width="1/6"][vc_column_text]<a href="#">GOOGLE PLUS</a>[/vc_column_text][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Shop */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Shop', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-shop.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401173668250{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="7"][/vc_column][/vc_row][vc_row css=".vc_custom_1401174733138{margin-top: -40px !important;padding: 0px 60px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/3"][vc_single_image  alignment="center" border_color="grey" img_link_target="_self" img_size="full" img_link="#"][/vc_column][vc_column width="1/3"][vc_single_image  alignment="center" border_color="grey" img_link_target="_self" img_size="full" img_link="#"][/vc_column][vc_column width="1/3"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full" img_link="#"][/vc_column][/vc_row][vc_row][vc_column width="1/1"][title title="NEW ARRIVALS" style="normal-title" align="center" font_size="size-sm" custom_font_size="24px" title_tag="h2" sub_title="yes" sub_title_text="Supply functional manufactured products..." line="yes" line_positions="below-sub-title" line_style="line-style2" animate="no" transition="flash"][spacer height="60px"][vc_row_inner][vc_column_inner width="1/1"][recent_products per_page="4" columns="4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401177337156{padding-top: 30px !important;padding-bottom: 40px !important;background-color: #ffffff !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;border: 1px solid #e2e2e2 !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="3/4" css=".vc_custom_1401177788461{padding-left: 30px !important;}"][spacer height="20px"][title title="GIFTING IS NOW A FEW CLICKS AWAY! GIVE THE GIFT OF CHOICE WITH AN E-GIFT VOUCHER." style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text=" Intrinsicly integrate multidisciplinary total linkage whereas business supply chains." line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" sub_title_margin="0px"][/vc_column][vc_column width="1/4" css=".vc_custom_1401177801196{padding-right: 30px !important;}"][spacer height="30px"][button button_text="Gift It Now" button_link="#" button_style="outline" button_size="sm" custom_size="no" button_color="color" button_icon_align="front" animate="no" transition="flash" button_align="button-right"][/vc_column][/vc_row][vc_row][vc_column width="1/1"][title title="FEATURE PRODUCTS" style="normal-title" align="center" font_size="size-sm" custom_font_size="24px" title_tag="h2" sub_title="yes" sub_title_text="Professionally engage accurate scheme..." line="yes" line_positions="below-sub-title" line_style="line-style2" animate="no" transition="flash"][spacer height="60px"][vc_row_inner][vc_column_inner width="1/1"][featured_products per_page="4" columns="4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Sports */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Sports', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-sports.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401173668250{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="10"][/vc_column][/vc_row][vc_row css=".vc_custom_1401254443028{background-color: #c00e00 !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="ABOUT US" style="normal-title" align="center" font_size="size-sm" custom_font_size="24px" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style5" animate="no" transition="flash"][spacer height="10px"][vc_row_inner][vc_column_inner width="1/2" css=".vc_custom_1401255018323{padding-right: 30px !important;padding-left: 30px !important;}"][title title="OUR HISTORY" style="normal-title" font_size="size-sm" custom_font_size="30px" title_tag="h2" sub_title="no" sub_title_text="Title" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" title_margin="0px 0px 25px 0"][vc_column_text]Holisticly restore synergistic potentialities through market products credibly morph mission-critical outsourcing whereas front-end paradigms completely generate strategic expertise.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1401255004054{border-width: 0px 0px 0px 1px !important;padding-right: 30px !important;padding-left: 30px !important;border-color: #ffffff !important;border-style: solid !important;}"][vc_column_text]We founded at 1988 metrics. Assertively facilitate extensive content vis-a-vis alternative outsourcing. Efficiently develop functional ideas for performance based process improvements. Intrinsicly evisculate premier methodologies whereas installed base testing procedures. Globally predominate superior technologies after state of the art technology.

Collaboratively extend global supply chains and covalent initiatives. Conveniently orchestrate technically sound services through dynamic metrics. Continually mesh B2B markets whereas accurate portals.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image  alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column][vc_column width="1/2"][title title="OUR MISSION" style="normal-title" font_size="size-sm" custom_font_size="24px" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style5" animate="no" transition="flash" title_margin="0px 0px 25px 0px"][vc_column_text]Rapidiously fabricate adaptive sources rather than multifunctional customer service. Monotonectally conceptualize innovative metrics with holistic niche markets. Energistically incentivize bleeding-edge processes via leveraged expertise. Competently reintermediate competitive value whereas extensible products. Phosfluorescently pontificate client-based supply chains rather than superior information.

Conveniently initiate error-free systems without tactical applications. Proactively revolutionize fully tested methods of empowerment rather than cost effective growth strategies. Dramatically orchestrate web-enabled content rather than accurate markets. Objectively utilize inexpensive niche markets rather than resource maximizing customer service.[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1401256895278{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][tweets twtusr="envato" twtcount="3" style="style1" tweet_align="left" no_of_col="1" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="false" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row][vc_column width="1/1"][title title="OUR TEAM &amp; STAFFS" style="normal-title" font_size="size-sm" custom_font_size="24px" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style5" animate="no" transition="flash" align="center"][spacer height="10px"][vc_row_inner][vc_column_inner width="1/1"][staffs insert_type="posts" no_of_staff="4" order_by="date" order="ASC" columns="col4" style="style1" title_tag="h2" staff_desc="no" lightbox="no" single_staff_link="no" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401258161568{background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/sports-client-bg.jpg?id=2349) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="OUR SPONSORS" style="normal-title" font_size="size-sm" custom_font_size="24px" title_tag="h2" sub_title="no" sub_title_text="Title" line="yes" line_positions="below-title" line_style="line-style5" animate="no" transition="flash" align="center"][spacer height="10px"][vc_row_inner][vc_column_inner width="1/1"][clients images="196,194,193,192,191" link="yes" title_on_hover="yes" items="5" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Skin Studio */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Studio', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-studio.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1400361823301{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="1"][/vc_column][/vc_row][vc_row type="full-width" color_style="dark" parallax="no" overlay="none" pattern_style="style1" css=".vc_custom_1400369949522{padding-bottom: 55px !important;}" parallax_ratio="0.5" pattern_opacity="1"][vc_column width="1/1"][title align="center" font_size="21px" title_tag="h2" title="We Proudly Provide..." sub_title="no" sub_title_text="Create amazing unique pages in seconds" line="yes" animate="no" transition="flash"][vc_column_text css=".vc_custom_1399791796754{margin-top: -20px !important;padding-right: 100px !important;padding-left: 100px !important;}"]
<p style="text-align: center;">Authoritatively actualize ubiquitous deliverables before user friendly functionalities. Seamlessly disseminate e-business processes for backend deliverables. Rapidiously facilitate progressive for client-centric convergence.</p>
[/vc_column_text][spacer height="30px"][vc_row_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-book-read-streamline" title_tag="h2" title="Web Development" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="yes" button_text="Read More" button_link="url:%23||" button_style="simple" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" button_icon="pixicon-eleganticons-3" icon_image_con="no" icon_image_style="rectangle" line="no" line_style="line-style1"]Conveniently negotiate effective opportunities through market positioning catalysts with team building applications.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-eleganticons-125" title_tag="h2" title="Mobile App" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="yes" button_text="Read More" button_link="#" button_style="simple" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" button_icon="pixicon-eleganticons-3" icon_image_con="no" icon_image_style="rectangle" line="no" line_style="line-style1"]Objectively whiteboard functionalized bandwidth without user friendly forward functionalities scenarios.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-man-people-streamline-user" title_tag="h2" title="Business Consulting" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="yes" button_text="Read More" button_link="#" button_style="simple" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" button_icon="pixicon-eleganticons-3" icon_image_con="no" icon_image_style="rectangle" line="no" line_style="line-style1"]Interactively incentivize goal-oriented bandwidth whereas enabled potentialities  installed base e-services.[/icon_box][/vc_column_inner][vc_column_inner width="1/4"][icon_box icon_type="icon" icon_name="pixicon-eleganticons-108" title_tag="h2" title="UI / Ux" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="yes" button_text="Read More" button_link="#" button_style="simple" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" button_icon="pixicon-eleganticons-3" icon_image_con="no" icon_image_style="rectangle" line="no" line_style="line-style1"]Dramatically maximize maintainable portals without accurate incubate distinctive process improvements.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1400370214929{border-top-width: 1px !important;padding-top: 75px !important;padding-bottom: 0px !important;background-color: #f6f6f6 !important;border-color: #eeeeee !important;border-style: solid !important;}" type="expandable" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title_tag="h2" title="Featured Works" sub_title="no" sub_title_text="Title" line="yes" animate="no" transition="flash" align="center"][portfolio insert_type="posts" pix_filterable="no" filter_style="normal" no_of_items="8" order_by="date" order="ASC" columns="col4" style="style1" title_tag="h2" lightbox="yes" like="yes" single_portfolio_link="yes" slider="no" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row type="full-width" color_style="light" parallax="no" pattern="no" pattern_style="style1" css=".vc_custom_1401924073988{margin-top: -5px !important;padding-top: 60px !important;padding-bottom: 60px !important;}" overlay="none" parallax_ratio="0.5" pattern_opacity="1" theme_primary="yes" theme_primary_alpha="1"][vc_column width="1/1"][callout_box callout_style="default" callout_align="left" title_tag="h2" title="Are you looking for a theme, which contains everything?" display_button="yes" button_text="Purchase Now" button_link="#" button_style="solid" button_color="white" button_size="md" button_target="_blank" display_button2="no" button_text2="Read More" button_link2="#" button_style2="outline" button_color2="color" button_size2="md" button_target2="_blank" animate="no" transition="flash"]Assertively embrace client-centric manufactured products after effective experiences authoritatively leverage other's standardized platforms after principle.[/callout_box][/vc_column][/vc_row][vc_row css=".vc_custom_1400369415820{padding-bottom: 0px !important;background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" pattern="no" pattern_style="style1" overlay="none" parallax_ratio="0.5" pattern_opacity="1"][vc_column width="1/1"][title title_tag="h2" title="We fulfill your expectations..!" sub_title="yes" sub_title_text="We hope you enjoy.." line="yes" animate="no" transition="flash" align="center" font_size="21px"][vc_row_inner][vc_column_inner width="1/3"][icon_box title_tag="h2" title="Visual Composer" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" icon_name="pixicon-eleganticons-94"]Professionally promote user-centric leadership via excellent.[/icon_box][icon_box title_tag="h2" title="Layer Slider" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" icon_name="pixicon-eleganticons-97"]Dramatically communicate backend functionalities.[/icon_box][icon_box title_tag="h2" title="Responive" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" icon_name="pixicon-eleganticons-108"]Conveniently simplify high-payoff deliverables systems.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][vc_single_image  border_color="grey" img_link_target="_self" img_size="large"][/vc_column_inner][vc_column_inner width="1/3"][icon_box title_tag="h2" title="Mega Menu" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" icon_name="pixicon-eleganticons-121"]Globally evolve pandemic architectures for stand alone.[/icon_box][icon_box title_tag="h2" title="1-Click Demo Install" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" icon_name="pixicon-eleganticons-127" icon_type="icon"]Quickly seize premium e-tailers with principle.[/icon_box][icon_box title_tag="h2" title="WPML Support" icon_style="bg-none" icon_hover="yes" icon_color="color" display_button="no" button_text="Read More" button_link="#" button_style="outline" button_color="color" button_size="md" align="left" icon_align="no" icon_below="no" animate="no" transition="flash" icon_name="pixicon-streamline-umbrella-weather"]Enthusiastically administrate competitive systems.[/icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row][vc_column width="1/1"][title title_tag="h2" title="Our Creative Team" sub_title="no" sub_title_text="Title" line="no" animate="no" transition="flash" style="normal-title" font_size="size-sm" line_positions="below-title" line_style="line-style1"][staffs insert_type="posts" no_of_staff="6" order_by="date" order="ASC" columns="col4" style="style4" title_tag="h2" staff_desc="no" lightbox="yes" single_staff_link="yes" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" arrow_type="arrow-style2" pagination="false" stop_on_hover="true" mouse_drag="true" touch_drag="true"][/vc_column][/vc_row][vc_row type="full-width" color_style="light" parallax="no" pattern="no" pattern_style="style1" css=".vc_custom_1399883478318{background-image: url(http://support.pixel8es.com/wp-content/uploads/2014/05/testimonial.jpg?id=271) !important;}" overlay="none"][vc_column width="1/1"][title align="center" title_tag="h2" title="What our happy clients say about?" sub_title="no" sub_title_text="Title" line="yes" animate="no" transition="flash" font_size="21px"][testimonial insert_type="posts" no_of_testimonial="6" order_by="date" order="ASC" rating_no="yes" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" style="style6" no_of_col="3"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Transport */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Transport', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-marketing.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401173668250{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="12"][/vc_column][/vc_row][vc_row css=".vc_custom_1401283902579{padding-bottom: 0px !important;background-color: #f6f6f6 !important;}" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][icon align="center" icon_style="bg-none" icon_type="icon-circle" title_tag="h2" animate="no" transition="flash" icon_name="pixicon-cittadinosymbols-webfont-40" icon_size="40px" icon_color="#0066cc"][line line_style="line-style1" align="center alignCenter" color="#0066cc"][spacer height="30px"][title title="Welcome to Electrify Transport" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Competently evolve cross-media relationships without extensible total linkage. Dramatically transform open-source relationships vis-a-vis business communities. Holisticly reintermediate parallel strategic theme areas vis-a-vis just in time ROI. Credibly foster market positioning technologies vis-a-vis accurate outsourcing. Dramatically actualize enabled e-tailers whereas plug-and-play outsourcing." line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" align="center" custom_font_size="24px"][/vc_column][/vc_row][vc_row type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1401282685955{padding-top: 30px !important;padding-bottom: 165px !important;background-color: #f6f6f6 !important;}"][vc_column width="1/3" css=".vc_custom_1401266977568{margin-right: 0px !important;margin-left: 0px !important;}"][vc_row_inner][vc_column_inner width="1/1" css=".vc_custom_1401270304800{padding: 40px 70px 40px 40px !important;background-color: #0066cc !important;}"][title title="Transport Anything " style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Competently evolve cross-media standardized results via relationships without extensible total transform human capital through linkage." line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="23px"][vc_single_image  alignment="right" border_color="grey" img_link_target="_self"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1401270989373{margin-top: -120px !important;margin-left: 20px !important;}"][vc_column_inner width="1/1"][button button_link="#" button_style="outline" button_size="sm" custom_size="no" button_color="white" button_icon="pixicon-eleganticons-138" button_icon_align="back" animate="no" transition="flash" button_text=" "][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/3"][vc_row_inner][vc_column_inner width="1/1" css=".vc_custom_1401270400591{padding: 40px 70px 40px 40px !important;background-color: #007ee5 !important;}"][title title="Safe and Secure" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Compellingly morph intermand data via diverse mind share. Professionally cooperative communities via inexpensive solutions." line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="23px"][vc_single_image  alignment="right" border_color="grey" img_link_target="_self"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1401270989373{margin-top: -120px !important;margin-left: 20px !important;}"][vc_column_inner width="1/1"][button button_link="#" button_style="outline" button_size="sm" custom_size="no" button_color="white" button_icon="pixicon-eleganticons-138" button_icon_align="back" animate="no" transition="flash" button_text=" "][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/3"][vc_row_inner][vc_column_inner width="1/1" css=".vc_custom_1401270655478{padding: 40px 70px 40px 40px !important;background-color: #0067bc !important;}"][title title="On Time without delay" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Seamlessly disseminate client-centered platforms whereas adaptive resources intrinsicly cultivate world-class quality vectors rather leadership skills. " line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="23px"][vc_single_image  alignment="right" border_color="grey" img_link_target="_self"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1401271018029{margin-top: -120px !important;margin-left: 20px !important;}"][vc_column_inner width="1/1"][button button_link="#" button_style="outline" button_size="sm" custom_size="no" button_color="white" button_icon="pixicon-eleganticons-138" button_icon_align="back" animate="no" transition="flash" button_text=" "][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401284604810{padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/3"][vc_single_image  border_color="grey" img_link_target="_self" img_size="large"][/vc_column][vc_column width="2/3"][title title="Why Choose Electrify Transport" style="normal-title" font_size="size-sm" custom_font_size="24px" title_tag="h2" sub_title="yes" sub_title_text="Efficiently enhance seamless services through impactful mindshare.." line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" sub_title_style="italic"][vc_column_text]Competently mesh compelling infomediaries rather than principle-centered results. Efficiently e-enable resource maximizing alignments with parallel methodologies. Enthusiastically synthesize extensible scenarios before team driven methods of empowerment. Distinctively negotiate holistic models before cross functional schemas. Intrinsicly morph emerging deliverables vis-a-vis flexible e-markets.

Progressively underwhelm market positioning schemas whereas emerging platforms. Synergistically foster cross-media scenarios and holistic intellectual capital. Monotonectally drive cost effective scenarios vis-a-vis ethical content. Synergistically pursue strategic results whereas user friendly channels. Competently evisculate out-of-the-box convergence vis-a-vis efficient networks.[/vc_column_text][vc_row_inner][vc_column_inner width="1/3"][list style="default"][li icon_name="pixicon-eleganticons-49" icon_color="color"]Visual Composer v 3.5[/li][li icon_name="pixicon-eleganticons-49" icon_color="color"]Responsive[/li][li icon_name="pixicon-eleganticons-49" icon_color="color"]Retina Ready[/li][/list][/vc_column_inner][vc_column_inner width="1/3"][list style="default"][li icon_name="pixicon-eleganticons-49" icon_color="color"]Layer Slider 5[/li][li icon_name="pixicon-eleganticons-49" icon_color="color"]Mega Menu[/li][li icon_name="pixicon-eleganticons-49" icon_color="color"]Translation ready[/li][/list][/vc_column_inner][vc_column_inner width="1/3"][list style="default"][li icon_name="pixicon-eleganticons-49" icon_color="color"]15+ Home Page[/li][li icon_name="pixicon-eleganticons-49" icon_color="color"]Woo Commerce[/li][li icon_name="pixicon-eleganticons-49" icon_color="color"]Multilingual[/li][/list][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1401285420738{background-color: #0066cc !important;background-position: 0 0 !important;background-repeat: repeat !important;}" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Be In Touch Forever" style="normal-title" font_size="size-sm" custom_font_size="24px" title_tag="h2" sub_title="yes" sub_title_text="Efficiently enhance seamless services through impactful mindshare.." line="yes" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" sub_title_style="italic" align="center"][spacer height="30px"][vc_row_inner css=".vc_custom_1400494700904{padding-right: 200px !important;padding-left: 200px !important;}"][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-110" icon_style="bg-none" icon_type="icon-circle" title="You Have a Question?" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]
<p style="text-align: center">support@pixel8es.com</p>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-133" icon_style="bg-none" icon_type="icon-circle" title="Call Us Now!" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]
<p style="text-align: center">(701) 700-2339</p>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][icon align="center" icon_name="pixicon-eleganticons-123" icon_style="bg-none" icon_type="icon-circle" title="Find Us Now!" title_tag="h2" animate="no" transition="flash"][spacer height="20px"][vc_column_text]
<p style="text-align: center">8184 Dewy Boulevard,
North Dakota,  US</p>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Travel */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Travel', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-travel.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401282843734{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][layerslider_vc id="13"][/vc_column][/vc_row][vc_row css=".vc_custom_1402143798542{padding-bottom: 0px !important;background-color: #f6f6f6 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Popular Destinations" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Efficiently extend extensible resources with progressive partnerships..." line="no" line_positions="below-title" line_style="line-style3" animate="no" transition="flash" custom_font_size="26px" sub_title_style="italic" title_margin="0 0 0 0"][spacer height="30px"][/vc_column][/vc_row][vc_row css=".vc_custom_1402137085182{padding-top: 0px !important;background-color: #f6f6f6 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/4"][vc_row_inner css=".vc_custom_1402137192244{padding-bottom: 30px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][vc_single_image  border_color="grey" img_link_target="_self" img_size="263x180" css=".vc_custom_1402145088386{margin-bottom: 25px !important;}"][title title="Adhari Park" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="DUBAI" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" title_margin="0px"][vc_column_text css=".vc_custom_1402144668636{margin-bottom: 10px !important;}"]
<p style="font-size: 12px;text-align: center">BAHRAIN</p>
[/vc_column_text][button button_text="Book Now!" button_link="#" button_style="simple" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4"][vc_row_inner css=".vc_custom_1402137217943{padding-bottom: 30px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][vc_single_image  border_color="grey" img_link_target="_self" img_size="263x180" css=".vc_custom_1402145097082{margin-bottom: 25px !important;}"][title title="Grand Prix" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="DUBAI" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" title_margin="0px"][vc_column_text css=".vc_custom_1402133529529{margin-bottom: 10px !important;}"]
<p style="font-size: 12px;text-align: center">DUBAI</p>
[/vc_column_text][button button_text="Book Now!" button_link="#" button_style="simple" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4"][vc_row_inner css=".vc_custom_1402137217943{padding-bottom: 30px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][vc_single_image border_color="grey" img_link_target="_self" img_size="263x180" css=".vc_custom_1402145371516{margin-bottom: 25px !important;}"][title title="Jerash - South Gate" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="DUBAI" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" title_margin="0px"][vc_column_text css=".vc_custom_1402144854768{margin-bottom: 10px !important;}"]
<p style="font-size: 12px;text-align: center">JORDAN</p>
[/vc_column_text][button button_text="Book Now!" button_link="#" button_style="simple" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4"][vc_row_inner css=".vc_custom_1402137217943{padding-bottom: 30px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][vc_single_image  border_color="grey" img_link_target="_self" img_size="263x180" css=".vc_custom_1402145406578{margin-bottom: 25px !important;}"][title title="Aile Richelieu" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="DUBAI" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" title_margin="0px"][vc_column_text css=".vc_custom_1402145432096{margin-bottom: 10px !important;}"]
<p style="font-size: 12px;text-align: center">PARIS</p>
[/vc_column_text][button button_text="Book Now!" button_link="#" button_style="simple" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row theme_primary="yes" theme_primary_alpha="1" type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1402141175643{padding-bottom: 40px !important;}"][vc_column width="1/1"][title title="We Will Help You Fulfill Your Expectations!" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Efficiently extend extensible resources with progressive partnerships..." line="no" line_positions="below-title" line_style="line-style3" animate="no" transition="flash" custom_font_size="26px" sub_title_style="italic" title_margin="0 0 0 0"][spacer height="30px"][vc_row_inner][vc_column_inner width="1/4"][icon align="left" icon_name="pixicon-cittadinosymbols-webfont-41" icon_style="bg-none" icon_type="icon-circle" title="Car Hiring" title_tag="h2" animate="no" transition="flash" icon_size="26px"][spacer height="10px"][vc_column_text]Credibly brand team driven paradigms for multimedia based quality vectors.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][icon align="left" icon_name="pixicon-cittadinosymbols-webfont-21" icon_style="bg-none" icon_type="icon-circle" title="Train Hiring" title_tag="h2" animate="no" transition="flash" icon_size="26px"][spacer height="10px"][vc_column_text]Rapidiously enhance compelling whereas highly efficient information.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][icon align="left" icon_name="pixicon-cittadinosymbols-webfont-8" icon_style="bg-none" icon_type="icon-circle" title="Cruises Hiring" title_tag="h2" animate="no" transition="flash" icon_size="26px"][spacer height="10px"][vc_column_text]Enthusiastically fashion orthogonal leadership skills without client.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][icon align="left" icon_name="pixicon-cittadinosymbols-webfont-35" icon_style="bg-none" icon_type="icon-circle" title="Fly Hiring" title_tag="h2" animate="no" transition="flash" icon_size="26px"][spacer height="10px"][vc_column_text]Distinctively benchmark cooperative vortals vis-a-vis end-to-end interfaces.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1402140999361{padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/silhoutte.png?id=3457) !important;}" theme_primary="yes" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][spacer height="136px"][/vc_column][/vc_row][vc_row css=".vc_custom_1402143590325{padding-bottom: 60px !important;background-color: #f6f6f6 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="Popular Accommodations! " style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Efficiently extend extensible resources with progressive partnerships..." line="no" line_positions="below-title" line_style="line-style3" animate="no" transition="flash" custom_font_size="26px" sub_title_style="italic" title_margin="0 0 0 0"][/vc_column][/vc_row][vc_row css=".vc_custom_1402142936292{padding-top: 0px !important;background-color: #f6f6f6 !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/4"][vc_row_inner css=".vc_custom_1402143321429{padding: 15px 15px 30px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][vc_single_image  border_color="grey" img_link_target="_self" img_size="full" css=".vc_custom_1402145504448{margin-bottom: 25px !important;}"][title title="Bahrain" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="DUBAI" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" title_margin="0px"][vc_column_text css=".vc_custom_1402146216324{margin-bottom: 10px !important;}"]
<p style="font-size: 12px;text-align: left">(387 Places)</p>
[/vc_column_text][vc_separator color="grey"][vc_column_text]Progressively streamline team driven methodologies through cooperative relationships. Intrinsicly reinvent pandemic processes after premium solutions.[/vc_column_text][button button_text="See All" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4"][vc_row_inner css=".vc_custom_1402143321429{padding: 15px 15px 30px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][vc_single_image border_color="grey" img_link_target="_self" img_size="full" css=".vc_custom_1402146065826{margin-bottom: 25px !important;}"][title title="Pakistan" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="DUBAI" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" title_margin="0px"][vc_column_text css=".vc_custom_1402146092981{margin-bottom: 10px !important;}"]
<p style="font-size: 12px;text-align: left">(87 Places)</p>
[/vc_column_text][vc_separator color="grey"][vc_column_text]Corporate ideas through mission-critical internal or "organic" sources. Assertively procrastinate collaborative potentialities for highly efficient innovation.[/vc_column_text][button button_text="See All" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4"][vc_row_inner css=".vc_custom_1402143321429{padding: 15px 15px 30px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][vc_single_image  border_color="grey" img_link_target="_self" img_size="full" css=".vc_custom_1402146166152{margin-bottom: 25px !important;}"][title title="USA" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="DUBAI" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" title_margin="0px"][vc_column_text css=".vc_custom_1402146203679{margin-bottom: 10px !important;}"]
<p style="font-size: 12px;text-align: left">(256 Places)</p>
[/vc_column_text][vc_separator color="grey"][vc_column_text]Unleash front-end alignments through real-time applications. Efficiently cultivate resource sucking growth strategies and backward-compatible.[/vc_column_text][button button_text="See All" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4"][vc_row_inner css=".vc_custom_1402143321429{padding: 15px 15px 30px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][vc_single_image  border_color="grey" img_link_target="_self" img_size="full" css=".vc_custom_1402146236241{margin-bottom: 25px !important;}"][title title="Italy" style="normal-title" font_size="size-sm" title_tag="h2" sub_title="no" sub_title_text="DUBAI" line="no" line_positions="below-title" line_style="line-style1" animate="no" transition="flash" custom_font_size="18px" title_margin="0px"][vc_column_text css=".vc_custom_1402146269005{margin-bottom: 10px !important;}"]
<p style="font-size: 12px;text-align: left">(452 Places)</p>
[/vc_column_text][vc_separator color="grey"][vc_column_text]Globally foster ubiquitous leadership skills after technically sound e-commerce.  Progressively leverage existing premium products without team.[/vc_column_text][button button_text="See All" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row type="full-width" color_style="light" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" css=".vc_custom_1402124629744{padding-bottom: 0px !important;background-image: url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/05/travel-fullwidth-bg.jpg?id=3377) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][title title="Most Noticeable Places All Over the World" style="normal-title" align="center" font_size="size-sm" title_tag="h2" sub_title="yes" sub_title_text="Interactively pontificate standards compliant partnerships..." line="no" line_positions="below-title" line_style="line-style3" animate="no" transition="flash" custom_font_size="26px" sub_title_style="italic" title_margin="0 0 0 0"][vc_row_inner css=".vc_custom_1402125060088{margin-top: -20px !important;}"][vc_column_inner width="1/1"][spacer height="30px"][button button_text="See All Wonders" button_link="#" button_style="solid" button_color="color" button_size="sm" custom_size="no" button_icon_align="front" animate="no" transition="flash" button_align="button-center"][/vc_column_inner][/vc_row_inner][spacer height="128px"][vc_single_image  alignment="center" border_color="grey" img_link_target="_self" img_size="full"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );


/** Skin Wedding */
$pix_data               = array();
$pix_data['name']       = __( 'Skin Wedding', 'js_composer' );
$pix_data['image_path'] = get_template_directory_uri().'/framework/vc_templates/template_img/skin-wedding.png';
$pix_data['content']    = <<<CONTENT
[vc_row css=".vc_custom_1401820028484{padding-top: 0px !important;padding-bottom: 0px !important;}" type="normal" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1" theme_primary="no" theme_primary_alpha="1"][vc_column width="1/1"][rev_slider_vc alias="wedding"][/vc_column][/vc_row][vc_row css=".vc_custom_1401818768785{background: #f6f6f6 url(http://themes.pixel8es.com/electrify/wp-content/uploads/sites/4/2014/06/wedding-pat.png?id=2975) !important;background-position: 0 0 !important;background-repeat: repeat !important;}" theme_primary="no" theme_primary_alpha="1" type="full-width" color_style="dark" parallax="no" parallax_ratio="0.5" overlay="none" pattern_style="style1" pattern_opacity="1"][vc_column width="1/1"][title title="We take care of" style="normal-title" align="center" font_size="size-sm" custom_font_size="36px" title_tag="h2" sub_title="yes" sub_title_style="italic" sub_title_text="Energistically disseminate revolutionary information..." line="yes" line_positions="below-sub-title" line_style="line-style5" animate="no" transition="flash"][spacer height="30px"][vc_row_inner][vc_column_inner width="1/3"][icon_box icon_type="image" icon_img="2957" icon_image_con="yes" icon_image="2957" icon_image_style="rounded" icon_style="bg-none" icon_hover="yes" icon_color="color" title="Dresses" title_tag="h2" line="no" line_style="line-style1" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="24px"]Credibly parallel task progressive e-tailers without functionalized methods of empowerment credibly administrate virtual web services.[/icon_box][spacer height="30px"][icon_box icon_type="image" icon_img="2957" icon_image_con="yes" icon_image="2960" icon_image_style="rounded" icon_style="bg-none" icon_hover="yes" icon_color="color" title="Gifts" title_tag="h2" line="no" line_style="line-style1" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="24px"]Dynamically iterate business catalysts for change rather than magnetic mind share completely cultivate viral action items before standards.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_type="image" icon_img="2957" icon_image_con="yes" icon_image="2958" icon_image_style="rounded" icon_style="bg-none" icon_hover="yes" icon_color="color" title="Rings" title_tag="h2" line="no" line_style="line-style1" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="24px"]Conveniently scale high-quality mindshare after client-centric systems compellingly formulate customized architectures via emerging platforms.[/icon_box][spacer height="30px"][icon_box icon_type="image" icon_img="2957" icon_image_con="yes" icon_image="2961" icon_image_style="rounded" icon_style="bg-none" icon_hover="yes" icon_color="color" title="Meals &amp; Drinks" title_tag="h2" line="no" line_style="line-style1" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="24px"]Continually procrastinate value-added scenarios rather than timely interfaces dynamically plagiarize ubiquitous channels after user friendly process improvements.[/icon_box][/vc_column_inner][vc_column_inner width="1/3"][icon_box icon_type="image" icon_img="2957" icon_image_con="yes" icon_image="2959" icon_image_style="rounded" icon_style="bg-none" icon_hover="yes" icon_color="color" title="Beauty" title_tag="h2" line="no" line_style="line-style1" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="24px"]Dynamically aggregate enterprise methodologies leading-edge internal organic sources distinctively productize backend niche markets.[/icon_box][spacer height="30px"][icon_box icon_type="image" icon_img="2957" icon_image_con="yes" icon_image="2962" icon_image_style="rounded" icon_style="bg-none" icon_hover="yes" icon_color="color" title="Flowers" title_tag="h2" line="no" line_style="line-style1" display_button="no" button_text="Read More" button_style="outline" button_color="color" button_size="md" align="center" icon_align="no" icon_below="no" animate="no" transition="flash" custom_size="24px"]Competently harness plug-and-play resources through timely growth strategies dynamically engage intuitive partnerships without world-class technology.[/icon_box][/vc_column_inner][/vc_row_inner][spacer height="20px"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full" ][spacer height="20px"][title title="We take care of" style="normal-title" align="center" font_size="size-sm" custom_font_size="36px" title_tag="h2" sub_title="yes" sub_title_style="italic" sub_title_text="Energistically disseminate revolutionary information..." line="yes" line_positions="below-sub-title" line_style="line-style5" animate="no" transition="flash"][spacer height="30px"][vc_row_inner][vc_column_inner width="1/4"][vc_single_image  border_color="grey" img_link_target="_self" img_size="263x280"][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image  border_color="grey" img_link_target="_self" img_size="555x280"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image border_color="grey" img_link_target="_self" img_size="263x280"][/vc_column_inner][/vc_row_inner][spacer height="30px"][vc_row_inner][vc_column_inner width="1/6"][vc_single_image  border_color="grey" img_link_target="_self" img_size="165x200"][/vc_column_inner][vc_column_inner width="1/6"][vc_single_image  border_color="grey" img_link_target="_self" img_size="165x200"][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image  border_color="grey" img_link_target="_self" img_size="555x200"][/vc_column_inner][vc_column_inner width="1/6"][vc_single_image  border_color="grey" img_link_target="_self" img_size="165x200"][/vc_column_inner][/vc_row_inner][spacer height="30px"][vc_row_inner][vc_column_inner width="1/4"][vc_single_image  border_color="grey" img_link_target="_self" img_size="263x320"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image  border_color="grey" img_link_target="_self" img_size="263x320"][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image  border_color="grey" img_link_target="_self" img_size="555x320"][/vc_column_inner][/vc_row_inner][spacer height="50px"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full" ][spacer height="20px"][title title="What our valuable couples thinks about us?" style="normal-title" align="center" font_size="size-sm" custom_font_size="36px" title_tag="h2" sub_title="yes" sub_title_style="italic" sub_title_text="Energistically disseminate revolutionary information..." line="yes" line_positions="below-sub-title" line_style="line-style5" animate="no" transition="flash"][testimonial insert_type="id" no_of_testimonial="3" order_by="date" order="ASC" style="style2" no_of_col="1" rating_no="no" autoplay="4000" slide_speed="500" slide_arrow="false" pagination="false" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" testimonial_id="3013,3017,3021"][spacer height="50px"][vc_single_image alignment="center" border_color="grey" img_link_target="_self" img_size="full" ][spacer height="15px"][title title="Latest news" style="normal-title" align="center" font_size="size-sm" custom_font_size="36px" title_tag="h2" sub_title="yes" sub_title_style="italic" sub_title_text="Energistically disseminate revolutionary information..." line="yes" line_positions="below-sub-title" line_style="line-style5" animate="no" transition="flash"][vc_row_inner][vc_column_inner width="1/1"][blog insert_type="category" no_of_items="3" order_by="date" order="ASC" title_tag="h2" display_date="yes" style="style1" columns="col3" display_comments="yes" blog_desc="no" slider="yes" autoplay="4000" slide_speed="500" slide_arrow="true" pagination="true" slider_height="false" stop_on_hover="true" mouse_drag="true" touch_drag="true" blog_post_category="wedding"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

/** Landing page template */
$pix_data               = array();
$pix_data['name']       = __( 'Landing Page', 'js_composer' );
$pix_data['image_path'] = vc_asset_url( 'vc/templates/landing_page.png' );
$pix_data['custom_class'] = ''; // default is ''
$pix_data['content']    = <<<CONTENT
[vc_row][vc_column width="1/1"][vc_single_image border_color="grey" img_link_target="_self"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Call to Action Page template */
$pix_data               = array();
$pix_data['name']       = __( 'Call to Action Page', 'js_composer' );
$pix_data['image_path'] = vc_asset_url( 'vc/templates/call_to_action_page.png' );
$pix_data['content']    = <<<CONTENT
[vc_row][vc_column width="1/1"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Feature List template */
$pix_data               = array();
$pix_data['name']       = __( 'Feature List', 'js_composer' );
$pix_data['image_path'] = vc_asset_url( 'vc/templates/feature_list.png' );
$pix_data['content']    = <<<CONTENT
[vc_row][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][/vc_column][vc_column width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][/vc_column][vc_column width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Description Page template */
$pix_data               = array();
$pix_data['name']       = __( 'Description Page', 'js_composer' );
$pix_data['image_path'] = vc_asset_url( 'vc/templates/description_page.png' );
$pix_data['content']    = <<<CONTENT
[vc_row][vc_column width="1/1"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][vc_separator color="grey"][vc_single_image border_color="grey" img_link_target="_self"][vc_separator color="grey"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][vc_button2 title="Text on the button" style="rounded" color="blue" size="md"][/vc_column][vc_column width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][vc_button2 title="Text on the button" style="rounded" color="blue" size="md"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Service List template */
$pix_data               = array();
$pix_data['name']       = __( 'Service List', 'js_composer' );
$pix_data['image_path'] = vc_asset_url( 'vc/templates/service_list.png' );
$pix_data['content']    = <<<CONTENT
[vc_row][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/1"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image border_color="grey" img_link_target="_self"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

/** Product Page template */
$pix_data               = array();
$pix_data['name']       = __( 'Product Page', 'js_composer' );
$pix_data['image_path'] = vc_asset_url( 'vc/templates/product_page.png' );
$pix_data['content']    = <<<CONTENT
[vc_row][vc_column width="1/1"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][vc_separator color="grey"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][/vc_column][vc_column width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][vc_button2 title="Text on the button" style="rounded" color="blue" size="md"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image border_color="grey" img_link_target="_self"][/vc_column][vc_column width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][vc_button2 title="Text on the button" style="rounded" color="blue" size="md"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $pix_data );

