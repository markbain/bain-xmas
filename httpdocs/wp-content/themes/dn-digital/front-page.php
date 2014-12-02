<?php /* Front Page */ get_header(); ?>

<div class="hero section" style="background-image:url('<?php echo esc_url( get_theme_mod( 'mbdmaster_hero_background' ) ); ?>');">
	<div class="container">
		<div class="hero-image">
			<?php if ( get_theme_mod( 'mbdmaster_hero_logo' ) ) : ?>
	        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'mbdmaster_hero_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>

<?php else : ?>
    <hgroup>
        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
           </hgroup>
<?php endif; ?>
				</div>
				<div class="hero-text">
					<div class="tagline">
						<h1><?php bloginfo( 'description' ); ?></h1>
	<span type="button" role="button" aria-label="Toggle Navigation" class="nav-button lines-button x menu-button si-icons si-icons-easing">
									<span class="si-icon si-icon-hamburger-cross" data-icon-name="hamburgerCross">Hey</span>
				</span>
					</div>	
				</div><!-- .hero-text -->
			</div><!-- .container -->
	</div><!-- .hero -->

	<div id="intro" class="section">
		<div class="container">	
			<div class="content">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>

				<div class="hero-cta">
					<div class="wow fadeInLeft"><a href="mailto:<?php echo get_theme_mod( 'mbdmaster_email' ); ?>" class="button">Get in touch <i aria-hidden="true" class="fa fa-chevron-circle-right"></i></a></div>
					
					<div class="scene">
					  <div class="cube">
						 <span class="side top"><a href="mailto:<?php echo get_theme_mod( 'mbdmaster_email' ); ?>" >Get in touch <i aria-hidden="true" class="fa fa-chevron-circle-right"></i></a></span>
						 <span class="side front">Get in touch</span>
					  </div>
					</div>

				</div>

			</div><!-- .content -->		
		</div><!-- .container -->
	</div><!-- .section -->

<div class="section">
	<div class="container">
<style>
#icon {
display: block;
box-sizing: border-box;
width: 100%;
height: 250px;
margin: auto;
padding: 60px;
}
</style>

<span id="clickme">Click</span>
<script>
	function santatransform() {
		var svgMorpheus = new SVGMorpheus('#icon' );
		
			svgMorpheus.to('santa');
		svgMorpheus.to('account_circle');
		
	}

	// add event listener to table
	var el = document.getElementById("clickme");
	el.addEventListener("click", santatransform, false);

</script>
<svg id="icon" viewBox="0 0 48 48" style="background-color:#ffffff00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve">

<g id="santa" style="display:none">
	<path d="M24.615,36.031c0.981,0,1.879-0.369,2.567-0.967c0.54-0.47,0.171-1.369-0.545-1.369h-4.045
		c-0.716,0-1.086,0.899-0.545,1.369C22.735,35.662,23.633,36.031,24.615,36.031z" fill="#336699"/>
	<path d="M41.501,17.806c0-2.579-2.049-4.689-4.595-4.819c-2.531-5.78-7.028-11.961-12.147-11.961c-0.063,0-0.126,0.001-0.188,0.003
		c-0.062-0.001-0.125-0.003-0.188-0.003c-2.761,0-5.337,1.797-7.522,4.359c-1.154-0.834-2.571-1.326-4.104-1.326
		c-3.875,0-7.017,3.142-7.017,7.017c0,2.013,0.848,3.827,2.205,5.106c-0.182,0.507-0.281,1.054-0.281,1.624v1.946
		c0,1.262,0.492,2.411,1.288,3.272c-0.266,1.147-0.398,2.342-0.398,3.569c0,2.375,0.567,5.084,1.606,7.731
		c0.027,0.153,0.079,0.306,0.156,0.451c0.023,0.042,0.048,0.087,0.076,0.125c2.586,6.169,7.695,11.831,13.999,11.831
		c0.06,0,0.298,0,0.357,0c6.303,0,11.412-5.662,13.999-11.831c0.026-0.038,0.052-0.081,0.077-0.123
		c0.076-0.146,0.128-0.299,0.156-0.452c1.039-2.646,1.608-5.357,1.608-7.731c0-1.228-0.124-2.422-0.39-3.569
		c0.797-0.861,1.302-2.011,1.302-3.272V17.806z M9.407,14.099c-0.722-0.8-1.162-1.86-1.162-3.022c0-2.491,2.02-4.511,4.511-4.511
		c0.961,0,1.851,0.302,2.581,0.813c-1.212,1.756-2.258,3.705-3.092,5.609C11.17,13.042,10.187,13.451,9.407,14.099z M24.744,43.739
		c-0.018,0-0.355,0-0.373,0c-4.412,0-8.495-4.059-10.821-8.961c4.13-2.036,7.852-2.922,11.015-2.922s6.88,0.89,11.009,2.925
		C33.249,39.684,29.156,43.739,24.744,43.739z M36.684,31.956c-4.46-2.162-8.505-3.034-11.994-3.105h-0.286
		c-3.419,0.071-7.512,0.943-11.972,3.105c-0.567-1.798-0.875-3.633-0.875-5.357c0-0.708,0.063-1.404,0.175-2.081
		c0.246,0.04,0.505,0.058,0.764,0.058h7.674c-0.068,0.285-0.104,0.539-0.104,0.831c0,1.291,0.714,2.338,1.595,2.338
		s1.595-1.047,1.595-2.338c0-0.292-0.037-0.546-0.104-0.831h2.837c-0.065,0.285-0.104,0.539-0.104,0.831
		c0,1.291,0.714,2.338,1.596,2.338c0.88,0,1.593-1.047,1.593-2.338c0-0.292-0.036-0.546-0.104-0.831h7.674
		c0.259,0,0.513-0.02,0.761-0.06c0.111,0.677,0.166,1.375,0.166,2.083C37.569,28.322,37.25,30.158,36.684,31.956z M38.438,19.752
		c0,0.997-0.801,1.832-1.796,1.832H12.495c-0.995,0-1.769-0.834-1.769-1.832v-1.946c0-0.998,0.773-1.779,1.769-1.779h24.147
		c0.995,0,1.796,0.781,1.796,1.779V19.752z"fill="#336699" />
</g> 


    <g id="account_circle" style="display:none">
      <path d="M 24 4 C 13 4 4 13 4 24 C 4 35 13 44 24 44 C 35 44 44 35 44 24 C 44 13 35 4 24 4 L 24 4 Z" fill="#336699"/>
      <path d="M 24 10 C 27.3 10 30 12.7 30 16 C 30 19.3 27.3 22 24 22 C 20.7 22 18 19.3 18 16 C 18 12.7 20.7 10 24 10 L 24 10 Z" fill="#FFF"/>
      <path d="M 24 38.4 C 19 38.4 14.6 35.8 12 32 C 12.1 28 20 25.8 24 25.8 C 28 25.8 35.9 28 36 32 C 33.4 35.8 29 38.4 24 38.4 L 24 38.4 Z" fill="#FFF"/>
    </g>

  </svg>

</div>
</div>
	<?php get_template_part( 'content', 'portfolio-excerpt' ); ?>


	<div id="quotes" class="section">
		<div class="container">	
			<?php	get_template_part( 'module', 'slider' ); ?>
		</div><!-- .container -->
	</div><!-- .section -->

	<div id="clients" class="section">
		<div class="container">
			<h3>Some of our clients</h3>	
			<div class="flexslider logo-carousel">
  <ul class="slides">
    <li>
      <img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-02.png" />
    </li>
    <li>
      <img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-03.png" />
    </li>
    <li>
      <img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-04.png" />
	 </li>    
	<li><img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-11.png" /></li>
	<li><img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-12.png" /></li>
	<li><img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-14.png" /></li>
	<li><img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-16.png" /></li>
	<li><img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-20.png" /></li>
	<li><img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-25.png" /></li>
	<li><img src="<?php echo get_bloginfo('template_url') ?>/assets\images\logos\Dhub-Client-Logos-Grey-27.png" /></li>

  </ul>
</div>
		</div><!-- .container -->
	</div><!-- .section -->

<?php get_footer(); ?>
