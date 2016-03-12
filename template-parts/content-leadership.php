<?php
/**
 * Template part for displaying page content in page-leadership.php.
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
		$leadership = new WP_Query( array(  'post_type' => 'leadership_team', 'orderby' => 'menu_order', 'order' => 'ASC' ) ); 
		
		if ( $leadership->have_posts() ) : 
		
			while ( $leadership->have_posts() ) : $leadership->the_post();
			
				echo '<div class="entry-leadership">';
			
					// echo "<pre>";print_r($post);echo "</pre>";
					
					echo '<div class="thumbnail">';
				
					if ( has_post_thumbnail() ) { 
						
						the_post_thumbnail();
					
					} else {
					
						echo '<img src="'.get_stylesheet_directory_uri().'/images/leadership-team-silhouette.png" alt="'. get_the_title() .'" />';
					
					} //end has_post_thumbnail() 
											
					echo '</div>'; 
					
					echo '<div class="leadership">';
						
						the_title('<h2>','</h2>'); 
						
						$position = get_post_meta($post->ID, 'position', true);
						
						if (!empty($position)) {
							echo '<div class="position">'. $position. '</div>';
						}
						
						the_content();
						
					echo '</div><!-- .leadership -->';
				
				echo '</div><!-- .entry-leadership -->';
			
			endwhile;
					
			echo '<div class="clear"></div>';
		
		endif;
		
		wp_reset_postdata(); 
	
	?>
	
	<div class="clear"></div>
	
</article><!-- #post-## -->
