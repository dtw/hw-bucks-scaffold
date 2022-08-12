<!-- loop / loop-taxonomy starts here -->
<div class="loop-taxonomy">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		if (is_tax('service_types')) {
			$service_types_terms = get_the_terms( $post->ID, 'service_types' );
			if ( $service_types_terms && ! is_wp_error( $service_types_terms ) ) : $service_types_classes = array();
			foreach ( $service_types_terms as $service_types_term ) {
				$service_types_classes[] = $service_types_term->slug;
			}
			$service_types_classes = join( " ", $service_types_classes );
			echo '<!-- start of row / service --><div class="row post service-type ' . $service_types_classes. '">';
			endif;
		} else {
			echo '<!-- start of row / service --><div class="row post">';
		}
		?>
		<!-- Start content for service -->
		<div class="col-md-2 col-sm-3 hidden-xs">
			<?php														// Display icon for taxonomy term

			if (is_tax('service_types')) 	{ 												// If this is a taxonomy page
				$term_id = get_queried_object_id();							// Get taxonomy ID
			} else 	{ 												// Or if this is a widget
				$term_ids = get_the_terms( $get_the_ID , 'service_types' );		// Find taxonomies
				$term_id = $term_ids[0]->term_id;								// Get taxonomy ID
			}
			$term_icon = get_term_meta( $term_id, 'icon', true );	// Use it to get icon field
			?>
			<img width="100%" src="<?php echo $term_icon; ?>" alt="<?php the_title(); ?>" />
		</div><!-- end of 1st col -->
  	<div class="col-md-10 col-sm-9">
	    <?php if (is_tax('service_types')) {
				// if tax is a service get the city and add it to the title
				$city = get_post_meta( $post->ID, 'hw_services_city', true );
				$title_link_string = ($city) ? get_the_title() . ' ('.$city.')' : get_the_title();
				echo '<h2><a class="title-link" href="' . get_the_permalink() . '" rel="bookmark">' . $title_link_string . '</a></h2>';
			} else { ?>
				<h2><a href="<?php echo the_permalink(''); ?>"><?php the_title(); ?></a></h2>
			<?php }
			if ( has_excerpt( $post->ID ) ) {
				$rating = get_post_meta( $post->ID, 'hw_services_overall_rating', true );
				if ($rating) {
					$visit_date = get_post_meta( $post->ID, 'hw_services_date_visited', true );
					echo "<div class='our-review-block'><p>Our review from <strong>" . $visit_date . "</strong>:</p>";
					echo "<p class='review-excerpt'><i class='fas fa-quote-left'></i>" . get_the_excerpt() . "<i class='fas fa-quote-right'></i></p><p class='review-rating'>";
					echo hw_feedback_star_rating($rating,array('colour' => 'green','size' => 'fa-lg'));
					if ($rating == 1) echo '<span class="screen-reader-text">'.$rating.' star</span>';
					else echo '<span class="screen-reader-text">'.$rating.' stars</span></p></div><div class="user-review-block">';
					get_template_part('elements/comments-rating-average');
					echo '</div>';
				} else {
					the_excerpt();
					get_template_part('elements/comments-rating-average');
				}
			} ?>
		</div><!-- end of 2nd col -->
	</div><!-- end of row / service -->
	<?php endwhile;
	get_template_part('elements/pagination');
	wp_reset_query(); ?>
<?php /* the query returned no posts */ else: ?>
	<h2 class="text-center">Sorry, no services listed under <strong><?php single_cat_title(); ?></strong>.</h2>
<?php endif; ?>
<div class="jumbotron col-sm-12">
	<p class="text-center">
		<i class="fas fa-2x fa-search"></i>
	</p>
	<p class="text-center">Didn't find the local health service you were looking for? You can still <a href="<?php bloginfo('url'); ?>/your-feedback/">send us feedback</a>.</p>
</div><!-- end of Jumbotron -->
</div><!-- end of Loop Taxonomy -->
