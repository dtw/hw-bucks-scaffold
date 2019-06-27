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



<?php if ( $gadget == "yes" && $rating_average < 3 ) { } else { ?> 

<p>
<?php if ($rating_average < 1.25 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <?php } ?> 

<?php if ($rating_average >= 1.25 && $rating_average < 1.75 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star-half-empty"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <?php } ?> 

<?php if ($rating_average >= 1.75 && $rating_average < 2.25 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <?php } ?> 

<?php if ($rating_average >= 2.25 && $rating_average < 2.75 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star-half-empty"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <?php } ?> 
    
<?php if ($rating_average >= 2.75 && $rating_average < 3.25 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <?php } ?> 

<?php if ($rating_average >= 3.25 && $rating_average < 3.75 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star-half-empty"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <?php } ?> 

<?php if ($rating_average >= 3.75 && $rating_average < 4.25 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star-o"></i>
    <?php } ?> 

<?php if ($rating_average >= 4.25 && $rating_average < 4.75 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star-half-empty"></i>
    <?php } ?> 

<?php if ($rating_average >= 4.75 ) { ?>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <i class="fa fa-lg fa-star"></i>
    <?php } ?>
</p>
<p>Rated <strong><?php echo $average_rating; ?></strong>/5 by <strong><?php echo $rating_count; ?>
<?php if ($rating_count <= 1) { echo "person"; } else { echo "people"; } ?>
</strong></p>


<?php } ?>



<?php } // end IF ?>

<p><a href="<?php echo get_the_permalink(); ?>#respond">Leave your own rating &raquo;</a></p>

</div>
