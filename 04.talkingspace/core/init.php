<?php
// Start session
session_start();

require_once('config/config.php');
require_once('helpers/system_helper.php');
require_once('helpers/format_helper.php');
require_once('helpers/db_helper.php');

// Autoload Classes
function myAutoload($class_name)
{
	require_once('libraries/' . $class_name . '.php');
}

spl_autoload_register('myAutoload');
