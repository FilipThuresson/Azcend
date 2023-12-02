<?php

require '../vendor/autoload.php';

use Azcend\Router;

session_start();
$_ENV = parse_ini_file('../.env');

Router::contentToRender();
