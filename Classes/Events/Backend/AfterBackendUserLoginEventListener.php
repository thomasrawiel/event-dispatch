<?php

namespace TRAW\EventDispatch\Events\Backend;

use TRAW\EventDispatch\Events\AbstractEventListener;

class AfterBackendUserLoginEventListener extends AbstractEventListener
{
    public function __invoke(BackendUserLoginEvent $event)
    {
    }
}