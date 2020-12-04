<div class="hcinc-highlight">
<?php 
$title = block_field( 'highlights-box-title', false );
$text = block_field( 'highlights-box-text', false );
if ( ! empty( $title ) ) { echo '<h4>'.$title.'</h4>'; }
if ( ! empty( $text ) ) { echo $text; }
?>
</div>
