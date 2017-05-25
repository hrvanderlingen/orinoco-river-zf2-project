#!/bin/bash

args=("$@")

printf "start\r\n"

printf "${args[0]}\r\n"

path=/c/xampp/htdocs/orinoco.test

ts=$(date +%s)

mkdir -p "$path/$ts"

git clone git@github.com:hrvanderlingen/orinoco-river-zf2-project.git  $path/$ts

cd "$path/$ts"

if [ ${args[0]} == 'production' ]
then
composer install --no-dev

else
composer install
fi

mkdir "$path/$ts/data"

mkdir "$path/$ts/data/logs"

mkdir "$path/$ts/data/cache"

chmod 777 "$path/$ts/data/cache"

mkdir "$path/$ts/public_html/css"

mkdir "$path/$ts/public_html/components"

public_html="/public_html"

rm -rf $path$public_html

cd $path

ln -s  "$path/$ts$public_html" "public_html" 

cd "$path/$ts"
cd "vendor/bin"

./classmap_generator.php -w --library  ../zendframework/zendframework/library/Zend --output ../zend_autoload_classmap.php
./classmap_generator.php -w --library  ../../module/Application    --output  ../../module/Application/autoload_classmap.php

cd "$path/$ts"
vendor/bin/templatemap_generator.php  -w --view   "module/Application/view"    --output "module/Application/template_map.php"

cd "$path/$ts"
cp -R ../configs/* config/autoload

if [ ${args[0]} == 'production' ]
then
sass -t compressed  public_html/scss/*.scss public_html/css/style.min.css

else
sass public_html/scss/*.scss public_html/css/style.css
fi
npm install
bower install

if [ ${args[0]} == 'production' ]
then
grunt --production

else
gulp
fi

