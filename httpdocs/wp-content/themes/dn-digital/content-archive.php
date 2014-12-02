<?php
/**
 * @package _mbbasetheme
 */
?>
<div class="section">
<div class="container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	


		



	
	<div class="entry-content">
		<header class="entry-header">
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
		<div class="entry-meta meta">
			<?php	mbdmaster_posted_on(); ?>
		</div><!-- .entry-meta -->	
		</header><!-- .entry-header -->
		<div class="image-wrapper">
			<?php 
				if ( has_post_thumbnail() ) { 
					the_post_thumbnail( 'book-cover' ); 
				} 
			?>
		</div><!-- .image-wrapper -->		<?php the_excerpt(); ?>


	</div><!-- .entry-content -->


</article><!-- #post-## -->
</div>
</div>
