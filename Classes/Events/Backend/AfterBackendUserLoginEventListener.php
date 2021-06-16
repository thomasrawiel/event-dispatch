<?php

namespace TRAW\EventDispatch\Events\Backend;

use TRAW\EventDispatch\Events\AbstractEventListener;

/**
 * Class AfterBackendUserLoginEventListener
 * @package TRAW\EventDispatch\Events\Backend
 */
class AfterBackendUserLoginEventListener extends AbstractEventListener
{
    /**
     * @param BackendUserLoginEvent $event
     */
    public function __invoke(BackendUserLoginEvent $event)
    {
    }

    /**
     * @return bool
     */
    public function eventListenerIsActive(): bool
    {
        return $this->settings->getBackendUserLogin();
    }
}