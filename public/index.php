<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

require_once "../vendor/autoload.php";
require_once "../app/config/app.php";

use \Luracast\Restler\Restler;

$r = new \Luracast\Restler\Restler();

foreach($config['loaded_controllers'] as $c)
	$r->addAPIClass($c);

$r->addAPIClass($config['default_controller'], '');

$r->addAPIClass('Resources');
$r->handle();
