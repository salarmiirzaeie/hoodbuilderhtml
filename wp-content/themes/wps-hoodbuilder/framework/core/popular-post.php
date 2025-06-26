<?php
function wps_register_widgets() {
    register_widget( 'WPS_Popular_Post_Widget');
}

add_action( 'widgets_init', 'wps_register_widgets' );

class WPS_Popular_Post_Widget extends WP_Widget {

    function WPS_Popular_Post_Widget() {
        // Instantiate the parent object

    $widget_options = array(
      'classname'=> 'widget_popularpost popular-posts',
      'description'=> __( 'Widget for custom popular post', 'wpbase' ),
      );
    parent::__construct('wps_popular_post_widget', 'WPS Popular Post Widget', $widget_options);

    }

    function widget( $args, $instance ) {

    $popular_post = new WP_Query(
        array(
            'posts_per_page' => $instance['post_limit'],
            'orderby' => 'ID',
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        )
    );

        echo $args['before_widget']; 
        echo '<h3 class="widget-title">Popular Posts</h3>';
        while ( $popular_post->have_posts() ) : $popular_post->the_post();
        echo '<div class="popular-post-item">';
        echo '<div class="popular-post-details">';
        echo '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
        //echo '<p>'.wps_the_theme_excerpt(15).'</p>';
        echo '<div class="popular-post-meta">';
        echo '<span class="published"><i class="fa fa-clock-o"></i> '.get_the_date('M j, Y').'</span>';
        echo '<span class="entry-views"><i class="fa fa-eye"></i> '.getPostViews(get_the_ID()).'</span>';
        echo '</div>';
        echo '<div class="popular-post-excerpt">';
        echo wps_excerpt(20);
        echo '</div>';
        echo '</div>';
        echo '</div>';
        endwhile;
        echo '';
        echo '';
        echo '';
        echo '';

        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        // Fields
        $instance['post_limit'] = strip_tags($new_instance['post_limit']);
        return $instance;
    }

    // Widget form creation
    function form($instance) {
        $post_limit = '';

        // Check values
        if( $instance) {
            $post_limit = esc_attr($instance['post_limit']);
        } ?>
         
        <p>
            <label for="<?php echo $this->get_field_id('post_limit'); ?>"><?php _e('Number of Posts', 'wpsbase'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_limit'); ?>" name="<?php echo $this->get_field_name('post_limit'); ?>" type="text" value="<?php echo $post_limit; ?>" />
        </p>
        
    <?php }
}