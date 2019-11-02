     <!-- Fixed navbar -->


<nav class="navbar navbar-fixed-top" role="navigation">

<div class="container-fluid">

  <div class="row tagline">
    <div class="hidden-lg col-md-12 col-sm-6 col-xs-12 phone">
      <p>Call <strong>01844 34 88 39</strong></p>
    </div>
    <div class="hidden-lg col-md-4 col-sm-6 col-xs-12 email">
      <p><strong><a href="mailto:info@healthwatchbucks.co.uk">info@healthwatchbucks.co.uk</a></strong></p>
    </div>
    <div class="col-lg-6 hidden-md hidden-sm hidden-xs email">
      <p>Call <strong>01844 34 88 39</strong><span class="separator">|</span><strong><a class="email" href="mailto:info@healthwatchbucks.co.uk">info@healthwatchbucks.co.uk</a></strong></p>
    </div>
    <div class="col-lg-6 col-md-8 hidden-xs widget-beside-tagline-container">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Beside Tagline')) : endif; ?>
    </div>
  </div>

  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-container">
      <span class="sr-only">Toggle navigation</span>
      <!--<i class="fas fa-bars fa-2x"></i>-->MENU
      </button>

      <a class="navbar-brand" title="<?php bloginfo('name'); ?>" href="<?php echo esc_url( home_url() ); ?>">
      <?php if ( get_theme_mod( 'scaffold_logo' ) ) : ?>
      <img src='<?php echo esc_url( get_theme_mod( 'scaffold_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
      <?php else : ?>
      <?php bloginfo('name'); ?>
      <?php endif; ?>
      </a>
    </div><!-- end of navbar-header -->
    <div id="nav-container" class="collapse navbar-collapse">
      <ul id="menu-main" class="nav navbar-nav">
      <?php
      wp_nav_menu( array(
      'menu'              => 'Main menu',
      'depth'             => 2,
      'container'         => false,
      'container_class'   => '',
      'container_id'      => '',
      'menu_class'        => '',
      'items_wrap' 		=> '%3$s',
      'walker'            => new wp_bootstrap_navwalker()
      )
      );
      ?>
      </ul>
    </div><!-- end of navbar-collapse -->
  </div><!-- end of container -->
</div><!-- end of container-fluid -->

</nav>
