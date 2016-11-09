<?php 

$pix_options =array(


	array(
		'name' 	=> 	__('Tooltip Text', 'pixel8es'),
		'desc' 	=> 	__('Enter the tooltip text', 'pixel8es'),
		'id'	=>	'tooltip_title',
		'std'	=>	'Tooltip Text', //optional
		'type'	=>	'text',
		//'con'	=>	false //true to display inbetween shortcodes
		),

	array(
		'name' 	=> 	__('Alignment', 'pixel8es'),
		'desc' 	=> 	__('Choose the alignment you want', 'pixel8es'),
		'id'	=>	'align',
		'std'	=>	'top',
		'options'=> array('left','right','top','bottom'),
		'type'	=>	'select',
		),

	array(
		'name' 	=> 	__('Tooltip URL', 'pixel8es'),
		'desc' 	=> 	__('Enter the Tooltip URL', 'pixel8es'),
		'id'	=>	'link',
		'std'	=>	'#', //optional
		'type'	=>	'text',
		//'con'	=>	false //true to display inbetween shortcodes
		),

	array(
		'name' 	=> 	__('Tooltip Content', 'pixel8es'),
		'desc' 	=> 	__('Enter the tooltip content', 'pixel8es'),
		'id'	=>	'tooltip_content',
		'std'	=>	'Tooltip Content', //optional
		'type'	=>	'text',
		//'con'	=>	false //true to display inbetween shortcodes
		),

);

?>