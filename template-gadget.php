<?php /* Template Name: Gadget */ ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">

<!-- Load Font Awesome -->
<script src="https://kit.fontawesome.com/c1c5370dea.js" crossorigin="anonymous"></script>

<!-- Load Bitter font from Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href='https://fonts.googleapis.com/css2?Bitter:wght@400,700&family=Poppins:wght@300;600&display=swap' rel='stylesheet'>

<!-- get out site CSS -->
<link href='https://www.staging10.healthwatchbucks.co.uk/wp-content/themes/scaffold/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://www.staging10.healthwatchbucks.co.uk/wp-content/themes/scaffold/css/structure.css' rel='stylesheet'>
<link href='https://www.staging10.healthwatchbucks.co.uk/wp-content/themes/scaffold/css/colours.css' rel='stylesheet'>
<link href='https://www.staging10.healthwatchbucks.co.uk/wp-content/themes/scaffold/css/typography.css' rel='stylesheet'>
<link href='https://www.staging10.healthwatchbucks.co.uk/wp-content/themes/scaffold-child/style.min.css' rel='stylesheet'>
<link href='https://www.staging10.healthwatchbucks.co.uk/wp-content/plugins/hw-feedback/css/prefix-style.min.css' rel='stylesheet'>

		<style>

    body.healthwatch-gadget {
	font-family: 'Poppins','Open Sans', sans-serif;
	color: #111;
}

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
			font-family: open sans, sans-serif;
			}

		a.hw-title {
      font-family: 'Poppins','Open Sans', sans-serif;
			font-size: 1.9rem;
			font-weight: 700;
	        }

		a .fas {
			padding-left: .3rem;
			}

        </style>

    </head>


<body class="healthwatch-gadget">





<?php // Query
$hwid = $_GET["hwid"]; ?>

	<?php $args = array (
	'posts_per_page' => 1,
	'post_type' => 'local_services',
	'orderby' => 'comment_count',
	'p' => $hwid,
	);

	query_posts($args);
	?>






<div id="hw-feedback">








	<?php // Begin loop if there is a Post

	if ( have_posts() && $hwid ) : while ( have_posts() ) : the_post(); ?>

        <h2><a target="_blank" href="<?php echo the_permalink(); ?>" class="hw-title"><?php the_title(); ?></a></h2>



			<?php $our_rating = get_post_meta( $post->ID, 'hw_services_overall_rating', true );

				if ($our_rating <>"") {

				echo "<p>";

				// the_excerpt();


				echo hw_feedback_star_rating($our_rating,array('colour' => 'green','size' => 'fa-lg'));
        if ($our_rating == 1) echo '</p><span class="screen-reader-text">'.$our_rating.' star</span>';
        else echo '<span class="screen-reader-text">'.$our_rating.' stars</span>'; ?>
        <p>Rated <strong><?php echo $our_rating; ?></strong> out of 5 by <strong>Healthwatch Bucks</strong></p>
        <?php				}

        $gadget = "yes";
			include('elements/comments-rating-average.php'); ?>


    <p class="hw-p"><a target="_blank" class="btn btn-primary" href="<?php echo the_permalink(); ?>">Write a review</a></p>

    <?php endwhile; ?>









        <?php else: // Show if there is not a Post
		?>
    <p><a target="_blank" class="hw-title" href="<?php echo esc_url(site_url()); ?>/rate-a-service/"><?php echo bloginfo('name'); ?></a></p>

    <p class="hw-p">Rate and review your local health services</p>

    <p class="hw-p"><a target="_blank" class="hw-button" href="<?php echo esc_url(site_url()); ?>/rate-a-service/">Write a review <i class="fas fa-caret-right"></i></a></p>

        <?php endif; ?>

        <div id="logo" class="healthwatch-gadget-logo">
            <p class="hw-p"><img width="150" src='<?php echo esc_url( get_theme_mod( 'scaffold_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></p>
                    </div>

		</div><!-- end of HW feedback -->

</body>


    </html>
