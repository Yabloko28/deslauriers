<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package artist_website
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-slide');

			// If comments are open or we have at least one comment, load up the comment template.

		endwhile; // End of the loop.
		?>
		
<a href="<?php echo get_next_subcategory_post_link( '%link', 'Right', TRUE ); ?>">Previous</a>
<a href="<?php echo get_previous_subcategory_post_link( '%link', 'Right', TRUE ); ?>">Next</a>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
