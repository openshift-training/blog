<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#29272a" />
  <meta name="msapplication-navbutton-color" content="#29272a" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#29272a" />
  <meta name="description" content="<?php bloginfo('description'); ?>">

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>

<div id="page" class="site">



<!-- Sticky Header START -->

  <div class="sticky-header align-items-center">

    <div class="container">

      <div class="sticky-logo">

        <?php if(!get_theme_mod('neori_small_logo_image_setting')) : ?>

          <a href="<?php echo esc_url( home_url() );  ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-small.png" alt=""></a>

        <?php else : ?>

          <a href="<?php echo esc_url( home_url() );  ?>"><img src="<?php echo get_theme_mod ('neori_small_logo_image_setting', ''); ?>"></a>

        <?php endif; ?>

      </div><!-- /.sticky-logo -->

    <nav class="main-navigation sticky">

      <?php
        wp_nav_menu( array(
          'theme_location' => 'header-menu',
          'fallback_cb' => 'false',
        ) );
      ?>

    </nav><!-- /.main-navigation sticky -->

    <?php if ( class_exists( 'WooCommerce' ) ) : ?>

      <a href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-cart cart-icon"></i></a>

    <?php endif; ?>

    <form id="navbarsearchformsticky" class="navbarsearchform" role="search" action="<?php echo esc_url( home_url() );  ?>/" method="get">

      <input type="search" name="s" value="<?php the_search_query(); ?> ">

    </form>

    </div><!-- /.container-->

  </div><!-- /.sticky-header -->

<!-- Sticky Header END -->

<!-- Header Type Selection START -->

<?php if(get_theme_mod('neori_header_type_setting') == 'normal') : ?>

  <?php get_template_part( 'template-parts/headers/header-normal' ); ?>

<?php elseif(get_theme_mod('neori_header_type_setting') == 'centered') : ?>

  <?php get_template_part( 'template-parts/headers/header-centered' ); ?>

<?php elseif(get_theme_mod('neori_header_type_setting') == 'ad') : ?>

  <?php get_template_part( 'template-parts/headers/header-ad' ); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/headers/header-normal' ); ?>

<?php endif; ?>

<!-- Header Type Selection END -->

<div class="offcanvas-menu-button"><i class="fa fa-bars"></i></div>