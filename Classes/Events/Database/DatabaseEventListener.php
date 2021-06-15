<?php


namespace TRAW\EventDispatch\Events\Database;

use TRAW\EventDispatch\Events\AbstractEventListener;

class DatabaseEventListener extends AbstractEventListener
{
    public function preProcessFieldArray(PreProcessFieldArrayEvent $event)
    {
    }

    public function postProcessFieldArray(PostProcessFieldArrayEvent $event)
    {
    }

    public function postProcess(PostProcessEvent $event)
    {
    }

    public function afterDatabaseOperation(AfterDatabaseOperationEvent $event)
    {
    }

    public function deleteRecord(DeleteRecordEvent $event)
    {
    }

    public function moveRecord(MoveRecordEvent $event)
    {
    }
}