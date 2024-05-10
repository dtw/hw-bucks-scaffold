<!-- loop / loop-taxonomy starts here -->
<div class="loop-comments">




<?php
$args = array(
	'status' => 'approve',
	'post_type' => 'local_services',
	'number' => 6,
);

// The Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

// Comment Loop
if ( $comments ) {
	foreach ( $comments as $comment ) { ?>


<div class="row post">

<div class="col-md-3">

	<?php $individual_rating = get_comment_meta( $comment->comment_ID, 'feedback_rating', true ); ?>

<?php if ($individual_rating) { ?>

    <p class="star-rating p-rating">
			<?php echo hw_feedback_star_rating($rating,array('size' => 'fa-lg'));
				if ($rating == 1) echo '<span class="screen-reader-text">'.$rating.' star</span>';
				else echo '<span class="screen-reader-text">'.$rating.' stars</span>';
			?>
     <span class="mdash">&mdash;</span>
       <strong><?php printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_datetime() ) ); ?></strong></p>



	<?php } // end of if there is a rating ?>


</div><!-- end of col 1 -->


<div class="col-md-9">
	<p><strong><a href="<?php echo get_the_permalink($comment->comment_post_ID); ?>"><?php echo get_the_title($comment->comment_post_ID); ?></a></strong></p>
        <p><?php echo mb_strimwidth($comment->comment_content,0,400," ..."); ?></p>
			</div><!-- end of col 2 -->

		</div><!-- end of row -->


<?php	}
} else {
	echo 'No comments found.';
}
?>





</div><!-- end of Loop Taxonomy -->
