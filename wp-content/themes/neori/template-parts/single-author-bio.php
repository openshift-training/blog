<div class="single-author-bio">

  <?php echo get_avatar( get_the_author_meta('user_email'), '125', '' ); ?>

  <div class="single-author-bio-text">

    <h3><?php the_author_posts_link(); ?></h3>

    <?php esc_textarea(the_author_meta('description'));  ?>

  </div><!-- /.single-author-bio-text -->

</div><!-- /.single-author-bio row -->
