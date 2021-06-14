<?php

namespace TRAW\EventDispatch\Events\Cache;

use TRAW\EventDispatch\Events\AbstractEventListener;

class ClearCacheEventListener extends AbstractEventListener
{
    public function __invoke(ClearCacheEvent $event)
    {

    }
}