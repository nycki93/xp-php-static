<?php
set_include_path(__DIR__);

function from_root($path) {
  $back = str_repeat('../', count(explode('/', $_SERVER['REQUEST_URI'])) - 2);
  return $back . $path;
}

return [
  'input_root' => 'public',
  'output_root' => 'out',
];
