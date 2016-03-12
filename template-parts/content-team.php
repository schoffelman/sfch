<?php
/**
 * Template part for displaying page content in page-team.php.
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
		$team_members = new WP_Query( array(  'post_type' => 'team_members', 'orderby' => 'menu_order', 'order' => 'ASC' ) ); 
		
		if ( $team_members->have_posts() ) : 
		
			while ( $team_members->have_posts() ) : $team_members->the_post();
			
				echo '<div class="entry-team">';
			
					// echo "<pre>";print_r($post);echo "</pre>";
					
					echo '<div class="thumbnail">';
				
					if ( has_post_thumbnail() ) { 
						
						the_post_thumbnail();
					
					} else {
					
						echo '<img src="'.get_stylesheet_directory_uri().'/images/team-leadership-silhouette.png" alt="'. get_the_title() .'" />';
					
					} //end has_post_thumbnail() 
											
					echo '</div>'; 
					
					echo '<div class="team">';
						
						the_title('<h2>','</h2>'); 
						
						$position = get_post_meta($post->ID, 'position', true);
						
						if (!empty($position)) {
							echo '<div class="position">'. $position. '</div>';
						}
						
						the_content();
						
					echo '</div><!-- .team -->';
				
				echo '</div><!-- .entry-team -->';
			
			endwhile;
					
			echo '<div class="clear"></div>';
		
		endif;
		
		wp_reset_postdata(); 
	
	?>
	
	<div class="clear"></div>
	
</article><!-- #post-## -->
