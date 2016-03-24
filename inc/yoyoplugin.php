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

	function __construct() {
	$widget_ops = array(
		'classname' => 'widget_archive',
		'description' => __( 'a plugin to show a yoga pose of the day', 'JJS')
		);
	parent::__construct('yoyo_plugin', __('Yoyo Plugin', 'JJS'), $widget_ops); 
}


	}


//register Yoyo plugin widget//
add_action( 'widgets_init', function(){ register_widget( 'YoyoPlugin' );
}); //outside of the class