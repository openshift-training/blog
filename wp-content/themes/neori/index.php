<?php get_header(); ?>

<div class="container">

  <main class="belowheader">

    <div class="row">

      <div class="content col-lg-9 mx-auto align-items-center">

        <?php

          if ( have_posts() ) : while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content-blog');

          endwhile;

            neori_pagination();

          else :

            get_template_part( 'template-parts/content', 'none' );

          endif;

        ?>

      </div><!-- /.content -->

      <aside class="sidebar col-12 col-sm-6 col-md-6 col-lg-3 mx-auto align-items-center widget-area" id="secondary">

        <?php get_sidebar(); ?>

      </aside>

    </div><!-- /.row -->

  </main><!-- #main -->

</div><!--- /.container -->

<?php get_footer(); ?>
