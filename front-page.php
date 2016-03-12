<?php
/**
 * The template for displaying the home page.
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

get_header(); ?>

	<div id="home-header" class="slider"></div><!-- #home-header -->
	
	<div id="primary" class="content-area">
		
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) :
		
			while ( have_posts() ) : the_post();
			
				the_content();
				
			endwhile;

		endif; ?>

		</main><!-- #main -->
	
		<div class="get-started">
			
			<?php 
					
			wp_reset_query();
			
			$sales = get_page_by_path('sales');
			
			// find child pages
			$child_pages = new WP_Query( array( 'post_parent' => $sales->ID, 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
			
			if ( $child_pages->have_posts() ) :
			
				while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
				
					<article>
				
						<?php the_content(); ?>
					
					</article>
				
				<?php endwhile;
			
			endif; ?>
			
		</div><!-- .get-started -->
		
		<div class="testimonies">
			
			<?php 
					
			wp_reset_query();
			
			$testimonies = new WP_Query( array(  'post_type' => 'testimonies', 'orderby' => 'menu_order', 'order' => 'ASC' ) ); 
		
			if ( $testimonies->have_posts() ) : 
			
				while ( $testimonies->have_posts() ) : $testimonies->the_post(); ?>
				
					<article>
				
						<?php the_content(); ?>
						
					</article>
				
				<?php endwhile;
			
			endif; ?>
			
		</div><!-- .testimonies -->
		
	</div><!-- #primary -->

<?php
get_footer();
