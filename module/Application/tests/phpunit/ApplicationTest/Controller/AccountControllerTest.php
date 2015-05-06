<?php

namespace ApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class AccountControllerTest extends AbstractHttpControllerTestCase
{

    public function setUp()
    {
        $this->setApplicationConfig(
                include __DIR__ . '/../../../../../../config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/account');
        $this->assertResponseStatusCode(302);
        $this->assertModuleName('Application');
        $this->assertControllerName('Application\Controller\Account');
        $this->assertControllerClass('AccountController');
        $this->assertMatchedRouteName('account');
    }

}
