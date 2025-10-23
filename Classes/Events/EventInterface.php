<?php


namespace TRAW\EventDispatch\Events;


/**
 *
 */
interface EventInterface
{
    /**
     * @return string
     */
    public function getType(): string;

}