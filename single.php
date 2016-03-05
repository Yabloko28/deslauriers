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
            $sub = get_the_subcategory('cat');
            $new_array = get_posts_in_category($sub);
            $key = array_search(get_post(), $new_array);
            $length = count(get_posts_in_category($sub));
        ?>
		<p> <?php echo ($key + 1);?> of <?php echo count(get_posts_in_category($sub)); ?></p>
        <a href="<?php echo get_category_link($sub); ?>">Back to <?php echo get_cat_name($sub) ?></a> 
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-slide');

			// If comments are open or we have at least one comment, load up the comment template.

		endwhile; // End of the loop.

		?>
<?php 
    $sub = get_the_subcategory('cat');
    $sublink = get_category_link($sub);

    ?>

<?php if(($key+1) == 1) {
    
} else { ?>

<a href="<?php echo get_next_subcategory_post_link( '%link', 'Right', TRUE ); ?>">Previous</a>

<?php
} 

if(($key+1) == $length) {
    
} else { ?>

<a href="<?php echo get_previous_subcategory_post_link( '%link', 'Right', TRUE ); ?>">Next</a>
<?php
} ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
