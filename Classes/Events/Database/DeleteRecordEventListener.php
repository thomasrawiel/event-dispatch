<?php

namespace TRAW\EventDispatch\Events\Database;

/**
 * Class DeleteRecordEventListener
 * @package TRAW\EventDispatch\Events\Database
 */
class DeleteRecordEventListener extends \TRAW\EventDispatch\Events\AbstractEventListener
{
    protected string $expectedEventClass = DeleteRecordEvent::class;
    /**
     * @return bool
     */
    public function eventListenerIsActive(): bool
    {
        return $this->settings->getDeleteRecord();
    }
}