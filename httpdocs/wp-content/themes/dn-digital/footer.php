	<div id="contact" class="section">
		<div class="container">	
			<h3>Get in touch</h3>
			<h2><a href="mailto:hello@dndigital.net">hello@dndigital.net</a>
		</div><!-- .container -->
	</div><!-- .section -->

	<div id="visit" class="section">
		<div class="container">	
			<h3>Come & see us</h3>
			<p>35 Kingsland Road,<br> 
			London,<br> 
			E2 8AA,<br>
			UK</p>
			<span class="meta"><a href="https://www.google.es/maps/place/35+Kingsland+Rd,+London,+Shoreditch,+Greater+London+E2+8AA,+UK/@51.526737,-0.059942,14z/data=!4m2!3m1!1s0x48761cbbb8d13e71:0x3ab7bc4715d334c7?hl=en-GB">See us on Google Maps</a></span>
		</div><!-- .container -->
	</div><!-- .section -->
	
</div><!-- #content -->


	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="footer-widgets" class="widget-area section">
			
				
				<div class="masonrycontainer container">
					<div class="grid-sizer"></div>
					<div class="gutter-sizer"></div>				
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				
				
				</div>
				
			
		</div><!-- .widget-container -->
	<?php endif; ?>




	<footer id="colophon" class="section site-footer" role="contentinfo">
		<div class="container">


		<div class="social">
			<ul class="social-media-links">
				<li><a href=""><i aria-hidden="true" class="fa fa-twitter-square"></i><span class="visuallyhidden">Twitter</span></a></li> 
				<li><a href=""><i aria-hidden="true" class="fa fa-facebook-square"></i><span class="visuallyhidden">Facebook</span></a></li> 
				<!-- <li><a href="<?php bloginfo('rss2_url'); ?>"><i aria-hidden="true" class="icon-feed icon-left"></i><span class="visuallyhidden">RSS</span></a></li>-->
			</ul>
		</div><!-- .social -->




		<div class="site-info">
			<div id="copyright">&copy; <?php echo date("Y"); ?> <?php echo bloginfo( 'name' ); ?></div> 
		<!--	<p id="tagline">
				<?php echo get_bloginfo( 'description' ); ?>
			</p> --> 
		<!-- <div id="design">Made by <a href="http://markbaindesign.com" title="Visit the website of Mark Bain Design">Mark Bain Design</a>
		</div>--><!-- #design -->

		</div><!-- .site-info -->

		<div id="back-to-top" >
			<a href="#header" title="Go back to the top" class=""><span class="visuallyhidden">Back to top</span> <span class="fa-stack"><i class="fa fa-angle-double-up fa-inverse fa-stack-1x"></i><i class="fa fa-circle-o fa-stack-2x"></i></span></a>
		</div><!-- #back-to-top -->

		</div><!-- .container -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
