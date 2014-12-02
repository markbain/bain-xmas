<?php /* Index */ get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	
			<div id="lead" class="section">
				<div class="container">
					<div class="hero-lede">
							<?php 
						
									_e( 'Blog', '_mbbasetheme' ); 


							?>
					</div><!-- .hero-lede -->
				</div><!-- .container -->
			</div><!-- .section -->

<?php if ( have_posts() ) : ?>
	<div class="section">
		<div class="container grid-wrapper masonrycontainer">
			<div class="grid-sizer"></div>
			<div class="gutter-sizer"></div>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'archive' ); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- .grid-wrapper -->
	</div><!-- .section -->
	<?php wp_pagenavi(); ?>
<?php endif; ?>	 
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
