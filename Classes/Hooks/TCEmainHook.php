<?php
declare(strict_types=1);

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
use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class TCEmainHook
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
    public function processCmdmap_deleteAction(string $table, int $id, array $recordToDelete, ?bool $recordWasDeleted, DataHandler &$pObj): void
    {
        if ($this->settings->getDeleteRecord()) {
            $this->dispatchEvent(new DeleteRecordEvent($this->getBeUserInfo(), $table, $id, $recordToDelete, $recordWasDeleted, $pObj));
        }
    }

    /**
     * @param string $status
     * @param string $table
     * @param int $id
     * @param array $fieldArray
     * @param DataHandler $pObj
     */
    public function processDatamap_afterDatabaseOperations($status, $table, $id, $fieldArray, DataHandler &$pObj): void
    {
        if ($this->settings->getAfterDatabaseOperation()) {
            $event = $this->dispatchEvent(new AfterDatabaseOperationEvent($this->getBeUserInfo(), $status, $table, $id, $fieldArray, $pObj));
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
    public function moveRecord_firstElementPostProcess($table, $recordId, $destinationPid, array $movedRecord, array $updatedFields, DataHandler $dataHandler): void
    {
        if ($this->settings->getMoveRecord()) {
            $this->dispatchEvent(new MoveRecordEvent($this->getBeUserInfo(), $table, $recordId, $destinationPid, null, $movedRecord, $updatedFields, $dataHandler));
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
    public function moveRecord_afterAnotherElementPostProcess($table, $recordId, $destinationPid, $originalDestinationPid, array $movedRecord, array $updatedFields, DataHandler $dataHandler): void
    {
        if ($this->settings->getMoveRecord()) {
            $this->dispatchEvent(new MoveRecordEvent($this->getBeUserInfo(), $table, $recordId, $destinationPid, $originalDestinationPid, $movedRecord, $updatedFields, $dataHandler));
        }
    }

    /**
     * @param array $params
     * @param DataHandler $pObj
     */
    public function clearCachePostProc(array &$params, DataHandler &$pObj): void
    {
        if ($this->settings->getClearCache()) {
            $this->dispatchEvent(new ClearCacheEvent($this->getBeUserInfo(), $params, $pObj));
        }
    }
}
