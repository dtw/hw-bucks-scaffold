<?php wp_list_comments(); ?>

<?php // The list of COMMENTS

$args = array(
	'post_id' => $post->ID,
	);

$comments = get_comments($args); ?>

<?php if ( is_singular('local_services') ) { ?>
<?php if ($comments) { ?>
<hr /><h2>Service users have provided the following ratings and reviews</h2>
<p><small>If <?php the_title(); ?> would like to respond to any of the comments, email <a href="mailto:info@healthwatchbucks.co.uk">info@healthwatchbucks.co.uk</a></small></p>

<?php } } ?>

<?php foreach($comments as $comment) { ?>

<?php // Check whether approved
$comment_id = '';
$status = wp_get_comment_status( $comment_id );
if ( $status == "approved" ) { ?>



    <div class="comment">
    
    
	<?php $individual_rating = get_comment_meta( $comment->comment_ID, 'feedback_rating', true ); ?>

<?php if ($individual_rating) { ?>

    
    
    <p class="star-rating p-rating">
    <?php if ($individual_rating < 1.25 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 1.25 && $individual_rating < 1.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-half-empty fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 1.75 && $individual_rating < 2.25 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 2.25 && $individual_rating < 2.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-half-empty fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
        
    <?php if ($individual_rating >= 2.75 && $individual_rating < 3.25 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 3.25 && $individual_rating < 3.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-half-empty fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 3.75 && $individual_rating < 4.25 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 4.25 && $individual_rating < 4.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-half-empty fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 4.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <?php } ?> 
     &mdash; 
       <strong><?php printf( '%s ago' , human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></strong></p>

	<?php } // end of if there is a rating ?>

		<blockquote class="e-description"><?php comment_text(); ?>
</blockquote>





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