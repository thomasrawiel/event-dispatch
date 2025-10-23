<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events\Database;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
use TRAW\EventDispatch\Events\AbstractEvent;
use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class MoveRecordEvent
 */
class MoveRecordEvent extends AbstractEvent
{
    /**
     * @var string
     */
    protected string $type = 'moveRecord';
    /**
     * @var bool
     */
    protected bool $firstElement;

    /**
     * MoveRecordEvent constructor.
     *
     * @param BackendUserInfo $backendUser
     * @param                 $table
     * @param                 $recordId
     * @param                 $destinationPid
     * @param                 $originalDestinationPid
     * @param                 $movedRecord
     * @param                 $updatedFields
     * @param                 $dataHandler
     * @param mixed[] $movedRecord
     * @param mixed[] $updatedFields
     * @param DataHandler $dataHandler
     */
    public function __construct(BackendUserInfo $backendUser, /**
     * @var
     */
    protected $table, /**
     * @var
     */
    protected $recordId, /**
     * @var
     */
    protected $destinationPid, /**
     * @var
     */
    protected $originalDestinationPid, protected array $movedRecord, protected array $updatedFields, protected DataHandler $dataHandler)
    {
        parent::__construct($backendUser);
        $this->firstElement = is_null($this->originalDestinationPid);
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return mixed
     */
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * @return mixed
     */
    public function getDestinationPid()
    {
        return $this->destinationPid;
    }

    /**
     * @return array
     */
    public function getMovedRecord(): array
    {
        return $this->movedRecord;
    }

    /**
     * @return array
     */
    public function getUpdatedFields(): array
    {
        return $this->updatedFields;
    }

    /**
     * @return DataHandler
     */
    public function getDataHandler(): DataHandler
    {
        return $this->dataHandler;
    }

}
