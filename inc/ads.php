<?php
/**
 * This file registers all HTML files in the ads directory with the theme
 * as ad content. Once this is complete, calling thedailysheeple_get_ads()
 * will retrieve the ads from all those registered by this file.
 */
foreach (glob(dirname(__FILE__) . "/ads/*.html") as $filename) {
	thedailysheeple_register_ad(file_get_contents($filename));
}
