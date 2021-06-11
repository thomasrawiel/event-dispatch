<?php

namespace TRAW\EventDispatch\Hooks;

use TRAW\EventDispatch\Event\Backend\BackendLoginEvent;

class BackendLoginHook extends AbstractHook
{
    public function dispatch(array $backendUser)
    {
        if (isset($backendUser['user']['username'])) {
            $this->triggerEvent(new BackendLoginEvent($backendUser));

        }
    }
}