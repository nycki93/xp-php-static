# xp-php-static

a static site builder that compiles php to html

## install

debian/ubuntu:

```
sudo apt install php
```

windows:

(TODO: test on windows)

```
winget install PHP.PHP
```

## editing

put your stuff in /public

test your site with

```
php -S localhost:8000 -t public -c php.ini
```

compile to a static site with

```
php src/make-static.php
```
