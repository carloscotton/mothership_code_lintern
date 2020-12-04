<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthcareinc
 */

?>

<?php 
	$page_bg = get_the_post_thumbnail_url(get_the_ID(),'full'); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--<div class="page-header" style="background:url(<?php //echo $page_bg; ?>) center center no-repeat transparent; background-size:cover;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
						<?php //the_title( '<h1 class="page-title">', '</h1>' ); ?>
						<?php //if( get_field('text_below_title') ) {
							//echo '<div class="archive-description">'.get_field('text_below_title').'</div>';
						//} ?>
				</div>
			</div>
		</div>
	</div>-->

<?php if ( !empty( get_the_content() ) ){  ?>
<div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				
				<?php
				$this_page_title =  get_the_title();
				
				if ($this_page_title == "Privacy Policy"){
					echo '<div id="privacy_policy_content">';

						//echo '<div id="privacy_policy_content_old">';
						the_content();
						//echo '</div>';
					echo '</div>';
				} else {
					echo '<div class="content-page">';
					the_content();
					echo '</div>';
				} ?>
			</div>
		</div>
	</div><!-- .entry-content -->
	<!--About our company page-->
	<?php if( get_field('jobs_page_other_list') ) { ?>
		<div class="hc-jobs">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
		<?php
			$rows = get_field('jobs_page_other_list');
			foreach($rows as $row){
				echo '<div class="hc-jobs-item"><a target="_blank" href="'.$row['jobs_page_other_link'].'"><div class="hc-jobs-item-content"><h3>'.$row['jobs_page_other_position'].'</h3><p>'.$row['jobs_page_other_details'].'</p><i class="fa fa-chevron-right" aria-hidden="true"></i></div></a></div>';
			}
		?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		
</div>
<?php } ?>
		<?php if( get_field('jobs_page_footer') ) { ?>
		<div class="hc-diversity">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					<?php echo get_field('jobs_page_footer'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

	<?php if(get_field('company_page_awards_intro')){
			?>
			<div class="bk-blue-content awards">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="awards-intro">
								<?php the_field('company_page_awards_intro') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<?php 
							$all_awards = get_field('company_page_awards_list');
							//print_r($all_awards);
							foreach ($all_awards as $award) {
								?>
								<div class="col-sm-12 col-md-6 col-lg-6">
									<div class="bk-white">
										<div class="image-award">
											<img src="<?php echo $award['company_page_awards_logo']['url'] ?>">
											<span class="title-award"><?php echo $award['company_page_awards_title'] ?></span>
										</div>
										<div class="content-award"><?php echo $award['company_page_awards_content'] ?></div>
									</div>
								</div>
								<?php
							} 
						?>
					</div>
				</div>
			</div>
			<?php
		}
	?>
	<?php if(get_field('company_page_history_intro')){
			?>
			<div class="all_stories">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="story-intro">
								<?php the_field('company_page_history_intro') ?>
							</div>
						</div>
					</div>
					<div class="stories">
						<div class="row">
							<div class="col-12">
						<?php 
							$all_stories = get_field('company_page_history_list');
							//print_r($all_stories);
							foreach ($all_stories as $story) {
								?>
									<div class="story-date">
										<span><?php echo $story['company_page_history_date'] ?></span>
									</div>
									<div class="story-content">
										<?php echo $story['company_page_history_content'] ?>
									</div>
								<?php
							} 
						?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	?>
	<?php if(get_field('company_page_investors_intro')){
			?>
			<div class="bk-blue-content investors">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="investors-intro">
								<?php the_field('company_page_investors_intro') ?>
							</div>
						</div>
					</div>
					<div class="images-investors">
						<div class="row">
							<?php 
								$all_investors = get_field('company_page_investors_list');
								//print_r($all_stories);
								foreach ($all_investors as $investor) {
									?>
										<div class="col-sm-12 col-md-4 col-lg-4">
											<a href="<?php echo $investor['company_page_investors_link'] ?>" target="_blank"><img src="<?php echo $investor['company_page_investors_logo'] ?>" class="img-fluid aligncenter"></a>
										</div>
									<?php
								} 
							?>
						</div>
					</div>
					<div class="text-below-investors-list">
						<div class="row">
							<div class="col-12">
								<?php the_field('text_below_investors_list') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	?>
	<?php if(get_field('team_page_intro')){
		?>
		<div id="team_about">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="team-intro">
							<?php the_field('team_page_intro') ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php
							$rowsteam1 = get_field('team_page_leadership');
							$rowsteam2 = get_field('team_page_board');
							$rowsteam3 = get_field('team_page_team');
						?>

						<?php if($rowsteam1) { ?>
						<div class="collapse-team">
							<h5>
					          	Leadership
					      	</h5>
						</div>
							<div class="collapse-content-team">
							<div class="team-info">
					      		<div class="row team_row_mobile">
								<?php
								$rowsteam1 = get_field('team_page_leadership');
								//print_r($rowsteam);
								$c1 = 0;
								foreach ($rowsteam1 as $rowteam){
									$c1++;
									$image_lead = $rowteam['team_page_leadership_photo'];
									$name_lead = $rowteam['team_page_leadership_name'];
									$position_lead = $rowteam['team_page_leadership_position'];
									$bio_lead = $rowteam['team_page_leadership_bio'];
									?>
									<div class="col-lg-4 col-md-4 col-12">
										<div class="team">
											<img src="<?php echo $image_lead ?>" class="img-fluid aligncenter">
										</div>
										<div class="name-team">
										 	<a data-toggle="modal" data-target="#ModalLead<?php echo $c1 ?>">
										 		<?php echo $name_lead ?>
											</a>
										</div>
										<div class="position-team">
											<?php echo $position_lead ?>
										</div>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="ModalLead<?php echo $c1 ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabelLead<?php echo $c1 ?>" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="header-bio">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <div class="bio-team">
												<?php echo $bio_lead ?>
											</div>
									      </div>
									    </div>
									  </div>
									</div>
									<?php
								}
								?>
								</div>
							</div>
						</div>
						<?php } ?>

						<?php if($rowsteam2) { ?>
						<div class="collapse-team">
							<h5>
					          	Board
					      	</h5>
						</div>
						<div class="collapse-content-team">
							<div class="team-info">
					      		<div class="row team_row_mobile">
								<?php
								$rowsteam2 = get_field('team_page_board');
								//print_r($rowsteam);
								$c2=0;
								foreach ($rowsteam2 as $rowboard){
									$c2++;
									$image_board = $rowboard['team_page_board_photo'];
									$name_board = $rowboard['team_page_board_name'];
									$position_board = $rowboard['team_page_board_position'];
									$bio_board = $rowboard['team_page_board_bio'];
									?>
									<div class="col-lg-4 col-md-4 col-12">
										<div class="team">
											<img src="<?php echo $image_board ?>" class="img-fluid aligncenter">
										</div>
										<div class="name-team">
											<a data-toggle="modal" data-target="#ModalBoard<?php echo $c2 ?>">
											 	<?php echo $name_board ?>
											</a>
										</div>
										<div class="position-team">
											<?php echo $position_board ?>
										</div>
									</div>
									
									<!-- Modal -->
									<div class="modal fade" id="ModalBoard<?php echo $c2 ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabelBoard<?php echo $c2 ?>" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="header-bio">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <div class="bio-team">
												<?php echo $bio_board ?>
											</div>
									      </div>
									    </div>
									  </div>
									</div>
									<?php
								}
								?>
								</div>
							</div>
						</div>
						<?php } ?>
						
						<?php if($rowsteam3) { ?>
						<div class="collapse-team">
							<h5>
					          	Team
					      	</h5>
						</div>
						<div class="collapse-content-team">
							<div class="team-info">
					      		<div class="row team_row_mobile">
								<?php
								$rowsteam3 = get_field('team_page_team');
								//print_r($rowsteam);
								$c3 = 0;
								foreach ($rowsteam3 as $rowteam){
									$c3++;
									$image_team = $rowteam['team_page_team_photo'];
									$name_team = $rowteam['team_page_team_name'];
									$position_team = $rowteam['team_page_team_position'];
									$bio_team = $rowteam['team_page_team_bio'];
									?>
									<div class="col-lg-4 col-md-4 col-12">
										<div class="team">
											<img src="<?php echo $image_team ?>" class="img-fluid aligncenter">
										</div>
										<div class="name-team">
											<a data-toggle="modal" data-target="#ModalTeam<?php echo $c3 ?>">
											 	<?php echo $name_team ?>
											</a>
										</div>
										<div class="position-team">
											<?php echo $position_team ?>
										</div>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="ModalTeam<?php echo $c3 ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabelTeam<?php echo $c3 ?>" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="header-bio">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <div class="bio-team">
												<?php echo $bio_team ?>
											</div>
									      </div>
									    </div>
									  </div>
									</div>
									<?php
								}
								?>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
	
	<?php if(get_field('team_page_jobs')){
			?>
			<div class="jobs-about">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="jobs-intro">
								<center>
									<i class="fas fa-shopping-bag"></i>
								</center>
								<?php the_field('team_page_jobs') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	?>
	<!--END of About our company page-->
	
	<!--About our content page-->
	<?php if(get_field('meet_our_writers_intro_content')){ ?>
		<div class="writers">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="writers-content">
							<?php the_field('meet_our_writers_intro_content') ?>
						</div>
						<div class="meet-our-writers">
							<?php $writers_ids = get_field('meet_our_writers'); ?>
								<?php
									foreach ($writers_ids  as $key => $value){
										echo do_shortcode('[hm_writers_and_reviewers id="'.$value.'"]');									
									}
								?>
						</div>
						<div class="writers-content">
							<?php the_field('expert_review_board_intro_content') ?>
						</div>
						<div class="meet-our-writers">
							<?php $reviewers_ids = get_field('expert_review_board'); ?>
								<?php
									foreach ($reviewers_ids  as $key => $value){
										echo do_shortcode('[hm_writers_and_reviewers id="'.$value.'"]');									
									}
								?>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<?php } ?>
	<?php if(get_field('how_to_contact_us')){ ?>
		<div id="how-contact-us">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="contact-us-content">
							<?php the_field('how_to_contact_us') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!------END About Content------>
	<!------Contact page------>
	<?php if(get_field('contact_call_block')){ ?>
		<div class="bk-call">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8">
						<?php the_field('contact_call_block') ?>
					</div>
				</div>
			</div>
		</div>
		
	<?php } ?>
	<?php if(get_field('contact_gravity_form')){ ?>
		<div class="gravity-form">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<?php the_field('contact_gravity_form') ?>
						<hr>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	
	<?php if(get_field('contact_page_offices_list')){ ?>
		<div class="office-list">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2>Offices</h2>
						<?php
						$rows_office = get_field('contact_page_offices_list');
						$c= 0;
						foreach($rows_office as $office){
							$c++;
							$class_text = '';
								if($c == 1){
									$class_text = 'active-a';
								}else{
									$class_text = '';
								}
							?>
							<div class="mapa <?php echo $class_text ?>" id="location-<?php echo $c ?>" data-map="map-<?php echo $c ?>" >
							<div class="office-name"><?php echo $office['contact_page_office_name'] ?></div>
							<div class="office-address"><?php echo $office['contact_page_office_address'] ?></div>
							</div>
							<?php
						}
						$c2 = 0;
						foreach($rows_office as $office2){
							$c2++;
							$lat = $office2['contact_page_office_location']['lat'];
							$lng = $office2['contact_page_office_location']['lng'];
							$class_map = '';
								if($c2 == 1){
									$class_map = 'active';
								}else{
									$class_map = '';
								}
							?>
							<div id="map-<?php echo $c2 ?>" class="acf-map <?php echo $class_map ?>" data-zoom="16">
					        	<div class="marker" data-lat="<?php echo $lat ?>" data-lng="<?php echo $lng ?>"></div>
					    	</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->


