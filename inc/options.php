<?php
/* Add a new menu item */
add_menu_page( $page_titile, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);

/* Add a sub-menu item */
add_submenu_page ($parent_slug, $page_titile, $menu_title, $capability, $menu_slug, $function);

/* Add options page as a sub-menu item to an existing menu item */
function cd_add_submenu(){
	add_submenu_page('themes.php', 'Awesome Options Page', 'Theme Options','manage_options',
	'theme_options','my_theme_options_page');
}
add_action ('admin_menu','cd_add_submenu');

/* Create settings */
function cd_settings_init(){
	register_setting ('theme_options', 'cd_options_settings');
	add_settings_section(
		'cd_options_page_section', // the id
		'Your section titile', //Section Title
		'cd_options_page_section_callback',//$callback (function we will create)
		'theme_options' //page(matches menu_slug set in add_submenu_page)
		);
function cd_options_page_section_callback(){
	echo'A description and detail about the section.'

	
;
?>

