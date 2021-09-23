<?php

/**
 * inicia parâmetros do PHP
 * @return void
*/
function startPhpParams(): void
{
    error_reporting(E_ALL);
    ini_set('display_errors',env('CONF_PHP_DISPLAY_ERRORS'));

    date_default_timezone_set('America/Sao_Paulo');

    session_start();
}

/**
 * @param string $config_param | Parâmetro de configuração para retorno. (index em env.php)
 * @return null|string
*/
function env(string $config_param): ?string {

    $configs = require __DIR__ . '/../env.php';

    if ( array_key_exists($config_param, $configs) ) {
        return $configs [ $config_param ];
    }

    return null;
}