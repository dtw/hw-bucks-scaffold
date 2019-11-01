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
    <?php if ($individual_rating < 1.25 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <?php } ?>

    <?php if ($individual_rating >= 1.25 && $individual_rating < 1.75 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star-half-empty fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <?php } ?>

    <?php if ($individual_rating >= 1.75 && $individual_rating < 2.25 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <?php } ?>

    <?php if ($individual_rating >= 2.25 && $individual_rating < 2.75 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star-half-empty fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <?php } ?>

    <?php if ($individual_rating >= 2.75 && $individual_rating < 3.25 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <?php } ?>

    <?php if ($individual_rating >= 3.25 && $individual_rating < 3.75 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star-half-empty fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <?php } ?>

    <?php if ($individual_rating >= 3.75 && $individual_rating < 4.25 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="far fa-star fa-lg"></i>
        <?php } ?>

    <?php if ($individual_rating >= 4.25 && $individual_rating < 4.75 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star-half-empty fa-lg"></i>
        <?php } ?>

    <?php if ($individual_rating >= 4.75 ) { ?>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <i class="fas fa-star fa-lg"></i>
        <?php } ?>
     <br />&mdash;
       <strong><?php printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></strong></p>



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
