<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WPS_Base
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <section class="error-404 not-found">
                            <div class="page-content">
                                <p><?php printf(__('The page you are looking for doesn\'t exist, no longer exists or has been moved. <br /> Perhaps you would like to go to our <a href="%s">home page</a>?', 'wpsbase'), home_url()); ?></p>
                            </div>
                    </div>
                </div>
        </main>
    </div>
<?php

get_footer();
