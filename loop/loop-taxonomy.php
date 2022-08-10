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
			echo '<div class="row post service-type' . $service_types_classes. '">';
			endif;
		}
		?>
		<!-- Start content for service -->
		<div class="col-md-2 col-sm-3 col-xs-4">


<?php														// Display icon for taxonomy term

if (is_tax('service_types')) 	{ 												// If this is a taxonomy page
	$term_id = get_queried_object_id();							// Get taxonomy ID
	}

		else 	{ 												// Or if this is a widget
	$term_ids = get_the_terms( $get_the_ID , 'service_types' );		// Find taxonomies
	$term_id = $term_ids[0]->term_id;								// Get taxonomy ID
	}

    $term_icon = get_term_meta( $term_id, 'icon', true );	// Use it to get icon field
		?>

	<a href="<?php the_permalink(); ?>">
    <img width="75" height="75" src="<?php echo $term_icon; ?>" alt="<?php the_title(); ?>" />
    </a>

            </div><!-- end of 1st col -->


        <div class="col-md-10 col-sm-9 col-xs-8">

            <?php if (is_tax('service_types')) {
							// if tax is a service get the city and add it to the title
							$city = get_post_meta( $post->ID, 'hw_services_city', true );
							$title_link_string = ($city) ? get_the_title() . ' ('.$city.')' : get_the_title();
							echo '<h3><a class="title-link" href="' . get_the_permalink() . '" rel="bookmark">' . $title_link_string . '</a><h3>';
						} else { ?>
							<h3><a href="<?php echo the_permalink(''); ?>"><?php the_title(); ?></a></h3>
						<?php }

  if ( has_excerpt( $post->ID ) ) {
	the_excerpt();
		} else { } ?>


            </div><!-- end of 2nd col -->


        <div class="col-md-4 col-sm-4">




		<?php get_template_part('elements/comments-rating-average'); ?>

                </div><!-- end of 3rd col -->




                    </div><!-- end of row / service -->


        <?php endwhile; ?>


           <?php if(!is_home()) { ?>
                <?php get_template_part('elements/pagination'); ?>
       				<?php } ?>

     <?php wp_reset_query(); ?>

<div class="jumbotron">
		<p class="text-center">
        	<i class="fas fa-4x fa-search"></i>
			</p>

				<h2 class="text-center">Didn't find the local health service you were looking for?</h2>
                <p class="text-center">You can still <a href="<?php bloginfo('url'); ?>/feedback/">send us feedback.</a></p>
                </div><!-- end of Jumbotron -->

                <?php else: ?>

            <h2 class="text-center">Sorry, no local health services were found matching <strong><?php echo $s; ?></strong>.</h2>

<div class="jumbotron">
		<p class="text-center">
        	<i class="fas fa-4x fa-search"></i>
			</p>

				<p class="text-center"
                >Didn't find the local health service you were looking for? You can still <a href="<?php bloginfo('url'); ?>/feedback/">send us feedback.</a></p>
		</div><!-- end of Jumbotron -->


        <?php endif; ?>

</div><!-- end of Loop Taxonomy -->
