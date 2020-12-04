<div class="hcinc_inArticleAds" id="inArticleAds-<?php echo get_the_ID(); ?>">
<?php 
	$title = block_value( 'title', false );
	$type = block_value( 'type', false );
	$disclaimer = block_value( 'disclaimer', false );
	$inArticleAdsProduct = get_field('hcinc_product', 'option'); 
?>
</div>

<?php if ($type == 'Rotation Tool') { ?>
	<script src="https://assets.healthcare.com/hc-sem.min.js"></script>
	<script type="text/javascript">
	  hc.sem.insertRotationToolsAds({
	    title: '<?php if ( ! empty( $title ) ) { echo $title; } ?>',
	    divId: 'inArticleAds-<?php echo get_the_ID(); ?>',
	    howMany: 3,
	    disclaimer: '<?php if ( ! empty( $disclaimer ) ) { echo $disclaimer; } ?>',
	    product: '<?php if ( ! empty( $inArticleAdsProduct ) ) { echo $inArticleAdsProduct; } ?>' // Default value: 'HEALTH'
	  });
	</script>
<?php } else { ?>
	<script src="https://assets.healthcare.com/hc-sem.min.js"></script>
	<script type="text/javascript">
	  hc.sem.insertFeatureAds({
	    title: '<?php if ( ! empty( $title ) ) { echo $title; } ?>',
	    divId: 'inArticleAds-<?php echo get_the_ID(); ?>',
	    howMany: 3,
	    disclaimer: '<?php if ( ! empty( $disclaimer ) ) { echo $disclaimer; } ?>',
	    product: '<?php if ( ! empty( $inArticleAdsProduct ) ) { echo $inArticleAdsProduct; } ?>' // Default value: 'HEALTH'
	  });
	</script>
<?php } ?>