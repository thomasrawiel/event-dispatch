<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events\Database;

/**
 * Class MoveRecordEventListener
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
