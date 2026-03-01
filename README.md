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

## where do i put stuff?

everything in /public/ will be copied to the output. put your main site here, including html and images.

everything in /include/ will be available while building, but won't be included in the output. put snippets here, like your page header.

everything else you can leave as-is.

## build

test your site with

```
php src/serve.php
```

this is a live preview server that will re-render the page each time you refresh. press ctrl+c to stop the server.

when you're ready, compile to a static site with

```
php src/make-static.php
```
