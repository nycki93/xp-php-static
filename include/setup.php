<?php
// relative url from the current path back up to the root of the site. used for relative hrefs, for instance when including stylesheets.
function back_path($path=null) {
  $path ??= $_SERVER['REQUEST_URI'];
  return str_repeat('../', count(explode('/', $path)) - 2);
}
