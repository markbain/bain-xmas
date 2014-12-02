<div class="bookshelf">

<?php 
	/*
	 * Custom query to display other recent items
	 *
	 */
 	global $post;
	$args=array(  
	    'post__not_in' 		=> array($post->ID),  
	    'post_type'			=> 'portfolio_item',
	);  
	$my_query = new wp_query( $args );
	
	while ( $my_query->have_posts() ):
		$my_query->the_post();
				
		// Cover images
		$thumb_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src( $thumb_id,'thumbnail', true);
 ?>


	<div class="book-item media-object">
		<a href="<?php the_permalink(); ?>">
		<article>
			<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
		</article>
		<div class="image-wrapper">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url[0]; ?>"></a>
		</div>
	</div>

				<?php endwhile; ?>
				<?php 
					// Prevent weirdness
					wp_reset_postdata(); 
?>

</div>
