<?php get_header(); ?>

<div class="container">

  <div class="row sl">

    <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

      <aside class="sidebar col-12 col-sm-6 col-md-6 col-lg-3 mx-auto order-2 order-lg-1 align-items-center widget-area" id="secondary">

        <?php dynamic_sidebar('WooCommerce Sidebar'); ?>

      </aside>

    <?php endif; ?>  

    <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

      <div class="content col-lg-9 mx-auto align-items-center order-1 order-lg-2">

    <?php else : ?>  

      <div class="content col-12">

    <?php endif; ?>  

        <?php woocommerce_breadcrumb(); ?>

        <?php woocommerce_content(); ?>

      </div><!-- /content -->

  </div><!-- /.row -->

</div><!-- /.container -->

<?php get_footer(); ?>
