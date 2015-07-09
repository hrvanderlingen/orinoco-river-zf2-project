<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ConfigurationHelper extends AbstractHelper
{

    /**
     * Return the configuration
     * @return array of configuration data
     */
    public function __invoke()
    {
        $serviceManager = $this->getView()->getHelperPluginManager()->getServiceLocator();
        return $serviceManager->get('Config');
    }

}
