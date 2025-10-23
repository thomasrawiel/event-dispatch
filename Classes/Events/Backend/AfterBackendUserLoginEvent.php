<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events\Backend;

use TRAW\EventDispatch\Events\AbstractEvent;

/**
 * Class BackendLoginEvent
 */
class AfterBackendUserLoginEvent extends AbstractEvent
{
    protected string $type = 'backendUserLogin';
}
