<?php

function neori_customize_register( $wp_customize ) {

/*--------------------------------------------
//  REMOVE UNNECESSARY DEFAULT SECTIONS     //
--------------------------------------------*/

$wp_customize->remove_section( 'background_image');
$wp_customize->remove_section( 'header_image');
$wp_customize->remove_section( 'colors');

/*--------------------------------------------
//          CUSTOMIZER SETTINGS             //
--------------------------------------------*/
/**********
  HEADER
**********/

$wp_customize->add_section(
  'neori_header_section',
    array(
   	  'title'      => 'Header', 'neori',
   	  'priority'   => 1,
    )
);

/* Header Type */

$wp_customize->add_setting(
  'neori_header_type_setting',
    array(
      'default'     => 'normal',
      'sanitize_callback' => 'neori_sanitize_type_radio'
	  )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_type_control',
				array(
					'label'          => 'Header Type',
					'section'        => 'neori_header_section',
					'settings'       => 'neori_header_type_setting',
					'type'           => 'radio',
					'priority'	 => 1,
					'choices'        => array(
						'normal'   => 'Normal',
						'centered'  => 'Centered',
						'ad'  => 'Ad',
					)
				)
  )
);

/* Logo image upload */

$wp_customize->add_setting(
  'neori_logo_image_setting',
    array(
      'sanitize_callback' => 'neori_sanitize_image_upload'
    )
);

$wp_customize->add_control(
  new WP_Customize_Image_Control(
    $wp_customize,
      'neori_logo_image_control',
				array(
					'label'      => 'Upload a logo',
					'description' => 'NOTE: After you upload the logo, you MUST fill in the blanks below with the image width and height (in px) in order for the logo to show up. If you want your logo to be retina-ready, you should use an image with a resolution at least 2x bigger than the declared values. See more about that in the documentation.',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_logo_image_setting',
					'priority'	 => 2
				)
  )
);

/* Logo width */

$wp_customize->add_setting(
  'neori_logo_width_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
			'neori_logo_width_control',
				array(
					'label'      => 'Logo width (px)',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_logo_width_setting',
					'type'		 => 'text',
					'priority'	 => 3
				)
  )
);

/* Logo height */

$wp_customize->add_setting(
  'neori_logo_height_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
			'neori_logo_height_control',
				array(
					'label'      => 'Logo height (px)',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_logo_height_setting',
					'type'		 => 'text',
					'priority'	 => 4
				)
  )
);

/* Small logo image upload */

$wp_customize->add_setting(
  'neori_small_logo_image_setting',
    array(
      'sanitize_callback' => 'neori_sanitize_image_upload'
    )
);

$wp_customize->add_control(
  new WP_Customize_Image_Control(
    $wp_customize,
      'neori_small_logo_image_control',
				array(
					'label'      => 'Upload a small logo',
					'description' => 'This is the small logo, the one that appears only when you scroll up on a page. It can be any size over 52px because it will be resized automatically.',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_small_logo_image_setting',
					'priority'	 => 5
				)
  )
);

/* First social icon */

$wp_customize->add_setting(
  'neori_header_first_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_first_social_icon_type_control',
				array(
					'label'      => 'First social icon - type',
					'description' => 'just write a single word with lowercase letters. (facebook, twitter, instagram, etc.)',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_first_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 6
				)
  )
);

$wp_customize->add_setting(
  'neori_header_first_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_first_social_icon_url_control',
				array(
					'label'      => 'First social icon - URL',
					'description' => 'paste the full URL of your social profile (http://facebook.com/your.profile)',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_first_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 7
				)
  )
);

/* Second social icon */

$wp_customize->add_setting(
  'neori_header_second_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_second_social_icon_type_control',
				array(
					'label'      => 'Second social icon - type',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_second_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 8
				)
  )
);

$wp_customize->add_setting(
  'neori_header_second_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_second_social_icon_url_control',
				array(
					'label'      => 'Second social icon - URL',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_second_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 9
				)
  )
);

/* Third social icon */

$wp_customize->add_setting(
  'neori_header_third_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_third_social_icon_type_control',
				array(
					'label'      => 'Third social icon - type',
  					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_third_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 10
				)
  )
);

$wp_customize->add_setting(
  'neori_header_third_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_third_social_icon_url_control',
				array(
					'label'      => 'Third social icon - URL',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_third_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 11
				)
  )
);

/* Fourth social icon */

$wp_customize->add_setting(
  'neori_header_fourth_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_fourth_social_icon_type_control',
				array(
					'label'      => 'Fourth social icon - type',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_fourth_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 12
				)
  )
);

$wp_customize->add_setting(
  'neori_header_fourth_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_fourth_social_icon_url_control',
				array(
					'label'      => 'Fourth social icon - URL',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_fourth_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 13
				)
  )
);

/* Fifth social icon */

$wp_customize->add_setting(
  'neori_header_fifth_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_fifth_social_icon_type_control',
				array(
					'label'      => 'Fifth social icon - type',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_fifth_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 14
				)
  )
);

$wp_customize->add_setting(
  'neori_header_fifth_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_fifth_social_icon_url_control',
				array(
					'label'      => 'Fifth social icon - URL',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_fifth_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 15
				)
  )
);

/* Sixth social icon */

$wp_customize->add_setting(
  'neori_header_sixth_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_sixth_social_icon_type_control',
				array(
					'label'      => 'Sixth social icon - type',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_sixth_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 16
				)
  )
);

$wp_customize->add_setting(
  'neori_header_sixth_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_sixth_social_icon_url_control',
				array(
					'label'      => 'Sixth social icon - URL',
					'description' => '',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_sixth_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 17
				)
  )
);

/* Show site description */

$wp_customize->add_setting(
  'neori_show_site_description_setting',
    array(
      'default'     => false,
      'sanitize_callback' => 'neori_sanitize_checkbox'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_show_site_description_control',
				array(
					'label'      => 'Show Site Description',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_show_site_description_setting',
					'type'		 => 'checkbox',
					'priority'	 => 18
				)
  )
);

/* Ad Space */

$wp_customize->add_setting(
  'neori_header_ad_space_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_kses_post'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_header_ad_space_control',
                array(
					'label'      => 'Ad Space',
					'description' => 'Insert ad code here. Only available for Ad Header Type. Maximum recommended size 728x90px.',
					'section'    => 'neori_header_section',
					'settings'   => 'neori_header_ad_space_setting',
					'type'		 => 'textarea',
					'priority'	 => 19
				)
  )
);


/**************
  SINGLE POST
**************/

$wp_customize->add_section(
  'neori_single_post_section' ,
    array(
      'title'      => 'Single Post', 'neori',
   		'priority'   => 2,
    )
);

/* Show Single Author Bio */

$wp_customize->add_setting(
  'neori_show_single_post_author_bio_setting',
    array(
      'default'     => false,
      'sanitize_callback' => 'neori_sanitize_checkbox'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_hide_single_post_author_control',
				array(
					'label'      => 'Show Author Bio',
					'description' => 'In order to fill the author bio, head over Dashboard > Users > All Users, click on your user name, and then fill the Biographical Info area.',
					'section'    => 'neori_single_post_section',
					'settings'   => 'neori_show_single_post_author_bio_setting',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
  )
);

/* Show Posts Navi */

$wp_customize->add_setting(
  'neori_show_single_post_posts_navi_setting',
    array(
      'default'     => false,
      'sanitize_callback' => 'neori_sanitize_checkbox'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_show_single_post_posts_navi_control',
				array(
					'label'      => 'Show Posts Navi',
					'section'    => 'neori_single_post_section',
					'settings'   => 'neori_show_single_post_posts_navi_setting',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
  )
);

/* Hide Related Posts */

$wp_customize->add_setting(
  'neori_hide_single_post_related_posts_setting',
    array(
      'default'     => false,
      'sanitize_callback' => 'neori_sanitize_checkbox'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_hide_single_post_related_posts_control',
				array(
					'label'      => 'Hide Related Posts',
					'section'    => 'neori_single_post_section',
					'settings'   => 'neori_hide_single_post_related_posts_setting',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
  )
);



/**************
    FOOTER
**************/

$wp_customize->add_section(
  'neori_footer_section' ,
    array(
      'title'      => 'Footer', 'neori',
      'priority'   => 3,
    )
);

/* First footer social icon */

$wp_customize->add_setting(
  'neori_footer_first_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_first_social_icon_type_control',
				array(
					'label'      => 'First social icon - type',
					'description' => 'just write a single word with lowercase letters. (facebook, twitter, instagram, etc.)',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_first_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 1
				)
  )
);

$wp_customize->add_setting(
  'neori_footer_first_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_first_social_icon_url_control',
				array(
					'label'      => 'First social icon - URL',
					'description' => 'paste the full URL of your social profile (http://facebook.com/your.profile)',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_first_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 2
				)
  )
);

/* Second footer social icon */

$wp_customize->add_setting(
  'neori_footer_second_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_second_social_icon_type_control',
				array(
					'label'      => 'Second social icon - type',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_second_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 3
				)
  )
);

$wp_customize->add_setting(
  'neori_footer_second_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_second_social_icon_url_control',
				array(
					'label'      => 'Second social icon - URL',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_second_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 4
				)
  )
);

/* Third footer social icon */

$wp_customize->add_setting(
  'neori_footer_third_social_icon_type_setting',
    array(
	   'default'     => '',
	   'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_third_social_icon_type_control',
				array(
					'label'      => 'Third social icon - type',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_third_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 5
				)
  )
);

$wp_customize->add_setting(
  'neori_footer_third_social_icon_url_setting',
    array(
	   'default'     => '',
	   'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_third_social_icon_url_control',
				array(
					'label'      => 'Third social icon - URL',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_third_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 6
				)
  )
);

/* Fourth footer social icon */

$wp_customize->add_setting(
  'neori_footer_fourth_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_fourth_social_icon_type_control',
				array(
					'label'      => 'Fourth social icon - type',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_fourth_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 7
				)
  )
);

$wp_customize->add_setting(
  'neori_footer_fourth_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_fourth_social_icon_url_control',
				array(
					'label'      => 'Fourth social icon - URL',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_fourth_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 8
				)
  )
);

/* Fifth footer social icon */

$wp_customize->add_setting(
  'neori_footer_fifth_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_fifth_social_icon_type_control',
				array(
					'label'      => 'Fifth social icon - type',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_fifth_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 9
				)
  )
);

$wp_customize->add_setting(
  'neori_footer_fifth_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_fifth_social_icon_url_control',
				array(
					'label'      => 'Fifth social icon - URL',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_fifth_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 10
				)
  )
);

/* Sixth footer social icon */

$wp_customize->add_setting(
  'neori_footer_sixth_social_icon_type_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_sixth_social_icon_type_control',
				array(
					'label'      => 'Sixth social icon - type',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_sixth_social_icon_type_setting',
					'type'		 => 'text',
					'priority'	 => 11
				)
  )
);

$wp_customize->add_setting(
  'neori_footer_sixth_social_icon_url_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_footer_sixth_social_icon_url_control',
				array(
					'label'      => 'Sixth social icon - URL',
					'description' => '',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_footer_sixth_social_icon_url_setting',
					'type'		 => 'text',
					'priority'	 => 12
				)
  )
);

/* Add aditional text in footer */

$wp_customize->add_setting(
  'neori_additional_footer_text_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_kses_post'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_aiditional_footer_text_control',
                array(
					'label'      => 'Add aditional footer text',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_additional_footer_text_setting',
					'type'		 => 'textarea',
					'priority'	 => 13
				)
  )
);

/* Hide Author Credit */

$wp_customize->add_setting(
  'neori_hide_author_credit_setting',
    array(
	   'default'     => false,
	   'sanitize_callback' => 'neori_sanitize_checkbox'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_hide_author_credit_control',
				array(
					'label'      => 'Hide Author Credit',
					'section'    => 'neori_footer_section',
					'settings'   => 'neori_hide_author_credit_setting',
					'type'		 => 'checkbox',
					'priority'	 => 14
				)
  )
);

/*******************
    SLICE TYPE 1
*******************/

$wp_customize->add_section(
  'neori_slice_type1_section',
    array(
      'title'      => 'Slice Type 1', 'neori',
      'priority'   => 4,
    )
);

/* Category name */

$wp_customize->add_setting(
  'neori_slice_type1_category_name_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type1_category_name_control',
				array(
					'label'      => 'Category Name',
					'description' => 'used to display the Title',
					'section'    => 'neori_slice_type1_section',
					'settings'   => 'neori_slice_type1_category_name_setting',
					'type'		 => 'text',
					'priority'	 => 1
				)
  )
);

/* Category slug */

$wp_customize->add_setting(
  'neori_slice_type1_category_slug_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type1_category_slug_control',
				array(
					'label'      => 'Category Slug',
					'description' => 'just write the category slug from which you want to display posts in this Slice. In most cases it is the same as the category name. It can be found in the Dashboard > Posts > Categories section',
					'section'    => 'neori_slice_type1_section',
					'settings'   => 'neori_slice_type1_category_slug_setting',
					'type'		 => 'text',
					'priority'	 => 2
				)
  )
);

/* Number of posts */

$wp_customize->add_setting(
  'neori_slice_type1_posts_number_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type1_posts_number_control',
				array(
					'label'      => 'Posts Number',
					'section'    => 'neori_slice_type1_section',
					'settings'   => 'neori_slice_type1_posts_number_setting',
					'type'		 => 'text',
					'priority'	 => 3
				)
  )
);



/*******************
    SLICE TYPE 2
*******************/

$wp_customize->add_section(
  'neori_slice_type2_section' ,
    array(
      'title'      => 'Slice Type 2', 'neori',
      'priority'   => 5,
    )
);

/* Category name */

$wp_customize->add_setting(
  'neori_slice_type2_category_name_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type2_category_name_control',
				array(
					'label'      => 'Category Name',
					'description' => 'used to display the Title',
					'section'    => 'neori_slice_type2_section',
					'settings'   => 'neori_slice_type2_category_name_setting',
					'type'		 => 'text',
					'priority'	 => 1
				)
  )
);

/* Category slug */

$wp_customize->add_setting(
  'neori_slice_type2_category_slug_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type2_category_slug_control',
				array(
					'label'      => 'Category Slug',
					'description' => 'just write the category slug from which you want to display posts in this Slice. In most cases it is the same as the category name. It can be found in the Dashboard > Posts > Categories section',
					'section'    => 'neori_slice_type2_section',
					'settings'   => 'neori_slice_type2_category_slug_setting',
					'type'		 => 'text',
					'priority'	 => 2
				)
  )
);

/* Number of posts */

$wp_customize->add_setting(
  'neori_slice_type2_posts_number_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type2_posts_number_control',
				array(
					'label'      => 'Posts Number',
					'section'    => 'neori_slice_type2_section',
					'settings'   => 'neori_slice_type2_posts_number_setting',
					'type'		 => 'text',
					'priority'	 => 3
				)
  )
);



/*******************
    SLICE TYPE 3
*******************/

$wp_customize->add_section(
  'neori_slice_type3_section' ,
    array(
      'title'      => 'Slice Type 3', 'neori',
      'priority'   => 6,
    )
);

/* Category name */

$wp_customize->add_setting(
  'neori_slice_type3_category_name_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type3_category_name_control',
				array(
					'label'      => 'Category Name',
					'description' => 'used to display the Title',
					'section'    => 'neori_slice_type3_section',
					'settings'   => 'neori_slice_type3_category_name_setting',
					'type'		 => 'text',
					'priority'	 => 1
				)
  )
);

/* Category slug */

$wp_customize->add_setting(
  'neori_slice_type3_category_slug_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type3_category_slug_control',
				array(
					'label'      => 'Category Slug',
					'description' => 'just write the category slug from which you want to display posts in this Slice. In most cases it is the same as the category name. It can be found in the Dashboard > Posts > Categories section',
					'section'    => 'neori_slice_type3_section',
					'settings'   => 'neori_slice_type3_category_slug_setting',
					'type'		 => 'text',
					'priority'	 => 2
				)
  )
);


/*******************
    SLICE TYPE 4
*******************/

$wp_customize->add_section(
  'neori_slice_type4_section' ,
    array(
      'title'      => 'Slice Type 4', 'neori',
      'priority'   => 7,
    )
);

/* Category name */

$wp_customize->add_setting(
  'neori_slice_type4_category_name_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type4_category_name_control',
				array(
					'label'      => 'Category Name',
					'description' => 'used to display the Title',
					'section'    => 'neori_slice_type4_section',
					'settings'   => 'neori_slice_type4_category_name_setting',
					'type'		 => 'text',
					'priority'	 => 1
				)
  )
);

/* Category slug */

$wp_customize->add_setting(
  'neori_slice_type4_category_slug_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type4_category_slug_control',
				array(
					'label'      => 'Category Slug',
					'description' => 'just write the category slug from which you want to display posts in this Slice. In most cases it is the same as the category name. It can be found in the Dashboard > Posts > Categories section',
					'section'    => 'neori_slice_type4_section',
					'settings'   => 'neori_slice_type4_category_slug_setting',
					'type'		 => 'text',
					'priority'	 => 2
				)
  )
);

/* Number of posts */

$wp_customize->add_setting(
  'neori_slice_type4_posts_number_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type4_posts_number_control',
				array(
					'label'      => 'Posts Number',
					'section'    => 'neori_slice_type4_section',
					'settings'   => 'neori_slice_type4_posts_number_setting',
					'type'		 => 'text',
					'priority'	 => 3
				)
  )
);



/*******************
    SLICE TYPE 5
*******************/

$wp_customize->add_section(
  'neori_slice_type5_section' ,
    array(
   	  'title'      => 'Slice Type 5', 'neori',
   	  'priority'   => 8,
    )
);

/* Category name */

$wp_customize->add_setting(
  'neori_slice_type5_category_name_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type5_category_name_control',
				array(
					'label'      => 'Category Name',
					'description' => 'used to display the Title',
					'section'    => 'neori_slice_type5_section',
					'settings'   => 'neori_slice_type5_category_name_setting',
					'type'		 => 'text',
					'priority'	 => 1
				)
  )
);

/* Category slug */

$wp_customize->add_setting(
  'neori_slice_type5_category_slug_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type5_category_slug_control',
				array(
					'label'      => 'Category Slug',
					'description' => 'just write the category slug from which you want to display posts in this Slice. In most cases it is the same as the category name. It can be found in the Dashboard > Posts > Categories section',
					'section'    => 'neori_slice_type5_section',
					'settings'   => 'neori_slice_type5_category_slug_setting',
					'type'		 => 'text',
					'priority'	 => 2
				)
  )
);

/* Number of posts */

$wp_customize->add_setting(
  'neori_slice_type5_posts_number_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type5_posts_number_control',
				array(
					'label'      => 'Posts Number',
					'section'    => 'neori_slice_type5_section',
					'settings'   => 'neori_slice_type5_posts_number_setting',
					'type'		 => 'text',
					'priority'	 => 3
				)
  )
);



/*******************
    SLICE TYPE 6
*******************/

$wp_customize->add_section(
  'neori_slice_type6_section',
    array(
      'title'      => 'Slice Type 6', 'neori',
      'priority'   => 9,
    )
);

/* Category name */

$wp_customize->add_setting(
  'neori_slice_type6_category_name_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type6_category_name_control',
				array(
					'label'      => 'Category Name',
					'description' => 'used to display the Title',
					'section'    => 'neori_slice_type6_section',
					'settings'   => 'neori_slice_type6_category_name_setting',
					'type'		 => 'text',
					'priority'	 => 1
				)
	)
);

/* Category slug */

$wp_customize->add_setting(
  'neori_slice_type6_category_slug_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type6_category_slug_control',
				array(
					'label'      => 'Category Slug',
					'description' => 'just write the category slug from which you want to display posts in this Slice. In most cases it is the same as the category name. It can be found in the Dashboard > Posts > Categories section',
					'section'    => 'neori_slice_type6_section',
					'settings'   => 'neori_slice_type6_category_slug_setting',
					'type'		 => 'text',
					'priority'	 => 2
				)
  )
);

/* Number of posts */

$wp_customize->add_setting(
  'neori_slice_type6_posts_number_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type6_posts_number_control',
				array(
					'label'      => 'Posts Number',
					'section'    => 'neori_slice_type6_section',
					'settings'   => 'neori_slice_type6_posts_number_setting',
					'type'		 => 'text',
					'priority'	 => 3
				)
  )
);



/*******************
    SLICE TYPE 7
*******************/

$wp_customize->add_section(
  'neori_slice_type7_section' ,
    array(
      'title'      => 'Slice Type 7', 'neori',
      'priority'   => 10,
  )
);

/* Category name */

$wp_customize->add_setting(
  'neori_slice_type7_category_name_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type7_category_name_control',
				array(
					'label'      => 'Category Name',
					'description' => 'used to display the Title',
					'section'    => 'neori_slice_type7_section',
					'settings'   => 'neori_slice_type7_category_name_setting',
					'type'		 => 'text',
					'priority'	 => 1
				)
  )
);

/* Category slug */

$wp_customize->add_setting(
    'neori_slice_type7_category_slug_setting',
    array(
      'default'     => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
);

$wp_customize->add_control(
  new WP_Customize_Control(
    $wp_customize,
      'neori_slice_type7_category_slug_control',
				array(
					'label'      => 'Category Slug',
					'description' => 'just write the category slug from which you want to display posts in this Slice. In most cases it is the same as the category name. It can be found in the Dashboard > Posts > Categories section',
					'section'    => 'neori_slice_type7_section',
					'settings'   => 'neori_slice_type7_category_slug_setting',
					'type'		 => 'text',
					'priority'	 => 2
				)
  )
);



/*--------------------------------------------
//          POSTMESSAGE SUPPORT             //
--------------------------------------------*/
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'neori_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'neori_customize_partial_blogdescription',
	) );
}


/*--------------------------------------------
//                   END                    //
--------------------------------------------*/
}
add_action( 'customize_register', 'neori_customize_register' );

/*--------------------------------------------
//                SANITIZATION              //
--------------------------------------------*/
/* Type radio boxes sanitization */
function neori_sanitize_type_radio( $input ) {

    $valid = array(
				'normal'   => 'Normal',
				'centered'  => 'Centered',
				'ad'  => 'Ad',
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }

}

/* Checkboxes sanitization */
function neori_sanitize_checkbox( $input ) {

    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }

}

/* Image upload sanitization */
function neori_sanitize_image_upload( $file, $setting ) {

    $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png'
    );

    $file_ext = wp_check_filetype( $file, $mimes );

    return ( $file_ext['ext'] ? $file : $setting->default );

}

/*--------------------------------------------
//        POSTMESSAGE SUPPORT AGAIN         //
--------------------------------------------*/
function neori_customize_partial_blogname() {
	bloginfo( 'name' );
}

function neori_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/* Binds JS handlers to make Theme Customizer preview reload changes asynchronously. */
function neori_customize_preview_js() {
	wp_enqueue_script( 'neori-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'neori_customize_preview_js' );
