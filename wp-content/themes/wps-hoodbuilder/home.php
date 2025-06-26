<?php
/**
 * Template Name: Blog Template
 *
 * The template for displaying Full-width Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPS_Base
 */

get_header();

//use \WPS\Theme\Core\WPSThemeHelper;

global $post;

// Check if is default container
$is_vc_content = preg_match( "/\[vc_row.*?\]/i", $post->post_content );

?>

    <div id="primary"
         class="content-area<?php WPSThemeHelper::when_match( $is_vc_content, 'vc-container', 'no-vc-container' ); ?>">
        <main id="main" class="site-main" role="main">
            <div class="wps-blog-isotope-wrap">
				<?php
				if ( have_posts() ) :
					?>
					<div class="container">
                    <div class="wps-blog-isotope">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-components/content-loop/content', 'isotope' );

						endwhile;



						?>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-12">
                                <?php wps_content_navigation(); ?>
                            </div>
                        </div>
                    </div>
					<?php
				else :

					get_template_part( 'template-components/content-loop/content', 'none' );
					?>

				</div>
				<?php

				endif; ?>
            </div>
        </main>
    </div>
<?php
get_footer();
