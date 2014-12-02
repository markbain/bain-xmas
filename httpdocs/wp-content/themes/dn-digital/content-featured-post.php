<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>">
	<?php
		if ( has_post_thumbnail() ) :
			if ( 'grid' == get_theme_mod( 'featured_content_layout' ) )
				the_post_thumbnail( 'post-thumbnail-grid' );
			else
				the_post_thumbnail( 'tesoltrainingscotland-post-thumbnail-slider-gr' );
		endif;
	?>
	</a>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
