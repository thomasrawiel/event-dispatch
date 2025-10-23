<?php

namespace TRAW\EventDispatch\Hooks;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
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
     * @var EventDispatcher
     */
    protected EventDispatcher $eventDispatcher;

    /**
     * AbstractHook constructor.
     */
    public function __construct()
    {
        $this->settings = SettingsService::getEmSettings();
        $this->eventDispatcher = GeneralUtility::makeInstance(EventDispatcher::class);
    }

    /**
     * @param AbstractEvent $event
     */
    protected function dispatchEvent(AbstractEvent $event)
    {
        $this->eventDispatcher->dispatch($event);
    }

    protected function getBeUserInfo(): BackendUserInfo
    {
        return new BackendUserInfo($GLOBALS['BE_USER']->user);
    }
}