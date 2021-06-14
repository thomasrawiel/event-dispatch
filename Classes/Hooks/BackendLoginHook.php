<?php

namespace TRAW\EventDispatch\Hooks;

use TRAW\EventDispatch\Events\Backend\BackendUserLoginEvent;

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
        if($this->settings->getBackendUserLogin() && is_array($backendUser['user'])) {
            $this->triggerEvent(new BackendUserLoginEvent($backendUser));
        }
    }
}