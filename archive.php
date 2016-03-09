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
		
		get_query_var('cat');
        $c = get_query_var('cat');

		if(is_subcategory($c) == 1) { ?>
			
			<h2 class="cat-title"><?php single_cat_title(); ?></h2>
			<div class="cat-description"><?php echo category_description($c); ?></div>

        <?php }
		if ( have_posts() ) : 
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				$parent_cat = get_category_parents($c);
				if (in_category(3)) {
					get_template_part( 'template-parts/content-video', 'get_post_format()' );
				} else {
 				    get_template_part( 'template-parts/content', 'get_post_format()' );
 				}

			endwhile;
 
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
<?php 		
		
		 ?>
		 <?php $arr = get_posts(); 
          
		 ?>
		 
<section id="post-<?php the_ID(); ?>"  class="slide-page">

</section><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_sidebar();
get_footer();
