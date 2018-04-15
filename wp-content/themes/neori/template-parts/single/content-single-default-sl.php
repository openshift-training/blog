<!--

THUMBNAIL & TITLE

-->

<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

<?php if(has_post_thumbnail()) : ?>

  <div class="single-thumbnail" style="background-image: url('<?php echo esc_url($thumb['0']);?>')">

<?php else: ?>

  <div class="single-thumbnail">

<?php endif; ?>

    <div class="container">

      <div class="single-thumbnail-inside row align-items-end">

        <div class="single-title-zone ws-sl col">

          <span class="category"><?php neori_show_categories_except("Featured"); ?></span>

          <?php the_title( '<h1>', '</h1>' ); ?>

          <?php if ( 'post' === get_post_type() ) : ?>

            <span class="date"><?php the_time( get_option('date_format') ); ?></span>

          <?php endif; ?>

        </div><!-- /.single-title-zone -->

      </div><!-- /.single-thumbnail-inside -->

    </div><!-- /.container -->

  </div><!-- /.single-thumbnail -->



<!--

THE POST CONTENT

-->

<div class="container">

  <div class="row sl">

    <aside class="sidebar col-12 col-sm-6 col-md-6 col-lg-3 mx-auto order-2 order-lg-1 align-items-center widget-area" id="secondary">

    <?php get_sidebar(); ?>

    </aside>

    <div class="content col-lg-9 mx-auto align-items-center order-1 order-lg-2">

      <div class="single-top-area clearfix">

        <div class="author">

          <?php echo get_avatar( get_the_author_meta('user_email'), '57', '' ); ?>

          <div class="author-info">

            <p><?php echo esc_html( 'author:', 'neori' ); ?></p>

            <?php the_author_posts_link(); ?>

          </div><!-- /.author-info -->

        </div><!-- /.author-->

        <?php if (function_exists('add_neori_social_share_buttons_icons')) { echo wp_kses_post(do_shortcode('[neori-social-share-icons]')); } ?>

      </div><!-- /.single-top-area -->

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">

          <h2 class="sr-only"><?php the_title(); ?></h2>

          <?php

            the_content( sprintf(

              wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'neori' ), array( 'span' => array( 'class' => array() ) ) ),

              the_title( '<span class="screen-reader-text">"', '"</span>', false ) )

            );

            ?>

            <?php

              wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'neori' ),
                'after'  => '</div>',
              ) );

            ?>

            <?php the_tags( '<div class="tags">', '', '</div>' ); ?>

            <?php if(get_theme_mod( 'neori_show_single_post_posts_navi_setting' ) == true) : ?>
              <?php get_template_part( 'template-parts/posts-navi' ); ?>
            <?php endif; ?>



            <div class="single-bottom-area">

              <?php if (function_exists('add_neori_social_share_buttons_icons')) { echo wp_kses_post(do_shortcode('[neori-social-share-icons]')); } ?>

            </div><!-- /.single-bottom-area -->

          </div><!-- /.entry-content -->

      </article>



<!--

BELOW POST

-->

      <?php if(get_theme_mod( 'neori_show_single_post_author_bio_setting' ) == true) : ?>
        <?php get_template_part( 'template-parts/single-author-bio' ); ?>
      <?php endif; ?>

      <?php if(!get_theme_mod('neori_hide_single_post_related_posts_setting')) : ?>
        <div class="ws">
          <?php get_template_part( 'template-parts/related-posts' ); ?>
        </div><!-- /.ws -->
      <?php endif; ?>



      <?php if ( comments_open() || get_comments_number() ) : comments_template(); ?>
      <?php endif; ?>



    </div><!-- /content -->



  </div><!-- /.row -->

</div><!-- /.container -->
