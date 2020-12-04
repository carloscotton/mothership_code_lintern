<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthcareinc
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>


			<?php 
				$category = single_term_title("", false); 
				$catid = get_cat_ID( $category ); 
				$category_featured_image = get_field('category_featured_image', 'category_'.$catid); 
				$image_cat = $category_featured_image['id'];
				$size_hero = 'content-hub-hero-header'; 
				$category_bg = wp_get_attachment_image_src( $image_cat, $size_hero);
				if(is_category()):// only run this on category page
				    $cc = get_queried_object();
				endif;

				$content_hub_looking_for_posts_and_pages = get_field('content_hub_looking_for_posts_and_pages', 'category_'.$cc->cat_ID);
				$category_important_articles = get_field('category_important_articles', 'category_'.$cc->cat_ID);
				$category_rail_categories =  get_field('category_rail_categories', 'category_'.$cc->cat_ID);

				$category_hero_title =  get_field('category_hero_title', 'category_'.$cc->cat_ID);
				$category_title_1 =  get_field('category_title_1', 'category_'.$cc->cat_ID);
				$category_title_2 =  get_field('category_title_2', 'category_'.$cc->cat_ID);
			?>

			<?php if($content_hub_looking_for_posts_and_pages) { ?>
			<header class="page-header" style="<?php if($content_hub_looking_for_posts_and_pages) { echo 'padding-bottom:160px;'; } ?> background:url(<?php echo $category_bg[0]; ?>) center center no-repeat transparent; background-size:cover;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<?php if($category_hero_title) { ?>
								<?php echo $category_hero_title; ?>
							<?php } ?>

							<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
						</div>
					</div>
				</div>
			</header><!-- .page-header -->
			<?php } ?>

			<?php if($content_hub_looking_for_posts_and_pages) { ?>
			<div class="archive-looking-for" <?php if($content_hub_looking_for_posts_and_pages) { echo 'style="margin-top:-208px;"'; } ?>>
				<div class="container">
					<?php if($category_title_1) { ?>
					<div class="row">
						<div class="col-md-12">
							<h2><?php echo $category_title_1; ?></h2>
						</div>
					</div>
					<?php } ?>
					<div class="row">

					<?php if( $content_hub_looking_for_posts_and_pages ) {

						$rows = $content_hub_looking_for_posts_and_pages;
						foreach($rows as $row){
							$thumbnail = wp_get_attachment_image_src( $row['image'], 'content-hub-looking-for' );
							echo '<div class="col-lg-4 col-md-4 col-12"><div class="archive-looking-for-content"><div class="archive-looking-for-content-image"><img src="'.$thumbnail[0].'" /></div><div class="archive-looking-for-content-icon"></div><h4>'.$row['fontawesome_icon'].'<a href="'.$row['link'].'">'.$row['title'].'</a></h4><p>'.$row['text'].'</p></div></div>';
						}

					} ?>
					</div>
				</div>
			</div>
			<?php } ?>

			<?php if($category_important_articles){ ?>
			<div class="archive-important-articles">
				<div class="container">

					<?php
					$c = 0;
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
					    'post__in' => $category_important_articles,
					);
					// The Query
					$the_query = new WP_Query( $args );
					 
					// The Loop
					if ( $the_query->have_posts() ) { ?>

					<?php if($category_title_2) { ?>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<h2><?php echo $category_title_2; ?></h2>
						</div>
					</div>
					<?php } ?>

					<div class="row row-important">

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<?php if ( $c == 0 ) { ?>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="archive-important-articles-content archive-important-articles-primary">
								<div class="archive-important-articles-content-img">
									<?php the_post_thumbnail('content-hub-important-articles'); ?>
								</div>
								<div class="archive-important-articles-content-text">
									<div class="entry-header">
										<a href="<?php the_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3></a>
										<?php $yoastDesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); if($yoastDesc){
											echo '<p>'.substr($yoastDesc, 0, 80).'...</p>';
										} else {
											the_excerpt();
										} ?>
									</div>

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
								</div>
							</div>
						</div>
					<?php } else { ?>

						<div class="col-lg-4 col-md-4 col-12">
							<div class="archive-important-articles-content">
								<div class="archive-important-articles-content-secondary-img">
									<?php the_post_thumbnail('content-hub-important-articles-secondary'); ?>
								</div>
								<div class="archive-important-articles-content-text">
									<div class="entry-header">
										<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><h3><?php echo get_the_title(); ?></h3></a>
										<?php $yoastDesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); if($yoastDesc){
											echo '<p>'.substr($yoastDesc, 0, 80).'...</p>';
										} else {
											the_excerpt();
										} ?>
									</div>

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
								</div>
							</div>
						</div>
					<?php } $c++; ?>

					<?php endwhile; wp_reset_postdata(); ?>
					</div>

					<?php if ( $c > 0 ) { ?>
					<div class="row">
						<div class="col-md-12">
							<ul class="sliderDots">
								<?php 
									$rest = 3;
									for ($c = 4; $c <= 7; $c++) {
										if(($c - $rest) == 1){
											echo '<li data-id="'.($c - $rest).'" class="active">'.($c - $rest).'</li>';
										}else{
											echo '<li data-id="'.($c - $rest).'">'.($c - $rest).'</li>';
										}
									}
								?>
							</ul>
						</div>
					</div>
					<?php } ?>

					<div class="row">
						<div class="col-md-12">
							<hr>	
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>

			<div class="archive-container">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-12">
									<div class="latest-articles-container">
									<h2><i class="fas fa-newspaper"></i> Latest Articles</h2>
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'archive' );

						endwhile;

						echo '</div>';

						healthcareinc_paging_nav();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
								</div>
								<div class="col-lg-4 col-md-4 col-12">
									<?php if($category_rail_categories) { ?>
									<div class="archive-categories">
										<h4><i class="fas fa-list-ul"></i> Categories</h4>
										<ul>
											<?php 
											$terms = get_terms( array( 
												'include' => $category_rail_categories,
											    'taxonomy' => 'category',
											    'order' => 'ASC',
											    'parent'   => 0
											) );
											foreach ($terms as $term) { //Cycle through terms, one at a time

											$category_icon = get_field('category_icon_font_awesome', 'category_'.$term->term_id);
											$category_looking_for_description = get_field('category_looking_for_description', 'category_'.$term->term_id);

											if($category_icon){
												$category_icon_i = $category_icon;
											}else{
												$category_icon_i = '<i class="fas fa-link"></i>';
											}

											$term_id = $term->term_id; //Define the term ID
											$term_link = get_term_link( $term, 'category' ); //Get the link to the archive page for that term
											$term_name = $term->name;
											echo '<li><a class="ccats" href="' . $term_link . '">'.$category_icon_i.'<span class="label">' . $term_name . '</span><i class="fas fa-angle-right"></i></a></li>';
											} ?>
										</ul>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();