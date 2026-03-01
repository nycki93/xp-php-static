<?php 
  global $base_uri;
  include_once 'setup.php';

  $title ??= 'default page title';
  $description ??= 'default page description';
  $image ??= "$base_uri/path/to/preview.png";
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
<meta property="og:image" content="<?= $image ?>"/>

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