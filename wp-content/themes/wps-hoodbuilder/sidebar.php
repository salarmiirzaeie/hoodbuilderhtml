<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drali
 */

if ( ! is_active_sidebar( 'sidebar_1' ) ) {
	//return;
}
?>

<?php
if(is_blog() || is_search()) {
	?>
	<div class="col-md-3 col-md-offset-1">
		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar('sidebar_1'); ?>
		</aside><!-- #secondary -->
	</div>
	<?php
}
?>