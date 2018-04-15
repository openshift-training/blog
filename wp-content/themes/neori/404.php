<?php get_header(); ?>

<div class="container">

  <main class="belowheader">

    <div class="row">

      <div class="content col-12 mx-auto align-items-center text-center">

        <div class="notfound">

          <h1><?php esc_html_e( '404 - Not Found', 'neori' ); ?></h1>

          <p><?php esc_html_e( 'What are you looking for is not here anymore.', 'neori' ); ?></p>

          <?php get_search_form(); ?>
        
        </div><!-- /.notfound -->

      </div><!-- /.content -->

    </div><!-- /.row -->

  </main>

</div><!--- /.container -->

<?php get_footer(); ?>
