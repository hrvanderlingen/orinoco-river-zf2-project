<?php

if (file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
}
// generate Zend Framework class map
// move to the vendor folder and execute
// ./bin/classmap_generator.php -w --library zendframework/zendframework/library/Zend --output zend_autoload_classmap.php
$classMap = require __DIR__ . '/vendor/zend_autoload_classmap.php';

// Register the class map:
$loader->addClassMap($classMap);

// Register with spl_autoload:
$loader->register(true);
