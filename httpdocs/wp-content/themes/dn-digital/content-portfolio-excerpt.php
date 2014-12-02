<?php 
/* Content - Front Page 
 *
 * Display feature projects
 *
*/ 
?>
<?php $my_query = new WP_Query( array (
	'post_type' => 'portfolio_item'
	// 'meta_key' => 'featured_project',
// 'meta_value' => 'yes'

) );

if( $my_query->have_posts() ); ?>
<?php while( $my_query->have_posts()) : $my_query->the_post();?>
<?php 
	
	// Vars
	$thumb_id = get_post_thumbnail_id();
	$thumb_id_2 = get_the_post_thumbnail( $post->ID,'thumbnail', true );
	$image_url = wp_get_attachment_image_src( $thumb_id,'thumbnail', true);
	$my_excerpt = get_the_excerpt();

?>
	<div class="case-study section" style="background-image:url('<?php echo $image_url[0]; ?>');background-size: cover;background-position: 50% 50%;">
		<div class="container">	
			<div class="content">
				<h3><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3> 
				<?php the_excerpt(); ?>
				
					<div class="cta">
						<div class="wow fadeInLeft"><a href="" class="cta button cta-primary">Do this <i aria-hidden="true" class="icon-arrow-right"></i></a></div>
						<div class="wow fadeInRight"><a href="" class="cta cta-secondary">or, alternatively, do this<i aria-hidden="true" ></i></a></div>
					</div>

			</div><!-- .content -->		
		</div><!-- .container -->
	</div><!-- .section -->
<?php wp_reset_postdata(); ?>			
<?php endwhile; ?>
