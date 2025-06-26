<?php
$unique_id = 'wps-featured-text-' . mt_rand( 100000, 999999 );
generate_custom_style( "#{$unique_id}", "background-image: url(\"{$section_image}\");" );
?>
<div id="<?php echo $unique_id; ?>" class="wps-homepage-featured-text-content-wrap <?php echo $wrap_class; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                <div class="wps-homepage-featured-text-content-container">
                    <div class="section-title">
                        <h2><?php echo esc_html( $section_title ); ?></h2>
                    </div>
                    <div class="section-description">
						<?php echo apply_filters( 'the_content', $content ); ?>
                    </div>
                    <?php if($section_button_text && $section_button_link): ?>
                    <div class="section-button">
                        <a href="<?php echo $section_button_link; ?>"><?php echo $section_button_text; ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
