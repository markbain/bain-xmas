<h3>What our clients are saying</h3>
<section id="slider" class="content-insert">
      <div class="flexslider testimonials-slider">
        <ul class="slides">
<?php 
	
$my_query = new WP_Query( array (
	'post_type' => 'team_member',
	'orderby' => 'rand',
	'meta_key' => 'featured_testimonial',
	'meta_value' => 'yes'

) );

//p2p_type( 'nice_stuff' )->each_connected( $my_query, array(), 'actors' );

if( $my_query->have_posts() ) : while( $my_query->have_posts()) : $my_query->the_post();?>
<?php 
	
	// Vars
	$thumb_id = get_post_thumbnail_id();
	$thumb_id_2 = get_the_post_thumbnail( $post->ID,'thumbnail', true );
	$image_url = wp_get_attachment_image_src( $thumb_id,'thumbnail', true);
	$my_excerpt = get_the_excerpt();
	$reviewer_name = get_post_meta($post->ID, 'reviewer_name', true);
	$reviewer_link = get_post_meta($post->ID, 'reviewer_link', true);
	$reviewer_description = get_post_meta($post->ID, 'reviewer_description', true);

?>
			<li class="slide media_block" data-thumb="<?php echo $image_url[0]; ?>">


				<div class="media_block-text">
					<blockquote>
						<p><?php echo $my_excerpt; ?></p>
					</blockquote>
				</div><!-- .media_block-text -->

					<span ><?php echo $reviewer_name; ?></span>
					<div class="meta"><?php echo $reviewer_description; ?></div>


					
			 </li><!-- slide media_block -->
					<?php wp_reset_postdata(); ?>			<?php endwhile; ?>

	<?php endif; ?>
        </ul>
    </div>
</section>
