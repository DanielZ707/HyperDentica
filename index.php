<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('treatments', 'DefaultController');
Router::get('prices', 'DefaultController');
Router::get('prices2', 'DefaultController');
Router::get('team', 'DefaultController');
Router::get('registration', 'DefaultController');
Router::get('dentist1', 'DefaultController');
Router::get('dentist2', 'DefaultController');
Router::get('dentist3', 'DefaultController');
Router::get('dentist4', 'DefaultController');
Router::get('bridges', 'DefaultController');
Router::get('canal', 'DefaultController');
Router::get('check', 'DefaultController');
Router::get('damon', 'DefaultController');
Router::get('crowns', 'DefaultController');
Router::get('fillings', 'DefaultController');
Router::get('hygienist', 'DefaultController');
Router::get('implants', 'DefaultController');
Router::get('invisalign', 'DefaultController');
Router::get('veneers', 'DefaultController');
Router::get('whitening', 'DefaultController');
Router::post('login', 'SecurityController');
Router::run($path);