<?php get_header(); ?>

<div class="container">

  <main class="belowheader">

    <div class="archive-description">

      <h1><?php printf( esc_html__( '&#34;%s &#34;', 'neori' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

    </div><!-- /.archive-description -->

    <div class="row">

      <div class="content col-lg-9 mx-auto align-items-center">

        <?php if ( have_posts() ) : ?>

          <?php while ( have_posts() ) : the_post();

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
