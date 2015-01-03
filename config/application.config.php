
<?php 
$localmodulepath = explode("\\",__DIR__);
unset($localmodulepath[sizeof($localmodulepath)-1]);
$localmodulepath[]='module';
$allpaths = realpath_cache_get();
foreach ($allpaths as &$path)
{
	$path = explode("\\", $path['realpath']);
	if (0 == sizeof(array_diff($localmodulepath,$path))){
 		if (sizeof($path) == sizeof($localmodulepath)+1){
 			$newpaths[] = $path;
 		}
	}
}
$newpaths = array_unique($newpaths, SORT_REGULAR);

foreach($newpaths as $module){	
	$modules[] = $module[sizeof($module)-1];	
}
foreach($newpaths as $path){
	$finalpaths[] = implode("\\", $path);
}

return array(
    'modules' => $modules,
// 		array(
//         'Application',
//         'Album',                  // <-- Add this line
//         'Timeline',
//     ),
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
