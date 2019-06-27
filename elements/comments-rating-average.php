<div class="star-rating">

<?php // Set TOTAL and COUNT to zero
$rating_total = 0;
$rating_count = 0; ?>

<?php // QUERY the COMMENTS for current single post
$args = array (
	'post_id' => $post->ID,
	'status' => 'approve'
	);

$comments = get_comments($args);

// LOOP comments
	foreach($comments as $comment) {

		// Get comment META for RATING field
		$rating = get_comment_meta( $comment->comment_ID, 'feedback_rating', true );

		// Add to TOTAL
		$rating_total = $rating_total + $rating;

		// Increase COUNT by 1
		$rating_count = $rating_count + 1;

		} // End of comments LOOP ?>

<?php if ($rating_count == 0) {

	if ($gadget <> "yes") {

	if  ( is_tax() || is_page_template() ) { ?>
   <p><a href="<?php echo the_permalink(); ?>"><i class="fa fa-comment"></i> Give feedback</a></p>
		<?php } ?>


<?php	} } else {

?>



<?php $average_rating = ( $rating_average = $rating_total / $rating_count);
	$average_rating = round($average_rating,1);
	?>



<?php if ( $gadget == "yes" && $rating_average < 3 ) { } else { $star_count = 0; ?>

<p>
	<?php
	if ($rating_average < 1) {
		echo '<i class="fa fa-star fa-lg"></i>';
	} else {
		for ($int_count = 1; $int_count <= floor($rating_average); $int_count++) {
			echo '<i class="fa fa-star fa-lg"></i>
			';
			$star_count++;
		}
		if (($individual_rating - floor($rating_average)) >= 0.25 && ($individual_rating - floor($rating_average)) < 0.75) {
			echo '<i class="fa fa-star-half-empty fa-lg"></i>
			';
			$star_count++;
		}
		while ($star_count < 5) {
			echo '<i class="fa fa-star-o fa-lg"></i>
			';
			$star_count++;
		}
	}
	?>
</p>
<p>Rated <strong><?php echo $average_rating; ?></strong>/5 by <strong><?php echo $rating_count; ?>
<?php if ($rating_count <= 1) { echo " person"; } else { echo " people"; } ?>
</strong></p>


<?php } ?>



<?php } // end IF ?>

<p><a href="<?php echo get_the_permalink(); ?>#respond">Leave your own rating &raquo;</a></p>

</div>
