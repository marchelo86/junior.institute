<?php
/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Pix_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {}

	function end_lvl( &$output, $depth = 0, $args = array() ) {}
	
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	   
		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		ob_start();
		$item_id = esc_attr( $item->ID );
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);

		$original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = get_the_title( $original_object->ID );
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);

		$title = $item->title;

		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( __( '%s (Invalid)', 'pixel8es' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( __('%s (Pending)', 'pixel8es'), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

		$submenu_text = '';
		if ( 0 == $depth )
			$submenu_text = 'style="display: none;"';

		?>
		<li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
					<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e( 'sub item', 'pixel8es' ); ?></span></span>
					<span class="item-controls">
						<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
						<span class="item-order hide-if-js">
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-up-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up'); ?>">&#8593;</abbr></a>
							|
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-down-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down'); ?>">&#8595;</abbr></a>
						</span>
						<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item'); ?>" href="<?php
							echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
						?>"><?php _e( 'Edit Menu Item', 'pixel8es' ); ?></a>
					</span>
				</dt>
			</dl>

			<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
				<?php if( 'custom' == $item->type ) : ?>
					<p class="field-url description description-wide">
						<label for="edit-menu-item-url-<?php echo $item_id; ?>">
							<?php _e( 'URL', 'pixel8es' ); ?><br />
							<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
						</label>
					</p>
				<?php endif; ?>
				<p class="description description-thin">
					<label for="edit-menu-item-title-<?php echo $item_id; ?>">
						<?php _e( 'Navigation Label', 'pixel8es' ); ?><br />
						<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
					</label>
				</p>
				<p class="description description-thin">
					<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
						<?php _e( 'Title Attribute', 'pixel8es' ); ?><br />
						<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
					</label>
				</p>
				<p class="field-link-target description">
					<label for="edit-menu-item-target-<?php echo $item_id; ?>">
						<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
						<?php _e( 'Open link in a new window/tab', 'pixel8es' ); ?>
					</label>
				</p>
				<p class="field-css-classes description description-thin">
					<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
						<?php _e( 'CSS Classes (optional)', 'pixel8es' ); ?><br />
						<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
					</label>
				</p>
				<p class="field-xfn description description-thin">
					<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
						<?php _e( 'Link Relationship (XFN)', 'pixel8es' ); ?><br />
						<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
					</label>
				</p>
				<p class="field-description description description-wide">
					<label for="edit-menu-item-description-<?php echo $item_id; ?>">
						<?php _e( 'Description', 'pixel8es' ); ?><br />
						<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
						<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'pixel8es'); ?></span>
					</label>
				</p>

				<?php
	            /* New fields insertion starts here */
	            //Insert Icon Field
	            ?>      
	            <p class="pix-field-custom description description-wide"><br class="clearboth"> 
	                <label for="edit-menu-item-subtitle-<?php echo $item_id; ?>">
	                    <?php _e( 'Insert Menu Icon', 'pixel8es' ); ?><br />
	                    <input type="hidden" id="edit-menu-item-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom edit-menu-item-icon" name="menu-item-icon[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->icon ); ?>" />
	                    <span class="pix-inserted-icon"></span>

	                    <a href="#" class="button pix-insert-menu-icon"><i class="fa fa-arrow-circle-o-down"></i> <?php _e('Insert Icon', 'pixel8es'); ?></a>
	                    <a href="#" class="button pix-remove-menu-icon hidden"><i class="fa fa-times"></i> <?php _e('Remove Icon', 'pixel8es'); ?></a>
	                </label>
	            </p>
				<?php //Mega Menu ?>
	            <p class="pix-field-custom-megamenu description description-wide">
	                <label for="edit-menu-item-megamenu-<?php echo $item_id; ?>">
	                    <?php _e( 'Mega Menu', 'pixel8es'); ?><br />
						<span class="switch-light switch-candy" onclick="">
							<input type="checkbox" id="edit-menu-item-megamenu-<?php echo $item_id; ?>" name="menu-item-megamenu[<?php echo $item_id; ?>]" value='1'  <?php checked( 1, $item->megamenu ); ?>>
							<span><span><?php _e('No','pixel8es'); ?></span><span><?php _e('Yes','pixel8es'); ?></span></span><a></a>
						</span>
	                </label>
	            </p>
				
				<div class="pix-field-custom-megamenucol-div">
	            <?php //Mega Menu Columns ?>
		            <div class="pix-field-custom-megamenucol description description-wide">
		                <label>
		                    <?php _e( 'Mega Menu Columns', 'pixel8es'); ?><br />
		                </label>
						<?php 
							$item->megamenucol = (isset($item->megamenucol) && !empty($item->megamenucol)) ? $item->megamenucol : 2;
						?>
						<div class="switch-toggle switch-5 switch-candy" onclick="">
							<input type="radio" id="edit-menu-item-megamenucol2-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" class="col2-menu" value='2'  <?php checked( 2, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol2-<?php echo $item_id; ?>" onclick=""><?php _e('2','pixel8es'); ?></label>

							<input type="radio" id="edit-menu-item-megamenucol3-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" value='3'  <?php checked( 3, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol3-<?php echo $item_id; ?>" onclick=""><?php _e('3','pixel8es'); ?></label>

							<input type="radio" id="edit-menu-item-megamenucol4-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" value='4'  <?php checked( 4, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol4-<?php echo $item_id; ?>" onclick=""><?php _e('4','pixel8es'); ?></label>
                                                       
                                                        <input type="radio" id="edit-menu-item-megamenucol5-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" value='5'  <?php checked( 5, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol5-<?php echo $item_id; ?>" onclick=""><?php _e('5','pixel8es'); ?></label>
                                                       
                                                        <input type="radio" id="edit-menu-item-megamenucol6-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" value='6'  <?php checked( 6, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol6-<?php echo $item_id; ?>" onclick=""><?php _e('6','pixel8es'); ?></label>
							<a></a>
						</div>
						
		            </div>

		            <?php //Mega Menu position ?>
		            <p class="pix-field-custom-megamenupos description description-wide">
		                <label for="edit-menu-item-megamenupos-<?php echo $item_id; ?>">
		                    <?php _e( 'Mega Menu Position', 'pixel8es'); ?><br />
							<span class="switch-light switch-candy" onclick="">
								<input type="checkbox" id="edit-menu-item-megamenupos-<?php echo $item_id; ?>" name="menu-item-megamenupos[<?php echo $item_id; ?>]" value='1'  <?php checked( 1, $item->megamenupos); ?>>
								<span><span><?php _e('Left','pixel8es'); ?></span><span><?php _e('Right','pixel8es'); ?></span></span><a></a>
							</span>
		                </label>
		            </p>

	            </div>

	            <?php //Mega Menu Title ?>
	            <p class="pix-field-custom-megamenutitle description description-wide">
	                <label for="edit-menu-item-megamenutitle-<?php echo $item_id; ?>">
	                    <?php _e( 'Hide Title (only hide if mega menu enabled)', 'pixel8es'); ?><br />
						<span class="switch-light switch-candy" onclick="">
							<input type="checkbox" id="edit-menu-item-megamenutitle-<?php echo $item_id; ?>" name="menu-item-megamenutitle[<?php echo $item_id; ?>]" value='1'  <?php checked( 1, $item->megamenutitle ); ?>>
							<span><span><?php _e('Show','pixel8es'); ?></span><span><?php _e('Hide','pixel8es'); ?></span></span><a></a>
						</span>
	                </label>
	            </p>

	            <?php //Mega Menu Background Images ?>
	            <div class="pix-field-custom-megamenubgimg description description-wide">
	                <label for="edit-menu-item-megamenubgimg-<?php echo $item_id; ?>">
	                    <?php _e( 'Insert Background Image', 'pixel8es'); ?><br />
	                </label>	
	                <div class="pix-pull-left pix_image_select pix-container">
	                	<input type="hidden" id="edit-menu-item-megamenubgimg-<?php echo $item_id; ?>" class="pix-saved-val widefat code edit-menu-item-megamenubgimg" name="menu-item-megamenubgimg[<?php echo $item_id; ?>]" value='<?php echo $item->megamenubgimg ?>' />
	                	<a href="#" class="select-files" data-title="Insert Images"  data-file-type="image" data-multi-select="false" data-insert="true">Insert Images</a>
	                </div>	                
	                
	            </div>

	            <?php
	            /* New fields insertion ends here */
	            ?>

				<p class="field-move hide-if-no-js description description-wide">
					<label>
						<span><?php _e( 'Move', 'pixel8es' ); ?></span>
						<a href="#" class="menus-move-up"><?php _e( 'Up one', 'pixel8es' ); ?></a>
						<a href="#" class="menus-move-down"><?php _e( 'Down one', 'pixel8es' ); ?></a>
						<a href="#" class="menus-move-left"></a>
						<a href="#" class="menus-move-right"></a>
						<a href="#" class="menus-move-top"><?php _e( 'To the top', 'pixel8es' ); ?></a>
					</label>
				</p>

				<div class="menu-item-actions description-wide submitbox">
					<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original">
							<?php printf( __('Original: %s','pixel8es'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
						</p>
					<?php endif; ?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
					echo wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'delete-menu-item',
								'menu-item' => $item_id,
							),
							admin_url( 'nav-menus.php' )
						),
						'delete-menu_item_' . $item_id
					); ?>"><?php _e( 'Remove', 'pixel8es' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
						?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', 'pixel8es'); ?></a>
				</div>

				<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
				<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
				<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
				<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
				<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
				<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
			</div><!-- .menu-item-settings-->
			<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}
}