<div class="content-insert media-object">
<?php 

	$thumb_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src( $thumb_id,'thumbnail', true); 

?>

	<blockquote>
		<?php the_excerpt(); ?>
	</blockquote>
	<div class="media_block-image">
		<?php the_post_thumbnail(); ?>
		<span class="meta"><cite><?php the_title(); ?></cite></span>
	</div>
</div><!-- .testimonial-insert .media-object -->
