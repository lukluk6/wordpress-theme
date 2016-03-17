<?php
	
function cd_add_submenu() {
		add_submenu_page( 'themes.php', 'Customize Yourself', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
		//Activate custom settings
		add_action( 'admin_init', 'cd_settings_init' );
	
	}
	
	
add_action( 'admin_menu', 'cd_add_submenu' );
	

function cd_settings_init() { 

register_setting( 'theme_options', 'cd_options_settings' );
	
	
	add_settings_section(
		'cd_options_page_section', 
		'', 
		'cd_options_page_section_callback', 
		'theme_options'
	);
	
	function cd_options_page_section_callback() { 
		echo 'Make changes here';
	}
	
	
	//Add Twitter Social Profile URL

	add_settings_field( 
		'cd_twitter_url', //id
		'Twitter Profile URL', //title
		'display_twitter_element', //$callback
		'theme_options', //page
		'cd_options_page_section' //section
	);
	
	register_setting("cd_options_page_section", "cd_twitter_url");
	
	function display_twitter_element() { 
		$options = get_option( 'cd_twitter_url' );
		?>
		<input type="text" name="cd_twitter_url" id="cd_twitter_url" value="" <?php echo get_option('cd_twitter_url'); ?>" />
		<?php
	}
	
	

	//Choose between layouts
	add_settings_field( 
		'cd_layout_options', 
		'Do you want the layout to be responsive?', 
		'display_layout_element', 
		'theme_options', 
		'cd_options_page_section'  
	);
	
	function display_layout_element() { 
		$options = get_option( 'cd_layout_options' );
	?>
		<input type="checkbox" name="cd_layout_options" value="1" <?php checked(1, get_option('cd_layout_options'), true); ?> /> 
		<label>Turn it On</label> 
		<?php	
	}
	
	register_setting("cd_options_page_section", "cd_layout_options");
	
	
	

	add_settings_field( 
		'cd_radio_field', 
		'Choose an option', 
		'cd_radio_field_render', 
		'theme_options', 
		'cd_options_page_section'  
	);
	
	
	add_settings_field( 
		'cd_select_field', 
		'Choose from the dropdown', 
		'cd_select_field_render', 
		'theme_options', 
		'cd_options_page_section'  
	);
		
		
		
	
	
	function cd_radio_field_render() { 
		$options = get_option( 'cd_options_settings' );
		?>
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options['cd_radio_field'])) checked( $options['cd_radio_field'], 1 ); ?> value="1" /> <label>Option One</label><br />
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options['cd_radio_field'])) checked( $options['cd_radio_field'], 2 ); ?> value="2" /> <label>Option Two</label><br />
		<input type="radio" name="cd_options_settings[cd_radio_field]" <?php if (isset($options['cd_radio_field'])) checked( $options['cd_radio_field'], 3 ); ?> value="3" /> <label>Option Three</label>
		<?php
	}
	


	function cd_select_field_render() { 
		$options = get_option( 'cd_options_settings' );
		?>
		<select name="cd_options_settings[cd_select_field]">
			<option value="1" <?php if (isset($options['cd_select_field'])) selected( $options['cd_select_field'], 1 ); ?>>Option 1</option>
			<option value="2" <?php if (isset($options['cd_select_field'])) selected( $options['cd_select_field'], 2 ); ?>>Option 2</option>
		</select>
	<?php
	}
	
	function my_theme_options_page(){ 
	?>
		<form action="options.php" method="post">
			<h2>Customize Yourself</h2>
			<?php
			settings_fields( 'cd_options_page_section' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}
