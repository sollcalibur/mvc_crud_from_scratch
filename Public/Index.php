<?php
define('WEBROOT', str_replace("Public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'Config/core.php');
require(ROOT . 'router.php');
require(ROOT . 'request.php');
require(ROOT . 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

// This is the entry point of the site.
// This file is responsible for importing the necessary files to run the MVC pattern
