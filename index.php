<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wordpress-theme
 */

get_header(); ?>


<!--here is the welcoming phrase only on the home page-->
<h2>Welcome to Yoyo's Yoga and Fitness!</h2>



<!--here for slide area
	learned from https://www.youtube.com/watch?v=pZ21jWGxPTY
-->

<?php
$args = array(
  'post_per_page'=>'1'
   //display 1 pictures on the slider
	);

$the_query = new WP_Query($args);// 'showposts=1'.is not working

if($the_query->have_posts()): //check if there is post
?>
	
	<div class="home_slider"> 

<?php
	 while($the_query->have_posts()): $the_query->the_post(); //get the post
?>
 

	<div class="slider">
	<!--<?=the_title()?> can put title there as well-->
		<?php the_post_thumbnail('home-slider'); 
		 //it adds the thumbnail of the post to the silder area
		?>
	</div>

<?php
	endwhile;
?>
	 </div>
<?php
endif;	
?>

<h2>About Us </h2> <!-- this will appear on the home page-->

	Yoyo’s Yoga and Fitness is a yoga studio based in Toronto, Canada. 
	We are three girls who are passionate about practicing yoga and believe in living life in 
	a balanced and healthy way. Found in 2016, our mission is to spread peace, 
	health and joy through practicing yoga and eating clean. We serve our community 
	by offering ways to seek and foster wellness by instructing many different forms of yoga, 
	in addition to a juice and snack bar located in our studio to promote a clean diet. 
	It is our vision to spread the importance for a balanced and healthy 
	lifestyle by offering an exceptional experience to each one of the students that comes into 
	Yoyo’s Yoga and Fitness. Feel free to come to our studio to learn not only about how yoga can 
	help maintain a healthy body but also how eating clean can lead to a peaceful mind and spirit.



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<!--grid
		<?php if ( has_post_thumbnail() ) : ?>
	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	        <?php the_post_thumbnail('medium'); ?>
	    </a>
		<?php endif; ?>
-->



		<?php if (is_home()) ?> <!--making changes to display post on home page-->

		<?php $page_num =$paged;
			if ($pagenum='') $pagenum = 1;
		$query = new WP_Query('category_name=HPP&showposts=5&orderby=date&paged='.$page_num);
		?>
		<!--put in cartergory name to display and order by date-->

		
		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


		<div class="post">
 
	 	<!-- Display the Title as link to the Post -->
	 	<h2><a href="<?php the_permalink() ?>" rel="bookmark" 
	 	title="Permanent Link to <?php the_title_attribute(); ?>">

	 
	 	<?php the_title(); ?></a></h2>
	 	<!--<?php the_post_thumbnail(); ?> -->

	 	  <div class="entry">
  <?php the_content(); ?>
  </div>

 	<p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
 
 	</div> 

 	<?php endwhile; 
 	wp_reset_postdata();
 	else : ?>
 	<p> <?php _e( 'Sorry, there is no post matches this catergory.' ); ?></p>
 <?php endif; ?>



 <?php posts_nav_link('separator','Newer Post &raquo;','&laquo; Older Post'); //learned from https://codex.wordpress.org/Next_and_Previous_Links?>

		
		
		
		
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

