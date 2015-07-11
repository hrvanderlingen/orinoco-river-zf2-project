orinoco-river-zf2-project
=========================

Basic ZF2 project, the first commit contains the minimally required code to set up a project. The index page will just contain "hello world!"

Project updates
---------------------
* run composer self-update
* run composer update
* run the classmap generator

./vendor/bin/classmap_generator.php -w --library vendor/zendframework/zendframework/library/Zend --output vendor/zend_autoload_classmap.php
./vendor/bin/classmap_generator.php -w --library module/Application --output module/Application/autoload_classmap.php

* run the template map generator

./vendor/bin/templatemap_generator.php -w --view module/Application/view --output module/Application/template_map.php


