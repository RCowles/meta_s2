<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package meta_s2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

	<header id="masthead" class="site-header" role="banner">
	
		<div class="wrapper">
		
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
				
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'meta_s2' ); ?></h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'S	kip to content', 'meta_s2' ); ?>"><?php _e( 'Skip to content', 'meta_s2' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		
			</div> <!-- .wrapper !-->
		
	</header><!-- #masthead -->
			
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) && is_front_page()) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="100%" height="<?php echo get_custom_header()->height; ?>" alt="" class="banner">
			</a>
		<?php } // if ( ! empty( $header_image ) ) ?>
		
		<?php
		/* Featured Content
			if( wcp_has_featured_posts() ) :
			$featured_posts = wcp_get_featured_posts();
			$post_count = count($featured_posts);
			?>
			<div class="wcp-featured-posts post-count-<?php echo $post_count; ?>">
			<?php foreach( $featured_posts as $post ) :
				setup_postdata( $post ); ?>
				<div class="hentry wcp-featured-post">
					<h2 class="entry-title title"><a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'wcp-front-feature'); ?><span class="overlay"></span></a></div>
					<div class="entry-summary"><?php the_excerpt(); ?></div>
					<a class="readmore" href="<?php the_permalink(); ?>"><span>Read More&hellip;</span></a>
				</div>
			<?php endforeach; ?>
			</div>
		<?php endif; 
		*/ ?>
		
	<nav class="sub-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav> <!-- .sub-navigation !-->
	<div id="content" class="site-content">