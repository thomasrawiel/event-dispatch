<?php


namespace TRAW\EventDispatch\Events\Database;

use TRAW\EventDispatch\Events\AbstractEventListener;

/**
 * Class AfterDatabaseOperationEventListener
 * @package TRAW\EventDispatch\Events\Database
 */
class AfterDatabaseOperationEventListener extends AbstractEventListener
{
    /**
     * @var string
     */
    protected string $expectedEventClass = AfterDatabaseOperationEvent::class;

    /**
     * @return bool
     */
    public function eventListenerIsActive(): bool
    {
        return $this->settings->getAfterDatabaseOperation();
    }
}