<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Hooks;

use TRAW\EventDispatch\Domain\Model\BackendUserInfo;
use TRAW\EventDispatch\Events\Backend\AfterBackendUserLoginEvent;

/**
 * Class BackendLoginHook
 */
class BackendLoginHook extends AbstractHook
{
    /**
     * @param array $backendUser
     */
    public function afterLogin(array $backendUser): void
    {
        if ($this->settings->getBackendUserLogin() && is_array($backendUser['user'])) {
            $this->dispatchEvent(new AfterBackendUserLoginEvent(new BackendUserInfo($backendUser['user'])));
        }
    }
}
