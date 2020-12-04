<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthcareinc
 */

$author_id = get_the_author_meta('id');
$author_bio = get_field('user_short_bio', "user_$author_id");
$author_name = get_the_author_meta('first_name');
$author_last_name = get_the_author_meta('last_name');									
$author_photo_id = get_field('user_photo', "user_$author_id");
$size_author = 'author-image';
$author_photo_url = wp_get_attachment_image_src( $author_photo_id, $size_author);
$author_headline = get_field('user_headline', "user_$author_id");
$author_link = get_author_posts_url($author_id);
$id_post = get_the_ID();
$post = get_post($id_post); 
$slug = $post->post_name;
$title_right_zip_lead =  get_field('title_right_zip_lead', 'option');
$subtitle_right_zip_lead =  get_field('sub-title_right_zip_lead', 'option');
$image_right_zip_lead =  get_field('image_right_zip_lead', 'option');
$cta_right_zip_lead =  get_field('cta_text_right_zip_lead', 'option');
	
?>

<div class="container single-page">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="col-7 col-md-8 col-lg-8">
				<header class="entry-header">
			
					<?php
					if (function_exists('fc_breadcrumbs')) 
							fc_breadcrumbs(); 
					?>
				</header><!-- .entry-header -->
			</div>
			<div class="col-5 col-md-4 col-lg-4">
				<a class="article_disclosure float-right" data-toggle="modal" data-target="#adv">
						Advertiser Disclosure
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-1 col-md-1 col-lg-1"></div>

			<div class="col-12 col-md-10 col-lg-10">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			</div>

			<div class="col-1 col-md-1 col-lg-1"></div>
		</div>

		<div class="row">
			<div class="col-1 col-md-1 col-lg-1"></div>

			<div class="col-12 col-md-10 col-lg-10">
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="article_header">
					<div class="author_data">
						<p><?php healthcareinc_posted_by(); ?>
						<?php echo $author_headline ?></p>
					</div>
					<span class="bordered-xs"></span>
					<div class="published_data">
						<?php
							$u_time = get_the_time('U');
							$u_modified_time = get_the_modified_time('U');
							if ($u_modified_time >= $u_time + 86400) {
								echo "<p>Updated on: ";
								the_modified_time('F jS, Y').'</p>';
							} else {
								echo '<p>Published: ';
								echo the_time('F jS, Y').'</p>';
							} 
						?>
					</div>
					<?php if( get_field('medically_reviewed') ):
					 $reviewer =  get_field('medically_reviewed');
					 $reviewer_id = $reviewer['ID'];
					 $reviewer_photo_url = get_field('user_photo', "user_$reviewer_id"); 
					?>
					<span class="bordered-xs"></span>
					<div class="reviewed_data">
						<p>
						Reviewed by <a href="<?php echo HOMELINK?>author/<?php echo $reviewer['user_nicename'] ?>"><?php echo $reviewer['user_firstname'].' '. $reviewer['user_lastname'] ?></a>
						<?php if(get_field("medically_reviewed_on")){
							?>
							<span>,</span> on
							<?php
							echo get_field( "medically_reviewed_on" );	
							}
						?>
						
						</p>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>

			<div class="col-1 col-md-1 col-lg-1"></div>
		</div>

		<div class="row">
			<div class="col-12 col-md-1 col-lg-1"></div>

			<div class="col-12 col-md-10 col-lg-10">
				<?php 
				$article_nav_content = get_field('hcinc_article_nav', 'option');
				if($article_nav_content) { ?>
					<?php if(get_field('post_section')){ ?>
						<hr>
						<div class="article_sidebar-section d-none d-md-block d-lg-block">
							<div class="inthis-article-section">
								<h3>In this Article</h3>
								<div class="inthis-article--anchors">
								<?php
									$all_rows = get_field("post_section");
									
									foreach ($all_rows as $row_a){
										$title_anchor = $row_a['post_section_title'];
										$index_anchor = $row_a['post_section_index'];
										?>
											<a href="#<?php echo $index_anchor ?>"><?php echo $title_anchor ?>  </a>
										<?php
									}
								?>
								</div>
							</div>
						</div>
						<?php
						}	
					?>
				<?php } ?>

				<?php if(get_field('article_trust_statement', 'option')) { ?>
				<hr>
				<div class="article_licensed">
					<div class="researched_text"><?php the_field('article_trust_statement', 'option'); ?></div>
				</div>
				<hr>
				<?php } ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div>

			<div class="col-12 col-md-1 col-lg-1"></div>
		</div>

		<div class="row">
			<div class="col-12 col-md-1 col-lg-1"></div>

			<div class="col-12 col-md-10 col-lg-10">
				<hr>
				<!-- .Article Helpful -->
				<?php 
				$article_helpful = get_field('hcinc_article_helpful', 'option');
				$article_helpful_form =  get_field('hcinc_article_helpful_form', 'option');
				if($article_helpful) { ?>
				<div class="article_helpful">
					<?php if($article_helpful_form) {
						echo do_shortcode( '[gravityform id="'.$article_helpful_form.'" title="false" description="false" ajax="true"]' );
					} ?>	
				</div>
				<hr>
				<?php } ?>

				<!-- .Share This Article -->
				<?php 
				$article_share = get_field('hcinc_article_share', 'option');
				if($article_share) { ?>
				<div class="article_section article_share">
					<div class="row">
						<div class="col-xs-6 col-6">
							<h5>Share this article</h5>		
						</div>
						<div class="col-xs-6 col-6">
							<div class="social-links">
								<span><a  href="https://www.facebook.com/sharer/sharer.php?u=<?php echo HOMELINK ?><?php echo $slug ?>" target="_blank"><i class="fab fa-facebook-f"></i></span>
								<span><a  href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" target='_blank'><i class="fab fa-twitter"></i></a></span>
								<span><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo HOMELINK ?><?php echo $slug ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></span>
								
							</div>
						</div>
					</div>
				</div>
				<hr>
				<?php } ?>

				<!-- .Article Sources -->
				<?php
				if( have_rows('post_article_citations') ):

					echo '<div id="article_sources" class="article_section article_sources">';
						echo '<div class="accordion" id="accordionExample">';
						    echo '<div class="title_article_source collapsed"  id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">';
						    	echo '<h5>';
						          	echo 'Article Sources';
						      	echo '</h5>';
						    echo '</div>';
						    echo '<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">';
						      	echo '<div class="article_sources-list">';
					echo '<ol>';
				 	// loop through the rows of data
				 	$i = 0;
				    while ( have_rows('post_article_citations') ) : the_row();
				    	$i++;
				        // display a sub field value
						echo '<li id="citation-'.$i.'">';
				        the_sub_field('citation_text');
				        echo '</li>';

				    endwhile;
				    echo '</ol>';
								echo '</div>';
						    echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<hr>';
				endif;

				?>
			</div>

			<div class="col-12 col-md-1 col-lg-1"></div>
		</div>

		<!-- .Author Profile -->
		<div class="row">
			<div class="col-12">
			<?php 
			$article_profile = get_field('hcinc_article_profile', 'option');
			if($article_profile) {?>
			<div class="author-profile">
				<div class="article_author">
					<div class="row">
						<div class="col-3 col-md-2 col-lg-2">
							<div class="article_author_image">
									<img src="<?php echo $author_photo_url[0] ?>" alt="" class="rounded-circle">
							</div>
						</div>
						<div class="col-9 col-md-10 col-lg-10">
							<div class="article_author_info">
								<h3 class="title"><a href="<?php echo $author_link ?>">About <?php echo $author_name.' '.$author_last_name ?></a></h3>
								<div class="bio">
								<?php echo $author_bio; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>

		<!-- .Related Articles -->
		<?php 
		$article_related = get_field('hcinc_article_related', 'option');
		if($article_related) { ?>
		<div id="related_articles" class="related-articles" style="margin-bottom:20px;">
			<h3>Related Articles</h3> 
			<hr>

			<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) ); ?>
			<div class="mg_featured_categories_content">
				<div class="row row-related-articles"> 
				<?php
				if( $related ) foreach( $related as $post ) {
				setup_postdata($post);
				$id_article_post = get_the_ID();
				$category_post = get_the_category($id_article_post);
				$author_category = get_the_author();
				$author_id_category = get_the_author_meta( 'ID' );
				$urlfeatureimage = wp_get_attachment_url( get_post_thumbnail_id($id_article_post) );
				$category_icon = get_field('category_icon_font_awesome', 'category_'.$category_post[0]->term_id);
				 
				?>
					<div class="col-md-4">
						<div class="mg_featured_categories_content_image">
							<img src="<?php echo $urlfeatureimage ?>" class="img-fluid">
						</div>

						<h4><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

						<p><?php echo get_the_excerpt($post_category->ID); ?></p>

						<div class="entry-meta">
								<?php
									$u_time = get_the_time('U');
									$u_modified_time = get_the_modified_time('U');
									if ($u_modified_time >= $u_time + 86400) {
										echo "<h6>Updated: ";
										the_modified_time('F jS, Y').'</h6>';
									} else {
										echo '<h6>';
										echo the_time('F jS, Y').'</h6>';
									} 
								?>
							<span>By</span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
						</div><!-- .entry-meta -->
					</div>						      
				<?php }
				wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</article>
</div>

<!-- Modal -->
<div class="modal fade" id="adv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
    	</button>
    	<div class="modal-text">
        <?php the_field('advertising_disclosure_text', 'option'); ?>
        </div>
      </div>
    </div>
  </div>
</div>