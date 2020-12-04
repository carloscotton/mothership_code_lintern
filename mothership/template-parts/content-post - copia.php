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
	<!-- <?php $article_zip_lead = get_field('article_zip_lead', 'option');
	if($article_zip_lead) { ?>
	<div  class="d-block d-sm-none fixed-bottom">
		<div class="article_zip_lead">
			<div class="article_zip_lead--header">
				<h3>Looking for Health Insurance?</h3>
				<p>Find Affordable Healthcare That’s Right for You.</p>
			</div>
			<div class="article_zip_lead--form">
				<?php echo do_shortcode('[hcinc_lead_gen_form position="right_rail"]') ?>
			</div>
		</div>
	</div>
	<?php } ?>  -->
<div class="container single-page">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="row">
				<div class="order-2 order-sm-12 col-md-8 col-lg-8">
					<header class="entry-header">
				
						<?php
						if (function_exists('fc_breadcrumbs')) 
								fc_breadcrumbs(); 
						?>
					</header><!-- .entry-header -->
				</div>
				<div class="order-1 order-sm-12 col-md-4 col-lg-4">
					<a class="article_disclosure float-right" data-toggle="modal" data-target="#adv">
  						Advertising Disclosure
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
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
		<!-- .entry-meta -->
		<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-8 col-lg-8">
				
				<?php 
				$article_nav_content = get_field('hcinc_article_nav', 'option');
				if($article_nav_content) { ?>
				<?php if(get_field('post_section')){ ?>
					<div id="accordion_topic_mobile_article" class="d-block d-sm-none">
						<div class="article_sidebar-section">
							<h3 style="background-color: #fff; color:#120E3B !important; background-color: #fff; color: #120E3B !important; background: #F8F8F8; margin: 0; padding-top: 10px; border-bottom: none;" class="sidebar-title">In this Article</h3>
								<div class="mobile-article-section">
								<?php
									$all_rows = get_field("post_section");
									
									foreach ($all_rows as $row_a){
										$title_anchor = $row_a['post_section_title'];
										$index_anchor = $row_a['post_section_index'];
										?>
										<div class="article-toc">
											<a href="#<?php echo $index_anchor ?>"><?php echo $title_anchor ?>  </a><br/>
										</div>
										<?php
									}
								?>
								</div>
						</div>
					</div>
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

        <?php if(is_active_sidebar('sidebar-1') && empty($article_nav_content)) {?>
					<div id="accordion_topic_mobile_article" class="d-block d-sm-none">
						<div class="article_sidebar-section">
							<h3 style="background-color: #fff; color:#120E3B !important; background-color: #fff; color: #120E3B !important; background: #F8F8F8; margin: 0; padding-top: 10px; border-bottom: none;" class="sidebar-title">In this Article</h3>
								<div class="mobile-article-section">
								<?php
									$all_rows = get_field("post_section");
									
									foreach ($all_rows as $row_a){
										$title_anchor = $row_a['post_section_title'];
										$index_anchor = $row_a['post_section_index'];
										?>
										<div class="article-toc">
											<a href="#<?php echo $index_anchor ?>"><?php echo $title_anchor ?>  </a><br/>
										</div>
										<?php
									}
								?>
								</div>
						</div>
					</div>
				<?php } ?>

				<?php if(get_field('article_trust_statement', 'option')){
					?>
					<div class="article_licensed">
						<div class="researched_text"><?php the_field('article_trust_statement', 'option'); ?></div>
					</div>
					<?php
				}
				?>
				<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'healthcareinc' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'healthcareinc' ),
					'after'  => '</div>',
				) );
				?>
				</div><!-- .entry-content -->

				<?php 
					$article_helpful = get_field('hcinc_article_helpful', 'option');
					$article_helpful_form =  get_field('hcinc_article_helpful_form', 'option');
					if($article_helpful) {
				?>
				<div class="article_helpful">
					<div class="row">
						<div class="col-xs-12 col-12">
						<?php if($article_helpful_form) {
							echo do_shortcode( '[gravityform id="'.$article_helpful_form.'" title="false" description="false" ajax="true"]' );
						} ?>
						</div>
					</div>		
				</div>
				<?php } ?>
				<?php if( get_field('select_explore_module') ): $post_info = get_post( get_field('select_explore_module') ); ?>
				<?php 
				$args = array(
					'post_type' => 'explore-module',
				    'p'            => $post_info->ID,
				    'ignore_sticky_posts' => 1,
				);
				$query = new WP_Query( $args );
				
				if ( $query->have_posts() ) {
				    while ( $query->have_posts() ) {
				        $query->the_post(); ?>				    	
				
						<?php if( get_field('explore_module_related_topics') ): ?>
							<div id="related_topics_mobile" class="d-block d-sm-none article_sidebar-section article_related-topics sticky-top">
								<h3 class="sidebar-title-mobile explore-more purple">Explore More</h3>
								<div class="article-topics">
									<?php
									$rows = get_field('explore_module_related_topics');
									//print_r($rows);
										if($rows){
											$countid = '';
											foreach($rows as $row){
												$countid++;
												$show = '';
												if($countid == 1){
													$show = 'show';
												}else{
													$show = '';
												}
												?>
													<div class="accordion" id="accordion<?php echo $countid ?>">
													    <div class="related_topics__title"  id="heading<?php echo $countid ?>" data-toggle="collapse" data-target="#collapse<?php echo $countid ?>" aria-expanded="true" aria-controls="collapse<?php echo $countid ?>">
													    	<h5>
													          	<?php echo $row['topic_title'] ?>
													      	</h5>
													    </div>
													    <div id="collapse<?php echo $countid ?>" class="collapse" aria-labelledby="heading<?php echo $countid ?>" data-parent="#accordion<?php echo $countid ?>">
													      	<div class="related_topics__links">
																	<?php
																		$single_posts = $row['topic_post'];
																		foreach($single_posts as $singlep){
																			echo '<div><a href="'.$singlep['topic_post_single'].'">'.$singlep['title_post_topic'].'</a></div>';
																		}
																	?>
															</div>
													    </div>
													</div>
												<?php
											}
										} 
									?>
								</div>
							</div>
						<?php endif; ?>
				
				    <?php }
				} else { ?>
					<?php if( get_field('related_topics') ): ?>
						<div id="related_topics" class="article_sidebar-section article_related-topics">
							<h3 class="sidebar-title">Explore More</h3>
							<div class="article-topics">
								<?php
								$rows = get_field('related_topics');
								//print_r($rows);
									if($rows){
										$countid = '';
										foreach($rows as $row){
											$countid++;
											$show = '';
											if($countid == 1){
												$show = 'show';
											}else{
												$show = '';
											}
											?>
												<div class="accordion" id="accordion<?php echo $countid ?>">
												    <div class="related_topics__title"  id="heading<?php echo $countid ?>" data-toggle="collapse" data-target="#collapse<?php echo $countid ?>" aria-expanded="true" aria-controls="collapse<?php echo $countid ?>">
												    	<h5>
												          	<?php echo $row['topic_title'] ?>
												      	</h5>
												    </div>
												    <div id="collapse<?php echo $countid ?>" class="collapse" aria-labelledby="heading<?php echo $countid ?>" data-parent="#accordion<?php echo $countid ?>">
												      	<div class="related_topics__links">
																<?php
																	$single_posts = $row['topic_post'];
																	foreach($single_posts as $singlep){
																		echo '<div><a href="'.$singlep['topic_post_single'].'">'.$singlep['title_post_topic'].'</a></div>';
																	}
																?>
														</div>
												    </div>
												</div>
											<?php
										}
									} 
								?>
							</div>
						</div>
					<?php endif; ?>
				<?php } ?>
				<?php endif; 
				wp_reset_query();
				?>
				<?php 
					$article_share = get_field('hcinc_article_share', 'option');
					if($article_share) {
				?>
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
				<?php } ?>

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
				endif;

				?>
			</div>
				
			<div class="col-12 col-md-4 col-lg-4 d-none d-sm-block">
				<div class="sticky-top">
					<?php $article_zip_lead = get_field('article_zip_lead', 'option');
					$show_article_right_zip_lead = get_post_meta($id_post, 'show_article_right_zip_lead', true);
					if($article_zip_lead && $show_article_right_zip_lead ==='' || $article_zip_lead && $show_article_right_zip_lead) { ?>
					<div class="article_zip_lead">
						<div class="article_zip_lead--header" style="background-image: url(<?php echo $image_right_zip_lead ?>) !important;">
							<h3><?php echo $title_right_zip_lead ?></h3>
							<p><?php echo $subtitle_right_zip_lead ?></p>
						</div>
						<div class="article_zip_lead--form hci-shortcodes">
							<?php echo do_shortcode('[hcinc_lead_gen_form cta="'.$cta_right_zip_lead.'" position="right_rail"]') ?>
						</div>
					</div>
					<?php } ?>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
</div>

<?php 
	$article_profile = get_field('hcinc_article_profile', 'option');
	if($article_profile) {
?>
<section class="author-profile">
<div class="container">
	<div class="article_author">
		<div class="row">
			<div class="col-sm-12">
				<div class="article_author_image">
						<img src="<?php echo $author_photo_url[0] ?>" alt="" class="rounded-circle">
				</div>
				<div class="article_author_info">
					<a href="<?php echo $author_link ?>">
						<h4 class="title">About <?php echo $author_name.' '.$author_last_name ?></h4>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="bio">
					<?php echo $author_bio; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php } ?>

<?php 
	$showinArticleAdsFooter = get_field('inArticle_Ads_Footer_Show', 'option'); 
	$inArticleAdsType = get_field('inArticle_Ads_Footer_Type', 'option'); 
	$inArticleAdsTitle = get_field('inArticle_Ads_Footer_Title', 'option'); 
	$inArticleAdsDisclaimer = get_field('inArticle_Ads_Footer_Disclaimer', 'option'); 
?>

<?php if($showinArticleAdsFooter){ ?>
	<?php if($inArticleAdsType == 'Rotation Tool'){ ?>
	<section class="inArticle-footer-ads">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3><?php echo $inArticleAdsTitle; ?> <a href="javascript:void(0);" class="inArticle-ads-disclaimer" data-toggle="modal" data-target="#adv2">Advertiser Disclosure</a></h3>
				<div id="inArticle-footer-ads-content"></div>

				<!-- Modal -->
				<div class="modal fade" id="adv2" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-body">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	<div class="modal-text">
				        <?php echo $inArticleAdsDisclaimer; ?>
				        </div>
				      </div>
				    </div>
				  </div>
				</div>	

				<script src="https://assets.healthcare.com/hc-sem.min.js"></script>
				<script type="text/javascript">
				hc.sem.insertRotationToolsAds({
					title: '',
					divId: 'inArticle-footer-ads-content',
					howMany: 4,
					disclaimer: ''
				});
				</script>
			</div>
		</div>
	</div>
	</section>
	<?php } else if($inArticleAdsType == 'Medicare') { ?>
	<section class="inArticle-footer-ads">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3><?php echo $inArticleAdsTitle; ?> <a href="javascript:void(0);" class="inArticle-ads-disclaimer" data-toggle="modal" data-target="#adv2">Advertiser Disclosure</a></h3>
				<div id="inArticle-footer-ads-content"></div>

				<!-- Modal -->
				<div class="modal fade" id="adv2" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-body">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	<div class="modal-text">
				        <?php echo $inArticleAdsDisclaimer; ?>
				        </div>
				      </div>
				    </div>
				  </div>
				</div>	

				<script src="https://assets.healthcare.com/hc-sem.min.js"></script>
				<script type="text/javascript">
				hc.sem.insertMedigapPlans({
					title: '',
					divId: 'inArticle-footer-ads-content',
					howMany: 4,
					disclaimer: ''
				});
				</script>
			</div>
		</div>
	</div>
	</section>
	<?php } else { ?>
	<section class="inArticle-footer-ads">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3><?php echo $inArticleAdsTitle; ?> <a href="javascript:void(0);" class="inArticle-ads-disclaimer" data-toggle="modal" data-target="#adv2">Advertiser Disclosure</a></h3>
				<div id="inArticle-footer-ads-content"></div>

				<!-- Modal -->
				<div class="modal fade" id="adv2" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-body">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	<div class="modal-text">
				        <?php echo $inArticleAdsDisclaimer; ?>
				        </div>
				      </div>
				    </div>
				  </div>
				</div>	

				<script src="https://assets.healthcare.com/hc-sem.min.js"></script>
				<script type="text/javascript">
				hc.sem.insertFeatureAds({
					title: '',
					divId: 'inArticle-footer-ads-content',
					howMany: 4,
					disclaimer: ''
				});
				</script>
			</div>
		</div>
	</div>
	</section>
	<?php } ?>
<?php } ?>

<?php 
	$article_related = get_field('hcinc_article_related', 'option');
	if($article_related) {
?>
<div class="related-articles">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="related_articles">
					<div class="mg_featured_categories_title">
							<h3>Related Articles</h3> 
							</div>
						<?php

						$related = get_posts( 
							array( 'category__in' => wp_get_post_categories($post->ID), 
									'numberposts' => 3, 
									'post__not_in' => array($post->ID) ) 
						);
						?>
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
			</div>
		</div>
	</div>
</div>
<br/>
<?php } ?>

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
<!-- <div class="container">
		<footer class="entry-footer">
			<?php healthcareinc_entry_footer(); ?>
		</footer>
	</article> 
</div> -->
