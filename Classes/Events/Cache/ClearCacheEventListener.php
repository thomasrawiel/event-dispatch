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
     * @var string
     */
    protected string $expectedEventClass = ClearCacheEvent::class;

    /**
     * @return bool
     */
    public function eventListenerIsActive(): bool
    {
        return $this->settings->getClearCache();
    }
}