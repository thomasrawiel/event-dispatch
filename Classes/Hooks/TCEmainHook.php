<?php

namespace TRAW\EventDispatch\Hooks;

/*
 * This file is part of the "event_dispatch" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TRAW\EventDispatch\Event\AfterDatabaseOperationEvent;
use TRAW\EventDispatch\Event\ClearCacheEvent;
use TRAW\EventDispatch\Event\DeleteRecordEvent;
use TYPO3\CMS\Core\DataHandling\DataHandler;


/**
 * Class TCEmainHook
 * @package TRAW\EventDispatch\Hooks
 */
class TCEmainHook extends AbstractHook
{

    /**
     * @param string $table
     * @param int $id
     * @param array $recordToDelete
     * @param bool|null $recordWasDeleted
     * @param DataHandler $pObj
     */
    public function processCmdmap_deleteAction(string $table, int $id, array $recordToDelete, ?bool $recordWasDeleted, DataHandler &$pObj)
    {
        $this->triggerEvent(new DeleteRecordEvent($table, $id, $recordToDelete, $recordWasDeleted, $pObj));
    }


    /**
     * @param string $status
     * @param string $table
     * @param int $id
     * @param array $fieldArray
     * @param DataHandler $pObj
     */
    public function processDatamap_afterDatabaseOperations(string $status, string $table, int $id, array $fieldArray, DataHandler &$pObj)
    {
        $this->triggerEvent(new AfterDatabaseOperationEvent($status, $table, $id, $fieldArray, $pObj));
    }

    /**
     * @param array $params
     * @param DataHandler $pObj
     */
    public function clearCachePostProc(array &$params, DataHandler &$pObj)
    {
        $this->triggerEvent(new ClearCacheEvent($params, $pObj));
    }
}
