<?php


namespace TRAW\EventDispatch\Events\Database;


/**
 * Class MoveRecordEventListener
 * @package TRAW\EventDispatch\Events\Database
 */
class MoveRecordEventListener extends \TRAW\EventDispatch\Events\AbstractEventListener
{
    /**
     * @var string
     */
    protected string $expectedEventClass = MoveRecordEvent::class;

    /**
     * @return bool
     */
    public function eventListenerIsActive(): bool
    {
        return $this->settings->getMoveRecord();
    }
}