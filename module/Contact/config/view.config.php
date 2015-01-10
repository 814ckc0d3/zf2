<?php
return array(
	'view_manager' => array(
		'template_map' => array(
			'contact/index'			  => __DIR__ . '/../view/contact/contact/index.phtml',
			'contact/add'			  	  => __DIR__ . '/../view/contact/contact/add.phtml',
			'contact/delete'			  => __DIR__ . '/../view/contact/contact/delete.phtml',
			'contact/edit'			  => __DIR__ . '/../view/contact/contact/edit.phtml',
		),
		'template_path_stack' => array(
			'contact' => __DIR__ . '/../view',
		),
	),
);