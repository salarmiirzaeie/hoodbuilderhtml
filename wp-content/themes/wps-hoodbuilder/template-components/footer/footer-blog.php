<?php
global $wps_options;
$wps_custom_class = '';

if ( is_front_page() ) {
	$wps_custom_class = 'homepage-style';
} else {
	$wps_custom_class = 'insidepage-style';
}
?>
<div class="footer-related-articles-wrap<?php if ( $wps_custom_class ): echo ' ' . $wps_custom_class; endif; ?>">
    <div class="container-fluid">
        <div class="row">
			<?php


			// get only first 3 results
			$ids = get_field( 'related_articles', false, false );


			if ( isset( $ids ) && ! empty( $ids ) ) {

				$foo_posts = new WP_Query( array(
					'post_type'      => 'post',
					'posts_per_page' => 4,
					'post__in'       => $ids,
					//'post_status' => 'any',
					'orderby'        => 'post__in',
				) );
			} else {
				$foo_posts = new WP_Query(
					array(
						'post_type'      => 'post',
						//'meta_key' => 'post_views_count',
						'orderby'        => 'meta_value_num',
						'posts_per_page' => 4,
						'order'          => 'DESC'
					)
				);
			}

			?>
			<?php if ( $foo_posts->have_posts() ) : ?>

                <ul class="related-articles">
					<?php
					$blog_slide_counter = 1;
					$latest_post_image  = '';
					while ( $foo_posts->have_posts() ) : $foo_posts->the_post(); ?>
						<?php
						//setup_postdata($post);

						if ( has_post_thumbnail() ) {
							$latest_post_image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
							$latest_post_image      = $latest_post_image_data[0];

							$style_output = '';
							$style_output .= '<style type="text/css">';
							$style_output .= '.related-articles-item.item-' . $blog_slide_counter . ' {';
							$style_output .= 'background-image: url("' . $latest_post_image . '");';
							$style_output .= '}';

							$style_output .= '</style>';

							// echo $style_output;
						}

						?>
                        <li class="col-sm-6 col-md-4 related-articles-item-container <?php echo 'item-' . $blog_slide_counter; ?>">
                            <a class="related-articles-item" href="<?php the_permalink(); ?>">
								<?php

								$comments_count = get_comments_number( get_the_ID() );
								?>
                                <div class="foo-relater-blog-image">
                                    <img src="<?php echo $latest_post_image; ?>">
                                    <div class="foo-related-blog-overlay"></div>
                                </div>

                                <div class="foo-related-blog-details">
                                    <div class="foo-from-the-blog">From the Blog</div>
                                    <h4><?php the_title(); ?></h4>
                                    <div class="entry-meta">
                                        <span class="post-meta-author"><i class="fa fa-user"
                                                                          aria-hidden="true"></i> <?php echo esc_html( get_the_author() ); ?></span>

                                        <span class="published"><i
                                                    class="fa fa-clock-o"></i> <?php echo get_the_date( 'M j, Y' ); ?></span>
                                        <span class="entry-views"><i
                                                    class="fa fa-eye"></i>&nbsp;<?php echo getPostViews( get_the_ID() ); ?></span>

                                    </div>
                                    <div class="entry-excerpt">
										<?php echo wps_excerpt( 14 ); ?>
                                    </div>
                                </div>
                            </a>

                        </li>
						<?php

						$blog_slide_counter ++;
					endwhile; ?>
                </ul>
				<?php //wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>

        </div>
    </div>
</div>