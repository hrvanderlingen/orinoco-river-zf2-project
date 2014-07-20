<?php

if (file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
}
// generate this class map
// ./path/to/bin/classmap_generator.php -w --library path/to/Zend --output path/to/Zend/Zendautoload_classmap.php
$classMap = require __DIR__ . '/vendor/zendframework/zendframework/library/Zend/zend_autoload_classmap.php';

// Register the class map:
$loader->addClassMap($classMap);

// Register with spl_autoload:
$loader->register(true);
