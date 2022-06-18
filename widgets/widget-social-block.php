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
		$widget_option	 = $instance['widget_option']; // Text of the link

    // Output
		echo $before_widget;
		echo "Output";
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
      //These are our defaults
      $widget_option = '';
    }
  // The widget form
  ?>

  <p>
    <label for="<?php echo $this->get_field_id('widget_option'); ?>">Widget option</label>
    <input id="<?php echo $this->get_field_id('widget_option'); ?>" name="<?php echo $this->get_field_name('widget_option'); ?>" placeholder="" type="text" value="<?php echo $widget_option; ?>" class="widefat" />
  </p>
	<?php
	}
} // class scaffold_bootstrap_button

?>
