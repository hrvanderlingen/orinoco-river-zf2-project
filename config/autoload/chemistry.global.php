<?php

$settings = array();

return array(
    'chemistry' => $settings,
    'service_manager' => array(
	'aliases' => array(),
    ),
    'bjyauthorize' => array(
	'guards' => array(
	    'BjyAuthorize\Guard\Controller' => array(
		array('controller' => 'chemistry', 'roles' => array('guest', 'user', 'admin')),
	    ),
	),
    ),
);

