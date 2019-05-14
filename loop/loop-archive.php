<!-- loop / loop-archive starts here -->
<div class="loop-archive">

<?php if (is_category("real-stories")) { echo "<p class=\"lead\">Do you have a story to tell?</p>
<p>Not got a story, what about leaving some feedback instead? Just find the service you wish to rate and have your say.</p><div class='col-md-8 col-md-offset-2 col-sm-12'><div class='widget widget_search'>" . get_search_form(false) . "</div></div>
<div class='col-lg-12'><h2>Your stories</h2></div>"; }
else if (is_category("it-starts-with-you")) { echo "<div class='col-lg-12 hidden-sm text-center'><img class=\"size-large wp-image-50005\" src=\"https://www.healthwatchbucks.co.uk/wp-content/uploads/2018/07/itstartswithyou_banner_pink-1024x341.jpg\" alt=\"It Starts With You Banner\" width=\"780\" height=\"260\" /></div>
<div class='col-lg-12'><p class=\"lead\">Thanks to George, birthing partners are now better supported by maternity services in Bucks when mum is giving birth.</p>
<p>When his wife was giving birth, George felt that all the support was targeted at this wife and as a birthing partner, he was not given enough information before, during and after the birth to properly support her. Following his feedback to Healthwatch Bucks on his experience of maternity services, Buckinghamshire Healthcare NHS Trust has reviewed its maternity services to ensure the role of the partner is now firmly in mind. The Trust has also introduced a new policy stating that the birthing partner should not remain for more than 20 minutes without an update when separated from the mother.</br>
</br>
To celebrate George and others who have helped make a difference to health and social care services by sharing their views, we’ve launched our <a href=\"https://twitter.com/search?q=%23ItStartsWithYou\">#ItStartsWithYou</a> campaign. The more that people share their ideas, experiences and concerns about the NHS and social care, the more services can understand when improvements are needed. But, to make the biggest difference, we need to hear from more people.</br>
</br>
You can make a difference too. Join in by searching for a services below and sharing your experience with us.</p></div><div class='col-md-8 col-md-offset-2 col-sm-12'><div class='widget widget_search'>" . get_search_form(false) . "</div></div>
<div class='col-lg-12'><h2>More stories</h2></div>"; } ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



<div class="row">



    <div class="col-md-3 col-sm-3 hidden-xs">


			<?php // check if the post has a Post Thumbnail assigned to it.
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('thumbnail');
            } ?>

		</div><!-- end of 1st col (featured image) -->





    <div class="col-md-9 col-sm-9">

        <h2><a href="<?php echo the_permalink(''); ?>"><?php the_title(); ?></a></h2>


       <?php if (is_tag()) {
         echo "<div class='category-terms'>";




	$taxonomy = 'category';
 
// Get the term IDs assigned to post.
$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
 
// Separator between links.
$separator = ' ';

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
	echo "</div>";
			?>






	        <p><?php echo get_the_excerpt(); ?></p>


			<?php get_template_part('elements/post-meta'); ?>        				


		<?php the_tags( '<div class="the-tags-archive">', ' ', '' );
      echo "</div>";
    ?>




		</div><!-- end of 2nd col (post) -->




			
            	</div><!-- end of row -->
            		</div><!-- end of Post -->


	<?php endwhile; ?>
	
			<?php get_template_part('elements/pagination'); ?>    
    
	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>
	
 </div><!-- end of Loop Archive -->