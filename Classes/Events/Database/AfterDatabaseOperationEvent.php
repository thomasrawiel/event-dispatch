<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events\Database;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
use TRAW\EventDispatch\Events\AbstractEvent;
use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class AfterDatabaseOperationEvent
 */
class AfterDatabaseOperationEvent extends AbstractEvent
{
    protected string $type = 'afterDatabaseOperation';

    /**
     * AfterDatabaseOperationEvent constructor.
     *
     * @param BackendUserInfo $backendUser
     * @param                 $status
     * @param                 $table
     * @param                 $id
     * @param array           $fieldArray
     * @param DataHandler     $pObj
     */
    public function __construct(BackendUserInfo $backendUser, /**
     * @var
     */
    protected $status, /**
     * @var
     */
    protected $table, /**
     * @var
     */
    protected $id, protected array $fieldArray, protected \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj)
    {
        parent::__construct($backendUser);
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
