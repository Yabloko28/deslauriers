<?php
/**
 * Template part for displaying video posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artist_website
 */

?>


	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
<div><?php get_the_content() ?></div>
	</div><!-- .entry-content -->

