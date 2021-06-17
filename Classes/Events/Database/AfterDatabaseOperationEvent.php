<?php


namespace TRAW\EventDispatch\Events\Database;


use TRAW\EventDispatch\Events\AbstractEvent;

/**
 * Class AfterDatabaseOperationEvent
 * @package TRAW\EventDispatch\Event
 */
class AfterDatabaseOperationEvent extends AbstractEvent
{
    /**
     * @var
     */
    protected $status;
    /**
     * @var
     */
    protected $table;
    /**
     * @var
     */
    protected $id;
    /**
     * @var array
     */
    protected array $fieldArray;
    /**
     * @var \TYPO3\CMS\Core\DataHandling\DataHandler
     */
    protected \TYPO3\CMS\Core\DataHandling\DataHandler $pObj;

    protected string $type = 'afterDatabaseOperation';

    /**
     * AfterDatabaseOperationEvent constructor.
     * @param $status
     * @param $table
     * @param $id
     * @param array $fieldArray
     * @param \TYPO3\CMS\Core\DataHandling\DataHandler $pObj
     */
    public function __construct($backendUser, $status, $table, $id, array $fieldArray, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj)
    {
        parent::__construct($backendUser);
        $this->status = $status;
        $this->table = $table;
        $this->id = $id;
        $this->fieldArray = $fieldArray;
        $this->pObj = $pObj;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
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
     * @return mixed
     */
    public function getPObj(): \TYPO3\CMS\Core\DataHandling\DataHandler
    {
        return $this->pObj;
    }
}