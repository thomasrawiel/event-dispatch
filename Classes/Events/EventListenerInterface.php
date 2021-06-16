<?php


namespace TRAW\EventDispatch\Events;


interface EventListenerInterface
{
    public function eventListenerIsActive():bool;
}