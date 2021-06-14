<?php


namespace TRAW\EventDispatch\Events\Database;

use TRAW\EventDispatch\Events\AbstractEventListener;

class AfterDatabaseOperationEventListener extends AbstractEventListener
{
    public function __invoke(AfterDatabaseOperationEvent $event)
    {
    }
}