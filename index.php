<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artist_website
 */

get_header(); ?>
    <nav>
    	<ul>
    		<li>Paper Work</li>
    		<li>Video Work</li>
    		<li>Performative Work</li>
    		<li>CV / Bio</li>
    		<li>Contact</li>
    	</ul>
    </nav>
	<div ui-view></div>
	<h1>{{page_title}}</h1>

    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
