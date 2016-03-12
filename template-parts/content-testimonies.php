<?php
/**
 * Template part for displaying page content in page-testimonials.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfch
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
	
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->
	
	<?php wp_reset_query();
		
		// find testimonies 
		$testimonies = new WP_Query( array(  'post_type' => 'testimonies', 'orderby' => 'menu_order', 'order' => 'ASC' ) ); 
		
		if ( $testimonies->have_posts() ) : 
		
			while ( $testimonies->have_posts() ) : $testimonies->the_post();
			
				echo '<div class="entry-testimonies">';
			
					// echo "<pre>";print_r($posts[0]);echo "</pre>";
				
					if ( has_post_thumbnail() ) { 
						
						echo '<div class="thumbnail">';
						
							the_post_thumbnail();
						
						echo '</div>';
					
					}  //end has_post_thumbnail()  
					
					echo '<div class="testimony">';
						
						the_content();
						
						the_title('<span>&#8212;','</span>'); 
						
					echo '</div>';
					
					echo '<div class="clear"></div>';
				
				echo '</div><!-- .entry-testimonies -->';
			
			endwhile;
		
		endif;
		
		wp_reset_postdata(); 
	
	?>

	<footer class="entry-footer">
	
		<?php get_sidebar('single-page'); ?>
		
	</footer><!-- .entry-footer -->
	
	<div class="clear"></div>
	
</article><!-- #post-## -->
