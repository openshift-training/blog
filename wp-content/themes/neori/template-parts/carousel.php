<div id="carousel" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">

      <?php

        $carousel_query = new WP_Query(array(
          'type' => 'post',
          'post_status' => 'publish',
          'category_name' => 'Featured',
          'posts_per_page' => 1,
          'ignore_sticky_posts' => 1,
        ));

        while ( $carousel_query->have_posts() ) :

          $carousel_query->the_post();

      ?>

      <div class="carousel-item active">

        <?php the_post_thumbnail('post-thumbnail', ['class' => 'd-block w-100 carousel-image', 'title' => 'First slide']);?>

        <div class="carousel-caption d-block">

          <h3><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h3>

          <p class="d-sm-block d-md-none"><a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_content(), 10, '...' ); ?></a></p>
        
          <p class="d-none d-md-block"><a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></a></p>

        </div><!-- /.carousel-caption -->

      </div><!-- /.carousel-item -->

      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>



      <?php

        $carousel_query = new WP_Query(array(
          'type' => 'post',
          'post_status' => 'publish',
          'category_name' => 'Featured',
          'posts_per_page' => 9,
          'offset' => 1,
          'ignore_sticky_posts' => 1,
        ));

        while ( $carousel_query->have_posts() ) :

          $carousel_query->the_post();

      ?>

    <div class="carousel-item">

      <?php the_post_thumbnail('post-thumbnail', ['class' => 'd-block w-100 carousel-image', 'title' => 'Second Slide']);?>

      <div class="carousel-caption d-block">

        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h3>

        <p class="d-sm-block d-md-none"><a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_content(), 10, '...' ); ?></a></p>
        
        <p class="d-none d-md-block"><a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></a></p>

      </div><!-- /.carousel-caption -->

    </div><!-- /.carousel-item -->

      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>

  </div><!-- /.carousel-inner -->

    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">

      <span class="carousel-control-next-icon" aria-hidden="true"></span>

    </a>

</div><!-- /.carousel -->
