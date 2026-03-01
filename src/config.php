<?php
$dir = __DIR__;
set_include_path("$dir/../include:$dir");
return [
  // directory containing your pages and assets.
  'input_root' => 'public',
  // directory where the compiled site will be saved. you can delete the output directory and recreate it as often as you like.
  'output_root' => '_out',
  // the base uri that will be used for preview images. if you want the little embeds in discord, set this to your actual website domain.
  'base_uri' => 'example.org',
];
