#!/bin/bash

while getopts env option
do
 case "${option}"
 in
 env) ENV=${OPTARG};; 
 esac
done

path=/c/xampp/htdocs/orinoco

composer install

mkdir "$path/data"

mkdir "$path/data/logs"

mkdir "$path/data/cache"

chmod 777 "$path/data/cache"

mkdir "$path/public_html/css"

cd $path

mkdir "$path/$ts/public_html/components"

cd "$path"
cd "vendor/bin"

./classmap_generator.php -w --library  ../zendframework/zendframework/library/Zend --output ../zend_autoload_classmap.php
./classmap_generator.php -w --library  ../../module/Application    --output  ../../module/Application/autoload_classmap.php

cd "$path"
cd "module/Application"
 ./../../vendor/bin/templatemap_generator.php -w  --output template_map.php

cd "$path"


if [ ${args[0]} == 'production' ]
then

    sass -t compressed  public_html/scss/*.scss public_html/css/style.min.css
    npm install --production
    bower install --production
    grunt --env=production

else

    sass public_html/scss/*.scss public_html/css/style.css
    npm install
    bower install
    grunt

fi
