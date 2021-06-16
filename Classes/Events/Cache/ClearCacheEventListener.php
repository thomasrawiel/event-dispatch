<?php

namespace TRAW\EventDispatch\Events\Cache;

use TRAW\EventDispatch\Events\AbstractEventListener;

/**
 * Class ClearCacheEventListener
 * @package TRAW\EventDispatch\Events\Cache
 */
class ClearCacheEventListener extends AbstractEventListener
{
    /**
     * @param ClearCacheEvent $event
     */
    public function __invoke(ClearCacheEvent $event)
    {

    }

    /**
     * @return bool
     */
    public function eventListenerIsActive(): bool
    {
        return $this->settings->getClearCache();
    }
}