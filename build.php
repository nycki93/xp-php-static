<?php

if (!class_exists('Dom\HTMLDocument')) {
  echo("HTMLDocument does not exist. install it with\napt install php-xml\nphpenmod dom\n");
  return;
}

$base_in = 'content';
$base_out = 'site';

function compile_php($path) {
  global $base_in;
  global $base_out;
  $path_parts = pathinfo($path);
  $path_in = $base_in . $path;
  $dir_out = $base_out . $path_parts['dirname'];
  if (!file_exists($dir_out)) {
    mkdir($dir_out, 0777, true);
  }
  $path_out = $dir_out . $path_parts['filename'] . '.html';

  ob_start();
  include($path_in);
  $buffer = ob_get_contents();
  ob_end_clean();

  file_put_contents($path_out, $buffer);

  $doc = Dom\HTMLDocument::createFromString($buffer, LIBXML_HTML_NOIMPLIED);
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
