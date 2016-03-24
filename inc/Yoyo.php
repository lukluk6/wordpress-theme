<?php
/*
Plugin Name: Yoyo Plugin
Plugin URI:http://phoenix.sheridanc.on.ca/~ccit3407/
Description:The widget display yoga of the day
Verion:1.0
Author:Joanna, Jing, Shirlet
Author URI:http://phoenix.sheridanc.on.ca/~ccit3407/
*/


class YoyoWidget extends WP_Widget {
	
	public function __construct() {
	$widget_ops = array(
		'classname' => 'widget_yoyo', //change the information that dispaly in widget sitting
		'description' => __( 'A widget displays random Yoga pose post', 'JJS')
		);
	parent::__construct('yoyo_widget', __('yoyo_widget', 'JJS'), $widget_ops); 

}

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

 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // learned from http://www.makeuseof.com/tag/how-to-create-wordpress-widgets/

				
		query_posts('posts_per_page=1&orderby=rand&category_name=DailyYoga'); //limited the post perpage and the category
		if (have_posts()) : 
			echo "";
			while (have_posts()) : the_post(); 
				echo "". '<a href="' . get_permalink() . '">'; //make the title of the post in the widget clickerable 
				echo "".get_the_title();
				echo the_post_thumbnail(array(200,200));//add feature image to display on the widget
				echo "";	
					
			endwhile;
			echo "";
		endif; 
		wp_reset_query();

    echo $after_widget;
  }

  //options to change the widget title in appearence widget
  public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
	'title' => '') );
	$title = strip_tags($instance['title']); 
?>

<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'codediva'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p> 
<?php }




 
}


add_action( 'widgets_init', function(){ register_widget( 'YoyoWidget' );
}); //place outside of the class


?>
