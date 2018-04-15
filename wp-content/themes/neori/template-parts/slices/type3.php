<div class="slice type3">

  <a href="category/<?php echo esc_html( get_theme_mod ('neori_slice_type3_category_slug_setting', '')); ?>"><h2 class="slice-title"><?php echo esc_html( get_theme_mod ('neori_slice_type3_category_name_setting', '')); ?></h2></a>

  <div class="row">

    <div class="col-12 col-lg-6">

      <?php

        $args = array(
          'type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => '1',
          'category_name' => esc_html ( get_theme_mod ('neori_slice_type3_category_slug_setting', '')),
          'ignore_sticky_posts' => 1,
        );

        $slice_query = new WP_Query($args);

      ?>

      <?php if( $slice_query->have_posts() ): while( $slice_query->have_posts() ): $slice_query->the_post(); ?>

        <?php get_template_part('template-parts/slices/content', 'type3-1'); ?>

      <?php endwhile; ?>

      <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

      <?php endif; ?>

      <?php wp_reset_postdata(); ?>

    </div><!-- /.col -->

    <div class="slice type31 col-12 col-lg-6">

      <?php

        $args = array(
          'type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => '3',
          'category_name' => esc_html ( get_theme_mod ('neori_slice_type3_category_slug_setting', '')),
          'offset' => '1',
        );

        $slice_query = new WP_Query($args);

      ?>

      <?php if( $slice_query->have_posts() ): while( $slice_query->have_posts() ): $slice_query->the_post(); ?>

        <?php get_template_part('template-parts/slices/content', 'type3-2'); ?>

      <?php endwhile; ?>

      <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

      <?php endif; ?>

      <?php wp_reset_postdata(); ?>

    </div><!-- /.col -->

  </div><!-- /.row -->

</div><!-- /.slice type3 -->
