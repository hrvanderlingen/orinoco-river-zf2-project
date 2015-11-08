<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use Application\Service\LoggingService;

/**
 * Factory class for LoggingService
 * 
 */
class LoggingServiceFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     *
     * @return LoggingService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
	$logger = new Logger;
	$config = $serviceLocator->get('Config');
	$logFile = $config['logDir'] . '/db.' . date("Y-m-d") . '.txt';
	$writer = new Stream($logFile);
	$logger->addWriter($writer);
	$dbAdapter = $serviceLocator->get('dbAdapter');
	return new LoggingService($config, $logger, $dbAdapter);
    }

}
