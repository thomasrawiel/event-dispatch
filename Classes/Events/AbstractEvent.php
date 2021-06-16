<?php

namespace TRAW\EventDispatch\Events;

/**
 * Class AbstractEvent
 * @package TRAW\EventDispatch\Events
 */
abstract class AbstractEvent implements EventInterface
{
    /**
     * @var string
     */
    protected string $type = 'abstract';

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}