<?php /* Index */ get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="lead" class="section">
				<div class="container">
					<div class="hero-lede">
							<?php 
								if ( is_singular( 'post' ) ):
									_e( 'Blog Post', '_mbbasetheme' ); 

									// Portfolio item archives
									elseif (is_singular( 'portfolio_item' ) ) :
									_e( 'Book', '_mbbasetheme' ); 

								else :
									_e( 'Archives', '_mbbasetheme' );

								endif;
							?>
					</div><!-- .hero-lede -->
				</div><!-- .container -->
			</div><!-- .section -->
			<?php get_template_part( 'content', 'single' ); ?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
			<div class="section post-navigation">
				<div class="container">
					<?php	get_template_part( 'content', 'bookshelf' ); ?>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
