#!/usr/local/bin/php
<?php

echo "start new deployment\n";

$timestamp = time();

shell_exec('mkdir ' .  $timestamp);

shell_exec('git clone git@github.com:hrvanderlingen/orinoco-river-zf2-project.git ' . $timestamp);

shell_exec('unlink public_html');

shell_exec('ln -s ' . $timestamp . '/public public_html');

shell_exec('php composer.phar update  --working-dir ' .$timestamp);

shell_exec('php composer.phar update  --working-dir ' . $timestamp . '--no-dev');

shell_exec('mkdir public_html/css');

shell_exec('mkdir public_html/components');

shell_exec('mkdir public_html/components/bootstrap');

shell_exec('mkdir public_html/components/jquery');

shell_exec('cp -R  ' . $timestamp . '/vendor/twbs/bootstrap/*  public_html/components/bootstrap');

shell_exec('cp -R  ' . $timestamp . '/vendor/components/jquery/*  public_html/components/jquery');

shell_exec('php '.$timestamp.'/vendor/bin/classmap_generator.php -w --library '.$timestamp.'/vendor/zendframework/zendframework/library/Zend --output '.$timestamp.'/vendor/zend_autoload_classmap.php');

shell_exec('php ' . $timestamp . '/vendor/bin/classmap_generator.php -w --library ' . $timestamp . '/module/Application --output ' . $timestamp . '/module/Application/autoload_classmap.php');

shell_exec('php ' . $timestamp . '/vendor/bin/templatemap_generator.php -w --view ' . $timestamp . '/module/Application/view --output ' . $timestamp . '/module/Application/autoload_classmap.php');

shell_exec('cp -R configs/* ' . $timestamp . '/config/autoload');

shell_exec('sass -t compressed  public_html/scss/*.scss public_html/css/style.min.css');

