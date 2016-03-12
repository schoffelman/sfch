<?php
/**
 * Template Name: Testimonials
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfch
 */
 
 
get_header(); 

while ( have_posts() ) : the_post(); ?>
		
	<header class="page-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

<?php endwhile; // End of the loop. ?>

	<div id="primary" class="content-area">
			
		<main id="main" class="site-main" role="main">
		
		<?php
		
		if ( have_posts() ) :
		
			while ( have_posts() ) : the_post();
					
				get_template_part( 'template-parts/content', 'testimonies' );

			endwhile; // End of the loop.

		endif;
			
		?>

		</main><!-- #main -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- #primary -->

<?php
get_footer();
