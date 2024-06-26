<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('elements/header-head'); ?>

<?php get_template_part('elements/header-body-class'); ?>

<!-- INCLUDE NAVIGATION -->

<?php get_template_part('elements/nav'); ?>
<?php if (get_theme_mod('scaffold_site_notice_status')) {
  get_template_part('elements/site-notice');
} ?>
<?php get_template_part('elements/page-title'); ?>

</div><!-- end of container-fluid -->