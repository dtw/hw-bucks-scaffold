<?php get_header(); ?>

<div class="container">



                <div class="row">

	<div id="content" class="col-md-12 col-sm-12">






<?php echo do_shortcode("[wd_asp id=3]"); ?>







<?php // your taxonomy name
$tax = 'signpost_categories';

// get the terms of taxonomy
$terms = get_terms( $tax, $args = array(
'hide_empty' => false, // do not hide empty terms
));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

		echo "<div id='signpost-categories'><ul>";

        // loop through all terms
        foreach( $terms as $term ) {

    $term_icon = get_term_meta( $term->term_id, 'icon', true );

            // Get the term link
            $term_link = get_term_link( $term );

            if( $term->count > 0 )
                // display link to term archive
                echo '<li>'.wp_get_attachment_image( $term_icon, array(50,50), true, array( 'aria-hidden' => 'true', 'alt' => $term->name ) ).'<a href="' . esc_url( $term_link ) . '">' . $term->name .'</a></li>';

            elseif( $term->count !== 0 )
                // display name
                echo '' . $term->name .'';
        }

		echo "</ul></div>";


    } ?>




				<?php get_template_part('loop/loop-archive-signpost'); ?>


    		              </div><!-- end of content column -->



    <!-- end of sidebar -->


	                </div>
                <!-- end of row -->




<?php get_footer(); ?>
