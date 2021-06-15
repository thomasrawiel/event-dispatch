<?php


namespace TRAW\EventDispatch\Events\Database;


use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class PreProcessFieldArrayEvent
 * @package TRAW\EventDispatch\Events\Database
 */
class PreProcessFieldArrayEvent extends \TRAW\EventDispatch\Events\AbstractEvent
{
    /**
     * @var array
     */
    protected array $incomingFieldArray;
    /**
     * @var string
     */
    protected string $table;
    /**
     * @var
     */
    protected $id;
    /**
     * @var DataHandler
     */
    protected DataHandler $dataHandler;

    /**
     * PreProcessFieldArrayEvent constructor.
     * @param array $incomingFieldArray
     * @param string $table
     * @param $id
     * @param DataHandler $dataHandler
     */
    public function __construct(array $incomingFieldArray, string $table, $id, DataHandler $dataHandler)
    {
        $this->incomingFieldArray = $incomingFieldArray;
        $this->table = $table;
        $this->id = $id;
        $this->dataHandler = $dataHandler;
    }

    /**
     * @return array
     */
    public function getIncomingFieldArray(): array
    {
        return $this->incomingFieldArray;
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
     * @return DataHandler
     */
    public function getDataHandler(): DataHandler
    {
        return $this->dataHandler;
    }
}

