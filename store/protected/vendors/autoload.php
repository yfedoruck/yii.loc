<?php

// Add PEAR module path to the list of include paths
set_include_path(get_include_path().':'.dirname(__FILE__).':'.dirname(__FILE__).'/PEAR');


function Vendor_autoload($className) {

	$class_name_parts = explode('_', $className);
	$vendors = array(
        'Dropbox' => '',
        'HTTP' => 'PEAR/',
        'Net' => 'PEAR/',
        'OS' => 'PEAR/',
    );

    if(count($class_name_parts) > 1){
    	$vendor = $class_name_parts[0];
    	if(isset($vendors[$vendor])){
    		$vendor_dir = $vendors[$vendor];
        	require_once dirname(__FILE__) . '/' . $vendor_dir . join('/', $class_name_parts) . '.php';
        	return true;
        }
    }

}

spl_autoload_register('Vendor_autoload', true, true);

