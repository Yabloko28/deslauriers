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
		
        <p class="back-to"><i class="fa fa-arrow-left"></i><a class="back" href="<?php echo get_category_link($sub); ?>">Back to <?php echo get_cat_name($sub) ?></a></p>
		<p class="count"> <?php echo ($key + 1);?> of <?php echo count(get_posts_in_category($sub)); ?></p>
        
        <a class="next-image" href="<?php echo get_previous_subcategory_post_link( '%link', 'Right', TRUE ); ?>" >

        <?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-slide');

			// If comments are open or we have at least one comment, load up the comment template.

		endwhile; // End of the loop.
		?>
        </a>


<?php 
    $sub = get_the_subcategory('cat');
    $sublink = get_category_link($sub);

    ?>

<?php if(($key+1) == 1) {
    
} else { ?>

<div class="previous"><a href="<?php echo get_next_subcategory_post_link( '%link', 'Right', TRUE ); ?>"><img class="static" src="http://nadyascreatures.com/images/previous.svg"><img class="hover" src="http://nadyascreatures.com/images/previous-hover.svg"></a></div>

<?php
} 

if(($key+1) == $length) {
    
} else { ?>

<div class="next"><a href="<?php echo get_previous_subcategory_post_link( '%link', 'Right', TRUE ); ?>"><img class="static" src="http://nadyascreatures.com/images/next.svg"><img class="hover" src="http://nadyascreatures.com/images/next-hover.svg"></a></div>
<?php
} 
        $materials = get_field( "materials" );
        $year = get_field( "year" );
        $dimensions = get_field( "dimensions" ); ?>
        <p class="materials"><?php echo $materials; ?></p>
        <p class="dimensions"><?php echo $dimensions; ?></p>
        <p class="year"><?php echo $year; ?></p>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
