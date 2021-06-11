<?php

namespace TRAW\EventDispatch\Hooks;

use TRAW\EventDispatch\Event\AbstractEvent;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Utility\GeneralUtility;

abstract class AbstractHook
{
    protected function triggerEvent(AbstractEvent $event)
    {
        $eventDispatcher = GeneralUtility::makeInstance(EventDispatcher::class);
        $eventDispatcher->dispatch($event);
    }
}