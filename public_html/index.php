<?php
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    error_reporting(E_ALL);
    DEFINE("APPLICATION_ENVIRONMENT", "development");
    ini_set("display_errors", 1);
} else {
    DEFINE("APPLICATION_ENVIRONMENT", "production");
    ini_set("display_errors", 0);
}

chdir(dirname(__DIR__));

// Setup autoloading
require 'init_autoloader.php';

// Run the application
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
