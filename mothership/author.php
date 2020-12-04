<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthcareinc
 */

get_header();
//set page type for pageschema
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		<div id="header-author">
			<div id="author-content" class="container">
				<header>
					<?php
						$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
						$author_photo_id = get_field( 'user_photo', 'user_'.$author->ID );
						$size_author = 'author-image';
						$author_photo_url = wp_get_attachment_image_src( $author_photo_id, $size_author);
						$author_fb = get_user_meta( $author->ID, 'user_facebook_url' , true );
						$author_in = get_user_meta( $author->ID, 'user_instagram_url' , true );
						$author_tw = get_user_meta( $author->ID, 'user_twitter_url' , true );
						$author_lin = get_user_meta( $author->ID, 'user_linkedin_url' , true );
						$author_web = get_user_meta( $author->ID, 'user_website_url' , true );
						$author_first_name = get_user_meta( $author->ID, 'first_name', true );
						$author_last_name = get_user_meta( $author->ID, 'last_name', true );
						$author_headline = get_user_meta( $author->ID, 'user_headline', true );
					?>
					<div class="author_photo_content">
						<?php if($author_photo_id){
								echo '<div class="author_photo_image">';
								echo '<img src="'.$author_photo_url[0].'" />';
								echo '</div>';
						}?>
					</div>
					<div class="author_page_title">
						<h1><b><?php echo $author_first_name; ?></b> <?php echo $author_last_name; ?></h1>
						<h2><?php echo $author_headline; ?></h2>
					</div>
					<?php
						if($author_fb || $author_tw || $author_in || $author_lin || $author_web){
					?>
					<div class="author_social_media_content">
						<div class="social-icons">
						<h3 class="d-none d-sm-block">Follow <?php echo $author_first_name; ?></h3>									
						<?php if($author_fb){
							echo '<a target="_blank" href="'.$author_fb.'"><i class="fab fa-facebook-f"></i></a>';
						}?>

						<?php if($author_tw){
							echo '<a target="_blank" href="'.$author_tw.'"><i class="fab fa-twitter"></i></a>';
						}?>

						<?php if($author_in){
							echo '<a target="_blank" href="'.$author_in.'"><i class="fab fa-instagram"></i></a>';
						}?>

						<?php if($author_lin){
							echo '<a target="_blank" href="'.$author_lin.'"><i class="fab fa-linkedin-in"></i></a>';
						}?>

						<?php if($author_web){
							echo '<a target="_blank" href="'.$author_web.'"><i class="fas fa-link"></i></a>';
						}?>
						</div>
					</div>
					<?php
						}
					?>
				</header><!-- .page-header -->
			</div>
		</div>
		<div class="container">
			<div id="author-description">
				<div class="row">
					<div class="col-md-12">
						<?php 
							$current_user_large_bio = get_user_meta( $author->ID, 'user_large_bio' , true );
							echo apply_filters('the_content',$current_user_large_bio); 
						?>
					</div>
				</div>
			</div>
		</div>

		<?php if ( have_posts() )  : ?>
			<div id="latest-articles">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h2><strong>Latest Articles</strong> by <?php echo $author_first_name.' '.$author_last_name; ?></h2>
						</div>
					</div>
				</div>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'author' );

					endwhile;

					healthcareinc_paging_nav();

		else :

			//get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	<!-- #primary -->
	</div>

<?php
get_footer();
