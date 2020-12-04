<style>
#best-pages-table {margin-right: 0px; margin-left: -5px; margin-bottom:20px; position:relative; overflow:hidden;}
#best-pages-table .col-12{padding-right:0px; padding-left:5px;}
#best-pages-table .pros-cons-block{background:#F8F8F8; padding:26px 12px 26px 26px; height:100%;}
#best-pages-table .pros-cons-block h4{font-size: 18px; line-height: 22px; font-style: normal; font-weight: bold;}
#best-pages-table .pros-cons-block h4 img{height:14px;}
#best-pages-table .pros-cons-block p{letter-spacing:-0.6px; font-size:16px !important; line-height:174.5% !important; font-style: normal; font-weight: normal;}
#best-pages-table .pros-cons-block p:last-child{margin-bottom:0;}

@media (max-width: 960px) {
	#best-pages-table .pros-cons-block{padding:16px 8px 16px 16px;}
	#best-pages-table .pros-cons-block h4, #best-pages-table .pros-cons-block p{font-size:14px !important; line-height: 17px !important;}
}

@media (max-width: 480px) {
	#best-pages-table .col-12{margin-bottom:5px;}
}
</style>

<?php 
$prosTitle = block_value( 'best-pages-company-pros-title' );
$pros = block_value( 'best-pages-company-pros' );

$consTitle = block_value( 'best-pages-company-cons-title' );
$cons = block_value( 'best-pages-company-cons' );

$rankingsTitle = block_value( 'best-pages-company-rankings-title', false );
$rankings = block_value( 'best-pages-company-rankings', false );

if( empty( $prosTitle ) ){$prosTitle = 'PROS';}
if( empty( $consTitle ) ){$consTitle = 'CONS';}
if( empty( $rankingsTitle ) ){$rankingsTitle = 'RANKINGS';}

echo '<div class="row" id="best-pages-table">';


	if ( ! empty( $pros ) ) { echo '<div class="col-12 col-md-4 col-lg-3"><div class="pros-cons-block"><h4>'.$prosTitle.' <img src="'.get_template_directory_uri() . '/assets/best-pages-pros.svg" /></h4>'.$pros.'</div></div>'; }

	if ( ! empty( $cons ) ) { echo '<div class="col-12 col-md-4 col-lg-4"><div class="pros-cons-block"><h4>'.$consTitle.' <img src="'.get_template_directory_uri() . '/assets/best-pages-cons.svg" /></h4>'.$cons.'</div></div>'; }

	if ( ! empty( $rankings ) ) { echo '<div class="col-12 col-md-4 col-lg-5"><div class="pros-cons-block"><h4>'.$rankingsTitle.' <img src="'.get_template_directory_uri() . '/assets/best-pages-ranking.svg" /></h4>'.$rankings.'</div></div>'; }


echo '</div>';
?>