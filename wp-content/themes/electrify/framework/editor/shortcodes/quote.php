<?php 

$pix_options =array(


	array(
		'name' 	=> 	__('Author Name (Optional)', 'pixel8es'),
		'desc' 	=> 	__('Enter the author name', 'pixel8es'),
		'id'	=>	'author_name',
		'std'	=>	'John Deo', //optional
		'type'	=>	'text'
		),

	array(
		'name' 	=> 	__('Content', 'pixel8es'),
		'desc' 	=> 	__('Enter the  blockquote content', 'pixel8es'),
		'id'	=>	'blockquote_con',
		'std'	=>	'Content Goes Here',
		'type'	=>	'textarea',
		'con'	=>	true //true to display inbetween shortcodes
		),

	array(
		'name' 	=> 	__('Alignment', 'pixel8es'),
		'desc' 	=> 	__('BlockQuote alignment left or right', 'pixel8es'),
		'id'	=>	'align',
		'std'	=>	'left',
		'options'=> array('left','right'),
		'type'	=>	'select'
		),

);

?>