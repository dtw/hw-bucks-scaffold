<div class="loop-single-service">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div id="service-contact-details" class="col-md-4 col-sm-6 col-xs-12">
				<p>
					<span class="screen-reader-text">Street address</span>
					<?php if ( get_post_meta( $post->ID, 'hw_services_address_line_1', true ) )  { ?>
						<?php echo get_post_meta( $post->ID, 'hw_services_address_line_1', true ); ?><br />
							<?php } ?>

					<?php if ( get_post_meta( $post->ID, 'hw_services_address_line_2', true ) )  { ?>
						<?php echo get_post_meta( $post->ID, 'hw_services_address_line_2', true ); ?><br />
							<?php } ?>

					<?php if ( get_post_meta( $post->ID, 'hw_services_city', true ) )  { ?>
						<?php echo get_post_meta( $post->ID, 'hw_services_city', true ); ?><br />
							<?php } ?>

					<?php if ( get_post_meta( $post->ID, 'hw_services_county', true ) )  { ?>
						<?php echo get_post_meta( $post->ID, 'hw_services_county', true ); ?><br />
							<?php } ?>

					<?php if ( get_post_meta( $post->ID, 'hw_services_postcode', true ) )  { ?>
						<?php echo get_post_meta( $post->ID, 'hw_services_postcode', true ); ?><br />
							<?php } ?>
				</p>
				<?php if ( get_post_meta( $post->ID, 'hw_services_phone', true ) )  {
					$hw_services_phone_tmp = get_post_meta( $post->ID, 'hw_services_phone', true );
					$hw_services_phone_tmp = str_replace(' ', '', $hw_services_phone_tmp);
					$mask = "%s%s%s%s%s %s%s%s %s%s%s";
					$hw_services_phone_tmp = vsprintf($mask, str_split($hw_services_phone_tmp));
					?>
				<p><i class="fas fa-phone service-icon" aria-hidden="true" title="Telephone"></i>
					<strong><?php echo $hw_services_phone_tmp; ?></strong><br />
				</p>
				<?php } ?>
				<?php if ( get_post_meta( $post->ID, 'hw_services_website', true ) )  { ?>
				<p><i class="fas fa-external-link-alt service-icon" aria-hidden="true" title="Website"></i>
					<a target="_blank"  href="<?php echo esc_url(get_post_meta( $post->ID, 'hw_services_website', true )); ?>" title="<?php the_title(); ?>" >Visit their website</a><br />
				</p>
				<?php } ?>
			</div><!-- end of col 1 service-contact-details -->
			<?php if ( has_post_thumbnail() ) { ?>
			<div id="thumbnail-container-body" class="hidden-lg hidden-md col-sm-6 col-xs-12 text-center sidebar-container">
				<?php echo the_post_thumbnail('medium'); ?>
			</div>
		<?php } else {
			$term_ids = get_the_terms( $post->ID, 'service_types' );	// Find taxonomies
			$term_id = $term_ids[0]->term_id;											// Get taxonomy ID
			$term_icon = get_term_meta( $term_id, 'icon', true );						// Get meta
			$term_name=  get_term_meta( $term_id, 'name', true );						// Get meta
			?>
			<div id="thumbnail-container-body" class="hidden-lg hidden-md col-sm-6 col-xs-12 text-center sidebar-container">
				<img class="attachment-thumbnail size-thumbnail wp-post-image" src="
				<?php echo str_replace('.png', '-150x150.png', $term_icon);?>
				" alt="
				<?php echo $term_name . ' icon'; ?>
				"/>
			</div>
		<?php } ?>
			<div id="service-rating-details" class="col-md-7 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1">
				<?php if ( get_post_meta( $post->ID, 'hw_services_overall_rating', true ) )  { ?>
				<div id="overall-rating" class="row">
					<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 rating-title">
						<p><strong>Our rating:</strong></p>
					</div><!-- end of col -->
					<div class="col-lg-8 col-md-6 col-sm-8 col-xs-12 star-rating">
						<p>
						<?php $rating = get_post_meta( $post->ID, 'hw_services_overall_rating', true );
							echo feedbackstarrating($rating,array('colour' => 'green','size' => 'fa-lg'));
							if ($rating == 1) echo '<span class="screen-reader-text">'.$rating.' star</span>';
							else echo '<span class="screen-reader-text">'.$rating.' stars</span>';
						?>
						</p>
					</div><!-- end of col -->
				</div><!-- end of row -->
				<?php }
				// QUERY the COMMENTS for current single post
				$rating = getrating($post);

				if ($rating['count'] != 0) {
					$average_rating = $rating['average'];
					$average_rating = round($average_rating,1); ?>

				<div id="public-rating" class="row">
					<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 rating-title">
						<p><strong>Public rating:</strong></p>
					</div><!-- end of col -->
					<div class="col-lg-8 col-md-6 col-sm-8 col-xs-12 star-rating">
						<p><?php echo feedbackstarrating($average_rating,array('size' => 'fa-lg')); ?></p>
					</div><!-- end of col -->
					<div class="col-lg-8 col-md-12 col-sm-8 col-xs-12 col-lg-offset-4 col-md-offset-0 col-sm-offset-4 rating-description">
						<p>Rated <strong><?php echo $average_rating; ?></strong> out of 5 by <strong><?php echo $rating['count']; ?>
						<?php if ($rating['count'] <= 1) { echo " person"; } else { echo " people"; } ?>
						</strong></p>
					</div>
				</div><!-- end of row -->
			<?php } ?>
				<div id="rating-link" class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 text-right">
						<p><a href="<?php echo get_the_permalink(); ?>#response-header">Leave your own rating &raquo;</a></p>
					</div>
				</div>
			</div><!-- end of col 2 service-rating-details -->
		</div><!-- end of row -->






		<?php if ( get_post_meta( $id, 'hw_services_date_visited', true ) )  { ?>
						<hr />
						<h2>We have rated and reviewed <?php the_title(); ?></h2>

			<p><i class="fas fa-calendar service-icon" aria-hidden="true" title="Date"></i> Visited <strong><?php echo get_post_meta( $id, 'hw_services_date_visited', true ); ?></strong><br />
							</p>
							<p><?php echo do_shortcode('[callout_expired]Please note that the information below may now be out of date.[/callout_expired]'); ?></p>
						<?php } ?>


<!--		  <br /><?php the_excerpt(); ?></br />-->



				<?php the_content(); ?>


		<?php if ( get_post_meta( $post->ID, 'hw_services_full_report', true ) )  { ?>
										<p>
												<a class="btn btn-primary" href="<?php echo get_post_meta( $post->ID, 'hw_services_full_report', true ); ?>" title="Download the full report" >
												Download our full report</a><br />
														</p>
																<?php } ?>




	<?php endwhile; ?>

	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>

	 </div><!-- end of Loop Single Service -->
