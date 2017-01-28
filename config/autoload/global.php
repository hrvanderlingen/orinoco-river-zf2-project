<?php

/**
 * Override default values in local.php or database.local.php
 */
return array(
    'environment' => 'development',
    'view_manager' => array(
        'display_not_found_reason' => false,
        'display_exceptions' => false),
    'db' => array(
        'driver' => 'pdo',
	'dsn' => 'mysql:dbname=zf2project;host=localhost',
	'username' => 'root',
        'password' => '',
	
    ),
    'logDir' => __DIR__ . '/../../data/logs'   
);
