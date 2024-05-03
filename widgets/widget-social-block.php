<?php

// Register 'Social block' widget
add_action( 'widgets_init', 'init_scaffold_social_block' );
function init_scaffold_social_block() { return register_widget('scaffold_social_block'); }


class scaffold_social_block extends WP_Widget {

  /** constructor */
  function __construct() {
    parent::__construct( 'scaffold_social_block',
      $name = 'SF Social block',
      array(
        'classname'   => 'scaffold_widget_social_block',
        'description' => 'Display Socials from theme customiser'
      )
    );
  }

  function scaffold_social_block() {
    self::__construct();
  }

  /**
  * This is our Widget
  **/

  function widget( $args, $instance ) {
    extract($args);

    // Widget options
    $widget_option   = $instance['widget_option']; // Text of the link

    // Output
    echo $before_widget;
    echo '<div class="social-icons social-icons-' . $widget_option . '">';
      if ( get_theme_mod( 'scaffold_org_facebook') ) {
        echo '<a href="https://www.facebook.com/' . get_theme_mod( 'scaffold_org_facebook') . '/" aria-label="Facebook"><i aria-hidden="true" class="fab fa-' . $widget_option . ' fa-facebook-square"></i></a>';
      }
      if (get_theme_mod('scaffold_org_instagram')) {
        echo '<a href="https://instagram.com/' . get_theme_mod('scaffold_org_instagram') . '/" aria-label="Instagram"><i aria-hidden="true" class="fab fa-' . $widget_option . ' fa-instagram-square"></i></a>';
      }
      if ( get_theme_mod( 'scaffold_org_twitter') ) {
        echo '<a href="https://twitter.com/' . get_theme_mod( 'scaffold_org_twitter') . '" aria-label="Twitter"><i aria-hidden="true" class="fab fa-' . $widget_option . ' fa-twitter-square"></i></a>';
      }
      if ( get_theme_mod( 'scaffold_org_linkedin') ) {
        echo '<a href="https://www.linkedin.com/company/' . get_theme_mod( 'scaffold_org_linkedin') . '" aria-label="LinkedIn"><i aria-hidden="true" class="fab fa-' . $widget_option . ' fa-linkedin"></i></a>';
      }
      if ( get_theme_mod( 'scaffold_org_youtube') ) {
        echo '<a href="https://www.youtube.com/channel/' . get_theme_mod( 'scaffold_org_youtube') . '" aria-label="YouTube"><i aria-hidden="true" class="fab fa-' . $widget_option . ' fa-youtube-square"></i></a>';
      }
      if (get_theme_mod('scaffold_org_mastodon')) {
        echo '<a href="' . get_theme_mod('scaffold_org_mastodon') . '" aria-label="Mastodon"><i aria-hidden="true" class="fab fa-' . $widget_option . ' fa-mastodon"></i></a>';
      }
      if ( get_theme_mod( 'scaffold_org_rss') ) {
        echo '<a href="' . get_bloginfo('rss2_url') . '" aria-label="RSS feed"><i aria-hidden="true" class="fa fa-' . $widget_option . ' fa-rss-square"></i></a>';
      }
    echo '</div>';
    // echo widget closing tag
    echo $after_widget;
  }

  /** Widget control update */
  function update( $new_instance, $old_instance ) {
    $instance    = $old_instance;

    //Let's turn that array into something the Wordpress database can store
    $instance['widget_option'] = strip_tags( $new_instance['widget_option'] );
    return $instance;
  }

  /**
  * Widget settings
  **/
  function form( $instance ) {
    // instance exist? if not set defaults
    if ( $instance ) {
      $widget_option = $instance['widget_option'];
    } else {
      //These are our defaults: lg or 2x
      $widget_option = 'lg';
    }
  // The widget form
  ?>

  <p>
    <label for="<?php echo $this->get_field_id('widget_option'); ?>">Icon size (lg or 2x)</label>
    <input id="<?php echo $this->get_field_id('widget_option'); ?>" name="<?php echo $this->get_field_name('widget_option'); ?>" placeholder="" type="text" value="<?php echo $widget_option; ?>" class="widefat" />
  </p>
  <?php
  }
} // class scaffold_bootstrap_button

?>
