<div class="wps-homepage-featured-text-content-wrap <?php echo $wrap_class; ?>">
    <div class="wps-homepage-featured-text-content">
        <div class="section-title">
            <h2><?php echo esc_html( $section_title ); ?></h2>
        </div>
        <div class="section-description">
			<?php echo wpb_js_remove_wpautop(apply_filters( 'the_content', $content )); ?>
        </div>
    </div>
</div>
