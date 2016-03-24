<?php
/*
	Plugin Name: Yoyo Plugin
	Plugin URI: http://http://phoenix.sheridanc.on.ca/~ccit3407/
	Description: This is a plugin that display
	Version:1.0
	Author: Shirlet Chan, Joanne Chui, Jing Lu
	Author URI:http://http://phoenix.sheridanc.on.ca/~ccit3407/
*/

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
	
