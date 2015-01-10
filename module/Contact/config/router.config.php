<?php
return array(
	'router' => array(
		'routes' => array(
			'contact' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/contact[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Contact\Controller\Contact',
						'action'     => 'index',
					),
				),
			),
		),
	),
);