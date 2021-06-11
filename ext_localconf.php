<?php
defined('TYPO3_MODE') or die('Access denied.');
call_user_func(function ($_EXTKEY = 'event_dispatch') {
    \TRAW\EventDispatch\Utility\LocalconfUtility::registerHooks($_EXTKEY);;
});