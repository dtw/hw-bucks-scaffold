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
		<p><small>If <?php the_title(); ?> would like to respond to any of the comments, email <a href="mailto:<?php echo get_theme_mod( 'scaffold_org_email') ?>"><?php echo get_theme_mod( 'scaffold_org_email') ?></a></small></p>
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
			<div class="collapse-comments-header collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseComments">
				<h4 class="header-title"><i class="fas fa-caret-right" aria-hidden="true"></i>Show <?php echo ($total_comments - $comment_counter) + 1 ?> more reviews</h4>
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
				<span class="mdash">&mdash;</span> <a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo get_comment_time('Y-m-d H:i'); ?>" class="date-tooltip"><?php printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_datetime()->getTimestamp() ) ); ?></a></p>
			<?php } else { // there is no rating ?>
				<p class="star-rating p-rating"><span class="no-rating">No rating</span> <span class="mdash">&mdash;</span> <a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo get_comment_time('Y-m-d H:i'); ?>" class="date-tooltip"><?php printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_datetime()->getTimestamp() ) ); ?></a></p>
			<?php } ?>

			<blockquote><?php comment_text(); ?></blockquote>





<?php if ( is_singular('local_services') ) { ?>


<?php if (get_comment_meta( $comment->comment_ID, 'feedback_response', true )) {
  $raw_feedback_response = get_comment_meta($comment->comment_ID, 'feedback_response', true);
  // replace consequtive newlines with one <br>
  $formatted_feedback_response = str_replace(array("\r\n\r\n", "\r\r", "\n\n"), "<br>", $raw_feedback_response);
?>
	<div class="response provider">
	<p><strong><?php the_title(); ?></strong> responded:</p>
	<blockquote><p><?php echo $formatted_feedback_response ?></p></blockquote>
    </div>

		<?php } ?>

<?php if (get_comment_meta( $comment->comment_ID, 'feedback_hw_reply', true )) {
  $raw_feedback_hw_reply = get_comment_meta($comment->comment_ID, 'feedback_hw_reply', true);
  // replace consequtive newlines with one <br>
  $formatted_feedback_hw_reply = str_replace(array("\r\n\r\n", "\r\r", "\n\n"), "<br>", $raw_feedback_hw_reply);
  ?>
	<div class="response hw-reply">
	<p><strong>Healthwatch Bucks</strong> responded:</p>
	<p class="hw-reply-quote"><?php echo $formatted_feedback_hw_reply; ?></p>
    </div>

		<?php } ?>



<?php } else {
		echo "<p><cite>";
			echo($comment->comment_author);

		echo "</cite> <span class='mdash'>&mdash;</span> ";
 	printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_datetime()->getTimestamp() ) );

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
