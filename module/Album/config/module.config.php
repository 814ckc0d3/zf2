<?php
return array(
		
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

	'view_manager' => array(
 		'template_map' => array(
			'album/index'			  => __DIR__ . '/../view/album/album/index.phtml',
 			'album/add'			  	  => __DIR__ . '/../view/album/album/add.phtml',
 			'album/delete'			  => __DIR__ . '/../view/album/album/delete.phtml',
 			'album/edit'			  => __DIR__ . '/../view/album/album/edit.phtml',
   		),
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);
