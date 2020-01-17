<?php /* Template Name: Gadget */ ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">

<!-- Load Font Awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Load Bitter font from Google Web Fonts -->
<link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>

<!-- a minimum of inline CSS -->

		<style>

		div#hw-feedback {
			text-align: center;
			border-radius: 10px;
			padding: .4rem .8rem;
			margin: 1rem;
			background-color: #F7F7F7;
			box-sizing: border-box;
			}

		p.hw-p {
			margin: 1.5rem 0;
			font-family: serif;
			}

		a.hw-title {
            color: #e73e97; /* Core pink */
			font-family: Bitter, serif;
			font-size: 1.2rem;
			text-decoration: none;
			font-weight: 700;
	        }

        a.hw-button {
            background-color: #004f6b; /* Core blue */
			padding: .5rem .5rem;
			font-size: .9rem;
			color: #fff;
			text-decoration: none;
			text-shadow: #000 1px 1px 1px;
			border-radius: 5px;
        }

        a.hw-button:hover {
            background-color: #e73e97; /* Core pink */
			}


		.star-rating .fa {
			color: #e73e97; /* Core pink */
			}

		a .fa {
			padding-left: .3rem;
			}

		.fa-2x {
			font-size: 1.2rem !important;
			}

		.fa.green {
			color: green;
			}

        </style>

    </head>


<body class="healthwatch-gadget">





<?php // Query
$hwid = $_GET["hwid"]; ?>

	<?php $args = array (
	'posts_per_page' => 1,
	'post_type' => 'Local_services',
	'orderby' => 'comment_count',
	'p' => $hwid,
	);

	query_posts($args);
	?>






<div id="hw-feedback">








	<?php // Begin loop if there is a Post

	if ( have_posts() && $hwid ) : while ( have_posts() ) : the_post(); ?>

        <p class="hw-p"><a target="_blank" href="<?php echo the_permalink(); ?>" class="hw-title"><?php the_title(); ?></a></p>



			<?php $rating = get_post_meta( $post->ID, 'hw_services_overall_rating', true );

				if ($rating <>"") {

				echo "<p>Our rating:</p>";

				// the_excerpt();


				<?php echo feedbackstarrating($individual_rating,array('colour' => 'green','size' => 'fa-lg')); ?>

				} else {

					}
					?>


    <?php 	$gadget = "yes";
			include('elements/comments-rating-average.php'); ?>


    <p class="hw-p"><a target="_blank" class="hw-button" href="<?php echo the_permalink(); ?>">Leave feedback <i class="fas fa-caret-right"></i></a></p>

    <?php endwhile; ?>









        <?php else: // Show if there is not a Post
		?>
    <p><a target="_blank" class="hw-title" href="<?php echo esc_url(site_url()); ?>/rate-a-service/"><?php echo bloginfo('name'); ?></a></p>

    <p class="hw-p">Rate and review your local health services</p>

    <p class="hw-p"><a target="_blank" class="hw-button" href="<?php echo esc_url(site_url()); ?>/rate-a-service/">Leave your feedback <i class="fas fa-caret-right"></i></a></p>

        <?php endif; ?>

        <div id="logo" class="healthwatch-gadget-logo">
            <p class="hw-p"><a target="_blank" href="<?php echo esc_url(site_url()); ?>/rate-a-service/"><img width="150" src='<?php echo esc_url( get_theme_mod( 'scaffold_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></p>
                    </div>

		</div><!-- end of HW feedback -->

</body>


    </html>
