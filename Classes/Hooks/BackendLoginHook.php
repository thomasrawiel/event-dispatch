<?php

namespace TRAW\EventDispatch\Hooks;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
use TRAW\EventDispatch\Events\Backend\AfterBackendUserLoginEvent;

/**
 * Class BackendLoginHook
 * @package TRAW\EventDispatch\Hooks
 */
class BackendLoginHook extends AbstractHook
{
    /**
     * @param array $backendUser
     */
    public function dispatch(array $backendUser)
    {
        if ($this->settings->getBackendUserLogin() && is_array($backendUser['user'])) {
            $this->dispatchEvent(new AfterBackendUserLoginEvent(new BackendUserInfo($backendUser['user'])));
        }
    }
}