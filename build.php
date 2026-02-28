<?php

function compile_php($path) {
  ob_start();
  include("content" . $path . ".php");
  $buffer = ob_get_contents();
  ob_end_clean();
  file_put_contents("site" . $path . ".html", $buffer)
}

compile_php("/index")
