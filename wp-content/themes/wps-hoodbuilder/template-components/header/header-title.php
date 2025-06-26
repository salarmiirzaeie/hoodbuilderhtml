<?php
/**
 *    WPSBase WordPress Theme
 *
 *    WPSailor
 *    www.wpsailor.com
 */
?>
<?php
//use \WPS\Theme\Core\WPSThemeHelper;

$show_page_title               = true;
$show_page_heading_description = false;
$show_page_title_opt           = get_field( 'show_page_title' );
$page_header_style             = get_field( 'page_header_style' );
if ( ! $page_header_style ):
	$page_header_style = 'style1';
endif;
$show_page_heading_description_opt = get_field( 'show_page_heading_description' );

if ( isset( $show_page_title_opt ) && $show_page_title_opt == 0 ) {
	$show_page_title = false;
}
if ( isset( $show_page_heading_description_opt ) && $show_page_heading_description_opt == 1 ) {
	$show_page_heading_description = true;
} elseif ( is_404() ) {
	$show_page_heading_description = true;
}

if(is_search()) {
	$page_header_style = 'style1';
}


$header_button_text = get_field( 'header_button_text' );
$header_button_link = get_field( 'header_button_link' );

?>
<?php if ( $show_page_title ): ?>
	<?php if ( $page_header_style == 'style3' ): ?>
        <div class="page-title-wrap <?php echo $page_header_style; ?>">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-md-6 page-title-container-style3 equal-height-page-header">
                        <div class="page-title-container">
                            <div class="page-title-holder">
                                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
									<?php if ( function_exists( 'bcn_display' ) ) {
										bcn_display();
									} ?>
                                </div>
                                <div class="page-title">
                                    <h1>
										<?php
										$page_header_title = WPSThemeHelper::header_title();
										esc_html_e( $page_header_title, 'wpsbase' );
										?>
                                    </h1>
                                </div>
								<?php if ( $show_page_heading_description ): ?>
                                    <div class="page-description">
                                        <h4><?php echo esc_attr( WPSThemeHelper::header_desc() ); ?></h4>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wps-page-header-slider-container equal-height-page-header">
                        <div class="wps-page-header-slider">
                            <ul class="slides">
								<?php
								$slider_count            = 1;
								$header_slider_image_src = '';
								while ( have_rows( 'header_background_slider' ) ): the_row();

									$header_slider_image     = get_sub_field( 'header_slider_image' );
									$header_slider_image_src = $header_slider_image['url'];

									$unique_id = 'page-header-slider-item-' . mt_rand( 100000, 999999 );
									generate_custom_style( "#{$unique_id}", "background-image: url(\"{$header_slider_image_src}\");" );

									?>
                                    <li id="<?php echo $unique_id; ?>" class="page-header-slider-item"></li>
									<?php
									$slider_count ++;
								endwhile;
								?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php elseif ( $page_header_style == 'style2' ): ?>
		<?php
		//$unique_id = 'wps-featured-text-' . mt_rand( 100000, 999999 );

		$header_featured_image     = get_field( 'header_background_image' );
		$header_featured_image_src = $header_featured_image['url'];

		$header_logo_image     = get_field( 'header_logo_image' );
		$header_logo_image_src = $header_logo_image['url'];


		generate_custom_style( ".page-title-wrap.style2", "background-image: url(\"{$header_featured_image_src}\");" );
		?>

        <div class="page-title-wrap <?php echo $page_header_style; ?>">
            <div class="container page-title-container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
							<?php if ( function_exists( 'bcn_display' ) ) {
								bcn_display();
							} ?>
                        </div>
                        <div class="page-header-logo">
                            <img src="<?php echo $header_logo_image_src; ?>" alt="">
                        </div>
                        <div class="page-title">
                            <h1>
								<?php
								$page_header_title = WPSThemeHelper::header_title();
								esc_html_e( $page_header_title, 'wpsbase' );
								?>
                            </h1>
                        </div>
						<?php if ( $show_page_heading_description ): ?>
                            <div class="page-description">
                                <h4><?php echo esc_attr( WPSThemeHelper::header_desc() ); ?></h4>
                            </div>
						<?php endif; ?>
						<?php if ( $header_button_text && $header_button_link ): ?>
                            <div class="page-header-button">
                                <a href="<?php echo $header_button_link; ?>"><?php echo $header_button_text; ?></a>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
	<?php else: ?>
        <div class="page-title-wrap <?php echo $page_header_style; ?>">
            <div class="container page-title-container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
                        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
							<?php if ( function_exists( 'bcn_display' ) ) {
								bcn_display();
							} ?>
                        </div>
                        <div class="page-title">
                            <H1 class="blogh1">
								<?php
								 $page_header_title = WPSThemeHelper::header_title();
								 esc_html_e( $page_header_title, 'wpsbase' );
								?>
								<!--The Latest Articles on The Design and Remodeling of Commercial Kitchens | HoodBuilder | Denver, CO | Fort Collins | Boulder-->
                            </H1>
                        </div>
						<?php if ( $show_page_heading_description ): ?>
                            <div class="page-description">
                                <h4><?php echo esc_attr( WPSThemeHelper::header_desc() ); ?></h4>
                            </div>
						<?php endif; ?>
						<?php if ( $header_button_text && $header_button_link ): ?>
                            <div class="page-header-button">
                                <a href="<?php echo $header_button_link; ?>"><?php echo $header_button_text; ?></a>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>
<?php endif; ?>