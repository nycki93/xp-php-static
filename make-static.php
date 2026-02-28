<?php
use Dom\HTMLDocument as HTMLDocument;

if (!extension_loaded('dom')) {
  echo("cannot find DOM extension. install it with\nsudo apt install php-xml\nsudo phpenmod dom\n");
  return;
}

$config = include('config.php');

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

  $doc = HTMLDocument::createFromString($buffer, LIBXML_HTML_NOIMPLIED);
  $hrefs = [];
  foreach ($doc->querySelectorAll('a') as $el) {
    foreach ($el->attributes as $attr) {
      if ($attr->nodeName == 'href') {
        $hrefs[] = $attr->nodeValue;
      }
    }
  }

  # var_dump(hrefs);
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