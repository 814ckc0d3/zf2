<?php
return array(
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
);