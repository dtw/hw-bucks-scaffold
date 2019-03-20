<?php get_header(); ?>


		<?php // include('elements/page-title.php'); ?>


		
        	</div><!-- end of container-fluid -->

<div class="container">

	<div class="row">

		<div id="content" class="col-md-12 col-xs-12">



<?php while ( have_posts() ) : the_post(); ?>
  
                            <?php
                                $metadata = wp_get_attachment_metadata();
                                printf( __( '<a href="%3$s" title="Link to document">Download '. get_the_title() .'</a><br /><br /><p>Published <strong>%2$s</strong>', 'shape' ),
                                    esc_attr( get_the_date( 'c' ) ),
                                    esc_html( get_the_date() ),
                                    wp_get_attachment_url(),
                                    '',
                                    '',
                                    get_permalink( $post->post_parent ),
                                    get_the_title( $post->post_parent )
                                );
                            ?>
 
 
 
                                <?php
                                    /**
                                     * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
                                     * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
                                     */
                                    $attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
                                    foreach ( $attachments as $k => $attachment ) {
                                        if ( $attachment->ID == $post->ID )
                                            break;
                                    }
                                    $k++;
                                    // If there is more than 1 attachment in a gallery
                                    if ( count( $attachments ) > 1 ) {
                                        if ( isset( $attachments[ $k ] ) )
                                            // get the URL of the next image attachment
                                            $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                                        else
                                            // or get the URL of the first image attachment
                                            $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
                                    } else {
                                        // or, if there's only 1 image, get the URL of the image
                                        $next_attachment_url = wp_get_attachment_url();
                                    }
                                ?>
 
                                <a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
                                    $attachment_size = apply_filters( 'shape_attachment_size', array( 1200, 1200 ) ); // Filterable image size.
                                    echo wp_get_attachment_image( $post->ID, $attachment_size );
                                ?></a>
 
                            <?php if ( ! empty( $post->post_excerpt ) ) : ?>
                                <?php the_excerpt(); ?>
                            <?php endif; ?>
 
                        <?php the_content(); ?>
 
 
                  
                <!-- #post-<?php the_ID(); ?> --><?php endwhile; // end of the loop. ?>

                

                
                </div><!-- end of loop row -->

					</div><!-- end of content column -->


    

<?php get_footer(); ?>