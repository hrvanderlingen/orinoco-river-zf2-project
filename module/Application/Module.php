<?php

namespace Application;

use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap($e)
    {

	$eventManager = $e->getApplication()->getEventManager();
	$eventManager->attach(MvcEvent::EVENT_FINISH, function($e) {

	    $app = $e->getApplication();
	    $sm = $app->getServiceManager();
	    $logger = $sm->get('Application\Service\LoggingService');
	    $logger->setDatabaseLogging();
	});


    }

    public function getConfig()
    {
	return include __DIR__ . '/config/module.config.php';
    }

    /**
     *
     * @return type
     */
    public function getAutoloaderConfig()
    {
	return array(
	    'Zend\Loader\ClassMapAutoloader' => array(
		__DIR__ . '/autoload_classmap.php',
	    ),
	    'Zend\Loader\StandardAutoloader' => array(
		'namespaces' => array(
		    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
		),
	    ),
	);
    }

    public function getViewHelperConfig()
    {
	return array(
	    'invokables' => array(
		'flashHelper' => 'Application\View\Helper\FlashHelper',
		'requestUriHelper' => 'Application\View\Helper\RequestUriHelper',
		'configurationHelper' => 'Application\View\Helper\ConfigurationHelper',
	    ),
	);
    }

    public function getServiceConfig()
    {
	return array(
	    'factories' => array(
		'Application\Service\LoggingService' => 'Application\Service\LoggingServiceFactory',
		'UnauthorizedStrategy' => function ($sm) {
		    $strategy = new View\UnauthorizedStrategy;
		    return $strategy;
		},
	    )
	);
    }

 

}
