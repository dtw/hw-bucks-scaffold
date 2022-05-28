<?php get_header(); ?>

<div class="container">
	<div class="row no-gutter">
		<div id="content" class="col-md-8 col-xs-12">
			<?php include('loop/loop-single-local_services.php'); ?>
			<?php include('elements/comments-list.php'); ?>
			<?php if (!is_user_logged_in()) { ?>
				<hr />
				<h2 id="response-header">Rate and review this service</h2>
				<p>Your name and email address and other identifying information will not be published and will be stored in accordance with our <a href="http://www.healthwatchbucks.co.uk/privacy/" target="_blank">privacy policy</a>. Required fields are marked with an asterisk. All comments are checked against our <a href="https://www.healthwatchbucks.co.uk/privacy/#comments" target="_blank">comments policy</a> before they are published. </p>
				<?php include('elements/comments-form.php');
			} ?>
			<?php // echo do_shortcode("[wp_social_sharing social_options='facebook,twitter,googleplus,linkedin' twitter_username='HW_Bucks' facebook_text='Share on Facebook' twitter_text='Share on Twitter' googleplus_text='Share on Google+' linkedin_text='Share on Linkedin' pinterest_text='Share on Pinterest' xing_text='Share on Xing' icon_order='f,t,g,l,p,x' show_icons='1' before_button_text='Share this page' text_position='top' social_image='']"); ?>
		</div><!-- end of content column -->
		<div id="sidebar" class="col-md-4 col-xs-12">
			<!-- Insert FEATURED IMAGE -->
			<?php // check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				echo '<div id="thumbnail-container-sidebar" class="col-md-12 hidden-sm hidden-xs sidebar-container">';
				the_post_thumbnail();
				echo '</div>';
			} ?>
			<!-- Insert CQC WIDGET -->
			<?php if (has_term('pharmacy','service_types') || get_post_meta(get_the_ID(),'hw_services_cqc_location',true) == '')  {
			} else { ?>
				<div id="cqc-widget-container" class="col-xs-12 sidebar-container">
					<h3>How does the Care Quality Commission rate <?php the_title(); ?>?</h3>
					<script src="http://www.cqc.org.uk/sites/all/modules/custom/cqc_widget/widget.js?data-host=www.cqc.org.uk&amp;type=location&amp;data-id=<?php echo get_post_meta( $post->ID, 'hw_services_cqc_location', true ); ?>">
		    	</script>
				</div>
			<?php } ?>
			<div id="google-maps-container" class="col-xs-12 sidebar-container" aria-hidden="true">
				<h3>Service location</h3>
				<div id="view1">
					<?php
					$aTitle = get_the_title();
					$a1 = get_post_meta(get_the_ID(),'hw_services_address_line_1',true);
					$a2 = get_post_meta(get_the_ID(),'hw_services_address_line_2',true);
					$aCity = get_post_meta(get_the_ID(),'hw_services_city',true);
					$aCounty = get_post_meta(get_the_ID(),'hw_services_county',true);
					$aPostcode = get_post_meta(get_the_ID(),'hw_services_postcode',true);
					$location = $aTitle . "%20" . $a1 . "%20" . $a2 . "%20" . $aCity . "%20" . $aCounty . "%20" . $aPostcode . "%20UK";
					$location = str_replace(' ', '%20', $location);
					?>
					<iframe width="1000" height="500" src="https://maps.google.ca/maps?center=<?php echo $location; ?>&zoom=8&q=<?php echo $location; ?>&size=1000x500&output=embed&iwloc=near"></iframe>
				</div>
			</div>
			<div id="recent-reviews-container" class="col-xs-12 sidebar-container">
				<?php // Get the taxonomy term for this post
				$term_list = wp_get_post_terms($post->ID, 'service_types', array("fields" => "ids"));
				$service_type = $term_list[0];
				$args = array(
					'status' => 'approve',
					'posts_per_page' => '1000',
					'post_type' => 'local_services',
					'number' => 1000,
					'post__not_in' => get_the_id(),
				);
				// The Query
				$comments_query = new WP_Comment_Query;
				$comments = $comments_query->query( $args );
				// Comment Loop
				if ( $comments ) {
					//$term = get_term( $service_type, 'service_types' );
					//echo '<h3>Other feedback for ' . $term->name . 's</h3>';
					echo '<h3>Other reviews</h3>';
					$the_count = 0;
					foreach ( $comments as $comment ) {
						if ($the_count > 4) { break; }
						// Display icon for taxonomy term
						$term_ids = get_the_terms( $comment->comment_post_ID, 'service_types' );	// Find taxonomies
						$comment_term_id = $term_ids[0]->term_id;											// Get taxonomy ID
						if ($comment_term_id == $service_type) {
							$the_count = $the_count + 1;
				?>
				<div class="review-container">
					<h3 class="review-permalink"><a href="<?php echo get_the_permalink($comment->comment_post_ID); ?>"><?php echo get_the_title($comment->comment_post_ID); ?></a></h3>
					<?php // Display star rating
					$individual_rating = get_comment_meta( $comment->comment_ID, 'feedback_rating', true ); ?>
					<?php if ($individual_rating) { ?>
						<p class="star-rating p-rating">
							<?php echo feedbackstarrating($individual_rating,array('size' => 'fa-lg'));
							if ($individual_rating == 1) echo '<span class="screen-reader-text">'.$individual_rating.' star</span>';
							else echo '<span class="screen-reader-text">'.$individual_rating.' stars</span>';
							?>
						</p>
						<p class="review-date"><strong><?php echo human_time_diff( strtotime($comment->comment_date), current_time( 'timestamp' ) ); ?> ago</strong></p>
					<?php } // end of if there is a rating ?>
        		<?php echo wpautop(wp_strip_all_tags(mb_strimwidth($comment->comment_content,0,300," ...")), true); ?>
				<!-- end review-container --></div>
						<?php	} // end of check matching service type
  				} // end of for loop
				} ?>
			</div><!-- end of recent review container -->
		</div><!-- end of sidebar -->
	</div><!-- end of row -->
</div><!-- end of container -->
</div><!-- end of container fluid (not in this file) -->

<?php get_footer(); ?>
