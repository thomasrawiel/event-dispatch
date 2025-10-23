<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events;

/**
 * Interface EventListenerInterface
 */
interface EventListenerInterface
{
    /**
     * @param AbstractEvent $event
     * @return mixed
     */
    public function __invoke(AbstractEvent $event);

    /**
     * @return bool
     */
    public function eventListenerIsActive(): bool;

    /**
     * @param AbstractEvent $event
     * @return mixed
     */
    public function invokeEventAction(AbstractEvent $event);
}
