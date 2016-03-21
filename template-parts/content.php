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
       
   		<a href=" <?php echo esc_url( get_permalink() ) ?> ">
   		    <img src="<?php echo get_field('main_image'); ?>" />
		</a>
	</div><!-- .entry-content -->

<!-- </article> -->
<!-- #post-## -->
