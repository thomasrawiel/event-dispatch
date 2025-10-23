<?php
declare(strict_types=1);

namespace TRAW\EventDispatch\Events;

interface EventInterface
{
    /**
     * @return string
     */
    public function getType(): string;

}
