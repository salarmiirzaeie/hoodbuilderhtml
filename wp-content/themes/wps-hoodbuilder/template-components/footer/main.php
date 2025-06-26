<?php
global $wps_options;
?>
<div class="footer-main">
    <div class="footer-cta-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="footer-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                                    src="<?php echo WPS_THEME_URI; ?>/assets/images/logo-footer.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="footer-cta-text">
                        <h5 style="text-align: center;">For Queries and Quote Contact Hood Builder today at <a href="tel:+1-303-777-7720" class="footer-phone-clickable">303-777-7720</a></h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-cta-btn">
                        <a href="<?php echo get_permalink($wps_options['wps-opt-contact-page-url']); ?>">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-divider-line"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-menu-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="footer-menu-container">
                        <?php 
                      
                               get_template_part( 'template-components/footer/menu' );
                                 
                         ?>

						<?php /* if ( function_exists( 'fmgc_pro_display_widgets' ) ) {
							echo fmgc_pro_display_widgets();
						}  */ ?>
						
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="widget foo-follow-us">
                        <span class="location-icon"></span>
                        <span class="widget-title">Location</span>
                        <div>
							<span style="color: #cfcfcf;">Unit 215, 5925 E Evans Ave, Denver, CO 80222</span>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-copyright-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="foo-aff-logo">
                    <img src="<?php echo WPS_THEME_URI; ?>/assets/images/footer-aff-logo.png" alt="">
                    <p>
                        California Contractors License #: 943941 We are C-16 and C- 20 Certified.<br>
                        <strong>We are EPA Certified.</strong>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="foo-copyright-text">
					<p>
						<a href="https://www.toporganicleads.com/" target="_blank">Get Leads by Top Organic Leads.</a>
					</p>
					<p>
						Copyright &copy; <span id="cdate"></span><script>document.getElementById("cdate").innerHTML = (new Date().getFullYear());</script> Hood Builder. All Rights Reserved.
					</p>
                </div>
            </div>

        </div>
    </div>
</div>