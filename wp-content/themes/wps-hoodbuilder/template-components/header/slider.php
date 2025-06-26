<?php
global $wps_options;
?>
<?php if ( have_rows( 'homepage_services_slider' ) ): ?>
    <div class="homepage-services-slider-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="homepage-services-slider-container owl-carousel owl-theme">
						<?php
						$slider_count = 1;
						while ( have_rows( 'homepage_services_slider' ) ): the_row();

							$homepage_service_name      = get_sub_field( 'service_title' );
							$homepage_service_link      = get_sub_field( 'service_page_link' );
							$homepage_service_image     = get_sub_field( 'service_image' );
							$homepage_service_image_url = $homepage_service_image['url'];
							$homepage_service_icon      = get_sub_field( 'service_icon' );
							$homepage_service_icon_url  = $homepage_service_icon['url'];

							generate_custom_style( ".homepage-services-slide-item.item-{$slider_count}", "background-image: url(\"{$homepage_service_image_url}\");" ,'',true );

							?>
                            <div class="col-md-3 homepage-services-slide-item item-<?php echo $slider_count; ?> " >
                                <a href="<?php echo $homepage_service_link; ?>">
                                    <div class="overlay-inner"></div>
                                    <div class="circled-element"></div>
                                    <div class="service-icon">
                                        <img src="<?php echo $homepage_service_icon_url; ?>"
                                             alt="<?php echo $homepage_service_name; ?>" width="80" height="80">
                                    </div>
                                    <div class="service-text">
                                        <p><?php echo $homepage_service_name; ?></p>
                                        <span class="link-btn">Learn More</span>
                                    </div>
                                </a>
                            </div>
							<?php
							$slider_count ++;
						endwhile;
						?>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>