<?php

spl_autoload_register(function($className) {
    $class = explode('\\', $className);

    $class = array_map('strtolower', $class);

    array_shift($class);

    $className = implode('\\', $class);

	$file = dirname(__DIR__) . '\\src\\' . $className . '.php';
	$file = str_replace('\\', DIRECTORY_SEPARATOR, $file);

    //echo $file . "</br> </br>";

	if (file_exists($file)) {
		require_once($file);
	}
});

?>
