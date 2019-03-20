<?php get_header(); ?>

<div class="container">

                <div class="row">

	<div id="content" class="col-md-8 col-sm-4">


<h2>Signposts</h2>
<p>Introductory sentence. Introductory sentence. Introductory sentence. Introductory sentence. Introductory sentence. Introductory sentence. Introductory sentence. Introductory sentence. Introductory sentence.</p>                



<?php echo do_shortcode("[wd_asp id=3]"); ?>
                

				<?php // get_template_part('loop/loop-archive-signpost'); ?>
                
                
    		              </div><!-- end of content column -->





    <div id="sidebar" class="col-md-4 col-xs-12">


<?php // your taxonomy name
$tax = 'signpost_categories';

// get the terms of taxonomy
$terms = get_terms( $tax, $args = array( 
'hide_empty' => false, // do not hide empty terms
));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){                

		echo "<ul>";

        // loop through all terms
        foreach( $terms as $term ) {

            // Get the term link
            $term_link = get_term_link( $term );

            if( $term->count > 0 )
                // display link to term archive
                echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name .'</a></li>';

            elseif( $term->count !== 0 )
                // display name
                echo '' . $term->name .'';
        }

		echo "</ul>";


    } ?>
    












	</div>
    <!-- end of sidebar -->


	                </div>
                <!-- end of row -->


                            

<?php get_footer(); ?>