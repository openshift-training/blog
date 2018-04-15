<div class="container">

  <div class="row sl">

    <aside class="sidebar col-12 col-sm-6 col-md-6 col-lg-3 mx-auto order-2 order-lg-1 align-items-center widget-area" id="secondary">

      <?php get_sidebar(); ?>

    </aside>

    <div class="content col-lg-9 mx-auto align-items-center order-1 order-lg-2">

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php the_title( '<h2 class="page-title">', '</h2>' ); ?>

      	<div class="entry-content">

      		<?php the_content(); ?>

      		<?php wp_link_pages( array(
      				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'neori' ),
      				'after'  => '</div>',
      			) );
      		?>

      	</div><!-- /.entry-content -->

      </article>

    </div><!-- /content -->

  </div><!-- /.row -->

</div><!-- /.container -->
