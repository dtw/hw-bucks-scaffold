<!-- loop / loop-archive starts here -->
<div class="loop-archive">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<article>





    <div style="display: flex; justify-content:space-between; align-items:flex-end;">
        <h2><?php the_title(); ?>


       <?php if (is_tag()) {
         echo "<small>&laquo; ";




	$taxonomy = 'category';

// Get the term IDs assigned to post.
$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );

// Separator between links.
$separator = ', ';

if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {

    $term_ids = implode( ',' , $post_terms );

    $terms = wp_list_categories( array(
        'title_li' => '',
		'depth' => 1,
        'style'    => 'none',
        'echo'     => false,
        'taxonomy' => $taxonomy,
        'include'  => $term_ids
    ) );

    $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

    // Display post categories.
    echo  $terms;

}





			}
	echo "</small>";
			?>




        </h2>
        <p style="margin-bottom: 20px;"><?php edit_post_link(); ?></p>
        </div>
	        <?php the_content(); ?>


			<?php // get_template_part('elements/post-meta'); ?>


		<?php the_tags( '<p><small>Topics: ', ', ', '</small></p>' ); ?>



<p style="color: #999; text-align:right;">Updated: <?php echo get_the_date(); ?></p>
		</div><!-- end of 1st col (post) -->















			</article>

	<?php endwhile; ?>

			<?php get_template_part('elements/pagination'); ?>

	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>

 </div><!-- end of Loop Archive -->
