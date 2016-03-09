<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artist_website
 */

?>

<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->

	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
   		<a href=" <?php echo esc_url( get_permalink() ) ?> ">
            <?php the_content(); ?>
		</a>
	</div><!-- .entry-content -->

<!-- </article> -->
<!-- #post-## -->
