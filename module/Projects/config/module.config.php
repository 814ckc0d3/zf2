<?php
return array(
		
    'controllers' => array(
        'invokables' => array(
            'Projects\Controller\Projects' => 'Projects\Controller\ProjectsController',
        ),
    ),
    
    // The following section is new and should be added to your file
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
