<?php
/*
	Plugin Name: Yoyo Plugin
	Plugin URI: http://http://phoenix.sheridanc.on.ca/~ccit3407/
	Description: This is a plugin that display yoga post of the day.
	Version:1.0
	Author: Shirlet Chan, Joanne Chui, Jing Lu
	Author URI:http://http://phoenix.sheridanc.on.ca/~ccit3407/
*/
class YoyoPlugin extends WP_Widget {
	public function __construct() {
	$widget_ops = array(
		'classname' => 'widget_archive',
		'description' => __( 'a plugin show you yoga of the day', 'JJS')
		);
	parent::__construct('yoyo_plugin', __('Yoyo Plugin', 'JJS'), $widget_ops); 
}
}

add_action( 'widgets_init', function(){ register_widget( 'YoyoPlugin' );
}); //outside of the class


class yoga_day extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'yoyo_widget', // Base ID
			__('Yoga of the Day', 'text_domain'), // Name
			array( 'description' => __( 'A random yoga pose for every day!', 'text_domain' ), ) // Args
		);
	}
	

