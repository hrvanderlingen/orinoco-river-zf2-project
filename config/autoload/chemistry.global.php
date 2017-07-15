<?php

$settings = array();

return array(
    'chemistry' => $settings,
    'treeSupplier' => 'wikipedia',
    'service_manager' => array(
	'aliases' => array(),
    ),
    'bjyauthorize' => array(
	'guards' => array(
	    'BjyAuthorize\Guard\Controller' => array(
		array('controller' => 'Chemical\Controller\IndexController', 'roles' => array('guest', 'user', 'admin')),
                array('controller' => 'rest', 'roles' => array('guest', 'user', 'admin')),
                array('controller' => 'Tree', 'roles' => array('guest', 'user', 'admin')),
            ),
	),
    ),
);

