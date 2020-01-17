<div class="star-rating">

<?php

// returns an array containing the
$rating = getrating($post);

if ($rating['count'] == 0) {

	if ($gadget <> "yes") {

	if  ( is_tax() || is_page_template() ) { ?>
   <p><a href="<?php echo the_permalink(); ?>"><i class="fas fa-comments" aria-hidden="true"></i> Give feedback</a></p>
		<?php } ?>


<?php	} } else {

?>



<?php $average_rating = $rating['average'];
	$average_rating = round($average_rating,1);
	?>



<?php if ( $gadget == "yes" && $rating['average'] < 3 ) { } else { $star_count = 0; ?>

<p>
	<?php
		echo feedbackstarrating($average_rating,array('size' => 'fa-lg'));
	?>
</p>
<p>Rated <strong><?php echo $average_rating; ?></strong> out of 5 by <strong><?php echo $rating['count']; ?>
<?php if ($rating['count'] <= 1) { echo " person"; } else { echo " people"; } ?>
</strong></p>


<?php } ?>



<?php } // end IF ?>

<p><a href="<?php echo get_the_permalink(); ?>#respond">Leave your own rating &raquo;</a></p>

</div>
