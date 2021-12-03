<?php
echo 'test';
exit;

const VERSION = '1.0.0';

$server_name = $_SERVER['SERVER_NAME'];

define('BASE_URL', $server_name);

const IS_CLI = (PHP_SAPI === 'cli');
const BASE_DIR = __DIR__ . '/..';

require BASE_DIR . 'Library/Autoload.php';
Autoload::register();

if (IS_CLI) {
	// Stop script here since the rest of the code is for the browsers
	exit;
}

require BASE_DIR . 'Public/Routing.php';