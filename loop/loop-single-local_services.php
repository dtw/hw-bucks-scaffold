<div class="loop-single-service">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>







<div class="row">

<div class="col-md-4 col-sm-4 col-xs-12" style="border-right: #999 1px dashed;">



	        <p>

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
			<p><i class="fas fa-phone" aria-hidden="true"></i>
				<strong><?php echo $hw_services_phone_tmp; ?></strong><br />
			        </p>
						<?php } ?>

		<?php if ( get_post_meta( $post->ID, 'hw_services_website', true ) )  { ?>
			<p><i class="fas fa-link" aria-hidden="true"></i>
            	<a target="_blank"  href="http://<?php echo get_post_meta( $post->ID, 'hw_services_website', true ); ?>" title="<?php the_title(); ?>" >Visit their website &raquo;</a><br />
			        </p>
						<?php } ?>



    </div><!-- end of col 1 -->











<div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-1 col-sm-offset-1">



	<?php if ( get_post_meta( $post->ID, 'hw_services_overall_rating', true ) )  { ?>


<div class="row">


	<div class="col-md-6 col-sm-6 col-xs-12">
		<p><strong>Our overall rating:</strong></p>
			</div><!-- end of col -->



	<div class="col-md-6 col-sm-6 col-xs-12">
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

<div class="row">

	<div class="col-md-6 col-sm-6 col-xs-12">
		<p><strong>Public rating:</strong>
		</div><!-- end of col -->

	<div class="col-md-6 col-sm-6 col-xs-12">
            <?php get_template_part('elements/comments-rating-average'); ?></p>
		</div><!-- end of col -->

	</div><!-- end of row -->
<?php }
else { ?>
	<p><a href="<?php echo get_the_permalink(); ?>#respond">Leave your own rating &raquo;</a></p>

	<?php } ?>




    </div><!-- end of col 2 -->

        </div><!-- end of row -->






		<?php if ( get_post_meta( $id, 'hw_services_date_visited', true ) )  { ?>

            <hr /><h2>Healthwatch Bucks has visited, rated and reviewed <?php the_title(); ?></h2>

			<p><i class="fas fa-calendar" aria-hidden="true"></i> Visited <strong><?php echo get_post_meta( $id, 'hw_services_date_visited', true ); ?></strong><br />
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
