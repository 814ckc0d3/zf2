<?php
return array(
	'view_manager' => array(
		'template_map' => array(
			'projects/index'			  => __DIR__ . '/../view/projects/projects/index.phtml',
			'projects/add'			  	  => __DIR__ . '/../view/projects/projects/add.phtml',
			'projects/delete'			  => __DIR__ . '/../view/projects/projects/delete.phtml',
			'projects/edit'				  => __DIR__ . '/../view/projects/projects/edit.phtml',
		),	
		'template_path_stack' => array(
			'projects' => __DIR__ . '/../view',
		),
	),
);