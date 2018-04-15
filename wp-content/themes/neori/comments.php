<?php

  if ( post_password_required() )
        return;

?>

<div class="allcomments">

  <div class="comments-container">

    <?php if ( have_comments() ) : ?>

      <div class="title-tag-container">

        <div class="title-tag">

          <?php

            printf( esc_html__(_n( 'One Comment', '%1$s Comments', get_comments_number(), 'neori' )),
                number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );

          ?>

        </div><!-- /.title-tag -->

      </div><!-- /.title-tag-container -->

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Comments navigation ?>

      <?php endif; ?>

      <ol class="commentlist">

        <?php wp_list_comments( array( 'callback' => 'neori_comment' ) ); ?>

      </ol><!-- /.commentlist -->

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Comments navigation ?>

        <div id="comment-nav-below" class="site-navigation comment-navigation">

            <div class="nav-previous"><?php previous_comments_link( esc_html_e( '&larr; Older Comments', 'neori' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( esc_html_e( 'Newer Comments &rarr;', 'neori' ) ); ?></div>

        </div><!-- /.comment-navigation -->

      <?php endif; ?>

      <?php endif; // have_comments() ?>

      <?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : // If comments are closed but there are comments posted. ?>

        <p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'neori' ); ?></p>

      <?php endif; ?>



        <!-- The comment form -->
        <div class="title-tag-container">

          <div  class="title-tag comment-tag"><?php esc_html_e( 'Leave a comment', 'neori' ); ?></div>

        </div><!-- /.title-tag-container -->

        <?php $comment_args = array('title_reply'=>'',

                                    'fields' => apply_filters( 'comment_form_default_fields', array(

                                    'author' => '<p class="comment-form-author">' . '<label for="author" >' . esc_html__( '', 'neori'  ) . '</label> ' . ( $req ? '' : '' ) .

                                    '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . ' /></p>',

                                    'email'  => '<p class="comment-form-email">' .

                                                '<label for="email">' . esc_html__( '', 'neori'  ) . '</label> ' .

                                                ( $req ? '' : '' ) .

                                                '<input id="email" placeholder="E-mail" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . ' />'.'</p>',

                                    'url'    => '<p class="comment-form-url">' .
                                                '<input id="url" name="url" placeholder="URL (optional)" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
                                                '<label for="url">' . esc_html__( '', 'neori' ) . '</label>' .
                                                '</p>'
		                              )
	                               ),

                                    'comment_field' => '<p>' .

                                                       '<label for="comment">' . esc_html__( '', 'neori'  ) . '</label>' .

                                                       '<textarea id="comment" name="comment" placeholder="Your comment here.."  aria-required="true"></textarea>' .

                                                       '</p>',

                                    'comment_notes_after' => '',

                                );

        comment_form($comment_args); ?>

    </div><!-- /.comments-container -->

</div><!-- /.allcomments -->
