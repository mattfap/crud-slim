<?php

use function src\slimConfiguration;
use App\Controllers\CarrosController;

$app = new \Slim\App(slimConfiguration());

// ============================================================

$app->get('/', CarrosController::class . ':getCarros');

// ============================================================

$app->run();