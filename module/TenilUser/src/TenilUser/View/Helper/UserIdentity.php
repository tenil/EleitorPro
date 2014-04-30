<?php

namespace TenilUser\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

class UserIdentity extends AbstractHelper {

    protected $authService;

    public function getAuthService() {
        return $this->authService;
    }

    public function __invoke($namespace = null) {
        $storage = new SessionStorage($namespace);
        $this->authService = new AuthenticationService;
        $this->authService->setStorage($storage);

        if ($this->getAuthService()->hasIdentity()) {
            return $this->getAuthService()->getIdentity();
        } else {
            return FALSE;
        }
    }

}
