<?php

namespace TRAW\EventDispatch\Hooks;

use TRAW\EventDispatch\Domain\Model\Dto\EmConfiguration;
use TRAW\EventDispatch\Events\AbstractEvent;
use TRAW\EventDispatch\Service\SettingsService;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class AbstractHook
 * @package TRAW\EventDispatch\Hooks
 */
abstract class AbstractHook
{
    /**
     * @var EmConfiguration
     */
    protected EmConfiguration $settings;

    /**
     * AbstractHook constructor.
     */
    public function __construct()
    {
        $this->settings = SettingsService::getEmSettings();
    }

    /**
     * @param AbstractEvent $event
     */
    protected function triggerEvent(AbstractEvent $event)
    {
        $eventDispatcher = GeneralUtility::makeInstance(EventDispatcher::class);
        $eventDispatcher->dispatch($event);
    }
}