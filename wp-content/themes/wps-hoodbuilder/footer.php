<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPS_Base
 */

?>

	</div>
<?php
$show_contact_page_map = get_field('show_contact_page_map');
if(isset($show_contact_page_map) && $show_contact_page_map == 1):
    get_template_part( 'template-components/footer/contact-map' );
endif;
?>
<?php
$show_related_articles = get_field('show_related_articles');
if(isset($show_related_articles) && $show_related_articles == 1):
	get_template_part('template-components/footer/footer-blog');

endif;
?>

	<footer id="wps-footer" class="site-footer">
		<?php get_template_part( 'template-components/footer/main' ); ?>
	</footer>
</div>

<!-- Customized promotion by mohsen.k  -->
    
<!--<div id="promo-outer">-->
<!--  <div id="promo-inner">-->
<!--    <b>COVID-19 Precautions:</b> Ask How HoodBuilder Can Protect Your Business from Coronavirus. Call to learn more.-->
<!--   <a href="tel:+1-303-777-7720" id="popup-contact-us-btn"-->
<!--           class="">Contact us</a>-->
<!--    <span id="close">x</span>-->
<!--  </div>-->
<!--</div>-->

<!--<script>-->
<!--jQuery("#close").on("click", function(){-->
<!--  jQuery("#promo-outer").slideUp();-->
<!--});-->
<!--jQuery("#promo-outer").on("click", function(){-->
<!--  jQuery("#promo-outer").slideUp();-->
<!--});-->
<!--jQuery(document).ready(function($){-->
<!--  jQuery("#promo-outer").slideDown("slow");-->
<!--});-->
<!--</script>-->




<?php wp_footer(); ?>

<script type="text/javascript" src="//cdn.callrail.com/companies/649937440/3df2f50517e0b811abc8/12/swap.js"></script> 




</body>
</html>
