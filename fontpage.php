<?php
/**
 * The main frontpage tamplte file.
 *
 * @since 
 *
 * @package meta_s2
 */

get_header(); ?>

<?php
// Get our Featured Content posts
$feat_post = themeslug_get_featured_content();
 
// If we have no posts, our work is done here
if ( empty( $feat_post ) )
    return;
 
// Let's loop through our posts ?>
<div class="fc-wrap">
    <?php foreach ( $feat_post as $post ) : setup_postdata( $post ); ?>
        <div class="fc-post" style="border: 1px solid #333;margin: 20px;">
            <h3><?php the_title(); ?></h3>
            <?php get_featured_image(); ?>
            <?php the_excerpt(); ?>
        </div><!-- .fc-post -->
    <?php endforeach; ?>
</div><!-- .fc-wrap -->
<?php wp_reset_postdata(); 
?>



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