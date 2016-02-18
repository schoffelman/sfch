<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sfch
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<span class="find-us">FIND US</span>
			<span class="social"><a href="" title="LinkedIn" target="_blank" class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/footer-linkedin-icon.png" alt="LinkedIn" /></a><a href="" title="Facebook" target="_blank" class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/footer-facebook-icon.png" alt="Facebook" /></a></span>
			<span class="location"><a href="https://goo.gl/maps/NwJpW7TUUHN2" title="Google Maps" target="_blank" class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/footer-location-icon.png" alt="Google Maps" /></a><a href="https://goo.gl/maps/NwJpW7TUUHN2" target="_blank" title="2000 N 4th Ave | Sioux Falls, SD 57104">2000 N 4th Ave | Sioux Falls, SD 57104</a></span>
			<span class="name">&copy; Sioux Falls Crane &amp; Hoist, Inc.</span>
			<span class="logo"><a href="/" title="&copy; Sioux Falls Crane &amp; Hoist, Inc. logo" class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/footer-logo.jpg" alt="&amp;" /></a></span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
