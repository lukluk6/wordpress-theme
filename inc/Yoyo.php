<?php

class YoyoWidget extends WP_Widget {
	
	public function __construct() {
	$widget_ops = array(
		'classname' => 'widget_yoyo',
		'description' => __( 'A widget displays random post', 'JJS')
		);
	parent::__construct('yoyo_widget', __('yoyo_widget', 'codediva'), $widget_ops); 

}

	public function widget( $args, $instance ) {

			$title = apply_filters('widget_title', 
	empty($instance['title']) ? 'Yoyo Widget' : 
	$instance['title'], $instance, $this->id_base);

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args
['after_title'];

}}


}


add_action( 'widgets_init', function(){ register_widget( 'YoyoWidget' );
}); //outside of the class


?>
