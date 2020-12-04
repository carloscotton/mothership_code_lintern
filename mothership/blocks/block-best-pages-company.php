<style>
.hcinc-best-pages-company{position:relative; overflow:hidden;}
.hcinc-best-pages-company img{float:left; margin-top:10px;}
.hcinc-best-pages-company hr{float:left; width:100%; margin:10px 0; background-color: #DDDDDD;}
.hcinc-best-pages-company .best-pages-company-cta{float:right; display:block; width:158px; background: #FFB100; border-radius: 6px; text-decoration:none !important; font-weight: bold; font-size: 16px; line-height: 19px; text-align: center; color: #FFFFFF !important; padding:12px;}
.hcinc-best-pages-company h3, .hcinc-best-pages-company p{float:left; width:100%; margin-top:0 !important; margin-bottom:17px !important;}
</style>
<div class="hcinc-best-pages-company">
<?php 
$companyID = block_value( 'best-pages-company-company-id' );
$image = block_value( 'best-pages-company-image' );
$cta = block_field( 'best-pages-company-cta-url', false );
$header = block_field( 'best-pages-company-header-title', false );
$itemDescription = block_field( 'best-pages-company-item-description', false );

echo '<div class="row" id="company-'.$companyID.'">';
	if ( ! empty( $image ) ) { echo '<div class="col-5 col-md-4 col-lg-2">'.wp_get_attachment_image( $image, 'full' ).'</div>'; }
	echo '<div class="col-1 col-md-3 col-lg-4"></div><div class="col-1 col-md-2 col-lg-3"></div>';
	if ( ! empty( $cta ) ) { echo '<div class="col-5 col-md-3 col-lg-3"><a class="best-pages-company-cta" href="'.$cta.'">Compare Plans</a></div>'; }
echo '</div>';

echo '<div class="row">';
	echo '<div class="col-12">';
		echo '<hr/>';
	echo '</div>';
echo '</div>';

echo '<div class="row">';
	echo '<div class="col-12">';
		if ( ! empty( $header ) ) { echo '<h3>'.$header.'</h3>'; }
		if ( ! empty( $itemDescription ) ) { echo $itemDescription; }
	echo '</div>';
echo '</div>';
?>
</div>
