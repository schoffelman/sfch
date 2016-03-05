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

if ( $child_pages->have_posts() ) : ?>

<div class="child-content-listing">

	<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" class="child-entry">
				
			<h3><?php the_title(); ?></h3>
			
			<?php the_content('<span>LEARN MORE</span><img src="/wp-content/themes/sfch/images/learn-more-arrow.png" alt="" />'); ?>
			
			<script type="text/javascript">
			
			if (window.jQuery) {  
				jQuery(document).ready(function(){
					var postID = 'post-'+<?php the_ID(); ?>;
					jQuery('#'+postID).click(function(){
						window.location.href = "<?php echo get_permalink(); ?>";
					});
				});
			}
			
			</script>
			
		</article><!-- #post-## -->
			
	<?php endwhile;
		
	wp_reset_postdata(); ?>
	
</div>
	
<?php endif; ?>


