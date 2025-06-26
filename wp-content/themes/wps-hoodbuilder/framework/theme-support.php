<?php

/* ================================================================================== */
/*      Theme Supports
  /* ================================================================================== */

add_action('after_setup_theme', 'wps_base_setup');
if (!function_exists('wps_base_setup')) {

    function wps_base_setup() {
        add_editor_style();
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('gallery', 'video', 'audio'));
        add_theme_support('title-tag');
        add_theme_support('automatic-feed-links');
        //load_theme_textdomain('wpsbase', THEME_PATH . '/languages/');
        register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'wpsbase')));
        register_nav_menus(array('mobile-menu' => esc_html__('Mobile Menu', 'wpsbase')));
        register_nav_menus(array('sidebar-restaurant-menu' => esc_html__('Sidebar Restaurant Menu', 'wpsbase')));

        // add_image_size('lovely_slider_img', 940, 530, true);
        // add_image_size('lovely_slider_grid', 460, 480, true);
        // add_image_size('lovely_blog_thumb', 620, 350, true);
        // add_image_size('lovely_grid_thumb', 300, 200, true);
        // add_image_size('lovely_list_thumb', 220, 140, true);
         add_image_size('treatment_carousel_thumb', 180, 180, true);
        // add_image_size('lovely_video_post', 300, 380, true);
    }

}
if (!isset($content_width)) {
    $content_width = 960;
}


