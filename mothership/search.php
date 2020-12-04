<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package healthcareinc
 */

get_header();
?>

	<section id="primary" class="content-area container">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><strong>Search</strong> Results</h1>
			</header><!-- .page-header -->

			<div class="widget_search">
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>" autocomplete="off">
					<label class="screen-reader-text" for="s">Buscar:</label>
					<input type="text" value="<?php the_search_query(); ?>" name="s" id="s">
					<button type="submit" id="searchsubmit">
					    Search <i class="fas fa-angle-right"></i>
					</button>
				</form>
			</div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			healthcareinc_paging_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
