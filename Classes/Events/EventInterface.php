<?php


namespace TRAW\EventDispatch\Events;


interface EventInterface
{
    public function getType(): string;

}