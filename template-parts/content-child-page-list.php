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
$child_pages = new WP_Query( array( 'post_parent' => $pageID, 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC' ) );

if ( $child_pages->have_posts() ) : ?>

<div class="child-content-listing">

	<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" class="child-entry">
		
			<?php if ( has_post_thumbnail() ) { ?>
				    	
			    <?php the_post_thumbnail(); ?>
			    
			    <h4 class="child-title"><span><?php the_title(); ?></span><img class="clear" src="/wp-content/themes/sfch/images/learn-more-arrow-large.png" alt="learn more arrow" /></h4>
				    	
			<?php } else { ?>
				
				<h3><?php the_title(); ?></h3>
				
				<?php the_content('<span>LEARN MORE</span><img src="/wp-content/themes/sfch/images/learn-more-arrow.png" alt="learn more arrow" />'); ?>
			
			<?php } //end has_post_thumbnail() ?>
			
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
	
	<div class="clear"></div>
	
</div>
	
<?php endif; ?>


