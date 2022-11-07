<?php

define("IN_DEBUG_MODE", TRUE);

if (IN_DEBUG_MODE) {
	ini_set("display_errors", "1"); // Display errors
	error_reporting(E_ALL ^ E_NOTICE); // Report all errors except E_NOTICE
}


// Database
define("DB_HOST", '127.0.0.13');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_NAME", 'vintage_vinyl');
//define("DB_PORT", 8080);
define("MYSQL_CHARSET", "utf8");