<?php
/*
Plugin Name: Yoyo Plugin
Plugin URI:
Description:
Verion:1.0
Author:
Author URI:
*/


class YoyoWidget extends WP_Widget {
	
	public function __construct() {
	$widget_ops = array(
		'classname' => 'widget_yoyo',
		'description' => __( 'A widget displays random post', 'JJS')
		);
	parent::__construct('yoyo_widget', __('yoyo_widget', 'codediva'), $widget_ops); 

}

	//public function widget( $args, $instance ) {

			//$title = apply_filters('widget_title', 
	//empty($instance['title']) ? 'Yoyo Widget' : 
	//$instance['title'], $instance, $this->id_base);

		//echo $args['before_widget'];
		//if ( $title ) {
			//echo $args['before_title'] . $title . $args
//['after_title'];

//}}
	function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  public function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = apply_filters('widget_title', empty($instance['title']) ? 'Yoyo Widget' : $instance['title'], $instance, $this->id_base);

    //empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // learned from http://www.makeuseof.com/tag/how-to-create-wordpress-widgets/

				
		query_posts('posts_per_page=1&orderby=rand');
		if (have_posts()) : 
			echo "";
			while (have_posts()) : the_post(); 
				echo "".get_the_title();
				echo the_post_thumbnail(array(200,200));
				echo "";	
					
			endwhile;
			echo "";
		endif; 
		wp_reset_query();

    echo $after_widget;
  }




 
}


add_action( 'widgets_init', function(){ register_widget( 'YoyoWidget' );
}); //outside of the class


?>
