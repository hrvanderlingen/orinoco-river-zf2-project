<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{

    public function indexAction()
    {
        $viewModel = new ViewModel;
        $viewModel->setTemplate('application/zfc-admin/admin/index.phtml');
        return $viewModel;
    }

}
