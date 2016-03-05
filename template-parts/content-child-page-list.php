<?php
/**
 * Template part for displaying child page listings in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfch
 */


$pageID = get_the_ID();
					
wp_reset_query();

// find child pages
$child_pages = new WP_Query( array( 'post_parent' => $pageID, 'post_type' => 'page' ) );

if ( $child_pages->have_posts() ) :
	
	while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="child-content-listing">
				
				<h4><?php the_title(); ?></h4>
				
				<?php the_content('LEARN MORE <img src="/wp-content/themes/sfch/images/learn-more-arrow.png" alt="" />'); ?>
			
			</div><!-- .entry-content -->
			
		</article><!-- #post-## -->
		
	<?php endwhile;
	
	wp_reset_postdata();
	
endif;

?>


