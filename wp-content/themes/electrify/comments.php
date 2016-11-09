<?php
/*
The comments page for electrify
*/
	global $smof_data;
	
	$s_comment_t = isset($smof_data['s_comment_t']) ? $smof_data['s_comment_t'] : 'Comments';
	$s_comment_form_t = isset($smof_data['s_comment_form_t']) ? $smof_data['s_comment_form_t'] : 'Leave a Comment';
	$s_comment_form_btn_t = isset($smof_data['s_comment_form_btn_t']) ? $smof_data['s_comment_form_btn_t'] : 'Add Comment';
	
	if(empty($s_comment_t)){
		$s_comment_t= 'Comments';	
	}
	if(empty($s_comment_form_t)){
		$s_comment_form_t= 'Leave a Comment';	
	}
	if(empty($s_comment_form_btn_t)){
		$s_comment_form_btn_t= 'Add Comment';	
	}


// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert help">
    	<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "pixel8es"); ?></p>
  	</div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
    <h3 class="title"  id="comments"><?php comments_number(__('<span class="color">No</span> Comments', 'pixel8es'), '<span class="color">One</span> '. $s_comment_t, _n('<span class="color">%</span> '. $s_comment_t.'', '<span class="color">%</span> '. $s_comment_t.'', get_comments_number(),'pixel8es') );?><span class="line"></span></h3>

<!--	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
	 	</ul>
	</nav>-->
	
	<ul class="comment-list">
		<?php wp_list_comments('type=comment&callback=electrify_comments'); ?>
	</ul>
	
	<!--<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
		</ul>
	</nav>-->
  
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
	
	<!-- If comments are closed. -->
	<!--p class="nocomments"><?php _e("Comments are closed.", "pixel8es"); ?></p-->

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div class="clear">	
	<?php 

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$comments_args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => $s_comment_form_t,
	  'title_reply_to'    => __( 'Leave a Reply to %s', 'pixel8es' ),
	  'cancel_reply_link' => __( 'Cancel Reply', 'pixel8es' ),
	  'label_submit'      => $s_comment_form_btn_t,
	 

	  'comment_field' =>  '<p class="comment-form-comment  clear col-md-12"><label for="comment">Comment<span class="color">*</span>'.
	    '</label><textarea id="comment" class="textArea" name="comment"  cols="45" rows="8" placeholder="'. esc_attr('Your Comment here...').'" aria-required="true">' .
	    '</textarea></p>',

	  'comment_notes_before' => '',  

	  'comment_notes_after' => '',

	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '<p class="comment-form-author col-md-6">' .
	      '<label for="author">' . __( 'Your Name ', 'pixel8es' ) . 
	      ( $req ? '<span class="color">*</span>' : '' ) . '</label> ' .
	      '<input id="author" name="author"  class="textArea" type="text" value="" size="30" placeholder="Your Name"' . $aria_req . ' /></p>',

	    'email' =>
	      '<p class="comment-form-email col-md-6"><label for="email">' . __( 'Your Email', 'pixel8es' ) . 
	      ( $req ? '<span class="color">*</span>' : '' ) . '</label> ' .
	      '<input id="email" name="email"  class="textArea" type="text" value="" size="30" placeholder="Your E-Mail"' . $aria_req . ' /></p>',

	    'url' =>
	      '<p class="comment-form-url col-md-12"><label for="url">' .
	      __( 'Your Website :', 'pixel8es' ) . '</label>' .
	      '<input id="url" name="url" type="text"   class="textArea" value="" size="30" placeholder="Got a website?" /></p>'
	    )
	  ),
	);

	comment_form($comments_args);

	do_action('comment_form', $post->ID); 
	?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>
