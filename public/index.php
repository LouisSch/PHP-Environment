<?php

require_once '../vendor/autoload.php';

use GuzzleHttp\Psr7\ServerRequest;
use Louis\PhpSch\App;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$app = new App();
$app->run();