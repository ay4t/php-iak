<?php

// show all php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Ay4t\IAK\Client;

$env        = parse_ini_file( __DIR__ . '/../.env');

require_once __DIR__ . '/../vendor/autoload.php';

$apiKey     = $env['IAK_API_KEY'];
$username   = $env['IAK_USERNAME'];
$isSandbox  = false;

$iak = new Client($apiKey, $username, $isSandbox);

// contoh untuk request balance
/* echo '<pre>';
print_r($iak->checkBalance());
echo '</pre>'; */

// contoh untuk get price lists
/* echo '<pre>';
print_r($iak->pricelist());
echo '</pre>'; */

// contoh untuk check operator
/* echo '<pre>';
print_r($iak->checkOperator('0822118888821'));
echo '</pre>'; */
