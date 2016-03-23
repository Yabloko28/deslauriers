<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artist_website
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
		$bio1 = get_field( "bio" );
		$bio2 = get_field( "bio2" );
        $bio3 = get_field( "bio3" );
        $image = get_field( "bio-image" ); ?>

        <p class="bio"><?php echo $bio1; ?></p>
        <p class="bio2"><?php echo $bio2; ?></p>
        <p class="bio3"><?php echo $bio3; ?></p>

        <div class="bio-image"><img src="<?php echo $image; ?>"></div>
        
        <section class="cv">
            <h2>CV</h2>
            <div class="columns"><?php echo the_content(); ?></div>
        </section>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
