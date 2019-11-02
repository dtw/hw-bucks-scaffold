<?php get_header();?>
<?php global $wp;
$missing_page_url = home_url( $wp->request );?>
<div class="container">
  <p>The page you are looking for does not exist or has been removed permenantly. If you typed in the page address, please check that it's spelt correctly and try again.</p>
  <p>You can also <a href="mailto:info@healthwatchbucks.co.uk?subject=Missing web page&body=The page at <?php echo $missing_page_url?> returns a 404 error.">inform us about a missing page by email</a>.</p>
  <p><a href="<?php echo esc_url( home_url() ) ?>"><i class="fas fa-home fa-lg"></i> Go to the home page</a></p>
</div>
</div><!-- end of container-fluid -->
<?php get_footer(); ?>
