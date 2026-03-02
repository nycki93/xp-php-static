<?php 
putenv('include_path='.__DIR__.PATH_SEPARATOR.__DIR__.'/../include');
exec('php -S localhost:8000 -t public -c php.ini');
