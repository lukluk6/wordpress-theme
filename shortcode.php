<?php

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