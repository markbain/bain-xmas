<?php
/**
 * @package _mbbasetheme
 */
?>
<div class="section">
<div class="container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	


	<aside>				
		<div class="image-wrapper">
			<?php 
				if ( has_post_thumbnail() ) { 
					the_post_thumbnail( 'book-cover' ); 
				} 
			?>
		</div><!-- .image-wrapper -->
		<div class="entry-meta meta">
			<?php
				if ( is_singular( 'portfolio_item' ) ) {
					get_template_part( 'content', 'purchase-options' );
				} else {

							mbdmaster_posted_on();		
							mbdmaster_post_meta();
							edit_post_link( __( 'Edit', '_mbbasetheme' ), '<span class="edit-link">', '</span>' ); }
						
			?>
		</div><!-- .entry-meta -->	
	</aside>	
	
	<div class="entry-content">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_mbbasetheme' ),
				'after'  => '</div>',
			) );
		?>
		<?php
			if ( is_singular( 'portfolio_item' ) ) {
				get_template_part( 'content', 'testimonials' );
			}
		?>
	</div><!-- .entry-content -->

	<?php

			$connected_reviews = new WP_Query( array( 
				'connected_type' => 'nice_stuff',
				'connected_items' => get_queried_object(),
				'nopaging' => true,
			) );
			
			if ( is_singular( 'portfolio_item' ) && $connected_reviews->have_posts() ) : ?>
				<?php while ( $connected_reviews->have_posts() ) : $connected_reviews->the_post();
					// Reviews
					$reviewer_name = get_post_meta($post->ID, 'reviewer_name', true);
					$reviewer_link = get_post_meta($post->ID, 'reviewer_link', true);
					$reviewer_description = get_post_meta($post->ID, 'reviewer_description', true);
				?>
			<?php the_title(); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
	<?php endif; // have_posts ?>
	<?php // is_ singular ?>
					
</article><!-- #post-## -->
</div>
</div>
