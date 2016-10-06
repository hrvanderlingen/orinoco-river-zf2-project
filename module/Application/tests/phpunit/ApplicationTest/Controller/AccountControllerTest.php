<?php

namespace ApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use BjyAuthorize\Exception\UnAuthorizedException as UnAuthorizedException;

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
        $this->assertResponseStatusCode(500);
    }

}
