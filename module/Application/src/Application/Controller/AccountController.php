<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AccountController extends AbstractActionController
{

    public function indexAction()
    {
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            $this->flashMessenger()->addMessage('You are not authorised!');
            return $this->redirect()->toRoute('home');
        }

        $viewModel = new ViewModel;
        $viewModel->setTemplate('/application/account/index.phtml');
        return $viewModel;
    }

}
