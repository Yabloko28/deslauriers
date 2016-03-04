<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artist_website
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>

			<?php
			echo get_query_var('cat');
            $c = get_query_var('cat');
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'get_post_format()' );
echo the_ID();

			endwhile;
 
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
<?php 		
		
		 ?>
		 <?php $arr = get_posts(); 
          
		 ?>

		 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


       
<?php 
if (is_subcategory($c) == 1) {
    $p = get_posts();
	$sub = get_the_subcategory($c);
    if (in_category($sub)) {
	        	while ( have_posts() ) : the_post();
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	    endwhile;
    }
} else {
	$p = get_posts();
    if (in_category($c)) {
    	while ( have_posts() ) : the_post();
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	    endwhile;
    }
}
?>


</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_sidebar();
get_footer();
