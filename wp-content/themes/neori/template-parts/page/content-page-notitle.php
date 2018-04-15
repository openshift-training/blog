<div class="container">

  <div class="row">

    <div class="content col-lg-12 mx-auto align-items-center">

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

  </div><!-- /.row -->

</div><!-- /.container -->
