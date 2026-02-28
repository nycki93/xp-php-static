<?php
use Dom\HTMLDocument as HTMLDocument;

if (!extension_loaded('dom')) {
  echo("cannot find DOM extension. install it with\nsudo apt install php-xml\nsudo phpenmod dom\n");
  return;
}

$config = include('config.php');
var_dump($config);

$base_in = 'content';
$base_out = 'site';

function compile_php($path) {
  global $config;
  $path_parts = pathinfo($path);
  $path_in = $config['input_root'] . $path;
  $dir_out = $config['output_root'] . $path_parts['dirname'];
  if (!file_exists($dir_out)) {
    mkdir($dir_out, 0777, true);
  }
  $path_out = $dir_out . $path_parts['filename'] . '.html';

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

  var_dump($hrefs);
}

compile_php("/index.php");
