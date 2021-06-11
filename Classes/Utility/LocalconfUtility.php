<?php

namespace TRAW\EventDispatch\Utility;

use TRAW\EventDispatch\Hooks\BackendLoginHook;
use TRAW\EventDispatch\Hooks\TCEmainHook;

/**
 * Class HookToEventUtility
 * @package TRAW\EventDispatch\Utility
 */
class LocalconfUtility
{
    /**
     * @param string $_EXTKEY
     */
    public static function registerHooks(string $_EXTKEY)
    {
        self::registerBackendLoginHook($_EXTKEY);
        self::registerTCEMainHook($_EXTKEY);
    }

    /**
     * @param string $_EXTKEY
     */
    protected static function registerBackendLoginHook(string $_EXTKEY)
    {
        // Register hook on successful BE user login
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauthgroup.php']['backendUserLogin'][$_EXTKEY] =
            BackendLoginHook::class . '->dispatch';
    }

    /**
     * @param $_EXTKEY
     */
    protected static function registerTCEMainHook($_EXTKEY)
    {
        foreach ([
                     'processDatamapClass',
                     'processCmdmapClass',
                 ] as $tceMainHookIdentifier) {
            $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php'][$tceMainHookIdentifier][$_EXTKEY]
                = TCEmainHook::class;
        }
        $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][$_EXTKEY]
            = TCEmainHook::class . '->clearCachePostProc';
    }
}