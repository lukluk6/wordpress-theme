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



	 function widget( $args, $instance ) {
			$type = apply_filters( 'widget_title', $instance['type'] );
			$title = apply_filters( 'widget_title', $instance['title'] );	
			
			
			 $title_hash = array(
                     "Yoga Pose" => "Yoga Pose of the Day",
                 );
                 
          	echo $args['before_widget'];
		if ( ! empty( $ctitle) )
			echo $args['before_title'] . $ctitle. $args['after_title'];

			$jsonxix = file_get_contents('http://dir.itslum.com/quotes/api/' . $qtype. '.php');
			$objxix = json_decode($jsonxix);
			echo '<p>' . str_replace(";", "<br/>", $objxix->quote) . '</p>';
			echo '<i><a href="http://dir.itslum.com/quotes/topic/' . str_replace(" ", "+", $objxix->author) . '" target="_blank">__' . $objxix->author . '</a></i>';


		//echo __( '<script type="text/javascript" src="http://dir.itslum.com/quotes/api/' . $qtype. '/index.php?h=off"></script>', 'text_domain' );
		echo $args['after_widget'];       
                 
                 
                 
                 
                 
}

add_action( 'widgets_init', function(){ register_widget( 'YoyoPlugin' );
}); //outside of the class