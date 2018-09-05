<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php bloginfo('name'); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<?php wp_head(); ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122698308-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-122698308-1');
  </script>
</head>
<body <?php body_class(); ?>>
    <!-- SCOUTS LOGO -->
    <div class="container-fluid bg-color1">
        <div class="row d-flex justify-content-center">
            <div class="col-xs-8">
               <a href="<?php echo get_home_url(); ?>"><img class="img-fluid" alt="Logo" src="<?php header_image(); ?>" /></a>
            </div>

        </div>
    </div>
    <!-- END OF SCOUTS LOGO -->
    <!-- NAVBAR -->
<div class="container-fluid bg-nav">
  <div class="row d-flex justify-content-between">
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav col-sm-12 col-lg-9">
        <span class="navbar-brand">Menu:</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
             wp_nav_menu([
               'menu'            => 'top',
               'theme_location'  => 'top',
               'container'       => 'div',
               'container_id'    => 'navbarSupportedContent',
               'container_class' => 'collapse navbar-collapse',
               'menu_id'         => false,
               'menu_class'      => 'navbar-nav mr-auto col-lg-12',
               'depth'           => 2,
               'fallback_cb'     => 'bs4navwalker::fallback',
               'walker'          => new bs4navwalker()
             ]);
             ?>
    </nav>
    <?php get_search_form(); ?>
  </div>
</div>
    <!-- END OF NAVBAR -->
