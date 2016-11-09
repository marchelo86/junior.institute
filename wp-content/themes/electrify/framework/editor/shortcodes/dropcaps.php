<?php 

$pix_options =array(

	array('break' =>  false),

	array(
		'name' 	=> 	__('Dropcaps Style', 'pixel8es'),
		'desc' 	=> 	__('Choose the style you want', 'pixel8es'),
		'id'	=>	'style',
		'std'	=>	'default',
		'options'=> array('default','square','circle'),
		'type'	=>	'select'
		),

	array(
		'name' 	=> 	__('Dropcaps Text', 'pixel8es'),
		'desc' 	=> 	__('Enter the dropcaps text', 'pixel8es'),
		'id'	=>	'dropcap_text',
		'std'	=>	'S', //optional
		'type'	=>	'text',
		'con'   =>  true 
	)

);

?>