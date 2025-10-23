<?php
namespace TRAW\EventDispatch\Service;

use TRAW\EventDispatch\Domain\Model\Dto\EmConfiguration;

class SettingsService
{
    /**
     * @return EmConfiguration
     */
    public static function getEmSettings(): EmConfiguration
    {
        /** @var EmConfiguration $emConfiguration */
        return new EmConfiguration();
    }
}