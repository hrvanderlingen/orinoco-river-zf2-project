<?php

use Zend\Mvc\Router\Http\Literal;

return array(
    'router' => array(
	'routes' => array(
	    'home' => array(
		'type' => 'Literal',
		'options' => array(
		    'route' => '/',
		    'defaults' => array(
			'controller' => 'Application\Controller\Index',
			'action' => 'index',
		    ),
		),
	    ),
	    'custom-login-page' => array(
		'type' => 'Literal',
		'options' => array(
		    'route' => '/do/login',
		    'defaults' => array(
			'controller' => 'Application\Controller\Login',
			'action' => 'index',
		    ),
		),
		'may_terminate' => true,
	    ),
	    'account' => array(
		'type' => 'Literal',
		'options' => array(
		    'route' => '/account',
		    'defaults' => array(
			'controller' => 'Application\Controller\Account',
			'action' => 'index',
		    ),
		),
		'may_terminate' => true,
	    ),
	    'changepassword' => array(
		'type' => 'Literal',
		'options' => array(
		    'route' => '/user/changepassword',
		    'defaults' => array(
			'controller' => 'Application\Controller\User',
			'action' => 'changepassword',
		    ),
		),
		'may_terminate' => true,
	    ),
	    'changeemail' => array(
		'type' => 'Literal',
		'options' => array(
		    'route' => '/user/changeemail',
		    'defaults' => array(
			'controller' => 'Application\Controller\User',
			'action' => 'changeemail',
		    ),
		),
		'may_terminate' => true,
	    ),
	),
    ),
    'aliases' => array(
	'bjyauthorize_zend_db_adapter' => 'dbAdapter',
    ),
    'controllers' => array(
	'invokables' => array(
	    'Application\Controller\Index'
	    => 'Application\Controller\IndexController',
	    'Application\Controller\Login'
	    => 'Application\Controller\LoginController',
	    'Application\Controller\Account'
	    => 'Application\Controller\AccountController',	   
	),
	'factories' => array(	   
	    'Application\Controller\User' => function($controllerManager) {
		/* @var ControllerManager $controllerManager */
		$serviceManager = $controllerManager->getServiceLocator();

		/* @var RedirectCallback $redirectCallback */
		$redirectCallback = $serviceManager->get('zfcuser_redirect_callback');

		/* @var UserController $controller */
		$controller = new Application\Controller\UserController($redirectCallback);

		return $controller;
	    },
	),
    ),
    
    'view_manager' => array(
	'doctype' => 'HTML5',
	'not_found_template' => 'error/404',
	'exception_template' => 'error/index',
	'template_map' => include __DIR__ . '/../template_map.php',
	'template_path_stack' => array(
	    __DIR__ . '/../view',
	),
    ),
    'service_manager' => array(
	'factories' => array(
	    'dbAdapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
	),
    ),
    'translator' => array(
	'locale' => 'en_US',
	'translation_file_patterns' => array(
	    array(
		'type' => 'gettext',
		'base_dir' => __DIR__ . '/../language',
		'pattern' => '%s.mo',
	    ),
	),
    ),
);
