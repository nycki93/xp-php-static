<?php 
putenv('include_path='.__DIR__.'/../include'.PATH_SEPARATOR.__DIR__);
exec('php -S localhost:8000 -t public -c php.ini');
