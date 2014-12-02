<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( home_url() ); ?>/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( home_url() ); ?>/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( home_url() ); ?>/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( home_url() ); ?>/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( home_url() ); ?>/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( home_url() ); ?>/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( home_url() ); ?>/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( home_url() ); ?>/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="<?php echo esc_url( home_url() ); ?>/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="<?php echo esc_url( home_url() ); ?>/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="<?php echo esc_url( home_url() ); ?>/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo esc_url( home_url() ); ?>/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="<?php echo esc_url( home_url() ); ?>/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="<?php echo esc_url( home_url() ); ?>/mstile-144x144.png">

	<!-- Open Graph protocol -->
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/og-image.png">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:image:type" content="image/png">

	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<div id="pre-header" class="section">
		<?php get_template_part( 'pre-header-search' ); ?>
		
		<div class="container">
			<div class="phone">+44 20 7946 0985</div>

			<?php // get_template_part( 'content', 'social-links' ); ?>
		</div><!-- .container -->
	</div><!-- .section -->

	<header id="masthead" class="site-header section" role="banner">
		<div class="container">
			<div class="site-branding">
				<h5 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( get_theme_mod( 'mbdmaster_header_logo' ) ) : ?>
<img src="<?php echo esc_url( get_theme_mod( 'mbdmaster_header_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">
<?php else : ?>
<?php bloginfo( 'name' ); ?>
<?php endif; ?>
					</a>
				</h5>
				<a id="nav-toggle" class="toggle"><!-- id "menu-toggle" required by responsive-nav.js Using custom toggle so can be translated -->
					<span class="visuallyhidden"><?php _e( 'Menu', '_mbbasetheme' ); ?></span>
				</a>

			</div>


			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_mbbasetheme' ); ?></a>

			<nav class="nav-collapse main-navigation">
			<a id="search-toggle" class="icon-search toggle"><span class="visuallyhidden">Search</span></a>
			<?php 
					wp_nav_menu( 
						array( 
							'theme_location' => 'primary', 
							'container' => 'ul', 
							'container_class' => 'nav-collapse main-navigation' // Required by responsive-nav.js
						) 
					); 
				?>
				
				
				<!-- <div id="nav-bar-search"><?php // get_search_form(); ?></div>-->
			</nav><!-- .nav-collapse .main-navigation -->
			
		
		</div><!-- .container -->
	</header><!-- #masthead -->
<div id="content">	

