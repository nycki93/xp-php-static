<?php
// used for image preview embeds. set this in src/config.php if you want to change it for static builds. 
$base_uri ??= $_SERVER['HTTP_HOST'];

// relative url from the current path back up to the root of the site. used for relative hrefs, for instance when including stylesheets.
function back_path($path=null) {
  $path ??= $_SERVER['REQUEST_URI'];
  return str_repeat('../', count(explode('/', $path)) - 2);
}
