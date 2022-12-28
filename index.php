<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('menu', 'DefaultController');
Router::get('treatments', 'DefaultController');
Router::get('prices', 'DefaultController');
Router::get('prices2', 'DefaultController');
Router::get('team', 'DefaultController');
Router::get('registration', 'DefaultController');
Router::post('login', 'SecurityController');

Router::run($path);