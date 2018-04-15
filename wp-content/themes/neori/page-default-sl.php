<?php

/*
 * Template Name: Page Default SL
 * Template Post Type: page
 */

get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/page/content-page-default-sl', get_post_format() ); ?>

  <?php endwhile; ?>

<?php get_footer(); ?>
