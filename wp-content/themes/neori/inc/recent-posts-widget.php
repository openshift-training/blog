<?php
/**
 * recent-posts-widget.php
 *
 * Plugin Name: Recent-Posts-Widget
 * Description: A widget that displays the latest posts.
 * Version: 1.0
*/



/* CREATION */

class neori_recent_posts_widget extends WP_Widget {

  public function __construct() {

    parent::__construct(
      'neori_recent_posts_widget',
      esc_html__( 'Neori: Recent posts', 'neori' ),
      array(
        'classname' => 'neori_recent_posts_widget',
        'description' => esc_html__( 'A widget that displays latest posts', 'neori' )
      )
    );

  }

/* WIDGET - what you see in the front-end */

  public function widget( $args, $instance ) {

    extract( $args );

    $title = apply_filters('widget_title', $instance['title'] );

    echo wp_kses_post($before_widget);

    if ( $title ) {
      echo wp_kses_post($before_title) . wp_kses_post($title) . wp_kses_post($after_title);
		}

    $queryArgs = array(
      'type' => 'post',
      'post_status' => 'publish',
      'cat' => '-1',
      'orderby' => 'date',
      'posts_per_page' => '3',
      'ignore_sticky_posts' => '1'
    );

    $recent_posts_query = new WP_Query( $queryArgs );

      if ( $recent_posts_query->have_posts() ) : ?>

        <div class="recent-posts-widget">

          <?php while ( $recent_posts_query->have_posts() ) : $recent_posts_query->the_post(); ?>

          <div class="recent-post row">

            <div class="recent-post-thumbnail col-5">

              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'large', array( 'class' => 'recent-post-image' ) ); ?></a>

            </div><!-- /.recent-post-thumbnail -->

            <?php if(has_post_thumbnail()) : ?>

              <div class="recent-post-text col-7 d-flex align-items-center">

            <?php else : ?>

              <div class="recent-post-text-empty col-12 d-flex align-items-center">

            <?php endif; ?>

                <h2 class="recent-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  class="recent-title"><?php the_title(); ?></a></h2>

              </div><!-- /.recent-post-text -->

          </div><!-- /.recent-post row-->

          <?php endwhile; ?>

        </div><!-- /.recent-posts-widget -->



          <?php endif;

          wp_reset_postdata();

    echo wp_kses_post($after_widget);

	}



 /* FORM - what you see in back-end */

  public function form( $instance ) {

    $defaults = array(
      'title' => 'Latest posts'
    );

    $instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"></label>
      <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
    </p>

        <?php
	}



/* UPDATE - used for processing and sanitizing values inputted by user. Important for stripping HTML and unwanted content */

  public function update( $new_instance, $old_instance ) {

    $instance = $old_instance;

    $instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );

    return $instance;

  }

}



/* REGISTER */

add_action( 'widgets_init', 'neori_recent_posts_widget_register' );

function neori_recent_posts_widget_register() {
  register_widget( 'neori_recent_posts_widget' );
}

?>
