<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package healthcareinc
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!---CUSTOM STYLING-->
	<style>
	:root {
		<?php //$main_footer_color = get_field('hcinc_background_footer_color', 'option'); if($main_footer_color) { echo '--main-footer-color: '.$main_footer_color.';'; } ?>
	}

	<?php $main_footer_color = get_field('hcinc_background_footer_color', 'option'); if($main_footer_color) { echo '.footer-content{background-color: '.$main_footer_color.' !important;}'; } ?>
	</style>


	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<style>
	@font-face {
	  font-family: 'Source Sans Pro';
	  src: url('/fonts/SourceSansPro.woff2') format('woff2');
	  unicode-range: U+0020-007F; /* The bare minimum for the English Language */
	}

		@font-face {
		font-family: 'Roboto Slab';
	  src: url("https://cdn.healthcare.com/fonts/roboto-slab/robotoslab-webfont.woff2");
	}
	</style>

	<link rel="stylesheet" href="https://use.typekit.net/nxj7xxa.css">
	<link rel="stylesheet" href="https://use.typekit.net/vba5cpf.css">

  	<?php require get_template_directory() . '/custom-functions/custom-style.php'; ?> 
  	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$ambiance = "";
$site_url = get_home_url();
$the_ambiance = preg_match("/stg|www|qa/", $site_url, $match);
if (($match[0] == "stg") || ($match[0] == "qa")){
	$ambiance = $match[0].".";
}
  
if(get_field("include_d3_library")){ ?>
  <script src="https://cdn.healthcare.com/resources/content/js/d3/d3.min.js"></script>
<?php	}

if (shortcode_exists( 'hcinc_suggested_plans' ) ){ ?>
	<script src="<?php echo 'https://assets.'.$ambiance.'healthcare.com/hc-sem.min.js'; ?>"></script>
	<script>
    const tags = [
        "env: <?php echo $ambiance; ?>",
        "company:hc",
        'service:content-site',
        'technology: js',
        'site:'+window.location.host.replace(/(qa|stg)\./g, ""),
    ];
    rg4js("withTags", tags);
</script>
<?php } ?>

<div id="hc_hero_search">
	<div class="widget_search">
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>" autocomplete="off">
			<label class="screen-reader-text" for="s">Buscar:</label>
			<input type="text" value="<?php the_search_query(); ?>" name="s" id="s">
			<button type="submit" id="searchsubmit">
			    Search <i class="fas fa-angle-right"></i>
			</button>
		</form>
	</div>
</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'healthcareinc' ); ?></a>

	<header id="masthead" class="site-header">
			<div class="container">
				<div class="row">
					<div class="col-5 col-md-4 col-lg-3">
						<div class="site-branding">
							<?php $url_logo = get_field('logo_header', 'option'); ?>
							<a href="<?php echo HOMELINK?>" class="custom-logo-link">
								<img width="215" height="20" src="<?php echo $url_logo ?>" alt="HealthCare.org" class="img-fluid custom-logo">
							</a>
							<?php
							//the_custom_logo();
							$healthcareinc_description = get_bloginfo( 'description', 'display' );

							if ( $healthcareinc_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $healthcareinc_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
					</div>

					<?php
					$show_menu_in_header = get_field('show_menu_in_header', 'option'); 
					$header_phone_text = get_field('header_phone_text', 'option');
					$header_phone_text_mobile = get_field('header_phone_text_mobile', 'option');
					$header_phone_icon = get_field('header_phone_icon', 'option'); 

					$header_phone_text_tablet = get_field('header_phone_text_tablet', 'option');
					$header_phone_icon_tablet = get_field('header_phone_icon_tablet', 'option'); 

					$show_phone_in_header = get_field('show_phone_in_header', 'option');
					if ( wp_is_mobile() ) : ?>
						<div class="col-7 col-md-8 col-lg-9">
							<div class="content-flex">
							<?php if($show_phone_in_header == "Yes") { ?>
								<div id="cta-call">
									<p class="show-tablet"><br>
										<?php if($header_phone_icon_tablet) { ?>
										<i class="fa <?php echo $header_phone_icon_tablet; ?>"></i>
										<?php } ?>

										<?php if($header_phone_text_tablet) {  echo '<span>'.$header_phone_text_tablet.'</span>'; } ?> 
										<a class="promo_number" href="tel:+18335674268"><span class="promo_number_formatted">833-567-4268</span></a>
									</p>
									<a class="show-mobile promo_number" href="tel:+18335674268">
										<?php if($header_phone_icon) { ?>
										<i class="fa <?php echo $header_phone_icon; ?>"></i>
										<?php } ?> 

										<?php if($header_phone_text_mobile) {  echo '<span>'.$header_phone_text_mobile.'</span>'; } ?> 
									</a>
								</div>
							<?php } ?>
							<div id="search-mobile">	
								<?php get_search_form(); ?>
							</div>
								<?php 
									$show_menu_in_header = get_field('show_menu_in_header', 'option'); 
									if($show_menu_in_header) { ?>
								<nav id="site-navigation" class="main-navigation">
									<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'healthcareinc' ); ?></button>
									<?php

										$args = array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
											) ;
									    wp_nav_menu($args);
									?>
								</nav><!-- #site-navigation -->
								<?php } ?>
							</div>
						</div>
					<?php else : ?>
							<div class="col-9">	
								<div class="content-flex">
								<!-- Search -->
									<div id="search">						
										<?php get_search_form(); ?>
									</div>
								<!-- Phone -->
									<?php 
									if($show_phone_in_header == "Yes") { ?>
									<div id="cta-call">
									<p><?php
										if($header_phone_text) {  echo $header_phone_text; } ?> 
										<?php if($header_phone_icon) { ?>
										<i class="fa <?php echo $header_phone_icon; ?>"></i>
									<?php } ?>
									<a class="promo_number" href="tel:+18335674268">
									<span class="promo_number_formatted">833-567-4268</span></a>
									</p>
									</div>
									<?php } ?>
								<!-- Menu -->
									<?php 
									if($show_menu_in_header == "Yes") { ?>
										<nav id="site-navigation" class="main-navigation">
											<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'healthcareinc' ); ?></button>
											<?php
		
												$args = array(
														'theme_location' => 'menu-1',
														'menu_id'        => 'primary-menu',
													) ;
											    wp_nav_menu($args);
											?>
										</nav><!-- #site-navigation -->
									<?php 
									} ?>
								</div>						
							</div>
					<?php endif; ?>

				</div><!-- #row -->

			</div>
	</header><!-- #masthead -->
<div class="hcinc_top_banner" id="hcinc_top_banner" style="display: none;">
</div>
	<div id="content" class="site-content">
