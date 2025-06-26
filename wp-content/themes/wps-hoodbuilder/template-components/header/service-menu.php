<?php
global $wps_options;
$service_page_id = $wps_options['wps-opt-services-page-url'];
?>
<?php if ( have_rows( 'services_menu', $service_page_id ) ): ?>
    <div class="header-services-menu-wrap">
        <div class="header-services-menu-container">
            <ul>
				<?php
				$slider_count = 1;
				while ( have_rows( 'services_menu', $service_page_id    ) ): the_row();

					$service_name     = get_sub_field( 'service_title' );
					$service_link     = get_sub_field( 'service_page_link' );
					$service_icon     = get_sub_field( 'service_icon' );
					$service_icon_url = $service_icon['url'];


					?>
                    <li>
                        <a href="<?php echo $service_link; ?>">
                            <div class="service-icon">
                                <img src="<?php echo $service_icon_url; ?>" alt="<?php echo $service_name; ?>">
                            </div>
                            <span><?php echo $service_name; ?></span>
                        </a></li>
					<?php
					$slider_count ++;
				endwhile;
				?>
            </ul>
        </div>
    </div>
<?php endif; ?>