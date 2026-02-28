# xp-php-static

a static site builder that compiles php to html

## install

debian/ubuntu:

```
sudo apt install php php-xml
sudo phpenmod dom
```

windows:

(TODO: test on windows)

```
winget install PHP.PHP
```

## editing

put your stuff in /content

copy config.sample.php to config.php

test your site with

```
php -S localhost:8000 -t content
```

compile to a static site with

```
php make-static.php
```
