<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthcareinc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php search_excerpt_highlight('46'); ?>
	</div><!-- .entry-summary -->

	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php
			$u_time = get_the_time('U');
			$u_modified_time = get_the_modified_time('U');
			if ($u_modified_time >= $u_time + 86400) {
				echo "<h6>Updated on: ";
				the_modified_time('F jS, Y');
				echo "</h6>"; 
			} else {
				echo '<h6>';
				echo ""; the_time('F jS, Y');
				echo '</h6>';
			}
		?>
	</div><!-- .entry-meta -->
	<?php endif; ?>

	<footer class="entry-footer"></footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->