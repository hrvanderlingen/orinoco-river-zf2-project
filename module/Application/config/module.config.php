<?php

use Zend\Mvc\Router\Http\Literal;

return array(
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        'controller' => 'Application\Controller\AdminController',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
            ),
            'zfcuser' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/user',
                    'defaults' => array(
                        'namespace' => 'zfcuser',
                        'controller' => 'zfcuser',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'login' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/login',
                            'defaults' => array(
                                'namespace' => 'Application',
                                'controller' => 'Application\Controller\User',
                                'action' => 'login',
                            ),
                        ),
                    ),
                ),
            ),
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
                        'controller' => 'Application\Controller\User',
                        'action' => 'login',
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
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Account'
            => 'Application\Controller\AccountController',
            'Application\Controller\Index'
            => 'Application\Controller\IndexController',
            'Application\Controller\AdminController'
            => 'Application\Controller\AdminController',
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
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
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
