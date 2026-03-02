<?php 
  $title ??= 'default page title';
  $description ??= 'default page description';
  $image ??= "/path/to/preview.png";

  // relative path to root
  $root_relative = str_repeat('../', count(explode('/', $_SERVER['REQUEST_URI'])) - 2);
  $root_absolute = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<base href="<?= back_path() ?>"/>

<title><?= $title ?></title>
<meta name="description" content="<?= $description ?>"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta property="og:title" content="<?= $title ?>"/>
<meta property="og:description" content="<?= $description ?>"/>
<meta property="og:image" content="<?= $root_absolute . $image ?>"/>

<link rel="stylesheet" href="style.css"/>

<nav>
  <a href="/">home</a>
  | <a href="/page2/">page2</a>
  | <a href="/page2/page3/">page3</a>
</nav>

<h1><?= $title ?></h1>
<p><em><?= $description ?></em></p>
<hr/>

<!-- end of header -->