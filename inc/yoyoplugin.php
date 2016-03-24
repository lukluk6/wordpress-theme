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
		'description' => __( 'a plugin to show a yoga pose of the day', 'JJS')
		);
	parent::__construct('yoyo_plugin', __('Yoyo Plugin', 'JJS'), $widget_ops); 
}

function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
		return $instance;
}


}
register_widget('YoyoPlugin');


 function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
		$numberOfListings = esc_attr($instance['numberOfListings']);
	} else {
		$title = '';
		$numberOfListings = '';
	}
	?>
<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">
			<?php _e('Title', 'realty_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('numberOfListings'); ?>">
			<?php _e('Number of Listings:', 'realty_widget'); ?></label>
		<select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>">
				<?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>
	<?php
	}

	function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$numberOfListings = $instance['numberOfListings'];
	echo $before_widget;
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$this->getRealtyListings($numberOfListings);
	echo $after_widget;
}
?>

<?php

function getRealtyListings($numberOfListings) { //html
	global $post;
	add_image_size( 'realty_widget_size', 85, 45, false );
	$listings = new WP_Query();
	$listings->query('post_type=listings&posts_per_page=' . $numberOfListings );
	if($listings->found_posts > 0) {
		echo '<ul class="realty_widget">';
			while ($listings->have_posts()) {
				$listings->the_post();
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'realty_widget_size') : '<div class="noThumb"></div>';
				$listItem = '<li>' . $image;
				$listItem .= '<a href="' . get_permalink() . '">';
				$listItem .= get_the_title() . '</a>';
				$listItem .= '<span>Added ' . get_the_date() . '</span></li>';
				echo $listItem;
			}
		echo '</ul>';
		wp_reset_postdata();
	}else{
		echo '<p style="padding:25px;">No listing found</p>';
	}
}







	 /*function widget( $args, $instance ) {
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
*/

//register Yoyo plugin widget//
add_action( 'widgets_init', function(){ register_widget( 'YoyoPlugin' );
}); //outside of the class