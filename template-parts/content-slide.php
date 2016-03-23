<?php
/**
 * Template part for displaying Aside posts on index pages
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php the_content(); ?>
<?php the_title( '<h2 class="entry-title">', '</h2>' )?>

</article><!-- #post-## -->
