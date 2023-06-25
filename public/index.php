<?php

require '../vendor/autoload.php';

use Azcend\Router;

$_ENV = parse_ini_file('../.env');
Router::contentToRender();