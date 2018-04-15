<div class="container">

  <div class="row">

    <div class="content col-lg-12 mx-auto align-items-center">

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
        
      <?php if ( comments_open() || get_comments_number() ) : comments_template(); ?>
      <?php endif; ?>

    </div><!-- /content -->

  </div><!-- /.row -->

</div><!-- /.container -->


