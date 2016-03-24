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

	function __construct() {
	$widget_ops = array(
		'classname' => 'widget_archive',
		'description' => __( 'a plugin show you yoga of the day', 'JJS')
		);
	parent::__construct('yoyo_plugin', __('Yoyo Plugin', 'JJS'), $widget_ops); 
}


}

	 function widget( $args, $instance ) {
	   die('function WP_Widget::widget() must be over-ridden in a sub-class.');
			$type = apply_filters( 'widget_title', $instance['type'] );
			$title = apply_filters( 'widget_title', $instance['title'] );	
			
			
			 $title_hash = array(
                     "Yoga Pose" => "Yoga Pose of the Day",
                 );
                 
          	echo $args['before_widget'];
		if ( ! empty( $title) )
			echo $args['before_title'] . $title. $args['after_title'];

			$yoyo = file_get_contents('http://dir.itslum.com/quotes/api/' . $type. '.php');
			$jjs = json_decode($yoyo);
			echo '<p>' . str_replace(";", "<br/>", $jjs->quote) . '</p>';
			echo '<i><a href="http://dir.itslum.com/quotes/topic/' . str_replace(" ", "+", $jjs->author) . '" target="_blank">__' . $jjs->author . '</a></i>';


		//echo __( '<script type="text/javascript" src="http://dir.itslum.com/quotes/api/' . $qtype. '/index.php?h=off"></script>', 'text_domain' );
		echo $args['after_widget'];       
                                
}

		function form( $instance ) {
		if ( isset( $instance[ 'type' ] ) ) {
			$type = $instance[ 'type' ];
		}
		else {
			$qype = "qotd";
		}
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = "Yoga Pose of the day";
		}
		?>
	         <p>
			<label for="<?php echo $this->get_field_id( 'qtype' ); ?>">Select quotation type:</label> 
			<select id="<?php echo $this->get_field_id( 'qtype' ); ?>" name="<?php echo $this->get_field_name( 'qtype' ); ?>" class="widefat" style="width:100%;">
				<option value="quote" <?php if ( 'quote' == $qtype ) echo 'selected="selected"'; ?>>Yoga Pose of the Day</option>		
			</select>

			<label for="<?php echo $this->get_field_id( 'ctitle' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'ctitle' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat" style="width:100%;" type="text" value="<?php echo $title; ?>"/>

		</p>
		<?php 
	}
	
	 function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : '';
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}


//register Yoyo plugin widget//
add_action( 'widgets_init', function(){ register_widget( 'YoyoPlugin' );
}); //outside of the class