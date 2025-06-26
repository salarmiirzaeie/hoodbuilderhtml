<?php

//namespace WPS\Theme\Core;


class WPSThemeHelper
{
    public static function when_match( $bool, $str = '', $otherwise_str = '', $echo = true ) {
        $str = trim( $bool ? $str : $otherwise_str );

        if ( $str ) {
            $str = ' ' . $str;

            if ( $echo ) {
                echo $str;
                return '';
            }
        }

        return $str;
    }

    public static function header_title( $post_id_x = '') {
        $header_title = '';
        global $post;

        if($post_id_x) {
            $post_id_y = trim($post_id_x);
        } else {
            $post_id_y = get_the_ID();
        }

        $page_custom_title = get_field('page_custom_title', $post_id_y);

        if(!empty($page_custom_title) && is_page()) {
            $header_title = $page_custom_title;
        } elseif (is_404()) {
            $header_title = '404 Error';
        } elseif (is_blog()) {
            $header_title = 'Blog';
        } elseif (is_search()) {
            $header_title = 'Search Results';
        } else {
            $header_title = the_title();
        }

        return $header_title;
    }

    public static function header_desc( $post_id_x = '') {
        $header_desc = '';
        global $post;

        if($post_id_x) {
            $post_id_y = trim($post_id_x);
        } else {
            $post_id_y = get_the_ID();
        }

        $page_heading_desc = get_field('page_heading_description', $post_id_y);

        if(isset($page_heading_desc) && !empty($page_heading_desc)) {
            $header_desc = $page_heading_desc;
        } elseif(is_404()) {
            $header_desc = 'Sorry, this page could not be found.';
        }



        return $header_desc;
    }

}