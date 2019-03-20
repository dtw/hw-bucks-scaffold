<!-- loop / loop-archive-short starts here -->
<div class="loop-archive">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row">


    <div class="col-md-10 col-sm-12">

        <h3><a href="<?php echo the_permalink(''); ?>"><?php the_title(); ?></a></h3>





			<?php // get_template_part('elements/post-meta'); ?>        				

	<div class="date">

            <p><strong><?php the_time('j') ?></strong> <?php the_time('F') ?> <?php the_time('Y') ?></p>
                
                
                    </div><!-- end of date -->


            
	        <?php echo the_excerpt(); ?>


		</div><!-- end of 1st col -->


<?php if ( has_post_thumbnail() ) { ?>
    <div class="col-md-3 col-sm-5">

    
			<?php get_template_part('elements/featured-image'); ?>    

			</div><!-- end of 2nd col -->
    <?php } else { ?>
<?php } ?>
			
            	</div><!-- end of row -->
            	</div><!-- end of Post -->


	<?php endwhile; ?>
    
	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>
	
 </div><!-- end of Loop Archive -->