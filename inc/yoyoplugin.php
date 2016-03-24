<?php
/*
	Plugin Name: Yoyo Plugin
	Plugin URI: http://http://phoenix.sheridanc.on.ca/~ccit3407/
	Description: This is a plugin that display yoga post of the day.
	Version:1.0
	Author: Shirlet Chan, Joanne Chui, Jing Lu
	Author URI:http://http://phoenix.sheridanc.on.ca/~ccit3407/
*/ 


//register Yoyo plugin widget
add_action( 'widgets_init', function(){ register_widget( 'YoyoPlugin' );
}); //outside of the class