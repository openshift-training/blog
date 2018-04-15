<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>

<?php if($images) : ?>

  <div id="carousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">

      <?php

        $i = 0;
        foreach($images as $image) :
        $active = ( $i == 0 ? ' active' : '' );

      ?>

      <?php

        $the_image = wp_get_attachment_image_src( $image, 'full-thumb' );
        $the_caption = get_post_field('post_excerpt', $image);

      ?>

      <div class="carousel-item<?php echo esc_attr($active); ?> ">

        <img src="<?php echo esc_url($the_image[0]); ?>">

        <?php if($the_caption) : ?>

          <div class="carousel-caption d-none d-md-block">

            <?php echo ($the_caption); ?>

          </div><!-- /.carousel-caption -->

        <?php endif; ?>

      </div><!-- /.carousel-item -->

      <?php $i++; endforeach; ?>

      <?php wp_reset_postdata(); ?>

    </div><!-- /.carousel-inner -->

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">

      <span class="carousel-control-prev-icon" aria-hidden="true"></span>

    </a>

    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">

      <span class="carousel-control-next-icon" aria-hidden="true"></span>

    </a>

  </div><!-- /.carousel -->

<?php endif; ?>
