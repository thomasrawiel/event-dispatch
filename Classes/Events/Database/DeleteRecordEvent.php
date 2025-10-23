<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events\Database;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
use TRAW\EventDispatch\Events\AbstractEvent;
use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class DeleteRecordEvent
 */
class DeleteRecordEvent extends AbstractEvent
{
    /**
     * @var string
     */
    protected string $type = 'deleteRecord';

    /**
     * DeleteRecordEvent constructor.
     *
     * @param BackendUserInfo $backendUser
     * @param                 $table
     * @param                 $id
     * @param                 $recordToDelete
     * @param null            $recordWasDeleted
     * @param DataHandler     $pObj
     * @param string $table
     * @param int $id
     * @param mixed[] $recordToDelete
     */
    public function __construct(BackendUserInfo $backendUser, protected string $table, protected int $id, protected array $recordToDelete, protected ?bool $recordWasDeleted = null, protected ?DataHandler $pObj = null)
    {
        parent::__construct($backendUser);
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
