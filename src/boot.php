<?php

/**
 * * Arquivo responsável por iniciar configurações de componentes.
 * * Iniciar o autoload de classes.
*/

require __DIR__ . '/../vendor/autoload.php';

// php params
startPhpParams();

// Whoops
$whoopsErrorHandler = new \Whoops\Run;
$whoopsErrorHandler->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoopsErrorHandler->register();
