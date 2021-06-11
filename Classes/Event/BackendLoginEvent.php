<?php

namespace TRAW\EventDispatch\Event;

/**
 * Class BackendLoginEvent
 * @package TRAW\EventDispatch\Event
 */
class BackendLoginEvent extends AbstractEvent
{
    /**
     * @var string
     */
    protected string $username;

    /**
     * @var string|null
     */
    protected ?string $userEmail;

    /**
     * BackendLoginEvent constructor.
     * @param string $username
     * @param string|null $userEmail
     */
    public function __construct(string $username, ?string $userEmail)
    {
        $this->username = $username;
        $this->userEmail = $userEmail;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }
}