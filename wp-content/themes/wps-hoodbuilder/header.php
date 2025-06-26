<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPS_Base
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="msvalidate.01" content="4B01D1E9E3BF84BB02714D5FF64890FB" />
	<meta name="yandex-verification" content="368c2cf197329f2b" />
    <link rel="shortcut icon" href="/wp-content/uploads/2017/09/loading.gif"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    
<!--<script type="text/javascript">-->
<!--    window.smartlook||(function(d) {-->
<!--    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];-->
<!--    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';-->
<!--    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);-->
<!--    })(document);-->
<!--    smartlook('init', 'd60303b2e988b095be466a363631a0334ab1aa3f');-->
<!--</script>-->


	<?php wp_head(); ?>

<script>

            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {

                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),

                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)

            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');


            ga('create', 'UA-88207001-1', 'auto');

            ga('send', 'pageview');


        </script>
        




<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VRQ5GHBEDM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VRQ5GHBEDM');
</script>


	<script>
	document.addEventListener( 'wpcf7mailsent', function( event ) {
  
 ga('send', 'event', 'Contact Form', 'sent');
}, false );

</script>


</head>

<body <?php body_class(); ?>>
    
 
      <!--  ClickCease.com tracking-->
      <script type='text/javascript'>var script = document.createElement('script');
      script.async = true; script.type = 'text/javascript';
      var target = 'https://www.clickcease.com/monitor/stat.js';
      script.src = target;var elem = document.head;elem.appendChild(script);
      </script>
      <noscript>
      <a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com' alt='ClickCease'/></a>
      </noscript>
      <!--  ClickCease.com tracking-->
  


<!--<div id="wptime-plugin-preloader"></div>-->
<div id="websiteFrameBottom" class="websiteFrame"></div>
<div id="wps-site" class="site">
   <!-- <a class="skip-link screen-reader-text" href="#content">
   <?php /* esc_html_e( 'Skip to content', 'wpsbase' ); */ ?>
   </a> -->

	<?php get_template_part( 'template-components/header/main' ); ?>

	<?php
	if ( is_front_page() ) { ?>
	<section class="section-h1">
    	<div class="container wps-vc-container">
    	    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-2 vc_col-lg-8 vc_col-md-offset-1 vc_col-md-10">
    	    <div class="vc_column-inner ">
    	    <h1>Your One-Stop-Shop for Commercial Hood Installation, HVAC Installation, Restaurant Design, and Construction | Denver, CO | Fort Collins | Boulder </h1>
    	    </div>
    	    </div>
    	</div>
	</section>
    <?php	}
	?>

	<?php
	if ( is_front_page() ) {
		get_template_part( 'template-components/header/slider' );
	}
	?>

    <div id="content" class="site-content">