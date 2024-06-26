<div class="star-rating">

<?php
// returns an array containing the
$rating = hw_feedback_get_rating($post->ID);

if ($rating['count'] == 0) {
	if ( !isset($gadget) ) {
		if  ( is_tax() || is_page_template() ) {
			if ( comments_open($post->ID) ) { ?>
				<p><i class="fas fa-comments fa-lg" aria-hidden="true"></i> <a href="<?php echo the_permalink(); ?>#response-header">Write the first review!</a></p>
		<?php }
		}
	}
} else {
	$average_rating = $rating['average'];
	$average_rating = round($average_rating,1);
	if ( isset($gadget) && $gadget && $rating['average'] < 3 ) {
		return;
	} else { ?>
		<p class="archive-star-rating">
			<?php echo hw_feedback_star_rating($average_rating,array('size' => 'fa-lg'));	?>
		</p>
		<p>Rated <strong><?php echo $average_rating; ?></strong> out of 5 by <strong>
			<?php echo $rating['count']; if ($rating['count'] <= 1) { echo " person"; } else { echo " people"; } ?>
		</strong></p>
		<?php if ( comments_open($post->ID) ) { ?>
			<p><i class="fas fa-comments fa-lg" aria-hidden="true"></i> <a href="<?php echo the_permalink(); ?>#response-header">Add a review</a></p>
		<?php } ?>
	<?php }
} // end count IF ?>
</div>
