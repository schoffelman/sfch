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

	<script type="text/javascript">
		$(document).ready(function(){
		  $(".owl-carousel").owlCarousel({
			  loop: true,
			  items: 1,
			  center: true,
			  nav: true,
			  autoplay: true,
			  autoplayHoverPause: true
		  });
		});
	</script>

	<div id="home-header" class="slider">
	
		<div class="owl-carousel">
		
			<?php
			
			$slider = new WP_Query( array(  'category_name' => 'homepage-slider', 'orderby' => 'menu_order', 'order' => 'ASC' ) ); 
		
			if ( $slider->have_posts() ) : 
			
				while ( $slider->have_posts() ) : $slider->the_post();
					
					if ( has_post_thumbnail($slider->ID) ) { 
							
						$slide_url = wp_get_attachment_url(get_post_thumbnail_id($slider->ID));
							
					} //end has_post_thumbnail()  ?>
					
						<div class="slide" style="background: transparent url(<?php echo $slide_url; ?>) no-repeat 0 0;">
						
							<img src="<?php echo $slide_url; //yes, this is a bad css hack ?>" style="visibility: hidden;" />
						
							<div class="message">
								<?php the_title(); ?>
								<a href="#" title="Learn More"><span>Learn More</span></a>
							</div>
						
						</div>
				
				<?php endwhile;
			
			endif; ?>
		
		</div>
		
	</div><!-- #home-header -->
	
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
				
				<a href="/contact-us" class="contact-sales" title="Contact Our Sales Team"><span>Contact Our Sales Team</span></a>
				
			</div><!-- .get-started -->
		
		</div><!-- .site-main -->
		
		<div class="site-main">
		
			<div class="entry testimonies">
			
				<h2>What Our Customers Are Saying</h2>
			
				<?php wp_reset_query();
				
				$testimonies = new WP_Query( array(  'post_type' => 'testimonies', 'orderby' => 'menu_order', 'order' => 'ASC' ) ); 
			
				if ( $testimonies->have_posts() ) : 
				
					$test_count = 0;
				
					while ( $testimonies->have_posts() ) : $testimonies->the_post(); $test_count++; ?>
					
						<div class="person<?php if ($test_count !==1) { echo " mobile_hide"; } ?>">
						
							<div class="thumbnail">
						
							<?php if ( has_post_thumbnail() ) { 
								
								the_post_thumbnail();
							
							} else {
							
								echo '<img src="'.get_stylesheet_directory_uri().'/images/leadership-team-silhouette.png" alt="'. get_the_title() .'" />';
							
							} //end has_post_thumbnail() 
							
							 ?>
													
							</div> 
					
							<div class="story"> 
														
								<?php the_content(); ?>
								
								<span>&mdash; <?php the_title(); ?></span>
							
							</div>
							
						</div>
					
					<?php endwhile;
				
				endif; ?>
				
				<div class="clear"></div>
				
				<div class="show-more">
					
					<a href="#" title="Show More"><span>Show More</span></a>
					
				</div>
				
				<script type="text/javascript">
					
					if (window.jQuery) {  
						jQuery(document).ready(function(){
							jQuery('.show-more').click(function(){
								jQuery('.person').removeClass('mobile_hide').addClass('show');
								$(this).css('display','none');
								return false;
							});
						});
					}
					
				</script>
	
				<div class="cta-promise">
				
					<a href="#" title="Our Promise to You"><span>Our Promise to You</span></a>
				
				</div>
				
			</div><!-- .testimonies -->
		
		</div><!-- .site-main -->
		
	</div><!-- #primary -->

<?php
get_footer();
