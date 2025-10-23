<?php

defined('TYPO3') or die('Access denied.');
call_user_func(function ($_EXTKEY = 'event_dispatch') {
    $emConfiguration = \TRAW\EventDispatch\Service\SettingsService::getEmSettings();

    if ($emConfiguration->getBackendUserLogin()) {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauthgroup.php']['backendUserLogin'][$_EXTKEY] =
            \TRAW\EventDispatch\Hooks\BackendLoginHook::class . '->afterLogin';
    }

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php'] = array_merge_recursive(
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php'],
        [
            'processDatamapClass' => [
                $_EXTKEY => \TRAW\EventDispatch\Hooks\TCEmainHook::class,
            ],
            'processCmdmapClass' => [
                $_EXTKEY => \TRAW\EventDispatch\Hooks\TCEmainHook::class,
            ],
            'moveRecordClass' => [
                $_EXTKEY => \TRAW\EventDispatch\Hooks\TCEmainHook::class,
            ],
            'clearCachePostProc' => [
                $_EXTKEY => \TRAW\EventDispatch\Hooks\TCEmainHook::class . '->clearCachePostProc',
            ],
        ]
    );
});
