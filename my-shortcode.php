<?php
/*
* Plugin Name: Shortcodes for Yoyo
* Plugin URI: http://phoenix.sheridanc.on.ca/~ccit3407/
* Description: Shortcode to link
* Author: Shirlet Chan, Joanne Chui, Jing Lu
* Author URI: http://phoenix.sheridanc.on.ca/~ccit3407/
* Version: 1.0
*/

//Linking external stylesheet //
function short_code_enqueue_scripts(){
	wp_enqueue_style('my-shortcode', plugins_url('style.css'));
}
add_action( 'wp_enqueue_scripts', 'short_code_enqueue_scripts' );

//Changes Colour of Text 

function text_color( $atts, $content=null){
	extract( shortcode_atts(
		array('color'=>'blue',
			), $atts )
	);
	return '<div class="section ' .$color.'">'.$content.'</div>';
}
add_shortcode( 'text_color', 'text_color');

//button link//
function thelink( $atts){
	extract(shortcode_atts(
		array(
			'url' => '#',
			'color' => 'green',
			'text' => 'Click Me',
		),
		$atts)
	);
	return '<a href="'.$url.'"class="my-button '.$color. '-button">
	<span>'. $text .'</span></a>';
	}
add_shortcode( 'thelink', 'thelink');

//button link//
function thesection( $atts , $content=null ) {
	extract( shortcode_atts(
			array(
			'title'=>'The Title',
			'link'=>'http://google.com',
			'linktxt'=>'Button Text',
			), $atts )
);
return'<div  class="section"><h2>'.$title.'</h2><divclass="link-txt">'.$content.'</div><p><a href="'.$link.'" class="the-link">'.$linktxt.'</a></p></div>';
}
add_shortcode( 'thesection', 'thesection' );

?>