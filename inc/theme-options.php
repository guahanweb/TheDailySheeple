<?php
/**
 * @package TheDailySheeple
 */
class TheDailySheepleOptions {
	protected static $option_key = 'thedailysheeple-theme-options';
	protected static $defaults = array(
		'social_truncate_count' => true
	);

	public static function init() {
		$opts = get_option(self::$option_key);
		if (false === $opts) {
			add_option(self::$option_key, self::$defaults);
		}
	}

	public static function settingsInit() {
		register_setting('thedailysheeple_options_group', self::$option_key, array('TheDailySheepleOptions', 'validate'));
		add_settings_section('thedailysheeple_settings_header', __('Formatting Options', 'thedailysheeple'), array('TheDailySheepleOptions', 'settingsHeaderText'), 'thedailysheeple_options_group');
		add_settings_field('thedailysheeple_social_truncate', __('Truncate Social Media Counts', 'thedailysheeple'), array('TheDailySheepleOptions', 'socialTruncateField'), 'thedailysheeple_options_group', 'thedailysheeple_settings_header');
	}

	public static function settingsHeaderText() {
		echo "<p>" . __('Configure settings for formatting features in your theme.', 'thedailysheeple') . "</p>";
	}

	public static function socialTruncateField() {
		$options = get_option(self::$option_key);
		$truncate = intval($options['social_truncate_count']);
		$description = __('If this field is checked, social media counts will be truncated (ie, 1,000 becomes 1.0K)', 'thedailysheeple');
		$key = self::$option_key;
		$checked = ($truncate) ? ' checked="checked"' : '';
		echo <<<EOF
<input type="checkbox" id="social-truncate-count" name="${key}[social_truncate_count]"$checked>
<span class="description">$description</span>
EOF;
	}

	public static function registerAdminMenu() {
		add_theme_page(__('TDS Options', 'thedailysheeple'), __('TDS Options', 'thedailysheeple'), 'edit_theme_options', 'thedailysheeple-settings', array('TheDailySheepleOptions', 'showAdminPage'));
	}

	public static function showAdminPage() {
		TheDailySheepleViewer::view('config');
	}

	public static function validate($input) {
		$default_options = self::$defaults;
		$data = $default_options;

		$submit = !empty($input['submit']) ? true : false;
		$reset  = !empty($input['reset']) ? true : false;

		if ($submit) {
			$data['social_truncate_count'] = isset($input['social_truncate_count']);
		} else if ($reset) {
			$data['social_truncate_count'] = $default_options['social_truncate_count'];
		}

		return $data;
	}
}
