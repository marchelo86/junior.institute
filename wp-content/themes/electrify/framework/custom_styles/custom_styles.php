<?php 
global $pix_theme_pri_color;
	/* Body Custom Fonts */
	$body_font = isset($data['custom_font_body']) && !empty($data['custom_font_body']) ? $data['custom_font_body'] : array('size'  => '14px', 'g_face' => 'Lato', 'face'  => 'Arial, sans-serif', 'style' => 'regular' );
	
	$body_gf = $body_font['g_face']; //Choosen Google webfont
	$body_fv = $body_font['style'];  //Google web font variant (eg; 300italic)
	$body_fsize = $body_font['size']; //Font size
	$body_ff = $body_font['face']; // Fallback font

	$body_fvs = pix_font_variant($body_fv); //Seperated font variation
	
	/* Heading/Primary Custom Fonts */
	$heading_font = isset($data['custom_font_primary']) && !empty($data['custom_font_primary']) ? $data['custom_font_primary'] : array('g_face' => 'Raleway', 'face'  => 'Arial, sans-serif', 'style' => '700' );
	
	$heading_gf = $heading_font['g_face'];
	$heading_fv = $heading_font['style'];
	$heading_ff = $heading_font['face'];

	$heading_fvs = pix_font_variant($heading_fv);

	/* Content Custom Fonts */
	$con_font = isset($data['custom_font_content']) && !empty($data['custom_font_content']) ? $data['custom_font_content'] : array('g_face' => 'Lato', 'face'  => 'Arial, sans-serif' );
	$con_gf = $con_font['g_face'];
	$con_ff = $con_font['face'];

	$afs = isset($data['ad_font_settings']) ? $data['ad_font_settings'] : '0';
	$custom_styles = isset($data['custom_styles']) ? $data['custom_styles'] : '0';
	$custom_header_styles = isset($data['custom_header_styles']) ? $data['custom_header_styles'] : '0';

	$boxed_content = isset($data['boxed_content'])? $data['boxed_content'] : 0;
	$main_wrap = isset($data['main_wrap'])? $data['main_wrap'] : 1366;
	$content_wrap = isset($data['content_wrap'])? $data['content_wrap'] : 1170;

	$pix_ajax = isset($data['pix_ajax']) ? $data['pix_ajax'] : 0;
	$pix_ajax_style = isset($data['pix_ajax_style']) ? $data['pix_ajax_style'] : 'style1';

	$pix_preloader = isset($data['pix_preloader']) ? $data['pix_preloader'] : 0;

	//if( $body_gf != 'Lato' && $body_fv != 'regular'):
  ?>

	body{
		font-family: '<?php echo $body_gf; ?>', <?php echo $body_ff; ?>;
		font-size:   <?php echo  $body_fsize; ?>;
		font-style:  <?php echo $body_fvs[0]; ?>;
		font-weight: <?php echo $body_fvs[1]; ?>;
	}

	<?php 

	if($content_wrap != 1170){ ?>
		.pix-container, .container, .wpb_row.vc_row-fluid.normal{
			max-width: <?php echo $content_wrap.'px'; ?>;
			width: 100%;
		}
	<?php }

	if($boxed_content){ ?>
		.pix-boxed-content, .header-con.stuck .header{
			max-width: <?php echo $main_wrap.'px'; ?>;
			margin-left: auto;
			margin-right: auto;
		}
		@media (max-width: 991px) {
			.pix-boxed-content, .header-con.stuck .header{
				max-width: 748px;
			}
			.pix-container, .container{
				max-width: 682px;
				width: 100%;
			}
		}
		@media (max-width: 767px) {
			.pix-boxed-content, .header-con.stuck .header{
				width: 468px;
			}
			.pix-container, .container{
				max-width: 428px;
			}
		}
		@media (max-width: 480px) {
			.pix-boxed-content, .header-con.stuck .header{
				max-width: 80%;
			}
			.pix-container, .container{
				max-width: 80%;
			}
		}
	<?php }?>

	<?php //endif; 

	if( $con_gf != 'Lato' ):
	?>

	blockquote, .main-nav .sub-menu, .main-nav .menu .sub-menu li, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a, .textfield, .percent, .staff-content .title, .single-portfolio-btn, .testimonial.style3 .testimonial-author .pix-author-name, .testimonial.style6 .testimonial-author .pix-author-name, .counter .counter-value, .tweets .twitter, .main-nav .sub-menu li, .pix-cart .pix-woo-price, .pix-cart .pix-no-items, .pix-cart .product_list_widget li a, .pix-cart .product_list_widget .quantity, .pix-cart .widget_shopping_cart_content .total, .pix-cart .widget_shopping_cart_content .button, .pix-cart .widget_shopping_cart_content .button.checkout, .summary .price del, .shop_table.my_account_orders .button,.pix_accordion.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header{
		font-family: '<?php echo $con_gf; ?>', <?php echo $con_ff; ?>;
	}
	
	<?php endif; 

	if( $heading_gf != 'Raleway'):
	?>

	h1, h2, h3, #logo, .main-nav .menu, .main-nav li.pix-megamenu > ul.sub-menu > li > a, #sub-header h2, .btn, .pix_icon_box a.btn, .title, .process .text span.inner-text, .process .title, #filters.normal li a, .price-table .plan-title, .testimonial .pix-author-name, .authorDetails .authorName a, .comment-list .fn a, .comment-list .fn, .widget .widgettitle, .wpcf7-submit, .main-nav .menu li, .woo-product-item .title, .woo-product-item .added_to_cart, .widget_shopping_cart_content .button, .shop_table thead th, .button, .summary .single_add_to_cart_button, .cart-collaterals h2, .cart-collaterals .table tbody th, .checkout h3, .myaccount_user + h2, .addresses h3, .woocommerce-checkout h2, .woocommerce h2{
		font-family: '<?php echo $heading_gf; ?>', <?php echo $heading_ff; ?>;        
		font-style:  <?php echo $heading_fvs[0]; ?>;
		font-weight: <?php echo $heading_fvs[1]; ?>;
	}

	<?php endif; 
	$cf_h1 = $cf_h2 = $cf_h3 = $cf_h4 = $cf_h5 = $cf_h6 = '';
	if ($afs == '1'):

		/* H1 Custom Fonts */
		$cf_h1_font = $data['cf_h1'];
		
		$cf_h1_gf = $cf_h1_font['g_face']; //Choosen Google webfont
		$cf_h1_fv = $cf_h1_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h1_fsize = $cf_h1_font['size']; //Font size
		$cf_h1_ff = $cf_h1_font['face']; // Fallback font

		$cf_h1_fv = pix_font_variant($cf_h1_fv); //Seperated font variation
	?>
	h1{
		font-family: '<?php echo $cf_h1_gf; ?>', <?php echo $cf_h1_ff; ?>;
		font-size:   <?php echo  $cf_h1_fsize; ?>;
		font-style:  <?php echo $cf_h1_fv[0]; ?>;
		font-weight: <?php echo $cf_h1_fv[1]; ?>;
	}

	<?php 
		/* H2 Custom Fonts */
		$cf_h2_font = $data['cf_h2'];
		
		$cf_h2_gf = $cf_h2_font['g_face']; //Choosen Google webfont
		$cf_h2_fv = $cf_h2_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h2_fsize = $cf_h2_font['size']; //Font size
		$cf_h2_ff = $cf_h2_font['face']; // Fallback font

		$cf_h2_fv = pix_font_variant($cf_h2_fv); //Seperated font variation
	?>
	h2{
		font-family: '<?php echo $cf_h2_gf; ?>', <?php echo $cf_h2_ff; ?>;
		font-size:   <?php echo  $cf_h2_fsize; ?>;
		font-style:  <?php echo $cf_h2_fv[0]; ?>;
		font-weight: <?php echo $cf_h2_fv[1]; ?>;
	}

	<?php 
		/* H3 Custom Fonts */
		$cf_h3_font = $data['cf_h3'];
		
		$cf_h3_gf = $cf_h3_font['g_face']; //Choosen Google webfont
		$cf_h3_fv = $cf_h3_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h3_fsize = $cf_h3_font['size']; //Font size
		$cf_h3_ff = $cf_h3_font['face']; // Fallback font

		$cf_h3_fv = pix_font_variant($cf_h3_fv); //Seperated font variation
	?>
	h3{
		font-family: '<?php echo $cf_h3_gf; ?>', <?php echo $cf_h3_ff; ?>;   
		font-size:   <?php echo  $cf_h3_fsize; ?>;
		font-style:  <?php echo $cf_h3_fv[0]; ?>;
		font-weight: <?php echo $cf_h3_fv[1]; ?>;
	}

	<?php 
		/* H4 Custom Fonts */
		$cf_h4_font = $data['cf_h4'];
		
		$cf_h4_gf = $cf_h4_font['g_face']; //Choosen Google webfont
		$cf_h4_fv = $cf_h4_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h4_fsize = $cf_h4_font['size']; //Font size
		$cf_h4_ff = $cf_h4_font['face']; // Fallback font

		$cf_h4_fv = pix_font_variant($cf_h4_fv); //Seperated font variation
	?>
	h4{
		font-family: '<?php echo $cf_h4_gf; ?>', <?php echo $cf_h4_ff; ?>;
		font-size:   <?php echo  $cf_h4_fsize; ?>;          
		font-style:  <?php echo $cf_h4_fv[0]; ?>;
		font-weight: <?php echo $cf_h4_fv[1]; ?>;
	}

	<?php 
		/* H5 Custom Fonts */
		$cf_h5_font = $data['cf_h5'];
		
		$cf_h5_gf = $cf_h5_font['g_face']; //Choosen Google webfont
		$cf_h5_fv = $cf_h5_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h5_fsize = $cf_h5_font['size']; //Font size
		$cf_h5_ff = $cf_h5_font['face']; // Fallback font

		$cf_h5_fv = pix_font_variant($cf_h5_fv); //Seperated font variation
	?>
	h5{
		font-family: '<?php echo $cf_h5_gf; ?>', <?php echo $cf_h5_ff; ?>;
		font-size:   <?php echo  $cf_h5_fsize; ?>;          
		font-style:  <?php echo $cf_h5_fv[0]; ?>;
		font-weight: <?php echo $cf_h5_fv[1]; ?>;
	}

	<?php 
		/* H6 Custom Fonts */
		$cf_h6_font = $data['cf_h6'];
		
		$cf_h6_gf = $cf_h6_font['g_face']; //Choosen Google webfont
		$cf_h6_fv = $cf_h6_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h6_fsize = $cf_h6_font['size']; //Font size
		$cf_h6_ff = $cf_h6_font['face']; // Fallback font

		$cf_h6_fv = pix_font_variant($cf_h6_fv); //Seperated font variation
	?>
	h6{
		font-family: '<?php echo $cf_h6_gf; ?>', <?php echo $cf_h6_ff; ?>; 
		font-size:   <?php echo  $cf_h6_fsize; ?>;       
		font-style:  <?php echo $cf_h6_fv[0]; ?>;
		font-weight: <?php echo $cf_h6_fv[1]; ?>;
	}

	<?php 
	   /* List Item */
		$cf_list = $data['cf_list'];
		
		$cf_list_gf = $cf_list['g_face']; //Choosen Google webfont
		$cf_list_fv = $cf_list['style'];  //Google web font variant (eg; 300italic)
		$cf_list_fsize = $cf_list['size']; //Font size
		$cf_list_ff = $cf_list['face']; // Fallback font

		$cf_list_fv = pix_font_variant($cf_list_fv); //Seperated font variation
	?>    
	li, li a {
		font-family: '<?php echo $cf_list_gf; ?>', <?php echo $cf_list_ff; ?>; 
		font-size:   <?php echo  $cf_list_fsize; ?>;       
		font-style:  <?php echo $cf_list_fv[0]; ?>;
		font-weight: <?php echo $cf_list_fv[1]; ?>;
	}

	
	<?php 
	   /* Link */
		$cf_link = $data['cf_link'];
		
		$cf_link_gf = $cf_link['g_face']; //Choosen Google webfont
		$cf_link_fv = $cf_link['style'];  //Google web font variant (eg; 300italic)
		$cf_link_fsize = $cf_link['size']; //Font size
		$cf_link_ff = $cf_link['face']; // Fallback font

		$cf_link_fv = pix_font_variant($cf_link_fv); //Seperated font variation
	?>   
	a{
		font-family: '<?php echo $cf_link_gf; ?>', <?php echo $cf_link_ff; ?>; 
		font-size:   <?php echo  $cf_link_fsize; ?>;       
		font-style:  <?php echo $cf_link_fv[0]; ?>;
		font-weight: <?php echo $cf_link_fv[1]; ?>;
	}

	
	<?php 
	   /* Logo */
		$cf_logo = $data['cf_logo'];
		
		$cf_logo_gf = $cf_logo['g_face']; //Choosen Google webfont
		$cf_logo_fv = $cf_logo['style'];  //Google web font variant (eg; 300italic)
		$cf_logo_fsize = $cf_logo['size']; //Font size
		$cf_logo_ff = $cf_logo['face']; // Fallback font

		$cf_logo_fv = pix_font_variant($cf_logo_fv); //Seperated font variation
	?>   
	#logo{
		font-family: '<?php echo $cf_logo_gf; ?>', <?php echo $cf_logo_ff; ?>; 
		font-size:   <?php echo  $cf_logo_fsize; ?>;       
		font-style:  <?php echo $cf_logo_fv[0]; ?>;
		font-weight: <?php echo $cf_logo_fv[1]; ?>;
	}
	
   
	<?php 
		/* blockquote */
		$cf_blockquote = $data['cf_blockquote'];
		
		$cf_blockquote_gf = $cf_blockquote['g_face']; //Choosen Google webfont
		$cf_blockquote_fv = $cf_blockquote['style'];  //Google web font variant (eg; 300italic)
		$cf_blockquote_fsize = $cf_blockquote['size']; //Font size
		$cf_blockquote_ff = $cf_blockquote['face']; // Fallback font

		$cf_blockquote_fv = pix_font_variant($cf_blockquote_fv); //Seperated font variation
	?>  
	blockquote {
		font-family: '<?php echo $cf_blockquote_gf; ?>', <?php echo $cf_blockquote_ff; ?>; 
		font-size:   <?php echo $cf_blockquote_fsize; ?>;       
		font-style:  <?php echo $cf_blockquote_fv[0]; ?>;
		font-weight: <?php echo $cf_blockquote_fv[1]; ?>;
	}
	
	
	<?php 
	   /* Main Menu */
		$cf_menu = $data['cf_menu'];
		
		$cf_menu_gf = $cf_menu['g_face']; //Choosen Google webfont
		$cf_menu_fv = $cf_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_menu_fsize = $cf_menu['size']; //Font size
		$cf_menu_ff = $cf_menu['face']; // Fallback font

		$cf_menu_fv = pix_font_variant($cf_menu_fv); //Seperated font variation
	?> 
	.main-nav .menu li, .main-nav .menu li a{
		font-family: '<?php echo $cf_menu_gf; ?>', <?php echo $cf_menu_ff; ?>; 
		font-size:   <?php echo $cf_menu_fsize; ?>;       
		font-style:  <?php echo $cf_menu_fv[0]; ?>;
		font-weight: <?php echo $cf_menu_fv[1]; ?>;
	}

	
	<?php 
	   /* Sub Menu */
		$cf_sub_menu = $data['cf_sub_menu'];
		
		$cf_sub_menu_gf = $cf_sub_menu['g_face']; //Choosen Google webfont
		$cf_sub_menu_fv = $cf_sub_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_sub_menu_fsize = $cf_sub_menu['size']; //Font size
		$cf_sub_menu_ff = $cf_sub_menu['face']; // Fallback font

		$cf_sub_menu_fv = pix_font_variant($cf_sub_menu_fv); //Seperated font variation
	?> 
	.main-nav .sub-menu, .main-nav .menu .sub-menu li a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a{
		font-family: '<?php echo $cf_sub_menu_gf; ?>', <?php echo $cf_sub_menu_ff; ?>; 
		font-size:   <?php echo $cf_sub_menu_fsize; ?>;       
		font-style:  <?php echo $cf_sub_menu_fv[0]; ?>;
		font-weight: <?php echo $cf_sub_menu_fv[1]; ?>;
	}

	
	<?php 
	   /* Mega Menu Title*/
		$cf_mega_menu = $data['cf_mega_menu'];
		
		$cf_mega_menu_gf = $cf_mega_menu['g_face']; //Choosen Google webfont
		$cf_mega_menu_fv = $cf_mega_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_mega_menu_fsize = $cf_mega_menu['size']; //Font size
		$cf_mega_menu_ff = $cf_mega_menu['face']; // Fallback font

		$cf_mega_menu_fv = pix_font_variant($cf_mega_menu_fv); //Seperated font variation
	?>
	.main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li > a:hover, .main-nav li.pix-megamenu > ul.sub-menu > li:hover > a{
		font-family: '<?php echo $cf_mega_menu_gf; ?>', <?php echo $cf_mega_menu_ff; ?>; 
		font-size:   <?php echo $cf_mega_menu_fsize; ?>;       
		font-style:  <?php echo $cf_mega_menu_fv[0]; ?>;
		font-weight: <?php echo $cf_mega_menu_fv[1]; ?>;
	}

	
	<?php 
	   /* TITLE Shortcode Default */
		$cf_main_title = $data['cf_main_title'];
		
		$cf_main_title_gf = $cf_main_title['g_face']; //Choosen Google webfont
		$cf_main_title_fv = $cf_main_title['style'];  //Google web font variant (eg; 300italic)
		$cf_main_title_fsize = $cf_main_title['size']; //Font size
		$cf_main_title_ff = $cf_main_title['face']; // Fallback font

		$cf_main_title_fv = pix_font_variant($cf_main_title_fv); //Seperated font variation
	?>
	.title {
		font-family: '<?php echo $cf_main_title_gf; ?>', <?php echo $cf_main_title_ff; ?>; 
		font-size:   <?php echo $cf_main_title_fsize; ?>;       
		font-style:  <?php echo $cf_main_title_fv[0]; ?>;
		font-weight: <?php echo $cf_main_title_fv[1]; ?>;
	}

	
	<?php 
	   /* Button Default */
		$cf_btn = $data['cf_btn'];
		
		$cf_btn_gf = $cf_btn['g_face']; //Choosen Google webfont
		$cf_btn_fv = $cf_btn['style'];  //Google web font variant (eg; 300italic)
		$cf_btn_fsize = $cf_btn['size']; //Font size
		$cf_btn_ff = $cf_btn['face']; // Fallback font

		$cf_btn_fv = pix_font_variant($cf_btn_fv); //Seperated font variation
	?>
	.btn{   
		font-family: '<?php echo $cf_btn_gf; ?>', <?php echo $cf_btn_ff; ?>; 
		font-size:   <?php echo $cf_btn_fsize; ?>;       
		font-style:  <?php echo $cf_btn_fv[0]; ?>;
		font-weight: <?php echo $cf_btn_fv[1]; ?>;
	}

	
	<?php 
	   /* Button Small */
		$cf_btn_small = $data['cf_btn_small'];
	?>
	.btn.btn-sm{
		font-size: <?php echo $cf_btn_small; ?>;
	}

	
	<?php 
	/* Button Large */
	$cf_btn_large = $data['cf_btn_lg'];
	?>
	.btn-lg{
		font-size: <?php echo $cf_btn_large; ?>;
	}

	
	<?php 
	   /* Process Title */
		$cf_process_title = $data['cf_process_title'];
		
		$cf_process_title_gf = $cf_process_title['g_face']; //Choosen Google webfont
		$cf_process_title_fv = $cf_process_title['style'];  //Google web font variant (eg; 300italic)
		$cf_process_title_fsize = $cf_process_title['size']; //Font size
		$cf_process_title_ff = $cf_process_title['face']; // Fallback font

		$cf_process_title_fv = pix_font_variant($cf_process_title_fv); //Seperated font variation
	?>
	.process .title {
		font-family: '<?php echo $cf_process_title_gf; ?>', <?php echo $cf_process_title_ff; ?>; 
		font-size:   <?php echo $cf_process_title_fsize; ?>;       
		font-style:  <?php echo $cf_process_title_fv[0]; ?>;
		font-weight: <?php echo $cf_process_title_fv[1]; ?>;
	}

	
	<?php 
	   /* Process Content */
		$cf_process_content = $data['cf_process_content'];
		
		$cf_process_content_gf = $cf_process_content['g_face']; //Choosen Google webfont
		$cf_process_content_fv = $cf_process_content['style'];  //Google web font variant (eg; 300italic)
		$cf_process_content_fsize = $cf_process_content['size']; //Font size
		$cf_process_content_ff = $cf_process_content['face']; // Fallback font

		$cf_process_content_fv = pix_font_variant($cf_process_content_fv); //Seperated font variation
	?>
	.process .text {        
		font-family: '<?php echo $cf_process_content_gf; ?>', <?php echo $cf_process_content_ff; ?>; 
		font-size:   <?php echo $cf_process_content_fsize; ?>;       
		font-style:  <?php echo $cf_process_content_fv[0]; ?>;
		font-weight: <?php echo $cf_process_content_fv[1]; ?>;
	}

	
	<?php 
	   /* Pie chart */
		$cf_percent_text = $data['cf_percent_text'];
		
		$cf_percent_text_gf = $cf_percent_text['g_face']; //Choosen Google webfont
		$cf_percent_text_fv = $cf_percent_text['style'];  //Google web font variant (eg; 300italic)
		$cf_percent_text_fsize = $cf_percent_text['size']; //Font size
		$cf_percent_text_ff = $cf_percent_text['face']; // Fallback font

		$cf_percent_text_fv = pix_font_variant($cf_percent_text_fv); //Seperated font variation
	?>
	.percent-text{
		font-family: '<?php echo $cf_percent_text_gf; ?>', <?php echo $cf_percent_text_ff; ?>; 
		font-size: <?php echo $cf_percent_text_fsize; ?>;
		font-weight: <?php echo $cf_percent_text_fv[1]; ?>;
	}

	<?php 
	   /* process outside text */
		$cf_percent_outside = $data['cf_percent_outside'];
		
		$cf_percent_outside_gf = $cf_percent_outside['g_face']; //Choosen Google webfont
		$cf_percent_outside_fv = $cf_percent_outside['style'];  //Google web font variant (eg; 300italic)
		$cf_percent_outside_fsize = $cf_percent_outside['size']; //Font size
		$cf_percent_outside_ff = $cf_percent_outside['face']; // Fallback font

		$cf_percent_outside_fv = pix_font_variant($cf_percent_outside_fv); //Seperated font variation
	?>
	.percent, .outside-text{
		font-family: '<?php echo $cf_percent_outside_gf; ?>', <?php echo $cf_percent_outside_ff; ?>; 
		font-size:   <?php echo $cf_percent_outside_fsize; ?>;       
		font-style:  <?php echo $cf_percent_outside_fv[0]; ?>;
		font-weight: <?php echo $cf_percent_outside_fv[1]; ?>;
	}

	
	<?php 
	   /* Form input */
		$cf_txtfield = $data['cf_txtfield'];
		
		$cf_txtfield_gf = $cf_txtfield['g_face']; //Choosen Google webfont
		$cf_txtfield_fv = $cf_txtfield['style'];  //Google web font variant (eg; 300italic)
		$cf_txtfield_fsize = $cf_txtfield['size']; //Font size
		$cf_txtfield_ff = $cf_txtfield['face']; // Fallback font

		$cf_txtfield_fv = pix_font_variant($cf_txtfield_fv); //Seperated font variation
	?>
	.textfield{
		font-family: '<?php echo $cf_txtfield_gf; ?>', <?php echo $cf_txtfield_ff; ?>; 
		font-size:   <?php echo $cf_txtfield_fsize; ?>;       
		font-style:  <?php echo $cf_txtfield_fv[0]; ?>;
		font-weight: <?php echo $cf_txtfield_fv[1]; ?>;
	}
	
	
	<?php 
	   /* Staff Title */
		$cf_staff_title = $data['cf_staff_title'];
		
		$cf_staff_title_gf = $cf_staff_title['g_face']; //Choosen Google webfont
		$cf_staff_title_fv = $cf_staff_title['style'];  //Google web font variant (eg; 300italic)
		$cf_staff_title_fsize = $cf_staff_title['size']; //Font size
		$cf_staff_title_ff = $cf_staff_title['face']; // Fallback font

		$cf_staff_title_fv = pix_font_variant($cf_staff_title_fv); //Seperated font variation
	?>
	.staff-content .title {
		font-family: '<?php echo $cf_staff_title_gf; ?>', <?php echo $cf_staff_title_ff; ?>; 
		font-size:   <?php echo $cf_staff_title_fsize; ?>;       
		font-style:  <?php echo $cf_staff_title_fv[0]; ?>;
		font-weight: <?php echo $cf_staff_title_fv[1]; ?>;
	}
	
	
	<?php 
	   /* Portfolio Filter */
		$cf_filter_normal = $data['cf_filter_normal'];
		
		$cf_filter_normal_gf = $cf_filter_normal['g_face']; //Choosen Google webfont
		$cf_filter_normal_fv = $cf_filter_normal['style'];  //Google web font variant (eg; 300italic)
		$cf_filter_normal_ff = $cf_filter_normal['face']; // Fallback font

		$cf_filter_normal_fv = pix_font_variant($cf_filter_normal_fv); //Seperated font variation
	?>
	#filters.normal li a{   
		font-family: '<?php echo $cf_filter_normal_gf; ?>', <?php echo $cf_filter_normal_ff; ?>;      
		font-style:  <?php echo $cf_filter_normal_fv[0]; ?>;
		font-weight: <?php echo $cf_filter_normal_fv[1]; ?>;
	}

	
	<?php 
	   /* Pricing Table Title */
		$cf_plan_title = $data['cf_plan_title'];
		
		$cf_plan_title_gf = $cf_plan_title['g_face']; //Choosen Google webfont
		$cf_plan_title_fv = $cf_plan_title['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_title_fsize = $cf_plan_title['size']; //Font size
		$cf_plan_title_ff = $cf_plan_title['face']; // Fallback font

		$cf_plan_title_fv = pix_font_variant($cf_plan_title_fv); //Seperated font variation
	?>
	.price-table .plan-title {
		font-family: '<?php echo $cf_plan_title_gf; ?>', <?php echo $cf_plan_title_ff; ?>; 
		font-size:   <?php echo $cf_plan_title_fsize; ?>;       
		font-style:  <?php echo $cf_plan_title_fv[0]; ?>;
		font-weight: <?php echo $cf_plan_title_fv[1]; ?>;
	}

	<?php 
	   /* Price */
		$cf_plan_value = $data['cf_plan_value'];
		
		$cf_plan_value_gf = $cf_plan_value['g_face']; //Choosen Google webfont
		$cf_plan_value_fv = $cf_plan_value['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_value_fsize = $cf_plan_value['size']; //Font size
		$cf_plan_value_ff = $cf_plan_value['face']; // Fallback font

		$cf_plan_value_fv = pix_font_variant($cf_plan_value_fv); //Seperated font variation
	?>
	.price-table .value {
		font-family: '<?php echo $cf_plan_value_gf; ?>', <?php echo $cf_plan_value_ff; ?>; 
		font-size:   <?php echo $cf_plan_value_fsize; ?>;       
		font-style:  <?php echo $cf_plan_value_fv[0]; ?>;
		font-weight: <?php echo $cf_plan_value_fv[1]; ?>;
	}

	<?php 
	   /* Currency */
		$cf_plan_valign = $data['cf_plan_valign'];
		
		$cf_plan_valign_gf = $cf_plan_valign['g_face']; //Choosen Google webfont
		$cf_plan_valign_fv = $cf_plan_valign['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_valign_fsize = $cf_plan_valign['size']; //Font size
		$cf_plan_valign_ff = $cf_plan_valign['face']; // Fallback font

		$cf_plan_valign_fv = pix_font_variant($cf_plan_valign_fv); //Seperated font variation
	?>
	.price-table .value .vAlign {
		font-family: '<?php echo $cf_plan_valign_gf; ?>', <?php echo $cf_plan_valign_ff; ?>; 
		font-size: <?php echo $cf_plan_valign_fsize; ?>;       
		font-style: <?php echo $cf_plan_valign_fv[0]; ?>;
		font-weight: <?php echo $cf_plan_valign_fv[1]; ?>;
	}

	<?php 
	   /* Price Period */
		$cf_plan_month = $data['cf_plan_month'];
		
		$cf_plan_month_gf = $cf_plan_month['g_face']; //Choosen Google webfont
		$cf_plan_month_fv = $cf_plan_month['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_month_fsize = $cf_plan_month['size']; //Font size
		$cf_plan_month_ff = $cf_plan_month['face']; // Fallback font

		$cf_plan_month_fv = pix_font_variant($cf_plan_month_fv); //Seperated font variation
	?>
	.price-table .value small {
		font-family: '<?php echo $cf_plan_month_gf; ?>', <?php echo $cf_plan_month_ff; ?>; 
		font-size: <?php echo $cf_plan_month_fsize; ?>;       
		font-style: <?php echo $cf_plan_month_fv[0]; ?>;
		font-weight: <?php echo $cf_plan_month_fv[1]; ?>;
	}

	<?php 
	   /* Testimonial Content */
		$cf_testimonial_content = $data['cf_testimonial_content'];
		
		$cf_testimonial_content_gf = $cf_testimonial_content['g_face']; //Choosen Google webfont
		$cf_testimonial_content_fv = $cf_testimonial_content['style'];  //Google web font variant (eg; 300italic)
		$cf_testimonial_content_fsize = $cf_testimonial_content['size']; //Font size
		$cf_testimonial_content_ff = $cf_testimonial_content['face']; // Fallback font

		$cf_testimonial_content_fv = pix_font_variant($cf_testimonial_content_fv); //Seperated font variation
	?>    
	.testimonial .content p{
		font-family: '<?php echo $cf_testimonial_content_gf; ?>', <?php echo $cf_testimonial_content_ff; ?>; 
		font-size: <?php echo $cf_testimonial_content_fsize; ?>;       
		font-style: <?php echo $cf_testimonial_content_fv[0]; ?>;
		font-weight: <?php echo $cf_testimonial_content_fv[1]; ?>;
	}
	
	
	<?php 
	   /* Widget Title */
		$cf_widget_title = $data['cf_widget_title'];
		
		$cf_widget_title_gf = $cf_widget_title['g_face']; //Choosen Google webfont
		$cf_widget_title_fv = $cf_widget_title['style'];  //Google web font variant (eg; 300italic)
		$cf_widget_title_fsize = $cf_widget_title['size']; //Font size
		$cf_widget_title_ff = $cf_widget_title['face']; // Fallback font

		$cf_widget_title_fv = pix_font_variant($cf_widget_title_fv); //Seperated font variation
	?>
	.widget .widgettitle{
		font-family: '<?php echo $cf_widget_title_gf; ?>', <?php echo $cf_widget_title_ff; ?>; 
		font-size: <?php echo $cf_widget_title_fsize; ?>;       
		font-style: <?php echo $cf_widget_title_fv[0]; ?>;
		font-weight: <?php echo $cf_widget_title_fv[1]; ?>;
	}

	
	<?php 
	   /* Recent Tweets */
		$cf_twitter = $data['cf_twitter'];
		
		$cf_twitter_gf = $cf_twitter['g_face']; //Choosen Google webfont
		$cf_twitter_fv = $cf_twitter['style'];  //Google web font variant (eg; 300italic)
		$cf_twitter_fsize = $cf_twitter['size']; //Font size
		$cf_twitter_ff = $cf_twitter['face']; // Fallback font

		$cf_twitter_fv = pix_font_variant($cf_twitter_fv); //Seperated font variation
	?>
	.tweets .twitter{
		font-family: '<?php echo $cf_twitter_gf; ?>', <?php echo $cf_twitter_ff; ?>; 
		font-size: <?php echo $cf_twitter_fsize; ?>;       
		font-style: <?php echo $cf_twitter_fv[0]; ?>;
		font-weight: <?php echo $cf_twitter_fv[1]; ?>;
	}

<?php 
	endif;

//Turnoff is custom style switch is 0.  
if($custom_styles == 1):
?>


/* Custom Color*/

<?php if (!empty($data['selection_bg_color']) || !empty($data['selection_text_color'])){?>
::-moz-selection {
<?php echo (!empty ( $data['selection_bg_color'])? 'background:' . $data['selection_bg_color'] : '');?>;
<?php echo (!empty ( $data['selection_text_color'])? 'color:' . $data['selection_text_color'] : '');?>;
}
::selection {
<?php echo (!empty ( $data['selection_bg_color'])? 'background:' . $data['selection_bg_color'] : '');?>;
<?php echo (!empty ( $data['selection_text_color'])? 'color:' . $data['selection_text_color'] : '');?>;
}
<?php } ?>



<?php //Body Customization ?>

<?php
$customize_body_bg = isset($data['customize_body_bg'])? $data['customize_body_bg'] : 0; 
$custom_body_bg_color = isset($data['body_background'])? $data['body_background'] : '';
$custom_body_bg = isset($data['custom_body_bg'])? $data['custom_body_bg'] : '';
$custom_body_bg_pattern = isset($data['custom_body_bg_pattern'])? $data['custom_body_bg_pattern'] : '';
$custom_body_bg_attachment = isset($data['custom_body_bg_attachment'])? $data['custom_body_bg_attachment'] : '';
$custom_body_bg_size = isset($data['custom_body_bg_size'])? $data['custom_body_bg_size'] : '';
$custom_body_bg_repeat = isset($data['custom_body_bg_repeat'])? $data['custom_body_bg_repeat'] : '';

if($custom_body_bg != '' && $custom_body_bg != 'none'){
	$custom_body_bg = str_replace('[site_url]', site_url(), $custom_body_bg);
}
?>

<?php if($custom_styles): ?>

	<?php if($customize_body_bg): ?>

		<?php if($custom_body_bg_color != '' && $custom_body_bg == '' && $custom_body_bg_pattern == ''): ?>

			body {
				background-color: <?php echo $custom_body_bg_color; ?>;        
			}

		<?php endif; ?>

		<?php if($custom_body_bg_color != '' && $custom_body_bg_pattern != '' && $custom_body_bg == '' ): ?>

			body {
				background: <?php echo $custom_body_bg_color; ?> url(<?php echo get_template_directory_uri().'/library/images/'.$custom_body_bg_pattern.'.png'; ?>) repeat;
			}

		<?php endif; ?>

		<?php if($custom_body_bg != '' ): ?>

			body{
				background-image: url(<?php echo $custom_body_bg; ?>);
				background-attachment: <?php echo $custom_body_bg_attachment; ?>;
				background-repeat: <?php echo $custom_body_bg_repeat; ?>;
				background-size: <?php echo $custom_body_bg_size; ?>;
			}

		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>

<?php if (!empty($data['pri_color'])):?>
a, .color, .base-color, .icon-list .pix-icon.color, .top-details a:hover, #lang-list a:hover, #lang-list a.active, .main-nav li a:hover, .main-nav .sub-menu li a:hover, .pix-megamenu .sub-menu li .sub-menu li a:hover, .main-nav .current-menu-item > a, .main-nav .current-menu-parent > a, .main-nav .current-menu-ancestor > a, .main-nav .sub-menu .current-menu-item > a, .main-nav .sub-menu .current-menu-parent > a, .main-nav .sub-menu .current-menu-ancestor > a, .main-nav li:hover > ul li:hover > a.current, .menu-wrap .main-nav .current-menu-item > a, .menu-wrap .main-nav .current-menu-parent > a, .menu-wrap .main-nav .current-menu-ancestor > a, .menu-wrap .main-nav .sub-menu .current-menu-item > a, .menu-wrap .main-nav .sub-menu .current-menu-parent > a, .menu-wrap .main-nav .sub-menu .current-menu-ancestor > a, .menu-wrap .main-nav li:hover > ul li:hover > a.current, .sub-menu-dark .menu-wrap .main-nav .current-menu-item > a, .sub-menu-dark .menu-wrap .main-nav .current-menu-parent > a, .sub-menu-dark .menu-wrap .main-nav .current-menu-ancestor > a, .sub-menu-dark .menu-wrap .main-nav .sub-menu .current-menu-item > a, .sub-menu-dark .menu-wrap .main-nav .sub-menu .current-menu-parent > a, .sub-menu-dark .menu-wrap .main-nav .sub-menu .current-menu-ancestor > a, .sub-menu-dark .menu-wrap .main-nav li:hover > ul li:hover > a.current, .dark .main-nav .current-menu-item > a, .dark .main-nav .current-menu-parent > a, .dark .main-nav .current-menu-ancestor > a, .dark .main-nav .sub-menu .current-menu-item > a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li.current-menu-item > a, .main-nav li a.current, .dark .main-nav .sub-menu .current-menu-parent > a, .dark .main-nav .sub-menu .current-menu-ancestor > a, .dark .main-nav li:hover > ul li:hover > a.current, .menu-wrap .main-nav li a:hover, .search-btn:hover, .top-head-nav li a:hover, .top-head-nav li.current_page_item a, .top-sec-dark .top-details a:hover, .dark .main-nav li a:hover, .dark .search-btn:hover, .btn.color, .btn.color:hover, .btn.btn-simple:hover, .btn.btn-solid.color:hover, .pix_icon_box:hover .icon100.color.bg-none, .pix_icon_box:hover .icon100.square-front.color, .pix_icon_box:hover .small-circle .icon, .pix_icon_box a.btn:hover, .pix_icon_box:hover .icon100, .process .text, .process .background .text:hover .process-style, .pix_tabs.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav li a:hover, .staff-img .staff-icons a:hover, .staff-content a:hover, .jobs, .full-width-icon.style3 .social-icons a, #filters.dropdown li a:hover, .single-portfolio-details .share-top, .single-portfolio-details .port-share-btn a:hover, .single-staff small, .portfolio-hover .portfolio-icon:hover, .portfolio-hover .portfolio-icon.liked, .testimonial .star-icon.color, .blog .timeline a .entry-content.pix-blog-link:hover .icon-box, .blog .normal .pix-blog-link .link-text, .comment-form .form-submit #submit, .tweet-icon, .tweets.style3 .tweet-content a, #headerWidget.col3 .tab-widget #recentcomments li a, #pageFooterCon.col3 .tab-widget #recentcomments li a, #headerWidget.col4 .tab-widget #recentcomments li a, #pageFooterCon.col4 .tab-widget #recentcomments li a, .single-staff .staff-email a, .pix-recent-blog-posts .recent-post-title a:hover, .post .title a:hover, .post .link a:hover, .post .category a:hover, .blog .timeline .entry-content.pix-blog-link:hover .link-text, .pix-blog-link .link-text, .blog .masonry a .entry-content.pix-blog-link:hover .icon-box, .authorDetails .authorName a:hover, .comment-list .fn a:hover, .subNavigation a:hover, .widget li a:hover, .widget.popularpost li a:hover,.widget.recentpost li a:hover, .tab-widget #recentcomments li a, #headerWidget .widget li a:hover,#pageFooterCon .widget li a:hover, .menu-light .main-nav #lang-list a.active, .pix-cart .pix-woo-price, .pix-cart .product_list_widget .quantity, .pix-cart .total .amount, .pix-cart .widget_shopping_cart_content .button:hover, .woocommerce .star-rating:before, .woocommerce-page .star-rating:before, .woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before, .woo-products .staff-img-con:hover .onsale, .woo-products .staff-img-con:hover .price, .woo-product-item .add_to_cart_button:before, .woo-product-item .add_to_cart_button span, .product_list_widget li a:hover, .product_list_widget .quantity,.widget_shopping_cart_content .total, .product_list_widget ins,.product_list_widget .amount, .widget_shopping_cart_content .button, .price_slider_amount .price_label .from,.price_slider_amount .price_label .to, .shop_table .product-name a:hover, .shop_table .button.checkout-button, .summary .woocommerce-review-link:hover, .summary .single_add_to_cart_button, .product_meta span a:hover, .woocommerce-tabs .stars .star-1:after, .woocommerce-tabs .stars .star-1:hover:after,.woocommerce-tabs .stars .star-1.active:after, .woocommerce-tabs .stars .star-2:after, .woocommerce-tabs .stars .star-2:hover:after,.woocommerce-tabs .stars .star-2.active:after, .woocommerce-tabs .stars .star-3:after, .woocommerce-tabs .stars .star-3:hover:after,.woocommerce-tabs .stars .star-3.active:after, .woocommerce-tabs .stars .star-4:after, .woocommerce-tabs .stars .star-5:after, .woocommerce-tabs .stars .star-4:hover:after,.woocommerce-tabs .stars .star-4.active:after, .woocommerce-tabs .stars .star-5:hover:after,.woocommerce-tabs .stars .star-5.active:after, .cart-collaterals h2 .shipping-calculator-button:hover, .testimonials.owl-theme .owl-controls .owl-buttons div, .tweets.owl-theme .owl-controls .owl-buttons div, .light .btn.btn-outline:hover, .light .btn.btn-solid,.light .btn:hover .btn-icon,.light .portfolio-hover a:hover i, .light .portfolio-hover .portfolio-icon.liked .pixicon-heart-2, .light .btn.btn-outline.white:hover .pix-icon, .light .btn.btn-solid.white .pix-icon, .btn.btn-outline.white:hover, .btn.btn-solid.white, .btn.btn-simple.white:hover, .search-results .blog-container .author-name a, .main-side-left .main-nav-left.main-nav li a:hover, .main-side-left .main-nav-left.main-nav li a.current, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children > a.current:after, .main-side-left.sub-menu-dark .main-nav .sub-menu .menu-item a.current, .main-side-left.dark.sub-menu-dark .main-nav .sub-menu .menu-item a.current, .main-nav li:hover > a, .pix-submenu .sub-menu li:hover > a, .dark .main-nav li:hover > a, .dark .main-nav .sub-menu li:hover > a, .sub-menu-dark .main-nav .sub-menu .menu-item .menu-item:hover > a, .dark.sub-menu-dark .main-nav .sub-menu .menu-item .menu-item:hover > a, .menu-light .menu-wrap .main-nav .menu > li.current-menu-item > a, .menu-light .menu-wrap .main-nav .menu > li.current-menu-ancestor > a, .menu-light .menu-wrap .main-nav .menu > li:hover > a, .mobile-menu-nav li a:hover, .mobile-menu-nav .menu-item-has-children > .pix-dropdown-arrow:hover:after, .mobile-menu-nav.menu-dark .menu-item-has-children > .pix-dropdown-arrow:hover:after, .mobile-menu-nav .current-menu-item > a, .mobile-menu-nav .current-menu-parent > a, .mobile-menu-nav .current-menu-ancestor > a, .mobile-menu-nav .sub-menu .current-menu-item > a, .mobile-menu-nav.menu-dark .current-menu-item > a, .mobile-menu-nav.menu-dark .current-menu-parent > a, .mobile-menu-nav.menu-dark .current-menu-ancestor > a, .mobile-menu-nav.menu-dark .sub-menu .current-menu-item > a, .mobile-menu-nav.menu-dark li a:hover, .sub-menu-dark .main-nav .sub-menu .menu-item:hover > a, .dark.sub-menu-dark .main-nav .sub-menu .menu-item:hover > a {
	color: <?php echo $data['pri_color']; ?>;
}

.bg_text, .line, .arrow-style2.owl-theme .owl-controls .owl-buttons div, .pix-icons .icon.solid, #back-top a, .pageTop .pix-item-icon, a.toggleBtn, .main-nav li.pix-megamenu > ul.sub-menu:before, .topSearchForm, .btn.btn-outline.color:hover, .btn.btn-solid.color, .pix_icon_box .color .hover-gradient:before, .no-touch .process .text:hover:after, .process .background .text:after, .pix_accordion.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active.ui-state-active, .pix_accordion.background.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tab, .pix_accordion.background.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_content, .pix_tabs.style2.wpb_content_element.tabs-left .wpb_tabs_nav li.ui-tabs-active a:after, .pix_tabs.style2.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a:after, .pix_tabs.style3.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a, .style3 .border-bg, .staff-content .line, .pix-staffs .style5:hover, .full-width-icon.style2 .social-icons a, #filters.normal li a:hover, #filters.normal li a.selected, .sorter .top-active, .single-port-like:hover, .single-port-like.liked, .single-port-nav a:hover, .single-portfolio-details .portfolio-icons:hover .share-top, .share-top, .portfolio-hover .port-icon-hover, .pix-portfolio-item.style3 .portfolio-content, .pix-portfolio-item.style4 .title, .pix-portfolio-item.style5 .title, .pix-portfolio-item.style6 .title, .price-table.bestPlan .price-header, .price-table.style2.bestPlan .value, .testimonial.style3 .testimonial-author .pix-author-name, .testimonial.style6 .testimonial-author .pix-author-name, .blog-container .author-name, .post .icon-box, .blog .timeline .entry-content.pix-blog-link .icon-box, .blog .timeline a .entry-content.pix-blog-link:hover,.blog .masonry a .entry-content.pix-blog-link:hover, .blog .masonry .post .bg, .subNavigation .current-menu-item:after, .subNavigation.top .current-menu-item:after, .widget .tagcloud a, .searchsubmit, #pageFooterCon .widget.widget_shopping_cart .button.wc-forward:hover, .wpcf7-submit, .vc_progress_bar.pix-progress-bar .vc_single_bar .vc_bar, .testimonial.style6 .content, .blog .masonry .owl-theme .owl-controls .owl-buttons div, .blog .masonry .entry-content.pix-blog-link .bg,.masonry .entry-content.pix-blog-quote .bg, .blog .masonry .entry-content.pix-blog-quote .bg, .pagination li.active, .page-numbers li .current, .pagination a:hover, .comment-form .form-submit #submit:hover, #wp-calendar #today, .line.line-2:after, .menu-header1 #inner-header .pix-item-icon, .menu-header2 #inner-header .pix-item-icon, .menu-header3 #inner-header .pix-item-icon, .pix-cart-icon, .pix-cart .widget_shopping_cart_content .button, .woocommerce-result-count, .woo-product-item .staff-content .line, .onsale, .woo-product-item .price, .widget_shopping_cart_content .button.wc-forward:hover, .price_slider, .ui-slider-handle, .shop_table .product-remove a, .button:hover, .shop_table .button.checkout-button:hover, .woocommerce-tabs ul.tabs li.active a:after, .owl-theme .owl-controls .owl-buttons div:hover, .owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span, .flex-control-nav.flex-control-paging li a.flex-active, .flex-control-nav.flex-control-paging li a:hover, .testimonials.owl-theme .owl-controls .owl-buttons div:hover, .tweets.owl-theme .owl-controls .owl-buttons div:hover,.open-playlist,.wp-playlist-tracks, div.tp-leftarrow.tparrows.default, div.tp-rightarrow.tparrows.default,.mejs-audio .mejs-controls .mejs-time-rail .mejs-time-current,.mejs-audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,.mejs-video .mejs-controls .mejs-time-rail .mejs-time-current,.mejs-video .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current, .pix-weather-wrap, .solid-color-bg .main-nav .menu > li.current-menu-item, .solid-color-bg .main-nav .menu > li.current-menu-parent, .solid-color-bg .main-nav .menu > li.current-menu-ancestor, .single-dot-nav a:after, .single-dot-nav a span, .background-nav .main-nav .menu > li.current-menu-ancestor > a, .background-nav .main-nav .menu > li.current-menu-item > a, .background-nav.background-nav-round .main-nav .menu > li.current-menu-item > a, .background-nav.background-nav-round .main-nav .menu > li.current-menu-ancestor > a, .nav-double-border .main-nav ul.menu > li > a:after, .nav-double-border .main-nav ul.menu > li > a:before, .nav-border .main-nav ul.menu > li > a:after {
  background: <?php echo $data['pri_color']; ?>;
  color: #fff;
}

blockquote, .pix_icon_box:hover .circle, .pix_icon_box:hover .square:after, .pix_icon_box:hover .double-circle, .pix_icon_box:hover .double-circle:after, .pix_icon_box:hover .double-square:before, .pix_icon_box:hover .double-square:after, .pix_icon_box:hover .square-front:before, .pix_icon_box:hover .square-front:after, .pix_accordion.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active.ui-state-active, .pix_tabs.style3.wpb_content_element .wpb_tabs_nav li.ui-tabs-active, .price-table.bestPlan, .pix-icons .icon.outline, #back-top a, .btn.color:hover, .btn.btn-outline.color, .btn.btn-outline.color:hover, .btn.btn-solid.color, .circle.color, .square.color:after, .double-circle.color, .double-circle.color:after, .double-square.color:after, .double-square.color:before, .square-front.color:before, .square-front.color:after, .full-width-icon.style3 .social-icons a, #filters.normal li a, .single-port-like, .single-port-nav a, .single-portfolio-details .share-top, .blog .timeline .entry-content.pix-blog-link,.blog .masonry .entry-content.pix-blog-link, .pagination a, .comment-form .form-submit #submit, .tweets.center.style2 .tweet-icon, .tweets.center.style3 .tweet-icon, #pageFooterCon .widget.widget_shopping_cart .button.wc-forward:hover, .wpcf7-submit, .pix-chart.style3.style7 .border-top, .style3.style7 .border-bg, .pix-chart.style3.style8 .border-top, .blog .timeline a .entry-content.pix-blog-link:hover .icon-box, .blog .masonry a .entry-content.pix-blog-link:hover .round, .searchform .s:focus, .box-small:before, .woo-products .staff-img-con:hover .price, .woo-product-item .btn.btn-outline.color:hover, .widget_shopping_cart_content .button, .widget_shopping_cart_content .button.wc-forward:hover, .button:hover, .shop_table .button.checkout-button, .shop_table .button.checkout-button:hover, .summary .price, .summary .single_add_to_cart_button, .cart-collaterals .order-total, .checkout .shop_table tfoot .order-total, .owl-theme .owl-controls .owl-page span, .counter.border, .pix-recent-blog-posts .blog-icon, .blog .normal .icon-box, .single-blog .icon-box, .light .owl-theme .owl-controls .owl-page.active span, .flex-control-nav.flex-control-paging li a, .testimonials.owl-theme .owl-controls .owl-buttons div, .testimonials.owl-theme .owl-controls .owl-buttons div:hover, .tweets.owl-theme .owl-controls .owl-buttons div, .tweets.owl-theme .owl-controls .owl-buttons div:hover, .tweets.style2 .tweet-icon, .tweets.style3 .tweet-icon, .single-dot-nav a:after {
  border-color: <?php echo $data['pri_color']; ?>;
}

.bg_text:after, .pix_tabs.style3.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a:before, .testimonial.style3 .testimonial-author .pix-author-name:after, .testimonial.style6 .testimonial-author .pix-author-name:after, .testimonial.style6 .content:after, .onsale:after, .drive-nav .main-nav .menu > li.current-menu-ancestor:before, .drive-nav .main-nav .menu > li.current-menu-item:before {
  border-top-color: <?php echo $data['pri_color']; ?>;
}

#headerWidgetCon, .arrow, .pix_tabs.style3.wpb_content_element.tabs-bottom .wpb_tabs_nav li.ui-tabs-active a:before, .single-staff small:after, .author-details-content, .widget #recentcomments a:hover, .widget.widget_rss a:hover, .woo-product-item .price:before{
  border-bottom-color: <?php echo $data['pri_color']; ?>;
}

.callOut.background.border, .pix_tabs.style3.wpb_content_element.tabs-left .wpb_tabs_nav li.ui-tabs-active a:before, .title-right-border.alignRight, .title-right-border.alignCenter, a.toggleBtn, .single-dot-nav a span:after {
  border-left-color: <?php echo $data['pri_color']; ?>;
}

.pix_tabs.style3.wpb_content_element.tabs-left.tabs-right .wpb_tabs_nav li.ui-tabs-active a:before, .title-right-border, .title-right-border.alignCenter, .blockquote-reverse, blockquote.pull-right{
  border-right-color: <?php echo $data['pri_color']; ?>;
}

.no-touch .process .text:hover, .process .background .text {
  box-shadow: 0 0 0 2px <?php echo $data['pri_color']; ?>;
}

.staff-img:hover .staff-icons, .style2:hover .staff-img .staff-icons {
  background: rgba(<?php echo hex2rgb($data['pri_color']); ?>, 0.8);  
}
.portfolio-hover:hover, .style1 .portfolio-hover .portfolio-link{
  background: rgba(<?php echo hex2rgb($data['pri_color']); ?>, 0.85); 
}
.pix-recent-blog-posts .blog-img .icon-center, .pix_icon_box .image .icon-center, .blog-img .lightbox.popup-gallery {
  background: rgba(<?php echo hex2rgb($data['pri_color']); ?>, 0.9);
}

<?php endif;?>

<?php if (!empty($data['link_color'])):?>
	a{
		color: <?php echo $data['link_color']; ?>;
	}
<?php endif;?>

<?php if (!empty($data['link_hover_color'])):?>
	a:hover{
		color: <?php echo $data['link_hover_color']; ?>;
	}
<?php endif;?>

<?php if (!empty($data['header_text_color'])):?>
	#headerWidget.pageFooterCon{
		color: <?php echo $data['header_text_color']; ?>;
	}
<?php endif;?>

<?php if (!empty($data['header_widget_title_color'])):?>
	#headerWidget .widget .widgettitle{
		color: <?php echo $data['header_widget_title_color']; ?>;
	}
<?php endif;?>

<?php if (!empty($data['header_text_color'])):?>
	#headerWidget.pageFooterCon,#headerWidget .textwidget, #headerWidget.pageFooterCon,#headerWidget thead{
		color: <?php echo $data['header_text_color']; ?>;
	}
<?php endif;?>

<?php if (!empty($data['header_link_color'])):?>
	#headerWidget .widget li a{
		color: <?php echo $data['header_link_color']; ?>;
	}
<?php endif;?>

<?php if (!empty($data['header_link_hover_color'])):?>
	#headerWidget .widget li a:hover{
		color: <?php echo $data['header_link_hover_color']; ?>;
	}
<?php endif;?>

<?php if (!empty($data['highlight_color'])):?>
	.highlight{
		color: <?php echo $data['highlight_color'] . '!important'; ?>;
	}
<?php endif;?>



<?php endif; //Turnoff is custom style switch is 0. ?>

<?php if($custom_header_styles == 1) { ?>

	<?php if (!empty($data['top_header_background_color']) || !empty($data['top_header_color'])):?>
		.pageTopCon{
		<?php if(!empty($data['top_header_background_color'])){ ?>
			background: <?php echo $data['top_header_background_color']; ?>;
		<?php
		}
		if(!empty($data['top_header_color'])){ ?>
			color: <?php echo $data['top_header_color']; ?>;
		<?php } ?>

		}
	<?php endif;?>

	<?php if (!empty($data['top_header_link_color'])):?>
		.header-wrap .pageTopCon a, .header .pageTopCon .top-details a, .pageTop .pix-cart-icon{
			color: <?php echo $data['top_header_link_color']; ?>;
		}
		.pageTop .searchsubmit{
			background-color: <?php echo $data['top_header_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['top_header_link_hover_color'])):?>
		.header-wrap .pageTopCon a:hover, .header .pageTopCon .top-details a:hover{
			color: <?php echo $data['top_header_link_hover_color']; ?>;
		}
		.pageTop .searchsubmit:hover, .pageTop .pix-item-icon{
			background-color: <?php echo $data['top_header_link_hover_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['main_header_background_color'])):?>
		.header-wrap, .dark .header, .header-wrap .header-con.stuck, .main-side-left .left-main-menu{
			background: <?php echo $data['main_header_background_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['main_header_color'])):?>
		.header-wrap{
			color: <?php echo $data['main_header_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['main_header_link_color'])):?>
		.header-wrap a, .header .top-details a{
			color: <?php echo $data['main_header_link_color']; ?>;
		}
		.searchsubmit, .header .pix-cart-icon{
			background-color: <?php echo $data['main_header_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['main_header_link_hover_color'])):?>
		.header-wrap a:hover, .header .top-details a:hover{
			color: <?php echo $data['main_header_link_hover_color']; ?>;
		}
		.searchsubmit:hover{
			background-color: <?php echo $data['main_header_link_hover_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['menu_background_color'])):?>
		.menu-wrap, .menu-light .menu-wrap, .dark .menu-wrap, .dark .menu-light .menu-wrap{
			background: <?php echo $data['menu_background_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['menu_link_color'])):?>
		.main-nav li a, .dark .main-nav li a, .menu-wrap .main-nav li a, .menu-light .menu-wrap .main-nav li a, .main-side-left .main-nav-left.main-nav li a, .main-nav .current-menu-ancestor > a, .dark .main-nav .current-menu-ancestor > a{
			color: <?php echo $data['menu_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['menu_link_hover_color'])):?>
		.main-nav li a:hover, .main-nav .sub-menu li a:hover, .menu-wrap .main-nav li a:hover, .main-side-left .main-nav li a:hover, .main-side-left .main-nav-left.main-nav li a:hover .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-nav .current-menu-item > a, .main-nav .menu > li.current-menu-item > a, .main-nav .menu > li.current-menu-ancestor > a, .main-nav li:hover > a, .dark .main-nav li:hover > a, .main-nav .sub-menu .current-menu-item > a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li.current-menu-item > a, .pix-megamenu .sub-menu li .sub-menu li a:hover, .pix-submenu .sub-menu li:hover > a, .dark .main-nav li:hover > a, .dark .main-nav .sub-menu li:hover > a{
			color: <?php echo $data['menu_link_hover_color']; ?>;
		}
		.nav-border .main-nav ul.menu > li > a:after, .nav-double-border .main-nav > ul.menu > li > a:before, .nav-double-border .main-nav > ul.menu > li > a:after, .background-nav .main-nav .menu > li.current-menu-ancestor > a, .background-nav.background-nav-round .main-nav .menu > li.current-menu-ancestor > a, .background-nav .main-nav .menu > li.current-menu-item > a, .background-nav.background-nav-round .main-nav .menu > li.current-menu-item > a, .solid-color-bg .main-nav .menu > li.current-menu-item, .solid-color-bg .main-nav .menu > li.current-menu-parent, .solid-color-bg .main-nav .menu > li.current-menu-ancestor{
			background-color: <?php echo $data['menu_link_hover_color']; ?>;
		}
		.drive-nav .main-nav .menu > li.current-menu-ancestor:before, .drive-nav .main-nav .menu > li.current-menu-item:before{
			border-top-color: <?php echo $data['menu_link_hover_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['sub_menu_background_color']) || !empty($data['sub_menu_border_color'])):?>
		.main-nav .sub-menu{
		<?php if(!empty($data['sub_menu_background_color'])){ ?>
			background: <?php echo $data['sub_menu_background_color']; ?>;
			box-shadow: none;
		<?php
		}
		if(!empty($data['sub_menu_border_color'])){ ?>
			border: 1px solid <?php echo $data['sub_menu_border_color']; ?>;
		<?php } ?>
		}
		.main-nav li.pix-megamenu > ul.sub-menu:before{
		<?php if(!empty($data['sub_menu_border_color'])){ ?>
			border: 1px solid <?php echo $data['sub_menu_border_color']; ?>;
		<?php } ?>
		}
		.main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children > a.current:after{
		<?php if(!empty($data['sub_menu_background_color'])){ ?>
			background: <?php echo $data['sub_menu_background_color']; ?>;
			box-shadow: none;
			<?php } ?>
		}
	<?php endif;?>

	<?php if (!empty($data['mega_menu_title_color'])):?>
		.main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li > a:hover{
			color: <?php echo $data['mega_menu_title_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['sub_menu_link_color'])):?>
		.header-wrap .pix-submenu .sub-menu li a, .menu-wrap .main-nav .sub-menu li a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a, .main-side-left .main-nav-left.main-nav li ul li a{
			color: <?php echo $data['sub_menu_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['sub_menu_link_hover_color'])):?>
		.header-wrap .pix-submenu .sub-menu li a:hover, .menu-wrap .main-nav .sub-menu li a:hover, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a:hover, .main-nav .pix-submenu:hover > ul li:hover > a.current, .main-nav .pix-submenu li a.current, .main-side-left .main-nav-left.main-nav li li a:hover, .main-side-left .main-nav-left.main-nav li li a.current, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children > a.current:after, .main-side-left.sub-menu-dark .main-nav .sub-menu .menu-item a.current, .main-side-left.dark.sub-menu-dark .main-nav .sub-menu .menu-item a.current {
			color: <?php echo $data['sub_menu_link_hover_color']; ?>;
		}
	<?php endif;?>

<?php } ?>

<?php
//Get Theme Option Values

$f_customization = isset($data['f_customization'])? $data['f_customization'] : '';
$custom_f_bg_pattern = isset($data['custom_f_bg_pattern'])? $data['custom_f_bg_pattern'] : '';
$custom_f_bg_color = isset($data['custom_f_bg_color'])? $data['custom_f_bg_color'] : '';
$custom_f_bg = isset($data['custom_f_bg'])? $data['custom_f_bg'] : '';
$custom_f_bg_attachment = isset($data['custom_f_bg_attachment'])? $data['custom_f_bg_attachment'] : '';
$custom_f_bg_size = isset($data['custom_f_bg_size'])? $data['custom_f_bg_size'] : '';
$custom_f_bg_repeat = isset($data['custom_f_bg_repeat'])? $data['custom_f_bg_repeat'] : '';

$custom_f_title_color = isset($data['custom_f_title_color'])? $data['custom_f_title_color'] : '';
$custom_f_txt_color = isset($data['custom_f_txt_color'])? $data['custom_f_txt_color'] : '';
$custom_f_link_color = isset($data['custom_f_link_color'])? $data['custom_f_link_color'] : '';
$custom_f_link_hover_color = isset($data['custom_f_link_hover_color'])? $data['custom_f_link_hover_color'] : '';
$custom_fc_bg_color = isset($data['custom_fc_bg_color'])? $data['custom_fc_bg_color'] : '';
$custom_fc_txt_color = isset($data['custom_fc_txt_color'])? $data['custom_fc_txt_color'] : '';
$custom_fc_link_color = isset($data['custom_fc_link_color'])? $data['custom_fc_link_color'] : '';
$custom_fc_link_hover_color = isset($data['custom_fc_link_hover_color'])? $data['custom_fc_link_hover_color'] : '';


//Change Background URL

if($custom_f_bg){
	$custom_f_bg = str_replace('[site_url]', site_url(), $custom_f_bg);
}

?>

<?php //Footer Customization ?>

<?php if($f_customization): ?>

	<?php if($custom_f_bg_color != '' && $custom_f_bg == '' && $custom_f_bg_pattern == ''): ?>

		.pageFooterCon {
			background-color: <?php echo $custom_f_bg_color; ?>;        
		}

	<?php endif; ?>

	<?php if($custom_f_bg_color != '' && $custom_f_bg_pattern != '' && $custom_f_bg == '' ): ?>

		.pageFooterCon {
			background: <?php echo $custom_f_bg_color; ?> url(<?php echo get_template_directory_uri().'/library/images/'.$custom_f_bg_pattern.'.png'; ?>) repeat;
		}

	<?php endif; ?>

	<?php if($custom_f_bg != '' ): ?>

		.pageFooterCon , .footer-bottom{
				background: none;
		}

		footer{
			background-image: url(<?php echo $custom_f_bg; ?>);
			background-attachment: <?php echo $custom_f_bg_attachment; ?>;
			background-repeat: <?php echo $custom_f_bg_repeat; ?>;
			background-size: <?php echo $custom_f_bg_size; ?>;
		}

	<?php endif; ?>



	<?php if($custom_f_title_color != '' ): ?>

		#pageFooterCon .widget .widgettitle {        
			color: <?php echo $custom_f_title_color ?>;
		}

	<?php endif; ?>


	<?php if($custom_f_txt_color != '' ): ?>

		.pageFooterCon, #pageFooterCon .textwidget,#pageFooterCon thead{        
			color: <?php echo $custom_f_txt_color ?>;
		}

	<?php endif; ?>


	<?php if($custom_f_link_color != '' ): ?>

		#pageFooterCon .widget li a,.pageFooterCon #wp-calendar a{        
			color: <?php echo $custom_f_link_color ?>;
		}
		.widget.widget_rss a{
			border-bottom-color: <?php echo $custom_f_link_color ?>;
		}
		.searchsubmit,#wp-calendar #today{
			  background-color: <?php echo $custom_f_link_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_f_link_hover_color != '' ): ?>

		#pageFooterCon .widget li a:hover, .pageFooterCon #wp-calendar td a:hover{        
			color: <?php echo $custom_f_link_hover_color ?>;
		}        
		.widget.widget_rss a:hover{
			border-bottom-color: <?php echo $custom_f_link_hover_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_fc_bg_color != '' ): ?>

		.footer-bottom{        
		   background-color: <?php echo $custom_fc_bg_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_fc_txt_color != '' ): ?>

		.copyright p{        
			color: <?php echo $custom_fc_txt_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_fc_link_color != '' ): ?>

		.copyright p a{        
			color: <?php echo $custom_fc_link_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_fc_link_hover_color != '' ): ?>

		.copyright p a:hover{        
			color: <?php echo $custom_fc_link_hover_color ?>;
		}

	<?php endif; ?>

<?php endif; ?>

<?php if($pix_ajax): ?>
	.pix-ajaxify #wrapper.page-animate-ajax{
		opacity: 0;
	}
	.pix-ajaxify #wrapper.page-animate-ajax.animated{
		opacity: 1;
	}
	<?php if($pix_ajax_style == 'style1' ): ?>

	#loader {
		width: 100px;
		height: 40px;
		margin: 30px -50px -20px;
		position: fixed;
		left: 50%;
		top: 50%;
	    z-index: 99;
	}
	#loader div {
		width: 20px;
		height: 20px;
		background: <?php echo $pix_theme_pri_color; ?>;
		border-radius: 50%;
		position: absolute; 
	}
	#d1 { 
		-webkit-animation: animate 2s linear infinite;
		-moz-animation: animate 2s linear infinite;
		-ms-animation: animate 2s linear infinite;
		animation: animate 2s linear infinite;
	}
	#d2 { 
		-webkit-animation: animate 2s linear infinite -.4s; 
		-moz-animation: animate 2s linear infinite -.4s; 
		-ms-animation: animate 2s linear infinite -.4s; 
		animation: animate 2s linear infinite -.4s; 
	}
	#d3 {
		-webkit-animation: animate 2s linear infinite -.8s; 
		-moz-animation: animate 2s linear infinite -.8s; 
		-ms-animation: animate 2s linear infinite -.8s; 
		animation: animate 2s linear infinite -.8s; 
	}
	#d4 { 
		-webkit-animation: animate 2s linear infinite -1.2s; 
		-moz-animation: animate 2s linear infinite -1.2s; 
		-ms-animation: animate 2s linear infinite -1.2s; 
		animation: animate 2s linear infinite -1.2s; 
	} 
	#d5 { 
		-webkit-animation: animate 2s linear infinite -1.6s; 
		-moz-animation: animate 2s linear infinite -1.6s; 
		-ms-animation: animate 2s linear infinite -1.6s; 
		animation: animate 2s linear infinite -1.6s; 
	}
	@-webkit-keyframes animate {
		0% { left: 100px; top:0}
		80% { left: 0; top:0;}
		85% { left: 0; top: -20px; width: 20px; height: 20px;}
		90% { width: 40px; height: 15px; }
		95% { left: 100px; top: -20px; width: 20px; height: 20px;}
		100% { left: 100px; top:0; }
	}
	@-moz-keyframes animate {
		0% { left: 100px; top:0}
		80% { left: 0; top:0;}
		85% { left: 0; top: -20px; width: 20px; height: 20px;}
		90% { width: 40px; height: 15px; }
		95% { left: 100px; top: -20px; width: 20px; height: 20px;}
		100% { left: 100px; top:0; }
	}
	@-ms-keyframes animate {
		0% { left: 100px; top:0}
		80% { left: 0; top:0;}
		85% { left: 0; top: -20px; width: 20px; height: 20px;}
		90% { width: 40px; height: 15px; }
		95% { left: 100px; top: -20px; width: 20px; height: 20px;}
		100% { left: 100px; top:0; }
	}
	@keyframes animate {
		0% { left: 100px; top:0}
		80% { left: 0; top:0;}
		85% { left: 0; top: -20px; width: 20px; height: 20px;}
		90% { width: 40px; height: 15px; }
		95% { left: 100px; top: -20px; width: 20px; height: 20px;}
		100% { left: 100px; top:0; }
	}

	<?php elseif($pix_ajax_style == 'style2' ): ?>

	#container {
		margin: 25px -60px -45px;
		width: 120px;
		height: 90px;
		position: fixed;
		top: 50%;
		left: 50%;
	    z-index: 99;
	}
	#dot {
		background: <?php echo $pix_theme_pri_color; ?>;
		border-radius: 50%; 
		width: 30px;
		height: 30px;
		position: absolute;
		bottom: 30px;
		left: 27px;
		-webkit-transform-origin: center bottom;
		-moz-transform-origin: center bottom;
		-ms-transform-origin: center bottom;
		transform-origin: center bottom;
		-webkit-animation: dot .6s ease-in-out infinite;
		-moz-animation: dot .6s ease-in-out infinite;
		-ms-animation: dot .6s ease-in-out infinite;
		animation: dot .6s ease-in-out infinite;
	}
	@-webkit-keyframes dot {
		0% { -webkit-transform: scale(1,.7); transform: scale(1,.7) }
		20% { -webkit-transform: scale(.7,1.2); transform: scale(.7,1.2) }
		40% { -webkit-transform: scale(1,1); transform: scale(1,1)} 
		50% { bottom: 100px; } 
		46% { -webkit-transform: scale(1,1); transform: scale(1,1)} 
		80% { -webkit-transform: scale(.7,1.2); transform: scale(.7,1.2) } 
		90% { -webkit-transform: scale(.7,1.2); transform: scale(.7,1.2) } 
		100% { -webkit-transform: scale(1,.7); transform: scale(1,.7) }
	}
	@-moz-keyframes dot {
		0% { -moz-transform: scale(1,.7); transform: scale(1,.7) }
		20% { -moz-transform: scale(.7,1.2); transform: scale(.7,1.2) }
		40% { -moz-transform: scale(1,1); transform: scale(1,1)} 
		50% { bottom: 100px; } 
		46% { -moz-transform: scale(1,1); transform: scale(1,1)} 
		80% { -moz-transform: scale(.7,1.2); transform: scale(.7,1.2) } 
		90% { -moz-transform: scale(.7,1.2); transform: scale(.7,1.2) } 
		100% { -moz-transform: scale(1,.7); transform: scale(1,.7) }
	}
	@-ms-keyframes dot {
		0% { -ms-transform: scale(1,.7); transform: scale(1,.7) }
		20% { -ms-transform: scale(.7,1.2); transform: scale(.7,1.2) }
		40% { -ms-transform: scale(1,1); transform: scale(1,1)} 
		50% { bottom: 100px; } 
		46% { -ms-transform: scale(1,1); transform: scale(1,1)} 
		80% { -ms-transform: scale(.7,1.2); transform: scale(.7,1.2) } 
		90% { -ms-transform: scale(.7,1.2); transform: scale(.7,1.2) } 
		100% { -ms-transform: scale(1,.7); transform: scale(1,.7) }
	}
	@keyframes dot {
		0% { transform: scale(1,.7) }
		20% { transform: scale(.7,1.2) }
		40% { transform: scale(1,1) } 
		50% { bottom: 100px; } 
		46% { transform: scale(1,1) } 
		80% { transform: scale(.7,1.2) } 
		90% { transform: scale(.7,1.2) } 
		100% { transform: scale(1,.7) }
	}
	.step {
		position: absolute;
		width: 30px;
		height: 30px;
		border-top: 2px solid <?php echo $pix_theme_pri_color; ?>;
		top: 0;
		right:0;
	}
	@-webkit-keyframes anim { 
		0% { 
			opacity: 0;
			top: 0; 
			right: 0; 
		}
		50% { opacity: 1; }
		100% { 
			top: 90px; 
			right: 90px;
			opacity: 0;
		}
	}
	@-moz-keyframes anim { 
		0% { 
			opacity: 0;
			top: 0; 
			right: 0; 
		}
		50% { opacity: 1; }
		100% { 
			top: 90px; 
			right: 90px;
			opacity: 0;
		}
	}
	@-ms-keyframes anim { 
		0% { 
			opacity: 0;
			top: 0; 
			right: 0; 
		}
		50% { opacity: 1; }
		100% { 
			top: 90px; 
			right: 90px;
			opacity: 0;
		}
	}
	@keyframes anim { 
		0% { 
			opacity: 0;
			top: 0; 
			right: 0; 
		}
		50% { opacity: 1; }
		100% { 
			top: 90px; 
			right: 90px;
			opacity: 0;
		}
	}
	#s1 { 
		-webkit-animation: anim 1.8s linear infinite;
		-moz-animation: anim 1.8s linear infinite;
		-ms-animation: anim 1.8s linear infinite;
		animation: anim 1.8s linear infinite;
	}
	#s2 { 
		-webkit-animation: anim 1.8s linear infinite -.6s;
		-moz-animation: anim 1.8s linear infinite -.6s;
		-ms-animation: anim 1.8s linear infinite -.6s;
		animation: anim 1.8s linear infinite -.6s;
	 }
	#s3 { 
		-webkit-animation: anim 1.8s linear infinite -1.2s;
		-moz-animation: anim 1.8s linear infinite -1.2s;
		-ms-animation: anim 1.8s linear infinite -1.2s;
		animation: anim 1.8s linear infinite -1.2s;
	}

	<?php elseif($pix_ajax_style == 'style3' ): ?>

	.jet_loading_text {
	  position: absolute;
	  font-family: Open Sans;
	  font-weight: 600;
	  font-size: 12px;;
	  text-transform: uppercase;
	  left: 50%;
	  top: 58%;
	  margin-left: -20px;
	  margin-top: 20px;
	}
	.jet-wrap{
		position: fixed;
		left: 50%;
		top: 50%;
	    z-index: 99;
	}
	.jet {
	  position: absolute;
	  top: 50%;
	  margin-left: -50px;
	  left: 50%;
	  -webkit-animation: speeder .4s linear infinite;
	  -moz-animation: speeder .4s linear infinite;
	  -ms-animation: speeder .4s linear infinite;
	  animation: speeder .4s linear infinite;
	}

	.jet > span {
	  height: 5px;
	  width: 35px;
	  background: #000;
	  position: absolute;
	  top: -19px;
	  left: 60px;
	  border-radius: 2px 10px 1px 0;
	}

	.base span {
		position: absolute;
		width: 0;
		height: 0;
		border-top: 6px solid transparent;
		border-right: 100px solid #000;
		border-bottom: 6px solid transparent;
	}

	.base span:after {
	  content: "";
	  height: 22px;
	  width: 22px;
	  border-radius: 50%;
	  background: #000;
	  position: absolute;
	  right: -110px;
	  top: -16px;
	}

	.base span:before {
	  content: "";
	  position: absolute;
	  width: 0;
	  height: 0;
	  border-top: 0 solid transparent;
	  border-right: 55px solid #000;
	  border-bottom: 16px solid transparent;
	  top: -16px;
	  right: -98px;
	}

	.face {
	  position: absolute;
	  height: 12px;
	  width: 20px;
	  background: #000;
	  -webkit-border-radius: 20px 20px 0 0;
	  -moz-border-radius: 20px 20px 0 0;
	  -ms-border-radius: 20px 20px 0 0;
	  border-radius: 20px 20px 0 0;
	  -webkit-transform: rotate(-40deg);
	  -moz-transform: rotate(-40deg);
	  -ms-transform: rotate(-40deg);
	  transform: rotate(-40deg);
	  right: -125px;
	  top: -15px;
	}

	.face:after {
	  content: "";
	  height: 12px;
	  width: 12px;
	  background: #000;
	  right: 4px;
	  top: 7px;
	  position: absolute;
	  -webkit-transform: rotate(40deg);
	  -moz-transform: rotate(40deg);
	  -ms-transform: rotate(40deg);
	  transform: rotate(40deg);
	  -webkit-transform-origin: 50% 50%;
	  -moz-transform-origin: 50% 50%;
	  -ms-transform-origin: 50% 50%;
	  transform-origin: 50% 50%;
	  border-radius: 0 0 0 2px;
	}

	.jet > span > span:nth-child(1),
	.jet > span > span:nth-child(2),
	.jet > span > span:nth-child(3),
	.jet > span > span:nth-child(4){
	  width: 30px;
	  height: 1px;
	  background: #000;
	  position: absolute;
	  -webkit-animation: fazer1 .2s linear infinite;
	  -moz-animation: fazer1 .2s linear infinite;
	  -ms-animation: fazer1 .2s linear infinite;
	  animation: fazer1 .2s linear infinite;
	}

	.jet > span > span:nth-child(2) {
	  top: 3px;
	   -webkit-animation: fazer2 .4s linear infinite;
	   -moz-animation: fazer2 .4s linear infinite;
	   -ms-animation: fazer2 .4s linear infinite;
	   animation: fazer2 .4s linear infinite;
	}

	.jet > span > span:nth-child(3) {
	  top: 1px;
	   -webkit-animation: fazer3 .4s linear infinite;
	   -moz-animation: fazer3 .4s linear infinite;
	   -ms-animation: fazer3 .4s linear infinite;
	   animation: fazer3 .4s linear infinite;
	  -webkit-animation-delay: -1s;
	  -moz-animation-delay: -1s;
	  -ms-animation-delay: -1s;
	  animation-delay: -1s;
	}

	.jet > span > span:nth-child(4) {
	  top: 4px;
	   -webkit-animation: fazer4 1s linear infinite;
	   -moz-animation: fazer4 1s linear infinite;
	   -ms-animation: fazer4 1s linear infinite;
	   animation: fazer4 1s linear infinite;
	  -webkit-animation-delay: -1s;
	  -moz-animation-delay: -1s;
	  -ms-animation-delay: -1s;
	  animation-delay: -1s;
	}

	@-webkit-keyframes fazer1 {0% {left: 0;} 100% {left: -80px;opacity: 0;}}
	@-moz-keyframes fazer1 {0% {left: 0;} 100% {left: -80px;opacity: 0;}}
	@-ms-keyframes fazer1 {0% {left: 0;} 100% {left: -80px;opacity: 0;}}
	@keyframes fazer1 {0% {left: 0;} 100% {left: -80px;opacity: 0;}}

	@-webkit-keyframes fazer2 {0% {left: 0;} 100% {left: -100px;opacity: 0;}}
	@-moz-keyframes fazer2 {0% {left: 0;} 100% {left: -100px;opacity: 0;}}
	@-ms-keyframes fazer2 {0% {left: 0;} 100% {left: -100px;opacity: 0;}}
	@keyframes fazer2 {0% {left: 0;} 100% {left: -100px;opacity: 0;}}

	@-webkit-keyframes fazer3 {0% {left: 0;} 100% {left: -50px;opacity: 0;}}
	@-moz-keyframes fazer3 {0% {left: 0;} 100% {left: -50px;opacity: 0;}}
	@-ms-keyframes fazer3 {0% {left: 0;} 100% {left: -50px;opacity: 0;}}
	@keyframes fazer3 {0% {left: 0;} 100% {left: -50px;opacity: 0;}}

	@-webkit-keyframes fazer4 {0% {left: 0;} 100% {left: -150px;opacity: 0;}}
	@-moz-keyframes fazer4 {0% {left: 0;} 100% {left: -150px;opacity: 0;}}
	@-ms-keyframes fazer4 {0% {left: 0;} 100% {left: -150px;opacity: 0;}}
	@keyframes fazer4 {0% {left: 0;} 100% {left: -150px;opacity: 0;}}

	@-webkit-keyframes speeder {
		0% { -webkit-transform: translate(2px, 1px) rotate(0deg); transform: translate(2px, 1px) rotate(0deg); }
		10% { -webkit-transform: translate(-1px, -3px) rotate(-1deg); transform: translate(-1px, -3px) rotate(-1deg); }
		20% { -webkit-transform: translate(-2px, 0px) rotate(1deg); transform: translate(-2px, 0px) rotate(1deg); }
		30% { -webkit-transform: translate(1px, 2px) rotate(0deg); transform: translate(1px, 2px) rotate(0deg); }
		40% { -webkit-transform: translate(1px, -1px) rotate(1deg); transform: translate(1px, -1px) rotate(1deg); }
		50% { -webkit-transform: translate(-1px, 3px) rotate(-1deg); transform: translate(-1px, 3px) rotate(-1deg); }
		60% { -webkit-transform: translate(-1px, 1px) rotate(0deg); transform: translate(-1px, 1px) rotate(0deg); }
		70% { -webkit-transform: translate(3px, 1px) rotate(-1deg); transform: translate(3px, 1px) rotate(-1deg); }
		80% { -webkit-transform: translate(-2px, -1px) rotate(1deg); transform: translate(-2px, -1px) rotate(1deg); }
		90% { -webkit-transform: translate(2px, 1px) rotate(0deg); transform: translate(2px, 1px) rotate(0deg); }
		100% { -webkit-transform: translate(1px, -2px) rotate(-1deg); transform: translate(1px, -2px) rotate(-1deg); }
	}
	@-moz-keyframes speeder {
		0% { -moz-transform: translate(2px, 1px) rotate(0deg); transform: translate(2px, 1px) rotate(0deg); }
		10% { -moz-transform: translate(-1px, -3px) rotate(-1deg); transform: translate(-1px, -3px) rotate(-1deg); }
		20% { -moz-transform: translate(-2px, 0px) rotate(1deg); transform: translate(-2px, 0px) rotate(1deg); }
		30% { -moz-transform: translate(1px, 2px) rotate(0deg); transform: translate(1px, 2px) rotate(0deg); }
		40% { -moz-transform: translate(1px, -1px) rotate(1deg); transform: translate(1px, -1px) rotate(1deg); }
		50% { -moz-transform: translate(-1px, 3px) rotate(-1deg); transform: translate(-1px, 3px) rotate(-1deg); }
		60% { -moz-transform: translate(-1px, 1px) rotate(0deg); transform: translate(-1px, 1px) rotate(0deg); }
		70% { -moz-transform: translate(3px, 1px) rotate(-1deg); transform: translate(3px, 1px) rotate(-1deg); }
		80% { -moz-transform: translate(-2px, -1px) rotate(1deg); transform: translate(-2px, -1px) rotate(1deg); }
		90% { -moz-transform: translate(2px, 1px) rotate(0deg); transform: translate(2px, 1px) rotate(0deg); }
		100% { -moz-transform: translate(1px, -2px) rotate(-1deg); transform: translate(1px, -2px) rotate(-1deg); }
	}
	@-ms-keyframes speeder {
		0% { -ms-transform: translate(2px, 1px) rotate(0deg); transform: translate(2px, 1px) rotate(0deg); }
		10% { -ms-transform: translate(-1px, -3px) rotate(-1deg); transform: translate(-1px, -3px) rotate(-1deg); }
		20% { -ms-transform: translate(-2px, 0px) rotate(1deg); transform: translate(-2px, 0px) rotate(1deg); }
		30% { -ms-transform: translate(1px, 2px) rotate(0deg); transform: translate(1px, 2px) rotate(0deg); }
		40% { -ms-transform: translate(1px, -1px) rotate(1deg); transform: translate(1px, -1px) rotate(1deg); }
		50% { -ms-transform: translate(-1px, 3px) rotate(-1deg); transform: translate(-1px, 3px) rotate(-1deg); }
		60% { -ms-transform: translate(-1px, 1px) rotate(0deg); transform: translate(-1px, 1px) rotate(0deg); }
		70% { -ms-transform: translate(3px, 1px) rotate(-1deg); transform: translate(3px, 1px) rotate(-1deg); }
		80% { -ms-transform: translate(-2px, -1px) rotate(1deg); transform: translate(-2px, -1px) rotate(1deg); }
		90% { -ms-transform: translate(2px, 1px) rotate(0deg); transform: translate(2px, 1px) rotate(0deg); }
		100% { -ms-transform: translate(1px, -2px) rotate(-1deg); transform: translate(1px, -2px) rotate(-1deg); }
	}
	@keyframes speeder {
		0% { transform: translate(2px, 1px) rotate(0deg); }
		10% { transform: translate(-1px, -3px) rotate(-1deg); }
		20% { transform: translate(-2px, 0px) rotate(1deg); }
		30% { transform: translate(1px, 2px) rotate(0deg); }
		40% { transform: translate(1px, -1px) rotate(1deg); }
		50% { transform: translate(-1px, 3px) rotate(-1deg); }
		60% { transform: translate(-1px, 1px) rotate(0deg); }
		70% { transform: translate(3px, 1px) rotate(-1deg); }
		80% { transform: translate(-2px, -1px) rotate(1deg); }
		90% { transform: translate(2px, 1px) rotate(0deg); }
		100% { transform: translate(1px, -2px) rotate(-1deg); }
	}

	.longfazers {
	  position: absolute;
	  width: 100%;
	  height: 100%;
	}

	.longfazers span {
	  position: absolute;
	  height: 2px;
	  width: 20%;
	  background: #000;
	}

	.longfazers span:nth-child(1) {
	  top: 20%;
	  -webkit-animation: lf .6s linear infinite;
	  -moz-animation: lf .6s linear infinite;
	  -ms-animation: lf .6s linear infinite;
	  animation: lf .6s linear infinite;
	  -webkit-animation-delay: -5s;
	  -moz-animation-delay: -5s;
	  -ms-animation-delay: -5s;
	  animation-delay: -5s;
	}

	.longfazers span:nth-child(2) {
	  top: 40%;
	  -webkit-animation: lf2 .8s linear infinite;
	  -moz-animation: lf2 .8s linear infinite;
	  -ms-animation: lf2 .8s linear infinite;
	  animation: lf2 .8s linear infinite; 
	  -webkit-animation-delay: -1s;
	  -moz-animation-delay: -1s;
	  -ms-animation-delay: -1s;
	  animation-delay: -1s;
	}

	.longfazers span:nth-child(3) {
	  top: 60%;
	  -webkit-animation: lf3 .6s linear infinite;
	  -moz-animation: lf3 .6s linear infinite;
	  -ms-animation: lf3 .6s linear infinite;
	  animation: lf3 .6s linear infinite;  
	}

	.longfazers span:nth-child(4) {
	  top: 80%;
	  -webkit-animation: lf4 .5s linear infinite; 
	  -moz-animation: lf4 .5s linear infinite; 
	  -ms-animation: lf4 .5s linear infinite; 
	  animation: lf4 .5s linear infinite; 
	  -webkit-animation-delay: -3s;
	  -moz-animation-delay: -3s;
	  -ms-animation-delay: -3s;
	  animation-delay: -3s;
	}

	@-webkit-keyframes lf {
		0% {
			left: 200%;
		} 
		100% {
			left: -200%;opacity: 0;
		}
	}
	@-moz-keyframes lf {
		0% {
			left: 200%;
		} 
		100% {
			left: -200%;opacity: 0;
		}
	}
	@-ms-keyframes lf {
		0% {
			left: 200%;
		} 
		100% {
			left: -200%;opacity: 0;
		}
	}
	@keyframes lf {
		0% {
			left: 200%;
		} 
		100% {
			left: -200%;opacity: 0;
		}
	}

	@-webkit-keyframes lf2 {
		0% {
			left: 200%;
		} 
		100% {
			left: -200%;opacity: 0;
		}
	}
	@-moz-keyframes lf2 {
		0% {
			left: 200%;
		} 
		100% {
			left: -200%;opacity: 0;
		}
	}
	@-ms-keyframes lf2 {
		0% {
			left: 200%;
		} 
		100% {
			left: -200%;opacity: 0;
		}
	}
	@keyframes lf2 {
		0% {
			left: 200%;
		} 
		100% {
			left: -200%;opacity: 0;
		}
	}

	@-webkit-keyframes lf3 {
		0% {
			left: 200%;
		} 
		100% {
			left: -100%;opacity: 0;
		}
	}
	@-moz-keyframes lf3 {
		0% {
			left: 200%;
		} 
		100% {
			left: -100%;opacity: 0;
		}
	}
	@-ms-keyframes lf3 {
		0% {
			left: 200%;
		} 
		100% {
			left: -100%;opacity: 0;
		}
	}
	@keyframes lf3 {
		0% {
			left: 200%;
		} 
		100% {
			left: -100%;opacity: 0;
		}
	}

	@-webkit-keyframes lf4 {
		0% {
			left: 200%;
		} 
		100% {
			left: -100%;opacity: 0;
		}
	}
	@-moz-keyframes lf4 {
		0% {
			left: 200%;
		} 
		100% {
			left: -100%;opacity: 0;
		}
	}
	@-ms-keyframes lf4 {
		0% {
			left: 200%;
		} 
		100% {
			left: -100%;opacity: 0;
		}
	}
	@keyframes lf4 {
		0% {
			left: 200%;
		} 
		100% {
			left: -100%;opacity: 0;
		}
	}

	<?php elseif($pix_ajax_style == 'style4' ): ?>

	#loader {
		-webkit-animation: loader 5s cubic-bezier(.8,0,.2,1) infinite;
		-moz-animation: loader 5s cubic-bezier(.8,0,.2,1) infinite;
		-ms-animation: loader 5s cubic-bezier(.8,0,.2,1) infinite;
		animation: loader 5s cubic-bezier(.8,0,.2,1) infinite;
		height: 40px;
		width: 41px;
		position: fixed;
		top:calc(50% - 20px);
		left:calc(50% - 20px);
	    z-index: 99;
	}
	@-webkit-keyframes loader {
		90% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
		100% { -webkit-transform: rotate(180deg); transform: rotate(180deg); }
	}
	@-moz-keyframes loader {
		90% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
		100% { -moz-transform: rotate(180deg); transform: rotate(180deg); }
	}
	@-ms-keyframes loader {
		90% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
		100% { -ms-transform: rotate(180deg); transform: rotate(180deg); }
	}
	@keyframes loader {
		90% { transform: rotate(0deg); }
		100% { transform: rotate(180deg); }
	}
	#top {
		-webkit-animation: top 5s linear infinite;
		-moz-animation: top 5s linear infinite;
		-ms-animation: top 5s linear infinite;
		animation: top 5s linear infinite;
		border-top: 20px solid <?php echo $pix_theme_pri_color; ?>;
		border-right: 20px solid transparent;
		border-left: 20px solid transparent;
		height: 0px;
		width: 1px;
		-webkit-transform-origin: 50% 100%;
		-moz-transform-origin: 50% 100%;
		-ms-transform-origin: 50% 100%;
		transform-origin: 50% 100%;
	}
	@-webkit-keyframes top {
		90% { -webkit-transform: scale(0); transform: scale(0); }
		100% { -webkit-transform: scale(0); transform: scale(0); }
	}
	@-moz-keyframes top {
		90% { -moz-transform: scale(0); transform: scale(0); }
		100% { -moz-transform: scale(0); transform: scale(0); }
	}
	@-ms-keyframes top {
		90% { -ms-transform: scale(0); transform: scale(0); }
		100% { -ms-transform: scale(0); transform: scale(0); }
	}
	@keyframes top {
		90% { transform: scale(0); }
		100% { transform: scale(0); }
	}
	#bottom {
		-webkit-animation: bottom 5s linear infinite;
		-moz-animation: bottom 5s linear infinite;
		-ms-animation: bottom 5s linear infinite;
		animation: bottom 5s linear infinite;
		border-right: 20px solid transparent;
		border-bottom: 20px solid <?php echo $pix_theme_pri_color; ?>;
		border-left: 20px solid transparent;
		height: 0px;
		width: 1px;
		-webkit-transform: scale(0);
		-moz-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);
		-webkit-transform-origin: 50% 100%;
		-moz-transform-origin: 50% 100%;
		-ms-transform-origin: 50% 100%;
		transform-origin: 50% 100%;
	}
	@-webkit-keyframes bottom {
		10% { -webkit-transform: scale(0); transform: scale(0); }
		90% { -webkit-transform: scale(1); transform: scale(1); }
		100% { -webkit-transform: scale(1); transform: scale(1); }
	}
	@-moz-keyframes bottom {
		10% { -moz-transform: scale(0); transform: scale(0); }
		90% { -moz-transform: scale(1); transform: scale(1); }
		100% { -moz-transform: scale(1); transform: scale(1); }
	}
	@-ms-keyframes bottom {
		10% { -ms-transform: scale(0); transform: scale(0); }
		90% { -ms-transform: scale(1); transform: scale(1); }
		100% { -ms-transform: scale(1); transform: scale(1); }
	}
	@keyframes bottom {
		10% { transform: scale(0); }
		90% { transform: scale(1); }
		100% { transform: scale(1); }
	}
	#line {
		-webkit-animation: line 5s linear infinite;
		-moz-animation: line 5s linear infinite;
		-ms-animation: line 5s linear infinite;
		animation: line 5s linear infinite;
		border-left: 1px dotted <?php echo $pix_theme_pri_color; ?>;
		height: 0px;
		width: 0px;
		position: absolute;
		top: 20px;
		left: 20px;
	}
	@-webkit-keyframes line {
		10% { height: 20px; }
		100% { height: 20px; }
	}
	@-moz-keyframes line {
		10% { height: 20px; }
		100% { height: 20px; }
	}
	@-ms-keyframes line {
		10% { height: 20px; }
		100% { height: 20px; }
	}
	@keyframes line {
		10% { height: 20px; }
		100% { height: 20px; }
	}

	<?php elseif($pix_ajax_style == 'style5' ): ?>

	#container {
		width: 70px;
		height: 35px;
		overflow: hidden;
		position: fixed;
		top: calc(50% - 17px);
		left: calc(50% - 35px);
		z-index: 99;
	}
	#loader {
		width: 70px;
		height: 70px;
		border-style: solid;
		border-top-color: <?php echo $pix_theme_pri_color; ?>;
		border-right-color: <?php echo $pix_theme_pri_color; ?>;
		border-left-color: transparent;
		border-bottom-color: transparent;
		border-radius: 50%;
		box-sizing: border-box;
		-webkit-animation: rotate 3s ease-in-out infinite;
		-moz-animation: rotate 3s ease-in-out infinite;
		-ms-animation: rotate 3s ease-in-out infinite;
		animation: rotate 3s ease-in-out infinite;
		-webkit-transform: rotate(-200deg);
		-moz-transform: rotate(-200deg);
		-ms-transform: rotate(-200deg);
		transform: rotate(-200deg);
	}
	@-webkit-keyframes rotate {
		0% { border-width: 10px; }
		25% { border-width: 3px; }
		50% { 
		-webkit-transform: rotate(115deg);
		transform: rotate(115deg);
		border-width: 10px;
		}
		75% { border-width: 3px;}
		100% { border-width: 10px;}
	}
	@-moz-keyframes rotate {
		0% { border-width: 10px; }
		25% { border-width: 3px; }
		50% { 
		-moz-transform: rotate(115deg);
		transform: rotate(115deg); 
		border-width: 10px;
		}
		75% { border-width: 3px;}
		100% { border-width: 10px;}
	}
	@-ms-keyframes rotate {
		0% { border-width: 10px; }
		25% { border-width: 3px; }
		50% { 
		-ms-transform: rotate(115deg);
		transform: rotate(115deg); 
		border-width: 10px;
		}
		75% { border-width: 3px;}
		100% { border-width: 10px;}
	}
	@keyframes rotate {
		0% { border-width: 10px; }
		25% { border-width: 3px; }
		50% { 
		transform: rotate(115deg); 
		border-width: 10px;
		}
		75% { border-width: 3px;}
		100% { border-width: 10px;}
	}

	<?php elseif($pix_ajax_style == 'style6' ): ?>

	.loader {
		position: fixed;
		left: 50%;
		top: 50%;
		margin-left: -20px;
		margin-top: -20px;
		display: inline-block;
		width: 40px;
		height: 40px;
		border: 2px solid <?php echo $pix_theme_pri_color; ?>;
		border-radius: 50%;
		-webkit-animation: spin 0.75s infinite linear;
		-moz-animation: spin 0.75s infinite linear;
		-ms-animation: spin 0.75s infinite linear;
		animation: spin 0.75s infinite linear;
	    z-index: 99;
	}
	.loader::before,
	.loader::after {
		left: -2px;
		top: -2px;
		display: none;
		position: absolute;
		content: '';
		width: inherit;
		height: inherit;
		border: inherit;
		border-radius: inherit;
	}
	.loader-1 {
	 	border-top-color: transparent;
	}
	.loader-1::after {
		display: block;
		left: -2px;
		top: -2px;
		border: inherit;
		-webkit-transform: rotate(65deg);
		-moz-transform: rotate(65deg);
		-ms-transform: rotate(65deg);
		transform: rotate(65deg);
	}
	@-webkit-keyframes spin {
		from {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		to {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
	@-moz-keyframes spin {
		from {
			-moz-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		to {
			-moz-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
	@-ms-keyframes spin {
		from {
			-ms-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		to {
			-ms-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
	@keyframes spin {
		from {
			transform: rotate(0deg);
		}
		to {
			transform: rotate(360deg);
		}
	}

	<?php elseif($pix_ajax_style == 'style7' ): ?>

	.loader {
	    width: 50px;
	    height: 50px;
	    border-radius: 50%;
	    display: inline-block;
	    position: fixed;
	    vertical-align: middle;
	    top: 50%;
	    left: 50%;
	    margin-left: -25px;
	    margin-top: -25px;
	    background: <?php echo $pix_theme_pri_color; ?>;
	    z-index: 99;
	}
	.loader,
	.loader:before,
	.loader:after {
	    -webkit-animation: 1s infinite ease-in-out;
	    -moz-animation: 1s infinite ease-in-out;
	    -ms-animation: 1s infinite ease-in-out;
	    animation: 1s infinite ease-in-out;
	}
	.loader:before,
	.loader:after {
	    width: 100%; 
	    height: 100%;
	    border-radius: 50%;
	    position: absolute;
	    top: 0;
	    left: 0;
	}

	.loader-1 { 
		-webkit-animation-name: loader1; 
		-moz-animation-name: loader1; 
		-ms-animation-name: loader1; 
		animation-name: loader1; 
	}
	@-webkit-keyframes loader1 {
	    from { -webkit-transform: scale(0); transform: scale(0); opacity: 1; }
	    to   { -webkit-transform: scale(1); transform: scale(1); opacity: 0; }
	}
	@-moz-keyframes loader1 {
	    from { -moz-transform: scale(0); transform: scale(0); opacity: 1; }
	    to   { -moz-transform: scale(1); transform: scale(1); opacity: 0; }
	}
	@-ms-keyframes loader1 {
	    from { -ms-transform: scale(0); transform: scale(0); opacity: 1; }
	    to   { -ms-transform: scale(1); transform: scale(1); opacity: 0; }
	}
	@keyframes loader1 {
	    from { transform: scale(0); opacity: 1; }
	    to   { transform: scale(1); opacity: 0; }
	}

	<?php elseif($pix_ajax_style == 'style8' ): ?>

	.loader {
	    width: 50px;
	    height: 50px;
	    border-radius: 50%;
	    display: inline-block;
	    position: fixed;
	    vertical-align: middle;
	    top: 50%;
	    left: 50%;
	    margin-left: -25px;
	    margin-top: -25px;
	    z-index: 99;
	}
	.loader,
	.loader:before,
	.loader:after {
	    -webkit-animation: 1s infinite ease-in-out;
	    -moz-animation: 1s infinite ease-in-out;
	    -ms-animation: 1s infinite ease-in-out;
	    animation: 1s infinite ease-in-out;
	}
	.loader:before,
	.loader:after {
	    width: 100%; 
	    height: 100%;
	    border-radius: 50%;
	    position: absolute;
	    top: 0;
	    left: 0;
	}
	.loader-2:before,
	.loader-2:after {
	    content: '';
	}
	.loader-2:before {
	    border: 1px solid <?php echo $pix_theme_pri_color; ?>;
	    top: -1px;
	    left: -1px;
	    opacity: 0;
	    -webkit-animation-name: loader2-1;
	    -moz-animation-name: loader2-1;
	    -ms-animation-name: loader2-1;
	    animation-name: loader2-1;
	    box-sizing: initial;
	}
	@-webkit-keyframes loader2-1 {
		0% { -webkit-transform: scale(1); transform: scale(1); opacity: 1; }
		50% { -webkit-transform: scale(1.3); transform: scale(1.3); opacity: 0; }
		100% { -webkit-transform: scale(1.3); transform: scale(1.3); opacity: 0; }
	}
	@-moz-keyframes loader2-1 {
		0% { -moz-transform: scale(1); transform: scale(1); opacity: 1; }
		50% { -moz-transform: scale(1.3); transform: scale(1.3); opacity: 0; }
		100% { -moz-transform: scale(1.3); transform: scale(1.3); opacity: 0; }
	}
	@-ms-keyframes loader2-1 {
		0% { -ms-transform: scale(1); transform: scale(1); opacity: 1; }
		50% { -ms-transform: scale(1.3); transform: scale(1.3); opacity: 0; }
		100% { -ms-transform: scale(1.3); transform: scale(1.3); opacity: 0; }
	}
	@keyframes loader2-1 {
		0% { transform: scale(1); opacity: 1; }
		50% { transform: scale(1.3); opacity: 0; }
		100% { transform: scale(1.3); opacity: 0; }
	}

	.loader-2:after {
		background-color: <?php echo $pix_theme_pri_color; ?>;
		-webkit-animation-name: loader2-2;
		-moz-animation-name: loader2-2;
		-ms-animation-name: loader2-2;
		animation-name: loader2-2;
	}
	@-webkit-keyframes loader2-2 {
		0% { -webkit-transform: scale(1); transform: scale(1); }
		50% { -webkit-transform: scale(0.7); transform: scale(0.7); }
		100% { -webkit-transform: scale(1); transform: scale(1); }
	}
	@-moz-keyframes loader2-2 {
		0% { -moz-transform: scale(1); transform: scale(1); }
		50% { -moz-transform: scale(0.7); transform: scale(0.7); }
		100% { -moz-transform: scale(1); transform: scale(1); }
	}
	@-ms-keyframes loader2-2 {
		0% { -ms-transform: scale(1); transform: scale(1); }
		50% { -ms-transform: scale(0.7); transform: scale(0.7); }
		100% { -ms-transform: scale(1); transform: scale(1); }
	}
	@keyframes loader2-2 {
		0% { transform: scale(1); }
		50% { transform: scale(0.7); }
		100% { transform: scale(1); }
	}

	<?php elseif($pix_ajax_style == 'style9' ): ?>

	.loader {
	    width: 50px;
	    height: 50px;
	    border-radius: 50%;
	    display: inline-block;
	    position: fixed;
	    vertical-align: middle;
	    top: 50%;
	    left: 50%;
	    margin-left: -25px;
	    margin-top: -25px;
	    background: <?php echo $pix_theme_pri_color; ?>;
	    z-index: 99;
	}
	.loader,
	.loader:before,
	.loader:after {
	    -webkit-animation: 1s infinite ease-in-out;
	    -moz-animation: 1s infinite ease-in-out;
	    -ms-animation: 1s infinite ease-in-out;
	    animation: 1s infinite ease-in-out;
	}
	.loader:before,
	.loader:after {
	    width: 100%; 
	    height: 100%;
	    border-radius: 50%;
	    position: absolute;
	    top: 0;
	    left: 0;
	}
	.loader-3:before {
		content: '';
		border: 10px solid white;
		top: -10px;
		left: -10px;
		-webkit-animation-name: loader3;
		-moz-animation-name: loader3;
		-ms-animation-name: loader3;
		animation-name: loader3;
		box-sizing: initial;
	}

	@-webkit-keyframes loader3 {
		0% { -webkit-transform: scale(0); transform: scale(0); }
		100% { -webkit-transform: scale(1); transform: scale(1); }
	}
	@-moz-keyframes loader3 {
		0% { -moz-transform: scale(0); transform: scale(0); }
		100% { -moz-transform: scale(1); transform: scale(1); }
	}
	@-ms-keyframes loader3 {
		0% { -ms-transform: scale(0); transform: scale(0); }
		100% { -ms-transform: scale(1); transform: scale(1); }
	}
	@keyframes loader3 {
		0% { transform: scale(0); }
		100% { transform: scale(1); }
	}

	<?php elseif($pix_ajax_style == 'style10' ): ?>
	.loader{
		position: fixed;
		z-index: 99;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: 50%;
		margin-top: -30px;
		width: 60px;
		height: 60px;
		list-style: none;
	}

	@-webkit-keyframes 'loadbars' {
		0%{
			height: 10px;
			margin-top: 25px;
		}
		50%{
			height:50px;
			margin-top: 0px;
		}
		100%{
			height: 10px;
			margin-top: 25px;
		}
	}
	@-moz-keyframes 'loadbars' {
		0%{
			height: 10px;
			margin-top: 25px;
		}
		50%{
			height:50px;
			margin-top: 0px;
		}
		100%{
			height: 10px;
			margin-top: 25px;
		}
	}
	@-ms-keyframes 'loadbars' {
		0%{
			height: 10px;
			margin-top: 25px;
		}
		50%{
			height:50px;
			margin-top: 0px;
		}
		100%{
			height: 10px;
			margin-top: 25px;
		}
	}
	@keyframes 'loadbars' {
		0%{
			height: 10px;
			margin-top: 25px;
		}
		50%{
			height:50px;
			margin-top: 0px;
		}
		100%{
			height: 10px;
			margin-top: 25px;
		}
	}

	.loader li{
		background-color: <?php echo $pix_theme_pri_color; ?>;
		width: 10px;
		height: 10px;
		float: right;
		margin-right: 5px;
		box-shadow: 0px 100px 20px rgba(0,0,0,0.2);
	}
	.loader li:first-child{
		-webkit-animation: loadbars 0.6s cubic-bezier(0.645,0.045,0.355,1) infinite 0s;
		-moz-animation: loadbars 0.6s cubic-bezier(0.645,0.045,0.355,1) infinite 0s;
		-ms-animation: loadbars 0.6s cubic-bezier(0.645,0.045,0.355,1) infinite 0s;
	}
	.loader li:nth-child(2){
		-webkit-animation: loadbars 0.6s ease-in-out infinite -0.2s;
		-moz-animation: loadbars 0.6s ease-in-out infinite -0.2s;
		-ms-animation: loadbars 0.6s ease-in-out infinite -0.2s;
	}
	.loader li:nth-child(3){
		-webkit-animation: loadbars 0.6s ease-in-out infinite -0.4s;
		-moz-animation: loadbars 0.6s ease-in-out infinite -0.4s;
		-ms-animation: loadbars 0.6s ease-in-out infinite -0.4s;
	}

	<?php endif; 

endif; ?>


<?php if($pix_preloader == '1' ): ?>
.pix-preloader-enabled #wrapper{
	opacity: 0;
}
.pix-preloader-enabled .animated{
	opacity: 1;
}
#preloader-con {
	position: fixed;
	width: 100%;
	height: 100%;
	z-index: 999;
}
.preloader {
	position: fixed;
	left: 50%;
	top: 50%;
	margin-left: -20px;
	margin-top: -20px;
	display: inline-block;
	width: 40px;
	height: 40px;
	border: 2px solid <?php echo $pix_theme_pri_color; ?>;
	border-radius: 50%;
	-webkit-animation: spin 0.75s infinite linear;
	-moz-animation: spin 0.75s infinite linear;
	-ms-animation: spin 0.75s infinite linear;
	animation: spin 0.75s infinite linear;
}
.preloader::before,
.preloader::after {
	left: -2px;
	top: -2px;
	display: none;
	position: absolute;
	content: '';
	width: inherit;
	height: inherit;
	border: inherit;
	border-radius: inherit;
}
.preloader-1 {
 	border-top-color: transparent;
}
.preloader-1::after {
	display: block;
	left: -2px;
	top: -2px;
	border: inherit;
	-webkit-transform: rotate(65deg);
	-moz-transform: rotate(65deg);
	-ms-transform: rotate(65deg);
	transform: rotate(65deg);
}
@-webkit-keyframes spin {
	from {
		-webkit-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	to {
		-webkit-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@-moz-keyframes spin {
	from {
		-moz-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	to {
		-moz-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@-ms-keyframes spin {
	from {
		-ms-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	to {
		-ms-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@keyframes spin {
	from {
		transform: rotate(0deg);
	}
	to {
		transform: rotate(360deg);
	}
}
<?php endif; ?>