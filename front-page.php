<?php
/**
 * The main frontpage template file.
 *
 * @since 1.0
 *
 * @package meta_s2
 */

get_header(); ?>
	
	<?php 
	if( meta_s2_has_featured_posts() ) :
		$featured_posts = meta_s2_get_featured_posts();
		$post_count = count($featured_posts);
		?>
		<div class="featured-posts">
			<?php foreach( $featured_posts as $post ) :
				setup_postdata( $post ); ?>
				<div class="featured-post">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'meta_s2_featured'); ?><span class="overlay"></span></a>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php meta_s2_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>