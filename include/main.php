<?php
// used for image previews on discord, bsky, etc.
$base_uri = 'example.org'; 

if (getenv('static')) {
  $_SERVER['HTTP_HOST'] = $base_uri;
}

function back_path($path=null) {
  $path ??= $_SERVER['REQUEST_URI'];
  return str_repeat('../', count(explode('/', $path)) - 2);
}
