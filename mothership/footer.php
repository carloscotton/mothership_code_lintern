<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package healthcareinc
 */
?>

	</div><!-- #content -->

<?php if (!shortcode_exists( 'hcinc_suggested_plans' ) ){ ?>
    <script src="<?php echo 'https://assets.'.$ambiance.'healthcare.com/hc-sem.min.js'; ?>"></script>
    <script>
    const tags = [
        "env:<?php echo $ambiance; ?>",
        "company:hc",
        'service:content-site',
        'technology:js',
        'site:'+window.location.host.replace(/(qa|stg)\./g, ""),
    ];
    rg4js("withTags", tags);
</script>
  <?php
}

  $ziplead_gen_footer = get_field('ziplead_gen_footer', 'option');  
  $ziplead_gen_footer_background_image = $ziplead_gen_footer['ziplead_gen_footer_background_image'];
  $ziplead_gen_footer_title = $ziplead_gen_footer['ziplead_gen_footer_title']; 
?>

<script>


  <?php $hcinc_product = get_field('hcinc_product', 'option');  
  if($hcinc_product){ ?>
    var hcinc_product = "<?php echo $hcinc_product; ?>";
  <?php }else{ ?>
    var hcinc_product = "NO_PRODUCT_PRESENT";
  <?php }
  ?>

  <?php $hcinc_domain = get_field('hcinc_domain', 'option');  
  if($hcinc_domain){ ?>
    var hcinc_domain = "<?php echo $hcinc_domain; ?>";
  <?php }else{ ?>
    var hcinc_domain = "NO_DOMAIN_PRESENT";
  <?php }
  ?>

  /*(function () {
    var trackingURL = {};
    var srcByURL = window.hc.urlParameter("src");
    var src = srcByURL || hcinc_source; // Payload to get a session

    var payload = window.hc.sem.session.sessionData;
    payload.Label.Source = document.referrer;
    payload.Label.Channel = 'ORGANIC';
    payload.Label.Product = hcinc_product;
    payload.Label.Src = src;
    payload.Label.Domain = hcinc_domain;
    window.hc.sem.session.getSession(payload).then(function (_ref) {
      var sessionId = _ref.sessionId,
    userId = _ref.userId,
    hcStorage = _ref.hcStorage;
      hcStorage.source = src;
      var storage = proxyStorage.default;
      storage.setItem('hc', hcStorage);
    }).then(function () {
      return window.hc.sem.storage.loadData();
    });
  })();*/
</script>

<?php if($ziplead_gen_footer_title){ ?>

	<?php
$hc_post_type = get_post_type( get_the_ID() );
if (is_category()){
	$hc_post_type = "category";
}
if (is_front_page() || is_single() || shortcode_exists( 'hcinc_lead_gen_form' ) ){
	$hc_post_type = "front_page";
	?>
	<script src="https://cdn.healthcare.com/resources/content/jquery/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	<footer>
	<?php
}
switch ($hc_post_type){
	case "post":
		//do nothing
	break;
	case "page":
		//do nothing
	break;
  case "search":
    //do nothing
  break;
	default:
	?>

		<div class="footer-zip-code" <?php if($ziplead_gen_footer_background_image) echo 'style="background-image:url('.$ziplead_gen_footer_background_image.');"'; ?>>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
            <?php if($ziplead_gen_footer_title) echo $ziplead_gen_footer_title; ?>
					</div>
				</div>
			</div>
		</div>
<?php } ?>
<?php }	?>

    <?php if(is_page()){ ?>
    <?php if ( is_active_sidebar( 'widget-footer-disclaimer' ) ) : ?>
    <div class="container footer-widget-disclaimer">
      <div class="row">
        <div class="col-lg-12">
          <?php if ( dynamic_sidebar('widget-footer-disclaimer') ) : else : endif; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php } ?>
		<?php $show_phone_in_footer = get_field('show_invoca_phone_in_footer', 'option'); ?>
		<div class="footer-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="widget-container phone-script">
							<h4><?php the_field('text_above_invoca_number_footer', 'option'); ?></h4>
							<?php if($show_phone_in_footer == "Yes") { ?>
								<a class="promo_number" href="tel:+18335674268"><span class="promo_number_formatted">833-567-4268</span></a>
							<?php } ?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="hm_footer_social_media_icons">
							<?php
								$social_media_profiles = get_field('social_media_profiles', 'option');
								$social_media_url_facebook = $social_media_profiles['facebook'];
								$social_media_url_twitter = $social_media_profiles['twitter'];
								$social_media_url_instagram = $social_media_profiles['instagram'];
								$social_media_url_linkedin = $social_media_profiles['linkedin'];

								if($social_media_url_facebook){ echo '<a target="_blank" href="'.$social_media_url_facebook.'"><i class="fab fa-facebook-square"></i></a>' ; }
								if($social_media_url_twitter){ echo '<a target="_blank" href="'.$social_media_url_twitter.'"><i class="fab fa-twitter"></i></a>' ; }
								if($social_media_url_instagram){ echo '<a target="_blank" href="'.$social_media_url_instagram.'"><i class="fab fa-instagram"></i></a>' ; }
								if($social_media_url_linkedin){ echo '<a target="_blank" href="'.$social_media_url_linkedin.'"><i class="fab fa-linkedin-in"></i></a>' ; }
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="hm_footer_blue_line"></div>
					</div>
				</div>
				<div class="row">
					<div id="widget-footer-menu" class="col-sm-12">
						<?php if ( dynamic_sidebar('widget-footer-menu') ) : else : endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="hm_footer_blue_line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<?php if ( dynamic_sidebar('widget-footer-text-1') ) : else : endif; ?>
						<div id="privacyPolicy0" class="widget-container" style="display:none;">
						<br />
						<p>We are commited to protect and respect your privacy. If you don’t want to share your information please click on <a id="ccpa_modal" style="font-weight: bold; text-decoration:underline;" href="#">Do Not Sell My Personal Information</a> for more details.</p>
						<p><a class="hc-footer__link" href="https://www.healthcare.com/data-request/request-form">CCPA Personal Information Request</a></p>
						</div>
					</div>
					<div class="col-sm-4">
						<?php if ( dynamic_sidebar('widget-footer-text-2') ) : else : endif; ?>
					</div>
				</div>

        <?php if ( is_active_sidebar( 'widget-footer-text-3' ) ) : ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="hm_footer_blue_line"></div>
					</div>
				</div>

        <div class="row">
          <div class="col-sm-12">
            <?php if ( dynamic_sidebar('widget-footer-text-3') ) : else : endif; ?>
          </div>
        </div>
        <?php endif; ?>

				<div class="row">
					<div class="col-sm-12">
						<div class="hm_footer_creditos">
						Copyright © 2006-<?php echo date("Y"); ?> HealthCare, Inc.
						</div>
					</div>
				</div>
			</div>
	</div><!-- #page -->
</footer><!-- #colophon -->
<?php
$schema_title = get_the_title();
/*Load the Gmaps only on the Contact page*/
if ($schema_title == "Contact") {
	?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeRbWJH5Ce-oleT9Yr_sKIg9qGz4WU1qE"></script>';
<script type="text/javascript">
(function( $ ) {

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );

    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map
    });

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open( map, marker );
        });
    }
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
}

// Render maps on page load.
$(document).ready(function(){
    $('.acf-map').each(function(){
        var map = initMap( $(this) );
    });
});

})(jQuery);
</script>
<?php
}
/*END Load the Gmaps*/

$ccpa_post = get_page_by_title( 'ccpa_privacypolicy', OBJECT, 'page' );
$ccpa_privacypolicy_content =  apply_filters( 'the_content', $ccpa_post->post_content );
$ccpa_privacypolicy_content = json_encode($ccpa_privacypolicy_content);
$ccpa_privacypolicy_content = substr($ccpa_privacypolicy_content, 0, -1);
$ccpa_privacypolicy_content = substr($ccpa_privacypolicy_content, 1)

?>
<script>
var stateAcronym = "";
var hcuid = "";
var lData;
var tzipCode;

window.hc.sem.storage.loadData()
.then(function() {
    window.lData = window.hc.sem.storage.getHCStorage();
    stateAcronym = window.lData.location.state_acronym;
	zipCode = window.lData.location.zip_code;
	tzipCode = window.lData.location.zip_code;
	window.hcuid = window.lData.healthcareUserId;

jQuery('.top_zipform').focus();
placeholderzip = window.lData.location.zip_code;
if(placeholderzip){
  jQuery('.top_zipform').attr("placeholder",placeholderzip);
}

	//show CCPA
switch (stateAcronym) {
    case "CA":
      document
        .getElementById("privacyPolicy0")
        .setAttribute("style", "display:show;");
      if (document.getElementById("privacy_policy_content")) {
        document.getElementById("privacy_policy_content").innerHTML =
          "<?php echo $ccpa_privacypolicy_content;  ?>";
      }
      break;
  }
//adds value to the zipforms UID and SID
var uId = window.lData.healthcareUserId;

var sId = window.lData.healthcareSession;
//primary zipform
var myuId = document.getElementById('uid');
//var mysId = document.getElementById('sid');
//footer zipform
var myFuId = document.getElementById('f_uid');
//var myFsId = document.getElementById('f_sid');
//internal zipform
var myIuId = document.getElementById('i_uid');
//var myIsId = document.getElementById('i_sid');
    if(myuId){
        myuId.value = uId;
    }
	if(myFuId){
        myFuId.value = uId;
    }
	if(myIuId){
        myIuId.value = uId;
    }
/*	if(mysId){
        document.getElementById('sid').value = sId;
    }*/

//document.getElementById('sid').value = sId;


/*ZIPFORM EVAL*/
 /******************************* Start Zip Code Forms */

 if (jQuery(".zip-codes-form-two")[0]){
  var forms = jQuery("body").find(".zip-codes-form-two");

  var ambiance = document.domain.match(/stg|www|qa/);
  if (ambiance == null) {
    ambiance = "www.";
  } else {
    ambiance = ambiance + ".";
  }

  var js_site_url = "<?php echo get_home_url(); ?>";

  <?php $hcinc_redirect_to_the_flow = get_field('hcinc_redirect_to_the_flow', 'option');  
    if($hcinc_redirect_to_the_flow){ ?>
      var hcinc_site_url = js_site_url;
    <?php }else{ ?>
      var hcinc_site_url = "https://" + ambiance + "healthcare.com";
    <?php }
  ?>

<?php $hcinc_source = get_field('hcinc_source', 'option');  
    if($hcinc_source){ ?>
      var currSource = lData.source;
      if (currSource) {
        var hcinc_source = currSource;
      } else {
        var hcinc_source = "<?php echo $hcinc_source; ?>";
      }
      <?php }else{ ?>
      var hcinc_source = "NO_SOURCE_PRESENT";
    <?php }
  ?>

  <?php $hcinc_utm_source = get_field('hcinc_utm_source', 'option');  
    if($hcinc_utm_source){ ?>
      var hcinc_utm_source = "<?php echo $hcinc_utm_source; ?>";
    <?php }else{ ?>
      var hcinc_utm_source = "NO_UTM_SOURCE_PRESENT";
    <?php }
  ?>

  if (forms) {
   jQuery(forms).each(function(i) {
        
     var zipCodesForm = jQuery(this);
     var zipCodeInput = jQuery(this).parent().find(".thezip-code-input");
     var formPosition = "";
     var fasPosition = "";
     var includeFas = "initial/";

var thisFormPosition = jQuery(this).parent().find(".top_zipform");
if (thisFormPosition.length > 0) {
 formPosition = "top";
 fasPosition = "top_";
}

var thisFormPosition = jQuery(this).parent().find(".bottom_zipform");
if (thisFormPosition.length > 0) {
 formPosition = "bottom";
 fasPosition = "bottom_";
}

var thisFormPosition = jQuery(this).parent().find(".landing_zipform");
if (thisFormPosition.length > 0) {
 formPosition = "landing";
 fasPosition = "landing_";
}

var thisFormPosition = jQuery(this).parent().find(".right_rail_zipform");
if (thisFormPosition.length > 0) {
 formPosition = "right_rail";
 fasPosition = "right_rail_";
}

var thisFormPosition = jQuery(this).parent().find(".inArticle_zipform");
if (thisFormPosition.length > 0) {
 formPosition = "inArticleBoth";
 fasPosition = "inArticle_";
}
var usefas = jQuery(this).parent().find("#top_usefas");
if (usefas.length > 0) {
  includeFas = "fas-results/";
  var newTabFlow = 1;
}
var usefas = jQuery(this).parent().find("#bottom_usefas");
if (usefas.length > 0) {
  includeFas = "fas-results/";
  var newTabFlow = 1;
}
var usefas = jQuery(this).parent().find("#inArticle_usefas");
if (usefas.length > 0) {
  includeFas = "fas-results/";
  var newTabFlow = 1;
}
var usefas = jQuery(this).parent().find("#landing_usefas");
if (usefas.length > 0) {
  includeFas = "fas-results/";
  var newTabFlow = 1;
}
<?php 
if($hcinc_redirect_to_the_flow){ 
?>
var extra_flow_values = "";
<?php } else {
?>
var extra_flow_values = "src=" + hcinc_source + "&utm_source=" + hcinc_utm_source + "&uid=" + window.hcuid + "&";
<?php 
}
?>

var routes = {
   geolocation: "https://geolocation.healthcare.com/GeoLocation/",
   insurance: "" + hcinc_site_url + "/healthcare-insurance/" + includeFas + "?" + extra_flow_values + "zip=",
   suplemment: "" + hcinc_site_url + "/medicare-insurance/" + includeFas + "?" + extra_flow_values + "zip=",
   advantage: ""+ hcinc_site_url +"/?&zipcode="
 };
 if (newTabFlow){
   var routes2 = {
   insurance: "" + hcinc_site_url + "/healthcare-insurance/initial/?" + extra_flow_values + "zip=",
   suplemment: "" + hcinc_site_url + "/medicare-insurance/initial/?" + extra_flow_values + "zip=",
 };
 }

 var inputSend = jQuery(this)
   .parent()
   .find(".input-send");

 var serviceUrl;
 var serviceUrlNT;

 if (zipCodeInput) {
   jQuery(zipCodeInput).on("keyup", function() {
     var zipMessage = jQuery(this)
       .parent()
       .parent()
       .parent()
       .find(".zip-message");
     var zipMessage2 = jQuery(this)
       .parent()
       .parent()
       .parent()
       .parent()
       .find(".zip-message");

     var check = jQuery(this)
       .parent()
       .find(".input-check");


     if (jQuery(this).val().length > 4) {
       var zipCode = jQuery(this).val();
       jQuery.ajax({
         url: routes.geolocation + jQuery(this).val(),
         beforeSend: function() {},
         success: function(response) {
           if (response.length > 0) {
             jQuery(inputSend).removeAttr("disabled");
             jQuery(zipMessage).removeClass("visible");
             jQuery(zipMessage2).removeClass("visible");
             jQuery(check).addClass("visible");
             jQuery(zipCodeInput).siblings('.hc-find__label_error').css('text-indent','-9999px');
             jQuery(zipCodeInput).css('border','1px solid #DDDDDD');
           } else {
             jQuery(inputSend).attr("disabled", true);
             jQuery(check).removeClass("visible");
             jQuery(zipMessage).addClass("visible");
             jQuery(zipMessage2).addClass("visible");
             jQuery(zipCodeInput).siblings('.hc-find__label_error').css('text-indent','0');
             jQuery(zipCodeInput).css('border','1px solid #D15851');
           }
         }
       });
     } else {
       jQuery(check).removeClass("visible");
       jQuery(inputSend).attr("disabled", true);
       jQuery(zipMessage).addClass("visible");
       jQuery(zipMessage2).addClass("visible");
     }
   });
 }

 if (inputSend) {
  
   jQuery(zipCodesForm).on("submit", function(e) {
     e.preventDefault();
     
var serviceType = this.querySelector('input.serviceType:checked').getAttribute("name");

switch (serviceType ) {
    case 'top_hc-radio':
      var serviceType = document.querySelector('input[name="top_hc-radio"]:checked').value;
      break;
    case 'bottom_hc-radio':
      var serviceType = document.querySelector('input[name="bottom_hc-radio"]:checked').value;
      break;
    case 'landing_hc-radio':
      var serviceType = document.querySelector('input[name="landing_hc-radio"]:checked').value;
      break;
    case 'right_rail_hc-radio':
      var serviceType = document.querySelector('input[name="right_rail_hc-radio"]:checked').value;
      break;
    default:
      var serviceType = document.querySelector('input[name="inArticle_hc-radio"]:checked').value;

}

/* GET dataLayer Ready */
window.dataLayer = window.dataLayer || [];

     if (serviceType == "insurance") {
       serviceUrl = routes.insurance;
       if (newTabFlow){
       serviceUrlNT = routes2.insurance;
       }
       window.dataLayer.push({ 'event': 'zipSubmit_'+ formPosition +'_healthcare' });
     }

     if (serviceType == "suplemment") {
       serviceUrl = routes.suplemment;
       if (newTabFlow){
       serviceUrlNT = routes2.suplemment;
       }
       window.dataLayer.push({ 'event': 'zipSubmit_'+ formPosition +'_medicare' });
     }

     if (serviceType == "advantage") {
       serviceUrl = routes.advantage;
     }
     var zip = jQuery(zipCodeInput).val();

     if (serviceUrl) {
       setTimeout(function(){
        if (newTabFlow){
        window.open(serviceUrlNT + zip, '_blank');
        }
        var win = window.open(serviceUrl + zip, "_self");
        win.focus();       
       }, 0);
     }
   });
 }
});
}
} else {
//  console.log('zipcode form does not exists');
}

 /******************************* Ends Zip Code Forms */
(function($) {
    //#Zip Code Input Label

    /*$(".zip-code-input").focusin(function() {
      $(".zip-code-label").addClass("small");
    });

    $(".zip-code-input").focusout(function() {
      if ($(this).val() === "") {
        $(".zip-code-label").removeClass("small");
      }
    });*/
})(jQuery);

jQuery( document ).ready(function() {
    jQuery( ".related_topics__title" ).click(function() {
      jQuery(this).parent().toggleClass("related_topic_show");
      jQuery(this).parent().siblings().removeClass('related_topic_show');
    });
    
    jQuery('.related_topics__title').click(function(){
    	jQuery('#related_topics_mobile .collapse').removeClass('show')
    });

    jQuery('.article_sources-list ol li').html(function(i,h){
        return h.replace(/&nbsp;/g,'');
    });

    jQuery('.article_sources-list ol li p:empty').remove();

    jQuery('sup').each(function(index, value) {
      valuei = jQuery(value).text();
      citationTitle = jQuery('#citation-'+valuei).html();
      jQuery(value).attr('data-citation',valuei);
      jQuery(value).addClass('sup-class');
      jQuery(value).append(citationTitle);
    });

    jQuery( ".sup-class a" ).click(function( event ) {
      if (this.href.indexOf('citation') != -1) {
        event.preventDefault();
      }
    });

    jQuery( ".sliderDots li" ).click(function(event) {
      var id = $(this).data('id');

      if(id == 1){
        jQuery('div.row-important').scrollLeft(0);
      }else if(id == 2){
        jQuery('div.row-important').scrollLeft(235);
      }else if(id == 3){
        jQuery('div.row-important').scrollLeft(470);
      }else if(id == 4){
        jQuery('div.row-important').scrollLeft(805);
      }

      $(this).siblings().removeClass('active');
      $(this).addClass('active');
    });

    jQuery( ".mapa" ).click(function() {
      var valuemap = jQuery(this).data('map');
      jQuery('.mapa').removeClass('active-a');
      jQuery(this).addClass('active-a');
      jQuery('.acf-map').removeClass('active');
      jQuery('#'+valuemap).addClass('active');
    });


  jQuery( ".article_helpful_question input[type=radio]" ).bind( "click", function() {
    var radioSelected = jQuery(this).val();

    if(radioSelected == 1){
      jQuery(".article_helpful_form .article_helpful_email").show();
      jQuery(".article_helpful_form .article_helpful_options").hide();
      jQuery(".article_helpful_form .article_helpful_question").hide();
      jQuery(".article_helpful_form .article_helpful_thanks").show();
      jQuery(".article_helpful_form .gform_footer").show();
    }else{
      jQuery(".article_helpful_form .article_helpful_options").show();
      jQuery(".article_helpful_form .article_helpful_question").hide();
      jQuery(".article_helpful_form .gform_footer").hide();
    }

  });

  jQuery( ".article_helpful_options input[type=radio]" ).bind( "click", function() {
    var radioSelected = jQuery(this).val();

    if(radioSelected == "Other"){
      jQuery(".article_helpful_form .article_helpful_other_line").show();
      jQuery(".article_helpful_form .article_helpful_options").hide();
    }else{
      jQuery(".article_helpful_form .article_helpful_other_line").hide();
    }

    jQuery(".article_helpful_form .gform_footer").show();
  });

  jQuery( ".article_helpful_options li" ).bind( "click", function() {
    jQuery(this).siblings().removeClass("article_helpful_option_selected");
    jQuery(this).addClass("article_helpful_option_selected");
  });

  	jQuery('.article_helpful_form textarea').attr('readonly','readonly');
  
	jQuery( ".email_lead_gen input[type=submit]" ).on( "click", function() {
		jQuery(".text-after-email").addClass('error-margin');
	});
 
  
});
/*****END ZIPFORM EVAL */

  if(lData.source.length > 0){
    hcinc_source = lData.source;
  }
  <?php 
$plt_domain = get_field('hcinc_domain', 'option'); 
$plt_source = get_field('hcinc_source', 'option'); 
$plt_product = get_field('hcinc_product', 'option'); 
$plt_invoca_site = get_field('hcinc_invoca_site', 'option'); 
?>
  (function () {
    var trackingURL = {};
    var srcByURL = window.hc.urlParameter("src");
    var src = srcByURL || hcinc_source; // Payload to get a session

    var payload = window.hc.sem.session.sessionData;
    payload.Label.Source = document.referrer;
    payload.Label.Channel = 'ORGANIC';
    payload.Label.Product = hcinc_product;
    payload.Label.Src = src;
    payload.Label.Domain = hcinc_domain;
    window.hc.sem.session.getSession(payload).then(function (_ref) {
      var sessionId = _ref.sessionId,
    userId = _ref.userId,
    hcStorage = _ref.hcStorage;
      hcStorage.source = src;
      var storage = proxyStorage.default;
      storage.setItem('hc', hcStorage);
    }).then(function () {
      return window.hc.sem.storage.loadData();
    }).then(
      function() {
  var zipCode = window.tzipCode;
  var lstateAcronym = window.stateAcronym;
  //change phonenumber based on location
  hc.sem.content
    .getPhoneNumberV3({
      placement: "LANDING",
      site: "<?php echo $plt_invoca_site; ?>",
      product: "<?php echo $plt_product; ?>",
      src: "<?php echo $plt_source; ?>",
      state: lstateAcronym,
      zip: zipCode
    })
	.then(hc.sem.content.printPhoneNumber);
}
    );
  })();


});

document.getElementById("ccpa_modal").addEventListener("click", function() {
  event.preventDefault();
  if (!window.hc) return;
  (function() {

	var stg = document.domain.match(/stg/) ? '.stg' : '';
	var subdomain = document.domain.match(/local|qa/) ? '.qa' : stg;
    if (typeof hc.loadScript === "function") {
		var path = '//assets' + subdomain + '.healthcare.com/security-compliance/experiences/hc-modal-ask.js';
      hc.loadScript(path, true);
    }
    window.hcSecurityCompliance = window.hcSecurityCompliance || [];
    window.hcSecurityCompliance.push({
      experienceName: "modal-ask",
      modalType: "onload",
	  includeStates: ['CA']
    });
  })();
});

function hcReadMore() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("hc-read-more");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}

jQuery( document ).ready(function() {
	jQuery( "#widget-footer-menu" ).click(function() {
		jQuery(this).toggleClass("widget-footer-collapse");
	});

  <?php if(has_gform()) { ?>
    jQuery(".ginput_container_phone input").mask("(999) 999-9999");

    jQuery(".ginput_container_phone input").on("blur", function(){
        var last = jQuery(this).val().substr( jQuery(this).val().indexOf("-") + 1 );

        if( last.length == 3 ) {
            var move = jQuery(this).val().substr( jQuery(this).val().indexOf("-") - 1, 1 );
            var lastfour = move + last;
            var first = $(this).val().substr( 0, 9 );

            jQuery(this).val( first + '-' + lastfour );
        }
    });
  <?php } ?>

  jQuery( ".phcom-capsule h3" ).click(function() {
    jQuery(this).parent().toggleClass("phcom-capsule-collapse");
  });

  jQuery( ".phcom-load-more a" ).click(function() {
    jQuery(this).parent().parent().toggleClass("phcom-capsule-show-more");
  });

  jQuery(".hcinc-custom-review-bullet").click(function() {
    var bullet = jQuery(this).attr('data-bullet');
    var comment = jQuery(this).parent().find('.hcinc-custom-review-box[data-review="' + bullet + '"]');

    jQuery('.hcinc-custom-review-box').hide();
    jQuery('.hcinc-custom-review-box[data-review="' + bullet + '"]').fadeIn( "slow" );
  });

  jQuery(".phcom-hero-section-option").click(function() {
    var option = jQuery(this).attr('data-option');
    var imageUrl = jQuery(this).attr('data-image');

    console.log(option);
    console.log(imageUrl);

    jQuery(this).siblings().removeClass('clicked');
    jQuery(this).addClass('clicked');

    jQuery('.phcom-hero-section-title').hide();
    jQuery('.phcom-hero-section-subtitle').fadeIn( "slow" );

    jQuery('.phcom-hero-section-option').hide();
    jQuery('#sub-options-' + option + '.phcom-hero-section-sub-options').fadeIn( "slow" );

    jQuery('.phcom-hero-section-back').show();

    //NEW IMAGE TO THE HERO SECTION
    jQuery('.phcom-hero-section-img img').hide();
    jQuery('.phcom-hero-section-img img').attr( "src", imageUrl );
    jQuery('.phcom-hero-section-img img').fadeIn( "slow" );
  });

  jQuery(".phcom-hero-section-back").click(function() {
    var defaultImageUrl = jQuery('.phcom-hero-section-img img').attr( "data-image-default" );
    jQuery(this).hide();

    console.log(defaultImageUrl);

    jQuery('.phcom-hero-section-option').removeClass('clicked');

    jQuery('.phcom-hero-section-subtitle').hide();
    jQuery('.phcom-hero-section-sub-options').hide();

    jQuery('.phcom-hero-section-title').fadeIn( "slow" );
    jQuery('.phcom-hero-section-option').fadeIn( "slow" );

    //DEFAULT IMAGE TO THE HERO SECTION
    jQuery('.phcom-hero-section-img img').hide();
    jQuery('.phcom-hero-section-img img').attr( "src", defaultImageUrl );
    jQuery('.phcom-hero-section-img img').fadeIn( "slow" );    
  });

  jQuery( ".hcinc_grid_categories" ).click(function() {
    jQuery(this).toggleClass("hcinc_grid_categories_collapse");
  });

	jQuery( ".widget-review" ).click(function() {
		jQuery(this).parent().toggleClass("widget-review-open");
	});
	
	jQuery( ".collapse-team" ).click(function() {
		jQuery(this).toggleClass("collapse-team-open");
		if ( $( ".collapse-team" ).is( ".collapse-team-open" ) ) {
			jQuery(this).next().css("display","block");
		}else{
			jQuery(this).next().css("display","none");
		}
	});
	
	jQuery( ".sidebar-title" ).click(function() {
		jQuery(this).toggleClass("collapse-article-open");
		if ( jQuery( ".sidebar-title" ).is( ".collapse-article-open" ) ) {
			jQuery(this).next().css("display","block");
		}else{
			jQuery(this).next().css("display","none");
		}
	});
	
	jQuery( ".explore-more" ).click(function() {
		jQuery(this).toggleClass("collapse-explore-open");
		if ( jQuery( ".explore-more" ).is( ".collapse-explore-open" ) ) {
			jQuery(this).next().css("display","block");
		}else{
			jQuery(this).next().css("display","none");
		}
	});

	 if (window.document.documentMode) {
	  		jQuery(window).scroll(function() {    
			    var scroll = jQuery(window).scrollTop();
			    var alto = jQuery(document).height();
			    var stop = alto - 2300;
			    
			    if (scroll >= stop) {
			        jQuery(".sticky-top").addClass("position-relative");
			        jQuery(".sticky-top").removeClass("sticky-top");
			    } else {
			        jQuery(".sticky-top").removeClass("position-relative");
			        jQuery(".position-relative").addClass("sticky-top");
			    }
			});
		}
		
  if (jQuery(window).width() < 481) {

    /*jQuery( "#article_zip_lead_start" ).click(function() {
      jQuery(this).parent().parent().parent().parent().toggleClass("article_zip_lead_start_open");
      jQuery(this).hide();
    });*/

    jQuery('#sticky-sidebar').removeClass('sticky-top');

    var num = 50; //number of pixels before modifying styles

    jQuery(window).bind('scroll', function () {
        if (jQuery(window).scrollTop() > num) {
            jQuery('.site-header').addClass('fixed');
        } else {
            jQuery('.site-header').removeClass('fixed');
        }
    });
  }

	if (jQuery(window).width() < 481) {
        jQuery(".widget-category h3 a").click(function(e) {
			e.preventDefault();
		});
    }

	jQuery( "input[type=number]" ).focus(function() {
		jQuery(this).parent().addClass("hc-find__field_label");
	});

	jQuery('#input-send').attr('disabled');

	jQuery('input[type=number][max]:not([max=""])').on('input', function(ev) {
		var $this = jQuery(this);
		var maxlength = $this.attr('max').length;
		var value = $this.val();

		if (value && value.length >= maxlength) {
			$this.val(value.substr(0, maxlength));
		}
	});

	jQuery('.prev.page-numbers').html('<i class="fas fa-angle-left"></i>');
	jQuery('.next.page-numbers').html('<i class="fas fa-angle-right"></i>');
});


</script>
<?php 
//Collecting the data for schema
//Post related
$schema_post_name = "";
if(is_front_page()){
  $schema_post_name = "WebPage";
}  elseif (is_search()) {
  $schema_post_name = "SearchAction";
}  elseif (is_author() || is_archive() || is_page()) {
  $schema_post_name = "AboutPage";
} else {
  $schema_post_name = "Article";
}
$entity = '';
if(is_front_page()){
	$entity = 'mainEntityOfPage';
}else{
	$entity = 'mainEntity';
}
//Author
$author_id = get_the_author_meta('id');
$author_obj = get_user_by('id', $author_id);
$author_fb = get_field('user_facebook_url', 'user_'.$author_id);
$author_tw = get_field('user_twitter_url', 'user_'.$author_id);
$author_ig = get_field('user_instagram_url', 'user_'.$author_id);
$author_ln = get_field('user_linkedin_url', 'user_'.$author_id);
//reviewer
/*if( get_field('medically_reviewed') ):
	$reviewer =  get_field('medically_reviewed');
	$reviewer_id = $reviewer['ID'];
	$reviewer_obj = get_user_by('id', $reviewer_id);
endif;*/
// dates
$sc_date = get_the_time('U');
$sc_modified_date = get_the_modified_time('U');
if ($sc_modified_date >= $sc_date + 86400) {
$sc_modified_date = get_the_modified_time('Y-m-d');
} else {
$sc_modified_date = get_the_time('Y-m-d');
}
$sc_date = get_the_time('Y-m-d');
//post image
if (has_post_thumbnail( $post->ID ) ): 
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
	$image_url = str_replace("//.","//",$image[0]);
	$image_width = $image[1];
	$image_height = $image[2];
 endif; 
 /*  Begin Reviewer*/
if( get_field('medically_reviewed') ){
	$reviewer =  get_field('medically_reviewed', $post->ID);
	$reviewer_name = $reviewer['user_firstname'];
	$reviewer_last = $reviewer['user_lastname'];
	$reviewer_nicename = $reviewer['user_nicename'];
} else {
	$reviewer_name = "";
	$reviewer_last = "";
	$reviewer_nicename = "";
}
// Constructing the Schema array
$schema = array(
'@context'		=> "https://schema.org",
'@type'			=> "WebPage",
$entity		=> array(
	'@type'			=> $schema_post_name ,
	'headline'		=> $schema_title,
	'author'		=> array(
		'@type'			=> 'Person',
		'name'			=>$author_obj->first_name. ' ' .$author_obj->last_name,
		'description'	=>	$author_obj->description,
		'sameAs'		=> $author_fb. "," .$author_tw. "," .$author_ig. "," .$author_ln
	),
	'datePublished'	=> $sc_date,
	'dateModified'	=> $sc_modified_date,
	'image'			=> $image_url,
	'publisher'	=> array(
		'@type'			=> 'Organization',
		'name'			=>  'MedicareGuide.com',
		'url'			=>	'https://www.medicareguide.com/',
		'publishingPrinciples'			=>	'https://www.medicareguide.com/editorial-standards/',
		'logo'	=> array(
			'@type'			=> 'imageObject',
			'url'			=>	'https://cdn.healthcare.com/resources/content/logos/medicareguidecom.png',
			'width'			=>	'500',
			'height'		=>	'105'
		)
	),
	'mainEntityOfPage'		=> 'Organization'
),
'reviewedBy'	=> array(
	'@type'			=> 'Person',
	'name'			=>  $reviewer['user_firstname'].' '. $reviewer['user_lastname'],
	'sameAs'		=>	get_site_url().'/author/'.$reviewer_obj->user_login
)

);
if ($schema_post_name !== "SearchAction") {
 // echo '<!-- Auto generated Healthcare.org custom schema --><script type="application/ld+json">'.json_encode($schema).'</script>';
}

?>

<script>
function showHideFormFields(valueSelected){
	if (valueSelected == "1"){
		jQuery('#field_6_2').hide();
		jQuery('#field_6_3').hide();
		jQuery('#field_6_7').hide();
		jQuery('#input_6_2').val(jQuery('#input_6_2').val() == '' ? 'DNC' : jQuery('#input_6_2').val());
		jQuery('#input_6_3').val(jQuery('#input_6_3').val() == '' ? 'DNC' : jQuery('#input_6_3').val());
	} else {
		jQuery('#field_6_2').show();
		jQuery('#field_6_3').show();
		jQuery('#field_6_7').show();
		jQuery('#input_6_2').val(jQuery('#input_6_2').val() == 'DNC' ? '' : jQuery('#input_6_2').val());
		jQuery('#input_6_3').val(jQuery('#input_6_3').val() == 'DNC' ? '' : jQuery('#input_6_3').val());
	}
}

jQuery('#input_6_1').on('change', function(){
	showHideFormFields(this.value);
});
showHideFormFields(jQuery('#input_6_1').val());
</script>

<?php if(is_single()) { ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<?php } ?>

<?php $show_optin_monster = get_field('show_optin_monster', 'option'); ?>
<?php if($show_optin_monster == "Yes") { ?>
<script type="text/javascript" src="https://a.omappapi.com/app/js/api.min.js" data-account="92389" data-user="82111" async></script>
<?php }

/* If browser is IE, removes the 'validity' function from all the zipcode fields on the current page */
if (isset($_SERVER['HTTP_USER_AGENT']) && ( (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false ) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) ) ){?>
<script>
var hcZipFields = document.getElementsByClassName('thezip-code-input');
var i;
  for (i = 0; i < hcZipFields.length; i++) {
    hcZipFields[i].oninput = "";
  }
</script>
<?php }
?>

<?php wp_footer(); ?>

</body>
</html>
