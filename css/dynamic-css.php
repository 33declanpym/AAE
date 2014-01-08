<?php
	header("Content-type: text/css");
	require_once('../../../../wp-load.php');

	
	$color_1 = get_option ( THEME_NAME."_color_1" );
	$color_2 = get_option ( THEME_NAME."_color_2" );
	$color_3 = get_option ( THEME_NAME."_color_3" );
	$color_4 = get_option ( THEME_NAME."_color_4" );
	$color_5 = get_option ( THEME_NAME."_color_5" );
	
	$banner_type = get_option ( THEME_NAME."_banner_type" );
	
?>

<?php
	if ( $banner_type == "image" ) {
	//Image Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; z-index:1002; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php
	} else if ( $banner_type == "text" ) {
	//Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; max-width:700px; z-index:1002; border: 1px solid #000; background: #e5e5e5 url(<?php echo get_template_directory_uri(); ?>/images/dotted-bg-6.png) 0 0 repeat; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; line-height: 24px; border: 1px solid #cccccc; -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; text-shadow: #fff 0 1px 0; }
		#popup center { display: block; padding: 20px 20px 20px 20px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -12px; top: -12px; }
<?php 
	} else if ( $banner_type == "text_image" ) {
	//Image And Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; z-index:1002; color: #000; font-size: 11px; font-weight: bold; }
		#popup center { padding: 15px 0 0 0; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php } ?>




/* Main elements: main menu, footer line, slider active bull background colors */
.footer .footline, div.menu, .menu ul, .menu ul.ul-main-menu > li, .gallery-slider-navigation li.active > a {
	background-color:#<?php echo $color_1;?>;
}

/* Photo gallery image active border */
.photo-gallery-single-photos ol li.active:after {
	border:5px solid #<?php echo $color_2;?>;
}

/* Second Header Menu background color */
.secondary-menu {
	background-color:#<?php echo $color_3;?>;
}

/* Link colors */
.content a:hover, .panel .panel-right-top a, .panel .icon-link, .panel .panel-big-button, .comment-count, .main-block .panel-right-top a, .panel-block .panel-big-button, .tha-content .article-title a.article-icon:hover, .tha-content .article-title .article-icon a:hover, .gallery-blocks-full .icon-link, .photo-gallery-single-description .photo-gallery-top-right a {
	color:#<?php echo $color_4;?>;
}
/* Breaking Message background */
.bearking-message {
	background:#<?php echo $color_5;?>;
}
