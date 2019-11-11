<?php wp_list_comments(); ?>

<?php // The list of COMMENTS

$args = array(
	'post_id' => $post->ID,
	);

$comments = get_comments($args); ?>
<?php if ( is_singular('local_services') ) {
	if ($comments) { ?>
		<hr /><h2>Service users have provided the following ratings and reviews</h2>
		<p><small>If <?php the_title(); ?> would like to respond to any of the comments, email <a href="mailto:info@healthwatchbucks.co.uk">info@healthwatchbucks.co.uk</a></small></p>
<?php }
	}
?>

<?php foreach($comments as $comment) {
	// Check whether approved
	$comment_id = '';
	$status = wp_get_comment_status( $comment_id );
	if ( $status == "approved" ) { ?>
		<div class="comment">
			<?php $individual_rating = get_comment_meta( $comment->comment_ID, 'feedback_rating', true );
			if ($individual_rating) {
				$star_count = 0; ?>
				<p class="star-rating p-rating">
					<?php
				for ($int_count = 1; $int_count <= floor($individual_rating); $int_count++) {
					echo '<i class="fa fa-star fa-lg"></i>
					';
					$star_count++;
				}
				while ($star_count < 5) {
					echo '<i class="fa fa-star-o fa-lg"></i>
					';
					$star_count++;
				}
			?>

     &mdash;
       <strong><?php printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></strong></p>

	<?php } // end of if there is a rating ?>

		<blockquote class="e-description"><?php comment_text(); ?></blockquote>





<?php if ( is_singular('local_services') ) { ?>


<?php if (get_comment_meta( $comment->comment_ID, 'feedback_response', true )) { ?>
	<div class="response">
    <img class="alignright" src="<?php bloginfo(url) ?>/wp-content/themes/scaffold/images/icons/colour/response-small.png" alt="Response" />
	<p><strong><?php the_title(); ?></strong> responded:</p>
	<blockquote><em><?php echo get_comment_meta( $comment->comment_ID, 'feedback_response', true ); ?></em></blockquote>
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


<?php } ?>


<?php if(function_exists('wp_paginate_comments')) {
    wp_paginate_comments();
}
else { ?>

	<div class="nav-previous alignleft"><?php next_comments_link( '&laquo; Older comments' ); ?></div>
	<div class="nav-next alignright"><?php previous_comments_link( 'Newer comments &raquo;' ); ?></div>

<?php } ?>
