<?php

use ouaaz\Http\Request;
use ouaaz\Http\Response;
use ouaaz\Http\Route;

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../routes/web.php';

$route = new Route(new Request, new Response);


$route->resolve();