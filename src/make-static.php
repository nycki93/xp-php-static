<?php
$config = include_once 'config.php';
$base_uri = $config['base_uri'];

/**
 * recursively list all files in a directory and its subdirectories.
 *
 * @param string $root
 * @return Generator<string>
 */
function list_files($root) {
  foreach(scandir($root) as $file) {
    if ($file == '.' || $file == '..') continue;
    $file = "$root/$file";
    if (is_dir($file)) {
      yield from list_files($file);
    } else {
      yield $file;
    }
  }
}

/**
 * compile a php file to html.
 *
 * @param string $path_in
 * @param string $path_out
 * @return void
 */
function compile_php($path_in, $path_out) {
  global $config;
  $dir_out = pathinfo($path_out)['dirname'];
  if (!file_exists($dir_out)) {
    mkdir($dir_out, 0777, true);
  }

  $_SERVER['REQUEST_URI'] = substr($path_in, strlen($config['input_root']));
  ob_start();
  include($path_in);
  $buffer = ob_get_contents();
  ob_end_clean();
  file_put_contents($path_out, $buffer);
}

function main() {
  global $config;
  foreach(list_files($config['input_root']) as $path_in) {
    $path_parts = pathinfo($path_in);
    $path_out = $config['output_root'] . substr($path_in, strlen($config['input_root']));
    if ($path_parts['extension'] == 'php') {
      $path_out = substr($path_out, 0, -strlen('php')) . 'html';
      compile_php($path_in, $path_out);
    } else {
      copy($path_in, $path_out);
    }
  }
}

main();
