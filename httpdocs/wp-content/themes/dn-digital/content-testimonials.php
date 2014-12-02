<!-- Testimonials -->
<div id="single-book-testimonials">
	<div id="testimonials-title">What people are saying about <span><?php the_title(); ?></span></div>

<section id="slider">
      <div class="flexslider">
        <ul class="slides">
<?php 

query_posts(array('post_type' => 'team_member','orderby' => 'rand')); if(have_posts()) : while(have_posts()) : the_post();?>
<?php 
	$thumb_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src( $thumb_id,'thumbnail', true); 
?>
			<li class="slide media_block" data-thumb="<?php echo $image_url[0]; ?>">
				<div class="media_block-text">
					<blockquote>
						<?php the_excerpt(); ?>
					</blockquote>
				</div><!-- .media_block-text -->
				<div class="media_block-image">
					<?php the_post_thumbnail(); ?>
					<span class="meta"><cite><?php the_title(); ?></cite></span>
				</div><!-- .media_block-image -->
			 </li><!-- slide media_block -->

        <?php endwhile; endif; wp_reset_query(); ?>
        </ul>
    </div>
</section>
