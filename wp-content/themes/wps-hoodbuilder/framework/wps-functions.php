<?php

function is_blog() {
    return ( is_author() || is_category() || is_tag() || is_date() || is_home() || is_single() ) && 'post' == get_post_type();
}


class My_Sub_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dl-submenu\">\n";
	}
	function end_lvl(&$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
}


// Custom Style Generator
$bottom_styles = array();

function generate_custom_style( $selector, $props = '', $media = '', $footer = false ) {
    global $bottom_styles;

    $css = '';

    // Selector Start
    $css .= $selector . ' {' . PHP_EOL;

    // Selector Properties
    $css .= str_replace( ';', ';' . PHP_EOL, $props );

    $css .= PHP_EOL . '}';
    // Selector End

    // Media Wrap
    if ( trim( $media ) ) {
        if ( strpos( $media, '@' ) == false ) {
            $css = "@media {$media} { {$css} }";
        } else {
            $css = "{$media} { {$css} }";
        }
    }

    if ( ! $footer || defined( 'DOING_AJAX' ) ) {
        echo "<style>{$css}</style>";
        return;
    }

    $bottom_styles[] = $css;
}


// Compress Text Function
function compress_text( $buffer ) {
    /* remove comments */
    $buffer = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer );
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace( array( "\r\n", "\r", "\n", "\t", '	', '	', '	' ), '', $buffer );
    return $buffer;
}

// Parse Footer Styles
function wps_parse_bottom_styles() {
    global $bottom_styles;

    if ( ! count( $bottom_styles ) ) {
        return;
    }

    echo "<style>\n" . compress_text( implode( PHP_EOL . PHP_EOL, $bottom_styles ) ) . "\n</style>";
}

add_action( 'wp_footer', 'wps_parse_bottom_styles' );


/*
 * Add to extended_valid_elements for TinyMCE
 * http://www.engfers.com/2008/10/16/how-to-allow-stripped-element-attributes-in-wordpress-tinymce-editor/
 * @param $init assoc. array of TinyMCE options
 * @return $init the changed assoc. array
 */
function my_change_mce_options($init)
{
	// Command separated string of extended elements
	$ext = 'pre[id|name|class|style],div[id|class|style],span[id|name|class|style]';

	// Add to extended_valid_elements if it alreay exists
	if (isset($init['extended_valid_elements'])) {
		$init['extended_valid_elements'] .= ',' . $ext;
	} else {
		$init['extended_valid_elements'] = $ext;
	}

	// Super important: return $init!
	return $init;
}

add_filter('tiny_mce_before_init', 'my_change_mce_options');

function mod_mce($initArray)
{
	$initArray['verify_html'] = false;
	return $initArray;
}

add_filter('tiny_mce_before_init', 'mod_mce');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats($init_array)
{

// Define the style_formats array

	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Orange Color',
			'block' => 'span',
			'classes' => 'color-orange',
			'wrapper' => true,
		),
		array(
			'title' => 'Big Paragraph + Blue',
			'block' => 'span',
			'classes' => 'big-para-blue',
			'wrapper' => true,
		),
		array(
			'title' => 'Big Paragraph',
			'block' => 'span',
			'classes' => 'big-para',
			'wrapper' => true,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode($style_formats);

	return $init_array;

}

// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');

function wpb_mce_buttons_2($buttons)
{
	array_unshift($buttons, 'styleselect');
	return $buttons;
}

add_filter('mce_buttons_2', 'wpb_mce_buttons_2');


if( ! function_exists( 'wps_vc_image' ) )
{
    function wps_vc_image( $image = false, $size = 'full' ){
        if( $image && is_numeric( $image ) ){
            if(!empty($size)) {
                $image = wp_get_attachment_image_src( $image, $size);
            } else {
                $image = wp_get_attachment_image_src( $image, 'full' );
            }
            $image = $image[0];
        }
        return $image;
    }
}


if ( ! function_exists( 'wps_content_navigation' ) ) :
	/**
	 * Display navigation to next/previous posts when applicable.
	 *
	 * @since 1.3.0
	 */
	function wps_content_navigation() {
		if ( is_singular() ) :
			the_post_navigation( array(
				'prev_text' => _x( '<span class="meta-nav">Previous <span class="screen-reader-text">post:</span></span><span class="post-title">%title</span>', 'Previous post link', 'wpsbase' ),
				'next_text' => _x( '<span class="meta-nav">Next <span class="screen-reader-text">post:</span></span><span class="post-title">%title</span> ', 'Next post link', 'wpsbase' )
			) );
		else :
			the_posts_navigation( array(
				'next_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i> <span>' . esc_html__( 'Newer Posts', 'wpsbase' ) . '</span>',
            	'prev_text' => '<span>' . esc_html__( 'Older Posts', 'wpsbase' ) . '</span> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>'

			) );
		endif;
	}
endif;

if ( ! function_exists( 'wps_entry_date' ) ) :
	function wps_entry_date() {

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = get_the_modified_date();
		}
		else {
			$time_string = get_the_date();
		}

		printf( '<a href="%1$s">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'wps_entry_date_nolink' ) ) :
	function wps_entry_date_nolink() {

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = get_the_modified_date();
		}
		else {
			$time_string = get_the_date();
		}

		echo $time_string;
	}
endif;


if ( ! function_exists( 'wps_single_meta' ) ) :
	function wps_single_meta() {
		?>
		<div class="entry-meta">
			<?php if ( get_post_type() === 'post' ): ?>
				<span class="post-meta-author">By: <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></span>
			<?php endif; ?>

			<?php if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ): ?>
				<span class="posted-on"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php wps_entry_date(); ?></span>
			<?php endif;?>

            <span class="entry-views"> <i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>

            <span class="entry-categories"><i class="fa fa-sitemap"></i>&nbsp;<?php _e('in&nbsp;', 'wps') ?>
                &nbsp;<?php the_category(', ') ?></span>

			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<span class="comments-link"><i class="fa fa-comment" aria-hidden="true"></i> <?php comments_popup_link( __( 'Leave a comment', 'visual-composer-starter' ), __( '1 Comment', 'visual-composer-starter' ), __( '% Comments', 'visual-composer-starter' ) ); ?></span>
			<?php endif; ?>
		</div>
		<?php
	}
endif;

if (!function_exists('TS_VCSC_VideoID_Youtube')){
    function TS_VCSC_VideoID_Youtube($url){
        // Get image from video URL
        $urls       = parse_url($url);
        $imgPath    = '';
        if ((isset($urls['host'])) && ($urls['host'] == 'youtu.be')) {
            //Expect the URL to be http://youtu.be/abcd, where abcd is the video ID
            $imgPath = ltrim($urls['path'],'/');
        } else if ((isset($urls['path'])) && (strpos($urls['path'], 'embed') == 1)) {
            // Expect the URL to be http://www.youtube.com/embed/abcd
            $imgPath = end(explode('/', $urls['path']));
        } else if (strpos($url, '/') === false) {
            //Expect the URL to be abcd only
            $imgPath = $url;
        } else {
            //Expect the URL to be http://www.youtube.com/watch?v=abcd
            parse_str($urls['query']);
            $imgPath = $v;
        }
        return $imgPath;
    }
}

if (!function_exists('TS_VCSC_VideoID_Vimeo')){
    function TS_VCSC_VideoID_Vimeo($url){
        $image_url = parse_url($url);
        if ((isset($image_url['host'])) && ($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com')) {
            return substr($image_url['path'], 1);
        } else {
            return '';
        }
    }
}


function wps_excerpt($new_length = 60, $new_more = '...') {
	add_filter('excerpt_length', function () use ($new_length) {
		return $new_length;
	}, 999);
	add_filter('excerpt_more', function () use ($new_more) {
		global $post;

		return $new_more;
		//return $new_more. '<a class="read-more" href="'. get_permalink($post->ID) . '">' . 'Read More' . '</a>';
	});
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', apply_filters('convert_chars',$output));
	$output = '<p>' . $output . '</p>';
	return $output;
}