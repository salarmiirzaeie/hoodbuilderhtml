<?php
if(is_singular()):

wps_single_meta();

else:
?>

<div class="entry-meta">
            <span class="post-meta-author">By: <?php echo esc_html( get_the_author() ); ?></span>
            <span class="posted-on"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php wps_entry_date_nolink(); ?></span>
            <span class="entry-views"> <i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>
            <?php if(comments_open()):
                //$comments_count = wp_count_comments(get_the_ID());
                $comments_count = get_comments_number( get_the_ID() );
                ?>

                <span class="comments-link"><i class="fa fa-comment" aria-hidden="true"></i> <?php echo $comments_count; ?></span>
            <?php endif; ?>
		</div><!-- .entry-meta -->

<?php endif; ?>