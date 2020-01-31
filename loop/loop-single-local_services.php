<div class="loop-single-service">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div id="service" class="col-md-12 col-sm-8 col-xs-12">
				<div id="service-contact-details" class="col-md-4 col-sm-12 col-xs-12">
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
						<a target="_blank"  href="<?php echo esc_url(get_post_meta( $post->ID, 'hw_services_website', true )); ?>" title="<?php the_title(); ?>" >Visit their website &raquo;</a><br />
					</p>
					<?php } ?>
				</div><!-- end of col 1 service-contact-details -->
				<div id="service-rating-details" class="col-md-7 col-sm-12 col-xs-12 col-md-offset-1">
					<?php if ( get_post_meta( $post->ID, 'hw_services_overall_rating', true ) )  { ?>
					<div id="overall-rating" class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<p><strong>Our overall rating:</strong></p>
						</div><!-- end of col -->
						<div class="col-md-6 col-sm-12 col-xs-12">
							<p>
							<?php $rating = get_post_meta( $post->ID, 'hw_services_overall_rating', true );
								echo feedbackstarrating($rating,array('colour' => 'green','size' => 'fa-lg'));
								if ($rating == 1) echo '<span class="screen-reader-text">'.$rating.' star</span>';
								else echo '<span class="screen-reader-text">'.$rating.' stars</span>';
							?>
							</p>
						</div><!-- end of col -->
					</div><!-- end of row -->
					<?php } ?>
					<?php // QUERY the COMMENTS for current single post
					$args = array (
						'post_id' => $post->ID,
						'status' => 'approve'
						);

					$comments = get_comments($args);
					?>

					<?php if ( $comments ) { ?>

					<div id="public-rating" class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<p><strong>Public rating:</strong></p>
						</div><!-- end of col -->
						<div class="col-md-6 col-sm-12 col-xs-12">
							<?php get_template_part('elements/comments-rating-average'); ?>
						</div><!-- end of col -->
					</div><!-- end of row -->
					<?php } else { ?>
					<p><a href="<?php echo get_the_permalink(); ?>#respond">Leave your own rating &raquo;</a></p>
					<?php } ?>
				</div><!-- end of col 2 service-rating-details -->
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div id="thumbnail-container-body" class="hidden-lg hidden-md col-sm-4 col-xs-12 sidebar-container">
				<?php echo the_post_thumbnail('medium'); ?>
			</div><!-- end of service -->
			<?php } ?>
		</div><!-- end of row -->






		<?php if ( get_post_meta( $id, 'hw_services_date_visited', true ) )  { ?>

						<hr /><h2>Healthwatch Bucks has visited, rated and reviewed <?php the_title(); ?></h2>

			<p><i class="fas fa-calendar service-icon" aria-hidden="true" title="Date"></i> Visited <strong><?php echo get_post_meta( $id, 'hw_services_date_visited', true ); ?></strong><br />
							</p>
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
