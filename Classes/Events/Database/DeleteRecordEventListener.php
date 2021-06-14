<?php

namespace TRAW\EventDispatch\Events\Database;

use TRAW\EventDispatch\Events\AbstractEventListener;

class DeleteRecordEventListener extends AbstractEventListener
{
    public function __invoke(DeleteRecordEvent $event)
    {
    }
}