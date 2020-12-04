<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthcareinc
 */

?>
<div class="single-article-post">
<div class="container">
	<div class="row">
		<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	
	<div rel="bookmark" class="author-latest-article">
			<header class="entry-header">
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
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

			<footer class="entry-footer">
			</footer><!-- .entry-footer -->
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
	</div>
</div>
</div>
