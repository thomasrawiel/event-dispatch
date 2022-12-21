<?php


namespace TRAW\EventDispatch\Events\Cache;


use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
use TRAW\EventDispatch\Events\AbstractEvent;
use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * Class ClearCacheEvent
 * @package TRAW\EventDispatch\Event
 */
class ClearCacheEvent extends AbstractEvent
{
    /**
     * @var array
     */
    protected array $params;
    /**
     * @var string
     */
    protected string $type = 'clearCache';
    /**
     * @var DataHandler
     */
    protected DataHandler $pObj;

    /**
     * ClearCacheEvent constructor.
     *
     * @param BackendUserInfo $backendUser
     * @param array           $params
     * @param DataHandler     $pObj
     */
    public function __construct(BackendUserInfo $backendUser, array $params, DataHandler $pObj)
    {
        parent::__construct($backendUser);
        $this->params = $params;
        $this->pObj = $pObj;
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