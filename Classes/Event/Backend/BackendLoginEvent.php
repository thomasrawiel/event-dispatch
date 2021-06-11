<?php

namespace TRAW\EventDispatch\Event\Backend;

use TRAW\EventDispatch\Event\AbstractEvent;

/**
 * Class BackendLoginEvent
 * @package TRAW\EventDispatch\Event
 */
class BackendLoginEvent extends AbstractEvent
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