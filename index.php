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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">



		<?php if (is_home()) ?> <!--making changes to display post on home page-->

		<?php $page_num =$paged;
			if ($pagenum='') $pagenum = 1;
		$query = new WP_Query('category_name=HPP&showposts=5&orderby=date&paged='.$page_num);
		?>
		<!--put in cartergory name to display and order by date-->
		
		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


		<div class="post">
 
	 	<!-- Display the Title as link to the acturl Post -->
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
 	<p> <?php _e( 'Sorry, there is no post matched this catergory.' ); ?></p>
 <?php endif; ?>

 <?php posts_nav_link('separator','Newer Post &raquo;','&laquo; Older Post'); //learned from https://codex.wordpress.org/Next_and_Previous_Links?>





<!--
		<?php
		//if ( have_posts() ) :

			//if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			//endif;

			/* Start the Loop */
			//while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			//endwhile;

			the_posts_navigation();

		//else :

			get_template_part( 'template-parts/content', 'none' );

		//endif; ?>

	-->
		
	
		
		
		
		
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

