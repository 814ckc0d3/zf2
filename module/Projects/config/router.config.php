<?php
return array(
	'router' => array(
		'routes' => array(
			'projects' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/projects[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Projects\Controller\Projects',
						'action'     => 'index',
					),
				),
			),
		),
	),
);