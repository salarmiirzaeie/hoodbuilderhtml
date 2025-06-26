<?php
/**
 *    Team Members
 *
 *    WPSailor
 *    www.wpsailor.com
 */

global $team_member_index;

if (function_exists('vc_map_get_attributes')) {
    $atts = vc_map_get_attributes($this->getShortcode(), $atts);
}

extract($atts);

$element_id = 'team-members-' . mt_rand(100000, 999999);


// Element Class
$class = $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts);

// Show Team Members
$team_member_index = 0;

?>
    <div id="<?php echo esc_attr($element_id); ?>" class="wps-our-team-wrap<?php echo esc_attr($el_class); ?>">
        <div class="wps-our-team-container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="section-heading"><?php echo $heading; ?></h3>
                </div>
            </div>
            <div class="row">
                    <?php echo wpb_js_remove_wpautop($content); ?>
            </div>
        </div>
    </div>
<?php
