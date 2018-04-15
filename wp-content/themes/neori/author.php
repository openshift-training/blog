<?php get_header(); ?>

<div class="container">

  <main class="belowheader">

    <div class="archive-description row align-items-center">

        <?php

        $authordesc = get_the_author_meta( 'description' );

        if ( empty ( $authordesc ) ) :

        ?>

          <div class="single-author-bio empty">

            <?php echo get_avatar( get_the_author_meta('user_email'), '60', '' ); ?>

            <div class="single-author-bio-text">

              <h3><?php the_author_posts_link(); ?></h3>

            </div><!-- /.single-author-bio-text -->

          </div><!-- /.single-author-bio empty -->

        <?php else : ?>

          <div class="single-author-bio">

            <?php echo get_avatar( get_the_author_meta('user_email'), '125', '' ); ?>

            <div class="single-author-bio-text">

              <h3><?php the_author_posts_link(); ?></h3>

              <?php esc_textarea(the_author_meta('description'));  ?>

            </div><!-- /.single-author-bio-text -->

          </div><!-- /.single-author-bio-->

        <?php endif; ?>

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
