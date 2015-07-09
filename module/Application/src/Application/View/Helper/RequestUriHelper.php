<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class RequestUriHelper extends AbstractHelper
{

    /**
     * Return the request uri
     * @return string the request uri
     */
    public function __invoke()
    {
        $serviceManager = $this->getView()->getHelperPluginManager()->getServiceLocator();
        return $serviceManager->get('request')->getUri()->getPath();
    }

}
