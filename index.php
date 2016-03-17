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


<!--here for slider-->

<?php
$args = array(
  'post_per_page'=>1
   //display 1 pictures on the slider
	);

$the_query = new WP_Query('showposts=1'.$args);

if($the_query->have_posts()):
?>
	
	<div class="home_slider">

<?php
	 while($the_query->have_posts()): $the_query->the_post(); 
?>
 

	<div class="slider">
	<!--<?=the_title()?>-->
		<?php the_post_thumbnail('home-slider');  //it adds the thumbnail of the post to the silder area
		?>
	</div>
 

 <script >
 $(document).ready(function(){
 	$(".home_slider").owlCarousel({
 		navigation:false,
 		slidespeed:300,
 		paginationSpeed:400,
 		singleItem:true
 	});
 });

 </script>


<?php
	endwhile;
?>
	 </div>
<?php
endif;	
?>





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
	 	<?php the_post_thumbnail(); ?> 

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

