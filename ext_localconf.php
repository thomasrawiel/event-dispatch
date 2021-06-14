<?php
defined('TYPO3_MODE') or die('Access denied.');
call_user_func(function ($_EXTKEY = 'event_dispatch') {
    $localconfUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TRAW\EventDispatch\Utility\LocalconfUtility::class, $_EXTKEY);
    $localconfUtility->registerHooks();
});