<?php

use Drupal\Core\Form\FormStateInterface;

/**
 * @file
 * Custom setting for kym theme.
 */
function kym_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {
  $form['#attached']['library'][] = 'kym/theme-settings';
  $img_path = $GLOBALS['base_url'] . '/' . \Drupal::service('extension.list.theme')->getPath('kym') . '/images/kympro.jpg';
  $img = '<img src="' . $img_path . '" alt="kympro" />';
  $form['kym'] = [
    '#type'        => 'vertical_tabs',
    '#title'       => '<h3 class="settings-form-title">' . t('kym Theme Settings') . '</h3>',
    // '#title'       => '<h3>' . t('kym Theme Settings') . '</h3>',
    '#default_tab' => 'general',
  ];

  // Testing tab
  $form['test'] = [
    '#type'        => 'details',
    '#title'       => t('Test'),
    '#description' => t('<h3>Testing'),
    '#group'       => 'kym',
  ];

  // Color tab -> Settings.
  $form['test']['segment'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Testing segment'),
    '#description' => t('This feature is for testing purpose.'),
  ];

  // Color tab -> Settings.
  $form['test']['segment']['text'] = [
    '#type'        => 'textfield',
    '#title'       => t('Type anything'),
    '#default_value' => NULL, //theme_get_setting('footer_copyright'),
    '#description' => t("This field is for testing purpose. Not in use anywhere."),
  ];

  // General settings tab.
  $form['general'] = [
    '#type'        => 'details',
    '#title'       => t('General'),
    '#description' => t('<h3>Thanks for using kym Theme</h3>kym is a free Drupal 8, 9, 10 theme designed and developed by <a href="https://drupar.com" target="_blank">Drupar.com</a>'),
    '#group'       => 'kym',
  ];

  // Theme Color tab.
  $form['color'] = [
    '#type'        => 'details',
    '#title'       => t('Theme Color'),
    '#group'       => 'kym',
  ];

  // Social tab.
  $form['social'] = [
    '#type'        => 'details',
    '#title'       => t('Social'),
    '#description' => t('Social icons settings. These icons appear in header and footer region.'),
    '#group'       => 'kym',
  ];

  // Slider tab.
  $form['slider'] = [
    '#type'        => 'details',
    '#title'       => t('Homepage Slider'),
    '#description' => t('<h3>Manage Homepage Slider</h3>'),
    '#group'       => 'kym',
  ];

  // Header tab.
  $form['header'] = [
    '#type'        => 'details',
    '#title'       => t('Header'),
    '#group'       => 'kym',
  ];

  // Sidebar tab.
  $form['sidebar'] = [
    '#type'        => 'details',
    '#title'       => t('Sidebar'),
    '#group'       => 'kym',
  ];

  // Content tab.
  $form['content'] = [
    '#type'        => 'details',
    '#title'       => t('Content'),
    '#group'       => 'kym',
  ];

  // Footer tab.
  $form['footer'] = [
    '#type'  => 'details',
    '#title' => t('Footer'),
    '#group'       => 'kym',
  ];

  // Insert codes.
  $form['insert_codes'] = [
    '#type'        => 'details',
    '#title'       => t('Insert Codes'),
    '#group'       => 'kym',
  ];

  // Support tab.
  $form['support'] = [
    '#type'        => 'details',
    '#title'       => t('Support'),
    '#group'       => 'kym',
  ];

  // Upgrade to kympro tab.
  $form['upgrade'] = [
    '#type'        => 'details',
    '#title'       => t('Upgrade to TaraPro'),
    '#description' => t('<h3>Upgrade To TaraPro For $29 Only.</h3>'),
    '#group'       => 'kym',
  ];

  // Content under general tab.
  $form['general']['general_info'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Theme Info'),
    '#description' => t('<a href="https://drupar.com/theme/tara" target="_blank">Theme Homepage</a> || <a href="https://demo2.drupar.com/kym/" target="_blank">Theme Demo</a> || <a href="https://drupar.com/kym-theme-documentation" target="_blank">Theme Documentation</a> || <a href="https://drupar.com/node/2912/" target="_blank">Theme Support</a>'),
  ];

  $form['general']['general_info_upgrade'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Upgrade To TaraPro for $29 only'),
    '#description' => t('<a href="https://drupar.com/theme/tarapro" target="_blank">Purchase TaraPro</a> || <a href="https://demo2.drupar.com/tarapro/" target="_blank">TaraPro Demo</a>'),
  ];

  // Color tab -> Settings.
  $form['color']['theme_color'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Theme Color'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  // Settings under social tab.
  // Show or hide all icons.
  $form['social']['all_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Show Social Icons'),
  ];

  $form['social']['all_icons']['all_icons_show'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Show social icons for testing purpose'),
    '#default_value' => theme_get_setting('all_icons_show', 'kym'),
    '#description' => t("Check this option to show social icons in header and footer. Uncheck to hide."),
  ];

  $form['social']['header_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Show Social Icons on Header'),
  ];

  $form['social']['header_icons']['show_header_icon'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Show Social Icons in Header'),
    '#default_value' => theme_get_setting('show_header_icon', 'kym'),
    '#description' => t("Check this option to show social icons in header. Uncheck to hide."),
  ];

  $form['social']['footer_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Show Social Icons on Footer'),
  ];

  $form['social']['footer_icons']['show_footer_icon'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Show Social Icons in Footer'),
    '#default_value' => theme_get_setting('show_footer_icon', 'kym'),
    '#description' => t("Check this option to show social icons in footer. Uncheck to hide."),
  ];

  $form['social']['footer_icons']['footer_icon_hashtag'] = [
    '#type'        => 'textfield',
    '#title'       => t('Enter Company HashTag Text (Feature added by CMG Developer)'),
    '#default_value' => theme_get_setting('footer_icon_hashtag', 'kym'),
    '#description' => t("Type specific text to show as HashTag text. Leave the field blank to hide this feature."),
  ];

  //Social Media Content
  // Social -> Facebook.
  $form['social']['facebook'] = [
    '#type'        => 'details',
    '#title'       => t("Facebook"),
  ];

  $form['social']['facebook']['facebook_url'] = [
    '#type'        => 'textfield',
    '#title'       => t('Facebook Url'),
    '#description' => t("Enter yours facebook profile or page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('facebook_url', 'kym'),
  ];

  // // Social -> github.
  // $form['social']['github'] = [
  //   '#type'        => 'details',
  //   '#title'       => t("Github"),
  // ];

  // $form['social']['github']['github_url'] = [
  //   '#type'        => 'textfield',
  //   '#title'       => t('Github'),
  //   '#description' => t("Enter yours github url. Leave the url field blank to hide this icon."),
  //   '#default_value' => theme_get_setting('github_url', 'kym'),
  // ];

  // Social -> Instagram.
  $form['social']['instagram'] = [
    '#type'        => 'details',
    '#title'       => t("Instagram"),
  ];

  $form['social']['instagram']['instagram_url'] = [
    '#type'        => 'textfield',
    '#title'       => t('Instagram Url'),
    '#description' => t("Enter yours instagram page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('instagram_url', 'kym'),
  ];

  // // Social -> Linkedin.
  // $form['social']['linkedin'] = [
  //   '#type'        => 'details',
  //   '#title'       => t("Linkedin"),
  // ];

  // $form['social']['linkedin']['linkedin_url'] = [
  //   '#type'        => 'textfield',
  //   '#title'       => t('Linkedin Url'),
  //   '#description' => t("Enter yours linkedin page url. Leave the url field blank to hide this icon."),
  //   '#default_value' => theme_get_setting('linkedin_url', 'kym'),
  // ];

  // // Social -> Telegram.
  // $form['social']['telegram'] = [
  //   '#type'        => 'details',
  //   '#title'       => t("Telegram"),
  // ];

  // $form['social']['telegram']['telegram_url'] = [
  //   '#type'        => 'textfield',
  //   '#title'       => t('Telegram'),
  //   '#description' => t("Enter yours telegram url. Leave the url field blank to hide this icon."),
  //   '#default_value' => theme_get_setting('telegram_url', 'kym'),
  // ];

  // Social -> TikTok.
  $form['social']['tiktok'] = [
    '#type'        => 'details',
    '#title'       => t("TikTok"),
  ];

  $form['social']['tiktok']['tiktok_url'] = [
    '#type'        => 'textfield',
    '#title'       => t('TikTok'),
    '#description' => t("Enter yours TikTok url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('tiktok_url', 'kym'),
  ];

  // // Social -> Twitter.
  // $form['social']['twitter'] = [
  //   '#type'        => 'details',
  //   '#title'       => t("Twitter"),
  // ];

  // $form['social']['twitter']['twitter_url'] = [
  //   '#type'        => 'textfield',
  //   '#title'       => t('Twitter Url'),
  //   '#description' => t("Enter yours twitter page url. Leave the url field blank to hide this icon."),
  //   '#default_value' => theme_get_setting('twitter_url', 'kym'),
  // ];

  // // Social -> Vimeo.
  // $form['social']['vimeo'] = [
  //   '#type'        => 'details',
  //   '#title'       => t("Vimeo"),
  // ];

  // $form['social']['vimeo']['vimeo_url'] = [
  //   '#type'        => 'textfield',
  //   '#title'       => t('Vimeo Url'),
  //   '#description' => t("Enter yours vimeo.com page url. Leave the url field blank to hide this icon."),
  //   '#default_value' => theme_get_setting('vimeo_url', 'kym'),
  // ];

  // // Social -> vk.com url.
  // $form['social']['vk'] = [
  //   '#type'        => 'details',
  //   '#title'       => t("vk.com"),
  // ];

  // $form['social']['vk']['vk_url'] = [
  //   '#type'        => 'textfield',
  //   '#title'       => t('vk.com'),
  //   '#description' => t("Enter yours vk.com page url. Leave the url field blank to hide this icon."),
  //   '#default_value' => theme_get_setting('vk_url', 'kym'),
  // ];

  // Social -> Whatsapp.
  // $form['social']['whatsapp'] = [
  //   '#type'        => 'details',
  //   '#title'       => t("WhatsApp"),
  // ];

  // $form['social']['whatsapp']['whatsapp_url'] = [
  //   '#type'        => 'textfield',
  //   '#title'       => t('WhatsApp'),
  //   '#description' => t("Enter yours whatsapp url. Leave the url field blank to hide this icon."),
  //   '#default_value' => theme_get_setting('whatsapp_url', 'kym'),
  // ];

  // Social -> YouTube.
  // $form['social']['youtube'] = [
  //   '#type'        => 'details',
  //   '#title'       => t("YouTube"),
  // ];

  // $form['social']['youtube']['youtube_url'] = [
  //   '#type'        => 'textfield',
  //   '#title'       => t('YouTube Url'),
  //   '#description' => t("Enter yours youtube.com page url. Leave the url field blank to hide this icon."),
  //   '#default_value' => theme_get_setting('youtube_url', 'kym'),
  // ];

  /**
   * Slider Settings
   */
  // Show or hide slider on homepage.
  $form['slider']['slider_enable_option'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Enable Built-in Slider'),
  ];

  $form['slider']['slider_enable_option']['slider_show'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Show Theme Built-in Slider on Homepage.'),
    '#default_value' => theme_get_setting('slider_show', 'kym'),
    '#description' => t("Check this option to show slider on homepage. Uncheck to hide."),
  ];

  // Slider -> Image upload.
  $form['slider']['slider_image_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Slider Background Image'),
  ];

  $form['slider']['slider_image_section']['slider_image'] = [
    '#type'        => 'managed_file',
    '#upload_location' => 'public://',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg svg'),
    ),
    '#title'  => t('<p>Upload Slider Image</p>'),
    '#default_value'  => theme_get_setting('slider_image', 'kym'),
    '#description' => t('<p>Recommended image size is 1920px (width) X 1080px (height).</p><p>kym theme has limitation of single image for slider. Separate image for each slide is available in TaraPro. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a></p>'),
  ];

  $form['slider']['slider_time_field'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Autoplay Interval Time'),
  ];

  $form['slider']['slider_time_field']['slider_autoplay'] = [
    '#type'        => 'select',
    '#title'       => t('Make Slider Autoplay'),
    '#options'     => array(
      'true'      => t('Yes'),
      'false'     => t('No')
    ),
    '#default_value' => theme_get_setting('slider_autoplay', 'kym'),
    '#description' => t('Make the slider autoplay upon page loaded.'),
  ];

  $form['slider']['slider_time_field']['slider_time'] = [
    '#type'        => 'number',
    '#default_value' => theme_get_setting('slider_time', 'kym'),
    '#title'       => t('Enter slider interval time between two slides'),
    '#description' => t('Time interval between two slides. Default value is 5000, this means 5 seconds.'),
  ];

  $form['slider']['slider_navigation_field'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Slider Next & Previous Navigation'),
  ];

  $form['slider']['slider_navigation_field']['slider_navigation'] = [
    '#type'        => 'select',
    '#title'       => t('Show or Hide Slider Next & Previous Navigation button'),
    '#options'     => array(
      'true'      => t('Show'),
      'false'     => t('Hide')
    ),
    '#default_value' => theme_get_setting('slider_navigation', 'kym'),
    '#description' => t('Show or hide navigation (Next & Previous) button on the slider.'),
  ];

  $form['slider']['slider_dots_field'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Slider Dots Navigation'),
  ];

  $form['slider']['slider_dots_field']['slider_dots'] = [
    '#type'        => 'select',
    '#title'       => t('Show or Hide Slider Dots Navigation'),
    '#options'     => array(
      'true'      => t('Show'),
      'false'     => t('Hide')
    ),
    '#default_value' => theme_get_setting('slider_dots', 'kym'),
    '#description' => t('Show or hide slider dots navigation that appears at the bottom of slider.'),
  ];

  $form['slider']['slider_code'] = [
    '#type'        => 'textarea',
    '#title'       => t('Slider Code'),
    '#default_value' => theme_get_setting('slider_code', 'kym'),
    '#description' => t('Please refer to this <a href="https://drupar.com/kym-theme-documentation/how-manage-homepage-slider" target="_blank">documentation page</a> for slider code tutorial.'),
  ];

  // Settings under header tab.
  $form['header']['sticky_header'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Sticky Header'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  $form['header']['sticky_header']['header_sticky'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Show as sticky header where header will always shown even scroll down. (Feature added by CMG Developer)'),
    '#default_value' => theme_get_setting('header_sticky', 'kym'),
    '#description' => t("Check this option to show header as sticky header. A 'sticky' class will be added in header."),
  ];

  // Settings under sidebar.
  // Sidebar -> Frontpage sidebar
  $form['sidebar']['front_sidebars'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Homepage Sidebar'),
  ];

  $form['sidebar']['front_sidebars']['front_sidebar'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Show Sidebars On Homepage'),
    '#default_value' => theme_get_setting('front_sidebar', 'kym'),
    '#description' => t('Check this option to enable left and right sidebar on homepage.'),
  ];

  $form['sidebar']['animated_sidebar'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Animated Sidebar'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  /**
   * Content
   */
  $form['content']['content_tab'] = [
    '#type'        => 'vertical_tabs',
  ];

  // Content -> Homepage  content
  $form['content_tab']['home_content'] = [
    '#type'        => 'details',
    '#title'       => t('Homepage content'),
    '#description' => t('Please follow this tutorials to add content on homepage.</p><ul>
    <li><a href="https://drupar.com/node/681/" target="_blank">How To Create Homepage</a></li>
    <li><a href="https://drupar.com/node/631/" target="_blank">How to add content on homepage</a></li></ul>'),
    '#group'       => 'content_tab',
  ];

  // Content -> Page loader
  $form['content_tab']['preloader'] = [
    '#type'        => 'details',
    '#title'       => t('Pre Page Loader'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
    '#group'       => 'content_tab',
  ];

  // Content -> Animated Content
  $form['content_tab']['animated_content'] = [
    '#type'        => 'details',
    '#title'       => t('Animated Content'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
    '#group'       => 'content_tab',
  ];

  // Content -> Google fonts
  $form['content_tab']['font_tab'] = [
    '#type'        => 'details',
    '#title'       => t('Google Fonts'),
    '#description' => t(''),
    '#group'       => 'content_tab',
  ];

  // Content -> Font icons
  $form['content_tab']['icon_tab'] = [
    '#type'        => 'details',
    '#title'       => t('Font Icon'),
    '#description' => t(''),
    '#group'       => 'content_tab',
  ];

  // Content -> shortcodes
  $form['content_tab']['shortcode'] = [
    '#type'        => 'details',
    '#title'       => t('Shortcodes'),
    '#description' => t('kym theme has some custom shortcodes. You can create some styling content using these shortcodes.<br />Please visit this tutorial page for details. <a href="https://drupar.com/kym-theme-documentation/kym-shortcodes" target="_blank">Shortcodes in kym theme</a>.'),
    '#group'       => 'content_tab',
  ];

  // Content -> comment
  $form['content_tab']['comment'] = [
    '#type'        => 'details',
    '#title'       => t('Comment'),
    '#description' => t(''),
    '#group'       => 'content_tab',
  ];

  // Content -> node
  $form['content_tab']['node'] = [
    '#type'        => 'details',
    '#title'       => t('Node'),
    '#description' => t(''),
    '#group'       => 'content_tab',
  ];

  // Content -> share page
  $form['content_tab']['node_share'] = [
    '#type'        => 'details',
    '#title'       => t('Share Page'),
    '#description' => t('<h3>Share Page On Social Media</h3><p>This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a></p>'),
    '#group'       => 'content_tab',
  ];

  // Content -> Google fonts options
  $form['content_tab']['font_tab']['font_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Google Fonts'),
  ];

  $form['content_tab']['font_tab']['font_section']['google_font'] = [
    '#type'        => 'select',
    '#title'       => t('Select Google Fonts Location'),
    '#options'     => array(
    	'local'     => t('Local Self Hosted'),
      'googlecdn' => t('Google CDN Server')
    ),
    '#default_value' => theme_get_setting('google_font', 'kym'),
    '#description' => t('kym theme uses following Google fonts: Open Sans, Roboto and Poppins. You can serve these fonts locally or from Google server.'),
  ];

  // Content -> Font icons -> FontAwesome 4
  $form['content_tab']['icon_tab']['fontawesome'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Using FontAwesome'),
  ];

  $form['content_tab']['icon_tab']['fontawesome']['font_awesome'] = [
    '#type'        => 'select',
    '#title'       => t('Select which version FontAwesome to use.'),
    '#options'     => array(
      ''             => t('None'),
      'fontawesome4' => t('FontAwesome 4'),
      'fontawesome5' => t('FontAwesome 5'),
      'fontawesome6' => t('FontAwesome 6')
    ),
    '#default_value' => theme_get_setting('font_awesome', 'kym'),
    '#description' => t('FontAwesome is a CSS module to show icon by using tag &lt;i&gt; in html code.'),
  ];

  // Content -> Font icons -> FontAwesome 4
  $form['content_tab']['icon_tab']['fontawesome4'] = [
    '#type'        => 'fieldset',
    '#title'       => t('FontAwesome 4'),
  ];

  $form['content_tab']['icon_tab']['fontawesome4']['fontawesome_four'] = [
    // '#type'        => 'checkbox',
    // '#title'       => t('Enable FontAwesome 4 Font Icons'),
    // '#default_value' => theme_get_setting('fontawesome_four'),
    '#description' => t('<p>Check this option to enable fontawesome version 4 font icons.</p><p><a href="https://drupar.com/node/665/">How to use FontAwesome 4</a></p>'),
  ];

  // Content -> Font icons -> FontAwesome 5
  $form['content_tab']['icon_tab']['fontawesome5'] = [
    '#type'        => 'fieldset',
    '#title'       => t('FontAwesome 5'),
    '#description' => t('<mark>Do not enable both FontAwesome 5 and FontAwesome 6</mark>'),
  ];

  $form['content_tab']['icon_tab']['fontawesome5']['fontawesome_five'] = [
    // '#type'        => 'checkbox',
    // '#title'       => t('Enable FontAwesome 5 Font Icons'),
    // '#default_value' => theme_get_setting('fontawesome_five'),
    '#description' => t('<p>Check this option to enable fontawesome version 5 font icons.</p><p><a href="https://drupar.com/node/2913/">How to use FontAwesome 5</a></p>'),
  ];

  // Content -> Font icons -> FontAwesome 6
  $form['content_tab']['icon_tab']['fontawesome6'] = [
    '#type'        => 'fieldset',
    '#title'       => t('FontAwesome 6'),
    '#description' => t('<mark>Do not enable both FontAwesome 5 and FontAwesome 6</mark>'),
  ];

  $form['content_tab']['icon_tab']['fontawesome6']['fontawesome_six'] = [
    // '#type'        => 'checkbox',
    // '#title'       => t('Enable FontAwesome 6 Font Icons'),
    // '#default_value' => theme_get_setting('fontawesome_six'),
    '#description' => t('<p>Check this option to enable fontawesome version 6 font icons.</p><p><a href="https://drupar.com/node/2914/">How to use FontAwesome 6</a></p>'),
  ];

  // Content -> Font icons -> Bootstrap Font Icons
  $form['content_tab']['icon_tab']['bootstrap_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Bootstrap Font Icons'),
  ];

  $form['content_tab']['icon_tab']['bootstrap_icons']['bootstrapicons'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Enable Bootstrap Icons'),
    '#default_value' => theme_get_setting('bootstrapicons', 'kym'),
    '#description' => t('Check this option to enable Bootstrap Font Icons. Read more about <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a>'),
  ];

  // Content -> Font icons -> Google material font icons
  $form['content_tab']['icon_tab']['material'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Google Material Font Icons'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  // Content -> Font icons -> iconmonstr
  $form['content_tab']['icon_tab']['iconmonstr'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Iconmonstr Font Icons'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  // Content -> comment -> user picture in comment
  $form['content_tab']['comment']['comment_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Comment'),
  ];

  $form['content_tab']['comment']['comment_section']['comment_user_pic'] = [
    '#type'        => 'checkbox',
    '#title'       => t('User Picture in comments'),
    '#default_value' => theme_get_setting('comment_user_pic', 'kym'),
    '#description' => t("Check this option to show user picture in comment. Uncheck to hide."),
  ];

  // Content -> node -> Node author picture
  $form['content_tab']['node']['node_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Node'),
  ];

  $form['content_tab']['node']['node_section']['node_author_pic'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Node Author Picture'),
    '#default_value' => theme_get_setting('node_author_pic', 'kym'),
    '#description' => t("Check this option to show node author picture in submitted details. Uncheck to hide."),
  ];

  // Show tags in node submitted.
  $form['content_tab']['node']['node_section']['node_tags'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Node Tags'),
    '#default_value' => theme_get_setting('node_tags', 'kym'),
    '#description' => t("Check this option to show node tags (if any) in submitted details. Uncheck to hide."),
  ];

  // Settings under footer tab.
  // Scroll to top.
  $form['footer']['fixed_footer'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Fixed Footer'),
    '#description' => t('Feature added by CMG Developer.'),
  ];

  $form['footer']['fixed_footer']['footer_fixed'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Show as fixed footer where footer will always shown as a fixed position.'),
    '#default_value' => theme_get_setting('footer_fixed', 'kym'),
    '#description' => t("Check this option to show footer as fixed footer. A 'fixed' class will be added in footer."),
  ];

  // Scroll to top.
  $form['footer']['scrolltotop'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Scroll To Top'),
  ];

  $form['footer']['scrolltotop']['scrolltotop_on'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Enable scroll to top feature.'),
    '#default_value' => theme_get_setting('scrolltotop_on', 'kym'),
    '#description' => t("Check this option to enable scroll to top feature. Uncheck to disable this fearure and hide scroll to top icon."),
  ];

  // Footer -> Copyright.
  $form['footer']['copyright'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Website Copyright Text'),
  ];

  $form['footer']['copyright']['show_copyright'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Show website copyright text in footer.'),
    '#default_value' => theme_get_setting('show_copyright', 'kym'),
    '#description' => t("Check this option to show website copyright text in footer. Uncheck to hide."),
  ];

  // Footer -> Copyright -> custom copyright text
  $form['footer']['copyright']['copyright_text_custom'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Custom copyright text'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  $form['footer']['copyright']['copyright_text_custom']['copyright_text'] = [
    '#type'        => 'textfield',
    '#title'       => t('Enter Copyright Text (Feature added by CMG Developer)'),
    '#default_value' => theme_get_setting('copyright_text', 'kym'),
    '#description' => t("Type %year% instead of an actual number for a dynamic copyright year. (Copyright © %year% Company Name - All rights reserved)."),
  ];

  // Footer -> Cookie message.
  $form['footer']['cookie'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Cookie Consent message'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  $form['footer']['cookie']['cookie_message'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Show Cookie Consent Message'),
    '#description' => t('Make your website EU Cookie Law Compliant. According to EU cookies law, websites need to get consent from visitors to store or retrieve cookies.'),
  ];

  /**
   * Insert Codes
   */
  $form['insert_codes']['insert_codes_tab'] = [
    '#type'  => 'vertical_tabs',
  ];
  // Insert Codes -> Head
  $form['insert_codes']['head'] = [
    '#type'        => 'details',
    '#title'       => t('Head'),
    '#description' => t('<h3>Insert Codes Before &lt;/HEAD&gt;</h3><hr />'),
    '#group'       => 'insert_codes_tab',
  ];
  // Insert Codes -> Body
  $form['insert_codes']['body'] = [
    '#type'        => 'details',
    '#title'       => t('Body'),
    '#group'       => 'insert_codes_tab',
  ];
  // Insert Codes -> CSS
  $form['insert_codes']['css'] = [
    '#type'        => 'details',
    '#title'       => t('CSS Codes'),
    '#group'       => 'insert_codes_tab',
  ];
  // Insert Codes -> Head -> Head codes
  $form['insert_codes']['head']['insert_head'] = [
    '#type'        => 'fieldset',
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  // Insert Codes -> Body -> Body start codes
  $form['insert_codes']['body']['insert_body_start_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Insert code after &lt;BODY&gt; tag'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  // Insert Codes -> Body -> Body ENd codes
  $form['insert_codes']['body']['insert_body_end_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Insert code before &lt;/BODY&gt; tag'),
    '#description' => t('This feature is available in the premium version of this theme. <a href="https://drupar.com/theme/tarapro" target="_blank">Buy TaraPro for $29 only.</a>'),
  ];

  // Insert Codes -> css
  $form['insert_codes']['css']['css_custom'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Addtional CSS'),
  ];

  $form['insert_codes']['css']['css_custom']['css_extra'] = [
    '#type'        => 'checkbox',
    '#title'       => t('Enable Addtional CSS'),
    '#default_value' => theme_get_setting('css_extra', 'kym'),
    '#description' => t("Check this option to enable additional styling / css. Uncheck to disable this feature."),
  ];

  $form['insert_codes']['css']['css_code'] = [
    '#type'        => 'textarea',
    '#title'       => t('Addtional CSS Codes'),
    '#default_value' => theme_get_setting('css_code', 'kym'),
    '#description' => t('Add your own CSS codes here to customize the appearance of your site. Please refer to this tutorial for detail: <a href="https://drupar.com/kym-theme-documentation/custom-css" target="_blank">Custom CSS</a>'),
  ];

  // Settings under support tab.
  $form['support']['info'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Theme Support'),
    '#description' => t('<h4>Documentation</h4>
    <p>We have a detailed documentation about how to use theme. Please read the <a href="https://drupar.com/kym-theme-documentation" target="_blank">kym Theme Documentation</a>.</p>
    <hr />
    <h4>Open An Issue</h4>
    <p>If you need support that is beyond our theme documentation, please <a href="https://www.drupal.org/project/issues/kym?categories=All" target="_blank">open an issue</a> at project page.</p>
    <hr />
    <h4>Contact Us</h4>
    <p>If you need some specific customization in theme, please contact us<br><a href="https://drupar.com/contact" target="_blank">drupar.com/contact</a></p>'),
  ];

  // Settings under upgrade tab.
  $form['upgrade']['info'] = [
    '#type'        => 'fieldset',
    '#title'       => t('<a href="https://demo2.drupar.com/tarapro/" target="_blank">TaraPro Demo</a> | <a href="https://drupar.com/theme/tarapro" target="_blank">Purchase TaraPro for $29 only</a>'),
    '#description' => t("$img<br /><a href='https://demo2.drupar.com/tarapro/' target='_blank'>TaraPro Demo</a> | <a href='https://drupar.com/theme/tarapro' target='_blank'>Purchase TaraPro for $29 only</a>"),
  ];
// End form.
}
