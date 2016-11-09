<?php
global $smof_data;

$page_options = get_post_meta(get_the_id(),'electrify_page_options');
if( !empty($page_options)){
	extract($page_options[0]);
}

$boxed_content = isset($smof_data['boxed_content'])? $smof_data['boxed_content'] : 0;

?>

		</div> <!-- End of Wrapper -->
	</div> <!-- End of Main Wrap -->

<?php
	$copyright_text = isset($smof_data['copyright_text']) ? $smof_data['copyright_text'] : '<p>&copy; 2012 [blog-link], All Rights Reserved.</p>';

	$footer_fixed = isset($smof_data['footer_fixed'])? $smof_data['footer_fixed'] : 1;

	$f_widget = isset($smof_data['f_widget'])? $smof_data['f_widget'] : 1;
	$f_widget_col = isset($smof_data['f_widget_col'])? $smof_data['f_widget_col'] : 'col3';

	$f_select_sidebar = isset($smof_data['f_select_sidebar'])? $smof_data['f_select_sidebar'] : '';
	$f_small = isset($smof_data['f_small'])? $smof_data['f_small'] : 1;
	$f_copyright_t = isset($smof_data['f_copyright_t'])? $smof_data['f_copyright_t'] : '';
	$sidebar_name = isset($smof_data['f_select_sidebar'])? $smof_data['f_select_sidebar'] : '0';

	$flyin_sidebar = isset($smof_data['flyin_sidebar'])? $smof_data['flyin_sidebar'] : 0;
	$flyin_sidebar_widgets = isset($smof_data['flyin_select_sidebar'])? $smof_data['flyin_select_sidebar'] : '';

	$show_dot_nav = isset($show_dot_nav) ? $show_dot_nav : 'hide';


	$f_copyright_t = do_shortcode($f_copyright_t);

	if(empty($f_copyright_t)){
		$f_copyright_t= do_shortcode('<p>&copy; 2012 [blog-link], All Rights Reserved.</p>');	
	}

	$header = isset($smof_data['header_option']) ? $smof_data['header_option'] : 'header1';

	if($header == 'left-header' || $header == 'right-header'){ ?>
		</div>
	<?php } ?>

		<!-- Footer -->
		<?php if($sidebar_name == '0') { $sidebar_name = 'footer-widgets'; } ?>
	<?php
	$page_slug =  get_page_template_slug(); 

	if ( $page_slug != 'page-template/page-blank.php' ) {
	
	$footer_fixed_class = '';
	if($footer_fixed == 1){
		$footer_fixed_class = ' class="footer-fixed"';
	}
	?>

		<footer<?php echo $footer_fixed_class ?>>
		<?php if($f_widget){ ?>
		<div id="pageFooterCon" class="pageFooterCon <?php echo $f_widget_col; ?> clearfix">
		
			
			<div id="pageFooter" class="container">
				<!-- widgets -->
				<?php
					if ( is_active_sidebar( $sidebar_name ) ) :
						dynamic_sidebar( $sidebar_name ); 
					else :
				?>

					<!-- This content shows up if there are no widgets defined in the backend. -->

					<div>
					<p><?php _e("ТОВ \"Приватний навчальний заклад\"Міжнародний Інститут Сучасних Знань\"", "pixel8es");  ?></p>
					</div>

				<?php endif; ?>                 
				<!-- widgets -->
			</div> <!-- pageFooter -->
			
		   
		</div>
		 <?php } 
			
			if($f_small){ ?>
			<!-- Copyright -->
			<div class="footer-bottom">
				<div class="container">
					<div class="copyright row">
					<div class="col-md-12"><?php echo $f_copyright_t; ?></div>
					</div>
				</div>
			</div>
			
			<?php } ?>
		</footer>
	<?php } 

		if ( $header == 'left-header' || $header == 'right-header' ){ 
			echo '</div>';
		} 

	?>

		<?php 
		if($boxed_content == 1){
			echo '</div>';
		}
		?>

		</div>

		<?php if($show_dot_nav == 'show'){
			echo '<div id="dot-nav" class="dot-nav"><ul>'. $GLOBALS['pix_dot_nav'] .'</ul></div>';
		} ?>

		<?php if($flyin_sidebar){ ?>
		<div class="pix-flyin-content">
			<div class="pix-flyin-widgets">

				<?php if ( is_active_sidebar( $flyin_sidebar_widgets ) ) : ?>

					<?php dynamic_sidebar( $flyin_sidebar_widgets ); ?>

				<?php else : ?>

					<!-- This content shows up if there are no widgets defined in the backend. -->

					<div>
						<p><?php _e("ТОВ \"Приватний навчальний заклад\"Міжнародний Інститут Сучасних Знань\"", "pixel8es");  ?></p>
					</div>

				<?php endif; ?>

			</div>
		</div>
		<?php } ?>

		
					
		<?php $tracking_code = isset($smof_data['tracking_code']) ? $smof_data['tracking_code'] : '';
		if(!empty($tracking_code)) {
			
			echo stripslashes($tracking_code);
			
		}
		?>
				
		<!-- all js scripts are loaded in library/electrify.php -->
		
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
