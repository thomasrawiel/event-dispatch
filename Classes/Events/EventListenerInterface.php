<?php

namespace TRAW\EventDispatch\Events;

/**
 * Interface EventListenerInterface
 * @package TRAW\EventDispatch\Events
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