<?php

namespace Application\Controller;

use ZfcUser\Controller\UserController as zfcUserController;

/**
 * Extending the zfcUserController, custom form views are required in
 * application view, also change the routes
 */
class UserController extends zfcUserController
{

    const ROUTE_CHANGEPASSWD = 'changepassword';
    const ROUTE_CHANGEEMAIL = 'changeemail';

    /**
     * @param callable $redirectCallback
     */
    public function __construct($redirectCallback)
    {
	parent::__construct($redirectCallback);
    }
}
