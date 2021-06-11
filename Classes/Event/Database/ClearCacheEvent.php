<?php


namespace TRAW\EventDispatch\Event\Database;


use TRAW\EventDispatch\Event\AbstractEvent;
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
     * @var DataHandler
     */
    protected DataHandler $pObj;

    /**
     * ClearCacheEvent constructor.
     * @param array $params
     * @param DataHandler $pObj
     */
    public function __construct(array $params, DataHandler $pObj)
    {
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