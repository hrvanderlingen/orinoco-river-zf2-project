#!/usr/local/bin/php
<?php

echo "start new deployment\n";

$timestamp = time();

shell_exec('mkdir ' .  $timestamp);

shell_exec('git clone git@github.com:hrvanderlingen/orinoco-river-zf2-project.git ' . $timestamp);

shell_exec("cd " . $timestamp);

shell_exec('php ../composer.phar update');

shell_exec('php ../composer.phar update  --working-dir --no-dev');

shell_exec('mkdir data');

shell_exec('mkdir data/cache');

shell_exec('chmod 777 data/cache');

shell_exec('mkdir data/logs');

shell_exec('chmod 777 data/logs');

shell_exec('mkdir public_html');

shell_exec('mkdir public_html/css');

shell_exec('cd public_html');

shell_exec('ln -s  ../vendor/components  components');

shell_exec('cd ../');

shell_exec('php vendor/bin/classmap_generator.php -w --library vendor/zendframework/zendframework/library/Zend --output vendor/zend_autoload_classmap.php');

shell_exec('php vendor/bin/classmap_generator.php -w --library module/Application --output  module/Application/autoload_classmap.php');

shell_exec('php vendor/bin/templatemap_generator.php -w --view module/Application/view --output module/Application/template_map.php');

shell_exec('cp -R ../configs/* config/autoload');

shell_exec('sass -t compressed  public_html/scss/*.scss public_html/css/style.min.css');

shell_exec('cd ../');

shell_exec('unlink public_html');

shell_exec('ln -s ' . $timestamp . '/public_html public_html');


