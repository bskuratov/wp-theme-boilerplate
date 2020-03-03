<?php
/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the template as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 */
function _get_template_part($file, $template_args = array())
{
  $template_args = wp_parse_args($template_args);
  $file = get_template_directory() . '/' . $file . '.php';
  ob_start();
  $return = require $file;
  echo ob_get_clean();
}
