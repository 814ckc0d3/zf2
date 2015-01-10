<?php
return array(
	'navigation' => array(
		'default' => array(
			array(
				'label' => 'Timeline',
				'route' => 'timeline',
				'pages' => array(
					array(
						'label' => 'Index',
						'route' => 'timeline',
						'action' => 'index',
					),
					array(
						'label' => 'Add',
						'route' => 'timeline',
						'action'	=> 'add',
					),
					array(
						'label' => 'Edit',
						'route' => 'timeline',
						'action' => 'edit',
					),
					array(
						'label' => 'Delete',
						'route' => 'timeline',
						'action' => 'delete',
					),
				),
			),
		),
	),
);