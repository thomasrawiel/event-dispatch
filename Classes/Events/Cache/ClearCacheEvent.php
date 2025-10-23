<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events\Cache;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
use TRAW\EventDispatch\Events\AbstractEvent;
use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class ClearCacheEvent
 */
class ClearCacheEvent extends AbstractEvent
{
    /**
     * @var string
     */
    protected string $type = 'clearCache';

    /**
     * ClearCacheEvent constructor.
     *
     * @param BackendUserInfo $backendUser
     * @param array           $params
     * @param DataHandler     $pObj
     */
    public function __construct(BackendUserInfo $backendUser, protected array $params, protected DataHandler $pObj)
    {
        parent::__construct($backendUser);
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return DataHandler
     */
    public function getPObj(): DataHandler
    {
        return $this->pObj;
    }
}
