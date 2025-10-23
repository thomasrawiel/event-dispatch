<?php

namespace TRAW\EventDispatch\Events;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;

/**
 * Class AbstractEvent
 * @package TRAW\EventDispatch\Events
 */
abstract class AbstractEvent implements EventInterface
{
    /**
     * @var string
     */
    protected string $type = 'abstract';
    /**
     * @var BackendUserInfo
     */
    protected BackendUserInfo $backendUser;

    /**
     * BackendLoginEvent constructor.
     * @param BackendUserInfo $backendUser
     */
    public function __construct(BackendUserInfo $backendUser)
    {
        $this->backendUser = $backendUser;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return BackendUserInfo
     */
    public function getBackendUser(): BackendUserInfo
    {
        return $this->backendUser;
    }
}