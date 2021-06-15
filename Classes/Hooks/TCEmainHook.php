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

use TRAW\EventDispatch\Events\Cache\ClearCacheEvent;
use TRAW\EventDispatch\Events\Database\AfterDatabaseOperationEvent;
use TRAW\EventDispatch\Events\Database\DeleteRecordEvent;
use TRAW\EventDispatch\Events\Database\MoveRecordEvent;
use TRAW\EventDispatch\Events\Database\PostProcessEvent;
use TRAW\EventDispatch\Events\Database\PostProcessFieldArrayEvent;
use TRAW\EventDispatch\Events\Database\PreProcessFieldArrayEvent;
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
        if ($this->settings->getDeleteRecord()) {
            $this->dispatchEvent(new DeleteRecordEvent($table, $id, $recordToDelete, $recordWasDeleted, $pObj));
        }
    }

    /**
     * @param array $incomingFieldArray
     * @param string $table
     * @param $id
     * @param DataHandler $dataHandler
     */
    public function processDatamap_preProcessFieldArray(array $incomingFieldArray, string $table, $id, DataHandler $dataHandler)
    {
        if ($this->settings->getPreProcessFieldArray()) {
            $this->dispatchEvent(new PreProcessFieldArrayEvent($incomingFieldArray, $table, $id, $dataHandler));
        }
    }

    /**
     * @param string $status
     * @param string $table
     * @param $id
     * @param array $fieldArray
     * @param DataHandler $dataHandler
     */
    public function processDatamap_postProcessFieldArray(string $status, string $table, $id, array $fieldArray, DataHandler $dataHandler)
    {
        if ($this->settings->getPostProcessFieldArray()) {
            $this->dispatchEvent(new PostProcessFieldArrayEvent($status, $table, $id, $fieldArray, $dataHandler));
        }
    }

    /**
     * @param string $command
     * @param string $table
     * @param $recordId
     * @param $commandValue
     * @param DataHandler $dataHandler
     */
    public function processCmdmap_postProcess(string $command, string $table, $recordId, $commandValue, DataHandler $dataHandler)
    {
        if ($this->settings->getPostProcess()) {
            $this->dispatchEvent(new PostProcessEvent($command, $table, $recordId, $commandValue, $dataHandler));
        }
    }

    /**
     * @param string $status
     * @param string $table
     * @param int $id
     * @param array $fieldArray
     * @param DataHandler $pObj
     */
    public function processDatamap_afterDatabaseOperations($status, $table, $id, $fieldArray, DataHandler &$pObj)
    {
        if ($this->settings->getAfterAllDatabaseOperations()) {
            $this->dispatchEvent(new AfterDatabaseOperationEvent($status, $table, $id, $fieldArray, $pObj));
        }
    }

    /**
     * @param $table
     * @param $recordId
     * @param $destinationPid
     * @param array $movedRecord
     * @param array $updatedFields
     * @param DataHandler $dataHandler
     */
    public function moveRecord_firstElementPostProcess($table, $recordId, $destinationPid, array $movedRecord, array $updatedFields, DataHandler $dataHandler)
    {
        if ($this->settings->getMoveRecord()) {
            $this->dispatchEvent(new MoveRecordEvent($table, $recordId, $destinationPid, null, $movedRecord, $updatedFields, $dataHandler));
        }
    }

    /**
     * @param $table
     * @param $recordId
     * @param $destinationPid
     * @param $originalDestinationPid
     * @param array $movedRecord
     * @param array $updatedFields
     * @param DataHandler $dataHandler
     */
    public function moveRecord_afterAnotherElementPostProcess($table, $recordId, $destinationPid, $originalDestinationPid, array $movedRecord, array $updatedFields, DataHandler $dataHandler)
    {
        if ($this->settings->getMoveRecord()) {
            $this->dispatchEvent(new MoveRecordEvent($table, $recordId, $destinationPid, $originalDestinationPid, $movedRecord, $updatedFields, $dataHandler));
        }
    }

    /**
     * @param array $params
     * @param DataHandler $pObj
     */
    public function clearCachePostProc(array &$params, DataHandler &$pObj)
    {
        if ($this->settings->getClearCache()) {
            $this->dispatchEvent(new ClearCacheEvent($params, $pObj));
        }
    }
}
