<?php


namespace TRAW\EventDispatch\Events\Database;


use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
use TRAW\EventDispatch\Events\AbstractEvent;
use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class MoveRecordEvent
 * @package TRAW\EventDispatch\Events\Database
 */
class MoveRecordEvent extends AbstractEvent
{
    /**
     * @var string
     */
    protected string $type = 'moveRecord';
    /**
     * @var
     */
    protected $table;
    /**
     * @var
     */
    protected $recordId;
    /**
     * @var
     */
    protected $destinationPid;
    /**
     * @var
     */
    protected $originalDestinationPid;
    /**
     * @var array
     */
    protected array $movedRecord;
    /**
     * @var array
     */
    protected array $updatedFields;
    /**
     * @var DataHandler
     */
    protected DataHandler $dataHandler;
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
     */
    public function __construct(BackendUserInfo $backendUser, $table, $recordId, $destinationPid, $originalDestinationPid, $movedRecord, $updatedFields, $dataHandler)
    {
        parent::__construct($backendUser);
        $this->table = $table;
        $this->recordId = $recordId;
        $this->destinationPid = $destinationPid;
        $this->originalDestinationPid = $originalDestinationPid;
        $this->movedRecord = $movedRecord;
        $this->updatedFields = $updatedFields;
        $this->dataHandler = $dataHandler;
        $this->firstElement = is_null($originalDestinationPid);
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