<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthcareinc
 */

?>

<section id="primary" class="content-area container">
	<main id="main" class="site-main">

		<header class="page-header">
			<h1 class="page-title"><h1 class="page-title"><strong>No</strong> Results</h1></h1>
		</header><!-- .page-header -->

		<p style="text-align:center;"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'healthcareinc' ); ?></p>

		<div class="widget_search">
			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>" autocomplete="off">
				<label class="screen-reader-text" for="s">Buscar:</label>
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="s">
				<button type="submit" id="searchsubmit">
				    Search <i class="fas fa-angle-right"></i>
				</button>
			</form>
		</div>

	</main><!-- #main -->
</section><!-- #primary -->
