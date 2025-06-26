<?php
/**
 * Template Name: Full-width
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

	<div id="primary" class="content-area<?php WPSThemeHelper::when_match( $is_vc_content, 'vc-container', 'no-vc-container' ); ?>">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-components/content-loop/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main>
	</div>
<?php
get_footer();
