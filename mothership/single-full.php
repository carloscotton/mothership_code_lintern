<?php
/*
 * Template Name: Best Page
 * Template Post Type: post
 */

get_header();
?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single-full' );

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->


<?php

if ( 'post' !== get_post_type() ) : 
	get_sidebar();
endif;

get_footer();
