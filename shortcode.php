<?php

//Link external stylesheet
 function short_code_enqueue_scripts(){
 	wp_enqueue_style('yoyo_shortcode', plugins_url('Shortcode/CSS/style.css'));
 	}
 	
 	add_action( 'wp_enqueue_scripts', 'short_code_enqueue_scripts');
 	

//Button - found the code from http://www.wpexplorer.com/wordpress-button-shortcode/
 	function yoyobutton ( $atts){
 		extract( shortcode_atts(
 			array(
 				'url' => '#',
 				'color'=> '',
 				'title'=> 'Click Me',
 			),
 			$atts)
 		);
 		return '<a href="'.$url.'"class="yoyo-button '.$color.'-button">
 		<span>'.do_shortcode($title).'</span></a>';
 		}
 	add_shortcode( 'yoyobutton', 'yoyobutton');
?>