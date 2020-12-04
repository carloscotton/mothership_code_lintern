<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthcareinc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row-archive'); ?>>
	
	<div rel="bookmark" class="archive-latest-article">
		<div class="entry-image">
			<?php the_post_thumbnail('content-hub-latest-articles'); ?>
		</div>

		<div class="archive-content">
			<header class="entry-header">
				<a title="<?php echo get_the_title(); ?>" href="<?php the_permalink(); ?>"><h3 class="entry-title"><?php echo get_the_title(); ?></h3></a>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php $yoastDesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); if($yoastDesc){
					echo '<p>'.substr($yoastDesc, 0, 110).'...</p>';
				} else {
					the_excerpt();
				} ?> 
			</div>

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
				<span>By</span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
			</div><!-- .entry-meta -->
			<?php endif; ?>

		</div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->