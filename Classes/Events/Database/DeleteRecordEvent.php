<?php


namespace TRAW\EventDispatch\Events\Database;


use TRAW\EventDispatch\Events\AbstractEvent;
use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class DeleteRecordEvent
 * @package TRAW\EventDispatch\Event
 */
class DeleteRecordEvent extends AbstractEvent
{
    /**
     * @var string
     */
    protected string $type = 'deleteRecord';
    /**
     * @var string
     */
    protected string $table;
    /**
     * @var int
     */
    protected int $id;
    /**
     * @var array
     */
    protected array $recordToDelete;
    /**
     * @var bool|mixed|null
     */
    protected ?bool $recordWasDeleted;

    /**
     * @var DataHandler
     */
    protected DataHandler $pObj;

    /**
     * DeleteRecordEvent constructor.
     * @param $table
     * @param $id
     * @param $recordToDelete
     * @param null $recordWasDeleted
     * @param DataHandler $pObj
     */
    public function __construct($table, $id, $recordToDelete, $recordWasDeleted = NULL, DataHandler $pObj)
    {
        $this->table = $table;
        $this->id = $id;
        $this->recordToDelete = $recordToDelete;
        $this->recordWasDeleted = $recordWasDeleted;
        $this->pObj = $pObj;
    }


    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getRecordToDelete(): array
    {
        return $this->recordToDelete;
    }

    /**
     * @return bool|mixed|null
     */
    public function getRecordWasDeleted()
    {
        return $this->recordWasDeleted;
    }

    /**
     * @return DataHandler
     */
    public function getPObj(): DataHandler
    {
        return $this->pObj;
    }
}