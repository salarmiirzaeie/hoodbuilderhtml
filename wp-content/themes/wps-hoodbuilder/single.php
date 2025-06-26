<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WPS_Base
 */
get_header(); ?>
    <div class="container">
        <div class="blog-entry-wrap">
            <div class="row">
                <div class="col-md-8">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">

							<?php
							while ( have_posts() ) : the_post();
								setPostViews(get_the_ID());

								get_template_part( 'template-components/content-loop/content', 'single' );

								wps_content_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
                <?php
                get_sidebar();
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();