<?php

namespace TRAW\EventDispatch\Events\Backend;

use TRAW\EventDispatch\Events\AbstractEvent;

/**
 * Class BackendLoginEvent
 * @package TRAW\EventDispatch\Event
 */
class BackendUserLoginEvent extends AbstractEvent
{
    protected array $backendUser;

    /**
     * BackendLoginEvent constructor.
     * @param array $backendUser
     */
    public function __construct(array $backendUser)
    {
        $this->backendUser = $backendUser;
    }

    /**
     * @return array
     */
    public function getBackendUser(): array
    {
        return $this->backendUser;
    }
}