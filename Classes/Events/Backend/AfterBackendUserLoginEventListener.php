<?php

namespace TRAW\EventDispatch\Events\Backend;

use TRAW\EventDispatch\Events\AbstractEventListener;

/**
 * Class AfterBackendUserLoginEventListener
 * @package TRAW\EventDispatch\Events\Backend
 */
class AfterBackendUserLoginEventListener extends AbstractEventListener
{
    protected string $expectedEventClass = AfterBackendUserLoginEvent::class;
    /**
     * @return bool
     */
    public function eventListenerIsActive(): bool
    {
        return $this->settings->getBackendUserLogin();
    }
}