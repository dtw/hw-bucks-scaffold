			<?php // List LOCAL SERVICES with link to each
            $terms = get_terms( 'service_types' );
             if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                 echo '<ul id="local-services-selector" class="list-unstyled">';
                 foreach ( $terms as $term ) {
                   echo '<li><a class="services-icon ' . $term->slug . '" href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
                    
                 }
                 echo '</ul>';
             }?>    