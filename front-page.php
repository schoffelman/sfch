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
		
			<div class="entry quote">
			
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/est-1995.png" alt="Est. 1995" />
				
					<article>

					<?php if ( have_posts() ) :
					
						while ( have_posts() ) : the_post();
						
							the_content();
							
						endwhile;
			
					endif; ?>
				
					</article>
				
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ampersand-logo.png" alt="" />
				
			</div><!-- .entry -->

		</main><!-- #main -->
	
		<div class="site-main gray">
		
			<div class="entry get-started">
		
				<h2>Get Started</h2>
				
				<?php wp_reset_query();
				
				$sales = get_page_by_path('sales');
				
				// find child pages
				$child_pages = new WP_Query( array( 'post_parent' => $sales->ID, 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
				
				if ( $child_pages->have_posts() ) :
				
					while ( $child_pages->have_posts() ) : $child_pages->the_post();
					
						echo '<article id="post-'. get_the_ID() .'">';
					
							if ( has_post_thumbnail() ) {
								echo '<div class="featured-image">';
									the_post_thumbnail();
								echo '</div>';
							} 
						
							the_title('<h3>', '</h3>');
											
						echo '</article>'; ?>
						
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
					
					<?php endwhile;
				
				endif; ?>
				
				<div class="clear"></div>
				
				<h4>Not Sure? Let us help.</h4>
				
				<a href="/contact-us" title="Contact Our Sales Team"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact-our-sales-team.png" alt="Contact Our Sales Team" /></a>
				
			</div><!-- .get-started -->
		
		</div><!-- .site-main -->
		
		<div class="site-main">
		
			<div class="entry testimonies">
			
				<?php wp_reset_query();
				
				$testimonies = new WP_Query( array(  'post_type' => 'testimonies', 'orderby' => 'menu_order', 'order' => 'ASC' ) ); 
			
				if ( $testimonies->have_posts() ) : 
				
					while ( $testimonies->have_posts() ) : $testimonies->the_post(); ?>
					
						<article>
					
							<?php the_content(); ?>
							
						</article>
					
					<?php endwhile;
				
				endif; ?>
				
			</div><!-- .testimonies -->
		
		</div><!-- .site-main -->
		
	</div><!-- #primary -->

<?php
get_footer();
