<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events\Database;

/**
 * Class DeleteRecordEventListener
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
