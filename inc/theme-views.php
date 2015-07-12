<?php
/**
 * @package TheDailySheeple
 */ 

class TheDailySheepleViewer {
	public function view($name, $args = array()) {
		apply_filters('thedailysheeple_before_admin_view', $args);

		foreach ($args as $key => $val) {
			$$key = $val;
		}
		$file = dirname(dirname(__FILE__)) . "/views/$name.php";
		include $file;
	}
}
