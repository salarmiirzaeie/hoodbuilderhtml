<?php
/**
 * Sidebar Setup
 *
 * @package WPS_Base
 * @author Seyed
 * @link http://wpsailor.com
 */


if (!function_exists('wps_widgets_init')) :

    /**
     * Register widgetized areas.
     *
     * @since 1.0.0
     */
    function wps_widgets_init()
    {
        $widget_params = array(
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        );

        $widget_areas = array(
            '1' => array(
                'sidebar_name' => 'Blog Sidebar',
                'sidebar_desc' => 'Sidebar used on blog posts'
            ),
            '2' => array(
                'sidebar_name' => 'Page Sidebar',
                'sidebar_desc' => 'Sidebar used on pages with sidebar template'
            )
        );

        if (!empty($widget_areas) && is_array($widget_areas)) {
            $prefix = 'sidebar_';

            foreach ($widget_areas as $sidebar_id => $sidebar) {
                $sidebar_args = array(
                    'name' => (isset($sidebar['sidebar_name']) ? $sidebar['sidebar_name'] : ''),
                    'id' => $prefix . $sidebar_id,
                    'description' => (isset($sidebar['sidebar_desc']) ? $sidebar['sidebar_desc'] : ''),
                    'before_widget' => $widget_params['before_widget'],
                    'after_widget' => $widget_params['after_widget'],
                    'before_title' => $widget_params['before_title'],
                    'after_title' => $widget_params['after_title'],
                );

                register_sidebar($sidebar_args);
            }
        }
    }

    add_action('widgets_init', 'wps_widgets_init');

endif;