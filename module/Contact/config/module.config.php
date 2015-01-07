<?php
return array(
		
    'controllers' => array(
        'invokables' => array(
            'Contact\Controller\Contact' => 'Contact\Controller\ContactController',
        ),
    ),
    
    // The following section is new and should be added to your file
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
