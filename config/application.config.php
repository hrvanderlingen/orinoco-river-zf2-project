<?php

// set in vhosts.conf SetEnv "APPLICATION_ENVIRONMENT" "development"
$env = getenv('APPLICATION_ENVIRONMENT') ? : 'development';

return array(
    'modules' => array(
        'Application',
        'ZfcBase',
        'ZfcUser',
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
        ),
        // Whether or not to enable a module class map cache.
        // If enabled, creates a module class map cache which will be used
        // by in future requests, to reduce the autoloading process.
        'module_map_cache_enabled' => ($env == 'production'),
        // The key used to create the class map cache file name.
        'module_map_cache_key' => "H32B3HEU3SUWY3",
        // The path in which to cache merged configuration.
        'cache_dir' => __dir__ . '/../data/cache',
        // Whether or not to enable modules dependency checking.
        // Enabled by default, prevents usage of modules that depend on other modules
        // that weren't loaded.
        'check_dependencies' => ($env == 'development'),
        // set the autoload path
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        // set config caching
        'config_cache_enabled' => false,
        // The key used to create the configuration cache file name.
        'config_cache_key' => 'FHT2837EHDRT4653G',
    ),
);
