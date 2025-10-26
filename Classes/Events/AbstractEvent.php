<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;

/**
 * Class AbstractEvent
 */
abstract class AbstractEvent implements EventInterface
{
    /**
     * @var string
     */
    protected string $type = 'abstract';

    /**
     * BackendLoginEvent constructor.
     * @param BackendUserInfo $backendUser
     */
    public function __construct(private readonly BackendUserInfo $backendUser)
    {
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return BackendUserInfo
     */
    public function getBackendUser(): BackendUserInfo
    {
        return $this->backendUser;
    }
}
