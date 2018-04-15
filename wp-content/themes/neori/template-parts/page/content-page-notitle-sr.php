<div class="container">

  <div class="row">

    <div class="content col-lg-9 mx-auto align-items-center">

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

    <aside class="sidebar col-12 col-sm-6 col-md-6 col-lg-3 mx-auto align-items-center widget-area" id="secondary">

      <?php get_sidebar(); ?>

    </aside>

  </div><!-- /.row -->

</div><!-- /.container -->
