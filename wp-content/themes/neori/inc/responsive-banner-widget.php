<?php
/**
 * responsive-banner-widget.php
 *
 * Plugin Name: Responsive-Banner-Widget
 * Description: A widget that displays a responsive banner.
 * Version: 1.0
*/



/* CREATION */

class neori_responsive_banner_widget extends WP_Widget {

  public function __construct() {

    parent::__construct(
      'neori_responsive_banner_widget',
      esc_html__( 'Neori: Responsive banner', 'neori' ),
      array(
        'classname' => 'neori_responsive_banner_widget',
        'description' => esc_html__( 'A widget that makes it easy to add a responsive banner.', 'neori' )
      )
    );

  }

/* WIDGET - what you see in the front-end */

  public function widget( $args, $instance ) {

    extract( $args );

    $title = apply_filters('widget_title', $instance['title'] );
    $image_url = $instance['image_url'];
    $target_url = $instance['target_url'];

    echo wp_kses_post($before_widget);

    if ( $title )
      echo wp_kses_post($before_title) . wp_kses_post($title) . wp_kses_post($after_title);

    ?>

    <?php

      if ( !empty($image_url) ) {
        echo '<div class="responsive-banner-widget">';
        echo '<a href="'.wp_kses_post($target_url).'">';
        echo '<img src="'.wp_kses_post($image_url).'" alt="banner">';
        echo '</a>';
        echo '</div>';
      }

      else { }

    ?>

    <?php

    echo wp_kses_post($after_widget);

	}

/* FORM - what you see in back-end */

  function form( $instance ) {

    $defaults = array(
      'title' => 'Banner',
      'image_url' => '',
      'target_url' => ''
    );

    $instance = wp_parse_args( (array) $instance, $defaults );
    $title = $instance['title'];
    $image_url = $instance['image_url'];
    $target_url = $instance['target_url'];
    ?>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'neori' ); ?></label>
      <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id('image_url')); ?>"><?php esc_html_e( 'Image Link:', 'neori' ); ?></label>
      <input id="<?php echo esc_attr($this->get_field_id('image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url')); ?>" type="text" value="<?php echo esc_attr($image_url); ?>" />
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id('target_url')); ?>"><?php esc_html_e( 'Target URL:', 'neori' ); ?></label>
      <input id="<?php echo esc_attr($this->get_field_id('target_url')); ?>" name="<?php echo esc_attr($this->get_field_name('target_url')); ?>" type="text" value="<?php echo esc_attr($target_url); ?>" />
    </p>

    <?php

	}

/* UPDATE - used for processing and sanitizing values inputted by user. Important for stripping HTML and unwanted content */

  function update( $new_instance, $old_instance ) {

    $instance = $old_instance;

    $instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );

    $instance['image_url'] = strip_tags($new_instance['image_url']);

    $instance['target_url'] = strip_tags($new_instance['target_url']);

    return $instance;

  }

}

/* REGISTER */

add_action( 'widgets_init', 'neori_responsive_banner_widget_register' );

function neori_responsive_banner_widget_register() {
  register_widget( 'neori_responsive_banner_widget' );
}

?>
