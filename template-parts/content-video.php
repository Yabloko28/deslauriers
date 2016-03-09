<?php
/**
 * Template part for displaying video posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artist_website
 */

?>


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_title( '<h2 class="entry-title"></h2>' ); ?>

        <?php the_content(); ?>

            

	</div><!-- .entry-content -->

