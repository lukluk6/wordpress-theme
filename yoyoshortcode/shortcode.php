<?php
/*
* Plugin Name: Yoyo's Shortcode
* Plugin URI: http://phoenix.sheridanc.on.ca/~ccit3407/
* Description: Shortcode to provide link to more recipes 
* Author: Joanne Chui, Jing Lu, Shirlet Chan
* Author URI: http://phoenix.sheridanc.on.ca/~ccit3407/
* Version: 1.0
*/

//Link external stylesheet
 function yoyoshort_code_enqueue_scripts(){
 	wp_enqueue_style('yoyo_shortcode', plugins_url('yoyoshortcode/CSS/style2.css'));
 	}
 	
 	add_action( 'wp_enqueue_scripts', 'yoyoshort_code_enqueue_scripts');
 	

//Button - found the code from http://www.wpexplorer.com/wordpress-button-shortcode/
 	function yoyobutton ( $atts){
 		extract( shortcode_atts(
 			array(
 				'url' => '#',
 				'color'=> '',
 				'title'=> 'Click Here :)',
 			),
 			$atts)
 		);
 		return '<a href="'.$url.'"class="yoyo-button '.$color.'-button">
 		<span>'.do_shortcode($title).'</span></a>';
 		}
 	add_shortcode( 'yoyobutton', 'yoyobutton');
 	
 //Change text color
 	function yoyotext_color ($atts, $content = null){
 		extract( shortcode_atts(
 			array('color' => ''
 				), 
 			$atts )
 			);
 			return '<div class="section '. $color .'-text">' . $content . '</div>';
 		}
 		add_shortcode( 'yoyotext_color', 'yoyotext_color');
?>