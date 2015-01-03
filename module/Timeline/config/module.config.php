<?php


return array(
    'controllers' => array(
        'invokables' => array(
            'Timeline\Controller\Timeline' => 'Timeline\Controller\TimelineController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'timeline' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/timeline[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Timeline\Controller\Timeline',
                        'action'     => 'index',
                    ),
                	'active'=>true,
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'timeline' => __DIR__ . '/../view',
        ),
    ),
);
