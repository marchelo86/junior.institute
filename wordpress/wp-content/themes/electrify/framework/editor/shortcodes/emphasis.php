<?php 

$pix_options =array(


	array(
		'name' 	=> 	__('Emphasis Text', 'pixel8es'),
		'desc' 	=> 	__('Enter the Emphasis Content', 'pixel8es'),
		'id'	=>	'emphasis_con',
		'std'	=>	'Content Goes Here',
		'type'	=>	'textarea'
		),
	
	array(
		'name' 	=> 	__('Animation', 'pixel8es'),
		'desc' 	=> 	__('Do you like to animate this element?', 'pixel8es'),
		'id'	=>	'animate',		
		'std'	=>	false,
		'type'	=>	'checkbox',
		'val'   =>  array('No', 'Yes') // False Value First
		),

	array(
		'name' 	=> 	__('Animation Transition', 'pixel8es'),
		'desc' 	=> 	__('Choose Animation Transition', 'pixel8es'),
		'id'	=>	'transition',
		'std'	=>	'fadeIn',
		'options'=> array('flash','bounce','shake','tada','swing','wobble','pulse','flip','flipInX','flipInY','fadeIn','fadeInUp','fadeInDown','fadeInLeft','fadeInRight','fadeInUpBig','fadeInDownBig','fadeInLeftBig','fadeInRightBig','slideInDown','slideInLeft','slideInRight','bounceIn','bounceInUp','bounceInDown','bounceInLeft','bounceInRight','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','lightSpeedIn','hinge','rollIn'),
		'type'	=>	'select',
		),

	array(
		'name' 	=> 	__('Animation Duration', 'pixel8es'),
		'desc' 	=> 	__('Enter the Duration (Ex: 500ms or 1s)', 'pixel8es'),
		'id'	=>	'duration',
		'std'	=>	'1s', //optional
		'type'	=>	'text',
		),

	array(
		'name' 	=> 	__('Animation Delay', 'pixel8es'),
		'desc' 	=> 	__('Enter the Delay (Ex: 100ms or 1s)', 'pixel8es'),
		'id'	=>	'delay',
		'std'	=>	'100ms', //optional
		'type'	=>	'text',
		),

);

?>