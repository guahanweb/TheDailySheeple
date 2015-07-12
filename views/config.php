<div class="wrap">
	<header>
		<div id="icon-themes" class="icon32"><br></div>
		<h2><?php _e('The Daily Sheeple Theme Settings', 'thedailysheeple'); ?></h2>
	</header>
	<?php settings_errors('thedailysheeple-settings-errors'); ?>
	<form id="form-thedailysheeple-options" action="options.php?theme=thedailysheeple" method="post" enctype="multipart/form-data">
		<?php 
		settings_fields('thedailysheeple_options_group');
		do_settings_sections('thedailysheeple_options_group');
		?>

		<p class="submit">
			<input name="thedailysheeple-theme-options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php _e('Save Settings', 'thedailysheeple'); ?>">
			<input name="thedailysheeple-theme-options[reset]" type="submit" class="button-secondary" value="<?php _e('Reset Default', 'thedailysheeple'); ?>">
		</p>
	</form>
</div>
