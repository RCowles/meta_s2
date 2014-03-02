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
				<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'meta_s2' ); ?>"><?php _e( 'Skip to content', 'meta_s2' ); ?></a></div>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->

		</div> <!-- .wrapper !-->
	</header><!-- #masthead -->

	<?php
	/**
	 * Let's show some Featured Content
	 */
	if( is_front_page() && meta_s2_has_featured_posts() ) :
		$featured_posts = meta_s2_get_featured_posts();
		$post_count = count($featured_posts);
		?>
		<div class="featured-posts">
			<?php foreach( $featured_posts as $post ) :
				setup_postdata( $post ); ?>
				<figure class="cap-left">
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
						<?php the_post_thumbnail( 'meta_s2_featured'); ?>
						<figcaption>
							<?php the_title(); ?>
						</figcaption>
					</a>
				</figure>
			<?php endforeach; ?>
		</div> <!-- .featured-posts !-->
	<?php endif; ?>

	<nav class="sub-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav> <!-- .sub-navigation !-->

	<div id="content" class="site-content">