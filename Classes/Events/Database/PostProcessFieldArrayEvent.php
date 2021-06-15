<?php


namespace TRAW\EventDispatch\Events\Database;


use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class PostProcessFieldArrayEvent
 * @package TRAW\EventDispatch\Events\Database
 */
class PostProcessFieldArrayEvent extends \TRAW\EventDispatch\Events\AbstractEvent
{
    /**
     * @var string
     */
    protected string $status;
    /**
     * @var string
     */
    protected string $table;
    /**
     * @var
     */
    protected $id;
    /**
     * @var array
     */
    protected array $fieldArray;
    /**
     * @var DataHandler
     */
    protected DataHandler $dataHandler;

    /**
     * PostProcessFieldArrayEvent constructor.
     * @param string $status
     * @param string $table
     * @param $id
     * @param array $fieldArray
     * @param DataHandler $dataHandler
     */
    public function __construct(string $status, string $table, $id, array $fieldArray, DataHandler $dataHandler)
    {
        $this->status = $status;
        $this->table = $table;
        $this->id = $id;
        $this->fieldArray = $fieldArray;
        $this->dataHandler = $dataHandler;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getFieldArray(): array
    {
        return $this->fieldArray;
    }

    /**
     * @return DataHandler
     */
    public function getDataHandler(): DataHandler
    {
        return $this->dataHandler;
    }

}