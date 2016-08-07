<?php

namespace Application;

use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
	$this->setDatabaseLogging($e);
    }

    /**
     * Switch on database logging based on configuration setting
     * @param MvcEvent $e
     */
    protected function setDatabaseLogging(MvcEvent $e)
    {

	$app = $e->getApplication();
	$sm = $app->getServiceManager();
	$config = $sm->get('Config');
	if (isset($config['db']['profiler']) && $config['db']['profiler']) {
	    $eventManager = $e->getApplication()->getEventManager();
	    $eventManager->attach(MvcEvent::EVENT_FINISH, function($e) {
		$app = $e->getApplication();
		$sm = $app->getServiceManager();
		$logger = $sm->get('Application\Service\LoggingService');
		$logger->setDatabaseLogging();
	    });
	}
    }

    public function getConfig()
    {
	return include __DIR__ . '/config/module.config.php';
    }

    public function getControllerConfig()
    {
	return array(
	    'factories' => array(
		'Application\Controller\User' => function($controllerManager) {
		    /* @var ControllerManager $controllerManager */
		    $serviceManager = $controllerManager->getServiceLocator();

		    /* @var RedirectCallback $redirectCallback */
		    $redirectCallback = $serviceManager->get('zfcuser_redirect_callback');

		    /* @var UserController $controller */
		    $controller = new \Application\Controller\UserController($redirectCallback);

		    return $controller;
		},
	    ),
	);
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
