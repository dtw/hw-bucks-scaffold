<?php wp_list_comments(); ?>

<?php // The list of COMMENTS

$args = array(
	'post_id' => $post->ID,
	);

$comments = get_comments($args);
$total_comments = count($comments); ?>
<?php if ( is_singular('local_services') ) {
	if ($comments) { ?>
		<hr /><h2>Public ratings and reviews</h2>
		<p><small>If <?php the_title(); ?> would like to respond to any of the comments, email <a href="mailto:info@healthwatchbucks.co.uk">info@healthwatchbucks.co.uk</a></small></p>
<?php }
	}
?>

<?php $comment_counter = 1;
	foreach($comments as $comment) {
	// Check whether approved
	$comment_id = '';
	$status = wp_get_comment_status( $comment_id );
	if ( $status == "approved" ) {
		// Add a collapse if more than 5 comments
		if ( $comment_counter == 6 ) { ?>
			<div class="collapse-button-container">
				<a class="btn btn-primary bt-light-blue" data-toggle="collapse" href="#collapseComments" role="button" aria-expanded="false" aria-controls="collapseExample">
					Show <?php echo $total_comments - $comment_counter ?> more reviews
				</a>
		</div>
		<div class="collapse" id="collapseComments"><!-- start of collapse --> <?php } ?>
		<div class="review">
			<?php echo '<span class="screen-reader-text">Review '.$comment_counter.' of '.$total_comments.'</span>';
			$individual_rating = get_comment_meta( $comment->comment_ID, 'feedback_rating', true );
			if ($individual_rating) {
				// if there is a rating
				$star_count = 0; ?>
				<p class="star-rating p-rating">
					<?php
						echo hw_feedback_star_rating($individual_rating,array('size' => 'fa-lg'));
						if ($individual_rating == 1) echo '<span class="screen-reader-text">'.$individual_rating.' star</span>';
						else echo '<span class="screen-reader-text">'.$individual_rating.' stars</span>';
					?>
				&mdash; <a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo get_comment_time('Y-m-d H:i'); ?>" class="date-tooltip"><?php printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></a></p>
			<?php } else { // there is no rating ?>
				<p class="star-rating p-rating"><strong>No rating &mdash; <?php printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></strong></p>
			<?php } ?>

			<blockquote><?php comment_text(); ?></blockquote>





<?php if ( is_singular('local_services') ) { ?>


<?php if (get_comment_meta( $comment->comment_ID, 'feedback_response', true )) { ?>
	<div class="response provider">
	<p><strong><?php the_title(); ?></strong> responded:</p>
	<blockquote><em><?php echo get_comment_meta( $comment->comment_ID, 'feedback_response', true ); ?></em></blockquote>
    </div>

		<?php } ?>

<?php if (get_comment_meta( $comment->comment_ID, 'feedback_hw_reply', true )) { ?>
	<div class="response hw-reply">
	<p><strong>Healthwatch Bucks</strong> responded:</p>
	<p class="hw-reply-quote"><?php echo get_comment_meta( $comment->comment_ID, 'feedback_hw_reply', true ); ?></p>
    </div>

		<?php } ?>



<?php } else {
		echo "<p><cite>";
			echo($comment->comment_author);

		echo "</cite> &mdash; ";
 	printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );

		echo "</p><br /><br />";
	} ?>



</div><!-- end of comment -->

<?php } // end check for whether approved ?>

    <?php // echo ($comment->comment_content); ?>


<?php
if ( $comment_counter === $total_comments && $total_comments > 5 ) {
	echo '</div><!-- end of collapse --> ';
}
$comment_counter = ++$comment_counter;
} //loop ends here
unset($comment);
?>


<?php if(function_exists('wp_paginate_comments')) {
    wp_paginate_comments();
}
else { ?>

	<div class="nav-previous alignleft"><?php next_comments_link( '&laquo; Older comments' ); ?></div>
	<div class="nav-next alignright"><?php previous_comments_link( 'Newer comments &raquo;' ); ?></div>

<?php } ?>
