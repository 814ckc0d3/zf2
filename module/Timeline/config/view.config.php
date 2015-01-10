<?php
return array(
	'view_manager' => array(
		'template_map' => array(
			'timeline/index'			  => __DIR__ . '/../view/timeline/timeline/index.phtml',
			'timeline/add'			  	  => __DIR__ . '/../view/timeline/timeline/add.phtml',
			'timeline/delete'			  => __DIR__ . '/../view/timeline/timeline/delete.phtml',
			'timeline/edit'				  => __DIR__ . '/../view/timeline/timeline/edit.phtml',
		),	
		'template_path_stack' => array(
			'timeline' => __DIR__ . '/../view',
		),
	),
);