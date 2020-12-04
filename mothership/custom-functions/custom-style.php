<?php

$body_font_family = get_field('body_font_family','option');

/*Desktop options*/
$h1_group = get_field('h1','option');
$h2_group = get_field('h2','option');
$h3_group = get_field('h3','option');
$h4_group = get_field('h4','option');
$p_group = get_field('p','option');
$label_group = get_field('label','option');
$main_colors = get_field('main_colors','option');
$text_border_colors = get_field('text_and_border_colors','option');
$validation_colors = get_field('validation_colors','option');

/*mobile options*/
$h1_group_mobile = get_field('h1_mobile','option');
$h2_group_mobile = get_field('h2_mobile','option');
$h3_group_mobile = get_field('h3_mobile','option');
$h4_group_mobile = get_field('h4_mobile','option');
$p_group_mobile = get_field('p_mobile','option');
$label_group_mobile = get_field('label_mobile','option');
?>
<style>
body{
	font-family: <?php echo $body_font_family ?>
}
h1{
	font-family: <?php echo $h1_group['font_family'].' !important' ?>;
	font-size: <?php echo $h1_group['font_size'].'px !important' ?>;
	font-weight: <?php echo $h1_group['font_weight'].' !important' ?>;
	line-height: <?php echo $h1_group['line_height'].'px !important' ?>;
	color:<?php echo $text_border_colors['text_and_border_color_1'].' !important' ?>;
}
h2,
.schema-faq-question{
	font-family: <?php echo $h2_group['font_family'].' !important' ?>;
	font-size: <?php echo $h2_group['font_size'].'px !important' ?>;
	font-weight: <?php echo $h2_group['font_weight'].' !important' ?>;
	line-height: <?php echo $h2_group['line_height'].'px !important' ?>;
	color:<?php echo $text_border_colors['text_and_border_color_1'] ?>;
	margin-bottom:1em !important;
	display:block;
}
h3,
h3 a{
	font-family: <?php echo $h3_group['font_family'].' !important' ?>;
	font-size: <?php echo $h3_group['font_size'].'px !important' ?>;
	font-weight: <?php echo $h3_group['font_weight'].' !important' ?>;
	line-height: <?php echo $h3_group['line_height'].'px !important' ?>;
	color:<?php echo $text_border_colors['text_and_border_color_1'].' !important' ?>;
}
h4{
	font-family: <?php echo $h4_group['font_family'].' !important' ?>;
	font-size: <?php echo $h4_group['font_size'].'px !important' ?>;
	font-weight: <?php echo $h4_group['font_weight'].' !important' ?>;
	line-height: <?php echo $h4_group['line_height'].'px !important' ?>;
	color:<?php echo $text_border_colors['text_and_border_color_1'].' !important' ?>;
}
	
p,
.hentry ul li,
.hentry ol li{
	font-family: <?php echo $p_group['font_family'].' !important' ?>;
	font-size: <?php echo $p_group['font_size'].'px !important' ?>;
	font-weight: <?php echo $p_group['font_weight'].' !important' ?>;
	line-height: <?php echo $p_group['line_height'].'px !important' ?>;
	color:<?php echo $text_border_colors['text_and_border_color_1'].' !important' ?>;
}
.hentry ul,.hentry ol{margin-bottom:1.5em !important;}
label{
	font-family: <?php echo $label_group['font_family'].' !important' ?>;
	font-size: <?php echo $label_group['font_size'].'px !important' ?>;
	font-weight: <?php echo $label_group['font_weight'].' !important' ?>;
	line-height: <?php echo $label_group['line_height'].'px !important' ?>;
    color:<?php echo $text_border_colors['text_and_border_color_1']?>;
}

#main .single-page a, #main .single-page a:visited{
	color: <?php echo $main_colors['main_color_3']?>;
}

.inArticle-footer-ads a.inArticle-ads-disclaimer, .inArticle-footer-ads a.inArticle-ads-disclaimer:visited{
	color: <?php echo $main_colors['main_color_3']?> !important;
}

.pagination .navigation-first, .pagination .navigation-last, .pagination .prev, .pagination .next {
    color: <?php echo $main_colors['main_color_3']?> !important;

}
.pagination .page-numbers.current { background: <?php echo $main_colors['main_color_1']?> 0% 0% no-repeat padding-box !important;}

.article-toc a{color: <?php echo $main_colors['main_color_3']?>}
.article_section .social-links a>i:hover{background-color: <?php echo $main_colors['main_color_3']?>!important;}
.article_helpful_question_selected, .article_helpful_option_selected {
    background: <?php echo $main_colors['main_color_1']?> !important;
}
#author-content h1 b { color: <?php echo $main_colors['main_color_1']?> !important; }
#author-content h1 b:before {
    background: <?php echo $text_border_colors['text_and_border_color_5'] ?> 0% 0% no-repeat padding-box !important;
}
.author_social_media_content a i:hover {
    background-color: <?php echo $main_colors['main_color_3']?> !important;
}
.author_social_media_content {
    border-bottom: 6px solid <?php echo $main_colors['main_color_1']?> !important;
}
#latest-articles h2 strong {
    color: <?php echo $main_colors['main_color_1']?> !important;
}
#latest-articles h2 strong:before {
    background: <?php echo $text_border_colors['text_and_border_color_5'] ?> 0% 0% no-repeat padding-box;
}
.author .author-latest-article a {
    color: <?php echo $validation_colors['validation_color_2'] ?> !important;
}
#cta-call a {
    color: <?php echo $main_colors['main_color_1']?> !important;
}
.bk-white-content a h3:hover{color:<?php echo $main_colors['main_color_1']?> !important}
.contact-us-content .fas{color: <?php echo $text_border_colors['text_and_border_color_1'] ?> !important;}
blockquote:before { background: <?php echo $main_colors['main_color_1']?> !important;}
blockquote p:before { background: <?php echo $main_colors['main_color_3']?> !important; }

@media (max-width: 480px) {
	h1{
		font-family: <?php echo $h1_group_mobile['font_family'].' !important' ?>;
		font-size: <?php echo $h1_group_mobile['font_size'].'px !important' ?>;
		font-weight: <?php echo $h1_group_mobile['font_weight'].' !important' ?>;
		line-height: <?php echo $h1_group_mobile['line_height'].'px !important' ?>;
	}

	h2,
	.schema-faq-question{
		font-family: <?php echo $h2_group_mobile['font_family'].' !important' ?>;
		font-size: <?php echo $h2_group_mobile['font_size'].'px !important' ?>;
		font-weight: <?php echo $h2_group_mobile['font_weight'].' !important' ?>;
		line-height: <?php echo $h2_group_mobile['line_height'].'px !important' ?>;
	}

	h3{
		font-family: <?php echo $h3_group_mobile['font_family'].' !important' ?>;
		font-size: <?php echo $h3_group_mobile['font_size'].'px !important' ?>;
		font-weight: <?php echo $h3_group_mobile['font_weight'].' !important' ?>;
		line-height: <?php echo $h3_group_mobile['line_height'].'px !important' ?>;
	}
	
	h4{
		font-family: <?php echo $h4_group_mobile['font_family'].' !important' ?>;
		font-size: <?php echo $h4_group_mobile['font_size'].'px !important' ?>;
		font-weight: <?php echo $h4_group_mobile['font_weight'].' !important' ?>;
		line-height: <?php echo $h4_group_mobile['line_height'].'px !important' ?>;
	}

	p,
	.hentry ul li,
	.hentry ol li{
		font-family: <?php echo $p_group_mobile['font_family'].' !important' ?>;
		font-size: <?php echo $p_group_mobile['font_size'].'px !important' ?>;
		font-weight: <?php echo $p_group_mobile['font_weight'].' !important' ?>;
		line-height: <?php echo $p_group_mobile['line_height'].'px !important' ?>;
	}
	label{
		font-family: <?php echo $label_group_mobile['font_family'].' !important' ?>;
		font-size: <?php echo $label_group_mobile['font_size'].'px !important' ?>;
		font-weight: <?php echo $label_group_mobile['font_weight'].' !important' ?>;
		line-height: <?php echo $label_group_mobile['line_height'].'px !important' ?>;
	}
	/*.article-toc a, .related_topics__title h5, .related_topics__links a {
    	color: <?php //echo $main_colors['main_color_3']?> !important;
    }*/
}
</style>
