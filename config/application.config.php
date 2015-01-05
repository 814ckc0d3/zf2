<?php 
return array(
    'modules' => //$modules,
		array(
        'Application',
        'Album',                  // <-- Add this line
        'Timeline',
		'Projects',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
?>
