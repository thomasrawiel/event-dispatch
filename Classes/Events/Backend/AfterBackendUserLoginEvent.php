<?php

namespace TRAW\EventDispatch\Events\Backend;

use TRAW\EventDispatch\Events\AbstractEvent;

/**
 * Class BackendLoginEvent
 * @package TRAW\EventDispatch\Event
 */
class AfterBackendUserLoginEvent extends AbstractEvent
{
    protected string $type = 'backendUserLogin';
}