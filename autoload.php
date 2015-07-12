<?php
function thedailysheeple_autoload($classname) {
	$file = str_replace('\\', '/', $classname) . '.php';
	if (file_exists($file)) {
		include_once $file;
	}
}

spl_autoload_register('thedailysheeple_autoload');
