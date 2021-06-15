<?php


namespace TRAW\EventDispatch\Events\Database;


use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class PostProcessEvent
 * @package TRAW\EventDispatch\Events\Database
 */
class PostProcessEvent extends \TRAW\EventDispatch\Events\AbstractEvent
{
    /**
     * @var string
     */
    protected string $command;
    /**
     * @var string
     */
    protected string $table;
    /**
     * @var
     */
    protected $recordId;
    /**
     * @var
     */
    protected $commandValue;
    /**
     * @var DataHandler
     */
    protected DataHandler $dataHandler;

    /**
     * PostProcessEvent constructor.
     * @param string $command
     * @param string $table
     * @param $recordId
     * @param $commandValue
     * @param DataHandler $dataHandler
     */
    public function __construct(string $command, string $table, $recordId, $commandValue, DataHandler $dataHandler)
    {
        $this->command = $command;
        $this->table = $table;
        $this->recordId = $recordId;
        $this->commandValue = $commandValue;
        $this->dataHandler = $dataHandler;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
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
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * @return mixed
     */
    public function getCommandValue()
    {
        return $this->commandValue;
    }

    /**
     * @return DataHandler
     */
    public function getDataHandler(): DataHandler
    {
        return $this->dataHandler;
    }

}