<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events\Database;

use TRAW\EventDispatch\Events\AbstractEventListener;

/**
 * Class AfterDatabaseOperationEventListener
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
