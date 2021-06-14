<?php


namespace TRAW\EventDispatch\Events;


use TRAW\EventDispatch\Domain\Model\Dto\EmConfiguration;
use TRAW\EventDispatch\Service\SettingsService;

class AbstractEventListener
{
    /**
     * @var EmConfiguration
     */
    protected EmConfiguration $settings;

    public function __construct()
    {
        $this->settings = SettingsService::getEmSettings();
    }
}