<?php

/* ------------------------------------------------------------
Setup
------------------------------------------------------------- */
if ( ! function_exists( 'neori_setup' ) ) :

  function neori_setup() {

    load_theme_textdomain( 'neori', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    // Enable Post Thumbnails support
    add_theme_support( 'post-thumbnails' );

    // Registering the Header Menu
    register_nav_menus( array(
      'header-menu' => esc_html__( 'Header', 'neori' ),
    ) );

    // Registering the Footer Menu
    register_nav_menus( array(
      'footer-menu' => esc_html__( 'Footer', 'neori' ),
    ) );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'neori_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add theme support for post formats.
    add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

    // Add theme support for WooCommerce & WooCommerce Gallery
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // To be honest these two are here just to get rid of that recommendations
    add_theme_support( "custom-header");
    add_editor_style();

  }

endif;
add_action( 'after_setup_theme', 'neori_setup' );



// Set content width
if ( ! isset( $content_width ) )
  $content_width = 1920;

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

/* ------------------------------------------------------------
Registering Widget Areas
-------------------------------------------------------------- */
function neori_widgets_init() {

  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'neori' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'neori' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
    ) );

  register_sidebar( array(
    'name'          => esc_html__( 'WooCommerce Sidebar', 'neori' ),
    'id'            => 'sidebar-2',
    'description'   => esc_html__( 'Use this for WooCommerce widgets.', 'neori' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
    ) );

}

add_action( 'widgets_init', 'neori_widgets_init' );

/* ------------------------------------------------------------
Registering Google Fonts
------------------------------------------------------------- */
function neori_google_fonts() {

  $font_url = '';

  /*
  Translators: If there are characters in your language that are not supported
  by chosen font(s), translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Google font: on or off', 'neori' ) ) {
    $font_url = add_query_arg( 'family', urlencode( 'Heebo:300,400,500,700|Assistant:500,600,700|PT Serif:400,700|&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
  }

  return $font_url;

}

/* ------------------------------------------------------------
Enqueuing CSS styles
------------------------------------------------------------- */
function neori_scripts() {

  wp_enqueue_style( 'neori-style', get_stylesheet_uri(), array(), '1.0.0', 'all' );

  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0', 'all' );

  wp_enqueue_style( 'neori-modified-bootstrap-css', get_template_directory_uri() . '/css/modified-bootstrap.css', array(), '1.0.0', 'all' );

  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );

  wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/css/simple-line-icons.css', array(), '2.4.0', 'all' );

/* ------------------------------------------------------------
Enqueuing Google Fonts
------------------------------------------------------------- */
  wp_enqueue_style( 'neori-fonts', neori_google_fonts(), array(), '1.0.0' );

/* ------------------------------------------------------------
Enqueuing Scripts
------------------------------------------------------------- */
  wp_enqueue_script( 'neori-general-scripts', get_template_directory_uri() . '/js/general-scripts.js',  array('jquery'), '1.0.0', true );

  wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/js/popper.min.js',  array(), '1.12.3', true );

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true);

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

}

add_action( 'wp_enqueue_scripts', 'neori_scripts' );

/* ------------------------------------------------------------
Custom Widgets
------------------------------------------------------------- */
require_once( get_template_directory() . '/inc/recent-posts-widget.php' );

require_once( get_template_directory() . '/inc/responsive-banner-widget.php' );

/* ------------------------------------------------------------
Mega Menu Implementation
------------------------------------------------------------- */
function neori_mega_menu( $item_output, $item, $depth, $args ) {

  global $wp_query;

  if ( 'header-menu' !== $args->theme_location )
  return $item_output;

  if ( in_array( 'neori-mega-menu', $item->classes ) ) {

    global $wp_query;
    global $post;

    $subposts = get_posts( 'numberposts=5&cat=' . $item->object_id );
    $item_output .= '<ul class="submenu-mega row align-items-start wz">';

    foreach( $subposts as $post ) :
    setup_postdata( $post );

    $item_output .= '<li><a href="'. get_permalink( $post->ID ) .'"><div class="neori-mega-menu-img">';
    $item_output .= get_the_post_thumbnail( $post->ID, 'medium' );
    $item_output .= '</div><p>';
    $item_output .= get_the_title( $post->ID );
    $item_output .= '</p></a></li>';

    endforeach;

    wp_reset_postdata();

    $item_output .= '</ul>';

  }

  return $item_output;

}

add_filter( 'walker_nav_menu_start_el', 'neori_mega_menu', 10, 4 );

/* ------------------------------------------------------------
Custom Read More Text
------------------------------------------------------------- */
function neori_excerpt_more( $more ) {

  return '  ...';

}

add_filter( 'excerpt_more', 'neori_excerpt_more' );

/* ------------------------------------------------------------
Exclude the "Featured" category name from showing up
------------------------------------------------------------- */
function neori_show_categories_except($excl='', $spacer='') {

  global $post;
  $categories = get_the_category($post->ID);

  if (!empty($categories)) {

    $exclude = $excl;
    $exclude = explode(",", $exclude);
    $thecount = count(get_the_category()) - count($exclude);

    foreach ($categories as $cat) {

      $html = '';

      if (!in_array($cat->cat_name, $exclude)) {

        $html .= '<a href="' . get_category_link($cat->cat_ID) . '" ';
        $html .= 'title="' . $cat->cat_name . '">' . $cat->cat_name . '</a> ';

        if ($thecount > 1) {

          $html .= $spacer;

        }

        $thecount--;
        echo wp_kses_post($html);

      }

    }

  }

}

/* ------------------------------------------------------------
Removes phantom paragraph tags on images
------------------------------------------------------------- */
function neori_filter_ptags_on_images($content){

  return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);

}

add_filter('the_content', 'neori_filter_ptags_on_images');

/* ------------------------------------------------------------
Replaces default class for avatars, for customizability reasons
------------------------------------------------------------- */
function neori_add_avatar_class($class) {

  $class = str_replace("class='avatar", "class='useravatar", $class);
  return $class;

}

add_filter('get_avatar','neori_add_avatar_class');

/* ------------------------------------------------------------
Replaces "Reply" text in comments, with the FontAwesome icon
------------------------------------------------------------- */
function neori_comment_reply_text( $link ) {

  $link = str_replace( 'Reply', '<div class="icon-action-undo comment-reply"></div>', $link );
  return $link;

}

add_filter( 'comment_reply_link', 'neori_comment_reply_text' );

/* ------------------------------------------------------------
Pagination
------------------------------------------------------------- */
function neori_pagination() {

  ?>

  <div class="neori-pagination">

    <div class="next-posts-link">

      <?php previous_posts_link( wp_kses_post( __('<i class="fa fa-angle-left"></i> Newer Posts', 'neori'))); ?>

    </div><!-- /.next-posts-link -->

    <div class="previous-posts-link">

      <?php next_posts_link( wp_kses_post( __('Older Posts <i class="fa fa-angle-right"></i>', 'neori'))); ?>

    </div><!-- /.previous-posts-link -->

  </div><!-- /.neori-pagination -->

  <?php

}

/* ------------------------------------------------------------
Custom Comments List
------------------------------------------------------------- */
function neori_comment( $comment, $args, $depth ) {

  $GLOBALS['comment'] = $comment; ?>

  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

    <div id="comment-<?php comment_ID(); ?>" class="comment">

      <div class="comment-author vcard">

        <?php echo get_avatar( $comment, 40 ); ?>

        <h4 class="username"> <?php printf( esc_html__( '%s', 'neori' ), sprintf( '%s', get_comment_author_link() ) ); ?></h4>

        <div class="userdate">

          <time datetime="<?php comment_time( 'c' ); ?>">

            <?php printf( esc_html__( '%1$s', 'neori' ), get_comment_date() ); ?>

          </time>

        </div><!-- /.userdate -->

      </div><!-- /.comment-author .vcard -->

      <?php if ( $comment->comment_approved == '0' ) : ?>

        <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'neori' ); ?></em>

        <br />

      <?php endif; ?>

      <div class="comment-content">

        <p class='userwriting'><?php echo wp_kses_post($comment->comment_content); ?></p>

      </div><!-- /.comment-content -->

      <div class="usercommentmeta">

        <div class="userreply">

          <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

          <?php edit_comment_link( wp_kses_post('<i class="editbutton fa fa-edit"></i>', 'neori' ), ' ' ); ?>

        </div><!-- /.userreply -->

      </div><!-- /.usercommentmeta -->

    </div><!-- /.comment -->

  <?php
}

/* ------------------------------------------------------------
Change WooCommerce Number of Products
------------------------------------------------------------- */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {

  $cols = 8;
  return $cols;

}

/* ------------------------------------------------------------
AJAX Load More Posts
------------------------------------------------------------- */
add_action('wp_ajax_nopriv_neori_load_more_posts', 'neori_load_more_posts');

add_action('wp_ajax_neori_load_more_posts', 'neori_load_more_posts');

function neori_load_more_posts() {

  $paged = $_POST["page"]+1;

  $more_posts_query = new WP_Query( array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'ignore_sticky_posts' => 1,
    'category_name' => esc_html ( get_theme_mod ('neori_slice_type7_category_slug_setting', '')),
    'paged' => $paged,
  ) );

  if( $more_posts_query->have_posts() ):

    while( $more_posts_query->have_posts() ): $more_posts_query->the_post();

      get_template_part( 'template-parts/content', 'blog' );

    endwhile;

  endif;

  wp_reset_postdata();

  die();

}

/* ------------------------------------------------------------
TGM Plugin Activation
------------------------------------------------------------- */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'neori_register_required_plugins' );

function neori_register_required_plugins() {

  $plugins = array(

    array(
      'name'      => 'Vafpress Post Formats UI',
      'slug'      => 'vafpress-post-formats-ui',
      'required' => true,
      'source'    => get_template_directory() . '/plugins/vafpress-post-formats-ui-develop.zip',
    ),

    array(
      'name'      => 'Neori Shortcodes',
      'slug'      => 'neori-shortcodes',
      'required'  => true,
      'source'    => get_template_directory() . '/plugins/neori-shortcodes.zip',
    ),

    array(
      'name'      => 'Neori Social Share Buttons',
      'slug'      => 'neori-social-share-buttons',
      'required'  => false,
      'source'    => get_template_directory() . '/plugins/neori-social-share-buttons.zip',
    ),

    array(
      'name'      => 'Contact Form 7',
      'slug'      => 'contact-form-7',
      'required'  => false,
    ),

    array(
      'name'      => 'Sticky Menu (or Anything!) on Scroll',
      'slug'      => 'sticky-menu-or-anything-on-scroll',
      'required'  => false,
    ),

    array(
      'name'      => 'YellowPencil',
      'slug'      => 'waspthemes-yellow-pencil',
      'required'  => false,
      'source'    => get_template_directory() . '/plugins/waspthemes-yellow-pencil.zip',
    ),

  );

  $config = array(
    'id'           => 'neori',
    'default_path' => '',
    'menu'         => 'tgmpa-install-plugins',
    'has_notices'  => true,
    'dismissable'  => false,
    'dismiss_msg'  => '',
    'is_automatic' => false,
    'message'      => '',

  );

  tgmpa( $plugins, $config );

}
