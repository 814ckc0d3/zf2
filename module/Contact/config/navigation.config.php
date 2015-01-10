<?php
return array(
	'navigation' => array(
		'default' => array(
			array(
				'label' => 'Contact',
				'route' => 'contact',
				'pages' => array(
					array(
						'label' => 'Index',
						'route' => 'contact',
						'action' => 'index',
					),
					array(
						'label' => 'Add',
						'route' => 'contact',
						'action'	=> 'add',
					),
					array(
						'label' => 'Edit',
						'route' => 'contact',
						'action' => 'edit',
					),
					array(
						'label' => 'Delete',
						'route' => 'contact',
						'action' => 'delete',
					),
				),
			),
		),
	),
);