<?php /* Content - Home */ ?>

<div class="media-object blog-archive-item">


<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<a href="<?php the_permalink(); ?>" class="image-wrapper"><?php 
    if ( has_post_thumbnail() ) { 
        the_post_thumbnail(  ); 
    } 
?></a>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php mbdmaster_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->



</article><!-- #post-## -->
</div><!-- .media-object -->
