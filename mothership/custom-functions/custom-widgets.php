<?php 
// unregister all widgets
function unregister_default_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	//unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	//unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('Twenty_Eleven_Ephemera_Widget');
	unregister_widget('WP_Widget_Media_Audio');
	unregister_widget('WP_Widget_Media_Image');
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Custom_HTML');
	unregister_widget('WP_Widget_Media_Gallery');
}
add_action('widgets_init', 'unregister_default_widgets', 11);

class Explore_More_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'explore_more_widget', // Base ID
			esc_html__( 'Explore More Widget', 'healthcareinc' ), // Name
			array( 'description' => esc_html__( 'This widget will adds the Explore More Module', 'healthcareinc' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; ?>
		<?php if( get_field('select_explore_module') ): $post_info = get_post( get_field('select_explore_module') ); ?>
			<?php 
			$args = array(
				'post_type' => 'explore-module',
			    'p'            => $post_info->ID,
			    'ignore_sticky_posts' => 1,
			);
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) : while ( $query->have_posts() ) { $query->the_post(); ?>	

				<?php if( get_field('explore_module_related_topics') ): ?>
					<div id="related_topics" class="article_sidebar-section article_related-topics">
						<h5 class="sidebar-title"><?php if ( ! empty( $instance['title'] ) ) { echo $instance['title']; } ?></h5>
						<div class="article-topics">
							<?php
							$rows = get_field('explore_module_related_topics');
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
											<div>
											    <div class="related_topics__title">
											    	<h5>
											          	<?php echo $row['topic_title'] ?>
											      	</h5>
											    </div>

										      	<div class="related_topics__links" style="display:none;">
														<?php
															$single_posts = $row['topic_post'];
															foreach($single_posts as $singlep){
																echo '<a href="'.$singlep['topic_post_single'].'">'.$singlep['title_post_topic'].'</a>';
															}
														?>
												</div>
											</div>
										<?php
									}
								} 
							?>
						</div>
					</div>
				<?php endif; ?>
				
			<?php } endif; ?>
		<?php else : ?>
			<?php if( get_field('related_topics') ): ?>
				<div id="related_topics" class="article_sidebar-section article_related-topics">
					<h5 class="sidebar-title">
					<?php if ( ! empty( $instance['title'] ) ) { echo $instance['title']; } ?>
					</h5>
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
										<div id="accordion<?php echo $countid ?>">
										    <div class="related_topics__title"  id="heading<?php echo $countid ?>">
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
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'healthcareinc' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'healthcareinc' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

}

// register Explore_More_Widget widget
function register_explore_more_widget() {
    register_widget( 'Explore_More_Widget' );
}
add_action( 'widgets_init', 'register_explore_more_widget' );





class Article_Nav_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'article_nav_widget', // Base ID
			esc_html__( 'Article Nav Widget', 'healthcareinc' ), // Name
			array( 'description' => esc_html__( 'This widget will adds the Article Nav Module', 'healthcareinc' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; ?>
		<?php if( get_field('post_section') ): ?>
			<div class="d-none d-lg-block d-xl-block">
			<div class="article_sidebar-section">
				<h5 class="sidebar-title">In this Article</h5>
				<div class="article-toc">
					<?php
						$all_rows = get_field("post_section");
						
						foreach ($all_rows as $row_a){
							$title_anchor = $row_a['post_section_title'];
							$index_anchor = $row_a['post_section_index'];
							
							?>
							<a href="#<?php echo $index_anchor ?>"><?php echo $title_anchor ?>  </a><br/>
							<?php
						}
						?>
				</div>
			</div>
		<?php endif; ?>	
		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'healthcareinc' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'healthcareinc' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

}

// register Article_Nav_Widget widget
function register_article_nav_widget() {
    register_widget( 'Article_Nav_Widget' );
}
add_action( 'widgets_init', 'register_article_nav_widget' );