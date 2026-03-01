<?php
$config = include_once 'config.php';

function compile_php($path_in, $path_out) {
  $dir_out = pathinfo($path_out)['dirname'];
  if (!file_exists($dir_out)) {
    mkdir($dir_out, 0777, true);
  }

  ob_start();
  include($path_in);
  $buffer = ob_get_contents();
  ob_end_clean();
  file_put_contents($path_out, $buffer);
}

function list_files($root) {
  $result = [];
  foreach(scandir($root) as $file) {
    if (substr($file, 0, 1) == '.') continue;
    $file = $root . '/' . $file;
    if (is_dir($file)) {
      $result = array_merge($result, list_files($file));
    } else {
      $result[] = $file;
    }
  }
  return $result;
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
