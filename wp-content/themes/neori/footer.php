<footer class="footer">

  <div class="container">

    <div class="social-icons">

      <?php if(get_theme_mod('neori_footer_first_social_icon_type_setting')) : ?>

        <a href="<?php echo esc_url( get_theme_mod ('neori_footer_first_social_icon_url_setting', '')); ?>"><i class="fa fa-<?php echo esc_html( get_theme_mod ('neori_footer_first_social_icon_type_setting', '')); ?>"></i></a>

      <?php endif; ?>

      <?php if(get_theme_mod('neori_footer_second_social_icon_type_setting')) : ?>

        <a href="<?php echo esc_url( get_theme_mod ('neori_footer_second_social_icon_url_setting', '')); ?>"><i class="fa fa-<?php echo esc_html( get_theme_mod ('neori_footer_second_social_icon_type_setting', '')); ?>"></i></a>

      <?php endif; ?>

      <?php if(get_theme_mod('neori_footer_third_social_icon_type_setting')) : ?>

        <a href="<?php echo esc_url( get_theme_mod ('neori_footer_third_social_icon_url_setting', '')); ?>"><i class="fa fa-<?php echo esc_html( get_theme_mod ('neori_footer_third_social_icon_type_setting', '')); ?>"></i></a>

      <?php endif; ?>

      <?php if(get_theme_mod('neori_footer_fourth_social_icon_type_setting')) : ?>

        <a href="<?php echo esc_url( get_theme_mod ('neori_footer_fourth_social_icon_url_setting', '')); ?>"><i class="fa fa-<?php echo esc_html( get_theme_mod ('neori_footer_fourth_social_icon_type_setting', '')); ?>"></i></a>

      <?php endif; ?>

      <?php if(get_theme_mod('neori_footer_fifth_social_icon_type_setting')) : ?>

        <a href="<?php echo esc_url( get_theme_mod ('neori_footer_fifth_social_icon_url_setting', '')); ?>"><i class="fa fa-<?php echo esc_html( get_theme_mod ('neori_footer_fifth_social_icon_type_setting', '')); ?>"></i></a>

      <?php endif; ?>

      <?php if(get_theme_mod('neori_footer_sixth_social_icon_type_setting')) : ?>

        <a href="<?php echo esc_url( get_theme_mod ('neori_footer_sixth_social_icon_url_setting', '')); ?>"><i class="fa fa-<?php echo esc_html( get_theme_mod ('neori_footer_sixth_social_icon_type_setting', '')); ?>"></i></a>

      <?php endif; ?>

    </div><!-- /.social-icons -->

    <p class="additional-text"><?php echo wp_kses_post( get_theme_mod ('neori_additional_footer_text_setting', '')); ?></p>

    <nav class="main-navigation">

      <?php
        wp_nav_menu( array(
          'theme_location' => 'footer-menu',
          'fallback_cb' => 'false',
        ) );
        ?>

    </nav><!-- #site-navigation -->

    <p class="copyright"><?php echo esc_html( 'Copyright &copy;' . date('Y'), 'neori' ); ?> <?php bloginfo('name'); ?></p>

    <?php if(!get_theme_mod('neori_hide_author_credit_setting')) : ?>
      <p class="credit"><?php echo esc_html( 'Neori theme, designed by', 'neori' ); ?> <a href="<?php echo esc_url( 'http://litmotion.net', 'neori' ); ?>"><?php echo esc_html( 'litMotion Templates', 'neori' ); ?></a></p>
    <?php endif; ?>

  </div><!-- /.container -->

</footer>



<a href="#0" class="buttontop-top"><i class="fa fa-arrow-up"></i></a>



</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
