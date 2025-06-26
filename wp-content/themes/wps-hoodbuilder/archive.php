<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
                            if (have_posts()) : ?>

                                <header class="archive-page-header">
                                    <?php
                                    the_archive_title('<h1 class="page-title">', '</h1>');
                                    the_archive_description('<div class="taxonomy-description">', '</div>');
                                    ?>
                                </header>
                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-components/content-loop/content', get_post_format() );

                                endwhile;

                                the_posts_navigation();

                            else :

                                get_template_part( 'template-components/content-loop/content', 'none' );

                            endif; ?>

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