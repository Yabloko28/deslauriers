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
            //     $sub = get_the_subcategory('cat');
            // echo count(get_posts_in_category($sub));
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				if (is_category('Video')) {
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


       
<?php
// // $np = get_next_post(); 
// // $n = array();
// // array_push($n, $np);
// // print_r($n);
// $p = get_posts();
// if (is_subcategory($c) == 1) {
//     $p = get_posts();
// 	$sub = get_the_subcategory($c);
//     if (in_category($sub)) {
//     	// echo count($p);
// 	    $n = array();
//     	// the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
// 	    while ( have_posts() ) : the_post();
// 	    // print_r(the_post());
//  	    array_push($n, the_post());
//             // the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
// 	    endwhile;
//   	// echo count($n);
//     }
// } else {
// 	$p = get_posts();
//     if (in_category($c)) {
//     	// print_r($p);
//     	    	 $n = array();
//     	while ( have_posts() ) : the_post();
    		   
// 	    // echo(count($n));


//             // the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
// 	    endwhile;
//     }
// }
?>


</section><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_sidebar();
get_footer();
