<?php

return array(
    'modules' => array(
        'Application',
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
        )
    ),
    // Whether or not to enable a module class map cache.
    // If enabled, creates a module class map cache which will be used
    // by in future requests, to reduce the autoloading process.
    'module_map_cache_enabled' => true,
    // The key used to create the class map cache file name.
    'module_map_cache_key' => "H32B3HEU3SUWY3",
    // The path in which to cache merged configuration.
    'cache_dir' => __dir__ . '/../data/cache',
    // Whether or not to enable modules dependency checking.
    // Enabled by default, prevents usage of modules that depend on other modules
    // that weren't loaded.
    'check_dependencies' => false,
);
