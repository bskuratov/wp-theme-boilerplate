<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package stone-theme
 */

 //Exclude node_modules folder from export
 // ==========
 add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {
  $exclude_filters[] = 'themes/'.wp_get_theme()->template.'/node_modules';
  return $exclude_filters;
});

/* ACF options */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

// function modify_mce_editor( $settings ) {
//   $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;';
//   $style_formats = array(
//     array(
//         'title' => 'Lead-Text',
//         'selector' => 'p',
//         'classes' => 'text-lead',
//     )
//   );
//   $settings['style_formats'] = json_encode( $style_formats );
//   return $settings;
// }
// add_filter( 'tiny_mce_before_init',  'modify_mce_editor' );

// // Callback function to insert 'styleselect' into the $buttons array
// function my_new_mce_buttons( $buttons ) {
//   array_unshift( $buttons, 'styleselect' );
//   return $buttons;
// }
// add_filter( 'mce_buttons', 'my_new_mce_buttons' );

// // Registers an editor stylesheet for the theme.
// function theme_add_editor_styles() {
//     add_editor_style( 'css/custom-editor-style.css' );
// }
// add_action( 'admin_init',   'theme_add_editor_styles' );

/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the template as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 */
// function _get_template_part($file, $template_args = array())
// {
//   $template_args = wp_parse_args($template_args);
//   $file = get_template_directory() . '/' . $file . '.php';
//   ob_start();
//   $return = require $file;
//   echo ob_get_clean();
// }
