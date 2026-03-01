<?php
function from_root($path) {
  $back = str_repeat('../', count(explode('/', $_SERVER['REQUEST_URI'])) - 2);
  return $back . $path;
}
