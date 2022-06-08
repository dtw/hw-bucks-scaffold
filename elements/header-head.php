<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include('functions/functions-json-ld.php'); ?>
  <script type="application/ld+json">
  // <![CDATA[
  <?php echo json_encode($payload); ?>
  // ]]
  </script>

  <?php if(is_home()) {
    echo '
    <!-- add disable brower cache on frontpage -->
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    ';
  }
  ?>
  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
</head>
