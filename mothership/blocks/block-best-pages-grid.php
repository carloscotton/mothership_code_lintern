<style>
.hcinc-best-pages-grid{position:relative; overflow:hidden;}
.hcinc-best-pages-grid img{float:left; margin-top:10px; max-width:80px;}
.hcinc-best-pages-grid hr{float:left; width:100%; margin:10px 0 24px; background-color: #DDDDDD;}
.hcinc-best-pages-grid .best-pages-grid-cta{float:right; display:block; width:100%; max-width:158px; background: #FFB100; border-radius: 6px; text-decoration:none !important; font-weight: bold; font-size: 16px; line-height: 19px; text-align: center; color: #FFFFFF !important; padding:12px;}
.hcinc-best-pages-grid h3, .hcinc-best-pages-grid p{font-size:16px !important; line-height:28.38px !important; float:left !important; width:100% !important; margin-top:0 !important; margin-bottom:17px !important;}

@media (max-width: 480px) {
	.hcinc-best-pages-grid img{margin-bottom:10px;}
	.hcinc-best-pages-grid h3, .hcinc-best-pages-grid p{font-size:12px !important; line-height:21.29px !important; margin-bottom:0 !important;}
	.hcinc-best-pages-grid hr{margin-bottom:10px !important;}
	.hcinc-best-pages-grid .best-pages-grid-cta{font-size:14px; line-height:17px;}
}

</style>
<div class="hcinc-best-pages-grid">
<?php 
$companyID = block_value( 'best-pages-grid-company-id' );
$image = block_value( 'best-pages-grid-image' );
$title = block_field( 'best-pages-grid-title', false );
$tagline = block_field( 'best-pages-grid-tagline', false );
$cta = block_field( 'best-pages-grid-cta-url', false );

echo '<div class="row">';
	if ( ! empty( $image ) ) { echo '<div class="col-12 col-md-2 col-lg-2"><a href="#company-'.$companyID.'">'.wp_get_attachment_image( $image, 'full' ).'</a></div>'; }

	echo '<div class="col-12 col-md-10 col-lg-10">';
		echo '<div class="row">';
			echo '<div class="col-7 col-md-9 col-lg-9">';
				echo '<div class="row">';
					if ( ! empty( $title ) ) { echo '<div class="col-12 col-md-5 col-lg-5"><p><b>'.$title.'</b></p></div>'; }
					if ( ! empty( $tagline ) ) { echo '<div class="col-12 col-md-7 col-lg-7"><p>'.$tagline.'</p></div>'; }
				echo '</div>';
			echo '</div>';

			echo '<div class="col-5 col-md-3 col-lg-3">';
				echo '<div class="row">';
					if ( ! empty( $cta ) ) { echo '<div class="col-12 col-md-12 col-lg-12"><a class="best-pages-grid-cta" href="'.$cta.'">See Plans</a></div>'; }
				echo '</div>';
			echo '</div>';
		echo '</div>';

		/*

		

			echo '<div class="col-12 col-md-10 col-lg-10">';
				echo '<div class="row">';	

				
			echo '</div>';	
		echo '</div>';*/
	echo '</div>';
echo '</div>';

echo '<div class="row">';
	echo '<div class="col-12">';
		echo '<hr/>';
	echo '</div>';
echo '</div>';

/*echo '<div class="row">';
	echo '<div class="col-12">';
		if ( ! empty( $header ) ) { echo '<h3>'.$header.'</h3>'; }
		if ( ! empty( $itemDescription ) ) { echo $itemDescription; }
	echo '</div>';
echo '</div>';*/
?>
</div>
