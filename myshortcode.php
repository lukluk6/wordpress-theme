<?php
/*
 * Plugin Name: Playing with Shortcodes
 * Plugin URI: https://phoenix.sheridanc.on.ca/~ccit3401/
 * Description: Showing how shortcodes work
 * Author: Joanne Chui
 * Author URI: https://phoenix.sheridanc.on.ca/~ccit3401/
 * Version: 1.0
 */
 
 //Link external stylesheet
 function short_code_enqueue_scripts(){
 	wp_enqueue_style('my_shortcode', plugins_url('Shortcode/CSS/style.css'));
 	}
 	
 	add_action( 'wp_enqueue_scripts', 'short_code_enqueue_scripts');
 	
 //Add Self-Closing Shortcode
 	function my_shortcode(){
 		return "<p>hello welcome</p>";
 		}
 	add_shortcode('my_shortcode','my_shortcode');
 	
 //Add an enclosing shortcode
 	function my_short_code($atts, $content = null){
 		return '<div class="my-shortcode">'. $content. '</div>';
 		}
 	add_shortcode('my_short_code','my_short_code');
 	
 function thelink( $atts){
 // Attributes
 	extract( shortcode_atts(
 		array(
 			'title'=> 'Button Text',
 			'link' => 'http://google.com',
 		), $atts )
 	);
 //Code
 	return '<p class="the-link"><a href="' . $link .'">' . $title. '</a></p>';
 	
 }
 	add_shortcode('thelink','thelink');
 
 //Button - found the code from http://www.wpexplorer.com/wordpress-button-shortcode/
 	function mybutton ( $atts){
 		extract( shortcode_atts(
 			array(
 				'url' => '#',
 				'color'=> '',
 				'title'=> 'Click Me',
 			),
 			$atts)
 		);
 		return '<a href="'.$url.'"class="my-button '.$color.'-button">
 		<span>'.do_shortcode($title).'</span></a>';
 		}
 	add_shortcode( 'mybutton', 'mybutton');
 		
 //Change text color
 	function text_color ($atts, $content = null){
 		extract( shortcode_atts(
 			array('color' => ''
 				), 
 			$atts )
 			);
 			return '<div class="section '. $color .'-text">' . $content . '</div>';
 		}
 		add_shortcode( 'text_color', 'text_color');
 		
 
 	
 //Link
 function thesection( $atts , $content= null ) {
 	extract( shortcode_atts(
 		array(
 			'title'=>'The Title',
 			'link'=>'http://google.com',
 			'linktxt'=>'Click Me',
 		), $atts )
 	);
 return'<div class="section"><h2>'.$title.'</h2><div class="link-txt">'.$content.'</div>
 <p><a href="'.$link.'" class="the-link">'.$linktxt.'</a></p></div>';}
 add_shortcode( 'thesection', 'thesection' );
 ?>
