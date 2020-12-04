<?php

/****************************/
/** CUSTOM SHORTCODES FILE **/
/****************************/
add_shortcode('hm_writers_and_reviewers', 'hm_get_writers_and_reviewers');
function hm_get_writers_and_reviewers($atts, $content = null)
{
  $id_author = $atts['id'];
  $author_name = get_the_author_meta('first_name',$id_author);
  $author_last_name = get_the_author_meta('last_name',$id_author);
  $author_bio = get_field('user_short_bio', "user_$id_author");
  $author_photo_id = get_field('user_photo', "user_$id_author");
  $author_link = get_author_posts_url($id_author);
	$size_author = 'author-image';
	$author_photo_url = wp_get_attachment_image_src( $author_photo_id, $size_author);
  $authors_html = '<div class="bk-white-content">';
    $authors_html .= '<div class="row">';
      $authors_html .= '<div class="col-sm-3 col-md-3 col-lg-2 d-none d-sm-block">';
        $authors_html .='<div class="img-author">';
          $authors_html .= '<img src="'.$author_photo_url[0].'" class="aligncenter img-fluid rounded-circle"/>';
        $authors_html .= '</div>';
      $authors_html .= '</div>';
      $authors_html .= '<div class="col-sm-12 col-md-9 col-lg-10">';
        $authors_html .= '<div class="content_authors">';
            $authors_html .= '<a href="'.$author_link.'"><h3>'.$author_name.' '.$author_last_name.'</h3></a>';
            $authors_html .= '<p>'.$author_bio.'</p>';
        $authors_html .= '</div>';
      $authors_html .= '</div>';
    $authors_html .= '</div>';
  $authors_html .= '</div>';
    return $authors_html;
}

add_shortcode('meet_our_writers', 'hm_get_writers');
function hm_get_writers($atts, $content = null){
	$writers_ids = get_field('meet_our_writers','option');
	
	$authors_html = '';
	foreach ($writers_ids  as $key => $value){
		
		  $id_author = $value;
		  $author_name = get_the_author_meta('first_name',$id_author);
		  $author_last_name = get_the_author_meta('last_name',$id_author);
		  $author_bio = get_field('user_short_bio', "user_$id_author");
		  $author_photo_id = get_field('user_photo', "user_$id_author");
		  $author_link = get_author_posts_url($id_author);
		  $size_author = 'author-image';
		  $author_photo_url = wp_get_attachment_image_src( $author_photo_id, $size_author);
			
		  $authors_html .='<div class="meet-our-writers">';		
		  $authors_html .= '<div class="bk-white-content">';
		    $authors_html .= '<div class="row">';
		      $authors_html .= '<div class="col-sm-3 col-md-3 col-lg-2 d-none d-sm-block">';
		        $authors_html .='<div class="img-author">';
		          $authors_html .= '<img src="'.$author_photo_url[0].'" class="aligncenter img-fluid rounded-circle"/>';
		        $authors_html .= '</div>';
		      $authors_html .= '</div>';
		      $authors_html .= '<div class="col-sm-12 col-md-9 col-lg-10">';
		        $authors_html .= '<div class="content_authors">';
		            $authors_html .= '<a href="'.$author_link.'"><h3>'.$author_name.' '.$author_last_name.'</h3></a>';
		            $authors_html .= '<p>'.$author_bio.'</p>';
		        $authors_html .= '</div>';
		      $authors_html .= '</div>';
		    $authors_html .= '</div>';
		  $authors_html .= '</div>';
		  $authors_html .= '</div>';
		 
	}
 	return $authors_html;
    
}

add_shortcode('expert_review', 'hm_get_reviewers');
function hm_get_reviewers($atts, $content = null){
	$reviewers_ids = get_field('expert_review_board','option');
	
	$authors_html = '';
	foreach ($reviewers_ids  as $key => $value){
		
		  $id_author = $value;
		  $author_name = get_the_author_meta('first_name',$id_author);
		  $author_last_name = get_the_author_meta('last_name',$id_author);
		  $author_bio = get_field('user_short_bio', "user_$id_author");
		  $author_photo_id = get_field('user_photo', "user_$id_author");
		  $author_link = get_author_posts_url($id_author);
		  $size_author = 'author-image';
		  $author_photo_url = wp_get_attachment_image_src( $author_photo_id, $size_author);
			
		  $authors_html .='<div class="meet-our-writers">';	
		  $authors_html .= '<div class="bk-white-content">';
		    $authors_html .= '<div class="row">';
		      $authors_html .= '<div class="col-sm-3 col-md-3 col-lg-2 d-none d-sm-block">';
		        $authors_html .='<div class="img-author">';
		          $authors_html .= '<img src="'.$author_photo_url[0].'" class="aligncenter img-fluid rounded-circle"/>';
		        $authors_html .= '</div>';
		      $authors_html .= '</div>';
		      $authors_html .= '<div class="col-sm-12 col-md-9 col-lg-10">';
		        $authors_html .= '<div class="content_authors">';
		            $authors_html .= '<a href="'.$author_link.'"><h3>'.$author_name.' '.$author_last_name.'</h3></a>';
		            $authors_html .= '<p>'.$author_bio.'</p>';
		        $authors_html .= '</div>';
		      $authors_html .= '</div>';
		    $authors_html .= '</div>';
		  $authors_html .= '</div>';
		  $authors_html .= '</div>';
		 
	}
 	return $authors_html;
    
}

add_shortcode('hc_zip_codes_form_content_single', 'hc_get_zip_codes_content_single');
function hc_get_zip_codes_content_single($atts, $content = null)
{
	extract(shortcode_atts(array(
      'title' => null,
      'sub_title' => null
   ), $atts));
   
     $zip_code .= '<div id="zip_content_single">';
     $zip_code .= '<form class="zip-codes-form zip-codes-form-two">';
     $zip_code.='<div class="zip_content--title">'.$title.'</div>';
			$zip_code.='<div class="zip_content--content">'.$sub_title.'</div>';
            $zip_code .= '<div style="display:none;" class="zip-code-input-container zip-code-input-container-padding zip-code-input-container-options">';
            $zip_code .= '<div class="form-check">';
                $zip_code .= '<input class="form-check-input hc-select" type="radio" id="hc-radio11" name="hc-radio1" value="insurance">';
                    $zip_code .= '<label class="form-check-label" for="hc-radio11">';
                        $zip_code .= 'Health Insurance';
                    $zip_code .= '</label>';
            $zip_code .= '</div>';
            $zip_code .= '<div class="form-check">';
                $zip_code .= '<input class="form-check-input hc-select" type="radio" id="hc-radio22" name="hc-radio1" value="suplemment" checked>';
                    $zip_code .= '<label class="form-check-label" for="hc-radio22">';
                        $zip_code .= 'Medicare';
                    $zip_code .= '</label>';
            $zip_code .= '</div>';
        $zip_code .= '</div>';
		 $zip_code .='<div class="d-block d-sm-none zip_content--title_mobile">Enter Your Zip Code</div>';
        $zip_code .='<div class="zip-code-input-container zip-code-input-container-padding zip-code-input-container-numbers">';
          $zip_code .='<div class="hc-find__field zip-code">
                        <!--<label class="hc-find__label">Zip Code</label>-->
                        <input class="hc-find__input thezip-code-input bottom_zipform" type="number" inputmode="numeric" max="99999" placeholder="Zip Code" autocomplete="off" min="0" oninput="validity.valid||(value=\'\');"><label class="hc-find__label_error">Provide a Valid ZipCode</label><div style="display:none;" class="hc-find__input-check input-check"><i class="fas fa-check" aria-hidden="true"></i></div></div>';
        $zip_code .= '</div>';

        $zip_code .= '<div class="zip-code-input-container zip-code-input-container-button">';
        $zip_code .= '<button type="submit" class="zip-code-button hc-find__button input-send" disabled="disabled">
                               See Plans <i class="fas fa-angle-right"></i>
                             </button>';
        $zip_code .= '</div>';
    $zip_code .= '</form>';
  	$zip_code .= '</div>';
  
    return $zip_code;
   
}

add_shortcode('cta', 'generic_cta');
function generic_cta($atts, $content = null){
   extract(shortcode_atts(array(
      'title' => null,
      'desc' => null,
      'image' => null,
      'url' => null,
      'cta_text' => null,
   ), $atts));

   $cats = get_the_category(get_the_ID());
   $parent = get_category($cats[1]->category_parent);
   $cat = get_category($cats[0]);

   $generic_cta_module = get_field('generic_cta', 'category_'.$cat->term_id);

   if (is_null($image)) {
    $image = $generic_cta_module['generic_cta_image'];
   }

   if (is_null($title)) {
    $title = $generic_cta_module['generic_cta_title'];
   }

   if (is_null($desc)) {
    $desc = $generic_cta_module['generic_cta_description'];
   }

   if (is_null($url)) {
    $url = $generic_cta_module['generic_cta_url'];
   }

   if (is_null($cta_text)) {
    $cta_text = $generic_cta_module['generic_cta_text'];
   }   

   $return_string = '';
   $return_string .= '<div class="hc-generic-cta hcinc_shortcodes"><img class="alignleft" src="'.$image.'" /><h4>'.$title.'</h4><p>'.$desc.'</p><a target="_blank" onClick="genericCta();" href="'.$url.'">'.$cta_text.'</a></div>';

   return $return_string;
}

add_shortcode('email_lead', 'hm_get_email_lead_gen');
function hm_get_email_lead_gen($atts, $content = null){
	extract(shortcode_atts(array(
      'title' => null,
      'sub_title' => null,
      'id_form' => null,
      'text_after_email' => null,
   ), $atts));
   //$gravity_email_form_id = get_field('gravity_forms_email_lead_form_id', 'option');
   $categories = get_the_category();
   $single_cat = $categories[0]->name;
   
  	$form = '[gravityform id="'.$id_form.'" title="false" field_values="category='.$single_cat.'" description="false" ajax="true"]';
   
   	$email_lead = '<div>';
	   	$email_lead .= '<div class="email_lead_gen hcinc_shortcodes">';
			$email_lead .= '<h2 class="title_email_lead">'.$title.'</h2>';
			$email_lead .='<h3 class="text-lead">'.$sub_title.'</h3>';
			$email_lead .= apply_filters('the_content',$form);
			$email_lead .='<div class="text-after-email">'.$text_after_email.'</div>';
			$email_lead .= '</div>';
		$email_lead .= '</div>';
		?>
    <?php if(is_single()) { ?>
		<script type="text/javascript">
		  jQuery(document).ready(function(){

		        jQuery(document).on('gform_confirmation_loaded', function(event, formId){
		            if(formId == <?php echo $id_form ?>) {
                  window.dataLayer.push({ 'event': 'inArticle_email_cta' });
                  
    				     	$(".title_email_lead").remove();
    				  		$(".text-lead").remove();
    				  		$(".text-after-email").remove();
    				  		$('.email_lead_gen').parent().addClass('hide_lead_gen');
    				  		
    				  		$( ".hide_lead_gen" ).on( "click", function() {
    		 					  $(this).remove();
    		  				});
		            }
		        });
		 
		    });
		</script>
    <?php } ?>
	<?php
    return $email_lead;
   
}

add_shortcode('article_quote', 'hm_in_article_quote');
function hm_in_article_quote($atts, $content = null){
	extract(shortcode_atts(array(
      'quote_text' => null,
      'image' => null,
      'image_text' => null,
      'cta_link' => null,
      'cta_text' => null,
   ), $atts));
   
   	$article_quote = '<div class="article-quote ">';
		$article_quote .='<div class="row">';
			$article_quote .='<div class="col-9">';
				$article_quote .='<p>'.$quote_text.'</p>';
			$article_quote .= '</div>';
			$article_quote .='<div class="col-3">';
				$article_quote .= '<img src="'.$image.'" class="img-fluid rounded-circle">';
				$article_quote .= '<small>'.$image_text.'</small>';
			$article_quote .= '</div>';
		$article_quote .= '</div>';
		$article_quote .='<div class="row">';
			$article_quote .='<div class="col-12">';
				$article_quote .='<center><a href="'.$cta_link.'" class="hci-quote-cta">'.$cta_text.'</a></center>';
			$article_quote .= '</div>';
		$article_quote .= '</div>';
	$article_quote .= '</div>';
	
	
    return $article_quote;
   
}


add_shortcode('article_helpful', 'hm_get_article_helpful');
function hm_get_article_helpful($atts, $content = null){
	extract(shortcode_atts(array(
      'id_form' => null,
   ), $atts));
   
  	$form = '[gravityform id="'.$id_form.'" title="false" description="false" ajax="true"]';
	$helpful.='<div class="article_helpful">';
		$helpful.= '<div class="row">';
			$helpful.='<div class="col-xs-12 col-12">';
				$helpful .= apply_filters('the_content',$form);
			$helpful.='</div>';
		$helpful.='</div>';		
	$helpful.='</div>';
   	
    return $helpful;
}

// create shortcode to list posts in grid system
add_shortcode( 'hcinc_categories_grid_system', 'hcinc_categories_grid_system' );
function hcinc_categories_grid_system( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'grid' => '',
        'tag' => '',
        'list' => false,
    ), $atts ) );

    $categories = get_categories(array(
    'taxonomy'   => 'category',
    'order'      => 'ASC',
    'parent'     => 0,
    'hide_empty' => 0,
      'meta_query' => array(
        array(
          'key' => 'show_in_home',
          'value' => 'Yes'
        )
    )
  ));

  echo '<div class="row">';
  $i = 1;
  foreach($categories as $cat){
    $icon_categorie = get_field('category_icon', 'category_'.$cat->term_id);
    $title_categorie = get_field('category_title_in_home', 'category_'.$cat->term_id);
    $category_link = get_category_link($cat->term_id);
    $posts_categories = get_field('category_popular_posts', 'category_'.$cat->term_id);
    $category_icon = get_field('category_icon_font_awesome', 'category_'.$cat->term_id);
    $icon = $icon_categorie;
      ?>
    
    <div class="col-lg-<?php if($grid){ echo $grid; } else { echo '4'; } ?> col-md-<?php if($grid){ echo $grid; } else { echo '4'; } ?> col-12">
      <div class="hcinc_grid_categories <?php if($i == 1) { echo 'hcinc_grid_categories_collapse'; } ?>">
        <div class="hcinc_grid_categories_icon">
          <?php 
          if($category_icon){
            $category_icon_i = $category_icon;
          }else{
            $category_icon_i = '<i class="fas fa-link"></i>';
          } 

            echo $category_icon_i;
          ?>

        </div>

        <h3><a href="<?php echo $category_link; ?>"><?php echo $title_categorie ?></a></h3>

        <?php
        $image = get_field('category_featured_image_home', 'category_'.$cat->term_id);
        $size = 'homepage-content-hub-module';
        $image_attributes = wp_get_attachment_image_src( $image, $size );
        if( $image ) {
            echo '<img src="'.$image_attributes[0].'" class="img-fluid">';
        }
        ?>

        <div class="hcinc_grid_categories_content">
        <?php foreach ($posts_categories as $post_category){
            $link_post_cat = get_the_permalink($post_category->ID);
            $link_post_img = get_the_post_thumbnail($post_category->ID,'thumbnail');
          ?>
          <p>
            <a title="<?php echo $post_category->post_title; ?>" href="<?php echo $link_post_cat ?>"><?php echo $post_category->post_title; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
          </p>
          <?php
        } ?>
        </div>
      </div>
    </div>
    <?php
    $i++;
  }

  echo '</div>';

    $myvariable = ob_get_clean();
    return $myvariable;
}


// create shortcode to list posts in row system
add_shortcode( 'hcinc_categories_row_system', 'hcinc_categories_row_system' );
function hcinc_categories_row_system( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'grid' => '',
        'tag' => '',
        'list' => false,
    ), $atts ) );

    $categories = get_categories(array(
    'taxonomy'   => 'category',
    'order'      => 'ASC',
    'parent'     => 0,
    'hide_empty' => 0,
      'meta_query' => array(
        array(
          'key' => 'show_in_home',
          'value' => 'Yes'
        )
    )
  ));

  echo '<div class="row">';

  foreach($categories as $cat){
    $icon_categorie = get_field('category_icon', 'category_'.$cat->term_id);
    $title_categorie = get_field('category_title_in_home', 'category_'.$cat->term_id);
    $category_link = get_category_link($cat->term_id);
    $posts_categories = get_field('category_popular_posts', 'category_'.$cat->term_id);
    $category_icon = get_field('category_icon_font_awesome', 'category_'.$cat->term_id);
    $icon = $icon_categorie;

      ?>
    
    <div class="col-lg-12 col-md-12 col-12">
      <div class="mg_widget_featured_categories">

        <div class="mg_featured_categories_title">
        <h3><?php if($category_icon){ $category_icon_i = $category_icon; }else{ $category_icon_i = '<i class="fas fa-link"></i>'; } echo $category_icon_i; ?> <a href="<?php echo $category_link; ?>"><?php echo $title_categorie ?></a></h3>
        </div>

        <div class="mg_featured_categories_content">
        <div class="row">
        <?php foreach ($posts_categories as $post_category){
            $link_post_cat = get_the_permalink($post_category->ID);
            $link_post_img = get_the_post_thumbnail($post_category->ID,'homepage-featured-articles');
            $author_id = get_the_author_meta( $post_category->post_author );
            $user_id = get_the_author_meta( $post_category->post_author );
            print_r($user_id); 
          ?>
          <div class="col-md-4">
            <figure class="mg_featured_categories_content_image"><?php echo $link_post_img; ?></figure>

            <h4><a title="<?php echo $post_category->post_title; ?>" href="<?php echo $link_post_cat ?>"><?php echo $post_category->post_title; ?></a></h4>

            <p><?php echo get_the_excerpt($post_category->ID); ?></p>

            <div class="entry-meta">
              <?php
                  echo '<h6>';
                  echo the_time('F jS, Y');
                  echo '</h6>';
              ?>
              <span>By</span> <a href="<?php echo get_author_posts_url( $post_category->post_author ); ?>" title="<?php the_author_meta( 'display_name', $post_category->post_author ); ?>"><?php the_author_meta( 'display_name', $post_category->post_author ); ?></a>
            </div><!-- .entry-meta -->

          </div>
          <?php
        } ?>
        </div>
        </div>
      </div>
    </div>
    <?php
    $c++;
    $i++;
  }

  echo '</div>';

    $myvariable = ob_get_clean();
    return $myvariable;
}

// create shortcode to list suggested plans
add_shortcode( 'hcinc_suggested_plans', 'hcinc_suggested_plans' );
function hcinc_suggested_plans( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'style' => '',
    ), $atts ) );

    $hci_type_of_suggested_plans = get_field('hci_type_of_suggested_plans', 'option'); 
    if($hci_type_of_suggested_plans == 'v2'){
      echo '<div class="suggested-plans-v2"></div>';
    }else{
      echo '<div class="suggested-plans-v1"></div>';
    }

    $myvariable = ob_get_clean();
    return $myvariable;
}

// create shortcode to list popular articles
add_shortcode( 'hcinc_popular_articles', 'hcinc_popular_articles' );
function hcinc_popular_articles( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'style' => '',
    ), $atts ) ); ?>

    <?php
      $featured_articles = get_field('featured_articles', 'option');  
      $featured_articles_icon = $featured_articles['featured_articles_icon']; 
      $featured_articles_title = $featured_articles['featured_articles_title']; 
      $featured_articles_articles = $featured_articles['featured_articles_articles']; 
    ?>

    <div class="featured_articles">
      <h3><?php if($featured_articles_icon) echo $featured_articles_icon; ?> <?php if($featured_articles_title) echo $featured_articles_title; ?></h3>
        <?php

        if( $featured_articles_articles ): 

          foreach( $featured_articles_articles as $post):
          setup_postdata( $post ); 
          ?>

          <div class="row">
            <div class="col-md-12">
              <div class="featured_articles_content">
                <figure>
                  <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" class="alignleft" />
                </figure>
                <h4><a href="<?php the_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h4>
                <p><?php echo get_the_excerpt($post->ID); ?></p>

                <div class="entry-meta">
                  <?php
                    echo '<h6>';
                    echo ""; the_time('F jS, Y');
                    echo '</h6>';
                  ?>
                  <span>By</span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
                </div><!-- .entry-meta -->
              </div>
            </div>
          </div>

            <?php endforeach; wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>

    <?php $myvariable = ob_get_clean();
    return $myvariable;
}


// create shortcode to list popular articles
add_shortcode( 'hcinc_expert_reviewers', 'hcinc_expert_reviewers' );
function hcinc_expert_reviewers( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'style' => '',
    ), $atts ) ); ?>

    <?php
      $featured_reviewers = get_field('featured_reviewers','option');  
      $featured_reviewers_icon = $featured_reviewers['featured_reviewers_icon']; 
      $featured_reviewers_title = $featured_reviewers['featured_reviewers_title']; 
      $featured_reviewers_articles = $featured_reviewers['featured_reviewers_articles']; 
    ?>

    <div class="featured_review">
      <h3 class="widget-review"><?php if($featured_reviewers_icon) echo $featured_reviewers_icon; ?> <?php if($featured_reviewers_title) echo $featured_reviewers_title; ?></h3>

      <div class="featured_review_container">

        <?php

        if( $featured_reviewers_articles ): 

          foreach( $featured_reviewers_articles as $user):

          $author_id = $user->ID;
          $author_headline = get_field('user_headline_2', 'user_'. $author_id );
          $author_photo_id = get_field('user_photo', 'user_'. $author_id );
          $author_photo_url = wp_get_attachment_image_src( $author_photo_id, 'expert-image');

          ?>

          <div class="row">
            <div class="col-md-12">
              <div class="featured_review_content">
                <figure>
                  <img src="<?php echo $author_photo_url[0]; ?>" class="alignleft" />
                </figure>
                <h4><a href="<?php echo get_author_posts_url($user->ID); ?>"><?php echo $user->display_name; ?></a></h4>
                <h6><?php echo $author_headline; ?></h6>
              </div>
            </div>
          </div>

            <?php endforeach; //wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
      </div>
    </div>

    <?php $myvariable = ob_get_clean();
    return $myvariable;
}

/*ZIPCODE FORM WITH MEDICARE AND HEALTH INSURANCE OPTION*/
add_shortcode('hcinc_lead_gen_form', 'hci_lead_gen_form');	
function hci_lead_gen_form($atts)	
{	
    extract( shortcode_atts( array (	
        'title' => '',	 
        'sub_title' => '',	
        'cta' => '',	
        'placeholder' => '',	
        'usefas' => '',	
        'position' => '',	
        'disclaimer' => '',
        'products' => ''
    ), $atts ) ); 	
      $the_fas = "";	
    if($position == 'header'){	
      $zipLeadPosition = 'top_';	
    }elseif($position == 'footer'){	
      $zipLeadPosition = 'bottom_';	
    }elseif($position == 'landing'){	
      $zipLeadPosition = 'landing_';	
	}elseif($position == 'right_rail'){	
      $zipLeadPosition = 'right_rail_';  
    }else{	
      $zipLeadPosition = 'inArticle_';	
    }	

    if($products == 'yes'){	
      $showProducts = 'block';	
    }else{	
      $showProducts = 'none';	
    }	

    if($cta){	
      $ctaText = $cta;	
    }else{	
      $ctaText = 'See Plans';	
    }	

    if($usefas){	
      $the_fas = '<input type="hidden" id="'.$zipLeadPosition.'usefas" name="'.$zipLeadPosition.'usefas" value="1">';	
    }else{	
      $the_fas = '';	
    }	

    if($placeholder){	
      $placeholderText = $placeholder;	
    }else{	
      $placeholderText = 'Enter Zip Code';	
    }	
    $hcinc_product = get_field('hcinc_product','option');	


    $zip_code .= '<form class="zip-codes-form zip-codes-form-two hcinc_shortcodes">';	
        if($title){	
          $zip_code .= '<h2>'.$title.'</h2>';	
        }	

        if($sub_title){	
          $zip_code .= '<h3>'.$sub_title.'</h3>';	
        }	

        $zip_code .= '<div style="display:'.$showProducts.';" class="zip-code-input-container-options">';	

        $zip_code .= '<h6 class="form-check-label">';	
            $zip_code .= 'I’m Looking for:';	
        $zip_code .= '</h6>';	
        $zip_code .= $the_fas;	
        $zip_code .= '<div class="form-check">';	
            if($hcinc_product == 'HEALTH'){	
              $zip_code .= '<input class="form-check-input hc-select serviceType" type="radio" id="'.$zipLeadPosition.'hc-radio1" name="'.$zipLeadPosition.'hc-radio" value="insurance" checked>';	
            }else{	
              $zip_code .= '<input class="form-check-input hc-select serviceType" type="radio" id="'.$zipLeadPosition.'hc-radio1" name="'.$zipLeadPosition.'hc-radio" value="insurance">';	
            }	

                $zip_code .= '<label class="form-check-label" for="'.$zipLeadPosition.'hc-radio1">';	
                    $zip_code .= 'Health Insurance';	
                $zip_code .= '</label>';	
        $zip_code .= '</div>';	

        $zip_code .= '<div class="form-check">';	

            if($hcinc_product == 'MEDICARE'){	
              $zip_code .= '<input class="form-check-input hc-select serviceType" type="radio" id="'.$zipLeadPosition.'hc-radio2" name="'.$zipLeadPosition.'hc-radio" value="suplemment" checked>';	
            }else{	
              $zip_code .= '<input class="form-check-input hc-select serviceType" type="radio" id="'.$zipLeadPosition.'hc-radio2" name="'.$zipLeadPosition.'hc-radio" value="suplemment">';	
            }	

                $zip_code .= '<label class="form-check-label" for="'.$zipLeadPosition.'hc-radio2">';	
                    $zip_code .= 'Medicare';	
                $zip_code .= '</label>';	
        $zip_code .= '</div>';	

        $zip_code .= '</div>';	

        $zip_code .= '<hr style="display:'.$showProducts.';">';	

        $zip_code .='<div class="zip-code-input-container zip-code-input-container-numbers">';	
          $zip_code .='<div class="hc-find__field zip-code"><input class="hc-find__input thezip-code-input '.$zipLeadPosition.'zipform" type="number" inputmode="numeric" max="99999" placeholder="'.$placeholderText.'" autocomplete="off" min="0" oninput="validity.valid||(value=\'\');"><label class="hc-find__label_error">Provide a Valid ZipCode</label><div style="display:none;" class="hc-find__input-check input-check"><i class="fas fa-check" aria-hidden="true"></i></div></div>';	
        $zip_code .= '</div>';	

        $zip_code .= '<div class="zip-code-input-container zip-code-input-container-button">';	
        $zip_code .= '<button type="submit" class="zip-code-button hc-find__button input-send" disabled="disabled">'.$ctaText.'</button>';	
        $zip_code .= '</div>';	

        if($disclaimer){
          $zip_code .= "<p>".$disclaimer."</p>"; 
        }

    $zip_code .= '</form>';	

    return $zip_code;	

}	

// create shortcode to list content boxes
add_shortcode( 'hcinc_home_content_boxes', 'hcinc_home_content_boxes' );
function hcinc_home_content_boxes( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'style' => '',
    ), $atts ) );

    if( have_rows('homepage_hero_module', 'option') ):

      echo '<div class="container">';
      echo '<div class="row">';

        while ( have_rows('homepage_hero_module', 'option') ) : the_row();

            $homepage_hero_module_icon = get_sub_field('homepage_hero_module_icon');
            $homepage_hero_module_title_1 = get_sub_field('homepage_hero_module_title_1');
            $homepage_hero_module_title_2 = get_sub_field('homepage_hero_module_title_2');
            $homepage_hero_module_url = get_sub_field('homepage_hero_module_url');
            $homepage_hero_module_url_target = get_sub_field('homepage_hero_module_url_target');

            if($homepage_hero_module_icon){
            echo '<div class="col-md-3 col-6">';
              echo '<a target="'.$homepage_hero_module_url_target.'" href="'.$homepage_hero_module_url.'">';
              echo '<div class="hero_content_boxes_container">';
                  echo '<img src="'.$homepage_hero_module_icon.'" />';
                  echo '<h4>'.$homepage_hero_module_title_1.'<br/>'.$homepage_hero_module_title_2.'</h4>';
              echo '</div>';
              echo '</a>';
            echo '</div>';
            }

        endwhile;

        echo '</div>';
        echo '</div>';

    endif;

    $myvariable = ob_get_clean();
    return $myvariable;
}


// create shortcode to list content boxes
add_shortcode( 'hcinc_content_boxes', 'hcinc_content_boxes' );
function hcinc_content_boxes( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'style' => '',
    ), $atts ) );

    if( have_rows('content_boxes', 'option') ):

      echo '<div class="phcom-custom-boxes">';
      echo '<div class="wp-block-columns">';

        while ( have_rows('content_boxes', 'option') ) : the_row();

            $context_box_details = get_sub_field('context_box_details');

            if($context_box_details){
            echo '<div class="wp-block-column">';
              echo $context_box_details;
            echo '</div>';
            }

        endwhile;

        echo '</div>';
        echo '</div>';

    endif;

    $myvariable = ob_get_clean();
    return $myvariable;
}


// create shortcode to list external faqs
add_shortcode( 'hcinc_external_faqs', 'hcinc_external_faqs' );
function hcinc_external_faqs( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'search_url' => '',
    ), $atts ) );


    if( have_rows('external_faqs_pages') ):

      echo '<div class="hcinc-external-faqs">';

        while ( have_rows('external_faqs_pages') ) : the_row();

            $external_faqs_title = get_sub_field('external_faqs_title');
            $external_faqs_url = get_sub_field('external_faqs_url');

            if($external_faqs_title){
              echo '<a target="_blank" href="'.$external_faqs_url.'">';
              echo $external_faqs_title;
              echo '</a>';
            }

        endwhile;

        if($search_url){
        echo '<form role="search" target="_blank" method="get" id="" class="faq-searchform" action="'.$search_url.'" autocomplete="off"><label class="screen-reader-text" for="s">Buscar:</label><input placeholder="Search for something" type="text" value="" name="s" id="s"><button type="submit" id="searchsubmit">Search <i class="fas fa-angle-right"></i></button></form>';
        }

        echo '</div>';

    else :

      if( have_rows('external_faqs', 'option') ):

        echo '<div class="hcinc-external-faqs">';

          while ( have_rows('external_faqs', 'option') ) : the_row();

              $external_faqs_title = get_sub_field('external_faqs_title');
              $external_faqs_url = get_sub_field('external_faqs_url');

              if($external_faqs_title){
                echo '<a target="_blank" href="'.$external_faqs_url.'">';
                echo $external_faqs_title;
                echo '</a>';
              }

          endwhile;

          if($search_url){
          echo '<form role="search" target="_blank" method="get" id="" class="faq-searchform" action="'.$search_url.'" autocomplete="off"><label class="screen-reader-text" for="s">Buscar:</label><input placeholder="Search for something" type="text" value="" name="s" id="s"><button type="submit" id="searchsubmit">Search <i class="fas fa-angle-right"></i></button></form>';
          }

          echo '</div>';

      endif;

    endif;

    $myvariable = ob_get_clean();
    return $myvariable;
}

// create shortcode to list external faqs
add_shortcode( 'hcinc_custom_reviews', 'hcinc_custom_reviews' );
function hcinc_custom_reviews( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'search_url' => '',
    ), $atts ) );


    if( have_rows('custom_reviews', 'option') ):

      echo '<div class="hcinc-custom-reviews">';

        $i = 1;

        while ( have_rows('custom_reviews', 'option') ) : the_row();

            $custom_reviews_comment = get_sub_field('custom_reviews_comment');
            //$external_faqs_url = get_sub_field('external_faqs_url');

            if($custom_reviews_comment){
              if($i == 1){
                echo '<div data-review="'.$i.'" class="hcinc-custom-review-box hcinc-custom-review-selected">';
              }else{
                echo '<div data-review="'.$i.'" class="hcinc-custom-review-box">';
              }
              echo $custom_reviews_comment;
              echo '</div>';
            }

        $i++;

        endwhile;

        $c == 0;

        while ( have_rows('custom_reviews', 'option') ) : the_row();

            $c++;
            echo '<div data-bullet="'.$c.'" class="hcinc-custom-review-bullet">'.$c.'</div>';
            
        endwhile;       

        /*if($search_url){
        echo '<form role="search" target="_blank" method="get" id="" class="faq-searchform" action="'.$search_url.'" autocomplete="off"><label class="screen-reader-text" for="s">Buscar:</label><input placeholder="Search for something" type="text" value="" name="s" id="s"><button type="submit" id="searchsubmit">Search <i class="fas fa-angle-right"></i></button></form>';
        }*/

        echo '</div>';

    endif;

    $myvariable = ob_get_clean();
    return $myvariable;
}





// create shortcode to list content boxes
add_shortcode( 'hcinc_get_page', 'hcinc_get_page' );
function hcinc_get_page( $atts ) {
    ob_start();

    extract( shortcode_atts( array (
        'blog_id' => '',
        'slug' => '',
    ), $atts ) );

    global $switched;

    switch_to_blog($blog_id);

    $args = array(
      'pagename' => $slug,
    );

    // The Query
    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            the_content();
        }
    }
    /* Restore original Post Data */
    wp_reset_postdata();

    restore_current_blog();

    $myvariable = ob_get_clean();
    return $myvariable;
}

//create shortcode for subsidy calculator
add_shortcode('subsidy_calculator', 'hcinc_subsidy_calculator');
function hcinc_subsidy_calculator($atts, $content = null){
	extract(shortcode_atts(array(
      'cta2url' => null,
      'disclaimer_text' => null,
      'cta1' => 'Submit',
      'cta2' => 'Learn More About Plans'
   ), $atts));
   /* avoid loading the js on gutenberg to prevent "Unexpected token < in JSON at position 0" triggers when save post */
   if(is_single()) { ?> 
<script src="https://cdn.healthcare.com/resources/content/js/vanilla/vanilla.js"></script>
<script>
function goto_flow(){
  window.location.href = '<?php echo $cta2url; ?>';
}
function clearMessages(){
  document.getElementById('date_message').innerHTML = "";
  document.getElementById('tobacco_message').innerHTML = "";
  document.getElementById('gender_message').innerHTML = "";
}
function validDate(dateString){
  clearMessages();
  // First check for the pattern
  var validOrNot = "1";
  if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString)){
    validOrNot = "0";
  } else {
    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    var year = parseInt(parts[2], 10);
    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
      validOrNot = "0";
    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;
    // Check the range of the day
    if (day > 0 && day <= monthLength[month - 1]) {
      //do nothing
    } else {
      validOrNot = "0";
    }
  } 
  if (validOrNot !== "1"){
    document.getElementById('date_message').innerHTML = 'Please enter the date in the format "MM/DD/YYYY".';
  }
  return validOrNot;

}
function calculate_subsidy(){
  // GET SUBSIDY DATA 
  clearMessages();
  var subs_zipcode = document.getElementById('calculator_zipcode').value;
  if ((!document.getElementById('calculator_zipcode').value ) || (subs_zipcode.length<5)) {
    document.getElementById('zipcode_message').style.textIndent = "0px";
    return;
  }
  var subs_birthdate = document.getElementById('calculator_birthdate').value;
  if (!subs_birthdate) {
    document.getElementById('date_message').innerHTML = "Please provide date of birth";
    return;
  } else {
    <?php 
if (isset($_SERVER['HTTP_USER_AGENT']) && ( (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false ) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) ) ){ 
  ?>

    if (validDate(subs_birthdate) !== "1"){
       return;
    }
  <?php } ?>
    subs_birthdate = subs_birthdate.replace(/-/g,"/");
  }
  var subs_members = parseInt(document.getElementById('calculator_members').value,10);
  var subs_income = parseInt(document.getElementById('calculator_income').value,10);
  if (subs_income < 1){
    subs_income = 1;
  }
  if (document.querySelector('input[name="calculator_tobacco"]:checked')){
    if (document.getElementById("tobacco_yes").checked){
      ld_subs_tobacco = 'y';
      var subs_tobacco = 1;
    } else {
      ld_subs_tobacco = 'n';
      var subs_tobacco = 0;
    }



  } else {
    document.getElementById('tobacco_message').innerHTML = "Please select one";
    return;
  }
  if (document.querySelector('input[name="calculator_gender"]:checked')){
    var subs_gender = parseInt(document.querySelector('input[name="calculator_gender"]:checked').value,10);
  } else {
    document.getElementById('gender_message').innerHTML = "Please select one";
    return;
  }
lrData = window.hc.sem.storage.getHCStorage();
var subs_session = window.lData.healthcareSession;
  //update localstorage DATA
  //location data 
var stg = document.domain.match(/stg/) ? '.stg' : '';
var subdomain = document.domain.match(/local|qa/) ? '.qa' : stg;
var retrieveLocation = hc.ajax({
  url: 'https://plans-srv'+subdomain+'.healthcare.com/GeoLocation/'+subs_zipcode,
  method: 'GET',
onload: function onload(locationData) {
lData.location.zip_code = locationData[0].zipCode;
lData.location.state_acronym = locationData[0].stateAcronym;
lData.location.state = locationData[0].stateName;
lData.location.county = locationData[0].countyName;
lData.location.city = locationData[0].city;

if (lrData.source.length > 0) {
  lData.source = lrData.source;
}
proxyStorage.default.setItem('hc', JSON.stringify(lData));
  },
});

  lData.household.income = subs_income;
  //lData.household.size = subs_members;
  if (subs_gender == "0"){
lData.members[0].gender = "f";
} else {
  lData.members[0].gender = "m"; 
}
  lData.members[0].tobacco = ld_subs_tobacco;
//  lData.location.zip_code = subs_zipcode;
//format dateOfBirth for localStorage
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && ( (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false ) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) ) ){ 
  ?>
lData.members[0].dob = subs_birthdate;
  <?php } else { ?>
    var parts = subs_birthdate.split("/");
    var month = parts[1];
    var year = parts[0];
    var day = parts[2];    
    var hcDate = month + "/" + day + "/" + year ;
lData.members[0].dob = hcDate;  
      <?php } ?>
   proxyStorage.default.setItem('hc', JSON.stringify(lData));
  var payload = {
    "Applicant": {
      "HouseIncome": subs_income,
      "HouseHoldSize": subs_members,
      "Holder": {
        "FirstName": "",
        "LastName": "",
        "TypePerson": 0,
        "TypeGender": subs_gender,
        "TabacoUse": subs_tobacco,
        "DateOfBirth": subs_birthdate
      },
      "GeoLocation": {
        "zipCode": subs_zipcode
      }
    },
    "TrackObject": {
      "SessionId": subs_session
    }
  }

var xhr = hc.ajax({
  url: 'https://plans-srv'+subdomain+'.healthcare.com/SubsidyCheck',
  method: 'POST',
  // headers: {'Cache': 'no-cache'},
  data: payload,
  // credentials: 'include'
   onload: function onload(data) {
var calculator_output = '<h2 class="hcinc_title_subsidy_calculator"><img src="https://cdn.healthcare.com/resources/content/icons/calculator_icon.svg" align="left" id="calculator_icon" />Subsidy<br>Calculator Tool</h2>';
calculator_output += '<hr>';
calculator_output += '<h2 id="output_title"> '+data.title + "</h2>";
calculator_output += '<div id="output_text">' + data.subsidyMessage + "</div>";
if (data.silverPlanAmount > 0){
var dollar_amount = data.silverPlanAmount.toFixed(2);
calculator_output += '<div id="output_amount"><span class="amount_upper">$</span>' + dollar_amount + '<span class="amount_down">/month</span></div>'; 

}
calculator_output += '<div id="output_disclaimer" ><?php echo $disclaimer_text; ?></div>';
calculator_output += '<input type="button" id="calculator_submit_button" class="gform_button button" value="Learn More About Plans" onclick="goto_flow();">';
document.getElementById('this_subsidy_calculator').innerHTML = calculator_output;
  },
});

}

function autoFillCalculator(){
//autofill fields with current data on localstorage
window.lData = window.hc.sem.storage.getHCStorage();
var calc_session = window.lData.healthcareSession;
var calc_zipcode = window.lData.location.zip_code;
var calc_members = window.lData.household.size;
var calc_income = window.lData.household.income;
if (window.lData.members[0]){
  var calc_tobacco = window.lData.members[0].tobacco;
  var calc_gender = window.lData.members[0].gender;
  var calc_birthdate = window.lData.members[0].dob;
  var date = new Date(calc_birthdate);
    if (!isNaN(date.getTime())) {
        // Months use 0 index.
        calc_birthdate = date.getFullYear() + '-' + ('0' + (date.getMonth()+1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
    }

}

if (calc_zipcode){
  document.getElementById('calculator_zipcode').value = calc_zipcode;
  document.getElementById('validity_check').classList.add("visible")
}
if (calc_members){
  document.getElementById('calculator_members').value = calc_members;
  var members_value = ((parseInt(calc_members) * 100)/7) - 14; 
  document.getElementById('calculator_members').style.background = "linear-gradient(to right, #00AEBB 5%, #00AEBB " + members_value + "%, #E6F5F6 " + members_value + "%, #E6F5F6 100%)";
  update_text(document.getElementById('calculator_members').value,document.getElementById('calculator_members').id);
}
if (calc_income){
  document.getElementById('calculator_income').value = calc_income;
  var income_value = ((parseInt(calc_income) * 100)/150000);
  document.getElementById('calculator_income').style.background = "linear-gradient(to right, #00AEBB 5%, #00AEBB " + income_value + "%, #E6F5F6 " + income_value + "%, #E6F5F6 100%)";
  update_text(document.getElementById('calculator_income').value,document.getElementById('calculator_income').id);
}
if (calc_birthdate){
  //document.getElementById('calculator_birthdate').placeholder = calc_birthdate;
  document.getElementById('calculator_birthdate').value = calc_birthdate;
}
if (calc_gender){

   if (calc_gender == "f"){
    genderbtn = document.getElementById("gender_female");
    genderbtn.checked = true;
  } else {
    genderbtn = document.getElementById("gender_male");
    genderbtn.checked = true;
  }
}

if (calc_tobacco){
  if (calc_tobacco == "n"){
    tobaccobtn = document.getElementById("tobacco_no");
    tobaccobtn.checked = true;
  } else {
    tobaccobtn = document.getElementById("tobacco_yes");
    tobaccobtn.checked = true;
  }
}

}
function update_text(theValue, theId){
  switch(theId){
    case "calculator_members":
      document.getElementById('text_'+theId).innerHTML = theValue + " Members";
    break;
    case "calculator_income":


      document.getElementById('text_'+theId).innerHTML = "$" + theValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    break;
  } 
}
</script>
<?php
   }
   $curr_year = date("Y");
   $valid_year = (int)$curr_year - 18;

   	$subsidy_calculator = '<form class="zip-codes-form-two hcinc_shortcodes hcinc_subsidy_calculator" id="subsidy_form"><div>';
    $subsidy_calculator .= '<div class="" id="this_subsidy_calculator">';
    $subsidy_calculator .= '<h2 class="hcinc_title_subsidy_calculator"><img src="https://cdn.healthcare.com/resources/content/icons/calculator_icon.svg" align="left" id="calculator_icon" />Subsidy<br>Calculator Tool</h2>';
    $subsidy_calculator .= '<div class="calculator_row">';

    $subsidy_calculator .= '<div class="calculator_column zip-codes-form"><label for="calculator_zipcode">Zip Code</label><br><input id="calculator_zipcode" class="hc-find__input thezip-code-input top_zipform calculator_input" type="number" inputmode="numeric" max="99999" placeholder="Zip Code" autocomplete="off" min="0" oninput="validity.valid||(value=\'\');"><label id="zipcode_message" class="hc-find__label_error" style="text-indent: -9999px;">Provide a Valid Zipcode</label><div style="display:none;" class="hc-find__input-check input-check" id="validity_check"><i class="fas fa-check" aria-hidden="true"></i></div></div>';
    
    /* ranges */
    // if ie 11 don't show range fields.
    if (isset($_SERVER['HTTP_USER_AGENT']) && ( (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false ) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) ) ){ 
      $extra_style = '<style>#calculator_birthdate, #calculator_zipcode { padding: 0 27px!important;font-size: 20px!important; }.someInputdisplay::-ms-clear {display: none; width:0; height:0;}</style>';
      $ie_date = 'onchange="validDate(this.value)"';
      $field_members = '<select id="calculator_members" class="ie_field calculator_field">';
      $s = '';
      for ($iex = 1; $iex <= 8; $iex++) {
        $field_members .= '<option value="'.$iex.'">'.$iex.' member'.$s.'</option>';
        $s = 's';
      }
      $field_members .= '</select>';
  
      $field_income = ' ($)<br><input type="number" id="calculator_income" class="ie_field calculator_field" placeholder="10000" value="10000" style="position: relative; top: -9px;" max="150000" inputmode="numeric" min="1">';
        
      } else { 
        $ie_date = 'onchange="clearMessages()"';
  
      $field_members = '<div class="ranges"><div style="float:left;">1 Member</div><div style="float:right;">8 Members</div></div><br><input type="range" id="calculator_members"  min="1" max="8" value="1" onchange="update_text(this.value,this.id);" class="calculator_range the_calculator_members" style="position: relative; top: -9px;" ><div id="text_calculator_members" class="range_message">1 Member</div>';
  
  
      $field_income = '<br><div class="ranges"><div style="float:left;">$1000</div><div style="float:right;">$150,000</div></div><br><input type="range" id="calculator_income" min="1000" max="150000" value="10000" step="1000" onchange="update_text(this.value,this.id);" class="calculator_range the_calculator_income" style="position: relative; top: -9px;" ><div id="text_calculator_income" class="range_message">$ 10,000</div>';
  
      }

    $subsidy_calculator .= '<div class="calculator_column"><label for="calculator_birthdate">Date of Birth</label><br><input type="date" id="calculator_birthdate" class="calculator_input" placeholder="MM/DD/YYYY" onfocus="(this.type=\'date\')" max="'.$valid_year.'-'.date("m").'-'.date("d").'" value="" '.$ie_date.'><div id="date_message" class="error_message"></div></div>';
    $subsidy_calculator .= '</div>';

    $subsidy_calculator .= '<div class="calculator_row">';
    $subsidy_calculator .= '<div class="calculator_column"><label for="calculator_members">People in the family</label><br>'.$field_members.'</div>';
    $subsidy_calculator .= '<div class="calculator_column"><label for="calculator_income">Household Income</label>'.$field_income.'</div>';
    $subsidy_calculator .= '</div>';

    /* selectors */
    $subsidy_calculator .= '<div class="calculator_row">';
    $subsidy_calculator .= '<div class="calculator_column tobacco_selector">';
    $subsidy_calculator .= '<label>Tobacco Use?</label>';

    $subsidy_calculator .= '<ul class="calculator_selector">
    <li>
      <input type="radio" id="tobacco_yes" name="calculator_tobacco" onchange="clearMessages()" />
      <label for="tobacco_yes" value="1" class="left_label">Yes</label>
    </li>
    <li>
      <input type="radio" id="tobacco_no" name="calculator_tobacco" onchange="clearMessages()" />
      <label for="tobacco_no" value="0" class="right_label">No</label>
    </li></ul>';
    $subsidy_calculator .= '<div id="tobacco_message" class="error_message"></div>';
    $subsidy_calculator .= '</div>';

    $subsidy_calculator .= '<div class="calculator_column"><label>Gender</label>';
    
    $subsidy_calculator .= '<ul class="calculator_selector">
    <li>
      <input type="radio" id="gender_female" value="0" name="calculator_gender" onchange="clearMessages()" />
      <label for="gender_female"  class="left_label">Female</label>
    </li>
    <li>
      <input type="radio" id="gender_male" name="calculator_gender" value="1" onchange="clearMessages()" />
      <label for="gender_male" class="right_label">Male</label>
    </li></ul>';
    
    $subsidy_calculator .= '<div id="gender_message" class="error_message"></div></div>';
    
    $subsidy_calculator .= '</div>';
    $subsidy_calculator .= '<input type="button" id="calculator_submit_button" class="gform_button button" value="'.$cta1.'" onclick="calculate_subsidy();">';
    $subsidy_calculator .= '</div>';
    $subsidy_calculator .= '</div></form>';
    $subsidy_calculator .= $extra_style;
    $subsidy_calculator .= '<script>autoFillCalculator();document.getElementById("calculator_members").oninput = function() { var members_value = ((parseInt(this.value) * 100)/7) - 14; this.style.background = "linear-gradient(to right, #00AEBB 5%, #00AEBB " + members_value + "%, #E6F5F6 " + members_value + "%, #E6F5F6 100%)" };document.getElementById("calculator_income").oninput = function() { var income_value = ((parseInt(this.value) * 100)/150000); this.style.background = "linear-gradient(to right, #00AEBB 5%, #00AEBB " + income_value + "%, #E6F5F6 " + income_value + "%, #E6F5F6 100%)" };';
    $subsidy_calculator .= '</script>';


    return $subsidy_calculator;
}
