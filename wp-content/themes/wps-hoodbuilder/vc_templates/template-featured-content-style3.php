<?php
$unique_id = 'wps-featured-text-' . mt_rand( 100000, 999999 );
generate_custom_style( "#{$unique_id}", "background-image: url(\"{$section_image}\");" );
?>
<div id="<?php echo $unique_id; ?>" class="wps-homepage-featured-text-content-wrap <?php echo $wrap_class; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-11">
                <div class="wps-homepage-featured-text-content-container">
                    <div class="section-title">
                        <h2><?php echo esc_html( $section_title ); ?></h2>
                    </div>
                    <div class="section-description">
						<?php echo apply_filters( 'the_content', $content ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
