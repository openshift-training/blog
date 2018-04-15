<div class="related-posts row">

  <div class="card-deck">

    <?php

      $orig_post = $post;
      global $post;
      $categories = get_the_category($post->ID);

      if ($categories) {

        $category_ids = array();

        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

        $args=array(
          'category__in' => $category_ids,
          'post__not_in' => array($post->ID),
          'posts_per_page'=> 3,
          'ignore_sticky_posts'=> 1
        );

        $related_posts_query = new WP_Query( $args );

        while( $related_posts_query->have_posts() ) {

          $related_posts_query->the_post();

    ?>

            <?php if(has_post_thumbnail()) : ?>

              <div class="custom-card">

                <div class="card bg-black text-white">

                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'card-img')); ?></a>

                  <div class="card-img-overlay">

                    <h4 class="card-title"><a rel="external" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                  </div><!-- /.card-img-overlay -->

                </div><!-- /.card -->

                <div class="meta-zone">

                  <?php echo get_avatar( get_the_author_meta('user_email'), '20', '' ); ?>

                  <span class="author"><?php the_author_posts_link(); ?></span>

                  <span class="date"><?php the_time( get_option('date_format') ); ?></span>

                </div><!-- /.meta-zone -->

              </div><!-- /.custom-card -->

            <?php else: ?>

              <div class="custom-card">

                <div class="card card-empty">

                  <div class="card-body">

                    <h4 class="card-title"><a rel="external" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                  </div><!-- /.card-body -->

                </div><!-- /.card /.card-empty -->

                <div class="meta-zone">

                  <?php echo get_avatar( get_the_author_meta('user_email'), '20', '' ); ?>

                  <span class="author"><?php the_author_posts_link(); ?></span>

                  <span class="date"><?php the_time( get_option('date_format') ); ?></span>

                </div><!-- /.meta-zone -->

              </div><!-- /.custom-card -->

            <?php endif; ?>

    <?php }
                }
      $post = $orig_post;
      wp_reset_postdata();
    ?>

  </div><!-- /.card-deck -->

</div><!-- /.related-posts -->
