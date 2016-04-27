<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AccountController extends AbstractActionController
{

    public function indexAction()
    {
	$viewModel = new ViewModel;
	$viewModel->setTemplate('/application/account/index.phtml');
	return $viewModel;
    }

}
