<?php

namespace TRAW\EventDispatch\Utility;

use TRAW\EventDispatch\Domain\Model\Dto\EmConfiguration;
use TRAW\EventDispatch\Hooks\BackendLoginHook;
use TRAW\EventDispatch\Hooks\TCEmainHook;
use TRAW\EventDispatch\Service\SettingsService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class HookToEventUtility
 * @package TRAW\EventDispatch\Utility
 */
class LocalconfUtility
{
    /**
     * @var string
     */
    protected string $_EXTKEY;

    /** @var EmConfiguration */
    protected EmConfiguration $emConfiguration;

    /**
     * LocalconfUtility constructor.
     * @param string $_EXTKEY
     */
    public function __construct(string $_EXTKEY)
    {
        $this->_EXTKEY = $_EXTKEY;
        $this->emConfiguration = SettingsService::getEmSettings();
    }

    /**
     *
     */
    public function registerHooks()
    {
        if($this->emConfiguration->getBackendUserLogin()) {
            $this->registerBackendLoginHook();
        }

        $this->registerTCEMainHook();
        $this->registerClearCacheHook();
    }

    /**
     *  Register hook on successful BE user login
     */
    protected function registerBackendLoginHook()
    {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauthgroup.php']['backendUserLogin'][$this->_EXTKEY] =
            BackendLoginHook::class . '->dispatch';
    }


    protected function registerTCEMainHook()
    {
        foreach ([
                     'processDatamapClass',
                     'processCmdmapClass',
                 ] as $tceMainHookIdentifier) {
            $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php'][$tceMainHookIdentifier][$this->_EXTKEY]
                = TCEmainHook::class;
        }
    }

    protected function registerClearCacheHook()
    {
        $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][$this->_EXTKEY]
            = TCEmainHook::class . '->clearCachePostProc';
    }
}