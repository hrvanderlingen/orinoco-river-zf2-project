<?php

namespace Application\Service;

use Zend\Log\Logger;
use Zend\Db\Adapter\ParameterContainer;
use Zend\Db\Adapter\Profiler\Profiler;

class LoggingService
{

    protected $config = array();
    protected $logger;
    protected $dbAdapter;

    /**
     * Constructor
     *
     * @param array $config
     * @return LoggingService
     */
    public function __construct(array $config, Logger $logger, $dbAdapter)
    {
	$this->config = $config;
	$this->logger = $logger;
	$this->dbAdapter = $dbAdapter;
    }

    public function setDatabaseLogging()
    {

	if (!isset($this->config['db']['profiler']) || !$this->config['db']['profiler']) {
	    return false;
	}

	$queryProfiles = $this->getProfiler()->getProfiles();
	foreach ($queryProfiles as $profile) {
	    $str = $this->formatString($profile);
	    $this->logger->debug($str);
	}
    }

    /**
     * Return the profiler from the adapter
     * @return Profiler
     */
    protected function getProfiler()
    {
	return $this->dbAdapter
			->getDriver()
			->getConnection()
			->getProfiler();
    }

    protected function formatString($profile)
    {
	$sql = $profile['sql'];
	if ($profile['parameters'] instanceof ParameterContainer) {
	    /** $parameters ParameterContainer */
	    $parameters = $profile['parameters'];

	    foreach ($parameters as $k => $v) {
		$sql = str_replace(":" . $k, $v, $sql);
	    }
	}

	return sprintf("%s; (in %s seconds)", $sql, $profile['elapse']);
    }

}
