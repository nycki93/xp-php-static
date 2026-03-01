<?php
$base_uri ??= 'http://localhost:8000';
function back_path($path=null) {
  $path ??= $_SERVER['REQUEST_URI'];
  return str_repeat('../', count(explode('/', $path)) - 2);
}
