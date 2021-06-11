<?php

namespace TRAW\EventDispatch\Hooks;

use TRAW\EventDispatch\Event\BackendLoginEvent;

class BackendLoginHook extends AbstractHook
{
    public function dispatch(array $backendUser)
    {
        if (isset($backendUser['user']['username'])) {
            $username = $backendUser['user']['username'];
            $email = $backendUser['user']['email'];
            // do something...

            $this->triggerEvent(new BackendLoginEvent($username, $email));

        }
    }
}