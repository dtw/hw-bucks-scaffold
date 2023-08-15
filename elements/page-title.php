<?php
if ( is_home() || is_page("new-home") )
	{ }
else { ?>
	<div class="container-fluid">
		<div class="row page-header">
			<div class="container">
				<div class="row">
					<!-- HEADING -->
					<h1>
						<?php if (is_home()) { ?>
							Tell us about health and social care services in Buckinghamshire
						<?php } else if (is_tax('service_types')) { ?>
							<?php single_term_title(); ?> (<?php get_template_part('elements/count-results'); ?> services)
						<?php } else if (is_tax('cqc_reg_status')) { ?>
							<?php single_term_title(); ?> (<?php get_template_part('elements/count-results'); ?> services)
						<?php } else if (is_tax('cqc_inspection_category')) { ?>
							<?php single_term_title(); ?> (<?php get_template_part('elements/count-results'); ?> services)
						<?php } else if (is_tag()) { ?>
							Posts about topic: <?php single_cat_title(); ?>
						<?php } else if (is_singular('signposts')) { ?>
							<span class="single-signpost-title">Your search found: </span><?php the_title(); ?>
						<?php } else if (is_category() || is_archive()) { ?>
							<?php single_cat_title(); ?>
						<?php } else if (is_404()) { ?>
							Sorry, page not found
						<?php } else if (is_search()) { ?>
							You searched for <strong><?php echo $s; ?></strong>
						<?php } else { ?>
							<?php the_title(); ?>
						<?php } ?>
					</h1>
					<!-- DESCRIPTION -->
					<?php if (is_home()) { ?>
						<p>Healthwatch Bucks is an independent organisation that gives you a voice. We talk to the people that run your health and social care services, including hospitals, dentists, GPs and care homes. We use your feedback and our independent reports to help shape health and social care services in Bucks.</p>
					<?php } else if (is_tax('service_types')) { ?>
						<?php echo term_description(); ?>
					<?php } else if (is_tax('cqc_reg_status')) { ?>
						<?php echo term_description(); ?>
					<?php } else if (is_tax('cqc_inspection_category')) { ?>
						<?php echo term_description(); ?>
					<?php } else if (is_singular('signposts')) { ?>
						<p><a class="single-signpost-url" href="https://www.healthwatchbucks.co.uk/signposting/">Search our signposts again &raquo;</a></p>
					<?php } else if (is_404()) { ?>

					<?php } else if (is_category() || is_archive()) { ?>
						<?php echo category_description(); ?>
					<?php } else if (is_singular('local_services')) { ?>
						<?php the_excerpt(); ?>
					<?php } else { ?>
						<?php the_excerpt(); ?>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
