<?php

/*
 * Template Name: Page No Title SL
 * Template Post Type: page
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/page/content-page-notitle-sl', get_post_format() ); ?>

    <?php endwhile; ?>

<?php get_footer(); ?>
